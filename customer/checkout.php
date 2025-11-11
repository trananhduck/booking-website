<?php
// customer/checkout.php
include '../templates/header.php';

// Dữ liệu mẫu (Trong thực tế sẽ lấy từ Session/Database)
$booking_data = [
    'package_name' => 'GÓI 3',
    'customer_name' => 'Chloe',
    'customer_email' => 'Chloe@gmail.com',
    'customer_phone' => '+0909090000000',
    'booking_date' => '11/6/2025',
    'booking_time' => '9:00 am',
    'platform' => 'Grab Fan Tháng 9',
    'price' => '450.000 đ',
    'extra_fee' => '0 đ',
    'total' => '450.000 đ'
];
?>

<div class="container my-5">
    <h1 class="display-5 fw-bold text-dark-blue mb-5">Thanh toán</h1>

    <div class="row g-4">

        <div class="col-lg-6">

            <div class="card border-0 schedio-card-bg p-4 mb-4">
                <h5 class="fw-bold text-dark-blue mb-4">Thông tin người đặt</h5>

                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold">Tên:</span>
                    <span><?php echo $booking_data['customer_name']; ?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold">Email:</span>
                    <span><?php echo $booking_data['customer_email']; ?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold">Số điện thoại:</span>
                    <span><?php echo $booking_data['customer_phone']; ?></span>
                </div>

                <div class="text-end mt-2">
                    <a href="#" class="text-primary small fw-bold text-decoration-none">Chỉnh sửa</a>
                </div>
            </div>

            <div class="card border-0 schedio-card-bg p-4">
                <h5 class="fw-bold text-dark-blue mb-4">Phương thức thanh toán</h5>

                <div class="text-center">
                    <div class="bg-secondary bg-opacity-25 mx-auto mb-3" style="width: 150px; height: 150px;"></div>

                    <p class="text-primary fw-bold small mb-1">Scan to pay</p>
                    <p class="fw-bold text-dark-blue"><?php echo $booking_data['total']; ?></p>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="card border-0 schedio-card-bg p-4 h-100">
                <h5 class="fw-bold text-dark-blue mb-3">Thông tin đơn hàng</h5>
                <p class="text-primary fw-bold mb-4"><?php echo $booking_data['package_name']; ?></p>

                <div class="bg-light-gray p-3 rounded mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-bold small">Date:</span>
                        <span class="small"><?php echo $booking_data['booking_date']; ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-bold small">Time:</span>
                        <span class="small"><?php echo $booking_data['booking_time']; ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold small">Fanpage:</span>
                        <span class="small"><?php echo $booking_data['platform']; ?></span>
                    </div>
                </div>

                <hr class="my-4 text-muted">

                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold text-dark-blue">Giá gói:</span>
                    <span class="fw-bold text-dark-blue"><?php echo $booking_data['price']; ?></span>
                </div>

                <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                    <span class="fw-bold text-dark-blue">Phí thêm:</span>
                    <span class="fw-bold text-dark-blue"><?php echo $booking_data['extra_fee']; ?></span>
                </div>

                <div class="d-flex justify-content-between mb-5">
                    <span class="fw-bold text-dark-blue">Tổng:</span>
                    <span class="fw-bold text-dark-blue"><?php echo $booking_data['total']; ?></span>
                </div>

                <button class="btn btn-schedio-primary w-100 py-2">Thanh toán</button>

            </div>
        </div>

    </div>
</div>

<?php include '../templates/footer.php'; ?>