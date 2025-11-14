<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng - Schedio Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/admin-style.css">
</head>

<body>

    <div class="admin-wrapper">

        <?php include 'templates/sidebar.php'; ?>

        <div class="admin-content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary fw-bold mb-0">Quản lý đơn hàng</h2>
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-circle fs-2 text-primary"></i>
                </div>
            </div>

            <div class="filter-card">
                <div class="mb-3">
                    <input type="text" class="form-control form-control-search"
                        placeholder="Tìm theo mã đơn, khách hàng...">
                </div>

                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="filter-label">Trạng thái:</label>
                        <select class="form-select form-select-filter">
                            <option>Tất cả trạng thái</option>
                            <option>Chờ xử lý</option>
                            <option>Đang thực hiện</option>
                            <option>Hoàn thành</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="filter-label">Ngày:</label>
                        <input type="date" class="form-control form-select-filter">
                    </div>
                    <div class="col-md-3">
                        <label class="filter-label">Kênh truyền thông:</label>
                        <select class="form-select form-select-filter">
                            <option>Tất cả</option>
                            <option>Grab Fan Tháng 9</option>
                            <option>Rap Fan Thám Thính</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="filter-label">Gói:</label>
                        <select class="form-select form-select-filter">
                            <option>Tất cả</option>
                            <option>Gói 1</option>
                            <option>Gói 3</option>
                        </select>
                    </div>

                    <div class="col-12 text-end mt-3">
                        <button class="btn btn-filter px-4">Lọc</button>
                        <button class="btn btn-reset">Xóa lọc</button>
                    </div>
                </div>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-custom mb-0 align-middle">
                        <thead>
                            <tr>
                                <th style="width: 40px;"><input type="checkbox" class="form-check-input"></th>
                                <th>Mã đơn</th>
                                <th>Khách hàng</th>
                                <th>Gói dịch vụ</th>
                                <th>Ngày đăng ký</th>
                                <th>Lịch đăng</th>
                                <th>Kênh truyền thông</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td class="fw-bold text-dark">SCD-001</td>
                                <td>Chloe</td>
                                <td>GÓI 3</td>
                                <td>09/11/2025</td>
                                <td>12/11/2025</td>
                                <td>Grab Fan Tháng 9</td>
                                <td><span class="status-badge status-warning">Chờ xử lý</span></td>
                                <td class="text-center">
                                    <a href="order_detail.php?id=1" class="btn-view"><i class="bi bi-file-text"></i>
                                        Xem</a>
                                </td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td class="fw-bold text-dark">SCD-002</td>
                                <td>Alex</td>
                                <td>GÓI 3</td>
                                <td>11/11/2025</td>
                                <td>14/11/2025</td>
                                <td>Rap Fan Thám Thính</td>
                                <td><span class="status-badge status-warning">Chờ xử lý</span></td>
                                <td class="text-center">
                                    <a href="order_detail.php?id=2" class="btn-view"><i class="bi bi-file-text"></i>
                                        Xem</a>
                                </td>
                            </tr>

                            <tr>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td class="fw-bold text-dark">SCD-003</td>
                                <td>Tom</td>
                                <td>GÓI 1</td>
                                <td>09/05/2025</td>
                                <td>11/05/2025</td>
                                <td>Rap Fan Thám Thính</td>
                                <td><span class="status-badge status-warning">Chờ xử lý</span></td>
                                <td class="text-center">
                                    <a href="order_detail.php?id=3" class="btn-view"><i class="bi bi-file-text"></i>
                                        Xem</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="p-3 d-flex justify-content-end align-items-center">
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>