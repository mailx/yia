<?php

/**
 * This is the model class for table "tbMember".
 *
 * The followings are the available columns in table 'tbMember':
 * @property integer $id
 * @property integer $fdRoleID
 * @property integer $fdOperatorID
 *
 * The followings are the available model relations:
 * @property Tbrole $fdRole
 * @property Tboperator $fdOperator
 */
class SvcMember extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcMember the static model class
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
		return 'tbMember';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdRoleID, fdOperatorID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdRoleID, fdOperatorID', 'safe', 'on'=>'search'),
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
			'fdRole' => array(self::BELONGS_TO, 'Tbrole', 'fdRoleID'),
			'fdOperator' => array(self::BELONGS_TO, 'Tboperator', 'fdOperatorID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fdRoleID' => 'Fd Role',
			'fdOperatorID' => 'Fd Operator',
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
		$criteria->compare('fdRoleID',$this->fdRoleID);
		$criteria->compare('fdOperatorID',$this->fdOperatorID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}