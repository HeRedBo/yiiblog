<?php 
	/**
	 * 公共函数文件 
	 * 
	 * @author Red-Bo
	 * @date 2016-03-16 21:39:59
	 */
	
	/**
	 * 格式化打印函数
	 * 
	 * @param  array $arr 需要打印的数组
	 * @author Red-Bo
	 * @date 2016-03-16 21:41:28
	 */
	function p($arr)
	{
		echo "<pre>";
		print_r($arr);
		echo "<pre/>";
	}