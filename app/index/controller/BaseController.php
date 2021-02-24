<?php
declare (strict_types = 1);

namespace app\index\controller;

use think\Request;
use think\route\dispatch\Controller;
use think\View;

class BaseController extends \app\BaseController
{
   protected $view ;

    protected function initialize()
    {dd(1111);
    }


}
