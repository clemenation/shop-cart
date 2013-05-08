<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Quản lí tài khoản hỗ trợ</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'username',
        'type',
		array(
			'class'=>'CButtonColumn', 
            'header' => 'Actions',
			'updateButtonUrl' => 'Yii::app()->createUrl("/admin/supports/update",
			array("id" => $data->id))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/supports/delete",
			array("id" => $data->id))',
		),
	),
)); 


?>
<?php $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../../assets'); ?>
<a class="shortcut-button" href="<?php echo Yii::app()->createUrl('/admin/supports/create') ?>"><span><img width="48" height="48" src="<?php echo $baseScriptUrl ?>/images/icons/add.png" alt="icon"/><br />Thêm thể loại 
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