<?php

class ProductsController extends Controller
{
	public $_model;


	public function actionView()
	{
        $related = array();
	    
        $model = $this->loadModel();
        $model->view++;
        $model->save();
        
        if(isset($_GET['id']))
        {
            $related = Products::model()->findAll(
            array(
                'order' => 'RAND()',
                'limit' => '6',
                'condition' => 'product_id != "' . $_GET['id'] . '" and category_id = "' . $model->category_id . '"'
            )
        );
        }
        
		$this->render('view',array(
			'model'=> $model,
            'related' => $related
		));
	}

	public function actionCreate()
	{
		$model=new Products;

		 $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);


			if($model->save())
				$this->redirect(array('shop/admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id, $return = null)
	{
		$model=$this->loadModel();

		$this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);
			if(isset($_POST['Variations']))
				$model->setVariations($_POST['Variations']);

			if($model->save())
				if($return == 'product')
					$this->redirect(array('/admin/products/update', 'id' => $model->product_id));
				else
					$this->redirect(array('/admin/products/admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	        
        $topproducts = Products::model()->findAll(
            array(
                'order' => 'view desc',
                'limit' => '15'
            )
        );
        
        $saleoffproducts = Products::model()->findAll(
            array(
                'order' => 'product_id desc',
                'limit' => '15',
                'condition' => 'is_saleoff = 1'
            )
        );
        
        $products = Products::model()->findAll(
            array(
                'order' => 'product_id desc',
                'limit' => '15'
            )
        );
        
		$this->render('index',array(		
            'top' => $topproducts ,
            'sale' => $saleoffproducts,
            'products' => $products,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Products::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
