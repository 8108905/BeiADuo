<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\Card;
use app\model\User;
use think\model\concern\TimeStamp;
use think\Request;
use think\Response;

class Cards
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
        $money = $request->param('money');
        $count = $request->param('count');
        $gold = $request->param('gold');
        if (is_numeric($money) && is_numeric($count) && is_numeric($gold)) {
            for ($i = 0; $i < $request->param('count'); $i++) {
                $data = array(
                    'name' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 15),
                    'password' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 8),
                    'money' => $money,
                    'gold' => $gold,

                );
                Card::create($data);
            }

            return json(['status' => 'success', 'msg' => '修改成功', 'code' => 0]);
        } else {
            return json(['status' => 'fail', 'msg' => '提交数据错误']);
        }


    }

    public function edit($id): Response
    {
        $Card = Card::find($id);
        return view('', ['data' => $Card]);

    }


    public function update(Request $request): Response
    {
        $data = $request->param();
        if (!$request->param('status')) {
            $data['status'] = false;
        }
        Card::update($data);
        return json(['status' => 'success', 'msg' => '修改成功', 'code' => 0]);
    }


    public function delete($id): Response
    {

        $Card = Card::destroy($id);
        if ($Card) {
            return json(['status' => 'success', 'msg' => '删除成功', 'code' => 0]);
        } else {
            return json(['status' => 'fail', 'msg' => '删除失败']);
        }
    }

    public function getAll(): Response
    {
        $data = Card::paginate(request()['limit']);
        return json(['code' => 0, 'msg' => '查询用户成功', 'data' => $data]);

    }

    public function batchDel(): Response
    {
        $delete = Card::destroy(explode(',', request()->param('idsStr')));
        if ($delete) {
            return json(['status' => 'success', 'msg' => '删除成功', 'code' => 0]);
        } else {
            return json(['status' => 'fail', 'msg' => '删除失败', 'code' => 1]);
        }
    }

    public function recharge(): Response
    {
        $users = User::select();
        return view('', array('users' => $users));
    }

    public function rechargePost(Request $request): Response
    {
        $user_id = $request->param('user_id');
        $name = $request->param('name');
        $password = $request->param('password');


        $checkUser = User::find($request->param('user_id'));


        $checkCard = Card::where('name', $name)->where('password', $password)->where('status', true)->find();


        if ($checkUser && $checkCard) {

            $chargeSuccess = User::update(array('gold' => $checkUser->gold + $checkCard->gold, 'id' => $user_id));

            if ($chargeSuccess) {
                $card = Card::update(array('status' => 0, 'use_time' => date('Y-m-d H:i:s'), 'user_id' => $user_id, 'id' => $checkCard->id));
                if ($card) {
                    return json(['status' => 'success', 'msg' => '充值成功', 'code' => 0]);
                } else {
                    return json(['status' => 'fail', 'msg' => '用户充值成功但充值卡状态尚未清空', 'code' => 1]);
                }

            }else{
                return json(['status' => 'fail', 'msg' => '用户充值失败', 'code' => 1]);
            }

        }else{
            return json(['status' => 'fail', 'msg' => '充值卡无效', 'code' => 1]);
        }
    }
}
