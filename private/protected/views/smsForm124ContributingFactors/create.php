<?php
if(isset($_GET['incident'])){$incident = $_GET['incident'];}else{$incident =  NULL;}
?>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?>  Safety Risk Management 
            <small>Contributing Factors</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class=""> Safety Risk Management </li>
			<li class="active">Contributing Factors</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				<?php
				if(isset($_GET['del'])){
					if($_GET['del']==1){
						if(@SmsForm124ContributingFactors::model()->updateByPk($_GET['id'], array('status'=>0))){
				?>
							<div class="callout callout-success">
								<p>The information has been successfully deleted.</p>
							  </div>
				<?php
						}
					}	
				}

				?>
				<style>td{border-bottom: 1px #ccc solid;}</style>
				<?php
				$factors = @SmsForm124ContributingFactors::model()->findAll("incident_id = '{$incident}' and status = 1");
				$k=1;
				if(!empty($factors)){
				echo "<table class='table table-striped' style='margin-bottom: 5px;'>";
				echo "<tr>";
				echo "<th>#</th>";
				echo "<th>Detail(s)</th>";
				echo "<th>Date</th>";
				echo "<th></th>";
				echo "</tr>";
				foreach($factors as $factor){
					echo "<tr>";
					echo "<td style='' >{$k}</td><td  style=''>".$factor->details." </td><td  style=''>".$factor->modified." </td><td  style=''>".CHtml::link('<img src="images/delete.png" alt="Delete" />', array('create', 'incident'=>$incident, 'del'=>1, 'id'=>$factor->id), array('confirm'=>'Are you sure?')).' '."</td>";
					echo "</tr>";
					$k++;
				}
				echo "</table>";	
				}
				
				?>
				

				<?php $this->renderPartial('_form', array('model'=>$model)); ?>

				
                  
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