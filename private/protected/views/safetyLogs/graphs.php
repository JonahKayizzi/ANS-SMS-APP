
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Safety Logs Graphs</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Safety Logs Graphs</li>
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
				<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?php echo CHtml::link('Print', array('/safetyLogs/graphsPrint', 'start_date'=>$start_date, 'end_date'=>$end_date, 'period_type'=>$period_type, 'chart_type'=>$chart_type, 'search_option'=>$search_option, 'search_value'=>$search_value), array('class'=>'btn btn-primary', 'style'=>'width: 100%;', 'target'=>'_blank')); ?>
			</div>
		</div>
          <div class="row">
			
			<div class="col-xs-12">
			
				    <div class="box">
						<?php 
						if($search_option == 'All'){
							$total=SafetyLogs::getTotalCount($start_date, $end_date);
						}else{
							$total=SafetyLogs::getTotalCount2($start_date, $end_date, $search_option, $search_value);
						} 
						?>
						<table class="table table-stripped">
						<thead>
						<tr>
						<td>
						</td>
						<td colspan=3>
						Cause
						</td>
						</tr>
						</thead>
						<?php
						if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 14)&&($period_type == 1)){
							$period_type = 2;
						}
						
						if((abs((strtotime($end_date) - strtotime($start_date))/(60*60*24)) > 31)&&($period_type == 2)){
							$period_type = 3;
						}
						
						switch($period_type){
							case 1: $p_type = "Daily"; break;
							case 2: $p_type = "Weekly"; break;
							case 3: $p_type = "Monthly"; break;
							case 4: $p_type = "Yearly"; break;
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
						
						$i=0;
						$line_graph_collection_1 = array();
						$line_graph_1 = array();
						$pie_chart_collection_1 = array();
						$pie_chart_1 = array();
						foreach($categories as $category_item){
							if($search_option == 'All'){
								$line_graph_values_1 = @SafetyLogsCategories::model()->categoryPlotValues($category_item->id, $start_date, $end_date, $period_type);
							}else{
								$line_graph_values_1 = @SafetyLogsCategories::model()->categoryPlotValues2($category_item->id, $start_date, $end_date, $period_type, $search_option, $search_value);
							}
							
							$line_graph_1['name']=$category_item->name;
							$line_graph_1['data']=$line_graph_values_1[0];
							array_push($line_graph_collection_1, $line_graph_1);
						$i++;
						?>
						<tr>
						<td><?php echo $i ?></td>
						<td><?php echo CHtml::link($category_item->name, array('/safetyLogs/category', 'id'=>$category_item->id)); ?></td>
						<td>
						<?php if($search_option == 'All'){ ?>
							<?php if($total != 0){$calc = ((SafetyLogsCategories::getLogCount($category_item->id, $start_date, $end_date))/$total)*100; echo round($calc, 1);}else{$calc = 0; echo round($calc, 1);} ?>%
						<?php }else{ ?>
							<?php if($total != 0){$calc = ((SafetyLogsCategories::getLogCount2($category_item->id, $start_date, $end_date, $search_option, $search_value))/$total)*100; echo round($calc, 1);}else{$calc = 0; echo round($calc, 1);} ?>%
						<?php } ?>
						</td>

						</tr>
						<?php
							$pie_chart_1[0] = $category_item->name;
							$pie_chart_1[1] = $calc;
							array_push($pie_chart_collection_1, $pie_chart_1);
						}
						?>
						</table>
						
						<?php
						if($chart_type == 1){
							if($search_option == 'All'){
								$title1 = "Causes from {$start_date} to {$end_date}, {$p_type}";
							}else{
								$title1 = "Causes from {$start_date} to {$end_date}, {$p_type}, {$search_option_value} : {$search_value}";
							}
							$this->Widget('ext.highcharts.HighchartsWidget', array(
								'scripts' => array(
									'modules/exporting',
								),
							   'options'=>array(
								  'title' => array('text' => $title1),
								  'xAxis' => array(
									 'categories' => $line_graph_values_1[1],
									 'labels'=>array('rotation'=>45),
								  ),
								  'yAxis' => array(
									 'title' => array('text' => '#')
								  ),
								  'credits' => array('enabled' => false),
								  'series' => $line_graph_collection_1
							   )
							));	
						}
						
						?>
						
						<?php
						if($chart_type == 2){
							
							//var_dump($line_graph_values_1[1]);
							//var_dump($line_graph_collection_1);
							
							if($search_option == 'All'){
								$title2 = "Causes from {$start_date} to {$end_date}, {$p_type}";
							}else{
								$title2 = "Causes from {$start_date} to {$end_date}, {$p_type}, {$search_option_value} : {$search_value}";
							}
							$this->Widget('ext.highcharts.HighchartsWidget', array(
								'scripts' => array(
									'modules/exporting',
								),
								'options' => array(
								  'title' => array('text' => $title2),
								  'xAxis' => array(
									 'categories' => $line_graph_values_1[1],
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
								   'series' => $line_graph_collection_1,
								)
							  ));	
						}
						
						?>
						
						<?php
						if($chart_type == 3){
							if($search_option == 'All'){
								$title3 = "Causes from {$start_date} to {$end_date}, {$p_type}";
							}else{
								$title3 = "Causes from {$start_date} to {$end_date}, {$p_type}, {$search_option_value} : {$search_value}";
							}
							$this->Widget('ext.highcharts.HighchartsWidget', array(
								'scripts' => array(
									'modules/exporting',
								),
								'options' => array(
									'title' => array('text' => $title3),
								  // 'colors'=>array('#6AC36A', '#FFD148', '#0563FE', '#FF2F2F', '#000000'),
								 /*  'colors'=>array('#FFD148', '#0563FE', '#FF2F2F', '#000000'), */
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
									  'data' => $pie_chart_collection_1,
									),
								  ),
								)
							  ));	
						}
						
						?>
					</div>
			</div>
			</div>
			<div class="row">
			<div class="col-xs-12">
				<div class="box">

					<table class="table table-stripped">
					<thead>
					<tr>
					<td>
					</td>
					<td colspan=3>
					Category
					</td>
					</tr>
					</thead>
					<?php
					$i=0;
					$line_graph_collection = array();
					$line_graph = array();
					$pie_chart_collection = array();
						$pie_chart = array();
					foreach($causes as $causes_item){
						if($search_option == 'All'){
							$line_graph_values = @SafetyLogsCauses::model()->causePlotValues($causes_item->id, $start_date, $end_date, $period_type);
						}else{
							$line_graph_values = @SafetyLogsCauses::model()->causePlotValues2($causes_item->id, $start_date, $end_date, $period_type, $search_option, $search_value);
						}
						
						$line_graph['name']=$causes_item->name;
						$line_graph['data']=$line_graph_values[0];
						array_push($line_graph_collection, $line_graph);
					$i++;
					?>
					<tr>
					<td><?php echo $i ?></td>
					<td><?php echo CHtml::link($causes_item->name, array('/safetyLogs/cause', 'id'=>$causes_item->id)); ?></td>
					<td>
					<?php if($search_option == 'All'){ ?>
						<?php if($total != 0){$calc = ((SafetyLogsCauses::getLogCount($causes_item->id, $start_date, $end_date))/$total)*100; echo round($calc, 1);}else{$calc = 0; echo round($calc, 1);} ?>%
					<?php }else{ ?>
						<?php if($total != 0){$calc = ((SafetyLogsCauses::getLogCount2($causes_item->id, $start_date, $end_date, $search_option, $search_value))/$total)*100; echo round($calc, 1);}else{$calc = 0; echo round($calc, 1);} ?>%
					<?php } ?>
					</td>

					</tr>
					<?php
						$pie_chart[0] = $causes_item->name;
							$pie_chart[1] = $calc;
							array_push($pie_chart_collection, $pie_chart);
					}
					?>
					</table>
					
					<?php
					if($chart_type == 1){
						if($search_option == 'All'){
								$title1 = "Categories from {$start_date} to {$end_date}, {$p_type}";
							}else{
								$title1 = "Categories from {$start_date} to {$end_date}, {$p_type}, {$search_option_value} : {$search_value}";
							}
						$this->Widget('ext.highcharts.HighchartsWidget', array(
							'scripts' => array(
								'modules/exporting',
							),
						   'options'=>array(
							  'title' => array('text' => $title1),
							  'xAxis' => array(
								 'categories' => $line_graph_values[1],
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
							
							//var_dump($line_graph_values_1[1]);
							//var_dump($line_graph_collection_1);
							
							if($search_option == 'All'){
								$title1 = "Categories from {$start_date} to {$end_date}, {$p_type}";
							}else{
								$title1 = "Categories from {$start_date} to {$end_date}, {$p_type}, {$search_option_value} : {$search_value}";
							}
							$this->Widget('ext.highcharts.HighchartsWidget', array(
								'scripts' => array(
									'modules/exporting',
								),
								'options' => array(
								  'title' => array('text' => $title1),
								  'xAxis' => array(
									 'categories' => $line_graph_values[1],
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
								   'series' => $line_graph_collection,
								)
							  ));	
						}
						
						?>
					
					<?php
					if($chart_type == 3){
						if($search_option == 'All'){
								$title3 = "Categories from {$start_date} to {$end_date}, {$p_type}";
							}else{
								$title3 = "Categories from {$start_date} to {$end_date}, {$p_type}, {$search_option_value} : {$search_value}";
							}
						$this->Widget('ext.highcharts.HighchartsWidget', array(
								'scripts' => array(
									'modules/exporting',
								),
								'options' => array(
									'title'=>array('text'=>$title3),
								  // 'colors'=>array('#6AC36A', '#FFD148', '#0563FE', '#FF2F2F', '#000000'),
								 /*  'colors'=>array('#FFD148', '#0563FE', '#FF2F2F', '#000000'), */
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

				</div>
			</div>
			
			
            
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
