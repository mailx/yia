<?php
class ContentActiveRecord extends CActiveRecord {

    private static $dbContent = null;
 
    protected static function getContentDbConnection()
    {
        if (self::$dbContent !== null)
            return self::$dbContent;
        else
        {
            self::$dbContent = Yii::app()->ctn_db;
            if (self::$dbContent instanceof CDbConnection)
            {
                self::$dbContent->setActive(true);
                return self::$dbContent;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "dbContent" CDbConnection application component.'));
        }
    }
	
	public function getDbConnection()
    {
        return self::getContentDbConnection();
    }
}
?>