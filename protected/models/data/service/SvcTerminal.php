<?php

/**
 * This is the model class for table "tbTerminal".
 *
 * The followings are the available columns in table 'tbTerminal':
 * @property integer $id
 * @property integer $fdObjectID
 * @property integer $fdClassID
 * @property integer $fdTypeID
 * @property string $fdMAC
 * @property string $fdAccount
 * @property string $fdPassword
 * @property integer $fdPoints
 * @property string $fdVersion
 * @property integer $fdStorageSize
 * @property integer $fdStorageFree
 * @property string $fdConfig
 * @property string $fdActivate
 * @property string $fdActive
 * @property string $fdPhone
 * @property string $fdEmail
 * @property string $fdName
 * @property string $fdAddress
 * @property integer $fdPortrait
 * @property integer $fdPrivate
 * @property string $fdCreate
 * @property string $fdSession
 * @property string $fdExpired
 * @property integer $fdTroopID
 * @property integer $fdSnapshot
 * @property integer $fdLog
 * @property integer $fdShutdown
 * @property integer $fdVolume
 * @property integer $fdUpgrade
 * @property integer $fdCleanup
 * @property string $fdSecret
 * @property string $fdStartTime
 * @property string $fdStopTime
 * @property string $fdUser
 * @property integer $fdUserID
 * @property string $fdUA
 * @property integer $fdContentID
 * @property string $fdToken
 */
class SvcTerminal extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcTerminal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbTerminal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdTypeID, fdMAC, fdPoints, fdPrivate, fdCreate, fdCleanup', 'required'),
			array('fdObjectID, fdClassID, fdTypeID, fdPoints, fdStorageSize, fdStorageFree, fdPortrait, fdPrivate, fdTroopID, fdSnapshot, fdLog, fdShutdown, fdVolume, fdUpgrade, fdCleanup, fdUserID, fdContentID', 'numerical', 'integerOnly'=>true),
			array('fdMAC, fdToken', 'length', 'max'=>32),
			array('fdAccount, fdVersion, fdEmail, fdName, fdSession', 'length', 'max'=>64),
			array('fdPassword, fdSecret', 'length', 'max'=>77),
			array('fdPhone, fdUser', 'length', 'max'=>16),
			array('fdAddress', 'length', 'max'=>128),
			array('fdUA', 'length', 'max'=>192),
			array('fdConfig, fdActivate, fdActive, fdExpired, fdStartTime, fdStopTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdObjectID, fdClassID, fdTypeID, fdMAC, fdAccount, fdPassword, fdPoints, fdVersion, fdStorageSize, fdStorageFree, fdConfig, fdActivate, fdActive, fdPhone, fdEmail, fdName, fdAddress, fdPortrait, fdPrivate, fdCreate, fdSession, fdExpired, fdTroopID, fdSnapshot, fdLog, fdShutdown, fdVolume, fdUpgrade, fdCleanup, fdSecret, fdStartTime, fdStopTime, fdUser, fdUserID, fdUA, fdContentID, fdToken', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fdObjectID' => 'Fd Object',
			'fdClassID' => 'Fd Class',
			'fdTypeID' => 'Fd Type',
			'fdMAC' => 'Fd Mac',
			'fdAccount' => 'Fd Account',
			'fdPassword' => 'Fd Password',
			'fdPoints' => 'Fd Points',
			'fdVersion' => 'Fd Version',
			'fdStorageSize' => 'Fd Storage Size',
			'fdStorageFree' => 'Fd Storage Free',
			'fdConfig' => 'Fd Config',
			'fdActivate' => 'Fd Activate',
			'fdActive' => 'Fd Active',
			'fdPhone' => 'Fd Phone',
			'fdEmail' => 'Fd Email',
			'fdName' => 'Fd Name',
			'fdAddress' => 'Fd Address',
			'fdPortrait' => 'Fd Portrait',
			'fdPrivate' => 'Fd Private',
			'fdCreate' => 'Fd Create',
			'fdSession' => 'Fd Session',
			'fdExpired' => 'Fd Expired',
			'fdTroopID' => 'Fd Troop',
			'fdSnapshot' => 'Fd Snapshot',
			'fdLog' => 'Fd Log',
			'fdShutdown' => 'Fd Shutdown',
			'fdVolume' => 'Fd Volume',
			'fdUpgrade' => 'Fd Upgrade',
			'fdCleanup' => 'Fd Cleanup',
			'fdSecret' => 'Fd Secret',
			'fdStartTime' => 'Fd Start Time',
			'fdStopTime' => 'Fd Stop Time',
			'fdUser' => 'Fd User',
			'fdUserID' => 'Fd User',
			'fdUA' => 'Fd Ua',
			'fdContentID' => 'Fd Content',
			'fdToken' => 'Fd Token',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fdObjectID',$this->fdObjectID);
		$criteria->compare('fdClassID',$this->fdClassID);
		$criteria->compare('fdTypeID',$this->fdTypeID);
		$criteria->compare('fdMAC',$this->fdMAC,true);
		$criteria->compare('fdAccount',$this->fdAccount,true);
		$criteria->compare('fdPassword',$this->fdPassword,true);
		$criteria->compare('fdPoints',$this->fdPoints);
		$criteria->compare('fdVersion',$this->fdVersion,true);
		$criteria->compare('fdStorageSize',$this->fdStorageSize);
		$criteria->compare('fdStorageFree',$this->fdStorageFree);
		$criteria->compare('fdConfig',$this->fdConfig,true);
		$criteria->compare('fdActivate',$this->fdActivate,true);
		$criteria->compare('fdActive',$this->fdActive,true);
		$criteria->compare('fdPhone',$this->fdPhone,true);
		$criteria->compare('fdEmail',$this->fdEmail,true);
		$criteria->compare('fdName',$this->fdName,true);
		$criteria->compare('fdAddress',$this->fdAddress,true);
		$criteria->compare('fdPortrait',$this->fdPortrait);
		$criteria->compare('fdPrivate',$this->fdPrivate);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdSession',$this->fdSession,true);
		$criteria->compare('fdExpired',$this->fdExpired,true);
		$criteria->compare('fdTroopID',$this->fdTroopID);
		$criteria->compare('fdSnapshot',$this->fdSnapshot);
		$criteria->compare('fdLog',$this->fdLog);
		$criteria->compare('fdShutdown',$this->fdShutdown);
		$criteria->compare('fdVolume',$this->fdVolume);
		$criteria->compare('fdUpgrade',$this->fdUpgrade);
		$criteria->compare('fdCleanup',$this->fdCleanup);
		$criteria->compare('fdSecret',$this->fdSecret,true);
		$criteria->compare('fdStartTime',$this->fdStartTime,true);
		$criteria->compare('fdStopTime',$this->fdStopTime,true);
		$criteria->compare('fdUser',$this->fdUser,true);
		$criteria->compare('fdUserID',$this->fdUserID);
		$criteria->compare('fdUA',$this->fdUA,true);
		$criteria->compare('fdContentID',$this->fdContentID);
		$criteria->compare('fdToken',$this->fdToken,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}