<?php if (!defined('THINK_PATH')) exit();?><meta charset="UTF-8">
<meta name="description" content="拍摄 租 租基地 摄影基地 摄影基地租用" />
<meta name="keywords" content=""/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/public.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/src/css/info.css">
<script src="/Public/Home/src/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Home/src/bootstrap/bootstrap.min.js"></script>
<title>橡皮檫-详情</title>
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
        window.location.href = 'http://www.xpcjd.com/info.html';
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
					<li><a href="<?php echo U('index');?>">
						<span></span>首页
					</a></li>
					<li><a href="<?php echo U('scenes');?>">
						<span></span>场景介绍
					</a></li>
					<li><a href="<?php echo U('wcase');?>">
						<span></span>服务案例
					</a></li>
					<li><a class="active" href="<?php echo U('service');?>">
						<span></span>基地服务
					</a></li>
					<li><a href="<?php echo U('contact');?>">
						<span></span>联系我们
					</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!--header end-->
<div class="header_hr"></div>
<div class="vContent">
	<div class="vInfo">
		<p class="vBn">当前位置：<a href="">动态</a>&nbsp;>&nbsp;<?php echo ($info["title"]); ?></p>
		<p class="vTitle"><?php echo ($info["title"]); ?></p>
		<div class="clear br">
			<div class="fl vTimer"><?php echo ($info["pubtime"]); ?>&nbsp;&nbsp;</div>
			<div class="jiathis_style fl" style="margin:10px 0 0 10px;">
				<a class="jiathis_button_qzone"></a>
				<a class="jiathis_button_tsina"></a>
				<a class="jiathis_button_weixin"></a>
				<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
				<a class="jiathis_counter_style"></a>
			</div>
			<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
		</div>
		<div class="detial-bom-text" style="line-height:1.75em; padding-top:40px;"><?php echo ($info["content"]); ?></div>
	</div>
</div>
<footer>
	<div class="bgf8"></div>
    <div class="czi"></div>
    <div class="links">
    	<div class="container-fluid tg">
    		<div class="tgl dline">
    			<ul>
		    		<li>友情链接：</li>
		    		<li><a href="http://www.taobao.com">淘宝网</a></li>
		    		<li><a href="http://www.jingdong.com">京东网</a></li>
		    		<li><a href="http://www.baidu.com">百度网</a></li>
		    	</ul>
    		</div>
    	</div>
    </div>
    <div class="info">浙ICP备14008847号-1</div>
</footer>
</body>
</html>