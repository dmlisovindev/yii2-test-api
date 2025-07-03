<?php

namespace app\components\calculator;

use app\components\calculator\CalculatorInterface;

class EvenSumCalculator implements CalculatorInterface
{

    public function calculate(mixed $arguments): mixed
    {
        $sum = 0;
        if (!is_array($arguments)) {
            $arguments = [$arguments];
        }
        foreach ($arguments as $number) {
            if (is_int($number) && $number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}