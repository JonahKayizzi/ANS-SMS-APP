<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<span style="color: red;" ><?php echo $form->errorSummary($model); ?></span>
<table  class="table" >
	<tr valign="top" >
		<td width="50%">
			<table class="table" width="100%">
				<tr>
					<td width="100%">
					<?php echo $form->labelEx($model,'name'); ?><br />
					<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'name', array('style'=>'color: red;')); ?>
					</td>
				</tr>
				<tr>
					<td>
						<span style="color: red;"><b>Category*</b></span><br />
						<table>
							<tr>
								<td>
									<?php $list_data = CHtml::listData(UserCategories::model()->findAll("status = 1"), 'id', 'name'); ?>
									<?php echo $form->checkBoxList($model,'category_ids',$list_data,array('class'=>'')); ?>
								</td>
								<td>
									<?php 
									if(Yii::app()->controller->action->id == 'update'){
										$category_items = @UsersCategories::model()->findAll("user_id = {$model->id} and status = 1");
										if(!empty($category_items)){
											echo "<ul>";
											foreach($category_items as $category_item){
												echo "<li>".@$category_item->category->name."</li>";
											}	
											echo "</ul>";
										}
									}
									?>
								</td>
							</tr>
						</table>
					
					
					</td>
				</tr>
				<tr>
					<td>
					<?php echo $form->labelEx($model,'username'); ?><br />
					<?php echo $form->textField($model,'username',array('class'=>'form-control', 'disabled'=>'true')); ?>
					<?php echo $form->error($model,'username', array('style'=>'color: red;')); ?>
					</td>
				</tr>
				<tr>
					<td style="display:none">
					<?php echo $form->labelEx($model,'password'); ?><br />
					<?php echo $form->textField($model,'password',array('class'=>'form-control', 'disabled'=>'true')); ?>
					<?php echo $form->error($model,'password', array('style'=>'color: red;')); ?>
					</td>
				</tr>
				
			</table>
		</td>
		<td>
			<table class="table" width="100%">
				<tr>
					<td width="100%">
					<?php echo $form->labelEx($model,'phone_number'); ?><br />
					<?php echo $form->textField($model,'phone_number',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'phone_number', array('style'=>'color: red;')); ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo $form->labelEx($model,'email'); ?><br />
					<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'email', array('style'=>'color: red;')); ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo $form->labelEx($model,'user_department_id'); ?><br />
					<?php echo $form->dropDownList($model,'user_department_id',@UserDepartments::model()->getOptions(), array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'user_department_id', array('style'=>'color: red;')); ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo $form->labelEx($model,'user_division_id'); ?><br />
					<?php echo $form->dropDownList($model,'user_division_id',@UserDivisions::model()->getOptions(), array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'user_division_id', array('style'=>'color: red;')); ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo $form->labelEx($model,'position'); ?><br />
					<?php echo $form->textField($model,'position',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'position', array('style'=>'color: red;')); ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo $form->labelEx($model,'user_group_id'); ?><br />
					<?php echo $form->dropDownList($model,'user_group_id',@UserGroups::model()->getUserGroupOptions(), array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'user_group_id', array('style'=>'color: red;')); ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan=2 >
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'form-control')); ?>
		</td>
	</tr>
</table>
<?php $this->endWidget(); ?>
