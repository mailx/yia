<?php

/**
 * This is the model class for table "tbProvider".
 *
 * The followings are the available columns in table 'tbProvider':
 * @property integer $id
 * @property string $fdName
 * @property string $fdEnglish
 * @property string $fdContact
 * @property string $fdPhone
 * @property string $fdEmail
 * @property integer $fdColumnID
 * @property integer $fdPublic
 * @property integer $fdIcon
 * @property string $fdWebsite
 */
class CtnProvider extends ContentActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CtnProvider the static model class
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
		return 'tbProvider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdColumnID, fdPublic, fdIcon', 'numerical', 'integerOnly'=>true),
			array('fdName, fdEnglish, fdEmail', 'length', 'max'=>64),
			array('fdContact', 'length', 'max'=>32),
			array('fdPhone', 'length', 'max'=>16),
			array('fdWebsite', 'length', 'max'=>192),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdName, fdEnglish, fdContact, fdPhone, fdEmail, fdColumnID, fdPublic, fdIcon, fdWebsite', 'safe', 'on'=>'search'),
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
			'fdEnglish' => 'Fd English',
			'fdContact' => 'Fd Contact',
			'fdPhone' => 'Fd Phone',
			'fdEmail' => 'Fd Email',
			'fdColumnID' => 'Fd Column',
			'fdPublic' => 'Fd Public',
			'fdIcon' => 'Fd Icon',
			'fdWebsite' => 'Fd Website',
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
		$criteria->compare('fdEnglish',$this->fdEnglish,true);
		$criteria->compare('fdContact',$this->fdContact,true);
		$criteria->compare('fdPhone',$this->fdPhone,true);
		$criteria->compare('fdEmail',$this->fdEmail,true);
		$criteria->compare('fdColumnID',$this->fdColumnID);
		$criteria->compare('fdPublic',$this->fdPublic);
		$criteria->compare('fdIcon',$this->fdIcon);
		$criteria->compare('fdWebsite',$this->fdWebsite,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}