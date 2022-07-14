

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Key Performance Indicators</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Key Performance Indicators</li>
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
				<table class="table">
					<tr>
						<td>From: </td>
						<td>
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
						</td>
						<td>To: </td>
						<td>
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
						</td>
						<td>
						<input type="submit" value="Search " class="btn btn-primary" /> 
						</td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
		</div>
		<!-- <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				<div style="width: 100%;"><?php echo CHtml::link('Print', array('#'), array('class'=>'btn btn-primary', 'target'=>'_blank', 'style'=>'width: 100%;')); ?></div>
				</div>
			</div>
		</div>
		</div> -->
		
		 
		
		<div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				<table class="table table-hover">
					<tr>
						<td><b>#</b></td>
						<td><b>KPI</b></td>
						<td><b>Target</b></td>
						<td><b>Actual</b></td>
						<td><b>Alert Indicator</b></td>
					</tr>
					<tr>
						<td>1</td>
						<td>Total # of Occurrences Reported</td>
						<td>
							<?php 
							if(Users::model()->checkIfUserIsAdmin()){
								echo CHtml::link($total_no_of_occurrences_reported_target, '#', array(
								   'onclick'=>'$("#addTarget-1").dialog("open"); return false;',
								));
							}else{
								echo $total_no_of_occurrences_reported_target;
							}
								
							?>
						</td>
						<td><?php echo $total_no_of_occurrences_reported; ?></td>
						<td>
							<span style="<?php if($total_no_of_occurrences_reported > $total_no_of_occurrences_reported_target){echo "background-color: red; color: #fff;";}elseif($total_no_of_occurrences_reported == $total_no_of_occurrences_reported_target){echo "background-color: orange;";}else{echo "background-color: green; color: #fff;";} ?>">&nbsp;&nbsp;</span>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Average # of Days to Close Occurrences</td>
						<td>
							<?php 
							if(Users::model()->checkIfUserIsAdmin()){
								echo CHtml::link($average_no_days_to_close_occurrence_target, '#', array(
								   'onclick'=>'$("#addTarget-2").dialog("open"); return false;',
								));
							}else{
								echo $average_no_days_to_close_occurrence_target;
							}
								
							?>
						</td>
						<td><?php echo $average_no_days_to_close_occurrence; ?></td>
						<td>
							<span style="<?php if($average_no_days_to_close_occurrence > $average_no_days_to_close_occurrence_target){echo "background-color: red; color: #fff;";}elseif($average_no_days_to_close_occurrence == $average_no_days_to_close_occurrence_target){echo "background-color: orange;";}else{echo "background-color: green; color: #fff;";} ?>">&nbsp;&nbsp;</span>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Average # of Occurrences Reported Per Month</td>
						<td>
							<?php 
							if(Users::model()->checkIfUserIsAdmin()){
								echo CHtml::link($average_no_of_occurrences_reported_month_target, '#', array(
								   'onclick'=>'$("#addTarget-3").dialog("open"); return false;',
								));
							}else{
								echo $average_no_of_occurrences_reported_month_target;
							}
								
							?>
						</td>
						<td><?php echo $average_no_of_occurrences_reported_month; ?></td>
						<td>
							<span style="<?php if($average_no_of_occurrences_reported_month > $average_no_of_occurrences_reported_month_target){echo "background-color: red; color: #fff;";}elseif($average_no_of_occurrences_reported_month == $average_no_of_occurrences_reported_month_target){echo "background-color: orange;";}else{echo "background-color: green; color: #fff;";} ?>">&nbsp;&nbsp;</span>
						</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Average # of Days to Resolve Safety Requirements</td>
						<td>
							<?php 
							if(Users::model()->checkIfUserIsAdmin()){
								echo CHtml::link($average_no_days_to_close_sr_target, '#', array(
								   'onclick'=>'$("#addTarget-4").dialog("open"); return false;',
								));
							}else{
								echo $average_no_days_to_close_sr_target;
							}
								
							?>
						</td>
						<td><?php echo $average_no_days_to_close_sr; ?></td>
						<td>
							<span style="<?php if($average_no_days_to_close_sr > $average_no_days_to_close_sr_target){echo "background-color: red; color: #fff;";}elseif($average_no_days_to_close_sr == $average_no_days_to_close_sr_target){echo "background-color: orange;";}else{echo "background-color: green; color: #fff;";} ?>">&nbsp;&nbsp;</span>
						</td>
					</tr>
				
				<?php
				$i=5;
				$count_causes = array();
				foreach($causes as $cause_item){
				?>
					<tr>
					<td><?php echo $i;?></td>
					<td>
					<?php  
						echo $cause_item->name.' '; 
					?>
					</td>
					<?php
					$count_categories = 0;
					
					$k = 0;
					foreach($categories as $category_item){
						$count=SafetyLogs::getCatCause($cause_item->id,$category_item->id, $start_date, $end_date);
						$count_categories = $count_categories + $count;
						$k++;
						//echo "<td> {$count} </td>";
					}
					
					?>
					<td>
						<?php 
						if(Users::model()->checkIfUserIsAdmin()){
							echo CHtml::link(number_format(($cause_item->target)*$multiplier), '#', array(
							   'onclick'=>'$("#addSLTarget'.$cause_item->id.'").dialog("open"); return false;',
							));
						}else{
							echo number_format(($cause_item->target)*$multiplier);
						}
							
						?>
					</td>
					<td >
						
						<?php
							//echo SafetyLogsCauses::getLogCount($cause_item->id);
							echo number_format($count_categories/$no_of_months_in_selected_period, 2);
						?>
						
						
					</td>
					<td><span style="<?php if($count_categories/$no_of_months_in_selected_period > ($cause_item->target)*$multiplier){echo "background-color: red; color: #fff;";}elseif($count_categories == ($cause_item->target)*$multiplier){echo "background-color: orange;";}else{echo "background-color: green; color: #fff;";} ?>">&nbsp;&nbsp;</span></td>
					</tr>
				<?php
				$i++;
				}
				?>

				

				</table>
                  <?php
						$this->renderPartial('addTarget-1');
					?>
					 <?php
						$this->renderPartial('addTarget-2');
					?>
					<?php
						$this->renderPartial('addTarget-3');
					?>
					<?php
						$this->renderPartial('addTarget-4');
					?>
					<?php
						$this->renderPartial('addSLTarget', array('causes' => $causes));
					?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->
		  
		  

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->