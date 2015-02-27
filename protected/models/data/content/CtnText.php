<?php

/**
 * This is the model class for table "tbText".
 *
 * The followings are the available columns in table 'tbText':
 * @property integer $fdContentID
 * @property integer $fdFileID
 * @property integer $fdAttributeID
 * @property integer $fdSourceID
 * @property string $fdValue
 * @property integer $id
 */
class CtnText extends ContentActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CtnText the static model class
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
		return Yii::app()->params['db_ctn'] .  '.tbText';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdContentID, fdFileID, fdAttributeID, fdSourceID', 'numerical', 'integerOnly'=>true),
			array('fdValue', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fdContentID, fdFileID, fdAttributeID, fdSourceID, fdValue, id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
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
		$criteria->compare('fdValue',$this->fdValue,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}