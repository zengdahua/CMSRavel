<?php

namespace Modules\Common\UI\Form;

use Illuminate\Support\Collection;
use Modules\Common\UI\Form\Component;
use Modules\Common\UI\Form\Element;
use Modules\Common\UI\Tools;

/**
 * Class Textarea
 * 多行输入框
 * @package Modules\Common\UI\Form
 */
class Textarea extends Element implements Component
{

    /**
     * Text constructor.
     * @param  string  $name
     * @param  string  $field
     * @param  string  $has
     */
    public function __construct(string $name, string $field, string $has = '')
    {
        $this->name = $name;
        $this->field = $field;
        $this->has = $has;
    }


    /**
     * 渲染组件
     * @param $value
     * @return string
     */
    public function render($value): string
    {
        $value = $this->getValue($value);
        $this->class('form-textarea');
        $this->attr('name', $this->field);
        $this->attr('placeholder', $this->attr['placeholder'] ?: "请输入$this->name");
        return <<<HTML
            <textarea {$this->toElement()}>$value</textarea>
        HTML;
    }

}
