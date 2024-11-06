<?php
function generateFooter() {
    $footer = '
    <!-- footer -->
    <footer>
        <div class="footer-top-first">
            <div class="container py-md-5 py-sm-4 py-3">
                <!-- footer first section -->
                <h2 class="footer-top-head-w3l font-weight-bold mb-2">Giới thiệu về chúng tôi</h2>
                <p class="footer-main mb-4">
                    Chúng tôi rất vui được giúp bạn trong việc mua một chiếc sản phẩm mới.
                    Electronic Store là nền tảng mua sắm trực tuyến hàng đầu, chúng tôi cung cấp giá tốt nhất trên thị trường 
                    cho máy tính xách tay, điện thoại di động, máy ảnh và nhiều sản phẩm công nghệ khác. 
                    Bạn có thể tìm thấy một loạt các thương hiệu và mẫu mã phong phú, đảm bảo rằng bạn sẽ tìm được 
                    sản phẩm phù hợp với nhu cầu và ngân sách của mình. Với khả năng giao hàng toàn quốc và chính sách bảo vệ người mua,
                    bạn có thể mua sắm với sự tự tin và an tâm.
                </p>
                <!-- //footer first section -->

                <!-- footer second section -->
                <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-dolly"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Miễn phí vận chuyển</h3>
                                <p>Đơn hàng trên 1tr</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer my-md-0 my-4">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Vận chuyển nhanh</h3>
                                <p>Toàn quốc</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="far fa-thumbs-up"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Tin cậy</h3>
                                <p>Sự đảm bảo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //footer second section -->
            </div>
        </div>
        
        <!-- //footer third section -->
        
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    
    <!-- //copyright -->';

    return $footer;
}

// Sử dụng hàm để in phần footer
echo generateFooter();
?>