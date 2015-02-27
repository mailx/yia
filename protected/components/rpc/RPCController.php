<?php
/**
 * Description of RPCController
 *
 * @author mraz <tonymark0714@gmail.com>
 */
Yii::import('application.components.rpc.RPCAction');
class RPCController extends Controller{
    
    public function accessRules(){
        return array(

        );
    }
    
    public function actions() {
        return array(
            'index' => array('class' => 'RPCAction', 'classMap' => array()),//使用actionIndex来实现自动跳转
        );
    }
    
    
    
    
    
    
    
    
    
}