<?php

use Slim\Views\Twig;
use Slim\Flash\Messages;
use Interop\Container\ContainerInterface;
use Slim\Views\TwigExtension;
use function DI\get;

return[

	'router' =>  DI\object(Slim\Router::class),

	'csrf' => function(ContainerInterface $c){

		return new Slim\Csrf\Guard;
	},

	Twig::class => function(ContainerInterface $c){

		$twig = new Twig(__DIR__. '/../resources/views',[
			'autoescape' => false,
			'cache' => false
		]);


		$twig->addExtension(new TwigExtension(
			$c->get('router'),
			$c->get('request')->getUri()
		));

		$twig->getEnvironment()->addGlobal('flash', $c->get(Messages::class));

		return $twig;
	},

	Messages::class => function(ContainerInterface $c){
		return new Messages;
	} 

];