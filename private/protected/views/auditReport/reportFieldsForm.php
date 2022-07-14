
 	<h4>Add Field</h4>
    <?php
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.tinymce.SladekTinyMce.php');
?>
    <?php 

    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'audit-report-fields-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	     'enableAjaxValidation'=>true,
        'action'=>$this->createUrl('auditReportFields/create'),
        'enableClientValidation'=>true,
	
	

	'enableAjaxValidation'=>false,
)); ?>


		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class'=>"form-control",'size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>

		<?php echo $form->labelEx($model,'description'); ?>

        <?php
$this->widget('KRichTextEditor', array(
    'model' => $model,
  
    'attribute' => 'description',
    'htmlOptions' => array( 'class'=>"form-control",'rows'=>6, 'cols'=>50,'style'=>'width:100%;'),
    'options' => array(
        'theme_advanced_resizing' => 'true',
        'theme_advanced_statusbar_location' => 'bottom',
        'theme_advanced_buttons1' => "bold,italic,underline,| ,fontsizeselect ,|, bullist,numlist",
         'theme_advanced_buttons2' => false,
    ),
));
?>
		
		<?php echo $form->error($model,'description'); ?>
            <?php echo $form->hiddenField($model,'report_id',array('value'=>$report->id)); ?>

	
  <?php echo CHtml::ajaxSubmitButton('Save',CHtml::normalizeUrl(array('auditReportFields/create','render'=>true)),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'success'=>'function(data) {
                        alert("Form data Added successfully");
                           
                        if(data.status=="success"){
                        $("#report_table").append("<tr><td>"+$("#AuditReportFields_name").val()+"</td><td>"+$("#AuditReportFields_description").val()+"</td><td style=\"width:50px\"> <button type=\"button\" class=\"remove-news btn  btn-default\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Delete\"><span class=\"glyphicon glyphicon-trash\"></span></button></td></tr>")
                        
                         $("#audit-report-fields-form")[0].reset();
                        }
                         else{
                         	alert("Some Fields are Missing");
                        $.each(data, function(key, val) {
                        $("#user-form #"+key+"_em_").text(val);                                                    
                        $("#user-form #"+key+"_em_").show();
                        });
                        }       
                    }'
                    ,                    
                     'beforeSend'=>'function(){                        
                           
                      }'
                     ),array('id'=>'mybtn','class'=>'btn btn-primary form-control')); ?> 
                     <?php $this->endWidget();?>
                     <br/>

	


