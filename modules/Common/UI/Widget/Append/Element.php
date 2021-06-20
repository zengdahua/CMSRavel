<?php

namespace Modules\Common\UI\Widget\Append;

/**
 * Class Element
 * @package Modules\Common\UI\Widget\Append
 */
trait Element
{
    /**
     * 元素提示
     * @param $value
     * @param $markup
     * @return $this
     */
    public function tooltips($value, $markup = ''): self
    {
        $this->attr('data-js', 'show-tooltip');
        $this->attr('data-title', $value);
        return $this;
    }
}
