<?php
namespace Home\Controller;

use Think\Controller;

class DetailController extends HomeController
{
	public function index()
    {   
        if(empty($_GET['id'])){
            $this->redirect('Index/index');
        }
        $id = I('get.id/d');
        $Book = M('book');
        $data = $Book->find($id);
        // 进入详情页时  该书点击量加1
        $data['totalclick'] += 1;
        $bool = $Book->where(array('id'=>$id))->save($data);
        $zj = $this->zj($data['filename']);
        $class = M('bookshelf')->where(array('bookid'=>$id,'readerid'=>$_SESSION['reader_id']))->find();
        if ($class) {
            $class = 'doc-saved';
        }else{
            $class = "";
        }
        $class1 = M('shopcar')->where(array('bookid'=>$id,'readerid'=>$_SESSION['reader_id']))->find();
        if ($class1) {
            $class1 = 'doc-cart-added cart-added';
        }else{
            $class1 = "";
        }
        $count = M('bookshelf')->where(array('bookid'=>$id,'readerid'=>$_SESSION['reader_id'],'status'=>'0'))->count();
        // var_dump($count);exit;
        if($data['collect'] == 0){
            $data['collect'] = rand(800,900);
        }
        $author = M('author')->find($data['authorid']);
        $data['author'] = $author['authorname'];
        $press = M('press')->find($data['pressid']);
        $data['press'] = $press['pressname'];
        $cate = M('cate')->find($data['cateid']);
        $data['cate'] = $cate['typename'];
        $pcate = M('cate')->find($cate['pid']);
        $data['pcate'] = $pcate['typename'];
        $this->class = $class;
        $this->class1 = $class1;
        $this->count = $count;
        $this->zj = $zj;
        $this->data = $data;
        // $this->getReadername();
        $this->title = '小说全文阅读_正版电子书在线阅读';

        // 浏览历史
        if(empty(session('reader_id'))){
            $history['readerid'] = 0;
        }else{
            $history['readerid'] = session('reader_id');
        }
        $history['bookid'] = $id;
        M('history')->where(array('readerid'=>$history['readerid'],'bookid'=>$id))->delete();
        M('history')->add($history);
        $historyid = M('history')->where(array('readerid'=>$history['readerid']))->limit(4)->field('bookid')->select();
        foreach ($historyid as $k => $v) {
            $old = M('book')->where(array('id'=>$v['bookid']))->select();
            $historybook[$k]['historybook'] = $old;
        }
        $this->historybook = $historybook;


        $Comment = M('comment');
        $Comdata = $Comment->table('bd_comment c,bd_reader r')->where(array('c.bookid'=>$id,'c.status'=>'0'))->where('c.readerid=r.id')->field('r.pic,r.id readerid,r.readername,c.title,c.content,c.addtime,c.replynum,c.likenum,c.id')->order('c.addtime desc')->select();
        $Comcount = $Comment->where(array('bookid'=>$id,'status'=>'0'))->count();
        $Owncount = $Comment->where(array('bookid'=>$id,'readerid'=>$_SESSION['reader_id'],'status'=>'0'))->count();
        $Reply = M('reply');
        foreach ($Comdata as $k => $val) {
            $data11 = $Reply->table('bd_reply p,bd_reader r')->where(array('p.bookid'=>$id,'p.commentid'=>$val['id'],'p.status'=>'0'))->where('p.readerid=r.id')->field('r.pic,r.readername,p.id replyid,p.replycontent,p.replytime,r.id readerid')->order('p.replytime desc')->select();
            $Comdata[$k]['reply'] = $data11;
        }
        $this->Comdata = $Comdata;
        $this->Comcount = $Comcount;
        $this->Owncount = $Owncount;
		$this->display();	
    }

    // 获取章节
    public function zj($filename)
    {
        $str = fopen("./Upload/novel/{$filename}",'r');
        $zj=[];
        while ($hangdata = fgets($str)) {
            $hangdata=mb_convert_encoding($hangdata,"UTF-8","GBK");
            if (preg_match("/(\x{7B2C}[^\x{7AE0}]+\x{7AE0}[\s\S]*?(?:(?=\x{7B2C}[^\x{7AE0}]+\x{7AE0})|$))/u",$hangdata,$matches)) {
                $zj[] = $matches[0];
            }
        }
        return $zj;
    }

    // 阅读
    public function look()
    {   
        // $this->getReadername();
        $id = I('get.id/d');
        $p = I('get.p/d');
        $buy = M('bookshelf')->where(array('readerid'=>$_SESSION['reader_id'],'bookid'=>$id,'status'=>'0'))->find();
        if ($buy) {
            $chapternum = I('get.chapternum/d');
            if ($p > $chapternum) {
                $p = $chapternum+1;
                $data = "

                已经是最后一章了亲~ 

                ";
            } elseif($p == 0) {
                $p =  1;
                $data = file_get_contents("./Upload/novel/{$id}/{$p}.txt");
            } else {
                $data = file_get_contents("./Upload/novel/{$id}/{$p}.txt");
            }
        }else{
            $chapternum = 3;
            if ($p > $chapternum) {
                $p = $chapternum+1;
                $data = "

                购买后即可阅读剩余章节~ 

                ";
            } elseif($p == 0) {
                $p =  1;
                $data = file_get_contents("./Upload/novel/{$id}/{$p}.txt");
            } else {
                $data = file_get_contents("./Upload/novel/{$id}/{$p}.txt");
            }
        }
        $book = M('book')->where(array('id'=>$id))->select();
        $this->title = '小说全文阅读_正版电子书在线阅读';
        $this->data = $data;
        $this->book = $book;
        $this->chapternum = $chapternum;
        $this->id = $id;
        $this->p = $p;
        $this->display();
    }


    // 收藏
    public function collect()
    {
        $bookid = I('post.bookid/d');
        $arr = M('book')->where(array('id'=>$bookid))->select();
        // var_dump($arr);
        $arr[0]['collect'] += 1;
        // var_dump($arr);
        // exit;
        $bool = M('book')->where(array('id'=>$bookid))->save($arr[0]);
        $readerid = I('session.reader_id/d');
        if (!$readerid) {
            exit;
        }
        $_POST['bookid'] = $bookid;
        $_POST['readerid'] = $readerid;
        $_POST['status'] = '1';
        M('bookshelf')->create();
        M('bookshelf')->add();
    }

    // 下载
    public function download()
    {   

        $a=new \Org\Net\Http();
        $time = date('Y-m-d H:i:s',time());
        $showname = $time.rand(1000,9999).'.txt';
        if(empty($_GET['id'])){
            $this->error('下载失败!');
            exit;
        }
        $count = M('bookshelf')->fetchSql(true)->where(array('readerid'=>session('reader_id'),'bookid'=>$_GET['id'],'status'=>'0'))->count();
        if ($count == 0) {
            $this->error('请先购买该图书!');
            exit; 
        }
        $map['id'] = ['eq',I('get.id/d')];
        $bookfile = M('book')->field('filename')->where($map)->find();
        $file = file_get_contents('./Upload/novel/'.$bookfile['filename']);
        $a->download("http://127.0.0.1/Bdnovel/Upload/novel/{$bookfile}", $showname, $file); 
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

    // 判断验证码是否输入正确
    public function getYzm()
    {
        var_dump($_GET);exit;
        $Verify = new \Think\Verify();
        $info = $Verify->check($_GET['yzm1']);
        echo $info;
    }

    // 发表评论
    public function comment()
    {
        if (empty($_POST)) {
            $this->redirect('Detail/index');
            exit;
        }

        $data = I('post.');
        $data['readerid'] = session('reader_id');
        // var_dump($data);
        M('comment')->create($data);

        //执行添加
        if (M('comment')->add() > 0) {
           // $this->success('', U('Detail/index',array('id'=>$data['bookid'])));
            $this->redirect('Detail/index?id='.$data['bookid']);
        } else {
           $this->error('添加失败....');
        }

    }

    // 回复某个评论
    public function reply()
    {
        // var_dump($_POST);exit;
        if (empty($_POST)) {
            $this->redirect('Detail/index');
            exit;
        }
        $data = I('post.');
        $arr = M('comment')->where(array('id'=>$data['commentid']))->select();
        // var_dump($arr);
        $arr[0]['replynum'] += 1;
        // var_dump($arr);
        // exit;
        $bool = M('comment')->where(array('id'=>$data['commentid']))->save($arr[0]);
        // var_dump($bool);exit;
        if($bool){
            $data['readerid'] = session('reader_id');
            $data['replytime'] = time();

            M('reply')->create($data);

            //执行添加
            if (M('reply')->add() > 0) {
               // $this->success('', U('Detail/index',array('id'=>$data['bookid'])));
                // $this->redirect('Detail/index?id='.$data['bookid']);
                // $_GET['id'] = $data['bookid'];
                $this->redirect('Detail/index?id='.$data['bookid']);
            } else {
               $this->error('添加失败....');
            }
        }   
    }

    // 删除某个评论下的回复
    public function delReply()
    {
        if(empty($_GET)){
            $this->redirect('Detail/index');
        }
        // var_dump($_GET);exit;
        $data = I('get./d');
        // $id = I('get.id/d');
        // $bookid = I('get.bookid/d');
        // $commentid = I()
        $data1['status'] = '1';
        $Bool = M('reply')->where(array('id'=>$data['id']))->save($data1);
        // var_dump($Bool);exit;
        if($Bool) {
            $arr = M('comment')->where(array('id'=>$data['commentid']))->select();
            $arr[0]['replynum'] -= 1;
            $bool1 = M('comment')->where(array('id'=>$data['commentid']))->save($arr[0]);       
            if($bool1){
                $this->redirect('Detail/index?id='.$data['bookid']);
            } else {
                $this->error('删除失败....');
            }
        } else {
           $this->error('删除失败....');
        }
    }

    // 删除某个评论
    public function delComment()
    {
        if(empty($_GET)){
            $this->redirect('Detail/index');
        }
        // var_dump($_GET);exit;
        $data = I('get./d');
        // $arr = M('reply')->where(array('commentid'=>$data['id'],'status'=>'0'))->select();
        // var_dump($arr);exit;
        $arr['status'] = '1';
        $bool = M('reply')->where(array('commentid'=>$data['id'],'status'=>'0'))->save($arr);
        // var_dump($bool);exit;
        $arr1['status'] = '1';
        $bool1 = M('comment')->where(array('id'=>$data['id'],'status'=>'0'))->save($arr1);
        if($bool1){
            $this->redirect('Detail/index?id='.$data['bookid']);
        } else {
            $this->error('删除失败....');
        }
    }

    // 点赞
    public function like()
    {
        if(empty($_POST)){
            $this->redirect('Detail/index');
        }

        $data = I('post./d');
        // var_dump($data);exit;
        $arr = M('comment')->where(array('id'=>$data['commentid']))->select();
        // var_dump($arr);
        $arr[0]['likenum'] += 1;
        // var_dump($arr);exit;
        // exit;
        $bool = M('comment')->where(array('id'=>$data['commentid']))->save($arr[0]);
        // var_dump($bool);exit;
        if($bool){
           $this->redirect('Detail/index?id='.$data['bookid']);
        } else {
            $this->error('点你妹啊。。。');
        }
    }

    // 购买全本
    public function doorder()
    {
        if(empty($_POST)){
            $this->redirect('Detail/index');
        }

        $data = I('post.');
        $arr['total'] = $data['total'];
        $arr['readerid'] = session('reader_id');
        $arr['addtime'] = time();
        $Orders = M('orders');
        $Orders->create($arr);
        if($Orders->add()){
            $orderid = $Orders->where(array('addtime'=>$arr['addtime']))->field('id')->select();
            $arr1['orderid'] = $orderid[0]['id'];
            $arr1['bookname'] = $data['bookname'];
            $arr1['price'] = $data['total'];
            M('detail')->create($arr1);
            M('detail')->add();
            $shelf['readerid'] = session('reader_id');
            $shelf['bookid'] = $data['bookid'];
            $shelf['status'] = '0';
            M('bookshelf')->create($shelf);
            M('bookshelf')->add();
        }
    }
} 