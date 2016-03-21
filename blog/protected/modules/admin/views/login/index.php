<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL; ?>login.css" />
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL; ?>jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL ?>login.js"></script>
	<title></title>
</head>
<body>
 <!-- 使用 yii1 小物件实现生成表单 -->
	<div id="divBox">
		<!-- <form action="" method="POST" id="login"> -->
		<?php $form = $this->beginWidget('CActiveForm'); ?>
			<!-- <input type="text" id="userName" name=""/> -->
			<!-- 生成type 文本框 -->
			<?php echo $form->textField($loginForm,'username',array('id' => 'userName')); ?>
			<!-- <input type="password" id="psd" name=""/> -->
			<?php echo $form->textField($loginForm,'password',array('id' =>'psd')); ?>
		<!-- 	<input type="" value="" id="verify" name=""/> -->
			<?php echo $form->textField($loginForm,'verifyCode',array('id' => 'verify')); ?>
			<input type="submit" id="sub" value=""/>
			<!-- 验证码 -->
			<div class="captcha">
				<?php $this->widget(
					'CCaptcha' , array(
						'showRefreshButton' => true,
						'clickableImage' => true,
						'imageOptions' => array('alt' => '点击换图','title' => '点击换图','style' => 'cursor:pointer' ,'id' => 'verify_img'),

					)
				); ?>
			</div>
		<!-- 	<img src="" id="verify_img" /> -->
		<?php $this->endWidget(); ?>
	<!-- 	</form> -->
		<div class="four_bj">
			
			<p class="f_lt"></p>
			<p class="f_rt"></p>
			<p class="f_lb"></p>
			<p class="f_rb"></p>
		</div>
		<ul id="peo">
			<li class="error"><?php echo $form->error($loginForm,'username'); ?></li>
		</ul>
		<ul id="psd">
			<li class="error"><?php echo $form->error($loginForm,'password'); ?></li>
		</ul>
		<ul id="ver">
			<li class="error"><?php echo $form->error($loginForm,'verifyCode'); ?></li>
		</ul>
	</div>

<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('form','background');
    </script>
<![endif]-->
</body>
</html>