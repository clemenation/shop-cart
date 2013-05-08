<div class="blogentry">
    <div class="bloghead">
    	<h4><a href="<?php echo Yii::app()->createUrl('/news/entry/detail/',array('page' => $data->alias)) ?>" class="heading colr"><?php echo $data->title ?></a></4>
    </div>
    <div class="clear"></div>
    <div class="blogcont">
    	<p>
        	<?php echo $data->description ?>
        </p>
    </div>
    <div class="continuestory">
    	<a href="<?php echo Yii::app()->createUrl('/news/entry/detail/',array('page' => $data->alias)) ?>" class="buttonfour right"><span>Xem thêm</span></a>
    </div>
</div>