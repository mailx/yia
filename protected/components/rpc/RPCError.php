<?php
/**
 * Description of RPCError
 *
 * @author mraz <tonymark0714@gmail.com>
 */
class RPCError {

    private $_code;
    private $_message;
    private $errorObject;

    public function __construct($errorMessage, $errorCode) {
        $this->_code = $errorCode;
        $this->_message = $errorMessage;
    }

    public function getErrorObject() {
        $this->buildErrorObject();
        return $this->errorObject;
    }

    public function buildErrorObject() {
        $this->errorObject = new stdClass();
        $this->setErrorCode();
        $this->setErrorMessage();
    }

    public function setErrorCode() {
        $this->errorObject->code = $this->_code;
    }

    public function setErrorMessage() {
        $this->errorObject->message = $this->_message;
    }

}
