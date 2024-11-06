<?php

function displaySlider($con) {
    $output = '';

    $sql_slider = mysqli_query($con, "SELECT * FROM tbl_slider WHERE slider_active='1' ORDER BY slider_id");

    while($row_slider = mysqli_fetch_array($sql_slider)) {
        $output .= '
        <div class="carousel-item item1 active">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>' . $row_slider['slider_caption'] . '</p>
                    </div>
                </div>
            </div>
        </div>';
    }

    return $output;
}

function displaySliderIndicators() {
    $output = '';

    $output .= '
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>';

    return $output;
}

// Hàm hiển thị các nút điều khiển của carousel
function displaySliderControls() {
    $output = '';

    $output .= '
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>';

    return $output;
}

?>

<!-- banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php echo displaySliderIndicators(); ?>
    <div class="carousel-inner">
        <?php echo displaySlider($con); ?>
    </div>
    <?php echo displaySliderControls(); ?>
</div>
<!-- //banner -->