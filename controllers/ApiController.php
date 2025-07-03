<?php

namespace app\controllers;

use app\components\CalculatorComponent;
use app\models\dto\IntegerArrayDto;
use app\models\dto\ResultSumDto;
use Yii;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;

class ApiController extends \yii\rest\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['post', 'get'],
                    'sum-even' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays some basic info
     *
     * @return string
     */
    public function actionIndex()
    {
        return [
            'available_endpoints' =>[
                '/api/sum-even' =>[
                    'verb'=>'POST',
                    'variables'=>[
                        'numbers'=> 'Array of integers',
                    ]
                ]
            ]
        ];
    }

    /**
     * Returns a sum of all even members in the array
     *
     * @return string
     */
    public function actionSumEven()
    {
        $numbersDto = new  IntegerArrayDto(Yii::$app->request->post());
            if ($numbersDto->validate()) {
                $calculatorComponent = Yii::$app->calculator;
                /** @var CalculatorComponent $calculatorComponent*/
                $result = new ResultSumDto();
                $calculatorComponent->calculateEvenSum($numbersDto, $result);
                return $result;
            }
            throw new BadRequestHttpException($numbersDto->getFirstError('numbers'));

    }


}
