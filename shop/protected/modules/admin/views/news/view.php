<?php
$this->breadcrumbs=array(
	'News Entries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List NewsEntries', 'url'=>array('index')),
	array('label'=>'Create NewsEntries', 'url'=>array('create')),
	array('label'=>'Update NewsEntries', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NewsEntries', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsEntries', 'url'=>array('admin')),
);
?>

<h1>View NewsEntries #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'id', 'value'=>$model->id),
		'title',
		'alias',
		'image',
		'priority',
		'created',
		'modified',
		'news_date',
		'is_published',
	),
)); ?>