<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改信息</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Back/src/css/select.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Back/src/js/jquery-1.9.1.min.js"></script>
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
.forminfo input,
.forminfo textarea,
.forminfo .uew-select .uew-select-value{
    border-radius:5px;
}
.child_div{
    max-width:33%;min-width:30%;float:left;
}
.child_sdiv{
    max-width:25%;min-width:22%;float:left;
}
.wid145{width:145px;}
.mrlf10{
    margin-right:10px;
}
.mrlf50{
    margin-right:50px;
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
            <li><a href="#">修改视频</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div id="usual1" class="usual"> 
            <div class="itab">
              	<ul> 
                    <li><a href="#tab1" class="selected">发布通知</a></li> 
                    <!--<li><a href="#tab2">自定义</a></li> -->
              	</ul>
            </div> 
          	<div id="tab1" class="tabson">
                <div class="formtext">Hi，<b>admin</b>，使用发布！</div>
                <form action="<?php echo U('videoUpdate')?>" method="post" enctype="multipart/form-data" id="form">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" >
                    <input type="hidden" name="page" value="<?php echo $_GET['page'];?>" >
                    <ul class="forminfo">
                        <li>
                            <div class="child_div">
                                <label>完整标题<b>*</b></label><input name="title" id="title" value="<?php echo ($rs["title"]); ?>" type="text" class="dfinput"  style="width:250px;"/>
                            </div>
                            
                        </li>
                        <li>
                            <div class="child_div">
                                <label>视频时长<b>*</b></label><input id="vTime" name="vTime" type="text" class="dfinput" value="<?php echo ($rs["vtime"]); ?>" style="width:250px;"/><span style="line-height:40px; padding-left:20px;">（例如：1分30秒）</span>
                            </div>
                        </li>
                        <li>
                            <div class="child_div">
                                <label>缩略图<b>*</b></label>
                                <button class="btns btn-primary" type="button" data-toggle="modal" data-target="#avatar-modal" >请选择图片</button>
                                <input id="fileInput" name="image" type="hidden" >
                                <span style="line-height:40px; padding-left:20px;">800*450</span>
                                <div style="clear:both;"></div>
                            </div>
                        </li>
                        <!-- <li><label>淘宝SWf地址<b>*</b></label><input value="<?php echo $rs['link']?>" name="link" type="text"  class="dfinput"  style="width:518px;" id="swf"/></li> -->
                        <li><label>淘宝SWf地址<b>*</b></label><input value="<?php echo ($rs["link_mobile"]); ?>" name="link_mobile" type="text" class="dfinput"  style="width:518px;" id="swf"/></li>
                         <li><label>淘宝MP4地址<b>*</b></label><input name="mp4_mobile" type="text" class="dfinput"  style="width:518px;" value="<?php echo ($rs["mp4_mobile"]); ?>" id="mp4"/> (直接复制淘宝视频连接即可)</li>
                        <li><label>&nbsp;</label><input type="button" class="fb-btn" value="马上发布"/></li>
                    </ul>
                </form>
            </div> 
    	</div>  
    </div>
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <form class="avatar-form">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title" id="avatar-modal-label">上传图片</h4>
                </div>
                <div class="modal-body">
                    <div class="avatar-body">
                        <div class="avatar-upload">
                            <input class="avatar-src" name="avatar_src" type="hidden">
                            <input class="avatar-data" name="avatar_data" type="hidden">
                            <label for="avatarInput" style="line-height: 35px;">图片上传</label>
                            <button class="btns btn-primary"  type="button" style="height: 35px;" onclick="$('input[id=avatarInput]').click();">请选择图片</button>
                            <span id="avatar-name"></span>
                            <input class="avatar-input hide" id="avatarInput" name="avatar_file" type="file" accept="image/jpeg,image/jpg,image/png"></div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="avatar-wrapper" data-type=""></div>
                            </div>
                            <div class="col-md-3">
                                <div class="avatar-preview preview-lg" id="imageHead"></div>
                                <div  style="width: 100px;height:10px; overflow: auto;opacity: 0;position: fixed; top: 80px;left: 0;">
                                    <div id="imageHeads" class="avatar-preview preview-lg" style="width: 800px !important;height: 450px !important; ">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row avatar-btns">
                            <div class="col-md-4"></div>
                            <div class="col-md-5" style="text-align: right;">                   
                                <button class="btns btn-primary fa fa-arrows" data-method="setDragMode" data-option="move" type="button" title="移动">
                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
                                </span>
                              </button>
                              <button type="button" class="btns btn-primary fa fa-search-plus" data-method="zoom" data-option="0.1" title="放大图片">
                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;zoom&quot;, 0.1)">
                                  <!--<span class="fa fa-search-plus"></span>-->
                                </span>
                              </button>
                              <button type="button" class="btns btn-primary fa fa-search-minus" data-method="zoom" data-option="-0.1" title="缩小图片">
                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;zoom&quot;, -0.1)">
                                  <!--<span class="fa fa-search-minus"></span>-->
                                </span>
                              </button>
                              <button type="button" class="btns btn-primary fa fa-refresh" data-method="reset" title="重置图片">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;reset&quot;)" aria-describedby="tooltip866214">
                               </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btns btn-primary btn-block avatar-save fa fa-save" type="button" data-dismiss="modal"> 保存修改</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  
<!--touxiang-->
<link rel="stylesheet" type="text/css" href="/Public/Back/src/bootstrap/css/bootstrap.css"/>
<script src="/Public/Back/src/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Back/src/bootstrap/html2canvas.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Back/src/bootstrap/printscreen.js"></script>       
<script>
    $('.fb-btn').click(function(){
        var t = $('.dfinput[name="title"]').val(),
            swf = $('.dfinput[name="link_mobile"]').val(),
            mp4 = $("#mp4").val(),
            vTime = $('#vTime').val();
            if($.trim(t).length == 0) return alert('请输入标题');
            if($.trim(vTime).length == 0) return alert('请输入视频时长');
            if($.trim(swf).length == 0) return alert('请输入淘宝SWF地址');
            if($.trim(mp4).length == 0) return alert('请输入淘宝MP4地址');
            $('#form').submit();
    });
</script>  
</body>

</html>