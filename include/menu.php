<?php

function getCategories($con) {
    $sql_category = mysqli_query($con, 'SELECT * FROM tbl_category ORDER BY category_id DESC');
    $categories = array();
    
    // Lấy danh sách các danh mục từ cơ sở dữ liệu và lưu vào mảng $categories
    while ($row_category = mysqli_fetch_array($sql_category)) {
        $categories[] = $row_category;
    }

    return $categories;
}

function renderCategoryOptions($categories) {
    $options = '';

    foreach ($categories as $category) {
        $options .= '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
    }

    return $options;
}

function renderCategoryLinks($categories) {
    $links = '';

    foreach ($categories as $category) {
        $links .= '<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="?quanly=danhmuc&id=' . $category['category_id'] . '" role="button" aria-haspopup="true" aria-expanded="false">
                            ' . $category['category_name'] . '
                        </a>
                    </li>';
    }

    return $links;
}

// Hàm lấy danh sách các danh mục tin tức
function getNewsCategories($con) {
    $sql_danhmuctin = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");
    $newsCategories = array();

    while ($row_danhmuctin = mysqli_fetch_array($sql_danhmuctin)) {
        $newsCategories[] = $row_danhmuctin;
    }

    return $newsCategories;
}

// Hàm tạo các liên kết danh mục tin tức
function renderNewsCategoryLinks($newsCategories) {
    $links = '';

    foreach ($newsCategories as $newsCategory) {
        $links .= '<a class="dropdown-item" href="?quanly=tintuc&id_tin=' . $newsCategory['danhmuctin_id'] . '">' . $newsCategory['tendanhmuc'] . '</a>';
    }

    return $links;
}

?>

<div class="navbar-inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="agileits-navi_search">
                <form action="#" method="post">
                    <select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="" onchange="navigateToCategory(this)">
                        <option value="">Danh mục sản phẩm</option>
                        <?php echo renderCategoryOptions(getCategories($con)); ?>
                    </select>
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center mr-xl-5">
                    <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <?php echo renderCategoryLinks(getCategories($con)); ?>
                    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                        <?php $newsCategories = getNewsCategories($con); ?>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tin tức
                        </a>
                        <div class="dropdown-menu">
                            <?php echo renderNewsCategoryLinks($newsCategories); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<script>
    function navigateToCategory(selectElement) {
        var categoryId = selectElement.value;
        if (categoryId !== "") {
            window.location.href = "?quanly=danhmuc&id=" + categoryId;
        }
    }
</script>