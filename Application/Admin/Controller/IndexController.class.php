<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller 
{	
	// 主页
    public function index(){
       $this->display();
    }

    // 后台用户管理
    public function admin(){
    	$Admin = M("admin");
    	$data = $Admin->select();
    	$this->assign("data",$data);
    	$this->display();
    }

    // 修改密码
    public function pass(){
    	$this->display();
    }

    // 分类
    public function cate(){
    	$type = M("type");
    	$data = $type->select();
    	$this->assign("data",$data);
    	$this->display();
    }
}