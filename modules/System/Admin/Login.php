<?php

namespace Modules\System\Admin;

use Illuminate\Http\Request;

/**
 * 用户登录
 * @package Modules\System\System
 */
class Login extends Common
{

    public function index()
    {
        return layout_view();
    }

    public function submit(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $status = auth('admin')->attempt(['username' => $credentials['username'], 'password' => $credentials['password']], $request->has('remember'));
        if ($status) {
            return app_success('登录成功', [], route('admin.index'));
        }
        app_error('账号密码错误');
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect(route('admin.login'));
    }
}
