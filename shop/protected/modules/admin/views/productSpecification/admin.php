<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Quản lí thông tin sản phẩm</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-specification-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		//'is_user_input',
		//'required',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/productSpecification/create') ?>"><span><img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/add.png" alt="icon"/><br />Thêm thôn tin sản phẩm 
</span>
</a>
</div>
