<?php
header("Content-type:text/html;charset=utf-8");
/**
 * 后台商品显示控制器
 */
class GoodsController extends Controller{
	/**
	 * 商品展示
	 */
	public function actionShow(){
		//产生goods模型对象
		$goods_model = Goods::model();
		
// 		//查询一条记录
// 		$goods_info = $goods_model->find();
// 		echo $goods_info->goods_introduce;
		
		//查询全部记录
		$goods_info = $goods_model->findAll();

// 		//通过sql语句查询记录
// 		$sql = "select * from {{goods}} limit 3";
// 		$goods_info = $goods_model->findAllBySql($sql);
		
// 		echo "<pre>";
// 		var_dump($goods_info);
// 		echo "</pre>";
		
		//通过renderPartial('视图名字',array('名字'=>值，'名字'=>值));
		//例子renderPartial('show',array('goods_info'=>$goods_info));
		
		$this->renderPartial('show',array('goods_info'=>$goods_info));
	}
	
	/**
	 * 添加商品
	 */
	public function actionAdd(){
		//$goods_model = new Goods(); 这种实例化模型对象方式，调用save方法会insert
		//$goods_model = Goods::model(); 这种实例化模型对象方式，调用save方法会update
		$goods_model = new Goods();
		
		$this->renderPartial('add',array('goods_model'=>$goods_model));
	}
	
	/**
	 * 修改商品
	 */
	public function actionUpdate(){
		//$goods_model = new Goods(); 这种实例化模型对象方式，调用save方法会insert
		//$goods_model = Goods::model(); 这种实例化模型对象方式，调用save方法会update
		echo $_GET['id'];
		
		$goods_model = Goods::model();
	
		//通过id主键查询
		$goods_info = $goods_model->findByPk($_GET['id']);
		
//  		var_dump($goods_info);
 		
		$this->renderPartial('update',array('goods_info'=>$goods_info));
	}
	
	/**
	 * 测试方法 
	 */
	public function actionAddTest(){
		//$goods_model = new Goods(); 这种实例化模型对象方式，调用save方法会insert
		//$goods_model = Goods::model(); 这种实例化模型对象方式，调用save方法会update
		$goods_model = new Goods();
		
		$goods_model->goods_name = 'Apple 5s';
		$goods_model->goods_price = 4999;
		$goods_model->goods_weight = 100;
		
		if($goods_model->save()){
			echo "yes";
		}else {
			echo "no";
		}
	}
	
	
}