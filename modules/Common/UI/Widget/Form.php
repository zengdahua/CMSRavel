<?php

namespace Modules\Common\UI\Widget;

use Modules\Common\UI\Tools;

/**
 * Class Form
 * @package Modules\Common\UI\Widget
 */
class Form extends Widget
{

    private \Modules\Common\UI\Form $form;

    public function __construct($data, callable $callback = NULL)
    {
        $this->callback = $callback;
        $this->form = new \Modules\Common\UI\Form($data, false);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->form->render();
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this->form->$method(...$arguments);
    }

}
