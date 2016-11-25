<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/BdNovel/Public/css/pintuer.css">
<link rel="stylesheet" href="/BdNovel/Public/css/admin.css">
<link rel="stylesheet" href="/BdNovel/Public/css/bootstrap.min.css">
<link rel="stylesheet" href="/BdNovel/Public/my.css">
<link rel="stylesheet" href="/BdNovel/Public/page.css">
<script src="/BdNovel/Public/js/jquery.js"></script>
<script src="/BdNovel/Public/js/pintuer.js"></script>
<link href="/BdNovel/Public/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div id="mian" class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 角色列表</strong></div>
    <div class="container">
    	<div class="row" style="margin-top:30px">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-6">
                <!-- <form action="<?php echo U('User/index');?>" method="get"> -->
                <div class="input-group">
                  <input type="text" id="name" value="" class="form-control" name="name" placeholder="搜索角色名称">
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
				<th>ID</th>
				<th>角色名</th>
				<th>说明</th>
				<th>状态</th>
				<!-- <th>拥有权限</th> -->
				<th>操作</th>
			</tr>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["remark"]); ?></td>
					<td><?php if($vo["status"] == 1): ?>启用<?php else: ?>禁用<?php endif; ?></td>
					<!-- <td width=200>
						<?php if(is_array($vo["node"])): $i = 0; $__LIST__ = $vo["node"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; echo ($va); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
					</td> -->
					<td>
						<a href="<?php echo U('Role/del',array('id'=>$vo['id']));?>">删除</a>
						<a href="<?php echo U('Role/edit',array('id'=>$vo['id']));?>">修改</a>
						<a href="<?php echo U('Role/nodelist',array('id'=>$vo['id']));?>">分配权限</a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
                <td colspan="9"><div class="pages" value="" id="pages"><?php echo ($page); ?></div></td>
            </tr>
		</table>
		</div>
	</div>
</div>

</body>
<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
<script>
    $('#go').click(function(){
        var where = $('#name').val();
        $.ajax({
            type:'get',
            url:'<?php echo U('Role/index');?>',
            data:"name="+where,
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
        // console.log(p);
        $.ajax({
            type:'get',
            url:'<?php echo U('Role/index');?>',
            data:"name="+where+"&p="+p,
            success:function(data){
                var $data = $(data);
                var target_div = $data.find("#tablelist");
                $('#tablelist').html(target_div);
            },
        })
    }
</script>
</html>