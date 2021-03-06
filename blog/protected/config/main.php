<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// 设置默认控制器
	'defaultController' => 'index',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'admin'
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			// 设置后台自动登录的跳转地址
			'allowAutoLogin' =>true,
			'loginUrl' => array('admin/login/index'),

		),
		// 扩展自定义的缩略类
		'thumb' =>  array(
			'class' => 'ext.Thumb.CThumb', //路径别名
		),
		'cache' => array(
			'class' => 'system.caching.CFileCache',
			),
		

		// uncomment the following to enable URLs in path-format 
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false, //隐藏index.php 文件
			'rules'=>array(
				'index.html' => array('index'),
				'a/<aid:\d+>'	=> array('article/index', 'urlSuffix'=>'.html'),
				'c/<cid:\d+>'	=> array('category/index', 'urlSuffix'=>'.html'),

				// '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				// '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				// '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
