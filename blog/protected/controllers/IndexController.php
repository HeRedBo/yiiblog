<?php
/**
 * yii1 index 控制器
 * @author Red-Bo
 * @date 2016-03-13 23:37:01
 */
class IndexController extends Controller
{

	/**
	 * Index 主方法
	 * @author Red-Bo
	 * @date 2016-03-13 23:37:42
	 */
	public function actionIndex()
	{
		// echo "Hellow Yii1";
		// 渲染视图| render会渲染布局 rednerPartial 则不会渲染视图 
		// $this->renderPartial('index'); 
		$this->render('index');
	}
}