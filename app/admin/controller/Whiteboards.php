<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\model\Whiteboard;
use think\Request;
use think\Response;

class Whiteboards
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
        Whiteboard::create($data);
        return json(['status' => 'success', 'msg' => '修改成功','code'=>0]);

    }

    public function edit($id): Response
    {
        $Whiteboard = Whiteboard::find($id);
        return view('', ['data' => $Whiteboard]);

    }


    public function update(Request $request): Response
    {
        $data = $request->param();
        if (!$request->param('status')) {
            $data['status'] = false;
        }
        Whiteboard::update($data);
        return json(['status' => 'success', 'msg' => '修改成功','code'=>0]);
    }


    public function delete($id): Response
    {

        $Whiteboard = Whiteboard::destroy($id);
        if ($Whiteboard) {
            return json(['status' => 'success', 'msg' => '删除成功','code'=>0]);
        } else {
            return json(['status' => 'error', 'msg' => '删除失败','code'=>1]);
        }
    }

    public function getAll(): Response
    {
        $data = Whiteboard::select();
        return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $data]);
    }
}
