<?php
namespace Home\Controller;

use Think\Controller;

class PersonController extends HomeController
{	
	public function index()
	{	
		if(empty(session('reader_id'))){
            $this->redirect('Login/login');
            exit;
        }
        $id = session('reader_id');
		// $this->getReadername();
        $data = M('reader')->find($id);
        $book = M('book');

		$p = empty($_GET['p'])?1:$_GET['p'];
        $map['s.readerid'] = array('eq',$id);
        $all = $book->table('bd_book b,bd_bookshelf s')->where($map)->where('b.id=s.bookid')->field('b.id,b.bookname,b.bookpic,b.price,b.status')->group('s.bookid')->page($p.',5')->select();
        $count = $book->table('bd_book b,bd_bookshelf s')->where($map)->where('b.id=s.bookid')->count('DISTINCT s.bookid');
        // echo $count;exit;
        $Page = getPage($count,5);
        $show = $Page->show();
		$this->all = $all;
		$this->assign('page',$show);

        $map1['s.readerid'] = array('eq',$id);
        $map1['s.status'] = array('eq','0');
        $buy = $book->table('bd_book b,bd_bookshelf s')->where($map1)->where('b.id=s.bookid')->field('b.id,b.bookname,b.bookpic,b.price,b.status')->select();
		$this->buy = $buy;


        $map2['s.readerid'] = array('eq',$id);
        $map2['s.status'] = array('eq','1');
        $collect = $book->table('bd_book b,bd_bookshelf s')->where($map2)->where('b.id=s.bookid')->field('b.id,b.bookname,b.bookpic,b.price,b.status')->select();
		$this->collect = $collect;


		$this->title = '个人中心_百度阅读';
		$this->inf = $data;
		$this->display();
	}

	public function del()
	{
		$bookid = I('post.bookid/d');
		$readerid = I('session.reader_id/d');
        if (!$readerid) {
            exit;
        }
		$data = M('bookshelf')->where(array('bookid'=>$bookid,'readerid'=>$readerid))->field('id')->find();
		$id = $data['id'];
		if(M('bookshelf')->delete("$id") > 0) {
			$this->redirect('Person/index');
		}

	}

	public function order()
    {   
        if(empty(session('reader_id'))){
            $this->redirect('Login/login');
            exit;
        }
        $id = session('reader_id');
        // $this->getReadername();
        $data = M('reader')->find($id);
        $order = M("orders");
        $p = empty($_GET['p'])?1:$_GET['p'];
        $inf = $order->where(array('readerid'=>$id,"status"=>'0'))->page($p.',5')->select();
        $count = $order->where(array('readerid'=>$id,"status"=>'0'))->count();
        $Page = getPage($count,5);
        $show = $Page->show();
        $this->assign('page',$show);

        $this->title = '个人中心_百度阅读';
        $this->inf = $data;
        $this->order = $inf;
        $this->display();
    }

    public function detail()
    {   
        if(empty(session('reader_id'))){
            $this->redirect('Login/login');
            exit;
        }
        $id = session('reader_id');
        // $this->getReadername();
        $inf = M('reader')->find($id);
        if(empty($_GET['orderid'])){
            $this->redirect('Person/order');
        }
        $orderid = I('get.orderid/d');
        $data = M('detail')->table('bd_detail d,bd_book b')->where(array('d.orderid'=>$orderid))->where('d.bookname=b.bookname')->field('b.id,d.bookname,b.bookpic,d.price')->select();
        // var_dump($data);exit;
        $this->inf = $inf;
        $this->data = $data;
        $this->display();
    }

	public function delorder()
    {
     	$id = I('post.id/d');
		$readerid = I('session.reader_id/d');
        if (!$readerid) {
            exit;
        }
		$_POST['status'] = "1";
		M('orders')->create();
		if(M('orders')->save() > 0) {
			$this->redirect('Person/order');
		}   
    }

    public function inf()
    {	
    	if(empty(session('reader_id'))){
            $this->redirect('Login/login');
            exit;
        }
        $id = session('reader_id');
		// $this->getReadername();
		$data = M('reader')->find($id);
		$this->title = '个人中心_百度阅读';
		$this->inf = $data;
    	$this->display();
    }

    public function doChangeInfo()
    {
    	if(empty(session('reader_id'))){
            $this->redirect('Login/login');
            exit;
        }
        $id = session('reader_id');

        $rules = array(
            array('readername','require','用户名不能为空',0,'regex',1), 
            array('readername','','帐号名称已经存在！',0,'unique',1), 
            array('phone','/^[1][3-8][0-9]+\d{8}/','联系电话格式不符合'), 
            array('email','email','邮箱格式不正确'),
        );

        if(!M('reader')->validate($rules)->create()){
            $this->error(M('reader')->getError());
            exit;
        }
        if (M('reader')->save() > 0) {
        	$this->success('恭喜你,修改成功',U('inf'));
        } else {
        	$this->error('修改失败。。。');
        }
    }

    public function changpic()
    {
    	if(empty(session('reader_id'))){
            $this->redirect('Login/login');
            exit;
        }
        $id = session('reader_id');
        $img = $this->insertImg($_FILES,'./Upload/reader/','reader/');
        $_POST['pic'] = $img['picname'];
        M('reader')->create();
        if (M('reader')->save() > 0) {
        	$this->success('恭喜你,修改成功',U('inf'));
        } else {
        	$this->error('修改失败。。。');
        }
    }

    public function upload($path){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728000000 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Upload/'; // 设置附件上传根目录
        $upload->subName = array();

        $upload->savePath = $path; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            return $info;
        }
    }

    public function insertImg($file,$dirname,$path)
    {
        if(empty($file)){
            $this->error('请选择上传的文件');
        }else{
            $pic = $file['pic'];
            $data= $this->upload($path);//调用upload函数,上传图片
            // var_dump($data);exit;
            if(isset($data)){
                $image = new \Think\Image();
                $filename = $dirname.$data['pic']['savename'];
                // var_dump($filename);
                $newfilename = $dirname.'s_'.$data['pic']['savename'];
                $data['pic']['savename'] = $data['pic']['savename'];
                $image->open("$filename");
                $image->thumb(100, 100)->save("$newfilename");
                $img['picname'] = $data['pic']['savename'];
                if($_POST['oldpic']) {
                    unlink($dirname.$_POST['oldpic']);
                    unlink($dirname.'s_'.$_POST['oldpic']);
                }
                return $img;
            }
        }
    }

    public function passwd()
    {	
    	if(empty(session('reader_id'))){
            $this->redirect('Login/login');
            exit;
        }
        $id = session('reader_id');
		// $this->getReadername();
		$data = M('reader')->find($id);
		$this->title = '个人中心_百度阅读';
		$this->inf = $data;
    	$this->display();
    }

    public function checkPasswd()
    {   
        $id = session('reader_id');
        $oldpasswd = md5($_POST['oldpasswd']);
        $map['password'] = array('eq',$oldpasswd);
        $map['id'] = array('eq',$id); 
        $data = M('reader')->where($map)->find();
        if ($data) {
            echo "true";
        }else{
            echo "false";
        }
    }

    public function doChangepwd()
    {   
        $id = session('reader_id');
        $phoneyzm = $_POST['phoneyzm'];
        $_POST['id'] = $id;
        $_POST['password'] = md5($_POST['newpasswd']);
        M('reader')->create();

        if ($phoneyzm != $_SESSION['Checknum']) {
            $this->error('验证码错误！');
        }elseif(M('reader')->save() >0){
            session('reader_id',null);
            session('url',null);
            session('city',null);
            session('Checknum',null);      
            $this->success('密码修改成功！',U('Login/login'));
        }else{
            $this->error('密码修改失败！');
        }
    }

    public function sendyzm()
    {   
        $phone = $_GET['phone'];
        $yzm = rand(1000,9999);
        $_SESSION['Checknum'] = $yzm;
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