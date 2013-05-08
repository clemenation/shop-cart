<?php

/**
 * Manage_newsController - Controller dùng để quản lý tin tức
 * 
 * @author huytbt
 * @date 2011-06-30
 * @version 1.0
 */
class Manage_newsController extends Controller
{
    /**
     * @todo Kiểm tra quyền
     */
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

     public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new NewsEntries;
        $modelMiddle = new NewsMiddle;
        $modelCategories = NewsCategories::model()->findAll();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NewsEntries'])) {
            $model->attributes = $_POST['NewsEntries'];
            $modelMiddle->attributes = $_POST['NewsMiddle'];
            $fileUpload = CUploadedFile::getInstance($model, 'image');
            if (isset($fileUpload)) {
                $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/news/'; //Yii::app()->basePath . '/../jlwebroot/upload';
                
                if (!is_dir($uploadPath))
                    mkdir($uploadPath,777,true);
                
                $filename = $model->alias . '.' . $fileUpload->getExtensionName(); //time() . mt_rand(0, 0xfff) . '.' . $fileUpload->getExtensionName();
                $fileUpload->saveAs($uploadPath . '/' . $filename);
                
                // thumbnails image
                $thumbsPath = $uploadPath;
                Yii::import('ext.phpthumb.EasyPhpThumb');
                $thumbs = new EasyPhpThumb();
                $thumbs->init();
                $thumbs->setThumbsDirectory($thumbsPath);
                $thumbs->load($uploadPath . '/' . $filename)
                    ->resize(80, 60)
                    ->save('thumb_'.$filename);
                
                $model->image = $filename;
            }
			
          
            $modelMiddle->validate();
            $transaction=$model->dbConnection->beginTransaction();
            try {
                $model->created = time();
                $model->modified = time();
                $model->news_date = $model->n_date . '|' . $model->n_hours . '|' . $model->n_minutes;
                if ($model->save() && is_array($modelMiddle->category_id)) {
                    foreach ($modelMiddle->category_id as $cat) {
                        $middle = new NewsMiddle;
                        $middle->category_id = $cat;
                        $middle->news_entry_id = $model->id;
                        if (!$middle->save())
                            throw new Exception('Can not create news');
                    }
                    
                    $transaction->commit();
                    //$this->redirect(array('view', 'id' => IDHelper::uuidFromBinary($model->id)));
                    echo '<script>parent.location=parent.location;</script>';
				    Yii::app()->end();
                } else
                    throw new Exception('Can not create news');
            } catch (Exception $e) {
                $transaction->rollBack();
            }
            
        } else {
			$model->is_published = 1;
		}

        if (empty($model->n_date)) {
            $model->n_date = date('m/d/Y', time());
            $model->n_hours = date('h', time());
            $model->n_minutes = date('i', time());
        }

        $this->render('create', array(
            'model' => $model,
            'modelCategories' => $modelCategories,
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

        if (isset($_POST['NewsEntries'])) {
            $model->attributes = $_POST['NewsEntries'];
            
            $fileUpload = CUploadedFile::getInstance($model, 'image');
            if (isset($fileUpload)) {
                $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/news/'; //Yii::app()->basePath . '/../jlwebroot/upload';
                
                // Delete old image
                if ($model->image) {
                    unlink($uploadPath . '/' . $model->image);
                }
                
                if (!is_dir($uploadPath))
                    mkdir($uploadPath,777,true);
                
                $filename = $model->alias . '.' . $fileUpload->getExtensionName(); //time() . mt_rand(0, 0xfff) . '.' . $fileUpload->getExtensionName();
                $fileUpload->saveAs($uploadPath . '/' . $filename);
                
                // thumbnails image
                $thumbsPath = $uploadPath;
                Yii::import('ext.phpthumb.EasyPhpThumb');
                $thumbs = new EasyPhpThumb();
                $thumbs->init();
                $thumbs->setThumbsDirectory($thumbsPath);
                $thumbs->load($uploadPath . '/' . $filename)
                    ->resize(80, 60)
                    ->save('thumb_'.$filename);
                
                $model->image = $filename;
            }
            
            $model->modified = time();
            if ($model->save()) {
				echo '<script>parent.location=parent.location;</script>';
				Yii::app()->end();
			}
        }
        
        if (empty($model->n_date)) {
            $arrNewsDay = explode('|', $model->news_date);
            $model->n_date = $arrNewsDay[0];
            $model->n_hours = $arrNewsDay[1];
            $model->n_minutes = $arrNewsDay[2];
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
            if ($model->image) {
                $uploadPath = YiiBase::getPathOfAlias('webroot') . '/files/news/'; //Yii::app()->basePath . '/../jlwebroot/upload';
                unlink($uploadPath . '/' . $model->image);
            }
            $model->delete();
            
            $middle = NewsMiddle::model()->deleteAllByAttributes(array('news_entry_id'=>$id));

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        if (isset($_POST['news-entries-grid_c0']))
        {
            foreach ($_POST['news-entries-grid_c0'] as $strNewID) {
                $model = $this->loadModel($strNewID);
                $model->delete();
            }
        }
        
        $model = new NewsEntries('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NewsEntries']))
            $model->attributes = $_GET['NewsEntries'];

        $this->render('admin', array(
            'model' => $model
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = NewsEntries::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-entries-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
