<?php

/**
 * This is the model class for table "sms_form_124_comments".
 *
 * The followings are the available columns in table 'sms_form_124_comments':
 * @property integer $id
 * @property integer $incident_id
 * @property string $comment
 * @property string $modified
 * @property integer $status
 * @property string $reported_by
 *
 * The followings are the available model relations:
 * @property Incidents $incident
 */
class SmsForm124Comments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sms_form_124_comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment, reported_by, incident_id', 'required'),
			array('incident_id, status', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'max'=>256),
			array('reported_by', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incident_id, comment, modified, status, reported_by', 'safe', 'on'=>'search'),
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
			'incident_id' => 'Incident',
			'comment' => 'Comment',
			'modified' => 'Modified',
			'status' => 'Status',
			'reported_by' => 'Reported By',
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
		$criteria->compare('incident_id',$this->incident_id);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);
		$criteria->compare('reported_by',$this->reported_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SmsForm124Comments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SmsForm124Comments::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
