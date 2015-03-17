<?php
return array(
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'modules' => array(
        'gii' => array(
            'class' => 'yii\gii\Module',
            'allowedIPs' => array('*')
        ),
    ),
    'id' => 'crmapp',
    'basePath' => realpath(__DIR__ . '/../'),
    'components' => array(
        'request' => [
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'mycrmapp_serectkey',
        ],
        // register "cache" component using a class name
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => array(
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ),
        'log' => [
            'traceLevel' => 3,
            'targets' =>[
                'levels' => ['errors', 'warning'],
                'class' => 'yii\log\FileTarget'
            ],
        ],
        'view' => [
            'renderers' => [
                'md' => [
                    'class' => 'app\utilities\MarkdownRenderer'
                ],
            ],
            'theme' => [
                'class' => yii\base\Theme::className(),
                'basePath' => '@app/themes/snowy'
            ],
        ],
        'response' => [
            'formatters' => [
                'yaml' => [
                    'class' => 'app\utilities\YamlResponseFormatter'
                ],
            ],
        ],
    ),
);