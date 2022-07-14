<?php

/**
 * This is the model class for table "effects".
 *
 * The followings are the available columns in table 'effects':
 * @property integer $id
 * @property integer $hazard_id
 * @property string $name
 * @property string $date
 * @property string $reported_by
 * @property int $consequence
 *
 * The followings are the available model relations:
 * @property EffectRiskManagement[] $effectRiskManagements
 * @property Incidents $hazard
 */
class Effects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'effects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hazard_id, reported_by, consequence', 'required'),
			array('hazard_id, status', 'numerical', 'integerOnly'=>true),
			array('name, reported_by', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hazard_id, name, date, reported_by, consequence, status, severity_id, severity_rational_id, likelihood_id, initial_risk_index, predicted_residual_risk_index, substitute_risk', 'safe', 'on'=>'search'),
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
			'effectRiskManagements' => array(self::HAS_MANY, 'EffectRiskManagement', 'effects_id'),
			'hazard' => array(self::BELONGS_TO, 'Incidents', 'hazard_id'),
			'consequence_relation' => array(self::BELONGS_TO, 'Consequences', 'consequence'),
			
			'severity' => array(self::BELONGS_TO, 'Severities', 'severity_id'),
			'likelihood' => array(self::BELONGS_TO, 'Likelihoods', 'likelihood_id'),
			'severityRationale' => array(self::BELONGS_TO, 'SeverityRationales', 'severity_rational_id'),
			'effectsSeverityRationales' => array(self::HAS_MANY, 'EffectsSeverityRationales', 'effects_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hazard_id' => 'Hazard',
			'name' => 'Name',
			'date' => 'Date',
			'reported_by' => 'Reported By',
			'consequence' => 'Consequence',
			'status' => 'Status',
			'severity_id' => 'Severity ID',
			'severity_rational_id' => 'Severity Rationale ID',
			'likelihood_id' => 'Likelihood ID',
			'initial_risk_index' => 'Initial Risk Index',
			'predicted_residual_risk_index' => 'Predicted Residual Risk Index',
			'substitute_risk' => 'Substitute Risk',
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
		$criteria->compare('hazard_id',$this->hazard_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('reported_by',$this->reported_by,true);
		$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Effects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function getPosibleConsiquesOptions($incident_id){
		$titles = Consequences::model()->findAll('incident_id='.$incident_id.' and status = 1');
		$data = array(null=>"Select Consequence");
		foreach($titles as $model){
			$data[$model->id] = $model->description;
		}
		return $data;
	}
	
	public function getInitialRiskIndexCount($risk_index){
		$sql = "select count(*) as total_risks from effects where initial_risk_index = '{$risk_index}'";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getPeriodInitialRiskIndexCount($risk_index, $start_date, $end_date){
		$sql = "select count(*) as total_risks from effects where initial_risk_index = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getPeriodInitialRiskIndexCountInHazards($risk_index, $start_date, $end_date, $search_for){
		if($search_for == 'All'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1";
		}else{
			$sql = "select count(*) as total_risks from effects where initial_risk_index = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$start_date}' and '{$end_date}')";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getMonthlyInitialRiskIndexCount($category, $start_date, $end_date){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDayInitialRiskIndexCount($category, $day){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDayInitialRiskIndexCountInHazards($category, $day, $search_for){
		if($search_for == 'All'){
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1";
			}	
		}else{
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
			}	

		}
		
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDaysInitialRiskIndexCount($category, $date_1, $date_2){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where initial_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDaysInitialRiskIndexCountInHazards($category, $date_1, $date_2, $search_for){
		if($search_for == 'All'){
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}	
		}else{
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where initial_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}	

		}
		
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getPredictedRiskIndexCount($risk_index){
		$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index = '{$risk_index}'";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getPeriodPredictedRiskIndexCount($risk_index, $start_date, $end_date){
		$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getPeriodPredictedRiskIndexCountInHazards($risk_index, $start_date, $end_date, $search_for){
		if($search_for == 'All'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1";
		}else{
		$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$start_date}' and '{$end_date}')";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getMonthlyPredictedRiskIndexCount($category, $start_date, $end_date){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDayPredictedRiskIndexCount($category, $day){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDayPredictedRiskIndexCountInHazards($category, $day, $search_for){
		if($search_for == 'All'){
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1";
			}	
		}else{
			if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
		}	
		}
		
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDaysPredictedRiskIndexCount($category, $date_1, $date_2){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDaysPredictedRiskIndexCountInHazards($category, $date_1, $date_2, $search_for){
		if($search_for == 'All'){
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}	
		}else{
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where predicted_residual_risk_index in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}	

		}
		
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getSubstituteRiskIndexCount($risk_index){
		$sql = "select count(*) as total_risks from effects where substitute_risk = '{$risk_index}'";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getPeriodSubstituteRiskIndexCount($risk_index, $start_date, $end_date){
		$sql = "select count(*) as total_risks from effects where substitute_risk = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1";
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getPeriodSubstituteRiskIndexCountInHazards($risk_index, $start_date, $end_date, $search_for){
		if($search_for == 'All'){
			$sql = "select count(*) as total_risks from effects where substitute_risk = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1";
		}else{
			$sql = "select count(*) as total_risks from effects where substitute_risk = '{$risk_index}' and date between '{$start_date}' and '{$end_date}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$start_date}' and '{$end_date}')";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return $rawData[0]['total_risks'];
	}
	
	public function getMonthlySubstituteRiskIndexCount($category, $start_date, $end_date){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$start_date}' and '{$end_date}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDaySubstituteRiskIndexCount($category, $day){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDaySubstituteRiskIndexCountInHazards($category, $day, $search_for){
		if($search_for == 'All'){
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1";
			}	
		}else{
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('5A', '5B', '5C', '4A', '4B', '3A') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date = '{$day}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date = '{$day}')";
			}	
		}
		
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDaysSubstituteRiskIndexCount($category, $date_1, $date_2){
		if($category == 'RED'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		if($category == 'YELLOW'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		if($category == 'GREEN'){
			$sql = "select count(*) as total_risks from effects where substitute_risk in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1";
		}
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public function getDaysSubstituteRiskIndexCountInHazards($category, $date_1, $date_2, $search_for){
		if($search_for == 'All'){
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1";
			}	
		}else{
			if($category == 'RED'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('5A', '5B', '5C', '4A', '4B', '3A') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}
			if($category == 'YELLOW'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('5D', '5E', '4C', '4D', '4E', '3B', '3C', '3D', '2A', '2B', '2C', '1A') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}
			if($category == 'GREEN'){
				$sql = "select count(*) as total_risks from effects where substitute_risk in ('3E', '2D', '2E', '1B', '1C', '1D', '1E') and date between '{$date_1}' and '{$date_2}' and status = 1 and hazard_id in (select id from incidents where main_category = '{$search_for}' and date between '{$date_1}' and '{$date_2}')";
			}
		}
		
		
		$rawData =  Yii::app()->db->createCommand($sql)->queryAll(); // you get them in an array
		return intval($rawData[0]['total_risks']);
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = Effects::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
