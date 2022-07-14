

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
							<option value="2" >Line</option>
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
		<?php if($chart_type == 1){ ?>
		 <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				
					
					
					<?php
					$this->Widget('ext.highcharts.HighchartsWidget', array(
					'scripts' => array(
									'modules/exporting',
								),
						'options' => array(
						  'title' => array('text' => 'KPI(s)'),
						  'xAxis' => array(
							 'categories' => $xaxis,
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
							  array('name' => 'Green', 'data' => $array_green),
							  array('name' => 'Orange', 'data' => $array_orange),
								array('name' => 'Red', 'data' => $array_red),
						  ),
						)
					  ));
					?>
				</div>
			</div>
		</div>
		</div>
		<?php } ?>
		<?php if($chart_type == 2){ ?>
		<div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				
					
					
					<?php
					$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'title' => array('text' => 'KPI(s)'),
      'xAxis' => array(
         'categories' => $xaxis,
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
						  ),
      'series' => array(
							  array('name' => 'Green', 'data' => $array_green),
							  array('name' => 'Orange', 'data' => $array_orange),
								array('name' => 'Red', 'data' => $array_red),
						  ),
   )
));
					?>
				</div>
			</div>
		</div>
		</div>
		<?php } ?>
		<?php if($chart_type == 3){ ?>
		<div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				
					
					
					<?php
					$this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
      'colors'=>array('green', 'orange', 'red'),
      'gradient' => array('enabled'=> true),
      'credits' => array('enabled' => false),
      'exporting' => array('enabled' => false),
      'chart' => array(
        'plotBackgroundColor' => '#ffffff',
        'plotBorderWidth' => null,
        'plotShadow' => false,
        'height' => 400,
      ),
      'title' => false,
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
            array('Green', $total_green),
            array('Orange', $total_orange),
            array('Red', $total_red),
          ),
        ),
      ),
    )
  ));
					?>
				</div>
			</div>
		</div>
		</div>
		<?php } ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->