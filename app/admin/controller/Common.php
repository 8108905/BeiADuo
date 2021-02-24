<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\Booth;
use app\model\Category;
use think\facade\Filesystem;
use think\Request;
use think\Response;

class Common
{
    public function uploadImage()
    {
        $file = \request()->file('file');

        $name = Filesystem::disk('public')->putFile('admin/images',$file);
        if ($name) {
            return json(array('status' => 'success', 'name' => '/storage/'.$name));

        } else {
            return json(array('status' => 'fail'));

        }

    }
}
