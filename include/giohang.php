<?php
function themGioHang($con)
{
    if (isset($_POST['themgiohang'])) {
        $tensanpham = $_POST['tensanpham'];
        $sanpham_id = $_POST['sanpham_id'];
        $hinhanh = $_POST['hinhanh'];
        $gia = $_POST['giasanpham'];
        $soluong = $_POST['soluong'];

        $sql_select_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
        $count = mysqli_num_rows($sql_select_giohang);

        if ($count > 0) {
            $row_sanpham = mysqli_fetch_array($sql_select_giohang);
            $soluong = $row_sanpham['soluong'] + 1;
            $sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'";
        } else {
            $soluong = $soluong;
            $sql_giohang = "INSERT INTO tbl_giohang(tensanpham, sanpham_id, giasanpham, hinhanh, soluong) VALUES ('$tensanpham', '$sanpham_id', '$gia', '$hinhanh', '$soluong')";
        }

        $insert_row = mysqli_query($con, $sql_giohang);
        echo '<script>alert("Thêm sản phẩm vào giỏ hàng thành công");</script>';

    }
}function capNhatSoLuong($con)
{
    if (isset($_POST['capnhatsoluong'])) {
        for ($i = 0; $i < count($_POST['product_id']); $i++) {
            $sanpham_id = $_POST['product_id'][$i];
            $soluong = $_POST['soluong'][$i];

            if ($soluong <= 0) {
                $sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
            } else {
                $sql_update = mysqli_query($con, "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
            }
        }
        echo '<script>alert("Cập nhập số lượng thành công");</script>';

    }
}
function xoaSanPhamGioHang($con)
{
    if (isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        $sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang WHERE giohang_id='$id'");
        echo '<script>alert("Xóa sản phẩm khỏi giỏ hàng thành công");</script>';
        

    }
}
function datDonHang($con)
{
    if (isset($_POST['datdonhang'])) {
        $khachhang_id = $_SESSION['khachhang_id'];
        $mahang = rand(0, 9999);

        for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {
            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];

            $sql_donhang = mysqli_query($con, "INSERT INTO tbl_donhang(sanpham_id, khachhang_id, soluong, mahang) VALUES ('$sanpham_id', '$khachhang_id', '$soluong', '$mahang')");
            $sql_giaodich = mysqli_query($con, "INSERT INTO tbl_giaodich(sanpham_id, soluong, magiaodich, khachhang_id) VALUES ('$sanpham_id', '$soluong', '$mahang', '$khachhang_id')");

            $sql_delete_thanhtoan = mysqli_query($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
            echo '<script>alert("Đặt hàng thành công");</script>';
        }
    }
}
themGioHang($con);
xoaSanPhamGioHang($con);
capNhatSoLuong($con);
datDonHang($con);
?>
<!-- checkout page -->
    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                Giỏ hàng của bạn
            </h3>
			
                <?php 
                if(isset($_SESSION['dangnhap_home'])){
                    echo '<p style="color:#000;">Xin chào bạn: '.$_SESSION['dangnhap_home'].'</p>';
                }else{
                    echo '';
                }
                ?>
                
            <!-- //tittle heading -->
            <div class="checkout-right">
            <?php
            $sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");

            ?>

                <div class="table-responsive">
                    <form action="" method="POST">
                    
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tên sản phẩm</th>

                                <th>Giá</th>
                                <th>Giá tổng</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        $total = 0;
                        while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)){ 

                            $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
                            $total+=$subtotal;
                            $i++;
                        ?>
                            <tr class="rem1">
                                <td class="invert"><?php echo $i ?></td>
                                <td class="invert-image">
                                    <a href="?quanly=chitietsp&id=<?php echo $product['id']; ?>">
                                        <img src="images/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=" " height="120" class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                                    <input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>">
                                
                                    
                                </td>
                                <td class="invert"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
                                <td class="invert"><?php echo number_format($row_fetch_giohang['giasanpham']).'vnđ' ?></td>
                                <td class="invert"><?php echo number_format($subtotal).'vnđ' ?></td>
                                <td class="invert">
                                    <a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>">Xóa</a>
                                </td>
                            </tr>
                            <?php
                            } 
                            ?>
                            <tr>
                                <td colspan="7">Tổng tiền : <?php echo number_format($total).'vnđ' ?></td>

                            </tr>
                            <tr>
                                <td colspan="7"><input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong">
                                <?php 
                                $sql_giohang_select = mysqli_query($con,"SELECT * FROM tbl_giohang");
                                $count_giohang_select = mysqli_num_rows($sql_giohang_select);

                                if(isset($_SESSION['dangnhap_home']) && $count_giohang_select>0){
                                    while($row_1 = mysqli_fetch_array($sql_giohang_select)){
                                ?>
                                
                                <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
                                <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['soluong'] ?>">
                                <?php 
                            }
                                ?>
                                <input type="submit" class="btn btn-primary" value="Đặt hàng" name="datdonhang">
        
                                <?php
                                } 
                                ?>
                                
                                </td>
                            
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
            <?php
            if(!isset($_SESSION['dangnhap_home'])){ 
				
            ?>
			    <p>Thông báo: Bạn cần đăng nhập tài khoản để đặt hàng.</p>

            <?php
            } 
            ?>
        </div>
    </div>
    <!-- //checkout page -->

