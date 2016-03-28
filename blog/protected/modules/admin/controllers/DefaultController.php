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
                    'actions' => array('del','copy'),
                    'users'   => array('@'),
                ),
            array(
                    'deny',
                    'users' => array('*'),
                ),
        );
    }
    
	public function actionIndex()
	{

		$this->renderPartial('index');
	}

	public function actionCopy()
	{
		$this->renderPartial('copy');
	}
}