<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;
use Admin\Page;
use Vendor\ThinkImage\ThinkImage;

class BookController extends AdminController
{
	public function index()
	{
        $p = empty($_GET['p'])?1:$_GET['p'];
		$book = M('book');
		$map1['pid'] = array('neq','0');
        $cate = M('cate')->field('id,typename')->where($map1)->select();
        $map = [];
        if(!empty($_GET['bookname'])){
            $map['bookname'] = array('like','%'.$_GET['bookname'].'%');
            $condition['bookname'] = $_GET['bookname'];
        }
        if($_GET['cateid'] != 0){
            $map['cateid'] = array('eq',$_GET['cateid']);
            $condition['cateid'] = $_GET['cateid'];
        }
        $data = $book->table('bd_book b,bd_cate c')->where('b.cateid=c.id')->where($map)->field('b.id,b.bookname,b.bookpic,b.status,b.addtime,c.typename')->page($p.',3')->select();
        $count = $book->where($map)->count();// 查询满足要求的总记录数
        $Page = getPage($count,3);// 实例化分页类 传入总记录数和每页显示的记录数
        foreach($condition as $key=>$val) {
             $Page->parameter[$key] = $val;
        }
        $show = $Page->show();// 分页显示输出
        $this->assign('cate',$cate);
        $this->assign('book',$data);
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); 
    }

	public function add()
	{	
		$author = M('author')->field('id,authorname')->select();
		$press = M('press')->field('id,pressname')->select();
        $map['pid'] = array('neq','0');
		$type = M('cate')->field('id,typename')->where($map)->select();
		$this->assign('author',$author);
		$this->assign('press',$press);
		$this->assign('type',$type);
		$this->display();
	}

	public function doadd()
	{   
        if ($_POST['price'] <= 0) {
            $this->error('价格必须为正数!');   
            exit;
        }
        $img = $this->insertImg($_FILES['bookpic']);
        $file = $this->insertFile($_FILES['filename']);
        $_POST['addtime'] = time();
        $_POST['bookpic'] = $img['picname'];
        $_POST['filename'] = $file['filename'];
        $wordnum = $this->wordnum($_POST['filename']);
        $count = $this->zjnum($_POST['filename']);
        $_POST['wordnum'] = $wordnum;
        $_POST['chapternum'] = $count;
        M('book')->create();
        $id = M('book')->add();
        if ($id > 0) {
            $this->fenzhang($_POST['filename'],$id);
            $this->success('添加成功',U('index'));
        } else {
            $this->error('添加失败');
        }

	}

    public function wordnum($filename)
    {
        $s = file_get_contents("./Upload/novel/{$filename}");
        $s=mb_convert_encoding($s,"UTF-8","GBK");
        $wordnum = strlen($s);
        return $wordnum;
    }

    public function zjnum($filename)
    {
        $str = fopen("./Upload/novel/{$filename}",'r');
        $zj=[];
        while ($hangdata = fgets($str)) {
            $hangdata=mb_convert_encoding($hangdata,"UTF-8","GBK");
            if (preg_match("/(\x{7B2C}[^\x{7AE0}]+\x{7AE0}[\s\S]*?(?:(?=\x{7B2C}[^\x{7AE0}]+\x{7AE0})|$))/u",$hangdata,$matches)) {
                $zj[] = $matches[0];
            }
        }
        $count = count($zj);
        return $count;
    }

    public function fenzhang($filename,$id)
    {
        $str = fopen("./Upload/novel/{$filename}",'r');
        $zj=[];
        while ($hangdata = fgets($str)) {
            $hangdata=mb_convert_encoding($hangdata,"UTF-8","GBK");
            if (preg_match("/(\x{7B2C}[^\x{7AE0}]+\x{7AE0}[\s\S]*?(?:(?=\x{7B2C}[^\x{7AE0}]+\x{7AE0})|$))/u",$hangdata,$matches)) {
                $zj[] = $matches[0];
            }
        }

        $s = file_get_contents("./Upload/novel/{$filename}");
        $s = mb_convert_encoding($s,"UTF-8","GBK");
        function _cut($begin,$end,$str){
            $b = mb_strpos($str,$begin) + mb_strlen($begin);
            if($end==''){
                return strchr($str,$begin);
            }else{
                $e = mb_strpos($str,$end) - $b;
            }
            return mb_substr($str,$b,$e);
        }
        $count = count($zj);

        mkdir('./Upload/novel/'.$id);

        for ($i=0; $i <($count) ; $i++) {
            $a = $i+1;
            if($a==$count){
                @$x[$zj[$i]] = _cut($zj[$i],$zj[$a],$s);
            }else{
                @$x[$zj[$i]] = $zj[$i]."   \r\n"._cut($zj[$i],$zj[$a],$s);
            }
            file_put_contents("./Upload/novel/{$id}/{$a}.txt", $x[$zj[$i]]);
        }

    }

	public function insertImg($file)
    {
        $dirname = "./Upload/book/";
        if(empty($file)){
            $this->error('请选择上传的文件');
        }else{
            $arr = array('jpg', 'gif', 'png', 'jpeg');
            $data= $this->upload($arr,'book/');//调用upload函数,上传图片
            if(isset($data)){
                $image = new \Think\Image();
                $filename = $dirname.$data['bookpic']['savename'];
                $newfilename = $dirname.'s_'.$data['bookpic']['savename'];
                $data['bookpic']['savename'] = $data['bookpic']['savename'];
                $image->open("$filename");
                $image->thumb(100, 100)->save("$newfilename");
                $img['picname'] = $data['bookpic']['savename'];
                if($_POST['oldpicname']) {
                    unlink($dirname.$_POST['oldpicname']);
                    unlink($dirname.'s_'.$_POST['oldpicname']);
                }
                return $img;
            }
        }
    }

    public function insertFile($file)
    {
        if(empty($file)){
            $this->error('请选择上传的文件');
        }else{
            $arr = array('txt');
            $data= $this->upload($arr,'novel/');//调用upload函数,上传图片
            if(isset($data)){
                $file['filename'] = $data['filename']['savename'];
                return $file;
            }
        }
    }

    public function upload($arr,$path){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728000000 ;// 设置附件上传大小
        $upload->exts = $arr;// 设置附件上传类型
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

    // 删除
    public function del()
    {
        if (empty($_GET['id'])) {
            $this->redirect('Admin/Book/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('book')->where(array('id'=>$id))->find();
        if (M('book')->delete($id) > 0) {
            $_POST = $data;
            $_POST['bookid'] = $_POST['id'];
            $_POST['id'] = '';
            M('recycle')->create();
            M('recycle')->add();
            $this->success('恭喜您,删除成功!', U('index'));
        } else {
            $this->error('删除失败....', U('index'));
        }
    }

    public function edit()
    {
    	if (empty($_GET['id'])) {
            $this->redirect('Admin/Book/index');
            exit;
        }
        $id = I('get.id/d');
        $data = M('book')->where(array("id"=>$id))->find();
        $author = M('author')->field('id,authorname')->select();
		$press = M('press')->field('id,pressname')->select();
		$type = M('cate')->field('id,typename')->select();
		$this->assign('author',$author);
		$this->assign('press',$press);
		$this->assign('type',$type);
        $this->assign('data',$data);
        $this->display();
    }

    public function update()
    {   
        if ($_POST['price'] <= 0) {
            $this->error('价格必须为正数!');
            exit; 
        }
    	if(empty($_POST['id'])){
            $this->display('Public/index');
            exit;
        }
        $id = I('post.id/d');
        if ($_FILES['bookpic']['error']!=4) {
        	$img = $this->insertImg($_FILES['bookpic']);
        	$_POST['bookpic'] = $img['picname'];
        }     
        $_POST['addtime'] = time();
        M('book')->create();
        if(M('book')->save() > 0 ){
            $this->success('修改成功',U('index'));
        } else {
            $this->error('修改失败',U('Book/edit?id='.$id));
        }
    }    

}