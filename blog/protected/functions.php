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

	/**
	 * 显示图片
	 * @param string $url 商品的路径
	 * @param int $width 图片显示的宽度
	 * @param int $height 商品的显示高度	
	 * @return string商品的html标签
	 * @author Red-Bo
	 * @date 2016-03-27 22:05:53
	 */
	function showImage($url,$width='',$height ='')
	{
		$url = $url;
		if($width)
			$width = "width='{$width}'";
		if($height)
			$height = "height='{$height}'";
		echo "<img src='$url' $width $height />";
	}