<?php
include '../templates/header.php';

// Xác định tab hiện tại dựa trên URL (Mặc định là 'profile')
$current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'profile';
?>

<div class="container my-5">

    <h1 class="display-5 fw-bold text-dark-blue mb-5">
        <?php echo ($current_tab == 'orders') ? 'Đơn mua' : 'Tài khoản'; ?>
    </h1>

    <div class="row">

        <div class="col-lg-3 mb-5">
            <div class="account-sidebar">
                <ul class="list-unstyled">
                    <li>
                        <a href="account.php?tab=profile"
                            class="sidebar-link <?php echo ($current_tab == 'profile') ? 'active' : ''; ?>">
                            Hồ sơ cá nhân
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link">Thông báo</a>
                    </li>
                    <li>
                        <a href="account.php?tab=orders"
                            class="sidebar-link <?php echo ($current_tab == 'orders') ? 'active' : ''; ?>">
                            Đơn hàng
                        </a>
                    </li>
                    <li class="mt-3 border-top pt-3">
                        <a href="../logout.php" class="sidebar-link text-danger">
                            Đăng xuất <i class="bi bi-box-arrow-right ms-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9">

            <?php if ($current_tab == 'profile'): ?>
            <div class="account-tabs mb-4">
                <ul class="nav nav-tabs border-0" id="profileTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-info" type="button" role="tab">Thông tin của tôi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="password-tab" data-bs-toggle="tab"
                            data-bs-target="#change-password" type="button" role="tab">Thay đổi mật khẩu</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="profileTabContent">
                <div class="tab-pane fade show active" id="profile-info" role="tabpanel">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="form-label-schedio mb-2">Ảnh đại diện</label>
                            <div class="d-flex align-items-center">
                                <img src="https://i.ibb.co/5Y8wNcz/user-placeholder.png" alt="Avatar"
                                    class="rounded-circle me-3"
                                    style="width: 80px; height: 80px; object-fit: cover; border: 1px solid #eee;">
                                <div>
                                    <input type="file" class="form-control form-control-sm" id="avatar" name="avatar">
                                    <div class="form-text text-muted">Định dạng: .jpg, .png (Tối đa 2MB)</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label-schedio">Họ*</label>
                            <input type="text" class="form-control form-control-schedio" value="Nguyễn Văn">
                        </div>
                        <div class="mb-3">
                            <label class="form-label-schedio">Tên*</label>
                            <input type="text" class="form-control form-control-schedio" value="A">
                        </div>
                        <div class="mb-3">
                            <label class="form-label-schedio">Email*</label>
                            <input type="email" class="form-control form-control-schedio" value="nguyenvana@example.com"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label-schedio">Số điện thoại</label>
                            <input type="text" class="form-control form-control-schedio" value="0987654321">
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-schedio-primary px-4">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="change-password" role="tabpanel">
                    <form action="" method="POST">
                        <div class="mb-4">
                            <label class="form-label-schedio">Mật khẩu hiện tại*</label>
                            <input type="password" class="form-control form-control-schedio">
                        </div>
                        <div class="mb-4">
                            <label class="form-label-schedio">Mật khẩu mới*</label>
                            <input type="password" class="form-control form-control-schedio">
                        </div>
                        <div class="mb-4">
                            <label class="form-label-schedio">Nhập lại mật khẩu mới*</label>
                            <input type="password" class="form-control form-control-schedio">
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-schedio-primary px-4">Đổi mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php elseif ($current_tab == 'orders'): ?>

            <ul class="nav nav-underline mb-4 border-bottom">
                <li class="nav-item">
                    <a class="nav-link active text-dark fw-bold px-4 py-3 bg-light" href="#">Tất cả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark px-4 py-3" href="#">Chờ xử lý</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark px-4 py-3" href="#">Đang thực hiện</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark px-4 py-3" href="#">Hoàn thành</a>
                </li>
            </ul>

            <div class="table-responsive rounded shadow-sm border">
                <table class="table table-borderless align-middle mb-0 bg-light-yellow">
                    <thead class="table-light border-bottom">
                        <tr class="text-dark-blue small fw-bold">
                            <th class="py-3 ps-4">Mã đơn</th>
                            <th class="py-3">Tên gói</th>
                            <th class="py-3">Lịch đăng</th>
                            <th class="py-3">Thành tiền</th>
                            <th class="py-3">Ngày đăng ký</th>
                            <th class="py-3 text-center">Trạng thái</th>
                            <th class="py-3 text-center">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom">
                            <td class="ps-4 fw-bold">SCD-001</td>
                            <td>Gói 3</td>
                            <td>11/7/2024 - 09:00 AM</td>
                            <td class="fw-bold">420.000đ</td>
                            <td>28/10/2025</td>
                            <td class="text-center"><span
                                    class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-normal">Chờ xử lý</span>
                            </td>

                            <td class="text-center">
                                <a href="order_detail.php?id=SCD-001" class="btn btn-sm btn-light border">
                                    <i class="bi bi-file-text"></i> Xem
                                </a>
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="ps-4 fw-bold">SCD-001</td>
                            <td>Gói 2</td>
                            <td>11/7/2024 - 09:00 AM</td>
                            <td class="fw-bold">420.000đ</td>
                            <td>28/10/2025</td>
                            <td class="text-center"><span
                                    class="badge bg-primary-light text-primary rounded-pill px-3 py-2 fw-normal">Đang
                                    thực hiện</span></td>
                            <td class="text-center"><button class="btn btn-sm btn-light border"><i
                                        class="bi bi-file-text"></i> Xem</button></td>
                        </tr>
                        <tr>
                            <td class="ps-4 fw-bold">SCD-001</td>
                            <td>Gói 5</td>
                            <td>11/7/2024 - 09:00 AM</td>
                            <td class="fw-bold">420.000đ</td>
                            <td>28/10/2025</td>
                            <td class="text-center"><span
                                    class="badge bg-success-light text-success rounded-pill px-3 py-2 fw-normal">Hoàn
                                    thành</span></td>
                            <td class="text-center"><button class="btn btn-sm btn-light border"><i
                                        class="bi bi-file-text"></i> Xem</button></td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end p-3 bg-light-yellow">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link border-0 bg-transparent text-muted"
                                    href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link bg-primary text-white border-0 rounded"
                                    href="#">1</a></li>
                            <li class="page-item"><a class="page-link border-0 bg-transparent text-primary"
                                    href="#">2</a></li>
                            <li class="page-item"><a class="page-link border-0 bg-transparent text-primary"
                                    href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <?php endif; ?>

        </div>
    </div>
</div>

<?php include '../templates/footer.php'; ?>