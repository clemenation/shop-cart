<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Sản phẩm trong <?php echo $model->title; ?></h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">

<?php
	foreach($model->Products as $product) {
		$this->renderPartial('/products/_view', array('data' => $product));
}
?>
<a href="javascript:history.back(-1);">Trở lại</a>
</div>