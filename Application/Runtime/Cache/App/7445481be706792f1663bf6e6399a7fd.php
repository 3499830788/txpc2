<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="拍摄 租 租基地 摄影基地 摄影基地租用" />
<meta name="keywords" content=""/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="../src/wap/css/public.css">
<script src="../src/js/flexible.js"></script>
<script src="../src/js/jquery-1.9.1.min.js"></script>
<script>
function browserRedirect() {
    var sUserAgent = navigator.userAgent.toLowerCase();
    var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
    var bIsMidp = sUserAgent.match(/midp/i) == "midp";
    var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
    var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
    var bIsAndroid = sUserAgent.match(/android/i) == "android";
    var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
    var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
    if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
    } else {
        window.location.href = '../html/index.html';
    }
}
browserRedirect(); 	
</script>
<script src="../src/swiper/swiper-3.4.1.jquery.min.js"></script>
<title>橡皮擦-首页</title>
</head>
<body>
<!--header start-->
<header>
	<nav>
		<ul class="clear">
			<li class="active"><a href="index.html">
				<span><img class="h1" src="../src/img/i1.png" alt="首页" /></span>
				<p>首页</p>
			</a></li>
			<li><a href="scenes.html">
				<span><img class="h2"src="../src/img/i2.png" alt="场景" /></span>
				<p>场景</p>
			</a></li>
			<li><a href="case.html">
				<span><img class="h3" src="../src/img/i3.png" alt="案例" /></span>
				<p>案例</p>
			</a></li>
			<li><a href="service.html">
				<span><img class="h4" src="../src/img/i4.png" alt="服务" /></span>
				<p>服务</p>
			</a></li>
			<li><a href="contact.html">
				<span><img class="h5" src="../src/img/i5.png" alt="我们" /></span>
				<p>我们</p>
			</a></li>
		</ul>
	</nav>
</header>
<!--header end-->
<div id="video-container">
	<p class="v-title t-overflow">新电影</p>
	<p class="v-time">2016-12-10</p>
	<!--视频-->
	<video width="100%" height="210" src="http://video.xinpianchang.com/5858ef1854547.mp4" controls="controls">
			<source src="" type="video/mp4">
	</video>
</div>
<footer class="padlr5">
	<div class="czi martb10"></div>
	<div>
    	<img src="../src/img/ewm.png" alt="橡皮擦二维码">
    	<p>扫描关注公众号</p>
    </div>
</footer>
</body>
</html>