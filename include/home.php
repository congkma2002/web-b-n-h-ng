<?php
function getCategoriess($con) {
    $categories = array();

    // Lấy danh sách các danh mục từ cơ sở dữ liệu
    $sql_cate_home = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC");

    while ($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
        // Tạo một mảng chứa thông tin của mỗi danh mục
        $category = array(
            'id' => $row_cate_home['category_id'],
            'name' => $row_cate_home['category_name']
        );

        $categories[] = $category;
    }

    return $categories;
}
function getProductsByCategory($categoryId) {
    global $con;

    $products = array();

    // Lấy danh sách các sản phẩm từ cơ sở dữ liệu dựa trên danh mục
    $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE category_id = '$categoryId' ORDER BY sanpham_id DESC");

    while ($row_sanpham = mysqli_fetch_array($sql_product)) {
        // Tạo một mảng chứa thông tin của mỗi sản phẩm
        $product = array(
            'id' => $row_sanpham['sanpham_id'],
            'name' => $row_sanpham['sanpham_name'],
            'image' => $row_sanpham['sanpham_image'],
            'price' => $row_sanpham['sanpham_giakhuyenmai'],
            'old_price' => $row_sanpham['sanpham_gia']
        );

        $products[] = $product;
    }

    return $products;
}

// Hàm lấy danh sách sản phẩm bán chạy
function getBestSellingProducts() {
    global $con;

    $products = array();

    // Lấy danh sách các sản phẩm bán chạy từ cơ sở dữ liệu
    $sql_product_sidebar = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_hot='0' ORDER BY sanpham_id DESC");

    while ($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)) {
        // Tạo một mảng chứa thông tin của mỗi sản phẩm
        $product = array(
            'id' => $row_sanpham_sidebar['sanpham_id'],
            'name' => $row_sanpham_sidebar['sanpham_name'],
            'image' => $row_sanpham_sidebar['sanpham_image'],
            'price' => $row_sanpham_sidebar['sanpham_giakhuyenmai'],
            'old_price' => $row_sanpham_sidebar['sanpham_gia']
        );

        $products[] = $product;
    }

    return $products;
}
// Gọi các hàm để lấy dữ liệu
$categories = getCategoriess($con);
$bestSellingProducts = getBestSellingProducts();

// Hiển thị giao diện
?>
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- Tiêu đề -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Danh mục sản phẩm</h3>

        <div class="row">
            <!-- Phần hiển thị danh mục sản phẩm -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <?php foreach ($categories as $category) { ?>
                        <!-- Phần danh mục sản phẩm -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5 py-3 mb-4">
                            <h3 class="heading-tittle text-center font-italic"><?php echo $category['name']; ?></h3>
                            <div class="row">
                                <?php
                                // Lấy danh sách sản phẩm theo danh mục
                                $products = getProductsByCategory($category['id']);

                                foreach ($products as $product) { ?>
                                    <div class="col-md-4 product-men mt-5">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item text-center">
                                                <img src="images/<?php echo $product['image']; ?>" alt="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="?quanly=chitietsp&id=<?php echo $product['id']; ?>" class="link-product-add-cart">Xem sản phẩm</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info-product text-center border-top mt-4">
                                                <h4 class="pt-1">
                                                    <a href="?quanly=chitietsp&id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                                </h4>
                                                <div class="info-product-price my-2">
                                                    <span class="item_price"><?php echo number_format($product['price']) . 'vnđ'; ?></span>
                                                    <del><?php echo number_format($product['old_price']) . 'vnđ'; ?></del>
                                                </div>
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                    <form action="?quanly=giohang" method="post">
                                                        <fieldset>
                                                            <input type="hidden" name="tensanpham" value="<?php echo $product['name']; ?>" />
                                                            <input type="hidden" name="sanpham_id" value="<?php echo $product['id']; ?>" />
                                                            <input type="hidden" name="giasanpham" value="<?php echo $product['price']; ?>" />
                                                            <input type="hidden" name="hinhanh" value="<?php echo $product['image']; ?>" />
                                                            <input type="hidden" name="soluong" value="1" />
                                                            <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

          <!-- Phần hiển thị sản phẩm bán chạy -->
<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
    <div class="side-bar p-sm-4 p-3">
        <div class="customer-rev border-bottom left-side py-2">
            <h3 class="agileits-sear-head mb-3">Khách hàng Review</h3>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- //reviews -->

        <!-- best seller -->
        <div class="f-grid py-2">
            <h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
            <div class="box-scroll">
                <div class="scroll">
                    <?php
                    $sql_product_sidebar = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_hot='0' ORDER BY sanpham_id DESC"); 
                    while($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)){
                    ?>
                    <div class="row">
                        <div class="col-lg-3 col-sm-2 col-3 left-mar">
                            <img src="images/<?php echo $row_sanpham_sidebar['sanpham_image'] ?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                            <a href=""><?php echo $row_sanpham_sidebar['sanpham_name'] ?></a>
                            <a href="" class="price-mar mt-2"><?php echo number_format($row_sanpham_sidebar['sanpham_giakhuyenmai']).'vnđ' ?></a>
                            <del><?php echo number_format($row_sanpham_sidebar['sanpham_gia']).'vnđ' ?></del>
                        </div>
                    </div>
                    <?php
                    } 
                    ?>
                </div>
            </div>
        </div>
        <!-- //best seller -->
    </div>
    <!-- //product right -->
</div>
