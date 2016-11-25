<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="/BdNovel/Public/css/pintuer.css">
    <link rel="stylesheet" href="/BdNovel/Public/css/admin.css">
    <link rel="stylesheet" href="/BdNovel/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/BdNovel/Public/my.css">
    <link rel="stylesheet" href="/BdNovel/Public/page.css">
    <script src="/BdNovel/Public/js/jquery.js"></script>
    <script src="/BdNovel/Public/js/pintuer.js"></script>
</head>
<body>



<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 读者详细信息</strong></div>
  <div class="body-content">
    <table class="table table-hover mt20 table-bordered">
      <tr>
        <td>账号：</td>
        <td><?php echo ($data["readername"]); ?></td>
      </tr>
      <tr>
        <td>联系方式：</td>
        <td><?php echo ($data["phone"]); ?></td>
      </tr>
      <tr>
      	<td>电子邮箱：</td>
      	<td><?php echo ($data["email"]); ?></td>
      </tr>
      <tr>
      	<td>电子邮箱：</td>
      	<td><?php echo ($data["email"]); ?></td>
      </tr>
      <tr>
      	<td>性别：</td>
      	<td>
      		<?php if($data["sex"] == 0): ?>女
      			<?php elseif($data["sex"] == 1): ?>男
      			<?php else: ?>保密<?php endif; ?>
      	</td>
      </tr>
      <tr>
      	<td>个人描述：</td>
      	<td>
      		<?php if($data["descr"] == ''): ?>这个家伙很懒，什么都没有留下~~
      			<?php else: echo ($data["descr"]); endif; ?>
      	</td>
      </tr>
      <tr>
      	<td>积分：</td>
      	<td>
      		<?php echo ($data["integ"]); ?>
      	</td>
      </tr>
      <tr>
      	<td>注册时间：</td>
      	<td><?php echo (date('Y-m-d H:i:s',$data["addtime"])); ?></td>
      </tr>
      <tr>
      	<td>最后一次登录：</td>
      	<td><?php echo (date('Y-m-d H:i:s',$data["logtime"])); ?></td>
      </tr>
    </table>
  </div>
</div>

<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
<script>
    $('#go').click(function(){
        var where = $('#name').val();
        $.ajax({
            type:'get',
            url:'<?php echo U('User/index');?>',
            data:"adminname="+where,
            success:function(data){
                var $data = $(data);
                var target_div = $data.find("#tablelist");
                $('#tablelist').html(target_div);
            },
        })
    })

    function user(page){
        var p = page;
        var where = $('#name').val();
        console.log(p);
        $.ajax({
            type:'get',
            url:'<?php echo U('User/index');?>',
            data:"adminname="+where+"&p="+p,
            success:function(data){
                var $data = $(data);
                var target_div = $data.find("#tablelist");
                $('#tablelist').html(target_div);
            },
        })
    }
</script>
</body>
</html>