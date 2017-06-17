<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo "场景介绍-杭州影视基地--橡皮擦淘宝实景基地";?></title>
<meta name="description" content="包括了橡皮擦淘宝实景基地的实景客厅、实景卧室、实景书房、实景厨房等等多种摄影场景，为杭州商业摄影提供专业的杭州摄影场地出租以及影视器材租赁，预约热线15394243344" />
<meta name="keywords" content="杭州实景基地,杭州实景摄影基地,橡皮擦摄影基地,杭州橡皮擦淘宝实景摄影基地,杭州摄影场地出租,杭州影视设备租赁,杭州影视器材租赁公司,杭州商业摄影"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/public.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/lightGallery.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/scenes.css">
<script src="/Public/Home/src/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Home/src/bootstrap/bootstrap.min.js"></script>
<title>橡皮擦-场景介绍</title>
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
        window.location.href = 'http://www.xpcjd.com/scenes.html';
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
					<li><a class="active" href="http://www.xpcjd.com/scenes.html">
						<span></span>场景介绍
					</a></li>
					<li><a href="http://www.xpcjd.com/wcase.html">
						<span></span>服务案例
					</a></li>
					<li><a href="http://www.xpcjd.com/service.html">
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
<section class="mt70 pb70">
	<div class="container-fluid">
		<div class="row">
				<ul class="scale clear">
				<?php if(is_array($dan)): foreach($dan as $key=>$vol): ?><li class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
			        	<ul id="TP" class="TP">
			        		<li class="show" data-src="<?php echo ($vol["sltpath"]); ?>">
					            <a title="<?php echo ($vol["title"]); ?>">
					                <div>
					                	<img src="<?php echo ($vol["sltpath"]); ?>" alt="<?php echo ($vol["title"]); ?>" title="<?php echo ($vol["title"]); ?>" />
					                	<p class="pt10 cj-p"><i class="icon1"></i><span><?php echo ($vol["title"]); ?></span></p>
					                </div>
   			                    </a>
					        </li>
			        		<?php if(is_array($vol["content"])): foreach($vol["content"] as $key=>$v): ?><li data-src="<?php echo ($v["ytgpath"]); ?>">
					            <a title="<?php echo ($vol["title"]); ?>">
					                <div>
					                	<img src="<?php echo ($v["ytgpath"]); ?>" alt="<?php echo ($vol["title"]); ?>" title="<?php echo ($vol["title"]); ?>" />
					                	<p class="pt10 cj-p"><i class="icon1"></i><span><?php echo ($vol["title"]); ?></span></p>
					                </div>
   			                    </a>
					        </li><?php endforeach; endif; ?>
			        	</ul>
			        </li><?php endforeach; endif; ?>
			    </ul>
			</div>
	</div>
</section>
<!--新闻中心 end-->
<footer>
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
<script src="/Public/Home/src/js/lightGallery.min.js"></script>
<script src="/Public/Home/src/js/lg-thumbnail.min.js"></script>
<script src="/Public/Home/src/js/public.js"></script>
</body>
</html>