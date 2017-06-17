<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加友链</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Back/src/css/select.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/Public/Back/src/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Back/src/js/nxeditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Back/src/js/nxeditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Back/src/js/nxeditor/lang/zh-cn/zh-cn.js"></script>

<!--touxiang-->
<link rel="stylesheet" href="/Public/Back/src/bootstrap/assets/css/font-awesome.min.css">
<link href="/Public/Back/src/bootstrap/cropper.min.css" rel="stylesheet">
<link href="/Public/Back/src/bootstrap/sitelogo.css" rel="stylesheet">
<script src="/Public/Back/src/bootstrap/cropper.js"></script>
<script src="/Public/Back/src/bootstrap/sitelogo.js"></script>
<style>
*{margin:0;padding:0;} 
a{text-decoration:none;} 
.btn_addPic{ 
display: block; 
position: relative; 
width: 140px; 
height: 39px; 
overflow: hidden; 
border: 1px solid #EBEBEB; 
background: none repeat scroll 0 0 #F3F3F3; 
color: #999999; 
cursor: pointer; 
text-align: center; 
} 
.btn_addPic span{display: block;line-height: 39px;} 
.btn_addPic em { 
background:url(/Public/Back/src/images/+.png) 0 0; 
display: inline-block; 
width: 18px; 
height: 18px; 
overflow: hidden; 
margin: 10px 5px 10px 0; 
line-height: 20em; 
vertical-align: middle; 
} 
.btn_addPic:hover em{background-position:-19px 0;} 
.filePrew { 
display: block; 
position: absolute; 
top: 0; 
left: 0; 
width: 240px; 
height: 39px; 
font-size: 100px; /* 增大不同浏览器的可点击区域 */ 
opacity: 0; /* 实现的关键点 */ 
filter:alpha(opacity=0);/* 兼容IE */ 
} 
.worklabel input{
    width: 140px;
    height: 32px;
}
.rightMain .width678 {
    margin-left: 5px;
}
.btn{
    width: 96px;
}
.btns {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}   
.btn{
    background-color: deepskyblue;
}  
</style>

</head>
<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">添加友链</a></li>
        </ul>
    </div>
    <div class="formbody">
    <div id="usual1" class="usual"> 
        <div class="itab">
            <ul> 
                <li><a href="#tab1" class="selected">添加友链</a></li> 
            <!--<li><a href="#tab2">自定义</a></li> -->
            </ul>
        </div> 
        <div id="tab1" class="tabson">
            <div class="formtext">Hi，<b><?php echo ($users["username"]); ?></b></div>
            <form action="<?php if($friendlylink['status']==1){echo U('update');}else{echo U('add');}?>" method="post" id="form" enctype="multipart/form-data">
                <ul class="forminfo">
                <input name="id" type="hidden" class="dfinput" value=<?php if(($friendlylink['status'] == 1)): ?>"<?php echo ($friendlylink["id"]); ?>"<?php else: ?>"0"<?php endif; ?> style="width:518px;"/>
                    <li><label>标题<b>*</b></label><input name="name" type="text" class="dfinput" <?php if(($friendlylink['status'] == 1)): ?>value="<?php echo ($friendlylink["name"]); ?>"<?php endif; ?>  style="width:518px;"/></li>
                    <li><label>链接<b>*</b></label><input name="link" type="text" class="dfinput" <?php if(($friendlylink['status'] == 1)): ?>value="<?php echo ($friendlylink["link"]); ?>"<?php endif; ?>  style="width:518px;"/></li>
                   
                    <div style="height:19px;"></div>
                    <div style="position: fixed; bottom: 0px; left: 0px; z-index: 9999; width: 100%;  none repeat scroll 0% 0%; padding-left: 50px; top: 277px;">
                        <li style="margin-bottom:0px;"><label>&nbsp;</label><input type="button" class="fb-btn" value="马上发布"/></li>
                    </div>
                </ul>
            </form>
        </div>      
    </div> 
</div>    
<!--touxiang-->
<link rel="stylesheet" type="text/css" href="/Public/Back/src/bootstrap/css/bootstrap.css"/>
<script src="/Public/Back/src/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Back/src/bootstrap/html2canvas.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Back/src/bootstrap/printscreen.js"></script>

<script type="text/javascript">
  
   

    $('.fb-btn').click(function(){
        var t = $('.dfinput[name="name"]').val();
        var m = $('.dfinput[name="link"]').val();

            if($.trim(t).length == 0) return alert('请输入标题');
        if($.trim(m).length == 0) return alert('请输入链接');

            $('#form').submit();
    });
</script>
</body>
</html>