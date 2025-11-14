<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Quản trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-style.css" rel="stylesheet">
</head>

<body class="admin-auth-body">

    <div class="admin-auth-card">
        <div class="auth-brand">SCHEDIO</div>
        <p class="text-center text-muted mb-4">Hệ thống quản trị dành cho Admin</p>

        <form>
            <div class="mb-3">
                <label class="form-label fw-bold text-secondary">Email</label>
                <input type="email" class="form-control py-2" placeholder="admin@schedio.vn" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-secondary">Mật khẩu</label>
                <input type="password" class="form-control py-2" placeholder="••••••••" required>
            </div>

            <div class="d-grid mb-3">
                <button type="button" onclick="window.location.href='dashboard.html'"
                    class="btn btn-primary py-2 fw-bold" style="background-color: #191970; border: none;">
                    Đăng nhập Dashboard
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="#" class="text-decoration-none text-muted small">← Quay về trang chủ</a>
        </div>
    </div>

</body>

</html>