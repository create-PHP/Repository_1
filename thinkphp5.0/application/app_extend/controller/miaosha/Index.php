<?php
namespace app\app_extend\controller\miaosha;
use think\Controller;
 
class Index extends controller
{
    public function index()
    {
      return $this->fetch();
    }
}
