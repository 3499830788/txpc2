<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo "基地服务-杭州影视基地--橡皮擦淘宝实景基地";?></title>
<meta name="description" content="展示杭州摄影摄像场地、杭州摄影设备租赁、美食小吃、会员等多种服务，满足杭州企业宣传片拍摄、微电影制作、动漫制作等多种摄影需求，可一站式完成拍摄。预约热线15394243344" />
<meta name="keywords" content="杭州实景基地,杭州影视基地,橡皮擦实景基地,影视器材租赁,杭州实景摄影基地,杭州淘宝拍摄场地出租,杭州淘宝摄影基地,杭州影视设备租赁"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/public.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/scenes.css">
<script src="/Public/Home/src/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Home/src/bootstrap/bootstrap.min.js"></script>
<title>橡皮擦-基地服务</title>
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
        window.location.href = 'http://www.xpcjd.com/service.html';
    } else {
    }
}
browserRedirect(); 	
</script>
</head>
<body>
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
					<li><a  href="http://www.xpcjd.com/scenes.html">
						<span></span>场景介绍
					</a></li>
					<li><a href="http://www.xpcjd.com/wcase.html">
						<span></span>服务案例
					</a></li>
					<li><a class="active" href="http://www.xpcjd.com/service.html">
						<span></span>基地服务
					</a></li>
					<li><a href="http://www.xpcjd.com/contact.html">
						<span></span>联系我们
					</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!--header end-->
<div class="bar">
	<img src="/Public/Home/src/img/ba.jpg" alt>
</div>
<!--基地服务 start-->
<section class="ptb70 bgf">
	<div class="container-fluid JD">
		<div class="row">
			<ul class="scale clear TP">
			<?php if(is_array($service)): foreach($service as $key=>$vo): ?><li class="col-lg-3 col-md-3 col-sm-3 col-xs-4 " data-src="<?php echo ($vo["sltpath"]); ?>">
		            <a href="<?php echo U('Home/Index/info',array('id'=>$vo['id']));?>">
		                <img src="<?php echo ($vo["ytgpath"]); ?>"/>
		                <p class="pt10 jd-title"><?php echo ($vo["title"]); ?></p>
		                <p class="fs12 t-ellipsis h40 padb10"><?php echo ($vo["info"]); ?></p>
		            </a>
		        </li><?php endforeach; endif; ?>   
		    </ul>
		</div>
	</div>
</section>
<!--基地服务 end-->
<!--新闻中心 end-->
<footer style="background-color:#f8f8f8;">
	<div class="container-fluid tg">
    	<div class="row clear fTop">
        	<div class="col-lg-5 col-md-5 col-sm-5">
        		<p class="title">地址</p>
        		<p class="fs12 dz"><i class="dw"></i>浙江省杭州市余杭区绿汀路1号财通大厦9楼橡皮擦摄影基地（距淘宝城5公里）</p>
        	</div>
        	<div class="col-lg-4 col-md-4 col-sm-4">
        		<p class="title">官方服务热线</p>
        		<p class="tel">15394243344</p>
        		<p class="workTime">周一到周日9:00-23:00</p>
        	</div>
        	<div class="col-lg-3 col-md-3 col-sm-3 tcenter">
        		<p class="title">微信号：ixiangpica</p>
        		<p class="fewm"><img src="/Public/Home/src/img/ewm.png"></p>
        		<p>（微信扫一扫）</p>
        	</div>
        </div>
    </div>
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
<script src="/Public/Home/src/js/jquery.dotdotdot.min.js"></script>
<script>
	$(".t-ellipsis").dotdotdot();
</script>
</body>
</html>