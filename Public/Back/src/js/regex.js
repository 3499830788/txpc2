$(function(){
	var newDate=new Date();
	$("#stime").val(newDate.getFullYear()+"-"+(newDate.getMonth()+1)+"-"+newDate.getDate());
	function title(){
		if($("#title").val()!=""){
			return true;
		}else{
			confirm("请输入标题。");
			return false;
		}
	}
	function replaceText(str){
		var strs=str.replace("t/1","t/7");
			str=strs.replace("p/2","p/1");
		return str;
	}
	function images(){
		var text = $("#ifpic").text();	
		if(text == "已选择图片"){
			return true;
		}else{
			confirm("请选择图片。");
			return false;
		}
	}
	$(".btn").click(function(){
		if(title() && images()){
		var swf=$("#swf").val();
			if(swf.length == 0){
				confirm("请填写视频路径。");
			}else{
				$("#swf").val(replaceText(swf))
				$("#fr").submit();
			}
		}
	});
});