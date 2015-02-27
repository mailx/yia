<?php

/**
 * This is the model class for table "tbAccountRecharge".
 *
 * The followings are the available columns in table 'tbAccountRecharge':
 * @property integer $id
 * @property string $fdOrderNO
 * @property integer $fdPartnerID
 * @property integer $fdAmount
 * @property string $fdRemark
 * @property integer $fdPayType
 * @property string $fdSubmit
 * @property string $fdApprove
 * @property integer $fdStatus
 * @property integer $fdApproverID
 * @property integer $fdAmountBefore
 * @property integer $fdAmountAfter
 */
class SvcAccountRecharge extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcAccountRecharge the static model class
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
		return 'tbAccountRecharge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdOrderNO, fdPartnerID, fdAmount, fdPayType, fdSubmit, fdStatus, fdAmountBefore, fdAmountAfter', 'required'),
			array('fdPartnerID, fdAmount, fdPayType, fdStatus, fdApproverID, fdAmountBefore, fdAmountAfter', 'numerical', 'integerOnly'=>true),
			array('fdOrderNO', 'length', 'max'=>12),
			array('fdRemark', 'length', 'max'=>128),
			array('fdApprove', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdOrderNO, fdPartnerID, fdAmount, fdRemark, fdPayType, fdSubmit, fdApprove, fdStatus, fdApproverID, fdAmountBefore, fdAmountAfter', 'safe', 'on'=>'search'),
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
			'fdOrderNO' => 'Fd Order No',
			'fdPartnerID' => 'Fd Partner',
			'fdAmount' => 'Fd Amount',
			'fdRemark' => 'Fd Remark',
			'fdPayType' => 'Fd Pay Type',
			'fdSubmit' => 'Fd Submit',
			'fdApprove' => 'Fd Approve',
			'fdStatus' => 'Fd Status',
			'fdApproverID' => 'Fd Approver',
			'fdAmountBefore' => 'Fd Amount Before',
			'fdAmountAfter' => 'Fd Amount After',
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
		$criteria->compare('fdOrderNO',$this->fdOrderNO,true);
		$criteria->compare('fdPartnerID',$this->fdPartnerID);
		$criteria->compare('fdAmount',$this->fdAmount);
		$criteria->compare('fdRemark',$this->fdRemark,true);
		$criteria->compare('fdPayType',$this->fdPayType);
		$criteria->compare('fdSubmit',$this->fdSubmit,true);
		$criteria->compare('fdApprove',$this->fdApprove,true);
		$criteria->compare('fdStatus',$this->fdStatus);
		$criteria->compare('fdApproverID',$this->fdApproverID);
		$criteria->compare('fdAmountBefore',$this->fdAmountBefore);
		$criteria->compare('fdAmountAfter',$this->fdAmountAfter);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}