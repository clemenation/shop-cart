<div id="banner">       
     <div id='coin-slider'>
        <?php 
            foreach ($top as $item): 
        ?>
    	<a href="<?php echo $item->url ?>/" target="_blank">
    		<img src="/files/adv/<?php echo $item->image ?>" alt="<?php echo $item->url ?>" class="img" />		
    	</a>     
        <?php endforeach; ?>
    </div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/coin-slider.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/coin-slider-styles.css" type="text/css" />
<script type="text/javascript">
	$(document).ready(function() {
		$('#coin-slider').coinslider({width : 920, height : 200});
	});
</script>