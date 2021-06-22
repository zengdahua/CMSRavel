<?php

namespace Modules\Common\Model;

/**
 * Class Api
 * @package Modules\Common\Model
 */
class Api extends \Modules\Common\Model\Base
{

    protected $table = 'api';

    protected $primaryKey = 'api_id';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * 获取平台类型
     * @return array
     */
    public static function getPlatformType()
    {
        $list = app_hook('Service', 'Type', 'getDriverType');
        $data = [];
        foreach ((array) $list as $value) {
            $data = array_merge_recursive((array) $data, (array) $value);
        }
        return $data;
    }

}
