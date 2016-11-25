<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
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
		.yasuo:hover {
			background: url(/BdNovel/Public/images/Home/cart.png) -40px 0;
		}
	</style>
	<title><?php echo ($title); ?></title>
</head>
<body>
<div class="top" id="item4">
	<div class="container clearfix">
		<ul class="clearfix fr">
			<?php if($readername == null): ?><li><a href="<?php echo U('Login/login');?>">登录</a></li>
				<li><a href="<?php echo U('Login/register');?>">注册</a></li>
			<?php else: ?>
				<li><a href=""><?php echo ($readername); ?></a></li>

				<li><a href="<?php echo U('Login/logout');?>">退出</a></li><?php endif; ?>
			<li><a href="<?php echo U('Index/shoppingcart');?>">购物车</a></li>
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
			<form action="" method="post">
				<input type="text" placeholder="小伙伴，你想找什么?"/><input type="submit" value="搜 索"/>
			</form>
			<p>热门搜索：<a href="#">自行车</a> <a href="#">笔记本</a> <a href="#">散热器</a> <a href="#">考研资料</a> <a href="#">摩托车</a> <a href="#">手机</a> <a href="#">轮滑鞋</a> <a href="#">显示器</a></p>
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
<li class="nav-li-category"><a class="nav-category" href="<?php echo U('Index/product');?>"><span>分类</span></a><span class="nav-border"></span></li>
<li class="nav-li-rank"><a class="nav-rank" href="/rank/hotsale"><span>榜单</span></a><span class="nav-border"></span></li>
<li class="nav-li-author"><a class="nav-author" href="/author" target="_blank"><span>独家作品</span></a><span class="nav-border"></span></li>
<li class="nav-li-org"><a class="nav-org" href="/partner/index?fr=indextop"><span>机构专区</span></a><span class="nav-border"></span></li>
<li class="nav-li-app"><a class="nav-app" href="/apps"><span>客户端</span></a><span class="nav-border"></span></li>
</ul>
<ul class="read-nav-right clearfix">
<li class="nav-right-li"><a href="/partner/browse/partnerbookwelcome?fr=head_nav" class="nav-right-mypartner"><span class="nav-right-mypartner-icon"></span>我是机构</a></li>
<li class="nav-right-li"><a href="/partner/browse/myworks?fr=head_nav" class="nav-right-myauthor"><span class="nav-right-myauthor-icon"></span>我是作者</a></li>
<li class="nav-right-li"><a href="/customer/mybook?fr=head_nav" class="nav-right-mybook"><span class="nav-right-mybook-icon"></span>我的书架</a></li>
</ul>
</div>
</div>
<div class="read-hd-ad">

</div>

<div style="margin-top:30px;background-color:#FDFDFB;width:100%">
<div class="container clearfix">
	<div class="row clearfix">
		<div class="col-md-2 list fl">
			<h2 style="font-size:20px;background-color:#34495E;color:white;height:50px;line-height:50px">全部分类<i class="fa fa-sort-down"></i></h2>
			<ul class="one">
				<li>成功励志
					<ul class="two">
						<li>成功励志1</li>
						<li>成功励志2</li>
						<li>成功励志3</li>
						<li>成功励志4</li>
						<li>成功励志5</li>
						<li>成功励志6</li>
						<li>成功励志7</li>
					</ul>
				</li>
				<li>法律
					<ul class="two">
						<li>法律1</li>
						<li>法律2</li>
						<li>法律3</li>
						<li>法律4</li>
						<li>法律5</li>
						<li>法律6</li>
						<li>法律7</li>
						<li>法律8</li>
						<li>法律9</li>
					</ul>
				</li>
				<li>管理
					<ul class="two">
						<li>管理1</li>
						<li>管理2</li>
						<li>管理3</li>
						<li>管理4</li>
						<li>管理5</li>
						<li>管理6</li>
						<li>管理7</li>
						<li>管理8</li>
						<li>管理9</li>
						<li>管理10</li>
						<li>管理11</li>
					</ul>
				</li>
				<li>计算机与网络
					<ul class="two">
						<li>计算机与网络1</li>
						<li>计算机与网络2</li>
						<li>计算机与网络4</li>
						<li>计算机与网络5</li>
						<li>计算机与网络5</li>
						<li>计算机与网络5</li>
					</ul>
				</li>
				<li>教育考试
					<ul class="two">
						<li>教育考试1</li>
						<li>教育考试2</li>
						<li>教育考试5</li>
						<li>教育考试5</li>
						<li>教育考试5</li>
						<li>教育考试5</li>
					</ul>
				</li>
				<li>科技工程
					<ul class="two">
						<li>科技工程1</li>
						<li>科技工程2</li>
						<li>科技工程2</li>
						<li>科技工程2</li>
						<li>科技工程5</li>
					</ul>
				</li>
				<li>生活时尚
					<ul class="two">
						<li>生活时尚1</li>
						<li>生活时尚2</li>
						<li>生活时尚3</li>
						<li>生活时尚3</li>
						<li>生活时尚4</li>
					</ul>
				</li>
				<li>文化历史
					<ul class="two">
						<li>文化历史1</li>
						<li>文化历史2</li>
						<li>文化历史3</li>
						<li>文化历史4</li>
					</ul>
				</li>
				<li>文化历史
					<ul class="two">
						<li>文化历史1</li>
						<li>文化历史2</li>
						<li>文化历史3</li>
						<li>文化历史4</li>
					</ul>
				</li>
				<li>文化历史
					<ul class="two">
						<li>文化历史1</li>
						<li>文化历史2</li>
						<li>文化历史3</li>
						<li>文化历史4</li>
					</ul>
				</li>
				<li>文化历史
					<ul class="two">
						<li>文化历史1</li>
						<li>文化历史2</li>
						<li>文化历史3</li>
						<li>文化历史4</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="book fr" style="height:auto;">
			<p style="font-size:16px;margin:1% 0 0 2%">百度阅读 ＞ 全部图书</p>
			<span style="background-color:#F5F5F2;width:97%;height:40px;margin:2% 0 0 1%;display:block;">
				<ul class="paixu">
					<li><a href="">热度&nbsp;<img src="/BdNovel/Public/images/Home/down-hei.png" width="10px" alt="" /></a></li>
					<li><a href="">最新&nbsp;<img src="/BdNovel/Public/images/Home/down-hui.png" width="10px" alt="" /></a></li>
					<li><a href="">销量&nbsp;<img src="/BdNovel/Public/images/Home/down-hui.png" width="10px" alt="" /></a></li>
					<li><a href="">价格&nbsp;<img src="/BdNovel/Public/images/Home/down-hui.png" width="10px" alt="" /></a></li>
				</ul>
			</span>
			<dl>
				<dt><a href="<?php echo U('Index/detail');?>"><img src="/BdNovel/Public/images/Home/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="/BdNovel/Public/images/Home/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="/BdNovel/Public/images/Home/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="/BdNovel/Public/images/Home/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="/BdNovel/Public/images/Home/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="/BdNovel/Public/images/Home/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="images/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="images/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="images/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="images/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="images/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
			<dl>
				<dt><a href="#"><img src="images/book.jpg" alt=""/></a></dt>
				<dd>
					<p><a href="#">福尔摩斯探案全集</a></p>
					<p>数量：99</p>
					<p><s>价格：￥25</s> ￥7</p>
				</dd>

			</dl>
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
<div>
	<a href="#top" class="ftbottom">
		<span>回到顶部</span>
	</a>
	<a href="" class="pen">
		<span>意见反馈</span>
	</a>
</div>
</body>
</html>