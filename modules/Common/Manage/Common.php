<?php

namespace Modules\Common\Manage;

use Modules\Common\Util\View;

/**
 * 管理端基础接口
 * @package Modules\Common\Model
 */
trait Common
{

    protected array $assign = [];

    /**
     * 模板赋值
     * @param $name
     * @param $value
     */
    public function assign($name, $value): void
    {
        $this->assign[$name] = $value;
    }

    public function systemView(string $tpl = '', string $route = '')
    {
        return (new View($tpl, $this->assign))->route($route)->render();
    }

    public function layoutView(string $tpl = '')
    {
        return (new View($tpl, $this->assign))->render('layout');
    }

    public function dialogView(string $tpl = '')
    {
        return (new View($tpl, $this->assign))->render('dialog');
    }

}
