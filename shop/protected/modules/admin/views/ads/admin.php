<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Quản lí quảng cáo</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'url',
        'image',        
		array(
			'class'=>'CButtonColumn', 
            'header' => 'Actions',
			'updateButtonUrl' => 'Yii::app()->createUrl("/admin/ads/update",
			array("id" => $data->id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/ads/delete",
			array("id" => $data->id))',
		),
	),
)); 


?>
<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/ads/create') ?>"><span><img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/add.png" alt="icon"/><br />Thêm quảng cáo
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