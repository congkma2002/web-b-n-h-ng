<?php
function layIdBaiViet()
{
    if (isset($_GET['id_tin'])) {
        return $_GET['id_tin'];
    } else {
        return '';
    }
}

function taoBreadcrumb($con, $id_baiviet)
{
    $sql_tenbaiviet = mysqli_query($con, "SELECT * FROM tbl_baiviet WHERE baiviet_id='$id_baiviet'");
    $row_bai = mysqli_fetch_array($sql_tenbaiviet);

    echo '
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="index.php">Trang chủ</a>
                        <i>|</i>
                    </li>
                    <li>' . $row_bai['tenbaiviet'] . '</li>
                </ul>
            </div>
        </div>
    </div>
    ';
}

// Hàm tạo nội dung bài viết
function taoNoiDungBaiViet($con, $id_baiviet)
{
    $sql_baiviet = mysqli_query($con, "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.baiviet_id='$id_baiviet'");
    $row_baiviet = mysqli_fetch_array($sql_baiviet);

    echo '
    <div class="welcome py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">' . $row_baiviet['tenbaiviet'] . '</h3>
            <div class="row">
                <div class="col-lg-12 welcome-left">
                    <h5>' . $row_baiviet['tenbaiviet'] . '</h5>
                    <h4 class="my-sm-3 my-2">' . $row_baiviet['tomtat'] . '</h4>
                    <p>' . $row_baiviet['noidung'] . '</p>
                </div>
            </div><br>
        </div>
    </div>
    ';
}

$id_baiviet = layIdBaiViet();
taoBreadcrumb($con, $id_baiviet);
taoNoiDungBaiViet($con, $id_baiviet);
?>

