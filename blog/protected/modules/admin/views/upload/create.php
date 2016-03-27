<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL; ?>jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>public.css" />
	<title>图片测试</title>
		<style type="text/css">
		span{
			color: #f00;
		}
	</style>
</head>
<body>
	<!-- <form action="" method="post"> -->
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'company-news-form',

        'htmlOptions'=>array('enctype'=>'multipart/form-data'),//上传图片，所以要增加这一句属性。
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
		<table class="table">
			<tr >
				<td class="th" colspan="10">发表文章</td>
			</tr>

			<!-- 上传图片 -->
			<tr>
				<td><?php echo $form->labelEx($model,'news_pic'); ?></td>
				<td>
					<?php echo CHtml::activeFileField($model,'news_pic'); ?>  
					<?php echo $form->error($model,'news_pic'); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="添加" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	<?php $this->endWidget();  ?>
	<!-- </form> -->
</body>
</html>

