<?php
session_start();

function kiemTraDangNhap()
{
    if (!isset($_SESSION['dangnhap'])) {
        header('Location: index.php');
    }
}

function dangXuat()
{
    if (isset($_GET['login'])) {
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }

    if ($dangxuat == 'dangxuat') {
        // Nếu có yêu cầu đăng xuất, hủy session và chuyển hướng về trang index.php
        session_destroy();
        header('Location: index.php');
    }
}

kiemTraDangNhap();
dangXuat();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<p>Xin chào : <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">Đăng xuất</a></p>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục Bài viết</a>
	      </li>
	         <li class="nav-item">
	        <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
	      </li>
	       <li class="nav-item">
	         <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
	      </li>
		  <li class="nav-item">
	         <a class="nav-link" href="thongke.php">Thống kê</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav>
</body>
</html>