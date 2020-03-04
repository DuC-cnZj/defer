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

if (! function_exists('exec_time')) {
    function exec_time($tag = '')
    {
        $t = microtime(true);

        return \defer(function () use ($t, $tag) {
            echo sprintf("%s 的执行时间是%f s\n", $tag, microtime(true) - $t);
        });
    }
}
