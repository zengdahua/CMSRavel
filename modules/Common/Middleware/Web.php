<?php

namespace Modules\Common\Middleware;

use Closure;

class Web
{

    public function handle($request, Closure $next)
    {
        return $next($request);
    }

}
