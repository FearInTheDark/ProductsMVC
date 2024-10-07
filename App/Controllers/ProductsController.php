<?php

namespace App\Controllers;

use App\Models\Product;

class ProductsController {
	protected string $action;
	protected array $params;
	protected array $mapFunctions = [
		'' => 'all',
		'add-product' => 'addProduct',
		'delete-product' => 'deleteProduct',
		'modify-product' => 'modifyProduct',
	];

	public function __construct(string $action, array $params) {
		$this->action = $action;
		$this->params = $params;
		if (!isset($this->mapFunctions[$action])) {
			header('Location: /ProductsMVC/products/');
			die();
		}
		$this->{$this->mapFunctions[$action]}($params);
	}

	private function all($params): void {
		$products = Product::getAll();
		require_once 'App/Views/products.view.php';
	}

	private function addProduct($params): void {
		if (empty($params) && isset($_POST['pName'])) {
			$product = new Product();
			$product->setProductName($_POST['pName']);
			$product->setPrice($_POST['price']);
			$product->setQuantity($_POST['quant']);
			$product->setCategoryID($_POST['catID']);
			$product->setImage($_POST['image'] ?? 'laptop-5.png');

			Product::persist($product);

			header('Location: /ProductsMVC/products/');
		} else require_once 'App/Views/addProduct.view.php';
	}

	private function deleteProduct($params): void {
		if (!isset($_POST['deleteID']) || !ctype_digit($_POST['deleteID'])) {
			header('Location: /ProductsMVC/products/');
		}
		Product::delete($_POST['deleteID']);
	}

	private function modifyProduct($params): void {
		if (isset($_POST['ID'])) {
			$product = Product::find($_POST['ID']);
			echo "<script>console.log('Post ID found')</script>";
			$product->setProductName($_POST['TenSP']);
			$product->setPrice($_POST['Gia']);
			$product->setQuantity($_POST['SoLuong']);
			$product->setCategoryID($_POST['IDDanhMuc']);
			Product::update($product);
//            header('Location: /ProductsMVC/products/');
		}
		if (!isset($_POST['modifyID']) || !ctype_digit($_POST['modifyID'])) {
			header('Location: /ProductsMVC/products/');
			exit();
		} else {
			$product = Product::find($_POST['modifyID']);
			require_once 'App/Views/modifyProduct.view.php';
		}
	}

}
