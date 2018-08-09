<?php
/**
 * Created by PhpStorm.
 * User: zharikov
 * Date: 08.08.2018
 * Time: 18:12
 */

require_once dirname(__DIR__) . "/env.php";

require_once BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';
require_once BASE_PATH .'/vendor/autoload.php';
require_once BASE_PATH .'/helpers/functions.php';

$config = require BASE_PATH . "/config/current/main.php";

//error_reporting(E_ALL);
//ini_set('html_errors', false);
//header('Content-Type: text/plain; charset=utf-8');
//var_dump($_SERVER);exit();
//$_SERVER['REQUEST_URI'] = 'OwnProfile/EventsStatus';
//$_SERVER['REQUEST_METHOD'] = 'GET';
//$_SERVER['REQUEST_METHOD'] = 'GET';
//$_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
//$_SERVER['REQUEST_SCHEME'] = 'http';
//$_SERVER['PHP_SELF'] = '/index.php';
//$_SERVER['SCRIPT_NAME'] = '/index.php';
//$_SERVER['SCRIPT_FILENAME'] = '/var/www/html/htdocs/index.php';

/** @noinspection PhpUnhandledExceptionInspection */
(new yii\web\Application($config))->run();