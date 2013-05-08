<div class="content-box-header">
					
	<h3 style="cursor: s-resize; ">Quản lí thể loại tin tức</h3>
	
	<div class="clear"></div>
	
</div>
<div class="content-box-content">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</div>