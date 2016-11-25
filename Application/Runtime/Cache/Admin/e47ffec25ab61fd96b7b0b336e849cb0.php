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
  <div class="panel-head"><strong><span class="icon-key"></span> 修改个人资料</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Personal/doChangeInfo');?>">
      <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
      <div class="form-group">
        <div class="label">
          <label for="sitename">管理员帐号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="adminname" size="50" value="<?php echo ($data['adminname']); ?>" data-validate="required:请输入管理员账号" />   
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">联系电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="phone" name="phone" size="50" value="<?php echo ($data['phone']); ?>" data-validate="required:请输入联系电话" />       
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">电子邮箱：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="email" name="email" size="50" value="<?php echo ($data['email']); ?>" data-validate="required:请输入电子邮箱" />         
        </div>
      </div>  
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>   
          <button class="button bg-main icon-check-square-o" type="reset"> 重置</button>   
        </div>
      </div>      
    </form>
  </div>
</div>



<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
</body>
</html>