<?php
/**
 * @author: Mantis
 * @date: 2018/9/27 10:51 PM
 */

namespace core\lib;

class log
{
    /**
     * @var
     */
    static $class;

    /**
     * @throws \Exception
     */
    public static function init() {
        $driver = conf::get('DRIVER', 'log');
        $class = '\core\lib\driver\log\\' . $driver;
        self::$class = new $class;
    }

    /**
     * @param $name
     * @param string $file
     */
    public static function log($name, $file = 'log') {
        self::$class->log($name, $file);
    }
}
