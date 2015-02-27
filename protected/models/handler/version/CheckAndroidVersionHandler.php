<?php
/**
 * @author mraz <tonymark0714@gmail.com>
 */
require_once dirname(__FILE__) . '/../Handler.php';

class CheckAndroidVersionHandler extends Handler{
    public function run(){
        $message = array();
        $message['version'] = "1.0";
        $message['downloadUrl'] = "http://open.oai.com/app/oai.apk";
        $this->response_obj = $message;
    }
}
