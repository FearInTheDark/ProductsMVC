<div class="links mt-3 mb-4">
    <a href="http://localhost/ProductsMVC/Categories/"><i class="fa-solid fa-list"></i> Danh Sách Danh Mục</a>
    <span> | </span>
    <a href="http://localhost/ProductsMVC/products/"><i class="fa-solid fa-laptop"></i> Danh Sách Sản Phẩm</a>
    <span> | </span>
    <a href="http://localhost/ProductsMVC/products/add-product"><i class="fa-solid fa-plus"></i> Thêm Sản Phẩm</a>
    <span> | </span>
	<?php
	if (isset($_COOKIE['username'])) {
		echo '<a href="http://localhost/ProductsMVC/logout"><i class="fa-solid fa-user"></i> Xin Chào ' . $_COOKIE['username'] . ' (Đăng Xuất)</a>';
	} else {
		echo '<a href="http://localhost/ProductsMVC/login"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;Đăng Nhập</a>';
	}
	?>
    <span> | </span>
    <a href="http://localhost/ProductsMVC/cart"><i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng</a>
</div>

<style>
    .links {
        text-align: center;
        margin: auto;
    }

    a {
        text-decoration: none;
    }

    a:hover {
        color: red;
    }
</style>