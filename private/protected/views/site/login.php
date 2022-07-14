
<div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
          <div class="form-group has-feedback">
			<?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder'=>'Username')); ?>
			<?php echo $form->error($model,'username', array('style'=>'color: red; width: 100%;')); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
			<?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'placeholder'=>'Password')); ?>
			<?php echo $form->error($model,'password', array('style'=>'color: red; width: 100%;')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                &nbsp;
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
		  <div class="row">
			<div class="col-xs-12">
				Copyright &copy; <?php echo date('Y'); ?> by PC MAX LTD. <br />Powered by BSM.<br/>
				All Rights Reserved.<br/>
				<a href="http://10.10.31.37/sms/public/" target="_blank">Public Portal </a>
			</div>
		  </div>
        <?php $this->endWidget(); ?>

        

      </div><!-- /.login-box-body -->