
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Safety Logs</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Safety Logs</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'search',
					'htmlOptions'=>array(
					   'style'=>'display:inline!important;'
					))); ?>
				<div class="row">
					<div class="col-md-12">
						<?php /* echo $form->errorSummary($search_model); */ ?>
					</div>
					
					<div class="col-md-6">
					  <div class="form-group">
						<label>From Date:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <?php
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'start_date',
								'value'=>$start_date,     
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'form-control'
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
								'name'=>'end_date',
								'value'=>$end_date,     
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'form-control'
								),
							));
							?> 
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					</div><!-- /.col -->
					
					<div class="col-md-6">
						<?php echo CHtml::dropDownList('search_field1','',SafetyLogs::getFields(),array('class'=>'form-control')); ?>
					</div>
					<div class="col-md-6">
						<input type="text" name="search_criteria1" class="form-control" style="margin: 5px 0px 5px 0px;" />
					</div>
					<div class="col-md-6">
						<?php echo CHtml::dropDownList('search_field2','',SafetyLogs::getFields(),array('class'=>'form-control')); ?>
					</div>
					<div class="col-md-6">
						<input type="text" name="search_criteria2" class="form-control" style="margin: 5px 0px 5px 0px;" />
					</div>
					
					<div class="col-md-6">
						<?php echo CHtml::dropDownList('search_category','',SafetyLogsCategories::getOptionsCategories(),array('class'=>'form-control')); ?>
					</div>
					
					<div class="col-md-6">
						<?php echo CHtml::dropDownList('search_cause','',SafetyLogsCauses::getOptionsCauses(),array('class'=>'form-control')); ?>
					</div>
					
					<div class="col-md-12">
						&nbsp;
					</div>
					
					<div class="col-md-12">
						<input type="submit" value="Search" class="form-control" style="background-color: #ccc;" />
					</div>
					
				  </div><!-- /.row -->
				<?php $this->endWidget(); ?>
				<?php  
					$imageUrl_edit = Yii::app()->request->baseUrl.'/images/1463413089_icon-136-document-edit.png'; 
					$image_edit = '<img src="'.$imageUrl_edit.'" width="17px" alt="[-Edit]" />'; 
					$imageUrl_view = Yii::app()->request->baseUrl.'/images/1463413137_icon-111-search.png'; 
					$image_view = '<img src="'.$imageUrl_view.'" width="17px" alt="[-Edit]" />'; 
				?>
				<table class="table table-stripped">
					<thead>
					<tr>
						<td><b>#</b></td>
						<td><b>ID</b></td>
						<td><b>Date</b></td>
						<td><b>Time</b></td>
						<td><b>Aircraft Call Sign</b></td>
						<td><b>Aircraft Type</b></td>
						<td><b>Aircraft Registration</b></td>
						<td><b>Operator</b></td>
						<td><b>Route</b></td>
						<!-- <td><b>Event Description</b></td> -->
						<td><b>Cause</b></td>
						<td><b>Category</b></td>
						<td></td>
						<td></td>
					</tr>
					</thead>
					<tbody>
				<?php
					$k = 0;
					foreach($safety_logs as $safety_log){
						$k++;
				?>
					<tr>
						<td><?php echo $k; ?></td>
						<td><?php echo $safety_log->id; ?></td>
						<td><?php echo $safety_log->date_occured; ?></td>
						<td><?php echo $safety_log->time; ?></td>
						<td><?php echo $safety_log->aircraft; ?></td>
						<td><?php echo $safety_log->type; ?></td>
						<td><?php echo $safety_log->registrar; ?></td>
						<td><?php echo $safety_log->operator; ?></td>
						<td><?php echo $safety_log->route; ?></td>
						<!-- <td><?php echo $safety_log->event; ?></td> -->
						<td><?php echo @$safety_log->category0->name; ?></td>
						<td><?php echo @$safety_log->cause0->name; ?></td>
						<td><?php echo CHtml::link($image_view, array('/safetyLogs/view', 'id'=>$safety_log->id)); ?></td>
						<td><?php echo CHtml::link($image_edit, array('/safetyLogs/update', 'id'=>$safety_log->id)); ?></td>
					</tr>
					
				<?php
					}
				?>
					</tbody>
                 </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
