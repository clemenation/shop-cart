<?php
$this->breadcrumbs=array(
	$category->name,
);
$this->pageTitle .= ' - ' . $category->name;
?>
<h4 class="heading colr"><?php echo $category->name ?></h4>
<?php CVarDumper::dump($dataProvider->getTotalItemCount()); ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_item',
)); ?>
