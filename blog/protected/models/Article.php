<?php 

/**
 * 文章管理模型
 * yii 框架中 必须要有以下两个关键的方法 二者缺一不可
 * model 创建一个模型对象的静态方法
 * tableName 返回当前对象的表名
 * @author Red-Bo
 * @date 2016-03-16 21:57:27
 */

class Article extends CActiveRecord
{
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
		return '{{article}}';
	}

	public $cate;

	/**
	 * @return array customized attribute labels (name=&gt;label)
	 */
	public function attributeLabels()
	{
		return array(
			'title'   => '文章标题',
			'type'    => '类型',
			'cid'     => '栏目',
			'thunb'   => '文章缩略图',
			'info'    => '摘要',
			'content' => '内容',
		);
	}

	/**
	 * 设置数据验证规则
	 * 
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title','required','message' =>'标题必填'),
			array('type','in', 'range' => array(0,1) ,'message' => '请选择类型'),
			array('cid','check_cate'),
			array('info','required','message' => '摘要必须'),
			array('thumb','file','types' => 'jpg,gif,png,jpeg','message'=> '没有上传类型或者类型不符'),
			array('content','required','message' => '内容必填'),

		);
	}

	/**
	 * 验证文章分类信息
	 * 
	 * @author Red-Bo
	 * @date 2016-03-25 23:26:48
	 */
	public function check_cate()
	{
		if($this->cid <= 0)
			$this->addError('cid' ,'请选择栏目');
	}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{

		return array(
			'cates' => array(self::BELONGS_TO,'Category','cid'),

		);
	}

	/**
	 * 顶部导航条方法
	 * @author Red-Bo
	 * @date 2016-03-30 00:08:21
	 */
	public function common()
	{
		$data = array();
		$sql =   "SELECT cname,cid FROM {{category}} LIMIT 5";
		$data['nav'] = Category::model()->findAllBySql($sql);
		$sql = "SELECT title ,aid FROM {{article}} ORDER BY time DESC LIMIT 5";
		$data['title'] = $this->findAllBySql($sql);
		return $data;

	}

}
