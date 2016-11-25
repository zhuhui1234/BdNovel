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
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 评论列表</strong></div>
    <div class="container">
        <div class="row" style="margin-top:30px">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-6">
                <!-- <form action="<?php echo U('User/index');?>" method="get"> -->
                <div class="input-group">
                  <input type="text" id="name" value="" class="form-control" name="bookname" placeholder="搜索书名">
                  <span class="input-group-btn">
                    <button id="go" class="btn btn-default" type="submit">Go!</button>
                  </span>
                </div><!-- /input-group -->
                <!-- </form> -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div id="tablelist">
        <table class="table table-hover mt20 table-bordered table-hover">
            <tr>
                <th>Id</th>
                <th>书名</th>
                <th>读者名</th>
                <th>评论</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["bookname"]); ?></td>
                <td><?php echo ($val["readername"]); ?></td>
                <td><span style="display:block;width:150px;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;"><?php echo ($val["content"]); ?></span></td>
                <td><?php if($val["status"] == 0): ?>显示<?php else: ?>隐藏<?php endif; ?></td>
                <td>
                    <a href="<?php echo U('Comment/detail',array('id'=>$val['id']));?>" class="btn btn-success">详情</a>
                    <?php if($val["status"] == '0'): ?><a href="<?php echo U('Comment/forbidden',array('id'=>$val['id']));?>" class="btn btn-danger">禁用</a>
                    <?php else: ?><a href="<?php echo U('Comment/release',array('id'=>$val['id']));?>" class="btn btn-success">解禁</a><?php endif; ?>
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
    $('#go').click(function(){
        var where = $('#name').val();
        $.ajax({
            type:'get',
            url:'<?php echo U('Comment/index');?>',
            data:"bookname="+where,
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
            url:'<?php echo U('Comment/index');?>',
            data:"bookname="+where+"&p="+p,
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