<?php
class OaiActiveRecord extends CActiveRecord {

    private static $dbOai = null;
 
    protected static function getContentDbConnection()
    {
        if (self::$dbOai !== null)
            return self::$dbOai;
        else
        {
            self::$dbOai = Yii::app()->oai_db;
            if (self::$dbOai instanceof CDbConnection)
            {
                self::$dbOai->setActive(true);
                return self::$dbOai;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "dbOai" CDbConnection application component.'));
        }
    }
	
	public function getDbConnection()
    {
        return self::getContentDbConnection();
    }
}
?>