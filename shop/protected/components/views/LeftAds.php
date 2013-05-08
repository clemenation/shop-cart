<div class="wrapper">
<ul>
   <?php 
            foreach ($left as $item): 
            if($item == '.' || $item == '..') continue; 
        ?>
    <li>
	<a href="<?php echo $item->url ?>/" target="_blank">
		<img src="/files/adv/<?php echo $item->image ?>" alt="<?php echo $item->url ?>" class="img" />		
	</a>     
    </li>
    <?php endforeach; ?>
</ul>                           
</div>