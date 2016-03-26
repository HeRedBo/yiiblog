<?php

/**
 * 文章管理控制器
 * @author Red-Bo
 * @date 2016-03-18 13:44:02
 */
class ArticleController extends Controller
{

	/**
	 * 博客文章新增方法
	 * 
	 * @author Red-Bo
	 * @date 2016-03-18 13:46:44
	 */
	public function actionAdd()
	{
		$articleModel = new Article();

		$category = Category::model();
		$categoryInfo = $category->findAll();
		// 构造前台数据
		$cateArr = array();
		$cateArr[] = '请选择商品的分类';
 		foreach($categoryInfo as $v) {
 			$cateArr[$v->cid] = $v->cname;
		}
		$data = array(
			'articleModel' => $articleModel,
			'cateArr' => $cateArr,
		);

		// 处理提交数据信息
		if(isset( $_POST['Article']) ) {
			// 使用 yii框架图片类图片
			$articleModel->thumb = CUploadedFile::getInstance($articleModel,'thumb');
			if($articleModel->thumb) {
				$preRand = 'img_'.time().mt_rand(0,9999); // 商品的图片 
				$imgName = $preRand . '.' .$articleModel->thumb->extensionName;
				$articleModel->thumb->saveAs(yii::app()->basePath.'/uploads/'.$imgName);
				//$articleModel->thumb->saveAs('uploads/' . $imgName); // 这这种方式上传不了
				$articleModel->thumb = $imgName;

				//制作缩略图
				$path = yii::app()->basePath .'/uploads/';
				$thumb = yii::app()->thumb;
				$thumb->image = $path.$imgName;
				$thumb->width = 130;
				$thumb->height = 95;
				$thumb->mode = 4;
				$thumb->directory = $path;
				$thumb->defaultName = $preRand;
				$thumb->createThumb();
				$thumb->save();				
			}

			$articleModel->attributes = $_POST['Article'];
			$articleModel->time       = time();

			if($articleModel->save())
				$this->redirect(array('index'));

		}
		
		$this->render('add',$data);
	}
	/**
	 * 文章列表页面功能 
	 * @author Red-Bo
	 * @date 2016-03-18 13:44:43
	 */
    public function actionIndex()
    {
       // yii 中的分页类
       $cri = new CDbCriteria(array(
       		"order" => "aid DESC",
       ));
       $articleModel = Article::model();
       $total = $articleModel->count($cri);
       // 分页参数设置
       $pager = new CPagination($total);  // 生成分页类
       $pager->pageSize = 3; 	//设置每页的显示的个数
       $pager->applyLimit($cri);

       $articleInfo = $articleModel->findAll($cri);

       $data = array(
       		'articleInfo' => $articleInfo,
       		'pages'	  => $pager
       	);

       $this->render('index',$data);


    }


    /**
     * 删除文章方法
     * 
     * @param  int  $aid  文章标题
     * @author Red-Bo
     * @date 2016-03-26 21:12:47
     */
    public function actionDel($aid)
    {
    	$articleMOdel = Article::model();
    	// 删除商品的记录 跳转到列表页面
    	if($articleModel->deleteByPk($aid))
    		$this->redirect(array('index'));
    }

    /**
     * 编辑文章方法
     * @param  int $aid  文章的id
     * @author Red-Bo
     * @date 2016-03-26 22:30:49
     */
    public function actionEdit($aid)
    {
    	$articleModel =Article::model();
    	$articleInfo = $articleModel->findByPk($aid);
    	$category = Category::model();
		$categoryInfo = $category->findAll();
		// 构造前台数据
		$cateArr = array();
		$cateArr[] = '请选择商品的分类';
 		foreach($categoryInfo as $v) {
 			$cateArr[$v->cid] = $v->cname;
		}

		// 处理提交数据信息
		if(isset( $_POST['Article']) ) {
			// 使用 yii框架图片类图片
			$articleInfo->thumb = CUploadedFile::getInstance($articleModel,'thumb');
			if($articleInfo->thumb) {
				$preRand = 'img_'.time().mt_rand(0,9999); // 商品的图片 
				$imgName = $preRand . '.' .$articleInfo->thumb->extensionName;
				$articleInfo->thumb->saveAs(yii::app()->basePath.'/uploads/'.$imgName);
				//$articleModel->thumb->saveAs('uploads/' . $imgName); // 这这种方式上传不了
				$articleInfo->thumb = $imgName;
				//制作缩略图
				$path = yii::app()->basePath .'/uploads/';
				$thumb = yii::app()->thumb;
				$thumb->image = $path.$imgName;
				$thumb->width = 130;
				$thumb->height = 95;
				$thumb->mode = 4;
				$thumb->directory = $path;
				$thumb->defaultName = $preRand;
				$thumb->createThumb();
				$thumb->save();				
			}
			$articleInfo->attributes = $_POST['Article'];
			//$articleInfo->time       = time();
			if($articleInfo->save())
				$this->redirect(array('index'));

		}

    	$this->render('edit',array(
    		'articleModel' => $articleInfo,
    		'cateArr' => $cateArr,
    	));

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
	