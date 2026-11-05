<template>
    <div class="partner-kyc-profile-page">
        <!-- 1. Header Banner & Action Buttons -->
        <div class="page-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                        <span class="badge-tag-pill tag-pink">
                            <i class="bx bx-buildings me-1"></i> HỒ SƠ ĐỐI TÁC LỮ HÀNH ĐÀ NẴNG
                        </span>
                        <span class="badge bg-cyan-light text-cyan rounded-pill px-3 py-1 font-11 fw-bold">
                            <i class="bx bx-check-shield me-1"></i> Pháp Nhân KYC Level 3
                        </span>
                        <span class="font-11 text-muted fw-bold">ID: #PARTNER-DN-089</span>
                    </div>
                    <h2 class="page-title mb-1">Thông Tin Doanh Nghiệp & Định Danh Pháp Nhân (KYC)</h2>
                    <p class="page-desc text-muted mb-0">
                        Hồ sơ pháp lý được đồng bộ và xác thực bởi <strong class="text-purple">Sở Du Lịch TP. Đà Nẵng</strong> và <strong class="text-pink">Ban Quản Trị Da Nang SmartTrip AI</strong>. Dữ liệu mã hóa bảo mật chuẩn cấp phép B2B.
                    </p>
                </div>

                <!-- Top Right Action Buttons -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-outline-pink btn-sm px-3 py-2 rounded-3 fw-bold font-12" type="button" @click="xuatChungNhanKYC">
                        <i class="bx bx-download me-1 font-16 align-middle"></i> XUẤT FILE CHỨNG NHẬN KYC
                    </button>
                    <button class="btn btn-purple-gradient text-white px-3 py-2 rounded-3 fw-bold font-12 shadow-sm" type="button" @click="moModalNangHang">
                        <i class="bx bx-crown me-1 font-16 align-middle"></i> NÂNG HẠNG VIP
                    </button>
                    <button class="btn btn-pink-gradient text-white px-3 py-2 rounded-3 fw-bold font-12 shadow-sm" type="button" @click="moModalCapNhatHoSo">
                        <i class="bx bx-edit-alt me-1 font-16 align-middle"></i> CẬP NHẬT HỒ SƠ
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. 4 Metric Status KPI Cards -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: CẤP ĐỘ ĐỐI TÁC -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            <span class="kpi-label">CẤP ĐỘ ĐỐI TÁC</span>
                            <div class="kpi-value text-dark">KYC LEVEL 3</div>
                            <div class="font-11 fw-bold text-pink text-uppercase tracking-wider">DIAMOND</div>
                        </div>
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-diamond font-20"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric 2: TÌNH TRẠNG HỒ SƠ -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            <span class="kpi-label">TÌNH TRẠNG HỒ SƠ</span>
                            <div class="kpi-value text-purple d-flex align-items-center gap-2">
                                <span class="status-pulse-dot bg-purple"></span>
                                Đã Phê Duyệt Toàn Phần
                            </div>
                            <div class="font-11 text-muted">Xác thực tự động OCR & Ký số</div>
                        </div>
                        <div class="kpi-icon-wrap icon-purple">
                            <i class="bx bx-badge-check font-20"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric 3: NGÀY CẤP PHÉP -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            <span class="kpi-label">NGÀY CẤP PHÉP</span>
                            <div class="kpi-value text-dark">15/01/2022</div>
                            <div class="font-11 text-muted">(Hiệu lực 5 năm)</div>
                        </div>
                        <div class="kpi-icon-wrap icon-blue">
                            <i class="bx bx-calendar-check font-20"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric 4: ĐỒNG BỘ DỮ LIỆU -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <div>
                            <span class="kpi-label">ĐỒNG BỘ DỮ LIỆU</span>
                            <div class="kpi-value text-dark">Hệ thống VNAT & Danang Smart</div>
                            <div class="font-11 text-muted">Realtime API Gateway</div>
                        </div>
                        <div class="kpi-icon-wrap icon-dark">
                            <i class="bx bx-sync font-20"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Main Split Content (Left 7 Cols & Right 5 Cols) -->
        <div class="row g-4 mb-4">
            <!-- Left Column: Legal Enterprise & Headquarter Geo -->
            <div class="col-lg-7 col-xl-7">
                <!-- Section 1: PHÁP NHÂN DOANH NGHIỆP -->
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-badge bg-pink-subtle text-pink">
                                    <i class="bx bx-buildings font-18"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 font-15 text-dark">1. PHÁP NHÂN DOANH NGHIỆP</h5>
                                    <p class="font-11 text-muted mb-0">Thông tin cấp theo Giấy Phép Đăng Ký Kinh Doanh Sở KH&ĐT</p>
                                </div>
                            </div>
                            <span class="badge bg-light text-muted border font-10 fw-semibold px-2 py-1 rounded-pill">
                                HO_SO_DOI_TAC
                            </span>
                        </div>

                        <!-- Tên pháp nhân đầy đủ -->
                        <div class="mb-3">
                            <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                Tên Pháp Nhân Đầy Đủ (Tiếng Việt & Tiếng Anh)
                            </label>
                            <div class="field-display-box highlight-box d-flex align-items-center justify-content-between">
                                <span class="fw-bold text-dark font-13">
                                    {{ doanhNghiep.ten_phap_nhan }}
                                </span>
                                <i class="bx bxs-check-circle text-pink font-18"></i>
                            </div>
                        </div>

                        <!-- Tên viết tắt & Mã số thuế -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                    Tên Thương Hiệu Viết Tắt
                                </label>
                                <div class="field-display-box d-flex align-items-center justify-content-between">
                                    <span class="fw-semibold text-purple font-12">{{ doanhNghiep.ten_viet_tat }}</span>
                                    <i class="bx bx-globe text-muted"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                    Mã Số Thuế (MST)
                                </label>
                                <div class="field-display-box d-flex align-items-center justify-content-between">
                                    <span class="fw-bold text-dark font-12 font-monospace">{{ doanhNghiep.ma_so_thue }}</span>
                                    <span class="badge bg-info-subtle text-info font-10 px-2 py-1 rounded-pill">Thuế điện tử: OK</span>
                                </div>
                            </div>
                        </div>

                        <!-- Giấy phép kinh doanh lữ hành -->
                        <div class="mb-3">
                            <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                Giấy Phép Kinh Doanh Lữ Hành Quốc Tế / Nội Địa
                            </label>
                            <div class="license-banner-box d-flex align-items-center justify-content-between p-3 rounded-3">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="bx bx-id-card text-pink font-22 mt-1"></i>
                                    <div>
                                        <div class="fw-bold text-dark font-13">Số GP: {{ doanhNghiep.so_giay_phep }}</div>
                                        <div class="font-11 text-muted">Phạm vi: {{ doanhNghiep.pham_vi_hoat_dong }}</div>
                                    </div>
                                </div>
                                <span class="badge bg-pink text-white font-11 px-2 py-1 rounded-2 fw-bold">Hạng A1</span>
                            </div>
                        </div>

                        <!-- Người đại diện & Chức vụ -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                    Người Đại Diện Pháp Luật
                                </label>
                                <div class="field-display-box d-flex align-items-center gap-2">
                                    <i class="bx bx-user-pin text-muted font-16"></i>
                                    <span class="fw-semibold text-dark font-12">{{ doanhNghiep.nguoi_dai_dien }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                    Chức Vụ Bổ Nhiệm
                                </label>
                                <div class="field-display-box">
                                    <span class="fw-semibold text-dark font-12">{{ doanhNghiep.chuc_vu }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Điện thoại bàn & Hotline điều hành tour -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                    Điện Thoại Bàn Trụ Sở
                                </label>
                                <div class="field-display-box d-flex align-items-center gap-2">
                                    <i class="bx bx-phone text-muted font-16"></i>
                                    <span class="fw-semibold text-dark font-12">{{ doanhNghiep.dien_thoai_ban }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                    Hotline Điều Hành Tour (24/7)
                                </label>
                                <div class="field-display-box d-flex align-items-center gap-2">
                                    <i class="bx bx-mobile-vibration text-pink font-16"></i>
                                    <span class="fw-bold text-pink font-12">{{ doanhNghiep.hotline_dieu_hanh }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Email & Website -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                    Email Doanh Nghiệp
                                </label>
                                <div class="field-display-box d-flex align-items-center gap-2">
                                    <i class="bx bx-envelope text-muted font-16"></i>
                                    <span class="fw-semibold text-dark font-12">{{ doanhNghiep.email }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                    Website Chính Thức
                                </label>
                                <div class="field-display-box d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bx bx-globe text-primary font-16"></i>
                                        <a :href="'https://' + doanhNghiep.website" target="_blank" class="fw-semibold text-primary font-12 text-decoration-none">
                                            {{ doanhNghiep.website }}
                                        </a>
                                    </div>
                                    <i class="bx bx-link-external text-muted font-14"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: TRỤ SỞ CHÍNH & ĐỊNH VỊ ĐỊA LÝ -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-badge bg-purple-subtle text-purple">
                                    <i class="bx bx-map-pin font-18"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 font-15 text-dark">2. TRỤ SỞ CHÍNH & ĐỊNH VỊ ĐỊA LÝ</h5>
                                    <p class="font-11 text-muted mb-0">Phân cấp hành chính cấp Thành Phố - Quận/Huyện - Phường/Xã</p>
                                </div>
                            </div>
                            <span class="badge bg-light text-muted border font-10 fw-semibold px-2 py-1 rounded-pill">
                                QUAN_HUYEN / XA_PHUONG
                            </span>
                        </div>

                        <!-- Địa chỉ pháp lý -->
                        <div class="mb-3">
                            <label class="form-label-custom font-11 fw-bold text-muted text-uppercase mb-1">
                                Địa Chỉ Trụ Sở Pháp Lý
                            </label>
                            <div class="address-display-box p-3 rounded-3 mb-2">
                                <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                                    <div class="d-flex align-items-start gap-2">
                                        <i class="bx bxs-map-pin text-pink font-20 mt-1 flex-shrink-0"></i>
                                        <div>
                                            <div class="fw-bold text-dark font-13">{{ doanhNghiep.dia_chi_tru_so }}</div>
                                            <div class="font-11 text-muted mt-1">
                                                Mã Phường: <span class="fw-bold text-dark">{{ doanhNghiep.ma_phuong }}</span> • 
                                                Tọa độ: <span class="font-monospace text-dark">{{ doanhNghiep.toa_do }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1 font-11 fw-bold flex-shrink-0" @click="moBanDoChinh">
                                        <i class="bx bx-map-alt me-1"></i> Xem Bản Đồ
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Mini Vector Map / Preview Box -->
                        <div class="mini-map-container rounded-3 position-relative overflow-hidden shadow-sm">
                            <!-- Background Map Graphic Simulation -->
                            <div class="map-artistic-layer">
                                <svg width="100%" height="220" viewBox="0 0 700 220" preserveAspectRatio="xMidYMid slice">
                                    <rect width="700" height="220" fill="#e2edf8" />
                                    <!-- River Path (Sông Hàn) -->
                                    <path d="M 380,-10 C 370,50 390,100 420,150 C 440,180 430,220 425,230 L 480,230 C 485,210 495,170 475,140 C 445,95 435,50 440,-10 Z" fill="#93c5fd" opacity="0.85" />
                                    <!-- Bridges (Cầu Rồng, Cầu Sông Hàn) -->
                                    <line x1="370" y1="95" x2="455" y2="105" stroke="#f43f5e" stroke-width="4" stroke-linecap="round" />
                                    <line x1="395" y1="165" x2="470" y2="175" stroke="#fbbf24" stroke-width="4" stroke-linecap="round" />
                                    <!-- Land road vectors -->
                                    <path d="M 0,90 Q 250,85 370,95" stroke="#ffffff" stroke-width="4" fill="none" />
                                    <path d="M 455,105 Q 580,120 700,110" stroke="#ffffff" stroke-width="4" fill="none" />
                                    <path d="M 320,0 L 320,220" stroke="#f1f5f9" stroke-width="3" />
                                    <path d="M 220,0 L 220,220" stroke="#f1f5f9" stroke-width="2" />
                                    <path d="M 540,0 L 540,220" stroke="#f1f5f9" stroke-width="2" />
                                    <!-- Districts label -->
                                    <text x="240" y="60" fill="#64748b" font-size="12" font-weight="bold">Q. Hải Châu</text>
                                    <text x="520" y="60" fill="#64748b" font-size="12" font-weight="bold">Q. Sơn Trà</text>
                                    <text x="350" y="145" fill="#3b82f6" font-size="10" font-weight="bold">Sông Hàn</text>
                                    <text x="330" y="210" fill="#94a3b8" font-size="9">Đà Nẵng Center</text>
                                </svg>
                            </div>

                            <!-- Animated Glowing Marker at Indochina Riverside Bạch Đằng -->
                            <div class="map-marker-pin" style="top: 38%; left: 45%;">
                                <div class="pulse-ring"></div>
                                <div class="pin-dot">
                                    <i class="bx bxs-map font-14 text-white"></i>
                                </div>
                                <div class="marker-caption shadow-sm">
                                    <span class="caption-title">Văn Phòng Trung Tâm Du Lịch Ven Sông Hàn</span>
                                    <span class="caption-address">74 Bạch Đằng, P. Hải Châu 1</span>
                                </div>
                            </div>

                            <!-- Bottom Map Controls Badge -->
                            <div class="map-satellite-badge">
                                <span class="badge bg-dark bg-opacity-75 text-white font-10 px-2 py-1 rounded-pill">
                                    <i class="bx bx-layer me-1"></i> Bản đồ vệ tinh SmartTrip
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Digital Documents, B2B Payout & Audit Timeline -->
            <div class="col-lg-5 col-xl-5">
                <!-- Section 3: HỒ SƠ SỐ HÓA & GIẤY TỜ -->
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-badge bg-cyan-subtle text-cyan">
                                    <i class="bx bx-file-blank font-18"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 font-15 text-dark">3. HỒ SƠ SỐ HÓA & GIẤY TỜ</h5>
                                    <p class="font-11 text-muted mb-0">Chứng thư đã quét AI OCR & Chữ ký số</p>
                                </div>
                            </div>
                            <span class="badge bg-pink text-white font-10 fw-bold px-2 py-1 rounded-pill">
                                3/3 Hợp lệ
                            </span>
                        </div>

                        <!-- Documents List -->
                        <div class="documents-list d-flex flex-direction-column gap-2 mb-3">
                            <!-- Doc 1: DKKD -->
                            <div class="document-item d-flex align-items-center justify-content-between p-2 rounded-2 border">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="doc-icon-wrap bg-danger-subtle text-danger rounded-2 p-2">
                                        <i class="bx bxs-file-pdf font-20"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark font-12 text-truncate" style="max-width: 200px;">
                                            DKKD_DanangExplorer_...
                                        </div>
                                        <div class="font-10 text-muted">Giấy ĐKKD (OCR verified) • 2.4MB</div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1 font-11 fw-semibold" @click="xemGiayTo('dkkd')">
                                    <i class="bx bx-show me-1"></i> Xem
                                </button>
                            </div>

                            <!-- Doc 2: Giấy phép LHQT -->
                            <div class="document-item d-flex align-items-center justify-content-between p-2 rounded-2 border">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="doc-icon-wrap bg-purple-subtle text-purple rounded-2 p-2">
                                        <i class="bx bxs-certification font-20"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark font-12 text-truncate" style="max-width: 200px;">
                                            GP_LuhanhQuocte_Sea...
                                        </div>
                                        <div class="font-10 text-muted">Giấy phép LHQT bản gốc • 4.1MB</div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1 font-11 fw-semibold" @click="xemGiayTo('gp_lhqt')">
                                    <i class="bx bx-show me-1"></i> Xem
                                </button>
                            </div>

                            <!-- Doc 3: BH Lữ Hành -->
                            <div class="document-item d-flex align-items-center justify-content-between p-2 rounded-2 border">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="doc-icon-wrap bg-primary-subtle text-primary rounded-2 p-2">
                                        <i class="bx bxs-shield-plus font-20"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark font-12 text-truncate" style="max-width: 200px;">
                                            BaoHiem_DuLich_MIC_...
                                        </div>
                                        <div class="font-10 text-muted">BH Lữ hành MIC Đà Nẵng • 1.8MB</div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1 font-11 fw-semibold" @click="xemGiayTo('baohiem')">
                                    <i class="bx bx-show me-1"></i> Xem
                                </button>
                            </div>
                        </div>

                        <!-- Qualified Note Callout -->
                        <div class="alert alert-light-pink border border-pink-subtle rounded-3 p-3 mb-0 d-flex gap-2">
                            <i class="bx bx-info-circle text-pink font-18 flex-shrink-0 mt-1"></i>
                            <div class="font-11 text-muted">
                                Hồ sơ lữ hành của bạn đã đủ điều kiện tham gia hệ thống tour tức thời và nhận đặt tour thanh toán tự động qua cổng bảo chứng Da Nang SmartTrip.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 4: TÀI KHOẢN ĐỐI SOÁT B2B -->
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-badge bg-purple-subtle text-purple">
                                    <i class="bx bx-credit-card-front font-18"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 font-15 text-dark">4. TÀI KHOẢN ĐỐI SOÁT B2B</h5>
                                    <p class="font-11 text-muted mb-0">Tài khoản nhận doanh thu tour và ký quỹ bảo lãnh</p>
                                </div>
                            </div>
                            <span class="status-pulse-dot bg-success"></span>
                        </div>

                        <!-- Virtual Bank Card Representation (MB Bank Card) -->
                        <div class="virtual-b2b-card p-3 rounded-3 text-white mb-0 shadow-sm position-relative overflow-hidden">
                            <div class="card-chip-header d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="font-11 fw-bold tracking-wider text-uppercase text-white-50">
                                        MB BANK • NGÂN HÀNG QUÂN ĐỘI
                                    </div>
                                </div>
                                <div class="nfc-icon">
                                    <i class="bx bx-wifi font-20 rotate-90 text-white-50"></i>
                                </div>
                            </div>

                            <div class="card-account-number mb-3">
                                <div class="font-10 text-white-50 text-uppercase mb-1">SỐ TÀI KHOẢN DOANH NGHIỆP (VND)</div>
                                <div class="font-18 fw-bold font-monospace tracking-widest">
                                    8888 9999 234
                                </div>
                            </div>

                            <div class="card-holder-footer d-flex justify-content-between align-items-end">
                                <div>
                                    <div class="font-9 text-white-50 text-uppercase">CHỦ TÀI KHOẢN THỤ HƯỞNG</div>
                                    <div class="font-11 fw-bold text-uppercase">CÔNG TY CP DU LỊCH VÀ KHÁM PHÁ ĐÀ NẴNG</div>
                                </div>
                                <span class="badge bg-white text-purple font-10 px-2 py-1 rounded-pill fw-bold">
                                    Auto-Payout
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 5: NHẬT KÝ NGHIỆP VỤ & PHÊ DUYỆT -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-badge bg-light text-dark">
                                    <i class="bx bx-history font-18"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 font-15 text-dark">5. NHẬT KÝ NGHIỆP VỤ & PHÊ DUYỆT</h5>
                                    <p class="font-11 text-muted mb-0">Lịch sử thẩm định cấp phép từ Ban Quản Trị</p>
                                </div>
                            </div>
                            <span class="badge bg-light text-muted border font-10 fw-semibold px-2 py-1 rounded-pill">
                                nhat_ky_nghiep_vu
                            </span>
                        </div>

                        <!-- Timeline Items -->
                        <div class="audit-timeline">
                            <!-- Item 1: Tái xác thực KYC Level 3 -->
                            <div class="timeline-entry position-relative pb-3 ps-4 border-start border-2 border-pink">
                                <span class="timeline-dot bg-pink"></span>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold text-dark font-12">Tái xác thực KYC Level 3 Diamond</span>
                                    <span class="font-10 text-muted">15/01/2024 09:28</span>
                                </div>
                                <div class="font-11 text-muted">
                                    Phê duyệt bởi: <strong class="text-pink">Admin_DanangDoT #01</strong> (Sở Du Lịch)
                                </div>
                            </div>

                            <!-- Item 2: Cập nhật tài khoản nhận thanh toán -->
                            <div class="timeline-entry position-relative pb-3 ps-4 border-start border-2 border-purple">
                                <span class="timeline-dot bg-purple"></span>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold text-dark font-12">Cập nhật tài khoản nhận thanh toán MB Bank</span>
                                    <span class="font-10 text-muted">20/12/2023 14:15</span>
                                </div>
                                <div class="font-11 text-muted">
                                    Thực hiện bởi: <strong class="text-dark">Trần Văn Bảo</strong> (Tổng Giám Đốc)
                                </div>
                            </div>

                            <!-- Item 3: Khởi tạo hồ sơ -->
                            <div class="timeline-entry position-relative ps-4 border-start border-2 border-primary">
                                <span class="timeline-dot bg-primary"></span>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold text-dark font-12">Khởi tạo hồ sơ pháp nhân lữ hành B2B</span>
                                    <span class="font-10 text-muted">15/01/2022 10:00</span>
                                </div>
                                <div class="font-11 text-muted">
                                    Hệ thống ghi nhận hồ sơ ban đầu từ cổng công trực tuyến
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3 pt-2 border-top">
                            <a href="javascript:;" class="font-12 fw-bold text-pink text-decoration-none" @click="moModalLichSuDayDu">
                                Xem toàn bộ 14 nhật ký nghiệp vụ <i class="bx bx-right-arrow-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Bottom Footer Security Banner -->
        <div class="security-policy-banner card border-0 shadow-sm rounded-3 p-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="shield-badge-wrap bg-light-pink text-pink rounded-3 p-3">
                        <i class="bx bx-shield-quarter font-24"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Chính Sách Bảo Mật Hồ Sơ Đối Tác B2B</h6>
                        <p class="font-11 text-muted mb-0">
                            Mọi thông tin pháp lý được mã hóa SHA-256 và lưu trữ theo Quy định An ninh mạng Du Lịch Quốc Gia.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary btn-sm rounded-3 px-3 py-2 font-11 fw-bold" @click="moQuyCheB2B">
                        Quy chế hoạt động B2B
                    </button>
                    <button class="btn btn-pink-light btn-sm rounded-3 px-3 py-2 font-11 fw-bold text-pink" @click="lienHeHoTroPhapLy">
                        Liên hệ hỗ trợ pháp lý
                    </button>
                </div>
            </div>
        </div>

        <!-- ================= MODALS ================= -->
        <!-- 1. Modal Cập Nhật Hồ Sơ -->
        <div class="modal fade" id="modalCapNhatHoSo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold text-dark font-16">
                            <i class="bx bx-edit text-pink me-2"></i> Cập Nhật Thông Tin Pháp Nhân Doanh Nghiệp
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form @submit.prevent="luuHoSo">
                            <div class="mb-3">
                                <label class="form-label font-12 fw-bold text-dark">Tên Pháp Nhân Đầy Đủ</label>
                                <input type="text" class="form-control" v-model="editForm.ten_phap_nhan" required>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Tên Thương Hiệu Viết Tắt</label>
                                    <input type="text" class="form-control" v-model="editForm.ten_viet_tat" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Mã Số Thuế (MST)</label>
                                    <input type="text" class="form-control" v-model="editForm.ma_so_thue" required>
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Người Đại Diện Pháp Luật</label>
                                    <input type="text" class="form-control" v-model="editForm.nguoi_dai_dien" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Chức Vụ</label>
                                    <input type="text" class="form-control" v-model="editForm.chuc_vu" required>
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Hotline Điều Hành Tour (24/7)</label>
                                    <input type="text" class="form-control" v-model="editForm.hotline_dieu_hanh" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label font-12 fw-bold text-dark">Điện Thoại Bàn</label>
                                    <input type="text" class="form-control" v-model="editForm.dien_thoai_ban">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-12 fw-bold text-dark">Địa Chỉ Trụ Sở Chính</label>
                                <input type="text" class="form-control" v-model="editForm.dia_chi_tru_so" required>
                            </div>
                            <div class="text-end pt-3 border-top">
                                <button type="button" class="btn btn-light px-4 me-2 rounded-3" data-bs-dismiss="modal">Hủy Bỏ</button>
                                <button type="submit" class="btn btn-pink-gradient text-white px-4 rounded-3 fw-bold">Lưu & Gửi Thẩm Định</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Modal Nâng Hạng VIP -->
        <div class="modal fade" id="modalNangHangVIP" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header border-bottom bg-purple-subtle">
                        <h5 class="modal-title fw-bold text-purple font-16">
                            <i class="bx bx-crown me-2"></i> Chương Trình Đối Tác VIP Diamond
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4 text-center">
                        <div class="badge-icon-giant mb-3">
                            <i class="bx bx-diamond font-40 text-purple"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Đối Tác Đang Ở Cấp Độ KYC Level 3</h5>
                        <p class="font-12 text-muted mb-3">
                            Doanh nghiệp của bạn đang được hưởng chính sách hoa hồng ưu đãi 3.5% và hỗ trợ đối soát thanh toán tự động T+1.
                        </p>
                        <div class="p-3 bg-light rounded-3 text-start mb-3 font-12">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bx bx-check text-success font-18"></i>
                                <span>Ưu tiên đề xuất Top 1 trên ứng dụng Du Khách SmartTrip AI</span>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bx bx-check text-success font-18"></i>
                                <span>Hạn mức ký quỹ bảo lãnh lên tới 500.000.000 đ</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-check text-success font-18"></i>
                                <span>Chuyên viên hỗ trợ nghiệp vụ 1-1 riêng biệt</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-purple-gradient text-white w-100 py-2 rounded-3 fw-bold" @click="dangKyNangCap">
                            Gửi Yêu Cầu Nâng Cấp Level 4 Premier
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Modal Xem Giấy Tờ Số Hóa -->
        <div class="modal fade" id="modalXemGiayTo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold text-dark font-15">
                            <i class="bx bx-file text-pink me-2"></i> {{ activeDoc.title }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4 text-center">
                        <div class="doc-preview-mockup border rounded-3 p-4 bg-light mb-3">
                            <i class="bx bxs-file-pdf font-50 text-danger mb-2"></i>
                            <div class="fw-bold text-dark font-13">{{ activeDoc.filename }}</div>
                            <div class="font-11 text-muted">Dung lượng: {{ activeDoc.size }} • Đã quét OCR thành công</div>
                            <div class="badge bg-success-subtle text-success font-10 px-2 py-1 mt-2">
                                <i class="bx bx-check-shield me-1"></i> Chữ Ký Số Hợp Lệ (VNPT-CA)
                            </div>
                        </div>
                        <div class="font-11 text-muted text-start bg-white border rounded-2 p-2 font-monospace">
                            Mã Băm SHA-256: e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-secondary btn-sm rounded-3" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-pink-gradient text-white btn-sm rounded-3 fw-bold" @click="taiGiayTo">
                            <i class="bx bx-download me-1"></i> Tải Về Bản Gốc
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'HoSoDoanhNghiep',
    data() {
        return {
            doanhNghiep: {
                ten_phap_nhan: 'CÔNG TY CỔ PHẦN DU LỊCH VÀ KHÁM PHÁ ĐÀ NẴNG (DANANG EXPLORER TRAVEL CORP)',
                ten_viet_tat: 'Danang Explorer Travel',
                ma_so_thue: '0401892834',
                so_giay_phep: '48-0128/2022/TCDL-GP LHQT',
                pham_vi_hoat_dong: 'Đón khách quốc tế (Inbound) & Khách Việt Nam ra nước ngoài (Outbound)',
                nguoi_dai_dien: 'Ông Trần Văn Bảo',
                chuc_vu: 'Tổng Giám Đốc Điều Hành',
                dien_thoai_ban: '0236 3888 999',
                hotline_dieu_hanh: '0905 888 234',
                email: 'contact@danangexplorer.vn',
                website: 'danangexplorer.vn',
                dia_chi_tru_so: 'Tầng 8, Tòa nhà Indochina Riverside, 74 Bạch Đằng, P. Hải Châu 1, Q. Hải Châu, TP. Đà Nẵng',
                ma_phuong: 'HC1-04',
                toa_do: '16.0682° N, 108.2238° E'
            },
            editForm: {
                ten_phap_nhan: '',
                ten_viet_tat: '',
                ma_so_thue: '',
                nguoi_dai_dien: '',
                chuc_vu: '',
                hotline_dieu_hanh: '',
                dien_thoai_ban: '',
                dia_chi_tru_so: ''
            },
            activeDoc: {
                title: 'Giấy Chứng Nhận ĐKKD',
                filename: 'DKKD_DanangExplorer_2022.pdf',
                size: '2.4MB'
            }
        }
    },
    mounted() {
        this.resetEditForm();
    },
    methods: {
        resetEditForm() {
            this.editForm = {
                ten_phap_nhan: this.doanhNghiep.ten_phap_nhan,
                ten_viet_tat: this.doanhNghiep.ten_viet_tat,
                ma_so_thue: this.doanhNghiep.ma_so_thue,
                nguoi_dai_dien: this.doanhNghiep.nguoi_dai_dien,
                chuc_vu: this.doanhNghiep.chuc_vu,
                hotline_dieu_hanh: this.doanhNghiep.hotline_dieu_hanh,
                dien_thoai_ban: this.doanhNghiep.dien_thoai_ban,
                dia_chi_tru_so: this.doanhNghiep.dia_chi_tru_so
            };
        },
        xuatChungNhanKYC() {
            if (this.$toast) {
                this.$toast.success('Đang tạo và trích xuất file Chứng Nhận Pháp Nhân KYC điện tử (PDF)...');
            } else {
                alert('Đang trích xuất Chứng Nhận KYC điện tử!');
            }
        },
        moModalNangHang() {
            const modalEl = document.getElementById('modalNangHangVIP');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        moModalCapNhatHoSo() {
            this.resetEditForm();
            const modalEl = document.getElementById('modalCapNhatHoSo');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        luuHoSo() {
            this.doanhNghiep.ten_phap_nhan = this.editForm.ten_phap_nhan;
            this.doanhNghiep.ten_viet_tat = this.editForm.ten_viet_tat;
            this.doanhNghiep.ma_so_thue = this.editForm.ma_so_thue;
            this.doanhNghiep.nguoi_dai_dien = this.editForm.nguoi_dai_dien;
            this.doanhNghiep.chuc_vu = this.editForm.chuc_vu;
            this.doanhNghiep.hotline_dieu_hanh = this.editForm.hotline_dieu_hanh;
            this.doanhNghiep.dien_thoai_ban = this.editForm.dien_thoai_ban;
            this.doanhNghiep.dia_chi_tru_so = this.editForm.dia_chi_tru_so;

            const modalEl = document.getElementById('modalCapNhatHoSo');
            if (modalEl && window.bootstrap) {
                const modal = window.bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }

            if (this.$toast) {
                this.$toast.success('Cập nhật hồ sơ thành công! Dữ liệu đã được gửi thẩm định.');
            }
        },
        dangKyNangCap() {
            const modalEl = document.getElementById('modalNangHangVIP');
            if (modalEl && window.bootstrap) {
                const modal = window.bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }
            if (this.$toast) {
                this.$toast.success('Yêu cầu nâng hạng VIP đã được gửi tới Ban Quản Trị Sở Du Lịch.');
            }
        },
        xemGiayTo(loai) {
            if (loai === 'dkkd') {
                this.activeDoc = {
                    title: 'Giấy Đăng Ký Kinh Doanh Doanh Nghiệp',
                    filename: 'DKKD_DanangExplorer_2022.pdf',
                    size: '2.4MB'
                };
            } else if (loai === 'gp_lhqt') {
                this.activeDoc = {
                    title: 'Giấy Phép Kinh Doanh Lữ Hành Quốc Tế',
                    filename: 'GP_LuhanhQuocte_SeaTours.pdf',
                    size: '4.1MB'
                };
            } else {
                this.activeDoc = {
                    title: 'Bảo Hiểm Trách Nhiệm Du Lịch Lữ Hành MIC',
                    filename: 'BaoHiem_DuLich_MIC_2024.pdf',
                    size: '1.8MB'
                };
            }
            const modalEl = document.getElementById('modalXemGiayTo');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        taiGiayTo() {
            if (this.$toast) {
                this.$toast.info('Bắt đầu tải về tệp tin: ' + this.activeDoc.filename);
            }
        },
        moBanDoChinh() {
            window.open('https://www.openstreetmap.org/#map=17/16.0682/108.2238', '_blank');
        },
        moModalLichSuDayDu() {
            if (this.$toast) {
                this.$toast.info('Đang mở toàn bộ 14 nhật ký thẩm định & phê duyệt hồ sơ đối tác.');
            }
        },
        moQuyCheB2B() {
            if (this.$toast) {
                this.$toast.info('Xem văn bản: Quy chế hoạt động & cam kết đối tác B2B SmartTrip AI.');
            }
        },
        lienHeHoTroPhapLy() {
            if (this.$toast) {
                this.$toast.info('Đang kết nối tổ chuyên trách Pháp lý & KYC Sở Du Lịch: 1900 8888 (Nhánh 2).');
            }
        }
    }
}
</script>

<style scoped>
.partner-kyc-profile-page {
    font-family: inherit;
    color: #1e293b;
}

/* Headers & Titles */
.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.02em;
}

.page-desc {
    font-size: 0.84rem;
    line-height: 1.5;
}

/* Badges */
.badge-tag-pill {
    display: inline-flex;
    align-items: center;
    padding: 3px 10px;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}

.tag-pink {
    background-color: #ffe4e6;
    color: #e11d48;
}

.bg-cyan-light {
    background-color: #ecfeff;
}

.text-cyan {
    color: #0891b2 !important;
}

.text-pink {
    color: #e11d48 !important;
}

.text-purple {
    color: #8b5cf6 !important;
}

.bg-pink {
    background-color: #e11d48 !important;
}

.bg-purple {
    background-color: #8b5cf6 !important;
}

.bg-pink-subtle {
    background-color: #ffe4e6;
}

.bg-purple-subtle {
    background-color: #f3e8ff;
}

.bg-cyan-subtle {
    background-color: #cffafe;
}

.alert-light-pink {
    background-color: #fff1f2;
}

.border-pink-subtle {
    border-color: #fecdd3 !important;
}

.border-pink {
    border-color: #e11d48 !important;
}

.border-purple {
    border-color: #8b5cf6 !important;
}

/* Gradient Buttons */
.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
    transition: all 0.2s;
}

.btn-pink-gradient:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
}

.btn-purple-gradient {
    background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
    border: none;
    transition: all 0.2s;
}

.btn-purple-gradient:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(124, 58, 237, 0.35);
}

.btn-outline-pink {
    color: #e11d48;
    border-color: #f43f5e;
    background: #ffffff;
}

.btn-outline-pink:hover {
    background-color: #ffe4e6;
    color: #be123c;
}

.btn-pink-light {
    background-color: #ffe4e6;
    border: none;
}

.btn-pink-light:hover {
    background-color: #fecdd3;
}

/* KPI Cards */
.kpi-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 18px 20px;
    border: 1px solid #f1f5f9;
    transition: transform 0.2s, box-shadow 0.2s;
}

.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05) !important;
}

.kpi-label {
    font-size: 0.68rem;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.kpi-value {
    font-size: 1.18rem;
    font-weight: 800;
    line-height: 1.3;
    margin: 3px 0 2px;
}

.kpi-icon-wrap {
    width: 42px;
    height: 42px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.icon-pink {
    background: #ffe4e6;
    color: #e11d48;
}

.icon-purple {
    background: #f3e8ff;
    color: #8b5cf6;
}

.icon-blue {
    background: #e0f2fe;
    color: #0284c7;
}

.icon-dark {
    background: #f1f5f9;
    color: #475569;
}

.status-pulse-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.25);
}

/* Section Icons */
.section-icon-badge {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* Field display box */
.field-display-box {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 8px 12px;
    min-height: 38px;
}

.highlight-box {
    background-color: #ffffff;
    border-color: #fbcfe8;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.04);
}

.license-banner-box {
    background: #faf5ff;
    border: 1px dashed #d8b4fe;
}

.address-display-box {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
}

/* Mini Vector Map Container */
.mini-map-container {
    height: 220px;
    background-color: #e2edf8;
    position: relative;
    border: 1px solid #cbd5e1;
}

.map-marker-pin {
    position: absolute;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 10;
}

.pin-dot {
    width: 28px;
    height: 28px;
    background: #e11d48;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 8px rgba(225, 29, 72, 0.5);
    border: 2px solid #ffffff;
    z-index: 2;
}

.pulse-ring {
    position: absolute;
    top: 5px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background-color: rgba(225, 29, 72, 0.35);
    animation: marker-pulse 2s infinite;
    z-index: 1;
}

@keyframes marker-pulse {
    0% {
        transform: scale(0.6);
        opacity: 0.9;
    }
    100% {
        transform: scale(1.6);
        opacity: 0;
    }
}

.marker-caption {
    background: #ffffff;
    border-radius: 6px;
    padding: 4px 8px;
    margin-top: 5px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    white-space: nowrap;
    border: 1px solid #fecdd3;
}

.caption-title {
    font-size: 0.68rem;
    font-weight: 700;
    color: #e11d48;
}

.caption-address {
    font-size: 0.62rem;
    color: #64748b;
}

.map-satellite-badge {
    position: absolute;
    bottom: 10px;
    right: 10px;
    z-index: 5;
}

/* Virtual B2B Bank Card */
.virtual-b2b-card {
    background: linear-gradient(135deg, #3b0764 0%, #581c87 50%, #7e22ce 100%);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 14px;
}

.rotate-90 {
    transform: rotate(90deg);
}

.tracking-widest {
    letter-spacing: 0.15em;
}

.tracking-wider {
    letter-spacing: 0.08em;
}

/* Timeline */
.audit-timeline {
    position: relative;
}

.timeline-dot {
    position: absolute;
    left: -6px;
    top: 3px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 2px solid #ffffff;
}

/* Document Item */
.document-item {
    background: #ffffff;
    transition: background 0.15s, border-color 0.15s;
}

.document-item:hover {
    background: #fff1f2;
    border-color: #fecdd3 !important;
}

.font-9 {
    font-size: 0.58rem;
}

.font-10 {
    font-size: 0.62rem;
}

.font-11 {
    font-size: 0.69rem;
}

.font-12 {
    font-size: 0.75rem;
}

.font-13 {
    font-size: 0.81rem;
}

.font-14 {
    font-size: 0.88rem;
}

.font-15 {
    font-size: 0.94rem;
}

.font-16 {
    font-size: 1rem;
}

.font-18 {
    font-size: 1.125rem;
}

.font-20 {
    font-size: 1.25rem;
}

.font-24 {
    font-size: 1.5rem;
}

.font-40 {
    font-size: 2.5rem;
}

.font-50 {
    font-size: 3.125rem;
}

@media (max-width: 991.98px) {
    .virtual-b2b-card {
        margin-bottom: 1rem;
    }
}
</style>
