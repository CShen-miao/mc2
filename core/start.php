<?php
namespace core;
/*
 * 启动框架
 * 自动加载
 */

class start
{
    public static $classMap = array();
    static public function run()
    {
        p('ok');
        $route = new \core\lib\route(); #实例化一个不存在的类会调用自动加载函数
    }

    static public function load($class)
    {
        //自动加载类库
        if(isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\','/',$class);
            $file = MC . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}
