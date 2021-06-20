<?php

namespace Modules\System\Model;

/**
 * Class Form
 * @package Modules\System\Model
 */
class Form extends \Modules\Common\Model\Base
{

    protected $table = 'form';

    protected $primaryKey = 'form_id';

    protected $casts = [
        'data' => 'array',
    ];

}
