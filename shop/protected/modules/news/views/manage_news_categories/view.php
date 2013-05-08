<?php
$this->breadcrumbs=array(
	'News Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List NewsCategories', 'url'=>array('index')),
	array('label'=>'Create NewsCategories', 'url'=>array('create')),
	array('label'=>'Update NewsCategories', 'url'=>array('update', 'id'=>IDHelper::uuidFromBinary($model->id))),
	array('label'=>'Delete NewsCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>IDHelper::uuidFromBinary($model->id)),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsCategories', 'url'=>array('admin')),
);
?>

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
