<li class="big">
    <div class="big_li_sec">
    	<h6><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id),array('class' => 'title')); ?></h6>
    	<a href="<?php echo $this->createUrl('products/view',array( 'id' => $data->product_id)) ?>" class="thumb">
            <?php 
		  	if($data->images){
		   		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
			}else {
				echo CHtml::image(Shop::register('no-pic.png'));
			}?>
        </a>
        <div class="clear"></div>
        <p class="bold price"><?php echo Shop::priceFormat($data->price); ?></p>
        <div class="clear"></div>
        <div class="list_btn">
            <a href="<?php echo $this->createUrl('products/view', array('id' => $data->product_id)) ?>" class="buttonthree"><span>Xem</span></a>            
        </div>
    </div>
    <div class="big_li_sec_right">
        <h3 class="colr"><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?></h3>
        <div class="clear"></div>
        <p>
        	<?php echo $data->description; ?> 
        </p>
        <div class="clear"></div>
        <p class="pricebig"><?php echo Shop::priceFormat($data->price); ?></p>
            <a href="<?php echo $this->createUrl('products/view', array('id' => $data->product_id)) ?>" class="buttonthree"><span>Xem</span></a>            
    </div>
</li>
