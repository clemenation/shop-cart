<h3 class="head">Sản phẩm mới nhất</h3>
<ul>
    <?php foreach($products as $prod): ?>
	<li>
    	<div class="thumb">
        <a href="<?php echo Yii::app()->controller->createUrl('/shop/products/view', array('id' => $prod->product_id)) ?>">
        <?php 
                if($prod->images) {
                	foreach($prod->images as $image) {
                		Yii::app()->controller->renderPartial('shop.views.image.viewthumb', array( 'model' => $image,'thumb' => '75px'));
                		echo '<br />'; 
                        break;
                	}
                } else 
                Yii::app()->controller->renderPartial('shop.views.image.viewthumb', array( 'model' => new Image(),'thumb' => '75px'));
        ?>	
        </a></div>
        <div>
        	<a href="<?php echo Yii::app()->controller->createUrl('/shop/products/view', array('id' => $prod->product_id)) ?>"><?php echo $prod->title; ?></a>
        </div>
    </li>
    <?php endforeach; ?>
</ul>