<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\Category;
use think\Request;
use think\Response;

class Categories
{
    public function index(): Response
    {
        return view('');
    }

    public function create(): Response
    {
        return view('');
    }

    public function save(Request $request): Response
    {


        $data = $request->param();
        if (!$request->param('status')) {
            $data['status'] = false;
        }
        Category::create($data);
        return json(['status' => 'success', 'msg' => '修改成功','code'=>0]);

    }

    public function edit($id): Response
    {
        $category = Category::find($id);
        return view('', ['data' => $category]);

    }


    public function update(Request $request): Response
    {
        $data = $request->param();
        if (!$request->param('status')) {
            $data['status'] = false;
        }
        Category::update($data);
        return json(['status' => 'success', 'msg' => '修改成功','code'=>0]);
    }


    public function delete($id): Response
    {

        $category = Category::destroy($id);
        if ($category) {
            return json(['status' => 'success', 'msg' => '删除成功','code'=>0]);
        } else {
            return json(['status' => 'error', 'msg' => '删除失败','code'=>1]);
        }
    }

    public function getAll(): Response
    {
        $data = Category::select();
        return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $data]);
    }
}
