<?php

namespace app\validators;

use Yii;
use yii\validators\Validator;

/**
 * Works like EachValidator but doesn't override the attribute, allowing use on readonly attributes
 */
class IntegerArrayValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $arrayOfValues = $model->$attribute;
        if (!is_array($arrayOfValues) && !$arrayOfValues instanceof \ArrayAccess) {
            $this->addError($model, $attribute, Yii::t('yii', '{attribute} must be an array.'), []);
            return;
        }

        foreach ($arrayOfValues as $v) {
            if (is_numeric($v)) {
                continue;
            }
            $this->addError(
                $model,
                $attribute,
                Yii::t('yii', 'All elements of {attribute} must be integer.'),
                ['value' => $v]
            );
            break;
        }
    }
}