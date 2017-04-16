<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('MC',realpath(' /')); #当前文件绝对路径
define('CORE',MC.'core');
define('APP',MC.'app');

define('DEBUG',true);

if(DEBUG) {
    ini_set('display_error','On'); #ini_set() 设定指定配置选项的值
} else {
    ini_set('display_error','Off');
}

include CORE.'/common/function.php';
p('123');
#include CORE.'/start.php';

#\core\start::run();
