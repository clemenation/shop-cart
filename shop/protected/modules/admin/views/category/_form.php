<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-categories-form',
	'enableClientValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'action'=>Yii::app()->createUrl('/admin/category/' . ($model->isNewRecord ? 'create' : 'update/id/' . $_GET['id'])),
)); ?>
    <fieldset>
    <p class="note">Nhập các trường có <span class="required">*</span>.</p>
	<p>
		<?php echo $form->labelEx($model,'name',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'name',array('class'=>'small-input text-input','size'=>30,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name',array('class' => 'input-notification error png_bg')); ?>
        <script type="text/javascript" language="javascript">
            jQuery(document).ready(function() {
                $('#NewsCategories_name').keyup(function(){
                    var value = $('#NewsCategories_name').val();
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
                    $('#NewsCategories_alias').val(value);
                });
            });
        </script>        
	</p>

	<p>
		<?php echo $form->labelEx($model,'alias',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'alias',array('class'=>'small-input text-input','size'=>30,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'alias',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'image',array('class' => 'no-image')); ?>
        <?php if (isset($model->image)) : ?><img src="<?php echo Yii::app()->createUrl('/') . '/files/news/' . $model->image; ?>" height="128"/><?php endif ?>
		<?php echo $form->fileField($model,'image',array('class' => 'no-image')); ?>
		<?php echo $form->error($model,'image',array('class' => 'input-notification error png_bg')); ?>
	</p>
    
    <p>
		<?php echo $form->labelEx($model,'description',array('class' => 'no-image')); ?>
		<?php echo $form->textArea($model,'description',array('class' =>'small-input text-input','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
        <a href="<?php echo Yii::app()->createUrl("/admin/category/manage"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</p>
</fieldset>
<div class="clear"></div>
<?php $this->endWidget(); ?>

<!-- form -->
