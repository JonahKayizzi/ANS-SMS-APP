<?php
class ScheduleCommand extends CConsoleCommand{
	
	public function actionProcess(){
		/* $this->notifyForIncidentReviewDates(); */
		$this->notifyForSafetyRequirementsNextReviewDates();
		$this->notifyForIncidentMitigationImplementation();
		$this->notifyForAuditSchedules();
		//$this->closeOldHazards();
	}
	
	public function closeOldHazards(){
		//set status = 5 (closed) for all hazards older than 1 year, that is, send to hazard register_shutdown_function
		$hazards = @Incidents::model()->findAll("main_category = 'Hazard' and status != 5");
		$today = date('Y-m-d');
		foreach($hazards as $hazard){
			$reported_on = $hazard->date;
			if((abs((strtotime($today) - strtotime($reported_on))/(60*60*24)) == 365)){
				@Incidents::model()->updateByPk($hazard->id, array('status'=>5));
			}
		}
	}
	
	public function notifyForIncidentReviewDates(){
		$today = date('Y-m-d');
		$reviewDates = @ReviewDates::model()->findAll();
		foreach($reviewDates as $reviewDate){
			$rDate = $reviewDate->review_date;
			$rOccurrence = $reviewDate->ocurrence;
			
			//get occurrence info
			$occurrence_info = @Incidents::model()->findByPk($rOccurrence);
			$occurrernce_main_category = $occurrence_info->main_category;
			$occurrence_details = $occurrence_info->occurrence;
			
			$rRemark = $reviewDate->remark;
			
			$date1 = date_create($today);
			$date2 = date_create($rDate);
			$date_difference = date_diff($date1,$date2);
			
			//two days before
			if(((abs((strtotime($today) - strtotime($rDate))/(60*60*24)) == 0))||(abs((strtotime($today) - strtotime($rDate))/(60*60*24)) == 1)||(abs((strtotime($today) - strtotime($rDate))/(60*60*24)) == 7)){
				//send email and notification to sms staff
				//send mail to safety officers 
				$safety_officers = @Users::model()->findAll("status = 1 and user_department_id = 1");
				
				
				$subject = "URGENT!! {$occurrernce_main_category} Review";
				$body = "Please be notified that {$occurrernce_main_category} #{$rOccurrence} is set to be reviewed on {$rDate}. \r\n\r\n".
						"{$occurrernce_main_category} ID: {$rOccurrence}\r\n".
						"Details: {$occurrence_details}";
				
				Notifications::model()->sendGroupEmails($safety_officers, $subject, $body);
				
				//send notifications to safety officers
				$notification_subject = $subject;
				$notification_description = "Please be notified that {$occurrernce_main_category} #{$rOccurrence} is set to be reviewed on {$rDate}. <br /><br />{$occurrernce_main_category} ID: {$rOccurrence}. <br />Details: {$occurrence_details}";
				
				Notifications::model()->sendGroupNotifications_Console($safety_officers, $notification_subject, $notification_description, 1);
			}
		}
	}
	
	public function notifyForSafetyRequirementsNextReviewDates(){
		$today = date('Y-m-d');
		$reviewDates = @SafetyRequirementsNextReviewDates::model()->findAll();
		foreach($reviewDates as $reviewDate){
			$rDate = $reviewDate->next_review_date;
			$rSafetyRequirement = @$reviewDate->safety_requirement_id;
			
			$safety_requirement_detail = @$reviewDate->safetyRequirement->mitigation;
			$safety_requirement_source = @$reviewDate->safetyRequirement->source;
			
			$rRemark = $reviewDate->comment;
			
			$date1 = date_create($today);
			$date2 = date_create($rDate);
			$date_difference = date_diff($date1,$date2);
			
			//two days before
			if(((abs((strtotime($today) - strtotime($rDate))/(60*60*24)) == 1))||(abs((strtotime($today) - strtotime($rDate))/(60*60*24)) == 3)||(abs((strtotime($today) - strtotime($rDate))/(60*60*24)) == 7)){
				//send email and notification
				$safety_officers = @Users::model()->findAll("status = 1");
				
				
				$subject = "REMINDER!! SAFETY REQUIREMENT NEXT REVIEW DATE";
				$body = "Please be notified that safety requirement #{$rSafetyRequirement} (Brief: {$safety_requirement_detail}, Source: {$safety_requirement_source}) is set to be reviewed on {$rDate}.";
				
				Notifications::model()->sendGroupEmails($safety_officers, $subject, $body);
				
				//send notifications to safety officers
				$notification_subject = $subject;
				$notification_description = $body;
				
				Notifications::model()->sendGroupNotifications_Console($safety_officers, $notification_subject, $notification_description, 1);
			}
		}
	}
	
	public function notifyForIncidentMitigationImplementation(){
		$today = date('Y-m-d');
		$actionDates = @Actions::model()->findAll();
		foreach($actionDates as $actionDate){
			$deadline = $actionDate->deadline;
			$rOccurrence = $actionDate->incident_id;
			$implementation = $actionDate->details;
			
			//get occurrence info
			$occurrence_info = @Incidents::model()->findByPk($rOccurrence);
			$occurrernce_main_category = $occurrence_info->main_category;
			$occurrence_details = $occurrence_info->occurrence;
			
			
			$date1 = date_create($today);
			$date2 = date_create($deadline);
			$date_difference = date_diff($date1,$date2);
			
			//two days before
			if(((abs((strtotime($today) - strtotime($deadline))/(60*60*24)) == 0))||(abs((strtotime($today) - strtotime($deadline))/(60*60*24)) == 1)||(abs((strtotime($today) - strtotime($deadline))/(60*60*24)) == 7)){
				//send email and notification to sms staff
				//send mail to safety officers 
				$safety_officers = @Users::model()->findAll("status = 1");
				
				
				$subject = "URGENT!! {$occurrernce_main_category} Mitigation Implementation Deadline";
				$body = "Please be notified that {$occurrernce_main_category} #{$rOccurrence} has a Mitigation Implementation deadline on {$deadline}. \r\n\r\n".
						"{$occurrernce_main_category} ID: {$rOccurrence}\r\n".
						"{$occurrernce_main_category} Details: {$occurrence_details}\r\n".
						"Implementation Details: {$implementation}\r\n";
				
				Notifications::model()->sendGroupEmails($safety_officers, $subject, $body);
				
				//send notifications to safety officers
				$notification_subject = $subject;
				$notification_description = "Please be notified that {$occurrernce_main_category} #{$rOccurrence} is set to be reviewed on {$deadline}. <br /><br />{$occurrernce_main_category} ID: {$rOccurrence}. <br />{$occurrernce_main_category} Details: {$occurrence_details}. <br />Implementation Details: {$implementation}";
				
				Notifications::model()->sendGroupNotifications_Console($safety_officers, $notification_subject, $notification_description, 1);
			}
		}
	}
	
	public function notifyForAuditSchedules(){
		$today = date('Y-m-d');
		$actionDates = @EvaluationDate::model()->findAll();
		foreach($actionDates as $actionDate){
			$deadline = $actionDate->date;
			$schedule_id = $actionDate->station_id;
			
			//get occurrence info
			$schedule_info = @Station::model()->findByPk($schedule_id);
			$schedule_name = @$schedule_info->name;
			
			
			$date1 = date_create($today);
			$date2 = date_create($deadline);
			$date_difference = date_diff($date1,$date2);
			
			//two days before
			if(((abs((strtotime($today) - strtotime($deadline))/(60*60*24)) == 0))||(abs((strtotime($today) - strtotime($deadline))/(60*60*24)) == 1)||(abs((strtotime($today) - strtotime($deadline))/(60*60*24)) == 7)){
				//send email and notification to sms staff
				//send mail to safety officers 
				$safety_officers = @EvaluationAuditors::model()->findAll("status = 1 and station_id = {$schedule_id}");
				
				foreach($safety_officers as $safety_officer){
					$subject = "URGENT!! Audit Schedule Reminder";
					$body = "Please be notified that there is an activity/activities on Audit Schedule #{$schedule_id}, {$schedule_name} on {$deadline}.";
					
					Notifications::model()->sendEmail(@$safety_officer->user_relation->email, $subject, $body);
					
					//send notifications to safety officers
					$notification_subject = $subject;
					$notification_description = "Please be notified that there is an activity/activities on Audit Schedule #{$schedule_id}, {$schedule_name} on {$deadline}.";
					
					Notifications::model()->sendNotification_Console($notification_subject, $notification_description, $safety_officer, 'GROUP', 1);
				}
			}
		}
	}
}
?>