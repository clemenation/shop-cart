<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-specification-form',
	'enableAjaxValidation'=>false,
    'action'=>Yii::app()->createUrl('/admin/productSpecification/' . ($model->isNewRecord ? 'create' : 'update/id/' . $_GET['id'])),
)); ?>

	<p class="note">Nhập các trường có <span class="required">*</span>.</p>

	<?php echo $form->errorSummary($model); ?>

	<p>
		<?php echo $form->labelEx($model,'title',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'title',array('class'=>'small-input text-input','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'is_user_input',array('class' => 'no-image')); ?>
		<?php echo $form->checkBox($model,'is_user_input'); ?>
		<?php echo $form->error($model,'is_user_input',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'required',array('class' => 'no-image')); ?>
		<?php echo $form->checkBox($model,'required'); ?>
		<?php echo $form->error($model,'required',array('class' => 'input-notification error png_bg')); ?>
	</p>



	<p>
        <a href="<?php echo Yii::app()->createUrl("/admin/productSpecification/admin"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</p>

<?php $this->endWidget(); ?>

