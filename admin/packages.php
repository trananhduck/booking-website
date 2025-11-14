<?php
session_start();
// require_once '../config/db.php'; // Tạm tắt DB để demo giao diện
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Gói dịch vụ - Schedio Admin</title>
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
                <h2 class="text-primary fw-bold mb-0">Quản lý Gói dịch vụ</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#packageModal"
                    onclick="resetForm()">
                    <i class="bi bi-plus-lg me-1"></i> Thêm gói mới
                </button>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-custom mb-0 align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 15%">Tên gói</th>
                                <th style="width: 35%">Mô tả / Tính năng</th>
                                <th>Số slot</th>
                                <th>Giá tham khảo</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">1</td>
                                <td><span class="fw-bold text-primary">GÓI 1A</span><br><small
                                        class="text-muted">goi-1a</small></td>
                                <td>
                                    <div class="text-truncate-2">- 1 poster sản phẩm</div>
                                </td>
                                <td>1 bài</td>
                                <td>
                                    <small>Grab: <strong>180k</strong></small><br>
                                    <small>Rap Fan: <strong>140k</strong></small>
                                </td>
                                <td><span
                                        class="badge bg-success bg-opacity-10 text-success px-3 border border-success">Hiển
                                        thị</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editPackage(1)"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deletePackage(1)"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td class="fw-bold">5</td>
                                <td><span class="fw-bold text-primary">GÓI 3</span><br><small
                                        class="text-muted">goi-3</small></td>
                                <td>
                                    <div class="text-truncate-2">
                                        - 1 poster sản phẩm<br>
                                        - 1 post trích lyrics highlight<br>
                                        - 1 video highlight
                                    </div>
                                </td>
                                <td>3 bài</td>
                                <td>
                                    <small>Grab: <strong>420k</strong></small><br>
                                    <small>Rap Fan: <strong>300k</strong></small>
                                </td>
                                <td><span
                                        class="badge bg-success bg-opacity-10 text-success px-3 border border-success">Hiển
                                        thị</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editPackage(5)"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deletePackage(5)"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>

                            <tr>
                                <td class="fw-bold">99</td>
                                <td><span class="fw-bold text-muted">GÓI TEST</span><br><small
                                        class="text-muted">goi-test</small></td>
                                <td>
                                    <div class="text-truncate-2">Gói thử nghiệm tính năng mới.</div>
                                </td>
                                <td>1 bài</td>
                                <td><small>Grab: <strong>100k</strong></small></td>
                                <td><span
                                        class="badge bg-secondary bg-opacity-10 text-secondary px-3 border border-secondary">Đang
                                        ẩn</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editPackage(99)"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deletePackage(99)"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="packageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="modalTitle">Thêm gói dịch vụ mới</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="packageForm">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tên gói <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pkgName" placeholder="VD: Gói 1A">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Slug (URL) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pkgSlug" placeholder="VD: goi-1a">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Số slot đăng bài</label>
                                    <input type="number" class="form-control" id="pkgSlots" value="1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Trạng thái</label>
                                    <select class="form-select" id="pkgStatus">
                                        <option value="1">Hiển thị (Active)</option>
                                        <option value="0">Ẩn (Inactive)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Mô tả ngắn (Overview)</label>
                                    <textarea class="form-control" rows="2" id="pkgOverview"
                                        placeholder="Mô tả tổng quan..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Chi tiết tính năng (Features)</label>
                                    <textarea class="form-control" rows="5" id="pkgDesc"
                                        placeholder="- Tính năng 1&#10;- Tính năng 2..."></textarea>
                                    <div class="form-text small">Mỗi tính năng một dòng (gạch đầu dòng).</div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <h6 class="fw-bold text-primary border-bottom pb-2 mb-3">Cấu hình giá theo kênh</h6>

                                <div class="price-input-group mb-2 input-group">
                                    <span class="input-group-text">PAGE GRAB FAN</span>
                                    <input type="number" class="form-control" id="price1" placeholder="Nhập giá...">
                                    <span class="input-group-text">VNĐ</span>
                                </div>

                                <div class="price-input-group mb-2 input-group">
                                    <span class="input-group-text">PAGE RAP FAN</span>
                                    <input type="number" class="form-control" id="price2" placeholder="Nhập giá...">
                                    <span class="input-group-text">VNĐ</span>
                                </div>

                                <div class="price-input-group mb-2 input-group">
                                    <span class="input-group-text">GROUP CỘNG ĐỒNG</span>
                                    <input type="number" class="form-control" id="price3" placeholder="Nhập giá...">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Hủy bỏ</button>
                    <button type="button" class="btn btn-primary px-4" onclick="savePackage()">Lưu thông tin</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // MOCKUP JAVASCRIPT (Xử lý giao diện giả)

    const modalElement = document.getElementById('packageModal');
    const myModal = new bootstrap.Modal(modalElement);

    function resetForm() {
        document.getElementById('modalTitle').innerText = "Thêm gói dịch vụ mới";
        document.getElementById('packageForm').reset();
    }

    function editPackage(id) {
        // Trong thực tế: Gọi AJAX lấy dữ liệu gói theo ID
        // Ở đây: Điền dữ liệu giả để demo
        document.getElementById('modalTitle').innerText = "Cập nhật thông tin: GÓI " + (id == 1 ? '1A' : '3');

        document.getElementById('pkgName').value = id == 1 ? 'Gói 1A' : 'Gói 3';
        document.getElementById('pkgSlug').value = id == 1 ? 'goi-1a' : 'goi-3';
        document.getElementById('pkgSlots').value = id == 1 ? 1 : 3;
        document.getElementById('pkgOverview').value = "Gói dịch vụ cơ bản...";
        document.getElementById('pkgDesc').value = "- Tính năng A\n- Tính năng B";

        // Giả lập giá
        document.getElementById('price1').value = id == 1 ? 180000 : 420000;
        document.getElementById('price2').value = id == 1 ? 140000 : 300000;
        document.getElementById('price3').value = id == 1 ? 30000 : 60000;

        myModal.show();
    }

    function savePackage() {
        // Trong thực tế: Submit form hoặc gửi AJAX
        alert("Đã lưu thông tin gói thành công!");
        myModal.hide();
    }

    function deletePackage(id) {
        if (confirm("Bạn có chắc chắn muốn xóa gói này không? Hành động này không thể hoàn tác.")) {
            alert("Đã xóa gói ID: " + id);
            // Reload trang
        }
    }
    </script>

</body>

</html>