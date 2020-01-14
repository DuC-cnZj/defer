<?php

namespace DucCnzj\Defer\Tests;

use PHPUnit\Framework\TestCase;

class DeferTest extends TestCase
{
    public function testDefer1()
    {
        $a = new \SplStack();
        $this->append($a, "a");

        $this->assertCount(3, $a);
        $this->assertEquals("a", $a->pop());
        $this->assertEquals("push", $a->pop());
        $this->assertEquals("b", $a->pop());
    }

    public function append(\SplStack $context, $value)
    {
        $d = defer(function () use ($context, $value) {
            $context->push($value);
        });

        $d->push(function () use ($context) {
            $context->push("push");
        });

        $context->push("b");
    }
}
