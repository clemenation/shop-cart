<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'information-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Nhập các trường có <span class="required">*</span>.</p>

	<p>
		<?php echo $form->labelEx($model,'title',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'title',array('class' =>'small-input text-input','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title',array('class' => 'input-notification error png_bg')); ?>
	</p>
    
    <p>
		<?php echo $form->labelEx($model,'alias',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'alias',array('class' =>'small-input text-input','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'alias',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'content',array('class' => 'no-image')); ?>
		<?php
            $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model'=>$model,
                'attribute'=>'content', //Model attribute name. Nome do atributo do modelo.
                'options'=>array(
                    'width'=>'600',
                    'height'=>350,
                    'useCSS'=>true,
                ),
                'value'=>$model->content, 
            ));
        ?>
		<?php echo $form->error($model,'content',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'show_menu'); ?>
		<?php echo $form->checkBox($model,'show_menu'); ?>
		<?php echo $form->error($model,'show_menu'); ?>
	</p>

	<p>
		<a href="<?php echo Yii::app()->createUrl("/admin/information/admin"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</p>

<?php $this->endWidget(); ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $('#Information_title').keyup(function(){
            var value = $('#Information_title').val();
            value = value.replace(/[áàảãạăắằẳẵặâấầẩẫậ]/ig, 'a');
            value = value.replace(/[đ]/ig, 'd');
            value = value.replace(/[éèẻẽẹêếềểễệ]/ig, 'e');
            value = value.replace(/[íìỉĩị]/ig, 'i');
            value = value.replace(/[óòỏõọôốồổỗộơớờởỡợ]/ig, 'o');
            value = value.replace(/[úùủũụưứừửữự]/ig, 'u');
            value = value.replace(/[ýỳỷỹỵ]/ig, 'y');
            value = value.replace(/[^A-Za-z0-9\s_-]/ig, '');
            value = value.replace(/\s/ig, '-');
            value = value.toLowerCase();
            $('#Information_alias').val(value);
        });
    });
</script>
