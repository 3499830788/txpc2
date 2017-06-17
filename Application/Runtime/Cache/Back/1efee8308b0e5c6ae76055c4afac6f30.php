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
		$('input[type=checkbox]').attr('checked', $(this).attr('checked'));
	});


});
</script>


</head>


<body>
	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">场景类型</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <div class="tools">
        	<ul class="toolbar">
                <li><a href="<?php echo U('scenesTypeAdd')?>"><span><img src="/Public/Back/src/images/t01.png" /></span>添加</a></li>
                <li class="alldelete click"><span><img src="/Public/Back/src/images/t03.png" /></span>批量删除</li>
            </ul> 
            <ul class="toolbar1">
                <li><span><img src="/Public/Back/src/images/t05.png" /></span>设置</li>
            </ul>
        </div>
        <form action="<?php echo U('alldelete')?>" method="post" id="form2" >
        	<input type="hidden" name="p" value="<?php echo $_GET['p']?>" />
            <table class="tablelist">
            	<thead>
                	<tr>
                        <th><input name="allid" type="checkbox"  /></th>
                        <th>编号<i class="sort"><img src="/Public/Back/src/images/px.gif" /></i></th>
                        <th>类型</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($all)): foreach($all as $key=>$vo): ?><tr>
                        <td><input name="ids[]" type="checkbox" value="<?php echo ($vo["id"]); ?>" /></td>
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["title"]); ?></td>
                        <td><?php echo ($vo["addtime"]); ?></td>
                        <td>
                        <a href="<?php echo U('scenesTypeUpdata',array('id'=>$vo['id'],'page'=>$_GET['p']))?>" class="tablelink">修改</a>     
                        &nbsp;&nbsp;&nbsp;
                        <a style="cursor:pointer;" linkid="<?php echo $vo['id']?>" page="<?php echo $_GET['p']?>" class="tablelink click delid"> 删除</a>
                        </td>
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