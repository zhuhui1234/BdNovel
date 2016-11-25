<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Page;

class OrdersController extends AdminController 
{
	public function index()
	{
		$Orders = M('orders');
		$p = I('get.p/d');
        $name = I('get.readername');
        $p = empty($p)?1:$p;
        $map = [];
        if(!empty($name)){
            $map['r.readername'] = array('like','%'.$name.'%');
            $condition['r.readername'] = $name;
        }
		$data = $Orders->table('bd_orders o,bd_reader r')->where('o.readerid=r.id')->where($map)->field('o.id,r.readername,o.addtime,o.total,o.status')->order('o.id desc')->page($p.',5')->select();
		$count = $Orders->table('bd_orders o,bd_reader r')->where('o.readerid=r.id')->where($map)->count();// 查询满足要求的总记录数
		$Page = getPage($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
        foreach($condition as $key=>$val) {
             $Page->parameter[$key] = $val;
        }
		$show = $Page->show();// 分页显示输出
		$this->data = $data;
		$this->assign('page',$show);
		$this->display();
	}

	public function detail()
	{
		if (empty($_GET['orderid'])) {
            $this->redirect('Admin/Orders/index');
            exit;
        }
        $orderid = I('get.orderid/d');
        $data = M('detail')->where(array('orderid'=>$orderid))->select();
        // var_dump($data);
        $this->data = $data;
        $this->display();
	}
}