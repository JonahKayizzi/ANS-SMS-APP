<?php
/**
 * Trend Analysis class.
 * Trend Analysis  data structure for keeping
 * trend data .
 */
class TrendAnalysis extends CFormModel
{
	public $selectionType;
	public $fromDate;
	public $toDate;
	public $year;
	public $chatType;
	public $title;

		/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('selectionType,chatType', 'required'),
			// rememberMe needs to be a boolean
			array('year,fromDate,toDate,title', 'safe'),
		
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'selectionType'=>'Peroid Type',
			'fromDate'=>'From',
			'chatType'=>'Chat Type',
			'year'=>'Year',
			'toDate'=>'To',
		);
	}


	public function getHazardCategories(){
		if($this->selectionType=='year'){
			$oshe_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'OSHE' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$aviation_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'AVIATION' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
		}
		else{

		$oshe_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'OSHE' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
		$aviation_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'AVIATION' and date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )";	
		}


		$oshe = Yii::app()->db->createCommand($oshe_sql)->queryAll();
		$aviation = Yii::app()->db->createCommand($aviation_sql)->queryAll();
		
		$model= array('oshe' =>  $this->getCountArray($oshe), 'aviation'=>$this->getCountArray($aviation));


		return array('data' => $model ,'labels'=>$this->getDataLbels());

	}

		public function getReportCategories(){
		if($this->selectionType=='year'){
			$reported_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE reported =  'Yes' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$not_reported_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE reported =  'No' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
		}
		else{

		$reported_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE reported =  'Yes' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
		$not_reported_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE reported =  'No' and date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )";	
		}


		$reported = Yii::app()->db->createCommand($reported_sql)->queryAll();
		$not_reported = Yii::app()->db->createCommand($not_reported_sql)->queryAll();
		
		$model= array('reported' =>  $this->getCountArray($reported), 'not_reported'=>$this->getCountArray($not_reported));


		return array('data' => $model ,'labels'=>$this->getDataLbels());

	}

	public function getIssueCategories(){

		if($this->selectionType=='year'){
			$minor_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'MINOR' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$serious_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'SERIOUS' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$other_sql = "SELECT COUNT( * ) AS `count`  FROM  `incidents` WHERE category =  'Other' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$none_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'None' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
 
		}
		else{
			$minor_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'MINOR' and   date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
			$serious_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'SERIOUS' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
			$other_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE category =  'Other' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
			$none_sql = "SELECT COUNT( * ) AS `count`  FROM  `incidents` WHERE category =  'None' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
		
		}

		$minor = Yii::app()->db->createCommand($minor_sql)->queryAll();
		$serious = Yii::app()->db->createCommand($serious_sql)->queryAll();
		$other = Yii::app()->db->createCommand($other_sql)->queryAll();
		$none = Yii::app()->db->createCommand($none_sql)->queryAll();

		
		$model= array('minor' =>  $this->getCountArray($minor), 'serious'=>$this->getCountArray($serious),'none'=>$this->getCountArray($none),'other'=>$this->getCountArray($other));


		return array('data' => $model ,'labels'=>$this->getDataLbels());
	}

public function getStatusCategories(){

		if($this->selectionType=='year'){
			$pending_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE status =  '2' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$incoming_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE status =  '1'   and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$monitored_sql = "SELECT COUNT( * ) AS `count`  FROM  `incidents` WHERE status =  '4' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$initiated_sql = "SELECT COUNT( * ) AS `count`  FROM  `incidents` WHERE status =  '3' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
			$closed_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE status =  '5' and YEAR(date) = ".$this->year." GROUP BY MONTH( DATE )"; 
 
		}
		else{
			$pending_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE status =  '2' and   date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
			$incoming_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE status =  '1' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
			$monitored_sql = "SELECT COUNT( * ) AS `count` FROM  `incidents` WHERE status =  '4' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
			$initiated_sql = "SELECT COUNT( * ) AS `count`  FROM  `incidents` WHERE status =  '3' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
			$closed_sql = "SELECT COUNT( * ) AS `count`  FROM  `incidents` WHERE status =  '5' and  date BETWEEN '".$this->fromDate."' AND '".$this->toDate."' GROUP BY WEEKDAY( DATE )"; 
		
		}

		$pending = Yii::app()->db->createCommand($pending_sql)->queryAll();
		$incoming = Yii::app()->db->createCommand($incoming_sql)->queryAll();
		$monitored = Yii::app()->db->createCommand($monitored_sql)->queryAll();
		$initiated = Yii::app()->db->createCommand($initiated_sql)->queryAll();
		$closed = Yii::app()->db->createCommand($closed_sql)->queryAll();

		
		$model= array('pending' =>  $this->getCountArray($pending),
					  'incoming'=>$this->getCountArray($incoming),
					  'monitored'=>$this->getCountArray($monitored),
					  'initiated'=>$this->getCountArray($initiated),
					  'closed'=>$this->getCountArray($closed));


		return array('data' => $model ,'labels'=>$this->getDataLbels());
	}


	    public static function getYearsArray()
    {
        $thisYear = date('Y', time());
 
        for($yearNum = $thisYear; $yearNum >= 2010; $yearNum--){
            $years[$yearNum] = $yearNum;
        }
 
        return $years;
    }

	private function getDataLbels(){
		if($this->selectionType=='year')
			return $this->getMonths();
		else
			return $this->getDays();


	}

	private function getMonths(){

		$months=[];
		for($m=1; $m<=12; ++$m){
 			array_push($months,date('F', mktime(0, 0, 0, $m, 1)));
		}

		return $months;
		}

	private function getDays(){


		return array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday', 'Saturday');
		}

	private function getCountArray($model){
		$values=[];
		foreach ($model as $data) {
			array_push($values, $data['count']);
		}

		return $values;
	}



}