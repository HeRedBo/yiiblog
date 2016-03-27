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
			<td class="th" colspan="10">图片李彪</td>
		</tr>
		<tr class="tableTop">
			<td>ID</td>
			<td>图片</td>
			<td>添加时间</td>
			<td>操作</td>
		</tr>
		<?php foreach ($model as $k => $v): ?>
			<tr>
		
				<td><?php echo $v->id; ?></td>
				<td><?php showImage($v->news_pic,100) ?></td>
				<td><?php echo date('Y-m-d h:i:s',$v->add_time); ?></td>
				<td>
					<a href="<?php echo $this->createUrl('Update',array('id' => $v->id)); ?>" >[编辑]</a>
					<a href="<?php echo $this->createUrl('Delete',array('id' => $v->id)); ?>" >[删除]</a>
				</td>
			</tr>
			
		<?php endforeach ?>
	</table>
	<!-- <div class="page">
		<?php 
			// $this->widget('CLinkPager', array(
			// 	'header' => '',
			// 	'firstPageLabel' => '首页',
			// 	'lastPageLabel'  => '末页',
			// 	'prevPageLabel' => '上一页',
			// 	'nextPageLabel' => '下一页',
			// 	'pages' => $pages,
			// 	'maxButtonCount' => 5,
			// ));
	
		?>
	</div> -->
</body>
</html>