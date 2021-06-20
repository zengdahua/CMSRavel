<?php

namespace Modules\Article\Web;

use Modules\Article\Resource\ArticleCollection;
use Modules\Common\Web\Base;

class Article extends Base
{
    public function index($id)
    {
        $classInfo = \Modules\Article\Model\ArticleClass::find($id);
        return web_view('articleList', [
            'classInfo' => $classInfo ?: collect()
        ]);
    }

    public function info($id)
    {
        $info = \Modules\Article\Model\Article::find($id);
        return web_view('articleInfo', [
            'info' => $info ?: collect()
        ]);
    }

    public function search()
    {
        $keyword = request()->get('keyword');
        $classId = request()->get('class');
        $classInfo = \Modules\Article\Model\ArticleClass::find($classId);
        return web_view('articleSearch', [
            'keyword' => $keyword,
            'classInfo' => $classInfo
        ]);
    }

    public function tags($tag)
    {
        $classId = request()->get('class');
        $classInfo = \Modules\Article\Model\ArticleClass::find($classId);
        return web_view('articleTags', [
            'tag' => $tag,
            'classInfo' => $classInfo,
        ]);
    }
}
