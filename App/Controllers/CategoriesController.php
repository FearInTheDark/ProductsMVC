<?php

namespace App\Controllers;

use App\Models\Category;

class CategoriesController {

	private string $action;
	private array $params;
	private array $mapping = [
		'index' => 0,
		'laptops' => 1,
		'phones' => 2,
		'tablets' => 3,
	];

	public function __construct(string $action, array $params) {
		$this->action = $action;
		$this->params = $params;
		echo $this->action;
		if ($action == null) {
			$this->index($this->action, $this->params);
			exit();
		} elseif (!isset($this->mapping[$action])) {
			header('Location: /ProductsMVC/Categories/');
			exit();
		}
		$this->{$this->action}($this->action, $this->params);
	}

	private function index($action, $params): void {
		$categories = Category::getAll();
		require_once 'App/Views/Categories.view.php';
	}

	private function phones($action, $params): void {
		$products = Category::hasProducts($this->mapping[$action]);
		require_once 'App/Views/products.view.php';
	}

	private function laptops($action, $params): void {
		$products = Category::hasProducts($this->mapping[$action]);
		require_once 'App/Views/products.view.php';
	}

	private function tablets($action, $params): void {
		$products = Category::hasProducts($this->mapping[$action]);
		require_once 'App/Views/products.view.php';
	}
}