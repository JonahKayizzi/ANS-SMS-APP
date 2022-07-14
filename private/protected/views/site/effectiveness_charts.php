
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Monitor Effectivenss</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Monitor Effectivenss</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

				<div class="row">
            <div class="col-xs-12">

              <div class="box">
				
                <div class="box-body">
				<style>
						#dataTable_filter{text-align: right;}
					</style>
				
				<?php 
				
				$this->Widget('ext.highcharts.HighchartsWidget', array(
				   'options' => array(
					  'title' => array('text' => 'Number of Recurring Occurrences from 2016-01-01 to 2016-10-10'),
					  'xAxis' => array(
						 'categories' => array('Jan', 'Feb', 'March')
					  ),
					  'yAxis' => array(
						 'title' => array('text' => 'Count')
					  ),
					  'series' => array(
						 array('name' => 'Issues', 'data' => array(1, 0, 4)),
						 array('name' => 'Hazards', 'data' => array(5, 7, 3)),
						 array('name' => 'Incidents', 'data' => array(2, 4, 2)),
					  )
				   )
				));
				
				?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
