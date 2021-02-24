<?php
declare (strict_types=1);

namespace app\model;

use think\Model;
use think\model\relation\BelongsTo;
use think\model\relation\HasMany;

/**
 * @mixin \think\Model
 */
class Comic extends Model
{

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function getVipTypeAttr(int  $value):string
    {
        $status = [ 0 => '免费', 1 => 'VIP免费', 2 => '金币收费'];
        return $status[$value];
    }

    public function chapters():HasMany{
        return  $this->hasMany(Chapter::class);
    }
    }
