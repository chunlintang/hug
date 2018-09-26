<?php
/**
 * Created by PhpStorm.
 * User: tangchunlin
 * Date: 2018/9/26
 * Time: 11:34 AM
 */

namespace App;

class Qiushibaike extends Base
{
    public $configs;

    public function __construct() {
        $this->config = [
            'name' => '糗事百科',
            'domains' => [
                'qiushibaike.com',
                'www.qiushibaike.com'
            ],
            'log_file' => __DIR__ . '/runtime/log/qiushibaike-' . date('Ymd') . '.log',//日志存放位置
            'tasknum' => 5, // 任务数
            'queue_config' => [
                'host' => '127.0.0.1',
                'port' => 6379,
                'pass' => '',
                'db' => 2,
                'prefix' => 'phpspider',
                'timeout' => 30
            ],
            'export' => [
                'type' => 'db',
                'table' => 'qiushibaike',
            ],
            'db_config' => [
                'host' => '127.0.0.1',
                'port' => 3306,
                'user' => 'root',
                'pass' => 'root',
                'name' => 'spider'
            ],
            'scan_urls' => [
                'http://www.qiushibaike.com/'
            ],
            'content_url_regexes' => [
                'http://www.qiushibaike.com/article/\d+'
            ],
            'list_url_regexes' => [
                'http://www.qiushibaike.com/8hr/page/\d+\?s=\d+'
            ],
            'fields' => [
                [
                    'name' => 'article_title',
                    'selector' => '//*[@id=\'single-next-link\']//div[contains(@class,\'content\')]/text()[1]',
                    'required' => true,
                ],
                [
                    'name' => "article_headimg",
                    'selector' => "//div[contains(@class,'author')]//a[1]",
                    'required' => true,
                ],
                [
                    'name' => 'article_content',
                    'selector' => "//*[@id='single-next-link']",
                    'required' => true
                ],
                [
                    'name' => 'article_author',
                    'selector' => "//div[contains(@class, 'author')]//h2",
                    'required' => true
                ],
                [
                    'name' => "article_publish_time",
                    'selector' => "//div[contains(@class,'author')]//h2",
                    'required' => true,
                ],
                [
                    'name' => "url",
                    'selector' => "//div[contains(@class,'author')]//h2",   // 这里随便设置，on_extract_field回调里面会替换
                    'required' => true,
                ]
            ]
        ];
    }
}

$qb = new Qiushibaike();
$qb->start();
