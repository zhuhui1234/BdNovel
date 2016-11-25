<?php  
namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller
{
    //初始化的方法
    public function _initialize(){

        //判断session是否存在
        if(empty($_SESSION['id'])){
            //跳转到 登陆页
            $this->redirect("Login/login");
        }

        //V($_SESSION);

        //权限过滤
        $mname = CONTROLLER_NAME; //获取控制器名
        $aname = ACTION_NAME; //获取方法名

        // echo $mname.'/'.$aname;
        // var_dump($_SESSION);
        $nodelist = $_SESSION['admin_user']['nodelist']; //获取权限列表
        // var_dump($nodelist);
        // exit;

        //V($_SESSION);
        //让超级管理员admin拥有所有权限
        if($_SESSION['id'] != 1){
            //验证操作权限
            if(empty($nodelist[$mname]) || !in_array($aname,$nodelist[$mname])){
                
                $this->error("抱歉！没有操作权限！");
                exit;
            }

        }

    }
    
	// 定位到空操作方法时执行
	public function _empty($name){
		$this->display('Public/index');
	}

	// 生成验证码
    public function yzm()
    {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 25;
        $Verify->length = 1;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 200;
        $Verify->imageH = 50;
        $Verify->entry();
    }

    public function upload($path){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728000000 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Upload/'; // 设置附件上传根目录
        $upload->subName = array();

        $upload->savePath = $path; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            return $info;
        }
    }

    public function insertImg($file,$dirname,$path)
    {
        if(empty($file)){
            $this->error('请选择上传的文件');
        }else{
            $pic = $file['pic'];
            $data= $this->upload($path);//调用upload函数,上传图片
            // var_dump($data);exit;
            if(isset($data)){
                $image = new \Think\Image();
                $filename = $dirname.$data['pic']['savename'];
                // var_dump($filename);
                $newfilename = $dirname.'s_'.$data['pic']['savename'];
                $data['pic']['savename'] = $data['pic']['savename'];
                $image->open("$filename");
                $image->thumb(100, 100)->save("$newfilename");
                $img['picname'] = $data['pic']['savename'];
                if($_POST['oldpic']) {
                    unlink($dirname.$_POST['oldpic']);
                    unlink($dirname.'s_'.$_POST['oldpic']);
                }
                return $img;
            }
        }
    }
}