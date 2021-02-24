<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\model\Booth;
use app\model\Category;
use think\Request;
use think\Response;

class Booths
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

        $data = $request->param();
        if (!$request->param('status')) {
            $data['status'] = false;
        }
        Booth::create($data);
        return json(['status' => 'success', 'msg' => '新建成功']);

    }

    public function edit($id):Response
    {
        $data =Booth::find($id);
        return  view('',['data'=>$data]);
    }


    public function update(Request $request): Response
    {

        $data = $request->param();
        if (!$request->param('status')) {
            $data['status'] = false;
        }
        $Booth=  Booth::update($data);
        if ($Booth) {
            return json(['status' => 'success', 'msg' => '更新成功','code'=>1]);
        }else{
            return json(['status' => 'fail', 'msg' => '更新失败']);
        }

    }


    public function delete($id):Response
    {

        $Booth = Booth::destroy($id);
        if ($Booth) {
            return json(['status' => 'success', 'msg' => '删除成功']);
        }else{
            return json(['status' => 'fail', 'msg' => '删除失败']);
        }
    }

    public function getAll():Response
    {
        $data  = Booth::select();
        return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $data]);
    }
}
