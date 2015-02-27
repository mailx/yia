<?php
class User extends CActiveRecord{

	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return '{{user}}';
	}

	public function attributeLabels(){
		return array(
				'username'=>'用户名',
				'password'=>'密码',
				'confirmPwd'=>'密码确认',
				'user_email'=>'邮箱',
				'user_qq'=>'qq号码',
				'user_tel'=>'手机',
				'user_sex'=>'性别',
				'user_xueli'=>'学历',
				'user_hobby'=>'爱好',
				'user_introduce'=>'简介',
		);
	}
	
	/**
	 * 实现用户注册表单验证
	 * 在模型里边设置一个方法，定义具体表单域验证规则
	 */
	public function rules(){
		return array(
			array('username','required','message'=>'用户名必填'),	
			array('password','required','message'=>'密码必填'),	
			array('user_email','email','allowEmpty'=>false,'message'=>'邮箱格式不正确'),
			//qq格式5-12位，开头非0	
			array('user_qq','match','pattern'=>'/\d[5,12]/','message'=>'qq格式不正确'),	
			//验证手机号码，13开始，一共11位
			array('user_tel','match','pattern'=>'/13\d[9]/','message'=>'手机号码格式不正确'),
			//验证学历，信息在2、3、4、5之间，则表示有选择
			array('user_xueli','in','range'=>array(2,3,4,5),'message'=>'学历必须选择'),
		
				
		);
	}

}