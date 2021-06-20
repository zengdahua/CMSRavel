<?php

namespace Modules\Common\UI\Form;

use Illuminate\Support\Collection;
use Modules\Common\UI\Form\Component;
use Modules\Common\UI\Form\Element;
use Modules\Common\UI\Tools;

/**
 * Class Password
 * 密码输入器
 * @package Modules\Common\UI\Form
 */
class Password extends Element implements Component
{
    protected Text $object;

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
        $this->object = new Text($this->name, $this->field, $this->has);
        $this->object->type('password');
    }

    /**
     * 渲染组件
     * @param $value
     * @return string
     */
    public function render($value): string
    {
        return $this->object->render($this->getValue($value));
    }

}
