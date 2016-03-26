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
    	$categoryModel = Category::model();
    	$cateInfo = $categoryModel->findAll();

    	$this->render('index',array('categoryInfo' => $cateInfo));
    }

    /**
     * 分类添加
     * 
     * @author Red-Bo
     * @date 2016-03-21 22:46:29
     */
    public function actionAdd()
    {
    	$categoryModel = new Category();
    	if(isset($_POST['Category']))
    	{
    		$categoryModel->attributes = $_POST['Category'];
        	if($categoryModel->save()){
        		// 执行save 会自动执行数据验证
				$this->redirect(array('index'));
			}
    	}
    	$this->render('add',array('categoryModel' => $categoryModel));
    	
    }
    
    /**
     * 删除分类信息
     * @param  int $cid  栏目的id
     * @return boolen 
     * @author Red-Bo
     * @date 2016-03-24 02:04:12
     */
    public function actionDel($cid)
    {
    	$categoryModel = Category::model();
    	$articleModel = Article::model();
    	$sql = "SELECT aid FROM {{article}} WHERE cid = $cid";
    	$articleInfo = $articleModel->findBySql($sql);
    	if( is_object($articleInfo) ) {
    		// 输出错误信息
    		Yii::app()->user->setFlash('error','栏目下面有文章,不能被删除！');
    		// 调整到栏目首页
    		$this->redirect(array('index'));
    	} else {
    		if($categoryModel->deleteByPK($cid)) {
    			Yii::app()->user->setFlash('success','数据删除成功！');
    			$this->redirect(array('index'));
    		} else {
    			// 输出错误信息
    			Yii::app()->setFlash('error','数据删除失败');
    			$this->redirect(array('index'));
    		}
    	}
    }

    /**
     * 栏目修改
     * @param  int  $cid 栏目的低
     * @return boolen  数据的更新转态
     * @author Red-Bo
     * @date 2016-03-24 02:40:11
     */
    public function actionEdit($cid)
    {
    	$categoryModel = Category::model();
    	$categoryInfo  = $categoryModel->findByPK($cid);


    	if(isset($_POST['Category']))
    	{
            //$categoryModel->attributes = $_POST['Category'];
    		$categoryInfo->attributes = $_POST['Category'];
        	if($categoryInfo->save()){
        		// 执行save 会自动执行数据验证 
                //  更新操作成功跳转到首页
				$this->redirect(array('index'));
			}
    	}
    	$this->render('edit',array('categoryModel' => $categoryInfo));
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