<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Đăng nhập");
$this->breadcrumbs=array(
	UserModule::t("Đăng nhập"),
);
?>

<div class="contact">
    <h4 class="heading colr">Đăng nhập</h4>


<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<p>Nhập các thông tin bên dưới để đăng nhập vào hệ thống.</p>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	<p class="note">Các trường có <span class="required">*</span> cần phải nhập.</p>
	
	<ul class="forms">
	<?php echo CHtml::errorSummary($model); ?>
    </ul>
	
    <div class="clear"></div>
	<ul class="forms">
		<li class="txt">Tài khoản*</li>
		<?php echo CHtml::activeTextField($model,'username') ?>
	</ul>
    <div class="clear"></div>
	
    <ul class="forms">
		<li class="txt">Mật khẩu*</li>
		<?php echo CHtml::activePasswordField($model,'password') ?>
	</ul>
    <div class="clear"></div>
	
	<ul class="forms">
		<p class="hint">
		<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</p>
	</ul>
    <div class="clear"></div>
	
	<ul>
		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		Nhớ đăng nhập lần sau
	</ul>
    <div class="clear"></div>
	
	<ul class="forms">
        <li class="textfield"><a id="btnSend" class="buttonthree"><span>Đăng nhập</span></a></li>	
		
	</ul>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(    
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>

<script type="text/javascript">
$('#btnSend').click(function(){
    $(this).parent().parent().parent().submit();
});
</script>