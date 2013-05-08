<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
<?php $this->renderPartial('/shopCategory/admin',array('model' => $category)); ?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
<?php $this->renderPartial('/products/admin',array('model' => $products)); ?>
<?php $this->endWidget(); ?>


<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
<?php $this->renderPartial('/order/admin'); ?>
<?php $this->endWidget(); ?>
