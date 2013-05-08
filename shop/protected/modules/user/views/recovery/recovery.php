<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Lấy lại mật khẩu");
$this->breadcrumbs=array(
	UserModule::t("Đăng nhập") => array('/user/login'),
	UserModule::t("Lấy lại mật khẩu"),
);
?>
<div class="contact">
    <h4 class="heading colr"><?php echo UserModule::t("Lấy mật khẩu"); ?></h4>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>
    <div class="clear"></div>
	<ul class="forms">
	<?php echo CHtml::errorSummary($form); ?>
    </ul>
	<div class="clear"></div>
	<div class="row">
		<?php echo CHtml::activeLabel($form,'login_or_email'); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?>
		<p class="hint"><?php echo UserModule::t("Hãy nhập tên tài khoản hoặc địa chỉ email."); ?></p>
	</div>
	
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Lấy mật khẩu")); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>
</div>