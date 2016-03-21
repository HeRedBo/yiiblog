<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ;?>public.css" />
		<script type="text/javascript" src="<?php echo ADMIN_JS_URL; ?>jquery-1.7.2.min.js"></script>
	<title></title>
	<style type="text/css">
		span{
			color: #f00;
		}
	</style>
</head>
<body>
	<?php $form = $this->beginWidget('CActiveForm',array(
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
		<?php if(yii::app()->user->hasFlash('success')) {
			 echo yii::app()->user->getFlash('success');
		} ?>
		<table class="table">
			<tr >
				<td class="th" colspan="2">修改密码</td>
			</tr>
			<tr>
				<td>用户名</td>
				<td><?php echo yii::app()->user->name; ?></td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'password'); ?></td>
				<td>
				<?php echo $form->passwordField($model,'password'); ?>
				<?php echo $form->error($model,'password'); ?>
				</td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'password1'); ?></td>
				<td>
					<?php echo $form->passwordField($model,'password1'); ?>
					<?php echo $form->error($model,'password1'); ?>
				</td>
			</tr>

			<tr>
				<td><?php echo $form->labelEx($model,'password2'); ?></td>
				<td>
				<?php echo $form->passwordField($model,'password2'); ?>
				<?php echo $form->error($model,'password2'); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	<?php $this->endWidget(); ?>
	
</body>
</html>