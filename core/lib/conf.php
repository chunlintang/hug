<?php
/**
 * @author: Mantis
 * @date: 2018/9/27 10:10 PM
 */

namespace core\lib;

class conf
{
    /**
     * @var array
     */
    static public $conf = [];

    /**
     * @param $name
     * @param $file
     * @return mixed
     * @throws \Exception
     */
    public static function get($name, $file) {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        }
        $path = CONF . '/' . $file . '.php';
        if (is_file($path)) {
            $conf = include $path;
            if (isset($conf[$name])) {
                self::$conf[$file] = $conf;
                return $conf[$name];
            } else {
                throw new \Exception('Not Found the config ' . $name);
            }
        }

        throw new \Exception('Not Found the config file ' . $file);
    }

    /**
     * @param $file
     * @return mixed
     * @throws \Exception
     */
    public static function all($file) {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        }
        $path = CONF . '/' . $file . '.php';
        if (is_file($path)) {
            $conf = include $path;
            self::$conf[$file] = $conf;
            return $conf;
        }
        throw new \Exception('Not Found the config file ' . $file);
    }
}
