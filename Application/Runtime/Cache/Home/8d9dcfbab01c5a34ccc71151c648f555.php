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
	a:hover{
		text-decoration: none;
	}
	#ordertable tr th
	{
		font-size: 16px;
		padding:10px 10px 5px 0;
	}
	#ordertable tr td
	{
		font-size: 16px;
		padding:10px 0 5px 0;
	}
</style>
<?php if($data == null): ?><div style="width:100%;height:200px;background-color:#fafafa;margin-top:30px;">
	<div style="width:50%;height:100px;margin:0 auto;padding-top:30px">
		<img src="/BdNovel/Public/images/Home/market.png" alt="" width="100px" style="float:left;margin-right:20px" />
		<p style="display:block;margin-top:20px;font-size:20px">您的购物车为空，赶紧行动吧<br>
		<a href="<?php echo U('Index/index');?>" style="font-size:20px">去阅读首页看看>></a></p>
	</div>
</div>
<?php else: ?>
<ul class="clearfix" style="width:100%;margin-top:30px;">
	<li style="float:left;width:100%;height:40px;line-height:40px;background-color:#fafafa;font-size:14px;color:#999;margin-bottom:10px;border:1px solid #efefef"><span style="display:block;float:left;margin-left:150px;font-size:14px;">电子书信息</span><span style="display:block;float:left;margin-left:450px;font-size:14px;">电子书价格（元）</span><span style="display:block;float:left;margin-left:290px;font-size:14px;">操作</span></li>
<div id="ullist">
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="float:left;width:100%;line-height:120px;background-color:#fffaf0;font-size:14px;color:#999;border:1px solid #efefef">
			<span style="display:block;float:left;font-size:14px;height:120px;line-height:30px;width:700px"><input  name="choose" type="checkbox" style="float:left;margin:40px auto auto 10px;cursor:pointer" checked><a href="<?php echo U('Detail/index',array('id'=>$vo[0]['id']));?>"><img src="/BdNovel/Upload/book/<?php echo ($vo[0]["bookpic"]); ?>" alt="" width="80px" height="100px" style="float:left;margin:10px 20px auto 10px"></a><a href="<?php echo U('Detail/index',array('id'=>$vo[0]['id']));?>" style="font-size:16px;text-align:left;float:left;display:block;margin-top:20px;"><?php echo ($vo[0]["bookname"]); ?></a><br><br><p style="display:block;float:left;">作者：<?php echo ($vo[0]["authorname"]); ?></p>
			</span>
			<input type="hidden" value="<?php echo ($vo[0]["cid"]); ?>" name="cid">	
			<div style="float:left;font-size:14px;width:370px;color:#ff9168">￥ <b name="price"><?php echo ($vo[0]["price"]); ?></b></div><a href="javascript:void(0)" onclick="del(this);" style="display:block;float:left;font-size:14px;cursor:pointer">删除</a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	<li style="float:left;width:100%;height:50px;line-height:50px;background-color:#fafafa;font-size:14px;color:#999;margin-top:10px;border:1px solid #efefef"><span style="display:block;float:left;font-size:14px;width:680px"><input id="checkall" type="checkbox" style="float:left;margin:17px auto auto 10px;cursor:pointer" onclick="checkall()" checked>&nbsp;&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="del" style="font-size:14px;cursor:pointer" onclick="delAll()">删除选中图书</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;已选<span style="color:#fe9147" id="count"><?php echo ($count); ?></span>本电子书</span><span style="display:block;float:left;color:#ff9147;font-size:16px" id="totalprice">合计：￥<b id="orderprice"><?php echo ($totalprice); ?></b></span><a href="javascript:void(0)" style="display:block;float:right;width:120px;height:50px;background-color:#ee524c;color:#fff;font-size:20px;text-align:center;cursor:pointer" onclick="order()">去支付</a></li>
</div>
</ul><?php endif; ?>
<br><br>
<hr>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" ria-labelledby="myModalLabel" aria-hidden="true" style="position:fixed;top:35%;left:35%;width:350px;height:190px"> 
	<!-- <div class="modal-dialog"> -->
	<div class="modal-content" style="height:190px"> 
		<div class="modal-header" style="border:none;">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body" style="height:100px;font-size:20px;text-align:center;">是否将图书从购物车中删除？<input type="hidden" id="delid"></div>
		<div class="" style="text-align:center;"><button type="button" class="btn btn-primary" onclick="confirm(this)">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
		</div>
	</div>
<!-- 	</div> -->
</div>

<div class="modal fade" id="order" tabindex="-1" role="dialog" ria-labelledby="myModalLabel" aria-hidden="true" style="position:fixed;top:10%;left:20%;width:715px;height:610px"> 
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
								<div id="orderbookname" style="height:70px;overflow-y:auto;">
									
								</div>
								<!-- <h4 name="orderbookname"></h4>
								<h4 name="orderbookname"></h4>
								<h4 name="orderbookname"></h4>
								<h4 name="orderbookname"></h4>
								<h4 name="orderbookname"></h4> -->
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
<!-- 	</div> -->
</div>

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
<!-- 	</div> -->
</div>



<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
<script>
	function doorder(){
		var total = $("#ordertotal2").html();
		var hs = $('h4');
		var arr = new Array();
		var arrid = $("#arrid").val();
		// console.log(arrid);
		for(var i=0;i<hs.length;i++){
			arr[i] = hs.eq(i).html()+'*';
		}
		$.ajax({
			type:'post',
			url:"<?php echo U('Shopcar/doorder');?>",
			data:"total="+total+"&arr="+arr+"&arrid="+arrid,
			success:function(data){
				// console.log(data);
				$('#order').modal('hide');
				$('#confirmorder').modal('show');
			}
		})
	}

	function confirmorder(obj){
		$('#confirmorder').modal('hide');
		window.location.reload();
	}

	function order(){
		var ips = $('input[name=choose]:checked');
		if(ips.length == 0){
			return;
		}
		var arrid = new Array();
		var bookpic = ips.eq(0).parent().find('img').attr('src');
		var arr = new Array();
		for(var i=0;i<ips.length;i++){
			var bookname = ips.eq(i).parent().find('a').eq(1).html();
			arr[i] = '<h4>'+bookname+'</h4>';
			arrid[i] = ips.eq(i).parent().parent().find('input').eq(1).val();
		}
		// console.log(arrid);
		$("#orderbookname").html(arr);
		var orderprice = $("#orderprice").html();
		var count = $("#count").html();
		$("#orderpic").attr('src',bookpic);
		$("#ordercount").html(count);
		$("#ordertotal1").html(orderprice);
		$("#ordertotal2").html(orderprice);
		$("#arrid").val(arrid);
		$('#order').modal('show');
	}

	function del(obj){
		var ips = $(obj).parent().find('input');
		// console.log(ips);
		var arr = new Array();
		arr.push(ips.eq(1).val());
		// console.log(arr);
		$("#delid").val(arr);
		$('#myModal').modal('show');
	}

	function delAll(){
		var ips1 = $('input[name=cid]');
		var ips2 = $('input[name=choose]');
		var arr = new Array();
		for(var i=0;i<ips2.length;i++){
			var status = ips2.eq(i).is(':checked');
			if(status){
				arr.push(ips1.eq(i).val());
			}
		}
		$("#delid").val(arr);
		$("#myModal").modal('show');
	}

	function confirm(obj){
		var id = $("#delid").val();
		var Url = "<?php echo U('Shopcar/index');?>";
		// console.log(id);
		dodel(id,Url);
		$('#myModal').modal('hide');
		window.location.reload();
	}

	function dodel(id,Url){
		$.ajax({
			type:'get',
			url:Url,
			data:"delid="+id,
			success:function(data){
				var $data = $(data);
                var target_div = $data.find("#ullist");
                $('#ullist').html(target_div);
			}
		});
	}

	// var totalprice1 = $("#totalprice").html();
	// var count1 = $("#count").html();
	function checkall(){
		var ips = $('input[name=choose]');
		var status = $("#checkall").is(':checked');
		for(var i=0;i<ips.length;i++){
			ips[i].checked = status;	
		}
		if( status === false ){
			$('input[name=choose]').parent().parent().css('background-color','#fff');
			// $("#totalprice").html("合计：￥"+0);
			// $("#count").html(0);
		}
		if( status ){
			$('input[name=choose]').parent().parent().css('background-color','#fffaf0');
			// $("#totalprice").html(totalprice1);
			// $("#count").html(num);
		}
		var num = count();
		$("#count").html(num);
		var price = totalprice();
		$("#orderprice").html(price);
	}

	onload = function ()
    {    
    	var ips = $('input[name=choose]');
    	var checkall = document.getElementById('checkall');
    	// var num = 0;
        for ( var i = 0; i < ips.length; i++)
        {
            ips[i].onclick = function ()
            {   			
                if ( !this.checked )
                {
                	$(this).parent().parent().css('background-color','#fff');
                    // num--;
                }
                if( this.checked )
                {
                	$(this).parent().parent().css('background-color',"#fffaf0");
                	// num++;
                }
		        var num = count();
		        if(num == ips.length){
		        	checkall.checked = true;
		        }else{
		        	checkall.checked = false;
		        }
		        // $("#count").html(count);
		        var price = totalprice();
		        $("#orderprice").html(price);
            };
        }
    }

    function totalprice(){
    	var prices = $('input[name=choose]').parent().parent().find('div').find('b');
    	var ips = $('input[name=choose]');
    	var totalprice = 0;
    	for(var i=0;i<ips.length;i++){
    		if(ips[i].checked == true){
    			totalprice = (parseFloat(totalprice)*100+parseFloat(prices[i].innerHTML)*100)/100;
    		}
    	}
    	// $("#totalprice").html("合计：￥"+totalprice);
    	return totalprice;
    }

    function count(){
    	var ips = $('input[name=choose]');
    	var count = 0;
    	for(var i=0;i<ips.length;i++){
    		if(ips[i].checked == true){
    			count++;
    		}
    	}
    	$("#count").html(count);
    	return count;
    }
</script>

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