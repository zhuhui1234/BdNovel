<?php 
namespace Admin\Controller;
use Think\Controller;


class EmptyController extends Controller
{
	// 定位到空控制器时执行
	public function _empty($name){
		$this->display('Public/index');
	}
}







