<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/BdNovel/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/BdNovel/Public/css/1.css"/>
	<link rel="stylesheet" type="text/css" href="/BdNovel/Public/css/3.css"/>
	<link rel="stylesheet" type="text/css" href="/BdNovel/Public/css/6.css"/>
	<link rel="stylesheet" type="text/css" href="/BdNovel/Public/css/7.css"/>
	<link rel="stylesheet" type="text/css" href="/BdNovel/Public/css/8.css"/>
	<link rel="stylesheet" href="/BdNovel/Public/css/swiper3.07.min.css"/>
	<link rel="stylesheet" href="/BdNovel/Public/css/public.css"/>
	<link rel="stylesheet" href="/BdNovel/Public/css/index.css"/>
	<script src="/BdNovel/Public/js/jquery-1.11.2.min.js"></script>
	<script src="/BdNovel/Public/js/myfocus-2.0.1.min.js"></script>
	<script src="/BdNovel/Public/js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="/BdNovel/Public/3.css"/>
	<link rel="stylesheet" type="text/css" href="/BdNovel/Public/8.css"/>	
	<script>
		myFocus.set({
			id:'picBOX',//焦点图盒子ID
			pattern:'mF_liquid',//风格应用的名称
			time:3,//切换时间间隔(秒)
			trigger:'click',//触发切换模式:'click'(点击)/'mouseover'(悬停)
			width:750,//设置图片区域宽度(像素)
			height:290,//设置图片区域高度(像素)
			txtHeight:'default'//文字层高度设置(像素),'default'为默认高度，0为隐藏
		});
		$(window).scroll(function(){
			var scrollY = $(document).scrollTop();
			if(scrollY > 10){
				$("#go-top").show();
			}else{
				$("#go-top").hide();
			}
		})
	</script>
	<style>
		.swiper-container {
			width: 1100px;
			height: 300px;
			margin: 0 auto;
		}
		.read-hd-ad {
			width: 1200px;
			background: #58BD5A;
			height: 3px;
			margin-bottom: 5px;
		}
		.paixu li {
			list-style: none;
			float: left;
			width: 60px;
			line-height: 38px;
			margin-left: 25px;
			border-right: 1px solid #ededed;
		}
		.paixu li a{
			font-size: 15px;
		}
		hr{
			border:1px solid #EAEAEA;
			width:1200px;
			margin: 0 auto;
		}
		dl dt img:hover{
			opacity: 0.7;
		}
		.box{width: 423px;height:auto;border: 1px solid #999;background-color:#FFF;color:#000;position: fixed;z-index: 360;}
		.slist{list-style: none;margin: 0;padding-left: 20px;}
		.slist li{padding-top: 2px;font-size: 15px;height:30px;line-height: 30px;}
		.slist li:hover{background: #F0F0F0;cursor: pointer;}
		#press{width:160px;height:85px;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea;cursor: pointer;}
		#press:hover{box-shadow:0px 0px 0px 2px lightgreen inset;}
	</style>
	<title><?php echo ($title); ?></title>
</head>
<body>
<div class="top" id="item4">
	<div class="container clearfix">
		<ul class="clearfix fl">
			<li>城市：<?php echo ($cityName); ?></if></li>
			<li>&nbsp;&nbsp;&nbsp;&nbsp;天气：<?php echo ($temData->Weather->status1); ?>转<?php echo ($temData->Weather->status2); ?></li>
			<li>&nbsp;&nbsp;&nbsp;&nbsp;气温：<?php echo ($temData->Weather->temperature2); ?>℃ ~<?php echo ($temData->Weather->temperature1); ?>℃</li>
		</ul>
		<ul class="clearfix fr">
			<?php if($readername == null): ?><input type="hidden" value="<?php echo ($_SESSION['url'] = $_SERVER['REQUEST_URI']); ?>">
				<li><a href="<?php echo U('Login/login');?>">登录</a></li>
				<li><a href="<?php echo U('Login/register');?>">注册</a></li>
			<?php else: ?>
				<li><a href="<?php echo U('Person/index');?>"><?php echo ($readername); ?></a></li>

				<li><a href="<?php echo U('Login/logout');?>">退出</a></li><?php endif; ?>
			<li><a href="<?php echo U('Shopcar/index');?>">购物车<?php if($carnum != 0): ?>(<?php echo ($carnum); ?>)<?php endif; ?></a></li>
			<li><a href="#">意见反馈</a></li>
			<li><a href="" style="border: none">消息</a></li>
		</ul>
	</div>
</div>

<div class="header">
	<div class="container clearfix">
		<div style="width:1090px;height:92px;margin:auto;">
		<div class="logo fl">
			<a href="#"><img src="/BdNovel/Public/images/Home/baidu.png" alt=""/></a>
		</div>
		<div class="seacher fl">
			<form action="<?php echo U('Detail/index');?>" method="get">
				<input type="text" id="inputString" placeholder="小伙伴，你想找什么?" onkeyup="lookup(this.value)" onblur="fill()" style="border-right:none;"/><input style="border-top:2px solid #70bc64;"type="submit" value="搜 索"/>
				<input type="hidden" id="x" name="id" value="1">
				<div class="box" id="suggest" style="display:none">
					<ul class="slist" id="autolist">
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</form>
			<p>热门搜索：<a href="#">龙应台</a> <a href="#">南有乔木</a> <a href="#">后宫如懿传</a> <a href="#">法医秦明</a> <a href="#">如若有你</a> <a href="#">一生何求</a></p>
		</div>
		<div class="mm fl clearfix">
			<img src="/BdNovel/Public/images/Home/11.jpg" alt="">
		</div>
		</div>
	</div>
</div>

<div class="mian container">
<!-- 	<img src="images/notice.png" alt="" style="width: 1200px;height: auto;"/> -->
	<div class="read-nav-wp">
<div class="read-nav-inner wrap-page-width">
<ul class="read-nav clearfix">
<li class="nav-li-index"><a class="nav-index" href="<?php echo U('Index/index');?>"><span>首页</span></a><span class="nav-border"></span></li>
<li class="nav-li-category"><a class="nav-category" href="<?php echo U('Product/index');?>"><span>分类</span></a><span class="nav-border"></span></li>
<li class="nav-li-rank"><a class="nav-rank" href="<?php echo U('Link/link1');?>"><span>榜单</span></a><span class="nav-border"></span></li>
<li class="nav-li-author"><a class="nav-author" href="#" target="_blank"><span>独家作品</span></a><span class="nav-border"></span></li>
<li class="nav-li-org"><a class="nav-org" href="#"><span>机构专区</span></a><span class="nav-border"></span></li>
<li class="nav-li-app"><a class="nav-app" href="#"><span>客户端</span></a><span class="nav-border"></span></li>
</ul>
<ul class="read-nav-right clearfix">
<li class="nav-right-li"><a href="" class="nav-right-mypartner"><span class="nav-right-mypartner-icon"></span>我是机构</a></li>
<li class="nav-right-li"><a href="" class="nav-right-myauthor"><span class="nav-right-myauthor-icon"></span>我是作者</a></li>
<li class="nav-right-li"><a href="<?php echo U('Person/index');?>" class="nav-right-mybook"><span class="nav-right-mybook-icon"></span>我的书架</a></li>
</ul>
</div>
</div>
<div class="read-hd-ad" style="width:100%">

</div>

<style>
	#tx{
		margin-top: 20px;
		border-radius: 50%;
	}
	th{text-align: center}
</style>
<div style="margin:30px auto;background-color:#FDFDFB;width:100%">
<div class="container clearfix">
	<div class="row clearfix">
		<div class="col-md-2 list fl">
			<h2 style="font-size:20px;height:150px;line-height:50px;background-color:#f2f2f0;border:1px solid #ccc;border-top:none;">	<?php if($inf['pic'] == ''): ?><img id="tx" src="/BdNovel/Upload/reader/touxiang.jpg" alt="" width="80" height="80"><?php else: ?><img id="tx" src="/BdNovel/Upload/reader/<?php echo ($inf[pic]); ?>" alt="" width="80" height="80"><?php endif; ?>
				<p style="font-size:15px"><?php echo ($inf[readername]); ?></p>
			</h2>
			<h2 style="background-color:#f2f2f0;border:1px solid #ccc;border-top:none;">
				<a href="<?php echo U('Person/index');?>" style="font-size:18px;height:60px;line-height:60px">我的图书</a>
			</h2>
			<h2 style="background-color:#34495E;border:1px solid #34495E;border-top:none;">
				<a href="<?php echo U('Person/order');?>"  style="font-size:18px;height:60px;line-height:60px;color:white;">我的订单</a>
			</h2>
			<h2 style="background-color:#f2f2f0;border:1px solid #ccc;border-top:none;">
				<a href="<?php echo U('Person/inf');?>" style="font-size:18px;height:60px;line-height:60px">个人信息</a>
			</h2>
			<h2 style="background-color:#f2f2f0;border:1px solid #ccc;border-top:none;">
				<a href="<?php echo U('Person/passwd');?>" style="font-size:18px;height:60px;line-height:60px">修改密码</a>
			</h2>
			<h2 style="background-color:#f2f2f0;border:1px solid #ccc;border-top:none;">
				<a href="#" style="font-size:18px;height:60px;line-height:60px">我的代金券</a>
			</h2>
		</div>
		<div class="book fr" style="height:auto;">
			<span style="width:97%;height:auto;display:block;" id="tablelist">
					<table class="table table-striped table-hover table-bordered text-center">
						<tr>
							<th>图片</th>
							<th>书名</th>
							<th>价格</th>
						</tr>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><a href="<?php echo U('Detail/index',array('id'=>$vo['id']));?>"><img src="/BdNovel/Upload/book/<?php echo ($vo["bookpic"]); ?>" alt="" width="70px"></a></td>
							<td style="line-height:75px"><a href="<?php echo U('Detail/index',array('id'=>$vo['id']));?>"><?php echo ($vo["bookname"]); ?></a></td>
							<td style="line-height:75px">￥<?php echo ($vo["price"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
			</span>
		</div>
	</div>
</div>
</div>



</div>

<div class="foot">
	<div class="container">

		<div class="zhinan">
			<ul class="clearfix">
				<li class="item-li">购书指南
					<ul>
						<li><a href="#">支付宝担保安全！</a></li>
						<li><a href="#">如何退换货呢？</a></li>
						<li><a href="#">会员有哪些优惠？</a></li>
					</ul>
				</li>
				<li class="item-li">支付方式
					<ul>
						<li><a href="#">支付方式有哪些？</a></li>
						<li><a href="#">购书如何支付</a></li>
						<li><a href="#">支付步骤</a></li>
					</ul>
				</li>
				<li class="item-li">平台入驻
					<ul>
						<li><a href="#">机构专区</a></li>
						<li><a href="#">个人作者专区</a></li>
					</ul>
				</li>
				<li class="item-li" style="margin: 0">帮助信息
					<ul>
						<li><a href="#">购书说明</a></li>
						<li><a href="#">隐私安全</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="line"></div>

		<div class="bottom">
			<p><a href="#">如有问题欢迎联系投诉反馈</a></p>
			<p>©2016 Baidu 使用百度前必读   |  平台协议</p>
		</div>
	</div>
</div>
<div id="go-top" style="display:none">
	<a href="#top" class="ftbottom">
		<span>回到顶部</span>
	</a>
	<a href="" class="pen">
		<span>意见反馈</span>
	</a>
</div>
<script>
	function lookup(inputString){
		if(inputString.length == 0){
			$('#suggest').hide();
		}else{
			$.post("<?php echo U('Index/search');?>",{queryString:inputString},function(data){
				if(data.length>0){
					$('#suggest').show();
					$('#autolist').html(data);
					// console.log(data);
				}
			});

		}
	}

	function fill(thisValue,thisid){
		console.log(thisid);
		$('#x').attr('value',thisid);
		$('#inputString').val(thisValue);
		setTimeout("$('#suggest').hide()",200);
	}
</script>
</body>
</html>