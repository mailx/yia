<?php
return array(
  'title' => '课程相关接口',
  'list' => array(
      '1' => array(
          'title' => '获取课程详情',
          'interface_desc' => '用于获取课程的详情（名称，封面，简介）',
          'request_desc' => 'courseid:课程courseid',
          'response_desc' => 'code代码编号 code为0时为正确，其他编号均错误',
          'request_args' => array(
              'courseid'=>array("type"=>"text", "value"=>""),
          ),
          'method' => 'course',
          'function' => 'GetCourseDetail',
      ),
      '2' => array(
          'title' => '获取课程教师',
          'interface_desc' => '用于获取课程的教师',
          'request_desc' => 'courseid:课程courseid',
          'response_desc' => 'code代码编号 code为0时为正确，其他编号均错误',
          'request_args' => array(
              'courseid'=>array("type"=>"text", "value"=>""),
          ),
          'method' => 'course',
          'function' => 'GetCourseTeacher',
      ),
  ),
);