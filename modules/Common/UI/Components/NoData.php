<?php

namespace Modules\Common\UI\Components;

use Illuminate\View\Component;

/**
 * 数据不存在
 * Class NoData
 * @package Modules\Common\UI\Components
 */
class NoData extends Component
{
    public $title;
    public $content;
    public $reload;

    public function __construct($title = '未找到数据', $content = '暂时未找到数据，您可以尝试刷新页面', $reload = true)
    {
        $this->title = $title;
        $this->content = $content;
        $this->reload = $reload;
    }

    public function render()
    {
        return view('Common.UI.View.Components.nodata');
    }
}
