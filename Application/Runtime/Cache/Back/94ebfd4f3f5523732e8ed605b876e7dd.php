<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>橡皮擦</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <form action="<?php echo U('Back/Index/modify_account');?>" method="post">
        <input type="hidden" name="id" value="<?php echo ($users["id"]); ?>" >
        <div class="formbody">  
            <div class="formtitle"><span>信息修改</span></div>      
            <ul class="forminfo">
                <li><label>帐号</label><input name="username" value="<?php echo ($users["username"]); ?>" readonly="readonly" type="text" class="dfinput" /><i>用户名</i></li>
                <li><label>密码</label><input name="password" value="" type="text" class="dfinput" /><i>密码不能为空</i></li>
                <li><label>重复密码</label><input name="password2" value="" type="text" class="dfinput" /><i>密码不能为空</i></li>
                <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
            </ul>
        </div>
	</form>
</body>
</html>