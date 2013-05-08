<?php
$this->breadcrumbs=array(
	'Supports',
);

$this->menu=array(
	array('label'=>'Create Supports', 'url'=>array('create')),
	array('label'=>'Manage Supports', 'url'=>array('admin')),
);
?>

<h1>Supports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
