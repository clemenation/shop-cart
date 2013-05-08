<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'action'=>Yii::app()->createUrl('/admin/shopCategory/' . ($model->isNewRecord ? 'create' : 'update/id/' . $_GET['id'])),
)); ?>

    <fieldset>
    <p class="note">Nhập các trường có <span class="required">*</span>.</p>

	<p>
		<?php echo $form->labelEx($model,'parent_id',array('class' => 'no-image')); ?>
		<?php 
        $this->widget('application.modules.admin.components.DropDownListCategory',array(
                'model' => $model,
				'attribute'=>'parent_id',
				'data'=>$model,
			)); ?>
		<?php echo $form->error($model,'parent_id',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'title',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'title',array('class'=>'small-input text-input','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'language',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'language',array('class'=>'small-input text-input','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'language',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'description',array('class' => 'no-image')); ?>
		<?php echo $form->textArea($model,'description'); ?>
		<?php echo $form->error($model,'description',array('class' => 'input-notification error png_bg')); ?>
	</p>



	<div class="row buttons">
		<a href="<?php echo Yii::app()->createUrl("/admin/shop/admin"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</div>
</fieldset>
<div class="clear"></div>
<?php $this->endWidget(); ?>


