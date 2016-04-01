<?php

class DefaultController extends Controller
{
    /**
     * 权限过滤
     * @author Red-Bo
     * @date 2016-03-29 00:47:32
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                    'allow',
                    'actions' => array('Index','Copy'),
                    'users'   => array('@'),
                ),
            array(
                    'deny',
                    'users' => array('*'),
                ),
        );
    }
    
    /**
     * 后台首页
     * @author Red-Bo
     * @date 2016-03-31 00:09:08
     */
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

    /**
     * 系统配置信息类
     * @author Red-Bo
     * @date 2016-03-31 00:09:25
     */
	public function actionCopy()
	{
		$this->renderPartial('copy');
	}
}