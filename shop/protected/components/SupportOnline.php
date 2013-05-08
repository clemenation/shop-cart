<?php

class SupportOnline extends CWidget
{

	public function run()
	{
	    $supports = Supports::model()->findAllByAttributes(array('is_sale' => '1'));
        $sales = Supports::model()->findAllByAttributes(array('is_sale' => '0'));
		$this->render('SupportOnline',
                array(
                    'supports' => $supports,
                    'sales' => $sales,
                )
        );
	}
}