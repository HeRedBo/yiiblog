<?php

/**
 * yii 文件上传 编辑 删除
 * @author Red-Bo
 * @date 2016-03-27 19:52:40
 */
class UploadController extends Controller
{
	public function actionIndex()
	{
		$model = Companynews::model();
		$imgData = $model->findAll();
		date_default_timezone_set('PRC');
		$this->render('index',array('model' => $imgData));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new Companynews;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//p($_FILES);exit;
		if(isset($_POST['Companynews']))
		{
			$model->attributes=$_POST['Companynews'];
		    if(empty($_POST['Companynews']['news_pic']))
		    {
				$model->news_pic = $model->news_pic;
			}
			$file = CUploadedFile::getInstance($model,'news_pic');   //获得一个CUploadedFile的实例
			if(is_object($file)&&get_class($file) === 'CUploadedFile')
			{   // 	判断实例化是否成功
				$model->news_pic = './assets/upfile/News_file_'.time().'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称
			}
			else
			{
				$model->news_pic = './assets/upfile/nopic.jpg';   // 若果失败则应该是什么图片
			}
			$model->add_time = time(); // 添加图片的添加时间

			if($model->save())
			{
				if(is_object($file)&&get_class($file) === 'CUploadedFile')
				{
				$file->saveAs($model->news_pic);    // 上传图片
				}
				$this->redirect(array('Index','id'=>$model->id));
			} 
		}


		$this->render('create',array(
		'model'=>$model,
		));
	}


	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		$model = Companynews::model();
		$ImageInfo = $model->findByPk($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Companynews']))
		{   

		    $imageurl = $model->news_pic;
			$file = CUploadedFile::getInstance($model,'news_pic');   //获得一个CUploadedFile的实例
		     if(is_object($file)&&get_class($file) === 'CUploadedFile')
		     {   // 判断实例化是否成功

				$ImageInfo->news_pic = './assets/upfile/News_file_'.time().'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称
			}
		    else
		    {
				$ImageInfo->news_pic = $imageurl;   // 若果失败则应该是什么图片
			}

			// 上传图片 || 删除旧图片
			if(is_object($file)&&get_class($file) === 'CUploadedFile')
		    {
  				$file->saveAs($ImageInfo->news_pic);    // 上传图片
		        //删除旧图片
		        if(is_file($imageurl))
		        {
		            unlink($imageurl);
		        }
			}

			if($ImageInfo->save())
			{
		        
		          $this->redirect(array('index'));exit;
		          //$this->redirect(array('index','id'=>$model->id));
		    }
		}
		$this->render('update',
			array(
				'model'=>$ImageInfo,
			));
	}


	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
	  	$model = Companynews::model();
		$ImgData = $model->findByPk($id);
        $imageurl = $ImgData->news_pic; 
        if(is_file($imageurl))
        {
            unlink($imageurl);
        }
		
		if($model->deleteByPK($id))
		{
			Yii::app()->user->setFlash('success','数据删除成功！');
    		$this->redirect(array('index'));exit;
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


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