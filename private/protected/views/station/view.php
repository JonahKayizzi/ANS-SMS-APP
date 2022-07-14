
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Audit Schedule #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Audit Schedule #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				<?php
					echo CHtml::link('<i class="fa fa-print"></i> Print Audit Schedule', array('/station/print', 'id'=>$model->id), array('target'=>'_blank', 'class'=>'btn btn-app'));
				?>
			</div>
		</div>
          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				<?php
					if(isset($_GET['del_auditor'])){
						if($_GET['del_auditor'] == 1){
							if(isset($_GET['auditor_id'])){
								if(@EvaluationAuditors::model()->updateByPk($_GET['auditor_id'], array('status'=>0))){
				?>
				<div class="callout callout-success">
					<p>Auditor has been successfully removed from audit schedule item.</p>
				  </div>
				<?php
								}
							}
						}
					}
				?>
				
				<?php
					if(isset($_GET['del_item'])){
						if($_GET['del_item'] == 1){
							if(isset($_GET['item_id'])){
								if(@EvaluationDate::model()->updateByPk($_GET['item_id'], array('status'=>0))){
				?>
				<div class="callout callout-success">
					<p>Audit schdule item has been successfully removed from audit schedule.</p>
				  </div>
				<?php
								}
							}
						}
					}
				?>
				
			<table class="table table-stripped" style="margin-bottom: 10px;" >
				<tr>
					<td><b>Audit Plan #<?php echo $model->audit_plan_id; ?></b></td>
					<td><?php $plan_info = @AuditPlan::model()->findByPk($model->audit_plan_id); echo CHtml::link(@$plan_info->title, array('/auditPlan/view', 'id'=>@$model->audit_plan_id)).' << <i>Click to view details.</i>'; ?></td>
				</tr>
			</table>
			
<table class="table table-stripped" id="yw0">
	<tbody><tr class="odd" style="background-color: #ccc;" ><th>Date</th><th>Time</th><th>Activities</th><th>Auditors</th><th>Auditees</th><th>Venue</th><th></th></tr>
<?php
$items = @EvaluationDate::model()->findAll("status = 1 and station_id = '{$model->id}'");
/* foreach ($model->auditDates as $item) { */
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
<li><?php echo $auditor->user_relation->name; ?> <?php echo CHtml::link('<img src="images/delete.png" alt="Delete" />', array('/station/view', 'id'=>$model->id, 'del_auditor'=>1, 'auditor_id'=>$auditor->id), array('confirm'=>'Are you sure?')); ?></li>

	<?php
}
}
?>
<li><?php 
echo CHtml::link('<img src="images/add.png" alt="+Add Auditor" />', '#', array(
   'onclick'=>'$("#addAuditor'.$item->id.'").dialog("open"); return false;',
));
?></li>
</td><td style="border-bottom: 1px #ccc solid;">


<?php
foreach ($item->auditors as $auditor) {
	if(($auditor->status == 1) && ($auditor->auditee == 1)){
	?>
<li><?php echo $auditor->user_relation->name; ?> <?php echo CHtml::link('<img src="images/delete.png" alt="Delete" />', array('/station/view', 'id'=>$model->id, 'del_auditor'=>1, 'auditor_id'=>$auditor->id), array('confirm'=>'Are you sure?')); ?></li>

	<?php
}
}
?>
<li><?php 
echo CHtml::link('<img src="images/add.png" alt="+Add Auditee" />', '#', array(
   'onclick'=>'$("#addAuditee'.$item->id.'").dialog("open"); return false;',
));
?></li>
</td><td style="border-bottom: 1px #ccc solid;"><?php
echo $item->venue;
?></td><td style="border-bottom: 1px #ccc solid;"><?php
echo CHtml::link('<img src="images/delete.png" alt="Delete" />', array('/station/view', 'id'=>$model->id, 'del_item'=>1, 'item_id'=>$item->id), array('confirm'=>'Delete Audit Plan Item?'));
?></td></tr>
<?php
$this->renderPartial('addEvaluationAuditor', array('station' => $model,'date'=>$item ,'model'=> new EvaluationAuditors()));
$this->renderPartial('addEvaluationAuditee', array('station' => $model,'date'=>$item ,'model'=> new EvaluationAuditors()));
?>

<?php
}
}
?>


</tbody></table>
<?php

?>



<?php
$this->renderPartial('addEvaluationDate', array('station' => $model,'model'=> new EvaluationDate()));
?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="col-xs-3">
				
				<div class="box box-default">
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Operations</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
						<li><?php echo CHtml::link('All Entries', array('/'.Yii::app()->getController()->getId().'/admin')); ?></li>
						<li><?php echo CHtml::link('New Entry', array('/'.Yii::app()->getController()->getId().'/create')); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				 
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->