<?php

class LeftAds extends CWidget
{

	public function run()
	{	   
	    $arrImg = Ads::model()->findAllByAttributes(array('position' => 'left'));
		$this->render('LeftAds',array('left' => $arrImg));
	}
}