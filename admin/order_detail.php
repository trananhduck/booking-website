<?php
session_start();
// require_once '../config/db.php'; // Bỏ comment khi nối DB

// Kiểm tra quyền Admin (Demo)
// if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

// DỮ LIỆU MẪU (MOCK DATA) - Mô phỏng đơn hàng lấy từ DB
$order = [
    'id' => 'SCD-001',
    'customer_name' => 'Chloe',
    'customer_email' => 'chloe@gmail.com',
    'package_name' => 'GÓI 3',
    'platform_name' => 'Page Grab Fan Tháng 9',
    'created_at' => '09/11/2025 10:30',
    'schedule_time' => '12/11/2025 20:00',
    'price' => '420.000 đ',
    'status' => 'pending', // Các trạng thái: pending, design_review, waiting_payment, paid, completed, cancelled
    'content_title' => 'MV Em Của Ngày Hôm Qua',
    'drive_link' => 'https://drive.google.com/drive/u/0/folders/example',
    'product_link' => 'https://youtube.com/watch?v=example',
    'note' => 'Vui lòng chọn tông màu đen đỏ chủ đạo.',
    // Dữ liệu Admin đã nhập (để trống nếu chưa có)
    'admin_demo_img' => '',
    'admin_message' => '',
    'result_links' => ''
];

// Xử lý form cập nhật trạng thái (Demo)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Logic cập nhật DB sẽ nằm ở đây
    // $new_status = $_POST['status'];
    // ...
    echo "<script>alert('Cập nhật thành công!');</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chi tiết đơn hàng #<?php echo $order['id']; ?> - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/admin-style.css">
</head>

<body>

    <div class="admin-wrapper">

        <?php include 'templates/sidebar.php'; ?>

        <div class="admin-content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <a href="orders.php" class="text-decoration-none text-muted small"><i class="bi bi-arrow-left"></i>
                        Quay lại</a>
                    <h2 class="text-primary fw-bold mb-0 mt-1">Chi tiết đơn hàng #<?php echo $order['id']; ?></h2>
                </div>

                <div>
                    <span class="badge bg-warning text-dark fs-6 px-3 py-2 rounded-pill">Chờ xử lý</span>
                </div>
            </div>

            <div class="row g-4">

                <div class="col-lg-8">

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white fw-bold py-3">Thông tin yêu cầu</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4 text-muted">Khách hàng:</div>
                                <div class="col-md-8 fw-bold"><?php echo $order['customer_name']; ?> <small
                                        class="fw-normal text-muted">(<?php echo $order['customer_email']; ?>)</small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 text-muted">Tiêu đề nội dung:</div>
                                <div class="col-md-8"><?php echo $order['content_title']; ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 text-muted">Link Drive (Source):</div>
                                <div class="col-md-8">
                                    <a href="<?php echo $order['drive_link']; ?>" target="_blank"
                                        class="text-break"><?php echo $order['drive_link']; ?></a>
                                    <button class="btn btn-sm btn-light border ms-2" title="Copy"><i
                                            class="bi bi-copy"></i></button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 text-muted">Link Sản phẩm:</div>
                                <div class="col-md-8">
                                    <a href="<?php echo $order['product_link']; ?>" target="_blank"
                                        class="text-break"><?php echo $order['product_link']; ?></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-muted">Ghi chú của khách:</div>
                                <div class="col-md-8 fst-italic text-danger"><?php echo $order['note']; ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white fw-bold py-3">
                            <i class="bi bi-tools me-2"></i> Xử lý đơn hàng
                        </div>
                        <div class="card-body p-4">

                            <form method="POST">
                                <div class="mb-4 pb-4 border-bottom">
                                    <label class="form-label fw-bold">1. Cập nhật bản thiết kế (Demo)</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">Link ảnh/video</span>
                                        <input type="text" class="form-control" name="admin_demo_img"
                                            placeholder="Dán link ảnh demo vào đây...">
                                    </div>
                                    <textarea class="form-control" name="admin_message" rows="2"
                                        placeholder="Lời nhắn cho khách hàng (VD: Đã xong demo, bạn check nhé...)"></textarea>
                                    <button type="submit" name="action" value="send_demo"
                                        class="btn btn-sm btn-info text-white mt-2">
                                        <i class="bi bi-send"></i> Gửi Demo cho khách duyệt
                                    </button>
                                </div>

                                <div class="mb-4 pb-4 border-bottom">
                                    <label class="form-label fw-bold">2. Trạng thái thanh toán</label>
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="badge bg-secondary">Chưa thanh toán</span>
                                        <button type="submit" name="action" value="confirm_payment"
                                            class="btn btn-sm btn-success">
                                            <i class="bi bi-check-circle"></i> Xác nhận đã nhận tiền thủ công
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label fw-bold">3. Hoàn tất & Trả link bài đăng</label>
                                    <textarea class="form-control mb-2" name="result_links" rows="3"
                                        placeholder="Dán link bài viết Facebook/TikTok đã đăng vào đây..."></textarea>
                                    <button type="submit" name="action" value="complete_order"
                                        class="btn btn-primary w-100">
                                        <i class="bi bi-check2-all"></i> Cập nhật Hoàn thành đơn hàng
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white fw-bold py-3">Gói dịch vụ</div>
                        <div class="card-body">
                            <h4 class="text-primary fw-bold mb-1"><?php echo $order['package_name']; ?></h4>
                            <p class="text-muted small mb-3"><?php echo $order['platform_name']; ?></p>

                            <ul class="list-group list-group-flush mb-3 small">
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>Ngày đăng ký:</span>
                                    <span class="fw-bold"><?php echo $order['created_at']; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>Lịch đăng bài:</span>
                                    <span class="fw-bold text-danger"><?php echo $order['schedule_time']; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>Tổng tiền:</span>
                                    <span class="fw-bold text-primary fs-5"><?php echo $order['price']; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Hủy đơn hàng này</button>
                        <button class="btn btn-outline-secondary"><i class="bi bi-printer"></i> In phiếu</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>