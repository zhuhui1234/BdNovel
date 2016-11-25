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


<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 添加节点</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Node/doadd');?>">
      <div class="form-group">
        <div class="label">
          <label for="sitename">节点名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="mpass" name="name" size="50" placeholder="节点名" data-validate="required:请输入节点名" /> 
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">控制器：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="mname" size="50" placeholder="" data-validate="required:请输入控制器名" />       
        </div>
      </div>  
      <div class="form-group">
        <div class="label">
          <label for="sitename">操作：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="aname" size="50" placeholder="" data-validate="required:请输入操作方法名" />       
        </div>
      </div>     
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
			    <input type="radio" name="status" value="1" checked>启用
			    <input type="radio" name="status" value="0" >禁用
		    </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 添加</button>   
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
            url:'<?php echo U('Node/index');?>',
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
            url:'<?php echo U('Node/index');?>',
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