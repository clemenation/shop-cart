<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'action'=>Yii::app()->createUrl('/admin/ads/' . ($model->isNewRecord ? 'create' : 'update/id/' . $_GET['id'])),
)); ?>
    <fieldset>
	<p class="note">Nhập các trường có <span class="required">*</span>.</p>

	<p>
		<?php echo $form->labelEx($model,'image',array('class' => 'no-image')); ?>
        <?php if ($model->image != "") : ?>
        <img src="<?php echo Yii::app()->createUrl('/') . '/files/ads/' . $model->image; ?>" height="128"/>
        <?php endif ?>
		<?php echo $form->fileField($model,'image',array('class' => 'no-image','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'url',array('class' => 'no-image')); ?>        
		<?php echo $form->textField($model,'url',array('class'=>'small-input text-input','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'position',array('class' => 'no-image')); ?>
		<?php echo CHtml::dropDownList('Ads[position]',$model->position,array('left' => 'left','right' =>'right','center' => 'center','top' => 'top','bottom' => 'bottom')); ?>
		<?php echo $form->error($model,'position',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<a href="<?php echo Yii::app()->createUrl("/admin/ads/manage"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</p>
</fieldset>
<div class="clear"></div>
<?php $this->endWidget(); ?>

