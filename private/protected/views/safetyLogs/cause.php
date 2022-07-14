
<?php if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = NULL;} ?>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Safety Logs Category</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Safety Logs Category</li>
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
					<tr >
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
							Option:
						</td>
						<td>
							<select name="search_option" class="form-control">
								<option value="All">All</option>
								<option value="aircraft">Aircraft Call Sign</option>
								<option value="type">Aircraft Type</option>
								<option value="registrar">Aircraft Registration</option>
								<option value="operator">Operator</option>
								<option value="route">Route</option>
							</select>
						</td>
						<td>
							<input type="text" name="search_value" class="form-control" placeholder="Search Value" />
						</td>
						<td>
						<input type="submit" value="Search " class="btn btn-primary" /> 
						</td>
					</tr>
				</table>
				</div>
			</div>
		</div>
		<div class="row">
            <div class="col-xs-12">

              <div class="box">
				<?php $this->endWidget(); ?>
				
                <div class="box-body">
				<?php $cause = @SafetyLogsCauses::model()->findByPk($id); ?>
				
				<?php 
				
					if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 14)&&($period_type == 1)){
						$period_type = 2;
					}
					
					if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 31)&&($period_type == 2)){
						$period_type = 3;
					}
					
					if($search_option == 'aircraft'){
							$search_option_value = "Aircraft Call Sign";
						}
						
						if($search_option == 'type'){
							$search_option_value = "Aircraft Type";
						}
						
						if($search_option == 'registrar'){
							$search_option_value = "Aircraft Registration";
						}
						
						if($search_option == 'operator'){
							$search_option_value = "Operator";
						}
						
						if($search_option == 'route'){
							$search_option_value = "Route";
						}
					
					$pie_chart_collection = array();
					$pie_chart_row = array();
					//$today = date('Y-m-d');
					$today = $select_dt;
					$y = date('Y', strtotime($today));
					$m = date('m', strtotime($today));
					
					
					$period = "{$m}-{$y}";
					
					$d = date('d', strtotime($today));
					//$begin = "{$y}-{$m}-01";
					$begin = $start_date;
					//$day = "{$y}-{$m}-01";
					$day = $begin;
					//$end = $today;
					$end = $end_date;
					
					$y = 1;
					$x = 0;
					$z = 1;
					$title = "";
					
					$y_points = array();
					$x_points = array();
					
					
					//get all months from beginning of the year
					while(strtotime($day) != strtotime($end)){
						
						if($period_type == 1){
							$day = date('Y-m-d', strtotime($begin. " + {$x} days"));
							if($search_option == 'All'){
								$total_incidents = @SafetyLogsCauses::model()->getLogCountForDay($id, $day);
							}else{
								$total_incidents = @SafetyLogsCauses::model()->getLogCountForDay2($id, $day, $search_option, $search_value);
							}
								
							$z = date('D-d', strtotime($day));
							array_push($x_points, $z);
							$title = " From: {$begin} to {$end}, Daily";
						}elseif($period_type == 2){
							$date_1 = date('Y-m-d', strtotime($begin. " + {$x} weeks"));
							$date_2 = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
							$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
							$day = date('Y-m-d', strtotime($begin. " + {$y} weeks"));
							if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
							if($search_option == 'All'){
								$total_incidents = @SafetyLogsCauses::model()->getLogCountForDays($id, $date_1, $date_2);
							}else{
								$total_incidents = @SafetyLogsCauses::model()->getLogCountForDays2($id, $date_1, $date_2, $search_option, $search_value);
							}
							
							$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
							array_push($x_points, $z);
							$title = " From: {$begin} to {$end}, Weekly";
						}elseif($period_type == 3){
							$date_1 = date('Y-m-d', strtotime($begin. " + {$x} months"));
							$date_2 = date('Y-m-d', strtotime($begin. " + {$y} months"));
							$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
							$day = date('Y-m-d', strtotime($begin. " + {$y} months"));
							if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
							if($search_option == 'All'){
								$total_incidents = @SafetyLogsCauses::model()->getLogCountForDays($id, $date_1, $date_2);
							}else{
								$total_incidents = @SafetyLogsCauses::model()->getLogCountForDays2($id, $date_1, $date_2, $search_option, $search_value);
							}
							$z = date('M/d', strtotime($date_1)).'-'.date('M/d', strtotime($date_2));
							array_push($x_points, $z);
							$title = " From: {$begin} to {$end}, Monthly";
						}elseif($period_type == 4){
							$date_1 = date('Y-m-d', strtotime($begin. " + {$x} years"));
							$date_2 = date('Y-m-d', strtotime($begin. " + {$y} years"));
							$date_2 = date('Y-m-d', strtotime($date_2. " - 1 day"));
							$day = date('Y-m-d', strtotime($begin. " + {$y} years"));
							if(strtotime($date_2) >= strtotime($end)){$date_2 = $end; $day = $end;}
							if($search_option == 'All'){
								$total_incidents = @SafetyLogsCauses::model()->getLogCountForDays($id, $date_1, $date_2);
							}else{
								$total_incidents = @SafetyLogsCauses::model()->getLogCountForDays2($id, $date_1, $date_2, $search_option, $search_value);
							}
							$z = date('Y/M/d', strtotime($date_1)).'-'.date('Y/M/d', strtotime($date_2));
							array_push($x_points, $z);
							$title = " From: {$begin} to {$end}, Yearly";
						}
						
						
						$total_incidents = intval($total_incidents);
						if($total_incidents == null){$total_incidents = 0;}
						
						
						array_push($y_points, $total_incidents);
						
						
						$pie_chart_row[0] = $z." ({$total_incidents})";
						$pie_chart_row[1] = $total_incidents;
						
						array_push($pie_chart_collection, $pie_chart_row);
						
						$x = $x + 1;
						$y = $x + 1;
						$z = $x + 1;
					}
					//$y = date('Y-m-d', strtotime($y. ' + 1 month'));
				?>
				
				<?php 
				if($chart_type == 1){
					if($search_option == 'All'){
						$title1 = 'Safety Logs Count, '.$cause->name.$title;
					}else{
						$title1 = 'Safety Logs Count, '.$cause->name.$title.' '.$search_option_value.' : '.$search_value;
					}
					$this->Widget('ext.highcharts.HighchartsWidget', array(
						'scripts' => array(
							'modules/exporting',
						),
					   'options'=>array(
						  'title' => array('text' => $title1),
						  'xAxis' => array(
							 'categories' => $x_points,
							 'labels'=>array('rotation'=>45),
						  ),
						  'yAxis' => array(
							 'title' => array('text' => '#')
						  ),
						  'series' => array(
							 array('name' => 'DAY', 'data' => $y_points),
						  )
					   )
					));	
				}
				
				?>
				
				

				<?php
				if($chart_type == 2){
					if($search_option == 'All'){
						$title2 = 'Safety Logs Count, '.$cause->name.$title;
					}else{
						$title2 = 'Safety Logs Count, '.$cause->name.$title.' '.$search_option_value.' : '.$search_value;
					}
					$this->Widget('ext.highcharts.HighchartsWidget', array(
						'scripts' => array(
							'modules/exporting',
						),
						'options' => array(
						  'title' => array('text' => $title2),
						  'xAxis' => array(
							 'categories' => $x_points,
							 'labels'=>array('rotation'=>45),
						  ),
						  'yAxis' => array(
							 'title' => array('text' => 'Count')
						  ),
						  /* 'colors'=>array('#6AC36A', '#FFD148', '#0563FE', '#FF2F2F'), */
						  'gradient' => array('enabled'=> true),
						  'credits' => array('enabled' => false),
						  'exporting' => array('enabled' => true),
						  'chart' => array(
							'plotBackgroundColor' => '#ffffff',
							'plotBorderWidth' => null,
							'plotShadow' => false,
							'height' => 400,
							'type'=>'column'
						  ),
						  /* 'title' => true, */
						   'series' => array(
							  array('name' => 'Data', 'data' => $y_points),
						  ),
						)
					  ));	
				}
				
				?>

				

				<?php
				if($chart_type == 3){
					if($search_option == 'All'){
						$title3 = 'Safety Logs Count, '.$cause->name.$title;
					}else{
						$title3 = 'Safety Logs Count, '.$cause->name.$title.' '.$search_option_value.' : '.$search_value;
					}
					$this->Widget('ext.highcharts.HighchartsWidget', array(
						'scripts' => array(
							'modules/exporting',
						),
						'options' => array(
						  'title' => array('text' => $title3),
						  // 'colors'=>array('#6AC36A', '#FFD148', '#0563FE', '#FF2F2F', '#000000'),
						  // 'colors'=>array('#FFD148', '#0563FE', '#FF2F2F', '#000000'),
						  'gradient' => array('enabled'=> true),
						  'credits' => array('enabled' => false),
						  'exporting' => array('enabled' => true),
						  'chart' => array(
							'plotBackgroundColor' => '#ffffff',
							'plotBorderWidth' => null,
							'plotShadow' => false,
							'height' => 400,
						  ),
						  /* 'title' => true, */
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
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->