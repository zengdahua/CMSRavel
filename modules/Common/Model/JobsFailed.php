<?php

namespace Modules\Common\Model;

/**
 * Class JobsFailed
 * @package Modules\Common\Model
 */
class JobsFailed extends \Modules\Common\Model\Base
{

    protected $table = 'jobs_failed';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
        'payload' => 'array',
    ];

}
