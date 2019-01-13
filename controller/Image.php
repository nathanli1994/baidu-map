<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/1/13
 * Time: 12:59
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;
use think\File;

class Image extends Controller
{
    public function upload(){
        $file = Request::instance()->file('file');
        $info = $file->move('upload');

        if($info && $info->getPathname()){
            return show(1, 'success', '/' . $info->getPathname());
        }
        return show(0, 'upload error');
    }
}