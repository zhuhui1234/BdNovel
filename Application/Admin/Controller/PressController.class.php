<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;
use Admin\Page;
use Vendor\ThinkImage\ThinkImage;

class PressController extends AdminController
{
	public function index()
	{	
		$press = M('press');
        $p = empty($_GET['p'])?1:$_GET['p'];
        $map = [];
        if(!empty($_GET['pressname'])){
            $map['pressname'] = array('like','%'.$_GET['pressname'].'%');
            $condition['pressname'] = $_GET['pressname'];
        }
        $list = $press->where($map)->page($p.',3')->select();
        // $list = $Admin->page(1,3)->select();
        $count = $press->where($map)->count();// 查询满足要求的总记录数
        $Page = getPage($count,3);// 实例化分页类 传入总记录数和每页显示的记录数
        foreach($condition as $key=>$val) {
             $Page->parameter[$key] = $val;
        }
        // var_dump($Page->parameter);
        $show = $Page->show();// 分页显示输出
        $this->assign('press',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
	}

	 // 删除
    public function del()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Press/index');
            exit;
        }
        $id = I('get.id/d');
        $search = M('book')->where(array('pressid'=>$id))->select();
        if($search){
            $this->error('该出版社已出版书籍，暂不能删！');
            exit;
        }
        $data = M('press')->field('pic')->where(array('id'=>$id))->find();
        unlink('./Upload/press/'.$data['pic']);
        unlink('./Upload/press/s_'.$data['pic']);
        if (M('press')->delete($id) > 0) {
           $this->success('恭喜您,删除成功!', U('index'));
        } else {
           $this->error('删除失败....', U('index'));
        }
    }

    public function add()
	{	
		$this->display();
	}

	public function doadd()
	{  
        $img = $this->insertImg($_FILES,'./Upload/press/','press/');
        $_POST['pic'] = $img['picname'];
        $_POST['addtime'] = time();
        M('press')->create();
        if (M('press')->add() > 0) {
            $this->success('添加成功',U('index'));
        } else {
            $this->error('添加失败');
        }
	}

	public function edit()
    {
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Press/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('press')->where(array("id"=>$id))->find();
        $this->assign('data',$data);
        $this->display();
    }

    public function update()
    {	
    	if(empty($_POST['id'])){
            echo '<h1>404</h1>';
            exit;
        }
        $id = I('post.id/d');
        if ($_FILES['pic']['error']!=4) {
            $img = $this->insertImg($_FILES,'./Upload/press/','press/');
            $_POST['pic'] = $img['picname'];
        }    
        $_POST['addtime'] = time();
        M('press')->create();
        if(M('press')->save() > 0 ){
            $this->success('修改成功',U('index'));
        } else {
            $this->error('修改失败',U('Press/edit?id='.$id));
        }
    }
}