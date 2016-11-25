<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;
use Vendor\ThinkImage\ThinkImage;

class IndexController extends AdminController 
{	 
	// 主页
    public function index()
    {
        if(empty(session('id'))){
            $this->redirect('Login/login');
            exit;
        }
        $id = session('id');
        // var_dump($id); 
        $data = M('admin')->find($id);
        $this->adminname = $data['adminname'];
        $this->pic = $data['pic'];
        $this->filename = "./Public/images/Admin/Index/s_".$this->pic;
        // var_dump($this->filename);
        $this->display();
    }

    public function main(){
        $this->display();
    }
}