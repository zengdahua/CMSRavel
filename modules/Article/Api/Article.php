<?php

namespace Modules\Article\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Article\Resource\ArticleCollection;
use \Modules\Article\Resource\ArticleResource;
use Modules\Common\Api\Api;

class Article extends Api
{
    public function index()
    {

        $article = new \Modules\Article\Model\Article();
        return $this->success((new ArticleCollection($article->paginate()))->hide(['content']));
    }
}
