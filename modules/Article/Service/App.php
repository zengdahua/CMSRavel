<?php

namespace Modules\Article\Service;

use Duxravel\Core\Util\Blade;

/**
 * 应用扩展接口
 */
class App
{
    public function extend(): void
    {
        // 文章分类
        Blade::loopMake('articleclass', \Modules\Article\Service\Blade::class, 'articleClass');
        // 文章列表
        Blade::loopMake('article', \Modules\Article\Service\Blade::class, 'article', static function ($params) {
            $key = $params['assign'] ?: '$data';
            return <<<DATA
                if (method_exists($key, 'links')) {
                    \$pageData = $key;
                }
            DATA;
        });
        // 标签列表
        Blade::loopMake('tags', \Modules\Article\Service\Blade::class, 'tags');
    }
}

