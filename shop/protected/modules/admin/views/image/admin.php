<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Hình ảnh sản phẩm <?php echo '&nbsp;' . $product->title; 
?></h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">

<?php
if($images)
	foreach($images as $image) {
		echo "<label> {$image->title} </label><br />";
		$this->renderPartial('view', array('model' => $image));
        if(Yii::app()->session['isAdmin']) 
    	echo CHtml::link(Yii::t('ShopModule.shop', 'Delete Image'),
    			array('delete', 'id' => $image->id));
	}


echo '<br />';

echo CHtml::link(Yii::t('ShopModule.shop', 'Trở lại'), array('/admin/shop/admin')) . '<br />';
echo CHtml::link(Yii::t('ShopModule.shop', 'Upload hình ảnh'), array('create', 'product_id' => $product->product_id));


?>
</div>
