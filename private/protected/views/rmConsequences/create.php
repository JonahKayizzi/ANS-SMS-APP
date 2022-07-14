<?php
if(isset($_GET['rm_id'])){$rm_id = $_GET['rm_id'];}else{$rm_id = NULL;}
?>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Policy &amp; Objectives
            <small>Risk Management Consequences</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Policy &amp; Objectives</li>
			<li class="active">Risk Management Consequences</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                <div cla
				
                <div class="box-body">
				<?php $this->renderPartial('_form', array('model'=>$model)); ?>

				<style>.td_cls td{border: 1px #ccc solid;}</style>

				<?php
				$items = @RmConsequences::model()->findAll("risk_management_id = {$rm_id} and status = 1");
				if(!empty($items)){
					$k = 1;
				?>
					<table width="100%" class="table table-stripped table-hover">
						<tr>
							<th><b>No.</b></th><th><b>RM ID</b></th><th><b>Details</b></th><th><b>Recorded On</b></th><th><b>Recorded By</b></th><th></th>
						</tr>
						<?php
							foreach($items as $item){
						?>
							<tr>
								<td><?php echo $k; ?></td><td><?php echo $rm_id; ?></td><td><?php echo $item->details; ?></td><td><?php echo $item->modified; ?></td><td><?php echo $item->reported_by; ?></td><td>[Delete]</td>
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