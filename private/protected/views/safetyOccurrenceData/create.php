<?php if(isset($_GET['id'])){$id = $_GET['id'];}else{$id = NULL;} ?>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Safety Occurrence Data</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Safety Occurrence Data</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header with-border">
				<?php $incident = @Incidents::model()->findByPk($_GET['incident']); ?>
                   <h3 class="box-title">
					<?php echo CHtml::link($incident->main_category.' #'.$incident->id.' '.$incident->number.' '.$incident->occurrence.' @ '.$incident->place, array('/incidents/view', 'id'=>$incident->id)); ?> << <i>Click to view details.</i>
					</h3>
				  
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
				  
				  <?php echo CHtml::link('Print', array('/safetyOccurrenceData/view', 'id'=>$id), array('target'=>'_blank', 'class'=>'btn btn-primary pull-right')); ?>
                </div><!-- /.box-header -->
				
                <div class="box-body">
				<?php $this->renderPartial('_form', array('model'=>$model)); ?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->