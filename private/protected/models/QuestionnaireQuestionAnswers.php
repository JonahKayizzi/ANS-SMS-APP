<?php

/**
 * This is the model class for table "questionnaire_question_answers".
 *
 * The followings are the available columns in table 'questionnaire_question_answers':
 * @property integer $questionnaire_id
 * @property integer $question_id
 * @property string $status_of_implementation
 * @property string $action_required
 * @property integer $id
 * @property string $answer
 *
 * The followings are the available model relations:
 * @property Questionnaire $questionnaire
 * @property QuestionnaireQuestions $question
 */
class QuestionnaireQuestionAnswers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questionnaire_question_answers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('questionnaire_id, question_id', 'required'),
			array('questionnaire_id, question_id', 'numerical', 'integerOnly'=>true),
			array('answer', 'length', 'max'=>200),
			array('action_required, status_of_implementation', 'length', 'max'=>1000),
			array('status_of_implementation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('questionnaire_id, question_id, status_of_implementation, action_required, id, answer', 'safe', 'on'=>'search'),
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
			'questionnaire' => array(self::BELONGS_TO, 'Questionnaire', 'questionnaire_id'),
			'question' => array(self::BELONGS_TO, 'QuestionnaireQuestions', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'questionnaire_id' => 'Questionnaire',
			'question_id' => 'Question',
			'status_of_implementation' => 'Status Of Implementation',
			'action_required' => 'Action Required',
			'id' => 'ID',
			'answer' => 'Answer',
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
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('status_of_implementation',$this->status_of_implementation,true);
		$criteria->compare('action_required',$this->action_required,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('answer',$this->answer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionnaireQuestionAnswers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = QuestionnaireQuestionAnswers::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
