<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\model\Theme;
use think\Request;
use think\Response;

class Themes
{
    public function index():Response
    {
        return  view('');
    }


    public function create():Response
    {
        return  view('');
    }

    public function save(Request $request):Response
    {
        $data =$request->param();
        if ( !$request->param('status')) {
            $data['status'] = false  ;
        }
        Theme::create($data);
        return json(['status' => 'success', 'msg' => '新建成功','code'=>0]);
    }


    public function edit($id):Response
    {
        $category =Theme::find($id);
        return  view('',['data'=>$category]);
    }


    public function update(Request $request): Response
    {
        $data =$request->param();
        if ( !$request->param('status')) {
            $data['status'] = false  ;
        }
      Theme::update($data);
        return json(['status' => 'success', 'msg' => '修改成功','code'=>0]);

    }


    public function delete($id):Response
    {

        $category = Theme::destroy($id);
        if ($category) {
            return json(['status' => 'fail', 'msg' => '删除成功','code'=>0]);
        }else{
            return json(['status' => 'error', 'msg' => '删除失败']);
        }
    }

    public function getAll():Response
    {
        $data  = Theme::select();
        return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $data]);
    }
}
