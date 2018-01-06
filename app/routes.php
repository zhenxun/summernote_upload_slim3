<?php

$app->group('', function(){

	$this->get('/',['Sloth\Controllers\HomeController','index'])->setName('home');
	
});

$app->group('/admin', function(){

	$this->get('/dashboard',['Sloth\Controllers\Admin\DashboardController','index'])->setName('admin.dashboard');
	
});