<?php

class LastestProduct extends CWidget
{

	public function run()
	{
	    $products = Products::model()->findAll(
            array(
                'order' => 'product_id desc',
                'limit' => '10'
            )
        );
        
        
        
		$this->render('LastestProduct',
                array('products' => $products)
                
        );
	}
}