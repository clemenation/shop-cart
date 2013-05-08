<?php

class CategoryController extends Controller {

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
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new NewsCategories;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NewsCategories'])) {
            $model->attributes = $_POST['NewsCategories'];
            
            $fileUpload = CUploadedFile::getInstance($model, 'image');
            if (isset($fileUpload) && $model->validate()) {
                $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/news/';
                if (!is_dir($uploadPath))
                    mkdir($uploadPath);
                $filename = $model->alias . '.' . $fileUpload->getExtensionName(); //time() . mt_rand(0, 0xfff) . '.' . $fileUpload->getExtensionName();
                $fileUpload->saveAs($uploadPath . '/' . $filename);
                $model->image = $filename;
            }
            
            if ($model->save()) {
                $this->redirect(array('manage'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NewsCategories'])) {
            $model->attributes = $_POST['NewsCategories'];
            
            // Upload image
            $fileUpload = CUploadedFile::getInstance($model, 'image');
            if (isset($fileUpload) && $model->validate()) {
                $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/news/';
                
                if (!is_dir($uploadPath))
                    mkdir($uploadPath);
                    
                // Delete old image
                if ($model->image) {
                    @unlink($uploadPath . '/' . $model->image);
                }                
                                
                $filename = $model->alias . '.' . $fileUpload->getExtensionName(); //time() . mt_rand(0, 0xfff) . '.' . $fileUpload->getExtensionName();
                $fileUpload->saveAs($uploadPath . '/' . $filename);
                $model->image = $filename;
            }
            
            if ($model->save())
                $this->redirect(array('manage'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModel($id);
            if ($model->image != "") {
                $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/news/';
                @unlink($uploadPath . '/' . $model->image);
            }
            $model->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionManage()
    {
        $model = new NewsCategories('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NewsCategories']))
            $model->attributes = $_GET['NewsCategories'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = NewsCategories::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-categories-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}