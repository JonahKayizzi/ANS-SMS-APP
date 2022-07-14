<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Audit Forms</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Audit Forms</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-9">

              <div class="box">
                
				
                <div class="box-body">
				
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'audit-form-grid',
					'dataProvider'=>$model->search(),
					//'filter'=>$model,
					'columns'=>array(
						//'issue_no',
						/* 'audit_plan_id', */
						'issue_no',
						/* 'audit_plan_id', */
						array('header' => 'Audit Plan Title', 'value' => '@$data->auditPlan->title'),
						'area_audited',
						'area_audited_date',
						/* 'questionnaire', */
						/* 'questionnaire_sub_element', */
						/* array('header' => 'Gap Analysis sub element', 'value' => '@$data->questionnaireQuestion->question'), */
						'area_audited',
						/* 'user_id', */
						
						/* 'issue_date',
						'auditor_technical_assessor',
						'area_audited',
						'area_audited_date',
						'auditees_representative', */
						/*
						'detailed_observation',
						'classification_of_non_conformance',
						'reference_number_of_iso_9001_or_procedure',
						'root_cause_analysis_of_non_conformance',
						'suggested_corrective_action',
						'proposed_date_of_realisation',
						'verification_of_proof',
						'verification_of_proof_date',
						'lead_auditors_comments',
						'lead_auditors_comments_date',
						'user_id',
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