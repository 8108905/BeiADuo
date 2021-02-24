<?php
declare (strict_types=1);

namespace app\admin\controller;


use app\model\User;

use think\App;
use think\Request;
use think\Response;
use think\response\Json;
use think\response\View;

class Index extends \app\admin\controller\BaseController
{

    public function index(): View
    {
        $adminEmail = session('adminAccount')['adminEmail'];
        return view('', compact('adminEmail'));
    }

    public function welcome(): View
    {
        return view();
    }

    public function website_setting(): View
    {
        return view('', array('website' => config('website')));
    }

    public function website_setting_save(Request $request):Json
    {
        $data = $request->param();

        $response = $this->save_file($data, 'website');
        return json($response);
    }

    public function theme_setting(): View
    {
        return view('', array('theme' => config('theme')));
    }

    public function theme_setting_save(Request $request): \think\response\Json
    {
        $data = $request->param();
        $response = $this->save_file($data, 'theme');
        return json($response);
    }

    public function dashboard(): View
    {
        return view();
    }

    public function setting(): View
    {
        return view();
    }

    public function alertSkin(): View
    {
        return view();
    }

    public function login(Request $request)
    {
        if ($request->isPost()) {
            $user = new User();
            $response = $user->login($request->param());
            return json(['msg' => $response['msg'], 'code' => $response['code']]);
        }
        return view();
    }

    public function logout()
    {
        session('adminAccount', null);
        return json(['msg' => '退出成功', 'status' => 'success']);
        return redirect('/admin/login');
    }
}
