<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL; ?>jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>public.css" />
	<title>栏目编辑</title>
		<style type="text/css">
		span{
			color: #f00;
		}
	</style>
</head>
<body>
	<!-- <form action="" method="post"> -->
		<?php $form = $this->beginWidget('CActiveForm' ,array(
			'enableClientValidation'=> true,//是否使基于AJAX的验证可用。 默认是false
			'clientOptions' => array(
					'validateOnsubmit'	=> true //当表单被提交时是否执行AJAX验证
			),
		)) ;?>
		<table class="table">
			<tr >
				<td class="th" colspan="2">修改栏目</td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($categoryModel,'cname'); ?></td>
				<td>
					<?php echo $form->textField($categoryModel,'cname'); ?>
					<?php echo $form->error($categoryModel,'cname'); ?>
				</td>
			</tr>
			<!-- <tr>
				<td>密码：</td>
				<td><input type="password" name=""/></td>
			</tr> -->
			<!-- <tr>
				<td>确认密码：</td>
				<td><input type="password" name=""/></td>
			</tr> -->
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