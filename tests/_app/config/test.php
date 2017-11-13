<?php

return [
    'id' => 'yii2-tests',
    'basePath' => dirname(__DIR__),
    'language' => 'en-US',
    'aliases' => [
        '@yuncms/tag' => dirname(dirname(dirname(__DIR__))),
        '@tests' => '@yuncms/core/tests',
        '@vendor' => '@yuncms/core/vendor',
        '@bower' => '@vendor/bower-asset',
    ],
    'modules' => [
        'tag' => [
            'class' => 'yuncms\tag\backend\Module'
        ]
    ],
    'components' => [
        'db' => require __DIR__ . '/db.php',
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@runtime/cache',
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'user'=>[
            'identityClass' => ''
        ],
        'i18n' => [
            'translations' => [
                'tag*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'class' => 'yii\\i18n\\PhpMessageSource',
                        'sourceLanguage' => 'en-US',
                        'basePath' => '@yuncms/tag/messages',
                    ],
                ],
            ]
        ],
    ],
    'params' => [],
];