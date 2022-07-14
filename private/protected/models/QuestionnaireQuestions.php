<?php

/**
 * This is the model class for table "questionnaire_questions".
 *
 * The followings are the available columns in table 'questionnaire_questions':
 * @property integer $question_id
 * @property string $question
 * @property string $section
 * @property string $question_no
 *
 * The followings are the available model relations:
 * @property QuestionnaireQuestionAnswers[] $questionnaireQuestionAnswers
 */
class QuestionnaireQuestions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questionnaire_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, section, question_no', 'required'),
			array('section, question_no', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('question_id, question, section, question_no', 'safe', 'on'=>'search'),
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
			'questionnaireQuestionAnswers' => array(self::HAS_MANY, 'QuestionnaireQuestionAnswers', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'question_id' => 'Question',
			'question' => 'Question',
			'section' => 'Section',
			'question_no' => 'Question No',
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

		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('section',$this->section,true);
		$criteria->compare('question_no',$this->question_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionnaireQuestions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getOptions(){
		$cats = QuestionnaireQuestions::model()->findAll("");
		$data = array(null=>"Select Sub Element");
		foreach($cats as $model){
			$data[$model->question_id] = $model->question_id.':  '.$model->question;
		}
		return $data;
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = QuestionnaireQuestions::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
