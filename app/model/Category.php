<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

class Category extends Model
{
    public function getBelongsTypeAttr(int $belongsType):string
    {
        $data =array('0'=>'所有','1'=>'漫画', '2'=>'动漫','3'=>'其他');
        return  $data[$belongsType];
    }

}
