<?php
/**
 * @author mraz <tonymark0714@gmail.com>
 */
require_once dirname(__FILE__) . '/../Handler.php';

class GetContentListHandler extends Handler{
    public function run(){
        $message['id'] = $this->request_obj->columnid;
        $message['contentName'] = "asd";
        $this->response_obj = $message;
    }
}