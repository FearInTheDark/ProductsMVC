<?php
/**
 * @var Product $product
 */

use App\Models\Product;

?>
<div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3 class="text-center">Sửa sản phẩm</h3>
    <br>
    <form action="/ProductsMVC/products/modify-product" method="POST"
          class="form-container d-flex flex-column justify-content-center gap-3 justify-content-center align-items-center modifyForm">
        <div class="attr">
            <label>ID Sản Phẩm: </label>
            <input type="text" name="ID" placeholder="<?= $product->getId() ?>" value="<?= $product->getId(); ?>"
                   readonly>
        </div>
        <div class="attr">
            <label>Tên sản phẩm: </label>
            <input type="text" name="TenSP" placeholder="Tên sản phẩm" value="<?= $product->getProductName(); ?>">
        </div>
        <div class="attr">
            <label>Giá: </label>
            <input type="text" name="Gia" placeholder="Giá" value="<?php echo $product->getPrice(); ?>">
        </div>
        <div class="attr">
            <label for="SoLuong">Số lượng: </label>
            <input type="text" name="SoLuong" placeholder="Số lượng" value="<?php echo $product->getQuantity(); ?>">
        </div>
        <div class="attr">
            <label for="IDDanhMuc">Danh mục: </label>
            <select name="IDDanhMuc">
                <option value="" disabled>Chọn danh mục</option>
				<?php
				$con = new mysqli('localhost:3306', 'root', 'a12345', 'selling');
				if ($con->connect_error) {
					die("Connection failed: " . $con->connect_error);
				}
				$sql = "SELECT * FROM Categories";
				$result = $con->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo '<option value="' . $row['ID'] . '">' . $row['categoryName'] . '</option>' . PHP_EOL;
				}
				mysqli_close($con);
				?>
            </select>
        </div>
        <input type="submit" value="Sửa Sản Phẩm" class="btn btn-success" onclick="closeModal()">
    </form>
</div>