<?php

namespace Modules\System\Admin;

use http\Env\Request;
use Illuminate\Validation\Rule;
use Modules\Common\Model\VisitorLog;
use Modules\Common\UI\Widget;
use Modules\Common\UI\Widget\choice;

class Role extends \Modules\System\Admin\Expend
{

    public string $model = \Modules\System\Model\SystemRole::class;

    public $route = 'admin.system.role';

    use \Modules\System\Common\Role;
}
