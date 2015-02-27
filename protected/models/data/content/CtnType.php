<?php

/**
 * This is the model class for table "tbType".
 *
 * The followings are the available columns in table 'tbType':
 * @property integer $id
 * @property string $fdName
 * @property string $fdEnglish
 * @property integer $fdSound
 */
class CtnType extends ContentActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CtnType the static model class
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
		return 'tbType';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdSound', 'required'),
			array('fdSound', 'numerical', 'integerOnly'=>true),
			array('fdName, fdEnglish', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdName, fdEnglish, fdSound', 'safe', 'on'=>'search'),
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
			'fdSound' => 'Fd Sound',
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
		$criteria->compare('fdSound',$this->fdSound);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}