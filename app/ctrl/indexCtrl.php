<?php
namespace app\ctrl;
//类名和方法名一样的时候，方法就会变成一个初始化的方法
class indexCtrl extends \core\start
{
    public function index()
    {
    	$temp = \core\lib\conf::get('CTRL','route');
    	print_r($temp);
    	$title = '视图文件';
    	$data = 'hello world';
    	$this->assign('title',$title);
    	$this->assign('data',$data);
    	$this->display('index.html');
        /*
        p('indexController/ok');
        $model = new \core\lib\model();
        $sql = "select * from user";
        $res = $model->query($sql);
        p($res->fetchAll());
        */
    }
    public function show()
    {
        p('show.ok');
    }

}
