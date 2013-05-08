<?php
$this->pageTitle=Yii::app()->name . ' - ' . $model->title;
$this->breadcrumbs=array(
	$model->title,
);
?>
<h4 class="heading colr"><?php echo $model->title; ?></h4>
<div class="static">
<?php echo $model->content; ?>
</div>