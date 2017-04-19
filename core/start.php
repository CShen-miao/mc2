<?php
namespace core;
/*
 * 启动框架
 * 自动加载
 */

class start
{
    public static $classMap = array();
    public $assign;
    static public function run()
    {
        $route = new \core\lib\route(); #实例化一个不存在的类会调用自动加载函数
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        p($ctrlfile);
        if(is_file($ctrlfile)) {
            include $ctrlfile; #引入类,路径来源：route类，解析url定义url参数位
            $ctrl = new $ctrlClass(); #实例化这个类
            $ctrl->$action(); #调用方法，默认为index，$action 为返回的方法名，$action() 方法
        } else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
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

    public function assign($name,$value)
    {
        $this->assign[$name] = $value;

    }
    public function display($file)
    {
        $file = APP.'/view/'.$file;
        p($file);
        if(is_file($file)) {
            extract($this->assign);//打散为数组，将每个键值变成单独的变量
            include $file;
        }
    }
}
