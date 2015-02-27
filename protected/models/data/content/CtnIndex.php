<?php

/**
 * This is the model class for table "tbIndex".
 *
 * The followings are the available columns in table 'tbIndex':
 * @property integer $fdContentID
 * @property integer $fdFileID
 * @property integer $fdColumnID
 * @property integer $fdOrder
 * @property integer $fdDefault
 */
class CtnIndex extends ContentActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CtnIndex the static model class
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
		return 'tbIndex';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdContentID, fdColumnID', 'required'),
			array('fdContentID, fdFileID, fdColumnID, fdOrder, fdDefault', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fdContentID, fdFileID, fdColumnID, fdOrder, fdDefault', 'safe', 'on'=>'search'),
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
		    "column" => array(self::HAS_ONE, 'CtnColumn', array("id" => "fdColumnID")),
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
			'fdColumnID' => 'Fd Column',
			'fdOrder' => 'Fd Order',
			'fdDefault' => 'Fd Default',
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
		$criteria->compare('fdColumnID',$this->fdColumnID);
		$criteria->compare('fdOrder',$this->fdOrder);
		$criteria->compare('fdDefault',$this->fdDefault);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}