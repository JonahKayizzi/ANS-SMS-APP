
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Risk Management 
            <small>Corrective Actions</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Risk Management </li>
			<li class="active">Corrective Actions</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
               
				
                <div class="box-body">
				
				
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'sms-form124-corrective-actions-grid',
					'dataProvider'=>$model->search(),
					//'filter'=>$model,
					'columns'=>array(
						'id',
						/* 'incident_id', */
						array('header' => 'Incident', 'value' => '@$data->incident->occurrence'),
						/* 'action', */
						'owner',
						'completion_date',
						'modified',
						/* 'status', */
						/*
						'incident_id',
						*/
						array(
							'class'=>'CButtonColumn',
							'template'=>'<td>{view}</td><td>{update}</td><td>{delete}</td>',
							'buttons'=>array(
								'view'=>array(
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/1463413137_icon-111-search.png',
								),
								'update'=>array(
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/1463413089_icon-136-document-edit.png',
								),
								'delete'=>array(
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/1463413186_delete_unapprove_discard_remove_x_red.png',
								),
							),
						),
					),
				)); ?>
                  
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

