<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch đăng bài - Schedio Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/admin-style.css">

    <style>
        /* Tùy chỉnh FullCalendar cho Admin */
        #calendar {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
            min-height: 800px;
        }

        .fc-toolbar-title {
            font-size: 1.5rem !important;
            color: var(--admin-primary);
            font-weight: 700;
        }

        .fc-button-primary {
            background-color: var(--admin-primary) !important;
            border-color: var(--admin-primary) !important;
        }

        .fc-day-today {
            background-color: #fffdf5 !important;
        }

        /* Màu sắc sự kiện */
        .evt-pending {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }

        /* Chờ đăng */
        .evt-completed {
            background-color: #198754;
            border-color: #198754;
        }

        /* Đã đăng */
        .evt-cancelled {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        /* Hủy */

        .fc-event {
            cursor: pointer;
            padding: 2px 4px;
            font-size: 0.85rem;
        }

        .fc-event-time {
            font-weight: 700;
        }
    </style>
</head>

<body>

    <div class="admin-wrapper">

        <?php include 'templates/sidebar.php'; ?>

        <div class="admin-content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary fw-bold mb-0">Lịch đăng bài tổng thể</h2>
                <div>
                    <span class="badge bg-warning text-dark me-2">● Chờ đăng</span>
                    <span class="badge bg-success me-2">● Đã đăng</span>
                    <span class="badge bg-danger">● Đã hủy</span>
                </div>
            </div>

            <div id="calendar"></div>

        </div>
    </div>

    <div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="modalTitle">Chi tiết bài đăng</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="small text-muted fw-bold">KHÁCH HÀNG</label>
                        <div class="fs-5 fw-bold text-dark" id="modalCustomer">...</div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="small text-muted fw-bold">GÓI DỊCH VỤ</label>
                            <div id="modalPackage">...</div>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="small text-muted fw-bold">KÊNH ĐĂNG</label>
                            <div id="modalPlatform">...</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted fw-bold">THỜI GIAN</label>
                        <div class="text-danger fw-bold" id="modalTime">...</div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="#" id="btnViewOrder" class="btn btn-outline-primary btn-sm">Xem đơn hàng gốc</a>
                        <button type="button" class="btn btn-success btn-sm"><i class="bi bi-check2"></i> Đánh dấu Đã
                            đăng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));

            // DỮ LIỆU MẪU (MOCK DATA)
            var mockEvents = [{
                    id: 1,
                    title: 'Chloe - Gói 3 (Poster)',
                    start: '2025-11-12T09:00:00',
                    className: 'evt-pending',
                    extendedProps: {
                        customer: 'Chloe',
                        package: 'Gói 3',
                        platform: 'Page Grab Fan Tháng 9',
                        orderId: 'SCD-001'
                    }
                },
                {
                    id: 2,
                    title: 'Alex - Gói 1 (Video)',
                    start: '2025-11-12T14:00:00',
                    className: 'evt-completed',
                    extendedProps: {
                        customer: 'Alex',
                        package: 'Gói 1',
                        platform: 'Page Rap Fan Thám Thính',
                        orderId: 'SCD-002'
                    }
                },
                {
                    id: 3,
                    title: 'Tom - Gói 5 (Meme)',
                    start: '2025-11-13T20:00:00',
                    className: 'evt-pending',
                    extendedProps: {
                        customer: 'Tom',
                        package: 'Gói 5',
                        platform: 'Group Cộng đồng Grab Việt',
                        orderId: 'SCD-003'
                    }
                }
            ];

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Mặc định xem theo tháng
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek' // Các chế độ xem: Tháng, Tuần, List
                },
                locale: 'vi',
                buttonText: {
                    today: 'Hôm nay',
                    month: 'Tháng',
                    week: 'Tuần',
                    list: 'Danh sách'
                },
                navLinks: true, // Cho phép click vào ngày để xem chi tiết ngày đó
                dayMaxEvents: true, // Thu gọn nếu quá nhiều event trong 1 ngày
                events: mockEvents, // Nạp dữ liệu mẫu

                // Xử lý khi click vào sự kiện
                eventClick: function(info) {
                    var props = info.event.extendedProps;

                    // Điền dữ liệu vào Modal
                    document.getElementById('modalCustomer').innerText = props.customer;
                    document.getElementById('modalPackage').innerText = props.package;
                    document.getElementById('modalPlatform').innerText = props.platform;
                    document.getElementById('modalTime').innerText = info.event.start.toLocaleString(
                        'vi-VN');

                    // Link đến đơn hàng
                    document.getElementById('btnViewOrder').href = 'order_detail.php?id=' + props
                        .orderId; // (Cần logic ID thật)

                    eventModal.show();
                }
            });

            calendar.render();
        });
    </script>

</body>

</html>