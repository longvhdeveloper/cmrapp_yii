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
        // register "cache" component using a class name
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => array(
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ),
    ),
);