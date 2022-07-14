<?php

/**
 * This is the model class for table "lessons_learnt".
 *
 * The followings are the available columns in table 'lessons_learnt':
 * @property integer $id
 * @property string $Divission
 * @property string $date_reported
 * @property string $category
 * @property string $issue_title
 * @property string $Description
 * @property integer $content_type
 * @property integer $content_id
 * @property integer $status
 */
class LessonsLearnt extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lessons_learnt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Description', 'required'),
			array('content_type, content_id, status, cost', 'numerical', 'integerOnly'=>true),
			array('Divission, category, issue_title, send_to_individual, source_type, source_detail, safety_concern', 'length', 'max'=>256),
			array('sent_to, sub_category', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Divission, date_reported, category, issue_title, Description, content_type, content_id, status, sent_to, cost, sub_category, send_to_individual, source_type, source_detail, safety_concern', 'safe', 'on'=>'search'),
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
			'Divission' => 'Directorate',
			'date_reported' => 'Date Reported',
			'category' => 'Category',
			'sub_category' => 'Sub Category',
			'issue_title' => 'Title',
			'Description' => 'Lesson Learnt',
			'content_type' => 'Content Type',
			'content_id' => 'Content',
			'status' => 'Status',
			'sent_to' => 'Send To Group',
			'cost' => 'Cost Implication',
			'send_to_individual' => 'Send To Individuals',
			'source_type' => 'Source Type',
			'source_detail' => 'Source Detail',
			'safety_concern' => 'Safety Concern',
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

		$criteria=new CDbCriteria; /* if(!(Users::model()->checkIfUserCategoryInAdmin())){ $criteria->compare('current_user_id',Yii::app()->user->id); } */

		$criteria->compare('id',$this->id);
		$criteria->compare('Divission',$this->Divission,true);
		$criteria->compare('date_reported',$this->date_reported,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('issue_title',$this->issue_title,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('content_type',$this->content_type);
		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('status',1);
		$criteria->order = "id DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LessonsLearnt the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = LessonsLearnt::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
