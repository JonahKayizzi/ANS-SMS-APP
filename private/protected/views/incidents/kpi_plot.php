

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
				
					<?php
						/* $this->Widget('ext.highcharts.HighchartsWidget', array(
						'scripts' => array(
									'modules/exporting',
								),
						   'options' => array(
							  'title' => array('text' => 'KPI(s)'),
							  'credits' => array('enabled' => false),
							  'xAxis' => array(
								 'categories' => array('Apples', 'Bananas', 'Oranges'),
								 'labels'=>array('rotation'=>45),
							  ),
							  'yAxis' => array(
								 'title' => array('text' => 'Fruit eaten')
							  ),
							  'series' => array(
								 array('name' => 'Jane', 'data' => array(1, 0, 4)),
								 array('name' => 'John', 'data' => array(5, 7, 3))
							  )
						   )
						)); */
					?>
					
				</div>
			</div>
		</div>
		</div> -->
		
		 <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				
					<?php
				$green = 0;
				$red = 0;
				$orange = 0;
				?>
					
				<?php if($total_no_of_occurrences_reported > $total_no_of_occurrences_reported_target){$red = $red + 1;}elseif($total_no_of_occurrences_reported == $total_no_of_occurrences_reported_target){$orange = $orange + 1;}else{$green = $green + 1;} ?>
				
				<?php if($average_no_days_to_close_occurrence > $average_no_days_to_close_occurrence_target){$red = $red + 1;}elseif($average_no_days_to_close_occurrence == $average_no_days_to_close_occurrence_target){$orange = $orange + 1;}else{$green = $green + 1;} ?>
				
				<?php if($average_no_of_occurrences_reported_month > $average_no_of_occurrences_reported_month_target){$red = $red + 1;}elseif($average_no_of_occurrences_reported_month == $average_no_of_occurrences_reported_month_target){$orange = $orange + 1;}else{$green = $green + 1;} ?>
				
				<?php if($average_no_days_to_close_sr > $average_no_days_to_close_sr_target){$red = $red + 1;}elseif($average_no_days_to_close_sr == $average_no_days_to_close_sr_target){$orange = $orange + 1;}else{$green = $green + 1;} ?>
				
				<?php
				$i=5;
				$count_causes = array();
				foreach($causes as $cause_item){
				?>
					
					<?php
					$count_categories = 0;
					
					$k = 0;
					foreach($categories as $category_item){
						$count=SafetyLogs::getCatCause($cause_item->id,$category_item->id, $start_date, $end_date);
						$count_categories = $count_categories + $count;
						$k++;
					}
					
					?>
					<?php if($count_categories/$no_of_months_in_selected_period > $cause_item->target){$red = $red + 1;}elseif($count_categories == $cause_item->target){$orange = $orange + 1;}else{$green = $green + 1;} ?>
				<?php
				$i++;
				}
				?>
					
					<?php
					$this->Widget('ext.highcharts.HighchartsWidget', array(
					'scripts' => array(
									'modules/exporting',
								),
						'options' => array(
						  'title' => array('text' => 'KPI(s)'),
						  'xAxis' => array(
							 'categories' => array('Region'),
							 'labels'=>array('rotation'=>45),
						  ),
						  'yAxis' => array(
							 'title' => array('text' => 'Count')
						  ),
						  'colors'=>array('green', 'orange', 'red'),
						  'gradient' => array('enabled'=> true),
						  'credits' => array('enabled' => false),
						  'chart' => array(
							'plotBackgroundColor' => '#ffffff',
							'plotBorderWidth' => null,
							'plotShadow' => false,
							'height' => 400,
							'type'=>'column'
						  ),
						   'series' => array(
							  array('name' => 'Green', 'data' => array($green)),
							  array('name' => 'Orange', 'data' => array($orange)),
								array('name' => 'Red', 'data' => array($red)),
						  ),
						)
					  ));
					?>
				</div>
			</div>
		</div>
		</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->