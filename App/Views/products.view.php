<html lang="en">

<head>
    <base href="/ProductsMVC/App/Views/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách San Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js"></script>
</head>

<body>
<?php require_once('layout/header.view.php') ?>

<br>
<h1 class="text-center">Danh Sách Sản Phẩm</h1>
<br>
<table class="table table-striped text-center m-auto" style="width: 60%;">
    <tr>
        <th>ID</th>
        <th>Tên SP</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>ID Danh Mục</th>
        <th>Thêm</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
	<?php
	foreach ($products as $row) {
		echo '<tr>';
		echo '	<td>' . $row->getId() . '</td>';
		echo '	<td>' . $row->getProductName() . '</td>';
		echo '	<td>' . $row->getPrice() . '</td>';
		echo '	<td>' . $row->getQuantity() . '</td>';
		echo '	<td>' . $row->getCategoryID() . '</td>';
		echo '	<td><button onclick="addToCart(' . $row->getId() . ')" class="btn text-primary"><i class="fa-solid fa-cart-shopping"></i></button></td>';
		echo '	<td><button onclick="modify(' . $row->getId() . ')" class="btn text-success"><i class="fa-solid fa-pen-to-square"></i></button></td>';
		echo '	<td><button onclick="deleteProduct(' . $row->getId() . ')" class="btn text-danger"><i class="fa-solid fa-trash-can"></i></button></td>';
		echo '</tr>';
	}
	?>
</table>
<div class="modal" id="modal"></div>

<script>
    const addToCart = (productId) => {
        fetch('ProductsMVC/Process.php?productToCart=' + productId)
            .then(response => {
                if (response.ok)
                    alert('Đã thêm sản phẩm vào giỏ Hàng')
                else alert('Thêm sản phẩm vào giỏ hàng thất bại')
            }).catch(error => console.log(error));
    }

    const modify = (productId) => {
        const formData = new FormData();
        formData.append('modifyID', productId);
        fetch('/ProductsMVC/products/modify-product/', {
            method: 'POST',
            body: formData
        }).then(response => response.text())
            .then(data => {
                if (data === 'Product not found') {
                    alert('Product not found');
                    return;
                }
                document.getElementById('modal').innerHTML = data;
                openModal();
            }).catch(error => console.log(error));
    }

    const deleteProduct = (productId) => {
        const formData = new FormData();
        formData.append('deleteID', productId);
        fetch('/ProductsMVC/products/delete-product/', {
            method: 'POST',
            body: formData
        }).then(response => {
            if (response.ok) location.reload();
        }).catch(error => console.log(error));
    }
</script>
</body>

</html>