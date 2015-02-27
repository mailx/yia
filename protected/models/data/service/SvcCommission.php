<?php

/**
 * This is the model class for table "tbCommission".
 *
 * The followings are the available columns in table 'tbCommission':
 * @property integer $id
 * @property string $fdMoon
 * @property integer $fdOrderCount
 * @property integer $fdTicketCount
 * @property integer $fdMoney
 * @property integer $fdComfirmedOrder
 * @property integer $fdComfirmedTicket
 * @property integer $fdComfirmedMoney
 * @property integer $fdAmount
 * @property integer $fdRefund
 * @property integer $fdStatus
 * @property string $fdCreate
 * @property string $fdComfirmedTime
 * @property integer $fdApproveID
 * @property integer $fdPartnerID
 */
class SvcCommission extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcCommission the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->dbService;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbCommission';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdOrderCount, fdTicketCount, fdMoney, fdComfirmedOrder, fdComfirmedTicket, fdComfirmedMoney, fdAmount, fdRefund, fdStatus, fdApproveID, fdPartnerID', 'numerical', 'integerOnly'=>true),
			array('fdMoon, fdCreate, fdComfirmedTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdMoon, fdOrderCount, fdTicketCount, fdMoney, fdComfirmedOrder, fdComfirmedTicket, fdComfirmedMoney, fdAmount, fdRefund, fdStatus, fdCreate, fdComfirmedTime, fdApproveID, fdPartnerID', 'safe', 'on'=>'search'),
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
			'fdMoon' => 'Fd Moon',
			'fdOrderCount' => 'Fd Order Count',
			'fdTicketCount' => 'Fd Ticket Count',
			'fdMoney' => 'Fd Money',
			'fdComfirmedOrder' => 'Fd Comfirmed Order',
			'fdComfirmedTicket' => 'Fd Comfirmed Ticket',
			'fdComfirmedMoney' => 'Fd Comfirmed Money',
			'fdAmount' => 'Fd Amount',
			'fdRefund' => 'Fd Refund',
			'fdStatus' => 'Fd Status',
			'fdCreate' => 'Fd Create',
			'fdComfirmedTime' => 'Fd Comfirmed Time',
			'fdApproveID' => 'Fd Approve',
			'fdPartnerID' => 'Fd Partner',
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
		$criteria->compare('fdMoon',$this->fdMoon,true);
		$criteria->compare('fdOrderCount',$this->fdOrderCount);
		$criteria->compare('fdTicketCount',$this->fdTicketCount);
		$criteria->compare('fdMoney',$this->fdMoney);
		$criteria->compare('fdComfirmedOrder',$this->fdComfirmedOrder);
		$criteria->compare('fdComfirmedTicket',$this->fdComfirmedTicket);
		$criteria->compare('fdComfirmedMoney',$this->fdComfirmedMoney);
		$criteria->compare('fdAmount',$this->fdAmount);
		$criteria->compare('fdRefund',$this->fdRefund);
		$criteria->compare('fdStatus',$this->fdStatus);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdComfirmedTime',$this->fdComfirmedTime,true);
		$criteria->compare('fdApproveID',$this->fdApproveID);
		$criteria->compare('fdPartnerID',$this->fdPartnerID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}