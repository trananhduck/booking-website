<?php
// customer/order_detail.php
include '../templates/header.php';

// Lấy ID đơn hàng từ URL
$order_id = isset($_GET['id']) ? $_GET['id'] : 'SCD-001';

// DỮ LIỆU GIẢ LẬP (MOCK DATA)
$order = [
    'id' => $order_id,
    'package_name' => 'Gói 3',
    'platform' => 'Grab fan tháng 9',
    'schedule' => '11/07/2025 - 09:00 AM',
    'price' => '240.000đ',
    'status' => 'Hoàn thành',
    
    // *** DỮ LIỆU KHÁCH ĐÃ NHẬP (MỚI CẬP NHẬT) ***
    'customer_input' => [
        'title' => 'MV Teaser - Chạy Ngay Đi',
        'drive_link' => 'https://drive.google.com/drive/folders/1A2B3C4D5E6F',
        'product_link' => 'https://www.youtube.com/watch?v=example'
    ],

    // Timeline trạng thái
    'timeline' => [
        ['status' => 'Đơn hàng đã tạo', 'time' => '11/07/2025 - 09:00 AM', 'active' => true],
        ['status' => 'Chờ xử lý', 'time' => '11/07/2025 - 09:00 AM', 'active' => true],
        ['status' => 'Đang thực hiện', 'time' => '', 'active' => false],
        ['status' => 'Hoàn thành', 'time' => '', 'active' => false]
    ],
    // Link bài đăng kết quả (Admin cập nhật)
    'admin_links' => [
        ['title' => 'Bài đăng Facebook (Poster)', 'url' => '#'],
        ['title' => 'Video Highlight TikTok', 'url' => '#']
    ]
];
?>

<div class="container my-5">
    
    <h1 class="display-5 fw-bold text-dark-blue mb-5">Chi tiết đơn hàng</h1>

    <div class="card border-0 schedio-card-bg p-4 mb-4">
        <h5 class="fw-bold text-dark-blue mb-4">Thông tin đơn hàng</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <small class="text-muted text-uppercase fw-bold d-block mb-1">Tên gói</small>
                    <span class="fw-bold"><?php echo $order['package_name']; ?></span>
                </div>
                <div class="mb-3">
                    <small class="text-muted text-uppercase fw-bold d-block mb-1">Lịch đăng</small>
                    <span class="fw-bold"><?php echo $order['schedule']; ?></span>
                </div>
                <div>
                    <small class="text-muted text-uppercase fw-bold d-block mb-1">Thành tiền</small>
                    <span class="fw-bold text-dark-blue"><?php echo $order['price']; ?></span>
                </div>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <div class="mb-3">
                    <small class="text-muted text-uppercase fw-bold d-block mb-1">Fanpage</small>
                    <span class="fw-bold"><?php echo $order['platform']; ?></span>
                </div>
                <div>
                    <small class="text-muted text-uppercase fw-bold d-block mb-1">Trạng thái</small>
                    <span class="badge bg-success-light text-success rounded-pill px-3 py-2 fw-normal">
                        <?php echo $order['status']; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 schedio-card-bg p-4 mb-4">
        <h5 class="fw-bold text-dark-blue mb-4">Drive đã tải lên</h5>
        
        <div class="mb-3">
            <small class="text-muted text-uppercase fw-bold d-block mb-1">Tiêu đề nội dung</small>
            <span class="fw-bold"><?php echo $order['customer_input']['title']; ?></span>
        </div>

        <div class="mb-3">
            <small class="text-muted text-uppercase fw-bold d-block mb-1">Link Drive (Source)</small>
            <a href="<?php echo $order['customer_input']['drive_link']; ?>" target="_blank" class="text-decoration-none fw-bold text-primary text-break">
                <i class="bi bi-google me-2"></i>
                <?php echo $order['customer_input']['drive_link']; ?>
            </a>
        </div>

        <div>
            <small class="text-muted text-uppercase fw-bold d-block mb-1">Link sản phẩm (Gốc)</small>
            <a href="<?php echo $order['customer_input']['product_link']; ?>" target="_blank" class="text-decoration-none fw-bold text-primary text-break">
                <i class="bi bi-link-45deg me-2"></i>
                <?php echo $order['customer_input']['product_link']; ?>
            </a>
        </div>
    </div>

    <div class="card border-0 schedio-card-bg p-4 mb-4">
        <h5 class="fw-bold text-dark-blue mb-4">Trạng thái đơn hàng</h5>
        <div class="timeline-wrapper">
            <?php foreach ($order['timeline'] as $step): ?>
            <div class="timeline-item <?php echo $step['active'] ? 'active' : ''; ?>">
                <div class="timeline-marker"></div>
                <div class="timeline-content row w-100">
                    <div class="col-md-4 fw-bold text-status">
                        <?php echo $step['status']; ?>
                    </div>
                    <div class="col-md-8 text-muted small text-end text-md-start">
                        <?php echo $step['time']; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (!empty($order['admin_links'])): ?>
    <div class="card border-0 schedio-card-bg p-4 mb-4">
        <h5 class="fw-bold text-dark-blue mb-4">🔗 Các link bài đăng (Kết quả)</h5>
        <div class="bg-white p-3 rounded border">
            <ul class="list-unstyled mb-0">
                <?php foreach ($order['admin_links'] as $link): ?>
                <li class="mb-2">
                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                    <span class="me-2"><?php echo $link['title']; ?>:</span>
                    <a href="<?php echo $link['url']; ?>" target="_blank" class="text-decoration-underline text-primary">
                        Xem bài viết ngay
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <div class="text-end mt-4">
        <button class="btn btn-outline-danger px-4 py-2" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
            Hủy đơn hàng
        </button>
    </div>

</div>

<?php include '../templates/footer.php'; ?>