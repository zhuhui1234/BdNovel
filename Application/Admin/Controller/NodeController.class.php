<?php 
	namespace Admin\Controller;
	
	class NodeController extends AdminController
	{
		private $_model = null; //数据库操作类

		//初始化操作
		public function _initialize(){
			parent::_initialize();
			$this->_model = D('Node');
		}

		//列表详情
		public function index(){
			$p = empty($_GET['p'])?1:$_GET['p'];
			$map = [];
	        if(!empty($_GET['name'])){
	            $map['name'] = array('like','%'.$_GET['name'].'%');
	            $condition['name'] = $_GET['name'];
	        }
			//查询数据
			$list = $this->_model->where($map)->page($p.',7')->select();

			$count = $this->_model->where($map)->count();// 查询满足要求的总记录数
	        $Page = getPage($count,7);// 实例化分页类 传入总记录数和每页显示的记录数
	        foreach($condition as $key=>$val) {
	             $Page->parameter[$key] = $val;
	        }
	        // var_dump($Page->parameter);
	        $show = $Page->show();// 分页显示输出
	        $this->assign('list',$list);// 赋值数据集
	        $this->assign('page',$show);// 赋值分页输出
			//加载模板
			$this->display();
		}

		//加载添加页面
		public function add(){
			//加载模板
			$this->display();
		}

		//执行添加操作
		public function doadd(){

			if(!$this->_model->create()){
				$this->error($this->_model->getError());
				exit;
			}

			if($this->_model->add() > 0){
				$this->success("添加成功！",U('Node/index'));
			}else{
				$this->error("添加失败！");
			}
		}


		//删除操作
		public function del(){
			if($this->_model->delete($_GET['id']) > 0){
				$this->success("删除成功！",U('Node/index'));
			}else{
				$this->error("删除失败");
			}
		}

		//加载修改页面c 
		public function edit(){
			//查出数据
			$vo = $this->_model->where(array('id'=>array('eq',I('id'))))->find();
			//向模板分配数据
			$this->assign('vo',$vo);
			//加载模板
			$this->display();
		}

		//执行修改操作
		public function save(){
			//初始化
			if(!$this->_model->create()){
				$this->error($this->_model->getError());
				exit;
			}
			//执行修改 
			if($this->_model->save() >= 0){
				$this->success("修改成功！",U('Node/index'));
			}else{
				$this->error("修改失败");
			}
		}

		
	}

 ?>