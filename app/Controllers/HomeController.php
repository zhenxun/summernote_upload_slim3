<?php

namespace Sloth\Controllers;

use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class HomeController extends MainController {

	protected $view;

	public function __construct(Twig $view){
		
		parent::__construct($view);
	}

	public function index(Request $request, Response $response){
		
		return $this->view->render($response, 'client/home.twig');
	}
}