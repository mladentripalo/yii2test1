<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

//kiz
defined('APP_BASE_URL') || define('APP_BASE_URL', 'http://localhost/phpStorm/yii2test1');
defined('APP_BASE_PATH') || define('APP_BASE_PATH', 'C:/xampp/htdocs/phpStorm/yii2test1');

require('C:\xampp\htdocs\yii2basic_2.0.4_vendor\vendor/autoload.php');
require('C:\xampp\htdocs\yii2basic_2.0.4_vendor\vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
