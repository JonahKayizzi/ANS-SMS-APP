
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?> Safety Assurance
            <small>Safety Logs</small>
          </h1>
          <ol class="breadcrumb">
            <li><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Home', array('/site/dashboard/')); ?></li>
            <li class="">Safety Assurance</li>
			<li class="active">Safety Logs</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
				
                <div class="box-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'search',
					'htmlOptions'=>array(
					   'style'=>'display:inline!important;'
					))); ?>
				<div class="row">
					<div class="col-md-12">
						<?php echo $form->errorSummary($search_model); ?>
					</div>
					
					<div class="col-md-6">
					  <div class="form-group">
						<label>From Date:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <?php
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'SearchForm[start_date]',
								'value'=>$start_date,     
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'form-control'
								),
							));
							?> 
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					</div><!-- /.col -->
					<div class="col-md-6">
					  <div class="form-group">
						<label>To Date:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <?php
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'SearchForm[end_date]',
								'value'=>$end_date,     
								'options'=>array(
									'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									'showButtonPanel'=>true,
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'form-control'
								),
							));
							?> 
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					</div><!-- /.col -->
					
					<div class="col-md-6">
						<?php echo $form->dropDownList($search_model,'search_field1',SafetyLogs::getFields(),array('class'=>'form-control')); ?>
					</div>
					<div class="col-md-6">
						<?php echo $form->textField($search_model,'search_criteria1',array('class'=>'form-control', 'style'=>'margin: 5px 0px 5px 0px;')); ?>
					</div>
					<div class="col-md-6">
						<?php echo $form->dropDownList($search_model,'search_field2',SafetyLogs::getFields(),array('class'=>'form-control')); ?>
					</div>
					<div class="col-md-6">
						<?php echo $form->textField($search_model,'search_criteria2',array('class'=>'form-control', 'style'=>'margin: 5px 0px 5px 0px;')); ?>
					</div>
					
					<div class="col-md-12">
						<input type="submit" value="Search" class="form-control" style="background-color: #ccc;" />
					</div>
					
				  </div><!-- /.row -->
				<?php $this->endWidget(); ?>
				
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'safety-logs-grid',
					'dataProvider'=>$model->search(),
					//'filter'=>$model,
					'columns'=>array(
						'id',
						'date_occured',
						'time',
						'aircraft',
						'type',
						'registrar',
						
						'operator',
						'route',
						'event',
						/* 'category', */
						array('header' => 'Cause', 'value' => '@$data->category0->name'),
						/* 'cause', */
						array('header' => 'Category', 'value' => '@$data->cause0->name'),
						/* 'remarks', */
						/* 'action_taken', */
						/* 'entered_into_summary' */
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
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
