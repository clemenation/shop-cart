<?php

class DocsController extends Controller
{
	public $layout = 'admin';

    public function init() {
        if (!Yii::app()->session['isAdmin'])
            $this->redirect(Yii::app()->createUrl('admin/login'));
    }

    /**
     * @return string Trả về các action (cách nhau bằng dấu phẩy) cho phép truy cập mà không cần xác thực quyền
     */
    public function allowedActions() {
        return '*';
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    private function _removeSign($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    //$str = str_replace(" ", "-", str_replace("&amp;*#39;","",$str));
    return $str;
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Docs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Docs']))
		{
			$model->attributes=$_POST['Docs'];
            $fileUpload = CUploadedFile::getInstance($model, 'file');
            if (isset($fileUpload) && $model->validate()) {
                $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/docs/';
                if (!is_dir($uploadPath))
                    mkdir($uploadPath);
                $filename = $this->_removeSign($model->title) . '.' . $fileUpload->getExtensionName(); 
                $fileUpload->saveAs($uploadPath . '/' . $filename);
                $model->file = $filename;
            }
			if($model->save())
				$this->redirect(array('manage'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Docs']))
		{
			$model->attributes=$_POST['Docs'];
            
            $fileUpload = CUploadedFile::getInstance($model, 'file');
            if (isset($fileUpload) && $model->validate()) {
                $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/docs/';
                
                if (!is_dir($uploadPath))
                    mkdir($uploadPath);
                
                // Delete old image
                if ($model->file) {
                    @unlink($uploadPath . '/' . $model->file);
                }
                                
                $filename = $this->_removeSign($model->title) . '.' . $fileUpload->getExtensionName(); 
                $fileUpload->saveAs($uploadPath . '/' . $filename);
                $model->file = $filename;
            }
            
			if($model->save())
				$this->redirect(array('manage'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
            $model = $this->loadModel($id);
            $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/docs/';
            if ($model->file != "") {
                @unlink($uploadPath . '/' . $model->file);
            }
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Docs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionManage()
	{
		$model=new Docs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Docs']))
			$model->attributes=$_GET['Docs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Docs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='docs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
