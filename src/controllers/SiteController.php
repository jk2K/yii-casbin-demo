<?php

namespace demo\controllers;

use yii\casbin\Casbin;
use yii\helpers\Yii;
use yii\rest\Controller;

class SiteController extends Controller
{
    public function actionError()
    {
        /** @var \yii\web\Application $app */
        $app = Yii::get('app');
        $exception = $app->errorHandler->exception;
        if ($exception !== null) {
            return [
                'errors' => [
                    'message' => $exception->getMessage(),
                    'code' => $exception->getCode()
                ]
            ];
        }
    }

    public function actionTest()
    {
        /** @var Casbin $casbin */
        $casbin = Yii::get('casbin');
        $sub = 'alice'; // the user that wants to access a resource.
        $obj = 'data1'; // the resource that is going to be accessed.
        $act = 'read'; // the operation that the user performs on the resource.

        $enforcer = $casbin->getEnforcer();
        $enforcer->addPermissionForUser('alice1', 'data1', 'read');
        $enforcer->addPermissionForUser('group_admin', 'data1', 'read');
        $enforcer->addRoleForUser('alice', 'group_admin');

        $data = $enforcer->enforce($sub, $obj, $act);
        return [
            'data' => $data
        ];
    }
}