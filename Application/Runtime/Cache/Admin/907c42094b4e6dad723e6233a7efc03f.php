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
    left:-200px;
    top: 0px;

  }
</style>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Link/update');?>" enctype="multipart/form-data"> 
      <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"> 
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($data["title"]); ?>" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <img src="/BdNovel/Upload/link/<?php echo ($data["pic"]); ?>" alt="" class="margin-left" width="150" height="75" id="url1">
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
          <input type="file" name="pic" class="inputstyle" id="a1">
          <input type="hidden" name="oldpic" value="<?php echo ($data["pic"]); ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>url：</label>
        </div>
        <div class="field">
          <textarea class="input" name="url" style=" height:90px;"><?php echo ($data["url"]); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
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
          //通过点击浏览上传来自动触发
          $('#image1').click(function(){
             $('#a1').trigger('click');
          });
          $('#url1').click(function(){
             $('#a1').trigger('click');
          });

        $(function() {
          $("#a1").click(function () {
             $("#a1").on("change",function(){
               var objUrl = getObjectURL(this.files[0]) ;  //获取图片的路径，该路径不是图片在本地的路径
               if (objUrl) {
                 $("#url1").attr("src", objUrl) ;      //将图片路径存入data-image中，显示出图片
                 $("#url1").val(objUrl);
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

          $('#sub').click(function(){
            value = $('#price').val();
              if(isNaN(value)){
                return false;
            }
          });

          $('#price').blur(function(){
            value = $(this).val();
            if(!isNaN(value) && value!=null){
              $('#price').next().html('');
            }else {
              $('#price').next().css('color','red').html('请输入数字!');
            }
          })
</script>
</body></html>