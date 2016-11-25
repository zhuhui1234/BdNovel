<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends HomeController {
    public function login(){
		$this->display();	
    }

    // 执行登录
	public function doLogin()
	{	
		// 判断是否获取到数据
		if (empty($_POST)) {
            $this->redirect('Home/Login/login');
            exit;
        }

        // var_dump($_POST);exit;

        // 验证码检测
		$Verify = new \Think\Verify();
		if(!$Verify->check($_POST['code'])) {
			$this->error('验证码错误..');
			exit;
		}

        //接收用户名和密码
		$readername = I('post.readername');
		$password = I('post.password');

		// 查询数据表中是否有该用户的数据
		$map = [];
		$map['readername'] = $readername;
		// $map['password'] = $_POST['password'];

		$data = M('reader')->where($map)->select();
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
		$ip = get_client_ip();
		$Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
		$area = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
		$browser = get_client_browser();
		// var_dump($area);exit;
		// var_dump($data[0]['id']);
		session('reader_id',$data[0]['id']); //设置session
		session('city',$area['country']);
		$log = [];
		$log['ip'] = $area['ip'];
		$log['browser'] = $browser[0].$browser[1];
		$log['readerid'] = session('reader_id');
		// var_dump($log);
		// exit;
		M('log')->create($log);
		M('log')->add();
		// var_dump(session('id'));
		$data = M("reader")->where(array("id"=>$data[0]['id']))->setField(array("logtime"=>$_POST['logtime']));
		// 登录成功 跳转到后台页面
		if($data){
			if($_SESSION['url']==null){
				$this->redirect('Index/index');
			}else{
				echo '<script>window.location.href="'.$_SESSION['url'].'";</script>';
			}
		}
	}

	// 退出登录
	public function logout(){
		session('reader_id',null);
		session('url',null);
		session('city',null);
		session('Checknum',null);
		echo '<script>self.location=document.referrer;</script>';
	}

	public function register()
	{
		$this->display('register');
	}

	public function checkReadername()
	{
		$rules = array(
            array('readername','require','用户名不能为空!'), 
            array('readername','','用户名已存在！',0,'unique',1), 
            array('readername','/([a-zA-Z0-9]|[\x{4e00}-\x{9fa5}]){3,16}/u','用户名由中文数字字母组成,长度为3-16位'), 
            // array('phone','/^[1][3-8][0-9]+\d{8}/','联系电话格式不符合'), 
            // array('email','email','邮箱格式不正确'),
        );

        $Reader = M('reader');
        if(!$Reader->validate($rules)->create()){
            exit ( $Reader->getError () );
        }else{
        	echo 0;
        }
	}

	public function checkPassword()
	{
		$rules = array(
			array('password','require','密码不能为空!'), 
			array('password','/^[a-zA-Z][a-zA-Z0-9_]{5,15}$/','字母开头,可以包含数字字母下划线,长度6~16位'),
		);
		$Reader = M('reader');
        if(!$Reader->validate($rules)->create()){
            exit ( $Reader->getError () );
        }else{
        	echo 0;
        }
	}

	public function checkCode()
	{
		$code = $_POST['code'];
		if ($code != $_SESSION['checkCode']) {
			echo 1;
		}else{
			echo 0;
		}
	}

	public function doregister(){
		$data['readername'] = I('post.readername');
		$data['password'] = md5(I('post.password'));
		$data['phone'] = I('post.phone');
		$data['addtime'] = time();
		M('reader')->create($data);
		if(M('reader')->add()) {
			$this->success('注册成功',U('Login/login'));
		}else{
			$this->error('注册失败');
		}
	}

	public function sendyzm()
    {   
        $phone = $_GET['phone'];
        $yzm = rand(1000,9999);
        $_SESSION['checkCode'] = $yzm;
        $this->sendTemplateSMS($phone,array("$yzm","1"),"1");
    }

    private function sendTemplateSMS($to,$datas,$tempId)
    {   
        //主帐号,对应开官网发者主账号下的 ACCOUNT SID
        $accountSid= '8a216da8582e9f53015841a194910a3d';

        //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        $accountToken= '60032b3d22804ea7983229bc08398826';

        //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
        //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        $appId='8a216da8582e9f53015841a194fb0a41';

        //请求地址
        //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
        //生产环境（用户应用上线使用）：app.cloopen.com
        $serverIP='app.cloopen.com';


        //请求端口，生产环境和沙盒环境一致
        $serverPort='8883';

        //REST版本号，在官网文档REST介绍中获得。
        $softVersion='2013-12-26';

        // 初始化REST SDK
        $rest = new \Org\SDK\REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
        // echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
        echo "result error!";
        exit;
        }
        if($result->statusCode!=0) {
        echo "error code :" . $result->statusCode . "<br>";
        echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
        }else{
        echo "Sendind TemplateSMS success!<br/>";
        // 获取返回信息
        $smsmessage = $result->TemplateSMS;
        echo "dateCreated:".$smsmessage->dateCreated."<br/>";
        echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
        //TODO 添加成功处理逻辑
        }
    }
}