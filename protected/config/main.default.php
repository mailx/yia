<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
header("Content-Type:text/html;charset=utf-8");
error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);


return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'yia',
    'defaultController' => 'site',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.data.*',
        'application.components.*',
        'application.components.rpc.*',
        'application.extensions.*',
        'application.models.handler.*',
        'application.models.handler.content.*',
        'application.models.handler.course.*',
        'application.models.handler.version.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        /* 'user'=>array(
          // enable cookie-based authentication
          'allowAutoLogin'=>true,
          'loginUrl'=>array('login/home/login'),
          'class'=>'WebUser',
          ), */
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'yia_db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=yia',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'ctn_db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=ctn',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'svc_db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=svc',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'enableProfiling' => true,
        ),
        'ads_db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=ads',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'enableProfiling' => true,
        ),
//		'errorHandler'=>array(
//			// use 'site/error' action to display errors
//			'errorAction'=>'site/error',
//		),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'info,profile,error,warning',
                    'logFile' => 'yia.log',
                    'categories' => 'yia.*',
                    'filter' => 'CLogFilter',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'trace,info,profile,error,warning',
                    'logFile' => 'db.log',
                    'categories' => 'system.db.*',
                ),
            ),
        ),
        'ftp' => array(
            'class' => 'application.extensions.FtpComponent',
            'ssl' => false,
            'timeout' => 90,
            'autoConnect' => false,
        ),
        'csv' => array(
            'class' => 'application.extensions.ECsvComponent',
        ),
        'excel' => array(
            'class' => 'application.extenstions.phpexecl.PhpExcel',
        ),
        'curl' => array(
            'class' => 'application.extenstions.Curl',
        ),
        'poster' => array(
            'class' => 'application.extensions.PosterComponent',
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'adminEmail' => 'webmaster@example.com',
        'db_yia' => 'yia',
        'db_ctn' => 'ctn',
        'db_svc' => 'svc',
        'db_ads' => 'ads',
        'ftpID' => '2',
        'upload_path' => '/../upload',
        'pid' => 123,
        'secret' => 'yia'
    ),
);
