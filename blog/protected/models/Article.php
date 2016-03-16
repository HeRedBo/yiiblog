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

	/**
	 * 设置数据验证规则
	 * 
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
		);
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
		);
	}
}
