<?php

/**
 * This is the model class for table "safety_logs_categories".
 *
 * The followings are the available columns in table 'safety_logs_categories':
 * @property integer $id
 * @property string $name
 * @property integer $user
 * @property string $date
 */
class SafetyLogsCategories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'safety_logs_categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('user', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, user, date', 'safe', 'on'=>'search'),
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
			'user0' => array(self::BELONGS_TO, 'Users', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'user' => 'User',
			'date' => 'Date',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SafetyLogsCategories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function getLogCount($id, $start_date, $end_date){
		if($start_date == $end_date){
			$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured = '{$start_date}'", array(':categoryID'=>$id));
		}else{
			$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured between '{$start_date}' and '{$end_date}'", array(':categoryID'=>$id));
		}
		
		return count($logs);
	}
	
	public static function getLogCount2($id, $start_date, $end_date, $search_option, $search_value){
		if($start_date == $end_date){
			$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured = '{$start_date}' and {$search_option} = '{$search_value}'", array(':categoryID'=>$id));
		}else{
			$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured between '{$start_date}' and '{$end_date}' and {$search_option} = '{$search_value}'", array(':categoryID'=>$id));
		}
		
		return count($logs);
	}
	
	public static function getLogCountForDay($id, $day){
		$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured = '{$day}'", array(':categoryID'=>$id));
		return count($logs);
	}
	
	public static function getLogCountForDay2($id, $day, $search_option, $search_value){
		$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured = '{$day}' and {$search_option} = '{$search_value}'", array(':categoryID'=>$id));
		return count($logs);
	}
	
	public static function getLogCountForDays($id, $date_1, $date_2){
		$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured between '{$date_1}' and '{$date_2}'", array(':categoryID'=>$id));
		return count($logs);
	}
	
	public static function getLogCountForDays2($id, $date_1, $date_2, $search_option, $search_value){
		$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured between '{$date_1}' and '{$date_2}' and {$search_option} = '{$search_value}'", array(':categoryID'=>$id));
		return count($logs);
	}
	
	public static function getLogCountForPeriod($id, $start_date, $end_date){
		if($start_date == $end_date){
			$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured = '{$start_date}'", array(':categoryID'=>$id));
		}else{
			$logs=SafetyLogs::model()->findAll("category=:categoryID and date_occured between '{$start_date}' and '{$end_date}'", array(':categoryID'=>$id));
		}
		
		return count($logs);
	}
	
	public static function getOptions(){
		$titles = SafetyLogsCategories::model()->findAll();
		$data = array(null=>"Select Option");
		foreach($titles as $model){
			$data[$model->id] = $model->name;
		}
		return $data;
	}
	
	public static function getOptionsCategories(){
		$titles = SafetyLogsCategories::model()->findAll();
		$data = array(null=>"Select Cause");
		foreach($titles as $model){
			$data[$model->id] = $model->name;
		}
		return $data;
	}
	
	public function categoryPlotValues($id, $start_date, $end_date, $period_type){
		//$today = date('Y-m-d');
		//$today = $select_dt;
		$y = date('Y', strtotime($today));
		$m = date('m', strtotime($today));
		
		
		$period = "{$m}-{$y}";
		
		$d = date('d', strtotime($today));
		//$begin = "{$y}-{$m}-01";
		$begin = $start_date;
		//$day = "{$y}-{$m}-01";
		$day = $begin;
		//$end = $today;
		$end = $end_date;
		
		$y = 1;
		$x = 0;
		$z = 1;
		$title = "";
		
		$y_points = array();
		$x_points = array();
		
		
		//get all months from beginning of the year
		/* while($day != $end){
			$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
			
			$total_incidents = @SafetyLogsCategories::model()->getLogCountForDay($id, $day);
			
			$total_incidents = intval($total_incidents);
			if($total_incidents == null){$total_incidents = 0;}
			$DAY = date('d', strtotime($day));
			
			array_push($y_points, $total_incidents);
			array_push($x_points, $DAY);
			
			$x = $x + 1;
		} */
		
		while(strtotime($day) != strtotime($end)){
			
			if($period_type == 1){
				$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
				$total_incidents = @SafetyLogsCategories::model()->getLogCountForDay($id, $day);	
				$z = date('D-d', strtotime($day));
				array_push($x_points, $z);
				$title = " From: {$begin} to {$end}, Daily";
			}elseif($period_type == 2){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} weeks"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				$day = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$total_incidents = @SafetyLogsCategories::model()->getLogCountForDays($id, $date_1, $date_2);
				$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
				array_push($x_points, $z);
				$title = " From: {$begin} to {$end}, Weekly";
			}elseif($period_type == 3){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} months"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} months"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				$day = date('Y-m-d', strtotime($begin. " + {$y} months"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$total_incidents = @SafetyLogsCategories::model()->getLogCountForDays($id, $date_1, $date_2);
				$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
				array_push($x_points, $z);
				$title = " From: {$begin} to {$end}, Monthly";
			}elseif($period_type == 4){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} years"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} years"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				$day = date('Y-m-d', strtotime($begin. " + {$y} years"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$total_incidents = @SafetyLogsCategories::model()->getLogCountForDays($id, $date_1, $date_2);
				$z = date('Y/M/d', strtotime($date_1)).'-'.date('Y/M/d', strtotime($date_2));
				array_push($x_points, $z);
				$title = " From: {$begin} to {$end}, Yearly";
			}
			
			$total_incidents = intval($total_incidents);
			if($total_incidents == null){$total_incidents = 0;}
			
			array_push($y_points, $total_incidents);
			
			$x = $x + 1;
			$y = $x + 1;
			$z = $x + 1;
		}
		$for_return = array();
		$for_return[0]=$y_points;
		$for_return[1]=$x_points;
		return $for_return;
	}
	
	public function categoryPlotValues2($id, $start_date, $end_date, $period_type, $search_option, $search_value){
		//$today = date('Y-m-d');
		//$today = $select_dt;
		$y = date('Y', strtotime($today));
		$m = date('m', strtotime($today));
		
		
		$period = "{$m}-{$y}";
		
		$d = date('d', strtotime($today));
		//$begin = "{$y}-{$m}-01";
		$begin = $start_date;
		//$day = "{$y}-{$m}-01";
		$day = $begin;
		//$end = $today;
		$end = $end_date;
		
		$y = 1;
		$x = 0;
		$z = 1;
		$title = "";
		
		$y_points = array();
		$x_points = array();
		
		
		//get all months from beginning of the year
		/* while($day != $end){
			$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
			
			$total_incidents = @SafetyLogsCategories::model()->getLogCountForDay($id, $day);
			
			$total_incidents = intval($total_incidents);
			if($total_incidents == null){$total_incidents = 0;}
			$DAY = date('d', strtotime($day));
			
			array_push($y_points, $total_incidents);
			array_push($x_points, $DAY);
			
			$x = $x + 1;
		} */
		
		while(strtotime($day) != strtotime($end)){
			
			if($period_type == 1){
				$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
				$total_incidents = @SafetyLogsCategories::model()->getLogCountForDay2($id, $day, $search_option, $search_value);	
				$z = date('D-d', strtotime($day));
				array_push($x_points, $z);
				$title = " From: {$begin} to {$end}, Daily";
			}elseif($period_type == 2){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} weeks"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				$day = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$total_incidents = @SafetyLogsCategories::model()->getLogCountForDays2($id, $date_1, $date_2, $search_option, $search_value);
				$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
				array_push($x_points, $z);
				$title = " From: {$begin} to {$end}, Weekly";
			}elseif($period_type == 3){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} months"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} months"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				$day = date('Y-m-d', strtotime($begin. " + {$y} months"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$total_incidents = @SafetyLogsCategories::model()->getLogCountForDays2($id, $date_1, $date_2, $search_option, $search_value);
				$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
				array_push($x_points, $z);
				$title = " From: {$begin} to {$end}, Monthly";
			}elseif($period_type == 4){
				$date_1 = date('Y-m-d', strtotime($begin. " + {$x} years"));
				$date_2 = date('Y-m-d', strtotime($begin. " + {$y} years"));
				$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
				$day = date('Y-m-d', strtotime($begin. " + {$y} years"));
				if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
				$total_incidents = @SafetyLogsCategories::model()->getLogCountForDays2($id, $date_1, $date_2, $search_option, $search_value);
				$z = date('Y/M/d', strtotime($date_1)).'-'.date('Y/M/d', strtotime($date_2));
				array_push($x_points, $z);
				$title = " From: {$begin} to {$end}, Yearly";
			}
			
			$total_incidents = intval($total_incidents);
			if($total_incidents == null){$total_incidents = 0;}
			
			array_push($y_points, $total_incidents);
			
			$x = $x + 1;
			$y = $x + 1;
			$z = $x + 1;
		}
		$for_return = array();
		$for_return[0]=$y_points;
		$for_return[1]=$x_points;
		return $for_return;
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = SafetyLogsCategories::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}