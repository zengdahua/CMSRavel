<?php

namespace Modules\Common\Web;

use Modules\Common\Web\Base;

class Index extends Base
{

    public function index()
    {
        return $this->view('index');
    }
}
