<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Page;

class UserController extends AdminController 
{   
    private $_model = null; //数据库操作类
    private $_role = null; //角色表操作类
    private $_user_model = null; //用户——角色表操作类

    //初始化操作
    public function _initialize(){
        parent::_initialize();
        $this->_model = D('admin');
        $this->_role = D('Role');
        $this->_user_role = D('admin_role');
    }
    // 后台用户管理首页
    public function index()
    {
        $this->id = session('id');
        $Admin = M('admin');
        $p = empty($_GET['p'])?1:$_GET['p'];
        $map = [];
        if(!empty($_GET['adminname'])){
            $map['adminname'] = array('like','%'.$_GET['adminname'].'%');
            $condition['adminname'] = $_GET['adminname'];
        }
        $list = $Admin->where($map)->page($p.',3')->select();
        // $list = $Admin->page(1,3)->select();
        $count = $Admin->where($map)->count();// 查询满足要求的总记录数
        $Page = getPage($count,3);// 实例化分页类 传入总记录数和每页显示的记录数
        foreach($condition as $key=>$val) {
             $Page->parameter[$key] = $val;
        }
        // var_dump($Page->parameter);
        $show = $Page->show();// 分页显示输出
        $this->assign('data',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    //添加页面
    public function add()
    {
        $this->assign('title','添加用户');
        $this->display();
    }

    //执行添加
    public function doadd()
    {
        if (empty($_POST)) {
            $this->redirect('Admin/User/add');
            exit;
        }
        $name = $_POST['adminname'];
        // var_dump($name);
        $data = M('admin')->where(array("adminname"=>"$name"))->select();
        // var_dump($data);
        if($data != array()){
            $this->error("该账号已存在！");
            exit;
        }
        $_POST['password'] = md5($_POST['password']);
        // var_dump($_POST);
        M('admin')->create();

        //执行添加
        if (M('admin')->add() > 0) {
           $this->success('恭喜您,添加成功!', U('index'));
        } else {
           $this->error('添加失败....');
        }
    }

    // 禁用
    public function forbidden()
    {
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/User/index');
            exit;
        }
        $id = I('get.id/d');
        if($id == 1){
            $this->error("谁敢禁用我？！！！");
            exit;
        }
        $data = M("admin")->where(array("id"=>$id))->setField(array("status"=>"1"));
        
        if ($data !== false) {
           $this->success('恭喜您,禁用成功!', U('index'));
        } else {
           $this->error('失败....');
        }
    }

    // 解禁
    public function release()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/User/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M("admin")->where(array("id"=>$id))->setField(array("status"=>"0"));
        
        if ($data !== false) {
           $this->success('恭喜您,解禁成功!', U('index'));
        } else {
           $this->error('失败....');
        }
    }

    // 删除
    public function del()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/User/index');
            exit;
        }
        $id = I('get.id/d');
        if($id == 1){
            $this->error("谁敢删我？！！！");
            exit;
        }
        if (M('admin')->delete($id) > 0) {
           $this->success('恭喜您,删除成功!', U('index'));
        } else {
           $this->error('删除失败....', U('index'));
        }
    }

    //浏览 角色信息
    public function rolelist(){
        //查询节点信息
        $list = $this->_role->where('status=1')->select();
        //查询当前用户信息
        $users = $this->_model->where(array('id'=>array('eq',I('id'))))->find();

        //获取当前用户的角色信息
        $rolelist = $this->_user_role->where(array('uid'=>array('eq',I('id'))))->select();

        $myrole = array(); //定义空数组
        //对用户的角色进行重组
        foreach($rolelist as $v){
            $myrole[] = $v['rid'];
        }
        

        //分配数据
        $this->assign("list",$list);
        //分配当前用户信息
        $this->assign('users',$users);
        //分配该用户的角色信息
        $this->assign('role',$myrole);

        //加载模板
        $this->display();
    }

    //保存用户角色
    public function saverole(){
        
        //判读必须选择一个角色
        if(empty($_POST['role'])){
            $this->error("请选择一个角色！");
        }

        $uid = $_POST['uid'];

        //清除用户所有的角色信息，避免重复添加
        $this->_user_role->where(array('uid'=>array('eq',$uid)))->delete();

        foreach(I('role') as $v){
            $data['uid'] = $uid;
            $data['rid'] = $v;
            //执行添加
            $this->_user_role->data($data)->add();

        }

        $this->success("角色分配成功",U('User/index'));
        
    } 
}