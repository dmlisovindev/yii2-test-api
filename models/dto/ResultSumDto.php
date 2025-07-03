<?php

namespace app\models\dto;

use Yii;
use yii\base\Model;

/**
 * ResultSumDto is used to render a calculated sum.
 */
final class ResultSumDto extends BaseDto implements ResultDtoInterface
{
    public readonly int $sum;

    public function setResult($sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['sum', 'integer'],
        ];
    }

}
