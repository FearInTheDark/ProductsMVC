<?php

namespace App\Models;

use JsonSerializable;
use mysqli;

class Product implements JsonSerializable {
	protected int $id;
	protected string $productName;
	protected int $price;
	protected int $quantity;
	protected int $categoryID;
	protected string $image;

	public function __construct() {}

	public static function getAll(): array {
		/**
		 * @var mysqli $conn
		 */
		require_once './database/config.php';
		$sql = 'SELECT * FROM Products';
		$result = $conn->query($sql);
		$conn->close();
		$products = [];
		while ($row = $result->fetch_array()) {
			$product = new Product();
			$product->assign($row);
			$products[] = $product;
		}
		return $products;
	}

	public function assign($row): void {
		$this->setId($row['ID']);
		$this->setProductName($row['TenSP']);
		$this->setPrice($row['Gia']);
		$this->setQuantity($row['SoLuong']);
		$this->setCategoryID($row['IDDanhMuc']);
		$this->setImage($row['image']);
	}

	public static function persist(Product $product): void {
		/**
		 * @var mysqli $conn
		 */
		require_once './database/config.php';
		$sql = "Insert Into Products(TenSP, Gia, SoLuong, IDDanhMuc, image) " .
			"VALUES (?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);

		$productName = $product->getProductName();
		$price = $product->getPrice();
		$quantity = $product->getQuantity();
		$categoryID = $product->getCategoryID();
		$image = $product->getImage();

		$stmt->bind_param('siiis', $productName, $price, $quantity, $categoryID, $image);
		echo $sql;

		if ($stmt->execute() === false) die("Execute failed: " . $stmt->error);
		else echo "<script>alert('Product has been added!');</script>";

		$stmt->close();
		$conn->close();

	}

	public function getProductName(): string {
		return $this->productName;
	}

	public function setProductName(string $productName): void {
		$this->productName = $productName;
	}

	public function getPrice(): int {
		return $this->price;
	}

	public function setPrice(int $price): void {
		$this->price = $price;
	}

	public function getQuantity(): int {
		return $this->quantity;
	}

	public function setQuantity(int $quantity): void {
		$this->quantity = $quantity;
	}

	public function getCategoryID(): int {
		return $this->categoryID;
	}

	public function setCategoryID(int $categoryID): void {
		$this->categoryID = $categoryID;
	}

	public function getImage(): string {
		return $this->image;
	}

	public function setImage(string $image): void {
		$this->image = $image;
	}

	public static function find(string $productId): Product {
		/**
		 * @var mysqli $conn
		 */
		echo $productId . PHP_EOL;
		require_once 'database/config.php';
		$sql = "SELECT * FROM Products WHERE ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $productId);
			$stmt->execute() ?? die("Execute failed: " . $stmt->error);

		$product = new Product();
		$row = $stmt->get_result()->fetch_assoc();
		if ($row === null) die("Product not found");
		$product->assign($row);
		echo json_encode($product, JSON_PRETTY_PRINT);
		$stmt->close();
		$conn->close();

		return $product;
	}

	public static function delete(mixed $deleteID): void {
		/**
		 * @var mysqli $conn
		 */
		require_once 'database/config.php';
		$sql = "DELETE FROM Products WHERE ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $deleteID);
		$stmt->execute();
		$stmt->close();
		$conn->close();
	}

	public static function update(Product $product): void {
		/**
		 * @var mysqli $conn
		 */
		$conn = new mysqli('localhost:3306', 'root', 'a12345', 'selling')
		or die('Cannot connect to database');
		$sql = "UPDATE Products SET TenSP = ?, Gia = ?, SoLuong = ?, IDDanhMuc = ? WHERE ID = ?";
		$stmt = $conn->prepare($sql);

		$productName = $product->getProductName();
		$price = $product->getPrice();
		$quantity = $product->getQuantity();
		$categoryID = $product->getCategoryID();
		$id = $product->getId();

		$stmt->bind_param('siisi', $productName, $price, $quantity, $categoryID, $id);
			$stmt->execute() ?? die("Execute failed: " . $stmt->error);

		$stmt->close();
		$conn->close();
	}

	public function getId(): int {
		return $this->id;
	}

	public function setId(int $id): void {
		$this->id = $id;
	}

	public function jsonSerialize(): array {
		return [
			'id' => $this->id,
			'productName' => $this->productName,
			'price' => $this->price,
			'quantity' => $this->quantity,
			'categoryID' => $this->categoryID,
			'image' => $this->image
		];
	}
}