<?php
namespace Home\Controller;
use Think\Controller;
class LinkController extends HomeController 
{
	public function link1(){
        // $this->getReadername();
        $this->pic = I('get.pic');
        $Book = M('book');
        $data = $Book->table('bd_book b,bd_author a')->where('b.authorid=a.id')->field('b.id,b.bookpic,b.bookname,b.price,a.authorname')->order('b.id desc')->select();
        // var_dump($data);exit;
        foreach ($data as $k => $val) {
        	$count = M('shopcar')->where(array('bookid'=>$val['id'],'readerid'=>$_SESSION['reader_id']))->count();
            $count1 = M('bookshelf')->where(array('bookid'=>$val['id'],'readerid'=>$_SESSION['reader_id'],'status'=>'0'))->count();
        	// var_dump($count);
        	$data[$k]['count'] = $count;
            $data[$k]['count1'] = $count1;
        }
        // var_dump($data);
        // exit;
        $this->data = $data;
        $this->display('index');
    }
}