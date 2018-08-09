<?php

namespace app\controllers;

use app\models\Country;
use Yii;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Created by PhpStorm.
 * User: zharikov
 * Date: 09.08.2018
 * Time: 10:20
 *
 * Class CountryController
 * @package app\controllers
 */
class CountryController extends ActiveController
{
    public $modelClass = Country::class;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => Cors::class
        ];

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON
            ]
        ];

        $behaviors['access'] = [
            'class' => AccessControl::class,
            'only' => ['create', 'update', 'delete'],
            'rules' => [
                [
                    'actions' => ['create', 'update', 'delete'],
                    'allow' => true,
                    'roles' => ['@']
                ]
            ]
        ];

        return $behaviors;
    }


    /**
     * Checks the privilege of the current user.
     *
     * This method should be overridden to check whether the current user has the privilege
     * to run the specified action against the specified data model.
     * If the user does not have access, a [[ForbiddenHttpException]] should be thrown.
     *
     * @param string $action the ID of the action to be executed
     * @param object $model the model to be accessed. If null, it means no specific model is being accessed.
     * @param array $params additional parameters
     * @throws ForbiddenHttpException if the user does not have access
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        // проверяем может ли пользователь редактировать или удалить запись
        // выбрасываем исключение ForbiddenHttpException если доступ запрещен
        if ($action === 'update' || $action === 'delete') {
            if ($model->user_id !== Yii::$app->user->id)
                throw new ForbiddenHttpException(sprintf('You can only %s lease that you\'ve created.', $action));
        }
    }
}