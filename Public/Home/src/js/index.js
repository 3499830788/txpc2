(function(){
  var _index = {
    init: function(){

          var origins = [{
            "qiniu_url": $("#mp4-url").val(),
            "width": "1920",
            "height": "1080",
            "resolution": "1920x1080",
          }],isTranscoding = 0;

          VideoJS.setupAllWhenReady({
            controlsBelow: false, // Display control bar below video instead of in front of
            controlsHiding: true, // Hide controls when mouse is not over the video
            defaultVolume: 0.85, // Will be overridden by user's last volume if available
            flashVersion: 9, // Required flash version for fallback
            linksHiding: true, // Hide download links when video is supported
            origin:origins,
            isTranscoding:isTranscoding
          });  

          $("#xpc_video").attr("src", $("#mp4-url").val())
          $("#xpc_video").children().attr("src", $("#mp4-url").val());

          $(".t-ellipsis").dotdotdot();

          $(window).resize(function(){
            var winW = $("#container").width();

            $(".video-js-box,#xpc_video").width(winW);
            $(".video-js-box,#xpc_video").height(parseInt(winW / 2));
          });

          $(document).on("click",".v-tab",function(){
              var _mp4 = $(this).attr("data-mp4"),
                  obj = $("#video-container");
                  obj.html("");

                  obj.html(_index.creatHTML(_mp4));

                  origins = [{
                    "qiniu_url": _mp4,
                    "width": "1920",
                    "height": "1080",
                    "resolution": "1920x1080",
                  }],isTranscoding = 0;

                  VideoJS.setupAllWhenReady({
                    controlsBelow: false, // 显示控制栏下面的视频，而不是在前面
                    controlsHiding: true, // 当鼠标未超出视频时隐藏控件
                    defaultVolume: 0.85, // 如果可用，用户的最后一个卷将被覆盖
                    flashVersion: 9, // 所需Flash版本为备用
                    linksHiding: true, // 视频支持时隐藏下载链接
                    origin:origins,
                    autoplay:true,
                    isTranscoding:isTranscoding
                  }); 
          });
    },
    creatHTML: function(src){
      var html = '<video id="xpc_video" class="video-js vjs-paused "preload="auto"poster="" webkit-playsinline="" src="'+src+'" style="visibility: visible;width:100%; height: 100%;">';
          html+= '<source src="'+src+'" type="video/mp4">';
          html+= '</video>';

          return html;
    }
  }
  _index.init();
})();