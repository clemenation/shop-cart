<?php
$this->breadcrumbs=array(
	'Supports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Supports', 'url'=>array('index')),
	array('label'=>'Create Supports', 'url'=>array('create')),
	array('label'=>'Update Supports', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Supports', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Supports', 'url'=>array('admin')),
);
?>

<h1>View Supports #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'username',
		'display',
	),
)); ?>
