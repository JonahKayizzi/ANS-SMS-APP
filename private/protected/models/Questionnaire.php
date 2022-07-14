<?php

/**
 * This is the model class for table "questionnaire".
 *
 * The followings are the available columns in table 'questionnaire':
 * @property integer $questionnaire_id
 * @property string $submitted_by
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property QuestionnaireQuestionAnswers[] $questionnaireQuestionAnswers
 */
class Questionnaire extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questionnaire';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('submitted_by, title, form_status', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('questionnaire_id, submitted_by, date_created, status, title, form_status', 'safe', 'on'=>'search'),
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
			'questionnaireQuestionAnswers' => array(self::HAS_MANY, 'QuestionnaireQuestionAnswers', 'questionnaire_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'questionnaire_id' => 'ID',
			'submitted_by' => 'Submitted By',
			'date_created' => 'Date Created',
			'status' => 'Status',
			'title' => 'Title',
			'form_status' => 'Form Status',
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

		$criteria->compare('questionnaire_id',$this->questionnaire_id);
		$criteria->compare('submitted_by',$this->submitted_by,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('status',1);
		
		$criteria->order = 'questionnaire_id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Questionnaire the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getOptions(){
		$cats = Questionnaire::model()->findAll("status = 1");
		$data = array(null=>"Select Questionnaire");
		foreach($cats as $model){
			$data[$model->questionnaire_id] = $model->questionnaire_id.':  '.$model->title;
		}
		return $data;
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = Questionnaire::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
