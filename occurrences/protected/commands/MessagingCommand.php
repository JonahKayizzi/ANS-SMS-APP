<?php
class MessagingCommand extends CConsoleCommand{
	
	public function actionProcess(){
		
		$steps = 100; //number of records processed per interval
		
		$incidents = @Incidents::model()->findAll("msgs = 0");
		
		foreach($incidents as $row){
			$category = $row->main_category;
			
			//send mail to safety officers 
					$safety_officers = @Users::model()->findAll("status = 1 and user_department_id = 1");
					
					$subject = "NEW {$category}";
					$reported_by = $row->reported_by_name;
					$body = "A new {$category} has been submitted by {$reported_by}. \r\n\r\n".
							"{$category} ID: {$row->id}\r\n".
							"Details: {$row->occurrence}";
					
					@Notifications::model()->sendGroupEmails($safety_officers, $subject, $body);
					@Notifications::model()->sendEmail('sms-dans@caa.co.ug', $subject, $body);
					//@mail('sms-dans@caa.co.ug', $subject, $body);
					
					//send notifications to safety officers
					$notification_subject = $subject;
					$notification_description = "A new {$category} has been submitted by {$reported_by}. {$category} ID: {$row->id}. {$category} details: {$row->occurrence}";
					
					@Notifications::model()->sendGroupNotificationsConsole($safety_officers, $notification_subject, $notification_description, 0);
					
					//send mail to sender
					@Notifications::model()->sendEmail($row->reported_by_email, $subject, $body);
					//@mail($model->reported_by_email, $subject, $body);
					
					//send notification to sender
					@Notifications::model()->sendNotificationConsole($notification_subject, $notification_description, $row->reported_by_id, 'GROUP', 0, $row->reported_by_id);	
					
					@Incidents::model()->updateByPk($row->id, array('msgs'=>1));
					
		}
		
		
	}
	
	
}
?>