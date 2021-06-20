<?php

namespace Modules\Tools\Service;

use Illuminate\Support\Facades\Blade;

/**
 * 应用扩展接口
 */
class App
{
    public function extend(): void
    {
        // 标记标签
        \Modules\Common\Util\Blade::make('marker', \Modules\Tools\Service\Blade::class, 'mark');

        // 菜单标签
        \Modules\Common\Util\Blade::loopMake('menu', \Modules\Tools\Service\Blade::class, 'menu');
    }
}

