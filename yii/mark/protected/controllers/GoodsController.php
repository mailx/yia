<?php
/**
 * 商品控制器
 */

class GoodsController extends Controller{
	/*
	 * 商品列表页
	 */
	public function actionCategory(){
		
		$this->render('category');
	}
	/*
	 * 商品详细页
	*/
	public function actionDetail(){
	
		$this->render('detail');
	}
	
}