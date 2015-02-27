<?php

/**
 * This is the model class for table "tbOperator".
 *
 * The followings are the available columns in table 'tbOperator':
 * @property integer $id
 * @property integer $fdPartnerID
 * @property integer $fdProviderID
 * @property string $fdLogin
 * @property string $fdPassword
 * @property string $fdName
 * @property string $fdPhone
 * @property string $fdEmail
 * @property integer $fdDisabled
 * @property string $fdCreate
 */
class SvcOperator extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcOperator the static model class
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
		return 'tbOperator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdPartnerID, fdProviderID, fdDisabled', 'numerical', 'integerOnly'=>true),
			array('fdLogin, fdName', 'length', 'max'=>32),
			array('fdPassword', 'length', 'max'=>77),
			array('fdPhone', 'length', 'max'=>16),
			array('fdEmail', 'length', 'max'=>64),
			array('fdCreate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdPartnerID, fdProviderID, fdLogin, fdPassword, fdName, fdPhone, fdEmail, fdDisabled, fdCreate', 'safe', 'on'=>'search'),
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
		    'svc_member'=>array(self::HAS_MANY, 'SvcMember', 'fdOperatorID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fdPartnerID' => 'Fd Partner',
			'fdProviderID' => 'Fd Provider',
			'fdLogin' => 'Fd Login',
			'fdPassword' => 'Fd Password',
			'fdName' => 'Fd Name',
			'fdPhone' => 'Fd Phone',
			'fdEmail' => 'Fd Email',
			'fdDisabled' => 'Fd Disabled',
			'fdCreate' => 'Fd Create',
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
		$criteria->compare('fdPartnerID',$this->fdPartnerID);
		$criteria->compare('fdProviderID',$this->fdProviderID);
		$criteria->compare('fdLogin',$this->fdLogin,true);
		$criteria->compare('fdPassword',$this->fdPassword,true);
		$criteria->compare('fdName',$this->fdName,true);
		$criteria->compare('fdPhone',$this->fdPhone,true);
		$criteria->compare('fdEmail',$this->fdEmail,true);
		$criteria->compare('fdDisabled',$this->fdDisabled);
		$criteria->compare('fdCreate',$this->fdCreate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}