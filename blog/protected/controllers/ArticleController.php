<?php
/**
 *  文章管理控制器
 * @author Red-Bo
 * @date 2016-03-29 23:06:43
 */
class ArticleController extends Controller
{
	public function actionIndex($aid)
	{
		$articleInfo = Article::model()->findByPk($aid);
		$this->render('index',array('articleInfo' => $articleInfo));
	}

	// Uncomment the following methods and override them if needed
	
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			
			array(
				'system.web.widgets.COutputCache + index',
				'duration' => 30,
				'varyByParam' => array('aid')
			),
		);
	}

	// public function actions()
	// {
	// 	// return external action classes, e.g.:
	// 	return array(
	// 		'action1'=>'path.to.ActionClass',
	// 		'action2'=>array(
	// 			'class'=>'path.to.AnotherActionClass',
	// 			'propertyName'=>'propertyValue',
	// 		),
	// 	);
	// }
	
}