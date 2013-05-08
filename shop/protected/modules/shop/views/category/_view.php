<li>
    <h6><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id),array('class' => 'title')); ?></h6>
<a href="<?php echo $this->createUrl('products/view',array( 'id' => $data->product_id)) ?>">
    <?php 
  	if($data->images){
   		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
	}else {
		echo CHtml::image(Shop::register('no-pic.png'));
	}?>
</a>
<p style="padding: 0;" class="bold colr"><?php echo Shop::priceFormat($data->price); ?></p>
<div style="text-align: center;">
 <a href="<?php echo $this->createUrl('products/view', array('id' => $data->product_id)) ?>" class="buttonthree"><span>Xem</span></a>  
</div>
</li>