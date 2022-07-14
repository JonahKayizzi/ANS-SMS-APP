
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Promotions
            <small>Employee Recognition #<?php echo $model->id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Promotions</li>
			<li class="active">Employee Recognition #<?php echo $model->id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				<?php echo CHtml::link('<i class="fa fa-print"></i> Form 114', array('form114', 'id'=>$model->id), array('target'=>'_blank', 'class'=>'btn btn-app')); ?>
				
			</div>
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
							<b><?php echo $model->attributeLabels()['nominator_name']; ?></b>
						</td>
						<td><?php echo $model->nominator_name; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['nominator_department']; ?></b>
						</td>
						<td><?php echo $model->nominator_department; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date']; ?></b>
						</td>
						<td><?php echo $model->date; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['nominee_name']; ?></b>
						</td>
						<td><?php echo $model->nominee_name; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['nominee_department']; ?></b>
						</td>
						<td><?php echo $model->nominee_department; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['nominee_supervisor_name']; ?></b>
						</td>
						<td><?php echo $model->nominee_supervisor_name; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['description_of_actions']; ?></b>
						</td>
						<td><?php echo $model->description_of_actions; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_observed']; ?></b>
						</td>
						<td><?php echo $model->date_observed; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['place_observed']; ?></b>
						</td>
						<td><?php echo $model->place_observed; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_received']; ?></b>
						</td>
						<td><?php echo $model->date_received; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['date_reviewed']; ?></b>
						</td>
						<td><?php echo $model->date_reviewed; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['additional_information']; ?></b>
						</td>
						<td><?php echo $model->additional_information; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['nomination_accepted']; ?></b>
						</td>
						<td><?php echo $model->nomination_accepted; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['accepted_date']; ?></b>
						</td>
						<td><?php echo $model->accepted_date; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['accepted_comments']; ?></b>
						</td>
						<td><?php echo $model->accepted_comments; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['award_granted']; ?></b>
						</td>
						<td><?php echo $model->award_granted; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['award_level']; ?></b>
						</td>
						<td><?php echo $model->award_level; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['award_granted_date']; ?></b>
						</td>
						<td><?php echo $model->award_granted_date; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['award_granted_comments']; ?></b>
						</td>
						<td><?php echo $model->award_granted_comments; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['chaiperson_approval']; ?></b>
						</td>
						<td><?php echo $model->chaiperson_approval; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['chaiperson_approval_date']; ?></b>
						</td>
						<td><?php echo $model->chaiperson_approval_date; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['modified']; ?></b>
						</td>
						<td><?php echo $model->modified; ?></td>
					</tr>
					<tr>
						<td style="width: 25%">
							<b><?php echo $model->attributeLabels()['reported_by']; ?></b>
						</td>
						<td><?php echo $model->reported_by; ?></td>
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
				 
			</div>
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->