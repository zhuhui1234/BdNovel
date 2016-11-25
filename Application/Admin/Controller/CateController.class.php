<?php 
namespace Admin\Controller;

use Think\Controller;

//分类 控制器
class CateController extends AdminController
{
	//结果列表
	public function index(){		
		//实例化
		$category = D('Cate');
		//获取分类信息
		$list = $category->getAdminCate();
		//$list = $category->getHomeCate();
		$this->assign('list',$list);
		$this->display();

		//分类查询的另一种方式
		//$list = $category->getTree(0);
	}

	//加载添加页面
	public function add(){
		$this->display();
	}
	//执行添加信息
	public function doadd(){
		//实例化
		$category = D('Cate');
		//初始化数据
		if(!$category->create()){
			$this->error($this->_model->getError());
			exit;
		}
		
		$typename = $_POST['typename'];
		$data = $category->where(array('typename'=>"$typename"))->select();
		if (!empty($data)) {
			$this->error("该分类已存在！");
			exit;
		}
		//执行添加
		if($category->add()>0){
			$this->success("添加成功！",U('Cate/index'));
		}else{
			$this->error("添加失败");
		}
	}

	//删除
	public function del(){
		//实例化
		$category = D('Cate');
		//拼装删除条件
		$map['id'] = array('eq',I('id'));
		$map['path'] = array('like','%'.I('id').'%');
		$map['_logic'] = 'or';

		$book = D('book')->where(array('cateid'=>$map['id']))->select();
		if ($book) {
			$this->error("请先删除该分类的书籍");
			exit;
		}

		$data = $category->where(array('path'=>$map['path']))->select();
		if ($data) {
			$this->error("请先删除子分类");
			exit;
		}

		if($category->where($map)->delete()>0){
			$this->success("删除成功！",U('Cate/index'));
		}else{
			$this->error("删除失败");
		}
	}

	/**
	 * 分类树显示
	*/
	public function treeList(){
		//实例化
		$category = D('Cate');
		//获取分类信息
		$list = $category->getHomeCate();
		//V($list);
		$this->assign('list',$list);
		$this->display();
	}

}

