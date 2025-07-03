<?php

namespace app\models\dto;

use yii\base\Model;
use app\validators\IntegerArrayValidator;

/**
 * ContactForm is the model behind the contact form.
 */
class IntegerArrayDto extends Model implements ArgumentDtoInterface
{
    public readonly array $numbers;

    public function __construct(array $data)
    {
        parent::__construct();
        $this->numbers = $data['numbers'] ?? [];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            // each element of numbers must be integer
            ['numbers', IntegerArrayValidator::class],

        ];
    }

    public function getArguments($argument)
    {
        return $this->numbers;
    }


}
