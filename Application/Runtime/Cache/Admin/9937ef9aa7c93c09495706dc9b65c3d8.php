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
  <div class="panel-head"><strong><span class="icon-key"></span> 修改头像</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Personal/doChangePic');?>" enctype="multipart/form-data">
      <input type="hidden" name="oldpicname" value="<?php echo ($pic); ?>">
      <div class="form-group">
        <div class="label">
          <label for="sitename">头像：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" class="input tips" style="width:25%; float:left;" value="" data-toggle="hover" data-place="right" data-image="" />
          <input type="file" name="pic" class="inputstyle" id="url2">
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">　　
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>    
        </div>
      </div>     
    </form>
  </div>
</div>


<script>
  $('#image1').click(function(){
    $('#url2').trigger('click');
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

<script src="/BdNovel/Public/js/jquery.min.js"></script>
<script src="/BdNovel/Public/js/bootstrap.min.js"></script>
</body>
</html>