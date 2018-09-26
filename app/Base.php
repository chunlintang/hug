<?php

/**
 * Created by PhpStorm.
 * User: tangchunlinit@gmail.com
 * Date: 2018/9/26
 * Time: 11:25 AM
 */

namespace App;

require '../vendor/autoload.php';

use phpspider\core\phpspider;

class Base
{
    /**
     * @var
     */
    public $config;

    /**
     * @param $config
     */
    public function setConfig($config) {
        $this->config = $config;
    }

    /**
     * task start
     */
    public function start() {
        $spider = new phpspider($this->configs);
        $spider->start();
    }
}
