<?php

namespace Modules\System\Admin;

use App\Http\Controllers\Controller;

class Common extends Controller
{

    protected $assign = [];

    /**
     * 模板赋值
     * @param $name
     * @param $value
     */
    public function assign($name, $value): void
    {
        $this->assign[$name] = $value;
    }

    /**
     * 系统模板
     * @param string $tpl
     * @param string $route
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function systemView(string $tpl = '', string $route = '')
    {
        return system_view($tpl, $this->assign, $route);
    }

    /**
     * 布局视图
     * @param string $tpl
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function layoutView(string $tpl = '')
    {
        return layout_view($tpl, $this->assign);
    }

    /**
     * 弹窗视图
     * @param string $tpl
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dialogView(string $tpl = '')
    {
        return dialog_view($tpl, $this->assign);
    }

}
