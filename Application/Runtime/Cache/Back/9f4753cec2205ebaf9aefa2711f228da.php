<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">场景类型</a></li>
    <li><a href="#">修改类型</a></li>
    </ul>
    </div>
    
    <form action="<?php echo U('scenesTypeUpdata')?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ids" value="<?php echo ($title["id"]); ?>">
    <div class="formbody">
    
    <div class="formtitle"><span>栏目信息</span></div>
    
    <ul class="forminfo">
    <li><label>类型</label><input name="title" type="text" class="dfinput" value="<?php echo ($title["title"]); ?>" /><i>类型不能超过30个字符</i></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </ul>
    </div>
    </form>

</body>

</html>