<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-categories-form',
	'enableClientValidation'=>true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'action'=>Yii::app()->createUrl('/news/manage_news_categories/' . ($model->isNewRecord ? 'create' : 'update/id/' . $_GET['id'])),
)); ?>

	<div class="jlb_row jform">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
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
	</div>

	<div class="jlb_row jform">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>30,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="jlb_row jform">
		<?php echo $form->labelEx($model,'image'); ?>
        <?php if (isset($model->image)) : ?><img src="<?php echo Yii::app()->createUrl('/') . '/files/news/' . $model->image; ?>" height="128"/><?php endif ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
    
    <div class="jlb_row jform">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="jlb_row jform buttons">
        <a href="<?php echo Yii::app()->createUrl("/news/manage_news_categories/admin"); ?>"><input type="button" value="Cancel" /></a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.jform').jqTransform();
    });
</script>