<?php

/**
 * CategoryController - Controller dùng để xử lý việc xem tin tức theo danh muc
 * 
 * @author huytbt
 * @date 2011-06-27
 * @version 1.0
 */
class CategoryController extends Controller
{
    
    //public $layout='frontend';
    
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
     * actionDetail - Action dùng để hiển thị detail
     *
     * @param string $id 
     */
    public function actionList($alias = null)
    {
        $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../assets');
        Yii::app()->getClientScript()->registerCssFile($baseScriptUrl.'/news.css');
        Yii::app()->clientScript->registerScriptFile($baseScriptUrl.'/news.js');
        
       // List all news   
        $category = NewsCategories::model()->findByAttributes(array('alias' => $alias));
                
        if ($category === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        //$news = $category->with('entry')->findAll();
        //$dataProvider = new CActiveDataProvider($news);
        $dataProvider=new CActiveDataProvider('NewsEntries', array(
            'criteria'=>array(
                //'condition'=>'t.alias="' . $alias .'"' ,
                'with'=>array(
                    'category' => array(
                        'condition' => 'category.alias="' . $alias .'"'  )                
                ),
            ),
            'pagination'=>array(
                'pageSize'=> 5,
            ),
        )); 
        //CVarDumper::dump($dataProvider->getData(),10,true);
        $this->render('list', array(
            'category' => $category,
            'dataProvider'=>$dataProvider,
        ));
    }

}