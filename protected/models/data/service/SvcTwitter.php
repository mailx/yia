<?php

/**
 * This is the model class for table "tbTwitter".
 *
 * The followings are the available columns in table 'tbTwitter':
 * @property integer $fdUserID
 * @property integer $fdTwitterID
 * @property string $fdLogin
 * @property string $fdName
 * @property string $fdToken
 * @property string $fdOpenID
 * @property string $fdOpenKey
 * @property string $fdUID
 * @property string $fdExpire
 */
class SvcTwitter extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcTwitter the static model class
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
		return 'tbTwitter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdUserID, fdTwitterID, fdLogin', 'required'),
			array('fdUserID, fdTwitterID', 'numerical', 'integerOnly'=>true),
			array('fdLogin, fdName, fdToken, fdOpenID, fdOpenKey', 'length', 'max'=>64),
			array('fdUID', 'length', 'max'=>32),
			array('fdExpire', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fdUserID, fdTwitterID, fdLogin, fdName, fdToken, fdOpenID, fdOpenKey, fdUID, fdExpire', 'safe', 'on'=>'search'),
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
			'fdTwitterID' => 'Fd Twitter',
			'fdLogin' => 'Fd Login',
			'fdName' => 'Fd Name',
			'fdToken' => 'Fd Token',
			'fdOpenID' => 'Fd Open',
			'fdOpenKey' => 'Fd Open Key',
			'fdUID' => 'Fd Uid',
			'fdExpire' => 'Fd Expire',
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
		$criteria->compare('fdTwitterID',$this->fdTwitterID);
		$criteria->compare('fdLogin',$this->fdLogin,true);
		$criteria->compare('fdName',$this->fdName,true);
		$criteria->compare('fdToken',$this->fdToken,true);
		$criteria->compare('fdOpenID',$this->fdOpenID,true);
		$criteria->compare('fdOpenKey',$this->fdOpenKey,true);
		$criteria->compare('fdUID',$this->fdUID,true);
		$criteria->compare('fdExpire',$this->fdExpire,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}