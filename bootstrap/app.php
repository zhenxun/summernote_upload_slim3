<?php

use Sloth\App;
use Slim\Views\Twig;
use Slim\Flash\Messages as Flash;
use Illuminate\Database\Capsule\Manager as Capsule;

ini_set("session.cookie_httponly", 1);
session_name("_sloth");
session_start();
session_regenerate_id(true);
date_default_timezone_set("Asia/Taipei");

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

$app = new App();

$container = $app->getContainer();

$capsule = new Capsule();

$capsule->addConnection([
	'driver'=>'mysql',
	'host'=>'localhost',
	'database'=>'dentalcare',
	'username'=>'admin',
	'password' =>'wzx@5098@5018',
	'charset' => 'utf8',
	'collation' => 'utf8_general_ci',
	'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

require __DIR__. '/../app/routes.php';

$app->add(new \Sloth\Middleware\CsrfViewMiddleware($container->get(Twig::class), $container->get('csrf') ));
$app->add($container->get('csrf'));