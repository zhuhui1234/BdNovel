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
<script src="/BdNovel/Public/js/jquery.js"></script>
<script src="/BdNovel/Public/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <table class="table table-hover text-center" id="tablelist">
    <tr>
      <th width="10%">ID</th>
      <th width="30%">图片</th>
      <th width="10%">标题</th>
      <th width="20%">链接</th>
      <th width="20%">操作</th>
    </tr>
    <?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($vo["id"]); ?></td>     
      <td><img src="/BdNovel/Upload/link/<?php echo ($vo["pic"]); ?>" alt="" width="150" height="75" /></td>     
      <td><?php echo ($vo["title"]); ?></td>
      <td><?php echo ($vo["url"]); ?></td>
      <td><div class="button-group"> <a class="button border-main" href='<?php echo U("edit?id=$vo[id]");?>'><span class="icon-edit"></span> 修改</a> <a class="button border-red" href='<?php echo U("del?id=$vo[id]");?>'><span class="icon-trash-o"></span> 删除</a> </div></td>
      </div></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<script type="text/javascript">

</script>

</body></html>