<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Thể loại tin tức</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">

<h1>View NewsCategories #<?php echo IDHelper::uuidFromBinary($model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'id', 'value'=>IDHelper::uuidFromBinary($model->id)),
		'name',
		'alias',
		'image',
		'description',
	),
)); ?>
</div>