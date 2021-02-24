<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\model\Banner;
use think\Request;
use think\Response;

class Banners
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

            $data['type'] = $request->param('type') ?? false ;
            $data['status']= $request->param('status') ?? false ;

        $Banner = Banner::create($data);

        if ($Banner) {
            return json(['status' => 'success', 'msg' => '新建成功','code'=>0]);
        }else{
            return json(['status' => 'fail', 'msg' => '新建错误']);
        }
    }

    public function edit($id):Response
    {
        $data =Banner::find($id);
        return  view('',['data'=>$data]);
    }


    public function update(Request $request): Response
    {
        $data =$request->param();
        $data['type'] = $request->param('type') ?? false ;
        $data['status']= $request->param('status') ?? false ;

        $Banner =   Banner::update($data);

        if ($Banner) {
            return json(['status' => 'success', 'msg' => '修改成功','code'=>0]);
        }else{
            return json(['status' => 'fail', 'msg' => '修改失败']);

        }
    }


    public function delete($id):Response
    {
        $Banner = Banner::destroy($id);
        if ($Banner) {
            return json(['status' => 'success', 'msg' => '删除成功','code'=>0]);
        }else{
            return json(['status' => 'fail', 'msg' => '删除失败']);
        }
    }

    public function getAll():Response
    {
        $data  = Banner::paginate(\request()['limit']);
        return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $data]);
    }

}
