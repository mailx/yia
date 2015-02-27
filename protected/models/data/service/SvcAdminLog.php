<?php

/**
 * This is the model class for table "tbAdminLog".
 *
 * The followings are the available columns in table 'tbAdminLog':
 * @property integer $id
 * @property integer $fdOperatorID
 * @property string $fdAction
 * @property string $fdTarget
 * @property string $fdTime
 */
class SvcAdminLog extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcAdminLog the static model class
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
		return 'tbAdminLog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdOperatorID, fdAction, fdTime', 'required'),
			array('fdOperatorID', 'numerical', 'integerOnly'=>true),
			array('fdAction', 'length', 'max'=>64),
			array('fdTarget', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdOperatorID, fdAction, fdTarget, fdTime', 'safe', 'on'=>'search'),
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
			'fdOperatorID' => 'Fd Operator',
			'fdAction' => 'Fd Action',
			'fdTarget' => 'Fd Target',
			'fdTime' => 'Fd Time',
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
		$criteria->compare('fdOperatorID',$this->fdOperatorID);
		$criteria->compare('fdAction',$this->fdAction,true);
		$criteria->compare('fdTarget',$this->fdTarget,true);
		$criteria->compare('fdTime',$this->fdTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}