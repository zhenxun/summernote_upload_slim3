<?php

namespace Sloth\Controllers\Admin;

use Slim\Views\Twig;


class MainController {

	protected $view;

	public function __construct(Twig $view){
		
		$this->view = $view;
	}

}