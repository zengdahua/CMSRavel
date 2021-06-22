<?php

namespace Modules\Common\Service;

use Illuminate\Support\Facades\Blade;

/**
 * 应用扩展接口
 */
class App
{
    public function extend()
    {

        /**
         * 模板组件
         */
        Blade::component('app-loading', \Modules\Common\UI\Components\Loading::class);
        Blade::component('app-nodata', \Modules\Common\UI\Components\NoData::class);
        Blade::component('app-trend', \Modules\Common\UI\Components\Trend::class);

        /**
         * 分页标签
         */
        Blade::directive('paginate', function ($label) {
            return '<?php echo $pageData ? $pageData->links('.$label.') : "" ?>';
        });
    }
}

