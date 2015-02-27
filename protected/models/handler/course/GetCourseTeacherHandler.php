<?php
/**
 * @author mraz <tonymark0714@gmail.com>
 */
require_once dirname(__FILE__) . '/../Handler.php';

class GetCourseTeacherHandler  extends Handler{
    public function run(){
        $message['id'] = $this->request_obj->courseid;
        $message['teacherName'] = "mark";
        $this->response_obj = $message;
    }
}
