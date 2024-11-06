<?php
include('../db/connect.php');
?>

<?php
function themDanhMucBaiViet($con)
{
    if (isset($_POST['themdanhmuc'])) {
        $tendanhmuc = $_POST['danhmuc'];

        $sql_insert = mysqli_query($con, "INSERT INTO tbl_danhmuc_tin(tendanhmuc) values ('$tendanhmuc')");

        if ($sql_insert) {
            echo '<script>alert("Danh mục bài viết đã được thêm thành công");</script>';
        } else {
            echo '<script>alert("Thêm danh mục bài viết thất bại");</script>';
        }
    }
}

function capNhatDanhMucBaiViet($con)
{
    if (isset($_POST['capnhatdanhmuc'])) {
        $id_post = $_POST['id_danhmuc'];
        $tendanhmuc = $_POST['danhmuc'];

        $sql_update = mysqli_query($con, "UPDATE tbl_danhmuc_tin SET tendanhmuc='$tendanhmuc' WHERE danhmuctin_id='$id_post'");
        
        if ($sql_update) {
            echo '<script>alert("Danh mục bài viết đã được cập nhật thành công");</script>';
         
        } else {
            echo '<script>alert("Cập nhật danh mục bài viết thất bại");</script>';
        }
    }
}

function xoaDanhMucBaiViet($con)
{
    if (isset($_GET['xoa'])) {
        $id = $_GET['xoa'];

        $sql_xoa = mysqli_query($con, "DELETE FROM tbl_danhmuc_tin WHERE danhmuctin_id='$id'");

        if ($sql_xoa) {
            echo '<script>alert("Danh mục bài viết đã được xóa thành công");</script>';
        } else {
            echo '<script>alert("Xóa danh mục bài viết thất bại");</script>';
        }
    }
}
// Gọi các hàm xử lý
themDanhMucBaiViet($con);
capNhatDanhMucBaiViet($con);
xoaDanhMucBaiViet($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh mục</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
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
	<div class="container">
		<div class="row">
			<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin WHERE danhmuctin_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				?>
				<div class="col-md-4">
				<h4>Cập nhật danh mục</h4>
				<label>Tên danh mục</label>
				<form action="" method="POST">
					<input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat['tendanhmuc'] ?>"><br>
					<input type="hidden" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhat['danhmuctin_id'] ?>">

					<input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?>
				<div class="col-md-4">
				<h4>Thêm danh mục</h4>
				<label>Tên danh mục</label>
				<form action="" method="POST">
					<input type="text" class="form-control" name="danhmuc" placeholder="Tên danh mục"><br>
					<input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Liệt kê danh mục</h4>
				<?php
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC"); 
				?>
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên danh mục</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_category = mysqli_fetch_array($sql_select)){ 
						$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_category['tendanhmuc'] ?></td>
						<td><a href="?xoa=<?php echo $row_category['danhmuctin_id'] ?>">Xóa</a> || <a href="?quanly=capnhat&id=<?php echo $row_category['danhmuctin_id'] ?>">Cập nhật</a></td>
					</tr>
					<?php
					} 
					?>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>