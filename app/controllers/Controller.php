<?php
/**
 * Created by PhpStorm.
 * User: tangchunlinit@gmail.com
 * Date: 2018/9/27
 * Time: 8:54 AM
 */

namespace app\controllers;

use Twig_Loader_Filesystem;

class Controller
{
    /**
     * @var
     */
    public $assign;

    /**
     * Controller constructor.
     */
    public function __construct() {
    }

    /**
     * @param $name
     * @param $value
     */
    public function assign($name, $value) {
        $this->assign[$name] = $value;
    }

    /**
     * @param $file
     * @throws \Exception
     */
    public function display($file) {
        $filePath = STATIC_PATH . '/views/' . $file . '.html';
        try {
            if (is_file($filePath)) {
                extract($this->assign);

                $loader = new Twig_Loader_Filesystem(STATIC_PATH . '/views');
                $twig = new \Twig_Environment($loader, [
                    'cache' => APP_PATH . '/runtime/caches',
                    'debug' => DEBUG // for development environment, if you are in production should close it.
                ]);
                $template = $twig->loadTemplate($file . '.html');
                $template->display($this->assign ? $this->assign : []);
            }
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
