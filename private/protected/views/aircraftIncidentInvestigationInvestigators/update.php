<?php
/* @var $this AircraftIncidentInvestigationInvestigatorsController */
/* @var $model AircraftIncidentInvestigationInvestigators */

$this->breadcrumbs=array(
	'Aircraft Incident Investigation Investigators'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AircraftIncidentInvestigationInvestigators', 'url'=>array('index')),
	array('label'=>'Create AircraftIncidentInvestigationInvestigators', 'url'=>array('create')),
	array('label'=>'View AircraftIncidentInvestigationInvestigators', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AircraftIncidentInvestigationInvestigators', 'url'=>array('admin')),
);
?>

<h1>Update AircraftIncidentInvestigationInvestigators <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>