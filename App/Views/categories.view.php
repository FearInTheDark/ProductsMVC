<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/ProductsMVC/App/Views/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Danh Muc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js"></script>
</head>

<body>
<?php include('layout/header.view.php') ?>
<br>
<h1 class="text-center">Danh Sách Danh Mục</h1>
<br>
<table class="table table-striped text-center m-auto" style="width: 60%;">
    <tr>
        <th>ID</th>
        <th>Tên Danh Mục</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
	<?php
	//        require_once
	foreach ($categories as $category) {
		echo '<tr>';
		echo '	<td>' . $category->getId() . '</td>';
		echo '	<td>' . '<a href="/ProductsMVC/Categories/' . $category->getSlug() . '">' . $category->getCategoryName() . '</a>' . '</td>';
		echo '	<td>' . '<a href="/" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a>' . '</td>';
		echo '	<td>' . '<a href="/" class="text-danger"><i class="fa-solid fa-trash-can"></i></a>' . '</td>';
		echo '</tr>';
	}

	?>
</table>

<div class="container m-auto d-flex flex-column p-3 justify-content-center align-item-center">
    <h4 class="text-center">Thêm Danh Mục</h4>
    <form action="DSDM.php" method="GET" class="form-container d-flex flex-wrap justify-content-center gap-3">
        <input type="text" name="TenDM" placeholder="Tên Danh Mục" class="form-">
        <input type="submit" value="Thêm Danh Mục" class="btn btn-primary">
    </form>
</div>
</body>

</html>