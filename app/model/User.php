<?php
declare (strict_types=1);

namespace app\model;

use think\Model;
use think\model\relation\BelongsTo;
use think\model\relation\HasMany;
use think\Response;
use think\response\Json;


class User extends Model
{
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }


    public function userLoginLogs():HasMany {
        return $this->hasMany(UserLoginLog::class);
    }
    public function usersSearch($query, $column, $request): Response
    {
        return $query->where($column, 'like', '%' . $request . '%');
    }

    public function getVipEndAtAttr(string $data):string
    {
        if (strtotime($data) < time()) {
            return '已过期';
        } else {
            return $data;
        }
    }

    public function getFromTypeAttr(int $fromType):string
    {
        $data =array('1'=>'漫画', '2'=>'动漫','3'=>'其他');
        return  $data[$fromType];
    }

    public function getGroupAttr(int $group): string
    {
        $data =array('1'=>'普通用户', '2'=>'超级会员', '3'=>'签约作者', '4'=>'超级管理员');
        return  $data[$group];
    }

    public function getRegisterTypeAttr(int $registerType): string
    {
        $data =array('0'=>'用户注册', '1'=>'后台添加');
        return  $data[$registerType];
    }

    public function login(array $data): array
    {
        if (!captcha_check($data['captcha'])) {
            return ['msg' => '验证码错误', 'code' => 1];
        }

        $user = User::where(array('email' => $data['email'], 'password' => md5($data['password']), 'group' => 4, 'status'=>true))->find();

        if ($user) {
            session('adminAccount', array('adminId' => $user['id'], 'adminEmail' => $user['email']));
            return ['msg' => '登陆成功', 'code' => 0];
        } else {
            return ['msg' => '管理员不存在或密码错误', 'code' => 1];
        }
    }
}
