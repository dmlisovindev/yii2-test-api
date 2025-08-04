<?php

namespace app\components\calculator;

use app\components\calculator\CalculatorInterface;
use app\models\dto\IntegerArrayDto;

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

    public function maxByFlip_9_6(int $number)
    {
        $numString = (string)$number;
        $flipPosition = strpos($numString, '6');
        if ($flipPosition === false) {
            return $number;
        }
        $numString[$flipPosition] = '9';
        return (int)$numString;
    }

    function estimate0(array $levels): int
    {
        $totalSum = 0;
        $arrLength = count($levels);

        for ($i = 0; $i < $arrLength - 1; $i++) {
            if ($levels[$i + 1] < $levels[$i]) {// found a potential open pool
                $poolLevel = $levels[$i];
                $poolSum = 0;

                for ($j = $i + 1; $j < $arrLength; $j++) {
                    $depth = $poolLevel - $levels[$j];
                    if ($depth <= 0) { // the pool is closed
                        $totalSum += $poolSum;
                        $i = $j;
                        break;
                    } else {
                        $poolSum += $depth;
                        if ($j == $arrLength - 1) { //"drain" unclosed pool on the right
                            $poolSum -= ($j - $i) * ($poolLevel - $levels[$j]);
                            $totalSum += $poolSum;
                            break;
                        }
                    }
                }
            } else {
                $i++;
            }
        }

        return $totalSum;
    }

    function estimate(array $levels)
    {
        $totalSum = 0;
        $uniquelevels = array_unique($levels);
        sort($uniquelevels);

        $left = 0;
        $right = count($levels)-1;
        for ($i = 1; $i < count($uniquelevels); $i++) {
            $depth = $uniquelevels[$i] - $uniquelevels[$i-1];
            $newLeft = $left;
            $newRight = $right;
            for ($j = $left; $j <=$right; $j++) {
                if ($levels[$j] >= $uniquelevels[$i] ){
                    $newLeft = $j;
                    break;
                }
            }
            for ($k = $right; $k >= $left; $k--) {
                if ($levels[$k] >= $uniquelevels[$i] ){
                    $newRight = $k;
                    break;
                }
            }
            for ($w = $newLeft; $w <= $newRight; $w++) {
                if ($levels[$w] < $uniquelevels[$i] ){
                   $totalSum +=$depth;
                }
            }
            $left = $newLeft;
            $right = $newRight;

        }
        return $totalSum;
    }
}