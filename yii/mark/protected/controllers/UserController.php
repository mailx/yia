<?php
/**
 * 用户控制器
 * 1206-13:52
 */
header("content-type:text/html;charset=utf-8");

class UserController extends Controller{
	/**
	 * 验证码生成 
	 * 在当前控制器里边，以方法的形式访问这个类
	 */
	public function actions(){
		return array(
			'captcha'=>array(
				'class'=>'system.web.widgets.captcha.CCaptchaAction',
				'width'=>75,	
				'height'=>30,	
			),
			
		);
	}
	
	public function actionLogin(){
		$user_login = new LoginForm();
		
		if(isset($_POST['LoginForm'])){
			//收集表单信息
			$user_login->attributes = $_POST['LoginForm'];
			//校验数据和实现session存储(用于说明用户已登录)
			if($user_login->validate() && $user_login->login()){
				$this->redirect('./index.php');
			}
		}
		
		//renderPatial() 直接显示一个view
		//render()       加载layout来显示一个view
// 		$this->renderPartial('login');
		$this->render('login',array('user_login'=>$user_login));
	}
	
	/**
	 * 用户退出
	 */
	public function actionLogout(){
		//删除session信息
		Yii::app()->session->clear();//删除内存里的session信息
		Yii::app()->session->destroy();//删除服务器的session文件
		$this->redirect('./index.php');
	}
	
	/**
	 * 实现用户注册功能
	 * 1. 展现注册表单
	 * 2. 收集数据，校验数据，存储数据
	 */
	public function actionRegister(){
		//$goods_model = new Goods(); 这种实例化模型对象方式，调用save方法会insert
		//$goods_model = Goods::model(); 这种实例化模型对象方式，调用save方法会update
// 		$user_model = User::model();
		$user_model = new User();
		
		$sex = array(1=>'男',2=>'女',3=>'保密');
		$xueli = array(1=>'-请选择-',2=>'小学',3=>'初中',4=>'高中',5=>'大学');
		$hobby = array(1=>'篮球',2=>'足球',3=>'排球',4=>'棒球');
		
		if(isset($_POST['User'])){
			
// 			//收集爱好信息implode
// 			$_POST['User']['user_hobby'] = implode(',',$_POST['User']['user_hobby']);
			
			//密码要md5加密
			$_POST['User']['password'] = md5($_POST['User']['password']);
			
			//给模型收集表单信息
// 			foreach ($_POST['User'] as $k=>$v){
// 				$user_model -> $k=$v;
// 			}
			//上面收集表单信息方法有优化，如下
			$user_model->attributes = $_POST['User'];
			
			
			//实现信息存储
			if($user_model->save()){
				$this->redirect('./index.php');
			}
		}
		
		
		
		$this->render('register',array('user_model'=>$user_model,'sex'=>$sex,'xueli'=>$xueli,'hobby'=>$hobby));
	
	}
}
