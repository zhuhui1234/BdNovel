<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends HomeController {
    public function index()
    {   
        // $this->getReadername();
        $Link = M('link');
        $list = $Link->order('id desc')->limit(5)->select();
        // var_dump($list);exit;
        $this->list = $list;
        $Book = M('book');
        $data = $Book->order('collect desc')->limit(14)->getfield('id,bookname,bookpic,price');
        $data1 = $Book->order('addtime desc')->limit(14)->getfield('id,bookname,bookpic,price');
        $data2 = $Book->order('totalclick desc')->limit(14)->getfield('id,bookname,bookpic,price');
        $press = M('press')->order('id desc')->limit(9)->getfield('id,pressname,pic');
        // echo "<pre>";
        // print_r($data);exit;
        $_GET['pressname'] = empty($_GET['pressname'])?'中信出版社':$_GET['pressname'];
        $pressname = '中信出版社';
        if ($_GET['pressname']) {
            $pressid = M('press')->where(array('pressname'=>$_GET['pressname']))->field('id')->find();
            $pressbook = $Book->where(array('pressid'=>$pressid['id']))->limit(3)->select();
        }else{
        }
        $this->press = $press;
        $this->pressname = $pressname;
        $this->pressbook = $pressbook;
        $this->data = $data;
        $this->data1 = $data1;
        $this->data2 = $data2;
        $this->title = '百度阅读_正版电子书在线阅读';
		$this->display();	
    }

    public function search()
    {
        $queryString = I('post.queryString');
        // var_dump($queryString);exit;
        $map = [];
        $map['bookname'] = array('like','%'.$queryString.'%');
        $arr = [];
        // $arr['authorname'] = array('like','%'.$queryString.'%');
        if(strlen($queryString)>0){
            $data = M('book')->where($map)->field('id,bookname')->limit(5)->select();
            // $data1 = M('author')->where($arr)->field('authorname')->limit(5)->select();
        }
        // if(!empty($data1)){
        //     $type1 = "a";
        //     // var_dump($data);exit;
        //     ajaxSearch($type1,$data1);
        // }
        if(!empty($data)){
            $type = 'b';
            // var_dump($data);exit;
            ajaxSearch($type,$data);
        }
    }
}