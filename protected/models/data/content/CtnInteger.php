<?php

/**
 * This is the model class for table "tbInteger".
 *
 * The followings are the available columns in table 'tbInteger':
 * @property integer $fdContentID
 * @property integer $fdFileID
 * @property integer $fdAttributeID
 * @property integer $fdSourceID
 * @property integer $fdValue
 */
class CtnInteger extends ContentActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CtnInteger the static model class
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
		return 'tbInteger';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdContentID, fdFileID, fdAttributeID, fdSourceID, fdValue', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fdContentID, fdFileID, fdAttributeID, fdSourceID, fdValue', 'safe', 'on'=>'search'),
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
			'fdContentID' => 'Fd Content',
			'fdFileID' => 'Fd File',
			'fdAttributeID' => 'Fd Attribute',
			'fdSourceID' => 'Fd Source',
			'fdValue' => 'Fd Value',
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

		$criteria->compare('fdContentID',$this->fdContentID);
		$criteria->compare('fdFileID',$this->fdFileID);
		$criteria->compare('fdAttributeID',$this->fdAttributeID);
		$criteria->compare('fdSourceID',$this->fdSourceID);
		$criteria->compare('fdValue',$this->fdValue);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}