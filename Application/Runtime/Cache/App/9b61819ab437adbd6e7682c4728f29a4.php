<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="拍摄 租 租基地 摄影基地 摄影基地租用" />
<meta name="keywords" content=""/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/Public/App/src/wap/css/public.css">
<link rel="stylesheet" type="text/css" href="/Public/App/src/css/lightGallery.css">
<script src="/Public/App/src/js/flexible.js"></script>
<script src="/Public/App/src/js/jquery-1.9.1.min.js"></script>
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
    } else {
        window.location.href = 'http://www.xpcjd.com/scenes.html';
    }
}
browserRedirect(); 	
</script>
</head>
<body>
<!--header start-->
<header>
	<nav>
		<ul class="clear">
			<li><a href="http://www.xpcjd.com">
				<span><img class="h1" src="/Public/App/src/img/i1.png" alt="首页" /></span>
				<p>首页</p>
			</a></li>
			<li class="active"><a href="http://www.xpcjd.com/scenes.html">
				<span><img class="h2"src="/Public/App/src/img/i2.png" alt="场景" /></span>
				<p>场景</p>
			</a></li>
			<li><a href="http://www.xpcjd.com/wcase.html">
				<span><img class="h3" src="/Public/App/src/img/i3.png" alt="案例" /></span>
				<p>案例</p>
			</a></li>
			<li><a href="http://www.xpcjd.com/service.html">
				<span><img class="h4" src="/Public/App/src/img/i4.png" alt="服务" /></span>
				<p>服务</p>
			</a></li>
			<li><a href="http://www.xpcjd.com/contact.html">
				<span><img class="h5" src="/Public/App/src/img/i5.png" alt="我们" /></span>
				<p>我们</p>
			</a></li>
		</ul>
	</nav>
</header>
<div class="bar">
	<img src="/Public/App/src/img/ba.jpg" alt>
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
<footer class="padlr5">
	<div class="czi martb10"></div>
	<div>
    	<img src="/Public/App/src/img/ewm.png" alt="橡皮擦二维码">
    	<p>扫描关注公众号</p>
    </div>
</footer>
<script src="/Public/App/src/js/lightGallery.min.js"></script>
<script src="/Public/App/src/js/lg-thumbnail.min.js"></script>
<script src="/Public/App/src/js/public.js"></script>
</body>
</html>