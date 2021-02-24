<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\Chapter;
use app\model\Image;
use think\facade\App;
use think\facade\Config;
use think\facade\View;

class BaseController
{

    public function save_file(array $data, string $file_name): array
    {
        $a = var_export($data, true);
        $file_data = <<<INFO
<?php
    return 
    $a;
INFO;
        $file = App::getRootPath() . 'config/' . $file_name . '.php';
        if (file_exists($file)) {
            file_put_contents($file, $file_data);
            return array('code' => 0, 'msg' => '修改成功');
        } else {
            return array('code' => 1, 'msg' => '配置文件不存在请检查程序的完整性');
        }
    }

    public function deleteChapter($id): array
    {
        $chapter = Chapter::find($id);

        $imageIds = $chapter->images()->column('id');
        if ($imageIds) {
            $deleteImage = Image::destroy($imageIds);
            if (!$deleteImage) {
                return ['msg' => '删除失败', 'code' => 1, 'aaa' => 1];
            }
        }
        $delete = $chapter->delete();
        if ($delete) {

            return ['msg' => '删除成功', 'code' => 0, 'aaa' => 2];
        } else {

            return ['msg' => '删除失败', 'code' => 1, 'aaa' => 3];
        }

    }
}
