<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules' => [
		'user' => [
			// source code in this module was changed!
			'class' => 'dektrium\user\Module',
			'enableUnconfirmedLogin' => false,
			'enableRegistration' => false,
			'enableConfirmation' => false,
			'confirmWithin' => 21600,
			'admins' => ['admin']
		],
		'admin' => [
			'class' => 'mdm\admin\Module',
		],
	],
    'components' => [
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
		],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'waWrVy1Z_p1XGsguCzL98NNAgZrXnJYM',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
			],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
	'as access' => [
		'class' => 'mdm\admin\components\AccessControl',
		'allowActions' => [
			'site/*',
			'user/*',
			// 'admin/*',		// uncomment this line if you want to get access to role management
		]
	],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
