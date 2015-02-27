<?php

/**
 * This is the model class for table "tbUser".
 *
 * The followings are the available columns in table 'tbUser':
 * @property integer $id
 * @property string $fdNumber
 * @property string $fdLogin
 * @property string $fdName
 * @property string $fdPassword
 * @property string $fdActive
 * @property integer $fdMember
 * @property string $fdQuestion
 * @property string $fdAnswer
 * @property integer $fdPortrait
 * @property integer $fdGender
 * @property string $fdApprove
 * @property integer $fdApproverID
 * @property string $fdCreate
 * @property integer $fdStatus
 * @property integer $fdCardID
 */
class SvcUser extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcUser the static model class
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
		return Yii::app()->params['dbServiceName'].'.tbUser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdGender, fdCreate, fdStatus, fdCardID,fdTypeID', 'required'),
			array('fdMember, fdPortrait, fdGender, fdApproverID, fdStatus, fdCardID', 'numerical', 'integerOnly'=>true),
			array('fdNumber', 'length', 'max'=>20),
			array('fdLogin, fdName, fdPassword, fdAnswer', 'length', 'max'=>32),
			array('fdQuestion', 'length', 'max'=>64),
			array('fdActive, fdApprove', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdNumber, fdLogin, fdName, fdPassword, fdActive, fdMember, fdQuestion, fdAnswer, fdPortrait, fdGender, fdApprove, fdApproverID, fdCreate, fdStatus, fdCardID,fdTypeID', 'safe', 'on'=>'search'),
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
			'orders'=>array(self::HAS_MANY, 'SnyOrder', 'fdUserID')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fdNumber' => 'Fd Number',
			'fdLogin' => 'Fd Login',
			'fdName' => 'Fd Name',
			'fdPassword' => 'Fd Password',
			'fdActive' => 'Fd Active',
			'fdMember' => 'Fd Member',
			'fdQuestion' => 'Fd Question',
			'fdAnswer' => 'Fd Answer',
			'fdPortrait' => 'Fd Portrait',
			'fdGender' => 'Fd Gender',
			'fdApprove' => 'Fd Approve',
			'fdApproverID' => 'Fd Approver',
			'fdCreate' => 'Fd Create',
			'fdStatus' => 'Fd Status',
			'fdCardID' => 'Fd Card',
			'fdTypeID' => 'Fd Type',
		);
	}
    /*  通过id来查询到得会员级别 fdTypeID
     *
     * */
    public function getUser($id)
    {
        $getUser = SvcUser::model()->find('id=:id ',
            array(':id' => $id));
        //echo $type->fdTypeID;
        return $getUser;
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
		$criteria->compare('fdNumber',$this->fdNumber,true);
		$criteria->compare('fdLogin',$this->fdLogin,true);
		$criteria->compare('fdName',$this->fdName,true);
		$criteria->compare('fdPassword',$this->fdPassword,true);
		$criteria->compare('fdActive',$this->fdActive,true);
		$criteria->compare('fdMember',$this->fdMember);
		$criteria->compare('fdQuestion',$this->fdQuestion,true);
		$criteria->compare('fdAnswer',$this->fdAnswer,true);
		$criteria->compare('fdPortrait',$this->fdPortrait);
		$criteria->compare('fdGender',$this->fdGender);
		$criteria->compare('fdApprove',$this->fdApprove,true);
		$criteria->compare('fdApproverID',$this->fdApproverID);
		$criteria->compare('fdCreate',$this->fdCreate,true);
		$criteria->compare('fdStatus',$this->fdStatus);
		$criteria->compare('fdCardID',$this->fdCardID);
        $criteria->compare('fdTypeID',$this->fdTypeID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}