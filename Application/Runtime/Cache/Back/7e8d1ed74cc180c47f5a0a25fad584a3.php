<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>橡皮擦</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Back/src/js/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
$(function(){   
    //导航切换
    $(".menuson li").click(function(){
        $(".menuson li.active").removeClass("active")
        $(this).addClass("active");
    });
    
    $('.title').click(function(){
        var $ul = $(this).next('ul');
        $('dd').find('ul').slideUp();
        if($ul.is(':visible')){
            $(this).next('ul').slideUp();
        }else{
            $(this).next('ul').slideDown();
        }
    });
})  
</script>


</head>

<body style="background:#f0f9fd;">
    <div class="lefttop"><span></span>功能栏目</div>
    <dl class="leftmenu">
        <dd>
            <div class="title">
                <span><img src="/Public/Back/src/images/leftico02.png" /></span>基地视频
            </div>
            <ul class="menuson">
                <li><cite></cite><a href="<?php echo U('Back/Basevideo/baseList');?>" target="rightFrame">基地视频</a><i></i></li>
            </ul> 
        </dd>
        <dd>
            <div class="title">
                <span><img src="/Public/Back/src/images/leftico02.png" /></span>服务案例
            </div>
            <ul class="menuson">
                <li><cite></cite><a href="<?php echo U('Back/Video/videoList');?>" target="rightFrame">视频列表</a><i></i></li>
            </ul> 
        </dd>
        <dd>
            <div class="title">
                <span><img src="/Public/Back/src/images/leftico02.png" /></span>场景
            </div>
            <ul class="menuson">
                <li><cite></cite><a href="<?php echo U('Back/Scenes/scenesList');?>" target="rightFrame">场景列表</a><i></i></li>
                <li><cite></cite><a href="<?php echo U('Back/Scenes/scenesTypeList');?>" target="rightFrame">场景类型列表</a><i></i></li>
            </ul>     
        </dd>  
        <dd>
            <div class="title">
                <span><img src="/Public/Back/src/images/leftico02.png" /></span>文章
            </div>
            <ul class="menuson">
                <li><cite></cite><a href="<?php echo U('Back/News/NewsList');?>" target="rightFrame">文章列表</a><i></i></li>
            </ul>    
        </dd> 
        <dd>
            <div class="title">
                <span><img src="/Public/Back/src/images/leftico02.png" /></span>服务
            </div>
            <ul class="menuson">
                <li><cite></cite><a href="<?php echo U('Back/Service/serviceList');?>" target="rightFrame">服务列表</a><i></i></li>
            </ul> 
        </dd>   
        <dd>
            <div class="title">
                <span><img src="/Public/Back/src/images/leftico02.png" /></span>友情链接
            </div>
            <ul class="menuson">
                <li><cite></cite><a href="<?php echo U('Back/Friendlink/friendlinkList');?>" target="rightFrame">友情链接</a><i></i></li>
            </ul> 

        </dd>   
    </dl>    
</body>
</html>