<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'image-form',
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Nhập các trường có <span class="required">*</span>.</p>

	<p>
		<?php echo $form->labelEx($model,'title',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'title',array('class'=>'small-input text-input','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'filename',array('class' => 'no-image')); ?>
		<?php echo $form->fileField($model,'filename',array('class' => 'no-image','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'filename',array('class' => 'input-notification error png_bg')); ?>
	</p>

		<?php echo $form->hiddenField($model,'product_id', array('value' => $_GET['product_id'])); ?>

	<p>
	<?php echo CHtml::submitButton($model->isNewRecord 
			? Shop::t('Upload') 
			: Shop::t('Save')); ?>
	</p>

<?php $this->endWidget(); ?>

</div><!-- form -->
