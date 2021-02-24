<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\UserLoginLog;
use think\Request;
use think\Response;

class UserLoginLogs
{

    public function index(): Response
    {
        return view();
    }


    public function delete($id): Response
    {
        $delete = UserLoginLog::destroy($id);
        if ($delete) {
            return json(['status' => 'fail', 'msg' => '删除成功', 'code' => 0]);
        } else {
            return json(['status' => 'fail', 'msg' => '删除失败', 'code' => 1]);
        }
    }

    public function batchDel(): Response
    {
        $delete = UserLoginLog::destroy(explode(',', request()->param('idsStr')));
        if ($delete) {
            return json(['status' => 'success', 'msg' => '删除成功', 'code' => 0]);
        } else {
            return json(['status' => 'fail', 'msg' => '删除失败', 'code' => 1]);
        }
    }


    public function getAll(): Response
    {
        $data = UserLoginLog::scope(function ($query) {


            if (request()['user_id']) {
                $query->where('user_id', 'like', '%' . request()['user_id'] . '%');
            }
            if (request()['group']) {
                $query->where('group', 'like', '%' . request()['group'] . '%');
            }
            if (request()['browser']) {
                $query->where('browser', 'like', '%' . request()['browser'] . '%');
            }
            if (request()['from']) {
                $query->where('from', 'like', '%' . request()['from'] . '%');

            }
            if (request()['loginIp']) {
                $query->where('loginIp', 'like', '%' . request()['loginIp'] . '%');

            }
        })->paginate(request()['limit']);

        return json(['code' => 0, 'msg' => '查询成功', 'data' => $data]);
    }

}
