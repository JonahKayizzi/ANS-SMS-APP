
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Promotions
            <small>Lessons Learnt #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Promotions</li>
			<li class="active">Lessons Learnt #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

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
							<b><?php echo $model->attributeLabels()['source_type']; ?></b>
						</td>
						<td><?php echo $model->source_type; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['source_detail']; ?></b>
						</td>
						<td><?php echo $model->source_detail; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['safety_concern']; ?></b>
						</td>
						<td><?php echo $model->safety_concern; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['Description']; ?></b>
						</td>
						<td><?php echo $model->Description; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['Divission']; ?></b>
						</td>
						<td><?php echo $model->Divission; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['category']; ?></b>
						</td>
						<td><?php echo $model->category; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['sub_category']; ?></b>
						</td>
						<td><?php echo $model->sub_category; ?></td>
					</tr>
					
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['cost']; ?></b>
						</td>
						<td><?php echo number_format($model->cost); ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_reported']; ?></b>
						</td>
						<td><?php echo $model->date_reported; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['sent_to']; ?></b>
						</td>
						<td><?php echo $model->sent_to; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['send_to_individual']; ?></b>
						</td>
						<td><?php echo $model->send_to_individual; ?></td>
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
						<li><?php echo CHtml::link('All Entries', array('/'.Yii::app()->getController()->getId().'/admin')); ?></li>
						<li><?php echo CHtml::link('New Entry', array('/'.Yii::app()->getController()->getId().'/create')); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  
				  <div class="box box-default">
					<div class="box-body">
					  <ul>
						<li><?php echo CHtml::link('Search', array('/lessonsLearnt/report'), array('target'=>'_blank')); ?></li>
					  </ul>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  
				 
				 
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->