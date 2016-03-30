<?php
/**
 * 栏目管理控制器
 * @author Red-Bo
 * @date 2016-03-29 23:35:08
 */
class CategoryController extends Controller
{
	/**
	 * 默认显示栏目页面
	 * @author Red-Bo
	 * @date 2016-03-29 23:35:32
	 */
	public function actionIndex($cid)
	{
		$sql = "SELECT thumb,title,info,aid FROM {{article}} WHERE cid = $cid";
		$articleInfo = Article::model()->findAllBySql($sql);
		$this->render('index', array('articleInfo' => $articleInfo));
	}

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