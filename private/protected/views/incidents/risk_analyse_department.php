
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Risk Analysis By Department</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Risk Analysis By Department</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
			<div class="col-xs-12">
			<div class="box">
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
						Period Type:
						</td>
						<td>
						<select name="period_type" class="form-control" >
							<option value="1" >Days</option>
							<option value="2" >Weeks</option>
							<option value="3" >Months</option>
							<option value="4" >Years</option>
						</select>
						</td>
						<td>
						Chart Type:
						</td>
						<td>
						<select name="chart_type" class="form-control" >
							<option value="1" >Bar</option>
							<option value="3" >Pie</option>
						</select>
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
		
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
				
                <div class="box-body">
					
					<?php
						$day = $start_date;
						$end = $end_date;
						$begin = $start_date;
						
						if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 16)&&($period_type == 1)){
							$period_type = 2;
						}
						if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 31)&&($period_type == 2)){
							$period_type = 3;
						}
						
						$counter = 0;
						
						$dataArray_XAXIS = array();
						
						$pie_chart_values = 0;
						$pie_chart_rows = array();
						$pie_chart_collection = array();
						
						$options_collection = array();
						
						$title = "";
						
						//$end_date = date('Y-m-d', strtotime($end_date. " + 1 days"));
						$options = @UserDepartments::model()->findAll("status = 1");
						
						
						foreach($options as $option){
							
							$day = $start_date;
							$end = $end_date;
							$begin = $start_date;
						
							$dataArray_optionS = array();
							$options_holder = array();
							$pie_chart_values = 0;
							$pie_chart_rows = array();
						
							$y = 1;
							$x = 0;
							$z = 1;
							$title = "";
							
							while(strtotime($day) != strtotime($end)){
								
								if($period_type == 1){
									$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
									
									$items_count = @SafetyRecommendations::model()->getItemCountByDepartment($day, $day, $option->id);
									
										
									$z = date('D-d', strtotime($day));
									array_push($dataArray_XAXIS, $z);
									$title = " From: {$begin} to {$end}, Daily";
								}elseif($period_type == 2){
									$date_1 = date('Y-m-d', strtotime($begin. " + {$x} weeks"));
									$date_2 = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
									$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
									$day = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
									if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
									
									$items_count = @SafetyRecommendations::model()->getItemCountByDepartment($date_1, $date_2, $option->id);
									
									$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
									array_push($dataArray_XAXIS, $z);
									$title = " From: {$begin} to {$end}, Weekly";
								}elseif($period_type == 3){
									$date_1 = date('Y-m-d', strtotime($begin. " + {$x} months"));
									$date_2 = date('Y-m-d', strtotime($begin. " + {$y} months"));
									$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
									$day = date('Y-m-d', strtotime($begin. " + {$y} months"));
									if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
									
									$items_count = @SafetyRecommendations::model()->getItemCountByDepartment($date_1, $date_2, $option->id);
									
									$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
									array_push($dataArray_XAXIS, $z);
									$title = " From: {$begin} to {$end}, Monthly";
								}elseif($period_type == 4){
									$date_1 = date('Y-m-d', strtotime($begin. " + {$x} years"));
									$date_2 = date('Y-m-d', strtotime($begin. " + {$y} years"));
									$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
									$day = date('Y-m-d', strtotime($begin. " + {$y} years"));
									if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
									
									$items_count = @SafetyRecommendations::model()->getItemCountByDepartment($date_1, $date_2, $option->id);
									
									$z = date('Y/M/d', strtotime($date_1)).'-'.date('Y/M/d', strtotime($date_2));
									array_push($dataArray_XAXIS, $z);
									$title = " From: {$begin} to {$end}, Yearly";
								}
								
								array_push($dataArray_optionS, $items_count);
								$pie_chart_values = $pie_chart_values + $items_count;
								
								$x = $x + 1;
								$y = $x + 1;
								$z = $x + 1;
							}
							$options_holder['type'] = 'column';
							$options_holder['name'] = @$option->name;
							$options_holder['data'] = $dataArray_optionS;
							array_push($options_collection, $options_holder);
							$pie_chart_rows[0] = @$option->name." ({$pie_chart_values})";
							$pie_chart_rows[1] = $pie_chart_values;
							array_push($pie_chart_collection, $pie_chart_rows);
							unset($dataArray_optionS);
							unset($options_holder);
							unset($pie_chart_rows);
							$counter++;
						}
						
					?>
					
					
					<table class="table">
						<tr>
							<td>
						
								<?php 
								if($chart_type == 1){
									$this->widget('ext.highcharts.HighchartsWidget', array(
										'scripts' => array(
											'modules/exporting',
										),
										'options' => array(
											'title' => array(
												'text' => "Risk Analysis By Department Chart {$title}",
											),
											'xAxis' => array(
												'categories' => $dataArray_XAXIS,
												'labels'=>array('rotation'=>45),
											),
											
											'series' => $options_collection,
										)
									));									
								}

?>
							</td>
						</tr>
						<tr>
							<td>
								<?php
								if($chart_type == 3){
									$this->Widget('ext.highcharts.HighchartsWidget', array(
										'scripts' => array(
											'modules/exporting',
										),
										'options' => array(
											'title' => array('text'=>"Risk Analysis By Department Chart {$title}"),
										  /* 'colors'=>array('#ff0000', '#ffff00', '#00ff00', '#0000ff', '#00ffff', '#0ffff0'), */
										  'gradient' => array('enabled'=> true),
										  'credits' => array('enabled' => false),
										  'exporting' => array('enabled' => true),
										  'chart' => array(
											'plotBackgroundColor' => '#ffffff',
											'plotBorderWidth' => null,
											'plotShadow' => false,
											'height' => 400,
										  ),
										  /* 'title' => "Initial Risk Index Chart, {$start_date} to {$end_date}", */
										  'tooltip' => array(
											// 'pointFormat' => '{series.name}: <b>{point.percentage}%</b>',
											// 'percentageDecimals' => 1,
											'formatter'=> 'js:function() { return this.point.name+":  <b>"+Math.round(this.point.percentage)+"</b>%"; }',
												//the reason it didnt work before was because you need to use javascript functions to round and refrence the JSON as this.<array>.<index> ~jeffrey
										  ),
										  'plotOptions' => array(
											'pie' => array(
											  'allowPointSelect' => true,
											  'cursor' => 'pointer',
											  'dataLabels' => array(
												'enabled' => true,
												'color' => '#AAAAAA',
												'connectorColor' => '#AAAAAA',
											  ),
											  'showInLegend'=>true,
											)
										  ),
										  'series' => array(
											array(
											  'type' => 'pie',
											  'name' => 'Percentage',
											  'data' => $pie_chart_collection,
											),
										  ),
										)
									  ));	
								}
								
								?>
							</td>
						</tr>
					</table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
