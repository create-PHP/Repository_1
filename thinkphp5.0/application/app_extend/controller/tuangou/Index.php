<?php
namespace app\app_extend\controller\tuangou;
use think\Controller;
 
class Index extends controller
{
    public function index()
    {
      return $this->fetch();
    }
}
