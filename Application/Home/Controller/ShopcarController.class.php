<?php
namespace Home\Controller;
use Think\Controller;
class ShopcarController extends HomeController 
{
	public function index()
	{	
        // $this->getReadername();
        if(!empty($_GET['delid'])){
            var_dump($_GET);
        	$delid = I('get.delid');
            $delid = explode(',',$delid);
            foreach ($delid as $val) {
    	       $bool = M('shopcar')->where(array('id'=>$val))->delete();
            }
        }
        if(!empty(session('reader_id'))){
        	$count = M('shopcar')->where(array('readerid'=>$_SESSION['reader_id']))->count();
        	$list = M('shopcar')->where(array('readerid'=>$_SESSION['reader_id']))->select();
        	// var_dump($list);exit;
        	foreach ($list as $val) {
        		$arr = M('book')->table('bd_book b,bd_author a')->where(array('b.id'=>$val['bookid']))->where('b.authorid=a.id')->field('b.id,b.bookname,b.price,b.bookpic,a.authorname')->select();
        		// echo $arr;
        		$arr[0]['cid'] = $val['id'];
        		$data[] = $arr;
        		$totalprice += $arr[0]['price'];
        	}
        }
        $this->count = $count;
        // var_dump($data);exit;
        $this->totalprice = $totalprice;
        $this->data = $data;
        $this->title = '购物车_正版电子书在线阅读';
		$this->display();	
    }

    public function add()
    {
        $bookid = I('post.bookid/d');
        $readerid = I('session.reader_id/d');
        if (!$readerid) {
            exit;
        }
        $_POST['bookid'] = $bookid;
        $_POST['readerid'] = $readerid;
        M('shopcar')->create();
        M('shopcar')->add();
    }

    public function doorder(){
        // var_dump($_POST);
        $data['total'] = I('post.total');
        $data['addtime'] = time();
        $data['readerid'] = session('reader_id');
        $Orders = M('orders');
        $Orders->create($data);
        $bool = $Orders->add();
        if($bool) {
            $strid = I('post.arrid');
            $arrid = explode(',',$strid);
            // var_dump($arrid);
            foreach ($arrid as $val) {
                M('shopcar')->where(array('id'=>$val))->delete();
            }
            $orderid = $Orders->where(array('addtime'=>$data['addtime']))->field('id')->select();
            $str = I('post.arr');
            $str = rtrim($str,'*');
            $arr = explode('*,',$str);
            foreach ($arr as $vo) {
                $price = M('book')->where(array('bookname'=>$vo))->field('price,id')->select();
                $data1['orderid'] = $orderid[0]['id'];
                $data1['bookname'] = $vo;
                $data1['price'] = $price[0]['price'];
                M('detail')->create($data1);
                M('detail')->add();
                $shelf['readerid'] = session('reader_id');
                $shelf['bookid'] = $price[0]['id'];
                $shelf['status'] = '0';
                M('bookshelf')->create($shelf);
                M('bookshelf')->add();
            }
        }
    }
}