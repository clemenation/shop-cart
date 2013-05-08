<?php

Yii::import('zii.widgets.CPortlet');

class AdminMenu extends CPortlet
{
    public $title = "";
	public function init()
	{
		parent::init();
	}

	protected function renderContent()
	{
		$this->render('adminMenu');
	}
}