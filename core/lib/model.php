<?php
/**
 * Created by PhpStorm.
 * User: tangchunlinit@gmail.com
 * Date: 2018/9/27
 * Time: 8:38 AM
 */

namespace core\lib;

class model extends \PDO
{
    public function __construct() {
        $database = conf::all('database');
        try {
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD']);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
