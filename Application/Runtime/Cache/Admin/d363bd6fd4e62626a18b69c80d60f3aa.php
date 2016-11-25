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
  <div class="panel-head"><strong><span class="icon-key"></span> 添加读者</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Reader/doadd');?>">
      <input type="hidden" name="addtime" value="<?php echo ($addtime = time()); ?>">
      <div class="form-group">
        <div class="label">
          <label for="sitename">读者帐号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="readername" placeholder="请输入读者账号" size="50" value="<?php echo ($readername); ?>" data-validate="required:请输入读者账号" />   
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" id="password" name="password" placeholder="请输入密码" size="50" value="<?php echo ($phone); ?>" data-validate="required:请输入密码,length#>=5:密码不能小于5位" />       
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label for="sitename">性别：</label>
        </div>
        <div class="field">
          <input type="radio" value="0" name="sex" checked>女       
          <input type="radio" value="1" name="sex">男       
          <input type="radio" value="2" name="sex">保密       
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label for="sitename">手机号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="phone" placeholder="请输入手机号码" size="50" value="<?php echo ($phone); ?>" data-validate="required:请输入手机,length#=11:密码不能小于5位" />       
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label for="sitename">邮箱：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="email" placeholder="请输入邮箱" size="50" value="<?php echo ($email); ?>" data-validate="required:请输入邮箱,length#>=5:密码不能小于5位" />       
        </div>
      </div>     
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 添加</button>   
          <button class="button bg-main icon-check-square-o" type="reset"> 重置</button>   
        </div>
      </div>      
    </form>
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