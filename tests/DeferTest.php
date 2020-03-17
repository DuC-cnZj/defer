<?php

namespace DucCnzj\Defer\Tests;

use PHPUnit\Framework\TestCase;

class DeferTest extends TestCase
{
    public function testDefer1()
    {
        $a = new \SplStack();
        $this->append($a, 'a');

        $this->assertCount(3, $a);
        $this->assertEquals('a', $a->pop());
        $this->assertEquals('push', $a->pop());
        $this->assertEquals('b', $a->pop());
    }

    public function append(\SplStack $context, $value)
    {
        defer(function () use ($context, $value) {
            $context->push($value);
        }, $_);

        defer(function () use ($context) {
            $context->push('push');
        }, $_);

        $context->push('b');
    }

//    public function test3()
//    {
//        exec_time('daa', $_);
//        sleep(2);
//    }
}
