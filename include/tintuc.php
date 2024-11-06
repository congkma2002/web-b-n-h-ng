<?php
function getIdTin()
{
    if (isset($_GET['id_tin'])) {
        return $_GET['id_tin'];
    } else {
        return '';
    }
}

function generateBreadcrumbSection($con, $id_danhmuc)
{
    $breadcrumbSection = '';

    // Truy vấn cơ sở dữ liệu để lấy thông tin danh mục tin
    $sql_tendanhmuc = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin WHERE danhmuctin_id='$id_danhmuc'");
    $row_danh = mysqli_fetch_array($sql_tendanhmuc);

    $breadcrumbSection .= '<div class="services-breadcrumb">
                        <div class="agile_inner_breadcrumb">
                            <div class="container">
                                <ul class="w3_short">
                                    <li>
                                        <a href="index.php">Trang chủ</a>
                                        <i>|</i>
                                    </li>';

    if (!empty($row_danh)) {
        $breadcrumbSection .= '<li>' . $row_danh['tendanhmuc'] . '</li>';
    }

    $breadcrumbSection .= '</ul>
                    </div>
                </div>
            </div>';

    return $breadcrumbSection;
}

// Hàm tạo phần danh sách tin tức
function generateNewsSection($con, $id_danhmuc)
{
    $newsSection = '';

    // Truy vấn cơ sở dữ liệu để lấy thông tin danh mục tin
    $sql_tendanhmuc1 = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin WHERE danhmuctin_id='$id_danhmuc'");
    $row_danh1 = mysqli_fetch_array($sql_tendanhmuc1);

    // Xây dựng phần danh sách tin tức
    $newsSection .= '<div class="welcome py-sm-5 py-4">
                            <div class="container py-xl-4 py-lg-2">
                                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">' . $row_danh1['tendanhmuc'] . '</h3>';

    // Truy vấn cơ sở dữ liệu để lấy thông tin bài viết trong danh mục
    $sql_baiviet = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin,tbl_baiviet WHERE tbl_danhmuc_tin.danhmuctin_id = tbl_baiviet.danhmuctin_id AND tbl_danhmuc_tin.danhmuctin_id='$id_danhmuc'");

    while ($row_baiviet = mysqli_fetch_array($sql_baiviet)) {
        // Thêm thông tin của từng bài viết vào phần danh sách tin tức
        $newsSection .= '<div class="row">
                                <div class="col-lg-4 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
                                    <img src="images/' . $row_baiviet['baiviet_image'] . '" class="img-fluid" alt=" ">
                                </div>
                                <div class="col-lg-8 welcome-left">
                                    <h5><a href="index.php?quanly=chitiettin&id_tin=' . $row_baiviet['baiviet_id'] . '">' . $row_baiviet['tenbaiviet'] . '</a></h5>
                                    <h4 class="my-sm-3 my-2">' . $row_baiviet['tomtat'] . '</h4>
                                </div>
                            </div><br>';
    }

    $newsSection .= '</div>
                    </div>';

    return $newsSection;
}

// Sử dụng các hàm để hiển thị phần breadcrumb và phần danh sách tin tức
$id_danhmuc = getIdTin();
$breadcrumbSection = generateBreadcrumbSection($con, $id_danhmuc);
$newsSection = generateNewsSection($con, $id_danhmuc);
echo $breadcrumbSection;
echo $newsSection;
?>