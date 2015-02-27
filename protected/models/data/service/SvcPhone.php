<?php

/**
 * This is the model class for table "tbPhone".
 *
 * The followings are the available columns in table 'tbPhone':
 * @property integer $fdUserID
 * @property string $fdPhone
 * @property string $fdCode
 * @property string $fdSent
 * @property string $fdVerified
 * @property integer $fdDefault
 */
class SvcPhone extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcPhone the static model class
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
		return 'tbPhone';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdDefault', 'required'),
			array('fdUserID, fdDefault', 'numerical', 'integerOnly'=>true),
			array('fdPhone', 'length', 'max'=>32),
			array('fdCode', 'length', 'max'=>8),
			array('fdSent, fdVerified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fdUserID, fdPhone, fdCode, fdSent, fdVerified, fdDefault', 'safe', 'on'=>'search'),
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
			'fdPhone' => 'Fd Phone',
			'fdCode' => 'Fd Code',
			'fdSent' => 'Fd Sent',
			'fdVerified' => 'Fd Verified',
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

		$criteria->compare('fdUserID',$this->fdUserID);
		$criteria->compare('fdPhone',$this->fdPhone,true);
		$criteria->compare('fdCode',$this->fdCode,true);
		$criteria->compare('fdSent',$this->fdSent,true);
		$criteria->compare('fdVerified',$this->fdVerified,true);
		$criteria->compare('fdDefault',$this->fdDefault);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}