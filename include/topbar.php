<?php
function login($con) {

    if (isset($_POST['dangnhap_home'])) {
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

        if ($email == '' || $password == '') {
            echo '<script>alert("Làm ơn không để trống")</script>';
        } else {
            $hashedPassword = md5($password);

            $sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email='$email' AND password='$hashedPassword' LIMIT 1");
            $count = mysqli_num_rows($sql_select_admin);
            $row_dangnhap = mysqli_fetch_array($sql_select_admin);

            if ($count > 0) {
                $_SESSION['dangnhap_home'] = $row_dangnhap['name'];
                $_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];

                header('Location: index.php?quanly=giohang');
            } else {
                echo '<script>alert("Tài khoản mật khẩu sai")</script>';
            }
        }
    }
}

function register($con) {
    if (isset($_POST['dangky'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $giaohang = $_POST['giaohang'];

        // Kiểm tra email đã tồn tại trong bảng khách hàng hay chưa
        $sql_check_email = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email = '$email'");
        if (mysqli_num_rows($sql_check_email) > 0) {
            echo '<script>alert("Email đã tồn tại trong hệ thống. Vui lòng chọn email khác.")</script>';
            return;
        }

        // Kiểm tra số điện thoại đã tồn tại trong bảng khách hàng hay chưa
        $sql_check_phone = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE phone = '$phone'");
        if (mysqli_num_rows($sql_check_phone) > 0) {
            echo '<script>alert("Số điện thoại đã tồn tại trong hệ thống. Vui lòng chọn số điện thoại khác.")</script>';
            return;
        }

        // Kiểm tra và gán giá trị cho 'note'
        $note = isset($_POST['note']) ? $_POST['note'] : '';

        // Mã hóa mật khẩu
        $hashedPassword = md5($password);

        // Thực hiện chèn dữ liệu vào bảng khách hàng
        $sql_khachhang = mysqli_query($con, "INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$hashedPassword')");

        // Lấy thông tin khách hàng vừa được chèn
        $sql_select_khachhang = mysqli_query($con, "SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
        $row_khachhang = mysqli_fetch_array($sql_select_khachhang);

        // Đăng nhập khách hàng và lưu thông tin vào session
        $_SESSION['dangnhap_home'] = $name;
        $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];

        echo '<script>alert("Đăng ký thành công")</script>';
        header('Location: index.php?quanly=giohang');
    }
}

function logout($con) {
    if (isset($_POST['dangxuat'])) {
        session_destroy();
        header('Location: index.php');
    }
}

login($con);
register($con);
logout($con);
?>
<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top">
                
            </div>
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
				<ul>
    <?php if(isset($_SESSION['dangnhap_home'])){ ?>
    <li class="text-center border-right text-white">
        <a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>" class="text-white">
            <i class="fas fa-truck mr-2"></i>Xem đơn hàng : <?php echo $_SESSION['dangnhap_home'] ?></a>
    </li>
    <?php } ?>
    <li class="text-center border-right text-white">
        <i class="fas fa-phone mr-2"></i> 0909999999
    </li>
    <?php if(isset($_SESSION['dangnhap_home'])){ ?>
    <li class="text-center text-white">
        <form method="post" action="">
            <button type="submit" name="dangxuat" class="btn btn-link text-white btn-sm">
                <i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất
            </button>
        </form>
    </li>
    <?php } else { ?>
    <li class="text-center border-right text-white">
        <a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
            <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập
        </a>
    </li>
    <li class="text-center text-white">
        <a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
            <i class="fas fa-sign-out-alt mr-2"></i>Đăng ký
        </a>
    </li>
    <?php } ?>
</ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>
	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" placeholder=" " name="email_login" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="password_login" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
						</div>
						
						<p class="text-center dont-do mt-3">Chưa có tài khoản?
							<a href="#" data-toggle="modal" data-target="#dangky">
								Đăng ký</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- register -->
<!-- register -->
<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng ký</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" onsubmit="return validateForm()">
            <div class="form-group">
    <label class="col-form-label">Họ và tên</label>
    <input type="text" class="form-control" placeholder=" " name="name" pattern="^[A-Za-z\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]+$" title="Vui lòng chỉ nhập chữ cái, độ dài họ tên không quá 25 ký tự" maxlength="25" required>
</div>
<div class="form-group">
    <label class="col-form-label">Email</label>
    <input type="email" class="form-control" placeholder=" " name="email" pattern="[a-zA-Z0-9._%+-]+@gmail\.com" title="Vui lòng nhập địa chỉ email không quá 50 ký tự" maxlength="50" required>
</div>
                    <div class="form-group">
                        <label class="col-form-label">Số điện thoại</label>
                        <input type="text" class="form-control" placeholder=" " name="phone" pattern="[0-9]{10,11}" title="Vui lòng nhập số điện thoại gồm 10-11 chữ số" required>
                    </div>
                    <div class="form-group">
    <label class="col-form-label">Địa chỉ</label>
    <input type="text" class="form-control" placeholder=" " name="address" pattern="^[A-Za-z0-9\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]+$" title="Vui lòng nhập đúng định dạng và không quá 50 ký tự" maxlength="50" required>
</div>
<div class="form-group">
                        <label class="col-form-label">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder=" " name="password" id="password" pattern="^(?!.*\s).{8,}$" title="Mật khẩu phải có ít nhất 8 ký tự và không chứa khoảng trắng" required>
                        <input type="hidden" class="form-control" placeholder="" name="giaohang" value="0">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" placeholder=" " name="confirm_password" id="confirm_password" required>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" name="dangky" value="Đăng ký">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (password !== confirmPassword) {
            alert("Mật khẩu nhập lại không khớp. Vui lòng kiểm tra lại.");
            return false;
        }
    }
</script>
       
                
                </form>
            </div>
        </div>
    </div>
</div>


	<!-- //modal -->
	<!-- //top-header -->
	
	
	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.php" class="font-weight-bold font-italic">
							<img src="images/logo2.png" alt=" " class="img-fluid">Electronic Store
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="index.php?quanly=timkiem" method="POST">
								<input class="form-control mr-sm-2" name="search_product" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" name="search_button" type="submit">Tìm kiếm</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="index.php?quanly=giohang" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->