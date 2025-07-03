<?php

namespace unit\calculators;

use app\components\calculator\EvenSumCalculator;
use PHPUnit\Framework\TestCase;

final class EvenSumCalculatorTest extends TestCase
{

    public function testBasicArray()
    {
        $args = [1,2,3,4,5,6];
        $calculator = new EvenSumCalculator();
        $this->assertEquals(12, $calculator->calculate($args));
    }

    public function testMixedIntAndStringArray()
    {
        $args = [1,'2',3,4,'5',6];
        $calculator = new EvenSumCalculator();
        $this->assertEquals(10, $calculator->calculate($args));
    }

    public function testNoEvensArray()
    {
        $args = [1,1,1,1,1,111];
        $calculator = new EvenSumCalculator();
        $this->assertEquals(0, $calculator->calculate($args));
    }

    public function testNonArray()
    {
        $args = 10;
        $calculator = new EvenSumCalculator();
        $this->assertEquals(10, $calculator->calculate($args));
    }

    public function testString()
    {
        $args = "[1,2,3,4,5,6]";
        $calculator = new EvenSumCalculator();
        $this->assertEquals(0, $calculator->calculate($args));
    }

    public function testFloatsArray()
    {
        $args = [1,2.5,3,4,5,6.9];
        $calculator = new EvenSumCalculator();
        $this->assertEquals(4, $calculator->calculate($args));
    }









}
