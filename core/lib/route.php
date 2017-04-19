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

        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
        	$path = $_SERVER['REQUEST_URI'];
        	$patharr = explode('/',trim($path,'/'));
            p($patharr);
        	//路径这里有点问题
            if(isset($patharr[2])) {
        		$this->ctrl = $patharr[2];
        		unset($patharr[0]);
                unset($patharr[1]);
                unset($patharr[2]);
        	}
        	if(isset($patharr[3])) {
        		$this->action = $patharr[3];
        		unset($patharr[3]);
        	} else {
        		$this->action = 'index';
        	}
        	//url 多余部分转换成 GET
			$count = count($patharr) + 4;
			$i = 4;
			while($i < $count) {
				if(isset($patharr[$i + 1])) {
				    $_GET[$patharr[$i]] = $patharr[$i + 1];
			    }
				$i+=2;
			}
        } else {
        	$this->ctrl = 'index';
        	$this->action = 'index';
        }

    }
}
