<?php

/**
 * This is the model class for table "cm_costs".
 *
 * The followings are the available columns in table 'cm_costs':
 * @property integer $id
 * @property integer $change_management_id
 * @property string $item
 * @property integer $cost
 * @property string $reported_by
 * @property string $modified
 * @property integer $staus
 * @property string $unit
 *
 * The followings are the available model relations:
 * @property ChangeManagement $changeManagement
 */
class CmCosts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cm_costs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item, cost, reported_by, unit', 'required'),
			array('change_management_id, cost, staus', 'numerical', 'integerOnly'=>true),
			array('item', 'length', 'max'=>128),
			array('reported_by, unit', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, change_management_id, item, cost, reported_by, modified, staus, unit', 'safe', 'on'=>'search'),
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
			'changeManagement' => array(self::BELONGS_TO, 'ChangeManagement', 'change_management_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'change_management_id' => 'Change Management',
			'item' => 'Item',
			'cost' => 'Cost',
			'reported_by' => 'Reported By',
			'modified' => 'Modified',
			'staus' => 'Status',
			'unit' => 'Unit',
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

		$criteria=new CDbCriteria; if(!(Users::model()->checkIfUserCategoryInAdmin())){ $criteria->compare('current_user_id',Yii::app()->user->id); }

		$criteria->compare('id',$this->id);
		$criteria->compare('change_management_id',$this->change_management_id);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('staus',1);
		$criteria->compare('unit',$this->unit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmCosts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = CmCosts::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
