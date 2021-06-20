<?php

namespace Modules\Common\UI\Table\Column;


/**
 * Class Progress
 */
class Progress implements Component
{

    private string $color;
    private int $max;

    /**
     * Progress constructor.
     * @param string $color
     * @param int $max
     */
    public function __construct(string $color = 'blue', int $max = 100)
    {
        $this->color = $color;
        $this->max = $max;
    }

    /**
     * @param $value
     * @param $data
     * @return string
     */
    public function render($value, $data): string
    {
        return (new \Modules\Common\UI\Widget\Progress($this->max, (int)$value))->color($this->color)->render();
    }

}
