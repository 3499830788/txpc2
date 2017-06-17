(function(){
	  $(".TP").lightGallery({ // 图片相册插件
          download: false
	  });

	  var _video = function(){}

	  var V = new _video();
	  _video.prototype.creatHTML= function(src){
	  	var html = '<video width="100%" height="210" src="'+src+'" controls="controls" autoplay="autoplay">';
	  	html+= '<source src="'+src+'" type="video/mp4">';
	  	html+= '<video>';

	  	return html;
	  }

	  $(document).on('click','.v-list .swiper-slide',function(){
	  		var src = $(this).attr('data-mp4'),
	  			obj = $('#i-video-container');

	  			obj.html("");
	  			obj.html(V.creatHTML(src));
	  });
})();