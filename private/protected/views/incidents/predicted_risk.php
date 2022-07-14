
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Predicted Residual Risk Index</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Predicted Residual Risk Index</li>
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
						<select name="search_for" class="form-control" >
							<option value="All" >All</option>
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
						/* $today = $select_dt;
						$y = date('Y', strtotime($today));
						$m = date('m', strtotime($today));
						$d = date('d', strtotime($today));
						
						$dataArray_RED = array();
						$dataArray_YELLOW = array();
						$dataArray_GREEN = array();
						$dataArray_AVERAGE = array();
						$dataArray_XAXIS = array();
						
						$month = 1;
						while($month <= $m){
							if($month < 10){$start_date = "{$y}-0{$month}-01";}else{$start_date = "{$y}-{$month}-01";}
							if($month < 10){$end_date = "{$y}-0{$month}-31";}else{$end_date = "{$y}-{$month}-01";}
							
							$monthlyInitialRiskCount_RED = Effects::model()->getMonthlyPredictedRiskIndexCount('RED', $start_date, $end_date);
							array_push($dataArray_RED, $monthlyInitialRiskCount_RED);
							
							$monthlyInitialRiskCount_YELLOW = Effects::model()->getMonthlyPredictedRiskIndexCount('YELLOW', $start_date, $end_date);
							array_push($dataArray_YELLOW, $monthlyInitialRiskCount_YELLOW);
							
							$monthlyInitialRiskCount_GREEN = Effects::model()->getMonthlyPredictedRiskIndexCount('GREEN', $start_date, $end_date);
							array_push($dataArray_GREEN, $monthlyInitialRiskCount_GREEN);
							
							$monthlyInitialRiskCount_AVERAGE = ($monthlyInitialRiskCount_RED + $monthlyInitialRiskCount_YELLOW + $monthlyInitialRiskCount_GREEN)/3;
							array_push($dataArray_AVERAGE, $monthlyInitialRiskCount_AVERAGE);
							
							$period = date('M', strtotime($start_date));
							array_push($dataArray_XAXIS, $period);
							
							$month++;
						} */
						
						if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 14)&&($period_type == 1)){
							$period_type = 2;
						}
						if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 28)&&($period_type == 2)){
							$period_type = 3;
						}
						
						$day = $start_date;
						$end = $end_date;
						$begin = $start_date;
						
						$counter = 0;
						
						$day = $start_date;
						$end = $end_date;
						$begin = $start_date;
						
						$y = 1;
						$x = 0;
						$z = 1;
						$title = "";
						
						
						$dataArray_RED = array();
						$dataArray_YELLOW = array();
						$dataArray_GREEN = array();
						$dataArray_AVERAGE = array();
						$dataArray_XAXIS = array();
						
						$pie_chart_red = 0;
						$pie_chart_yellow = 0;
						$pie_chart_green = 0;
						
						//$end_date = date('Y-m-d', strtotime($end_date. " + 1 days"));
						
						while(strtotime($day) != strtotime($end)){
							
							if($period_type == 1){
								$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
								/* $monthlyInitialRiskCount_RED = Effects::model()->getDayPredictedRiskIndexCount('RED', $day); */
								$monthlyInitialRiskCount_RED = Effects::model()->getDayPredictedRiskIndexCountInHazards('RED', $day, $search_for);
								array_push($dataArray_RED, $monthlyInitialRiskCount_RED);
								
								/* $monthlyInitialRiskCount_YELLOW = Effects::model()->getDayPredictedRiskIndexCount('YELLOW', $day); */
								$monthlyInitialRiskCount_YELLOW = Effects::model()->getDayPredictedRiskIndexCountInHazards('YELLOW', $day, $search_for);
								array_push($dataArray_YELLOW, $monthlyInitialRiskCount_YELLOW);
								
								/* $monthlyInitialRiskCount_GREEN = Effects::model()->getDayPredictedRiskIndexCount('GREEN', $day); */
								$monthlyInitialRiskCount_GREEN = Effects::model()->getDayPredictedRiskIndexCountInHazards('GREEN', $day, $search_for);
								array_push($dataArray_GREEN, $monthlyInitialRiskCount_GREEN);	
								$z = date('D-d', strtotime($day));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Daily";
							}elseif($period_type == 2){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} weeks"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								/* $monthlyInitialRiskCount_RED = Effects::model()->getDaysPredictedRiskIndexCount('RED', $date_1, $date_2); */
								$monthlyInitialRiskCount_RED = Effects::model()->getDaysPredictedRiskIndexCountInHazards('RED', $date_1, $date_2, $search_for);
								array_push($dataArray_RED, $monthlyInitialRiskCount_RED);
								
								/* $monthlyInitialRiskCount_YELLOW = Effects::model()->getDaysPredictedRiskIndexCount('YELLOW', $date_1, $date_2); */
								$monthlyInitialRiskCount_YELLOW = Effects::model()->getDaysPredictedRiskIndexCountInHazards('YELLOW', $date_1, $date_2, $search_for);
								array_push($dataArray_YELLOW, $monthlyInitialRiskCount_YELLOW);
								
								/* $monthlyInitialRiskCount_GREEN = Effects::model()->getDaysPredictedRiskIndexCount('GREEN', $date_1, $date_2); */
								$monthlyInitialRiskCount_GREEN = Effects::model()->getDaysPredictedRiskIndexCountInHazards('GREEN', $date_1, $date_2, $search_for);
								array_push($dataArray_GREEN, $monthlyInitialRiskCount_GREEN);
								$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Weekly";
							}elseif($period_type == 3){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} months"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} months"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} months"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								/* $monthlyInitialRiskCount_RED = Effects::model()->getDaysPredictedRiskIndexCount('RED', $date_1, $date_2); */
								$monthlyInitialRiskCount_RED = Effects::model()->getDaysPredictedRiskIndexCountInHazards('RED', $date_1, $date_2, $search_for);
								array_push($dataArray_RED, $monthlyInitialRiskCount_RED);
								
								/* $monthlyInitialRiskCount_YELLOW = Effects::model()->getDaysPredictedRiskIndexCount('YELLOW', $date_1, $date_2); */
								$monthlyInitialRiskCount_YELLOW = Effects::model()->getDaysPredictedRiskIndexCountInHazards('YELLOW', $date_1, $date_2, $search_for);
								array_push($dataArray_YELLOW, $monthlyInitialRiskCount_YELLOW);
								
								/* $monthlyInitialRiskCount_GREEN = Effects::model()->getDaysPredictedRiskIndexCount('GREEN', $date_1, $date_2); */
								$monthlyInitialRiskCount_GREEN = Effects::model()->getDaysPredictedRiskIndexCountInHazards('GREEN', $date_1, $date_2, $search_for);
								array_push($dataArray_GREEN, $monthlyInitialRiskCount_GREEN);
								$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Monthly";
							}elseif($period_type == 4){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} years"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} years"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} years"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								/* $monthlyInitialRiskCount_RED = Effects::model()->getDaysPredictedRiskIndexCount('RED', $date_1, $date_2); */
								$monthlyInitialRiskCount_RED = Effects::model()->getDaysPredictedRiskIndexCountInHazards('RED', $date_1, $date_2, $search_for);
								array_push($dataArray_RED, $monthlyInitialRiskCount_RED);
								
								/* $monthlyInitialRiskCount_YELLOW = Effects::model()->getDaysPredictedRiskIndexCount('YELLOW', $date_1, $date_2); */
								$monthlyInitialRiskCount_YELLOW = Effects::model()->getDaysPredictedRiskIndexCountInHazards('YELLOW', $date_1, $date_2, $search_for);
								array_push($dataArray_YELLOW, $monthlyInitialRiskCount_YELLOW);
								
								/* $monthlyInitialRiskCount_GREEN = Effects::model()->getDaysPredictedRiskIndexCount('GREEN', $date_1, $date_2); */
								$monthlyInitialRiskCount_GREEN = Effects::model()->getDaysPredictedRiskIndexCountInHazards('GREEN', $date_1, $date_2, $search_for);
								array_push($dataArray_GREEN, $monthlyInitialRiskCount_GREEN);
								$z = date('Y/M/d', strtotime($date_1)).'-'.date('Y/M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Yearly";
							}
							
							$x = $x + 1;
							$y = $x + 1;
							$z = $x + 1;
							
							$monthlyInitialRiskCount_AVERAGE = ($monthlyInitialRiskCount_RED + $monthlyInitialRiskCount_YELLOW + $monthlyInitialRiskCount_GREEN)/3;
							array_push($dataArray_AVERAGE, $monthlyInitialRiskCount_AVERAGE);
						}
					?>
						PREDICTED RESIDUAL RISK INDEX COUNT, <?php echo $title; ?>, <?php echo $search_for; ?>(s).
					<table class="table">
						<tr>
							<td>Severity / Probability</td>
							<td>Catastrophic <br />A</td>
							<td>Hazardous <br />B</td>
							<td>Major <br />C</td>
							<td>Minor <br />D</td>
							<td>Negligible <br />E</td>
							<td></td>
						</tr>
						<tr>
							<td>Frequent - 5</td>
							<td style="background-color: red;"><?php $total_5A = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('5A', $start_date, $end_date, $search_for); echo $total_5A; $pie_chart_red = $pie_chart_red + $total_5A; ?></td>
							<td style="background-color: red;"><?php $total_5B = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('5B', $start_date, $end_date, $search_for); echo $total_5B; $pie_chart_red = $pie_chart_red + $total_5B; ?></td>
							<td style="background-color: red;"><?php $total_5C = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('5C', $start_date, $end_date, $search_for); echo $total_5C; $pie_chart_red = $pie_chart_red + $total_5C; ?></td>
							<td style="background-color: yellow;"><?php $total_5D = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('5D', $start_date, $end_date, $search_for); echo $total_5D; $pie_chart_yellow = $pie_chart_yellow + $total_5D; ?></td>
							<td style="background-color: YELLOW;"><?php $total_5E = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('5E', $start_date, $end_date, $search_for); echo $total_5E; $pie_chart_yellow = $pie_chart_yellow + $total_5E; ?></td>
							<td><?php /* echo @Effects::model()->getRiskIndexProbabilityCount('5'); */ ?></td>
						</tr>
						<tr>
							<td>Occasional - 4</td>
							<td style="background-color: red;"><?php $total_4A = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('4A', $start_date, $end_date, $search_for); echo $total_4A; $pie_chart_red = $pie_chart_red + $total_4A; ?></td>
							<td style="background-color: red;"><?php $total_4B = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('4B', $start_date, $end_date, $search_for); echo $total_4B; $pie_chart_red = $pie_chart_red + $total_4B; ?></td>
							<td style="background-color: yellow;"><?php $total_4C = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('4C', $start_date, $end_date, $search_for); echo $total_4C; $pie_chart_yellow = $pie_chart_yellow + $total_4C; ?></td>
							<td style="background-color: yellow;"><?php $total_4D = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('4D', $start_date, $end_date, $search_for); echo $total_4D; $pie_chart_yellow = $pie_chart_yellow + $total_4D; ?></td>
							<td style="background-color: yellow;"><?php $total_4E = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('4E', $start_date, $end_date, $search_for); echo $total_4E; $pie_chart_yellow = $pie_chart_yellow + $total_4E; ?></td>
							<td></td>
						</tr>
						<tr>
							<td>Remote - 3</td>
							<td style="background-color: red;"><?php $total_3A = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('3A', $start_date, $end_date, $search_for); echo $total_3A; $pie_chart_red = $pie_chart_red + $total_3A; ?></td>
							<td style="background-color: yellow;"><?php $total_3B = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('3B', $start_date, $end_date, $search_for); echo $total_3B; $pie_chart_yellow = $pie_chart_yellow + $total_3B; ?></td>
							<td style="background-color: yellow;"><?php $total_3C = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('3C', $start_date, $end_date, $search_for); echo $total_3C; $pie_chart_yellow = $pie_chart_yellow + $total_3C; ?></td>
							<td style="background-color: yellow;"><?php $total_3D = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('3D', $start_date, $end_date, $search_for); echo $total_3D; $pie_chart_yellow = $pie_chart_yellow + $total_3D; ?></td>
							<td style="background-color: GREEN; color: white;"><?php $total_3E = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('3E', $start_date, $end_date, $search_for); echo $total_3E; $pie_chart_green = $pie_chart_green + $total_3E; ?></td>
							<td></td>
						</tr>
						<tr>
							<td>Improbable - 2</td>
							<td style="background-color: yellow;"><?php $total_2A = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('2A', $start_date, $end_date, $search_for); echo $total_2A; $pie_chart_yellow = $pie_chart_yellow + $total_2A; ?></td>
							<td style="background-color: yellow;"><?php $total_2B = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('2B', $start_date, $end_date, $search_for); echo $total_2B; $pie_chart_yellow = $pie_chart_yellow + $total_2B; ?></td>
							<td style="background-color: yellow;"><?php $total_2C = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('2C', $start_date, $end_date, $search_for); echo $total_2C; $pie_chart_yellow = $pie_chart_yellow + $total_2C; ?></td>
							<td style="background-color: GREEN; color: white;"><?php $total_2D = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('2D', $start_date, $end_date, $search_for); echo $total_2D; $pie_chart_green = $pie_chart_green + $total_2D; ?></td>
							<td style="background-color: GREEN; color: white;"><?php $total_2E = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('2E', $start_date, $end_date, $search_for); echo $total_2E; $pie_chart_green = $pie_chart_green + $total_2E; ?></td>
							<td></td>
						</tr>
						<tr>
							<td>Extremely Improbable - 1</td>
							<td style="background-color: yellow;"><?php $total_1A = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('1A', $start_date, $end_date, $search_for); echo $total_1A; $pie_chart_yellow = $pie_chart_yellow + $total_1A; ?></td>
							<td style="background-color: GREEN; color: white;"><?php $total_1B = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('1B', $start_date, $end_date, $search_for); echo $total_1B; $pie_chart_green = $pie_chart_green + $total_1B; ?></td>
							<td style="background-color: GREEN; color: white;"><?php $total_1C = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('1C', $start_date, $end_date, $search_for); echo $total_1C; $pie_chart_green = $pie_chart_green + $total_1C; ?></td>
							<td style="background-color: GREEN; color: white;"><?php $total_1D = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('1D', $start_date, $end_date, $search_for); echo $total_1D; $pie_chart_green = $pie_chart_green + $total_1D; ?></td>
							<td style="background-color: GREEN; color: white;"><?php $total_1E = @Effects::model()->getPeriodPredictedRiskIndexCountInHazards('1E', $start_date, $end_date, $search_for); echo $total_1E; $pie_chart_green = $pie_chart_green + $total_1E; ?></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td style=""></td>
							<td style=""></td>
							<td style=""></td>
							<td style=""></td>
							<td style=""></td>
							<td></td>
						</tr>
					</table>
					
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
            'text' => "Predicted Risk Index Chart,{$title}, {$search_for}(s)",
        ),
        'xAxis' => array(
            'categories' => $dataArray_XAXIS,
        ),
        
        'series' => array(
            array(
                'type' => 'column',
                'name' => 'Red',
				'color' => '#ff0000',
                'data' => $dataArray_RED,
            ),
            array(
                'type' => 'column',
                'name' => 'Yellow',
				'color' => '#ffff00',
                'data' => $dataArray_YELLOW,
            ),
            array(
                'type' => 'column',
                'name' => 'Green',
				'color' => '#00ff00',
                'data' => $dataArray_GREEN,
            ),
            array(
                'type' => 'spline',
                'name' => 'Average',
                'data' => $dataArray_AVERAGE,
                'marker' => array(
                    'lineWidth' => 2,
                    'lineColor' => 'js:Highcharts.getOptions().colors[3]',
                    'fillColor' => 'white',
                ),
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
										'title' => array('text'=>"Predicted Risk Index Chart,{$title}, {$search_for}(s)"),
									  'colors'=>array('red', 'yellow', 'green'),
									  'gradient' => array('enabled'=> true),
									  'credits' => array('enabled' => false),
									  'exporting' => array('enabled' => true),
									  'chart' => array(
										'plotBackgroundColor' => '#ffffff',
										'plotBorderWidth' => null,
										'plotShadow' => false,
										'height' => 400,
									  ),
									  /* 'title' => false, */
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
											array('Red', $pie_chart_red),
											array('Yellow', $pie_chart_yellow),
											array('Green', $pie_chart_green)
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
