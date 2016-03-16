<?php
/**
 * 后台管理
 * @author Red-Bo
 * @date 2016-03-16 23:22:33
 */
 class LoginController extends CController
 {
 	/**
 	 * 后台登录模型
 	 * 
 	 * @author Red-Bo
 	 * @date 2016-03-17 00:27:32
 	 */
     public function actionIndex()
     {
     	$loginForm =  new LoginForm();
     	if(isset($_POST['LoginForm']))
     	{
     		// 接收参数
     		$loginForm->attributes = $_POST['LoginForm'];

     		if($loginForm->validate() && $loginForm->login())
     		{
     			// 登录成功 保存登录时间 跳转到后台系统首页
     			yii::app()->session['logintime'] = time();
     			$this->redirect(array('default/index'));

     		}
     	}
        $this->renderPartial('index',array('loginForm' => $loginForm));
     }
 	
 	/**
 	 * 验证码生产函数
 	 * @author Red-Bo
 	 * @date 2016-03-17 00:42:51
 	 */
 	
 	public function actions()
 	{
 		// return external action classes, e.g.:
 		return array(
 			'captcha'=> array(
 				'class' => 'system.web.widgets.captcha.CCaptchaAction',
 				'height' => 25,
 				'width' => 80,
 				'minLength' =>4,
 				'maxLength' =>4,
 			)	
 		);
 	}
 	// -----------------------------------------------------------
 	// Uncomment the following methods and override them if needed
 	/*
 	public function filters()
 	{
 		// return the filter configuration for this controller, e.g.:
 		return array(
 			'inlineFilterName',
 			array(
 				'class'=>'path.to.FilterClass',
 				'propertyName'=>'propertyValue',
 			),
 		);
 	}
 	*/

 	
 } ?>