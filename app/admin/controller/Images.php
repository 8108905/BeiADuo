<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\Image;
use think\facade\Filesystem;
use think\Request;
use think\response\Json;

class Images
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    public function save(Request $request)
    {
    }

    public function saveImage(int $id, Request $request): Json
    {
        $image = Filesystem::disk('public')->putFile('comics/images', \request()->file('file'));
        $data = array('chapter_id' => $id, 'image' => '/storage/' . $image);
        $data = Image::create($data);
        if ($data) {
            return json(array('code' => 0, $data['image']));
        } else {
            return json(array('code' => 1, $data['image']));
        }
    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
