<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/1/12
 * Time: 20:26
 */

namespace app\admin\controller;


use phpmailer\PHPMailer;
use think\Controller;

class Index extends Controller
{
    //测试获取经纬度坐标
    public function getLngLat(){
        $res = \Map::getLngLat('北京市海淀区上地十街10号');
        return $res;
    }

    //生成以一个地图
    public function panorama(){
        $res = \Map::panorama('北京市海淀区上地十街10号');
        return $res;
    }


    //发送邮件
    public function sendEmail(){
        \phpmailer\Email::send('','','');
        return '发送成功';
    }
}