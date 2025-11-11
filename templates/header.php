<?php
// Bắt đầu session để kiểm tra đăng nhập
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy tên file hiện tại để active menu
$current_page = basename($_SERVER['SCRIPT_NAME']);

// ĐƯỜNG DẪN GỐC CỦA DỰ ÁN (Quan trọng để link không bị lỗi khi vào thư mục con)
// Nếu bạn đổi tên thư mục dự án, hãy đổi dòng này: '/tên-thư-mục-của-bạn'
$base_url = '/booking-website';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedio - Dịch vụ Booking Bài đăng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/style.css">
</head>

<body class="schedio-light-bg">

    <header class="py-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container">
                <a class="navbar-brand fw-bold" href="<?php echo $base_url; ?>/index.php">Schedio</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="main-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>"
                                href="<?php echo $base_url; ?>/index.php">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>"
                                href="<?php echo $base_url; ?>/about.php">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>"
                                href="<?php echo $base_url; ?>/services.php">BẢNG GIÁ</a>
                        </li>

                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'customer'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-primary fw-bold <?php echo ($current_page == 'booking.php') ? 'active' : ''; ?>"
                                href="<?php echo $base_url; ?>/customer/booking.php">
                                <i class="bi bi-calendar-plus me-1"></i> ĐẶT HÀNG & LÊN LỊCH
                            </a>
                        </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>"
                                href="<?php echo $base_url; ?>/contact.php">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>

                <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?php echo $base_url; ?>/customer/profile.php" class="btn btn-outline-dark btn-circle"
                    title="Tài khoản của tôi">
                    <i class="bi bi-person-check-fill"></i>
                </a>
                <?php else: ?>
                <a href="<?php echo $base_url; ?>/login.php" class="btn btn-outline-dark btn-circle" title="Đăng nhập">
                    <i class="bi bi-person"></i>
                </a>
                <?php endif; ?>

            </div>
        </nav>
    </header>

    <main>