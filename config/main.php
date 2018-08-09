<?php
/**
 * Created by PhpStorm.
 * User: zharikov
 * Date: 08.08.2018
 * Time: 18:09
 */

$config = [
    'id' => 'b3w-dating-v3__api',
    'basePath' => BASE_PATH,
    'bootstrap' => ['log'],
    'timeZone' => 'Europe/Moscow',
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => yii\web\JsonParser::class,
            ]
        ],
        'user' => [
            'identityClass' => app\models\User::class,
            'enableAutoLogin' => false,
        ],
        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],
        'log' => [
            'traceLevel' => 1,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'logFile' => BASE_PATH . '/logs/app.log',
                    'levels' => ['error', 'warning'],
                    'logVars' => []
                ],
            ],
        ],
        'db' => [
            'class' => yii\db\Connection::class,
            'dsn' => 'mysql:host=db;dbname=yii2advanced',
            'username' => 'far',
            'password' => 'pwdffar',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => yii\rest\UrlRule::class,
                    'controller' => 'country'
                ]
            ]
        ]
    ]
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'allowedIPs' => [
            '172.*.0.1'
        ]
    ];
}

return $config;