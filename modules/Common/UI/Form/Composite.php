<?php

namespace Modules\Common\UI\Form;

use Modules\Common\UI\Tools;

/**
 * 复合组件
 * Class Composite
 * @package Modules\Common\UI
 */
class Composite extends Element
{

    protected array $column = [];
    protected bool $component = true;
    protected object $form;

    /**
     * 获取值
     * @param string $time
     * @return array
     */
    public function getInput(string $time = 'add'): array
    {
        $data = [];
        foreach ($this->column as $vo) {
            $vo['object']->getElement()->map(function ($item) use (&$data, $time) {
                if ($item instanceof \Modules\Common\UI\Form\Composite) {
                    foreach ($item->getInput($time) as $k => $v) {
                        $data[$k] = $v;
                    }
                } else {
                    $data[$item->getField()] = $item->getInput($time);
                }
            });
        }
        return $data;
    }
}
