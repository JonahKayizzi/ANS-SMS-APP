<?php

/**
 * This is the model class for table "audit_form".
 *
 * The followings are the available columns in table 'audit_form':
 * @property integer $issue_no
 * @property string $issue_date
 * @property string $auditor_technical_assessor
 * @property string $area_audited
 * @property string $area_audited_date
 * @property string $auditees_representative
 * @property string $detailed_observation
 * @property string $classification_of_non_conformance
 * @property string $reference_number_of_iso_9001_or_procedure
 * @property string $root_cause_analysis_of_non_conformance
 * @property string $suggested_corrective_action
 * @property string $proposed_date_of_realisation
 * @property string $verification_of_proof
 * @property string $verification_of_proof_date
 * @property string $lead_auditors_comments
 * @property string $lead_auditors_comments_date
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class AuditForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'audit_form';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			/* array('issue_date, auditor_technical_assessor, area_audited, auditees_representative, reference_number_of_iso_9001_or_procedure', 'required'), */
			array('auditees_representative, auditor_technical_assessor, area_audited, area_audited_date, detailed_observation, classification_of_non_conformance, reference_number_of_iso_9001_or_procedure,', 'required'),
			array('issue_date, 	area_audited_date, proposed_date_of_realisation, verification_of_proof_date, 	lead_auditors_comments_date', 'type', 'type'=>'datetime', 'datetimeFormat'=>'yyyy-mm-dd'),
			array('user_id, audit_plan_id', 'numerical', 'integerOnly'=>true),
			array('status, questionnaire_sub_element, questionnaire, current_user_id, type_of_control', 'numerical', 'integerOnly'=>true),
			array('auditor_technical_assessor, area_audited, auditees_representative, reference_number_of_iso_9001_or_procedure', 'length', 'max'=>56),
			array('classification_of_non_conformance', 'length', 'max'=>256),
			array('area_audited_date, detailed_observation, root_cause_analysis_of_non_conformance, suggested_corrective_action, proposed_date_of_realisation, verification_of_proof, verification_of_proof_date, lead_auditors_comments, lead_auditors_comments_date, current_user_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('issue_no, issue_date, auditor_technical_assessor, area_audited, area_audited_date, auditees_representative, detailed_observation, classification_of_non_conformance, reference_number_of_iso_9001_or_procedure, root_cause_analysis_of_non_conformance, suggested_corrective_action, proposed_date_of_realisation, verification_of_proof, verification_of_proof_date, lead_auditors_comments, lead_auditors_comments_date, user_id, status, audit_plan_id, questionnaire, questionnaire_sub_element, priority, current_user_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'auditRepresentative' => array(self::BELONGS_TO, 'Users', 'auditees_representative'),
			'auditPlan' => array(self::BELONGS_TO, 'AuditPlan', 'audit_plan_id'),
			'questionnaire' => array(self::BELONGS_TO, 'Questionnaire', 'questionnaire'),
			'questionnaireQuestion' => array(self::BELONGS_TO, 'QuestionnaireQuestions', 'questionnaire_sub_element'),
			'control' => array(self::BELONGS_TO, 'TypesOfControlsSub', 'type_of_control'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'issue_no' => 'ID',
			'priority' => 'Priority',
			'issue_date' => 'Issue Date',
			'auditor_technical_assessor' => 'Auditor, Technical Assesor',
			'area_audited' => 'Area  Audited',
			'area_audited_date' => 'Date of Area Audit',
			'auditees_representative' => 'Auditee\'s Representative ',
			'detailed_observation' => 'Detailed Observation',
			'classification_of_non_conformance' => 'Classification of Non-conformance',
			'reference_number_of_iso_9001_or_procedure' => 'Reference',
			'root_cause_analysis_of_non_conformance' => 'Root Cause Analysis of Non-conformance',
			'suggested_corrective_action' => 'Suggested corrective action. ',
			'proposed_date_of_realisation' => 'Proposed date of realisation',
			'verification_of_proof' => 'Verification of proof of effective corrective action and close-out by the auditor',
			'verification_of_proof_date' => 'Date of Verification of proof ',
			'lead_auditors_comments' => 'Lead Auditor\'s Comments',
			'lead_auditors_comments_date' => 'Date of Lead Auditor\'s Comments',
			'user_id' => 'User ',
			'status' => 'Status',
			'audit_plan_id' => 'Audit Plan',
			'questionnaire' => 'Gap Analysis',
			'questionnaire_sub_element' => 'Gap Analysis sub element',
			'date_assigned' => 'Date Assigned',
			'date_closed' => 'Date Closed',
			'type_of_control' => 'Type of Control',
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

		$criteria=new CDbCriteria;

		$criteria->compare('issue_no',$this->issue_no);
		$criteria->compare('issue_date',$this->issue_date,true);
		$criteria->compare('auditor_technical_assessor',$this->auditor_technical_assessor,true);
		$criteria->compare('area_audited',$this->area_audited,true);
		$criteria->compare('area_audited_date',$this->area_audited_date,true);
		$criteria->compare('auditees_representative',$this->auditees_representative,true);
		$criteria->compare('detailed_observation',$this->detailed_observation,true);
		$criteria->compare('classification_of_non_conformance',$this->classification_of_non_conformance,true);
		$criteria->compare('reference_number_of_iso_9001_or_procedure',$this->reference_number_of_iso_9001_or_procedure,true);
		$criteria->compare('root_cause_analysis_of_non_conformance',$this->root_cause_analysis_of_non_conformance,true);
		$criteria->compare('suggested_corrective_action',$this->suggested_corrective_action,true);
		$criteria->compare('proposed_date_of_realisation',$this->proposed_date_of_realisation,true);
		$criteria->compare('verification_of_proof',$this->verification_of_proof,true);
		$criteria->compare('verification_of_proof_date',$this->verification_of_proof_date,true);
		$criteria->compare('lead_auditors_comments',$this->lead_auditors_comments,true);
		$criteria->compare('lead_auditors_comments_date',$this->lead_auditors_comments_date,true);
		$criteria->compare('user_id',$this->user_id);
		
		$criteria->order = 'issue_no DESC';
		
		if(!(Users::model()->checkIfUserIsAuditor())){
			$criteria->compare('current_user_id',Yii::app()->user->id);
		}
		
		$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AuditForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = AuditForm::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())||(@Users::model()->checkIfUserIsAuditor())){return true;}else{return false;}
	}
}
