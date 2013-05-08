<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Quản lí thể loại tin tức</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">
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
            'header' => 'Actions',
			'updateButtonUrl' => 'Yii::app()->createUrl("/admin/category/update",
			array("id" => $data->id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/category/delete",
			array("id" => $data->id))',
		),
	),
)); 


?>
<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/category/create') ?>"><span><img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/add.png" alt="icon"/><br />Thêm thể loại 
</span>
</a>
<script type="text/javascript">
$().ready(function(){
   $('.button-column .view').each(function(){
        $(this).hide();
   }); 
});
</script>
</div>