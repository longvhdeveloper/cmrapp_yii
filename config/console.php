<?php
return array(
    'id' => 'crmapp-console',
    'basePath' => dirname(__DIR__),
    'components' => array(
        'db' => require(__DIR__ . '/db.php'),
    ),
);