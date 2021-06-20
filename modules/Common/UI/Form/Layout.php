<?php

namespace Modules\Common\UI\Form;

use Modules\Common\UI\Form\Component;
use Modules\Common\UI\Form\Element;

use Modules\Common\UI\Tools;

/**
 * Class Layout
 * @package Modules\Common\UI\Form
 */
class Layout extends Element implements Component
{
    protected $callback;

    public function __construct($callback)
    {
        $this->callback = $callback;
        $this->layout = false;
    }

    /**
     * 渲染组件
     * @param $value
     * @return string
     */
    public function render($value): string
    {
        $this->class('pb-4');
        $innerHtml = is_callable($this->callback) ? call_user_func($this->callback) : $this->callback;
        return <<<HTML
            <div {$this->toElement()}>$innerHtml</div>
        HTML;
    }

}
