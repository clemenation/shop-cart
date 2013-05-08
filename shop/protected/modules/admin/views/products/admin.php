<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Sản phẩm</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'price',
		array(
			'class'=>'CButtonColumn', 
			'template' => '{view}{update}{delete}{images}',
			'viewButtonUrl' => 'Yii::app()->createUrl("/admin/products/view",
			array("id" => $data->product_id))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/admin/products/update",
			array("id" => $data->product_id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/products/delete",
			array("id" => $data->product_id))',
			'buttons' => array(
				'images' => array(
					'label' => Yii::t('ShopModule.shop', 'images'),
					'url' => 'Yii::app()->createUrl("/admin/image/admin",
					array("product_id" => $data->product_id))',
				),
			),
		),
	)
)
); 


echo CHtml::link(Shop::t('Thêm sản phẩm'), array('products/create'));
?>
</div>