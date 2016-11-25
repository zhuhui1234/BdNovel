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



	<div class="row">
		<div class="col-md-12">
			<p>
				给 <b><?php echo ($users["username"]); ?></b> 分配权限
			</p>
			
			<form action="<?php echo U('User/saverole');?>" method='post'>
			<p style="width:600px">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="role[]"  value="<?php echo ($vo["id"]); ?>" <?php if(in_array($vo['id'],$role) == true): ?>checked<?php endif; ?>><?php echo ($vo["name"]); ?>
					&nbsp;
					&nbsp;
					&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			</p>
			<input type="hidden" name="uid" value="<?php echo ($users["id"]); ?>">
			<input type="submit" value="保存" class="btn btn-primary">

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