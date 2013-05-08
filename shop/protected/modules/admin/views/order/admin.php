<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Đặt hàng</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">
<?php 

$model = new Order();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'order_id',
		'customer.address.firstname',
		'customer.address.lastname',
		array('name' => 'ordering_date',
			'value' => 'date("M j, Y", $data->ordering_date)'),
		array(
			'class'=>'CButtonColumn', 
			'template' => '{view}',
		),

	),
)); ?>
</div>