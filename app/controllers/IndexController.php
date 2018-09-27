<?php
/**
 * Created by PhpStorm.
 * User: tangchunlinit@gmail.com
 * Date: 2018/9/27
 * Time: 8:05 AM
 */

namespace app\controllers;

class IndexController extends Controller
{
    public function index() {
        $data = "hello world";
        $this->assign('data', $data);
        $this->display('index/index');
    }
}
