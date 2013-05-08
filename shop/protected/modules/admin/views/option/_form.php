<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'option-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Các trường cần nhập <span class="required">*</span> cần nhập.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'option',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'option',array('class' =>'small-input text-input','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'option',array('class' => 'input-notification error png_bg')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value',array('class' => 'no-image')); ?>
		<?php
            $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model'=>$model,
                'attribute'=>'value', //Model attribute name. Nome do atributo do modelo.
                'options'=>array(
                    'width'=>'600',
                    'height'=>350,
                    'useCSS'=>true,
                ),
                'value'=>$model->value, 
            ));
        ?>
		<?php echo $form->error($model,'value',array('class' => 'input-notification error png_bg')); ?>
	</div>

	<p>
		<a href="<?php echo Yii::app()->createUrl("/admin/option/admin"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</p>

<?php $this->endWidget(); ?>