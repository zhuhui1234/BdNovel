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
			 分类添加
		</small>
	</h1>



	<form action="<?php echo U('Cate/doadd');?>" method="post" class='col-md-4'>		
		<div class="form-group">
		<label for="#" class="">添加分类名称：</label>
		  <div class="input-group">
		  	 <input type="text" name="typename" class="form-control" aria-label="Amount (to the nearest dollar)">
			  
			  <span class="input-group-btn">
			  	<button class="btn btn-primary">添加</button>
			  </span>
			  
		  </div>
		</div>
		 <input type="hidden" name="pid" value="<?php if(isset($_GET['pid'])): echo ($_GET['pid']); else: ?>0<?php endif; ?>">

	</form>
	
</body>
<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
</html>