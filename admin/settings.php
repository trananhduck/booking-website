<?php
session_start();
// require_once '../config/db.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt hệ thống - Schedio Admin</title>
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
                    <h2 class="text-primary fw-bold mb-0">Cài đặt hệ thống</h2>
                    <p class="text-muted small mb-0">Quản lý thông tin website và cấu hình thanh toán</p>
                </div>
                <button class="btn btn-success px-4 shadow-sm" form="settingsForm">
                    <i class="bi bi-save me-2"></i> Lưu thay đổi
                </button>
            </div>

            <div class="settings-card">
                <div class="row g-0">
                    <div class="col-md-3 border-end bg-white">
                        <div class="py-3">
                            <div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-general-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-general" type="button">
                                    <i class="bi bi-globe"></i> Thông tin chung
                                </button>
                                <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-payment" type="button">
                                    <i class="bi bi-credit-card-2-front"></i> Tài khoản thanh toán
                                </button>
                                <button class="nav-link" id="v-pills-social-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-social" type="button">
                                    <i class="bi bi-share"></i> Mạng xã hội
                                </button>
                                <button class="nav-link" id="v-pills-advanced-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-advanced" type="button">
                                    <i class="bi bi-sliders"></i> Cấu hình khác
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 bg-white">
                        <div class="p-4 p-lg-5">
                            <form id="settingsForm">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-general">
                                        <h5 class="fw-bold text-primary mb-4">Thông tin Website</h5>

                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Logo Website</label>
                                                <div class="logo-preview-box"
                                                    onclick="document.getElementById('siteLogo').click()">
                                                    <img src="../assets/images/a.png" id="logoPreview" alt="Logo">
                                                </div>
                                                <input type="file" class="d-none" id="siteLogo" accept="image/*"
                                                    onchange="previewImage(this)">
                                                <div class="form-text small">Click để thay đổi. (PNG, JPG)</div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Tên Website</label>
                                                    <input type="text" class="form-control" value="Schedio">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Mô tả ngắn (SEO)</label>
                                                    <textarea class="form-control"
                                                        rows="2">Dịch vụ booking đăng bài truyền thông trên các Fanpage</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="text-muted my-4">

                                        <h5 class="fw-bold text-primary mb-4">Thông tin Liên hệ (Footer)</h5>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Email hỗ trợ</label>
                                                <input type="email" class="form-control" value="support@schedio.vn">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Hotline</label>
                                                <input type="text" class="form-control" value="(084) 123 456 789">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-bold">Địa chỉ văn phòng</label>
                                                <input type="text" class="form-control"
                                                    value="Hàn Thuyên, khu phố 6, P.Linh Trung, Thủ Đức, TP.HCM">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-payment">
                                        <h5 class="fw-bold text-primary mb-4">Cấu hình Tài khoản Ngân hàng (VietQR)</h5>
                                        <div class="alert alert-info d-flex align-items-center">
                                            <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                                            <div>Thông tin này sẽ được dùng để tạo mã QR Code tự động.</div>
                                        </div>

                                        <div class="card bg-light border-0 p-3 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Ngân hàng</label>
                                                <select class="form-select">
                                                    <option value="MB" selected>MB Bank (Quân Đội)</option>
                                                    <option value="VCB">Vietcombank</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Số tài khoản</label>
                                                <input type="text" class="form-control font-monospace"
                                                    value="0344377104">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Tên chủ tài khoản</label>
                                                <input type="text" class="form-control text-uppercase"
                                                    value="TRAN ANH DUC">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-social">
                                        <h5 class="fw-bold text-primary mb-4">Liên kết Mạng xã hội</h5>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-white"><i
                                                    class="bi bi-facebook text-primary"></i></span>
                                            <input type="text" class="form-control"
                                                value="https://facebook.com/schedio">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-white"><i
                                                    class="bi bi-tiktok text-dark"></i></span>
                                            <input type="text" class="form-control" value="https://tiktok.com/@schedio">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-advanced">
                                        <h5 class="fw-bold text-primary mb-4">Cấu hình nâng cao</h5>
                                        <div
                                            class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div>
                                                <div class="fw-bold">Chế độ bảo trì</div>
                                                <small class="text-muted">Khi bật, chỉ Admin mới truy cập được
                                                    website.</small>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    style="width: 3em; height: 1.5em;">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logoPreview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById('settingsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Đã lưu cấu hình hệ thống thành công!');
    });
    </script>

</body>

</html>