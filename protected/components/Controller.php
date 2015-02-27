<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $items=array();
	public $menu=array();
	public $csses=array();
	public $jses=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function filters(){
	    return array(
	        'accessControl', // perform access control for CRUD operations
	    );
	}
	
	public function accessRules(){
	    return array(
	        array('allow', // allow authenticated users to access all actions
	            'users'=>array('@'),
	        ),
	        array('deny',
	            'users'=>array('?'),
	        ),
	        array('deny',
	            'users'=>array('*'),
	        ),
	    );
	}
	
	public function actionUpload(){
	    $filedata = $_FILES['Filedata'];
	    $row = explode(".", $filedata['name']);
	    $pic_suffix = $row[1];
	    $file_name = md5_file($filedata['tmp_name']);
	    $tmp_file = YII::app()->basePath.'/../upload/'. $file_name.'.'. strtolower($pic_suffix);
	    move_uploaded_file($filedata['tmp_name'], $tmp_file);
	    echo $file_name.'.'. strtolower($pic_suffix);
	}
}