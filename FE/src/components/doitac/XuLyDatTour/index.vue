<template>
    <div class="partner-xu-ly-dat-tour-page">
        <!-- 1. Header Banner & Actions -->
        <div class="page-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="header-icon-circle bg-pink-gradient text-white shadow-sm">
                        <i class="bx bx-receipt font-24"></i>
                    </div>
                    <div>
                        <h2 class="page-title mb-1">Quản Lý & Xử Lý Yêu Cầu Đặt Tour</h2>
                        <p class="page-desc text-muted mb-0">
                            Tiếp nhận đơn đặt tour mới, xác nhận giữ chỗ, duyệt xuất vé điện tử hoặc từ chối kèm lý do theo quy định.
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <div class="urgent-alert-pill d-flex align-items-center gap-2 px-3 py-2 rounded-pill">
                        <span class="status-dot-pulse bg-danger"></span>
                        <span class="font-12 fw-bold text-pink">Có {{ demDonChoDuyet }} đơn chờ xác nhận cần duyệt ngay!</span>
                    </div>
                    <button class="btn btn-purple-gradient text-white px-3 py-2 rounded-3 fw-bold font-13 shadow-sm" type="button" @click="moModalScanQR">
                        <i class="bx bx-qr-scan me-1 font-16 align-middle"></i> Quét Mã Check-in
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. 4 KPI Metric Cards -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: CHỜ XÁC NHẬN -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label text-pink">CHỜ XÁC NHẬN (DAT_TOUR)</span>
                            <div class="d-flex align-items-center gap-2">
                                <span class="kpi-value text-dark">05</span>
                                <span class="badge bg-pink-light text-pink rounded-pill px-2 py-1 font-11 fw-bold">
                                    Gấp • Giữ chỗ
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-hourglass"></i>
                        </div>
                    </div>
                    <div class="font-11 text-muted">
                        Cần xử lý trước thời hạn giữ chỗ
                    </div>
                </div>
            </div>

            <!-- Metric 2: ĐÃ XÁC NHẬN -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">ĐÃ XÁC NHẬN</span>
                            <div class="d-flex align-items-center gap-2">
                                <span class="kpi-value text-dark">42</span>
                                <span class="badge bg-purple-light text-purple rounded-pill px-2 py-1 font-11 fw-bold">
                                    Sẵn sàng đi
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-purple">
                            <i class="bx bx-check-shield"></i>
                        </div>
                    </div>
                    <div class="font-11 text-muted">
                        Đã cọc / thanh toán thành công
                    </div>
                </div>
            </div>

            <!-- Metric 3: ĐÃ HOÀN THÀNH -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">ĐÃ HOÀN THÀNH</span>
                            <div class="d-flex align-items-center gap-2">
                                <span class="kpi-value text-dark">186</span>
                                <span class="badge bg-cyan-light text-cyan rounded-pill px-2 py-1 font-11 fw-bold">
                                    +14% tuần
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-cyan">
                            <i class="bx bx-check-circle"></i>
                        </div>
                    </div>
                    <div class="font-11 text-muted">
                        Khách đã hoàn tất lịch trình tour
                    </div>
                </div>
            </div>

            <!-- Metric 4: ĐÃ HỦY / TỪ CHỐI -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">ĐÃ HỦY / TỪ CHỐI</span>
                            <div class="d-flex align-items-center gap-2">
                                <span class="kpi-value text-dark">08</span>
                                <span class="badge bg-danger-subtle text-danger rounded-pill px-2 py-1 font-11 fw-bold">
                                    Tự động hoàn
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-wrap icon-danger">
                            <i class="bx bx-x-circle"></i>
                        </div>
                    </div>
                    <div class="font-11 text-muted">
                        Theo chính sách hủy tour quy định
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Filter Bar -->
        <div class="filter-card card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white">
            <div class="row g-2 align-items-center">
                <!-- Search input -->
                <div class="col-lg-3 col-md-6">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bx bx-search"></i>
                        </span>
                        <input 
                            type="text" 
                            class="form-control border-start-0" 
                            v-model="tuKhoaTimKiem" 
                            placeholder="Mã đơn (#TOUR-BK...)"
                        />
                    </div>
                </div>

                <!-- Tour dropdown -->
                <div class="col-lg-3 col-md-6">
                    <select class="form-select form-select-sm" v-model="locTourTuyen">
                        <option value="">Tất cả tour tuyến</option>
                        <option value="SONTRA_HOIAN">Đà Nẵng – Sơn Trà – Hội An 3N2Đ</option>
                        <option value="LAN_SAN_HO">Lặn Biển Ngắm San Hô Sơn Trà</option>
                        <option value="DU_THUYEN">Du Thuyền Sông Hàn & Cầu Rồng</option>
                        <option value="BANA_HILLS">Bà Nà Hills Siêu Sang 1N</option>
                    </select>
                </div>

                <!-- Date Picker -->
                <div class="col-lg-2 col-md-4">
                    <input type="date" class="form-control form-control-sm" v-model="locNgay" />
                </div>

                <!-- Status Select -->
                <div class="col-lg-2 col-md-4">
                    <select class="form-select form-select-sm" v-model="locTrangThai">
                        <option value="">Tất cả trạng thái</option>
                        <option value="cho_xac_nhan">Chờ xác nhận (Ưu tiên)</option>
                        <option value="cho_doi_soat">Chờ đối soát</option>
                        <option value="da_xac_nhan">Đã xác nhận</option>
                        <option value="yeu_cau_huy">Yêu cầu hủy tour</option>
                    </select>
                </div>

                <!-- Refresh & Export Excel Buttons -->
                <div class="col-lg-2 col-md-4 d-flex align-items-center justify-content-end gap-2">
                    <button class="btn btn-sm btn-light border rounded-3 p-1 px-2 text-secondary" title="Làm mới" @click="lamMoiDuLieu">
                        <i class="bx bx-refresh font-18 align-middle"></i>
                    </button>
                    <button class="btn btn-sm btn-export-excel text-secondary border rounded-3 px-3 fw-semibold font-12" @click="xuatExcel">
                        <i class="bx bx-download me-1"></i> Xuất Excel
                    </button>
                </div>
            </div>
        </div>

        <!-- 4. Main 2-Column Content: Left = Booking Cards, Right = Passenger Manifest Sidebar -->
        <div class="row g-4">
            <!-- Left Column: Booking Cards List -->
            <div class="col-xl-8 col-lg-7 d-flex flex-column gap-3">
                <!-- Card Loop -->
                <div 
                    v-for="don in danhSachDonLoc" 
                    :key="don.ma_don"
                    class="card border-0 shadow-sm rounded-4 booking-order-card"
                    :class="{ 'card-selected': donDangXem?.ma_don === don.ma_don }"
                    @click="chonDonXemChiTiet(don)"
                >
                    <div class="card-body p-3 p-md-4">
                        <!-- Top Header: Badge, Code, Time & Countdown -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="badge rounded-pill fw-bold font-11 px-3 py-1-5" :class="don.badge_class">
                                    {{ don.badge_text }}
                                </span>
                                <span class="font-monospace fw-bold font-13 text-dark">{{ don.ma_don }}</span>
                                <span class="text-muted font-11">• Tạo lúc: {{ don.thoi_gian_tao }}</span>
                            </div>

                            <!-- Countdown timer if urgent -->
                            <div v-if="don.dem_nguoc" class="countdown-pill px-2 py-1 rounded-pill font-11 fw-bold text-danger">
                                <i class="bx bx-time-five me-1"></i> Giữ chỗ còn: {{ don.dem_nguoc }}
                            </div>

                            <!-- Payment type pill if present -->
                            <div v-if="don.hinh_thuc_tt_tag" class="d-flex align-items-center gap-1">
                                <span class="badge bg-light text-secondary border font-11 px-2 py-1">
                                    <i class="bx bx-transfer-alt me-1"></i> {{ don.hinh_thuc_tt_tag }}
                                </span>
                            </div>

                            <!-- Notice text if cancel request -->
                            <div v-if="don.ghi_chu_thoi_gian_huy" class="text-muted font-11">
                                {{ don.ghi_chu_thoi_gian_huy }}
                            </div>
                        </div>

                        <!-- Sub-badge: condition match or E-ticket issued -->
                        <div v-if="don.sub_badge" class="mb-3">
                            <span class="badge rounded-pill font-11 px-3 py-1" :class="don.sub_badge.class">
                                <i :class="don.sub_badge.icon" class="me-1"></i> {{ don.sub_badge.text }}
                            </span>
                        </div>

                        <!-- Middle Content: Tour Image & Information -->
                        <div class="tour-info-row d-flex align-items-start gap-3 mb-3">
                            <img :src="don.hinh_anh_tour" :alt="don.ten_tour" class="tour-thumb rounded-3 shadow-sm flex-shrink-0" />
                            <div class="flex-grow-1 min-w-0">
                                <h5 class="fw-bold text-dark font-15 mb-1">{{ don.ten_tour }}</h5>
                                <div class="font-12 text-muted mb-1">
                                    <i class="bx bx-calendar text-pink me-1"></i>
                                    Khởi hành: <strong class="text-dark">{{ don.ngay_khoi_hanh }}</strong> ({{ don.gio_khoi_hanh }})
                                </div>
                                <div class="font-12 text-muted mb-1">
                                    <i class="bx bx-group text-purple me-1"></i>
                                    Đoàn khách: <strong class="text-dark">{{ don.so_luong_khach_text }}</strong>
                                </div>
                                <div v-if="don.diem_don" class="font-12 text-muted">
                                    <i class="bx bx-map-pin text-danger me-1"></i>
                                    Đón tại: <span class="text-dark">{{ don.diem_don }}</span>
                                </div>
                                <!-- Extra for cancel request -->
                                <div v-if="don.ly_do_huy" class="cancel-reason-box p-2 rounded-3 bg-light border mt-2 font-12">
                                    <div class="fw-semibold text-danger mb-1">
                                        <i class="bx bx-error-circle me-1"></i> Lý do hủy: {{ don.ly_do_huy }}
                                    </div>
                                    <div class="font-11 text-muted">
                                        Chính sách áp dụng: {{ don.chinh_sach_huy }}
                                    </div>
                                </div>
                            </div>

                            <!-- If simple pricing display on right -->
                            <div v-if="don.gia_tien_don_gian" class="text-end flex-shrink-0">
                                <div class="text-muted font-11 mb-1">{{ don.gia_tien_don_gian.nhan }}</div>
                                <div class="fw-bold font-16" :class="don.gia_tien_don_gian.class">
                                    {{ formatVND(don.gia_tien_don_gian.gia_tri) }}
                                </div>
                            </div>
                        </div>

                        <!-- Customer & Invoice split box for Card 1 -->
                        <div v-if="don.chi_tiet_nguoi_dat" class="row g-2 mb-3">
                            <!-- Left Sub-box: NGƯỜI ĐẶT -->
                            <div class="col-md-6">
                                <div class="customer-invoice-subbox p-3 rounded-3 bg-light border h-100">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="font-10 fw-bold text-secondary text-uppercase">NGƯỜI ĐẶT (NGUOI_DUNG)</span>
                                        <span class="badge bg-purple-light text-purple font-10 rounded-pill">{{ don.chi_tiet_nguoi_dat.hang_thanh_vien }}</span>
                                    </div>
                                    <div class="fw-bold text-dark font-13 mb-1">{{ don.chi_tiet_nguoi_dat.ho_ten }}</div>
                                    <div class="d-flex align-items-center gap-3 font-11 text-muted">
                                        <span><i class="bx bx-phone me-1"></i>{{ don.chi_tiet_nguoi_dat.sdt }}</span>
                                        <span class="text-truncate"><i class="bx bx-envelope me-1"></i>{{ don.chi_tiet_nguoi_dat.email }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Sub-box: HÓA ĐƠN & THANH TOÁN -->
                            <div class="col-md-6">
                                <div class="customer-invoice-subbox p-3 rounded-3 bg-light border h-100">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="font-10 fw-bold text-secondary text-uppercase">HÓA ĐƠN & THANH TOÁN</span>
                                        <span class="badge bg-cyan-light text-cyan font-10 rounded-pill">{{ don.chi_tiet_thanh_toan.cong_thanh_toan }}</span>
                                    </div>
                                    <div class="d-flex align-items-baseline justify-content-between mb-1 font-11">
                                        <span class="text-muted">
                                            Gốc: <del>{{ formatVND(don.chi_tiet_thanh_toan.gia_goc) }}</del> 
                                            <span class="text-danger ms-1">-{{ formatVND(don.chi_tiet_thanh_toan.voucher_giam) }} ({{ don.chi_tiet_thanh_toan.ma_voucher }})</span>
                                        </span>
                                        <span class="fw-bold font-15 text-pink">{{ formatVND(don.chi_tiet_thanh_toan.tong_tien) }}</span>
                                    </div>
                                    <div class="font-10 text-muted">
                                        Mã GD: {{ don.chi_tiet_thanh_toan.ma_gd }} • {{ don.chi_tiet_thanh_toan.ghi_chu_vat }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- System Note Banner if needed -->
                        <div v-if="don.ghi_chu_he_thong" class="p-2 px-3 rounded-3 bg-light border font-11 text-secondary mb-3">
                            <i :class="don.ghi_chu_he_thong_icon" class="me-1"></i> {{ don.ghi_chu_he_thong }}
                        </div>

                        <!-- Bank Account Info for Cancel / Refund -->
                        <div v-if="don.thong_tin_hoan_tien" class="font-12 text-secondary mb-3">
                            <i class="bx bx-credit-card me-1 text-primary"></i>
                            Khách: <strong class="text-dark">{{ don.thong_tin_hoan_tien.ten_chu_tk }}</strong> 
                            (STK: <span class="font-monospace text-dark">{{ don.thong_tin_hoan_tien.stk }}</span> - {{ don.thong_tin_hoan_tien.ngan_hang }})
                        </div>

                        <!-- Bottom Actions Row -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-2 border-top">
                            <!-- Left Link -->
                            <div>
                                <a 
                                    href="javascript:void(0)" 
                                    class="text-pink font-12 fw-semibold text-decoration-none"
                                    @click.stop="chonDonXemChiTiet(don)"
                                >
                                    <i class="bx bx-file-find me-1"></i> Xem Chi Tiết Đoàn Khách & Hóa Đơn
                                </a>
                            </div>

                            <!-- Right Action Buttons based on status -->
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <!-- Status 1: Chờ xác nhận -->
                                <template v-if="don.trang_thai === 'cho_xac_nhan'">
                                    <button 
                                        class="btn btn-outline-danger btn-sm rounded-3 px-3 font-12 fw-semibold"
                                        @click.stop="tuChoiDon(don)"
                                    >
                                        <i class="bx bx-x me-1"></i> Từ Chối Đơn
                                    </button>
                                    <button 
                                        class="btn btn-pink-gradient btn-sm text-white rounded-3 px-3 font-12 fw-semibold shadow-sm"
                                        @click.stop="xacNhanDatCho(don)"
                                    >
                                        <i class="bx bx-check-circle me-1"></i> Xác Nhận Đặt Chỗ (Xuất E-ticket QR)
                                    </button>
                                </template>

                                <!-- Status 2: Chờ đối soát -->
                                <template v-else-if="don.trang_thai === 'cho_doi_soat'">
                                    <button 
                                        class="btn btn-outline-secondary btn-sm rounded-3 px-3 font-12 fw-semibold"
                                        @click.stop="kiemTraSaoKe(don)"
                                    >
                                        <i class="bx bx-receipt me-1"></i> Kiểm Tra Sao Kê
                                    </button>
                                    <button 
                                        class="btn btn-purple btn-sm text-white rounded-3 px-3 font-12 fw-semibold shadow-sm"
                                        @click.stop="xacNhanNhanTien(don)"
                                    >
                                        <i class="bx bx-check me-1"></i> Xác Nhận Đã Nhận Tiền
                                    </button>
                                </template>

                                <!-- Status 3: Đã xác nhận -->
                                <template v-else-if="don.trang_thai === 'da_xac_nhan'">
                                    <button 
                                        class="btn btn-outline-secondary btn-sm rounded-3 px-2 font-11 fw-semibold"
                                        @click.stop="guiLaiZalo(don)"
                                    >
                                        <i class="bx bx-message-rounded-dots me-1"></i> Gửi lại vé QR qua Zalo
                                    </button>
                                    <button 
                                        class="btn btn-outline-secondary btn-sm rounded-3 px-2 font-11 fw-semibold"
                                        @click.stop="guiEmailVe(don)"
                                    >
                                        <i class="bx bx-envelope me-1"></i> Gửi Email Vé
                                    </button>
                                    <button 
                                        class="btn btn-cyan btn-sm text-white rounded-3 px-3 font-12 fw-semibold shadow-sm"
                                        @click.stop="quetCheckIn(don)"
                                    >
                                        <i class="bx bx-qr-scan me-1"></i> Quét Check-in Ngày Đi
                                    </button>
                                </template>

                                <!-- Status 4: Yêu cầu hủy -->
                                <template v-else-if="don.trang_thai === 'yeu_cau_huy'">
                                    <button 
                                        class="btn btn-pink-gradient btn-sm text-white rounded-3 px-4 font-12 fw-semibold shadow-sm"
                                        @click.stop="pheDuyetHoanTien(don)"
                                    >
                                        <i class="bx bx-check-double me-1"></i> Phê Duyệt Hoàn Tiền Tự Động
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Passenger Manifest & Log Sidebar -->
            <div class="col-xl-4 col-lg-5 d-flex flex-column gap-3">
                <!-- 1. Passenger Manifest Card -->
                <div class="card border-0 shadow-sm rounded-4 passenger-manifest-card p-3 p-md-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="manifest-icon bg-purple-light text-purple rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-group font-18"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-0 font-14">Danh Sách Hành Khách</h6>
                        </div>
                        <span class="badge bg-pink-light text-pink rounded-pill font-11 px-2 py-1 fw-bold">
                            {{ donDangXem?.danh_sach_khach?.length || 0 }} Hành Khách
                        </span>
                    </div>

                    <div class="text-muted font-11 mb-3">
                        Đang xem chi tiết đơn: <strong class="text-pink font-monospace">{{ donDangXem?.ma_don }}</strong>
                    </div>

                    <!-- Passenger Items Loop -->
                    <div class="passenger-list-wrap d-flex flex-column gap-2 mb-3">
                        <div 
                            v-for="(pax, pIdx) in donDangXem?.danh_sach_khach" 
                            :key="pIdx"
                            class="pax-item p-2 px-3 rounded-3 border bg-light font-12"
                        >
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-bold text-dark">{{ pIdx + 1 }}. {{ pax.ho_ten }}</span>
                                <span class="badge rounded-pill font-10" :class="pax.loai_ve_class">{{ pax.loai_ve }}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between font-11 text-muted mb-1">
                                <span>CCCD: <strong class="text-dark font-monospace">{{ pax.cccd || '---' }}</strong></span>
                                <span>SĐT: <strong class="text-dark">{{ pax.sdt }}</strong></span>
                            </div>
                            <div v-if="pax.ngay_sinh" class="font-11 text-muted mb-1">
                                Ngày sinh: <strong class="text-dark">{{ pax.ngay_sinh }}</strong> • Vé: <strong class="text-purple">{{ pax.ti_le_ve }}</strong>
                            </div>
                            <!-- Note or Allergy -->
                            <div v-if="pax.ghi_chu" class="font-11 fw-semibold" :class="pax.ghi_chu_class">
                                {{ pax.ghi_chu }}
                            </div>
                        </div>
                    </div>

                    <!-- Insurance Info Box -->
                    <div class="insurance-box p-3 rounded-3 border mb-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-1 font-12">
                            <span class="fw-bold text-dark">Bảo hiểm du lịch bắt buộc:</span>
                            <span class="badge bg-cyan-light text-cyan font-11 rounded-pill">Đã tích hợp (MIC Đà Nẵng)</span>
                        </div>
                        <p class="font-11 text-muted mb-0">
                            Hồ sơ danh sách đã sẵn sàng xuất gửi ban quản lý cảng tàu và trạm kiểm soát Sơn Trà.
                        </p>
                    </div>

                    <!-- Print Manifest Button -->
                    <button class="btn btn-purple btn-sm text-white w-100 rounded-3 py-2 fw-semibold font-12 shadow-sm" @click="inBangKeKhach">
                        <i class="bx bx-printer me-1"></i> In Bảng Kê Khách Lên Tour
                    </button>
                </div>

                <!-- 2. Operational Log Timeline Card -->
                <div class="card border-0 shadow-sm rounded-4 operational-log-card p-3 p-md-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="log-icon bg-cyan-light text-cyan rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-history font-18"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-0 font-14">Nhật Ký Nghiệp Vụ</h6>
                        </div>
                        <span class="font-10 text-muted">Ghi nhận tự động</span>
                    </div>

                    <!-- Timeline items -->
                    <div class="timeline-items-wrap d-flex flex-column gap-3 font-12">
                        <div 
                            v-for="(log, lIdx) in nhatKyNghiepVu" 
                            :key="lIdx"
                            class="timeline-item d-flex align-items-start gap-2"
                        >
                            <span class="timeline-dot mt-1" :class="log.dot_class"></span>
                            <div class="flex-grow-1 min-w-0">
                                <div class="fw-bold text-dark font-12 mb-0">{{ log.tieu_de }}</div>
                                <div class="font-10 text-muted">{{ log.thoi_gian }} • {{ log.nguoi_thuc_hien }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MODALS ================= -->

        <!-- MODAL 1: Quét Mã QR Check-in -->
        <div v-if="showModalScanQR" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-purple text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-qr-scan font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Quét Mã QR Check-in Đi Tour</h5>
                                <small class="text-muted">Kiểm soát vé du khách tại bến xe / cảng tàu</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalScanQR = false">&times;</button>
                    </div>

                    <div class="modal-body p-4 text-center">
                        <div class="scanner-viewfinder p-4 border rounded-4 bg-light mb-3 position-relative">
                            <div class="scan-laser-line"></div>
                            <i class="bx bx-qr font-60 text-secondary opacity-50"></i>
                            <div class="font-12 text-muted mt-2">Hướng camera về phía mã QR trên vé điện tử của khách</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark text-start w-100">Hoặc nhập mã vé E-ticket thủ công:</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control font-monospace text-uppercase" v-model="maTicketNhapTay" placeholder="ETK-..." />
                                <button class="btn btn-purple text-white px-3" @click="kiemTraMaTicket">Kiểm Tra</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end">
                        <button class="btn btn-sm btn-secondary px-3" @click="showModalScanQR = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 2: Xác Nhận Đặt Chỗ (Xuất E-ticket) -->
        <div v-if="showModalXacNhan" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-pink text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-check-circle font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Xác Nhận Đặt Chỗ & Xuất Vé E-Ticket</h5>
                                <small class="text-muted">Đơn {{ donThaoTac?.ma_don }}</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalXacNhan = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="alert alert-success d-flex align-items-center gap-2 font-12 py-2 mb-3">
                            <i class="bx bx-check-shield font-20"></i>
                            <div>Đã xác nhận thanh toán đủ {{ donThaoTac?.chi_tiet_thanh_toan?.tong_tien ? formatVND(donThaoTac.chi_tiet_thanh_toan.tong_tien) : '' }} qua VNPAY.</div>
                        </div>

                        <p class="font-12 text-secondary mb-3">
                            Hệ thống SmartTrip sẽ tự động sinh mã vé điện tử QR E-Ticket và gửi trực tiếp qua SMS & Email cho trưởng đoàn <strong>{{ donThaoTac?.chi_tiet_nguoi_dat?.ho_ten }}</strong>.
                        </p>

                        <div class="p-3 bg-light rounded-3 border font-11 text-muted">
                            <div><i class="bx bx-bus me-1"></i> Lịch khởi hành: {{ donThaoTac?.ngay_khoi_hanh }} lúc {{ donThaoTac?.gio_khoi_hanh }}</div>
                            <div><i class="bx bx-user me-1"></i> Số lượng: {{ donThaoTac?.so_luong_khach_text }}</div>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary px-3" @click="showModalXacNhan = false">Hủy</button>
                        <button class="btn btn-sm btn-pink-gradient text-white px-4 fw-semibold" @click="xacNhanXuatVe">
                            <i class="bx bx-check me-1"></i> Đồng Ý Xuất Vé Ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 3: Từ Chối Đơn -->
        <div v-if="showModalTuChoi" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-danger text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-x font-24"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Từ Chối Yêu Cầu Đặt Chỗ</h5>
                                <small class="text-muted">Đơn {{ donThaoTac?.ma_don }}</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalTuChoi = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark">Lý do từ chối:</label>
                            <select class="form-select form-select-sm" v-model="lyDoTuChoi">
                                <option value="Hết chỗ vào khung giờ khách yêu cầu">Hết chỗ vào khung giờ khách yêu cầu</option>
                                <option value="Thời tiết biển động không an toàn xuất cảng">Thời tiết biển động không an toàn xuất cảng</option>
                                <option value="Thông tin khách hàng chưa hoàn thiện giấy tờ tùy thân">Thông tin khách hàng chưa hoàn thiện giấy tờ tùy thân</option>
                                <option value="Khách yêu cầu hủy qua hotline đối tác">Khách yêu cầu hủy qua hotline đối tác</option>
                            </select>
                        </div>
                        <div class="p-3 bg-light rounded-3 font-11 text-muted">
                            Hệ thống sẽ hoàn 100% tiền cọc cho khách và gửi tin nhắn giải thích lý do cụ thể.
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary px-3" @click="showModalTuChoi = false">Hủy</button>
                        <button class="btn btn-sm btn-danger px-4 fw-semibold" @click="xacNhanTuChoi">
                            Xác Nhận Từ Chối
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'XuLyDatTourComponent',
    data() {
        return {
            tuKhoaTimKiem: '',
            locTourTuyen: '',
            locNgay: '',
            locTrangThai: '',

            // Modals
            showModalScanQR: false,
            showModalXacNhan: false,
            showModalTuChoi: false,
            donThaoTac: null,
            lyDoTuChoi: 'Hết chỗ vào khung giờ khách yêu cầu',
            maTicketNhapTay: '',

            // Selected order for right-hand manifest view
            donDangXem: null,

            // Booking Orders List (Matching Image 100%)
            danhSachDon: [
                {
                    ma_don: '#TOUR-BK-98214',
                    ma_tour_tuyen: 'SONTRA_HOIAN',
                    badge_text: 'ƯU TIÊN XỬ LÝ',
                    badge_class: 'bg-pink-gradient text-white',
                    thoi_gian_tao: '08:42 • 24/11/2025',
                    dem_nguoc: '35 phút',
                    sub_badge: null,
                    hinh_thuc_tt_tag: null,
                    ghi_chu_thoi_gian_huy: null,
                    ten_tour: 'Đà Nẵng – Bán Đảo Sơn Trà – Hội An Phố Cổ 3N2Đ',
                    hinh_anh_tour: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300&auto=format&fit=crop&q=80',
                    ngay_khoi_hanh: '25/11/2025',
                    gio_khoi_hanh: 'Chuyến 07:30 Sáng',
                    so_luong_khach_text: '03 người (2 Lớn + 1 Trẻ 7t)',
                    diem_don: 'Sân bay Đà Nẵng (Ga Đến)',
                    trang_thai: 'cho_xac_nhan',
                    ly_do_huy: null,
                    chinh_sach_huy: null,
                    gia_tien_don_gian: null,
                    chi_tiet_nguoi_dat: {
                        ho_ten: 'Trần Minh Anh',
                        hang_thanh_vien: 'Thành viên Bạc',
                        sdt: '0918.234.567',
                        email: 'minhanh.danang...'
                    },
                    chi_tiet_thanh_toan: {
                        cong_thanh_toan: 'VNPAY Đã thanh toán',
                        gia_goc: 8700000,
                        voucher_giam: 250000,
                        ma_voucher: 'Voucher DANANGSMART',
                        tong_tien: 8450000,
                        ma_gd: '#VNPAY-91829',
                        ghi_chu_vat: 'Hóa đơn VAT điện tử'
                    },
                    ghi_chu_he_thong: null,
                    thong_tin_hoan_tien: null,
                    danh_sach_khach: [
                        {
                            ho_ten: 'Trần Minh Anh (Trưởng đoàn)',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048092008129',
                            sdt: '0918.234.567',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: '🥢 Ghi chú: Ăn chay trường ngày rằm',
                            ghi_chu_class: 'text-primary'
                        },
                        {
                            ho_ten: 'Nguyễn Thị Bích Phượng',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048195001244',
                            sdt: '0918.234.568',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: 'Dị ứng: Không có',
                            ghi_chu_class: 'text-muted'
                        },
                        {
                            ho_ten: 'Trần Bảo Nam',
                            loai_ve: 'Trẻ em (7 tuổi)',
                            loai_ve_class: 'bg-purple-light text-purple border',
                            cccd: null,
                            sdt: '0918.234.567',
                            ngay_sinh: '14/06/2018',
                            ti_le_ve: '70% Vé Lớn',
                            ghi_chu: '⚠️ Yêu cầu ghế ngồi an toàn trên xe 16 chỗ',
                            ghi_chu_class: 'text-warning'
                        }
                    ]
                },
                {
                    ma_don: '#TOUR-BK-98215',
                    ma_tour_tuyen: 'LAN_SAN_HO',
                    badge_text: 'CHỜ ĐỐI SOÁT',
                    badge_class: 'bg-purple-light text-purple',
                    thoi_gian_tao: 'Khởi hành: 26/11/2025',
                    dem_nguoc: null,
                    sub_badge: null,
                    hinh_thuc_tt_tag: 'VietQR Chuyển Khoản',
                    ghi_chu_thoi_gian_huy: null,
                    ten_tour: 'Lặn Biển Ngắm San Hô Bán Đảo Sơn Trà (1 Ngày)',
                    hinh_anh_tour: 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=300&auto=format&fit=crop&q=80',
                    ngay_khoi_hanh: '26/11/2025',
                    gio_khoi_hanh: 'Chuyến 08:30 Sáng',
                    so_luong_khach_text: '2 Vé người lớn',
                    diem_don: 'Cảng du thuyền Sông Hàn',
                    trang_thai: 'cho_doi_soat',
                    ly_do_huy: null,
                    chinh_sach_huy: null,
                    gia_tien_don_gian: {
                        nhan: 'Tổng thanh toán',
                        gia_tri: 1300000,
                        class: 'text-dark'
                    },
                    chi_tiet_nguoi_dat: null,
                    chi_tiet_thanh_toan: null,
                    ghi_chu_he_thong: 'Đang chờ webhook ngân hàng hoặc kiểm tra sao kê thủ công',
                    ghi_chu_he_thong_icon: 'bx bx-time',
                    thong_tin_hoan_tien: null,
                    danh_sach_khach: [
                        {
                            ho_ten: 'Lê Hoàng Nam (Trưởng đoàn)',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048091002345',
                            sdt: '0905.888.123',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: 'Khách yêu cầu hướng dẫn viên biết lặn biển chuyên nghiệp',
                            ghi_chu_class: 'text-primary'
                        },
                        {
                            ho_ten: 'Đỗ Quỳnh Chi',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048192003456',
                            sdt: '0905.888.124',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: 'Dị ứng: Không',
                            ghi_chu_class: 'text-muted'
                        }
                    ]
                },
                {
                    ma_don: '#TOUR-BK-98190',
                    ma_tour_tuyen: 'DU_THUYEN',
                    badge_text: 'ĐÃ XÁC NHẬN',
                    badge_class: 'bg-cyan-light text-cyan',
                    thoi_gian_tao: 'Khởi hành: 25/11/2025 • 08:00',
                    dem_nguoc: null,
                    sub_badge: {
                        text: 'Đã phát hành QR E-Ticket',
                        icon: 'bx bx-check',
                        class: 'bg-cyan-light text-cyan border border-cyan-subtle'
                    },
                    hinh_thuc_tt_tag: null,
                    ghi_chu_thoi_gian_huy: null,
                    ten_tour: 'Tour Du Thuyền Sông Hàn & Cầu Rồng Phun Lửa Về Đêm',
                    hinh_anh_tour: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=300&auto=format&fit=crop&q=80',
                    ngay_khoi_hanh: '25/11/2025',
                    gio_khoi_hanh: '19:30 Tối',
                    so_luong_khach_text: '4 Vé (Gia đình)',
                    diem_don: 'Cầu Rồng Đà Nẵng',
                    trang_thai: 'da_xac_nhan',
                    ly_do_huy: null,
                    chinh_sach_huy: null,
                    gia_tien_don_gian: {
                        nhan: 'Đã thu 100%',
                        gia_tri: 2000000,
                        class: 'text-dark'
                    },
                    chi_tiet_nguoi_dat: null,
                    chi_tiet_thanh_toan: null,
                    ghi_chu_he_thong: null,
                    thong_tin_hoan_tien: null,
                    danh_sach_khach: [
                        {
                            ho_ten: 'Mai Thu Thảo (Trưởng đoàn)',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048093004567',
                            sdt: '0934.123.456',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: 'Yêu cầu bàn view tầng 2 mạn thuyền',
                            ghi_chu_class: 'text-primary'
                        },
                        {
                            ho_ten: 'Mai Văn Toàn',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048092005678',
                            sdt: '0934.123.457',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: null,
                            ghi_chu_class: ''
                        },
                        {
                            ho_ten: 'Lê Cẩm Tú',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048194006789',
                            sdt: '0934.123.458',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: null,
                            ghi_chu_class: ''
                        },
                        {
                            ho_ten: 'Mai Gia Hưng',
                            loai_ve: 'Trẻ em',
                            loai_ve_class: 'bg-purple-light text-purple border',
                            cccd: null,
                            sdt: '0934.123.456',
                            ngay_sinh: '20/10/2019',
                            ti_le_ve: '50% Vé Lớn',
                            ghi_chu: 'Yêu cầu áo phao size nhỏ',
                            ghi_chu_class: 'text-warning'
                        }
                    ]
                },
                {
                    ma_don: '#TOUR-BK-97880',
                    ma_tour_tuyen: 'SONTRA_HOIAN',
                    badge_text: 'YÊU CẦU HỦY TOUR',
                    badge_class: 'bg-danger-subtle text-danger',
                    thoi_gian_tao: '',
                    dem_nguoc: null,
                    sub_badge: {
                        text: 'Khớp điều kiện hoàn 100%',
                        icon: 'bx bx-check-double',
                        class: 'bg-danger-subtle text-danger border border-danger-subtle'
                    },
                    hinh_thuc_tt_tag: null,
                    ghi_chu_thoi_gian_huy: 'Báo hủy trước 5 ngày',
                    ten_tour: 'Hành Trình Di Sản Miền Trung 3N2Đ',
                    hinh_anh_tour: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300&auto=format&fit=crop&q=80',
                    ngay_khoi_hanh: '28/11/2025',
                    gio_khoi_hanh: '07:30 Sáng',
                    so_luong_khach_text: '02 người',
                    diem_don: 'Khách sạn Novotel Bạch Đằng',
                    trang_thai: 'yeu_cau_huy',
                    ly_do_huy: 'Gia đình có việc đột xuất, xin hủy đoàn.',
                    chinh_sach_huy: 'Hủy trước > 96h -> Tỷ lệ hoàn chốt = 100%',
                    gia_tien_don_gian: {
                        nhan: 'Số tiền hoàn lại',
                        gia_tri: 2450000,
                        class: 'text-danger'
                    },
                    chi_tiet_nguoi_dat: null,
                    chi_tiet_thanh_toan: null,
                    ghi_chu_he_thong: null,
                    thong_tin_hoan_tien: {
                        ten_chu_tk: 'Phạm Quốc Cường',
                        stk: '1903482910...',
                        ngan_hang: 'Techcombank'
                    },
                    danh_sach_khach: [
                        {
                            ho_ten: 'Phạm Quốc Cường',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048090001234',
                            sdt: '0905.777.888',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: 'Yêu cầu hoàn qua tài khoản Techcombank',
                            ghi_chu_class: 'text-danger'
                        },
                        {
                            ho_ten: 'Vũ Thị Minh Loan',
                            loai_ve: 'Người lớn',
                            loai_ve_class: 'bg-light text-dark border',
                            cccd: '048192002345',
                            sdt: '0905.777.889',
                            ngay_sinh: null,
                            ti_le_ve: null,
                            ghi_chu: null,
                            ghi_chu_class: ''
                        }
                    ]
                }
            ],

            // Operational Activity Log (matching image)
            nhatKyNghiepVu: [
                {
                    dot_class: 'dot-pink',
                    tieu_de: 'Đơn #TOUR-BK-98214 vừa kích hoạt giữ chỗ',
                    thoi_gian: '10 phút trước',
                    nguoi_thuc_hien: 'Khách thanh toán thành công VNPAY'
                },
                {
                    dot_class: 'dot-cyan',
                    tieu_de: 'Điều hành duyệt E-ticket #ETK-0921 cho Mai Thu Thảo',
                    thoi_gian: '32 phút trước',
                    nguoi_thuc_hien: 'Điều hành viên: Nguyen Phuoc'
                },
                {
                    dot_class: 'dot-purple',
                    tieu_de: 'Tự động gửi Zalo thông báo giờ đón chuyến 07:30',
                    thoi_gian: '1 giờ trước',
                    nguoi_thuc_hien: 'Bot Zalo ZNS'
                }
            ]
        };
    },
    computed: {
        demDonChoDuyet() {
            return this.danhSachDon.filter(d => d.trang_thai === 'cho_xac_nhan').length;
        },
        danhSachDonLoc() {
            return this.danhSachDon.filter(don => {
                const matchSearch = !this.tuKhoaTimKiem || 
                    don.ma_don.toLowerCase().includes(this.tuKhoaTimKiem.toLowerCase()) ||
                    don.ten_tour.toLowerCase().includes(this.tuKhoaTimKiem.toLowerCase());
                const matchTour = !this.locTourTuyen || don.ma_tour_tuyen === this.locTourTuyen;
                const matchStatus = !this.locTrangThai || don.trang_thai === this.locTrangThai;
                return matchSearch && matchTour && matchStatus;
            });
        }
    },
    mounted() {
        if (this.danhSachDon.length > 0) {
            this.donDangXem = this.danhSachDon[0];
        }
    },
    methods: {
        formatVND(val) {
            if (!val) return '0 đ';
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(val);
        },

        chonDonXemChiTiet(don) {
            this.donDangXem = don;
        },

        lamMoiDuLieu() {
            alert('Đã cập nhật danh sách đơn đặt tour mới nhất theo thời gian thực!');
        },

        xuatExcel() {
            alert('Đang trích xuất báo cáo toàn bộ Booking và Hóa đơn VAT (Excel)...');
        },

        moModalScanQR() {
            this.showModalScanQR = true;
        },

        kiemTraMaTicket() {
            if (!this.maTicketNhapTay) {
                alert('Vui lòng nhập mã vé điện tử cần kiểm tra!');
                return;
            }
            alert(`Mã vé "${this.maTicketNhapTay}" hợp lệ! Khách đã được xác nhận lên xe/tàu.`);
            this.showModalScanQR = false;
            this.maTicketNhapTay = '';
        },

        xacNhanDatCho(don) {
            this.donThaoTac = don;
            this.showModalXacNhan = true;
        },

        xacNhanXuatVe() {
            if (this.donThaoTac) {
                this.donThaoTac.trang_thai = 'da_xac_nhan';
                this.donThaoTac.badge_text = 'ĐÃ XÁC NHẬN';
                this.donThaoTac.badge_class = 'bg-cyan-light text-cyan';
                this.donThaoTac.dem_nguoc = null;
                this.donThaoTac.sub_badge = {
                    text: 'Đã phát hành QR E-Ticket',
                    icon: 'bx bx-check',
                    class: 'bg-cyan-light text-cyan border border-cyan-subtle'
                };
                this.nhatKyNghiepVu.unshift({
                    dot_class: 'dot-cyan',
                    tieu_de: `Điều hành duyệt E-ticket cho đơn ${this.donThaoTac.ma_don}`,
                    thoi_gian: 'Vừa xong',
                    nguoi_thuc_hien: 'Điều hành viên: Bạn'
                });
                alert(`Đã xuất E-ticket QR và kích hoạt vé cho ${this.donThaoTac.ma_don}!`);
            }
            this.showModalXacNhan = false;
        },

        tuChoiDon(don) {
            this.donThaoTac = don;
            this.showModalTuChoi = true;
        },

        xacNhanTuChoi() {
            if (this.donThaoTac) {
                this.donThaoTac.trang_thai = 'da_tu_choi';
                this.donThaoTac.badge_text = 'ĐÃ TỪ CHỐI';
                this.donThaoTac.badge_class = 'bg-secondary text-white';
                this.donThaoTac.dem_nguoc = null;
                alert(`Đã từ chối đơn ${this.donThaoTac.ma_don}. Lý do: "${this.lyDoTuChoi}".`);
            }
            this.showModalTuChoi = false;
        },

        kiemTraSaoKe(don) {
            alert(`Đang đối soát giao dịch VietQR cho đơn ${don.ma_don}... Đã tìm thấy khớp lệnh 1.300.000 đ vào tài khoản ngân hàng.`);
        },

        xacNhanNhanTien(don) {
            don.trang_thai = 'da_xac_nhan';
            don.badge_text = 'ĐÃ XÁC NHẬN';
            don.badge_class = 'bg-cyan-light text-cyan';
            don.sub_badge = {
                text: 'Đã phát hành QR E-Ticket',
                icon: 'bx bx-check',
                class: 'bg-cyan-light text-cyan border border-cyan-subtle'
            };
            alert(`Đã xác nhận tiền vào tài khoản và cấp mã vé cho đơn ${don.ma_don}!`);
        },

        guiLaiZalo(don) {
            alert(`Đã gửi lại thông báo kèm mã QR E-Ticket qua Zalo OA cho khách của đơn ${don.ma_don}!`);
        },

        guiEmailVe(don) {
            alert(`Đã gửi tệp PDF vé điện tử có mã QR qua Email cho khách của đơn ${don.ma_don}!`);
        },

        quetCheckIn(don) {
            this.showModalScanQR = true;
        },

        pheDuyetHoanTien(don) {
            if (confirm(`Xác nhận phê duyệt hoàn tiền ${this.formatVND(don.gia_tien_don_gian?.gia_tri)} cho khách qua tài khoản Techcombank?`)) {
                don.badge_text = 'ĐÃ HOÀN TIỀN';
                don.badge_class = 'bg-success text-white';
                this.nhatKyNghiepVu.unshift({
                    dot_class: 'dot-pink',
                    tieu_de: `Đã hoàn tiền tự động 100% cho đơn ${don.ma_don}`,
                    thoi_gian: 'Vừa xong',
                    nguoi_thuc_hien: 'Cổng thanh toán tự động'
                });
                alert(`Đã giải ngân hoàn tiền thành công cho đơn ${don.ma_don}!`);
            }
        },

        inBangKeKhach() {
            alert(`Đang in bảng kê danh sách hành khách đoàn ${this.donDangXem?.ma_don} phục vụ điểm danh và kiểm soát cảng biển!`);
        }
    }
};
</script>

<style scoped>
.partner-xu-ly-dat-tour-page {
    color: #1e293b;
    font-family: inherit;
}

/* Header */
.header-icon-circle {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
}

.page-desc {
    font-size: 0.85rem;
    line-height: 1.4;
}

.urgent-alert-pill {
    background-color: #ffe4e6;
    border: 1px solid #fecdd3;
}

.status-dot-pulse {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

/* KPI Cards */
.kpi-card {
    background: #ffffff;
    border: 1px solid #f1f5f9;
    border-radius: 16px;
    padding: 1.15rem 1.25rem;
    transition: transform 0.2s, box-shadow 0.2s;
}

.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05) !important;
}

.kpi-label {
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: #64748b;
    display: block;
    margin-bottom: 0.35rem;
}

.kpi-value {
    font-size: 1.45rem;
    font-weight: 800;
    line-height: 1.2;
}

.kpi-icon-wrap {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.icon-pink { background-color: #ffe4e6; color: #e11d48; }
.icon-purple { background-color: #f3e8ff; color: #9333ea; }
.icon-cyan { background-color: #e0f2fe; color: #0284c7; }
.icon-danger { background-color: #fee2e2; color: #dc2626; }

/* Filter Card */
.filter-card {
    border: 1px solid #f1f5f9 !important;
}

/* Booking Cards */
.booking-order-card {
    border: 1px solid #e2e8f0 !important;
    transition: all 0.2s;
    cursor: pointer;
}

.booking-order-card:hover {
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.06) !important;
}

.booking-order-card.card-selected {
    border: 1.5px solid #ec4899 !important;
    box-shadow: 0 6px 18px rgba(236, 72, 153, 0.12) !important;
}

.countdown-pill {
    background-color: #fff1f2;
    border: 1px solid #fecdd3;
}

.tour-thumb {
    width: 80px;
    height: 80px;
    object-fit: cover;
}

.customer-invoice-subbox {
    border: 1px solid #e2e8f0 !important;
    background-color: #f8fafc !important;
}

.cancel-reason-box {
    background-color: #fef2f2;
    border-color: #fee2e2 !important;
}

/* Passenger Manifest & Logs Sidebar */
.passenger-manifest-card,
.operational-log-card {
    border: 1px solid #e2e8f0 !important;
}

.manifest-icon,
.log-icon {
    width: 34px;
    height: 34px;
    flex-shrink: 0;
}

.pax-item {
    border-color: #e2e8f0 !important;
}

.insurance-box {
    background-color: #f8fafc;
    border-color: #e2e8f0 !important;
}

/* Timeline */
.timeline-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    flex-shrink: 0;
}

.dot-pink { background-color: #e11d48; }
.dot-cyan { background-color: #0284c7; }
.dot-purple { background-color: #9333ea; }

/* Utilities & Colors */
.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }

.text-purple { color: #9333ea !important; }
.bg-purple { background-color: #9333ea !important; }
.bg-purple-light { background-color: #f3e8ff !important; }
.btn-purple { background-color: #9333ea; border: none; }
.btn-purple:hover { background-color: #7e22ce; color: #ffffff; }

.text-cyan { color: #0284c7 !important; }
.bg-cyan { background-color: #0284c7 !important; }
.bg-cyan-light { background-color: #e0f2fe !important; }
.btn-cyan { background-color: #0284c7; border: none; }
.btn-cyan:hover { background-color: #0369a1; color: #ffffff; }

.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
}

.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #be123c 0%, #db2777 100%);
    color: #ffffff;
}

.btn-purple-gradient {
    background: linear-gradient(135deg, #7c3aed 0%, #9333ea 100%);
    border: none;
}

.btn-purple-gradient:hover {
    background: linear-gradient(135deg, #6d28d9 0%, #7e22ce 100%);
    color: #ffffff;
}

/* Modals */
.modal-backdrop-custom {
    position: fixed;
    inset: 0;
    background-color: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(4px);
    z-index: 1050;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    overflow-y: auto;
}

.modal-dialog-custom {
    width: 100%;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
}

.modal-dialog-custom.modal-md { max-width: 520px; }

.modal-header-icon {
    width: 40px;
    height: 40px;
}

.btn-close-modal {
    background: none;
    border: none;
    font-size: 1.5rem;
    line-height: 1;
    color: #94a3b8;
    cursor: pointer;
    transition: color 0.15s;
}

.btn-close-modal:hover {
    color: #0f172a;
}

.scanner-viewfinder {
    height: 180px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-style: dashed !important;
}

.scan-laser-line {
    position: absolute;
    width: 80%;
    height: 2px;
    background-color: #ef4444;
    box-shadow: 0 0 8px #ef4444;
    top: 50%;
}

/* Font helpers */
.font-10 { font-size: 0.65rem !important; }
.font-11 { font-size: 0.72rem !important; }
.font-12 { font-size: 0.78rem !important; }
.font-13 { font-size: 0.83rem !important; }
.font-14 { font-size: 0.88rem !important; }
.font-15 { font-size: 0.94rem !important; }
.font-16 { font-size: 1rem !important; }
.font-20 { font-size: 1.25rem !important; }
.font-22 { font-size: 1.38rem !important; }
.font-24 { font-size: 1.5rem !important; }
.font-60 { font-size: 3.75rem !important; }

.py-1-5 {
    padding-top: 0.35rem !important;
    padding-bottom: 0.35rem !important;
}
</style>
