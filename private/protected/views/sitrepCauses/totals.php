
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management
            <small>Sitrep Causes</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management</li>
			<li class="active">Sitrep Causes</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				
				<?php
				if(!empty($causes)){
				?>
				<table class="table">
				<?php
					foreach($causes as $cause){
				?>
					<tr>
						<td><?php echo $cause->id; ?></td>
						<td><?php echo $cause->name; ?></td>
						<td><?php echo @SitrepCauses::model()->getCount($cause->id); ?></td>
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
					  <ul>
						<li><?php echo CHtml::link('All Entries', array('/'.Yii::app()->getController()->getId().'/admin')); ?></li>
						<li><?php echo CHtml::link('New Entry', array('/'.Yii::app()->getController()->getId().'/create')); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  
				  
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
