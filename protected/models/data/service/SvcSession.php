<?php

/**
 * This is the model class for table "tbSession".
 *
 * The followings are the available columns in table 'tbSession':
 * @property integer $fdTerminalID
 * @property integer $fdApplicationID
 * @property string $fdSession
 * @property string $fdActive
 * @property string $fdCreate
 * @property integer $fdUserID
 */
class SvcSession extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcSession the static model class
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
		return 'tbSession';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdTerminalID, fdUserID', 'required'),
			array('fdTerminalID, fdApplicationID, fdUserID', 'numerical', 'integerOnly'=>true),
			array('fdSession', 'length', 'max'=>64),
			array('fdActive, fdCreate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fdTerminalID, fdApplicationID, fdSession, fdActive, fdCreate, fdUserID', 'safe', 'on'=>'search'),
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
			'fdTerminalID' => 'Fd Terminal',
			'fdApplicationID' => 'Fd Application',
			'fdSession' => 'Fd Session',
			'fdActive' => 'Fd Active',
			'fdCreate' => 'Fd Create',
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

		$criteria->compare('fdTerminalID',$this->fdTerminalID);
		$criteria->compare('fdApplicationID',$this->fdApplicationID);
		$criteria->compare('fdSession',$this->fdSession,true);
		$criteria->compare('fdActive',$this->fdActive,true);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdUserID',$this->fdUserID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}