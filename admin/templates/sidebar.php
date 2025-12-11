<?php
// Lấy tên file hiện tại để active menu
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="admin-sidebar">
    <div class="sidebar-header">
        <a href="dashboard.php" class="sidebar-brand">Schedio</a>
    </div>

    <div class="sidebar-menu">
        <nav class="nav flex-column">
            <a href="dashboard.php" class="nav-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="bi bi-grid-fill"></i> Bảng điều khiển
            </a>
            <a href="orders.php" class="nav-link <?php echo $current_page == 'orders.php' ? 'active' : ''; ?>">
                <i class="bi bi-cart3"></i> Quản lý đơn hàng
            </a>

            <a href="#" class="nav-link">
                <i class="bi bi-calendar-week"></i> Lịch đăng bài
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-box-seam"></i> Quản lý gói dịch vụ
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-people"></i> Quản lý người dùng
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-bar-chart-line"></i> Báo cáo thống kê
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-gear"></i> Cài đặt hệ thống
            </a>
        </nav>
    </div>

    <div class="p-3 border-top">
        <a href="../logout.php" class="nav-link text-danger">
            <i class="bi bi-box-arrow-right"></i> Đăng xuất
        </a>
    </div>
</div>