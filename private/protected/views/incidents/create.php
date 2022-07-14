<?php
/* @var $this IncidentsController */
/* @var $model Incidents */

$this->breadcrumbs=array(
	'Incidents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Report Incident', 'url'=>array('create')),
	array('label'=>'Show Incoming Incidents', 'url'=>array('index')),
	array('label'=>'Show Pending Incidents', 'url'=>array('index','status'=>2)),
	array('label'=>'Show Initiated Incidents', 'url'=>array('index','status'=>3)),
	array('label'=>'Show Monitored Incidents', 'url'=>array('index','status'=>4)),
	array('label'=>'Show Closed Incidents', 'url'=>array('index','status'=>5)),
	
);
?>

<script type="text/javascript">

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

var data = {
  "issue": "Issue",
  "incident": "Accident,Minor,Serious,Other",
  "hazard" : "OSHE,Aviation"
}
$( document ).ready(function() {
var type = getUrlParameter('type');

switch(type) {
			case 'Issue':
				vals = ['Issue'];
				break;
			case 'Incident':
				vals = data.incident.split(",");
				break;
			case 'Hazard':
				vals = data.hazard.split(",");
				break;
			case 'none':
				val = ['Please Choose from Above']
		}
		
		var $category = $("#Incidents_category_id");
		$category.empty();

		$.each(vals, function(index, value) {
			$category.append("<option>" + value + "</option>");

	});
});



$(document).on('change','#Incidents_main_category',function() {
	var $dropdown = $(this);

	
		var key = $dropdown.val();
                if(!key){
                   key = 'none';
                }
		var vals = [];
							
		switch(key) {
			case 'Issue':
				vals = ['Issue'];
				break;
			case 'Incident':
				vals = data.incident.split(",");
				break;
			case 'Hazard':
				vals = data.hazard.split(",");
				break;
			case 'none':
				val = ['Please Choose from Above']
		}
		
		var $category = $("#Incidents_category_id");
		$category.empty();

		$.each(vals, function(index, value) {
			$category.append("<option>" + value + "</option>");

	});
});



</script>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Occurrences</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Occurrences</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Report Occurrence</h3>
				  
                </div><!-- /.box-header -->
				
                <div class="box-body">
				<?php
				if(isset($_GET['sub'])){
					if($_GET['sub'] == 1){
				?>
					<div style="width: 100%; padding: 5px; border: 1px #ccc solid; background-color: #eee; margin-bottom: 7px;">
						<b>Parent Occurrence No.: </b> <?php $incident = $_GET['incident']; $incident_info = @Incidents::model()->findByPk($incident); echo $incident; ?><br />
						<b>Details: </b> <?php echo CHtml::link($incident_info->occurrence, array('/incidents/view', 'id'=>$incident)); ?> <i>(Click to view)</i><br />
						<b>Place: </b> <?php echo $incident_info->place; ?><br />
					</div>
				<?php
					}
				}
				?>
                <?php $this->renderPartial('_form', array('model'=>$model , 'incident'=>@$incident_info)); ?>
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