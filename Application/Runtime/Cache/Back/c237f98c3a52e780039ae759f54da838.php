<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加服务</title>
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
            <li><a href="#">添加服务</a></li>
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
            <div class="formtext">Hi，<b><?php echo ($users["username"]); ?></b></div>
            <form action="<?php echo U('add')?>" method="post" id="form" enctype="multipart/form-data">
                <ul class="forminfo">
                    <li><label>完整标题<b>*</b></label><input name="title" type="text" class="dfinput"  style="width:518px;"/></li>
                    <li><label>缩略图<b>*</b></label>
                        <button id="pics" class="btns btn-primary" type="button" data-toggle="modal" data-target="#avatar-modal" >请选择图片</button>
                        <input id="fileInput" name="image" type="hidden" >
                        <span style="line-height:40px; padding-left:20px;">320*180</span>
                        <div style="clear:both;"></div>
                    </li>
                    <li><label>内容详情<b>*</b></label>
                        <div style="float:left;">
                            <button class="btns btn-primary"  type="button" style="height: 35px;margin-bottom: 3px;" onclick="baiduimg(this)" data-toggle="modal" data-target="#avatar-modal" >请选择图片</button>
                            <textarea id="editor_id" name="content" style="width:900px;height:450px;"></textarea>
                            </div>
                        <div style="clear:both;"></div>
                    </li>
                    <li><label>关键字<b>*</b></label><input name="tag" type="text" class="dfinput"  style="width:518px;"/></li>
                    <li><label>内容描述<b>*</b></label>
                        <textarea id="info" name="info" style="width:700px;height:80px; border:1px solid #CCC;" class="textinput"></textarea>
                    </li>
                    <div style="height:19px;"></div>
                    <div style="position:fixed; bottom:0px; left:0px; z-index:9999; width:100%; background:#e5ecf2; padding-left:50px; ">
                        <li style="margin-bottom:0px;"><label>&nbsp;</label><input type="button" class="fb-btn" value="马上发布"/></li>
                    </div>
                </ul>
            </form>
        </div>      
    </div> 
</div>    
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" style="width: 1200px;">
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
                            <div class="col-md-8">
                                <div class="avatar-wrapper" data-type=""></div>
                            </div>
                            <div class="col-md-4">
                                <div class="avatar-preview preview-lg" id="imageHead"  style="width: 364px;height: 205px;"></div>
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

<script type="text/javascript">
    $("#pics").on("click",function(){
        $(".fa-save").removeClass("baiduimg");
    });

    function baiduimg(a){
        $(".fa-save").addClass("baiduimg");
    };

    function imagesAjaxs(url){ // 详情图片ajax
        $.post("",{"url":url},function(data){
            if(data.status==1){
                alert("请在编译器在线图片里查看");
            }else{
                alert("上传失败");
            }
        },"json")
    }
    $('.tablelist tbody tr:odd').addClass('odd');

        var ue = UE.getEditor('editor_id',{
             
         autoFloatEnabled: false,elementPathEnabled:false,wordCount:false,saveInterval:5000000,autoHeightEnabled:false,
            
        });

    $('.fb-btn').click(function(){
        var t = $('.dfinput[name="title"]').val(),
            i = $('#ifpic').text(),
            keyword = $('.dfinput[name="tag"]').val(),
            description = $('.textinput').val();

            if($.trim(t).length == 0) return alert('请输入标题');
            if(i == '未选择') return alert('请选择图片');
            if(!UE.getEditor('editor_id').hasContents()) return alert('请填写文章内容');
            if($.trim(keyword).length == 0) return alert('请填写关键词');
            if($.trim(description).length == 0) return alert('请填写内容描述');

            $('#form').submit();
    });
</script>
</body>
</html>