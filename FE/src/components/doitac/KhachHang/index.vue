<template>
    <div class="partner-crm-container">
        <!-- 1. Header Banner & Action Buttons -->
        <div class="crm-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                        <span class="badge-tag-pill tag-pink">
                            <i class="bx bx-check-shield me-1"></i> CRM & QUẢN HỆ KHÁCH HÀNG
                        </span>
                        <span class="text-muted font-11">Hệ thống đối tác Danang Explorer</span>
                    </div>
                    <h2 class="page-title mb-1">Quản Lý Khách Hàng & Hồ Sơ Đặt Chỗ</h2>
                    <p class="page-desc text-muted mb-0">
                        Theo dõi hành trình, thấu hiểu thị hiếu và chăm sóc đoàn khách du lịch Đà Nẵng
                    </p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-filter-advanced" type="button" @click="moBoLocNangCao">
                        <i class="bx bx-filter-alt me-1"></i> Bộ Lọc Nâng Cao
                    </button>
                    <button class="btn btn-export-excel" type="button" @click="xuatExcel">
                        <i class="bx bx-download me-1"></i> Xuất Tệp Khách Hàng (Excel)
                    </button>
                    <button class="btn btn-add-customer" type="button" @click="themKhachMoi">
                        <i class="bx bx-user-plus me-1 font-18 align-middle"></i> Thêm Khách Mới
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. 4 Metric Cards Row -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: Tổng cơ sở dữ liệu -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">TỔNG CƠ SỞ DỮ LIỆU</span>
                            <div class="kpi-value text-dark">1.840</div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-group"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 text-pink fw-semibold">
                        <i class="bx bx-trending-up"></i> +142 khách tháng này
                    </div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar bg-pink" style="width: 75%;"></div>
                    </div>
                </div>
            </div>

            <!-- Metric 2: Tỷ lệ đặt lại -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">TỶ LỆ ĐẶT LẠI (RETENTION)</span>
                            <div class="kpi-value text-dark">28.5%</div>
                        </div>
                        <div class="kpi-icon-wrap icon-purple">
                            <i class="bx bx-refresh"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 text-purple fw-semibold">
                        <i class="bx bx-trending-up"></i> +3.2% so với Q3/2024
                    </div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar bg-purple" style="width: 60%;"></div>
                    </div>
                </div>
            </div>

            <!-- Metric 3: Hài lòng trung bình -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">HÀI LÒNG TRUNG BÌNH</span>
                            <div class="kpi-value text-dark">4.88 <span class="kpi-sub">/ 5.0</span></div>
                        </div>
                        <div class="kpi-icon-wrap icon-blue">
                            <i class="bx bx-bookmark-star"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 font-11">
                        <span class="text-warning font-12">★★★★★</span>
                        <span class="text-muted">(920 đánh giá)</span>
                    </div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar bg-blue" style="width: 95%;"></div>
                    </div>
                </div>
            </div>

            <!-- Metric 4: Chi tiêu cao nhất -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <span class="kpi-label">CHI TIÊU CAO NHẤT</span>
                            <div class="kpi-value text-pink">42.500.000 <span class="kpi-currency">đ</span></div>
                        </div>
                        <div class="kpi-icon-wrap icon-magenta">
                            <i class="bx bx-diamond"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 font-11 text-secondary">
                        <span class="badge-vip-pill">VIP</span> <strong>Trần Hoàng Nam</strong>
                    </div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar bg-pink-gradient" style="width: 85%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Search Bar & Filter Tabs Row -->
        <div class="filter-tabs-row shadow-sm p-3 rounded-4 bg-white mb-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <!-- Search Omnibar -->
            <div class="search-omnibar-box">
                <i class="bx bx-search search-icon"></i>
                <input 
                    type="text" 
                    class="form-control form-search-input" 
                    placeholder="Tìm theo tên, SĐT, email, mã căn cước..." 
                    v-model="searchKeyword"
                />
            </div>

            <!-- Filter Tabs Pills -->
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <button 
                    type="button" 
                    class="btn-crm-tab" 
                    :class="{ 'active': activeTab === 'all' }" 
                    @click="activeTab = 'all'"
                >
                    Tất cả (1.840)
                </button>
                <button 
                    type="button" 
                    class="btn-crm-tab" 
                    :class="{ 'active': activeTab === 'vip' }" 
                    @click="activeTab = 'vip'"
                >
                    👑 Khách VIP (84)
                </button>
                <button 
                    type="button" 
                    class="btn-crm-tab" 
                    :class="{ 'active': activeTab === 'family' }" 
                    @click="activeTab = 'family'"
                >
                    👨‍👩‍👧‍👦 Khách Gia Đình (342)
                </button>
                <button 
                    type="button" 
                    class="btn-crm-tab" 
                    :class="{ 'active': activeTab === 'group' }" 
                    @click="activeTab = 'group'"
                >
                    🏢 Khách Đoàn (115)
                </button>
                <button 
                    type="button" 
                    class="btn-crm-tab" 
                    :class="{ 'active': activeTab === 'retention' }" 
                    @click="activeTab = 'retention'"
                >
                    🔁 Đặt Lại Nhiều Lần (524)
                </button>
            </div>
        </div>

        <!-- 4. Main 2-Column Split: Table on Left & Dossier on Right -->
        <div class="row g-4">
            <!-- Left Side: Table of Customers (col-lg-7) -->
            <div class="col-lg-7">
                <div class="crm-table-card shadow-sm rounded-4 bg-white p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header of Table -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="table-icon-dot bg-pink-light text-pink">
                                    <i class="bx bx-user-check"></i>
                                </div>
                                <h5 class="table-title mb-0">Danh Sách Hồ Sơ Khách Hàng</h5>
                                <span class="badge bg-pink-light text-pink font-11 fw-bold rounded-pill">5 hồ sơ tiêu biểu</span>
                            </div>
                            <div class="d-flex align-items-center gap-2 font-12 text-muted">
                                <span>Sắp xếp:</span>
                                <select class="form-select form-select-sm border-0 bg-light fw-bold text-dark font-12 rounded-3" style="width: auto;" v-model="sortBy">
                                    <option value="chi_tieu">Chi tiêu cao nhất</option>
                                    <option value="moi_nhat">Mới đặt gần đây</option>
                                    <option value="so_tour">Đi nhiều tour nhất</option>
                                </select>
                            </div>
                        </div>

                        <!-- Customer Table -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr class="table-head-row font-11 text-uppercase text-muted fw-bold">
                                        <th width="35%">KHÁCH HÀNG</th>
                                        <th width="14%" class="text-center">HẠNG TV</th>
                                        <th width="10%" class="text-center">ĐÃ ĐI</th>
                                        <th width="23%">LẦN ĐẶT GẦN NHẤT</th>
                                        <th width="18%" class="text-end">TỔNG CHI TIÊU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr 
                                        v-for="kh in filteredCustomers" 
                                        :key="kh.id"
                                        class="customer-row"
                                        :class="{ 'row-selected': selectedCustomer && selectedCustomer.id === kh.id }"
                                        @click="chonKhachHang(kh)"
                                    >
                                        <!-- Khách hàng: avatar, name, email, phone -->
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="avatar-wrap position-relative">
                                                    <img :src="kh.avatar" class="customer-avatar rounded-circle" :alt="kh.ho_ten">
                                                    <span class="active-dot"></span>
                                                </div>
                                                <div class="customer-info-cell">
                                                    <div class="customer-name fw-bold text-dark font-13">{{ kh.ho_ten }}</div>
                                                    <div class="customer-email font-11 text-muted text-truncate" style="max-width: 140px;">{{ kh.email }}</div>
                                                    <div class="customer-phone font-11 text-pink fw-semibold">{{ kh.sdt }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Hạng TV -->
                                        <td class="text-center">
                                            <span 
                                                class="badge-tier"
                                                :class="{
                                                    'tier-gold': kh.hang_tv.includes('Vàng'),
                                                    'tier-silver': kh.hang_tv.includes('Bạc'),
                                                    'tier-bronze': kh.hang_tv.includes('Đồng')
                                                }"
                                            >
                                                <i v-if="kh.hang_tv.includes('Vàng')" class="bx bxs-crown me-1"></i>
                                                <i v-else-if="kh.hang_tv.includes('Bạc')" class="bx bxs-medal me-1"></i>
                                                <i v-else class="bx bx-badge me-1"></i>
                                                {{ kh.hang_tv }}
                                            </span>
                                        </td>

                                        <!-- Đã đi -->
                                        <td class="text-center">
                                            <div class="tour-count-badge font-12 fw-bold text-purple">{{ kh.da_di }}</div>
                                            <div class="font-10 text-muted">tour</div>
                                        </td>

                                        <!-- Lần đặt gần nhất -->
                                        <td>
                                            <div class="last-tour-title font-12 fw-bold text-dark text-truncate" style="max-width: 150px;">{{ kh.lan_dat_gan_nhat }}</div>
                                            <div class="last-tour-date font-11 text-muted">
                                                <i class="bx bx-calendar me-1"></i>{{ kh.ngay_dat }}
                                            </div>
                                        </td>

                                        <!-- Tổng chi tiêu -->
                                        <td class="text-end">
                                            <div class="font-13 fw-bold text-pink">{{ kh.tong_chi_tieu }}</div>
                                            <div class="font-9 text-muted letter-spacing-1 text-uppercase">{{ kh.trang_thai_thanh_toan }}</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 border-top mt-3">
                        <span class="font-12 text-muted">
                            Hiển thị <strong>1 – 5</strong> trên tổng số <strong>1.840</strong> khách hàng
                        </span>
                        <div class="pagination-pills d-flex align-items-center gap-1">
                            <button class="btn-page-nav" type="button"><i class="bx bx-chevron-left"></i></button>
                            <button class="btn-page-nav active" type="button">1</button>
                            <button class="btn-page-nav" type="button">2</button>
                            <button class="btn-page-nav" type="button">3</button>
                            <span class="px-1 text-muted font-11">...</span>
                            <button class="btn-page-nav" type="button">368</button>
                            <button class="btn-page-nav" type="button"><i class="bx bx-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Detailed Dossier (col-lg-5) -->
            <div class="col-lg-5" v-if="selectedCustomer">
                <div class="crm-dossier-card shadow-sm rounded-4 bg-white p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Top ID Bar -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-purple-light text-purple font-11 fw-bold rounded-pill px-3 py-1">
                                    ID: {{ selectedCustomer.id }}
                                </span>
                                <span class="badge bg-warning-subtle text-warning font-11 fw-bold rounded-pill px-3 py-1 border border-warning-subtle">
                                    👑 {{ selectedCustomer.tier_code || 'VIP GOLD' }}
                                </span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn-icon-subtle" title="In hồ sơ" @click="inHoSo">
                                    <i class="bx bx-printer"></i>
                                </button>
                                <button class="btn-icon-subtle" title="Chỉnh sửa thông tin" @click="suaThongTin">
                                    <i class="bx bx-edit"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Customer Profile Card -->
                        <div class="text-center mb-3">
                            <div class="dossier-avatar-wrap position-relative mx-auto mb-2">
                                <img :src="selectedCustomer.avatar" class="dossier-avatar rounded-circle shadow-sm" :alt="selectedCustomer.ho_ten">
                                <span class="verified-badge-check">
                                    <i class="bx bx-check"></i>
                                </span>
                            </div>
                            <h4 class="fw-bold text-dark mb-0">{{ selectedCustomer.ho_ten }}</h4>
                            <div class="font-12 text-muted mb-2">Tài khoản: <strong class="text-dark">{{ selectedCustomer.email }}</strong></div>
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <span class="badge bg-light text-dark font-11 px-3 py-1 border">
                                    <i class="bx bx-phone me-1 text-pink"></i>{{ selectedCustomer.sdt }}
                                </span>
                                <span class="badge bg-light text-dark font-11 px-3 py-1 border">
                                    <i class="bx bx-id-card me-1 text-purple"></i>CCCD: {{ selectedCustomer.cccd || '048089012***' }}
                                </span>
                            </div>
                        </div>

                        <!-- Operational Notes -->
                        <div class="op-notes-box p-3 rounded-3 mb-3">
                            <div class="font-12 fw-bold text-dark mb-1">
                                <i class="bx bx-note text-purple me-1"></i> Ghi chú vận hành quan trọng:
                            </div>
                            <ul class="op-notes-list font-12 text-secondary mb-0 ps-3">
                                <li v-for="(note, nIdx) in (selectedCustomer.ghi_chu || defaultNotes)" :key="nIdx">
                                    {{ note }}
                                </li>
                            </ul>
                        </div>

                        <!-- Traveling Companions (Hành khách đi cùng đoàn) -->
                        <div class="companions-box mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="font-12 fw-bold text-dark text-uppercase">
                                    <i class="bx bx-group text-pink me-1"></i> HÀNH KHÁCH ĐI CÙNG ĐOÀN (03 PAX)
                                </div>
                                <button class="btn btn-link text-pink p-0 font-11 fw-bold text-decoration-none" @click="themPax">
                                    + Thêm pax
                                </button>
                            </div>

                            <div class="companions-list d-flex flex-column gap-2">
                                <div 
                                    v-for="pax in (selectedCustomer.hanh_khach || defaultPax)" 
                                    :key="pax.id"
                                    class="companion-item p-2 rounded-3 d-flex justify-content-between align-items-center"
                                >
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="pax-avatar" :class="'pax-' + (pax.avatar_color || 'pink')">
                                            {{ pax.avatar_initials }}
                                        </div>
                                        <div>
                                            <div class="font-12 fw-bold text-dark">{{ pax.ten }}</div>
                                            <div class="font-10 text-muted">{{ pax.quan_he }} • Sinh {{ pax.nam_sinh }} {{ pax.sdt ? '• ' + pax.sdt : '' }}</div>
                                        </div>
                                    </div>
                                    <span class="badge font-10" :class="getPaxBadgeClass(pax.loai_ve)">
                                        {{ pax.loai_ve }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Tour History -->
                        <div class="tour-history-box mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="font-12 fw-bold text-dark text-uppercase">
                                    <i class="bx bx-time-five text-purple me-1"></i> LỊCH SỬ TOUR GẦN ĐÂY (DAT_TOUR)
                                </div>
                                <span class="font-11 text-muted">8 giao dịch</span>
                            </div>

                            <div class="tours-list d-flex flex-column gap-2">
                                <div 
                                    v-for="(t, tIdx) in (selectedCustomer.lich_su_tour || defaultTours)" 
                                    :key="tIdx"
                                    class="tour-history-item p-2 rounded-3"
                                >
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="badge bg-purple-light text-purple font-10">{{ t.code }}</span>
                                        <span class="badge bg-success-subtle text-success font-10">{{ t.trang_thai }}</span>
                                    </div>
                                    <div class="font-12 fw-bold text-dark mb-1">{{ t.ten }}</div>
                                    <div class="d-flex justify-content-between font-11 text-muted">
                                        <span>Khởi hành: {{ t.khoi_hanh }}</span>
                                        <span class="text-pink fw-bold">{{ t.gia }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Review -->
                        <div class="review-box p-3 rounded-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="font-11 fw-bold text-uppercase text-dark">
                                    <i class="bx bx-star text-warning me-1"></i> ĐÁNH GIÁ TỪ KHÁCH HÀNG
                                </div>
                                <span class="font-12 fw-bold text-dark">5.0 / 5.0 ★</span>
                            </div>
                            <p class="font-11 text-secondary fst-italic mb-2">
                                "{{ (selectedCustomer.danh_gia && selectedCustomer.danh_gia.noi_dung) || defaultReview.noi_dung }}"
                            </p>
                            <div class="d-flex justify-content-between font-10 text-muted">
                                <span>{{ (selectedCustomer.danh_gia && selectedCustomer.danh_gia.ngay) || defaultReview.ngay }}</span>
                                <span class="text-pink fw-bold">Xác thực bởi AI</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Action Buttons in Dossier -->
                    <div class="d-flex flex-column gap-2 pt-2">
                        <button class="btn btn-pink-gradient w-100 rounded-pill py-2 font-12 fw-bold text-white shadow-sm" @click="tangVoucher">
                            <i class="bx bx-gift me-1 font-16 align-middle"></i> Tặng Voucher Khách VIP Trực Tiếp (voucher)
                        </button>
                        <button class="btn btn-outline-secondary w-100 rounded-pill py-2 font-12 fw-bold" @click="guiZalo">
                            <i class="bx bx-message-rounded-dots me-1 font-16 align-middle"></i> Gửi Lời Cảm Ơn / CSKH Qua Zalo OA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'KhachHangCRM',
    data() {
        return {
            searchKeyword: '',
            activeTab: 'all',
            sortBy: 'chi_tieu',
            selectedCustomer: null,
            customers: [
                {
                    id: 'KH-00021',
                    ho_ten: 'Trần Hoàng Nam',
                    email: 'nam.tran@sunholding.vn',
                    sdt: '0905.888.234',
                    cccd: '048089012***',
                    avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80',
                    hang_tv: 'Vàng (VIP)',
                    tier_code: 'VIP GOLD',
                    da_di: 8,
                    lan_dat_gan_nhat: 'Tour Bà Nà 3N2Đ',
                    ngay_dat: '15/11/2025',
                    tong_chi_tieu: '42.500.000 đ',
                    trang_thai_thanh_toan: 'ĐÃ TẤT TOÁN 100%',
                    is_vip: true,
                    is_family: true,
                    is_group: false,
                    is_retention: true,
                    ghi_chu: [
                        'Khách VIP đi cùng gia đình: Vợ, mẹ lớn tuổi và con 2 tuổi.',
                        'Yêu cầu tài xế lái êm, xe 7 chỗ có ghế trẻ em ISOFIX.',
                        '1 suất ăn chay thanh tịnh cho mẹ già.'
                    ],
                    hanh_khach: [
                        { id: 1, ten: 'Lê Thu Hương', quan_he: 'Vợ', nam_sinh: '1989', sdt: '0905.008.235', loai_ve: 'Vé người lớn', avatar_initials: 'LH', avatar_color: 'pink' },
                        { id: 2, ten: 'Trần Khánh Huyền', quan_he: 'Con gái', nam_sinh: '2022 (2 tuổi)', sdt: '', loai_ve: 'Vé em bé', avatar_initials: 'TH', avatar_color: 'purple' },
                        { id: 3, ten: 'Nguyễn Thị Cúc', quan_he: 'Mẹ ruột', nam_sinh: '1954 - Ăn chay', sdt: '', loai_ve: 'Người cao tuổi', avatar_initials: 'NT', avatar_color: 'cyan' }
                    ],
                    lich_su_tour: [
                        { code: '#BOOK-DN-2025-0921', ten: 'Tour Bà Nà Hills – Cầu Vàng Siêu Cấp 3N2Đ', khoi_hanh: '15/11/2025', gia: '16.800.000 đ', trang_thai: 'Hoàn tất' },
                        { code: '#BOOK-DN-2025-4102', ten: 'Du Thuyền Ngắm Pháo Hoa Sông Hàn VIP', khoi_hanh: '02/09/2025', gia: '8.900.000 đ', trang_thai: 'Hoàn tất' }
                    ],
                    danh_gia: {
                        diem: '5.0 / 5.0',
                        noi_dung: 'Dịch vụ cực kỳ chu đáo! Bé nhà mình được chuẩn bị ghế riêng trên xe, mẹ mình khen đồ ăn chay của nhà hàng đối tác rất ngon. Chắc chắn hè năm sau sẽ lại liên hệ bên bạn.',
                        ngay: 'Đánh giá tour Bà Nà ngày 18/11/2025',
                        xac_thuc: 'Xác thực bởi AI'
                    }
                },
                {
                    id: 'KH-00045',
                    ho_ten: 'Nguyễn Mai Anh',
                    email: 'lan.nguyen@vietravel.com',
                    sdt: '0912.445.679',
                    cccd: '048092001***',
                    avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
                    hang_tv: 'Bạc',
                    tier_code: 'SILVER',
                    da_di: 4,
                    lan_dat_gan_nhat: 'Ngũ Hành Sơn – Hội An 1N',
                    ngay_dat: '02/11/2025',
                    tong_chi_tieu: '16.800.000 đ',
                    trang_thai_thanh_toan: 'ĐÃ TẤT TOÁN 100%',
                    is_vip: false,
                    is_family: true,
                    is_group: false,
                    is_retention: true
                },
                {
                    id: 'KH-00088',
                    ho_ten: 'Lê Khắc Vũ',
                    email: 'vule.khac@fpt.com.vn',
                    sdt: '0933.102.999',
                    cccd: '048085003***',
                    avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80',
                    hang_tv: 'Đồng',
                    tier_code: 'BRONZE',
                    da_di: 2,
                    lan_dat_gan_nhat: 'Lặn Biển Cù Lao Chàm 1N',
                    ngay_dat: '20/10/2025',
                    tong_chi_tieu: '9.450.000 đ',
                    trang_thai_thanh_toan: 'ĐÃ TẤT TOÁN 100%',
                    is_vip: false,
                    is_family: false,
                    is_group: true,
                    is_retention: false
                },
                {
                    id: 'KH-00102',
                    ho_ten: 'Phạm Thúy Hằng',
                    email: 'hangpham.art@gmail.com',
                    sdt: '0977.345.112',
                    cccd: '048088019***',
                    avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=80',
                    hang_tv: 'Vàng (VIP)',
                    tier_code: 'VIP GOLD',
                    da_di: 6,
                    lan_dat_gan_nhat: 'Sơn Trà Ngắm Voọc Bán Đảo',
                    ngay_dat: '10/10/2025',
                    tong_chi_tieu: '28.100.000 đ',
                    trang_thai_thanh_toan: 'ĐÃ TẤT TOÁN 100%',
                    is_vip: true,
                    is_family: true,
                    is_group: false,
                    is_retention: true
                },
                {
                    id: 'KH-00155',
                    ho_ten: 'Đặng Quốc Bảo',
                    email: 'baodangdev@tech.vn',
                    sdt: '0935.918.776',
                    cccd: '048096008***',
                    avatar: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=200&q=80',
                    hang_tv: 'Bạc',
                    tier_code: 'SILVER',
                    da_di: 3,
                    lan_dat_gan_nhat: 'Chèo SUP Sông Hàn Hoàng Hôn',
                    ngay_dat: '18/11/2025',
                    tong_chi_tieu: '7.200.000 đ',
                    trang_thai_thanh_toan: 'ĐÃ TẤT TOÁN 100%',
                    is_vip: false,
                    is_family: false,
                    is_group: true,
                    is_retention: true
                }
            ],
            defaultNotes: [
                'Khách VIP đi cùng gia đình: Vợ, mẹ lớn tuổi và con 2 tuổi.',
                'Yêu cầu tài xế lái êm, xe 7 chỗ có ghế trẻ em ISOFIX.',
                '1 suất ăn chay thanh tịnh cho mẹ già.'
            ],
            defaultPax: [
                { id: 1, ten: 'Lê Thu Hương', quan_he: 'Vợ', nam_sinh: '1989', sdt: '0905.008.235', loai_ve: 'Vé người lớn', avatar_initials: 'LH', avatar_color: 'pink' },
                { id: 2, ten: 'Trần Khánh Huyền', quan_he: 'Con gái', nam_sinh: '2022 (2 tuổi)', sdt: '', loai_ve: 'Vé em bé', avatar_initials: 'TH', avatar_color: 'purple' },
                { id: 3, ten: 'Nguyễn Thị Cúc', quan_he: 'Mẹ ruột', nam_sinh: '1954 - Ăn chay', sdt: '', loai_ve: 'Người cao tuổi', avatar_initials: 'NT', avatar_color: 'cyan' }
            ],
            defaultTours: [
                { code: '#BOOK-DN-2025-0921', ten: 'Tour Bà Nà Hills – Cầu Vàng Siêu Cấp 3N2Đ', khoi_hanh: '15/11/2025', gia: '16.800.000 đ', trang_thai: 'Hoàn tất' },
                { code: '#BOOK-DN-2025-4102', ten: 'Du Thuyền Ngắm Pháo Hoa Sông Hàn VIP', khoi_hanh: '02/09/2025', gia: '8.900.000 đ', trang_thai: 'Hoàn tất' }
            ],
            defaultReview: {
                noi_dung: 'Dịch vụ cực kỳ chu đáo! Bé nhà mình được chuẩn bị ghế riêng trên xe, mẹ mình khen đồ ăn chay của nhà hàng đối tác rất ngon. Chắc chắn hè năm sau sẽ lại liên hệ bên bạn.',
                ngay: 'Đánh giá tour Bà Nà ngày 18/11/2025'
            }
        }
    },
    computed: {
        filteredCustomers() {
            let list = this.customers;
            if (this.activeTab === 'vip') {
                list = list.filter(k => k.is_vip);
            } else if (this.activeTab === 'family') {
                list = list.filter(k => k.is_family);
            } else if (this.activeTab === 'group') {
                list = list.filter(k => k.is_group);
            } else if (this.activeTab === 'retention') {
                list = list.filter(k => k.is_retention);
            }

            if (this.searchKeyword.trim()) {
                const kw = this.searchKeyword.toLowerCase().trim();
                list = list.filter(k => 
                    k.ho_ten.toLowerCase().includes(kw) || 
                    k.email.toLowerCase().includes(kw) || 
                    k.sdt.includes(kw)
                );
            }

            return list;
        }
    },
    mounted() {
        if (this.customers.length > 0) {
            this.selectedCustomer = this.customers[0];
        }
    },
    methods: {
        chonKhachHang(kh) {
            this.selectedCustomer = kh;
        },
        getPaxBadgeClass(loaiVe) {
            if (loaiVe.includes('em bé')) return 'bg-pink-light text-pink';
            if (loaiVe.includes('cao tuổi')) return 'bg-purple-light text-purple';
            return 'bg-light text-dark border';
        },
        moBoLocNangCao() {
            alert('Mở bộ lọc nâng cao theo phân khúc chi tiêu, tần suất đi tour và mức độ hài lòng CSAT.');
        },
        xuatExcel() {
            alert('Đang xuất danh sách khách hàng CRM định dạng Excel (.xlsx)...');
        },
        themKhachMoi() {
            const ten = prompt('Nhập họ và tên khách hàng mới:');
            if (ten) {
                const sdt = prompt('Nhập số điện thoại:', '0905.123.456');
                const newKh = {
                    id: 'KH-00' + Math.floor(100 + Math.random() * 900),
                    ho_ten: ten,
                    email: ten.toLowerCase().replace(/\s+/g, '') + '@gmail.com',
                    sdt: sdt || '0905.000.000',
                    cccd: '048099000***',
                    avatar: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80',
                    hang_tv: 'Đồng',
                    tier_code: 'BRONZE',
                    da_di: 1,
                    lan_dat_gan_nhat: 'Chưa có chuyến đi',
                    ngay_dat: 'Hôm nay',
                    tong_chi_tieu: '0 đ',
                    trang_thai_thanh_toan: 'MỚI TẠO',
                    is_vip: false,
                    is_family: false,
                    is_group: false,
                    is_retention: false
                };
                this.customers.unshift(newKh);
                this.selectedCustomer = newKh;
                alert('Đã thêm khách hàng mới thành công!');
            }
        },
        themPax() {
            const ten = prompt('Nhập tên hành khách đi cùng đoàn:');
            if (ten) {
                if (!this.selectedCustomer.hanh_khach) {
                    this.selectedCustomer.hanh_khach = [...this.defaultPax];
                }
                const quanHe = prompt('Mối quan hệ (Vợ, Chồng, Con, Bạn bè...):', 'Người thân');
                this.selectedCustomer.hanh_khach.push({
                    id: Date.now(),
                    ten: ten,
                    quan_he: quanHe || 'Đi cùng đoàn',
                    nam_sinh: '1995',
                    sdt: '',
                    loai_ve: 'Vé người lớn',
                    avatar_initials: ten.split(' ').pop().substring(0, 2).toUpperCase(),
                    avatar_color: 'cyan'
                });
                alert(`Đã thêm ${ten} vào danh sách hành khách đi cùng đoàn!`);
            }
        },
        inHoSo() {
            window.print();
        },
        suaThongTin() {
            const tenMoi = prompt('Sửa tên khách hàng:', this.selectedCustomer.ho_ten);
            if (tenMoi) {
                this.selectedCustomer.ho_ten = tenMoi;
                alert('Đã cập nhật thông tin khách hàng!');
            }
        },
        tangVoucher() {
            alert(`Đã gửi tặng Voucher giảm giá 15% VIP vào ví tài khoản của du khách ${this.selectedCustomer.ho_ten}!`);
        },
        guiZalo() {
            alert(`Đang kết nối Zalo OA và gửi mẫu tin nhắn tri ân / chăm sóc khách hàng tự động đến ${this.selectedCustomer.sdt}...`);
        }
    }
}
</script>

<style scoped>
.partner-crm-container {
    padding-bottom: 30px;
    font-family: inherit;
}

/* Header & Badges */
.badge-tag-pill {
    display: inline-flex;
    align-items: center;
    padding: 3px 12px;
    border-radius: 999px;
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.4px;
}

.tag-pink {
    background-color: #ffe4e6;
    color: #e11d48;
}

.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.3px;
}

.page-desc {
    font-size: 0.8rem;
    line-height: 1.45;
}

/* Header Actions */
.btn-filter-advanced {
    background-color: #f3e8ff;
    color: #7e22ce;
    border: 1px solid #e9d5ff;
    border-radius: 999px;
    font-size: 0.76rem;
    font-weight: 700;
    padding: 7px 16px;
    transition: all 0.15s ease;
}

.btn-filter-advanced:hover {
    background-color: #e9d5ff;
    color: #6b21a8;
}

.btn-export-excel {
    background-color: #e0f2fe;
    color: #0369a1;
    border: 1px solid #bae6fd;
    border-radius: 999px;
    font-size: 0.76rem;
    font-weight: 700;
    padding: 7px 16px;
    transition: all 0.15s ease;
}

.btn-export-excel:hover {
    background-color: #bae6fd;
    color: #0284c7;
}

.btn-add-customer {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
    color: #ffffff;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 8px 18px;
    box-shadow: 0 3px 10px rgba(225, 29, 72, 0.28);
    transition: all 0.2s ease;
}

.btn-add-customer:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(225, 29, 72, 0.38);
    color: #ffffff;
}

/* KPI Cards */
.kpi-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 16px;
    border: 1px solid #f1f5f9;
}

.kpi-label {
    font-size: 0.66rem;
    font-weight: 800;
    color: #64748b;
    letter-spacing: 0.4px;
    display: block;
    margin-bottom: 2px;
}

.kpi-value {
    font-size: 1.55rem;
    font-weight: 800;
    line-height: 1.2;
}

.kpi-sub {
    font-size: 0.85rem;
    font-weight: 600;
    color: #94a3b8;
}

.kpi-currency {
    font-size: 0.95rem;
}

.kpi-icon-wrap {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.icon-pink { background-color: #ffe4e6; color: #e11d48; }
.icon-purple { background-color: #f3e8ff; color: #9333ea; }
.icon-blue { background-color: #e0f2fe; color: #0284c7; }
.icon-magenta { background-color: #fce7f3; color: #db2777; }

.badge-vip-pill {
    background: #e11d48;
    color: #ffffff;
    font-size: 0.62rem;
    font-weight: 800;
    padding: 1px 6px;
    border-radius: 4px;
}

.progress-thin {
    height: 4px;
    background-color: #f1f5f9;
    border-radius: 999px;
}

.bg-blue { background-color: #0284c7 !important; }
.bg-pink-gradient { background: linear-gradient(90deg, #e11d48, #fb7185); }

/* Filter Tabs Row */
.search-omnibar-box {
    position: relative;
    flex: 1 1 300px;
    max-width: 340px;
}

.search-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 1.15rem;
    pointer-events: none;
}

.form-search-input {
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    padding: 7px 16px 7px 38px;
    font-size: 0.8rem;
    background-color: #f8fafc;
}

.form-search-input:focus {
    background-color: #ffffff;
    border-color: #e11d48;
    box-shadow: 0 0 0 3px rgba(225, 29, 72, 0.12);
}

.btn-crm-tab {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 0.74rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.15s ease;
}

.btn-crm-tab:hover {
    border-color: #fecdd3;
    color: #e11d48;
}

.btn-crm-tab.active {
    background: #e11d48;
    border-color: #e11d48;
    color: #ffffff;
    font-weight: 700;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.28);
}

/* Customer Table Card */
.table-icon-dot {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.table-title {
    font-size: 0.95rem;
    font-weight: 800;
    color: #0f172a;
}

.customer-row {
    cursor: pointer;
    transition: background 0.15s ease;
}

.customer-row:hover {
    background-color: #fff1f2 !important;
}

.customer-row.row-selected {
    background-color: #fff1f2 !important;
    border-left: 3px solid #e11d48;
}

.avatar-wrap {
    width: 36px;
    height: 36px;
    flex-shrink: 0;
}

.customer-avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.active-dot {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #22c55e;
    border: 1.5px solid #ffffff;
}

/* Tier Badges */
.badge-tier {
    font-size: 0.68rem;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
}

.tier-gold {
    background-color: #fef3c7;
    color: #b45309;
    border: 1px solid #fde68a;
}

.tier-silver {
    background-color: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
}

.tier-bronze {
    background-color: #ffedd5;
    color: #c2410c;
    border: 1px solid #fed7aa;
}

.letter-spacing-1 {
    letter-spacing: 0.5px;
}

/* Pagination */
.btn-page-nav {
    width: 28px;
    height: 28px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 0.72rem;
    font-weight: 600;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s;
}

.btn-page-nav:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

.btn-page-nav.active {
    background: #e11d48;
    border-color: #e11d48;
    color: #ffffff;
    font-weight: 700;
}

/* Detailed Dossier Card */
.btn-icon-subtle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s;
}

.btn-icon-subtle:hover {
    background: #fff1f2;
    color: #e11d48;
    border-color: #fecdd3;
}

.dossier-avatar-wrap {
    width: 64px;
    height: 64px;
}

.dossier-avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border: 2px solid #ffffff;
}

.verified-badge-check {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background-color: #22c55e;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    border: 1.5px solid #ffffff;
}

.op-notes-box {
    background-color: #faf5ff;
    border: 1px solid #f3e8ff;
}

.companion-item {
    background-color: #f8fafc;
    border: 1px solid #f1f5f9;
}

.pax-avatar {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.68rem;
    font-weight: 800;
    flex-shrink: 0;
}

.pax-pink { background-color: #ffe4e6; color: #e11d48; }
.pax-purple { background-color: #f3e8ff; color: #9333ea; }
.pax-cyan { background-color: #e0f2fe; color: #0284c7; }

.tour-history-item {
    background-color: #f8fafc;
    border: 1px solid #f1f5f9;
}

.review-box {
    background-color: #fffbeb;
    border: 1px solid #fef3c7;
}

/* Utilities */
.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }
.text-purple { color: #9333ea !important; }
.bg-purple { background-color: #9333ea !important; }
.bg-purple-light { background-color: #f3e8ff !important; }
.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
}
.font-9 { font-size: 0.6rem !important; }
.font-10 { font-size: 0.65rem !important; }
.font-11 { font-size: 0.7rem !important; }
.font-12 { font-size: 0.76rem !important; }
.font-13 { font-size: 0.82rem !important; }
</style>
