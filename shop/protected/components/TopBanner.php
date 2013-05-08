<?php

Yii::import('zii.widgets.CPortlet');

class TopBanner extends CPortlet
{
	protected function renderContent()
	{ 
	    $arrImg = Ads::model()->findAllByAttributes(array('position' => 'top'));
		$this->render('TopBanner',array('top' => $arrImg));
	}
}