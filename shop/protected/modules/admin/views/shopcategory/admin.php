<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Danh mục sản phẩm</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">
<?php 
Yii::import('application.modules.shop.models.Category');
$model = new Category();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		array(
			'class'=>'CButtonColumn', 
			'viewButtonUrl' => 'Yii::app()->createUrl("/admin/shopCategory/view",
			array("id" => $data->category_id))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/admin/shopCategory/update",
			array("id" => $data->category_id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/shopCategory/delete",
			array("id" => $data->category_id))',
		),
	),
)); 

?>

<?php echo CHtml::link(Shop::t('Thêm danh mục'), array('shopCategory/create')); ?>

</div>