<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;
use think\model\relation\BelongsTo;

/**
 * @mixin \think\Model
 */
class UserLoginLog extends Model
{
  public function user():BelongsTo
  {
      return $this->belongsTo(User::class);
  }


    public function getGroupAttr(int $group): string
    {
        $data =array('1'=>'普通用户', '2'=>'超级会员', '3'=>'签约作者', '4'=>'超级管理员');
        return  $data[$group];
    }
}
