<?php if (!defined('THINK_PATH')) exit();?><script type="Text/Javascript" language="JavaScript"> 
    if (window.top != window)
    {
        window.top.location.href = document.location.href;
    }
</script>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="/BdNovel/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/BdNovel/Public/css/pintuer.css">
    <link rel="stylesheet" href="/BdNovel/Public/css/admin.css">
    <script src="/BdNovel/Public/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="<?php if(($pic != "") and (file_exists($filename))): ?>/BdNovel/Public/images/Admin/Index/s_<?php echo ($pic); else: ?>/BdNovel/Public/images/Admin/Index/y.jpg<?php endif; ?>" class="radius-circle rotate-hover" height="50" alt="" />欢迎：<b><?php echo ($adminname); ?></b>　　　　　　　　　　　　　　　　后台管理中心</h1>
  </div>
  <!-- <div><h1>后台管理中心</h1></div> -->
  <div class="head-l" style="float:right;margin-right:50px"><a class="button button-little bg-green" href="<?php echo U('Home/Index/index');?>" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo U('Login/logout');?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>&nbsp;后台用户管理</h2>
  <ul>
    <li><a href="<?php echo U('User/index');?>" target="right"><span class="icon-caret-right"></span>用户列表</a></li>           
    <li><a href="<?php echo U('User/add');?>" target="right"><span class="icon-caret-right"></span>添加用户</a></li> 
  </ul>  
  <h2><span class="icon-info-circle"></span>个人资料管理</h2>
  <ul>
    <li><a href="<?php echo U('Personal/index');?>" target="right"><span class="icon-caret-right"></span>个人资料</a></li>
    <li><a href="<?php echo U('Personal/changePass');?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li> <li><a href="<?php echo U('Personal/changeInfo');?>" target="right"><span class="icon-caret-right"></span>修改个人信息</a></li> <li><a href="<?php echo U('Personal/changePic');?>" target="right"><span class="icon-caret-right"></span>修改头像</a></li>
  </ul>  
  
   
  <h2><span class="icon-reorder"></span>订单管理</h2>
  <ul>          
    <li><a href="<?php echo U('Orders/index');?>" target="right"><span class="icon-caret-right"></span>订单列表</a></li> 
  </ul>
  <h2><span class="icon-comments"></span>评论管理</h2>
  <ul>
    <li><a href="<?php echo U('Comment/index');?>" target="right"><span class="icon-caret-right"></span>评论列表</a></li>
  </ul>
  <h2><span class="icon-users"></span>读者管理</h2>
  <ul>
    <li><a href="<?php echo U('Reader/index');?>" target="right"><span class="icon-caret-right"></span>读者列表</a></li>
  </ul>
  <h2><span class="icon-random"></span>活动链接</h2>
  <ul>
    <li><a href="<?php echo U('Link/index');?>" target="right"><span class="icon-caret-right"></span>活动链接列表</a></li>
    <li><a href="<?php echo U('Link/add');?>" target="right"><span class="icon-caret-right"></span>添加活动链接</a></li>
  </ul>
  <h2><span class="icon-tags"></span>分类管理</h2>
  <ul>
    <li><a href="<?php echo U('Cate/index');?>" target="right"><span class="icon-caret-right"></span>分类列表</a></li> <li><a href="<?php echo U('Cate/treeList');?>" target="right"><span class="icon-caret-right"></span>分类树列表</a></li> <li><a href="<?php echo U('Cate/add');?>" target="right"><span class="icon-caret-right"></span>分类添加</a></li>
  </ul>
  <h2><span class="icon-book"></span>书籍管理</h2>
  <ul>
    <li><a href="<?php echo U('Book/index');?>" target="right"><span class="icon-caret-right"></span>书籍列表</a></li>
    <li><a href="<?php echo U('Book/add');?>" target="right"><span class="icon-caret-right"></span>书籍添加</a></li>
  </ul>
  <h2><span class="icon-pencil"></span>&nbsp;作者管理</h2>
  <ul>
    <li><a href="<?php echo U('Author/index');?>" target="right"><span class="icon-caret-right"></span>作者列表</a></li> <li><a href="<?php echo U('Author/add');?>" target="right"><span class="icon-caret-right"></span>添加作者</a></li>
  </ul>
  <h2><span class=" icon-align-justify"></span>出版社管理</h2>
  <ul>
    <li><a href="<?php echo U('Press/index');?>" target="right"><span class="icon-caret-right"></span>出版社列表</a></li> <li><a href="<?php echo U('Press/add');?>" target="right"><span class="icon-caret-right"></span>添加出版社</a></li>
  </ul>
  <h2><span class="icon-pencil-square-o"></span>角色管理</h2>
  <ul>
    <li><a href="<?php echo U('Role/index');?>" target="right"><span class="icon-caret-right"></span>角色列表</a></li> <li><a href="<?php echo U('Role/add');?>" target="right"><span class="icon-caret-right"></span>角色添加</a></li>
  </ul>
  <h2><span class="icon-list-alt"></span>节点管理</h2>
  <ul>
    <li><a href="<?php echo U('Node/index');?>" target="right"><span class="icon-caret-right"></span>节点列表</a></li> <li><a href="<?php echo U('Node/add');?>" target="right"><span class="icon-caret-right"></span>节点添加</a></li>
  </ul>
  <h2><span class="icon-pencil-square-o"></span>日志管理</h2>
  <ul>
    <li><a href="<?php echo U('Log/index');?>" target="right"><span class="icon-caret-right"></span>日志列表</a></li>                      
  </ul> 
  <h2><span class="icon-recycle"></span>回收站管理</h2>
  <ul>
    <li><a href="<?php echo U('Recycle/index');?>" target="right"><span class="icon-caret-right"></span>回收站列表</a></li>                      
  </ul>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
    $(this).parent().children("ul").hide(200);
    $(this).parent().children('h2').css("color","black");
    $(this).css("color","#09c");
    if($(this).attr('class') == 'on'){
      $(this).removeClass("on");
    }else{
      $(this).parent().children('h2').removeClass("on");
	    $(this).next().slideToggle(200);	
      $(this).addClass("on");
    }
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		  $(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo U('Index/main');?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">个人资料</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo U('Index/main');?>" name="right" width="100%" height="100%"></iframe>
</div>
<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
</body>
</html>