
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Residual Risks</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Residual Risks</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
				
                <div class="box-body">
				<?php
					if(isset($_POST['datepicker-showButtonPanel'])){
						$st_dt = $_POST['datepicker-showButtonPanel'];
						$end_dt = $_POST['datepicker-showButtonPanel2'];
					}else{
						$st_dt = date('Y-m-d');
						$end_dt = date('Y-m-d');
					}
				?>
				<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'date',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						<label>From Date:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <?php
							// $date = date('Y-m-d');
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'datepicker-showButtonPanel',
								'value'=>$st_dt,    
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'form-control',
									'style'=>''
								),
							));
							?>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					</div><!-- /.col -->
					<div class="col-md-6">
					  <div class="form-group">
						<label>To Date:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <?php
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'datepicker-showButtonPanel2',
								'value'=>$end_dt,    
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'form-control',
									'style'=>''
								),
							));
							?>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					</div><!-- /.col -->
					
					<div class="col-md-12">
						<button type="submit" class="btn btn-default" style="width: 100%;" >Search</button>
					</div>
					
				  </div><!-- /.row -->
				  <?php $this->endWidget(); ?> 
				</div>
				</div>
				</div>
				</div>
				
				<div class="row">
            <div class="col-xs-12">

              <div class="box">
				
				<div class="box-body">
				<style>
					#dataTable_filter{text-align: right;}
				</style>
				<?php
					if(isset($_POST['datepicker-showButtonPanel'])){
						if($st_dt == $end_dt){
							$effects = @Effects::model()->findAll("status = 1 and date = '{$end_dt}' order by id desc");
						}else{
							$effects = @Effects::model()->findAll("status = 1 and date between '{$st_dt}' and '{$end_dt}' order by id desc");
						}	
					}else{
						$effects = @Effects::model()->findAll("status = 1 order by id desc");
					}
					
					
					if(!empty($effects)){
				?>
				<table class="table table-stripped table-hover" id="dataTable">
					<thead>
					<tr>
						<th>#</th>
						<th>Hazard #</th>
						<th>Hazard Details</th>
						<th>Consequence</th>
						<th>Severity</th>
						<th>Severity Rationale</th>
						<th>Likelihood</th>
						<th>Likelihood Rationale</th>
						<th>Initial Risk</th>
						<th>Predicated Residual Risk</th>
						<th>Substitute Risk</th>
						<th>Reported by</th>
						<th>Date</th>
					</tr>
					</thead>
					<tbody>
				<?php
						$x = 1;
						foreach($effects as $effect){
				?>
					
					<tr>
						<td><?php echo $x; ?></td>
						<td><?php echo CHtml::link(@$effect->hazard->number, array('/incidents/view', 'id'=>$effect->hazard_id)); ?></td>
						<td><?php echo CHtml::link(@$effect->hazard->occurrence, array('/incidents/view', 'id'=>$effect->hazard_id)); ?></td>
						<td><?php echo @$effect->consequence_relation->description; ?></td>
						<td><?php echo @$effect->severity->name.' - '.@$effect->severity->value; ?></td>
						<td>
							<?php
								$severity_rationales = @EffectsSeverityRationales::model()->findAll("status = 1 and effects_id = '{$effect->id}'");
								if(!empty($severity_rationales)){
									echo "<ol>";
									foreach($severity_rationales as $severity_rationale){
										echo "<li>".@$severity_rationale->severityRationale->description."</li>";
									}
									echo "</ol>";
								}
							?>
						</td>
						<td><?php echo @$effect->likelihood->name; ?></td>
						<td><?php echo @$effect->likelihood->rationale; ?></td>
						<td><?php echo $effect->initial_risk_index; ?></td>
						<td><?php echo $effect->predicted_residual_risk_index; ?></td>
						<td><?php echo $effect->substitute_risk; ?></td>
						<td><?php echo $effect->reported_by; ?></td>
						<td><?php echo $effect->date; ?></td>
					</tr>
					
				<?php
						$x++;
						}	
				?>
					</tbody>
				</table>
				<?php
					}
				?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
