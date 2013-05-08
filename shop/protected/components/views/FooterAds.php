<div class="partners">
	<ul>
		<?php foreach ($ads as $image) : ?>
		<li><a href="<?php echo $image->url ?>"><img src="<?php echo Yii::app()->createAbsoluteUrl('/') . '/files/ads/' . $image->image; ?>" alt="Image" /></a></li>
		<?php endforeach; ?>
	</ul>
</div>