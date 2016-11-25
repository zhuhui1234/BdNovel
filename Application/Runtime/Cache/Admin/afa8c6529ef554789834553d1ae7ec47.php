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
<link rel="stylesheet" href="/BdNovel/Public/page.css">
<script src="/BdNovel/Public/js/jquery.js"></script>
<script src="/BdNovel/Public/js/pintuer.js"></script>
</head>
<body>
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('Book/add');?>"> 添加内容</a> </li>
         <li>搜索：</li>
        <li>分类
          <select  id="cateid" name="cateid" class="input" style="width:160px; line-height:17px; display:inline-block">
            <option value="0">选择分类</option>
            <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </li>
        <li>
          <input id="bookname" value="" type="text" placeholder="请输入书名关键字" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <button id="search" class="button border-main icon-search" type="submit"> 搜索</button>
      	</li>
      </ul>
    </div>
    <table class="table table-hover text-center" id="tablelist">
      <tr>
        <th width="10%" style="text-align:center; padding-left:20px;">ID</th>
        <th width="10%">书名</th>
        <th>图片</th>
        <th>属性</th>
        <th>分类名称</th>
        <th width="10%">添加时间</th>
        <th width="310">操作</th>
      </tr>   
      <?php if(is_array($book)): $i = 0; $__LIST__ = $book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <td><?php echo ($vo["id"]); ?></td>
          <td><?php echo ($vo["bookname"]); ?></td>
          <td width="10%"><img src="/BdNovel/Upload/book/<?php echo ($vo["bookpic"]); ?>" alt="" width="90" height="120" /></td>
          <td>
            <?php if($vo["status"] == 0): ?><font color="red">新上架</font><?php endif; ?>
            <?php if($vo["status"] == 1): ?><font color="red">在售</font><?php endif; ?>
            <?php if($vo["status"] == 2): ?><font color="#00CC99">下架</font><?php endif; ?>    
          </td>
          <td><?php echo ($vo["typename"]); ?></td>
          <td><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
          <td><div class="button-group"> <a class="button border-main" href='<?php echo U("edit?id=$vo[id]");?>'><span class="icon-edit"></span> 修改</a> <a class="button border-red" href='<?php echo U("Book/del?id=$vo[id]");?>'><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	<tr>
            <td colspan="8"><div class="pages" value="" id="pages"><?php echo ($page); ?></div></td>
    	</tr>
    </table>
  </div>
<script>
    $('#search').click(function(){
        var where = $('#bookname').val();
        $.ajax({
            type:'get',
            url:'<?php echo U('Book/index');?>',
            data:"bookname="+where+"&cateid="+cateid,
            success:function(data){
                var $data = $(data);
                var target_div = $data.find("#tablelist");
                $('#tablelist').html(target_div);
            },
        })
    })

    function user(page){
        var p = page;
        var where = $('#bookname').val();        
        $.ajax({
            type:'get',
            url:'<?php echo U('Book/index');?>',
            data:"bookname="+where+"&p="+p+"&cateid="+cateid,
            success:function(data){
                var $data = $(data);
                var target_div = $data.find("#tablelist");
                $('#tablelist').html(target_div);
            },
        })
    }

    $('#cateid').change(function(){
    	var cateid = $(this).val();
    	var where = $('#bookname').val();
    	$.ajax({
    		type:'get',
            url:'<?php echo U('Book/index');?>',
            data:"bookname="+where+"&cateid="+cateid,
            success:function(data){
                var $data = $(data);
                var target_div = $data.find("#tablelist");
                $('#tablelist').html(target_div);
        	},
        })
    })

// //单个删除
// function del(id,mid,iscid){
// 	if(confirm("您确定要删除吗?")){
		
// 	}
// }

//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}
</script>
</body>
</html>