<?php

/**
 * This is the model class for table "tbEmail".
 *
 * The followings are the available columns in table 'tbEmail':
 * @property integer $fdUserID
 * @property string $fdEmail
 * @property string $fdCode
 * @property string $fdSent
 * @property string $fdVerified
 */
class SvcEmail extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcEmail the static model class
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
		return 'tbEmail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdUserID', 'numerical', 'integerOnly'=>true),
			array('fdEmail', 'length', 'max'=>64),
			array('fdCode', 'length', 'max'=>8),
			array('fdSent, fdVerified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fdUserID, fdEmail, fdCode, fdSent, fdVerified', 'safe', 'on'=>'search'),
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
			'fdUserID' => 'Fd User',
			'fdEmail' => 'Fd Email',
			'fdCode' => 'Fd Code',
			'fdSent' => 'Fd Sent',
			'fdVerified' => 'Fd Verified',
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

		$criteria->compare('fdUserID',$this->fdUserID);
		$criteria->compare('fdEmail',$this->fdEmail,true);
		$criteria->compare('fdCode',$this->fdCode,true);
		$criteria->compare('fdSent',$this->fdSent,true);
		$criteria->compare('fdVerified',$this->fdVerified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}