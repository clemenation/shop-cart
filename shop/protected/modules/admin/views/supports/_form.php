<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supports-form',
	'enableAjaxValidation'=>false,
    'action'=>Yii::app()->createUrl('/admin/supports/' . ($model->isNewRecord ? 'create' : 'update/id/' . $_GET['id'])),
)); ?>
<fieldset>
	<p class="note">Nhập các trường có <span class="required">*</span>.</p>

    <p>
		<?php echo $form->labelEx($model,'is_sale',array('class' => 'no-image')); ?>
		<?php echo CHtml::dropDownList('Supports[is_sale]',$model->is_sale,array('Bán hàng Online','Hỗ trợ kỹ thuật')); ?>
		<?php echo $form->error($model,'is_sale',array('class' => 'input-notification error png_bg')); ?>
	</p>
    
    <p>
		<?php echo $form->labelEx($model,'support',array('class' => 'no-image')); ?>
		<?php echo CHtml::dropDownList('Supports[type]',$model->type,array('yahoo' => 'yahoo','skype' =>'skype')); ?>
		<?php echo $form->error($model,'type',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'username',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'username',array('class'=>'small-input text-input','size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'display',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'display',array('class'=>'small-input text-input','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'display',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
        <a href="<?php echo Yii::app()->createUrl("/admin/supports/manage"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</p>
</fieldset>
<?php $this->endWidget(); ?>
