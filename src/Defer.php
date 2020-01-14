<?php

namespace DucCnzj\Defer;

class Defer {
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
}