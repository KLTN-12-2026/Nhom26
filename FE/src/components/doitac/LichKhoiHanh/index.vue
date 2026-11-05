<template>
    <div class="partner-lich-khoi-hanh-page">
        <!-- 1. Header Banner & Action Buttons -->
        <div class="page-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                        <span class="badge-tag-pill tag-pink">
                            <i class="bx bx-atom me-1"></i> HỆ THỐNG ĐIỀU PHỐI VẬN HÀNH TOUR THÔNG MINH
                        </span>
                    </div>
                    <h2 class="page-title mb-1">Quản Lý Lịch Khởi Hành & Điều Phối Chỗ Trống</h2>
                    <p class="page-desc text-muted mb-0">
                        Thiết lập các đợt khởi hành định kỳ, kiểm soát số chỗ mở bán và theo dõi trạng thái lấp đầy chỗ theo thời gian thực.
                    </p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-auto-schedule" type="button" @click="moModalLenLichTuDong">
                        <i class="bx bx-cog me-1"></i> Lên Lịch Tự Động Hàng Tuần
                    </button>
                    <button class="btn btn-add-departure" type="button" @click="moModalThemLichMoi">
                        <i class="bx bx-plus me-1 font-18 align-middle"></i> Thêm Lịch Khởi Hành Mới (+)
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. 4 KPI Summary Cards -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: Tổng chuyến trong tháng -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">TỔNG CHUYẾN TRONG THÁNG</span>
                            <div class="kpi-value text-dark">48 <span class="font-13 fw-normal text-muted">chuyến đã lên lịch</span></div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-calendar-event"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 text-success fw-semibold">
                        <i class="bx bx-trending-up"></i> +12% so với tháng 10/2025
                    </div>
                </div>
            </div>

            <!-- Metric 2: Khởi hành sắp tới (48h) -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">KHỞI HÀNH SẮP TỚI (48H)</span>
                            <div class="kpi-value text-dark">6 <span class="font-13 fw-normal text-muted">chuyến chuẩn bị xuất phát</span></div>
                        </div>
                        <div class="kpi-icon-wrap icon-purple">
                            <i class="bx bx-time-five"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 text-purple fw-semibold">
                        Tỷ lệ lấp đầy: 94% (Cực cao)
                    </div>
                </div>
            </div>

            <!-- Metric 3: Tỷ lệ bán ghế -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">TỶ LỆ BÁN GHẾ</span>
                            <div class="kpi-value text-dark">842 <span class="font-13 fw-normal text-muted">/ 960 ghế</span></div>
                        </div>
                        <div class="kpi-icon-wrap icon-cyan">
                            <i class="bx bx-chair"></i>
                        </div>
                    </div>
                    <div class="progress progress-thin mb-1">
                        <div class="progress-bar bg-cyan" style="width: 87.7%;"></div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 text-cyan fw-semibold">
                        Đã đạt 87.7% • Còn 118 chỗ
                    </div>
                </div>
            </div>

            <!-- Metric 4: Doanh thu dự kiến -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            <span class="kpi-label">DOANH THU DỰ KIẾN</span>
                            <div class="kpi-value text-pink">1.120.000.000 đ</div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-credit-card"></i>
                        </div>
                    </div>
                    <div class="text-muted font-11 mb-1">Theo thực tế các booking đã xác nhận cọc</div>
                    <div class="d-flex align-items-center gap-1 font-11 text-muted">
                        <span class="status-dot-pulse bg-success"></span> Cập nhật số liệu tức thì
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Filter & View Switcher Bar -->
        <div class="filter-toolbar card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <!-- Left: View Switcher (List vs Calendar) -->
                <div class="view-switch-group d-flex align-items-center p-1 rounded-pill bg-light">
                    <button 
                        class="btn btn-sm rounded-pill fw-semibold view-toggle-btn"
                        :class="cheDoXem === 'danh_sach' ? 'active-view' : 'text-muted'"
                        @click="cheDoXem = 'danh_sach'"
                    >
                        <i class="bx bx-list-ul me-1"></i> Danh Sách & Vận Hành
                    </button>
                    <button 
                        class="btn btn-sm rounded-pill fw-semibold view-toggle-btn"
                        :class="cheDoXem === 'lich_thang' ? 'active-view' : 'text-muted'"
                        @click="cheDoXem = 'lich_thang'"
                    >
                        <i class="bx bx-calendar me-1"></i> Lịch Biểu Tháng (Calendar)
                    </button>
                </div>

                <!-- Right: Time pills & Tour Filter & Status dropdown -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <!-- Dropdown Tour -->
                    <div class="dropdown">
                        <select class="form-select form-select-sm tour-select-filter" v-model="locTheoTour">
                            <option value="">Tất cả Tour du lịch (8 tour)</option>
                            <option value="DN-SONTRA">Đà Nẵng – Sơn Trà – Hội An</option>
                            <option value="DN-BANA">Bà Nà Hills – Cầu Vàng</option>
                            <option value="DN-DISAN">Hành Trình Di Sản Miền Trung</option>
                            <option value="DN-CANO">Ca Nô & Lặn San Hô Sơn Trà</option>
                        </select>
                    </div>

                    <!-- Date range pills -->
                    <div class="d-flex align-items-center gap-1">
                        <button 
                            class="btn btn-sm filter-pill-btn"
                            :class="locThoiGian === 'hom_nay' ? 'active' : ''"
                            @click="locThoiGian = 'hom_nay'"
                        >
                            Hôm nay
                        </button>
                        <button 
                            class="btn btn-sm filter-pill-btn"
                            :class="locThoiGian === 'tuan_nay' ? 'active' : ''"
                            @click="locThoiGian = 'tuan_nay'"
                        >
                            Tuần này
                        </button>
                        <button 
                            class="btn btn-sm filter-pill-btn"
                            :class="locThoiGian === 'thang_11' ? 'active' : ''"
                            @click="locThoiGian = 'thang_11'"
                        >
                            Tháng 11/2025
                        </button>
                        <button 
                            class="btn btn-sm filter-pill-btn"
                            :class="locThoiGian === 'tuy_chon' ? 'active' : ''"
                            @click="locThoiGian = 'tuy_chon'"
                        >
                            Tùy chọn
                        </button>
                    </div>

                    <!-- Status Filter Dropdown -->
                    <div class="dropdown">
                        <select class="form-select form-select-sm status-select-filter" v-model="locTrangThai">
                            <option value="">Tất cả trạng thái</option>
                            <option value="dang_mo_ban">Đang mở bán</option>
                            <option value="da_dong">Đã đóng (Hết chỗ)</option>
                            <option value="da_huy">Đã Hủy Tour</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Departure Cards List (View: Danh Sách & Vận Hành) -->
        <div v-if="cheDoXem === 'danh_sach'" class="departure-cards-list d-flex flex-column gap-4">
            <!-- Departure Card Loop -->
            <div 
                v-for="item in danhSachLoc" 
                :key="item.id" 
                class="card border-0 shadow-sm rounded-4 overflow-hidden departure-card-item"
            >
                <div class="row g-0">
                    <!-- Left Column: Tour Visual Image Banner -->
                    <div class="col-lg-4 col-xl-35 position-relative departure-image-col">
                        <div 
                            class="departure-cover-img"
                            :style="{ backgroundImage: 'url(' + item.hinh_anh + ')' }"
                        >
                            <div class="cover-top-meta d-flex justify-content-between align-items-center w-100 p-3">
                                <span class="partner-tag-chip">
                                    Đối Tác: {{ item.doi_tac }}
                                </span>
                            </div>

                            <div class="cover-floating-badge px-3">
                                <span class="badge rounded-pill fw-semibold shadow-sm" :class="item.tag_class">
                                    <i :class="item.tag_icon" class="me-1"></i> {{ item.tag_text }}
                                </span>
                            </div>

                            <div class="cover-bottom-meta p-3 w-100">
                                <h5 class="text-white fw-bold mb-1 tour-name-overlay">{{ item.ten_tour }}</h5>
                                <div class="font-11 text-white-50 font-monospace">Mã lịch: {{ item.ma_lich }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Operations & Capacity Details -->
                    <div class="col-lg-8 col-xl-85 p-3 p-md-4 d-flex flex-column justify-content-between">
                        <!-- Top Meta: Date Box, Departure/Return times, Badges -->
                        <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <!-- Date Badge Box -->
                                <div class="date-badge-box text-center shadow-sm">
                                    <div class="date-header" :class="item.date_badge_theme">{{ item.thu_text }}</div>
                                    <div class="date-number">{{ item.ngay_so }}</div>
                                </div>

                                <!-- Schedule Times -->
                                <div>
                                    <div class="fw-bold text-dark font-15 mb-1">
                                        {{ item.tieu_de_ngay }}: <span class="text-pink">{{ item.ngay_khoi_hanh }}</span> <span class="text-muted">•</span> {{ item.gio_khoi_hanh }}
                                    </div>
                                    <div class="font-12" :class="item.trang_thai === 'da_huy' ? 'text-danger fw-semibold' : 'text-muted'">
                                        <i :class="item.icon_lich_trinh" class="me-1"></i>
                                        {{ item.thong_tin_lich_trinh }}
                                    </div>
                                </div>
                            </div>

                            <!-- Status Badges -->
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <span v-for="(badge, bIdx) in item.status_badges" :key="bIdx" class="badge rounded-pill px-3 py-1-5 font-11 fw-semibold" :class="badge.class">
                                    {{ badge.text }}
                                </span>
                            </div>
                        </div>

                        <!-- Capacity / Seat Breakdown or Cancel Reason Section -->
                        <div class="capacity-section mb-3">
                            <!-- If not cancelled: show seat capacity bar & breakdown -->
                            <div v-if="item.trang_thai !== 'da_huy'">
                                <div class="d-flex justify-content-between align-items-center mb-1 font-12 fw-semibold">
                                    <span class="text-dark">
                                        {{ item.nhan_suc_chua }}: <span class="text-pink fw-bold">{{ item.da_ban }} / {{ item.tong_cho }} chỗ</span> 
                                        <span class="text-muted">({{ item.ghi_chu_ti_le }})</span>
                                    </span>
                                    <span :class="item.con_trong <= 3 ? 'text-danger fw-bold' : 'text-success fw-bold'">
                                        {{ item.nhan_con_lai }}: {{ item.con_trong < 10 ? '0' + item.con_trong : item.con_trong }} chỗ
                                    </span>
                                </div>

                                <!-- Progress Bar -->
                                <div class="progress progress-capacity mb-2">
                                    <div 
                                        class="progress-bar" 
                                        :class="item.progress_bar_class"
                                        :style="{ width: item.ty_le_lap_day + '%' }"
                                    ></div>
                                </div>

                                <!-- Ticket Breakdown Pills or Waitlist Banner -->
                                <div v-if="item.ve_da_book" class="d-flex flex-wrap align-items-center gap-2 p-2 rounded-3 bg-light border font-11">
                                    <span class="fw-bold text-secondary">VÉ ĐÃ BOOK:</span>
                                    <span class="badge bg-white text-dark border px-2 py-1">{{ item.ve_da_book.nguoi_lon }} Người lớn</span>
                                    <span class="badge bg-white text-dark border px-2 py-1">{{ item.ve_da_book.tre_em }} Trẻ em</span>
                                    <span v-if="item.ve_da_book.giu_cho > 0" class="badge bg-warning-subtle text-warning-emphasis border border-warning px-2 py-1">
                                        {{ item.ve_da_book.giu_cho }} Đang giữ chỗ (Chờ TT)
                                    </span>
                                </div>

                                <!-- Waitlist Alert Box for Sold Out -->
                                <div v-if="item.waitlist" class="d-flex flex-wrap justify-content-between align-items-center p-2 px-3 rounded-3 waitlist-box font-12">
                                    <span class="text-purple fw-semibold">
                                        <i class="bx bx-user-voice me-1"></i> Có {{ item.waitlist.so_khach }} khách đang đăng ký vào danh sách hàng chờ (Waitlist)
                                    </span>
                                    <span class="fw-bold text-dark">
                                        Doanh thu dự kiến: {{ formatVND(item.waitlist.doanh_thu_du_kien) }}
                                    </span>
                                </div>

                                <!-- AI SmartTrip Suggestion Banner -->
                                <div v-if="item.ai_suggestion" class="d-flex flex-wrap justify-content-between align-items-center p-2 px-3 rounded-3 ai-suggestion-banner mt-2 font-12">
                                    <span class="text-indigo fw-semibold">
                                        <i class="bx bx-bulb me-1"></i> Gợi ý AI SmartTrip: {{ item.ai_suggestion.thong_diep }}
                                    </span>
                                    <span class="fw-bold text-dark">
                                        Doanh thu hiện tại: {{ formatVND(item.ai_suggestion.doanh_thu_hien_tai) }}
                                    </span>
                                </div>
                            </div>

                            <!-- If Cancelled: show refund process & system notification -->
                            <div v-else class="cancel-refund-section">
                                <div class="d-flex flex-wrap justify-content-between align-items-center p-2 px-3 rounded-3 refund-progress-banner mb-2 font-12">
                                    <span class="text-danger fw-semibold">
                                        <i class="bx bx-refresh me-1"></i> Tiến trình hoàn tiền: <span class="fw-bold">{{ item.hoan_tien.tien_trinh }}</span>
                                    </span>
                                    <span class="text-danger fw-bold">
                                        Tổng hoàn: {{ formatVND(item.hoan_tien.tong_hoan) }}
                                    </span>
                                </div>
                                <p class="font-11 text-muted mb-0 bg-light p-2 rounded-3 border">
                                    {{ item.hoan_tien.ghi_chu_he_thong }}
                                </p>
                            </div>
                        </div>

                        <!-- Resource Assignment: Tour Guide & Vehicle -->
                        <div class="row g-2 mb-3">
                            <div v-if="item.huong_dan_vien" class="col-md-6">
                                <div class="resource-card p-2 rounded-3 border bg-white d-flex align-items-center gap-2">
                                    <div class="resource-avatar bg-purple-light text-purple fw-bold">
                                        {{ item.huong_dan_vien.viet_tat }}
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <div class="fw-bold font-12 text-dark text-truncate">{{ item.huong_dan_vien.ten }}</div>
                                        <div class="font-10 text-muted">{{ item.huong_dan_vien.chi_tiet }}</div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="item.phuong_tien" class="col-md-6">
                                <div class="resource-card p-2 rounded-3 border bg-white d-flex align-items-center gap-2">
                                    <div class="resource-avatar bg-cyan-light text-cyan font-16">
                                        <i class="bx bx-bus"></i>
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <div class="fw-bold font-12 text-dark text-truncate">{{ item.phuong_tien.ten }}</div>
                                        <div class="font-10 text-muted">{{ item.phuong_tien.chi_tiet }}</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Note when resources released -->
                            <div v-if="item.ghi_chu_nhan_luc" class="col-12">
                                <div class="font-11 text-muted fst-italic">
                                    <i class="bx bx-check-shield me-1"></i> {{ item.ghi_chu_nhan_luc }}
                                </div>
                            </div>
                        </div>

                        <!-- Additional hint if any -->
                        <div v-if="item.goi_y_phu" class="font-11 text-secondary mb-3">
                            <i class="bx bx-bulb text-warning me-1"></i> {{ item.goi_y_phu }}
                        </div>

                        <!-- Bottom Row: Revenue & Action Buttons -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-2 border-top">
                            <!-- Revenue display if present -->
                            <div>
                                <span v-if="item.doanh_thu" class="fw-bold font-14 text-dark">
                                    <i class="bx bx-money me-1 text-success"></i> Doanh thu đợt: <span class="text-pink">{{ formatVND(item.doanh_thu) }}</span>
                                </span>
                            </div>

                            <!-- Action Buttons Specific to Status -->
                            <div class="d-flex flex-wrap align-items-center gap-2 ms-auto">
                                <!-- Card 1 Actions -->
                                <template v-if="item.id === 1">
                                    <button class="btn btn-outline-secondary btn-sm rounded-3 px-3 font-12 fw-semibold" @click="chinhSuaCho(item)">
                                        <i class="bx bx-edit-alt me-1"></i> Chỉnh Sửa Chỗ
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm rounded-3 px-3 font-12 fw-semibold" @click="dongBanDot(item)">
                                        <i class="bx bx-lock-alt me-1"></i> Đóng Bán Đợt
                                    </button>
                                    <button class="btn btn-pink-gradient btn-sm text-white rounded-3 px-3 font-12 fw-semibold shadow-sm" @click="xemDanhSachKhach(item)">
                                        <i class="bx bx-group me-1"></i> Xem Danh Sách Khách ({{ item.da_ban }})
                                    </button>
                                </template>

                                <!-- Card 2 Actions -->
                                <template v-else-if="item.id === 2">
                                    <button class="btn btn-outline-purple btn-sm rounded-3 px-3 font-12 fw-semibold" @click="moChuyenPhu(item)">
                                        <i class="bx bx-plus me-1"></i> Mở Thêm Chuyến Phụ
                                    </button>
                                    <button class="btn btn-purple btn-sm text-white rounded-3 px-3 font-12 fw-semibold shadow-sm" @click="xemDanhSachKhach(item)">
                                        <i class="bx bx-check-double me-1"></i> Danh Sách {{ item.da_ban }} Khách Check-in
                                    </button>
                                </template>

                                <!-- Card 3 Actions -->
                                <template v-else-if="item.id === 3">
                                    <button class="btn btn-outline-pink btn-sm rounded-3 px-3 font-12 fw-semibold" @click="kichHoatFlashSaleModal(item)">
                                        <i class="bx bx-bolt-circle me-1"></i> Áp Dụng Flash Sale Kích Cầu
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm rounded-3 px-3 font-12 fw-semibold" @click="chinhSuaCho(item)">
                                        <i class="bx bx-edit-alt me-1"></i> Sửa Lịch & Giá
                                    </button>
                                    <button class="btn btn-cyan btn-sm text-white rounded-3 px-3 font-12 fw-semibold shadow-sm" @click="xemDanhSachKhach(item)">
                                        <i class="bx bx-group me-1"></i> Danh Sách {{ item.da_ban }} Khách
                                    </button>
                                </template>

                                <!-- Card 4 Actions -->
                                <template v-else-if="item.id === 4">
                                    <button class="btn btn-outline-secondary btn-sm rounded-3 px-3 font-12 fw-semibold" @click="xemNhatKyHoanTien(item)">
                                        <i class="bx bx-receipt me-1"></i> Xem Nhật Ký Hoàn Tiền
                                    </button>
                                    <button class="btn btn-purple btn-sm text-white rounded-3 px-3 font-12 fw-semibold shadow-sm" @click="lenLichBu(item)">
                                        <i class="bx bx-calendar-plus me-1"></i> Lên Lịch Bù Vào Ngày Khác
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Monthly Calendar View (View: Lịch Biểu Tháng) -->
        <div v-else-if="cheDoXem === 'lich_thang'" class="calendar-view-container card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 pb-3 border-bottom gap-3">
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-outline-secondary rounded-circle" @click="chuyenThang(-1)">
                        <i class="bx bx-chevron-left"></i>
                    </button>
                    <h5 class="fw-bold mb-0 text-dark">Tháng 11 Năm 2025</h5>
                    <button class="btn btn-sm btn-outline-secondary rounded-circle" @click="chuyenThang(1)">
                        <i class="bx bx-chevron-right"></i>
                    </button>
                </div>
                <div class="d-flex align-items-center gap-3 font-12">
                    <span class="d-flex align-items-center gap-1"><span class="calendar-legend-dot bg-cyan"></span> Đang mở bán</span>
                    <span class="d-flex align-items-center gap-1"><span class="calendar-legend-dot bg-purple"></span> Kín chỗ (100%)</span>
                    <span class="d-flex align-items-center gap-1"><span class="calendar-legend-dot bg-pink"></span> Sắp khởi hành (24h)</span>
                    <span class="d-flex align-items-center gap-1"><span class="calendar-legend-dot bg-danger"></span> Đã hủy tour</span>
                </div>
            </div>

            <!-- Calendar Grid -->
            <div class="calendar-grid">
                <!-- Day Headers -->
                <div class="calendar-day-header text-center fw-bold text-muted py-2" v-for="d in ['Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy', 'Chủ Nhật']" :key="d">
                    {{ d }}
                </div>

                <!-- Calendar Days (Cells) -->
                <div 
                    v-for="cell in calendarCells" 
                    :key="cell.date" 
                    class="calendar-cell p-2"
                    :class="{ 'other-month': cell.isOtherMonth, 'current-day': cell.isToday }"
                >
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="cell-day-num fw-bold" :class="cell.isToday ? 'text-pink' : 'text-dark'">{{ cell.dayNum }}</span>
                        <span v-if="cell.events.length" class="badge rounded-pill bg-light text-muted font-10">{{ cell.events.length }} chuyến</span>
                    </div>

                    <!-- Events inside cell -->
                    <div class="calendar-events-wrap d-flex flex-column gap-1">
                        <div 
                            v-for="ev in cell.events" 
                            :key="ev.ma_chuyen"
                            class="calendar-event-chip p-1 rounded-2 font-10 fw-semibold text-truncate"
                            :class="ev.chipClass"
                            @click="chonChuyenTuLich(ev)"
                            :title="ev.ten_tour + ' - ' + ev.gio_di"
                        >
                            {{ ev.gio_di }} • {{ ev.ten_tour }} ({{ ev.da_dat }}/{{ ev.tong_cho }})
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MODALS ================= -->

        <!-- MODAL 1: Thêm Lịch Khởi Hành Mới -->
        <div v-if="showModalThemLich" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-lg animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-pink text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-calendar-plus font-20"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Thêm Đợt Khởi Hành Mới</h5>
                                <small class="text-muted">Tạo đợt khởi hành, thiết lập chỗ mở bán và phân bổ HDV - Xe</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalThemLich = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label font-12 fw-bold text-dark">Chọn Tour Du Lịch <span class="text-danger">*</span></label>
                                <select class="form-select form-select-sm" v-model="formThemLich.tour_id">
                                    <option value="1">Đà Nẵng – Sơn Trà – Phố Cổ Hội An 1N</option>
                                    <option value="2">Bà Nà Hills – Cầu Vàng Mây Trắng 1N</option>
                                    <option value="3">Hành Trình Di Sản Miền Trung 3N2Đ</option>
                                    <option value="4">Tour Ca Nô & Lặn Ngắm San Hô Sơn Trà</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-12 fw-bold text-dark">Mã Lịch Khởi Hành</label>
                                <input type="text" class="form-control form-control-sm font-monospace" v-model="formThemLich.ma_lich" placeholder="LKH-DN-..." />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-12 fw-bold text-dark">Ngày Khởi Hành <span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-sm" v-model="formThemLich.ngay_khoi_hanh" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-12 fw-bold text-dark">Giờ Xuất Phát <span class="text-danger">*</span></label>
                                <input type="time" class="form-control form-control-sm" v-model="formThemLich.gio_khoi_hanh" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-12 fw-bold text-dark">Ngày Kết Thúc Dự Kiến</label>
                                <input type="date" class="form-control form-control-sm" v-model="formThemLich.ngay_ket_thuc" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-12 fw-bold text-dark">Giờ Trả Khách</label>
                                <input type="time" class="form-control form-control-sm" v-model="formThemLich.gio_ket_thuc" />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label font-12 fw-bold text-dark">Số Chỗ Mở Bán (Ghế) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm" v-model.number="formThemLich.tong_cho" min="1" max="100" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-12 fw-bold text-dark">Giá Vé Người Lớn (VNĐ)</label>
                                <input type="number" class="form-control form-control-sm" v-model.number="formThemLich.gia_ve_nguoi_lon" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-12 fw-bold text-dark">Giá Vé Trẻ Em (VNĐ)</label>
                                <input type="number" class="form-control form-control-sm" v-model.number="formThemLich.gia_ve_tre_em" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-12 fw-bold text-dark">Phân Bổ Hướng Dẫn Viên</label>
                                <select class="form-select form-select-sm" v-model="formThemLich.hdv">
                                    <option value="Nguyễn Văn Hùng (0905.112.334)">Nguyễn Văn Hùng (Kinh nghiệm 6 năm)</option>
                                    <option value="Lê Thị Thảo (0988.456.789)">Lê Thị Thảo (Thẻ Quốc Tế)</option>
                                    <option value="Phan Minh Tuấn (0918.667.121)">Phan Minh Tuấn (Chuyên tuyến Di sản)</option>
                                    <option value="Đặng Tuấn Anh (0935.123.456)">Đặng Tuấn Anh (Chuyên tour sinh thái)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-12 fw-bold text-dark">Phân Bổ Phương Tiện & Tài Xế</label>
                                <select class="form-select form-select-sm" v-model="formThemLich.xe">
                                    <option value="Ford Transit 16 chỗ - 43B-082.31">Ford Transit 16 chỗ (BKS: 43B-082.31 - Bác tài: Trần Văn Tâm)</option>
                                    <option value="Hyundai Universe 45 chỗ - 43B-099.23">Hyundai Universe 45 chỗ (BKS: 43B-099.23)</option>
                                    <option value="Thaco Town 29 chỗ - 43B-071.22">Thaco Town 29 chỗ (BKS: 43B-071.22)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary px-3" @click="showModalThemLich = false">Hủy Bỏ</button>
                        <button class="btn btn-sm btn-pink-gradient text-white px-4 fw-semibold" @click="xacNhanThemLich">
                            <i class="bx bx-check me-1"></i> Lưu & Mở Bán Ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 2: Lên Lịch Tự Động Hàng Tuần -->
        <div v-if="showModalLenLichTuDong" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-purple text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-refresh font-20"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Lên Lịch Tự Động Hàng Tuần</h5>
                                <small class="text-muted">Cấu hình chu kỳ tự động sinh lịch khởi hành định kỳ</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalLenLichTuDong = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark">Chọn Tour Áp Dụng Lịch Tuần</label>
                            <select class="form-select form-select-sm" v-model="formTuDong.tour_id">
                                <option value="all">Tất cả tour đang mở bán tích cực</option>
                                <option value="1">Đà Nẵng – Sơn Trà – Phố Cổ Hội An 1N</option>
                                <option value="2">Bà Nà Hills – Cầu Vàng Mây Trắng 1N</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark">Các Ngày Trong Tuần Khởi Hành</label>
                            <div class="d-flex flex-wrap gap-2">
                                <button 
                                    v-for="(day, idx) in ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN']" 
                                    :key="idx"
                                    type="button"
                                    class="btn btn-sm rounded-pill px-3 font-12 fw-bold"
                                    :class="formTuDong.ngay_trong_tuan.includes(day) ? 'btn-purple text-white' : 'btn-outline-secondary'"
                                    @click="toggleDaySelection(day)"
                                >
                                    {{ day }}
                                </button>
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label font-12 fw-bold text-dark">Khung Giờ Xuất Phát</label>
                                <input type="time" class="form-control form-control-sm" v-model="formTuDong.gio_xuat_phat" />
                            </div>
                            <div class="col-6">
                                <label class="form-label font-12 fw-bold text-dark">Chu Kỳ Tạo (Tuần)</label>
                                <input type="number" class="form-control form-control-sm" v-model.number="formTuDong.so_tuan" min="1" max="12" />
                            </div>
                        </div>

                        <div class="p-3 bg-purple-light rounded-3 border border-purple-subtle font-11">
                            <div class="fw-bold text-purple mb-1"><i class="bx bx-check-shield me-1"></i> Tính năng SmartTrip Scheduler AI:</div>
                            <div class="text-secondary">Hệ thống sẽ tự động đối soát tránh trùng lịch xe và HDV, tự động điều chỉnh giá linh hoạt vào dịp cuối tuần hoặc lễ Tết.</div>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary px-3" @click="showModalLenLichTuDong = false">Hủy</button>
                        <button class="btn btn-sm btn-purple text-white px-4 fw-semibold" @click="xacNhanLenLichTuDong">
                            <i class="bx bx-bolt-circle me-1"></i> Kích Hoạt Lên Lịch Tự Động
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 3: Danh Sách Khách Hàng / Check-in -->
        <div v-if="showModalDanhSachKhach" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-xl animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-pink text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-list-check font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Danh Sách Hành Khách & Điều Phối Chỗ</h5>
                                <small class="text-muted">{{ tourDangChon?.ten_tour }} ({{ tourDangChon?.ma_lich }})</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalDanhSachKhach = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <!-- Summary banner -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between p-3 rounded-3 bg-light border mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div><span class="text-muted font-12">Khởi hành:</span> <strong class="text-dark">{{ tourDangChon?.ngay_khoi_hanh }} lúc {{ tourDangChon?.gio_khoi_hanh }}</strong></div>
                                <div><span class="text-muted font-12">Sĩ số:</span> <strong class="text-pink">{{ tourDangChon?.da_ban }} / {{ tourDangChon?.tong_cho }} ghế</strong></div>
                                <div><span class="text-muted font-12">Đã check-in:</span> <strong class="text-success">{{ demKhachCheckIn }} khách</strong></div>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-outline-success rounded-pill fw-semibold" @click="xuatDanhSachDoan">
                                    <i class="bx bx-download me-1"></i> Xuất Tệp Điểm Danh (PDF/Excel)
                                </button>
                            </div>
                        </div>

                        <!-- Table Manifest -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 font-12">
                                <thead class="table-light">
                                    <tr class="text-muted font-11">
                                        <th>STT</th>
                                        <th>MÃ BOOKING</th>
                                        <th>HỌ VÀ TÊN</th>
                                        <th>SỐ ĐIỆN THOẠI</th>
                                        <th>LOẠI VÉ / GHẾ</th>
                                        <th>ĐI CÙNG</th>
                                        <th>THANH TOÁN</th>
                                        <th>TRẠNG THÁI</th>
                                        <th class="text-center">CHECK-IN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(k, idx) in danhSachKhachDemo" :key="k.ma_booking">
                                        <td class="text-muted">{{ idx + 1 }}</td>
                                        <td class="font-monospace fw-bold text-pink">{{ k.ma_booking }}</td>
                                        <td>
                                            <div class="fw-bold text-dark">{{ k.ho_ten }}</div>
                                            <small class="text-muted">{{ k.email }}</small>
                                        </td>
                                        <td>{{ k.sdt }}</td>
                                        <td>
                                            <span class="badge bg-light text-dark border">{{ k.loai_ve }}</span>
                                            <span class="badge bg-secondary-subtle text-secondary border ms-1">Ghế {{ k.so_ghe }}</span>
                                        </td>
                                        <td>{{ k.so_khach_di_cung }} người</td>
                                        <td>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle">
                                                <i class="bx bx-check me-1"></i> Đã thanh toán
                                            </span>
                                        </td>
                                        <td>
                                            <span :class="k.da_checkin ? 'badge bg-success' : 'badge bg-secondary'">
                                                {{ k.da_checkin ? 'Đã lên xe' : 'Chờ đón' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button 
                                                class="btn btn-sm rounded-pill font-11 px-2"
                                                :class="k.da_checkin ? 'btn-outline-danger' : 'btn-success text-white'"
                                                @click="k.da_checkin = !k.da_checkin"
                                            >
                                                <i :class="k.da_checkin ? 'bx bx-x me-1' : 'bx bx-check me-1'"></i>
                                                {{ k.da_checkin ? 'Hủy Check-in' : 'Check-in' }}
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end">
                        <button class="btn btn-sm btn-secondary px-4" @click="showModalDanhSachKhach = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 4: Flash Sale Kích Cầu -->
        <div v-if="showModalFlashSale" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-pink text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-bolt-circle font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Kích Hoạt Flash Sale Kích Cầu</h5>
                                <small class="text-muted">Đẩy mạnh bán 11 chỗ trống còn lại trước giờ khởi hành</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalFlashSale = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark">Mức giảm giá khuyến mãi</label>
                            <div class="d-flex gap-2">
                                <button 
                                    v-for="dis in [10, 15, 20]" 
                                    :key="dis"
                                    type="button"
                                    class="btn btn-sm flex-fill fw-bold"
                                    :class="flashSalePercent === dis ? 'btn-pink-gradient text-white' : 'btn-outline-secondary'"
                                    @click="flashSalePercent = dis"
                                >
                                    -{{ dis }}%
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark">Số lượng ghế áp dụng</label>
                            <input type="number" class="form-control form-control-sm" v-model.number="flashSaleSeats" min="1" max="11" />
                            <small class="text-muted font-11">Tối đa 11 ghế trống còn lại</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark">Thời hạn hiệu lực Flash Sale</label>
                            <select class="form-select form-select-sm" v-model="flashSaleHours">
                                <option value="12">12 Giờ tới</option>
                                <option value="24">24 Giờ tới (Khuyến nghị AI)</option>
                                <option value="48">Cho đến lúc xuất phát</option>
                            </select>
                        </div>

                        <div class="p-3 bg-pink-light rounded-3 border border-pink-subtle font-11 text-pink">
                            <i class="bx bx-broadcast me-1"></i> Sau khi bấm xác nhận, SmartTrip AI sẽ gửi Push Notification tới 1.250 du khách đang tìm kiếm tour tại Đà Nẵng.
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary px-3" @click="showModalFlashSale = false">Hủy</button>
                        <button class="btn btn-sm btn-pink-gradient text-white px-4 fw-semibold" @click="xacNhanFlashSale">
                            <i class="bx bx-bolt-circle me-1"></i> Phát Động Flash Sale Ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 5: Nhật Ký Hoàn Tiền Chuyến Hủy -->
        <div v-if="showModalNhatKyHoanTien" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-lg animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-danger text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-receipt font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Nhật Ký Hoàn Tiền Tự Động</h5>
                                <small class="text-muted">Đợt LKH-SN-20251202-04 • Biển động sóng cấp 6-7</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalNhatKyHoanTien = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="alert alert-success d-flex align-items-center gap-2 font-12 py-2 mb-3">
                            <i class="bx bx-check-circle font-18"></i>
                            <div>Đã giải ngân hoàn tiền 100% tự động qua cổng thanh toán VNPAY/MoMo. Không có khiếu nại phát sinh từ 15 hành khách.</div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-hover align-middle font-12 mb-0">
                                <thead class="table-light">
                                    <tr class="text-muted font-11">
                                        <th>MÃ GIAO DỊCH</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>SỐ TIỀN HOÀN</th>
                                        <th>CỔNG THANH TOÁN</th>
                                        <th>THỜI GIAN HOÀN</th>
                                        <th>TRẠNG THÁI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="rf in danhSachHoanTien" :key="rf.ma_gd">
                                        <td class="font-monospace text-muted">{{ rf.ma_gd }}</td>
                                        <td class="fw-bold text-dark">{{ rf.ten_khach }}</td>
                                        <td class="text-danger fw-bold">{{ formatVND(rf.so_tien) }}</td>
                                        <td>{{ rf.cong_tt }}</td>
                                        <td class="text-muted">{{ rf.thoi_gian }}</td>
                                        <td><span class="badge bg-success"><i class="bx bx-check"></i> Thành công</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end">
                        <button class="btn btn-sm btn-secondary px-4" @click="showModalNhatKyHoanTien = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 6: Lên Lịch Bù Đợt Hủy -->
        <div v-if="showModalLenLichBu" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-purple text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-calendar-plus font-20"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Lên Lịch Bù Vào Ngày Khác</h5>
                                <small class="text-muted">Tạo đợt thay thế và ưu tiên chuyển chỗ cho 15 khách đã hủy</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalLenLichBu = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark">Chọn Ngày Mới Khởi Hành Bù</label>
                            <input type="date" class="form-control form-control-sm" v-model="ngayKhoiHanhBu" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-12 fw-bold text-dark">Giờ Xuất Phát Mới</label>
                            <input type="time" class="form-control form-control-sm" v-model="gioKhoiHanhBu" />
                        </div>
                        <div class="p-3 bg-light rounded-3 font-11 text-muted">
                            Hệ thống sẽ gửi SMS/Zalo thông báo đợt bù kèm ưu đãi giữ nguyên giá vé gốc và tặng kèm voucher trải nghiệm lặn biển VIP.
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary px-3" @click="showModalLenLichBu = false">Hủy</button>
                        <button class="btn btn-sm btn-purple text-white px-4 fw-semibold" @click="xacNhanLichBu">
                            <i class="bx bx-check me-1"></i> Xác Nhận Tạo Lịch Bù
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'LichKhoiHanhComponent',
    data() {
        return {
            cheDoXem: 'danh_sach', // 'danh_sach' hoặc 'lich_thang'
            locTheoTour: '',
            locThoiGian: 'tuan_nay',
            locTrangThai: '',

            // Modals toggle states
            showModalThemLich: false,
            showModalLenLichTuDong: false,
            showModalDanhSachKhach: false,
            showModalFlashSale: false,
            showModalNhatKyHoanTien: false,
            showModalLenLichBu: false,

            // Selected departure for modal inspection
            tourDangChon: null,

            // Form states
            formThemLich: {
                tour_id: '1',
                ma_lich: 'LKH-DN-20251205-05',
                ngay_khoi_hanh: '2025-12-05',
                gio_khoi_hanh: '07:30',
                ngay_ket_thuc: '2025-12-05',
                gio_ket_thuc: '19:00',
                tong_cho: 25,
                gia_ve_nguoi_lon: 650000,
                gia_ve_tre_em: 450000,
                hdv: 'Nguyễn Văn Hùng (0905.112.334)',
                xe: 'Ford Transit 16 chỗ - 43B-082.31'
            },
            formTuDong: {
                tour_id: 'all',
                ngay_trong_tuan: ['T2', 'T4', 'T6', 'CN'],
                gio_xuat_phat: '07:30',
                so_tuan: 4
            },
            flashSalePercent: 10,
            flashSaleSeats: 5,
            flashSaleHours: '24',

            ngayKhoiHanhBu: '2025-12-09',
            gioKhoiHanhBu: '08:30',

            // 4 Primary Departure Items matching Image 100%
            danhSachLich: [
                {
                    id: 1,
                    ma_tour: 'DN-SONTRA',
                    doi_tac: 'Đà Nẵng Explorer Travel & Du Lịch',
                    tag_text: 'Sắp khởi hành trong 16h',
                    tag_class: 'bg-pink text-white',
                    tag_icon: 'bx bx-bolt-circle',
                    ten_tour: 'Đà Nẵng – Sơn Trà – Phố Cổ Hội An 1N',
                    ma_lich: 'LKH-DN-20251125-01',
                    hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop&q=80',
                    thu_text: 'TH.3',
                    ngay_so: '25',
                    date_badge_theme: 'badge-theme-pink',
                    tieu_de_ngay: 'Khởi hành',
                    ngay_khoi_hanh: '25/11/2025',
                    gio_khoi_hanh: '07:30 Sáng',
                    icon_lich_trinh: 'bx bx-flag',
                    thong_tin_lich_trinh: 'Kết thúc: Cùng ngày 25/11/2025 lúc 19:00 tại điểm hẹn',
                    trang_thai: 'dang_mo_ban',
                    status_badges: [
                        { text: '● Đang mở bán', class: 'badge-soft-cyan' },
                        { text: '⚠️ Chỉ còn 3 chỗ!', class: 'badge-soft-orange' }
                    ],
                    nhan_suc_chua: 'Sức chứa đợt chạy',
                    da_ban: 22,
                    tong_cho: 25,
                    ghi_chu_ti_le: 'Đã bán 88%',
                    nhan_con_lai: 'Còn trống',
                    con_trong: 3,
                    ty_le_lap_day: 88,
                    progress_bar_class: 'bg-pink',
                    ve_da_book: {
                        nguoi_lon: 18,
                        tre_em: 4,
                        giu_cho: 3
                    },
                    waitlist: null,
                    ai_suggestion: null,
                    huong_dan_vien: {
                        viet_tat: 'NV',
                        ten: 'HDV: Nguyễn Văn Hùng',
                        chi_tiet: '0905.112.334 • Kinh nghiệm 6 năm'
                    },
                    phuong_tien: {
                        ten: 'Xe: Ford Transit 16 chỗ',
                        chi_tiet: 'BKS: 43B-082.31 • Bác tài: Trần Văn Tâm'
                    },
                    doanh_thu: 28400000,
                    hoan_tien: null,
                    ghi_chu_nhan_luc: null,
                    goi_y_phu: null
                },
                {
                    id: 2,
                    ma_tour: 'DN-BANA',
                    doi_tac: 'Đà Nẵng Explorer Travel & Du Lịch',
                    tag_text: 'Kín Chỗ 100%',
                    tag_class: 'bg-purple text-white',
                    tag_icon: 'bx bx-check-double',
                    ten_tour: 'Bà Nà Hills – Cầu Vàng Mây Trắng 1N',
                    ma_lich: 'LKH-DN-20251126-02',
                    hinh_anh: 'https://images.unsplash.com/photo-1570789210967-2cac24afeb00?w=600&auto=format&fit=crop&q=80',
                    thu_text: 'TH.4',
                    ngay_so: '26',
                    date_badge_theme: 'badge-theme-purple',
                    tieu_de_ngay: 'Khởi hành',
                    ngay_khoi_hanh: '26/11/2025',
                    gio_khoi_hanh: '08:00 Sáng',
                    icon_lich_trinh: 'bx bx-time',
                    thong_tin_lich_trinh: 'Thời lượng tour: 1 Ngày (Trả khách lúc 17:30)',
                    trang_thai: 'da_dong',
                    status_badges: [
                        { text: '🔒 Đã đóng (Hết chỗ)', class: 'badge-soft-purple' }
                    ],
                    nhan_suc_chua: 'Tình trạng vé',
                    da_ban: 40,
                    tong_cho: 40,
                    ghi_chu_ti_le: 'Đạt tuyệt đối 100%',
                    nhan_con_lai: 'Số chỗ còn lại',
                    con_trong: 0,
                    ty_le_lap_day: 100,
                    progress_bar_class: 'bg-purple',
                    ve_da_book: null,
                    waitlist: {
                        so_khach: 7,
                        doanh_thu_du_kien: 58000000
                    },
                    ai_suggestion: null,
                    huong_dan_vien: {
                        viet_tat: 'LT',
                        ten: 'HDV chính: Lê Thị Thảo',
                        chi_tiet: '0988.456.789 • Thẻ Quốc Tế'
                    },
                    phuong_tien: {
                        ten: 'Xe Hyundai Universe 45 chỗ',
                        chi_tiet: 'BKS: 43B-099.23 (Đã hoàn tất kiểm định xe)'
                    },
                    doanh_thu: null,
                    hoan_tien: null,
                    ghi_chu_nhan_luc: null,
                    goi_y_phu: 'Nhu cầu cao: Có thể mở thêm chuyến phụ để tăng doanh thu'
                },
                {
                    id: 3,
                    ma_tour: 'DN-DISAN',
                    doi_tac: 'Đà Nẵng Explorer Travel & Du Lịch',
                    tag_text: 'Tour Dài Ngày 3N2Đ',
                    tag_class: 'bg-cyan text-white',
                    tag_icon: 'bx bx-bookmark-alt',
                    ten_tour: 'Hành Trình Di Sản Miền Trung 3N2Đ',
                    ma_lich: 'LKH-DS-20251128-03',
                    hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=600&auto=format&fit=crop&q=80',
                    thu_text: 'TH.6',
                    ngay_so: '28',
                    date_badge_theme: 'badge-theme-cyan',
                    tieu_de_ngay: 'Khởi hành',
                    ngay_khoi_hanh: '28/11/2025',
                    gio_khoi_hanh: '07:30 Sáng',
                    icon_lich_trinh: 'bx bx-flag',
                    thong_tin_lich_trinh: 'Kết thúc: 30/11/2025 lúc 18:30 (Đà Nẵng – Huế – Hội An)',
                    trang_thai: 'dang_mo_ban',
                    status_badges: [
                        { text: '● Đang mở bán', class: 'badge-soft-cyan' },
                        { text: 'Còn 11 chỗ trống', class: 'badge-soft-secondary' }
                    ],
                    nhan_suc_chua: 'Đã lấp đầy',
                    da_ban: 9,
                    tong_cho: 20,
                    ghi_chu_ti_le: '45% công suất',
                    nhan_con_lai: 'Mục tiêu điểm hòa vốn',
                    con_trong: 13,
                    ty_le_lap_day: 45,
                    progress_bar_class: 'bg-cyan',
                    ve_da_book: null,
                    waitlist: null,
                    ai_suggestion: {
                        thong_diep: 'Kích hoạt Flash Sale giảm 10% để chốt thêm 5 ghế trong 24h tới',
                        doanh_thu_hien_tai: 42750000
                    },
                    huong_dan_vien: {
                        viet_tat: 'PM',
                        ten: 'HDV: Phan Minh Tuấn',
                        chi_tiet: '0918.667.121 • Chuyên tuyến Di sản'
                    },
                    phuong_tien: {
                        ten: 'Xe Thaco Town 29 chỗ',
                        chi_tiet: 'BKS: 43B-071.22 • Ghế ngả cao cấp'
                    },
                    doanh_thu: null,
                    hoan_tien: null,
                    ghi_chu_nhan_luc: null,
                    goi_y_phu: null
                },
                {
                    id: 4,
                    ma_tour: 'DN-CANO',
                    doi_tac: 'Đà Nẵng Explorer Travel & Du Lịch',
                    tag_text: 'Đã Hủy Tour',
                    tag_class: 'bg-danger text-white',
                    tag_icon: 'bx bx-x-circle',
                    ten_tour: 'Tour Ca Nô & Lặn Ngắm San Hô Sơn Trà',
                    ma_lich: 'LKH-SN-20251202-04',
                    hinh_anh: 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600&auto=format&fit=crop&q=80',
                    thu_text: 'TH.3',
                    ngay_so: '02',
                    date_badge_theme: 'badge-theme-danger',
                    tieu_de_ngay: 'Ngày dự kiến',
                    ngay_khoi_hanh: '02/12/2025',
                    gio_khoi_hanh: '08:30 Sáng',
                    icon_lich_trinh: 'bx bx-error-circle',
                    thong_tin_lich_trinh: 'Lý do hủy: Biển động sóng cấp 6-7, không đủ điều kiện an toàn hàng hải',
                    trang_thai: 'da_huy',
                    status_badges: [
                        { text: '🚫 Đã Hủy Đợt Khởi Hành', class: 'badge-soft-danger' }
                    ],
                    nhan_suc_chua: '',
                    da_ban: 0,
                    tong_cho: 25,
                    ghi_chu_ti_le: '',
                    nhan_con_lai: '',
                    con_trong: 0,
                    ty_le_lap_day: 0,
                    progress_bar_class: 'bg-danger',
                    ve_da_book: null,
                    waitlist: null,
                    ai_suggestion: null,
                    huong_dan_vien: null,
                    phuong_tien: null,
                    doanh_thu: null,
                    hoan_tien: {
                        tien_trinh: 'Đã hoàn tiền tự động 100% cho 15 khách',
                        tong_hoan: 12750000,
                        ghi_chu_he_thong: 'Hệ thống SmartTrip AI đã gửi thông báo SMS/Zalo kèm Voucher giảm giá 15% đền bù cho toàn bộ du khách. Không có khiếu nại phát sinh.'
                    },
                    ghi_chu_nhan_luc: 'Tài xế và hậu cần đã giải phóng công việc và HDV tự do.',
                    goi_y_phu: null
                }
            ],

            // Demo Passenger List for Modal
            danhSachKhachDemo: [
                { ma_booking: 'BK-20251125-01', ho_ten: 'Trần Hoàng Nam', email: 'nam.tran@gmail.com', sdt: '0905.888.234', loai_ve: 'Người lớn', so_ghe: 'A01', so_khach_di_cung: 2, da_checkin: true },
                { ma_booking: 'BK-20251125-02', ho_ten: 'Lê Thu Hương', email: 'huong.le@gmail.com', sdt: '0905.000.235', loai_ve: 'Người lớn', so_ghe: 'A02', so_khach_di_cung: 0, da_checkin: true },
                { ma_booking: 'BK-20251125-03', ho_ten: 'Trần Khánh Huyền', email: 'huyen.tran@gmail.com', sdt: '0905.888.234', loai_ve: 'Trẻ em', so_ghe: 'A03', so_khach_di_cung: 0, da_checkin: true },
                { ma_booking: 'BK-20251125-04', ho_ten: 'Nguyễn Mai Anh', email: 'maianh.nguyen@outlook.com', sdt: '0912.445.679', loai_ve: 'Người lớn', so_ghe: 'B01', so_khach_di_cung: 3, da_checkin: false },
                { ma_booking: 'BK-20251125-05', ho_ten: 'Phạm Thúy Hằng', email: 'hangpham.art@gmail.com', sdt: '0977.345.112', loai_ve: 'Người lớn', so_ghe: 'B02', so_khach_di_cung: 1, da_checkin: false },
                { ma_booking: 'BK-20251125-06', ho_ten: 'Đặng Quốc Bảo', email: 'baodangdev@gmail.com', sdt: '0935.918.776', loai_ve: 'Người lớn', so_ghe: 'B03', so_khach_di_cung: 2, da_checkin: true }
            ],

            // Demo Refund transactions list for Modal
            danhSachHoanTien: [
                { ma_gd: 'REF-20251202-001', ten_khach: 'Nguyễn Văn Tâm', so_tien: 1700000, cong_tt: 'VNPAY QR', thoi_gian: '02/12/2025 08:35' },
                { ma_gd: 'REF-20251202-002', ten_khach: 'Hoàng Kim Chi', so_tien: 2550000, cong_tt: 'Ví MoMo', thoi_gian: '02/12/2025 08:36' },
                { ma_gd: 'REF-20251202-003', ten_khach: 'Đinh Tuấn Kiệt', so_tien: 1700000, cong_tt: 'Thẻ Quốc tế Visa', thoi_gian: '02/12/2025 08:38' },
                { ma_gd: 'REF-20251202-004', ten_khach: 'Bùi Phương Linh', so_tien: 3400000, cong_tt: 'Chuyển khoản Vietcombank', thoi_gian: '02/12/2025 08:40' },
                { ma_gd: 'REF-20251202-005', ten_khach: 'Trương Ngọc Mai', so_tien: 3400000, cong_tt: 'Ví ShopeePay', thoi_gian: '02/12/2025 08:42' }
            ],

            // Calendar cells demo for November 2025
            calendarCells: [
                { date: '2025-10-27', dayNum: 27, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-10-28', dayNum: 28, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-10-29', dayNum: 29, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-10-30', dayNum: 30, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-10-31', dayNum: 31, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-11-01', dayNum: 1, isOtherMonth: false, isToday: false, events: [{ ma_chuyen: 'DN-BANA-01', ten_tour: 'Bà Nà Hills', gio_di: '07:30', da_dat: 45, tong_cho: 45, chipClass: 'bg-purple-subtle text-purple' }] },
                { date: '2025-11-02', dayNum: 2, isOtherMonth: false, isToday: false, events: [] },

                { date: '2025-11-03', dayNum: 3, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-04', dayNum: 4, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-05', dayNum: 5, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-06', dayNum: 6, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-07', dayNum: 7, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-08', dayNum: 8, isOtherMonth: false, isToday: false, events: [{ ma_chuyen: 'DN-DISAN-01', ten_tour: 'Di Sản Miền Trung', gio_di: '07:00', da_dat: 20, tong_cho: 20, chipClass: 'bg-cyan-subtle text-cyan' }] },
                { date: '2025-11-09', dayNum: 9, isOtherMonth: false, isToday: false, events: [] },

                { date: '2025-11-10', dayNum: 10, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-11', dayNum: 11, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-12', dayNum: 12, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-13', dayNum: 13, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-14', dayNum: 14, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-15', dayNum: 15, isOtherMonth: false, isToday: false, events: [{ ma_chuyen: 'DN-SONTRA-02', ten_tour: 'Sơn Trà - Hội An', gio_di: '08:00', da_dat: 16, tong_cho: 16, chipClass: 'bg-pink-subtle text-pink' }] },
                { date: '2025-11-16', dayNum: 16, isOtherMonth: false, isToday: false, events: [] },

                { date: '2025-11-17', dayNum: 17, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-18', dayNum: 18, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-19', dayNum: 19, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-20', dayNum: 20, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-21', dayNum: 21, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-22', dayNum: 22, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-23', dayNum: 23, isOtherMonth: false, isToday: false, events: [] },

                { date: '2025-11-24', dayNum: 24, isOtherMonth: false, isToday: false, events: [] },
                { 
                    date: '2025-11-25', 
                    dayNum: 25, 
                    isOtherMonth: false, 
                    isToday: true, 
                    events: [
                        { ma_chuyen: 'LKH-DN-20251125-01', ten_tour: 'Sơn Trà - Hội An', gio_di: '07:30', da_dat: 22, tong_cho: 25, chipClass: 'bg-pink-subtle text-pink' }
                    ] 
                },
                { 
                    date: '2025-11-26', 
                    dayNum: 26, 
                    isOtherMonth: false, 
                    isToday: false, 
                    events: [
                        { ma_chuyen: 'LKH-DN-20251126-02', ten_tour: 'Bà Nà Hills', gio_di: '08:00', da_dat: 40, tong_cho: 40, chipClass: 'bg-purple-subtle text-purple' }
                    ] 
                },
                { date: '2025-11-27', dayNum: 27, isOtherMonth: false, isToday: false, events: [] },
                { 
                    date: '2025-11-28', 
                    dayNum: 28, 
                    isOtherMonth: false, 
                    isToday: false, 
                    events: [
                        { ma_chuyen: 'LKH-DS-20251128-03', ten_tour: 'Di Sản 3N2Đ', gio_di: '07:30', da_dat: 9, tong_cho: 20, chipClass: 'bg-cyan-subtle text-cyan' }
                    ] 
                },
                { date: '2025-11-29', dayNum: 29, isOtherMonth: false, isToday: false, events: [] },
                { date: '2025-11-30', dayNum: 30, isOtherMonth: false, isToday: false, events: [] },

                { date: '2025-12-01', dayNum: 1, isOtherMonth: true, isToday: false, events: [] },
                { 
                    date: '2025-12-02', 
                    dayNum: 2, 
                    isOtherMonth: true, 
                    isToday: false, 
                    events: [
                        { ma_chuyen: 'LKH-SN-20251202-04', ten_tour: 'Ca Nô Sơn Trà', gio_di: '08:30', da_dat: 0, tong_cho: 25, chipClass: 'bg-danger-subtle text-danger' }
                    ] 
                },
                { date: '2025-12-03', dayNum: 3, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-12-04', dayNum: 4, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-12-05', dayNum: 5, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-12-06', dayNum: 6, isOtherMonth: true, isToday: false, events: [] },
                { date: '2025-12-07', dayNum: 7, isOtherMonth: true, isToday: false, events: [] }
            ]
        };
    },
    computed: {
        danhSachLoc() {
            return this.danhSachLich.filter(item => {
                const khopTour = !this.locTheoTour || item.ma_tour === this.locTheoTour;
                const khopTrangThai = !this.locTrangThai || item.trang_thai === this.locTrangThai;
                return khopTour && khopTrangThai;
            });
        },
        demKhachCheckIn() {
            return this.danhSachKhachDemo.filter(x => x.da_checkin).length;
        }
    },
    methods: {
        formatVND(value) {
            if (!value) return '0 đ';
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
        },

        // Top actions
        moModalThemLichMoi() {
            this.showModalThemLich = true;
        },
        moModalLenLichTuDong() {
            this.showModalLenLichTuDong = true;
        },

        // Day selection toggle for automated schedule
        toggleDaySelection(day) {
            const idx = this.formTuDong.ngay_trong_tuan.indexOf(day);
            if (idx > -1) {
                this.formTuDong.ngay_trong_tuan.splice(idx, 1);
            } else {
                this.formTuDong.ngay_trong_tuan.push(day);
            }
        },

        xacNhanThemLich() {
            alert(`Đã thêm mới và mở bán thành công đợt khởi hành: ${this.formThemLich.ma_lich}`);
            this.showModalThemLich = false;
        },

        xacNhanLenLichTuDong() {
            alert(`SmartTrip Scheduler AI đã kích hoạt lịch tự động cho các thứ [${this.formTuDong.ngay_trong_tuan.join(', ')}] trong vòng ${this.formTuDong.so_tuan} tuần!`);
            this.showModalLenLichTuDong = false;
        },

        // Card action methods
        chinhSuaCho(item) {
            this.tourDangChon = item;
            this.formThemLich.ma_lich = item.ma_lich;
            this.formThemLich.tong_cho = item.tong_cho;
            this.showModalThemLich = true;
        },

        dongBanDot(item) {
            if (confirm(`Bạn có chắc muốn đóng mở bán đợt khởi hành ${item.ma_lich}?`)) {
                item.trang_thai = 'da_dong';
                item.status_badges = [{ text: '🔒 Đã đóng bán', class: 'badge-soft-secondary' }];
                alert(`Đã đóng bán đợt ${item.ma_lich}!`);
            }
        },

        xemDanhSachKhach(item) {
            this.tourDangChon = item;
            this.showModalDanhSachKhach = true;
        },

        moChuyenPhu(item) {
            if (confirm(`Mở thêm chuyến phụ cho "${item.ten_tour}" vào 08:30 sáng (lệch 30 phút so với chuyến chính)?`)) {
                alert(`Đã tạo chuyến phụ LKH-DN-20251126-02B và mở bán 45 chỗ thành công!`);
            }
        },

        kichHoatFlashSaleModal(item) {
            this.tourDangChon = item;
            this.showModalFlashSale = true;
        },

        xacNhanFlashSale() {
            alert(`Đã kích hoạt Flash Sale giảm ${this.flashSalePercent}% cho ${this.flashSaleSeats} ghế còn lại trong ${this.flashSaleHours} giờ tới!`);
            this.showModalFlashSale = false;
        },

        xemNhatKyHoanTien(item) {
            this.tourDangChon = item;
            this.showModalNhatKyHoanTien = true;
        },

        lenLichBu(item) {
            this.tourDangChon = item;
            this.showModalLenLichBu = true;
        },

        xacNhanLichBu() {
            alert(`Đã tạo đợt khởi hành bù vào ${this.ngayKhoiHanhBu} lúc ${this.gioKhoiHanhBu} và gửi tin nhắn tự động đến 15 khách!`);
            this.showModalLenLichBu = false;
        },

        xuatDanhSachDoan() {
            alert('Đang trích xuất tệp danh sách đoàn khách (PDF/Excel) có mã QR check-in...');
        },

        chuyenThang(delta) {
            alert(`Chuyển ${delta > 0 ? 'tháng kế tiếp' : 'tháng trước'}`);
        },

        chonChuyenTuLich(ev) {
            const found = this.danhSachLich.find(x => x.ma_lich === ev.ma_chuyen);
            if (found) {
                this.xemDanhSachKhach(found);
            } else {
                alert(`Chuyến: ${ev.ten_tour} (${ev.ma_chuyen})`);
            }
        }
    }
};
</script>

<style scoped>
/* Page Container */
.partner-lich-khoi-hanh-page {
    color: #1e293b;
    font-family: inherit;
}

/* Badge tag pills */
.badge-tag-pill {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.75rem;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.03em;
    border-radius: 9999px;
}

.tag-pink {
    background-color: #ffe4e6;
    color: #e11d48;
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

/* Top Buttons */
.btn-auto-schedule {
    background-color: #faf5ff;
    color: #7e22ce;
    border: 1px solid #d8b4fe;
    font-size: 0.8rem;
    font-weight: 600;
    border-radius: 10px;
    padding: 0.5rem 1rem;
    transition: all 0.2s;
}

.btn-auto-schedule:hover {
    background-color: #f3e8ff;
    color: #6b21a8;
}

.btn-add-departure {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    color: #ffffff;
    border: none;
    font-size: 0.8rem;
    font-weight: 700;
    border-radius: 10px;
    padding: 0.5rem 1.15rem;
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.25);
    transition: all 0.2s;
}

.btn-add-departure:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(225, 29, 72, 0.35);
    color: #ffffff;
}

/* 4 KPI Cards */
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
    font-size: 1.35rem;
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
    font-size: 1.2rem;
    flex-shrink: 0;
}

.icon-pink { background-color: #ffe4e6; color: #e11d48; }
.icon-purple { background-color: #f3e8ff; color: #9333ea; }
.icon-cyan { background-color: #e0f2fe; color: #0284c7; }

.progress-thin {
    height: 5px;
    border-radius: 999px;
    background-color: #f1f5f9;
}

.status-dot-pulse {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    display: inline-block;
}

/* Filter Toolbar */
.filter-toolbar {
    border: 1px solid #f1f5f9 !important;
}

.view-switch-group {
    background-color: #f1f5f9;
}

.view-toggle-btn {
    border: none;
    font-size: 0.78rem;
    padding: 0.35rem 0.9rem;
    transition: all 0.2s;
}

.view-toggle-btn.active-view {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    color: #ffffff !important;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.25);
}

.tour-select-filter,
.status-select-filter {
    font-size: 0.78rem;
    font-weight: 600;
    border-color: #e2e8f0;
    border-radius: 8px;
    padding: 0.35rem 1.8rem 0.35rem 0.75rem;
    color: #334155;
}

.filter-pill-btn {
    border: 1px solid #e2e8f0;
    background-color: #ffffff;
    color: #64748b;
    font-size: 0.76rem;
    font-weight: 600;
    border-radius: 999px;
    padding: 0.3rem 0.8rem;
    transition: all 0.15s;
}

.filter-pill-btn:hover {
    background-color: #f8fafc;
    color: #334155;
}

.filter-pill-btn.active {
    background-color: #fff1f2;
    border-color: #f43f5e;
    color: #e11d48;
    font-weight: 700;
}

/* Departure Card Items */
.departure-card-item {
    border: 1px solid #e2e8f0 !important;
    transition: all 0.2s ease-in-out;
}

.departure-card-item:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06) !important;
}

.col-xl-35 {
    width: 100%;
}

.col-xl-85 {
    width: 100%;
}

@media (min-width: 992px) {
    .col-xl-35 {
        width: 32%;
    }
    .col-xl-85 {
        width: 68%;
    }
}

.departure-cover-img {
    height: 100%;
    min-height: 240px;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.departure-cover-img::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(15, 23, 42, 0.5) 0%, rgba(15, 23, 42, 0.1) 40%, rgba(15, 23, 42, 0.85) 100%);
    pointer-events: none;
}

.cover-top-meta,
.cover-floating-badge,
.cover-bottom-meta {
    position: relative;
    z-index: 2;
}

.partner-tag-chip {
    font-size: 0.65rem;
    font-weight: 600;
    background-color: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(4px);
    color: #0f172a;
    padding: 0.2rem 0.55rem;
    border-radius: 6px;
}

.tour-name-overlay {
    font-size: 1.15rem;
    line-height: 1.35;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

/* Date Box */
.date-badge-box {
    width: 52px;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    background-color: #ffffff;
    flex-shrink: 0;
}

.date-header {
    font-size: 0.64rem;
    font-weight: 800;
    padding: 0.15rem 0;
    color: #ffffff;
    text-align: center;
}

.date-number {
    font-size: 1.25rem;
    font-weight: 800;
    padding: 0.2rem 0;
    color: #0f172a;
    line-height: 1;
}

.badge-theme-pink { background-color: #e11d48; }
.badge-theme-purple { background-color: #9333ea; }
.badge-theme-cyan { background-color: #0284c7; }
.badge-theme-danger { background-color: #dc2626; }

/* Status Badges */
.badge-soft-cyan {
    background-color: #e0f2fe;
    color: #0284c7;
    border: 1px solid #bae6fd;
}

.badge-soft-orange {
    background-color: #fff7ed;
    color: #ea580c;
    border: 1px solid #ffedd5;
}

.badge-soft-purple {
    background-color: #f3e8ff;
    color: #9333ea;
    border: 1px solid #e9d5ff;
}

.badge-soft-secondary {
    background-color: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
}

.badge-soft-danger {
    background-color: #fef2f2;
    color: #dc2626;
    border: 1px solid #fecaca;
}

/* Progress bar capacity */
.progress-capacity {
    height: 6px;
    border-radius: 999px;
    background-color: #f1f5f9;
}

/* Alert boxes */
.waitlist-box {
    background-color: #faf5ff;
    border: 1px solid #ede9fe;
}

.ai-suggestion-banner {
    background-color: #f0fdfa;
    border: 1px solid #ccfbf1;
}

.refund-progress-banner {
    background-color: #fef2f2;
    border: 1px solid #fee2e2;
}

/* Resource Cards */
.resource-avatar {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.bg-purple-light { background-color: #f3e8ff; }
.text-purple { color: #9333ea; }
.btn-purple { background-color: #9333ea; border: none; }
.btn-purple:hover { background-color: #7e22ce; color: #ffffff; }

.bg-cyan-light { background-color: #e0f2fe; }
.text-cyan { color: #0284c7; }
.bg-cyan { background-color: #0284c7; }
.btn-cyan { background-color: #0284c7; border: none; }
.btn-cyan:hover { background-color: #0369a1; color: #ffffff; }

.btn-outline-purple {
    border: 1px solid #d8b4fe;
    color: #7e22ce;
    background-color: #faf5ff;
}

.btn-outline-purple:hover {
    background-color: #f3e8ff;
    color: #6b21a8;
}

.btn-outline-pink {
    border: 1px solid #f43f5e;
    color: #e11d48;
    background-color: #ffffff;
}

.btn-outline-pink:hover {
    background-color: #fff1f2;
    color: #be123c;
}

.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
}

.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #be123c 0%, #db2777 100%);
}

.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }

/* Calendar View */
.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 4px;
}

.calendar-cell {
    min-height: 100px;
    border: 1px solid #f1f5f9;
    border-radius: 8px;
    background-color: #ffffff;
    transition: background-color 0.15s;
}

.calendar-cell:hover {
    background-color: #f8fafc;
}

.calendar-cell.other-month {
    background-color: #fafafa;
    opacity: 0.6;
}

.calendar-cell.current-day {
    border-color: #f43f5e;
    background-color: #fff1f2;
}

.calendar-legend-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

.calendar-event-chip {
    cursor: pointer;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.calendar-event-chip:hover {
    filter: brightness(0.95);
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
.modal-dialog-custom.modal-lg { max-width: 760px; }
.modal-dialog-custom.modal-xl { max-width: 1040px; }

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

/* Font scale helpers */
.font-10 { font-size: 0.65rem !important; }
.font-11 { font-size: 0.72rem !important; }
.font-12 { font-size: 0.78rem !important; }
.font-13 { font-size: 0.83rem !important; }
.font-14 { font-size: 0.88rem !important; }
.font-15 { font-size: 0.94rem !important; }
.font-16 { font-size: 1rem !important; }
.font-18 { font-size: 1.15rem !important; }
.font-20 { font-size: 1.25rem !important; }
.font-22 { font-size: 1.38rem !important; }

.py-1-5 {
    padding-top: 0.35rem !important;
    padding-bottom: 0.35rem !important;
}
</style>
