<?php

class SearchController extends Controller
{
    public $layout = 'frontend';

    /**
     * This is the action to handle external exceptions.
     */
    public function actionIndex()
    {
        $keyword = $_GET['keyword'];
        $criteria = new CDbCriteria;

        $criteria->compare('title', $keyword, true);

        $result = new CActiveDataProvider('Products', array('criteria' => $criteria, ));
        $result->pagination = array('pageSize' => 9);
        
        $this->render('index', array('keyword' => $keyword,'result' => $result));
    }


}
