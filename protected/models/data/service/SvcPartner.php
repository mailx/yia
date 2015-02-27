<?php

/**
 * This is the model class for table "tbPartner".
 *
 * The followings are the available columns in table 'tbPartner':
 * @property integer $id
 * @property string $fdName
 * @property string $fdContact
 * @property string $fdPhone
 * @property string $fdEmail
 * @property string $fdLogin
 * @property string $fdSecret
 * @property string $fdIP
 * @property string $fdSession
 * @property string $fdActive
 * @property integer $fdTraffic
 * @property integer $fdType
 * @property string $fdAddress
 */
class SvcPartner extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcPartner the static model class
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
		return Yii::app()->params['oai_db'].'.tbPartner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdActive, fdTraffic', 'required'),
			array('fdTraffic, fdType', 'numerical', 'integerOnly'=>true),
			array('fdName, fdContact, fdLogin', 'length', 'max'=>32),
			array('fdPhone', 'length', 'max'=>16),
			array('fdEmail, fdSecret, fdIP, fdSession', 'length', 'max'=>64),
			array('fdAddress', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdName, fdContact, fdPhone, fdEmail, fdLogin, fdSecret, fdIP, fdSession, fdActive, fdTraffic, fdType, fdAddress', 'safe', 'on'=>'search'),
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
			'fdName' => 'Fd Name',
			'fdContact' => 'Fd Contact',
			'fdPhone' => 'Fd Phone',
			'fdEmail' => 'Fd Email',
			'fdLogin' => 'Fd Login',
			'fdSecret' => 'Fd Secret',
			'fdIP' => 'Fd Ip',
			'fdSession' => 'Fd Session',
			'fdActive' => 'Fd Active',
			'fdTraffic' => 'Fd Traffic',
			'fdType' => 'Fd Type',
			'fdAddress' => 'Fd Address',
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
		$criteria->compare('fdName',$this->fdName,true);
		$criteria->compare('fdContact',$this->fdContact,true);
		$criteria->compare('fdPhone',$this->fdPhone,true);
		$criteria->compare('fdEmail',$this->fdEmail,true);
		$criteria->compare('fdLogin',$this->fdLogin,true);
		$criteria->compare('fdSecret',$this->fdSecret,true);
		$criteria->compare('fdIP',$this->fdIP,true);
		$criteria->compare('fdSession',$this->fdSession,true);
		$criteria->compare('fdActive',$this->fdActive,true);
		$criteria->compare('fdTraffic',$this->fdTraffic);
		$criteria->compare('fdType',$this->fdType);
		$criteria->compare('fdAddress',$this->fdAddress,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}