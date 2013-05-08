<li><a href="#">Sản phẩm</a>
	<ul>
        <?php foreach($products as $item): ?>
        <li><a href="<?php echo Yii::app()->createUrl('/shop/category/view/id/' . $item->category_id) ?>"><?php echo $item->title ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>
<li><a href="#">Tin tức</a>
    <ul>
    <?php foreach($news as $item): ?>
        <li><a href="<?php echo Yii::app()->createUrl('/news/category/list/alias/' . $item->alias) ?>"><?php echo $item->name ?></a></li>
     <?php endforeach; ?>
     </ul>
</li>