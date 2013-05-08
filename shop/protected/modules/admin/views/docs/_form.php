<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docs-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'action'=>Yii::app()->createUrl('/admin/docs/' . ($model->isNewRecord ? 'create' : 'update/id/' . $_GET['id'])),
)); ?>
    <fieldset>
    <p class="note">Nhập các trường có <span class="required">*</span>.</p>

	<p>
		<?php echo $form->labelEx($model,'title',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'title',array('class'=>'small-input text-input','size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'title',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'file',array('class' => 'no-image')); ?>
		<?php echo $form->fileField($model,'file',array('class' => 'no-image','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'file',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
        <a href="<?php echo Yii::app()->createUrl("/admin/docs/manage"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</p>
</fieldset>
<div class="clear"></div>
<?php $this->endWidget(); ?>