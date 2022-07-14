<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

		<div class="container" style="margin-top: 0px; width: 40%;" >
			
			<div class="row" style="" >
				<div class="col-lg-12" style="padding: 20px; 
				text-align: center;" >
					
					<h4>Report an occurrence</h4>

					
					<p>For unregistered users, you can use the following credentials: <br /><b>Username:</b> guest <b>Password:</b> guest</p>
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'login-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
						),
					)); ?>
					<?php echo $form->textField($model,'username', array('style'=>'border: 1px #ccc solid; width: 100%; margin-top: 10px;', 'placeholder'=>'Username')); ?>
					<?php echo $form->error($model,'username'); ?>
					
					<?php echo $form->passwordField($model,'password', array('style'=>'border: 1px #ccc solid; width: 100%; margin-top: 10px;', 'placeholder'=>'Password')); ?>
					<?php echo $form->error($model,'password'); ?>
<br/><br/>
				    <?php echo $form->labelEx($model, 'verifyCode'); ?>
                    <?php $this->widget('CCaptcha'); ?><br/><br/>
                    <?php echo $form->textField($model, 'verifyCode'); ?><br/><br/>
                	<?php echo $form->error($model, 'verifyCode'); ?>
            
					
					<!-- <select name="LoginForm[category]" style="border: 1px #ccc solid; width: 100%; margin-top: 10px;" >
						<option value="Issue">Issue</option>
						<option value="Incident">Incident</option>
						<option value="Hazard">Hazard</option>
						<option value="SITREP">SITREP</option>
					</select> -->
					
					<input type="submit" class="myButton" value="Login" style="border: 1px #ccc solid; width: 100px; margin-top: 10px; background-color: #eee;" />
					<?php $this->endWidget(); ?>
				</div>
			</div>
			<div class="row" >
					<div class="col-lg-12" style="text-align: center;" >
						<p><a href="#">Forgot your password?</a></p>
						<?php echo CHtml::encode(Yii::app()->name); ?><br />
						<?php echo date('Y-M-d'); ?>
					</div>
			</div>
		</div>
