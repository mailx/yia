<?php
class ServiceActiveRecord extends CActiveRecord {

    private static $dbService = null;
 
    protected static function getServiceDbConnection()
    {
        if (self::$dbService !== null)
            return self::$dbService;
        else
        {
            self::$dbService = Yii::app()->svc_db;
            if (self::$dbService instanceof CDbConnection)
            {
                self::$dbService->setActive(true);
                return self::$dbService;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "dbService" CDbConnection application component.'));
        }
    }
	
	public function getDbConnection()
    {
        return self::getServiceDbConnection();
    }
}
?>