

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Gap Analysis #<?php echo $model->questionnaire_id; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Gap Analysis #<?php echo $model->questionnaire_id; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Gap Analysis #<?php echo $model->questionnaire_id; ?>: <?php echo $model->title; ?> </h3>
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
				 &nbsp; <a href="index.php?r=questionnaire/print&id=<?php echo $model->questionnaire_id?>" class="btn btn-primary pull-right" target="_blank" style="margin-left: 5px;">Print</a> &nbsp; <a href="index.php?r=questionnaire/fill&id=<?php echo $model->questionnaire_id?>&form_status=UPDATE" class="btn btn-warning pull-right" style="margin-left: 5px;">Update</a> &nbsp;
				  
                </div><!-- /.box-header -->
				
                <div class="box-body">
				<div class="row">
						<div class="col-md-12">
							<div class="box box-default collapsed-box box-solid"   >
								<div class="box-header with-border" style="background-color: #ccc;">
								  <h3 class="box-title">Edit Trail</h3>
								  <div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
									<!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
								  </div>
								</div><!-- /.box-header -->
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<?php
												$trails = @QuestionnaireEditTrail::model()->findAll("questionnaire_id = '{$model->questionnaire_id}'");
												if(!empty($trails)){
											?>
											<table class="table table-stripped">
												<tr>
													<th>#</th>
													<th>Action</th>
													<th>Date</th>
													<th>User</th>
												</tr>
												<?php
													$k = 1;
													foreach($trails as $trail){
												?>
												<tr>
													<td><?php echo $k; ?></td>
													<td><?php echo @$trail->action; ?></td>
													<td><?php echo @$trail->date; ?></td>
													<td><?php echo @$trail->userRelation->name; ?></td>
												</tr>
												<?php
													$k++;
													}
												?>
												
											</table>
											<?php
												}else{
													echo "There are no changes made to this gap analysis yet.";
												}
											?>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php /* $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						'questionnaire_id',
						'date_created',
					),
				)); */ ?>

					<style>

				.table2 {
					border-collapse: collapse;
				   width:100%;
				margin:auto;
				}

				.table2, .table2 th, .table2 td {
					border: 1px solid black;
				}
						.table2 th {
					background: #BCDAE6;
					padding:5px;
					text-align: left;
				   
				}
				textarea{
					width: 98%;
				}

				.number{
				width:40px;
				}
				.table2 tr{
				border: 1px solid grey;
				}
				.table2 td{
				padding:5px;
				border: 1px solid grey;
				}
				.table2 .question{
							width:400px;
						}
				.table2 .level{
							width:300px;
						}
					</style>
				<table style="border-bottom:none;" class="table2">
				<tr><th><center>SAFETY MANAGEMENT SYSTEM GAP ANALYSIS</center></th></tr>
				<tr><td style="background:#C8E6BC;"><center><b>Safety Risk Management</b></center></td></tr>
				<tr><td ><center><b>ASSESSMENT CHECKLIST — AIR OPERATORS</b></center></td></tr>
				</table>
				<table cellspacing="0" class="table2">
				   <tr><th class='number'>No</th><th class='question'>Organization risk parameter</th>

					<th>Answer</th><th>Status of implementation</th><th>Action Required</th></tr>        
				<?php foreach($questions as $qn ){ 
				include "sections.php";
					?>

				 <tr>
				   <td><?php echo $qn->question_no; ?></td>
				   <td><?php echo $qn->question; ?></td>

				   <?php 
				$answers = @QuestionnaireQuestionAnswers::model()->findAll("questionnaire_id ='{$model->questionnaire_id}' and question_id = '{$qn->question_id}'");
				   ?>
				<?php if(!empty($answers)){ 
				foreach($answers as $answer){ ?>

				<td>
					<?php echo $answer->answer; ?>
				   </td>
				   <td>
					 <?php echo $answer->status_of_implementation; ?>
				   </td>
				<td>
					<?php $audit_form_info = @AuditForm::model()->findByAttributes(array('questionnaire'=>$model->questionnaire_id, 'questionnaire_sub_element'=>$qn->question_id)); echo @$audit_form_info->suggested_corrective_action.'<br />'; ?>
					 <?php echo $answer->action_required; ?>
				   </td>
				   

				<?php } }else{ ?>

				<?php } ?>   
				 </tr>
				<?php } ?>

				</table>
				<br/>
				<br/>
				<table style="width:40%" class="table2">
				<tr>
					<th colspan="2">Summary</th>
				</tr>

				<tr>
					<td></td>
					<td><b>Subtotal</b></td>
				</tr>
				<?php
				$total = null;
				foreach ($summary as $item ) {
					?>
					<tr>
				<td><?php
				echo $item['answer'];
				?></td>
				<td><?php
				echo $item['count'];
				?>
				</td>
				</tr>
					<?php
					$total+=$item['count'];

				}
				?>
				<tr>
				<td>Total number of questions</td>
				<td><?php echo $total ?></td>
				</tr>
				</table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->