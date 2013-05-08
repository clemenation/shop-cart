<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Quản lí báo giá</h3>
	
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
        'file',        
		array(
			'class'=>'CButtonColumn', 
            'header' => 'Actions',
			'updateButtonUrl' => 'Yii::app()->createUrl("/admin/docs/update",
			array("id" => $data->id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/docs/delete",
			array("id" => $data->id))',
		),
	),
)); 


?>
<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/docs/create') ?>"><span><img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/add.png" alt="icon"/><br />Thêm báo giá 
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