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
		.yasuo{
			float:right;display:block;width:24px;height:21px;background:url(/BdNovel/Public/images/Home/cart.png) 0 0;margin-right:25px;
		}
		.yasuo:hover{
			background: url(/BdNovel/Public/images/Home/cart.png) -42px 0;
		}
		dl dt img:hover{
			opacity: 0.7;
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

<div id="bd" class="bd">

<div class="bd-wrap">
<div class="body">

<div class="aside">

<div class="cms-block">
<div class="bd">
<a href="#" target="_blank" class="mb10">
<img src="/BdNovel/Public/images/Home/1.jpeg" alt="" title="">
</a>
<a href="http://#" target="_blank" class="mb10">
<img src="/BdNovel/Public/images/Home/2.jpg" alt="" title="">
</a>
<a href="#" target="_blank" class="mb10">
<img src="/BdNovel/Public/images/Home/3.jpg" alt="" title="">
</a>
<a href="#" target="_blank" class="mb10">
<img src="/BdNovel/Public/images/Home/4.jpg" alt="" title="">
</a>
</div>
</div>
</div>


<div class="main">

<div class="mod doc-info">

<div class="bd" style="position: relative;">
<div class="doc-info-bd clearfix"  style="position: relative;z-index:1;">
<div class="cover-block">
<div class="img-block mb20">
<a class="doc-info-imglink go-read-page" href="//yuedu.baidu.com/ebook/cc1d000c974bcf84b9d528ea81c758f5f61f2934?pn=1">
<img class="doc-info-img" src="/BdNovel/Upload/book/<?php echo ($data["bookpic"]); ?>" width="200px" height="270px" alt="" />
</a>
</div>
<div class="doc-op-wrap">
<div class="doc-op-hack">
<ul class="doc-op-content clearfix">
<li class="doc-op-item">
<a href="###" id="doc-save" class="" title="收藏" alog-action="favo.book"><b class="ic icon-favo"></b></a>
<span class="doc-operate-tip doc-operate-tip-save"></span>
</li>
<span class="split"></span>
<li class="doc-op-item">
<a href="###" id="doc-dl-phone" class="js-publish-to-phone" title="下载到手机"><b class="ic icon-dl-phone"></b></a>
</li>
<span class="split"></span>
<li class="doc-op-item">
<a href="###" id="doc-share"><b class="ic icon-share"></b></a>
</li>
</ul>
</div>
</div>
</div>

<div class="content-block">
<h1 class="book-title" title="<?php echo ($data["bookname"]); ?>">
<?php echo ($data["bookname"]); ?>
&nbsp;&nbsp;<span class="ebook-tips">电子书</span>
</h1>
<span class="book-s-words"></span>
<div class="doc-info-score">
<?php if($data["count"] != 0): ?><a href="#comment" class="doc-info-score-num"><span class="c_doc-info-score-num"><?php echo ($data["count"]); ?></span>人评论</a>
    <span class="operator mv5">|</span><?php endif; ?>
<span class="doc-info-read-count"><?php echo ($data["collect"]); ?>人在读</span>
</div>
<ul class="doc-info-org">
<li class="doc-info-field doc-info-author">
<span class="doc-info-label">作<span style="margin-left:12px">者：</span></span>
<a href="" class="doc-info-field-val doc-info-author-link"><?php echo ($data["author"]); ?></a>
</li>
<li class="doc-info-field ">
<span class="doc-info-label">出版社：</span>
<a class="doc-info-field-val" href=""><?php echo ($data["press"]); ?></a>
</li>
</ul>
<div class="doc-info-price">
<div class="doc-info-btn-wp doc-info-normal">
<div class="price-info">
<span class="confirm-price"><span class="prefix">价格：</span><span class="numeric">￥<?php echo ($data["price"]); ?></span></span>

</div>

<div class="btn-area">
<a href="###" class="yui-btn yui-btn-large yui-btn-large pay-btns mr10 " alog-action="buy.book">购买全本</a>
<a href="//yuedu.baidu.com/ebook/cc1d000c974bcf84b9d528ea81c758f5f61f2934?pn=1&click_type=10010002" class="go-read-page yui-btn yui-btn-large log-xsend" data-logxsend='[2, 200208, {"is_self_publishing": 0, "na_all_free":0}]' target="_blank" alog-action="try.read">开始阅读</a>
<a href="###" id="doc-add-cart" class="add-to-cart " data-doc_id="cc1d000c974bcf84b9d528ea81c758f5f61f2934">
<span class="ic ic-cart"></span>
<span class="txt">加入购物车</span>
<span class="doc-operate-tip doc-operate-tip-cart"></span>
</a>
</div>

</div>


</div>
</div>
</div>
</div>
</div>

<div class="roll-text-wrap">
<span class="arr-icon"></span>
<span class="arr-icon2"></span>
<div class="roll-text-list">
<a class="roll-item" href="//yuedu.baidu.com/promotion/activity/brand#block1" target="_blank">
<span class="roll-icon right"></span>
<div class="roll-area">
<ul class="roll-text-area prev">
<li class="roll-title">正版全本无错字</li>
<li class="roll-txt">
<?php echo ($data["wordnum"]); ?>个字，<?php echo ($data["chapternum"]); ?>个章节</li>
</ul>
<ul class="roll-text-area next">
<li class="roll-title" style="margin-top:18px;">出版社直接授权版权资源</li>
<li class="roll-txt">全本无乱码、无错字</li>
</ul>
</div>
</a>
<a class="roll-item" href="//yuedu.baidu.com/promotion/activity/brand#block4" target="_blank">
<span class="roll-icon experience"></span>
<div class="roll-area">
<ul class="roll-text-area prev">
<li class="roll-title">舒适不累的阅读体验</li>
<li class="roll-txt">随时做书摘笔记</li>
</ul>
<ul class="roll-text-area next">
<li class="roll-title" style="margin-top:18px;">全书图文精排</li>
<li class="roll-txt">多种阅读模式切换</li>
</ul>
</div>
</a>
<a class="roll-item" href="//yuedu.baidu.com/promotion/activity/brand#block2" target="_blank">
<span class="roll-icon note"></span>
<div class="roll-area">
<ul class="roll-text-area prev">
<li class="roll-title">多个设备同步阅读</li>
<li class="roll-txt">已支持电脑、手机、iPad等设备</li>
</ul>
<ul class="roll-text-area next">
<li class="roll-title" style="margin-top:18px;">让好书现身所有设备</li>
<li class="roll-txt">无需设置自动同步</li>
</ul>
</div>
</a>
</div>
</div>
<div class="mod book-select">

<div class="hd select-title clearfix" id="hahaha">
<a href="#desp" class="select-item mr5" data-fix="desp" style="margin-left: 0;"><span class="select-item-border"></span>简介</a>
<a href="#dir" class="select-item mr5" data-fix="dir"><span class="select-item-border"></span>目录</a>
<a href="#comment" class="select-item" data-fix="comment"><span class="select-item-border"></span>评论&nbsp;<?php if($data["count"] != 0): ?><span style="color:#999;">(<?php echo ($data["count"]); ?>)</span><?php endif; ?></a>
</div>
<script>
$(function(){
    var navH = $("#hahaha").offset().top;
    $(window).scroll(function(){
        var scroH = $(this).scrollTop();
        if(scroH>=navH){
            $("#hahaha").css({"position":"fixed","top":0});
        }else if(scroH<navH){
            $("#hahaha").css({"position":"static"});
        }
    })
});
</script>
<div class="select-title-placeholder"></div>
</div>
<div class="mod book-des book-intro-block" id="book-des">

<a name="desp" class="anchor anchor1" id="desp">&nbsp;</a>
<div class="new-title">
<span class="title-icon"></span>
<a href="" id="info"></a>
<span class="title-txt">图书简介</span>
</div>
<div class="bd scaling-content-wp">
<div class="scaling-content" style="height:120px;">
<p>
<?php echo ($data["descr"]); ?>
</p>
</div>
<p class="scaling-more-btn">
<a href="###" class="expand"><span class="text"></span><span class="ic"></span></a>
</p>
</div>
</div>
<p id="token" style="display: none;">b609e57fb16592b01471821337993031</p>
<div class="mod book-intro-block mb20">

<div class="new-title book-info-title">
<span class="title-icon"></span>
<span class="title-txt">基本信息</span>
</div>
<div class="bd">
<ul class="book-information clearfix">
<li>
<span class="book-information-tip">作<span class="ml28">者：</span></span>
<a href="" ><?php echo ($data["author"]); ?></a>
</li>
<li>
<span class="book-information-tip">出<span class="ml7">版</span><span class="ml7">社：</span></span>
<?php echo ($data["press"]); ?>
</li>
<li>
<span class="book-information-tip">纸书定价：</span></span>
<?php echo ($data["price"]); ?>元</li>
<li class="book-information-classic book-information-tip">
<span class="classic-type">分<span class="ml28">类：</span></span>
<div class="crumbs-wp">
<div id="page-curmbs" class="crumbs ui-crumbs">
<ul alog-group="general.curmbs" class="clearfix">
<li><a href="/book/list/6" class="logSend" data-logsend='{"send":["general","crumb2"]}'><?php echo ($data["pcate"]); ?></a></li>
<li class="current logSend"><a href="/book/list/6031" data-logsend='{"send":["general","crumb3"]}'><?php echo ($data["cate"]); ?></a></li>
</ul>
</div>
</div>
</li>
</ul>
</div>
</div>
</div><!--mian-->

<div class="mod doc-catalog mb20"> <!--目录部分-->
<a name="dir" class="anchor anchor1" id="dir">&nbsp;</a>
<div class="new-title">
<span class="title-txt">目录（共<?php echo ($data["chapternum"]); ?>章）</span>
</div>
<div class="bd scaling-content-wp">
<div class="cata-content scaling-content" id="cata-content" style="height: auto;">
<ul id="catalog-list" alog-action="catalog.click">
    <li class="level1"><a class="catalog-item" href＝'#'="" title="第一章" page="1-1" target="_self" href="http://yuedu.baidu.com/ebook/cc1d000c974bcf84b9d528ea81c758f5f61f2934?pn=1&amp;pa=1"><span class="catalog-title">第一章</span></a></li>
    <li class="level1"><a class="catalog-item" href＝'#'="" title="第二章" page="1-1" target="_self" href="http://yuedu.baidu.com/ebook/cc1d000c974bcf84b9d528ea81c758f5f61f2934?pn=1&amp;pa=1"><span class="catalog-title">第二章</span></a></li>
</ul>
</div>
<p class="scaling-more-btn" id="catalog-btn" style="display: block;">
<a href="" class="expand"><span class="text">查看全部</span><span class="ic"></span></a>
</p>
</div>
</div><!--目录部分-->
<div class="mod book-score">

<a name="comment" class="anchor" id="comment">&nbsp;</a>
<div class="score-area-title">
<span class="title-txt">图书评论</span>
</div>

</div>
<?php if($data["comment"] != 0): ?><div class="mod merge-comment mb20">

<div class="hd">
<ul class="comment-tab-control clearfix">
<span class="comment-title-text">共有847条评论</span>
<span class="sort-list">
<a href="" class="sort-by" data-index="1">最热排序</a>
<a href="" class="sort-by current" data-index="0">最新排序</a>
</span>
</ul>
</div>
<div class="bd">
<ul class="comment-tab-content">
<li class="comment-tab-content-item current merge-comment-content">
<div class="comment-content c_comment-content">
    
    
        <ul class="comment-list">
            
                <li class="comment-list-item ">
                    <div class="comment-pic-wrap">
                        <div class="img-down-wp">
                            
                            <img class="img-down" src="/BdNovel/Public/images/home/1.jpeg">
                            <span class="author-circle"></span>
                            
                        </div>
                        
                        
                        
                    </div>
                    
                    <div class="comment-info clearfix no-margin-top">
                        <span class="comment-author" title="百度用户">
                        
                            百度用户
                        
                            
                                <span class="comment-author-paied">【购买用户】</span>
                            
                        </span>
                        
                        <span class="comment-score"><b class="ic ic-star-m-on"></b><b class="ic ic-star-m-on"></b><b class="ic ic-star-m-on"></b><b class="ic ic-star-m-on"></b><b class="ic ic-star-m-on"></b></span>
                        <span class="comment-scorenum">10</span>
                        
                        <span class="comment-date">2016-11-16 11:02:40</span>
                        <span class="comment-from">来自百度阅读</span>
                        
                    </div>
                    <p class="comment-short">
                        边看边哭！感人！好看！一个通宵搞定
                        
                    </p>
                    <p class="comment-all">
                        边看边哭！感人！好看！一个通宵搞定
                        <a href="http://yuedu.baidu.com/ebook/d94178b9b9f3f90f76c61ba8?fr=bookrank###" class="comment-close j_comment-close">收起<span class="comment-close-icon"></span></a>
                    </p>
                    <div class="comment-ft">
                        
                            
                          
                            <a href="javascript:;" class="btn-reply " data-status="closed" data-id="649941" data-uname="百度用户"><span class="reply-change">回复</span>
                            
                            </a>
                        
                        
                            <a href="http://yuedu.baidu.com/ebook/d94178b9b9f3f90f76c61ba8?fr=bookrank###" class="comment-like j_comment-like" data-id="649941">
                                <span class="like-icon"></span>
                                <span class="like-numarea">
                                <span class="like-num">0</span>
                                </span>
                                
                            </a>
                            <span class="comment-like-error">已提交</span>
                        
                    </div>
                    
                    
                            <div class="reply-comment-wrap">
                            <span class="comment-up-icon"></span>
                            <span class="comment-up-icon2"></span>
                            
                                <div class="reply-content">
                                        
                                </div>
                            
                                <p class="show-all-reply">
                                    <a class="show-all" href="http://yuedu.baidu.com/ebook/d94178b9b9f3f90f76c61ba8?fr=bookrank###">查看更多
                                    <span class="reply-open-icon"></span>
                                    </a>
                                </p>
                                <div class="reply-textarea">
                                    <span class="reply-to-name"></span>
                                    <input class="inputarea" maxlength="1000" tabindex="1">
                                    <a href="javascript:;" class="do-reply-btn" data-id="649941" name="649941" data-replyid="">回复</a>
                                    <div class="reply-textarea-ft">
                                        <span class="error-tip"></span>
                                    </div>
                                    <div class="reply-vcode-area clearfix">
                                        <input class="reply-vcode" type="text" maxlength="4" tabindex="1"><a href="http://yuedu.baidu.com/ebook/d94178b9b9f3f90f76c61ba8?fr=bookrank###" class="change-testcode-area"><img class="testcode-imgurl js-comment-vcode-img" src="http://yuedu.baidu.com/ebook/d94178b9b9f3f90f76c61ba8?fr=bookrank" alt=""></a><a href="http://yuedu.baidu.com/ebook/d94178b9b9f3f90f76c61ba8?fr=bookrank###" class="change-testcode-tip">看不清，换一张</a>
                                        <span class="testcode-placeholder">验证码</span>
                                        <span class="num-err-tips"></span>
                                    </div>
                                </div>
                                
                            </div>
                    
                </li>
        </ul>
    
</div>

</li>
<li class="comment-tab-content-item other-comment-content">
<div class="comment-content c_comment-content"></div>
<div class="comment-pager c_comment-pager"></div>
</li>
</ul>
</div>
</div>
<?php else: ?>
<div style="width:100%;height:100px;">
    <span style="display:block;width:100px;height:50px;margin:0 auto;font-size:20px;color:#ccc;margin-top:20px;">暂无评论</span>
</div><?php endif; ?>
</div>

<div class="mod comment mb20">

<a name="write-comment" class="anchor anchor1" id="write-comment">&nbsp;</a>
<div class="hd">
</div>
<div class="bd">
<div class="go-to-buy"></div>
<?php if($readername == ''): ?><div class="uncomment">
<div class="user-icon-wp">
<div class="user-icon">
<div class="user-icon-mask"></div>
<img src="http://static.wenku.bdimg.com/static/ydcore/widget/book_index/comment/images/head0_d936a37.png" alt="" class="user-icon-pic">
<span class="author-circle"></span>
</div>
</div>
<div class="comment-sub comment-sub-disabled">
<div class="clearfix comment-sub-wp">
<span>标题</span>
<input type="text" class="comment-title-sub not-comment-title" placeholder="选填" maxlength="30" disabled/>
</div>
<div class="clearfix comment-sub-wp">
<span>正文</span>
<textarea class="comment-content-sub not-comment-content" disabled></textarea>
</div>
</div>
<div class="comment-sub-btn-wp">
<a href="###" class="comment-sub-btn j_comment-sub-btn not-comment-bt">
<b class="btc">
<b class="btText btText-normal">发表评论</b>
<b class="btText btText-loading"><span class="loading-icon"></span>发表中</b>
</b>
</a>
<a href="<?php echo U('Login/login');?>" class="not-login-tips">登录后可评论</a><span class="comment-sub-error c_comment-sub-error"></span>
</div>
</div>
<?php else: ?>
<form action="">
<div class="uncomment">
<div class="user-icon-wp">
<div class="user-icon">
<div class="user-icon-mask"></div>
<img src="/BdNovel/Upload/reader/<?php echo ($readerpic); ?>" alt="" class="user-icon-pic">
<span class="author-circle"></span>
</div>
</div>
<div class="comment-sub">
<div class="clearfix comment-sub-wp">
<span>标题</span>
<input type="text" class="comment-title-sub not-comment-title" placeholder="选填" maxlength="30" />
</div>
<div class="clearfix comment-sub-wp">
<span>正文</span>
<textarea class="comment-content-sub not-comment-content" onclick="this.innerHTML=''">必填，不少于5个字</textarea>
</div>
<div class="comment-vcode-wrap clearfix">
<span class="comment-vcode-label">验证码</span>
<input type="text" class="comment-vcode-input" maxlength="4">
<img src=""><span class="comment-vcode-change">看不清，换一张</span></div>
</div>
<div class="comment-sub-btn-wp">
<a href="" class="comment-sub-btn j_comment-sub-btn ">
<b class="btc">
<b class="btText btText-normal">发表评论</b>
<b class="btText btText-loading"><span class="loading-icon"></span>发表中</b>
</b>
</a>
</div>
</div>
</form><?php endif; ?>

<div class="commented" style="display:none">您已评论过了</div>
</div>
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