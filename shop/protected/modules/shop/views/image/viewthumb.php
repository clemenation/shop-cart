<?php 
$folder = Shop::module()->productImagesFolder;

if($model->filename) 
	$path = Yii::app()->baseUrl. '/' . $folder . '/' . $model->filename;
	else
	$path = Shop::register('no-pic.jpg');

echo CHtml::image($path,
		$model->title,
		array(
			'title' => $model->title,
			//'style' => 'margin: 10px;',
			'width' => $thumb)
		); ?>
<?php 