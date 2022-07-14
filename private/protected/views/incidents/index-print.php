<?php
/* @var $this IncidentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Incidents',
);

if(isset($_GET['status'])){$status = $_GET['status'];}else{$status = 1;}
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


			
          <div class="row">
            <div class="col-xs-12">
				<?php
						if(isset($_GET['category']) && isset($_GET['action'])){
							$cat = '';
							$number = '';
							$yr = date('y');
							if($_GET['category'] == 'AVIATION'){$cat='A';}
							if($_GET['category'] == 'OSHE'){$cat='O';}
							if($_GET['category'] == 'MINOR'){$cat='M';}
							if($_GET['category'] == 'SERIOUS'){$cat='S';}
							if($_GET['category'] == 'ACCIDENT'){$cat='A';}
							if($_GET['category'] == 'OTHER'){$cat='O';}
							if($_GET['action']=='set'){
								
								if(@Incidents::model()->updateByPk($_GET['id'], array('category'=>$_GET['category'], 'status'=>2))){
					?>
									<div class="callout callout-success">
										<p><?php echo "Occurrence #".$_GET['id']." has been successfully categorised as ".$_GET['category']." and changed status to PENDING"; ?></p>
									</div>
					<?php
									
									if($_GET['type']=='Hazard'){$number = "HZD/{$cat}/{$id}/{$yr}";}
									if($_GET['type']=='Incident'){$number = "INS/{$cat}/{$id}/{$yr}";}
									
									if(($_GET['type']=='Hazard')||($_GET['type']=='Incident')){
										if(@Incidents::model()->updateByPk($_GET['id'], array('number'=>$number))){
											
					?>
											<div class="callout callout-success">
												<p><?php echo "Occurrence #".$_GET['id']." has been successfully assigned number ".$number; ?></p>
											</div>
					<?php
										}
									}
									
								}
							}
						}
					?>

					<?php
						if(isset($_GET['action']) && ($_GET['action'] == 'close')){
							if(@Incidents::model()->updateByPk($_GET['id'], array('status'=>5))){
					?>
								<div class="callout callout-success">
									<p><?php echo "Occurrence #".$_GET['id']." has been successfully <b>CLOSED</b> "; ?></p>
								  </div>
					<?php
							}
						}
					?>
              <div class="box">
                
				
                <div class="box-body">
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
								'itemView'=>'_view',
								/* 'enablePagination' => false, */
							)); ?>
						</tbody>
					</table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->