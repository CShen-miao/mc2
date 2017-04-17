<?php
namespace core\lib;
/**
 * 路由类
 * 实现路径的索引
 */
class route
{
    public function __construct()
    {
        /*
         * 1.隐藏index.php 配置.htaccess 文件 nginx与apache 配置不同
         * 2.获取URL 参数部分
         * 3.返回对应控制器和方法
         */

        p($_SERVER);

    }
}
