<?php
/**
 * CWebModule class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

class BaseWebModule extends CWebModule
{
	protected $_assetsUrl;  
	protected $_assetUrlAlias;
  
    public function getAssetsUrl()  
    {  
        if($this->_assetsUrl===null)  
            $this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias($this->_assetUrlAlias));  
        return $this->_assetsUrl;  
    }  
  
    public function setAssetsUrl($value)  
    {  
        $this->_assetsUrl=$value;  
    }
    
    public function registerCss($file, $media='all')
    {
        $href = $this->getAssetsUrl().'/css/'.$file;
        return '<link rel="stylesheet" type="text/css" href="'.$href.'" media="'.$media.'" />'."\n";
    }
    
    public function registerJs($file, $media='all')
    {
        $href = $this->getAssetsUrl().'/js/'.$file;
        return '<script src="'.$href.'"></script>';
    }
    
    public function registerImage($file)
    {
        return $this->getAssetsUrl().'/images/'.$file;
    }
}
