<?php
$this->pageTitle=Yii::app()->name . ' - Liên hệ';
$this->breadcrumbs=array(
	'Liên hệ',
);
?>

<div class="contact">
    <h4 class="heading colr">Liên hệ</h4>
    <p>
        <?php if(Yii::app()->user->hasFlash('contact')): ?>
    	<?php echo Yii::app()->user->getFlash('contact'); ?>
        <?php else: ?>
        Nếu bạn có muốn liên hệ hay vấn đề gì về kinh doanh, hãy điền thông tin bên dưới để liên hệ với chúng tôi. Cảm ơn.
        <?php endif; ?>
    </p>
    <br /><br />
    <h5 class="heading colr">Gởi thông tin tới chúng tôi</h5>
    <br />
    <?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Các trường có <span class="required">*</span> cần phải nhập.</p>
    <ul class="forms">
	<?php echo $form->errorSummary($model); ?>
    </ul>
    <div class="clear"></div>
	<ul class="forms">
		<li class="txt">Họ tên*</li>
		<?php echo $form->textField($model,'name'); ?>
	</ul>
    <div class="clear"></div>

	<ul class="forms">
        <li class="txt">Email*</li>
		
		<?php echo $form->textField($model,'email'); ?>
	</ul>
    <div class="clear"></div>

	<ul class="forms">
        <li class="txt">Tiêu đề*</li>		
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
	</ul>
    <div class="clear"></div>

	<ul class="forms">		
        <li class="txt">Nội dung*</li>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
	</ul>
    <div class="clear"></div>

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
		<li>Hãy gõ lại các ký tự ở trên.</li>         
	</ul>
    <div class="clear"></div>
	   <?php endif; ?>
    <?php endif; ?>
	<ul class="forms">
        <li class="txt">&nbsp;</li>
        <li class="textfield"><a id="btnSend" class="buttonthree right"><span>Gởi</span></a></li>		
	</ul>
    <div class="clear"></div>

    <?php $this->endWidget(); ?>    
</div>
<script type="text/javascript">
$('#btnSend').click(function(){
    $('#yw0').submit();
});
</script>