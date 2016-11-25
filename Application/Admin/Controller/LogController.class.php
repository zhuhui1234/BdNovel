<?php  
namespace Admin\Controller;
use Think\Controller;

class LogController extends AdminController
{
	public function index(){
		$log = M('log');
		$p = empty($_GET['p'])?1:$_GET['p'];
		$data = $log->page($p.',5')->order('id desc')->select();
		// var_dump($data);exit;
		$count = $log->count();// 查询满足要求的总记录数
        $Page = getPage($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		// var_dump($data);exit;
		foreach ($data as $key => $v) {
			// var_dump($v);
			$Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
			$ip = $v['ip'];
			$area = $Ip->getlocation("$ip"); // 获取某个IP地址所在的位置
			$data[$key]['area'] = $area['country'];	
			$arr = M('reader')->field('readername,logtime')->find($v['readerid']);
			$data[$key]['readername'] = $arr['readername'];	
			$data[$key]['logtime'] = $arr['logtime'];	

		}
		// var_dump($data);exit;
		$show = $Page->show();// 分页显示输出
		// var_dump($show);exit;
		$this->data = $data;
		$this->assign('page',$show);
		$this->display();
	}

	public function del(){
		if (empty($_GET['id'])) {
            $this->redirect('Admin/Log/index');
            exit;
        }
        $id = I('get.id/d');
        if (M('log')->delete($id) > 0) {
           $this->success('恭喜您,删除成功!', U('index'));
        } else {
           $this->error('删除失败....');
        }
	}
}