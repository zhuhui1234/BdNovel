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



<block name="main">
<div class="panel admin-panel">
  	<div class="panel-head"><strong><span class="icon-key"></span> 分配权限</strong></div>
  	<div class="body-content">
  		<div class="form-group">
	  		<div class="label">
				<label for="sitename">
					给 <b><?php echo ($role["name"]); ?></b> 分配权限
				</label>
			</div>	
		</div>
		<form action="<?php echo U('Role/savenode');?>" method='post' class="form-x">
			<div class="form-group">

			<p style="width:800px;margin-left:30px">
				<?php if(is_array($nodes)): $i = 0; $__LIST__ = $nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="node[]"  value="<?php echo ($vo["id"]); ?>" <?php if(in_array($vo['id'],$ro_nodes) == true): ?>checked<?php endif; ?>><?php echo ($vo["name"]); ?>&nbsp;&nbsp;
					<?php if($i%4 == 0 ): ?><br><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</p>

		</div>
			<div class="form-group">
		        <div class="label">
		          <label></label>
		        </div>
		        <div class="field">
					<input type="hidden" name="rid" value="<?php echo ($role["id"]); ?>">
		          	<button class="button bg-main icon-check-square-o" type="submit"> 保存</button>
		        </div>
		    </div>
		</form>
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