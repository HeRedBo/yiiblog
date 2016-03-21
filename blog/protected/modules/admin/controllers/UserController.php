<?php
/**
 * 用户管理控制器
 */
class UserController extends Controller
{
    public function actionIndex()
    {
        
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

	/**
	 * 修改用户密码
	 * 
	 * @author Red-Bo
	 * @date 2016-03-22 00:34:35
	 */
	public function actionPasswd()
	{
		$model = new User();
		if(isset($_POST['User'])) {
			$userInfo = $model->find('username=:name',
				array(':name' => yii::app()->user->name));
			$model->attributes = $_POST['User'];
			if($model->validate()) {
				$model->salt = $salt = substr(uniqid(), -6);
				$password = md5($_POST['User']['password']. $salt);

				// 更新数据操作
				$res = $model->updateByPk($userInfo->uid,array(
					'password' => $password,
					'salt' => $salt,
				));
				if($res !== false)
					yii::app()->user->setFlash('success','密码修改成功！');
			}
		}
		$this->render('index',array('model' => $model));
	}
}