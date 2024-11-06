<?php
include('../db/connect.php');

function tinhTongDoanhThu($con, $thang, $nam, $danhmuc_id)
{
    $sql = "SELECT SUM(soluong * sanpham_giakhuyenmai) AS tong_doanh_thu
            FROM tbl_donhang
            INNER JOIN tbl_sanpham ON tbl_donhang.sanpham_id = tbl_sanpham.sanpham_id
            WHERE tbl_donhang.tinhtrang = 1";

    if ($thang != 'all') {
        $sql .= " AND MONTH(tbl_donhang.ngaythang) = $thang";
    }

    if ($nam != 'all') {
        $sql .= " AND YEAR(tbl_donhang.ngaythang) = $nam";
    }

    if ($danhmuc_id != 'all') {
        $sql .= " AND tbl_sanpham.category_id = $danhmuc_id";
    }

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['tong_doanh_thu'];
}

// Thiết lập giá trị mặc định cho tháng, năm và danh mục
$thang = 'all';
$nam = date('Y');
$danhmuc_id = 'all';

if (isset($_POST['thongke'])) {
    $thang = $_POST['thang'];
    $nam = $_POST['nam'];
    $danhmuc_id = $_POST['danhmuc'];
}

// Tính tổng doanh thu dựa trên giá trị tháng, năm và danh mục
$tongDoanhThu = tinhTongDoanhThu($con, $thang, $nam, $danhmuc_id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thống kê doanh thu</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="container-fluid">
        <h2>Thống kê doanh thu</h2>
        
        <!-- Form chọn tháng, năm và danh mục -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="thang">Chọn tháng:</label>
                <select class="form-control" name="thang" id="thang">
                    <option value="all">Tất cả</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $selected = ($i == $thang) ? 'selected="selected"' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="nam">Chọn năm:</label>
                <select class="form-control" name="nam" id="nam">
                    <?php
                    for ($i = 2020; $i <= date('Y'); $i++) {
                        $selected = ($i == $nam) ? 'selected="selected"' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="danhmuc">Chọn danh mục:</label>
                <select class="form-control" name="danhmuc" id="danhmuc">
                    <option value="all">Tất cả</option>
                    <?php
                    $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_category");
                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                        $selected = ($row_danhmuc['category_id'] == $danhmuc_id) ? 'selected="selected"' : '';
                        echo "<option value='" . $row_danhmuc['category_id'] . "' $selected>" . $row_danhmuc['category_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="thongke" class="btn btn-primary">Thống kê</button>
        </form>
        
        <!-- Hiển thị tổng doanh thu và biểu đồ -->
        <div class="mt-4">
            <h4>Tổng doanh thu: <?php echo number_format($tongDoanhThu, 0, ',', '.') ?> vnđ</h4>
            <canvas id="doanhThuChart"></canvas>
        </div>
    </div>
    
    <script>
       // Lấy dữ liệu từ PHP và chuyển sang JavaScript
var tongDoanhThu = <?php echo $tongDoanhThu; ?>;
var tenDanhMuc = '<?php echo ($danhmuc_id == "all") ? "Tất cả" : $row_danhmuc['category_name']; ?>';
var labels = [];
var data = [];

<?php
// Tạo mảng labels và data cho từng tháng trong năm
$labels = [];
$data = [];
$thangTiengViet = [
    1 => 'Tháng 1',
    2 => 'Tháng 2',
    3 => 'Tháng 3',
    4 => 'Tháng 4',
    5 => 'Tháng 5',
    6 => 'Tháng 6',
    7 => 'Tháng 7',
    8 => 'Tháng 8',
    9 => 'Tháng 9',
    10 => 'Tháng 10',
    11 => 'Tháng 11',
    12 => 'Tháng 12'
];

for ($i = 1; $i <= 12; $i++) {
    $tongDoanhThuThang = tinhTongDoanhThu($con, $i, $nam, $danhmuc_id);
    $labels[] = $thangTiengViet[$i]; // Lấy tên tháng từ mảng ánh xạ
    $data[] = (int) $tongDoanhThuThang;
}

// Chuyển mảng data thành chuỗi JSON
$dataJSON = json_encode($data);
?>
labels = <?php echo json_encode($labels); ?>;
data = <?php echo $dataJSON; ?>;
// Tạo biểu đồ
var ctx = document.getElementById('doanhThuChart').getContext('2d');
var doanhThuChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Doanh thu',
            data: data,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value, index, values) {
                        return value.toLocaleString() + ' vnđ';
                    }
                }
            }
        }
    }
});
    </script>
</body>
</html>


