<?php
/**
 * 商城首页控制器
 */

class IndexController extends Controller{
	
	public function actionIndex(){
// 		echo "<pre>";
// 		var_dump(Yii::app()->db);
// 		echo "</pre>";
		
		$this->render('index');
// 		echo ("this is index");
	}
	
	
}