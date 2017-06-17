<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息列表</title>
<link href="/Public/Back/src/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Back/src/js/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
});
  
$(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

$(".sure").click(function(){
  $(".tip").fadeOut(100);
  
  //
var act = $("#sure").attr("act");
if(act =="dan"){
	  $("#form1").submit();
	}else if(act=="duo"){
		$("#form2").submit();
	}
	//
	
});

$(".cancel").click(function(){
  $(".tip").fadeOut(100);
});


//allid
    $('input[name="allid"]').click(function(){
        $('input[name="ids[]"]:checkbox').attr('checked', $(this).is(':checked'));
    });


});
</script>
<script>

// JavaScript Document

/**//* 
* 说明：用Jquery的方法，无刷新页面，编辑表格 
*/ 

$(function() { 
//给页面中有bigclassname类的标签上加上click函数 
$(".id").click(function() { 

var objTD = $(this); 

//先将老的类别名称保存起来,并用trim方法去掉左右多余的空格 
var oldText = $.trim(objTD.text()); 

//构造一个input的标签对象（作用是为了让这个input失效，不然点击多次后，文字会消失） 
var input = $("<input type='text' value='" + oldText + "' />"); 

//当前td的内容变为文本框，并且把老类别名放进去 
objTD.html(input); 

//设置文本框的点击事件失效 
input.click(function() { 
return false; 
}); 

//设置文本框样式，让界面显示的人性化点 
input.css("font-size", "12px"); 
input.css("text-align", "center"); 
input.css("background-color", "#ffffff"); 
input.width("50px"); 

//自动选中文本框中的文字 
input.select(); 

//文本框失去焦点时重新变为文本 
input.blur(function() { 

//获得新输入的类别名 
var newText = $(this).val(); 

//用新的类别名文字替换之前变过来的输入框状态 
objTD.html(newText); 

//获取该类别名所对应的ID(bigclassid) 
//var bigclassid = objTD.prev().text(); 
var id = objTD.prev().text(); 

//将新的类别名进行转码，不然界面以及数据库显示的都是"???"这样的乱码 
newText = escape(newText); 


//获取要传到"一般处理文件"(update_bigclassname_2.php)中的URL 
var url = "<?php echo U('ajax');?>?id=" + id + "&sort=" + newText; 

//AJAX异步更改数据库,data为成功后的回调返回值，用于显示提示信息 
$.get(url, function(data) { //alert(data)
 	
 }); 

}); 
}); 
}); 
</script>
</head>
<body>
	<div class="place">
        <span>位置：</span>
            <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">视频列表</a></li>
        </ul>
    </div>
    <div class="rightinfo">
    <div class="tools">
    	<ul class="toolbar">
            <li><a href="<?php echo U('videoAdd')?>"><span><img src="/Public/Back/src/images/t01.png" /></span>添加</a></li>
            <li class="alldelete click"><span><img src="/Public/Back/src/images/t03.png" /></span>批量删除</li>
        </ul>
        <form action="" method="get">
            <ul class="toolbar">
                <li style="margin-left:5px;padding-right: 0px;"><label>名称:&nbsp;</label><input name="search" type="text" class="scinput" value="" style="width:120px;" /></li>
                <li style="padding-right: 0px;"><label></label><input type="submit" class="scbtn" value="查询"/></li>
            </ul>
        </form>
        <ul class="toolbar1">
            <li><span><img src="/Public/Back/src/images/t05.png" /></span>设置</li>
        </ul>
    </div>
    <form action="<?php echo U('alldelete')?>" method="post" id="form2" >
    	<input name="p" value="<?php echo $_GET['p']?>" type="hidden" />
        <table class="tablelist">
        	<thead>
            	<tr>
                    <th><input name="allid" type="checkbox"  /></th>
                    <th>编号<i class="sort"><img src="/Public/Back/src/images/px.gif" /></i></th>
                    <th>排序</th>
                    <th>名称</th>
                    <th>发布日期</th>
                    <th>是否发布</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($video)): foreach($video as $key=>$v): ?><tr>
                    <td><input name="ids[]" type="checkbox" value="<?php echo ($v["id"]); ?>" /></td>
                    <td><?php echo ($v["id"]); ?></td>
                    <td><span style="display:none;"><?php echo ($v["id"]); ?></span><span class="id"><?php echo ($i=1+$i++); ?></span></td>
                    <td><?php echo ($v["title"]); ?></td>
                    <td><?php echo ($v["pubtime"]); ?></td>
                    <td><?php if($v["is_show"] == 1): ?>是<?php else: ?>否<?php endif; ?><td>
                    <?php if($v["is_show"] == 0): ?><a href="<?php echo U('release',array('id'=>$v['id']))?>" class="tablelink">点击发布</a>
                    <?php else: ?>
                    <a href="<?php echo U('unlease',array('id'=>$v['id']))?>" class="tablelink">撤销发布</a><?php endif; ?> 
                    <a href="<?php echo U('videoUpdate',array('id'=>$v['id'],'page'=>$_GET['p']))?>" class="tablelink">修改</a>
                    <a style="cursor:pointer;" linkid="<?php echo $v['id']?>" page="<?php echo $_GET['p']?>" class="tablelink click delid"> 删除</a>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
    </form>
   
    <div class="pagin pages">
        <?php echo $page;?>
    </div>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/Public/Back/src/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的删除 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <form action="<?php echo U('del')?>" method="post" id="form1" >
        	<input type="hidden" name="delid">	
			<input type="hidden" name="page">	
        </form>
        
        
            <input type="button"  class="sure" value="确定" id="sure" act="" />&nbsp;
        	<input type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    

    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    
    <script>
    	$(document).ready(function(e) {
            $(".delid").click(function(){
				var delid = $(this).attr("linkid");	
				var page = $(this).attr("page");	
				$("input[name='delid']").val(delid);
				$("input[name='page']").val(page);
				$("#sure").attr("act","dan");
			})
            $(".alldelete").click(function(){
				$("#sure").attr("act","duo");
			})
			
			
        });
    </script>
    

</body>

</html>