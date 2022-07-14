
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Associated Risks</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Associated Risks</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
				
                <div class="box-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'name',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>false,
				)); ?>
				<table class="table" style="">
					<tr>
						<td>From: </td>
						<td>
							<?php
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'start_dt',
								'value'=>$start_dt,     
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'style'=>'',
									'class'=>'form-control',
								),
							));
							?>
						</td>
						<td>To: </td>
						<td>
							<?php
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'end_dt',
								'value'=>$end_dt,     
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'style'=>'',
									'class'=>'form-control',
								),
							));
							?>
						</td>
						<td style>
							<input type="submit" value="Search " class="form-control" />
						</td>
					</tr>
				</table>
				<?php $this->endWidget(); ?> 
				</div>
				</div>
				</div>
				</div>
				<div class="row">
            <div class="col-xs-12">

              <div class="box">
			  <div class="box-body">
				
				
				
				<?php
					$incidents = @Incidents::model()->findAll("parent_occurrence IS NOT NULL and date between '{$start_dt}' and '{$end_dt}'");
					if(!empty($incidents)){
						$k=1;
				?>
					<table class="table table-striped">
						<tr>
							<th></th>
							<th>ID</th>
							<th>#</th>
							<th>Parent</th>
							<th>Occurrence</th>
							<th>Place</th>
							<th>Time</th>
							<th>Occurred</th>
							<th>Reported</th>
							<th>Category</th>
							<th>Reported by</th>
							<th>Main Category</th>
						</tr>
				<?php
						foreach($incidents as $incident){
				?>
						<tr>
							<td><?php echo $k; ?></td>
							<td><?php echo CHtml::link($incident->id, array('/incidents/view', 'id'=>$incident->id)); ?></td>
							<td><?php echo CHtml::link($incident->number, array('/incidents/view', 'id'=>$incident->id)); ?></td>
							<td><?php echo CHtml::link($incident->parent_occurrence, array('/incidents/view', 'id'=>$incident->parent_occurrence)); ?></td>
							<td><?php echo $incident->occurrence; ?></td>
							<td><?php echo $incident->place; ?></td>
							<td><?php echo $incident->time; ?></td>
							<td><?php echo $incident->date; ?></td>
							<td><?php echo $incident->date_reported; ?></td>
							<td><?php echo $incident->category; ?></td>
							<td><?php echo $incident->reported_by; ?></td>
							<td><?php echo $incident->main_category; ?></td>
						</tr>
				<?php
						$k++;
						}
				?>
					</table>
				<?php
					}else{
						echo "<div style='width: 100%; text-align: center;'>There are no associated risks for date between '{$begin}' and '{$today}'</div>";
					}
				?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
