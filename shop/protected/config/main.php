<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii Shop',
    'language' => 'vi',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        //'application.extensions.yiidebugtb.*',
		
		'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.shop.*',
		'application.modules.shop.models.*',
		'application.modules.news.models.*',
        'application.modules.rights.models.*',
		'application.modules.rights.components.*',
	),

	'defaultController'=>'shop',
    'modules' => array(
		'user',
        'news',
        'admin',
		'rights'=>array(
			'debug'=>true,
			//'install'=>true,
			'enableBizRuleData'=>true,
		),
        'shop' => array( 
            'currencySymbol' => 'VNĐ',
        ),
        //'wdcalendar'    => array( 
//                                'wd_options' => array(  
//                                    'view' => 'week',
//                                    //'readonly' => 'JS:true' // execute JS
//                                ),
//                                'embed' => true,  
//        ),
        'gii'=>array(
                        'class'=>'system.gii.GiiModule',
                        'password'=>'12345',
                ),
    ),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class'=>'RWebUser',
			'allowAutoLogin'=>true,
			'loginUrl' => array('/user/login'),
		),
		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'itemTable'=>'tbl_rights_authitem',
			'itemChildTable'=>'tbl_rights_authitemchild',
			'assignmentTable'=>'tbl_rights_authassignment',
			'rightsTable'=>'tbl_rights',
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yiishop;',
			'emulatePrepare' => true,
			'username' => 'admin',
			'password' => '123456',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
            'enableProfiling' => true,
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'urlManager'=>array(
        	'urlFormat'=>'path',
            'showScriptName'=>false,
        	'rules'=>array(
        		'post/<id:\d+>/<title:.*?>'=>'post/view',
        		'posts/<tag:.*?>'=>'post/index',
        		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        	),
        ),
        'cache'=>array(
            'class'=>'system.caching.CFileCache',
        ),
        'settings'=>array(
            'class'     => 'Settings',
            'cacheId'   => 'global_website_settings',
            'cacheTime' => 84000,
        ),
		 'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters'=>array('127.0.0.1','192.168.1.215'),
                ),
            ),
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);