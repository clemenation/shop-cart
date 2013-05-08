    <?php
$form = $this->beginWidget('CActiveForm', array(
            //'id'=>'login-form',
            'id' => 'login-form',
            'enableAjaxValidation' => false,
        ));
?>

        <div class="notification information png_bg"> 
			<div> 
                Input your username and password below.
				<?php echo $form->error($model,'username'); ?>
                <?php echo $form->error($model,'password'); ?>
			</div> 
		</div> 
		
		<p> 
			<label>Username</label> 
			<?php echo $form->textField($model, 'username',array('class' => 'text-input')); ?>
		</p> 
		<div class="clear"></div> 
		<p> 
			<label>Password</label> 
			<?php echo $form->passwordField($model, 'password',array('class' => 'text-input')); ?>      
		</p> 
		<div class="clear"></div> 
		<p id="remember-password"> 
			<input type="checkbox" />Remember me
		</p> 
		<div class="clear"></div> 
		<p> 
			<?php echo CHtml::submitButton('Login',array('class'=>'button')); ?>
		</p> 
<?php $this->endWidget(); ?>        