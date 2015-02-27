<?php
/**
 * 商品模型
 * 模型里有两个关键方法，缺一不可
 * model() 创建一个模型的对象，是静态方法
 * tableName() 返回当前数据表的名字
 */
class Goods extends CActiveRecord{
	
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return '{{goods}}';
	}
	
	public function attributeLabels(){
		return array(
			'goods_name'=>'商品名称',
			'goods_introduce'=>'商品介绍',	
			'goods_price'=>'商品价格',	
				
				
		);
			
		
	}
	
}