<?php

namespace Modules\Common\Model;

/**
 * Class VisitorOperate
 * @package Modules\Common\Model
 */
class VisitorOperate extends \Modules\Common\Model\Base
{

    protected $table = 'visitor_operate';

    protected $primaryKey = 'operate_id';

    protected $guarded = [];

    protected $casts = [
        'params' => 'array',
    ];

}
