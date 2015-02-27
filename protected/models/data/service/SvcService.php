<?php

/**
 * This is the model class for table "tbService".
 *
 * The followings are the available columns in table 'tbService':
 * @property integer $id
 * @property integer $fdApplicationID
 * @property string $fdName
 * @property integer $fdType
 * @property integer $fdPrice
 */
class SvcService extends SceneryActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcService the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->dbService;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbService';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdApplicationID, fdType, fdPrice', 'numerical', 'integerOnly'=>true),
			array('fdName', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdApplicationID, fdName, fdType, fdPrice', 'safe', 'on'=>'search'),
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
			'fdName' => 'Fd Name',
			'fdType' => 'Fd Type',
			'fdPrice' => 'Fd Price',
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
		$criteria->compare('fdName',$this->fdName,true);
		$criteria->compare('fdType',$this->fdType);
		$criteria->compare('fdPrice',$this->fdPrice);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}