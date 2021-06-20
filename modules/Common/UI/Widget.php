<?php

namespace Modules\Common\UI;

/**
 * 通用部件
 * Class Composite
 * @package Modules\Common\UI
 * @method static \Modules\Common\UI\Widget\Alert alert(string $content, string $title = null, callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Badge badge($content, callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Images images($list, callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Form form($data, callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Icon icon($content, callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Link link($data, callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Menu menu(string $name, string $type = 'default', callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Table table($data, callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Text text($content, callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\Row row(callable $callback = NULL)
 * @method static \Modules\Common\UI\Widget\StatsCard statsCard(callable $callback = NULL)
 */
class Widget
{

    private static $extend;

    public static function __callStatic($method, $arguments)
    {
        $class = '\\Modules\\Common\UI\\Widget\\' . ucfirst($method);
        if (!class_exists($class)) {
            if (!self::$extend[$method]) {
                throw new \RuntimeException('There is no widget method "' . $method . '"');
            } else {
                $class = self::$extend[$method];
            }
        }
        $object = new $class(...$arguments);
        return $object->next()->render();
    }
}
