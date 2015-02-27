<?php

/**
 * This is the model class for table "tbUserLog".
 *
 * The followings are the available columns in table 'tbUserLog':
 * @property integer $id
 * @property integer $fdTerminalID
 * @property string $fdAction
 * @property string $fdTarget
 * @property string $fdTime
 */
class SvcUserLog extends ServiceActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SvcUserLog the static model class
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
		return 'tbUserLog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdTerminalID, fdAction, fdTime', 'required'),
			array('fdTerminalID', 'numerical', 'integerOnly'=>true),
			array('fdAction', 'length', 'max'=>64),
			array('fdTarget', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fdTerminalID, fdAction, fdTarget, fdTime', 'safe', 'on'=>'search'),
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
			'fdAction' => 'Fd Action',
			'fdTarget' => 'Fd Target',
			'fdTime' => 'Fd Time',
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
		$criteria->compare('fdAction',$this->fdAction,true);
		$criteria->compare('fdTarget',$this->fdTarget,true);
		$criteria->compare('fdTime',$this->fdTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function add($data){	
    	//$data['action'] = 'send phone code';
    	$data['fdTarget'] = $_SERVER['REMOTE_ADDR'];
    	$true = 1;
		$key = 0;
		//echo $true?1:0;
    	if($true){//echo 'a';
    		 $this->fdAction = $data['action'];
    		 $this->fdTarget = $data['fdTarget'];
    		 $this->fdTime = date('Y-m-d H:i:s');
    		 $this->fdTerminalID = 0;
	    	 $key = $this->save();
	    	//print_r($this->getErrors());
    	} //echo $key;
    	return $key;
    	
    }
    public function check($data){
		$data['fdTarget'] = $_SERVER['REMOTE_ADDR'];
    	//$condition = array('fdAction'=>$data['action'],'fdTarget'=>$data['fdTarget']);
    	//$obj = $this->model()->findByAttributes($condition)->order('fdTime DESC');
    	$sql = "SELECT fdTime FROM ". $this->tableName()." WHERE fdAction='{$data['action']}' AND fdTarget='{$data['fdTarget']}' ORDER BY fdTime DESC";
    	$obj = $this->model()->findBySql($sql);
    	$true = true; 	
    	//echo $obj->fdTime;
    	if($obj && isset($obj->fdTime)){ 
    		$current = date('Y-m-d H:i:s');				
    		if(strtotime($obj->fdTime)+60<time()){
    			$true = true;
    		}else{
    			$true = false;
    		}
    	}
    	return $true;
    }
	
}