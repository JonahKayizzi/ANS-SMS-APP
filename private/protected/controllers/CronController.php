<?php
class CronController extends CController
{
public function actionIndex()
{

	//echo "This has been run";

}

public function actionActionNoitifications()
{

	$models=Actions::getActionsTwoDays();
	//print_r(count($models));
	foreach ($models as $key) {
		# code...
		$users=Incidents::getUserResponsible($key->incident_id);
		foreach ($users as  $value) {
			# code...
		$notification = new Notifications;
		$notification->user=$value->name;
		$notification->user_from=1;
		$notification->subject='Mitigation Action Remider 2days';
		$notification->description='Remaider to Check On Implementation'.$key->details;
		$notification->save();
		}
		


	}

	$models=Actions::getActionsToday();
	
	foreach ($models as $key) {
		# code...
				//echo $key->details."<br/>";
		$users=Incidents::getUserResponsible($key->incident_id);
		foreach ($users as  $value) {
			# code...
		$notification = new Notifications;
		$notification->user=$value->name;
		$notification->user_from=1;
		$notification->urgent=1;
		$notification->subject='URGENT!! Mitigation Action Remider Today';
		$notification->description='Remaider to Check On Implementation'.$key->details;
		$notification->save();
}

	}



}


public function actionAuditNoitifications()
{
	$model=EvaluationDate::getAuditorsTwoDays();
	foreach ($model as $user) {
		//echo $user;
		# code...
		$notification = new Notifications;
		$notification->user=$user;
		$notification->user_from=1;
		$notification->subject='Audit Remider 2 days';
		$notification->description='Remaider to do autdit in two days';
		$notification->save();


	}

	$model=EvaluationDate::getAuditorsToday();
	foreach ($model as $user) {
		# code...
		$notification = new Notifications;
		$notification->user=$user;
		$notification->user_from=1;
		$notification->urgent=1;
		$notification->subject='URGENT!! Audit Remider Today ';
		$notification->description='Remaider to do autdit in today';
		$notification->save();


	}



}

}