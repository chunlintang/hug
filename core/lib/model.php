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
        $dsn = 'mysql:host=localhost;dbname=phpspider';
        $username = 'root';
        $passwd = 'root';
        try {
            parent::__construct($dsn, $username, $passwd);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
