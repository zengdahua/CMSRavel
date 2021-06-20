<?php

namespace Modules\Common\Model;

/**
 * Class Jobs
 * @package Modules\Common\Model
 */
class Jobs extends \Modules\Common\Model\Base
{

    protected $table = 'jobs';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
        'payload' => 'array',
    ];

}
