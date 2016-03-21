<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>后盾网HDPHP许愿墙后台管理首页</title>
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL
 ?>admin.css" />
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL ?>jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo ADMIN_JS_URL ?>admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">Yii1博客台管理首页 （V1.1）</p>
		</div>
		<div class="top_bar">
			<p class="adm">
				<span>管理员：</span>
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people">[<?php echo yii::app()->user->name  ?>]</span>
			</p>
			<p class="now_time">
				今天是：<?php echo date('Y.m.d') ?> 
				您的当前位置是：
				<span>首页</span>
			</p>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="<?php echo $this->createUrl('login/layout'); ?>" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
			<p class="use">功能管理</p>
			<div class="menu_box">
				<h2>文章管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('article/add'); ?>" class="pos">发表文章</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('article/Index') ?>" class="pos">文章列表</a>				        	
				        </li> 
				    </ul>
				  
				</div>
			</div>	
			<div class="menu_box">
				<h2>分类管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('Category/index'); ?>" class="pos">查看栏目</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('Category/add'); ?>" class="pos">添加栏位</a>				        	
				        </li> 
				    </ul>
				   
				</div>
			</div>			
			<div class="menu_box">
						<h2>常用菜单</h2>
						<div class="text">
							<ul class="con">
						        <li class="nav_u">
						        	<a href="<?php echo $this->createUrl('/'); ?>" class="pos">前台首页</a>				        	
						        </li> 
						    </ul>
						    <ul class="con">
						        <li class="nav_u">
						        	<a href="<?php echo $this->createUrl('copy'); ?>" class="pos">系统信息</a>				        	
						        </li> 
						    </ul>
							<ul class="con">
						        <li class="nav_u">
						        	<a href="<?php echo $this->createUrl('User/passwd'); ?>" class="pos">修改密码</a>				        	
						        </li> 
						    </ul>
						   
						</div>
					</div>					
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src="<?php echo $this->createUrl('default/copy'); ?>"></iframe>
		</div>
	<!-- 底部 -->
	<div id="foot_box">
		<div class="foot">
			<p>@Copyright © 2013-2013 houdunwang.com All Rights Reserved. 京ICP备0000000号</p>
		</div>
	</div>

</body>
</html>
<!--[if IE 6]>
    <script type="text/javascript" src="./js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->
