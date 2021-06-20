<?php

namespace Modules\Common\Web;

use App\Http\Controllers\Controller;

class Index extends Controller
{

    public function index()
    {
        return web_view('index');
    }
}
