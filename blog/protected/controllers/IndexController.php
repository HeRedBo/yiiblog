<?php
/**
 * yii1 index 控制器
 * @author Red-Bo
 * @date 2016-03-13 23:37:01
 */
class IndexController extends Controller
{
	/**
	 * 数据过滤方法 设置商品的缓存
	 * @author Red-Bo
	 * @date 2016-03-30 23:10:26
	 */
	
	public function filters()
	{
		return array(
			array(
				'system.web.widgets.COutputCache + index',
				'duration' => 30,
				),
		);
	}
	
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