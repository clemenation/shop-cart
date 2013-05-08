<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Đăng kí");
$this->breadcrumbs=array(
	UserModule::t("Đăng kí"),
);
?>

<div class="contact">
    <h4 class="heading colr">Đăng kí</h4>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Các trường có <span class="required">*</span> cần phải nhập.</p>
    <ul class="forms">
	<?php echo $form->errorSummary($model); ?>
    </ul>
	<div class="clear"></div>
    <ul class="forms">
		<li class="txt">Tài khoản*</li>
		<?php echo $form->textField($model,'username'); ?>
	    <?php echo $form->error($model,'username'); ?>
	</ul>
    <div class="clear"></div>

	<ul class="forms">
		<li class="txt">Mật khẩu*</li>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Mật khẩu ít nhất 4 ký tự."); ?>
	</p>
	</ul>
    <div class="clear"></div>

	
	<ul class="forms">
		<li class="txt">Xác nhận mật khẩu*</li>	
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</ul>
	<div class="clear"></div>
    
	<ul class="forms">
		<li class="txt">Email*</li>	
	<?php echo $form->textField($model,'email'); ?>
	<?php echo $form->error($model,'email'); ?>
	</ul>
	<div class="clear"></div>
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
    	<?php if(extension_loaded('gd')): 
                    $gdinfo=gd_info();
    		  if($gdinfo['FreeType Support']):		      
        ?>
        <ul class="forms">
            <li style="padding-left: 100px;">
             <?php $this->widget('CCaptcha'); ?>
            </li>
        </ul>
        <div class="clear"></div>
    	<ul class="forms">
            <li class="txt">Mã xác nhận*</li>	       	
    		<?php echo $form->textField($model,'verifyCode'); ?>
    		<li>Hãy gõ lại các ký tự.</li>         
    	</ul>
        <div class="clear"></div>
    	   <?php endif; ?>
        <?php endif; ?>
	<?php endif; ?>
	
	<div class="clear"></div>
	
	<ul class="forms">
        <li class="textfield"><a id="btnSend" class="buttonthree"><span>Đăng nhập</span></a></li>	
		
	</ul>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>
</div>
<script type="text/javascript">
$('#btnSend').click(function(){
    $('#registration-form').submit();
});
</script>