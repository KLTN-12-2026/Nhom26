<template>
    <div class="partner-don-hang-container">
        <!-- 1. Header Banner -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                ĐIỀU HÀNH & ĐẶT CHỖ
                            </span>
                            <span class="text-muted small">/ Cổng Kiểm Soát Vé Điện Tử</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Quản Lý Đơn Hàng & Đặt Chỗ Du Khách</h3>
                        <p class="text-muted small mb-0">
                            Theo dõi trạng thái đơn đặt tour, kiểm tra biên lai thanh toán tự động và kiểm soát vé điện tử QR check-in trực tiếp tại cảng và điểm đón khách.
                        </p>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-dark-teal rounded-3 px-3 py-2 fw-semibold" @click="moModalScanQR">
                            <i class="bx bx-qr-scan me-1 font-18 align-middle"></i> Quét Mã QR Check-in
                        </button>
                        <button class="btn btn-outline-pink rounded-3 px-3 py-2 fw-semibold" @click="xuatExcel">
                            <i class="bx bx-download me-1 font-18 align-middle"></i> Xuất Báo Cáo Booking (Excel)
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. 5 Summary KPI Cards -->
        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-5 g-3 mb-4">
            <div class="col">
                <div class="kpi-card p-3 rounded-4 shadow-sm bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="kpi-title text-muted">TỔNG ĐƠN HÀNG</span>
                        <div class="kpi-icon-circle bg-pink-light text-pink"><i class="bx bx-receipt"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline gap-1">
                        <h3 class="fw-bold mb-0 text-dark">142</h3>
                        <span class="text-muted small">đơn</span>
                    </div>
                    <div class="kpi-subtext mt-1 text-pink fw-semibold">GMV 485.6M đ</div>
                </div>
            </div>

            <div class="col">
                <div class="kpi-card p-3 rounded-4 shadow-sm bg-white h-100 border-start-pink">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="kpi-title text-muted">CHỜ XÁC NHẬN</span>
                        <div class="kpi-icon-circle bg-warning-light text-warning"><i class="bx bx-hourglass"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline gap-1">
                        <h3 class="fw-bold mb-0 text-warning">16</h3>
                        <span class="text-muted small">đơn cần duyệt</span>
                    </div>
                    <div class="kpi-subtext mt-1 text-danger fw-semibold">42.8M đ (2h tới)</div>
                </div>
            </div>

            <div class="col">
                <div class="kpi-card p-3 rounded-4 shadow-sm bg-white h-100 border-start-pink">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="kpi-title text-muted">ĐÃ THANH TOÁN</span>
                        <div class="kpi-icon-circle bg-info-light text-info"><i class="bx bx-shield-check"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline gap-1">
                        <h3 class="fw-bold mb-0 text-dark">118</h3>
                        <span class="badge bg-success-subtle text-success ms-1 font-11">100% full cọc</span>
                    </div>
                    <div class="kpi-subtext mt-1 text-muted">412.3M đ</div>
                </div>
            </div>

            <div class="col">
                <div class="kpi-card p-3 rounded-4 shadow-sm bg-white h-100 border-start-pink">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="kpi-title text-muted">HOÀN THÀNH TOUR</span>
                        <div class="kpi-icon-circle bg-success-light text-success"><i class="bx bx-check-circle"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline gap-1">
                        <h3 class="fw-bold mb-0 text-success">08</h3>
                        <span class="badge bg-success-subtle text-success ms-1 font-11">100% CSAT</span>
                    </div>
                    <div class="kpi-subtext mt-1 text-warning fw-semibold">Đánh giá 5.0 ★</div>
                </div>
            </div>

            <div class="col">
                <div class="kpi-card p-3 rounded-4 shadow-sm bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="kpi-title text-muted">ĐÃ HỦY / HOÀN</span>
                        <div class="kpi-icon-circle bg-light text-muted"><i class="bx bx-x-circle"></i></div>
                    </div>
                    <div class="d-flex align-items-baseline gap-1">
                        <h3 class="fw-bold mb-0 text-secondary">00</h3>
                        <span class="text-muted small">đơn</span>
                    </div>
                    <div class="kpi-subtext mt-1 text-muted">Tỷ lệ hủy: 0.0%</div>
                </div>
            </div>
        </div>

        <!-- 3. Filter Navigation & Inputs -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-3 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pb-3 border-bottom">
                <div class="d-flex flex-wrap gap-2 status-filter-tabs">
                    <button class="filter-tab-btn" :class="{ 'active': activeTab === 'all' }" @click="activeTab = 'all'">
                        Tất cả (142)
                    </button>
                    <button class="filter-tab-btn" :class="{ 'active': activeTab === 'pending' }" @click="activeTab = 'pending'">
                        Cần xử lý ngay <span class="badge bg-pink text-white ms-1">16</span>
                    </button>
                    <button class="filter-tab-btn" :class="{ 'active': activeTab === 'paid' }" @click="activeTab = 'paid'">
                        Đã thanh toán (118)
                    </button>
                    <button class="filter-tab-btn" :class="{ 'active': activeTab === 'completed' }" @click="activeTab = 'completed'">
                        Hoàn thành tour (8)
                    </button>
                </div>
                <div class="live-sync-indicator text-muted small d-flex align-items-center gap-2">
                    <span>Đồng bộ tự động:</span>
                    <span class="badge bg-success-subtle text-success fw-bold d-flex align-items-center gap-1">
                        <span class="dot-live"></span> Live Stream (15s)
                    </span>
                </div>
            </div>

            <!-- Filters input row -->
            <div class="row g-2 pt-3 align-items-center">
                <div class="col-md-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo mã đơn #HD-, tên khách, số điện thoại...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterTour">
                        <option value="">Tất cả Tour Tuyến (8 tour)</option>
                        <option value="halong">Du Thuyền Hạ Long 5 Sao 2N1Đ</option>
                        <option value="trangan">Tour Tràng An Bái Đính 1N VIP</option>
                        <option value="sapa">Thuê xe máy phượt & Trekking Fansipan</option>
                        <option value="phuquoc">Tour Phú Quốc Sunset 4N3Đ Trọn Gói</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select form-select-sm" v-model="filterGate">
                        <option value="">Cổng thanh toán</option>
                        <option value="vnpay">VNPAY QR</option>
                        <option value="momo">MoMo</option>
                        <option value="vietqr">VietQR Pro</option>
                    </select>
                </div>
                <div class="col-md-3 text-end">
                    <div class="date-badge-pill">
                        <i class="bx bx-calendar text-pink me-1"></i> Hôm nay & Ngày mai [17 - 18/05]
                        <i class="bx bx-slider ms-2 text-muted"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Main Two-Column Layout (Danh sách đơn đặt + E-Ticket Preview) -->
        <div class="row g-4">
            <!-- Left Column: Booking Orders List -->
            <div class="col-xl-7">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fw-bold text-dark mb-0">
                        Danh Sách Lệnh Đặt Chỗ <span class="badge bg-light text-dark font-12 ms-1">142</span>
                    </h6>
                    <div class="small text-muted">
                        Sắp xếp: <strong class="text-dark cursor-pointer">Gần giờ khởi hành nhất <i class="bx bx-chevron-down"></i></strong>
                    </div>
                </div>

                <div class="orders-list d-flex flex-column gap-3">
                    <!-- Order Item 1 -->
                    <div class="card order-item-card p-3 rounded-4 shadow-sm" :class="{ 'selected': selectedOrder.id === 'HD-892410' }" @click="selectOrder(orders[0])">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-pink text-white fw-bold">#HD-892410</span>
                                <span class="badge bg-success-subtle text-success font-11">● Đã xác nhận / Chờ đón khách</span>
                            </div>
                            <span class="text-muted small">08:15 Sáng nay</span>
                        </div>
                        <div class="d-flex gap-3 align-items-start">
                            <div class="tour-icon-box bg-pink-light text-pink">
                                <i class="bx bx-ship fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold text-dark mb-1">Du Thuyền Hạ Long 5 Sao 2N1Đ</h6>
                                <div class="text-muted small mb-2">
                                    Lê Tuấn Kiệt · 0918.423.889 · <span class="badge bg-light text-dark">2L 1TE</span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-between pt-2 border-top gap-2">
                                    <div class="small text-muted">
                                        <i class="bx bx-map-pin text-pink me-1"></i> Điểm đón: <strong>Cảng Tuần Châu Ô 12</strong> (11:30 Trưa)
                                    </div>
                                    <div class="text-pink font-12 fw-bold d-flex align-items-center">
                                        E-Ticket: Sẵn Sàng <i class="bx bx-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end ps-2">
                                <div class="h5 fw-bold text-dark mb-0">14.850.000 đ</div>
                                <div class="font-10 text-muted">VNPAY QR <span class="text-danger">-500k Voucher</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Item 2 (Chờ duyệt) -->
                    <div class="card order-item-card p-3 rounded-4 shadow-sm" :class="{ 'selected': selectedOrder.id === 'HD-892409' }" @click="selectOrder(orders[1])">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-pink text-white fw-bold">#HD-892409</span>
                                <span class="badge bg-warning text-dark font-11">● Chờ xác nhận (còn 1h45p)</span>
                            </div>
                            <span class="text-muted small">07:50 Sáng nay</span>
                        </div>
                        <div class="d-flex gap-3 align-items-start">
                            <div class="tour-icon-box bg-warning-light text-warning">
                                <i class="bx bx-compass fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold text-dark mb-1">Tour Tràng An Bái Đính 1N VIP</h6>
                                <div class="text-muted small mb-2">
                                    Nguyễn Thị Mai Anh · 0973.112.504 · <span class="badge bg-light text-dark">4 Người Lớn</span>
                                </div>
                                <div class="p-2 bg-light-warning rounded-3 small text-warning-emphasis d-flex align-items-center justify-content-between">
                                    <span><i class="bx bx-info-circle me-1"></i> Khách đã chuyển khoản thành công, chờ đối soát về tài khoản</span>
                                    <button class="btn btn-pink-dark btn-sm px-3 py-1 rounded-pill" @click.stop="duyetDon(orders[1])">Duyệt Ngay</button>
                                </div>
                            </div>
                            <div class="text-end ps-2">
                                <div class="h5 fw-bold text-dark mb-0">3.800.000 đ</div>
                                <div class="font-10 text-muted">MOMO ĐỐI SOÁT</div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Item 3 -->
                    <div class="card order-item-card p-3 rounded-4 shadow-sm" :class="{ 'selected': selectedOrder.id === 'HD-892408' }" @click="selectOrder(orders[2])">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-pink text-white fw-bold">#HD-892408</span>
                                <span class="badge bg-info-subtle text-info font-11">● Đã xác nhận</span>
                            </div>
                            <span class="text-muted small">Hôm qua 21:40</span>
                        </div>
                        <div class="d-flex gap-3 align-items-start">
                            <div class="tour-icon-box bg-info-light text-info">
                                <i class="bx bx-walk fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold text-dark mb-1">Thuê xe máy phượt & Trekking Fansipan</h6>
                                <div class="text-muted small mb-2">
                                    Trần Minh Hoàng · 0904.551.980 · <span class="badge bg-light text-dark">2 Người Lớn</span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-between pt-2 border-top gap-2">
                                    <div class="small text-muted">
                                        <i class="bx bx-map-pin text-pink me-1"></i> Điểm hẹn: Khách sạn De La Coupole Sa Pa
                                    </div>
                                    <div class="text-muted font-11">Vé Check-in: #TK-892408</div>
                                </div>
                            </div>
                            <div class="text-end ps-2">
                                <div class="h5 fw-bold text-dark mb-0">5.400.000 đ</div>
                                <div class="font-10 text-muted">VIETQR PRO</div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Item 4 -->
                    <div class="card order-item-card p-3 rounded-4 shadow-sm" :class="{ 'selected': selectedOrder.id === 'HD-892407' }" @click="selectOrder(orders[3])">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-pink text-white fw-bold">#HD-892407</span>
                                <span class="badge bg-info-subtle text-info font-11">● Đã xác nhận</span>
                            </div>
                            <span class="text-muted small">Hôm qua 18:22</span>
                        </div>
                        <div class="d-flex gap-3 align-items-start">
                            <div class="tour-icon-box bg-success-light text-success">
                                <i class="bx bx-sun fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold text-dark mb-1">Tour Phú Quốc Sunset 4N3Đ Trọn Gói</h6>
                                <div class="text-muted small mb-2">
                                    Phạm Bảo Châu · 0982.776.321 · <span class="badge bg-light text-dark">2L 2TE</span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-between pt-2 border-top gap-2">
                                    <div class="small text-muted">
                                        <i class="bx bx-plane text-pink me-1"></i> Khởi hành: Sân bay Tân Sơn Nhất → Phú Quốc
                                    </div>
                                    <div class="text-muted font-11">Vé Check-in: #TK-892407</div>
                                </div>
                            </div>
                            <div class="text-end ps-2">
                                <div class="h5 fw-bold text-dark mb-0">22.600.000 đ</div>
                                <div class="font-10 text-muted">VNPAY GATE</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex flex-wrap align-items-center justify-content-between mt-4 gap-2">
                    <span class="small text-muted">Hiển thị <strong>1 - 4</strong> của <strong>142</strong> kết quả đặt chỗ</span>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">‹</a></li>
                            <li class="page-item active"><a class="page-link bg-pink border-pink" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">36</a></li>
                            <li class="page-item"><a class="page-link" href="#">›</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Right Column: E-Ticket & Order Details Panel (Giống hệt nửa phải hình mẫu) -->
            <div class="col-xl-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 e-ticket-panel bg-white sticky-top" style="top: 80px;">
                    <div class="d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
                        <div>
                            <small class="text-muted text-uppercase fw-bold font-11">CHI TIẾT ĐƠN HÀNG & VÉ ĐIỆN TỬ</small>
                            <h5 class="fw-bold text-dark mb-0">E-Ticket #{{ selectedOrder.id }}</h5>
                        </div>
                        <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill fw-bold">● HỢP LỆ</span>
                    </div>

                    <!-- Big QR Code Container -->
                    <div class="text-center p-4 bg-light rounded-4 mb-3 border">
                        <div class="qr-box mx-auto mb-3 p-3 bg-white rounded-3 shadow-sm d-inline-block">
                            <!-- Visual Stylized QR Code SVG -->
                            <svg viewBox="0 0 160 160" width="140" height="140">
                                <rect width="160" height="160" fill="#FFFFFF"/>
                                <!-- Top-left finder -->
                                <rect x="10" y="10" width="40" height="40" fill="#000"/>
                                <rect x="18" y="18" width="24" height="24" fill="#FFF"/>
                                <rect x="24" y="24" width="12" height="12" fill="#E11D48"/>
                                <!-- Top-right finder -->
                                <rect x="110" y="10" width="40" height="40" fill="#000"/>
                                <rect x="118" y="18" width="24" height="24" fill="#FFF"/>
                                <rect x="124" y="24" width="12" height="12" fill="#0284C7"/>
                                <!-- Bottom-left finder -->
                                <rect x="10" y="110" width="40" height="40" fill="#000"/>
                                <rect x="18" y="118" width="24" height="24" fill="#FFF"/>
                                <rect x="24" y="124" width="12" height="12" fill="#166534"/>
                                <!-- Data pixels -->
                                <rect x="60" y="20" width="10" height="10" fill="#000"/>
                                <rect x="80" y="30" width="10" height="10" fill="#E11D48"/>
                                <rect x="60" y="60" width="20" height="10" fill="#000"/>
                                <rect x="90" y="60" width="10" height="20" fill="#000"/>
                                <rect x="70" y="90" width="20" height="20" fill="#0284C7"/>
                                <rect x="110" y="90" width="10" height="10" fill="#000"/>
                                <rect x="130" y="80" width="10" height="10" fill="#000"/>
                                <rect x="110" y="120" width="20" height="10" fill="#000"/>
                                <rect x="130" y="130" width="20" height="20" fill="#E11D48"/>
                            </svg>
                        </div>
                        <div class="fw-bold text-dark font-13 letter-spacing-1">TICKET-HL-892410-OK</div>
                        <small class="text-muted d-block font-11">Quét tại cổng đón tàu du lịch âu tàu Tuần Châu</small>
                        <button class="btn btn-outline-pink btn-sm rounded-pill mt-2 px-3 fw-semibold" @click="kiemTraVe">
                            <i class="bx bx-check-shield me-1"></i> Kiểm Tra Tính Hợp Lệ Vé
                        </button>
                    </div>

                    <!-- Customer Contact Box -->
                    <div class="p-3 bg-light rounded-4 mb-3 border">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-circle-green">LK</div>
                                <div>
                                    <div class="fw-bold text-dark font-13">{{ selectedOrder.customer }} <span class="badge bg-warning text-dark font-10">VIP Gold</span></div>
                                    <small class="text-muted font-11">CCCD: 031094002819</small>
                                </div>
                            </div>
                            <div class="d-flex gap-1">
                                <a :href="'tel:' + selectedOrder.phone" class="btn btn-sm btn-light border rounded-circle"><i class="bx bx-phone text-success"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-light border rounded-circle"><i class="bx bx-message-rounded-dots text-primary"></i></a>
                            </div>
                        </div>
                        <div class="row g-2 small text-muted pt-2 border-top">
                            <div class="col-6">Số điện thoại:<br><strong class="text-dark">{{ selectedOrder.phone }}</strong></div>
                            <div class="col-6">Email xác nhận:<br><strong class="text-dark text-truncate d-block">tuankiet.le@gmail.com</strong></div>
                        </div>
                    </div>

                    <!-- Pickup Schedule -->
                    <div class="mb-3">
                        <small class="text-muted fw-bold font-11 text-uppercase">LỊCH TRÌNH ĐÓN & DỊCH VỤ</small>
                        <div class="d-flex align-items-start gap-2 mt-2 p-2 bg-light rounded-3">
                            <i class="bx bx-map-pin text-pink mt-1 fs-5"></i>
                            <div>
                                <strong class="text-dark font-12 d-block">Cảng Tuần Châu Ô 12, Hạ Long</strong>
                                <small class="text-muted">Giờ lên du thuyền: 11:30 - 12:15 Trưa ngày 17/05/2026</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-2 mt-2 p-2 bg-light rounded-3">
                            <i class="bx bx-bus text-success mt-1 fs-5"></i>
                            <div>
                                <strong class="text-dark font-12 d-block">Xe Limousine Đón Tận Nơi</strong>
                                <small class="text-muted">Đón lúc 08:30 tại Khách Sạn Melia Lý Thường Kiệt, Hoàn Kiếm, HN</small>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Breakdown -->
                    <div class="billing-summary p-3 bg-light rounded-4 mb-3 border">
                        <small class="text-muted fw-bold font-11 text-uppercase d-block mb-2">CHI TIẾT HÓA ĐƠN QUYẾT TOÁN</small>
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Giá gốc Tour Hạ Long 5* (2 Người Lớn):</span>
                            <span class="text-dark fw-semibold">12.800.000 đ</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Phụ thu trẻ em (1 Trẻ em 6 tuổi):</span>
                            <span class="text-dark fw-semibold">1.550.000 đ</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Dịch vụ Limousine VIP đưa đón 2 chiều:</span>
                            <span class="text-dark fw-semibold">1.000.000 đ</span>
                        </div>
                        <div class="d-flex justify-content-between small text-danger mb-2">
                            <span>Mã giảm giá LOTUS500:</span>
                            <span class="fw-bold">-500.000 đ</span>
                        </div>
                        <div class="d-flex justify-content-between pt-2 border-top align-items-center">
                            <span class="fw-bold text-dark font-13">Tổng Thực Thu (Đã cọc 100%):</span>
                            <span class="h5 fw-bold text-pink mb-0">14.850.000 đ</span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex flex-column gap-2">
                        <button class="btn btn-emerald-action py-2 rounded-3 fw-bold text-white shadow-sm" @click="checkinKhach">
                            <i class="bx bx-check-circle me-1"></i> Xác Nhận Đón Khách (Check-in Ngay)
                        </button>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary flex-grow-1 rounded-3 btn-sm" @click="inPhieu">
                                <i class="bx bx-printer me-1"></i> In Phiếu Thu
                            </button>
                            <button class="btn btn-outline-danger flex-grow-1 rounded-3 btn-sm" @click="huyDon">
                                <i class="bx bx-x-circle me-1"></i> Hủy / Hoàn Tiền
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DoiTacDonHang',
    data() {
        return {
            activeTab: 'all',
            searchQuery: '',
            filterTour: '',
            filterGate: '',
            orders: [
                {
                    id: 'HD-892410',
                    tour: 'Du Thuyền Hạ Long 5 Sao 2N1Đ',
                    customer: 'Lê Tuấn Kiệt',
                    phone: '0918.423.889',
                    guests: '2L 1TE',
                    total: 14850000,
                    status: 'confirmed',
                    time: '08:15 Sáng nay'
                },
                {
                    id: 'HD-892409',
                    tour: 'Tour Tràng An Bái Đính 1N VIP',
                    customer: 'Nguyễn Thị Mai Anh',
                    phone: '0973.112.504',
                    guests: '4 Người Lớn',
                    total: 3800000,
                    status: 'pending',
                    time: '07:50 Sáng nay'
                },
                {
                    id: 'HD-892408',
                    tour: 'Thuê xe máy phượt & Trekking Fansipan',
                    customer: 'Trần Minh Hoàng',
                    phone: '0904.551.980',
                    guests: '2 Người Lớn',
                    total: 5400000,
                    status: 'confirmed',
                    time: 'Hôm qua 21:40'
                },
                {
                    id: 'HD-892407',
                    tour: 'Tour Phú Quốc Sunset 4N3Đ Trọn Gói',
                    customer: 'Phạm Bảo Châu',
                    phone: '0982.776.321',
                    guests: '2L 2TE',
                    total: 22600000,
                    status: 'confirmed',
                    time: 'Hôm qua 18:22'
                }
            ],
            selectedOrder: {
                id: 'HD-892410',
                tour: 'Du Thuyền Hạ Long 5 Sao 2N1Đ',
                customer: 'Lê Tuấn Kiệt',
                phone: '0918.423.889'
            }
        }
    },
    methods: {
        selectOrder(order) {
            this.selectedOrder = order;
        },
        duyetDon(order) {
            order.status = 'confirmed';
            alert(`Đã duyệt đơn hàng #${order.id} thành công!`);
        },
        checkinKhach() {
            alert(`Xác nhận đón khách thành công cho vé #${this.selectedOrder.id}`);
        },
        kiemTraVe() {
            alert(`Vé #${this.selectedOrder.id} hợp lệ và sẵn sàng khởi hành.`);
        },
        inPhieu() {
            window.print();
        },
        huyDon() {
            if (confirm(`Bạn có chắc muốn hủy đơn #${this.selectedOrder.id}?`)) {
                alert('Đã gửi yêu cầu hoàn hủy.');
            }
        },
        moModalScanQR() {
            alert('Mở camera quét QR Code Check-in du khách');
        },
        xuatExcel() {
            alert('Đang xuất danh sách đơn đặt chỗ sang định dạng Excel...');
        }
    }
}
</script>

<style scoped>
/* Tone màu hồng chủ đạo (Rose / Pink) */
.bg-pink {
    background-color: #e11d48 !important;
}

.text-pink {
    color: #e11d48 !important;
}

.border-pink {
    border-color: #e11d48 !important;
}

.bg-pink-light {
    background-color: #ffe4e6 !important;
}

.btn-outline-pink {
    border: 1px solid #fecdd3;
    color: #e11d48;
    background-color: #ffffff;
    transition: all 0.2s;
}

.btn-outline-pink:hover {
    background-color: #fff1f2;
    border-color: #e11d48;
    color: #be123c;
}

.btn-pink-dark {
    background-color: #be123c;
    color: #ffffff;
    border: none;
    font-size: 0.75rem;
    font-weight: 700;
}

.btn-pink-dark:hover {
    background-color: #9f1239;
    color: #ffffff;
}

.border-start-pink {
    border-left: 3px solid #e11d48;
}

/* Dark teal & Emerald actions */
.btn-dark-teal {
    background-color: #064e3b;
    color: #a7f3d0;
    border: none;
    transition: all 0.2s;
}

.btn-dark-teal:hover {
    background-color: #022c22;
    color: #ffffff;
}

.btn-emerald-action {
    background: linear-gradient(135deg, #059669 0%, #10b981 100%);
    border: none;
    transition: transform 0.15s ease;
}

.btn-emerald-action:hover {
    transform: translateY(-1px);
}

/* KPI cards */
.kpi-title {
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.4px;
}

.kpi-icon-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.kpi-subtext {
    font-size: 0.75rem;
}

/* Filter tabs */
.filter-tab-btn {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #475569;
    cursor: pointer;
    transition: all 0.15s ease;
}

.filter-tab-btn:hover {
    background-color: #f8fafc;
    border-color: #cbd5e1;
}

.filter-tab-btn.active {
    background-color: #0f172a;
    color: #ffffff;
    border-color: #0f172a;
}

.dot-live {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #22c55e;
}

.date-badge-pill {
    display: inline-flex;
    align-items: center;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    padding: 4px 12px;
    border-radius: 999px;
    font-size: 0.75rem;
    color: #334155;
    font-weight: 600;
}

/* Orders List */
.order-item-card {
    border: 1px solid #f1f5f9;
    cursor: pointer;
    transition: all 0.2s ease;
}

.order-item-card:hover {
    border-color: #fecdd3;
    box-shadow: 0 4px 14px rgba(225, 29, 72, 0.08) !important;
}

.order-item-card.selected {
    border: 2px solid #e11d48;
    background-color: #fffbfb;
}

.tour-icon-box {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.avatar-circle-green {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #064e3b;
    color: #a7f3d0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.8rem;
    flex-shrink: 0;
}

.e-ticket-panel {
    border: 1px solid #f1f5f9;
}
</style>
