<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Hình ảnh sản phẩm <?php echo '&nbsp;' . $product->title; 
?></h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">

	<h1> <?php Yii::t('ShopModule.shop', 'Upload hình ảnh'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
