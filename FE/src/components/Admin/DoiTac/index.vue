<template>
    <div class="partner-moderation-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">B2B PARTNER ONBOARDING & COMPLIANCE</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Xét Duyệt & Kiểm Soát Đối Tác Doanh Nghiệp Lữ Hành</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 820px;">
                    Thẩm định tính pháp lý giấy phép kinh doanh lữ hành, tiền ký quỹ bảo vệ du khách và cấp phép tài khoản đối tác hoạt động trên nền tảng SmartTrip Đà Nẵng.
                </p>
            </div>

            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-2" @click="openModalQuyChuan">
                    <i class="bx bx-book-bookmark text-primary font-16"></i>
                    <span>Quy Chuẩn Thẩm Định</span>
                </button>
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-2" @click="xuatDanhSach">
                    <i class="bx bx-download text-primary font-16"></i>
                    <span>Xuất Danh Sách</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="thamDinhHangLoat">
                    <i class="bx bx-layer-plus font-16"></i>
                    <span>Thẩm Định Hàng Loạt</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Hồ sơ chờ thẩm định -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="font-28 fw-bold text-dark">18</span>
                                <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                                    +6 mới 24h
                                </span>
                            </div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">HỒ SƠ CHỜ THẨM ĐỊNH</div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-file font-20" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-danger font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-time-five font-13"></i> Thời gian xử lý trung bình: 3.2 giờ
                        </small>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Đối tác đang hoạt động -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="font-28 fw-bold text-dark">856</span>
                                <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                                    99.2% Tuân thủ
                                </span>
                            </div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐỐI TÁC ĐANG HOẠT ĐỘNG</div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 42px; height: 42px;">
                            <i class="bx bx-store-alt font-20" style="color: #7C3AED;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-primary font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-check font-14"></i> Đảm bảo quy chuẩn Sở Du Lịch
                        </small>
                    </div>
                </div>
            </div>

            <!-- KPI 3: Tạm đình chỉ / Hết hạn phép -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="font-28 fw-bold text-dark">14</span>
                                <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FEE2E2; color: #DC2626;">
                                    Cần xử lý gấp
                                </span>
                            </div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TẠM ĐÌNH CHỈ / HẾT HẠN PHÉP</div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FEE2E2; width: 42px; height: 42px;">
                            <i class="bx bx-gavel font-20" style="color: #DC2626;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-danger font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-error font-13"></i> Yêu cầu thanh tra bổ sung ngay
                        </small>
                    </div>
                </div>
            </div>

            <!-- KPI 4: Quỹ ký quỹ bảo vệ du khách -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="font-26 fw-bold text-dark">42.8 Tỷ VNĐ</span>
                            </div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">QUỸ KÝ QUỸ BẢO VỆ DU KHÁCH</div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 42px; height: 42px;">
                            <i class="bx bx-shield-quarter font-20" style="color: #0284C7;"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                        <small class="text-muted font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-lock-alt text-primary font-13"></i> Phong tỏa 100% theo Luật Du Lịch
                        </small>
                        <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                            VietinBank DN
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Columns Main Layout: Left Queue & Right Partner Inspection Sheet -->
        <div class="row g-4 mb-4">
            <!-- LEFT COLUMN: HÀNG ĐỢI XÉT DUYỆT -->
            <div class="col-12 col-lg-4 col-xl-4">
                <div class="card border-0 shadow-xs rounded-4 bg-white p-3 p-lg-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Filter Tabs -->
                        <div class="d-flex align-items-center gap-1-5 mb-3 flex-wrap">
                            <button 
                                class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                                :class="filterStatus === 'pending' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                                @click="filterStatus = 'pending'"
                            >
                                Chờ duyệt (18)
                            </button>
                            <button 
                                class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                                :class="filterStatus === 'supplement' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                                @click="filterStatus = 'supplement'"
                            >
                                Cần bổ sung (8)
                            </button>
                            <button 
                                class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                                :class="filterStatus === 'approved' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                                @click="filterStatus = 'approved'"
                            >
                                Đã duyệt
                            </button>
                        </div>

                        <!-- Quick Search Input -->
                        <div class="position-relative mb-3">
                            <i class="bx bx-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted font-15"></i>
                            <input 
                                type="text" 
                                v-model="searchKeyword" 
                                class="form-control form-control-sm rounded-pill ps-5 pe-4 bg-light border-0 font-12"
                                placeholder="Tìm theo tên doanh nghiệp, MST..." 
                            />
                            <i class="bx bx-slider position-absolute top-50 end-0 translate-middle-y me-3 text-muted font-16 cursor-pointer"></i>
                        </div>

                        <!-- Partner Queue List -->
                        <div class="partner-queue-list d-flex flex-column gap-2-5">
                            <div 
                                v-for="p in filteredPartners" 
                                :key="p.id"
                                class="partner-queue-card p-3 rounded-4 transition-all cursor-pointer border"
                                :class="selectedPartner.id === p.id ? 'active-partner-card' : 'bg-white hover-shadow'"
                                @click="selectPartner(p)"
                            >
                                <!-- Top Row: Code & Time -->
                                <div class="d-flex align-items-center justify-content-between mb-1-5">
                                    <div class="d-flex align-items-center gap-1-5">
                                        <span class="dot-pink-sm" :class="{ 'dot-gray-sm': selectedPartner.id !== p.id }"></span>
                                        <span class="font-11 fw-bold text-dark font-mono">{{ p.code }}</span>
                                    </div>
                                    <span class="font-10 text-muted">{{ p.timeAgo }}</span>
                                </div>

                                <!-- Company Name -->
                                <h6 class="font-12 fw-bold text-dark mb-1 text-truncate" :title="p.companyName">
                                    {{ p.companyName }}
                                </h6>

                                <!-- Address -->
                                <div class="font-11 text-muted mb-2 text-truncate" :title="p.address">
                                    Trụ sở: {{ p.address }}
                                </div>

                                <!-- Badges & Trust Score Row -->
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-1">
                                    <div class="d-flex align-items-center gap-1 flex-wrap">
                                        <span class="badge rounded-pill font-9 fw-bold px-2 py-0-5" :style="{ backgroundColor: p.licenseBg, color: p.licenseColor }">
                                            <i :class="p.licenseIcon" class="me-0-5 font-10"></i> {{ p.licenseType }}
                                        </span>
                                        <span class="badge rounded-pill font-9 fw-bold px-2 py-0-5" style="background-color: #F5F3FF; color: #7C3AED;">
                                            <i class="bx bx-bank me-0-5 font-10"></i> Ký quỹ: {{ p.escrowAmount }}
                                        </span>
                                    </div>
                                    <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                                        AI Score: {{ p.aiScore }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: CHI TIẾT THẨM ĐỊNH HỒ SƠ PHÁP NHÂN -->
            <div class="col-12 col-lg-8 col-xl-8">
                <div class="card border-0 shadow-xs rounded-4 bg-white p-3 p-lg-4">
                    <!-- Top Info Header Box -->
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3 p-3 rounded-4" style="background-color: #FAF5FF; border: 1px solid #F3E8FF;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="partner-avatar-dx rounded-circle d-flex align-items-center justify-content-center text-white font-16 fw-bold flex-shrink-0" style="background-color: #9333EA; width: 48px; height: 48px;">
                                DX
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                    <span class="badge rounded-pill font-10 fw-bold px-2-5 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                                        HỒ SƠ CẦN THẨM ĐỊNH
                                    </span>
                                    <span class="font-11 text-muted font-mono">MÃ: {{ selectedPartner.code }}</span>
                                </div>
                                <h4 class="font-18 fw-bold text-dark mb-1">
                                    {{ selectedPartner.companyName }}
                                </h4>
                                <div class="font-11 text-muted">
                                    Danang Explorer Corp • Thành lập: 2018
                                </div>
                            </div>
                        </div>

                        <!-- Trust Score AI Circular Widget -->
                        <div class="d-flex align-items-center gap-2 p-2 px-3 rounded-3 bg-white border shadow-2xs">
                            <div class="trust-score-circle rounded-circle d-flex align-items-center justify-content-center font-15 fw-bold" style="border: 2px solid #E11D48; color: #E11D48; width: 38px; height: 38px;">
                                {{ selectedPartner.aiScore || 96 }}
                            </div>
                            <div>
                                <div class="font-10 fw-bold text-dark text-uppercase tracking-wider">TRUST SCORE AI</div>
                                <div class="font-10 text-success fw-semibold">Không tranh chấp</div>
                            </div>
                        </div>
                    </div>

                    <!-- 6 Business Profile Metadata Fields -->
                    <div class="row g-2 mb-4 font-11">
                        <div class="col-12 col-md-4">
                            <div class="p-2-5 rounded-3 bg-light border h-100">
                                <span class="text-muted d-block font-10">Mã số thuế:</span>
                                <span class="fw-bold text-dark font-12 font-mono">0401892831</span>
                                <i class="bx bxs-check-circle text-primary ms-1 font-13" title="Đã đối soát"></i>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="p-2-5 rounded-3 bg-light border h-100">
                                <span class="text-muted d-block font-10">Người đại diện:</span>
                                <span class="fw-bold text-dark font-12">Trần Văn Bảo</span>
                                <small class="text-muted fst-italic"> (Chủ tịch HĐQT)</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="p-2-5 rounded-3 bg-light border h-100">
                                <span class="text-muted d-block font-10">Email đối tác:</span>
                                <span class="fw-bold text-primary font-12">contact@danangexplorer.com</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="p-2-5 rounded-3 bg-light border h-100">
                                <span class="text-muted d-block font-10">Hotline pháp nhân:</span>
                                <span class="fw-bold text-dark font-12">0905.888.123</span>
                                <span class="badge rounded-pill font-8 fw-bold bg-pink-subtle text-pink ms-1">Đã OTP</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="p-2-5 rounded-3 bg-light border h-100">
                                <span class="text-muted d-block font-10">Quy mô nhân sự:</span>
                                <span class="fw-bold text-dark font-12">42 HDV du lịch thẻ Quốc tế</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="p-2-5 rounded-3 bg-light border h-100">
                                <span class="text-muted d-block font-10">Địa chỉ trụ sở:</span>
                                <span class="fw-semibold text-secondary font-11 text-truncate d-block" title="120 Bạch Đằng, P. Hải Châu 1, Q. Hải Châu, TP Đà Nẵng">
                                    120 Bạch Đằng, Q. Hải Châu, TP Đà Nẵng
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- 2 Side-by-Side Legal Inspection Cards: Giấy Phép & Ký Quỹ -->
                    <div class="row g-3 mb-4">
                        <!-- Card 1: Giấy Phép Lữ Hành Quốc Tế -->
                        <div class="col-12 col-md-6">
                            <div class="border rounded-4 p-3 bg-white h-100 shadow-2xs">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-1-5">
                                        <i class="bx bx-shield-check text-pink font-18"></i>
                                        <span class="font-12 fw-bold text-dark">Giấy Phép Lữ Hành Quốc Tế</span>
                                    </div>
                                    <span class="badge rounded-pill font-9 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                                        OCR Khớp 100%
                                    </span>
                                </div>
                                <div class="font-11 text-muted mb-2 font-mono">
                                    Số GP: 48-024/2022/TCDL-GP LHQT
                                </div>

                                <!-- License Visual Scan Preview Box -->
                                <div class="license-scan-box rounded-3 p-3 text-center mb-2 position-relative overflow-hidden" style="background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%); border: 1px dashed #F59E0B; height: 130px;">
                                    <div class="font-10 fw-bold text-uppercase text-secondary mb-1">Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam</div>
                                    <div class="font-9 text-muted mb-1">Tổng Cục Du Lịch cấp 15/04/2023</div>
                                    <div class="p-1 px-2 rounded bg-white bg-opacity-80 d-inline-block font-10 fw-bold text-dark shadow-xs my-1">
                                        Có giá trị pháp lý đến 15/04/2028 (Còn hiệu lực 3 năm)
                                    </div>
                                    <div class="font-8 text-muted">Chứng nhận đủ điều kiện tổ chức tour quốc tế & đón khách inbound</div>
                                </div>

                                <div class="font-11 text-muted d-flex justify-content-between py-1 border-bottom">
                                    <span>Phạm vi cấp phép:</span>
                                    <b class="text-dark">Khách quốc tế & Nội địa</b>
                                </div>
                                <div class="font-11 text-muted d-flex justify-content-between py-1 mb-2">
                                    <span>Mã chứng thực số:</span>
                                    <b class="text-primary font-mono">TCDL-VN-2021-X</b>
                                </div>

                                <button class="btn btn-sm btn-light w-100 rounded-pill font-11 fw-semibold text-secondary d-flex align-items-center justify-content-center gap-1" @click="xemBanScan">
                                    <i class="bx bx-show font-14"></i>
                                    <span>Xem Bản Scan Gốc Độ Phân Giải Cao</span>
                                </button>
                            </div>
                        </div>

                        <!-- Card 2: Hợp Đồng Ký Quỹ Ngân Hàng -->
                        <div class="col-12 col-md-6">
                            <div class="border rounded-4 p-3 bg-white h-100 shadow-2xs">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-1-5">
                                        <i class="bx bx-folder text-purple font-18"></i>
                                        <span class="font-12 fw-bold text-dark">Hợp Đồng Ký Quỹ Ngân Hàng</span>
                                    </div>
                                    <span class="badge rounded-pill font-9 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                                        Đã Phong Tỏa
                                    </span>
                                </div>
                                <div class="font-11 text-muted mb-2 font-mono">
                                    Số HĐ: 23/2022/KQ-VCB.DN
                                </div>

                                <!-- Bank Escrow Visual Scan Preview Box -->
                                <div class="bank-scan-box rounded-3 p-3 text-center mb-2 position-relative overflow-hidden" style="background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%); border: 1px dashed #10B981; height: 130px;">
                                    <div class="font-10 fw-bold text-uppercase text-success mb-1">Vietcombank CN Đà Nẵng</div>
                                    <div class="font-13 fw-bold text-dark mb-1">
                                        Số tiền: 500.000.000 VNĐ
                                    </div>
                                    <div class="p-1 px-2 rounded bg-white bg-opacity-80 d-inline-block font-10 fw-semibold text-secondary shadow-xs my-1">
                                        Ngân hàng TMCP Ngoại Thương VN (Vietcombank) - CN Đà Nẵng
                                    </div>
                                    <div class="font-8 text-muted">Bảo lãnh tài chính theo quy định Luật Du Lịch 2017</div>
                                </div>

                                <div class="font-11 text-muted d-flex justify-content-between py-1 border-bottom">
                                    <span>Mục đích ký quỹ:</span>
                                    <b class="text-dark">Kinh doanh Lữ hành Quốc tế</b>
                                </div>
                                <div class="font-11 text-muted d-flex justify-content-between py-1 mb-2">
                                    <span>Trạng thái bảo lãnh:</span>
                                    <b class="text-danger font-11">Phong tỏa vô điều kiện</b>
                                </div>

                                <button class="btn btn-sm btn-light w-100 rounded-pill font-11 fw-semibold text-secondary d-flex align-items-center justify-content-center gap-1" @click="kiemTraVietcombank">
                                    <i class="bx bx-check-shield text-success font-14"></i>
                                    <span>Kiểm Tra Trực Tuyến Với Vietcombank</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Moderation Panel: Biên Bản Thẩm Định & Quyết Định Phê Duyệt Cấp Quyền -->
                    <div class="border rounded-4 p-3 p-lg-4" style="background-color: #FFFDFD; border-color: #FECDD3 !important;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-check-square font-18 text-pink"></i>
                                <h6 class="font-14 fw-bold text-dark mb-0">Biên Bản Thẩm Định & Quyết Định Phê Duyệt Cấp Quyền</h6>
                            </div>
                            <span class="font-11 text-muted">Chuyên viên phụ trách: <b>Trần Hoàng Long</b></span>
                        </div>

                        <!-- 3 Checkbox Verification Badges (ticked) -->
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-4">
                                <div class="p-2 px-3 rounded-pill bg-pink-subtle border border-pink-subtle d-flex align-items-center gap-2">
                                    <i class="bx bx-check-circle text-pink font-16"></i>
                                    <span class="font-11 fw-semibold text-dark">Đã xác minh MST trên Tổng cục Thuế</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="p-2 px-3 rounded-pill bg-pink-subtle border border-pink-subtle d-flex align-items-center gap-2">
                                    <i class="bx bx-check-circle text-pink font-16"></i>
                                    <span class="font-11 fw-semibold text-dark">Giấy phép LHQT còn hạn &gt; 1 năm</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="p-2 px-3 rounded-pill bg-pink-subtle border border-pink-subtle d-flex align-items-center gap-2">
                                    <i class="bx bx-check-circle text-pink font-16"></i>
                                    <span class="font-11 fw-semibold text-dark">Hợp đồng ký quỹ phong tỏa hợp lệ</span>
                                </div>
                            </div>
                        </div>

                        <!-- Note Textarea -->
                        <div class="mb-3">
                            <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-1">
                                GHI CHÚ NGHIỆP VỤ / ĐIỀU KHOẢN BỔ SUNG CHO ĐỐI TÁC (Ghi vào nhật ký nghiệp vụ):
                            </label>
                            <textarea 
                                v-model="moderationNote" 
                                class="form-control font-12 rounded-3 text-secondary" 
                                rows="3"
                                placeholder="Ví dụ: Hồ sơ đầy đủ, đối tác có 42 hướng dẫn viên đạt chuẩn, liên kết API bán tour tự động trên cổng SmartTrip Đà Nẵng..."
                            ></textarea>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2 border-top">
                            <button 
                                class="btn btn-sm rounded-pill px-3 py-2 font-12 fw-bold d-flex align-items-center gap-1"
                                style="background-color: #FEE2E2; color: #DC2626; border: 1px solid #FECACA;"
                                @click="tuChoiHoSo"
                            >
                                <i class="bx bx-x-circle font-16"></i>
                                <span>Từ Chối Hồ Sơ</span>
                            </button>

                            <div class="d-flex align-items-center gap-2">
                                <button 
                                    class="btn btn-sm rounded-pill px-3 py-2 font-12 fw-bold d-flex align-items-center gap-1"
                                    style="background-color: #EDE9FE; color: #7C3AED; border: 1px solid #DDD6FE;"
                                    @click="yeuCauBoSung"
                                >
                                    <i class="bx bx-file-blank font-16"></i>
                                    <span>Yêu Cầu Bổ Sung Giấy Tờ</span>
                                </button>
                                <button 
                                    class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1"
                                    @click="pheDuyetCapQuyen"
                                >
                                    <i class="bx bx-check-circle font-16"></i>
                                    <span>Phê Duyệt & Cấp Quyền Hoạt Động</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: QUY CHUẨN THẨM ĐỊNH ĐỐI TÁC -->
        <div v-if="showModalQuyChuan" class="custom-modal-backdrop">
            <div class="custom-modal-content rounded-4 p-4 bg-white shadow-lg" style="max-width: 620px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0 font-16 d-flex align-items-center gap-2">
                        <i class="bx bx-book-bookmark text-pink"></i> Quy Chuẩn Pháp Lý Doanh Nghiệp Lữ Hành SmartTrip
                    </h5>
                    <button class="btn btn-sm btn-light rounded-circle p-1" @click="showModalQuyChuan = false">
                        <i class="bx bx-x font-18"></i>
                    </button>
                </div>
                <div class="font-12 text-secondary mb-3 lh-base">
                    <p class="mb-2"><strong>1. Ký Quỹ Lữ Hành Quốc Tế:</strong> Tối thiểu 500.000.000 VNĐ tại ngân hàng thương mại được cấp phép hoạt động tại Việt Nam, trạng thái phong tỏa vô điều kiện.</p>
                    <p class="mb-2"><strong>2. Ký Quỹ Lữ Hành Nội Địa:</strong> Tối thiểu 250.000.000 VNĐ theo Luật Du Lịch 2017.</p>
                    <p class="mb-2"><strong>3. Hướng Dẫn Viên & Bảo Hiểm:</strong> 100% hướng dẫn viên dẫn đoàn phải có thẻ hành nghề còn hiệu lực do Tổng cục Du Lịch hoặc Sở Du Lịch cấp.</p>
                    <p class="mb-0"><strong>4. Xác Minh Thuế:</strong> Doanh nghiệp không nợ thuế quá 90 ngày và có mã số thuế hoạt động bình thường trên hệ thống gdt.gov.vn.</p>
                </div>
                <div class="d-flex justify-content-end pt-2 border-top">
                    <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4" @click="showModalQuyChuan = false">Đã Hiểu</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'XetDuyetDoiTacAdminComponent',
    data() {
        return {
            filterStatus: 'pending',
            searchKeyword: '',
            moderationNote: 'Ví dụ: Hồ sơ đầy đủ, đối tác có 42 hướng dẫn viên đạt chuẩn, liên kết API bán tour tự động trên cổng SmartTrip Đà Nẵng...',
            showModalQuyChuan: false,

            // Danh sách Đối tác trong hàng đợi (Khớp 100% hình ảnh)
            partners: [
                {
                    id: 1,
                    code: 'DT-DNEXP-2025',
                    companyName: 'Công ty Cổ phần Du Lịch Quốc Tế Đà Nẵng Explorer',
                    address: '120 Bạch Đằng, P. Hải Châu 1, Q. Hải Châu, TP Đà Nẵng',
                    licenseType: 'Lữ hành Quốc tế',
                    licenseIcon: 'bx bx-globe',
                    licenseBg: '#E11D48',
                    licenseColor: '#FFFFFF',
                    escrowAmount: '500 Triệu',
                    aiScore: 96,
                    timeAgo: '3 giờ trước',
                    status: 'pending'
                },
                {
                    id: 2,
                    code: 'DT-HVECO-2025',
                    companyName: 'Hải Vân EcoTour Travel Co., Ltd',
                    address: '45 Nguyễn Văn Linh, P. Nam Dương, Q. Hải Châu, TP Đà Nẵng',
                    licenseType: 'Lữ hành Nội địa',
                    licenseIcon: 'bx bx-compass',
                    licenseBg: '#F1F5F9',
                    licenseColor: '#475569',
                    escrowAmount: '250 Triệu',
                    aiScore: 88,
                    timeAgo: '5 giờ trước',
                    status: 'pending'
                },
                {
                    id: 3,
                    code: 'DT-STWAT-2025',
                    companyName: 'Sơn Trà Watersports & Diving Club',
                    address: 'Bãi Bụt, Bán đảo Sơn Trà, TP Đà Nẵng',
                    licenseType: 'Dịch vụ Thể thao Biển',
                    licenseIcon: 'bx bx-swim',
                    licenseBg: '#E0F2FE',
                    licenseColor: '#0284C7',
                    escrowAmount: '150 Triệu',
                    aiScore: 91,
                    timeAgo: 'Hôm qua',
                    status: 'supplement'
                },
                {
                    id: 4,
                    code: 'DT-BNHER-2025',
                    companyName: 'Bana Heritage Travel JSC',
                    address: 'Xã Hòa Phú, Huyện Hòa Vang, TP Đà Nẵng',
                    licenseType: 'Lữ hành Nội địa & Tour Văn Hóa',
                    licenseIcon: 'bx bx-arch',
                    licenseBg: '#F1F5F9',
                    licenseColor: '#475569',
                    escrowAmount: '250 Triệu',
                    aiScore: 85,
                    timeAgo: '2 ngày trước',
                    status: 'approved'
                }
            ],

            // Active selected partner (Mặc định chọn DN 1 như trong hình)
            selectedPartner: {}
        };
    },
    computed: {
        filteredPartners() {
            let list = this.partners;
            if (this.filterStatus !== 'pending') {
                list = this.partners.filter(p => p.status === this.filterStatus);
            }
            if (this.searchKeyword.trim()) {
                const kw = this.searchKeyword.toLowerCase().trim();
                return list.filter(p => 
                    p.companyName.toLowerCase().includes(kw) || 
                    p.code.toLowerCase().includes(kw) ||
                    p.address.toLowerCase().includes(kw)
                );
            }
            return list;
        }
    },
    created() {
        if (this.partners.length > 0) {
            this.selectedPartner = JSON.parse(JSON.stringify(this.partners[0]));
        }
    },
    methods: {
        selectPartner(partner) {
            this.selectedPartner = JSON.parse(JSON.stringify(partner));
        },
        openModalQuyChuan() {
            this.showModalQuyChuan = true;
        },
        xuatDanhSach() {
            alert('Đang trích xuất danh sách 18 hồ sơ đối tác doanh nghiệp lữ hành định dạng Excel...');
        },
        thamDinhHangLoat() {
            if (confirm('Bạn có muốn tự động thẩm định hàng loạt hồ sơ có Trust Score AI > 90 và khớp 100% dữ liệu OCR?')) {
                alert('Đã hoàn tất thẩm định tự động 12 hồ sơ đạt chuẩn!');
            }
        },
        xemBanScan() {
            alert('Đang mở bản scan độ phân giải cao Giấy phép kinh doanh Lữ hành Quốc tế số 48-024/2022/TCDL-GP LHQT...');
        },
        kiemTraVietcombank() {
            alert('Kết nối API Vietcombank thành công: Tài khoản ký quỹ 500.000.000 VNĐ đang trong trạng thái PHONG TỎA HỢP LỆ.');
        },
        pheDuyetCapQuyen() {
            alert(`Đã PHÊ DUYỆT & CẤP QUYỀN hoạt động thành công cho đối tác "${this.selectedPartner.companyName}". Tài khoản B2B Partner Portal đã được kích hoạt!`);
        },
        yeuCauBoSung() {
            if (!this.moderationNote.trim()) {
                alert('Vui lòng nhập nội dung yêu cầu bổ sung giấy tờ vào ô ghi chú nghiệp vụ!');
                return;
            }
            alert(`Đã gửi yêu cầu bổ sung hồ sơ tới đối tác: "${this.moderationNote}"`);
        },
        tuChoiHoSo() {
            if (!this.moderationNote.trim()) {
                alert('Vui lòng nhập lý do từ chối hồ sơ pháp nhân vào ô ghi chú nghiệp vụ!');
                return;
            }
            if (confirm('Bạn có chắc chắn muốn từ chối hồ sơ đối tác này?')) {
                alert(`Đã từ chối hồ sơ đối tác "${this.selectedPartner.companyName}". Lý do: ${this.moderationNote}`);
            }
        }
    }
};
</script>

<style scoped>
.partner-moderation-page {
    background-color: #F8FAFC;
    min-height: 100vh;
}

.font-28 { font-size: 28px; }
.font-26 { font-size: 26px; }
.font-24 { font-size: 24px; }
.font-20 { font-size: 20px; }
.font-18 { font-size: 18px; }
.font-16 { font-size: 16px; }
.font-15 { font-size: 15px; }
.font-14 { font-size: 14px; }
.font-13 { font-size: 13px; }
.font-12 { font-size: 12px; }
.font-11 { font-size: 11px; }
.font-10 { font-size: 10px; }
.font-9 { font-size: 9px; }
.font-8 { font-size: 8px; }

.font-mono {
    font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, Courier, monospace;
}

.text-pink { color: #E11D48 !important; }
.text-purple { color: #7C3AED !important; }
.text-cyan { color: #0284C7 !important; }

.bg-pink-subtle { background-color: #FFF1F2 !important; }
.border-pink-subtle { border-color: #FECDD3 !important; }

.pulse-dot-pink {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
    box-shadow: 0 0 0 0 rgba(225, 29, 72, 0.7);
    animation: pulsePink 2s infinite;
}

@keyframes pulsePink {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(225, 29, 72, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(225, 29, 72, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(225, 29, 72, 0); }
}

.dot-pink-sm {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
}

.dot-gray-sm {
    background-color: #94A3B8 !important;
}

.btn-pink-gradient {
    background: linear-gradient(135deg, #E11D48 0%, #BE123C 100%);
    border: none;
    transition: all 0.2s ease;
}

.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #BE123C 0%, #9F1239 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.25);
}

.shadow-xs { box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); }
.shadow-2xs { box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04); }

.cursor-pointer { cursor: pointer; }

/* Left Queue Cards */
.active-partner-card {
    background-color: #FFF1F2 !important;
    border-color: #FECDD3 !important;
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.08) !important;
}

.hover-shadow:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
    border-color: #E2E8F0;
}

.p-2-5 { padding: 10px; }
.gap-1-5 { gap: 6px; }
.gap-2-5 { gap: 10px; }
.tracking-wider { letter-spacing: 0.05em; }

/* Modals */
.custom-modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(15, 23, 42, 0.55);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    backdrop-filter: blur(2px);
}

.custom-modal-content {
    animation: modalScaleIn 0.2s ease-out;
}

@keyframes modalScaleIn {
    from { transform: scale(0.95); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.transition-all {
    transition: all 0.2s ease;
}
</style>
