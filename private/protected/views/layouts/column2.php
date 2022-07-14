<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = NULL;} ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	
	<div id="sidebar">
	<?php if(Yii::app()->controller->id == 'incidents'){ ?>
		<?php if(Yii::app()->controller->action->id == 'view'){ ?>
	<?php if(isset($_GET['id'])){ ?>
		<?php $incident = @Incidents::model()->findByPk($_GET['id']); ?>
		<div style="text-align: center; background-color: #<?php echo $incident->status0->color; ?>; color: #fff;" ><H1 style="color: #fff;" ><?php echo $incident->status0->name; ?></H1></div>
	<?php } ?>
		<?php } ?>
	<?php } ?>
	
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	
	<?php if(Yii::app()->controller->id == 'incidents'){ ?>
		<?php if(Yii::app()->controller->action->id == 'view'){ ?>
			<div class="portlet" >
				<div class="portlet-decoration">
					<div class="portlet-title">Associated Risk</div>
				</div>
				<div class="portlet-content">
					<ul class="operations" >
						<li><?php echo CHtml::link('Report Associated Risk', array('/incidents/create', 'incident'=>$id, 'sub'=>1), array()); ?></li>
					</ul>
				</div>
				
			</div>
		<?php } ?>
	<?php } ?>
	
	<!--
	<?php if(Yii::app()->controller->id == 'incidents'){ ?>
		<?php if(Yii::app()->controller->action->id == 'view'){ ?>
			<div class="portlet" >
				<div class="portlet-decoration">
					<div class="portlet-title">Incident Investigations</div>
				</div>
				<div class="portlet-content">
					<ul class="operations" >
					
						<li><?php echo CHtml::link('Data Collection', array('/smsForm124Data/create', 'incident'=>$id), array()); ?></li>
						<li><?php echo CHtml::link('Contributing Factors', array('/smsForm124ContributingFactors/create', 'incident'=>$id), array()); ?></li>
						<li><?php echo CHtml::link('Corrective Actions', array('/smsForm124CorrectiveActions/create', 'incident'=>$id), array()); ?></li>
						<li><?php echo CHtml::link('Analysis Checklist', array('/smsForm124DataAnalysisChecklist/create', 'incident'=>$id), array()); ?></li>
						<li><?php echo CHtml::link('Additional Comments', array('/smsForm124Comments/create', 'incident'=>$id), array()); ?></li>
					</ul>
				</div>
				<div class="portlet-content">
					<ul class="operations" >
						<li><?php echo CHtml::link('Print SMS FORM 124', array('/incidents/form124/', 'id'=>$id), array('target'=>'_blank')); ?></li>
					</ul>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
	-->
	
	<div class="portlet" >
		<?php 
			$cont = Yii::app()->controller->id ; 
			$comp = "audit";
			$pos = strpos($cont, $comp);

			if($pos===false and  @Yii::app()->controller->module->id =='TrendAnalysis'){

				$pos=true;
			}

		?>
		
		<?php if( $pos === false) { ?>
		<div class="portlet-decoration">
			<div class="portlet-title">Reports</div>
		</div>
		<div class="portlet-content">
			<ul class="operations" >
				<?php if(Yii::app()->controller->id == 'incidents'){ ?>
					<?php if(Yii::app()->controller->action->id == 'view'){ ?>
				<li><?php echo CHtml::link('Situation Report, Form 116', array('/site/sitrep', 'incident'=>$id), array('target'=>'_blank')); ?></li>

				<li><?php echo CHtml::link('Form 122', array('incidents/form122', 'incident'=>$id), array('target'=>'_blank')); ?></li>
					
				<li><?php echo CHtml::link('Hazard Report, Form 120', array('/site/hazardReport', 'incident'=>$id), array('target'=>'_blank')); ?></li>
					
				<?php $sod = @SafetyOccurrenceData::model()->find("incident_id = '{$id}' and status = 1"); ?>
					<?php if(empty($sod)){ ?>
						<!-- <li><?php echo CHtml::link('Safety Occurrence Data', array('/safetyOccurrenceData/create', 'incident'=>$id), array('target'=>'_blank')); ?></li> -->
					<?php }else{ ?>
						<!-- <li><?php echo CHtml::link('Safety Occurrence Data', array('/safetyOccurrenceData/update', 'id'=>$sod->id, 'incident'=>$id, 'edit'=>'yes'), array('target'=>'_blank')); ?></li> -->
					<?php } ?>
					<?php } ?>
				<?php } ?>
				<li><?php echo CHtml::link('SMS Form 123', array('/safetyRecommendations/report'), array('target'=>'_blank')); ?></li>
				<li><?php echo CHtml::link('Hazard Register, Form 125', array('/site/hazardRegister'), array('target'=>'_blank')); ?></li>
<li><?php echo CHtml::link('Hazard Worksheet', array('/site/hazardWorksheet'), array('target'=>'_blank')); ?></li>
				<!--<li><?php echo CHtml::link('Safety Logs Summary', array('/site/incidentSummary'), array('target'=>'_blank')); ?></li>-->
			</ul>
			</div>
		<?php } if(Yii::app()->controller->id=="auditPlan"){?>
					
				<?php 
				$action = Yii::app()->controller->action->id ;
				if( $action == "view" || $action == "update" ) { ?>
					<div class="portlet-decoration">
			<div class="portlet-title">Reports</div>
		</div>
		<div class="portlet-content">
					<ul class="operations" >
						<li><?php echo CHtml::link('Print Audit Plan', array( 'auditPlan/print','id'=>$id), array('target'=>'_blank')); ?></li>
					</ul>	
					</div>
				<?php } ?>
				
		<?php } 
		if(Yii::app()->controller->id=="auditForm"){?>
				
				<?php 
				$action = Yii::app()->controller->action->id ;
				if( $action == "view" || $action == "update" ) { ?>
						<div class="portlet-decoration">
			<div class="portlet-title">Reports</div>
		</div>
		<div class="portlet-content">
					<ul class="operations" >
						<li><?php echo CHtml::link('Print Audit Form', array('auditForm/print','issue_no'=>$id), array('target'=>'_blank')); ?></li>
					</ul>
</div>					
				<?php } ?>
				
		<?php } 
		
		 ?>
		
	</div>
	
	<?php if(isset($_GET['id']) && strpos(Yii::app()->controller->id,'incident') !== false ){ ?>
	<div class="portlet" >
		<div class="portlet-decoration">
			<div class="portlet-title">Accident &amp; Incident Investigation</div>
		</div>
		<div class="portlet-content">
			<ul class="operations" >
				
				<?php $form124data = @SmsForm124Data::model()->find("incident_id = '{$_GET['id']}' and status = 1"); ?>
					<?php if(empty($form124data)){ ?>
						<li><?php echo CHtml::link('Data Collection', array('/smsForm124Data/create', 'incident'=>$id)); ?></li>
					<?php }else{ ?>
						<li><?php echo CHtml::link('Data Collection', array('/smsForm124Data/update', 'id'=>$form124data->id, 'incident'=>$id, 'edit'=>'yes')); ?></li>
					<?php } ?>
				
				<li><?php echo CHtml::link('Contributing Factors', array('/smsForm124ContributingFactors/create', 'incident'=>$id)); ?></li>
				<li><?php echo CHtml::link('Corrective Actions', array('/smsForm124CorrectiveActions/create', 'incident'=>$id)); ?></li>
				
				<?php $form124data = @SmsForm124DataAnalysisChecklist::model()->find("incident_id = '{$_GET['id']}' and status = 1"); ?>
					<?php if(empty($form124data)){ ?>
						<li><?php echo CHtml::link('Analysis Checklist', array('/smsForm124DataAnalysisChecklist/create', 'incident'=>$id)); ?></li>
					<?php }else{ ?>
						<li><?php echo CHtml::link('Analysis Checklist', array('/smsForm124DataAnalysisChecklist/update', 'id'=>$form124data->id, 'incident'=>$id, 'edit'=>'yes')); ?></li>
					<?php } ?>
				
				<li><?php echo CHtml::link('Additional Comments', array('/smsForm124Comments/create', 'incident'=>$id), array()); ?></li>
			</ul>
		</div>
<!-- 		<div class="portlet-content">
			<ul class="operations" >
				<li><?php echo CHtml::link('Print SMS FORM 124', array('/incidents/form124/', 'id'=>$id), array('target'=>'_blank')); ?></li>
			</ul>
		</div> -->
	</div>
	<?php } ?>
	
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>