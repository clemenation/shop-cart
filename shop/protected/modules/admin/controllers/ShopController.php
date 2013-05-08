<?php

class ShopController extends Controller
{
	public $breadcrumbs;
	public $menu;
	public $_model;
    
    public function init() {
        if (!Yii::app()->session['isAdmin'])
            $this->redirect(Yii::app()->createUrl('admin/login'));
    }
    
    public $layout = 'admin';

	public function actionInstall() 
	{
		if($this->module->debug) 
		{
			if(Yii::app()->request->isPostRequest) 
			{
				if($db = Yii::app()->db) {

				} else {
					throw new CException(Yii::t('shop', 'Database Connection is not working'));	
				}
			}
			else {
				$this->render('install');
			}
		} else {
			throw new CException(Shop::t('Webshop is not in Debug Mode'));	
		}
	}

	public function actionAdmin()
	{
	    $category = new Category('search');
		$category->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$category->attributes=$_GET['Category'];
            
        $products = new Products('search');
    		$products->unsetAttributes();  // clear any default values
    		if(isset($_GET['Products']))
    			$products->attributes=$_GET['Products'];
		$this->render('admin', array('products' => $products,'category' => $category));
	} 

	public function actionIndex()
	{
		$this->redirect(array('//shop/products/index'));
	}
}
