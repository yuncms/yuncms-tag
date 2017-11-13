<?php

return [
    'id' => 'yii2-test-console',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@yuncms/tag' => dirname(dirname(dirname(__DIR__))),
        '@tests'=>dirname(dirname(dirname(__DIR__))).'/tests',
    ],
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            //自动应答
            'interactive' => 0,
            //命名空间
            'migrationNamespaces' => [
                'yuncms\tag\migrations',
            ],
            // 完全禁用非命名空间迁移
            'migrationPath' => null,
        ],
    ],
    'components' => [
        'log'   => null,
        'cache' => null,
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
        'db'    => require __DIR__ . '/db.php',
    ],
];
