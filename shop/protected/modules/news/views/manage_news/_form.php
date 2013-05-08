<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-entries-form',
	'enableClientValidation'=>true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'action'=>Yii::app()->createUrl('/news/manage_news/' . ($model->isNewRecord ? 'create/'  : 'update/id/' . $_GET['id'])),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="jlb_row jform">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>30)); ?>
		<?php echo $form->error($model,'title'); ?>
        <script type="text/javascript" language="javascript">
            jQuery(document).ready(function() {
                $('#NewsEntries_title').keyup(function(){
                    var value = $('#NewsEntries_title').val();
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
                    $('#NewsEntries_alias').val(value);
                });
            });
        </script>
	</div>

	<div class="jlb_row jform">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>30)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>
    <div class="jlb_row jform">
        <input id="ytNewsMiddle_category_id" type="hidden" value="" name="NewsMiddle[category_id]" />
        <?php foreach ($modelCategories as $index => $cat) : ?>
        <input id="NewsMiddle_category_id_<?php echo $index; ?>" value="<?php echo $cat->id; ?>" type="checkbox" name="NewsMiddle[category_id][]" /> 
            <label for="NewsMiddle_category_id_<?php echo $index; ?>"><?php echo $cat->name; ?></label>
        <?php endforeach; ?>

	</div>
	<div class="jlb_row jform">
        <?php echo $form->labelEx($model,'image'); ?>
		<?php if (isset($model->image)) : ?><img src="<?php echo JLRouter::createAbsoluteUrl('/') . '/files/news/' . $model->image; ?>" height="128"/><?php endif ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="jlb_row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php
            $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model'=>$model,
                'attribute'=>'description', //Model attribute name. Nome do atributo do modelo.
                'options'=>array(
                    'width'=>'600',
                    'height'=>200,
                    'useCSS'=>true,
                ),
                'value'=>$model->description, 
            ));
        ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="jlb_row">
		<?php echo $form->labelEx($model,'content'); ?>
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
		<?php echo $form->error($model,'content'); ?>
	</div>
    
    <div class="jlb_row jform">
        <?php echo $form->labelEx($model,'news_date'); ?>
        <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'n_date',
                'htmlOptions' => array('readonly' => "readonly")   
            ));
        ?>
        <?php echo $form->textField($model,'n_hours',array('size'=>3,'maxlength'=>2)); ?>
        <?php echo $form->textField($model,'n_minutes',array('size'=>3,'maxlength'=>2)); ?>
        <?php echo $form->error($model,'news_date'); ?>
        <?php echo $form->error($model,'n_hours'); ?>
        <?php echo $form->error($model,'n_minutes'); ?>
    </div>

	<div class="jlb_row jform">
		<?php echo $form->labelEx($model,'is_published'); ?>
		<?php echo $form->checkBox($model,'is_published'); ?>
		<?php echo $form->error($model,'is_published'); ?>
	</div>
    
    <div class="jlb_row jform buttons">
        <a href="<?php echo Yii::app()->createUrl("/news/manage_news/admin"); ?>"><input type="button" value="Cancel" /></a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->