<?php

/**
 * This is the model class for table "tbFile".
 *
 * The followings are the available columns in table 'tbFile':
 * @property integer $id
 * @property integer $fdContentID
 * @property string $fdName
 * @property string $fdEnglish
 * @property integer $fdLanguageID
 * @property integer $fdOrder
 * @property string $fdURL
 * @property string $fdCache
 * @property string $fdSize
 * @property integer $fdVOD
 * @property integer $fdEncrypted
 * @property integer $fdPrice
 * @property integer $fdTypeID
 * @property integer $fdBornID
 * @property string $fdSync
 * @property integer $fdProxyID
 * @property integer $fdLinkID
 * @property string $fdCreate
 * @property string $fdUpdated
 * @property string $fdMD5
 * @property integer $fdSkip
 * @property integer $fdSeconds
 */
class CtnFile extends ContentActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbFile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdUpdated', 'required'),
			array('fdContentID, fdLanguageID, fdOrder, fdVOD, fdEncrypted, fdPrice, fdTypeID, fdBornID, fdProxyID, fdLinkID, fdSkip, fdSeconds', 'numerical', 'integerOnly'=>true),
			array('fdName, fdEnglish, fdURL, fdCache', 'length', 'max'=>255),
			array('fdSize', 'length', 'max'=>20),
			array('fdMD5', 'length', 'max'=>32),
			array('fdSync, fdCreate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fdContentID, fdName, fdEnglish, fdLanguageID, fdOrder, fdURL, fdCache, fdSize, fdVOD, fdEncrypted, fdPrice, fdTypeID, fdBornID, fdSync, fdProxyID, fdLinkID, fdCreate, fdUpdated, fdMD5, fdSkip, fdSeconds', 'safe', 'on'=>'search'),
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
			'fdContentID' => 'Fd Content',
			'fdName' => 'Fd Name',
			'fdEnglish' => 'Fd English',
			'fdLanguageID' => '对应tbLanguage.id，0代表该文件与语言无关。',
			'fdOrder' => '文件在tbContent内的排序，小的排在前面',
			'fdURL' => '文件的下载网址，形如xxxx://x.x.x/xx/xxx.xxx，等等',
			'fdCache' => 'Fd Cache',
			'fdSize' => '文件大小，以字节为单位',
			'fdVOD' => '是否点播：
            0：下载
            1：点播',
			'fdEncrypted' => '是否加密',
			'fdPrice' => '收费点数：
            0-不收费',
			'fdTypeID' => '文件类型
            字幕、简介、海报、音轨，等等',
			'fdBornID' => '此文件在provider系统内的ID',
			'fdSync' => '此文件最近一次和provider系统的同步时间',
			'fdProxyID' => '代理下载ID，由代理下载服务器返回',
			'fdLinkID' => '热点链接。fdLinkID指向另一个tbFile.id，代表正在播放当前tbFile记录时，如果用户发生互动操作，将展示哪一个tbFile记录代表的热点内容。
            当前tbFile记录可能是一个playlist(流媒体m3u8文件)，代表这个playlist对应的所有tbFile记录都使用相同的热点链接，除非播放列表中的某一个tbFile记录有自己独有的fdLinkID.',
			'fdCreate' => 'Fd Create',
			'fdUpdated' => '记录的最近一次更新时间',
			'fdMD5' => 'Fd Md5',
			'fdSkip' => '跳过忽略标志，如果为true，则vsapi不会暴露本文件给终端',
			'fdSeconds' => '以秒为单位的时间长度，用于动态生成m3u8',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fdContentID',$this->fdContentID);
		$criteria->compare('fdName',$this->fdName,true);
		$criteria->compare('fdEnglish',$this->fdEnglish,true);
		$criteria->compare('fdLanguageID',$this->fdLanguageID);
		$criteria->compare('fdOrder',$this->fdOrder);
		$criteria->compare('fdURL',$this->fdURL,true);
		$criteria->compare('fdCache',$this->fdCache,true);
		$criteria->compare('fdSize',$this->fdSize,true);
		$criteria->compare('fdVOD',$this->fdVOD);
		$criteria->compare('fdEncrypted',$this->fdEncrypted);
		$criteria->compare('fdPrice',$this->fdPrice);
		$criteria->compare('fdTypeID',$this->fdTypeID);
		$criteria->compare('fdBornID',$this->fdBornID);
		$criteria->compare('fdSync',$this->fdSync,true);
		$criteria->compare('fdProxyID',$this->fdProxyID);
		$criteria->compare('fdLinkID',$this->fdLinkID);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdUpdated',$this->fdUpdated,true);
		$criteria->compare('fdMD5',$this->fdMD5,true);
		$criteria->compare('fdSkip',$this->fdSkip);
		$criteria->compare('fdSeconds',$this->fdSeconds);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CtnFile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
