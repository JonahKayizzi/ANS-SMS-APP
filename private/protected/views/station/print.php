<?php if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = NULL;} ?>
<?php
header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=".rand().".doc");
		header("Pragma: no-cache");
		header("Expires: 0");
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<div style="width :90%;  margin:auto">
&nbsp;
<h3 style="text-align: center;" ><?php $audit_schedule_info = @Station::model()->findByAttributes(array('id'=>$id)); echo @$audit_schedule_info->name; ?></h3>
<table class="table table-stripped" id="yw0" style="width: 100%;" >
	<tbody><tr class="odd" style="background-color: #ccc;" ><th>Date</th><th>Time</th><th>Activities</th><th>Auditors</th><th>Auditees</th><th>Venue</th></tr>
<?php
$items = @EvaluationDate::model()->findAll("status = 1 and station_id = '{$id}'");
foreach ($items as $item) {
	if($item->status == 1){
?>
<tr class="even"><td style="border-bottom: 1px #ccc solid;"><?php
echo $item->date;
?></td><td style="border-bottom: 1px #ccc solid;"><?php
echo $item->type;
?></td><td style="border-bottom: 1px #ccc solid;"><?php
echo $item->activities;
?></td><td style="border-bottom: 1px #ccc solid;">


<?php
foreach ($item->auditors as $auditor) {
	if(($auditor->status == 1) && ($auditor->auditee == 0)){
	?>
<li><?php echo $auditor->user_relation->name; ?> </li>

	<?php
}
}
?>

</td><td style="border-bottom: 1px #ccc solid;">


<?php
foreach ($item->auditors as $auditor) {
	if(($auditor->status == 1) && ($auditor->auditee == 1)){
	?>
<li><?php echo $auditor->user_relation->name; ?> </li>

	<?php
}
}
?>

</td><td style="border-bottom: 1px #ccc solid;"><?php
echo $item->venue;
?></td></tr>


<?php
}
}
?>


</tbody></table>
</div>