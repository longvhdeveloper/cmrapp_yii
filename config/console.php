<?php
return array(
    'id' => 'crmapp-console',
    'basePath' => dirname(__DIR__),
    'components' => array(
        'db' => require(__DIR__ . '/db.php'),
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
    ),
);