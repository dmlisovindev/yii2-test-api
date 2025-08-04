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

    public function testflip69()
    {

        $calculator = new EvenSumCalculator();
        $this->assertEquals(9666, $calculator->maxByFlip_9_6(6666));
        $this->assertEquals(9999, $calculator->maxByFlip_9_6(9999));
        $this->assertEquals(9999, $calculator->maxByFlip_9_6(6999));
        $this->assertEquals(9969, $calculator->maxByFlip_9_6(9669));
    }

    public function testWhatever(){
        $calculator = new EvenSumCalculator();
        $this->assertEquals(2,$calculator->estimate([33, 33, 5, 7]));
        $this->assertEquals(6,$calculator->estimate([1,0,2,1,0,1,3,2,1,2,1]));
        $this->assertEquals(7,$calculator->estimate([3,0,2,0,4]));
        $this->assertEquals(4,$calculator->estimate([2,0,0,2]));
        $this->assertEquals(1,$calculator->estimate([1,0,1]));
        assert($calculator->estimate([33, 33, 5, 7]) == 2);
        assert($calculator->estimate([1,0,2,1,0,1,3,2,1,2,1]) == 6);
        assert($calculator->estimate([3,0,2,0,4]) == 7);
        assert($calculator->estimate([2,0,0,2]) == 4);
        assert($calculator->estimate([1,0,1]) == 1);
        assert($calculator->estimate([99,99,99]) == 0);

    }

}
