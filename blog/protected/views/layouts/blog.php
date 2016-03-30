<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Yii2文章管理系统</title>

<link href="<?php echo CSS_URL;  ?>common.css" rel="stylesheet" />
</head>	
<body>
	<div id="top">
	</div>
	<div id="header">
		<div class='logo'>
			<a href=""><img src="<?php echo IMG_URL; ?>logo.jpg" alt=""></a>
		</div>
		<div class='navigation'>
			<a href="<?php echo $this->createUrl('./index.html'); ?>">首页</a>
			<?php 
				$artModel = Article::model();
				$common = $artModel->common();
			 ?>
			<?php foreach ($common['nav'] as $k => $v): ?>
				 <a href="<?php echo $this->createUrl('category/index',array('cid' => $v['cid'])); ?>">
				 <?php echo $v->cname;  ?>
				 </a>
			<?php endforeach ?>
		</div>
	</div>

	<?php echo $content ?>
	
	<div class='sidebar'>
			<div class='item'>
				<h2>文章标题</h2>
				<ul class='flink'>
					<?php foreach ($common['title'] as $k => $v1): ?>
						<li><a href="<?php echo $this->createUrl('article/index',array('aid' => $v1->aid )); ?>">
						<?php echo $v1->title; ?></a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			
		</div>
	</div>
	<div id="footer">
		<div class='bgbar'></div>
		<div class='bottom'>
			<div class='pos'>
				<div class='copyright'>
					© Copyright 2011-2013 www.houdunwang 后盾网
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
