<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;
use Admin\Page;

class RecycleController extends AdminController
{	
	public function index()
	{
        $p = empty($_GET['p'])?1:$_GET['p'];
		$book = M('recycle');
		$map1['pid'] = array('neq','0');
        $cate = M('cate')->field('id,typename')->where($map1)->select();
        $map = [];
        if(!empty($_GET['bookname'])){
            $map['bookname'] = array('like','%'.$_GET['bookname'].'%');
            $condition['bookname'] = $_GET['bookname'];
        }
        if($_GET['cateid'] != 0){
            $map['cateid'] = array('eq',$_GET['cateid']);
            $condition['cateid'] = $_GET['cateid'];
        }
        $data = $book->table('bd_recycle r,bd_cate c')->where('r.cateid=c.id')->where($map)->field('r.id,r.bookname,r.bookpic,r.status,r.addtime,c.typename')->page($p.',3')->select();
        $count = $book->where($map)->count();// 查询满足要求的总记录数
        $Page = getPage($count,3);// 实例化分页类 传入总记录数和每页显示的记录数
        foreach($condition as $key=>$val) {
             $Page->parameter[$key] = $val;
        }
        $show = $Page->show();// 分页显示输出
        $this->assign('cate',$cate);
        $this->assign('book',$data);
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); 
    }

    // 还原
    public function reduction()
    {
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Recycle/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('recycle')->where(array('id'=>$id))->find();
        if (M('recycle')->delete($id) > 0) {
            $_POST = $data;
        	$_POST['id'] = $_POST['bookid'];
        	$_POST['bookid'] = '';
            M('book')->create();
            M('book')->add();
            $this->success('恭喜您,还原成功!', U('Recycle/index'));
        } else {
            $this->error('还原失败....', U('Recycle/index'));
        }
    }

    // 删除
    public function del()
    {	
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Recycle/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('recycle')->field('bookid,bookpic,filename')->where(array('id'=>$id))->find();
        $bookid = $data['bookid'];
        unlink('./Upload/book/'.$data['bookpic']);
        unlink('./Upload/book/s_'.$data['bookpic']);
        unlink('./Upload/novel/'.$data['filename']);
        $this->deldir("./Upload/novel/$bookid");
        if (M('recycle')->delete($id) > 0) {
           $this->success('恭喜您,删除成功!', U('index'));
        } else {
           $this->error('删除失败....', U('index'));
        }
    }

    protected function deldir($dir)
    {
        //先删除目录下的文件：
        $dh=opendir($dir);
        while ($file=readdir($dh)) {
          if($file!="." && $file!="..") {
            $fullpath=$dir."/".$file;
            if(!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
          }
        }
        
        closedir($dh);
        //删除当前文件夹：
        if(rmdir($dir)) {
          return true;
        } else {
          return false;
        }
    }

}