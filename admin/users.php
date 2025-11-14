<?php
session_start();
// require_once '../config/db.php'; // Tạm tắt DB
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng - Schedio Admin</title>
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
                <div>
                    <h2 class="text-primary fw-bold mb-0">Quản lý Người dùng</h2>
                    <p class="text-muted small mb-0">Quản lý tài khoản Khách hàng và Nhân viên</p>
                </div>
                <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addStaffModal">
                    <i class="bi bi-person-plus-fill me-2"></i> Thêm nhân viên
                </button>
            </div>

            <div class="filter-card">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="filter-label">Tìm kiếm</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control form-control-search border-start-0"
                                placeholder="Tên, Email hoặc SĐT...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="filter-label">Vai trò</label>
                        <select class="form-select form-select-filter">
                            <option value="">Tất cả</option>
                            <option value="customer">Khách hàng</option>
                            <option value="staff">Nhân viên</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="filter-label">Trạng thái</label>
                        <select class="form-select form-select-filter">
                            <option value="">Tất cả</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Đã khóa</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-primary w-100 fw-bold">Lọc</button>
                    </div>
                </div>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-custom mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4" style="width: 250px;">Họ và Tên</th>
                                <th>Vai trò</th>
                                <th>Liên hệ</th>
                                <th>Ngày tham gia</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-end pe-4">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Admin&background=191970&color=fff"
                                            class="rounded-circle me-3" width="40" height="40">
                                        <div>
                                            <div class="fw-bold text-dark">Administrator</div>
                                            <small class="text-muted">admin@schedio.vn</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-dark text-white border border-dark">Quản trị viên</span></td>
                                <td><small>0912345678</small></td>
                                <td>01/01/2024</td>
                                <td class="text-center"><span
                                        class="badge bg-success bg-opacity-10 text-success px-3">Hoạt động</span></td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-light text-muted" disabled><i
                                            class="bi bi-lock"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Le+Staff&background=0d6efd&color=fff"
                                            class="rounded-circle me-3" width="40" height="40">
                                        <div>
                                            <div class="fw-bold text-dark">Lê Văn Staff</div>
                                            <small class="text-muted">staff1@schedio.vn</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary bg-opacity-10 text-primary">Nhân viên</span></td>
                                <td><small>0987654321</small></td>
                                <td>10/05/2025</td>
                                <td class="text-center"><span
                                        class="badge bg-success bg-opacity-10 text-success px-3">Hoạt động</span></td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light border" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots-vertical"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Sửa
                                                    thông tin</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"
                                                    onclick="confirmLock(2, 'Le Staff')"><i
                                                        class="bi bi-lock me-2"></i>Khóa tài khoản</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Nguyen+A&background=random"
                                            class="rounded-circle me-3" width="40" height="40">
                                        <div>
                                            <div class="fw-bold text-dark">Nguyễn Văn Khách</div>
                                            <small class="text-muted">nguyenvana@gmail.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border">Khách hàng</span></td>
                                <td><small>0345678910</small></td>
                                <td>12/11/2025</td>
                                <td class="text-center"><span
                                        class="badge bg-success bg-opacity-10 text-success px-3">Hoạt động</span></td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light border" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots-vertical"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="orders.php?user_id=3"><i
                                                        class="bi bi-cart me-2"></i>Xem đơn hàng</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-danger" href="#"
                                                    onclick="confirmLock(3, 'Nguyễn Văn Khách')"><i
                                                        class="bi bi-lock me-2"></i>Khóa tài khoản</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="table-light text-muted">
                                <td class="ps-4">
                                    <div class="d-flex align-items-center opacity-75">
                                        <img src="https://ui-avatars.com/api/?name=Tran+Spam&background=666&color=fff"
                                            class="rounded-circle me-3 grayscale" width="40" height="40">
                                        <div>
                                            <div class="fw-bold">Trần Spam</div>
                                            <small>spam@gmail.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-muted border">Khách hàng</span></td>
                                <td><small>--</small></td>
                                <td>01/11/2025</td>
                                <td class="text-center"><span class="badge bg-danger bg-opacity-10 text-danger px-3">Đã
                                        khóa</span></td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-outline-success"
                                        onclick="alert('Mở khóa thành công!')"><i
                                            class="bi bi-unlock-fill"></i></button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="p-3 border-top d-flex justify-content-between align-items-center">
                    <small class="text-muted">Hiển thị 4 / 150 tài khoản</small>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="addStaffModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold">Thêm Nhân viên mới</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="addStaffForm">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Họ và Tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập họ tên nhân viên" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email đăng nhập <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="staff@schedio.vn" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" placeholder="Tối thiểu 6 ký tự" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="09xxxx">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Quyền hạn</label>
                            <select class="form-select bg-light" disabled>
                                <option selected>Staff (Nhân viên)</option>
                            </select>
                            <div class="form-text small">Nhân viên có quyền truy cập Dashboard và xử lý Đơn hàng.</div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary py-2">Tạo tài khoản</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function confirmLock(id, name) {
        if (confirm(
                `Bạn có chắc chắn muốn KHÓA tài khoản của "${name}" không?\nHọ sẽ không thể đăng nhập vào hệ thống.`)) {
            // Gọi AJAX cập nhật DB
            alert(`Đã khóa tài khoản ${name} thành công!`);
            // location.reload();
        }
    }

    // Demo submit form thêm nhân viên
    document.getElementById('addStaffForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Đã tạo tài khoản Nhân viên mới thành công!');
        var myModal = bootstrap.Modal.getInstance(document.getElementById('addStaffModal'));
        myModal.hide();
    });
    </script>

</body>

</html>