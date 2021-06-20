<?php

namespace Modules\Article\Resource;

use Modules\Common\Resource\BaseCollection;

class ArticleCollection extends BaseCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'custom' => 'field' //addtional fields
        ];
    }

}
