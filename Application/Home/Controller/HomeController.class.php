<?php
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller {
    public function _initialize(){
        $id = session('reader_id');
        $reader = M('reader')->find("$id");
        $this->readername = $reader['readername'];
        $this->readerpic = $reader['pic'];
        $carnum = M('shopcar')->where(array('readerid'=>$_SESSION['reader_id']))->count();
        $this->carnum = $carnum;
        $cityName = empty($_SESSION['city'])?'扬州':$_SESSION['city'];
        $cityName = mb_substr($cityName, 0,2,'utf-8');
        if($cityName == 'IA' || $cityName == '局域'){
            $cityName = '扬州';
        }
        $city = iconv('UTF-8', 'GBK', $cityName);
        $url = 'http://php.weather.sina.com.cn/xml.php?city='.$city.'&password=DJOYnieT8234jlsK&day=0';
        $tem = new \Common\Util\ResultApi();
        $temData = $tem->getApiData($url,$type='xml');
        // var_dump($temData);
        $this->cityName = $cityName;
        $this->temData = $temData;
    }

    // 定位到空操作方法时执行
	public function _empty($name){
		$this->display('Public/index');
	}

	// 生成验证码
    public function yzm()
    {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 25;
        $Verify->length = 1;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 200;
        $Verify->imageH = 50;
        $Verify->entry();
    }
}