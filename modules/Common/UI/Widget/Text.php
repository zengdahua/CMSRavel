<?php

namespace Modules\Common\UI\Widget;

use Modules\Common\UI\Tools;
use Modules\Common\UI\Widget\Append\Element;

/**
 * Class Text
 * @package Modules\Common\UI\Widget
 */
class Text extends Widget
{
    use Element;

    private $content;

    public function __construct($content, callable $callback = NULL)
    {
        $this->content = $content;
        $this->callback = $callback;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return <<<HTML
            <span {$this->toElement()}>$this->content</span>
        HTML;

    }

}
