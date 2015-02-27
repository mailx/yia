<?php

/**
 * This is the model class for table "tbSubscribe".
 *
 * The followings are the available columns in table 'tbSubscribe':
 * @property integer $id
 * @property integer $fdApplicationID
 * @property integer $fdColumnID
 * @property integer $fdServiceID
 * @property integer $fdTerminalID
 * @property integer $fdFriendID
 * @property integer $fdContentID
 * @property integer $fdPending
 * @property integer $fdAuto
 * @property string $fdCreate
 * @property string $fdExpired
 * @property integer $fdUserID
 */
class SvcSubscribe extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcSubscribe the static model class
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
		return 'tbSubscribe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdUserID', 'required'),
			array('fdApplicationID, fdColumnID, fdServiceID, fdTerminalID, fdFriendID, fdContentID, fdPending, fdAuto, fdUserID', 'numerical', 'integerOnly'=>true),
			array('fdCreate, fdExpired', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdApplicationID, fdColumnID, fdServiceID, fdTerminalID, fdFriendID, fdContentID, fdPending, fdAuto, fdCreate, fdExpired, fdUserID', 'safe', 'on'=>'search'),
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
			'fdApplicationID' => 'Fd Application',
			'fdColumnID' => 'Fd Column',
			'fdServiceID' => 'Fd Service',
			'fdTerminalID' => 'Fd Terminal',
			'fdFriendID' => 'Fd Friend',
			'fdContentID' => 'Fd Content',
			'fdPending' => 'Fd Pending',
			'fdAuto' => 'Fd Auto',
			'fdCreate' => 'Fd Create',
			'fdExpired' => 'Fd Expired',
			'fdUserID' => 'Fd User',
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
		$criteria->compare('fdApplicationID',$this->fdApplicationID);
		$criteria->compare('fdColumnID',$this->fdColumnID);
		$criteria->compare('fdServiceID',$this->fdServiceID);
		$criteria->compare('fdTerminalID',$this->fdTerminalID);
		$criteria->compare('fdFriendID',$this->fdFriendID);
		$criteria->compare('fdContentID',$this->fdContentID);
		$criteria->compare('fdPending',$this->fdPending);
		$criteria->compare('fdAuto',$this->fdAuto);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdExpired',$this->fdExpired,true);
		$criteria->compare('fdUserID',$this->fdUserID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}