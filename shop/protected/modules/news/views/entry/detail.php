<?php
$this->breadcrumbs=array(
	$model->title,
);
$this->pageTitle .= ' - ' . $model->title;
?>
<?php if (isset($model)) : ?>
<div class="detail-article">
    <h4 class="title"><?php echo $model->title; ?></h4>
    <span class="date">Ngày đăng <?php echo date('d-m-Y',strtotime($model->news_date)); ?></span>
    <?php echo $model->content; ?>
    <div class="link-functions">
		<a href="javascript:window.print();" class="print">In bài viết</a>
	</div>
    <?php if ($otherNews) : ?>
    <div class="other-news">
		<h3>Các tin khác</h3>
		<ul>
            <?php foreach ($otherNews as $new) : ?>
            <li><a href="<?php echo Yii::app()->createUrl('/news/entry/detail', array('page'=>CHtml::encode($new->alias))); ?>"><?php echo $new->title?> <span>(<?php echo $new->news_date?>)</span></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
    <?php endif; ?>
</div>
<?php endif; ?>
