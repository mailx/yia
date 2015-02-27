<?php
return array(
  'title' => '版本控制接口',
  'list' => array(
      '1' => array(
          'title' => '检查android版本接口',
          'interface_desc' => '用于检查服务器的最新版本以及最新版本的下载地址',
          'request_desc' => 'null',
          'response_desc' => 'code代码编号 code为0时为正确，其他编号均错误',
          'request_args' => array(
          ),
          'method' => 'version',
          'function' => 'CheckAndroidVersion',
      ),
  ),
);