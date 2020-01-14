<?php

use DucCnzj\Defer\Defer;

if (! function_exists('defer')) {
    function defer(\Closure $closure)
    {
        $d = new Defer();
        $d->push($closure);

        return $d;
    }
}
