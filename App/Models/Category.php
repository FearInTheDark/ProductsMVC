<?php

namespace App\Models;

use JsonSerializable;
use mysqli;
use mysqli_stmt;

class Category implements JSONSerializable {

	protected int $id;
	protected string $categoryName;
	protected string $slug;

	public function __construct() {}

	public static function getAll(): array {
		require_once './database/config.php';
		$categories = [];
		$sql = 'SELECT * FROM Categories';
		$result = $conn->query($sql);
		$conn->close();
		while ($row = $result->fetch_array()) {
//            echo '<pre>';
//            echo json_encode($row, JSON_PRETTY_PRINT);
//            echo '</pre>';
			$category = new Category();
			$category->setId($row['ID']);
			$category->setCategoryName($row['categoryName']);
			$category->setSlug($row['slug'] ?? '');
			$categories[] = $category;
		}
		return $categories;
	}

	public static function hasProducts(string $id): array {
		/**
		 * @var mysqli $conn
		 * @var mysqli_stmt $stmt
		 * */
		require_once './database/config.php';
		$products = [];
		$sql = "SELECT * FROM Products WHERE IDDanhMuc = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($row = $result->fetch_array()) {
			$product = new Product();
			$product->assign($row);
			$products[] = $product;
		}
		$conn->close();
		return $products;
	}

	public function getId(): int {
		return $this->id;
	}

	public function setId(int $id): void {
		$this->id = $id;
	}

	public function getCategoryName(): string {
		return $this->categoryName;
	}

	public function setCategoryName(string $categoryName): void {
		$this->categoryName = $categoryName;
	}

	public function getSlug(): string {
		return $this->slug;
	}

	public function setSlug(string $slug): void {
		$this->slug = $slug;
	}

	public function jsonSerialize(): mixed {
		return [
			'id' => $this->id,
			'categoryName' => $this->categoryName,
			'slug' => $this->slug
		];
	}
}
