<?php

/**
 * This is the model class for table "tbColumn".
 *
 * The followings are the available columns in table 'tbColumn':
 * @property integer $id
 * @property string $fdName
 * @property string $fdEnglish
 * @property integer $fdParentID
 * @property integer $fdTypeID
 * @property integer $fdProviderID
 * @property integer $fdOrder
 * @property integer $fdFeed
 * @property integer $fdIconID
 * @property string $fdIcon
 * @property integer $fdImageID
 * @property string $fdImage
 * @property integer $fdBornID
 * @property string $fdSync
 * @property integer $fdDisabled
 * @property string $fdDescription
 * @property integer $fdLinkID
 * @property integer $fdVisited
 * @property integer $fdContentID
 * @property string $fdPinyin
 * @property string $fdAcronym
 */
class CtnColumn extends ContentActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CtnColumn the static model class
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
		return 'tbColumn';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdName, fdParentID, fdTypeID, fdOrder, fdFeed, fdDisabled, fdLinkID, fdVisited', 'required'),
			array('fdParentID, fdTypeID, fdProviderID, fdOrder, fdFeed, fdIconID, fdImageID, fdBornID, fdDisabled, fdLinkID, fdVisited, fdContentID', 'numerical', 'integerOnly'=>true),
			array('fdName, fdAcronym', 'length', 'max'=>32),
			array('fdEnglish, fdPinyin', 'length', 'max'=>64),
			array('fdIcon, fdImage', 'length', 'max'=>255),
			array('fdSync, fdDescription', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdName, fdEnglish, fdParentID, fdTypeID, fdProviderID, fdOrder, fdFeed, fdIconID, fdIcon, fdImageID, fdImage, fdBornID, fdSync, fdDisabled, fdDescription, fdLinkID, fdVisited, fdContentID, fdPinyin, fdAcronym', 'safe', 'on'=>'search'),
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
                    "area" => array(self::HAS_ONE, 'CtnColumn', array('id' => 'fdParentID'), 'on' => 'area.fdParentID = 7840'),
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
			'fdParentID' => 'Fd Parent',
			'fdTypeID' => 'Fd Type',
			'fdProviderID' => 'Fd Provider',
			'fdOrder' => 'Fd Order',
			'fdFeed' => 'Fd Feed',
			'fdIconID' => 'Fd Icon',
			'fdIcon' => 'Fd Icon',
			'fdImageID' => 'Fd Image',
			'fdImage' => 'Fd Image',
			'fdBornID' => 'Fd Born',
			'fdSync' => 'Fd Sync',
			'fdDisabled' => 'Fd Disabled',
			'fdDescription' => 'Fd Description',
			'fdLinkID' => 'Fd Link',
			'fdVisited' => 'Fd Visited',
			'fdContentID' => 'Fd Content',
			'fdPinyin' => 'Fd Pinyin',
			'fdAcronym' => 'Fd Acronym',
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
		$criteria->compare('fdParentID',$this->fdParentID);
		$criteria->compare('fdTypeID',$this->fdTypeID);
		$criteria->compare('fdProviderID',$this->fdProviderID);
		$criteria->compare('fdOrder',$this->fdOrder);
		$criteria->compare('fdFeed',$this->fdFeed);
		$criteria->compare('fdIconID',$this->fdIconID);
		$criteria->compare('fdIcon',$this->fdIcon,true);
		$criteria->compare('fdImageID',$this->fdImageID);
		$criteria->compare('fdImage',$this->fdImage,true);
		$criteria->compare('fdBornID',$this->fdBornID);
		$criteria->compare('fdSync',$this->fdSync,true);
		$criteria->compare('fdDisabled',$this->fdDisabled);
		$criteria->compare('fdDescription',$this->fdDescription,true);
		$criteria->compare('fdLinkID',$this->fdLinkID);
		$criteria->compare('fdVisited',$this->fdVisited);
		$criteria->compare('fdContentID',$this->fdContentID);
		$criteria->compare('fdPinyin',$this->fdPinyin,true);
		$criteria->compare('fdAcronym',$this->fdAcronym,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}