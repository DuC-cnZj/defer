<?php

use DucCnzj\Defer\Defer;

if (! function_exists('defer')) {
    function defer(\Closure $closure, ?Defer &$defer)
    {
        $defer = $defer ?? new Defer();
        (function ($closure) {
            $this->push($closure);
        })->bindTo($defer, Defer::class)($closure);
    }
}

if (! function_exists('exec_time')) {
    function exec_time($tag, &$_)
    {
        $t = microtime(true);

        defer(function () use ($t, $tag) {
            echo sprintf("%s 的执行时间是%f s\n", $tag, microtime(true) - $t);
        }, $_);
    }
}
