<?php
/**
 * Created by PhpStorm.
 * User: tangchunlinit@gmail.com
 * Date: 2018/9/27
 * Time: 8:38 AM
 */

namespace core\lib;

use Medoo\Medoo;

class model extends Medoo
{
    public function __construct() {
        $option = conf::all('database');
        parent::__construct($option);
    }
}
