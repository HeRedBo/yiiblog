<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>public.css" />
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL; ?>jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL; ?>public.js"></script>	
</head>
<body>
	<?php 
		if(Yii::app()->user->hasFlash('error'))
			echo Yii::app()->user->getFlash('error');
		if(Yii::app()->user->hasFlash('success'))
			echo Yii::app()->user->getFlash('success');
		
	 ?>
	<table class="table">
		<tr>
			<td class="th" colspan="10">查看栏目</td>
		</tr>
		<tr class="tableTop">
			<td>ID</td>
			<td>栏目名称</td>
			<td>操作</td>
		</tr>
		<?php foreach ($categoryInfo as $k => $v): ?>
				<tr>
				<td><?php echo $v->cid ?></td>
				<td><?php echo $v->cname ?></td>
				<td>
				<a href="<?php echo $this->createUrl('Edit',array('cid' => $v->cid)); ?>" class="edit">[编辑]</a>
				<a href="<?php echo $this->createUrl('Del',array('cid' => $v->cid)) ;?>" class="del">[删除]</a>
				</td>
		</tr>
		<?php endforeach; ?>
	
	</table>
	<div class="page">
		
	</div>
</body>
</html>