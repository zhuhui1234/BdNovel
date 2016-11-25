<?php
/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getPage($count, $pagesize = 20) {
    $Page = new \Admin\Page\AjaxPage($count, $pagesize);
    $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $Page->setConfig('prev', '上一页');
    $Page->setConfig('next', '下一页');
    $Page->setConfig('last', '末页');
    $Page->setConfig('first', '首页');
    $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $Page->lastSuffix = false;//最后一页不显示为总页数
    return $Page;
}

function get_client_browser($glue = null) {
    $browser = array();
    $agent = $_SERVER['HTTP_USER_AGENT']; //获取客户端信息
    
    /* 定义浏览器特性正则表达式 */
    $regex = array(
        'ie'      => '/(MSIE) (\d+\.\d)/',
        'chrome'  => '/(Chrome)\/(\d+\.\d+)/',
        'firefox' => '/(Firefox)\/(\d+\.\d+)/',
        'opera'   => '/(Opera)\/(\d+\.\d+)/',
        'safari'  => '/Version\/(\d+\.\d+\.\d) (Safari)/',
    );
    foreach($regex as $type => $reg) {
        preg_match($reg, $agent, $data);
        if(!empty($data) && is_array($data)){
            $browser = $type === 'safari' ? array($data[2], $data[1]) : array($data[1], $data[2]);
            break;
        }
    }
    return empty($browser) ? false : (is_null($glue) ? $browser : implode($glue, $browser));
}

function ajaxSearch($type,$data) {    
    // if($type=="a"){
    //     $typename = '<p style="font-size:16px;">作者</p>';
    //     echo $typename;
    //     // var_dump($data);exit;
    //     foreach ($data as $key => $v) {
    //         $str = '<li onclick="fill(\''.$v['name'].'\',\''.$v['id'].'\')" data-id="'.$v['id'].'">'.$v['name'].'</li>';
    //         echo $str;
    //     }
    // }
    if($type=="b"){
        $typename = '<p style="font-size:16px;">&nbsp;&nbsp;图书</p>';
        echo $typename;
        foreach ($data as $key => $v) {
            $str = '<li onclick="fill(\''.$v['bookname'].'\',\''.$v['id'].'\')" data-id="'.$v['id'].'" >&nbsp;&nbsp;'.$v['bookname'].'</li>';
            echo $str;
        }
    }
}
?>