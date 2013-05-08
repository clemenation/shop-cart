<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
        'alias',
		array(
			'class'=>'CButtonColumn', 
			'viewButtonUrl' => 'Yii::app()->createUrl("/news/manage_news_categories/view",
			array("id" => $data->id))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/news/manage_news_categories/update",
			array("id" => $data->id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/news/manage_news_categories/delete",
			array("id" => $data->id))',
		),
	),
)); 

echo CHtml::link('Create a new Category', array('/news/manage_news_categories/create'));
?>
