<?php


if (! function_exists('defer')) {
    function defer(\Closure $closure, &$defer)
    {
        $defer = $defer ?? new class {
            protected $closures = [];

            public function push(\Closure $closure)
            {
                array_push($this->closures, $closure);
            }

            public function __destruct()
            {
                foreach (array_reverse($this->closures) as $closure) {
                    $closure();
                }
            }
        };

        $defer->push($closure);
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
