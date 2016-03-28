<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL; ?>jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>public.css" />

	<!-- 富文本编辑器(start) -->
	<!-- 配置文件 -->
	<script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>ueditor/ueditor.config.js"></script>
	<!-- 编辑器源码文件 -->
	<script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>ueditor/ueditor.all.min.js"></script>
	<!-- 富文本编辑器( end ) -->
	
	


	<title>文章发表</title>
		<style type="text/css">
		span{
			color: #f00;
		}
	</style>
</head>
<body>
	<!-- <form action="" method="post"> -->
		<?php $form = $this->beginWidget('CActiveForm' ,
			array(
			'enableClientValidation' => true,//是否使基于AJAX的验证可用。 默认是false
			'clientOptions'          => array(
					'validateOnsubmit'	=> true, //当表单被提交时是否执行AJAX验证
			),
			'htmlOptions'=>array(
				'enctype'=>'multipart/form-data'
			)
		)) ;?>
		<table class="table">
			<tr >
				<td class="th" colspan="10">发表文章</td>
			</tr>

			<!-- 标题 -->
			<tr>
				<td><?php echo $form->labelEx($articleModel,'title'); ?></td>
				<td>
					<?php echo $form->textField($articleModel,'title'); ?>
					<?php echo $form->error($articleModel,'title'); ?>
				</td>
			</tr>

			<!-- 类别 -->
			<tr>
				<td><?php echo $form->labelEx($articleModel,'type'); ?></td>
				<td>
					<?php 
					echo $form->radioButtonList(
						$articleModel, 'type',
							array(0 =>'普通',1 => '热门'),
							array('separator' => '&nbsp')
						
					);
					?>
					
				</td>
			</tr>
			<!-- 栏目 -->
			<tr>
				<td><?php echo $form->labelEx($articleModel,'cid'); ?></td>
				<td>
					<?php echo $form->dropDownList($articleModel,'cid',
						$cateArr
					); ?>
					<?php echo $form->error($articleModel,'cid'); ?>
				</td>
			</tr>
			<!-- 缩略图 -->
			<tr>
				<td><?php echo $form->labelEx($articleModel,'thumb'); ?></td>
				<td>
					<?php echo $form->fileField($articleModel,'thumb'); ?>
					<?php echo $form->error($articleModel,'thumb'); ?>
				</td>
			</tr>
			<!-- 摘要 -->
			<tr>
				<td><?php echo $form->labelEx($articleModel,'info'); ?></td>
				<td>
					<?php echo $form->textArea($articleModel,'info',array('cols' => 100,'rows' => 8,'maxlenth' => 100)); ?>
					<?php echo $form->error($articleModel,'info'); ?>
				</td>
			</tr>

			<!-- 内容 -->
			<tr>
				<td><?php echo $form->labelEx($articleModel,'content'); ?></td>
				<td>
					<?php echo $form->textArea($articleModel,'content' ,array('id' => 'content')); ?>
					<?php echo $form->error($articleModel,'content'); ?>
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

<script type="text/javascript">
 /* 百度富文本调用方式 */
  // 方法一 
  //var ue = UE.getEditor('content');

  UE.getEditor('content',{
    "initialFrameWidth":"100%",//寛
    "initialFrameHeight":350,//高
    "maximumWords" : 50000
  });
		/*window.UEDITOR_HOME_URL = "<?php ADMIN_ASSETS;?>ueditor/"
		window.onload = function () {
			window.UEDITOR_CONFIG.initialFrameWidth = 900;
			//window.UEDITOR_CONFIG.initialFrameHeight = 20%;
			UE.getEditor('content');
		}*/
</script>