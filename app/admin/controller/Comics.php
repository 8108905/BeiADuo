<?php
declare (strict_types=1);

namespace app\admin\controller;

use app\model\Banner;
use app\model\Category;
use app\model\Comic;
use think\Exception;
use think\Request;
use think\Response;
use think\response\Json;

class Comics extends BaseController
{
    public function index(): Response
    {
        return view();
    }

    public function create(): Response
    {
        $categories = Category::where('belongsType', '<', 2)->select();
        return view('', array('categories' => $categories));

    }

    public function save(Request $request): Response
    {

        $save = Comic::create($request->param());
        if ($save) {
            return json(['msg' => '创建成功', 'code' => 0]);

        } else {
            return json(['msg' => '创建失败', 'code' => 1]);

        }

    }

    public function read($id): Response
    {
        return view('', array('id' => $id));
    }

    public function edit($id): Response
    {
        $categories = Category::where('belongsType', '<', 2)->select();
        $data = Comic::find($id);
        return view('', ['categories' => $categories, 'data' => $data]);
    }

    public function update(Request $request, $id): Response
    {
        $data = $request->param();
        $data ['recommend'] = $request->param('recommend') ?: false;
        $data ['review'] = $request->param('review') ?: false;
        $data ['locked'] = $request->param('locked') ?: false;
        $data ['status'] = $request->param('status') ?: false;
        $data ['adult'] = $request->param('adult') ?: false;

        $comic = Comic::update($data);

        $comic_id= Banner::where(array('comic_id'=>$comic->id,'type'=>true))->find();

        if ( $data ['recommend']) {
          if ($comic_id) {
              $bannerData =array('id'=>$comic_id->id,
                  'name'=>$comic->name, 'image'=>$comic->cover,
                  'comic_id'=>$comic->id, 'status'=>true, 'type'=>true);
              $comic_id->update($bannerData);
          }else{
              $bannerData =array(
                  'name'=>$comic->name, 'image'=>$comic->cover,
                  'comic_id'=>$comic->id, 'status'=>true, 'type'=>true);
              Banner::create($bannerData);
          }
        }else{
            if ($comic_id) {
                $comic_id->delete();
            }
        }
        if ($data) {
            return json(['msg' => '修改成功', 'code' => 0]);
        } else {
            return json(['msg' => '修改失败', 'code' => 1]);
        }
    }

    public function addChapter(int $id): Response
    {
        return view('', array('comic_id' => $id));
    }

    public function editChapter(int $id): Response
    {
        return view('', array('comic_id' => $id, 'data' => 1));
    }

    public function delete($id): Response
    {
        $delete = Comic::destroy($id);
        if ($delete) {
            return json(['msg' => '删除成功', 'code' => 0]);
        } else {
            return json(['msg' => '删除失败', 'code' => 1]);
        }
    }

    public function getAll(): Response
    {
        $data = Comic::scope(function ($query) {
            if (request()['startTime'] && request()['endTime']) {
                $query->where('create_time', 'between time', [request()['startTime'], request()['endTime']]);
            }
            if (request()['name']) {
                $query->where('name', 'like', '%' . request()['name'] . '%');
            }
            if (request()['group']) {
                $query->where('group', 'like', '%' . request()['group'] . '%');
            }
            if (request()['status']) {
                $query->where('status', 'like', '%' . request()['status'] . '%');
            }
        })->paginate(request()['limit']);
        return json(['code' => 0, 'msg' => '查询成功', 'data' => $data]);
    }


    public function batchDel(): Response
    {
        $delete = Comic::destroy(explode(',', request()->param('idsStr')));
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
                Comic::update(array('id' => $item, 'locked' => true));
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
                Comic::update(array('id' => $item, 'locked' => false));
            }
            return json(array('msg' => '下架成功', 'code' => 0));
        } catch (Exception $exception) {
            return json(array('msg' => '下架失败请检查', 'code' => 1));
        }
    }

    public function getAllChapters(int $id, Request $request): Response
    {
        $data = Comic::find($id)->chapters()->paginate($request['limit']);

        return json(['code' => 0, 'msg' => '获取成功', 'data' => $data]);
    }

    public function getAllReview(Request $request): Response
    {
        $data = Comic::where('review', 0)->paginate($request['limit']);
        return json(['code' => 0, 'msg' => '获取成功', 'data' => $data]);
    }

    public function review(): Response
    {
        return view();
    }

    public function getAllReject(Request $request): Response
    {
        $data = Comic::where('review', 2)->paginate($request['limit']);
        return json(['code' => 0, 'msg' => '获取成功', 'data' => $data]);
    }

    public function reject(): Response
    {
        return view();
    }

}
