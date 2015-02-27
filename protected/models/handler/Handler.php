<?php
/**
 * @author mraz <tonymark0714@gmail.com>
 */
abstract class Handler{
    protected $request_obj;
    protected $response_obj;
    
    public function __construct($request_obj) {
        $this->request_obj = json_decode($request_obj);
        //print_r($request_obj);
    }
    
    public function run(){
            $message = array('code'=>'-1', 'message'=>'没有重写run()', 'data'=>'');	
            $this->response_obj = $message;
    }
    
    public function getResponse_obj(){
        //print_r($this->response_obj);
        return json_encode($this->response_obj);
    }
}
