<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="拍摄 租 租基地 摄影基地 摄影基地租用" />
<meta name="keywords" content=""/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/Public/App/src/swiper/swiper-3.4.1.min.css">
<link rel="stylesheet" type="text/css" href="/Public/App/src/wap/css/public.css">
<link rel="stylesheet" type="text/css" href="/Public/App/src/css/lightGallery.css">
<script src="/Public/App/src/js/flexible.js"></script>
<script src="/Public/App/src/js/jquery-1.9.1.min.js"></script>
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
        window.location.href = 'http://www.xpcjd.com/index.html';
    }
}
browserRedirect(); 	
</script>
<script src="/Public/App/src/swiper/swiper-3.4.1.jquery.min.js"></script>
<title>橡皮擦-首页</title>
</head>
<body>
<!--header start-->
<header>
	<nav>
		<ul class="clear">
			<li class="active"><a href="http://www.xpcjd.com">
				<span><img class="h1" src="/Public/App/src/img/i1.png" alt="首页" /></span>
				<p>首页</p>
			</a></li>
			<li><a href="http://www.xpcjd.com/scenes.html">
				<span><img class="h2" src="/Public/App/src/img/i2.png" alt="场景" /></span>
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
<!--header end-->
<!--banner start-->
<div class="banner">
	<img style="width:100%" src="/Public/App/src/img/081826472410.jpg" alt="橡皮檫五星级摄影基地">
</div>
<!--banner end-->
<!--介绍视频 start-->
<section  class="bgf">
	<!--视频-->
	<div id="i-video-container">
		<video width="100%" height="210" src="<?php echo ($basevideo["mp4_mobile"]); ?>" controls="controls">
				<source src="" type="video/mp4">
		</video>
	</div>
	<div class="container-fluid">
		<div class="row v-list">
				<div class="swiper-container">
			  		<div class="swiper-wrapper">
			  			<?php if(is_array($base_heng)): foreach($base_heng as $key=>$vo): ?><div class="swiper-slide" data-mp4="<?php echo ($vo["mp4_mobile"]); ?>"><img src="http://www.xpcjd.com/<?php echo ($vo["sltpath"]); ?>" /></div><?php endforeach; endif; ?>
					</div>
				</div>
				<script> 
					(function() {
						var mySwiper = new Swiper('.swiper-container',{
							loop:true,
							autoplay : 3000,
							slidesPerView :"auto",
						});

					})();
				</script>	
			</div>
		</div>
	</div>
</section>
<!--介绍视频 end-->
<div class="step1"><img src="/Public/App/src/img/291410008494.jpg"></div>
<!--场景介绍 strat-->
<section>
	<div class="CJ">
		<div class="container-fluid">
			<div class="iTile">
				<p>场景<a class="more" href="<?php echo U('App/Index/scenes');?>">更多场景</a></p>
				<div></div>
			</div>
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
	</div>
</section>
<!--场景介绍 end-->
<!--服务案例 start-->
<section class="bgf ptb70">
	<div class="container-fluid">
		<div class="fs28 fw tg iTile">
			<p class="bgf">服务案例</p>
			<div></div>
		</div>
		<div class="mr_frUl row padlr5">
			<div class="swiper-container">
		  		<div class="swiper-wrapper">
				    <?php if(is_array($video)): foreach($video as $key=>$vi): ?><div class="swiper-slide vPlay">
				    	<a href="<?php echo U('video2',array('id'=>$vi['id']));?>"> 
	                        <div class="viimg">
		                        <div class="vi_img"><img src="<?php echo ($vi["sltpath"]); ?>"/></div>
		                        <div class="action"><?php echo ($vi["title"]); ?></div>
	                        </div>
				    	</a>
				    </div><?php endforeach; endif; ?>
				</div>
			</div>
			<script> 
				(function() {
					var mySwiper = new Swiper('.mr_frUl .swiper-container',{
						loop:true,
						autoplay : 3000,
						slidesPerView :"auto",
					});

				})();
			</script>	
		</div>
    </div>
</section>
<!--服务案例 end-->
<!--基地服务 start-->
<section class="mt70 pb70">
	<div class="container-fluid JD">
		<div class="iTile">
			<p>基地服务<a class="more" href="<?php echo U('App/index/service');?>">更多服务</a></p>
			<div></div>
		</div>
		<div class="row">
			<ul class="scale clear padlr5">
		        <?php if(is_array($service)): foreach($service as $key=>$vo): ?><li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
		            <a href="<?php echo U('App/Index/info',array('id'=>$vo['id']));?>">
		                <img src="<?php echo ($vo["sltpath"]); ?>"/>
		                <p class="pt10 jd-title t-overflow"><?php echo ($vo["title"]); ?></p>
		                <p class="fs12 t-ellipsis h40 padb10"><?php echo ($vo["info"]); ?></p>
		            </a>
		        </li><?php endforeach; endif; ?>
		        
		    </ul>
		</div>
	</div>
</section>
<!--基地服务 end-->
<div class="step2 padt5"><img src="/Public/App/src/img/261102201091.jpg"></div>
<!--新闻中心 start-->
<section class="mt70 pb70">
	<div class="container-fluid WZ">
		<div class="fs28 fw tg iTile">
			<p>新闻中心<a class="more" href="<?php echo U('App/index/newsList');?>">更多新闻</a></p>
			<div></div>
		</div>
		<div class="row">
		<?php if(is_array($news1)): foreach($news1 as $key=>$vo): ?><div class="mt20">
				<div class="wzMian">
					<div class="row">
						<div class="wzLeft padlr5">
							<a href="<?php echo U('App/index/info',array('ids'=>$vo['id']));?>">
								<p class="wzTitle t-ellipsis"><?php echo (mb_substr(strip_tags($vo["title"]),0,25,'utf-8')); ?></p>
								<img src="<?php echo ($vo["sltpath"]); ?>" alt="">
							</a>
						</div>
					</div>
				</div>
			</div><?php endforeach; endif; ?>	
		</div>
	</div>
</section>
<!--新闻中心 end-->
<footer class="padlr5">
	<div class="czi martb10"></div>
	<div>
    	<img src="/Public/App/src/img/ewm.png" alt="橡皮擦二维码">
    	<p>扫描关注公众号</p>
    </div>
</footer>
<script src="/Public/App/src/js/jquery.dotdotdot.min.js"></script>
<script src="/Public/App/src/js/lightGallery.min.js"></script>
<script src="/Public/App/src/js/lg-thumbnail.min.js"></script>
<script src="/Public/App/src/wap/js/index.js"></script>
</body>
</html>