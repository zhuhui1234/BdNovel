<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Page;

class ReaderController extends AdminController 
{   
    // 前台读者管理首页
    public function index()
    {
        $Reader = M('reader');
        $p = I('get.p/d');
        $name = I('get.readername');
        $p = empty($p)?1:$p;
        $map = [];
        if(!empty($name)){
            $map['readername'] = array('like','%'.$name.'%');
            $condition['readername'] = $name;
        }
        $list = $Reader->where($map)->page($p.',5')->select();
        // $list = $Admin->page(1,3)->select();
        $count = $Reader->where($map)->count();// 查询满足要求的总记录数
        $Page = getPage($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
        foreach($condition as $key=>$val) {
             $Page->parameter[$key] = $val;
        }
        // var_dump($Page->parameter);
        $show = $Page->show();// 分页显示输出
        $this->assign('data',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function detail(){
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Reader/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('reader')->find($id);
        $this->data = $data;
        $this->display();
    }

    // 禁用
    public function forbidden()
    {
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Reader/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M("reader")->where(array("id"=>$id))->setField(array("status"=>"1"));
        
        if ($data !== false) {
           $this->success('恭喜您,禁用成功!', U('index'));
        } else {
           $this->error('失败....');
        }
    }

    // 解禁
    public function release()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Reader/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M("reader")->where(array("id"=>$id))->setField(array("status"=>"0"));
        
        if ($data !== false) {
           $this->success('恭喜您,解禁成功!', U('index'));
        } else {
           $this->error('失败....');
        }
    }
}