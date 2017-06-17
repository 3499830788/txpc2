<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>橡皮擦</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Back/src/js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
        </ul>
    </div>
    <div class="mainindex">
        <div class="welinfo">
            <span><img src="/Public/Back/src/images/sun.png" alt="天气" /></span>
            <b><?php echo ($users["username"]); ?>早上好，欢迎使用信息管理系统</b>(476565345@qq.com)
            <a href="<?php echo U('Back/Index/admin_md');?>">帐号设置<?php echo ($one); ?></a>
        </div>
        
        <div class="welinfo">
            <span><img src="/Public/Back/src/images/time.png" alt="时间" /></span>
            <i>您上次登录的时间：<?php echo ($users["last_up_time"]); ?> </i> （不是您登录的？<a href="<?php echo U('Back/Index/admin_md');?>">请点这里</a>）
            </div>   
        <div class="xline"></div>   
    </div>
</body>
</html>