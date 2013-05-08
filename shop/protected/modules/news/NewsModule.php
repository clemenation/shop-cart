<?php

/**
 * NewsModule - Module tin tức
 * 
 * @author huytbt
 * @date 2011-06-30
 * @version 1.0
 */
class NewsModule extends CWebModule
{
    /**
     * @var int entries new show in page
     */
    public $entriesShow = 3;
    
    /**
     * @var int entries new show in page
     */
    public $entriesShowInEditPage = 10;
    
    /**
     * @var int entries other new show in page
     */
    public $entriesOtherNews = 10;

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'news.models.*',
            'news.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

}
