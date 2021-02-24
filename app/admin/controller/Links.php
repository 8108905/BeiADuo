<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\model\Link;
use think\Request;
use think\Response;

class Links
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

        $Link = Link::create($data);

        if ($Link) {
            return json(['status' => 'success', 'msg' => '新建成功','code'=>0]);
        }else{
            return json(['status' => 'fail', 'msg' => '新建错误']);
        }
    }

    public function edit($id):Response
    {
        $data =Link::find($id);
        return  view('',['data'=>$data]);
    }


    public function update(Request $request): Response
    {
        $data =$request->param();
        if ( !$request->param('status')) {
            $data['status'] = false  ;
        }

     $link =   Link::update($data);

        if ($link) {
        return json(['status' => 'success', 'msg' => '修改成功','code'=>0]);
    }else{
        return json(['status' => 'fail', 'msg' => '修改失败']);

    }
    }


    public function delete($id):Response
    {
        $Link = Link::destroy($id);
        if ($Link) {
            return json(['status' => 'success', 'msg' => '删除成功','code'=>0]);
        }else{
            return json(['status' => 'fail', 'msg' => '删除失败']);
        }
    }

    public function getAll():Response
    {
        $data  = Link::paginate(\request()['limit']);
        return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $data]);
    }


}
