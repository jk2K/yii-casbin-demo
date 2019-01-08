<?php

return [
    'app' => [
        'controllerNamespace' => 'demo\controllers',
    ],
    'casbin' => [
        '__class' => yii\casbin\Casbin::class,
        'autoInitTable' => true,
        // Available Settings: "file", "text"
        'modelLoadType' => 'text',
        'modelText' => '
[request_definition]
r = sub, obj, act

[policy_definition]
p = sub, obj, act

[role_definition]
g = _, _

[policy_effect]
e = some(where (p.eft == allow))

[matchers]
m = g(r.sub, p.sub) && r.obj == p.obj && r.act == p.act
',
    ],
    'user' => [
        'identityClass' => yii\app\models\User::class, // User must implement the IdentityInterface
        'enableAutoLogin' => false,
        'enableSession' => false,
        'loginUrl' => null,
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
    ],
];
