<style type="text/css">
.no-image{
    background-image:  none;
    background-color:  white;
}
</style>
<?php 
function renderVariation($variation, $i) { 
	if(!ProductSpecification::model()->findByPk(1))
		return false;
	if(!$variation) {
		$variation = new ProductVariation;
		$variation->specification_id = 1;
	}

	$str = '<tr> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][specification_id]",
			$variation->specification_id, CHtml::listData(
				ProductSpecification::model()->findall(), "id", "title"), array(
				'empty' => '-'));  

	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][title]", $variation->title); 
	$str .= '</td> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][sign]",
			$variation->price_adjustion >= 0 ? '+' : '-', array(
				'+' => '+',
				'-' => '-'));
	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][price_adjustion]", abs($variation->price_adjustion));  
	$str .= '</td> <td>';
	for($j = -10; $j <= 10; $j++)
		$positions[$j] = $j;
	$str .= CHtml::dropDownList("Variations[{$i}][position]",
			$variation->position,
			$positions);
	$str .= '</td> </tr>';

return $str;
} ?>


<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'products-form',
			'enableAjaxValidation'=>false,
			)); ?>


<div style="float: left; width:50%;">
<fieldset>
<legend> <?php echo Shop::t('Thôn tin sản phẩm'); ?> </legend>
<p>
<?php echo $form->labelEx($model,'category_id'); ?>
<?php $this->widget('application.modules.admin.components.DropDownListCategory',array(
                'model' => $model,
				'attribute'=>'category_id',
				'data' => $model,
			)); ?>
<?php echo $form->error($model,'category_id'); ?>
</p>
<p>
		<?php echo $form->labelEx($model,'is_saleoff'); ?>
		<?php echo $form->checkBox($model,'is_saleoff'); ?>
		<?php echo $form->error($model,'is_saleoff'); ?>
</p>
<p>
<?php echo $form->labelEx($model,'title',array('class' => 'no-image')); ?>
<?php echo $form->textField($model,'title',array('class'=>'medium-input text-input','size'=>255,'maxlength'=>255)); ?>
<?php echo $form->error($model,'title',array('class' => 'input-notification error png_bg')); ?>
</p>

<p>
<?php echo $form->labelEx($model,'description',array('class' => 'no-image')); ?>
<?php //echo $form->textArea($model,'description',array('class'=>'medium-input text-input','rows'=>6, 'cols'=>50)); ?>
<?php
            $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model'=>$model,
                'attribute'=>'description', //Model attribute name. Nome do atributo do modelo.
                'options'=>array(
                    'width'=>'400',
                    'height'=>350,
                    'useCSS'=>true,
                ),
                'value'=>$model->description, 
            ));
        ?>
<?php echo $form->error($model,'description',array('class' => 'input-notification error png_bg')); ?>
</p>
</fieldset>
</div>


<fieldset>
<legend> <?php echo Yii::t('ShopModule.shop', 'Thông tin cấu hình'); ?> </legend>

<p>
<?php echo $form->labelEx($model,'price',array('class' => 'no-image')); ?>
<?php echo $form->textField($model,'price',array('class'=>'medium-input text-input','size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'price',array('class' => 'input-notification error png_bg')); ?>
</p>

<?php foreach(ProductSpecification::model()->findAll() as $specification) { ?>
	<p>
		<?php echo CHtml::label($specification->title, ''); ?>
		<?php echo CHtml::textField("Specifications[{$specification->title}]",
				$model->getSpecification($specification->title),array(
					'class'=>'medium-input text-input','size'=>45,'maxlength'=>45)); ?>
		</p>
		<?php } ?>

		</fieldset>
<?php if(!$model->isNewRecord) { ?>
		<fieldset>
		<legend> <?php echo Shop::t('Article Variations'); ?> </legend>
		<div id="variations">

<table>
		<?php 
		printf('<tr><th>%s</th><th>%s</th><th colspan = 2>%s</th><th>%s</th></tr>',
				Shop::t('Specification'), 
				Shop::t('Value'), 
				Shop::t('Price adjustion'),
				Shop::t('Position'));


		$i = 0;
		foreach($model->variations as $variation) { 
			echo renderVariation($variation, $i); 
			$i++;
		}

			echo renderVariation(null, $i); 
 ?>
	</table>	
	<?php echo CHtml::button(Shop::t('Save specifications'), array(
                'class' => 'button',
				'submit' => array(
					'//shop/products/update',                   
					'return' => 'product',
					'id' => $model->product_id))); ?>


				</fieldset>

<?php } ?>			

        </div>
<div class="clear"></div>
<p>
<a href="<?php echo Yii::app()->createUrl("/admin/shop/admin"); ?>">Hủy</a>     
<?php echo CHtml::submitButton($model->isNewRecord ?
		Yii::t('ShopModule.shop', 'Tạo') 
		: Yii::t('ShopModule.shop', 'Lưu'),array('class' => 'button')); ?>
</p>

<?php $this->endWidget(); ?>