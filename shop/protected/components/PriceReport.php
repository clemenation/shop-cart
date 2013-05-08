<?php

class PriceReport extends CWidget
{

	public function run()
	{
	    $reports = Docs::model()->findAll();
		$this->render('PriceReport',
                array('reports' => $reports)
        );
	}
}