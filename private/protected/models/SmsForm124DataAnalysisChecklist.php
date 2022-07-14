<?php

/**
 * This is the model class for table "sms_form_124_data_analysis_checklist".
 *
 * The followings are the available columns in table 'sms_form_124_data_analysis_checklist':
 * @property integer $id
 * @property string $photographos
 * @property string $diagrams
 * @property string $supervisor_statements
 * @property string $witness_statements
 * @property string $employment_history
 * @property string $employee_statement
 * @property string $walk_around_checklist
 * @property string $training_records
 * @property string $police_reports
 * @property string $other
 * @property string $modified
 * @property integer $status
 * @property string $reported_by
 * @property integer $incident_id
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class SmsForm124DataAnalysisChecklist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sms_form_124_data_analysis_checklist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photographos, diagrams, supervisor_statements, witness_statements, employment_history, employee_statement, walk_around_checklist, training_records, police_reports, other, reported_by, incident_id', 'required'),
			array('status, incident_id', 'numerical', 'integerOnly'=>true),
			array('photographos, diagrams, supervisor_statements, witness_statements, employment_history, employee_statement, walk_around_checklist, training_records, police_reports, other', 'length', 'max'=>4),
			array('reported_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, photographos, diagrams, supervisor_statements, witness_statements, employment_history, employee_statement, walk_around_checklist, training_records, police_reports, other, modified, status, reported_by, incident_id', 'safe', 'on'=>'search'),
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
			'incident' => array(self::BELONGS_TO, 'Incidents', 'incident_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'photographos' => 'Photographs',
			'diagrams' => 'Diagrams',
			'supervisor_statements' => 'Supervisor Statements',
			'witness_statements' => 'Witness Statements',
			'employment_history' => 'Employment History',
			'employee_statement' => 'Employee Statement',
			'walk_around_checklist' => 'Walk Around Checklist',
			'training_records' => 'Training Records',
			'police_reports' => 'Police Reports',
			'other' => 'Other',
			'modified' => 'Modified',
			'status' => 'Status',
			'reported_by' => 'Reported By',
			'incident_id' => 'Incident',
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
		$criteria->compare('photographos',$this->photographos,true);
		$criteria->compare('diagrams',$this->diagrams,true);
		$criteria->compare('supervisor_statements',$this->supervisor_statements,true);
		$criteria->compare('witness_statements',$this->witness_statements,true);
		$criteria->compare('employment_history',$this->employment_history,true);
		$criteria->compare('employee_statement',$this->employee_statement,true);
		$criteria->compare('walk_around_checklist',$this->walk_around_checklist,true);
		$criteria->compare('training_records',$this->training_records,true);
		$criteria->compare('police_reports',$this->police_reports,true);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('incident_id',$this->incident_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SmsForm124DataAnalysisChecklist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SmsForm124DataAnalysisChecklist::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
