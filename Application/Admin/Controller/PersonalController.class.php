<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;
use Vendor\ThinkImage\ThinkImage;

class PersonalController extends AdminController 
{  
    // 加载个人资料页面
    public function index(){
        $id = session('id');
        // var_dump($id); 
        $data = M('admin')->find($id);
        $this->data = $data;
        $this->display();
    }
    
	// 修改个人资料页面
    public function changeInfo()
    {
        $id = session('id');
        // var_dump($id); 
        $data = M('admin')->find($id);
        // var_dump($data);
        $this->data = $data;
        $this->display();
    }

    // 修改个人资料
    public function doChangeInfo(){
        if (empty($_POST)) {
            $this->redirect('Admin/Personal/info');
            exit;
        }
        //1.自己手动过滤POST数据
        //2.M('user')->data()  自动生成数据
        //3.推荐!
        //初始化
        $rules = array(
            array('adminname','require','用户名不能为空',0,'regex',1), 
            array('adminname','','帐号名称已经存在！',0,'unique',1), 
            array('phone','/^[1][3-8][0-9]+\d{8}/','联系电话格式不符合'), 
            array('email','email','邮箱格式不正确'),
        );

        $Admin = M('admin');
        if(!$Admin->validate($rules)->create()){
            $this->error($Admin->getError());
            exit;
        }

        //执行编辑
        if (M('admin')->save() > 0) {
           $this->success('恭喜您,修改成功!', U('Index/index'));
        } else {
           $this->error('修改失败....');
        }
    }

    // 修改密码页面
    public function changePass()
    {
        $id = session('id');
        // var_dump($id); 
        $data = M('admin')->find($id);
        $this->id = $data['id'];
        $this->adminname = $data['adminname'];
    	$this->display();
    }

    // 修改密码
    public function doChangePass(){
        // echo "修改密码";
        if(empty($_POST)){
             $this->redirect('Admin/Personal/pass');
        }
        $id = $_POST['id'];
        // var_dump($id); 
        $data = M('admin')->find($id);
        $pass = $data['password'];
        if ($pass != md5($_POST['mpass'])) {
            $this->error('请输入正确密码...');
            exit;
        }
        $map = [];
        $map['id'] = $id;
        $password = md5($_POST['newpass']);
        $data = M('admin')->where($map)->setField(array("password"=>"$password"));

        if ($data !== false) {
            session('id',null);
           $this->success('恭喜您,密码修改成功!', U('Index/index'));
        } else {
           $this->error('密码修改失败....');
        }
    }

    // 修改头像页面
    public function changePic()
    {   
        $id = session('id');
        // var_dump($id); 
        $data = M('admin')->find($id);
        $this->pic = $data['pic'];
    	$this->display();
    }

    // 修改头像
    public function doChangePic(){
        $dirname = "./Public/images/Admin/Index/";
        if(empty($_FILES)){
            $this->error('请选择上传的文件');
        }else{
            $pic = $_FILES['pic'];
            // var_dump($pic);
            // exit;
            $data= $this->upload();//调用upload函数,上传图片
            // var_dump($data);
            if(isset($data)){
                // var_dump($data);
                $image = new \Think\Image();
                $filename = $dirname.$data['pic']['savename'];
                $newfilename = $dirname.'s_'.$data['pic']['savename'];
                $data['pic']['savename'] = $data['pic']['savename'];
                $image->open("$filename");
                // 生成一个固定大小为150*150的缩略图并保存为thumb.jpg
                $image->thumb(100, 100,\Think\Image::IMAGE_THUMB_FIXED)->save("$newfilename");
                $bool = $this->up($data);//调用up函数,添加到数据库
                if($bool){
                    unlink($dirname.$_POST['oldpicname']);
                    unlink($dirname.'s_'.$_POST['oldpicname']);
                    $this->success('头像修改成功', U('Index/index'));
                }
            }else{
                $this->error('插入数据库失败');
            }
        }
    }
    
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/'; // 设置附件上传根目录
        $upload->subName = array();

        $upload->savePath = 'images/Admin/Index/'; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            return $info;
            // $this->success('上传成功！');
        }
    }

    public function up($data){
        $model = M('admin');
        // print_r($data);
        $pic = $data['pic']['savename'];
        $id = session('id');
        // var_dump($pic);
        // var_dump($id);
        $data = $model->where(array('id'=>$id))->setField(array('pic'=>"$pic"));
        if($data){
            return true;
        }else{
            return false;
        }
    }
}