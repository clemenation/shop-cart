<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Quản lí trang</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		array(
			'class'=>'CButtonColumn', 
			'viewButtonUrl' => 'Yii::app()->createUrl("/admin/information/view",
			array("id" => $data->id))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/admin/information/update",
			array("id" => $data->id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/information/delete",
			array("id" => $data->id))',
		),
	),
)); 
?>
<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/information/create') ?>"><span><img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/add.png" alt="icon"/><br />Thêm trang
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