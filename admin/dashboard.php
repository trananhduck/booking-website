<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Schedio Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/admin-style.css">
</head>

<body>

    <div class="admin-wrapper">

        <?php include 'templates/sidebar.php'; ?>

        <div class="admin-content">

            <div class="d-flex justify-content-between align-items-center mb-5">
                <div></div>
                <div class="d-flex align-items-center">
                    <div class="me-3 text-end">
                        <div class="fw-bold">Admin User</div>
                        <div class="small text-muted">Quản trị viên</div>
                    </div>
                    <i class="bi bi-person-circle fs-1 text-primary"></i>
                </div>
            </div>

            <h2 class="fw-bold text-dark mb-4">Bảng điều khiển</h2>

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="stat-card">
                        <p class="stat-title">Tổng đơn hàng trong tuần</p>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="stat-value">10</div>
                            <span class="trend-badge trend-up">↗ 12.5%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <p class="stat-title">Bài đăng đang chờ xử lý</p>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="stat-value">5</div>
                            <span class="trend-badge trend-down">↘ 3.5%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <p class="stat-title">Bài đăng đã hoàn thành</p>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="stat-value">20</div>
                            <span class="trend-badge trend-up">↗ 10%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-card mb-5">
                <div class="card-header-custom">
                    <h5 class="fw-bold text-dark-blue mb-0">Đơn hàng mới</h5>
                    <a href="#" class="text-decoration-none small fst-italic">Xem tất cả</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Mã đơn</th>
                                <th>Khách hàng</th>
                                <th>Gói dịch vụ</th>
                                <th>Ngày đăng ký</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">SCD-001</td>
                                <td>Chloe</td>
                                <td>GÓI 3</td>
                                <td>11/05/2025</td>
                                <td><span class="status-badge status-warning">Chờ xử lý</span></td>
                                <td><a href="#" class="btn-view"><i class="bi bi-file-text"></i> Xem</a></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">SCD-002</td>
                                <td>Alex</td>
                                <td>GÓI 3</td>
                                <td>11/05/2025</td>
                                <td><span class="status-badge status-warning">Chờ xử lý</span></td>
                                <td><a href="#" class="btn-view"><i class="bi bi-file-text"></i> Xem</a></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">SCD-003</td>
                                <td>Tom</td>
                                <td>GÓI 1</td>
                                <td>11/05/2025</td>
                                <td><span class="status-badge status-warning">Chờ xử lý</span></td>
                                <td><a href="#" class="btn-view"><i class="bi bi-file-text"></i> Xem</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-3 d-flex justify-content-end gap-2">
                    <button class="btn btn-sm btn-light border" disabled>Previous</button>
                    <button class="btn btn-sm btn-primary border"
                        style="background-color: var(--admin-primary);">1</button>
                    <button class="btn btn-sm btn-light border">2</button>
                    <button class="btn btn-sm btn-light border">Next</button>
                </div>
            </div>

            <div class="table-card">
                <div class="card-header-custom">
                    <h5 class="fw-bold text-dark-blue mb-0">Lịch đăng bài hôm nay - 09/11/2025</h5>
                    <a href="#" class="text-decoration-none small fst-italic">Xem tất cả</a>
                </div>
                <div class="p-4">
                    <div class="schedule-item">
                        <div class="d-flex align-items-center">
                            <div class="me-4 fw-bold text-primary">9:00 AM</div>
                            <div class="border-start border-2 border-secondary ps-3 ms-2">
                                <div class="fw-bold">Bài đăng truyền cảm hứng buổi sáng</div>
                                <small class="text-muted">Page Grab Fan Tháng 9</small>
                            </div>
                        </div>
                        <span class="badge bg-white text-primary border border-primary rounded-pill">Facebook</span>
                    </div>

                    <div class="schedule-item mt-3">
                        <div class="d-flex align-items-center">
                            <div class="me-4 fw-bold text-primary">12:00 PM</div>
                            <div class="border-start border-2 border-secondary ps-3">
                                <div class="fw-bold">Bài đăng truyền cảm hứng buổi chiều</div>
                                <small class="text-muted">Page Grab Fan Tháng 9</small>
                            </div>
                        </div>
                        <span class="badge bg-white text-primary border border-primary rounded-pill">Facebook</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>