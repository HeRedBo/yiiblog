yii:<?php

class User extends CActiveRecord
{
	// 设置密框变量
	public $password1;
	public $password2;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{admin}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('password', 'required', 'message'=>'原始密码必填'),
			array('password1', 'required', 'message'=>'新密码必填'),
			array('password2', 'required', 'message'=>'确认密码必填'),
			// 验证码比较 
			array('password2','compare','compareAttribute' => 'password1',
				'message' => '两次密码不一致'),
			array('password', 'check_passwd'),
		);
	}

	/**
	 * 验证用户密码是否输入正确
	 * 
	 * @author Red-Bo
	 * @date 2016-03-22 01:19:37
	 */
	public function check_passwd()
	{
		 // 找出用户的信息
		 $userInfo = $this
		 			->find('username=:name',array(
		 				':name' => yii::app()->user->name));
		 	if(md5($this->password.$userInfo->salt) != $userInfo->password)
		 		$this->addError('password','原始密码不正确');
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=&gt;label)
	 */
	public function attributeLabels()
	{
		return array(
			'password' => '原始密码',
			'password1' => '新密码',
			'password2' => '确认密码',
		);
	}
}