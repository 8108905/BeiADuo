<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\Chapter;
use app\model\Image;
use think\Exception;
use think\Request;
use think\Response;

class Chapters extends BaseController
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
        return view();
    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $save = Chapter::create($request->param());
        if ($save) {
            return json(['msg' => '创建成功', 'code' => 0]);

        } else {
            return json(['msg' => '创建失败', 'code' => 1]);

        }
    }


    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $chapter = Chapter::find($id);
        return view('', array('data' => $chapter));
    }


    public function update(Request $request, $id)
    {
        $data = $request->param();
        $data ['review'] = $request->param('review') ?: false;
        $data ['locked'] = $request->param('locked') ?: false;


        $data = Chapter::update($data);

        if ($data) {
            return json(['msg' => '修改成功', 'code' => 0]);
        } else {
            return json(['msg' => '修改失败', 'code' => 1]);

        }
    }


    public function delete($id): Response
    {
        $response = $this->deleteChapter($id);
        return json($response);
    }

    public function batchDel(): Response
    {
        $delete = Chapter::destroy(explode(',', request()->param('idsStr')));
        if ($delete) {
            return json(['status' => 'success', 'msg' => '删除成功', 'code' => 0]);
        } else {
            return json(['status' => 'fail', 'msg' => '删除失败', 'code' => 1]);
        }
    }

    public function batchLock(): Response
    {
        try {
            foreach (explode(',', request()->param('idsStr')) as $item) {
                Chapter::update(array('id' => $item, 'locked' => true));
            }
            return json(array('msg' => '下架成功', 'code' => 0));
        } catch (Exception $exception) {
            return json(array('msg' => '下架失败请检查', 'code' => 1));
        }
    }

    public function batchUnLock(): Response
    {
        try {
            foreach (explode(',', request()->param('idsStr')) as $item) {
                Chapter::update(array('id' => $item, 'locked' => false));
            }
            return json(array('msg' => '下架成功', 'code' => 0));
        } catch (Exception $exception) {
            return json(array('msg' => '下架失败请检查', 'code' => 1));
        }
    }

    public function images(int $id)
    {
        $chapter = Chapter::find($id);
        $data = $chapter->images()->select();

        return view('', array('chapter' => $chapter, 'data' => $data));
    }

    public function getAllReview(Request $request): Response
    {
        $data = Chapter::where('review', 0)->paginate($request['limit']);
        return json(['code' => 0, 'msg' => '获取成功', 'data' => $data]);
    }

    public function review(): Response
    {
        return view();
    }

    public function getAllReject(Request $request): Response
    {
        $data = Chapter::where('review', 2)->paginate($request['limit']);
        return json(['code' => 0, 'msg' => '获取成功', 'data' => $data]);
    }

    public function reject(): Response
    {
        return view();
    }
}
