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
    <script src="/BdNovel/Public/js/jquery.js"></script>
    <script src="/BdNovel/Public/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 后台用户信息</strong></div>
    <div class="container">
        <table class="table table-hover mt20 table-bordered table-hover">
            <tr>
                <th>Id</th>
                <th>用户名</th>
                <th>手机号</th>
                <th>邮箱</th>
                <th>添加时间</th>
                <th>登录时间</th>
                <th>等级</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["adminname"]); ?></td>
                <td><?php echo ($val["phone"]); ?></td>
                <td><?php echo ($val["email"]); ?></td>
                <td><?php echo ($val["addtime"]); ?></td>
                <td><?php echo ($val["logtime"]); ?></td>
                <td><?php if($val["level"] == '0'): ?>超级管理员
                    <?php else: ?>技术人员<?php endif; ?></td>
                <td><?php if($val["level"] == '0'): ?>正常
                    <?php else: ?>禁用<?php endif; ?></td>
                <td><button class="btn btn-danger">禁用</button></td>
            </tr><?php endforeach; endif; ?>
        </table>
    </div>
</div>
<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
</body>
</html>