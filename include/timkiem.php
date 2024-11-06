<?php
function searchProduct($con)
{
    $title = '';

    if (isset($_POST['search_button'])) {
        $tukhoa = $_POST['search_product'];
        
        // Thực hiện truy vấn SQL để tìm kiếm sản phẩm dựa trên từ khóa
        $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%$tukhoa%' ORDER BY sanpham_id DESC");
        
        $title = $tukhoa;
    }

    return $title;
}

function displaySearchResults($con, $title)
{
    // Hiển thị kết quả tìm kiếm
    echo '<div class="ads-grid py-sm-5 py-4">
            <div class="container py-xl-4 py-lg-2">
                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Từ khóa tìm kiếm : ' . $title . '</h3>
                <div class="row">
                    <div class="agileinfo-ads-display col-lg-9">
                        <div class="wrapper">
                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                <div class="row">';

    $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%$title%' ORDER BY sanpham_id DESC");

    $found_results = false; // Biến kiểm tra xem có kết quả tìm kiếm hay không

    while ($row_sanpham = mysqli_fetch_array($sql_product)) {
        $found_results = true; // Đánh dấu có kết quả tìm kiếm
        // Hiển thị thông tin sản phẩm
        echo '<div class="col-md-4 product-men mt-5">
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
            </div>';
    }

    // Kiểm tra và hiển thị thông báo nếu không tìm thấy kết quả
    if (!$found_results) {
        echo '<div class="col-md-12 text-center">Không tìm thấy sản phẩm liên quan đến từ khóa tìm kiếm.</div>';
    }

    echo '</div>
        </div>
    </div>
    </div>
    </div>
    </div>';
}

// Sử dụng các hàm
$title = searchProduct($con);
displaySearchResults($con, $title);

?>