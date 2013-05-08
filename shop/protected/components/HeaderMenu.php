<?php

class HeaderMenu extends CWidget
{

	public function run()
	{
	    $menus = Information::model()->findAllByAttributes(array('show_menu' => 1));               $newsCategory = NewsCategories::model()->findAll();    
        $productsCategory = Category::model()->findAllByAttributes(array('parent_id' => '0'));
		$this->render('HeaderMenu', array('menus' => $menus,'news' => $newsCategory,'products' => $productsCategory));
	}
}