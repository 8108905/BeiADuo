<?php
declare (strict_types = 1);

namespace app\index\controller;

use think\facade\View;

class Index extends  BaseController
{
    public function index()
    {
        dd(config('website.site.name'));
        return View::fetch('');
    }
}
