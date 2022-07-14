
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Risk Analysis By Status</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Risk Analysis By Status</li>
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
						For:
						</td>
						<td>
						<select name="main_category" class="form-control" >
							<option value="Issue" >Issues</option>
							<option value="Incident" >Incidents</option>
							<option value="Hazard" >Hazards</option>
							<option value="SITREP" >SITREP</option>
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
						
						$dataArray_INCOMING = array();
						$dataArray_PENDING = array();
						$dataArray_INITIATED = array();
						$dataArray_MONITORED = array();
						$dataArray_CLOSED = array();
						
						$pie_chart_INCOMING = 0;
						$pie_chart_PENDING = 0;
						$pie_chart_INITIATED = 0;
						$pie_chart_MONITORED = 0;
						$pie_chart_CLOSED = 0;
						
						$y = 1;
						$x = 0;
						$z = 1;
						$title = "";
						
						//$end_date = date('Y-m-d', strtotime($end_date. " + 1 days"));
						
						while(strtotime($day) != strtotime($end)){
							
							if($period_type == 1){
								$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
								
								$incoming_count = @Incidents::model()->getItemCount_1($day, $day, $main_category, 1);
								$pending_count = @Incidents::model()->getItemCount_1($day, $day, $main_category, 2);
								$initiated_count = @Incidents::model()->getItemCount_1($day, $day, $main_category, 3);
								$monitored_count = @Incidents::model()->getItemCount_1($day, $day, $main_category, 4);
								$closed_count = @Incidents::model()->getItemCount_1($day, $day, $main_category, 5);
								
									
								$z = date('D-d', strtotime($day));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Daily";
							}elseif($period_type == 2){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} weeks"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								
								$incoming_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 1);
								$pending_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 2);
								$initiated_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 3);
								$monitored_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 4);
								$closed_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 5);
								
								$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Weekly";
							}elseif($period_type == 3){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} months"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} months"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} months"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								
								$incoming_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 1);
								$pending_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 2);
								$initiated_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 3);
								$monitored_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 4);
								$closed_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 5);
								
								$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Monthly";
							}elseif($period_type == 4){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} years"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} years"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} years"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								
								$incoming_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 1);
								$pending_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 2);
								$initiated_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 3);
								$monitored_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 4);
								$closed_count = @Incidents::model()->getItemCount_1($date_1, $date_2, $main_category, 5);
								
								$z = date('Y/M/d', strtotime($date_1)).'-'.date('Y/M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Yearly";
							}
							
							array_push($dataArray_INCOMING, $incoming_count);
							$pie_chart_INCOMING = $pie_chart_INCOMING + $incoming_count;
							array_push($dataArray_PENDING, $pending_count);
							$pie_chart_PENDING = $pie_chart_PENDING + $pending_count;
							array_push($dataArray_INITIATED, $initiated_count);
							$pie_chart_INITIATED = $pie_chart_INITIATED + $initiated_count;
							array_push($dataArray_MONITORED, $monitored_count);
							$pie_chart_MONITORED = $pie_chart_MONITORED + $monitored_count;
							array_push($dataArray_CLOSED, $closed_count);
							$pie_chart_CLOSED = $pie_chart_CLOSED + $closed_count;
							
							$x = $x + 1;
							$y = $x + 1;
							$z = $x + 1;
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
												'text' => "Risk Analysis By Status Chart,{$title}, {$main_category}(s)",
											),
											'xAxis' => array(
												'categories' => $dataArray_XAXIS,
												'labels'=>array('rotation'=>45),
											),
											
											'series' => array(
												array(
													'type' => 'column',
													'name' => 'Incoming',
													/* 'color' => '#ff0000', */
													'data' => $dataArray_INCOMING,
												),
												array(
													'type' => 'column',
													'name' => 'Pending',
													/* 'color' => '#ffff00', */
													'data' => $dataArray_PENDING,
												),
												array(
													'type' => 'column',
													'name' => 'Initiated',
													/* 'color' => '#00ff00', */
													'data' => $dataArray_INITIATED,
												),
												array(
													'type' => 'column',
													'name' => 'Monitored',
													/* 'color' => '#0000ff', */
													'data' => $dataArray_MONITORED,
												),
												array(
													'type' => 'column',
													'name' => 'Closed',
													/* 'color' => '#00ffff', */
													'data' => $dataArray_CLOSED,
												),
												
											),
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
											'title' => array('text'=>"Risk Analysis By Status Chart,{$title}, {$main_category}(s)"),
										  /* 'colors'=>array('#ff0000', '#ffff00', '#00ff00', '#0000ff', '#00ffff'), */
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
											  'data' => array(
												array("Incoming ({$pie_chart_INCOMING})", $pie_chart_INCOMING),
												array("Pending ({$pie_chart_PENDING})", $pie_chart_PENDING),
												array("Initiated ({$pie_chart_INITIATED})", $pie_chart_INITIATED),
												array("Monitored ({$pie_chart_MONITORED})", $pie_chart_MONITORED),
												array("Closed ({$pie_chart_CLOSED})", $pie_chart_CLOSED),
											  ),
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
