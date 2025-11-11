<?php
// register.php
include 'templates/header.php'; 
?>

<div class="container auth-container">
    <div class="text-center">
        <h2 class="auth-heading">Đăng ký</h2>
        <p class="auth-subheading">Tạo tài khoản để đăng ký các gói dịch vụ</p>
    </div>

    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName" class="form-label-schedio">Họ*</label>
                <input type="text" class="form-control form-control-schedio" id="firstName" name="first_name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName" class="form-label-schedio">Tên*</label>
                <input type="text" class="form-control form-control-schedio" id="lastName" name="last_name" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label-schedio">Email*</label>
            <input type="email" class="form-control form-control-schedio" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label-schedio">Nhập mật khẩu</label>
            <input type="password" class="form-control form-control-schedio" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="confirmPassword" class="form-label-schedio">Nhập lại mật khẩu</label>
            <input type="password" class="form-control form-control-schedio" id="confirmPassword"
                name="confirm_password" required>
        </div>

        <div class="d-grid mb-3 mt-4">
            <button type="submit" class="btn btn-schedio-primary">Đăng ký</button>
        </div>

        <div class="text-center">
            <p>Bạn đã có tài khoản? <a href="login.php" class="text-decoration-none fw-bold">Đăng nhập</a></p>
        </div>
    </form>
</div>

<?php include 'templates/footer.php'; ?>