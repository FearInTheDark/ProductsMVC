<?php

namespace App\Core;

require_once __DIR__ . '/../../vendor/autoload.php';

class App {
	protected string $controller;
	protected string $action;
	protected array $params;

	public function __construct() {
		$this->splitUrl();
		$ctrl = 'App\\Controllers\\' . ucfirst($this->controller) . 'Controller';
		$fileName = './App/Controllers/' . ucfirst($this->controller) . 'Controller.php';
		if (!file_exists($fileName)) {
			header('Location: /ProductsMVC/products/');
			die();
		}
		new $ctrl($this->action, $this->params);
	}

	public function splitUrl(): void {
		$data = explode('/', trim($_SERVER['REQUEST_URI']));
		array_shift($data);
		array_shift($data);
		$this->controller = array_shift($data) ?? "\0";
		$this->action = array_shift($data) ?? "\0";
		$this->params = array_filter($data);
	}
}