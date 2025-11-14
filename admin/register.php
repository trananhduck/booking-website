<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Quản trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-style.css" rel="stylesheet">
</head>

<body class="admin-auth-body">

    <div class="admin-auth-card">
        <div class="auth-brand">SCHEDIO</div>
        <p class="text-center text-muted mb-4">Tạo tài khoản quản trị mới</p>

        <form>
            <div class="mb-3">
                <label class="form-label fw-bold text-secondary">Họ và Tên</label>
                <input type="text" class="form-control py-2" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold text-secondary">Email</label>
                <input type="email" class="form-control py-2" placeholder="staff@schedio.vn" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold text-secondary">Mật khẩu</label>
                <input type="password" class="form-control py-2" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-danger">Mã bí mật (Secret Key)</label>
                <input type="password" class="form-control py-2" placeholder="Nhập mã để xác thực quyền" required>
            </div>

            <div class="d-grid mb-3">
                <button type="button" onclick="window.location.href='login.html'" class="btn btn-primary py-2 fw-bold"
                    style="background-color: #191970; border: none;">
                    Tạo tài khoản
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="login.html" class="text-decoration-none text-muted small">Đã có tài khoản? Đăng nhập</a>
        </div>
    </div>

</body>

</html>