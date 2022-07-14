
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Notifications
            <small>Notification #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Notifications</li>
			<li class="active">Notification #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<?php if($model->acknowledge == 0){ ?>
				<div class="col-xs-3">
					
					<?php echo CHtml::link('<i class="fa fa-check"></i> Acknowledge', array('view', 'id'=>$model->id, 'acknowledge'=>1), array('confirm'=>'Are you sure?', 'class'=>'btn btn-app', 'style'=>'background-color: #00A65A; color: #fff;')); ?>
					
				</div>
				<?php } ?>
				<?php if(isset($_GET['acknowledge'])){ ?>
				<div class="col-xs-9">
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">?</button>
						<h4>	<i class="icon fa fa-exclamation-triangle"></i> Alert!</h4>
						<p>You have acknowledged receipt of this message.</p>
					</div>
				</div>
				<?php } ?>
			</div>
          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				
				
				<table class="table table-stripped">
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['id']; ?></b>
						</td>
						<td><?php echo $model->id; ?></td>
					</tr>
					
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['subject']; ?></b>
						</td>
						<td><?php echo $model->subject; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['description']; ?></b>
						</td>
						<td><?php echo $model->description; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['user_from']; ?></b>
						</td>
						<td><?php echo @$model->user_from_relation->name; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['type']; ?></b>
						</td>
						<td><?php echo $model->type; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['urgent']; ?></b>
						</td>
						<td><?php echo $model->urgent; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_created']; ?></b>
						</td>
						<td><?php echo $model->date_created; ?></td>
					</tr>
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
						<li><?php echo CHtml::link('All Entries', array('/'.Yii::app()->getController()->getId().'/index')); ?></li>
						<li><?php echo CHtml::link('New Entry', array('/'.Yii::app()->getController()->getId().'/create')); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  
				  
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
