<?php
/**
 * Description of RPCResponse
 *
 * @author mraz <tonymark0714@gmail.com>
 */
class RPCResponse {

    private $_resultBody;
    private $responseObject;
    private $errorObject;

    public function __construct($resultBody) {
        $this->_resultBody = $resultBody;
        if ($this->_resultBody instanceof RPCError) {
            $this->errorObject = $this->_resultBody->getErrorObject();
        }
    }

    public function getResponseObject() {
        $this->buildResponseObject();
        return $this->responseObject;
    }

    private function buildResponseObject() {
        $this->responseObject = new stdClass();
        $this->setResponseHeader();
        $this->setResponseBody();
    }

    private function setResponseHeader() {
        $headerObj = new stdClass();
        if ($this->_resultBody instanceof RPCError) {
            $headerObj->code = $this->errorObject->code;
            $headerObj->message = ($this->errorObject->message);
        } else {
            $headerObj->code = 0;
            $headerObj->message = "Success";
        }
        $headerObj->time = time();
        $this->responseObject->head = $headerObj;
    }

    private function setResponseBody() {
        if ($this->_resultBody instanceof RPCError) {
            $this->responseObject->body = "";
        } else {
            $this->responseObject->body = base64_encode($this->_resultBody);
        }
    }

}
