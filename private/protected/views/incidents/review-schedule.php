<?php
/* @var $this IncidentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Incidents',
);

if(isset($_GET['status'])){$status = $_GET['status'];}else{$status = 0;}
if(isset($_GET['main_category'])){$main_category = $_GET['main_category'];}else{$main_category = "Occurrence";}
if(isset($_GET['category'])){$category = $_GET['category'];}else{$category = NULL;}
if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = NULL;}

$this->menu=array(
	array('label'=>"All {$main_category}s", 'url'=>array('index','main_category'=>"{$main_category}",'status'=>0)),
	array('label'=>"Incoming {$main_category}s", 'url'=>array('index','main_category'=>"{$main_category}",'status'=>1)),
	/* array('label'=>"Pending {$main_category}s", 'url'=>array('index','main_category'=>"{$main_category}",'status'=>2)), */
	array('label'=>"Initiated {$main_category}s", 'url'=>array('index','main_category'=>"{$main_category}",'status'=>3)),
	array('label'=>"Monitored {$main_category}s", 'url'=>array('index','main_category'=>"{$main_category}",'status'=>4)),
	array('label'=>"Closed {$main_category}s", 'url'=>array('index','main_category'=>"{$main_category}",'status'=>5)),
	
);

?>
<?php
	if(isset($_POST['datepicker-showButtonPanel'])){
		$st_dt = $_POST['datepicker-showButtonPanel'];
		$end_dt = $_POST['datepicker-showButtonPanel2'];
	}else{
		$st_dt = date('Y-m-d');
		$end_dt = date('Y-m-d');
	}
?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Review Schedule</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="active">Safety Risk Management</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			
          <div class="row">
            <div class="col-xs-9">
              <div class="box">
                
				<div class="box-body" style="border-bottom: 1px #eee solid;" >
				  <?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'date',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>
				  <div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						<label>From Date:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <?php
							// $date = date('Y-m-d');
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'datepicker-showButtonPanel',
								'value'=>$st_dt,    
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'form-control',
									'style'=>''
								),
							));
							?>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					</div><!-- /.col -->
					<div class="col-md-6">
					  <div class="form-group">
						<label>To Date:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <?php
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'datepicker-showButtonPanel2',
								'value'=>$end_dt,    
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'form-control',
									'style'=>''
								),
							));
							?>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					</div><!-- /.col -->
					
					<div class="col-md-12">
						<input type="hidden" name="main_category" value="<?php echo $main_category; ?>" />
						<input type="hidden" name="status" value="<?php echo $status; ?>" />
						<button type="submit" class="btn btn-default" style="width: 100%;" >Search</button>
					</div>
					
				  </div><!-- /.row -->
				  <?php $this->endWidget(); ?> 
				 
				</div><!-- /.box-body -->
                <div class="box-body">
					 <?php echo CHtml::link('Print', array('/incidents/reviewSchedulePrint'), array('target'=>'_blank', 'class'=>'btn btn-default', 'style'=>'width: 100%;')); ?>
					<style>
						#dataTable_filter{text-align: right;}
					</style>
					<table  class="table table-striped" id="dataTable">
						<thead>
						<tr>
							<th>ID</th>
							<th>NO.</th>
							<th>Details</th>
							<th>Place</th>
							<th>Date</th>
							<th>Type</th>
							<th>Category</th>
							<th>Reported By</th>
							<th>Status</th>
						</tr>
						</thead>
						
						<tbody>
							<?php $this->widget('zii.widgets.CListView', array(
								'dataProvider'=>$dataProvider,
								'itemView'=>'_viewReviewSchedule',
								/* 'enablePagination' => false, */
							)); ?>
						</tbody>
					</table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="col-xs-3">
			<div class="box box-default">
					<div class="box-header with-border">
					  <!-- <i class="fa fa-warning"></i> -->
					  <h3 class="box-title">Operations</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <ul>
						<?php 
							$baseurl = Yii::app()->request->baseUrl;
							echo "<li>".CHtml::link("Report {$main_category}", "{$baseurl}/../occurrences/", array('target'=>'_blank'))."</li>";
						  ?>
					  </ul>
					  
					</div><!-- /.box-body -->
				  </div><!-- /.box -->	
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->