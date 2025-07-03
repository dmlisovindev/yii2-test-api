<?php

namespace app\components;

use app\components\calculator\CalculatorInterface;
use app\components\calculator\EvenSumCalculator;
use app\models\dto\ArgumentDtoInterface;
use app\models\dto\IntegerArrayDto;
use app\models\dto\ResultDtoInterface;
use yii\base\Component;

class CalculatorComponent extends Component
{

    protected function calculate(
        CalculatorInterface $calculator,
        mixed $arguments
    ) {
        return $calculator->calculate($arguments);
    }

    public function calculateEvenSum(IntegerArrayDto $integerArray, ResultDtoInterface &$resultDto)
    {
        $resultDto->setResult($this->calculate(new EvenSumCalculator(), $integerArray->numbers));
    }

}