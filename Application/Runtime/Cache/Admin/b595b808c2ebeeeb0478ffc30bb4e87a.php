<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="/BdNovel/Public/css/pintuer.css">
    <link rel="stylesheet" href="/BdNovel/Public/css/admin.css">
    <script src="/BdNovel/Public/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="/BdNovel/Public/images/Admin/Index/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="login.html"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>后台管理</h2>
  <ul style="display:block">
    <li><a href="<?php echo U('Index/admin');?>" target="right"><span class="icon-caret-right"></span>用户管理</a></li>
    <li><a href="<?php echo U('Index/pass');?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <li><a href="page.html" target="right"><span class="icon-caret-right"></span>日志管理</a></li>  
    <li><a href="column.html" target="right"><span class="icon-caret-right"></span>回收站管理</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>前台管理</h2>
  <ul>
    <li><a href="<?php echo U('Index/cate');?>" target="right"><span class="icon-caret-right"></span>分类管理</a></li>        
    <li><a href="list.html" target="right"><span class="icon-caret-right"></span>读者管理</a></li>
    <li><a href="book.html" target="right"><span class="icon-caret-right"></span>评论管理</a></li>     
    <li><a href="book.html" target="right"><span class="icon-caret-right"></span>订单记录</a></li>     
    <li><a href="add.html" target="right"><span class="icon-caret-right"></span>积分管理</a></li>
    <li><a href="add.html" target="right"><span class="icon-caret-right"></span>出版社管理</a></li>
    <li><a href="adv.html" target="right"><span class="icon-caret-right"></span>活动链接管理</a></li>   
  </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo U('Index/index');?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo U('Index/admin');?>" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>