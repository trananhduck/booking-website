<?php
session_start();
// require_once '../config/db.php'; 
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo thống kê - Schedio Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/admin-style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div class="admin-wrapper">

        <?php include 'templates/sidebar.php'; ?>

        <div class="admin-content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-primary fw-bold mb-0">Báo cáo thống kê</h2>
                    <p class="text-muted small mb-0">Tổng hợp số liệu kinh doanh tháng 11/2025</p>
                </div>

                <div class="d-flex gap-2">
                    <select class="form-select form-select-sm border-primary" style="width: 150px;">
                        <option>Tháng này</option>
                        <option>Tháng trước</option>
                        <option>7 ngày qua</option>
                    </select>
                    <button class="btn btn-sm btn-primary"><i class="bi bi-download"></i> Xuất báo cáo</button>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="stat-card border-start border-4 border-primary">
                        <p class="stat-title mb-1">Doanh thu</p>
                        <h3 class="fw-bold text-dark">45.200.000đ</h3>
                        <small class="text-success fw-bold"><i class="bi bi-arrow-up"></i> 12%</small> <small
                            class="text-muted">so với tháng trước</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card border-start border-4 border-success">
                        <p class="stat-title mb-1">Đơn hoàn thành</p>
                        <h3 class="fw-bold text-dark">128</h3>
                        <small class="text-success fw-bold"><i class="bi bi-arrow-up"></i> 5%</small> <small
                            class="text-muted">tỉ lệ chốt đơn</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card border-start border-4 border-warning">
                        <p class="stat-title mb-1">Khách hàng mới</p>
                        <h3 class="fw-bold text-dark">45</h3>
                        <small class="text-danger fw-bold"><i class="bi bi-arrow-down"></i> 2%</small> <small
                            class="text-muted">cần đẩy mạnh ads</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card border-start border-4 border-info">
                        <p class="stat-title mb-1">Đang xử lý</p>
                        <h3 class="fw-bold text-dark">12</h3>
                        <small class="text-muted">đơn hàng cần duyệt gấp</small>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">

                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white fw-bold py-3 d-flex justify-content-between">
                            <span>Biểu đồ doanh thu (Triệu VNĐ)</span>
                            <i class="bi bi-graph-up-arrow text-primary"></i>
                        </div>
                        <div class="card-body">
                            <canvas id="revenueChart" height="120"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white fw-bold py-3">Tỷ lệ gói dịch vụ</div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <canvas id="packageChart" style="max-height: 250px;"></canvas>
                            <div class="mt-4 text-center small text-muted">
                                Gói 3 đang là gói bán chạy nhất tháng này.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white fw-bold py-3">Hiệu quả theo Kênh truyền thông</div>
                        <div class="card-body">
                            <canvas id="platformChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white fw-bold py-3">Top Khách hàng chi tiêu cao</div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Khách hàng</th>
                                            <th>Số đơn</th>
                                            <th class="text-end pe-4">Tổng chi tiêu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-4 fw-bold">Nguyễn Văn A (MCK)</td>
                                            <td>5</td>
                                            <td class="text-end pe-4 text-success fw-bold">15.200.000đ</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 fw-bold">Trần Thị B (Tlinh)</td>
                                            <td>3</td>
                                            <td class="text-end pe-4 text-success fw-bold">8.500.000đ</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 fw-bold">Lê Văn C (JustaTee)</td>
                                            <td>2</td>
                                            <td class="text-end pe-4 text-success fw-bold">4.200.000đ</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 fw-bold">Phạm D (Binz)</td>
                                            <td>1</td>
                                            <td class="text-end pe-4 text-success fw-bold">780.000đ</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 fw-bold">Hoàng E (Rhymastic)</td>
                                            <td>1</td>
                                            <td class="text-end pe-4 text-success fw-bold">420.000đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // 1. Biểu đồ Doanh thu (Line)
        const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctxRevenue, {
            type: 'line',
            data: {
                labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
                datasets: [{
                    label: 'Doanh thu 2025',
                    data: [12, 19, 15, 25, 22, 30, 28, 35, 40, 45, 50, 60], // Dữ liệu giả (đơn vị triệu)
                    borderColor: '#191970', // Màu xanh đậm
                    backgroundColor: 'rgba(25, 25, 112, 0.1)',
                    borderWidth: 3,
                    tension: 0.4, // Làm mềm đường cong
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // 2. Biểu đồ Gói dịch vụ (Doughnut)
        const ctxPackage = document.getElementById('packageChart').getContext('2d');
        new Chart(ctxPackage, {
            type: 'doughnut',
            data: {
                labels: ['Gói 1A', 'Gói 2', 'Gói 3', 'Gói 5'],
                datasets: [{
                    data: [15, 25, 40, 20], // Phần trăm
                    backgroundColor: [
                        '#e3f2fd', // Xanh nhạt
                        '#90caf9',
                        '#1976d2', // Xanh vừa (Gói 3 - Key)
                        '#fdd835' // Vàng (Gói 5 VIP)
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%', // Độ dày vòng tròn
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    }
                }
            }
        });

        // 3. Biểu đồ Kênh (Bar)
        const ctxPlatform = document.getElementById('platformChart').getContext('2d');
        new Chart(ctxPlatform, {
            type: 'bar',
            data: {
                labels: ['Grab Fan T9', 'Rap Fan Thám Thính', 'Group Cộng Đồng'],
                datasets: [{
                    label: 'Số lượng đơn',
                    data: [65, 40, 25],
                    backgroundColor: [
                        '#191970',
                        '#0d6efd',
                        '#ffc107'
                    ],
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>

</body>

</html>