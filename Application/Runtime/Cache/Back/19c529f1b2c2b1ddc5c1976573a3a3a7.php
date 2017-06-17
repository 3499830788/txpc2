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
  
  $(".deleteDuo").click(function(){
    $(".tipDuo").fadeIn(200);
  });

$(".tiptop a").click(function(){
  $(".tip,.tipDuo").fadeOut(200);
});

$(".sure").click(function(){
  $(".tip,.tipDuo").fadeOut(100);
  
  //
  var act = $("#sure").attr("act");
  if(act =="dan"){
      $("#form1").submit();
    }else if(act=="duo"){
        $("#form2").submit();
    }else if(act=="danDuo"){
        $("#form3").submit();
    }
    //
    
});

$(".cancel").click(function(){
  $(".tip,.tipDuo").fadeOut(100);
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
    <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
        <ul class="toolbar">
        <li><a href="<?php echo U('scenesAdd')?>"><span><img src="/Public/Back/src/images/t01.png" /></span>添加</a></li>
        <!--<li><span><img src="/Public/Back/src/images/t02.png" /></span>修改</li>-->
        <li class="alldelete click"><span><img src="/Public/Back/src/images/t03.png" /></span>批量删除</li>
        <!--<li><span><img src="/Public/Back/src/images/t04.png" /></span>统计</li>-->
        </ul>


        <form action="" method="get">
        <ul class="toolbar">
        <li style="margin-left:5px;padding-right: 0px;"><label>标题:&nbsp;</label><input name="search" type="text" class="scinput" value="<?php echo ($_GET['search']); ?>" style="width:120px;" /></li>
        <li style="padding-right: 0px;"><label></label><input type="submit" class="scbtn" value="查询"/></li>
        </ul>
        </form>
        
        
        <ul class="toolbar1">
        <li><span><img src="/Public/Back/src/images/t05.png" /></span>设置</li>
        </ul>
    
    </div>
    
    <form action="<?php echo U('scenesdelete')?>" method="post" id="form2" >
    <input name="p" value="<?php echo $_GET['p']?>" type="hidden" />
    <table class="tablelist">
        <thead>
            <tr>
                <th class="w6"><input name="allid" type="checkbox"  /></th>
                <th class="w6">编号<i class="sort"><img src="/Public/Back/src/images/px.gif" /></i></th>
                <th class="w6">排序</th>
                <th class="w20">图片</th>
                <th class="w20">分类</th>
                <th class="w6">用户</th>
                <th class="w10">发布时间</th>
                <th class="w6">是否发布</th>
                <th class="w20">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($info)): foreach($info as $key=>$vo): ?><tr>
                <td colspan="9">
                    <table class="tabs" style="outline:none;">
                        <thead>
                                <td class="w6"><input name="ids[]" type="checkbox" value="<?php echo ($vo["sid"]); ?>" /></td>
                                <td class="w6"><?php echo ($vo["sid"]); ?></td>
                                <td class="w6"><span style="display:none;">48</span><span class="id"><?php echo ($i=1+$i++); ?></span></td>
                                <td class="w20"><img class="pic" src="<?php echo ($vo["sltpath"]); ?>"></td>
                                <td class="w20"><?php echo ($vo["title"]); ?></td>
                                <td class="w6"><?php echo ($vo["username"]); ?></td>
                                <td class="w10"><?php echo ($vo["pubtime"]); ?></td>
                                <?php if($vo["is_show"] == 1): ?><td class="w6 imgStatus">是</td>
                                <?php else: ?>
                                <td class="w6 imgStatus">否</td><?php endif; ?>  
                                <td class="w20">
                                    <a style="<?php if($vo['is_show']!=0){echo 'display:none;';}?>" href="<?php echo U('hits',array('id'=>$vo['sid']))?>" class="tablelink publish" data-type="1">点击发布</a> 
                                    <a  style="<?php if($vo['is_show']==0){echo 'display:none;';}?>" href="<?php echo U('unhits',array('id'=>$vo['sid']))?>" class="tablelink unPublish" data-type="1">撤销发布</a> 
                                    <a href="<?php echo U('scenesUpdata',array('id'=>$vo['sid']))?>" class="tablelink">添加</a> 
                                    <a style="cursor:pointer;" linkid="<?php echo $vo['sid']?>" page="<?php echo $_GET['p']?>" class="tablelink click delid"> 删除</a>
                                    <span class="isMore"></span>
                                </td>
                        </thead>
                        <tbody>
                            <?php if(is_array($vo["content"])): foreach($vo["content"] as $key=>$vol): ?><tr>
                                <td><input name="allid[]" type="checkbox" value="<?php echo ($vol["id"]); ?>" /></td>
                                <td><?php echo ($vol["id"]); ?></td>
                                <td><?php echo ($j=1+$j++); ?></td>
                                <td><img class="pic" src="<?php echo ($vol["sltpath"]); ?>"></td>
                                <td><?php echo ($vol["title"]); ?></td>
                                <td><?php echo ($vol["username"]); ?></td>
                                <td><?php echo ($vol["pubtime"]); ?></td>
                                <?php if($vol["is_show"] == 1): ?><td class="w6 imgStatus">是</td>
                                <?php else: ?>
                                <td class="w6 imgStatus">否</td><?php endif; ?>   
                                <td>   
                                    <a style="<?php if($vo['is_show']!=0){echo 'display:none;';}?>" href="<?php echo U('lease',array('id'=>$vol['id'],'isshow'=>$vo['is_show']))?>" class="tablelink publish" data-type="2">点击发布</a>   
                                    <a style="<?php if($vo['is_show']==0){echo 'display:none;';}?>" href="<?php echo U('unlease',array('id'=>$vol['id'],'isshow'=>$vo['is_show']))?>" class="tablelink unPublish" data-type="2">撤销发布</a>
                                    <a style="cursor:pointer;" linkid="<?php echo $vol['id']?>" page="<?php echo $_GET['p']?>" class="tablelink click delid deleteDuo"> 删除</a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                            <tr class="h60">
                                <td colspan="9"><?php echo ($page); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    </form>
   
    <!-- <div class="pagin pages">
        <?php echo $page;?>
    </div> -->
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
        <form action="<?php echo U('deldantu')?>" method="post" id="form1" >
            <input type="hidden" name="delid">  
            <input type="hidden" name="page">   
        </form>    
            <input type="button"  class="sure" value="确定" id="sure" act="" />&nbsp;
            <input type="button"  class="cancel" value="取消" />
        </div> 
    </div>
    <div class="tipDuo">
        <div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/Public/Back/src/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的删除 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <form action="<?php echo U('delchildtu')?>" method="post" id="form3" >
            <input type="hidden" name="delid">  
            <input type="hidden" name="page">   
        </form>    
            <input type="button"  class="sure" value="确定" id="sure" act="" />&nbsp;
            <input type="button"  class="cancel" value="取消" />
        </div> 
    </div>  
    </div>   
    <script type="text/javascript">
    $('.tablelist>tbody>tr:odd').addClass('odd');
    </script>
    <script>
        $('.publish,.unPublish').click(function(e){
            e.preventDefault();
            var self = $(this),
                url = self.attr('href'),
                type = self.attr('data-type');
            $.ajax({
                type: 'POST',
                url: url,
                data:{type:type},
                dataType: 'json',
                success: function(data){
                    if(data.stutas == 1){
                        var flog = self.hasClass('publish');
                        console.log(type);
                        if(flog){
                            console.log(self.parents('tr').find('.imgStatus').length);
                            self.hide().siblings(".unPublish").show();
                            self.parents('td').siblings('.imgStatus').text('是');
                        }else{
                            console.log(self.parents('tr').find('.imgStatus').length);
                            self.hide().siblings(".publish").show();
                            self.parents('td').siblings('.imgStatus').text('否');
                        }

                        if(type == 1){
                           var tr = $.makeArray(self.parents('.tabs').find('tbody tr'));
                               tr.pop();
                               for(var i = 0; i<tr.length; i++){
                                    if(flog){
                                        $(tr[i]).find('.unPublish').show();
                                        $(tr[i]).find('.publish').hide();
                                        $(tr[i]).find('.imgStatus').text('是');
                                    }else{
                                        $(tr[i]).find('.publish').show();
                                        $(tr[i]).find('.unPublish').hide();
                                        $(tr[i]).find('.imgStatus').text('否');
                                    } 
                               }
                        }

                    }else{
                        alert(data.msg);
                    }
                }
            })
        });

        $(document).ready(function(e) {
            $(".delid").click(function(){
                var delid = $(this).attr("linkid"); 
                var page = $(this).attr("page");    
                $("input[name='delid']").val(delid);
                $("input[name='page']").val(page);
                if($(this).hasClass('deleteDuo')){
                    $("#sure").attr("act","danDuo");
                    return;
                }
                $("#sure").attr("act","dan");
            })
            $(".alldelete").click(function(){
                $("#sure").attr("act","duo");
            });
        });
        $(document).on("click",".isMore",function(){
            var _self = $(this);

            _self.hasClass("active") ? _self.removeClass("active").parents(".tabs").find("tbody").toggle() : _self.addClass("active").parents(".tabs").find("tbody").toggle();
        })
    </script>
</body>
</html>