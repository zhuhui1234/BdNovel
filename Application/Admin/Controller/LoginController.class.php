<?php  
namespace Admin\Controller;
use Think\Controller;

class LoginController extends AdminController
{
	public function _initialize(){}

	public function login()
	{
		$this->display();
	}

	// 执行登录
	public function dologin()
	{	
		// 判断是否获取到数据
		if (empty($_POST)) {
            $this->redirect('Admin/Login/login');
            exit;
        }

        // 验证码检测
		$Verify = new \Think\Verify();
		if(!$Verify->check($_POST['code'])) {
			$this->error('验证码错误..');
			exit;
		}

        //接收用户名和密码
		$adminname = I('post.name');
		$password = I('post.password');

		// 查询数据表中是否有该用户的数据
		$map = [];
		$map['adminname'] = $adminname;
		// $map['password'] = $_POST['password'];

		$data = M('admin')->where($map)->select();
		// var_dump($data[0]['password']);
		// var_dump($_POST['password']);
		// 若数据为空，则该用户不存在
		if($data === array()){
			$this->error('用户名不存在...');
			exit;
		}

		// 判断该用户密码是否输入正确
		if(md5($password) != $data[0]['password']){
			$this->error('密码不正确...');
			exit;
		}

		// 判断该用户是否被禁用
		if ($data[0]['status'] == 1) {
			$this->error('该账号已被禁用,快去找爸爸给你解禁...');
			exit;
		}

		// var_dump($data[0]['id']);
		session('id',$data[0]['id']); //设置session
		$_SESSION['admin_user'] = $data;
		// var_dump($data);exit;
		$list = M('node')->field('mname,aname')->where('id in'.M('role_node')->field('nid')->where("rid in ".M('admin_role')->field('rid')->where(array('uid'=>array('eq',$data[0]['id'])))->buildSql())->buildSql())->select();
		// echo M('node')->getLastSql();
		// exit;
		//控制器名转换为大写
		foreach ($list as $key => $val) {
			$list[$key]['mname'] = ucfirst($val['mname']);
		}

		//查看查询出来的信息
		// print_r($list); exit;

		$nodelist = array();
		$nodelist['Index'] = array('index');
		//遍历重新拼装
		foreach($list as $v){
			$nodelist[$v['mname']][] = $v['aname'];
			//把修改和执行修改 添加和执行添加 拼装到一起
			if($v['aname']=="edit"){
				$nodelist[$v['mname']][]="save";
			}
			if($v['aname']=="add"){
				$nodelist[$v['mname']][]="doadd";
			}
		}

		// var_dump($nodelist);
		// exit;

		//将权限信息放置到session中
		$_SESSION['admin_user']['nodelist'] = $nodelist;
		// var_dump($_SESSION['admin_user']);
		// exit;
		// var_dump(session('id'));
		$data = M("admin")->where(array("id"=>$data[0]['id']))->setField(array("logtime"=>$_POST['logtime']));
		// 登录成功 跳转到后台页面
		if($data){
			$this->success('登录成功....',U('Index/index'));
		}
	}

	// 退出登录
	public function logout(){
		session('id',null);
		//清空session
		unset($_SESSION['admin_user']);
		$this->display('login');
	}
}







