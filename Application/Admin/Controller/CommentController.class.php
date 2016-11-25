<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Page;

class CommentController extends AdminController 
{
	public function index()
	{
		$Comment = M('comment');
		$p = I('get.p/d');
        $name = I('get.bookname');
        $p = empty($p)?1:$p;
        $map = [];
        if(!empty($name)){
            $map['bookname'] = array('like','%'.$name.'%');
            $condition['bookname'] = $name;
        }
		$data = $Comment->table('bd_book b,bd_reader r,bd_comment c')->where($map)->where('c.readerid=r.id and c.bookid=b.id')->field('c.id,b.bookname,r.readername,c.content,c.status')->order('c.id desc')->page($p.',5')->select();
		// var_dump($data);exit;
		$count = $Comment->table('bd_book b,bd_reader r,bd_comment c')->where($map)->where('c.readerid=r.id and c.bookid=b.id')->count();// 查询满足要求的总记录数
		// echo $count;exit;
        $Page = getPage($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
        foreach($condition as $key=>$val) {
             $Page->parameter[$key] = $val;
        }
        // var_dump($Page->parameter);
        $show = $Page->show();// 分页显示输出
		$this->data = $data;
		$this->assign('page',$show);
		$this->display();
	}

	// 禁用某条评论及其相关回复
    public function forbidden()
    {
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Comment/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M("comment")->where(array("id"=>$id))->setField(array("status"=>"1"));
        $data1 = M('reply')->where(array('commentid'=>$id))->setField(array('status'=>'1'));
        if (($data !== false) && ($data1 !== false)) {
           $this->success('该评论及其回复已封禁!', U('index'));
        } else {
           $this->error('失败....');
        }
    }

    // 解禁某条评论及其相关回复
    public function release()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Comment/index');
            exit;
        }
        $id = I('get.id/d');
        $data1 = M('reply')->where(array('commentid'=>$id))->setField(array('status'=>'0'));
        $count = M('reply')->where(array('commentid'=>$id))->count();
        $data = M("comment")->where(array("id"=>$id))->setField(array("status"=>"0","replynum"=>$count));
        if (($data !== false) && ($data1 !== false)) {
           $this->success('恭喜您,该评论及其回复已解禁!', U('index'));
        } else {
           $this->error('失败....');
        }
    }

    public function detail(){
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Comment/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('comment')->find($id);
        $list = M('reply')->where(array('commentid'=>$id))->select();
        $this->commentid = $id;
        $this->list = $list;
        $this->data = $data;
        $this->display();
    }

    // 禁用某条回复
    public function replyForbidden(){
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Comment/detail?id='.$_GET['commentid']);
            exit;
        }
        $data = I('get./d');
        $arr = M('comment')->where(array('id'=>$data['commentid']))->field('replynum')->select();
        // var_dump($arr);exit;
        $arr[0]['replynum'] -= 1;
        $bool = M('comment')->where(array('id'=>$data['commentid']))->setField(array('replynum'=>$arr[0]['replynum']));
        $bool1 = M('reply')->where(array('id'=>$data['id']))->setField(array("status"=>"1"));
        if(($bool !== false) && ($bool1 !== false)) {
        	$this->success('恭喜您,该回复已封禁!', U('detail',array('id'=>$data['commentid'])));
        } else {
           $this->error('失败....');
        }
    }

    // 解禁某条回复
    public function replyRelease(){
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Comment/detail?id='.$_GET['commentid']);
            exit;
        }
        $data = I('get./d');
        $arr = M('comment')->where(array('id'=>$data['commentid']))->field('replynum')->select();
        // var_dump($arr);exit;
        $arr[0]['replynum'] += 1;
        $bool = M('comment')->where(array('id'=>$data['commentid']))->setField(array('replynum'=>$arr[0]['replynum']));
        $bool1 = M('reply')->where(array('id'=>$data['id']))->setField(array("status"=>"0"));
        if(($bool !== false) && ($bool1 !== false)) {
        	$this->success('恭喜您,该回复已解禁!', U('detail',array('id'=>$data['commentid'])));
        } else {
           $this->error('失败....');
        }
    }
}