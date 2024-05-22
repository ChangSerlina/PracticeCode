<?php
namespace tpl;
/**
* Class Tpl
*/
class Tpl {
protected $view_dir;//模板文件
protected $cache_dir;//缓存文件
protected $lifetime;//过期时间
protected $vars = [];//存放显示变量的数组
/**
* Tpl constructor.
* @param string $view_dir
* @param string $cache_dir
* @param string $lifetime
*/
public function __construct($view_dir='', $cache_dir='', $lifetime=''){

}
}