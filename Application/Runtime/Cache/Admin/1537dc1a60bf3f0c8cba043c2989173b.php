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
<script src="/BdNovel/Public/js/jquery.js"></script>
<script src="/BdNovel/Public/js/pintuer.js"></script>
<link href="/BdNovel/Public/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

	<h1>
		分类管理
		<small>
			<i class="icon-double-angle-right"></i>
			 分类列表
		</small>
	</h1>


		<table class="table table-striped table-bordered table-hover">
			<thead>
			 <tr>
				<th>id</th>
				<th>分类名</th>
				<th>级别</th>
				<th>path</th>
				<th width="20%">操作</th>
			 </tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["html"]); echo ($vo["typename"]); ?></td>
					<td><?php echo ($vo['level'] + 1); ?>级分类</td>
					<td><?php echo ($vo["path"]); ?></td>
					<th>
						<a href="<?php echo U('Cate/add',array('pid'=>$vo['id']));?>" class="btn btn-success"> 添加 </a>
						<a href="<?php echo U('Cate/del',array('id'=>$vo['id']));?>" class="btn btn-danger"> 删除 </a>
					</th>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			
		
		</table>

</body>
<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
</html>