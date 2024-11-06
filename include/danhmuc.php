<?php
function layIdDanhMuc()
{
    if (isset($_GET['id'])) {
        return $_GET['id'];
    } else {
        return '';
    }
}

function layDanhSachSanPhamTheoDanhMuc($con, $id_danhmuc)
{
    // Truy vấn cơ sở dữ liệu để lấy danh sách sản phẩm trong một danh mục cụ thể
    $sql_cate = mysqli_query($con, "SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id_danhmuc' ORDER BY tbl_sanpham.sanpham_id DESC");

    return $sql_cate;
}

function layTieuDeDanhMuc($con, $id_danhmuc)
{
    // Truy vấn cơ sở dữ liệu để lấy tiêu đề của danh mục dựa trên id
    $sql_category = mysqli_query($con, "SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id_danhmuc' ORDER BY tbl_sanpham.sanpham_id DESC");
    $row_title = mysqli_fetch_array($sql_category);
    $title = $row_title['category_name'];

    return $title;
}

function hienThiSanPham($con, $sql_cate)
{
    echo '
	<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
		<div class="row">
	';

    while ($row_sanpham = mysqli_fetch_array($sql_cate)) {
        echo '
		<div class="col-md-4 product-men mt-5">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item text-center">
					<img src="images/' . $row_sanpham['sanpham_image'] . '" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="?quanly=chitietsp&id=' . $row_sanpham['sanpham_id'] . '" class="link-product-add-cart">Xem sản phẩm</a>
						</div>
					</div>
				</div>
				<div class="item-info-product text-center border-top mt-4">
					<h4 class="pt-1">
						<a href="?quanly=chitietsp&id=' . $row_sanpham['sanpham_id'] . '">' . $row_sanpham['sanpham_name'] . '</a>
					</h4>
					<div class="info-product-price my-2">
						<span class="item_price">' . number_format($row_sanpham['sanpham_giakhuyenmai']) . 'vnđ</span>
						<del>' . number_format($row_sanpham['sanpham_gia']) . 'vnđ</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="?quanly=giohang" method="post">
							<fieldset>
								<input type="hidden" name="tensanpham" value="' . $row_sanpham['sanpham_name'] . '" />
								<input type="hidden" name="sanpham_id" value="' . $row_sanpham['sanpham_id'] . '" />
								<input type="hidden" name="giasanpham" value="' . $row_sanpham['sanpham_gia'] . '" />
								<input type="hidden" name="hinhanh" value="' . $row_sanpham['sanpham_image'] . '" />
								<input type="hidden" name="soluong" value="1" />			
								<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		';
    }

    echo '
		</div>
	</div>
	';
}

$id_danhmuc = layIdDanhMuc();
$sql_cate = layDanhSachSanPhamTheoDanhMuc($con, $id_danhmuc);
$title = layTieuDeDanhMuc($con, $id_danhmuc);

echo '
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">' . $title . '</h3>
		<divclass="row">
			<div class="agileinfo-ads-display col-lg-9">
				<div class="wrapper">
					';
// Hiển thị sản phẩm
hienThiSanPham($con, $sql_cate);
echo '
				</div>
			</div>
		</div>
	</div>
</div>
';
?>