<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Back/src/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Back/src/js/cloud.js" type="text/javascript"></script>

<script language="javascript">
$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<body style="background-color:#1c77ac; background-image:url(/Public/Back/src/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  
    <div class="logintop">    
        <span>欢迎登录后台管理界面平台</span>        
    </div>
    <div class="loginbody">
        <span class="systemlogo" style="display:block;"></span> 
        <div class="loginbox">
            <ul>
                <form action="check_login" method="post">
                    <li><input name="username" type="text" class="loginuser" value="admin" onclick="JavaScript:this.value=''"/></li>
                    <li><input name="password" type="password" class="loginpwd" value="密码" onclick="JavaScript:this.value=''"/></li>
                    <li>
                        <input name="" type="submit" class="loginbtn" value="登录"  />
                        <label><input name="" type="checkbox" value="" checked="checked" />记住密码</label>
                        <label><a id="forget" target="_blank">忘记密码？</a></label>
                    </li>
                </form>
            </ul>
        </div>
    </div>   
</body>
</html>