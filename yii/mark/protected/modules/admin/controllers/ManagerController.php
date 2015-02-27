<?php
/**
 * 后台管理员登陆控制器
 */
class ManagerController extends Controller{
	/**
	 * 实现用户登录
	 */
	public function actionLogin(){
		$this->renderPartial('login');
	}
	
	
}