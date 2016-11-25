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
  <div class="panel-head"><strong><span class="icon-key"></span> 个人资料</strong></div>
  <div class="body-content">
    <table class="table table-hover mt20 table-bordered">
      <tr>
        <th width="180px">管理员帐号：</th>
        <td><?php echo ($data['adminname']); ?></td>
      </tr>
      <tr>
        <th>联系电话：</th>
        <td><?php echo ($data['phone']); ?></td>
      </tr>
      <tr>
        <th>电子邮箱：</th>
        <td><?php echo ($data['email']); ?></td>
      </tr>
      <tr>
        <th>注册时间：</th>
        <td><?php echo (date('Y-m-d H:i:s',$data['addtime'])); ?></td>
      </tr>
      <tr>
        <th>登录时间：</th>
        <td><?php echo (date('Y-m-d H:i:s',$data['logtime'])); ?></td>
      </tr>
    </table>
  </div>
</div>



<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
</body>
</html>