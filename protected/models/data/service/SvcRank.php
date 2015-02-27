<?php

/**
 * This is the model class for table "tbRank".
 *
 * The followings are the available columns in table 'tbRank':
 * @property integer $id
 * @property integer $fdTerminalID
 * @property integer $fdContentID
 * @property integer $fdFileID
 * @property integer $fdTimestop
 * @property integer $fdShtickID
 * @property integer $fdRank
 * @property string $fdCreate
 * @property integer $fdUserID
 */
class SvcRank extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcRank the static model class
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
		return 'tbRank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdUserID', 'required'),
			array('fdTerminalID, fdContentID, fdFileID, fdTimestop, fdShtickID, fdRank, fdUserID', 'numerical', 'integerOnly'=>true),
			array('fdCreate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdTerminalID, fdContentID, fdFileID, fdTimestop, fdShtickID, fdRank, fdCreate, fdUserID', 'safe', 'on'=>'search'),
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
			'fdTerminalID' => 'Fd Terminal',
			'fdContentID' => 'Fd Content',
			'fdFileID' => 'Fd File',
			'fdTimestop' => 'Fd Timestop',
			'fdShtickID' => 'Fd Shtick',
			'fdRank' => 'Fd Rank',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('fdTerminalID',$this->fdTerminalID);
		$criteria->compare('fdContentID',$this->fdContentID);
		$criteria->compare('fdFileID',$this->fdFileID);
		$criteria->compare('fdTimestop',$this->fdTimestop);
		$criteria->compare('fdShtickID',$this->fdShtickID);
		$criteria->compare('fdRank',$this->fdRank);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdUserID',$this->fdUserID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}