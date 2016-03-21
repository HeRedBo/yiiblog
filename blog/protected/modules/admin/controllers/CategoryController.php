<?php

/**
 * 文章分类控制器
 * 
 * @author Red-Bo
 * @date 2016-03-21 22:45:49
 */
 
class CategoryController extends Controller
{
    public function actionIndex()
    {
        
    }

    /**
     * 分类添加
     * 
     * @author Red-Bo
     * @date 2016-03-21 22:46:29
     */
    public function actionAdd()
    {
    	$model = new Category();

    	$this->render('add',array('categoryModel' => $model));
    	
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

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}