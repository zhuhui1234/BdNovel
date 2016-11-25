<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;
use Vendor\ThinkImage\ThinkImage;

class LinkController extends AdminController
{
	public function index()
	{	
		$author = M('link');
        $list = $author->limit(0,5)->select();
        $this->assign('link',$list);// 赋值数据集
        $this->display(); // 输出模板
	}

	 // 删除
    public function del()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Link/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('link')->field('pic')->where(array('id'=>$id))->find();
        unlink('./Upload/link/'.$data['pic']);
        unlink('./Upload/link/s_'.$data['pic']);
        if (M('link')->delete($id) > 0) {
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
        $img = $this->insertImg($_FILES,'./Upload/link/','link/');
        $_POST['pic'] = $img['picname'];
        M('link')->create();
        if (M('link')->add() > 0) {
            $this->success('添加成功',U('index'));
        } else {
            $this->error('添加失败');
        }
	}

	public function edit()
    {   
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Link/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('link')->where(array("id"=>$id))->find();
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
            $img = $this->insertImg($_FILES,'./Upload/link/','link/');
            $_POST['pic'] = $img['picname'];
        }    
        M('link')->create();
        if(M('link')->save() > 0 ){
            $this->success('修改成功',U('index'));
        } else {
            $this->error('修改失败',U('Link/edit?id='.$id));
        }
    }
}