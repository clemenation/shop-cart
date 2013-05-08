<?php

class LoginController extends Controller
{
    public $layout='login';
	public function actionIndex()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
            {
                if(UserModule::isAdmin())
                {
                    Yii::app()->session['isAdmin'] = 1;
                    $this->redirect(Yii::app()->createUrl('admin/panel'));
                }
                else
                {
                    Yii::app()->session['isAdmin'] = 0;
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            }
				
		}
		// display the login form
		$this->render('index',array('model'=>$model));
	}
}