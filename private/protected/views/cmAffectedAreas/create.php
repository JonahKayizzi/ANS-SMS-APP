<?php
if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = NULL;}
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?>  Safety Assurance
            <small>Change Management Affected Areas</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class=""> Safety Assurance</li>
			<li class="active">Change Management Affected Areas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				<?php $this->renderPartial('_form', array('model'=>$model)); ?>

				<style>.td_cls td{border: 1px #ccc solid;}</style>

				<?php
				$items = @CmAffectedAreas::model()->findAll("change_management_id = {$id} and status = 1");
				if(!empty($items)){
					$k = 1;
				?>
					<table width="100%" class="table table-stripped table-hover">
						<tr>
							<td><b>No.</b></td><td><b>Change Management ID</b></td><td><b>Area Affected</b></td><td><b>Recorded On</b></td><td><b>Recorded By</b></td>
						</tr>
						<?php
							foreach($items as $item){
						?>
							<tr>
								<td><?php echo $k; ?></td><td><?php echo $id; ?></td><td><?php echo $item->details; ?></td><td><?php echo $item->modified; ?></td><td><?php echo $item->reported_by; ?></td>
							</tr>
						<?php
							}
						?>
					</table>
				<?php	
				}
				?>
                  
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
					  NONE
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				 
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->