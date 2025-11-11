<?php
// login.php
include 'templates/header.php'; 
?>

<div class="container auth-container">
    <div class="text-center">
        <h2 class="auth-heading">Đăng nhập</h2>
        <p class="auth-subheading">Đăng nhập vào tài khoản thành viên của bạn</p>
    </div>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label-schedio">Email*</label>
            <input type="email" class="form-control form-control-schedio" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label-schedio">Nhập mật khẩu</label>
            <input type="password" class="form-control form-control-schedio" id="password" name="password" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="rememberMe" name="remember">
                <label class="form-check-label" for="rememberMe">
                    Ghi nhớ đăng nhập
                </label>
            </div>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-schedio-primary">Đăng nhập</button>
        </div>

        <div class="text-center">
            <p>Bạn chưa có tài khoản? <a href="register.php" class="text-decoration-none fw-bold">Đăng ký</a></p>
        </div>
    </form>
</div>

<?php include 'templates/footer.php'; ?>