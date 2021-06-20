<?php

namespace Modules\Article\Resource;

use Modules\Common\Resource\BaseResource;

class ArticleResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }
}
