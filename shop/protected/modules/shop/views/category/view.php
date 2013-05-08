<?php
$this->breadcrumbs=array(
	Yii::t('ShopModule.shop', 'Shop')=>array('shop/index'),
	$model->title,
);

?>
<br/>
<h4 class="heading colr"> Danh sách sản phẩm <?php echo $model->title; ?></h4>
<div class="listingbasic">
    <ul>
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        'template' => '{summary}{sorter}{items}'
    )); ?>
    </ul>
</div>
<br/>
 <?php 
    $this->widget('CLinkPager', array('header' => '','pages'=>$dataProvider->pagination)); 
    ?>
<div class="clear"></div>
<br /><br/>
