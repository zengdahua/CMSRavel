<?php

namespace Modules\Common\UI\Widget;

use Modules\Common\UI\Tools;

/**
 * 项目回调
 * @package Modules\Common\UI\Widget
 */
class Item
{

    public $params;

    public function __construct($params = [])
    {
        $this->params = $params;
    }

    public function __call($method, $arguments)
    {
        $this->{$method}[] = $arguments;
        return $this;
    }

}
