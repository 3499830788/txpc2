$(document).ready(function() {
  var tabImg = {
    init: function(){
        var _G = $(".TP"); 

        _G.lightGallery({ // 调用相册
          download: false
        });
    }
  }

  tabImg.init();

});
//点击视频弹出弹窗
;(function(){
	var video=$(".vPlay");
	video.click(function(){
		var self=$(this);
		var html=self.attr('data-user')+" 发布于 "+self.attr('data-time')+"&nbsp;&nbsp;&nbsp;时长："+self.attr('data-duration')+" &nbsp;&nbsp;</span>"
		$('#video-url').attr('src',self.attr('data-url'));
		$('#gpc-info').html(html);
		$('.gpc-t-box').layerModel({
	  		blurClose : true,
	  		bgColor:"#000000",
	  		title:self.attr("data-title")
	  	});
	});
})();