<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;
use think\model\relation\BelongsTo;
use think\model\relation\HasMany;


class Chapter extends Model
{

    public function chapters():BelongsTo{
        return  $this->belongsTo(Comic::class);
    }

    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
}
