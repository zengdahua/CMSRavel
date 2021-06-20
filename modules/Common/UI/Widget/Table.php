<?php

namespace Modules\Common\UI\Widget;

use Modules\Common\UI\Tools;

/**
 * Class Table
 * @package Modules\Common\UI\Widget
 */
class Table extends Widget
{

    private \Modules\Common\UI\Table $table;

    public function __construct($data, callable $callback = NULL)
    {
        $this->callback = $callback;
        $this->table = new \Modules\Common\UI\Table($data);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->table->render();
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this->table->$method(...$arguments);
    }

}
