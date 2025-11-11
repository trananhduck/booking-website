<?php
// services.php
include 'templates/header.php';
?>

<section class="hero-banner">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold">Các gói dịch vụ của chúng tôi</h1>
        <p class="lead">Schedio mang đến các gói dịch vụ đa dạng và linh hoạt, giúp bạn quản lý và sắp xếp lịch đăng bài
            hiệu quả trên tất cả các fanpage.</p>
    </div>
</section>

<section class="container my-5 py-5">
    <div class="table-responsive schedio-pricing-table shadow-sm">

        <!-- 
            LƯU Ý: 
            - Đã xóa 'table-bordered' (để bỏ viền dọc)
            - Giữ lại 'table-striped' (để có nền sọc mờ như thiết kế) 
        -->
        <table class="table table-striped mb-0">

            <thead class="table-schedio-header">
                <tr>
                    <th class="col-4">GÓI</th>
                    <th>PAGE GRAB FAN THÁNG 9</th>
                    <th>PAGE RAP FAN THÁM THÍNH</th>
                    <th>GROUP CỘNG ĐỒNG GRAB VIỆT UNDERGROUND</th>
                    <th class="text-center">CHI TIẾT</th> <!-- CỘT MỚI -->
                </tr>
            </thead>

            <tbody>
                <!-- Gói 1A -->
                <tr>
                    <td class="fw-bold">Gói 1A
                        <ul class="list-unstyled fw-normal mt-2">
                            <li>- 1 poster sản phẩm</li>
                        </ul>
                    </td>
                    <td class="text-center"><strong>180k</strong></td>
                    <td class="text-center"><strong>140k</strong></td>
                    <td class="text-center"><strong>20k</strong></td>
                    <td class="btn-col">
                        <a href="package-detail.php?id=goi-1a" class="btn btn-outline-dark btn-sm">Xem chi tiết</a>
                    </td>
                </tr>

                <!-- Gói 1B -->
                <tr>
                    <td class="fw-bold">Gói 1B
                        <ul class="list-unstyled fw-normal mt-2">
                            <li>- 1 video highlight</li>
                        </ul>
                    </td>
                    <td class="text-center"><strong>210k</strong></td>
                    <td class="text-center"><strong>170k</strong></td>
                    <td class="text-center"><strong>20k</strong></td>
                    <td class="btn-col">
                        <a href="package-detail.php?id=goi-1b" class="btn btn-outline-dark btn-sm">Xem chi tiết</a>
                    </td>
                </tr>

                <!-- Gói 1C -->
                <tr>
                    <td class="fw-bold">Gói 1C
                        <ul class="list-unstyled fw-normal mt-2">
                            <li>- Share link sản phẩm trực tiếp</li>
                        </ul>
                    </td>
                    <td class="text-center"><strong>160k</strong></td>
                    <td class="text-center"><strong>100k</strong></td>
                    <td class="text-center"><strong>20k</strong></td>
                    <td class="btn-col">
                        <a href="package-detail.php?id=goi-1c" class="btn btn-outline-dark btn-sm">Xem chi tiết</a>
                    </td>
                </tr>

                <!-- Gói 2 -->
                <tr>
                    <td class="fw-bold">Gói 2
                        <ul class="list-unstyled fw-normal mt-2">
                            <li>- 1 poster sản phẩm</li>
                            <li>- 1 video highlight</li>
                        </ul>
                    </td>
                    <td class="text-center"><strong>380k</strong></td>
                    <td class="text-center"><strong>250k</strong></td>
                    <td class="text-center"><strong>30k</strong></td>
                    <td class="btn-col">
                        <a href="package-detail.php?id=goi-2" class="btn btn-outline-dark btn-sm">Xem chi tiết</a>
                    </td>
                </tr>

                <!-- Gói 3 -->
                <tr>
                    <td class="fw-bold">Gói 3
                        <ul class="list-unstyled fw-normal mt-2">
                            <li>- 1 poster sản phẩm</li>
                            <li>- 1 post trích lyrics highlight</li>
                            <li>- 1 video highlight</li>
                        </ul>
                    </td>
                    <td class="text-center"><strong>420k</strong></td>
                    <td class="text-center"><strong>300k</strong></td>
                    <td class="text-center"><strong>40k</strong></td>
                    <td class="btn-col">
                        <a href="package-detail.php?id=goi-3" class="btn btn-outline-dark btn-sm">Xem chi tiết</a>
                    </td>
                </tr>

                <!-- Gói 4 -->
                <tr>
                    <td class="fw-bold">Gói 4
                        <ul class="list-unstyled fw-normal mt-2">
                            <li>- 1 poster sản phẩm</li>
                            <li>- 1 post trích lyrics highlight</li>
                            <li>- 1 video highlight</li>
                            <li>- 1 post bình luận về sản phẩm</li>
                            <li>- 1 tuần ghim bài đăng trên page</li>
                        </ul>
                    </td>
                    <td class="text-center"><strong>420k</strong></td>
                    <td class="text-center"><strong>300k</strong></td>
                    <td class="text-center"><strong>40k</strong></td>
                    <td class="btn-col">
                        <a href="package-detail.php?id=goi-4" class="btn btn-outline-dark btn-sm">Xem chi tiết</a>
                    </td>
                </tr>

                <!-- Gói 5 -->
                <tr>
                    <td class="fw-bold">Gói 5
                        <ul class="list-unstyled fw-normal mt-2">
                            <li>- 1 poster sản phẩm</li>
                            <li>- 1 post trích lyrics highlight</li>
                            <li>- 1 video highlight</li>
                            <li>- 2 bài đăng về tin tức/meme</li>
                            <li>- 2 tuần ghim bài đăng trên page</li>
                            <li>- Đặt poster làm ảnh bìa 1 tuần</li>
                        </ul>
                    </td>
                    <td class="text-center"><strong>780k</strong></td>
                    <td class="text-center"><strong>640k</strong></td>
                    <td class="text-center"><strong>50k</strong></td>
                    <td class="btn-col">
                        <a href="package-detail.php?id=goi-5" class="btn btn-outline-dark btn-sm">Xem chi tiết</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<?php include 'templates/footer.php'; ?>