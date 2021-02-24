<?php
declare (strict_types=1);

namespace app\admin\controller;

use think\Request;
use app\model\User;
use think\Response;

class Users
{

    public function index():Response
    {
        return view('');
    }

    public function create():Response
    {
        return view();
    }

    public function save(Request $request) :Response
    {
        $data = array(
            'name' => $request->param('name'),
            'email' => $request->param('email'),
            'password' => md5($request->param('password')),
            'role' => $request->param('role'),
            'status' => $request->param('status') ?? '0',
            'group' => $request->param('group'),
            'invitationCode' => rand(111111,999999),
            'vipEndAt' =>date('Y-m-d H:i:s'),
            'fromType'=>rand(0,1),
        );
        $checkUser = User::where('email', $data['email'])->find();
        if ($checkUser) {
            return json(['status' => 'fail', 'msg' => 'Email已存在']);
        }
        User::create($data);
        return json(['status' => 'success', 'msg' => '新建成功']);

    }



    public function edit($id):Response
    {
        $user = User::find($id);
        return view('', ['user' => $user]);
    }

    public function update(Request $request, $id):Response
    {
        $data =$request->param();


       $data['status'] =  $request->param('status')==false ? false:true;

       $user= User::update($data);
       if ($user) {
           return json(['msg' => '修改成功','code'=>0]);
       }else{
           return json([ 'msg' => '修改失败','code'=>1]);

       }

    }

    public function delete($id):Response
    {
        $delete = User::destroy($id);
        if ($delete) {
            return json(['status' => 'success', 'msg' => '删除成功']);
        } else {
            return json(['status' => 'fail', 'msg' => '删除失败']);
        }
    }

    public function batchDel():Response
    {
        $delete = User::destroy(explode(',',  request()->param('idsStr')));
        if ($delete) {
            return json(['status' => 'success', 'msg' => '删除成功','code'=>0]);
        } else {
            return json(['status' => 'fail', 'msg' => '删除失败','code'=>1]);
        }
    }

    public function getAll():Response
    {
        $users = User::scope(function ($query) {
            if (request()['startTime'] && request()['endTime']) {
                $query->where('create_time', 'between time', [request()['startTime'], request()['endTime']]);
            }
            if (request()['email']) {

                $this->usersSearch($query, 'email', request()['email']);
            }
            if (request()['name']) {
                $query->where('name', 'like', '%' . request()['name'] . '%');

            }
            if (request()['phone']) {
                $query->where('phone', 'like', '%' . request()['phone'] . '%');
            }
            if (request()['group']) {
                $query->where('group', 'like', '%' . request()['group'] . '%');
            }
            if (request()['status']) {
                $query->where('status', 'like', '%' . request()['status'] . '%');

            }
        })->paginate(request()['limit']);

        return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $users]);
    }

    public function loginLogData(int $id,Request $request):Response
    {

        $data = User::find($id)->userLoginLogs()->paginate($request['limit']);

          return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $data]);

    }

    public function loginLogPage(int  $id):Response
    {
        return view('',array('id'=>$id));
    }
}
