<?php

class FooterAds extends CWidget
{

	public function run()
	{
	   Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.simplyscroll.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/scrolls.css');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.simplyscroll-1.0.4.min.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/scrolls.js', CClientScript::POS_END);
	    $ads = Ads::model()->findAllByAttributes(array('position' => 'bottom'));
		$this->render('FooterAds',
                array('ads' => $ads)
        );
	}
}