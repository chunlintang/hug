<?php
/**
 * Created by PhpStorm.
 * User: tangchunlinit@gmail.com
 * Date: 2018/9/26
 * Time: 11:32 PM
 */

namespace core\lib;

class route
{
    public $ctrl;
    public $action;

    public function __construct() {
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $path_arr = explode('/', trim($path, '/'));
            if (isset($path_arr[0])) {
                $this->ctrl = $path_arr[0];
            }
            unset($path_arr[0]);
            if (isset($path_arr[1])) {
                $this->action = $path_arr[1];
                unset($path_arr[1]);
            } else {
                $this->action = 'index';
            }

            $count = count($path_arr) + 2;
            $i = 2;
            while ($i < $count) {
                if (isset($path_arr[$i + 1])) {
                    $_GET[$path_arr[$i]] = $path_arr[$i + 1];
                }
                $i += 2;
            }
        } else {
            $this->ctrl = 'index';
            $this->action = 'index';
        }
    }
}
