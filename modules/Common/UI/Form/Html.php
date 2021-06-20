<?php

namespace Modules\Common\UI\Form;

use Modules\Common\UI\Form\Component;
use Modules\Common\UI\Form\Composite;
use Modules\Common\UI\Form\Element;
use Modules\Common\UI\Form;
use Modules\Common\UI\Tools;

/**
 * Class Html
 * @package Modules\Common\UI\Table
 */
class Html extends Element implements Component
{
    protected $callback;

    public function __construct($name, $callback)
    {
        $this->name = $name;
        $this->callback = $callback;
    }

    /**
     * 渲染组件
     * @param $value
     * @return string
     */
    public function render($value): string
    {
        $callback = is_callable($this->callback) ? call_user_func($this->callback) : $this->callback;
        return <<<HTML
            <div {$this->toElement()}>$callback</div>
        HTML;

    }

}
