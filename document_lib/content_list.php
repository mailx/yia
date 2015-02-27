<?php
return array(
  'title' => '内容列表接口',
  'list' => array(
      '1' => array(
          'title' => '获取内容列表接口',
          'interface_desc' => '用于所属栏目的最新内容列表',
          'request_desc' => 'columnid:栏目id',
          'response_desc' => 'code代码编号 code为0时为正确，其他编号均错误',
          'request_args' => array(
              "columnid"=>array("type"=>"text", "value"=>""),
          ),
          'method' => 'content',//controller的名字
          'function' => 'GetContentList',//action的名字
      ),
  ),
);