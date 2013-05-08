<?php

Yii::import('zii.widgets.CPortlet');

class LeftMenu extends CPortlet
{

	protected function renderContent()
	{
		$this->render('LeftMenu');
	}
}