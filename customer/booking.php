<?php
// Nạp file dữ liệu
require_once '../data/packages-data.php';

// 1. LẤY DỮ LIỆU TỪ URL
$package_id = isset($_GET['package_id']) ? $_GET['package_id'] : '';
$platform_name = isset($_GET['platform']) ? $_GET['platform'] : 'Kênh không xác định';

// 2. KIỂM TRA VÀ LẤY THÔNG TIN GÓI
if (!isset($ALL_PACKAGES[$package_id])) {
    include '../templates/header.php';
    echo '<div class="container my-5"><div class="alert alert-danger">Lỗi: Gói dịch vụ không tồn tại.</div></div>';
    include '../templates/footer.php';
    exit;
}
$package = $ALL_PACKAGES[$package_id];
$slotsToBook = count($package['features']);

// Nạp header
include '../templates/header.php';
?>

<div class="container my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="../services.php">Bảng giá</a></li>
            <li class="breadcrumb-item"><a
                    href="../package-detail.php?id=<?php echo $package_id; ?>"><?php echo $package['name']; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Lên lịch</li>
        </ol>
    </nav>
</div>

<div class="container">
    <h1 class="display-4 fw-bold mb-4 package-title">Lên lịch cho <?php echo htmlspecialchars($package['title']); ?>
    </h1>
</div>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card p-4 shadow-sm" id="booking-info">
                <h3 class="fw-bold text-dark-blue mb-3">Thông tin đặt lịch</h3>
                <div class="mb-3">
                    <strong>Kênh:</strong>
                    <p class="fs-5 text-schedio-primary"><?php echo htmlspecialchars($platform_name); ?></p>
                </div>
                <div class="mb-3">
                    <strong>Gói:</strong>
                    <p class="fs-5"><?php echo htmlspecialchars($package['name']); ?></p>
                </div>
                <div class="mb-3">
                    <strong>Số lượng bài đăng:</strong>
                    <p class="fs-5"><?php echo $slotsToBook; ?> (bài)</p>
                </div>
                <hr>
                <div class="mb-3">
                    <h5 class="fw-bold">Số slot đã chọn:
                        <span id="slot-counter" class="text-schedio-primary">0</span> / <?php echo $slotsToBook; ?>
                    </h5>
                </div>
                <div class="mb-3" id="selected-slots-list"></div>

                <button class="btn btn-schedio-primary w-100 mb-2" id="btn-open-modal">Hoàn tất đặt lịch</button>
                <button class="btn btn-outline-danger w-100" id="reset-selection">Chọn lại</button>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card p-4 shadow-sm" id="calendar-wrapper">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content schedio-modal-content p-4">

            <h4 class="fw-bold text-dark-blue mb-4">Bạn đã chọn lịch thành công</h4>

            <form id="confirmBookingForm">
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark-blue">Tiêu đề sản phẩm hoặc nội dung <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-modal" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark-blue">Link Drive <span
                            class="text-danger">*</span></label>
                    <input type="url" class="form-control form-control-modal" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-dark-blue">Link sản phẩm</label>
                    <input type="url" class="form-control form-control-modal">
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top-0">
                    <button type="button" class="btn btn-white px-4 py-2" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-schedio-primary px-4 py-2">Xác nhận</button>
                </div>
            </form>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const maxSlots = <?php echo $slotsToBook; ?>;
    let selectedSlots = [];

    const calendarEl = document.getElementById('calendar');
    const slotCounterEl = document.getElementById('slot-counter');
    const selectedListEl = document.getElementById('selected-slots-list');
    const resetBtn = document.getElementById('reset-selection');
    const openModalBtn = document.getElementById('btn-open-modal');

    // Khởi tạo Modal Bootstrap
    const bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));

    // Dữ liệu slot bận (Demo)
    const existingEvents = [{
        start: '2025-11-12T10:00:00',
        end: '2025-11-12T11:00:00',
        display: 'background',
        color: '#dc3545'
    }, ];

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        locale: 'vi',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
        },
        allDaySlot: false,
        slotMinTime: '07:00:00',
        slotMaxTime: '23:00:00',
        events: existingEvents,

        dateClick: function(info) {
            if (selectedSlots.length >= maxSlots) {
                alert('Bạn đã chọn đủ ' + maxSlots + ' slot.');
                return;
            }
            if (info.date < new Date()) {
                alert('Không thể chọn thời gian trong quá khứ.');
                return;
            }

            const newEvent = {
                id: 'slot_' + Date.now(),
                title: 'Đang chọn',
                start: info.date,
                color: '#0d6efd'
            };

            calendar.addEvent(newEvent);
            selectedSlots.push(newEvent);
            updateSidebar();
        },

        eventClick: function(info) {
            if (info.event.title === 'Đang chọn') {
                if (confirm('Xóa slot này?')) {
                    selectedSlots = selectedSlots.filter(e => e.id !== info.event.id);
                    info.event.remove();
                    updateSidebar();
                }
            }
        }
    });

    calendar.render();

    function updateSidebar() {
        slotCounterEl.innerText = selectedSlots.length;
        selectedListEl.innerHTML = '';
        if (selectedSlots.length > 0) {
            const ul = document.createElement('ul');
            ul.className = 'list-group';
            selectedSlots.forEach((slot, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item small';
                li.innerText = `Slot ${index + 1}: ${slot.start.toLocaleString('vi-VN')}`;
                ul.appendChild(li);
            });
            selectedListEl.appendChild(ul);
        }
    }

    resetBtn.addEventListener('click', function() {
        calendar.getEvents().forEach(e => {
            if (e.title === 'Đang chọn') e.remove();
        });
        selectedSlots = [];
        updateSidebar();
    });

    // XỬ LÝ KHI BẤM "HOÀN TẤT ĐẶT LỊCH" -> HIỆN MODAL
    openModalBtn.addEventListener('click', function() {
        if (selectedSlots.length < maxSlots) {
            alert('Vui lòng chọn đủ ' + maxSlots + ' slot trước khi tiếp tục.');
            return;
        }
        // Nếu đủ slot thì hiện Modal
        bookingModal.show();
    });

    // Xử lý form trong Modal (Demo)
    document.getElementById('confirmBookingForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert("Đặt hàng thành công! Hệ thống đang xử lý...");
        bookingModal.hide();
        // Tại đây bạn sẽ gửi dữ liệu về server sau
    });
});
</script>

<?php include '../templates/footer.php'; ?>