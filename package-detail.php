<?php
// 1. Nạp file dữ liệu
require_once 'data/packages-data.php';

// 2. Lấy ID gói từ URL (ví dụ: ?id=goi-3)
$package_id = isset($_GET['id']) ? $_GET['id'] : '';

// 3. Kiểm tra xem ID có tồn tại trong dữ liệu không
if (!isset($ALL_PACKAGES[$package_id])) {
    // Nếu không tìm thấy, báo lỗi và dừng
    include 'templates/header.php';
    echo '<div class="container my-5"><div class="alert alert-danger">Lỗi: Gói dịch vụ không tồn tại.</div></div>';
    include 'templates/footer.php';
    exit;
}

// 4. Lấy dữ liệu của gói này
$package = $ALL_PACKAGES[$package_id];
$packageName = $package['name'];

// 5. Nạp header
include 'templates/header.php';
?>

<div class="container my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="services.php">Bảng giá</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $packageName; ?></li>
        </ol>
    </nav>
</div>

<div class="container">
    <h1 class="display-4 fw-bold mb-4 package-title"><?php echo htmlspecialchars($package['title']); ?></h1>
</div>

<div class="container">
    <div class="overview-box p-4 p-md-5 rounded">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h3 class="fw-bold text-dark-blue">Tổng quan</h3>
                <p class="text-muted">
                    <?php echo htmlspecialchars($package['overview']); ?>
                </p>
            </div>
            <div class="col-lg-5">
                <ul class="list-unstyled checklist">
                    <?php foreach ($package['features'] as $feature): ?>
                    <li>
                        <i class="bi bi-check-lg text-primary"></i>
                        <span><?php echo htmlspecialchars($feature); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 py-4">
    <h2 class="text-center fw-bold mb-5">Một số dự án đã thực hiện</h2>
    <div class="row g-4">

        <?php foreach ($package['portfolio'] as $project): ?>
        <div class="col-md-4">
            <div class="card portfolio-card h-100">
                <img src="<?php echo htmlspecialchars($project['img']); ?>" class="card-img-top"
                    alt="<?php echo htmlspecialchars($project['title']); ?>">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><?php echo htmlspecialchars($project['title']); ?></h5>
                    <p class="card-text text-muted"><?php echo htmlspecialchars($project['desc']); ?></p>
                </div>
                <div class="card-footer bg-transparent border-0 pb-3">
                    <?php if ($project['type'] == 'pdf'): ?>
                    <a href="<?php echo htmlspecialchars($project['link']); ?>" class="btn btn-outline-dark w-100"
                        target="_blank">Xem báo cáo (PDF)</a>
                    <?php else: ?>
                    <a href="<?php echo htmlspecialchars($project['link']); ?>" class="btn btn-schedio-primary w-100"
                        target="_blank">Xem bài đăng</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<div class="container my-5">
    <h2 class="text-center fw-bold mb-5">Thông tin về giá</h2>
    <div class="row justify-content-center g-4">

        <?php foreach ($package['prices'] as $price): ?>
        <div class="col-md-4">
            <div class="card h-100 p-4 schedio-card text-center">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="fw-bold text-uppercase"><?php echo htmlspecialchars($price['platform']); ?></h5>
                    <h2 class="price-display my-4"><?php echo htmlspecialchars($price['price']); ?></h2>

                    <!-- 
                    *** THAY ĐỔI DÒNG NÀY ***
                    Nó sẽ tạo link đến trang booking với ID gói và Tên kênh
                    -->
                    <a href="customer/booking.php?package_id=<?php echo urlencode($package_id); ?>&platform=<?php echo urlencode($price['platform']); ?>"
                        class="btn btn-warning schedio-btn-yellow">
                        Đăng ký gói này
                    </a>

                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<?php
// Nạp footer
include 'templates/footer.php';
?>