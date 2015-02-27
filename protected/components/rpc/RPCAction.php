<?php
/**
 * Description of RPCAction
 *
 * @author mraz <tonymark0714@gmail.com>
 */
Yii::import('application.components.*');
class RPCAction  extends CAction{
    
    // json 解析错误
    const PARSE_ERROR = -32700;
    
    //无效请求
    const INVALID_REQUEST = -32600;
    
    // 无效PIDcode
    const INVALID_PID = -32601;
    
    //请求有效期超时
    const INVALID_TIME = -32602;
    
    //请求有效时间
    const LIMIT_TIME = 5;
            
    //无效IP
    const INVALID_IP = -32603;
    
    //请求方法的签名sign不通过
    const INVALID_SIGN = -32604;
    
    //无效的请求方法
    const INVALID_METHOD = -32605;
    
    //请求方法执行错误
    const SERVER_ERROR  = -32500;
    
    /**
     * 加载需求的class
     * @var array
     */
    public $classMap;
    
    /**
     * 请求的json格式的字符串
     * @var string
     */
    private $requestText;
    
    /**
     * 解析json格式后的对象
     * @var mix
     */
    private $requestObject;
    
    public function run() {
        if(isset($_REQUEST['request'])){
            if($this->requestText===null){
                $this->requestText = $_REQUEST['request'];
            }
            $this->log($this->requestText);
            $this->processingRequests();//处理客户端的请求
            Yii::app()->end();
        }
    }
    
    /**
     * 请求rpc处理
     */
    private function processingRequests() {
        try {
            $this->parseRequestJson(); //解析json成request对象
            $this->checkRequestHeader();//检查请求头是否合法
            $this->performSingleCall();//执行请求，并返回结果
            
        } catch (Exception $e) {
            $responseBody = new RPCError($e->getMessage(), $e->getCode());
            $RPCResponse = new RPCResponse($responseBody);
            $this->outPutResponse($RPCResponse->getResponseObject());
        }
    }
    
    /**
     * 解析请求的json成对象
     */
    private function parseRequestJson(){
        if (!is_null($requestObject = json_decode($this->requestText))) {
            $this->requestObject = $requestObject;
        } else {
            throw new Exception("Parse error", self::PARSE_ERROR);
        }
    }
    
    /**
     * 检查请求头是否合法
     */
    private function checkRequestHeader(){
        if (!$this->checkRequestFormat()){
            throw new Exception("Invalid Request", self::INVALID_REQUEST);
        }
        if (!$this->checkPid()) {
            throw new Exception("Invalid Pid", self::INVALID_PID);
        }
        if (!$this->checkTime()) {
            throw new Exception("Invalid Time", self::INVALID_TIME);
        }
        if (!$this->checkIP()) {
            throw new Exception("Invalid IP", self::INVALID_IP);
        }
        if (!$this->checkSign()) {
            throw new Exception("Invalid Sign", self::INVALID_SIGN);
        }
        if (!$this->checkMethod()){
            throw new Exception("Method not found", self::INVALID_METHOD);
        }
    }
    
    /**
     * 检查请求的格式
     */
    private function checkRequestFormat(){
        return isset($this->requestObject->head)
        && isset($this->requestObject->head->pid) 
        && isset($this->requestObject->head->time) 
        && isset($this->requestObject->head->sign) 
        && isset($this->requestObject->head->method)
        && isset($this->requestObject->body);
    }
    
    /**
     * 检查请求的pid合法
     */
    private function checkPid(){
        return $this->requestObject->head->pid==Yii::app()->params['pid'];
    }
    
    /**
     * 检查请求有效期是否超时
     */
    private function checkTime(){
        //有需要再做吧，判断$this->requestObject->head->time有效期是否超时
//        return true;
        return time() - $this->requestObject->head->time > self::LIMIT_TIME ? false : true;
    }
    
     /**
     * 检查请求ip是否合法
     */
    private function checkIP(){
        //有需要再做吧
        return true;
    }
    
    /**
     * 检查签名是否合法
     */
    private function checkSign(){
        $sign = md5(strval($this->requestObject->body) . strval($this->requestObject->head->time) . strval(Yii::app()->params['secret']));
        return $this->requestObject->head->sign == $sign;
    }
    
    /**
     * 检查请求头的method是否存在
     */
    private function checkMethod(){
        $reflectionClass = new ReflectionClass($this->getController());
        $methodNames = array();
        foreach($reflectionClass->getMethods() as $method) {
            $methodNames[$method->name] = $method->getParameters();
        }
        $this->requestObject->head->method = "action".$this->requestObject->head->method;
        return array_key_exists(strval($this->requestObject->head->method), $methodNames);
    }
    
    /**
     * 当传入json对象只有一个的情况
     */
    private function performSingleCall() {
        $responseBody = $this->excuteParameters();
        $RPCResponse= new RPCResponse($responseBody);
        $this->outPutResponse($RPCResponse->getResponseObject());
    }
    
    /**
     * controller的action执行请求的参数
     */
    private function excuteParameters(){
        try {
            $methodOwnerService = $this->controller;
            $reflectionMethod = new ReflectionMethod($methodOwnerService, $this->requestObject->head->method);
            $params = (array) $this->getParameters();//处理request的body信息，返回解密后的json字符串
            return $reflectionMethod->invokeArgs($methodOwnerService, $params);//将request的body传到controller的action参数里，并执行，返回controller的return
        } catch (Exception $e) {
            throw new Exception("Server Internal Error", self::SERVER_ERROR);
        }
    }
    
    /**
     * 解密请求的body
     */
    private function getParameters(){
        return base64_decode($this->requestObject->body);
    }
    
    /**
     * 输出response
     */
    private function outPutResponse($responseObject){
        if(!empty($responseObject)) {
            header('Content-Type: application/json');
            echo urldecode(json_encode($responseObject));
        }
    }
    
    private function log($param) {
        
    }
    
    
    
    
}
