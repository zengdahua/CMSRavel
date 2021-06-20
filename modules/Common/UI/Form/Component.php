<?php

namespace Modules\Common\UI\Form;

/**
 * 组件接口
 * Class Component
 * @package Modules\Common\UI
 */
interface Component
{
    public function render($value): string;
}
