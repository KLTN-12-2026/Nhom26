<template>
    <div class="admin-page-container">
        <!-- 1. Top Alert Banner: SLA ALERT CẢNH BÁO KHẨN -->
        <div class="sla-alert-banner p-3 rounded-4 mb-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="red-pulse-dot"></span>
                <strong class="text-danger font-13 text-uppercase">SLA ALERT CẢNH BÁO KHẨN:</strong>
                <span class="text-dark font-13">2 vụ việc mức P1 có nguy cơ quá hạn SLA 4 giờ. Vui lòng can thiệp và kiểm tra quỹ ký quỹ!</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-secondary border font-11 px-2 py-1">
                    Đà Nẵng SmartTourism Shield
                </span>
                <a href="javascript:;" class="text-pink fw-bold font-12 text-decoration-none" @click="focusP1">
                    Mở Vụ Án Cấp Thiết <i class="bx bx-right-arrow-alt align-middle font-16"></i>
                </a>
            </div>
        </div>

        <!-- 2. Header & Action Buttons -->
        <div class="d-flex flex-wrap align-items-start justify-content-between mb-4 gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge-hub-pink">
                        <i class="bx bx-shield-quarter me-1"></i> DISPUTE & INCIDENT RESOLUTION HUB
                    </span>
                    <span class="text-muted font-12">• Sở Du Lịch & SmartTrip AI</span>
                </div>
                <h3 class="page-title mb-1">Quản Lý Báo Cáo Vi Phạm & Xử Lý Tranh Chấp</h3>
                <p class="text-muted small mb-0 header-desc">
                    Tiếp nhận, điều tra và giải quyết khiếu nại dịch vụ từ du khách và đối tác lữ hành theo chuẩn SLA cam kết, bảo vệ quyền lợi người tiêu dùng và thương hiệu du lịch Đà Nẵng.
                </p>
            </div>
            <div class="d-flex flex-wrap align-items-center gap-2 header-actions">
                <button class="btn btn-soft-purple btn-sm rounded-pill px-3 py-2 fw-semibold" @click="openSlaModal">
                    <i class="bx bx-check-shield me-1"></i> Quy Trình Xử Lý Tranh Chấp SLA
                </button>
                <button class="btn btn-soft-purple btn-sm rounded-pill px-3 py-2 fw-semibold" @click="xuatBaoCao">
                    <i class="bx bx-download me-1"></i> Xuất Báo Cáo Khiếu Nại Tháng
                </button>
                <button class="btn btn-pink-gradient text-white btn-sm rounded-pill px-3 py-2 fw-bold" @click="openBotModal">
                    <i class="bx bx-bot me-1"></i> Cấu Hình Bot Tự Động Phân Loại
                </button>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- Card 1: Hồ sơ chờ xử lý -->
            <div class="col-xl-3 col-sm-6">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="kpi-label">HỒ SƠ CHỜ XỬ LÝ</span>
                            <div class="d-flex align-items-baseline gap-2 mb-1">
                                <h2 class="kpi-value text-dark mb-0">07</h2>
                                <span class="badge bg-danger-subtle text-danger font-11 fw-bold">! 02 vụ khẩn cấp (P1)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center font-11 mt-2">
                                <span class="text-muted">Tồn đọng trong ngày: 3</span>
                                <span class="text-pink fw-bold cursor-pointer" @click="filterTab = 'pending'">Ưu tiên xử lý</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box bg-pink-subtle text-pink">
                            <i class="bx bx-error-alt font-22"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Thời gian xử lý MTTR -->
            <div class="col-xl-3 col-sm-6">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="kpi-label">THỜI GIAN XỬ LÝ (MTTR)</span>
                            <div class="d-flex align-items-baseline gap-2 mb-1">
                                <h2 class="kpi-value text-dark mb-0">1.8h</h2>
                                <span class="text-primary font-12 fw-semibold">
                                    <i class="bx bx-trending-down"></i> -24 phút vs T.trước
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center font-11 mt-2">
                                <span class="text-muted">Cam kết SLA: ≤ 4.0 giờ</span>
                                <span class="badge bg-primary-subtle text-primary rounded-pill font-10">Đạt chuẩn 98%</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box bg-primary-subtle text-primary">
                            <i class="bx bx-time-five font-22"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Hòa giải thỏa đáng -->
            <div class="col-xl-3 col-sm-6">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="kpi-label">HÒA GIẢI THỎA ĐÁNG</span>
                            <div class="d-flex align-items-baseline gap-2 mb-1">
                                <h2 class="kpi-value text-dark mb-0">96.5%</h2>
                                <small class="text-purple font-11 fw-semibold"><i class="bx bx-check"></i> 231/240 vụ</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center font-11 mt-2">
                                <span class="text-muted">Quý hiện tại</span>
                                <span class="badge bg-purple-subtle text-purple rounded-pill font-10">Đánh giá 4.9★</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box bg-purple-subtle text-purple">
                            <i class="bx bx-donate-heart font-22"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Bồi hoàn ký quỹ sàn -->
            <div class="col-xl-3 col-sm-6">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="kpi-label">BỒI HOÀN KÝ QUỸ SÀN</span>
                            <div class="d-flex align-items-baseline gap-1 mb-1">
                                <h2 class="kpi-value text-pink mb-0 font-20">14.850.000</h2>
                                <span class="text-pink font-14 fw-bold">đ</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center font-11 mt-2">
                                <span class="text-muted">Từ quỹ ký quỹ vi phạm</span>
                                <span class="badge bg-pink text-white rounded-pill font-10">Bảo hộ 100%</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box bg-pink text-white">
                            <i class="bx bx-wallet font-22"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Master Layout: Left (Disputes List) & Right (Sidebar Analytics) -->
        <div class="row g-3">
            <!-- LEFT COLUMN: List of Incidents & Disputes (approx 8 cols) -->
            <div class="col-lg-8 col-xl-8">
                <!-- Filter Tabs Bar -->
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <!-- Status Tabs -->
                        <div class="d-flex flex-wrap gap-1">
                            <button class="filter-tab-pill" :class="{ active: filterTab === 'all' }" @click="filterTab = 'all'">
                                Tất cả khiếu nại (247)
                            </button>
                            <button class="filter-tab-pill" :class="{ active: filterTab === 'pending' }" @click="filterTab = 'pending'">
                                Chờ xử lý <span class="badge bg-danger rounded-pill font-10 ms-1">7</span>
                            </button>
                            <button class="filter-tab-pill" :class="{ active: filterTab === 'investigating' }" @click="filterTab = 'investigating'">
                                Đang đối chất (3)
                            </button>
                            <button class="filter-tab-pill" :class="{ active: filterTab === 'resolved' }" @click="filterTab = 'resolved'">
                                Đã xử lý xong (237)
                            </button>
                        </div>

                        <!-- Severity Filter -->
                        <div class="d-flex align-items-center gap-1">
                            <span class="font-11 text-muted me-1">Mức độ:</span>
                            <button class="badge-priority p1-btn" :class="{ active: filterPriority === 'P1' }" @click="togglePriority('P1')">
                                P1 Khẩn cấp
                            </button>
                            <button class="badge-priority p2-btn" :class="{ active: filterPriority === 'P2' }" @click="togglePriority('P2')">
                                P2 Cao
                            </button>
                            <button class="badge-priority p3-btn" :class="{ active: filterPriority === 'P3' }" @click="togglePriority('P3')">
                                P3 Trung bình
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Incidents Cards List -->
                <div class="d-flex flex-column gap-3 mb-4">
                    <!-- Incident 1: P1 Khẩn Cấp (Red Theme Card) -->
                    <div class="incident-card p-4 rounded-4 bg-white border border-danger shadow-sm position-relative" ref="cardP1">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2">
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <span class="badge bg-danger text-white font-11 px-2 py-1 rounded-pill fw-bold">
                                    <i class="bx bx-bolt-circle me-1"></i> P1 KHẨN CẤP
                                </span>
                                <span class="font-monospace text-dark fw-bold font-12">#BC-88219</span>
                                <span class="text-muted font-11">• Đặt lúc 08:30 Hôm nay</span>
                                <span class="badge bg-danger-subtle text-danger font-11 rounded-pill px-2">
                                    Quá hạn SLA sau 42 phút
                                </span>
                                <span class="text-muted font-11">Chờ quyết định kỷ luật</span>
                            </div>
                            <div class="text-muted">
                                <i class="bx bx-dots-vertical-rounded font-18 cursor-pointer"></i>
                            </div>
                        </div>

                        <!-- Incident Title -->
                        <h5 class="fw-bold text-dark mb-2 incident-title">
                            Hướng dẫn viên bỏ rơi khách, trễ 45 phút, thái độ cáu gắt và thiếu thiết bị bảo hộ tại Bán đảo Sơn Trà
                        </h5>

                        <!-- Incident Description -->
                        <p class="font-13 text-secondary mb-3 incident-desc">
                            Du khách phản ánh đoàn 4 người bị hướng dẫn viên bỏ lại tại điểm dừng Cây Đa Nghìn Năm do đi chậm hơn nhóm chính. HDV không trang bị áo mưa chuyên dụng và bộ đàm cứu hộ dù thời tiết sương mù dày đặc, vi phạm nghiêm trọng an toàn du lịch.
                        </p>

                        <!-- Parties Involved (Du Khách vs Đối Tác) -->
                        <div class="parties-container p-3 rounded-3 bg-light mb-3">
                            <div class="row g-2 align-items-center">
                                <!-- Du Khách -->
                                <div class="col-md-5">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-letter bg-pink text-white">NA</div>
                                        <div>
                                            <div class="d-flex align-items-center gap-2">
                                                <strong class="text-dark font-13">Trần Ngọc Anh</strong>
                                                <span class="badge bg-info-subtle text-info font-10">Du khách Kim Cương</span>
                                            </div>
                                            <small class="text-muted font-11 d-block">
                                                SĐT: 0918.***.211 • Mã đơn: <strong class="text-dark">#BK-DN-9941</strong>
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Transfer Arrow -->
                                <div class="col-md-2 text-center text-muted font-18">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </div>

                                <!-- Đối Tác Vi Phạm -->
                                <div class="col-md-5">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="partner-icon-box bg-danger-subtle text-danger">
                                            <i class="bx bx-building"></i>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center gap-2">
                                                <strong class="text-dark font-13">Trekking Rừng Già Sơn Trà</strong>
                                                <span class="badge bg-danger text-white font-10">Vi phạm lần 2</span>
                                            </div>
                                            <small class="text-muted font-11 d-block">
                                                Ký quỹ: <strong class="text-danger">45.000.000đ</strong> • Uy tín: 78/100
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Attachments & Action Button -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-1">
                            <div class="d-flex flex-wrap align-items-center gap-3 font-12 text-muted">
                                <span><i class="bx bx-image text-pink me-1 font-14"></i> 04 Ảnh hiện trường</span>
                                <span><i class="bx bx-receipt text-primary me-1 font-14"></i> Hóa đơn VNPay 3.400.000đ</span>
                                <span><i class="bx bx-microphone text-purple me-1 font-14"></i> Đoạn chat ghi âm 12m</span>
                            </div>
                            <button class="btn btn-pink-gradient text-white btn-sm rounded-pill px-4 py-2 fw-bold font-13 shadow-sm" @click="openModalXuLyP1">
                                <i class="bx bx-gavel me-1"></i> Xử Lý Ngay Lập Tức
                            </button>
                        </div>
                    </div>

                    <!-- Incident 2: P2 Mức Cao -->
                    <div class="incident-card p-4 rounded-4 bg-white border shadow-sm">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2">
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <span class="badge bg-purple text-white font-11 px-2 py-1 rounded-pill fw-bold">
                                    P2 MỨC CAO
                                </span>
                                <span class="font-monospace text-dark fw-bold font-12">#BC-88208</span>
                                <span class="text-muted font-11">• 3 giờ trước</span>
                                <span class="badge bg-purple-subtle text-purple font-11 rounded-pill px-2">
                                    Đang đối chất giải trình
                                </span>
                            </div>
                            <div class="text-muted">
                                <i class="bx bx-dots-vertical-rounded font-18 cursor-pointer"></i>
                            </div>
                        </div>

                        <h5 class="fw-bold text-dark mb-2 incident-title">
                            Phản ánh điểm phục vụ nước giải khát Đỉnh Bàn Cờ tự ý chặt chém nước dừa 120.000đ/trái không niêm yết
                        </h5>

                        <p class="font-13 text-secondary mb-3 incident-desc">
                            Khách ngoại tỉnh mua 3 trái dừa tại điểm kinh doanh Đỉnh Bàn Cờ bị thu 360.000đ, trong khi khung giá niêm yết quy chuẩn sàn du lịch là 45.000đ/trái. Người bán từ chối cung cấp phiếu thu.
                        </p>

                        <div class="parties-container p-3 rounded-3 bg-light mb-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-5">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-letter bg-primary text-white">LM</div>
                                        <div>
                                            <strong class="text-dark font-13">Lê Minh Tuấn (Hà Nội)</strong>
                                            <small class="text-muted font-11 d-block">Mã chuyến: #TRIP-DN-4402</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center text-muted font-18">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </div>
                                <div class="col-md-5">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="partner-icon-box bg-warning-subtle text-warning">
                                            <i class="bx bx-store-alt"></i>
                                        </div>
                                        <div>
                                            <strong class="text-dark font-13">Quầy Nước Đỉnh Bàn Cờ</strong>
                                            <small class="text-muted font-11 d-block">Ký quỹ: 15.000.000đ • Uy tín: 91/100</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-1">
                            <div class="d-flex flex-wrap align-items-center gap-3 font-12 text-muted">
                                <span><i class="bx bx-video text-primary me-1 font-14"></i> Video quay thanh toán</span>
                                <span class="text-danger fw-semibold"><i class="bx bx-time text-danger me-1 font-14"></i> Hạn phản hồi: 05h 15m</span>
                            </div>
                            <button class="btn btn-outline-purple btn-sm rounded-pill px-4 py-2 fw-semibold font-12" @click="kiemTraGiaiTrinh">
                                Kiểm Tra Giải Trình
                            </button>
                        </div>
                    </div>

                    <!-- Incident 3: P3 Trung Bình -->
                    <div class="incident-card p-4 rounded-4 bg-white border shadow-sm">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2">
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <span class="badge bg-secondary text-white font-11 px-2 py-1 rounded-pill fw-bold">
                                    P3 TRUNG BÌNH
                                </span>
                                <span class="font-monospace text-dark fw-bold font-12">#BC-88215</span>
                                <span class="text-muted font-11">• 5 giờ trước</span>
                                <span class="badge bg-light text-secondary border font-11 rounded-pill px-2">
                                    Chờ xem xét chứng cứ đối tác
                                </span>
                            </div>
                            <div class="text-muted">
                                <i class="bx bx-dots-vertical-rounded font-18 cursor-pointer"></i>
                            </div>
                        </div>

                        <h5 class="fw-bold text-dark mb-2 incident-title">
                            Đối tác Cơm Niêu Phố Cổ phản ánh du khách đe dọa đánh giá 1 sao nhằm mục đích ép miễn phí bữa ăn
                        </h5>

                        <p class="font-13 text-secondary mb-3 incident-desc">
                            Chủ nhà hàng cung cấp camera an ninh và tin nhắn Zalo cho thấy khách hàng đòi hỏi chiết khấu 50% hóa đơn không hợp lý kèm lời đe dọa hạ uy tín nhà hàng trên ứng dụng.
                        </p>

                        <div class="parties-container p-3 rounded-3 bg-light mb-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-5">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="partner-icon-box bg-success-subtle text-success">
                                            <i class="bx bx-restaurant"></i>
                                        </div>
                                        <div>
                                            <strong class="text-dark font-13">Nhà Hàng Cơm Niêu Phố Cổ (Bên Khiếu Nại)</strong>
                                            <small class="text-muted font-11 d-block">Uy tín: 99/100 • Đối tác Kim Cương</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center text-muted font-18">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </div>
                                <div class="col-md-5">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-letter bg-secondary text-white">HQ</div>
                                        <div>
                                            <strong class="text-dark font-13">Khách hàng Hoàng Quân</strong>
                                            <small class="text-muted font-11 d-block">Lịch sử: 02 lần khiếu nại trước đây</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-1">
                            <div class="d-flex flex-wrap align-items-center gap-3 font-12 text-muted">
                                <span><i class="bx bx-camera-home text-success me-1 font-14"></i> CCTV 25 phút trích xuất</span>
                                <span><i class="bx bx-chat text-info me-1 font-14"></i> 8 Ảnh chụp tin nhắn</span>
                            </div>
                            <button class="btn btn-outline-secondary btn-sm rounded-pill px-4 py-2 fw-semibold font-12" @click="xacMinhCamera">
                                Xác Minh Dữ Liệu Camera
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex flex-wrap justify-content-between align-items-center p-3 bg-white rounded-4 border shadow-sm">
                    <span class="text-muted font-12">Hiển thị 3 / 247 biên bản khiếu nại</span>
                    <nav>
                        <ul class="pagination pagination-sm mb-0 custom-pagination">
                            <li class="page-item disabled"><a class="page-link" href="javascript:;"><i class="bx bx-chevron-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="javascript:;">...</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;">25</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:;"><i class="bx bx-chevron-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- RIGHT COLUMN: Sidebar Analytics & Escrow Trust Fund (approx 4 cols) -->
            <div class="col-lg-4 col-xl-4">
                <!-- 1. Bản Đồ Điểm Nóng Tranh Chấp -->
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="red-dot"></span>
                            <h6 class="fw-bold text-dark mb-0 font-13">Bản Đồ Điểm Nóng Tranh Chấp</h6>
                        </div>
                        <span class="badge bg-pink-subtle text-pink font-10 rounded-pill px-2 py-1 fw-bold">
                            Real-time GPS
                        </span>
                    </div>

                    <!-- Stylized Hotspot Map -->
                    <div class="hotspot-map-container rounded-4 position-relative overflow-hidden mb-2">
                        <svg viewBox="0 0 320 180" class="w-100 h-100" preserveAspectRatio="none">
                            <rect width="320" height="180" fill="#bae6fd" />
                            <!-- Peninsula land -->
                            <path d="M0,0 L180,0 Q240,30 260,90 Q220,150 140,160 L0,180 Z" fill="#64748b" opacity="0.8" />
                            <text x="50" y="30" font-size="10" fill="#ffffff" font-weight="600">Hòn Sơn Chà</text>
                            
                            <!-- Danger spot pulse -->
                            <circle cx="160" cy="110" r="18" fill="#ef4444" opacity="0.3">
                                <animate attributeName="r" values="12;24;12" dur="2s" repeatCount="indefinite" />
                            </circle>
                            <circle cx="160" cy="110" r="8" fill="#dc2626" />
                        </svg>

                        <!-- Overlaid Hotspot Pill -->
                        <div class="hotspot-badge-overlay d-flex align-items-center justify-content-between p-2 rounded-3 bg-dark text-white font-11">
                            <span>Bán đảo Sơn Trà & Đỉnh Bàn Cờ</span>
                            <span class="badge bg-danger rounded-pill font-10">2 vụ đang xử lý</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center font-11">
                        <span class="text-muted">Khu vực giám sát trọng điểm du lịch</span>
                        <a href="javascript:;" class="text-primary fw-semibold text-decoration-none" @click="viewRescueStations">
                            Xem 12 trạm cứu hộ
                        </a>
                    </div>
                </div>

                <!-- 2. Quỹ Ký Quỹ Bảo Hộ Du Khách (SmartTrip Trust Fund) -->
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="trust-fund-icon-circle bg-pink-subtle text-pink">
                                <i class="bx bx-shield-alt-2"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0 font-13">Quỹ Ký Quỹ Bảo Hộ Du Khách</h6>
                                <small class="text-muted font-11">SmartTrip Trust Fund</small>
                            </div>
                        </div>
                        <span class="badge bg-pink-subtle text-pink font-10 rounded-pill px-2 py-1 fw-bold">
                            An Toàn 100%
                        </span>
                    </div>

                    <div class="my-2">
                        <span class="text-muted font-11 d-block">Tổng tiền ký quỹ toàn sàn:</span>
                        <h4 class="fw-bold text-dark mb-2">1.250.000.000 đ</h4>
                        
                        <div class="progress rounded-pill bg-light mb-2" style="height: 8px;">
                            <div class="progress-bar bg-pink" style="width: 98.8%"></div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center font-11">
                            <span class="text-danger fw-semibold">Đang khóa trích bồi hoàn: 14.850.000đ</span>
                            <strong class="text-success">Khả dụng: 98.8%</strong>
                        </div>
                    </div>
                </div>

                <!-- 3. Quy tắc ủy thác bồi thường tức thì -->
                <div class="rule-box p-3 rounded-4 mb-3">
                    <div class="d-flex align-items-start gap-2">
                        <i class="bx bx-key text-warning font-18 flex-shrink-0 mt-1"></i>
                        <div>
                            <strong class="text-dark font-12 d-block mb-1">Quy tắc ủy thác bồi thường tức thì:</strong>
                            <p class="font-11 text-secondary mb-0 line-height-sm">
                                Nếu đối tác lữ hành vi phạm cam kết an toàn hoặc tự ý tăng giá &gt;10%, Admin được quyền trực tiếp trích quỹ ký quỹ hoàn trả 100% cho du khách trong 60 phút.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 4. Phân Phối Vi Phạm Theo Nhóm -->
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-dark mb-0 font-12 text-uppercase">PHÂN PHỐI VI PHẠM THEO NHÓM</h6>
                        <span class="text-muted font-11">Tháng 10/2024</span>
                    </div>

                    <!-- Category 1 -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between font-12 mb-1">
                            <span class="text-secondary">Chất lượng phục vụ / HDV</span>
                            <strong class="text-pink">48% (118 vụ)</strong>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar bg-pink" style="width: 48%"></div>
                        </div>
                    </div>

                    <!-- Category 2 -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between font-12 mb-1">
                            <span class="text-secondary">Sai lệch giá / Chặt chém</span>
                            <strong class="text-warning">29% (72 vụ)</strong>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar bg-warning" style="width: 29%"></div>
                        </div>
                    </div>

                    <!-- Category 3 -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between font-12 mb-1">
                            <span class="text-secondary">Trễ giờ / Hủy dịch vụ đột xuất</span>
                            <strong class="text-primary">15% (37 vụ)</strong>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar bg-primary" style="width: 15%"></div>
                        </div>
                    </div>

                    <!-- Category 4 -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between font-12 mb-1">
                            <span class="text-secondary">Khác / Tranh chấp review</span>
                            <strong class="text-secondary">8% (20 vụ)</strong>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar bg-secondary" style="width: 8%"></div>
                        </div>
                    </div>

                    <a href="javascript:;" class="d-block text-center text-pink font-12 fw-bold text-decoration-none pt-2 border-top" @click="viewAuditLog">
                        Xem Toàn Bộ Nhật Ký Kiểm Tra →
                    </a>
                </div>
            </div>
        </div>

        <!-- 5. Modal Xử Lý Sự Cố P1 Khẩn Cấp -->
        <div class="modal fade" id="modalXuLyP1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header bg-danger text-white rounded-top-4">
                        <h5 class="modal-title fw-bold font-16">
                            <i class="bx bx-bolt-circle me-1"></i> Xử Lý Tranh Chấp Cấp Thiết P1 (#BC-88219)
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="alert alert-danger font-13 mb-3">
                            <strong>Hồ sơ:</strong> Bỏ rơi du khách tại Sơn Trà • Đơn hàng: <strong>#BK-DN-9941</strong> • Đối tác: <strong>Trekking Rừng Già Sơn Trà</strong> (Vi phạm lần 2).
                        </div>

                        <h6 class="fw-bold font-13 text-dark mb-2">Biện pháp xử lý & Chế tài cưỡng chế:</h6>
                        <div class="list-group mb-3 font-13">
                            <label class="list-group-item d-flex gap-2 align-items-center">
                                <input class="form-check-input flex-shrink-0 check-pink" type="checkbox" v-model="p1Actions.refund" checked>
                                <span>Trực tiếp trích <strong>3.400.000 đ</strong> từ Quỹ Ký Quỹ hoàn tiền 100% cho du khách Trần Ngọc Anh (trong 15 phút).</span>
                            </label>
                            <label class="list-group-item d-flex gap-2 align-items-center">
                                <input class="form-check-input flex-shrink-0 check-pink" type="checkbox" v-model="p1Actions.fine" checked>
                                <span>Phạt hành chính <strong>5.000.000 đ</strong> hành vi vi phạm an toàn cứu hộ theo Điều 8 Quy chế sàn.</span>
                            </label>
                            <label class="list-group-item d-flex gap-2 align-items-center">
                                <input class="form-check-input flex-shrink-0 check-pink" type="checkbox" v-model="p1Actions.suspendGuide" checked>
                                <span>Đình chỉ thẻ hướng dẫn viên du lịch vi phạm trong 30 ngày trên hệ thống SmartTrip AI.</span>
                            </label>
                            <label class="list-group-item d-flex gap-2 align-items-center">
                                <input class="form-check-input flex-shrink-0 check-pink" type="checkbox" v-model="p1Actions.warningPartner" checked>
                                <span>Gửi công văn cảnh cáo chính thức tới Ban Giám Đốc đối tác lữ hành.</span>
                            </label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold">Nội dung quyết định kỷ luật (Ban hành tới các bên):</label>
                            <textarea class="form-control font-13" rows="3" v-model="p1DecisionText"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-3 bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-pink-gradient text-white rounded-pill px-4 fw-bold" @click="thucThiKyLuat">
                            <i class="bx bx-check-shield me-1"></i> Thực Thi Kỷ Luật & Hoàn Tiền Ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. Modal Quy Trình Xử Lý Tranh Chấp SLA -->
        <div class="modal fade" id="modalSla" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header bg-pink text-white rounded-top-4">
                        <h5 class="modal-title fw-bold font-16">Khung Tiêu Chuẩn Thời Gian Phản Hồi (SLA Commitments)</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light font-12">
                                    <tr>
                                        <th>CẤP ĐỘ (SEVERITY)</th>
                                        <th>THỜI GIAN SLA</th>
                                        <th>ĐỊNH NGHĨA SỰ CỐ</th>
                                        <th>THẨM QUYỀN CAN THIỆP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="badge bg-danger text-white">P1 Khẩn Cấp</span></td>
                                        <td><strong>≤ 4 giờ</strong></td>
                                        <td>Đe dọa an toàn tính mạng, bỏ rơi khách, tai nạn, ngộ độc thực phẩm.</td>
                                        <td>Trực tiếp cưỡng chế trích quỹ ký quỹ hoàn trả 100%.</td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-purple text-white">P2 Mức Cao</span></td>
                                        <td><strong>≤ 12 giờ</strong></td>
                                        <td>Chặt chém giá, hủy dịch vụ sát giờ không bồi thường, gian lận tour.</td>
                                        <td>Hòa giải đối chất, yêu cầu giải trình trong 6h.</td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-secondary text-white">P3 Trung Bình</span></td>
                                        <td><strong>≤ 24 giờ</strong></td>
                                        <td>Tranh chấp đánh giá review, trễ giờ đón trả khách dưới 30 phút.</td>
                                        <td>Xác minh dữ liệu camera, đối soát hệ thống.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-3 bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7. Modal Cấu Hình Bot Tự Động Phân Loại -->
        <div class="modal fade" id="modalBot" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header bg-pink text-white rounded-top-4">
                        <h5 class="modal-title fw-bold font-16">Cấu Hình AI Bot Phân Loại Sự Cố & Khiếu Nại</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input check-pink" type="checkbox" id="botNlp" checked>
                            <label class="form-check-label fw-bold" for="botNlp">NLP Text Analysis (Quét từ khóa độc hại, nguy hiểm)</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input check-pink" type="checkbox" id="botEscrow" checked>
                            <label class="form-check-label fw-bold" for="botEscrow">Auto-Freeze Escrow (Tự động khóa ký quỹ khi có P1)</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input check-pink" type="checkbox" id="botSms" checked>
                            <label class="form-check-label fw-bold" for="botSms">SMS Hotline Dispatcher (Bắn tin khẩn cho Trưởng trạm cứu hộ)</label>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-3 bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-pink-gradient text-white rounded-pill px-4 fw-bold" @click="saveBotConfig">
                            Lưu Cấu Hình AI
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BaoCaoViPhamAdmin',
    data() {
        return {
            filterTab: 'all',
            filterPriority: 'P1',
            p1Actions: {
                refund: true,
                fine: true,
                suspendGuide: true,
                warningPartner: true
            },
            p1DecisionText: 'Căn cứ điều 8 Quy chế vận hành SmartTrip Đà Nẵng, xét thấy hành vi của HDV thuộc đối tác Trekking Rừng Già Sơn Trà vi phạm an toàn du khách. Ban Quản Trị quyết định trích 3.400.000đ hoàn trả du khách Trần Ngọc Anh và áp dụng mức phạt 5.000.000đ từ quỹ ký quỹ đối tác.'
        };
    },
    methods: {
        focusP1() {
            this.filterPriority = 'P1';
            this.$nextTick(() => {
                if (this.$refs.cardP1) {
                    this.$refs.cardP1.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        },
        togglePriority(p) {
            this.filterPriority = this.filterPriority === p ? '' : p;
        },
        openModalXuLyP1() {
            const modalEl = document.getElementById('modalXuLyP1');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        thucThiKyLuat() {
            alert('✅ ĐÃ THỰC THI QUYẾT ĐỊNH KỶ LUẬT THÀNH CÔNG!\n\n- Đã trích 3.400.000đ từ Quỹ ký quỹ chuyển khoản hoàn trả du khách Trần Ngọc Anh.\n- Đã trừ 5.000.000đ tiền phạt vi phạm an toàn đối tác.\n- Đã gửi thông báo cảnh cáo pháp lý.');
            const modalEl = document.getElementById('modalXuLyP1');
            if (modalEl && window.bootstrap) {
                const modal = window.bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }
        },
        kiemTraGiaiTrinh() {
            alert('Hồ sơ #BC-88208: Đã gửi yêu cầu đối tác xuất trình hóa đơn nhập hàng nước dừa và biên bản niêm yết giá. Hạn chót còn: 05 giờ 15 phút.');
        },
        xacMinhCamera() {
            alert('Hồ sơ #BC-88215: Đã trích xuất 25 phút video CCTV tại Nhà Hàng Cơm Niêu Phố Cổ. Đang đối chiếu hành vi thực tế.');
        },
        openSlaModal() {
            const modalEl = document.getElementById('modalSla');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        openBotModal() {
            const modalEl = document.getElementById('modalBot');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        saveBotConfig() {
            alert('Đã cập nhật các tham số phân loại tự động của AI Bot!');
            const modalEl = document.getElementById('modalBot');
            if (modalEl && window.bootstrap) {
                const modal = window.bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }
        },
        xuatBaoCao() {
            alert('Đang trích xuất toàn bộ báo cáo vi phạm và đối soát quỹ bồi hoàn tháng 10/2024...');
        },
        viewRescueStations() {
            alert('Hiển thị 12 trạm cứu hộ & cứu nạn bờ biển Đà Nẵng - Sơn Trà trên bản đồ số.');
        },
        viewAuditLog() {
            alert('Mở nhật ký thanh tra và lịch sử xử lý vi phạm đối tác.');
        }
    }
};
</script>

<style scoped>
.admin-page-container {
    padding: 6px 2px 24px;
    font-family: inherit;
}

/* 1. Top Alert Banner */
.sla-alert-banner {
    background-color: #fff1f2;
    border: 1px solid #fecdd3;
}
.red-pulse-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #e11d48;
    box-shadow: 0 0 0 3px rgba(225, 29, 72, 0.25);
    display: inline-block;
}

/* 2. Header */
.badge-hub-pink {
    background: #fff1f2;
    color: #e11d48;
    border: 1px solid #fecdd3;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
}
.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.3px;
}
.header-desc {
    max-width: 900px;
    line-height: 1.5;
}

/* Buttons */
.btn-soft-purple {
    background-color: #f5f3ff;
    color: #6366f1;
    border: 1px solid #e0e7ff;
    transition: all 0.2s;
}
.btn-soft-purple:hover {
    background-color: #ede9fe;
    color: #4f46e5;
}
.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #be123c 100%);
    border: none;
    box-shadow: 0 3px 10px rgba(225, 29, 72, 0.25);
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}
.btn-pink-gradient:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(225, 29, 72, 0.35);
}
.btn-outline-purple {
    color: #7e22ce;
    border-color: #d8b4fe;
    background-color: #ffffff;
}
.btn-outline-purple:hover {
    background-color: #faf5ff;
    color: #6b21a8;
}

.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.text-purple { color: #9333ea !important; }
.bg-purple { background-color: #9333ea !important; }

/* 3. KPI Cards */
.kpi-card {
    border-color: #f1f5f9 !important;
    transition: transform 0.2s;
}
.kpi-card:hover {
    transform: translateY(-2px);
}
.kpi-label {
    font-size: 0.72rem;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.5px;
    display: block;
    margin-bottom: 2px;
}
.kpi-value {
    font-size: 1.85rem;
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.5px;
}
.kpi-icon-box {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.bg-pink-subtle { background-color: #fff1f2; }
.bg-purple-subtle { background-color: #faf5ff; }
.bg-primary-subtle { background-color: #eff6ff; }
.bg-danger-subtle { background-color: #fef2f2; }

/* 4. Filter Tabs */
.filter-tab-pill {
    border: 1px solid #f1f5f9;
    background-color: #ffffff;
    color: #64748b;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 999px;
    transition: all 0.15s ease;
}
.filter-tab-pill.active {
    background-color: #e11d48;
    color: #ffffff;
    border-color: #e11d48;
}

.badge-priority {
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 999px;
    border: 1px solid transparent;
    cursor: pointer;
    transition: all 0.15s;
}
.p1-btn {
    background-color: #fff1f2;
    color: #e11d48;
    border-color: #fecdd3;
}
.p1-btn.active {
    background-color: #e11d48;
    color: #ffffff;
}
.p2-btn {
    background-color: #faf5ff;
    color: #7e22ce;
    border-color: #f3e8ff;
}
.p2-btn.active {
    background-color: #7e22ce;
    color: #ffffff;
}
.p3-btn {
    background-color: #f8fafc;
    color: #64748b;
    border-color: #e2e8f0;
}
.p3-btn.active {
    background-color: #64748b;
    color: #ffffff;
}

/* 5. Incident Cards */
.incident-card {
    border-color: #f1f5f9 !important;
    transition: transform 0.2s, box-shadow 0.2s;
}
.incident-card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05) !important;
}
.incident-title {
    font-size: 1.05rem;
    line-height: 1.35;
    letter-spacing: -0.2px;
}
.incident-desc {
    line-height: 1.5;
}

/* Parties box */
.parties-container {
    background-color: #f8fafc;
    border: 1px solid #f1f5f9;
}
.avatar-letter {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.82rem;
    font-weight: 700;
    flex-shrink: 0;
}
.partner-icon-box {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
    flex-shrink: 0;
}

/* Pagination */
.custom-pagination .page-link {
    color: #64748b;
    border: none;
    font-size: 0.8rem;
    font-weight: 600;
    border-radius: 6px;
    margin: 0 2px;
}
.custom-pagination .page-item.active .page-link {
    background-color: #e11d48;
    color: #ffffff;
}

/* Right Column Cards */
.red-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #ef4444;
    display: inline-block;
}
.hotspot-map-container {
    height: 140px;
    background-color: #bae6fd;
}
.hotspot-badge-overlay {
    position: absolute;
    bottom: 8px;
    left: 8px;
    right: 8px;
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(2px);
}
.trust-fund-icon-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
    flex-shrink: 0;
}
.rule-box {
    background-color: #fffbeb;
    border: 1px solid #fef3c7;
}
.line-height-sm {
    line-height: 1.45;
}

.check-pink:checked {
    background-color: #e11d48;
    border-color: #e11d48;
}

.cursor-pointer { cursor: pointer; }
.font-10 { font-size: 0.68rem; }
.font-11 { font-size: 0.72rem; }
.font-12 { font-size: 0.78rem; }
.font-13 { font-size: 0.82rem; }
.font-14 { font-size: 0.88rem; }
.font-16 { font-size: 1rem; }
.font-18 { font-size: 1.15rem; }
.font-20 { font-size: 1.25rem; }
.font-22 { font-size: 1.35rem; }
</style>
