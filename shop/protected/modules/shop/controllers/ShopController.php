<?php

class ShopController extends Controller
{
	public $breadcrumbs;
	public $menu;
	public $_model;

	//public function actionInstall() 
//	{
//		if($this->module->debug) 
//		{
//			if(Yii::app()->request->isPostRequest) 
//			{
//				if($db = Yii::app()->db) {
//
//				} else {
//					throw new CException(Yii::t('shop', 'Database Connection is not working'));	
//				}
//			}
//			else {
//				$this->render('install');
//			}
//		} else {
//			throw new CException(Shop::t('Webshop is not in Debug Mode'));	
//		}
//	}
	

	public function actionAdmin()
	{
		$this->render('admin', array( ));
	}

	public function actionIndex()
	{
		$this->redirect(array('//shop/products/index'));
	}
}
