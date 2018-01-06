<?php
use Illuminate\Database\Capsule\Manager as Capsule;


require __DIR__.'/vendor/autoload.php';
date_default_timezone_set("Asia/Taipei");

//require_once __DIR__. '/bootstrap/app.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$capsule = new Capsule;

$capsule->addConnection([
	'driver' => getEnv('DRIVER'),
	'host' => getEnv('HOST'),
	'database' => getEnv('DB'),
	'username' => getEnv('DBUSER'),
	'password' => getEnv('PASSWORD'),
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

return [
	'paths' => [
		'migrations' => 'database/migrations'
	],
	'migration_base_class' => 'DentalCare\Database\Migrations\Migration',
	'templates' =>[
	  'file' => 'app/Database/Migrations/MigrationStub.php'
	],
	'environments' =>[
		'default_migration_table' => 'migrations',
		'default' => [
			'adapter' =>getEnv('DRIVER'),
			'host'=>getEnv('HOST'),
			'port'=>getEnv('DB_PORT'),
			'name'=>getEnv('DB'),
			'user'=>getEnv('DBUSER'),
			'pass'=>getEnv('PASSWORD'),
		]
	]
];