<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo "联系我们-杭州影视基地--橡皮擦淘宝实景基地";?></title>
<meta name="description" content="杭州皮擦摄影基地的预约热线为15394243344，基地地址为浙江省杭州市余杭区绿汀路1号财通大厦9楼橡皮擦摄影基地（距淘宝城5公里）。杭州橡皮擦淘宝实景基地，杭州专业影视器材租赁公司。" />
<meta name="keywords" content="橡皮擦摄影基地,杭州摄影场地,橡皮擦淘宝实景摄影基地,杭州淘宝拍摄场地出租,杭州淘宝摄影基地,杭州影视设备租赁"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/public.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/contact.css">
<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=sGRoGUEB0m7HX67UQbUdlDZEzISlrdvU"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
<script src="/Public/Home/src/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Home/src/bootstrap/bootstrap.min.js"></script>
<title>橡皮擦-联系我们</title>
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
        window.location.href = 'http://www.xpcjd.com/App/contact.html';
    } else {
    }
}
browserRedirect(); 	
</script>
</head>
<body class="bgf">
<!--header start-->
<header>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid tg clear">
			<div class="navbar-header">
			  <a class="logo navbar-brand" href="index.html"><img src="/Public/Home/src/img/logo.png" alt="橡皮擦logo"/></a>
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
			<div class="tgl collapse navbar-collapse" id="bs-example-navbar-collapse-1" role="navigation">	
				<ul class="nav navbar-nav navbar-right">
					<li><a  href="http://www.xpcjd.com">
						<span></span>首页
					</a></li>
					<li><a href="http://www.xpcjd.com/scenes.html">
						<span></span>场景介绍
					</a></li>
					<li><a href="http://www.xpcjd.com/wcase.html">
						<span></span>服务案例
					</a></li>
					<li><a href="http://www.xpcjd.com/service.html">
						<span></span>基地服务
					</a></li>
					<li><a class="active" href="http://www.xpcjd.com/contact.html">
						<span></span>联系我们
					</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!--header end-->
<div class="bar">
	<img src="/Public/Home/src/img/ba2.jpg" alt>
</div>
<div class="container-fluid pt70">
	<div class="cCon">
		<div class="row mb40">
			<div class="col-xs-1"></div>
			<div class="col-xs-7 dz">
				<p class="title mb20">联系方式</p>
				<p class="mb20"><span>预约热线：</span><span class="tel">15394243344</span></p>
				<p class="mb20"><span>工作时间：</span>09：00-23：00（ 周末不休）</p>
				<p class="mb20"><span>基地地址：</span>浙江省杭州市余杭区绿汀路1号财通大厦9楼橡皮擦摄影基地（距淘宝城5公里）</p>
			</div>
			<div class="col-xs-4 cB">
				<p class="wx"><span>公众微信：</span>ixiangpica</p>
				<img class="ewmImg" src="/Public/Home/src/img/ewm.png"/>
			</div>
		</div>
		<div class="dt" id="allmap"></div>
	</div>
</div>
<!--新闻中心 end-->
<footer>
	<div class="bgf8"></div>
    <div class="czi"></div>
    <div class="links">
    	<div class="container-fluid tg">
    		<div class="tgl dline">
    			<ul>
		    		<li>友情链接：</li>
		    		<li><a href="javascript:void(0);">淘宝网</a></li>
		    		<li><a href="javascript:void(0);">京东网</a></li>
		    		<li><a href="javascript:void(0);">百度网</a></li>
		    	</ul>
    		</div>
    	</div>
    </div>
    <div class="info">浙ICP备14008847号-1</div>
</footer>
<script src="/Public/Home/src/js/contact.js"></script>
</body>
</html>