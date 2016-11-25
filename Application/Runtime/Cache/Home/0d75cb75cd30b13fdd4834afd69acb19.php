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
        .arrow-up {
            width: 0px;
            height: 0px;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid gray;
            /*以下属性可以是IE5兼容*/
            font-size: 0px;
            line-height: 0px;
            position: absolute;
            display: none;
        }
        .history{
            float:left;
            width:280px;
            height:485px;
            border:1px solid #e0e0e0;
        }
    </style>
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
<div class="history">
    <div style="border-radius:2px;margin-top:10px;height:16px;width:4px;background:#58bd5a;float:left"></div>
    <h2 style="margin-top:8px;margin-bottom:10px;margin-left:10px;">浏览历史</h2>
    <?php if(is_array($historybook)): $i = 0; $__LIST__ = $historybook;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(is_array($vo["historybook"])): $i = 0; $__LIST__ = $vo["historybook"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div style="width:85px;height:105px;float:left;margin-left:20px;margin-top:5px;">
                <a style="width:85px;height:105px;" href="<?php echo U('Detail/index',array('id'=>$val['id']));?>" target="_blank"><img style="width:85px;height:105px;" src="/BdNovel/Upload/book/<?php echo ($val["bookpic"]); ?>" alt=""></a>
            </div>
            <div style="width:160px;height:105px;float:left;margin-top:5px;border:none">
                <p style="display:block;height:105px;line-height:60px;text-align:center;"><a style="width:170px;border:none"href="<?php echo U('Detail/index',array('id'=>$val['id']));?>" target="_blank"><?php echo ($val["bookname"]); ?></a>
                </p>
            </div><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>      
</div>
</div>
</div>


<div class="main">

<div class="mod doc-info">

<div class="bd" style="position: relative;">
<div class="doc-info-bd clearfix"  style="position: relative;z-index:1;">
<div class="cover-block">
<div class="img-block mb20">
<img class="doc-info-img" src="/BdNovel/Upload/book/<?php echo ($data["bookpic"]); ?>" width="200px" height="270px" alt="" />
</div>
<div class="doc-op-wrap">
<div class="doc-op-hack">
<ul class="doc-op-content clearfix">
<li class="doc-op-item">
<?php if($_SESSION['reader_id'] == null): ?><a href="<?php echo U('Login/login');?>" id="doc-save" class="" title="收藏"><b class="ic icon-favo"></b></a>
<span class="doc-operate-tip doc-operate-tip-save"></span>
<?php else: ?>
<a href="Javascript:void(0)" id="doc-save" class="<?php echo ($class); ?>" title="收藏"><b class="ic icon-favo"></b></a>
<span class="doc-operate-tip doc-operate-tip-save"></span><?php endif; ?>
<script>
    $('#doc-save').one('click',function(){
        if($(this).attr('class') == 'doc-saved'){
            return;
        }else{           
            $(this).addClass("doc-saved");
            $.ajax({
                type:'post',
                url:'<?php echo U('Detail/collect');?>',
                data:"bookid="+"<?php echo ($data['id']); ?>",
                success:function(data){
                },
            })
        }
    })  
</script>
</li>
<span class="split"></span>
<li class="doc-op-item">
<a href='<?php echo U("download?id=$data[id]");?>' id="doc-dl-phone" class="js-publish-to-phone" title="下载"><b class="ic icon-dl-phone"></b></a>
</li>
<span class="split"></span>
<li id="fenx" class="doc-op-item">
<a href="###" id="doc-share">
    <b class="ic icon-share"></b>
</a>
<div class="arrow-up"></div>
<div class="bdshare-layer bdsharebuttonbox demo" style="display:none;width:140px">
    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
    <a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
</div>
</li>
</ul>
<script>
    $('.demo').attr('visibility','visible');
    $('#fenx').mouseover(function(){
        $('.bdsharebuttonbox').show();
        $('.arrow-up').show();
    })
    $('#doc-share').mouseout(function(){
        $('.bdsharebuttonbox').hide();
        $('.arrow-up').hide();
    })

    var url = window.location.href;
    window._bd_share_config={
        "common":{
            "bdSnsKey":{},
            "bdText":"我在@百度阅读 看到一本好书，推荐给大家！（用阅读客户端看书更给力，马上..",
            "bdMini":"2",
            "bdurl":url,
            "bdMiniList":false,
            "bdPic":"http://hiphotos.baidu.com/doc/pic/item/2e2eb9389b504fc2083e1a33ecdde71190ef6da7.jpg",
            "bdStyle":"2",
            "bdSize":"16"
        },
        "share":{}
    };with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
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
<?php if($Comcount != 0): ?><a href="#comment" class="doc-info-score-num"><span class="c_doc-info-score-num"><?php echo ($Comcount); ?></span>人评论</a>
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
<?php if($count == 0): ?><a href="javascript:void(0)" class="yui-btn yui-btn-large yui-btn-large pay-btns mr10 " onclick="order()">购买全本</a>
<?php else: ?>
<span class="yui-btn yui-btn-large yui-btn-large pay-btns mr10 ">已购买</span><?php endif; ?>
<a href='<?php echo U("look?id=$data[id]&p=$k&chapternum=$data[chapternum]");?>' class="go-read-page yui-btn yui-btn-large log-xsend" data-logxsend='[2, 200208, {"is_self_publishing": 0, "na_all_free":0}]' target="_blank">开始阅读</a>
<?php if($_SESSION['reader_id'] == null): ?><a href="<?php echo U('Login/login');?>" id="doc-add-cart" class="add-to-cart">
    <span class="ic ic-cart"></span>
    <span class="txt" id="txt">加入购物车</span>
    <span class="doc-operate-tip doc-operate-tip-cart"></span>
</a>
<?php elseif(($class1 == 'doc-cart-added cart-added')): ?>
<span href="Javascript:void(0)" id="doc-add-cart" class="add-to-cart doc-cart-added cart-added" style="color:#ccc;cursor:pointer;">
    <span class="ic ic-cart"></span>
    <span class="txt" id="txt">已加入购物车</span>
    <span class="doc-operate-tip doc-operate-tip-cart"></span>
</span>
<?php elseif(($count != 0)): ?>
<span href="Javascript:void(0)" id="doc-add-cart" class="add-to-cart doc-cart-added cart-added" style="color:#ccc;cursor:pointer;">
    <span class="ic ic-cart"></span>
    <span class="txt" id="txt">已购买</span>
    <span class="doc-operate-tip doc-operate-tip-cart"></span>
</span>
<?php else: ?>
<span href="Javascript:void(0)" id="doc-add-cart" class="add-to-cart <?php echo ($class1); ?>" style="cursor:pointer;">
    <span class="ic ic-cart"></span>
    <span class="txt" id="txt">加入购物车</span>
    <span class="doc-operate-tip doc-operate-tip-cart"></span>
</span><?php endif; ?>

<script>
    $('#doc-add-cart').one('click',function(){
        if($(this).attr('class') == 'add-to-cart doc-cart-added cart-added'){
            return;
        }else{           
            $(this).addClass("doc-cart-added cart-added");
            $.ajax({
                type:'post',
                url:'<?php echo U('Shopcar/add');?>',
                data:"bookid="+"<?php echo ($data['id']); ?>",
                success:function(data){
                    $("#txt").html("已加入购物车");
                    $("#doc-add-cart").css("color","#ccc");
                },
            })
        }
    })
</script>
</div>

</div>


</div>
</div>
</div>
</div>
</div>

<!--模态框购买图书-->
<div class="modal fade" id="buy" tabindex="-1" role="dialog" ria-labelledby="myModalLabel" aria-hidden="true" style="position:fixed;top:10%;left:20%;width:715px;height:610px"> 
    <!-- <div class="modal-dialog"> -->
    <div class="modal-content" style="height:600px"> 
        <div class="modal-header" style="height:45px">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div style="width:5px;height:20px;background:#58bd5a;border-radius:8px;float:left;"></div>
            <h2 style="margin-left:10px;display:block;width:100px;float:left;">购买图书</h2>
            <span style="display:block;width:200px;float:right;text-align:right;padding-right:18px;font-size:15px">账号：<b style="color:#58bd7c;font-size:15px"><?php echo ($readername); ?></b></span>
        </div>
        <div class="modal-body" style="height:455px;width:100%;font-size:20px;text-align:center;">  
            <table id="ordertable">
                <tr>
                    <th>购买图书：</th>
                    <td colspan="2">
                        <div style="height:110px;width:570px;background:#fafaf7">
                            <img id="orderpic" src="" alt="" style="width:60px;float:left;margin:15px 0 15px 10px">
                            <input type="hidden" value="" id="arrid">
                            <div style="width:480px;float:left;text-align:left;margin:15px 0 0 18px;">
                                <div style="height:70px;overflow-y:auto;">
                                    <h4 id="orderbookname"></h4>
                                </div>
                                <b style="color:#999;font-size:12px">共<span id="ordercount"></span>本</b>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>图书总额：</th>
                    <td colspan="2" style="text-align:left;"><span id="ordertotal1"></span>元</td>
                </tr>
                <tr>
                    <th>支付方式：</th>
                    <td>
                        <img src="/BdNovel/Public/images/Home/zhifubao.png" alt="">
                    </td>
                    <td rowspan="2" style="width:400px">
                        <img src="/BdNovel/Public/images/Home/order.jpg" alt="">
                    </td>
                </tr>
                <tr>
                    <th>应付金额：</th>
                    <td style="text-align:left;"><b style="font-size:20px;color:#f60" id="ordertotal2"></b>元</td>
                </tr>

            </table>
        </div>
        <div class="modal-footer" style="text-align:center;height:100px;width:100%;">
            <button type="button" style="background:#ff7221;width:150px;height:50px;font-size:20px;color:#fff;border-radius:10px;border:none" onclick="doorder()">立即支付</button>
        </div>
    </div>
</div>
<!--    </div> -->
<div class="modal fade" id="confirmorder" tabindex="-1" role="dialog" ria-labelledby="myModalLabel" aria-hidden="true" style="position:fixed;top:35%;left:35%;width:350px;height:190px"> 
    <!-- <div class="modal-dialog"> -->
    <div class="modal-content" style="height:190px"> 
        <div class="modal-header" style="border:none;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body" style="height:100px;font-size:20px;text-align:center;">您已成功购买，祝您阅读愉快！<input type="hidden" id="delid"></div>
        <div class="" style="text-align:center;"><button type="button" class="btn btn-primary" onclick="confirmorder(this)">确认</button>
        </div>
    </div>
</div>
<!--    </div> -->
<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
<script>
    function order(){
        var bookname = "<?php echo ($data['bookname']); ?>";
        var price = "<?php echo ($data['price']); ?>";
        var bookid = "<?php echo ($data['id']); ?>";
        var bookpic = "<?php echo ($data['bookpic']); ?>";
        $("#orderbookname").html(bookname);
        $("#orderpic").attr('src','/BdNovel/Upload/book/'+bookpic);
        $("#ordercount").html(1);
        $("#ordertotal1").html(price);
        $("#ordertotal2").html(price);
        $("#arrid").val(bookid);
        $('#buy').modal('show');
    }

    function doorder(){
        var total = $("#ordertotal2").html();
        var bookname = $("#orderbookname").html();
        var bookid = $("#arrid").val();
        $.ajax({
            type:'post',
            url:"<?php echo U('Detail/doorder');?>",
            data:"total="+total+"&bookname="+bookname+"&bookid="+bookid,
            success:function(data){
                // console.log(data);
                $('#buy').modal('hide');
                $('#confirmorder').modal('show');
            }
        })
    }

    function confirmorder(obj){
        $('#confirmorder').modal('hide');
        window.location.reload();
    }
</script>

<div class="roll-text-wrap">
<span class="arr-icon"></span>
<span class="arr-icon2"></span>
<div class="roll-text-list">
<a class="roll-item" href="#" target="_blank">
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
<a class="roll-item" href="#" target="_blank">
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
<a class="roll-item" href="#" target="_blank">
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
<div class="new-title" style="width:70%">
<span class="title-txt">目录（共<?php echo ($data["chapternum"]); ?>章）</span>
</div>

<div class="bd scaling-content-wp">
<div class="cata-content scaling-content" id="cata-content" style="height: auto;">
<ul id="catalog-list" alog-action="catalog.click">
    <?php if(is_array($zj)): $k = 0; $__LIST__ = $zj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="level1"><a class="catalog-item" href='<?php echo U("look?id=$data[id]&p=$k&chapternum=$data[chapternum]");?>' title="<?php echo ($vo); ?>" page="1-1" target="_self" ><span class="catalog-title"><?php echo ($vo); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>

<p class="scaling-more-btn" id="catalog-btn" style="display: block;">
<a href="jacascript:void(0)" class="expand"><span id="a1" class="text">查看全部</span><span class="ic" style="height:10px"></span></a>
</p>
</div>
</div><!--目录部分-->
<script>
    function test(){
        if ($('#a1').attr('class')!='text on') {
            $('#catalog-list').children().eq(9).nextAll().hide();
            $('#a1').parent().attr('class','expand');
            $('#a1').html('查看全部');
        }else{
            $('#catalog-list').children().eq(9).nextAll().slideDown('normal');
        }
    }
    test();
        $('#a1').click(function(){
            $(this).toggleClass('on');
            $(this).parent().attr('class','close');
            $(this).html('  收起');
            test();
        });
</script>
<div class="mod book-score">

<a name="comment" class="anchor" id="comment">&nbsp;</a>
<div class="score-area-title">
<span class="title-txt">图书评论</span>
</div>

</div>
<?php if($Comcount != 0): ?><div class="mod merge-comment mb20">

<div class="hd">
<ul class="comment-tab-control clearfix">
<span class="comment-title-text">共有<?php echo ($Comcount); ?>条评论</span>
<span class="sort-list">
</span>
</ul>
</div>
<div class="bd">
<ul class="comment-tab-content">
<li class="comment-tab-content-item current merge-comment-content">
<div class="comment-content c_comment-content">
    
    
        <ul class="comment-list" id="comment-list">
            <?php if(is_array($Comdata)): $i = 0; $__LIST__ = $Comdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="comment-list-item ">
                <div class="comment-pic-wrap">
                    <div class="img-down-wp">
                        
                        <img class="img-down" src="/BdNovel/Upload/reader/<?php if($vo["pic"] == ""): ?>touxiang.jpg<?php else: echo ($vo["pic"]); endif; ?>">
                        <span class="author-circle"></span>
                        
                    </div>
                    
                    
                    
                </div>
                    
                <div class="comment-info clearfix no-margin-top">
                    <span class="comment-author" title="百度用户">
                    
                        <?php echo ($vo["readername"]); ?>
                    
                        <?php if($vo["title"] != null): ?><span class="comment-author-paied">&nbsp;&nbsp;标题：<?php echo ($vo["title"]); ?></span><?php endif; ?>
                    </span>
                    
                    <span class="comment-score"><b class="ic ic-star-m-on"></b><b class="ic ic-star-m-on"></b><b class="ic ic-star-m-on"></b><b class="ic ic-star-m-on"></b><b class="ic ic-star-m-on"></b></span>
                   <!--  <span class="comment-scorenum">10</span> -->
                    
                    <span class="comment-date"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></span>
                    <span class="comment-from">来自百度阅读</span>
                    
                </div>
                <p class="comment-short">
                   <?php echo ($vo["content"]); ?>
                    
                </p>
                <!-- <p class="comment-all">
                    <?php echo ($vo["content"]); ?>
                    <a href="" class="comment-close j_comment-close">收起<span class="comment-close-icon"></span></a>
                </p> -->
                <div class="comment-ft">
                    <?php if($vo["readerid"] == $_SESSION['reader_id']): ?><a href="<?php echo U('Detail/delComment',array('id'=>$vo['id'],'bookid'=>$data['id']));?>">删除</a>&nbsp;&nbsp;<?php endif; ?>
                    <a href="javascript:;" class="btn-reply " data-status="closed" data-id="649941" data-uname="百度用户"><span class="reply-change">回复<b id="replynum"><?php if($vo["replynum"] != 0): ?>(<?php echo ($vo["replynum"]); ?>)<?php endif; ?></b></span><span class="reply-change reply-close" style="display:none;">收起回复</span>
                    </a>

                    <!--点赞-->
                    <span href="Javascript:void(0)" class="comment-like j_comment-like">
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>">
                        <span class="like-icon" id="like-icon"></span>
                        <span class="like-numarea">
                            <span class="like-num" id="aaa<?php echo ($vo["id"]); ?>"><?php echo ($vo["likenum"]); ?></span>
                        </span>     
                    </span>
                    <span class="comment-like-error">已提交</span>
                </div>
                    
                    
                <div class="reply-comment-wrap">
                    <span class="comment-up-icon"></span>
                    <span class="comment-up-icon2"></span>
                    <div class="reply-content">
                    <?php if($vo["replynum"] != 0): if(is_array($vo["reply"])): $i = 0; $__LIST__ = $vo["reply"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="reply-items">
                                <div class="reply-pic-wrap">
                                    <div class="img-down-wp">
                                        <img class="img-down" src="/BdNovel/Upload/reader/<?php if($val["pic"] == ""): ?>touxiang.jpg<?php else: echo ($val["pic"]); endif; ?>">
                                                <span class="author-circle"></span>
                                            
                                    </div>
                                    <span class="img-up"></span>
                                        
                                </div>
                                <p class="reply-title">
                                    <span class="comment-author" title="" data-id="655489"> <?php echo ($val["readername"]); ?>
                                    </span>
                                    
                                    
                                    <span class="reply-date"><?php echo (date('Y-m-d H:i:s',$val["replytime"])); ?></span>
                                </p>

                                <p class="reply-content-txt">
                                    <?php echo ($val["replycontent"]); ?>
                                </p>
                                <div class="reply-ft">
                                    <span class="time"></span>
                                    <?php if($val["readerid"] == session('reader_id')): ?><a href="<?php echo U('Detail/delReply',array('id'=>$val['replyid'],'bookid'=>$data['id'],'commentid'=>$vo['id']));?>" class="delete-reply" data-id="655489">删除</a>
                                    <?php else: ?>
                                        <a href="javascript:;" class="do-reply" style="display:block;float:right;margin:-15px 20px 15px 0">回复</a><?php endif; ?>
                                </div>
                                <div class="reply-split"></div>
                            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>

                    <!-- <div class="reply-textarea">

                    </div> -->
                    <div class="reply-textarea">
                        <!-- <form action="<?php echo U('Detail/reply');?>" method="post" > -->
                        <input type="hidden" name="commentid" value="<?php echo ($vo["id"]); ?>">
                        <input type="text" name="replycontent"  class="inputarea" maxlength="1000" value="" placeholder="回复：<?php echo ($vo["readername"]); ?>"/>
                        <a href="javascript:void(0)" class="do-reply-btn"  data-replyid="">回复</a>
                        <!-- </form> -->
                    </div>
                    
                </div>          
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    
</div>
<script>
    // $('#like-icon').one(click(function(){
    //     var id = $(this).parent().find('input').eq(0).val();
    //     console.log(id);
    // })
    $('.like-icon').mouseover(function(){
        $(this).parent().addClass("hovered");
    })
    $('.like-icon').mouseout(function(){
        $(this).parent().removeClass("hovered");
    })

    $('.like-icon').one('click',function(){
        if($(this).parent().attr('class') == 'comment-like j_comment-like liked'){
            return;
        }else{           
            $(this).parent().addClass("liked");
            var bookid = "<?php echo ($data["id"]); ?>";
            var commentid = $(this).parent().find('input').eq(0).val();
            $.ajax({
                type:'post',
                url:'<?php echo U('Detail/like');?>',
                data:"commentid="+commentid+"&bookid="+bookid,
                success:function(data){
                    // console.log(data);
                    var $data = $(data);
                    var target_div = $data.find("#aaa"+commentid);
                    $("#aaa"+commentid).html(target_div);
                },
            })
        }
    })
    // console.log($('.reply-change'));
    $('.reply-change').click(function(){
        $(this).toggleClass('on');
        var a = $(this).parent().parent().parent();
        a.children(".reply-comment-wrap").show();
        if($(this).attr('class')=='reply-change on'){
            a.children(".reply-comment-wrap").show();
            $(this).hide();
            $(this).parent().find('span').eq(1).show();
        } else{
            a.children(".reply-comment-wrap").hide();
            $(this).parent().find('span').eq(0).show();
            $(this).parent().find('span').eq(1).hide();
            $(this).parent().find('span').eq(0).removeClass('on');
        }
    })

    $(".do-reply-btn").click(function(){
        var a = $(this).parent();
        var replycontent = a.find('input').eq(1).val();
        if(replycontent == ''){
            return;
        }
        var bookid = "<?php echo ($data["id"]); ?>";
        var commentid = a.find('input').eq(0).val();
        // var replytime = "<?php echo ($replytime = time()); ?>";
        $.ajax({
            type:'post',
            url:"<?php echo U('Detail/reply');?>",
            data:"bookid="+bookid+"&commentid="+commentid+"&replycontent="+replycontent,
            async:false,
            success:function(data){
                var $data = $(data);
                var target_div = $data.find("#comment-list");
                $("#comment-list").html(target_div);
                window.location.reload();
            }
        })
    })

    $('.do-reply').click(function(){
        var a = $(this).parent().parent().find('.reply-title').find('.comment-author').html();
        var b = $(this).parent().parent().parent().parent().find('.reply-textarea').find('.inputarea');
        b.attr('placeholder','回复：'+a);
    })
</script>
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
    <img src="/BdNovel/Public/images/Home/touxiang.jpg" alt="" class="user-icon-pic">
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
<?php elseif($Owncount == 0): ?>
        <div class="uncomment" id="comlist"><!--评论后隐藏-->
        <div class="user-icon-wp">
        <div class="user-icon">
        <div class="user-icon-mask"></div>
        <img src="/BdNovel/Upload/reader/<?php if($readerpic == ''): ?>touxiang.jpg<?php else: echo ($readerpic); endif; ?>" alt="" class="user-icon-pic">
        <span class="author-circle"></span>
        </div>
        </div>
        <div class="comment-sub">
    <form action="<?php echo U('comment');?>" id="first" method="post">
        <input type="hidden" name="addtime" value="<?php echo ($addtime = time()); ?>">
        <input type="hidden" name="bookid" value="<?php echo ($data['id']); ?>">
        <div class="clearfix comment-sub-wp">
        <span>标题</span>
        <input type="text" name="title" class="comment-title-sub not-comment-title" placeholder="选填" maxlength="30" />
        </div>
        <div class="clearfix comment-sub-wp">
        <span>正文</span>
        <textarea id="content" name="content" minlength="5" class="comment-content-sub not-comment-content" onclick="this.innerHTML=''"></textarea>
        </div>
    </form>
        <div class="comment-vcode-wrap clearfix">
        <span class="comment-vcode-label">验证码</span>
        <input name="yzm" type="text" class="comment-vcode-input" maxlength="4" style="height:34px">
        <img src="<?php echo U('Detail/yzm');?>" title="点击更换新的验证码" alt="" class="comment-vcode-img js-comment-vcode-img" id="yz_img">
        </div>
        </div>
        <div class="comment-sub-btn-wp">
        <a href="javascript:void(0)" onclick="submit()" class="comment-sub-btn j_comment-sub-btn ">
        <b class="btc">
        <b class="btText btText-normal" id="fbpl">发表评论</b>
        <b class="btText btText-loading"><span class="loading-icon"></span>发表中</b>
        </b>
        </a>
        <span class="comment-sub-error c_comment-sub-error"></span>
        </div>
        </div>
    <script>
        var yz_img = $('#yz_img');
        var src_img = yz_img.attr('src');
        yz_img.click(function(){
            $(this).attr('src', src_img+'?yzm='+Math.random());
            // console.log($(this).attr('src'));
        })

        function submit(){
            var yzm1 = $('#yzm').val();
            var content = $('#content').val();
            if (content==''){
                $('.comment-sub-error').html('请填写正文');
                 return; 
            }else if(content.length<5){
                $('.comment-sub-error').html('正文必须大于5个字');
                return;
            };

            $.ajax({
                type:'get',
                url:'<?php echo U('Detail/getYzm');?>',
                data:"yzm1="+yzm1,
                async: false,
                success:function(data){
                    // console.log(data);
                    // return;
                    if(!data){
                        $('.comment-sub-error').html('验证码错误,请输入正确的验证码');
                    }
                    else{
                         $('.comment-sub-error').html('');
                         $('.btText-normal').hide();
                         $('.btText-loading').show();
                         function test(){
                            $("#first").trigger("submit");
                         }
                         setTimeout(test,1500);
                    }
                },
            })
        }

        
    </script>
<?php else: ?>
<div class="commented">您已评论过了</div><?php endif; ?>

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