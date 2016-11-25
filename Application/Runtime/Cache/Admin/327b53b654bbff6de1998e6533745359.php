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
  <div class="panel-head"><strong><span class="icon-key"></span> 评论详细信息</strong></div>
  <div class="body-content">
    <table class="table table-hover mt20 table-bordered">
      <tr>
        <td width="250px">评论标题：</td>
        <td><?php echo ($data["title"]); ?></td>
      </tr>
      <tr>
        <td>评论详细内容：</td>
        <td><?php echo ($data["content"]); ?></td>
      </tr>
      <tr>
      	<td>评论时间：</td>
      	<td><?php echo (date('Y-m-d H:i:s',$data["addtime"])); ?></td>
      </tr>
      <tr>
      	<td>回复数：</td>
      	<td><?php echo ($data["replynum"]); ?></td>
      </tr>
      <tr>
      	<td>点赞数：</td>
      	<td><?php echo ($data["likenum"]); ?></td>
      </tr>
    </table>
  </div>

  <div class="panel-head"><strong><span class="icon-key"></span> 相关回复</strong></div>
  <div class="body-content">
    <table class="table table-hover mt20 table-bordered">
      <tr>
        <td>回复内容：</td>
        <td width="250px">回复时间：</td>
        <td>回复状态：</td>
        <td>操作：</td>
      </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["replycontent"]); ?></td>
        <td><?php echo (date('Y-m-d H:i:s',$vo["replytime"])); ?></td>
        <td><?php if($vo["status"] == 0): ?>显示<?php else: ?>隐藏<?php endif; ?></td>
        <td>
        	<?php if($vo["status"] == '0'): ?><a href="<?php echo U('Comment/replyForbidden',array('id'=>$vo['id'],'commentid'=>$commentid));?>" class="btn btn-danger">禁用</a>
        	<?php else: ?><a href="<?php echo U('Comment/replyRelease',array('id'=>$vo['id'],'commentid'=>$commentid));?>" class="btn btn-success">解禁</a><?php endif; ?>
        </td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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