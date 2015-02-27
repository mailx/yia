<?php
/**
 * @author mraz <tonymark0714@gmail.com>
 */
require_once dirname(__FILE__) . '/../Handler.php';

class GetCourseDetailHandler extends Handler{
    public function run(){
        
        $message['id'] = $this->request_obj->courseid;
        $message['name'] = "qwe";
        $message['poster'] = "";
        $message['detail'] = "";
        $this->response_obj = $message;
    }
}