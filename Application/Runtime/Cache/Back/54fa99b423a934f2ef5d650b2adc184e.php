<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>橡皮擦</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Back/src/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>
</head>
<body style="background:url(/Public/Back/src/images/topbg.gif) repeat-x;">
<div class="topleft">
    <a href="<?php echo U('index/index');?>" target="_parent"><img src="/Public/Back/src/images/logo.png" title="系统首页" /></a>
</div>   
<div class="topright">    
    <ul>
        <li><a href="<?php echo U('Back/Index/logout');?>" target="_parent">退出</a></li>
    </ul> 
 </div>
</body>
</html>