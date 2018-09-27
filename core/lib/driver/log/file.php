<?php
/**
 * @author: Mantis
 * @date: 2018/9/27 10:56 PM
 */

namespace core\lib\driver\log;

use core\lib\conf;

class file
{
    /**
     * @var mixed
     */
    public $path;

    /**
     * file constructor.
     * @throws \Exception
     */
    public function __construct() {
        $conf = conf::get('OPTION', 'log');
        $this->path = $conf['PATH'];
    }

    /**
     * @param $message
     * @param string $file
     * @return bool|int
     */
    public function log($message, $file = 'log') {
        if (!is_dir($this->path)) {
            mkdir($this->path . '0777', true);
        }
        return file_put_contents($this->path . $file . '-' . date('Ymd') . '.log', date('Y-m-d H:i:s') . "\t" . json_encode($message) . PHP_EOL, FILE_APPEND);
    }
}
