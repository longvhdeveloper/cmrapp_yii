<?php
ini_set('display_errors', true);

define('YII_DEBUG', true);

//Include Yii framework itself
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

//Getting configuration
$config = require(__DIR__ . '/../config/web.php');

//Making launching the application
(new yii\web\Application($config))->run();