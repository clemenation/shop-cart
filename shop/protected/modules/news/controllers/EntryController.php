<?php

/**
 * EntryController - Controller dùng để xử lý việc xem tin tức
 * 
 * @author huytbt
 * @date 2011-06-27
 * @version 1.0
 */
class EntryController extends Controller
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
    public function actionDetail($page)
    {
        $baseScriptUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/../assets');
        Yii::app()->getClientScript()->registerCssFile($baseScriptUrl.'/news.css');
        Yii::app()->clientScript->registerScriptFile($baseScriptUrl.'/news.js');
        
        Yii::import('application.modules.news.models.NewsEntries');
        $model = NewsEntries::model()->findByAttributes(array(
            'alias' => $page
        ));
        
        // Cập nhật số lần xem
        $model->viewer++;
        $model->save();
        
        $otherNews = NewsEntries::model()->findAll(array(
            'condition' => 'id<>:current_news_id',
            'params' => array(
                ':current_news_id' => $model->id
            ),
            'limit' => Yii::app()->getModule('news')->entriesOtherNews,
        ));
        
        $this->render('detail', array(
            'model' => $model,
            'otherNews' => $otherNews
        ));
    }

}