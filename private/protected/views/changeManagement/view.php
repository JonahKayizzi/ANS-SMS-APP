
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?>  Safety Assurance
            <small>Change Management #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class=""> Safety Assurance</li>
			<li class="active">Change Management #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<?php /* echo CHtml::link('<i class="fa fa-plus-circle"></i> Affected Areas', array('/cmAffectedAreas/create', 'id'=>$model->id), array('class'=>'btn btn-app')); */ ?>
				
				<!-- <a class="btn btn-app" href="#" data-toggle="modal" data-target="#areas">
					<i class="fa fa-external-link"></i> Affected Areas
				</a> -->
				
				<?php /* echo CHtml::link('<i class="fa fa-plus"></i> Costs', array('/cmCosts/create', 'id'=>$model->id), array('class'=>'btn btn-app')); */ ?>
				
				<!-- <a class="btn btn-app" href="#" data-toggle="modal" data-target="#costs">
					<i class="fa fa-external-link"></i> Costs 
				</a> -->
				
				<?php echo CHtml::link('<i class="fa fa-print"></i> Form 115', array('form115', 'id'=>$model->id), array('target'=>'_blank', 'class'=>'btn btn-app')); ?>
				
				<?php
					$taskform = @Tasks::model()->findByAttributes(array('change_management_id'=>$model->id));
					if(!empty($taskform)){
				?>
					<?php echo CHtml::link('<i class="fa  fa-file-text-o"></i> System &amp; Task Analysis', array('/tasks/view', 'id'=>$taskform->id), array('class'=>'btn btn-app')); ?>
				<?php
					}
				?>
				
				
			</div>
		</div>
          <div class="row">
            <div class="col-xs-9">

              <div class="box">
				
                <div class="box-body">
				
				
				<div class="" style=" width: 100%; margin-top: 2px; padding: 0px; align: center; background-color: #dd4b39; color: #fff;">
					
					<div class="" >
						<div class="modal" id="areas">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Areas affected by change</h4>
							  </div>
							  <div class="modal-body" style="color: #000;">
								<?php
								$areas_affected = @CmAffectedAreas::model()->findAll("change_management_id = '{$model->id}' and status = 1");
								if(!empty($areas_affected)){
									$k=1;
									echo "<table class='table table-stripped'>";
									foreach($areas_affected as $area_affected){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$area_affected->details." </td><td  style=''>".$area_affected->modified." </td><td  style=''>".$area_affected->reported_by." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</table>";	
								}else{
									echo "<p>0 records found. Click ".CHtml::link('here', array('/cmAffectedAreas/create', 'id'=>$model->id))." to add areas affected by change.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>
				
				<div class="" style=" width: 100%; padding: 0px; align: center; color: #fff; background-color: #ff851b;">
					
					
					<div class="" >
						<div class="modal" id="costs">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header" style="background-color: #5cd65c; color: #fff;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Costs</h4>
							  </div>
							  <div class="modal-body" style="color: #000;">
								<?php
								$costs = @CmCosts::model()->findAll("change_management_id = '{$model->id}' and staus = 1");
								if(!empty($costs)){
									$k=1;
									echo "<table class='table table-stripped'>";
									foreach($costs as $cost){
										echo "<tr>";
										echo "<td style='' >{$k}</td><td  style=''>".$cost->item." </td><td  style=''>".$cost->cost." </td><td  style=''>".$cost->unit." </td>";
										echo "</tr>";
										$k++;
									}
									echo "</table>";	
								}else{
									echo "<p>0 records found. Click ".CHtml::link('here', array('rmCosts/create', 'id'=>$model->id))." to add costs.</p>";
								}
								
								?>
							  </div>
							  
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					  </div><!-- /.example-modal -->
					
				</div>

				&nbsp;
				<?php /* $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						'id',
						'originator_name',
						'originator_title',
						'system_equipment_concerned',
						'date_raised',
						'reference_no',
						'change_description',
						'change_justification',
						'back_out_plan',
						'affected_areas',
						'costs',
						'time',
						'proposed_implementer',
						'recommended_by',
						'approved_by',
						'reported_by',
						'recommendation_date',
						'approval_date',
						'modified',
						'status',
					),
				)); */ ?>
				
				<table class="table table-stripped">
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['id']; ?></b>
						</td>
						<td><?php echo $model->id; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['title_of_change']; ?></b>
						</td>
						<td><?php echo @$model->title_of_change; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php /* echo $model->attributeLabels()['affected_areas']; */ ?></b>
						</td>
						<td><?php /* echo @$model->affected_areas; */ ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['division']; ?></b>
						</td>
						<td><?php echo @$model->division; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['costs']; ?></b>
						</td>
						<td><?php echo @$model->costs; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['originator_name']; ?></b>
						</td>
						<td><?php echo @$model->originator_name; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['originator_title']; ?></b>
						</td>
						<td><?php echo @$model->originator_title; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['system_equipment_concerned']; ?></b>
						</td>
						<td><?php echo $model->system_equipment_concerned; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['date_raised']; ?></b>
						</td>
						<td><?php echo $model->date_raised; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['reference_no']; ?></b>
						</td>
						<td><?php echo $model->reference_no; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['change_description']; ?></b>
						</td>
						<td><?php echo $model->change_description; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['change_justification']; ?></b>
						</td>
						<td><?php echo $model->change_justification; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['back_out_plan']; ?></b>
						</td>
						<td><?php echo $model->back_out_plan; ?></td>
					</tr>
					
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['time']; ?></b>
						</td>
						<td><?php echo $model->time; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['proposed_implementer']; ?></b>
						</td>
						<td><?php echo $model->proposed_implementer; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['recommended_by']; ?></b>
						</td>
						<td><?php echo $model->recommended_by; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['approved_by']; ?></b>
						</td>
						<td><?php echo $model->approved_by; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['reported_by']; ?></b>
						</td>
						<td><?php echo $model->reported_by; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['recommendation_date']; ?></b>
						</td>
						<td><?php echo $model->recommendation_date; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['approval_date']; ?></b>
						</td>
						<td><?php echo $model->approval_date; ?></td>
					</tr>
					<tr>
						<td>
							<b><?php echo $model->attributeLabels()['modified']; ?></b>
						</td>
						<td><?php echo $model->modified; ?></td>
					</tr>
				</table>
                  
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