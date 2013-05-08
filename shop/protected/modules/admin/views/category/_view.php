<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(IDHelper::uuidFromBinary($data->id)), array('view', 'id'=>IDHelper::uuidFromBinary($data->id))); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php if (isset($data->image)) : ?><img src="/<?php echo Yii::app()->params['site_info']['template'] . '/files/news/' . $data->image; ?>" height="64"/><?php endif ?>
	<br />

</div>