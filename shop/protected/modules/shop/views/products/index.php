<?php
$this->breadcrumbs=array(
	'Sản phẩm',
);
Shop::renderFlash();
?>
<br />
<h2><?php echo Shop::t('Danh sách sản phẩm'); ?></h2>
<br />
<div class="wd-tab">
	<ul class="wd-item">
		<li><a href="#wd-fragment-1">Sản phẩm mới nhất</a></li>
		<li><a href="#wd-fragment-2">Sản phẩm bán chạy</a></li>
		<li><a href="#wd-fragment-3">Sản phẩm giảm giá đặc biệt</a></li>
	</ul>
	<div class="wd-panel">
		<div class="wd-section" id="wd-fragment-1">
			<div class="listingbasic">
                    <ul>
                        <?php foreach($products as $data): ?>
                        <li>
                            <h6><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id),array('class' => 'title')); ?></h6>
                        <a href="<?php echo $this->createUrl('products/view',array( 'id' => $data->product_id)) ?>">
                            <?php 
                    	  	if($data->images){
                    	   		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
                    		}else {
                    			echo CHtml::image(Shop::register('no-pic.jpg'));
                    		}?>
                        </a>
                        <p style="padding: 0;" class="bold colr"><?php echo Shop::priceFormat($data->price); ?></p>
                        <div style="text-align: center; margin-left: 40px;">
                         <a href="<?php echo $this->createUrl('products/view', array('id' => $data->product_id)) ?>" class="buttonthree"><span>Xem</span></a>  
                        </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
        <div class="clear"></div>
         <br /><br />
		</div>
		<div class="wd-section" id="wd-fragment-2">
			<div class="listingbasic">
                    <ul>
                        <?php foreach($top as $data): ?>
                        <li>
                            <h6><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id),array('class' => 'title')); ?></h6>
                        <a href="<?php echo $this->createUrl('products/view',array( 'id' => $data->product_id)) ?>">
                            <?php 
                    	  	if($data->images){
                    	   		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
                    		}else {
                    			echo CHtml::image(Shop::register('no-pic.jpg'));
                    		}?>
                        </a>
                        <p style="padding: 0;" class="bold colr"><?php echo Shop::priceFormat($data->price); ?></p>
                        <div style="text-align: center; margin-left: 40px;">
                         <a href="<?php echo $this->createUrl('products/view', array('id' => $data->product_id)) ?>" class="buttonthree"><span>Xem</span></a>  
                        </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
        <div class="clear"></div>
            <br /><br />
		</div>
		<div class="wd-section" id="wd-fragment-3">
			<div class="listingbasic">
                    <ul>
                        <?php foreach($sale as $data): ?>
                        <li>
                            <h6><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id),array('class' => 'title')); ?></h6>
                        <a href="<?php echo $this->createUrl('products/view',array( 'id' => $data->product_id)) ?>">
                            <?php 
                    	  	if($data->images){
                    	   		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
                    		}else {
                    			echo CHtml::image(Shop::register('no-pic.jpg'));
                    		}?>
                        </a>
                        <p style="padding: 0;" class="bold colr"><?php echo Shop::priceFormat($data->price); ?></p>
                        <div style="text-align: center; margin-left: 40px;">
                         <a href="<?php echo $this->createUrl('products/view', array('id' => $data->product_id)) ?>" class="buttonthree"><span>Xem</span></a>  
                        </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
        <div class="clear"></div>
         <br /><br /> 
		</div>
	</div>
</div>
    
    
<style type="text/css">
.wd-tab .wd-item li{background-color:#f2f2f2;float:left;font-weight:bolder;margin-right:2px;padding:.5em 1em; list-style: none; }
.wd-tab .wd-item li.wd-current{background-color:#900;}
.wd-tab .wd-item li.wd-current a{color:#fff !important;}
.wd-tab .wd-item li a:link, .wd-tab .wd-item li a:visited{color:#000;}
.wd-tab .wd-item li a:hover{color:#c00;}
.wd-tab .wd-panel{ padding: 35px 0 0 0px; }
 </style>
 <script type="text/javascript">
 $().ready(function(){
    $('.wd-tab').each(function(){
    	$(this).find('.wd-section').hide();
    
    	var current = $(this).find('.wd-item').children('.wd-current');
    	if (current.length == 0){
    		$(this).find('.wd-item').children(':first-child').addClass('wd-current');
    		$($(this).find('.wd-item').children(':first-child').find('a').attr('href')).show();
    	}
    
    	$(this).find('.wd-item').find('a').click(function(){
    		var current = $(this).parent().hasClass('wd-current');
    		if (current == false){
    			$(this).parent()
    				.addClass('wd-current')
    				.siblings().each(function(){
    					$(this).removeClass('wd-current');
    					$($(this).find('a').attr('href')).hide();
    				});
    			$($(this).attr('href')).fadeIn();
    		}
    		return false;
    	});
    });	
 });
 </script>