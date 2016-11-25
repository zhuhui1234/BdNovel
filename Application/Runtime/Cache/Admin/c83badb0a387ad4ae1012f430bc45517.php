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
<style>
   .inputstyle{
    width: 144px;
    height: 41px;
    cursor: pointer;
    font-size: 30px;
    outline: medium none;
    position: absolute;
    filter:alpha(opacity=0);
    -moz-opacity:0;
    opacity:0; 
    left:0px;
    top: 0px;
  }
</style>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Book/doadd');?>" enctype="multipart/form-data">  
      <div class="form-group">
        <div class="label">
          <label>书名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="bookname" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <select name="authorid" class="input w50">
            <?php if(is_array($author)): foreach($author as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["authorname"]); ?></option><?php endforeach; endif; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>出版社：</label>
        </div>
        <div class="field">
          <select name="pressid" class="input w50">
            <?php if(is_array($press)): foreach($press as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["pressname"]); ?></option><?php endforeach; endif; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;" value="" data-toggle="hover" data-place="right" data-image="" />
          <input type="file" name="bookpic" class="inputstyle" id="url2">
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label>文件：</label>
        </div>
        <div class="field">
          <input type="text" id="url3" name="img" class="input" style="width:25%; float:left;" value=""  data-image="" />
          <input type="file" name="filename" class="inputstyle" id="url4">
          <input type="button" class="button bg-blue margin-left" id="image2" value="+ 浏览上传"  style="float:left;">
        </div>
      </div>   
      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field">
          <select name="cateid" class="input w50">
            <?php if(is_array($type)): foreach($type as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["typename"]); ?></option><?php endforeach; endif; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="descr" style=" height:90px;"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>单价：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="price" value=""/>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>状态：</label>
        </div>
        <div class="field">
          <div style="margin-top:0px">
            <input type="radio" name="status" value="0" checked />新上架
            <input type="radio" name="status" value="1">在售
          </div>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  $('#image1').click(function(){
    $('#url2').trigger('click');
  });
  $('#image2').click(function(){
    $('#url4').trigger('click');
  });

  $(function() {
  $("#url2").click(function () {
     $("#url2").on("change",function(){
       var objUrl = getObjectURL(this.files[0]) ;  //获取图片的路径，该路径不是图片在本地的路径
       if (objUrl) {
         $("#url1").attr("data-image", objUrl) ;      //将图片路径存入data-image中，显示出图片
         $("#url1").attr("value", objUrl) ;      //将图片路径存入data-image中，显示出图片
       }
      });
    });
  });

  $(function() {
  $("#url4").click(function () {
     $("#url4").on("change",function(){
       var objUrl = getObjectURL(this.files[0]) ;  //获取图片的路径，该路径不是图片在本地的路径
       if (objUrl) {
         $("#url3").attr("data-image", objUrl) ;      //将图片路径存入data-image中，显示出图片
         $("#url3").attr("value", objUrl) ;      //将图片路径存入data-image中，显示出图片
       }
      });
    });
  });
 
  //建立一個可存取到該file的url
  function getObjectURL(file) {
    var url = null ;
    if (window.createObjectURL!=undefined) { // basic
      url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
      url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
      url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
  }
</script>
</body></html>