
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;')); ?>  Safety Assurance
            <small>Hazards By Category</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Safety Assurance</li>
			<li class="active">Hazards By Category</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Hazards By Category</h3>
				  
                </div><!-- /.box-header -->
				
                <div class="box-body">
				
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'trends-form',
				'htmlOptions'=>array(
				   'style'=>'display:inline!important;'
				))); ?>

				<p class="note">Fields with <span class="required">*</span> are required.</p>

				<?php echo $form->errorSummary($model); ?>

					<?php echo $form->labelEx($model,'selectionType'); ?>
					<?php echo $form->dropDownList($model,'selectionType',array('year'=>'year','day'=>'day')); ?>
					<?php echo $form->error($model,'selectionType'); ?>


			<span class="year_fields">
					<?php echo $form->labelEx($model,'year'); ?>
					<?php echo $form->dropDownList($model,'year',TrendAnalysis::getYearsArray()); ?>
					<?php echo $form->error($model,'year'); ?>
			</span>

				 <span class="date_fields" style="display:none">
					<?php echo $form->labelEx($model,'fromDate'); ?>
			   
					<?php 

			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'attribute'=>'fromDate',
				// additional javascript options for the date picker plugin
				'model'=>$model,
				'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
									),
				'htmlOptions'=>array(
					'style'=>'height:20px;'
				),
			));
					 ?>

							 <?php echo $form->labelEx($model,'toDate'); ?>
					<?php 

			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'attribute'=>'toDate',
				// additional javascript options for the date picker plugin
				'model'=>$model,
				'options'=>array(
								'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								'showButtonPanel'=>true,
								'dateFormat'=>'yy-mm-dd',
									),
				'htmlOptions'=>array(
					'style'=>'height:20px;'
				),
					));
					 ?>
				 </span>

					 <?php echo $form->labelEx($model,'chatType'); ?>
					<?php echo $form->dropDownList($model,'chatType',array("bar"=>"bar", "line"=>"line", "area"=>"area","pie"=>"pie")); ?>
					<?php echo $form->error($model,'chatType'); ?>


			<?php echo CHtml::submitButton('Submit' ); ?>


			<?php $this->endWidget(); ?>

			<?php

			$this->widget('application.extensions.cvisualizewidget.CVisualizeWidget',array(
				'data'=>array(
					'headings'=>$trends['labels'],
					'data'=>$trends['data']
				),
				'options' => array(
					"type"=>$model->chatType,
					'title'=>$model->title,
					'width'=>900,
					'height'=>250
				)
			));


			 Yii::app()->clientScript->registerScript('myselectbox', "$('#TrendAnalysis_selectionType').change(function(){ 

				if($(this).val()=='year'){
					$('.date_fields').hide();
					$('.year_fields').show();

					}
				else{
					$('.date_fields').show();
					$('.year_fields').hide();
				}    
			 });"); ?> 

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


