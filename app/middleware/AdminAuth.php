<?php
declare (strict_types=1);

namespace app\middleware;

class AdminAuth
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        if ($request->url() != '/admin/logout') {
            if ($request->url() == '/admin/login') {
                if (session('adminAccount')) {
                    return redirect('/admin/index');
                }
            } else {
                if (!session('adminAccount')) {
                    return redirect('/admin/login');
                }
            }
        }
        return $next($request);
    }
}
