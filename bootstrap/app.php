<?php
/**
 * Created by PhpStorm.
 * User: tangchunlin
 * Date: 2018/9/26
 * Time: 11:30 PM
 */

namespace bootstrap;

class app
{
    public static $classMap = [];

    /**
     * @throws \Exception
     */
    static public function run() {
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP . '/controllers/' . ucfirst($ctrlClass) . 'Controller.php';
        $cltrlClass = '\\' . MODULE . '\\controllers\\' . ucfirst($ctrlClass) . 'Controller';
        if (is_file($ctrlFile)) {
            include $ctrlFile;
            $ctrl = new $cltrlClass();
            $ctrl->$action();
        } else {
            throw new \Exception('Not Found the Controller ' . $ctrlClass);
        }
    }


    static public function load($class) {
        // 自动加载类库
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = APP_PATH . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}
