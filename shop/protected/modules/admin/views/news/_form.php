<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-entries-form',
	'enableClientValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'action'=>Yii::app()->createUrl('/admin/news/' . ($model->isNewRecord ? 'create/'  : 'update/id/' . $_GET['id'])),
)); ?>
<fieldset>
	<p class="note">Nhập các trường có <span class="required">*</span>.</p>

	<p>
		<?php echo $form->labelEx($model,'title',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'title',array('class' =>'small-input text-input','size'=>30)); ?>
		<?php echo $form->error($model,'title',array('class' => 'input-notification error png_bg')); ?>
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
	</p>

	<p>
		<?php echo $form->labelEx($model,'alias',array('class' => 'no-image')); ?>
		<?php echo $form->textField($model,'alias',array('class' =>'small-input text-input','size'=>30)); ?>
		<?php echo $form->error($model,'alias',array('class' => 'input-notification error png_bg')); ?>
	</p>
    <p>
        <label class="no-image error required" for="NewsEntries_category">Thuộc thể loại</label>
        <input id="ytNewsMiddle_category_id" type="hidden" value="" name="NewsMiddle[category_id]" />
        <?php 
        foreach ($modelCategories as $index => $cat) : ?>
        <input id="NewsMiddle_category_id_<?php echo $index; ?>" value="<?php echo $cat->id; ?>" type="checkbox" name="NewsMiddle[category_id][]" <?php if(array_key_exists($cat->id,$arrCats)) echo 'checked'; ?> /> 
            <?php echo $cat->name; ?>
        <?php endforeach; ?>

	</p>
	<p>
        <?php echo $form->labelEx($model,'image',array('class' => 'no-image')); ?>
		<?php if (isset($model->image)) : ?><img src="<?php echo Yii::app()->createUrl('/') . '/files/news/' . $model->image; ?>" height="128"/><?php endif ?>
		<?php echo $form->fileField($model,'image',array('class' => 'no-image')); ?>
		<?php echo $form->error($model,'image',array('class' => 'input-notification error png_bg')); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'description',array('class' => 'no-image')); ?>
		<?php
              echo $form->textArea($model,'description',array('class' =>'small-input text-input no-image','value'=>$model->description));
        ?>
		<?php echo $form->error($model,'description',array('class' => 'input-notification error png_bg')); ?>
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
        <?php echo $form->labelEx($model,'news_date'); ?>
        <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'news_date',
                'htmlOptions' => array('readonly' => "readonly")   
            ));
        ?>
        <?php echo $form->error($model,'news_date'); ?>
    </p>

	<p>
		<?php echo $form->labelEx($model,'is_published'); ?>
		<?php echo $form->checkBox($model,'is_published'); ?>
		<?php echo $form->error($model,'is_published'); ?>
	</p>
    
    <p>
        <a href="<?php echo Yii::app()->createUrl("/admin/news/manage"); ?>">Hủy</a>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu',array('class' => 'button')); ?>
	</p>
</fieldset>
<?php $this->endWidget(); ?>