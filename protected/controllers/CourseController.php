<?php
/**
 * @author mraz <tonymark0714@gmail.com>
 */
class CourseController extends RPCController{
    
    public function actionGetCourseDetail($request){
        $handler = new GetCourseDetailHandler($request);
        $handler->run();
        return $handler->getResponse_obj();
    }
    
     public function actionGetCourseTeacher($request){
        $handler = new GetCourseTeacherHandler($request);
        $handler->run();
        return $handler->getResponse_obj();
    }
    
}