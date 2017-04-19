<?php
namespace app\ctrl;
//类名和方法名一样的时候，方法就会变成一个初始化的方法
class indexCtrl
{
    public function index()
    {
        p('indexController/ok');
        $model = new \core\lib\model();
    }
    public function show()
    {
        p('show.ok');
    }

}
