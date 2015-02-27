<?php

/**
 * This is the model class for table "tbComment".
 *
 * The followings are the available columns in table 'tbComment':
 * @property integer $id
 * @property integer $fdParentID
 * @property integer $fdUserID
 * @property integer $fdTerminalID
 * @property integer $fdContentID
 * @property integer $fdFileID
 * @property integer $fdTimestop
 * @property string $fdText
 * @property string $fdCreate
 * @property integer $fdApproverID
 * @property string $fdApprove
 * @property integer $fdType
 * @property string $fdTitle
 */
class SvcComment extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcComment the static model class
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
		return 'tbComment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdParentID, fdUserID, fdTerminalID, fdType', 'required'),
			array('fdParentID, fdUserID, fdTerminalID, fdContentID, fdFileID, fdTimestop, fdApproverID, fdType', 'numerical', 'integerOnly'=>true),
			array('fdTitle', 'length', 'max'=>64),
			array('fdText, fdCreate, fdApprove', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdParentID, fdUserID, fdTerminalID, fdContentID, fdFileID, fdTimestop, fdText, fdCreate, fdApproverID, fdApprove, fdType, fdTitle', 'safe', 'on'=>'search'),
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
			'fdParentID' => 'Fd Parent',
			'fdUserID' => 'Fd User',
			'fdTerminalID' => 'Fd Terminal',
			'fdContentID' => 'Fd Content',
			'fdFileID' => 'Fd File',
			'fdTimestop' => 'Fd Timestop',
			'fdText' => 'Fd Text',
			'fdCreate' => 'Fd Create',
			'fdApproverID' => 'Fd Approver',
			'fdApprove' => 'Fd Approve',
			'fdType' => 'Fd Type',
			'fdTitle' => 'Fd Title',
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
		$criteria->compare('fdParentID',$this->fdParentID);
		$criteria->compare('fdUserID',$this->fdUserID);
		$criteria->compare('fdTerminalID',$this->fdTerminalID);
		$criteria->compare('fdContentID',$this->fdContentID);
		$criteria->compare('fdFileID',$this->fdFileID);
		$criteria->compare('fdTimestop',$this->fdTimestop);
		$criteria->compare('fdText',$this->fdText,true);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdApproverID',$this->fdApproverID);
		$criteria->compare('fdApprove',$this->fdApprove,true);
		$criteria->compare('fdType',$this->fdType);
		$criteria->compare('fdTitle',$this->fdTitle,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}