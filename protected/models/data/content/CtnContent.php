<?php

/**
 * This is the model class for table "tbContent".
 *
 * The followings are the available columns in table 'tbContent':
 * @property integer $id
 * @property string $fdName
 * @property string $fdEnglish
 * @property integer $fdTypeID
 * @property integer $fdKindID
 * @property string $fdAcronym
 * @property string $fdPinyin
 * @property integer $fdProviderID
 * @property integer $fdCpID
 * @property integer $fdOperatorID
 * @property integer $fdApproverID
 * @property string $fdApprove
 * @property string $fdCreate
 * @property string $fdExpire
 * @property string $fdModify
 * @property integer $fdAdapt
 * @property integer $fdHot
 * @property integer $fdBornID
 * @property string $fdSync
 */
class CtnContent extends ContentActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CtnContent the static model class
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
		return 'tbContent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdOperatorID, fdApproverID', 'required'),
			array('fdTypeID, fdKindID, fdProviderID, fdCpID, fdOperatorID, fdApproverID, fdAdapt, fdHot, fdBornID', 'numerical', 'integerOnly'=>true),
			array('fdName, fdEnglish', 'length', 'max'=>255),
			array('fdAcronym', 'length', 'max'=>32),
			array('fdPinyin', 'length', 'max'=>64),
			array('fdApprove, fdCreate, fdExpire, fdModify, fdSync', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdName, fdEnglish, fdTypeID, fdKindID, fdAcronym, fdPinyin, fdProviderID, fdCpID, fdOperatorID, fdApproverID, fdApprove, fdCreate, fdExpire, fdModify, fdAdapt, fdHot, fdBornID, fdSync', 'safe', 'on'=>'search'),
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
			'fdTypeID' => 'Fd Type',
			'fdKindID' => 'Fd Kind',
			'fdAcronym' => 'Fd Acronym',
			'fdPinyin' => 'Fd Pinyin',
			'fdProviderID' => 'Fd Provider',
			'fdCpID' => 'Fd Cp',
			'fdOperatorID' => 'Fd Operator',
			'fdApproverID' => 'Fd Approver',
			'fdApprove' => 'Fd Approve',
			'fdCreate' => 'Fd Create',
			'fdExpire' => 'Fd Expire',
			'fdModify' => 'Fd Modify',
			'fdAdapt' => 'Fd Adapt',
			'fdHot' => 'Fd Hot',
			'fdBornID' => 'Fd Born',
			'fdSync' => 'Fd Sync',
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
		$criteria->compare('fdTypeID',$this->fdTypeID);
		$criteria->compare('fdKindID',$this->fdKindID);
		$criteria->compare('fdAcronym',$this->fdAcronym,true);
		$criteria->compare('fdPinyin',$this->fdPinyin,true);
		$criteria->compare('fdProviderID',$this->fdProviderID);
		$criteria->compare('fdCpID',$this->fdCpID);
		$criteria->compare('fdOperatorID',$this->fdOperatorID);
		$criteria->compare('fdApproverID',$this->fdApproverID);
		$criteria->compare('fdApprove',$this->fdApprove,true);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdExpire',$this->fdExpire,true);
		$criteria->compare('fdModify',$this->fdModify,true);
		$criteria->compare('fdAdapt',$this->fdAdapt);
		$criteria->compare('fdHot',$this->fdHot);
		$criteria->compare('fdBornID',$this->fdBornID);
		$criteria->compare('fdSync',$this->fdSync,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}