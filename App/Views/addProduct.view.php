<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php
include('layout/header.view.php');
?>
<div class="container m-auto d-flex flex-column p-3 justify-content-center align-item-center">
    <h4 class="text-center">Thêm sản phẩm</h4>
    <form action="/ProductsMVC/products/add-product/" method="POST"
          class="form-container d-flex flex-wrap justify-content-center gap-3">
        <label>
            <input type="text" name="pName" placeholder="Tên sản phẩm" required>
        </label>
        <label>
            <input type="number" name="price" placeholder="Giá" required>
        </label>
        <label>
            <input type="number" name="quant" placeholder="Số lượng" required>
        </label>
        <label for="">
            <select name="catID" id="" class="h-75" required>
                <option value="" disabled>Chọn danh mục</option>
				<?php
				/**
				 * @var mysqli $conn
				 */
				require_once 'database/config.php';
				$sql = "SELECT * FROM Categories";
				$result = $conn->execute_query($sql);
				while ($row = $result->fetch_assoc()) {
					echo '<option value="' . $row['ID'] . '">' . $row['categoryName'] . '</option>';
				}
				?>
            </select>
        </label>
        <input type="submit" value="Thêm Sản Phẩm" class="btn btn-success">
    </form>
</div>
</body>

</html>