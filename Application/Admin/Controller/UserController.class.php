<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller 
{   
    // 禁用
    public function forbidden()
    {
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Index/admin');
            exit;
        }
        $id = I('get.id/d');
        $data = M("admin")->where(array("id"=>$id))->setField(array("status"=>"1"));
        
        if ($data !== false) {
           $this->success('恭喜您,禁用成功!', U('Index/admin'));
        } else {
           $this->error('失败....');
        }
    }

    // 解禁
    public function release()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Index/admin');
            exit;
        }
        $id = I('get.id/d');
        $data = M("admin")->where(array("id"=>$id))->setField(array("status"=>"0"));
        
        if ($data !== false) {
           $this->success('恭喜您,解禁成功!', U('Index/admin'));
        } else {
           $this->error('失败....');
        }
    }

    // 删除
    public function del()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Index/admin');
            exit;
        }
        $id = I('get.id/d');
        if (M('admin')->delete($id) > 0) {
           $this->success('恭喜您,删除成功!', U('Index/admin'));
        } else {
           $this->error('删除失败....', U('Index/admin'));
        }
    }
}