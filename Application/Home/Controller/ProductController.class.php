<?php
namespace Home\Controller;
use Think\Controller;
use Home\Page;
class ProductController extends HomeController {
    public function index(){
    	$condition = empty($_GET['condition'])?'id':$_GET['condition'];
        $this->hiddencondition = $condition;
    	if($condition != 'price'){
    		$condition .= ' desc';
    	}
    	$p = empty($_GET['p'])?1:$_GET['p'];
    	// $this->getReadername();
    	$Cate = M('cate');
    	$pcate = $Cate->where(array('pid'=>0))->select();
    	$list = [];
    	foreach ($pcate as $k => $val) {
    		$soncate = $Cate->where(array('pid'=>$val['id']))->select();
    		$val['soncate'] = $soncate;
    		$list[] = $val;
    	}
        $Book = M('book');
        $data = $Book->page($p.',12')->order($condition)->select();
        $count = $Book->count();// 查询满足要求的总记录数
        $Page = getPage($count,12);
        $this->data = $data;
        $show = $Page->show();
    	$this->typelist = $list;
        $this->title = '图书推荐_正版电子书在线阅读';
        $this->assign('page',$show);
		$this->display();	
    }

    public function cate(){
    	$id = I('get.id/d');
    	$cate = M('cate')->find($id);
		$Book = M('book');
        $p = empty($_GET['p'])?1:$_GET['p'];
        $condition = empty($_GET['condition'])?'id':$_GET['condition'];
        $this->hiddencondition = $condition;
    	if($cate['pid'] == 0){
            $condition = 'b.'.$condition;
            if($condition != 'b.price'){
                $condition .= ' desc';
            }
	    	// var_dump($condition);
    		$status = 1;
    		$typelist = M('cate')->where(array('pid'=>$id))->select();
    		$ptypename = $cate['typename'];
			$data = $Book->table('bd_book b,bd_cate c')->where(array('c.pid='.$cate['id']))->where('c.id=b.cateid')->field('b.id,b.bookpic,b.price,b.bookname')->page($p.',12')->order($condition)->select();
			// echo $data;exit;
            $count = $Book->table('bd_book b,bd_cate c')->where(array('c.pid='.$cate['id']))->where('c.id=b.cateid')->count();
    	}else{  		
            if($condition != 'price'){
                $condition .= ' desc';
            }
    		$status = 2;
    		$ptype = M('cate')->where('id='.$cate['pid'])->Field('id,typename')->select();
    		// var_dump($ptype);exit;
    		$typelist = M('cate')->where(array('pid'=>$cate['pid']))->select();
    		$this->sid = $cate['id'];
    		$data = $Book->where('cateid='.$cate['id'])->page($p.',12')->order($condition)->select();
            $count = $Book->where('cateid='.$cate['id'])->count();
    		$this->typename = $cate['typename'];
    		$ptypename = $ptype[0]['typename'];
    	}
        $Page = getPage($count,12);
        $show = $Page->show();
        $this->assign('page',$show);
    	$this->hiddenid = $cate['id'];
    	$this->status = $status;
    	$this->ptypeid = $ptype[0]['id'];
    	$this->ptypename = $ptypename;
    	$this->typelist = $typelist;
    	$this->data = $data;
    	$this->title = $ptypename."_正版电子书在线阅读";
    	// var_dump($data);
    	// exit;
    	$this->display('index');
    }
}