
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Risk Analysis For Incident Category</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Risk Analysis For Incident Category</li>
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
							<option value="1" >Line</option>
							<option value="2" >Bar</option>
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
						
						$dataArray_ACCIDENTS = array();
						$dataArray_MINOR = array();
						$dataArray_SERIOUS = array();
						$dataArray_OTHER = array();
						
						$pie_chart_ACCIDENTS = 0;
						$pie_chart_MINOR = 0;
						$pie_chart_SERIOUS = 0;
						$pie_chart_OTHER = 0;
						
						$line_graph_collection = array();
						$line_graph_ACCIDENTS = array();
						$line_graph_MINOR = array();
						$line_graph_SERIOUS = array();
						$line_graph_OTHER = array();
						
						$y = 1;
						$x = 0;
						$z = 1;
						$title = "";
						
						//$end_date = date('Y-m-d', strtotime($end_date. " + 1 days"));
						
						while(strtotime($day) != strtotime($end)){
							
							if($period_type == 1){
								$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
								
								$accidents_count = @Incidents::model()->getItemCount_7($day, $day, 'Accident');
								$minor_count = @Incidents::model()->getItemCount_7($day, $day, 'Minor');
								$serious_count = @Incidents::model()->getItemCount_7($day, $day, 'Serious');
								$other_count = @Incidents::model()->getItemCount_7($day, $day, 'Other');
								
									
								$z = date('D-d', strtotime($day));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Daily";
							}elseif($period_type == 2){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} weeks"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								
								$accidents_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Accident');
								$minor_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Minor');
								$serious_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Serious');
								$other_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Other');
								
								$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Weekly";
							}elseif($period_type == 3){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} months"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} months"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} months"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								
								$accidents_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Accident');
								$minor_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Minor');
								$serious_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Serious');
								$other_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Other');
								
								$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Monthly";
							}elseif($period_type == 4){
								$date_1 = date('Y-m-d', strtotime($begin. " + {$x} years"));
								$date_2 = date('Y-m-d', strtotime($begin. " + {$y} years"));
								$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
								$day = date('Y-m-d', strtotime($begin. " + {$y} years"));
								if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
								
								$accidents_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Accident');
								$minor_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Minor');
								$serious_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Serious');
								$other_count = @Incidents::model()->getItemCount_7($date_1, $date_2, 'Other');
								
								$z = date('Y/M/d', strtotime($date_1)).'-'.date('Y/M/d', strtotime($date_2));
								array_push($dataArray_XAXIS, $z);
								$title = " From: {$begin} to {$end}, Yearly";
							}
							
							array_push($dataArray_ACCIDENTS, $accidents_count);
							$pie_chart_ACCIDENTS = $pie_chart_ACCIDENTS + $accidents_count;
							array_push($dataArray_MINOR, $minor_count);
							$pie_chart_MINOR = $pie_chart_MINOR + $minor_count;
							array_push($dataArray_SERIOUS, $serious_count);
							$pie_chart_SERIOUS = $pie_chart_SERIOUS + $serious_count;
							array_push($dataArray_OTHER, $other_count);
							$pie_chart_OTHER = $pie_chart_OTHER + $other_count;
							
							$x = $x + 1;
							$y = $x + 1;
							$z = $x + 1;
						}
						
						$line_graph_ACCIDENTS['name']='Accident';
						$line_graph_ACCIDENTS['data']=$dataArray_ACCIDENTS;
						
						$line_graph_MINOR['name']='Minor';
						$line_graph_MINOR['data']=$dataArray_MINOR;
						
						$line_graph_SERIOUS['name']='Serious';
						$line_graph_SERIOUS['data']=$dataArray_SERIOUS;
						
						$line_graph_OTHER['name']='Other';
						$line_graph_OTHER['data']=$dataArray_OTHER;
						
						array_push($line_graph_collection, $line_graph_ACCIDENTS, $line_graph_MINOR, $line_graph_SERIOUS, $line_graph_OTHER);
						
					?>
					
					
					<table class="table">
						<tr>
							<td>
							
							<?php
							if($chart_type == 1){
								$this->Widget('ext.highcharts.HighchartsWidget', array(
									'scripts' => array(
										'modules/exporting',
									),
								   'options'=>array(
									  'title' => array('text' => "Risk Analysis For Incident Category, {$title}"),
									  'xAxis' => array(
										 'categories' => $dataArray_XAXIS,
										 'labels'=>array('rotation'=>45),
									  ),
									  'yAxis' => array(
										 'title' => array('text' => '#')
									  ),
									  'credits' => array('enabled' => false),
									  'series' => $line_graph_collection
								   )
								));	
							}
							
							?>
						
								<?php 
								if($chart_type == 2){
									$this->widget('ext.highcharts.HighchartsWidget', array(
										'scripts' => array(
											'modules/exporting',
										),
										'options' => array(
											'title' => array(
												'text' => "Risk Analysis For Incident Category,{$title}",
											),
											'xAxis' => array(
												'categories' => $dataArray_XAXIS,
												'labels'=>array('rotation'=>45),
											),
											
											'series' => array(
												array(
													'type' => 'column',
													'name' => 'Accident',
													/* 'color' => '#ff0000', */
													'data' => $dataArray_ACCIDENTS,
												),
												array(
													'type' => 'column',
													'name' => 'Minor',
													/* 'color' => '#ffff00', */
													'data' => $dataArray_MINOR,
												),
												array(
													'type' => 'column',
													'name' => 'Serious',
													/* 'color' => '#00ff00', */
													'data' => $dataArray_SERIOUS,
												),
												array(
													'type' => 'column',
													'name' => 'Other',
													/* 'color' => '#0000ff', */
													'data' => $dataArray_OTHER,
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
											'title' => array('text'=>"Risk Analysis For Incident Category,{$title}"),
										  /* 'colors'=>array('#ff0000', '#ffff00', '#00ff00', '#0000ff'), */
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
												array("Accident ({$pie_chart_ACCIDENTS})", $pie_chart_ACCIDENTS),
												array("Minor ({$pie_chart_MINOR})", $pie_chart_MINOR),
												array("Serious ({$pie_chart_SERIOUS})", $pie_chart_SERIOUS),
												array("Other ({$pie_chart_OTHER})", $pie_chart_OTHER),
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
