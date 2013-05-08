<?php

class TopMenu extends CWidget
{

	public function run()
	{
	    $newsCategory = NewsCategories::model()->findAll();    
        $productsCategory = Category::model()->findAllByAttributes(array('parent_id' => '0'));
		$this->render('TopMenu',
                array('news' => $newsCategory,'products' => $productsCategory)
        );
	}
}