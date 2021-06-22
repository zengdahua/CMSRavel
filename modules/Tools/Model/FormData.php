<?php

namespace Modules\Tools\Model;

/**
 * Class FormData
 * @package Modules\System\Model
 */
class FormData extends \Modules\Common\Model\Base
{

    protected $table = 'form_data';

    protected $primaryKey = 'data_id';

    protected $casts = [
        'data' => 'array',
    ];

}
