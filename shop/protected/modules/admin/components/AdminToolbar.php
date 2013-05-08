<?php

Yii::import('zii.widgets.CPortlet');

class AdminToolbar extends CPortlet
{
    public $title = "";
	public function init()
	{
		parent::init();
	}

	protected function renderContent()
	{
		$this->render('adminToolbar');
	}
}