<?php
/**
 * Created by PhpStorm.
 * User: tangchunlinit@gmail.com
 * Date: 2018/9/27
 * Time: 8:54 AM
 */

namespace app\controllers;

class Controller
{
    public $assign;

    public function __construct() {
    }

    public function assign($name, $value) {
        $this->assign[$name] = $value;
    }

    public function display($file) {
        $file = STATIC_PATH . '/views/' . $file . '.html';
        if (is_file($file)) {
            extract($this->assign);
            include $file;
        }
    }
}
