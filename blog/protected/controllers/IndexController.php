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
		// 使用原生sql 语句查询相关数据
		$sqlNew = "SELECT thumb,aid,title,info FROM {{article}} WHERE type=0 ORDER BY time DESC";
		$sqlHot ="SELECT thumb,aid,title,info FROM {{article}} WHERE type=1 ORDER BY time DESC";
		$articleModel = Article::model();

		$articleNew = $articleModel->findAllBySql($sqlNew);
		$aritcleHot = $articleModel->findAllBySql($sqlNew);

		$data = array(
			'articleNew' => $articleNew,
			'aritcleHot' => $aritcleHot,
		);
		// 页面数据渲染
		$this->render('index',$data);
	}
}