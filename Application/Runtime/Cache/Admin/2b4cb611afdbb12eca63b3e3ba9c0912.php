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



<div id="mian" class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 日志信息</strong></div>
    <div class="container">
        <!-- <div class="row" style="margin-top:30px">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                  <input type="text" id="name" value="" class="form-control" name="adminname" placeholder="搜索管理员账号">
                  <span class="input-group-btn">
                    <button id="go" class="btn btn-default" type="submit">Go!</button>
                  </span>
                </div>
            </div>
        </div> -->
        <div id="tablelist">
        <table class="table table-hover mt20 table-bordered table-hover">
            <tr>
                <th>Id</th>
                <th>用户名</th>
                <th>IP</th>
                <th>IP所在地</th>
                <th>登录时间</th>
                <th>浏览器及其版本</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["readername"]); ?></td>
                <td><?php echo ($val["ip"]); ?></td>
                <td><?php echo ($val["area"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$val["logtime"])); ?></td>
                <td><?php echo ($val["browser"]); ?></td>
                <td>
                    <a href="<?php echo U('Log/del',array('id'=>$val['id']));?>" class="btn btn-danger">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td colspan="9"><div class="pages" value="" id="pages"><?php echo ($page); ?></div></td>
            </tr>
        </table>
        </div>
    </div>
</div>

<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
<script>
    function user(page){
        var p = page;
        // var where = $('#name').val();
        // console.log(p);
        $.ajax({
            type:'get',
            url:'<?php echo U('Log/index');?>',
            data:"&p="+p,
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