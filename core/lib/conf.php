<?php
namespace core\lib;

class conf
{
	/*
	* $name 配置项
	* $file 文件
	*/
    static public $conf = array();
	static public function get($name,$file){
		/*
		* 1.判断配置文件是否存在
		* 2.判断配置是否存在
		* 3.缓存配置
		*
		*/
		if(isset(self::$conf[$file])) {
			return self::$conf[$file][$name];
		} else {
			$file = MC.'/core/config/'.$file.'.php';
			p($file);
			if(is_file($file)){
				$conf = include $file;
				if(isset($conf[$name])) {
					self::$conf[$file] = $conf;
					return $conf[$name];
				} else {
					throw new \Exception('没有这个配置项'.$name);
				}

			} else {
				throw new \Exception('找不到配置文件'.$file);
			}

		}
		

	}
}