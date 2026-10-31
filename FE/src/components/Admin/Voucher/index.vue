<template>
    <div class="voucher-campaign-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">PLATFORM PROMOTIONS & SUBSIDY CAMPAIGNS</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Quản Lý Chiến Dịch Voucher Sàn Du Lịch Đà Nẵng</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 820px;">
                    Phát hành và điều phối ngân sách mã giảm giá do nền tảng tài trợ nhằm kích cầu du lịch TP Đà Nẵng, thúc đẩy du khách đặt tour và trải nghiệm dịch vụ mùa lễ hội DIFF 2025.
                </p>
            </div>

            <!-- Top Action Buttons -->
            <div class="d-flex flex-column align-items-end gap-2">
                <button class="btn btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="openModalThem">
                    <i class="bx bx-plus font-16"></i>
                    <span>+ Tạo Chiến Dịch Voucher Mới</span>
                </button>
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-1-5 font-11 fw-semibold shadow-2xs d-flex align-items-center gap-1" @click="openModalGiaiNgan">
                        <i class="bx bx-history font-14 text-purple"></i>
                        <span>Lịch Sử Giải Ngân</span>
                    </button>
                    <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-1-5 font-11 fw-semibold shadow-2xs d-flex align-items-center gap-1" @click="xuatBaoCaoRoi">
                        <i class="bx bx-download font-14 text-primary"></i>
                        <span>Xuất Báo Cáo ROI</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Ngân sách tài trợ đã duyệt -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">NGÂN SÁCH TÀI TRỢ ĐÃ DUYỆT</div>
                            <div class="font-22 fw-bold text-dark mt-1">2.500.000.000 đ</div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-coin-stack font-20" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center font-11 mb-1">
                            <span class="text-muted">Đã giải ngân: <b>1.620.000.000 đ</b></span>
                            <span class="fw-bold" style="color: #E11D48;">64.8%</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar" style="width: 64.8%; background-color: #E11D48;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Voucher đang hoạt động -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">VOUCHER ĐANG HOẠT ĐỘNG</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">08</span>
                                <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #F5F3FF; color: #7C3AED;">
                                    Kích cầu DIFF 2025
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 42px; height: 42px;">
                            <i class="bx bx-store-alt font-20" style="color: #7C3AED;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11 d-flex align-items-center gap-1">
                            <i class="bx bx-check-circle text-success font-14"></i> 100% tự động áp mã qua thuật toán SmartTrip AI
                        </small>
                    </div>
                </div>
            </div>

            <!-- KPI 3: Lượt áp dụng thành công -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">LƯỢT ÁP DỤNG THÀNH CÔNG</div>
                            <div class="font-28 fw-bold text-dark mt-1">24.850</div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 42px; height: 42px;">
                            <i class="bx bx-user-check font-20" style="color: #0284C7;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="font-11 fw-semibold" style="color: #0284C7;">
                            ↗ +18.4% so với cùng kỳ tuần trước
                        </small>
                    </div>
                </div>
            </div>

            <!-- KPI 4: GMV Tour nhờ Voucher -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 text-white border shadow-xs h-100 d-flex flex-column justify-content-between" style="background: linear-gradient(135deg, #7C3AED 0%, #6D28D9 100%);">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="font-11 fw-bold text-uppercase tracking-wider text-white-50">GMV TOUR NHỜ VOUCHER</div>
                            <div class="font-22 fw-bold text-white mt-1">14.850.000.000 đ</div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: rgba(255, 255, 255, 0.2); width: 42px; height: 42px;">
                            <i class="bx bx-rocket font-20 text-white"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top border-white border-opacity-25 font-11">
                        <span class="text-white-50">18.450 đơn hoàn tất</span>
                        <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5 bg-white text-purple">
                            ROI x 9.1 LẦN
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="card border-0 rounded-4 shadow-xs bg-white p-3 mb-4">
            <!-- Row 1: Search + Category + Advanced Filter -->
            <div class="row g-2 align-items-center mb-3">
                <div class="col-12 col-md-6">
                    <div class="position-relative">
                        <i class="bx bx-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted font-16"></i>
                        <input 
                            type="text" 
                            v-model="searchKeyword" 
                            class="form-control form-control-sm rounded-pill ps-5 bg-light border-0 font-12"
                            placeholder="Tìm theo mã voucher (VD: DANANG_DIFF25), tên chiến dịch"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <select class="form-select form-select-sm rounded-pill bg-light border-0 font-12" v-model="filterCategory">
                        <option value="">Tất cả danh mục tour áp dụng</option>
                        <option value="diff">Tour Pháo Hoa DIFF</option>
                        <option value="sea">Tour Biển Đảo & SUP</option>
                        <option value="heritage">Tour Di Sản & Văn Hóa</option>
                        <option value="combo">Tour Combo Ghép Nhóm</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <button class="btn btn-sm btn-light w-100 rounded-pill font-12 fw-semibold text-secondary d-flex align-items-center justify-content-center gap-1" @click="resetFilters">
                        <i class="bx bx-slider-alt font-14"></i>
                        <span>Bộ lọc nâng cao</span>
                    </button>
                </div>
            </div>

            <!-- Row 2: Status Pills Filter -->
            <div class="d-flex align-items-center gap-1-5 flex-wrap font-11">
                <button 
                    class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                    :class="activeTab === 'active' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                    @click="activeTab = 'active'"
                >
                    Đang diễn ra (8)
                </button>
                <button 
                    class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                    :class="activeTab === 'upcoming' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                    @click="activeTab = 'upcoming'"
                >
                    Sắp phát hành (3)
                </button>
                <button 
                    class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                    :class="activeTab === 'expired' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                    @click="activeTab = 'expired'"
                >
                    Hết hạn / Hết ngân sách (15)
                </button>
                <button 
                    class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                    :class="activeTab === 'paused' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                    @click="activeTab = 'paused'"
                >
                    Tạm dừng (1)
                </button>
                <span class="badge rounded-pill font-11 fw-bold px-3 py-1 ms-md-auto" style="background-color: #E0F2FE; color: #0284C7;">
                    ⚡ Áp dụng toàn sàn
                </span>
                <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #F5F3FF; color: #7C3AED;">
                    Khách hàng mới
                </span>
            </div>
        </div>

        <!-- Section Title: Chiến Dịch Voucher Toàn Sàn Đang Kích Hoạt -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2">
                <span class="dot-pink"></span>
                <h5 class="fw-bold text-dark mb-0 font-16">Chiến Dịch Voucher Toàn Sàn Đang Kích Hoạt</h5>
                <span class="text-muted font-12 fst-italic d-none d-md-inline">(Tự động cập nhật thời gian thực từ cơ sở dữ liệu `voucher_tour`)</span>
            </div>
            <span class="font-11 text-pink fw-semibold cursor-pointer d-flex align-items-center gap-1" @click="lamMoiDuLieu">
                <i class="bx bx-refresh font-14" :class="{ 'bx-spin': isRefreshing }"></i> Cập nhật: 2 phút trước
            </span>
        </div>

        <!-- 4 Active Voucher Cards (2x2 Grid Khớp 100% Ảnh) -->
        <div class="row g-3 mb-4">
            <!-- Card 1: DANANG_DIFF25 -->
            <div class="col-12 col-lg-6">
                <div class="voucher-campaign-card p-3 p-lg-4 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Top Header -->
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2-5">
                                <div class="voucher-icon-circle rounded-circle d-flex align-items-center justify-content-center text-pink font-16 fw-bold" style="background-color: #FDF2F8; width: 40px; height: 40px;">
                                    %
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-1">
                                        <span class="font-14 fw-bold text-pink font-mono">DANANG_DIFF25</span>
                                        <i class="bx bx-copy text-muted cursor-pointer font-13" title="Sao chép mã" @click="copyCode('DANANG_DIFF25')"></i>
                                    </div>
                                    <h6 class="font-13 fw-bold text-dark mb-0">Đại Tiệc Pháo Hoa Quốc Tế DIFF 2025</h6>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2-5 py-1 d-inline-flex align-items-center gap-1" style="background-color: #DCFCE7; color: #16A34A;">
                                <span class="dot-green"></span> Hoạt động
                            </span>
                        </div>

                        <!-- Discount Details Box -->
                        <div class="p-2-5 rounded-3 bg-light d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <span class="font-10 text-muted d-block text-uppercase">MỨC GIẢM ƯU ĐÃI</span>
                                <span class="font-13 fw-bold text-pink">Giảm 20% (Tối đa 300.000 đ)</span>
                            </div>
                            <div class="text-end">
                                <span class="font-10 text-muted d-block text-uppercase">ĐƠN TỐI THIỂU</span>
                                <span class="font-13 fw-bold text-dark">1.200.000 đ</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="font-11 text-muted mb-3 lh-sm">
                            Áp dụng cho mọi tour du thuyền ngắm pháo hoa Sông Hàn, tour lặn san hô, tour combo ngắm view DIFF và dịch vụ du lịch đối tác Đà Nẵng đã xác minh.
                        </p>

                        <!-- Progress Bar & Quota -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center font-11 mb-1">
                                <span class="text-muted">Ngân sách đã dùng: <b>78.4%</b> (627.2M / 800M đ)</span>
                                <span class="fw-bold text-pink">3.920 / 5.000 mã</span>
                            </div>
                            <div class="progress rounded-pill" style="height: 6px;">
                                <div class="progress-bar" style="width: 78.4%; background-color: #E11D48;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top font-11">
                        <span class="text-muted d-flex align-items-center gap-1">
                            <i class="bx bx-time-five font-13"></i> Hết hạn: 30/06/2025
                        </span>
                        <div class="d-flex align-items-center gap-1-5">
                            <button class="btn btn-sm btn-outline-secondary bg-white rounded-pill px-3 py-1 font-11 fw-semibold shadow-2xs" @click="giaHanNganSach('DANANG_DIFF25')">
                                Gia hạn ngân sách
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle p-1 d-flex align-items-center justify-content-center" style="width: 26px; height: 26px;" @click="editVoucher('DANANG_DIFF25')">
                                <i class="bx bx-edit font-14"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: WELCOME_DANANG -->
            <div class="col-12 col-lg-6">
                <div class="voucher-campaign-card p-3 p-lg-4 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Top Header -->
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2-5">
                                <div class="voucher-icon-circle rounded-circle d-flex align-items-center justify-content-center text-purple font-16 fw-bold" style="background-color: #F5F3FF; width: 40px; height: 40px;">
                                    đ
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-1">
                                        <span class="font-14 fw-bold text-purple font-mono">WELCOME_DANANG</span>
                                        <i class="bx bx-copy text-muted cursor-pointer font-13" title="Sao chép mã" @click="copyCode('WELCOME_DANANG')"></i>
                                    </div>
                                    <h6 class="font-13 fw-bold text-dark mb-0">Chào Bạn Mới – Tải App & Đặt Tour Lần Đầu</h6>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2-5 py-1" style="background-color: #F5F3FF; color: #7C3AED;">
                                Toàn Sàn
                            </span>
                        </div>

                        <!-- Discount Details Box -->
                        <div class="p-2-5 rounded-3 bg-light d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <span class="font-10 text-muted d-block text-uppercase">MỨC GIẢM ƯU ĐÃI</span>
                                <span class="font-13 fw-bold text-purple">Giảm thẳng 50.000 đ</span>
                            </div>
                            <div class="text-end">
                                <span class="font-10 text-muted d-block text-uppercase">TỶ LỆ KÍCH HOẠT TOUR</span>
                                <span class="font-13 fw-bold text-success">42.6% Chuyển đổi</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="font-11 text-muted mb-3 lh-sm">
                            Dành riêng cho khách du lịch lần đầu đăng ký tài khoản người dùng, sử dụng công cụ tạo lịch trình thông minh AI Đà Nẵng.
                        </p>

                        <!-- Progress Bar & Quota -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center font-11 mb-1">
                                <span class="text-muted">Lượt dùng: <b>60.6%</b></span>
                                <span class="fw-bold text-purple">18.200 / 30.000 mã</span>
                            </div>
                            <div class="progress rounded-pill" style="height: 6px;">
                                <div class="progress-bar" style="width: 60.6%; background-color: #7C3AED;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top font-11">
                        <span class="text-muted d-flex align-items-center gap-1">
                            <i class="bx bx-infinite font-14"></i> Hiệu lực: Vô thời hạn (Ngân sách mở)
                        </span>
                        <div class="d-flex align-items-center gap-1-5">
                            <button class="btn btn-sm btn-outline-secondary bg-white rounded-pill px-3 py-1 font-11 fw-semibold shadow-2xs" @click="chiTietTepKhach">
                                Chi tiết tệp khách
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle p-1 d-flex align-items-center justify-content-center" style="width: 26px; height: 26px;" @click="editVoucher('WELCOME_DANANG')">
                                <i class="bx bx-edit font-14"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: COMBO_HE_RUC_RO -->
            <div class="col-12 col-lg-6">
                <div class="voucher-campaign-card p-3 p-lg-4 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Top Header -->
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2-5">
                                <div class="voucher-icon-circle rounded-circle d-flex align-items-center justify-content-center text-cyan font-16 fw-bold" style="background-color: #E0F2FE; width: 40px; height: 40px;">
                                    V
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-1">
                                        <span class="font-14 fw-bold font-mono" style="color: #0284C7;">COMBO_HE_RUC_RO</span>
                                        <i class="bx bx-copy text-muted cursor-pointer font-13" title="Sao chép mã" @click="copyCode('COMBO_HE_RUC_RO')"></i>
                                    </div>
                                    <h6 class="font-13 fw-bold text-dark mb-0">Tour Ghép Gia Đình & Nhóm Bạn Hè 2025</h6>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2-5 py-1" style="background-color: #E0F2FE; color: #0284C7;">
                                Sắp hết mã (89%)
                            </span>
                        </div>

                        <!-- Discount Details Box -->
                        <div class="p-2-5 rounded-3 bg-light d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <span class="font-10 text-muted d-block text-uppercase">MỨC GIẢM ƯU ĐÃI</span>
                                <span class="font-13 fw-bold" style="color: #0284C7;">Giảm ngay 500.000 đ</span>
                            </div>
                            <div class="text-end">
                                <span class="font-10 text-muted d-block text-uppercase">ÁP DỤNG ĐƠN TỪ</span>
                                <span class="font-13 fw-bold text-dark">3 khách người lớn</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="font-11 text-muted mb-3 lh-sm">
                            Áp dụng độc quyền danh mục Tour Bà Nà Hills Cáp Treo và Tour Lặn Ngắm San Hô Cù Lao Chàm. Hỗ trợ kích cầu dịch vụ lưu trú.
                        </p>

                        <!-- Progress Bar & Quota -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center font-11 mb-1">
                                <span class="text-muted">Tiến độ phát hành: <b>890 / 1.000 mã</b></span>
                                <span class="fw-bold text-danger">Còn 110 suất</span>
                            </div>
                            <div class="progress rounded-pill" style="height: 6px;">
                                <div class="progress-bar" style="width: 89%; background-color: #0284C7;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top font-11">
                        <span class="text-muted d-flex align-items-center gap-1">
                            <i class="bx bx-time-five font-13"></i> Hết hạn: 15/08/2025
                        </span>
                        <div class="d-flex align-items-center gap-1-5">
                            <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-3 py-1 font-11 fw-bold shadow-2xs" @click="bomThemMa('COMBO_HE_RUC_RO')">
                                Bơm thêm 500 mã
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle p-1 d-flex align-items-center justify-content-center" style="width: 26px; height: 26px;" @click="editVoucher('COMBO_HE_RUC_RO')">
                                <i class="bx bx-edit font-14"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: SONTRA_SUNSET -->
            <div class="col-12 col-lg-6">
                <div class="voucher-campaign-card p-3 p-lg-4 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Top Header -->
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2-5">
                                <div class="voucher-icon-circle rounded-circle d-flex align-items-center justify-content-center text-pink font-16 fw-bold" style="background-color: #FDF2F8; width: 40px; height: 40px;">
                                    %
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-1">
                                        <span class="font-14 fw-bold text-pink font-mono">SONTRA_SUNSET</span>
                                        <i class="bx bx-copy text-muted cursor-pointer font-13" title="Sao chép mã" @click="copyCode('SONTRA_SUNSET')"></i>
                                    </div>
                                    <h6 class="font-13 fw-bold text-dark mb-0">Hoàng Hôn Bán Đảo Sơn Trà & Chèo SUP</h6>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2-5 py-1 d-inline-flex align-items-center gap-1" style="background-color: #DCFCE7; color: #16A34A;">
                                <span class="dot-green"></span> Đang chạy
                            </span>
                        </div>

                        <!-- Discount Details Box -->
                        <div class="p-2-5 rounded-3 bg-light d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <span class="font-10 text-muted d-block text-uppercase">MỨC GIẢM ƯU ĐÃI</span>
                                <span class="font-13 fw-bold text-pink">Giảm 15% Tour Biển</span>
                            </div>
                            <div class="text-end">
                                <span class="font-10 text-muted d-block text-uppercase">ĐƠN TỐI THIỂU</span>
                                <span class="font-13 fw-bold text-dark">450.000 đ</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="font-11 text-muted mb-3 lh-sm">
                            Hỗ trợ đẩy mạnh các hoạt động du lịch thể thao nước tại bãi Trảm Sa, ngắm Vọoc chà vá chân nâu Sơn Trà và thưởng thức hải sản địa phương.
                        </p>

                        <!-- Progress Bar & Quota -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center font-11 mb-1">
                                <span class="text-muted">Tiến độ tiêu thụ: <b>80.0%</b></span>
                                <span class="fw-bold text-pink">640 / 800 mã</span>
                            </div>
                            <div class="progress rounded-pill" style="height: 6px;">
                                <div class="progress-bar" style="width: 80%; background-color: #E11D48;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top font-11">
                        <span class="text-muted d-flex align-items-center gap-1">
                            <i class="bx bx-time-five font-13"></i> Hết hạn: 31/07/2025
                        </span>
                        <div class="d-flex align-items-center gap-1-5">
                            <button class="btn btn-sm btn-outline-secondary bg-white rounded-pill px-3 py-1 font-11 fw-semibold shadow-2xs" @click="baoCaoDoiTac('SONTRA_SUNSET')">
                                Báo cáo đối tác
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle p-1 d-flex align-items-center justify-content-center" style="width: 26px; height: 26px;" @click="editVoucher('SONTRA_SUNSET')">
                                <i class="bx bx-edit font-14"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Log Table: Nhật Ký Nghiệp Vụ Phát Hành & Điều Phối Voucher -->
        <div class="card border-0 rounded-4 shadow-xs bg-white overflow-hidden mb-3">
            <div class="d-flex justify-content-between align-items-center p-3 px-4 border-bottom flex-wrap gap-2">
                <div>
                    <h6 class="font-14 fw-bold text-dark mb-0">Nhật Ký Nghiệp Vụ Phát Hành & Điều Phối Voucher</h6>
                    <small class="text-muted font-11">Dữ liệu lưu vết từ bảng `vouchers`, `nhat_ky_nghiep_vu` và đối soát tài chính</small>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="font-11 text-muted">Hiển thị 4 / 24 chiến dịch</span>
                    <button class="btn btn-sm btn-light rounded-pill px-3 py-1 font-11 fw-semibold text-secondary" @click="xemToanBoLog">
                        Xem toàn bộ
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 font-12">
                    <thead style="background-color: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
                        <tr class="font-11 text-muted text-uppercase tracking-wider">
                            <th class="ps-4 py-3">MÃ & CHIẾN DỊCH</th>
                            <th class="py-3">LOẠI GIẢM</th>
                            <th class="py-3">NGÂN SÁCH CẤP</th>
                            <th class="py-3">ĐÃ SỬ DỤNG</th>
                            <th class="py-3">THỜI HẠN</th>
                            <th class="py-3">TRẠNG THÁI</th>
                            <th class="py-3 pe-4 text-center">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5 font-mono" style="background-color: #FDF2F8; color: #E11D48;">
                                        DANANG_DIFF25
                                    </span>
                                    <span class="fw-bold text-dark">DIFF 2025 Quốc Tế</span>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="fw-semibold text-pink">20% (Tối đa 300K)</span>
                            </td>
                            <td class="py-3 fw-bold text-dark">800.000.000 đ</td>
                            <td class="py-3">
                                <span class="fw-bold text-pink">3.920 / 5.000 (78.4%)</span>
                            </td>
                            <td class="py-3 text-muted">01/05 - 30/06/2025</td>
                            <td class="py-3">
                                <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #DCFCE7; color: #16A34A;">
                                    Đang diễn ra
                                </span>
                            </td>
                            <td class="py-3 pe-4 text-center">
                                <button class="btn btn-sm btn-light rounded-circle p-1" @click="actionRow('DANANG_DIFF25')">
                                    <i class="bx bx-dots-vertical-rounded font-14"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5 font-mono" style="background-color: #F5F3FF; color: #7C3AED;">
                                        WELCOME_DANANG
                                    </span>
                                    <span class="fw-bold text-dark">Khách Lần Đầu Tải App</span>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="fw-semibold text-purple">Cố định 50.000 đ</span>
                            </td>
                            <td class="py-3 fw-bold text-dark">1.500.000.000 đ</td>
                            <td class="py-3">
                                <span class="fw-bold text-purple">18.200 / 30.000 (60.6%)</span>
                            </td>
                            <td class="py-3 text-muted">Không giới hạn</td>
                            <td class="py-3">
                                <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #DCFCE7; color: #16A34A;">
                                    Đang diễn ra
                                </span>
                            </td>
                            <td class="py-3 pe-4 text-center">
                                <button class="btn btn-sm btn-light rounded-circle p-1" @click="actionRow('WELCOME_DANANG')">
                                    <i class="bx bx-dots-vertical-rounded font-14"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5 font-mono" style="background-color: #E0F2FE; color: #0284C7;">
                                        COMBO_HE_RUC_RO
                                    </span>
                                    <span class="fw-bold text-dark">Combo Gia Đình Nhóm</span>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="fw-semibold text-cyan" style="color: #0284C7;">Cố định 500.000 đ</span>
                            </td>
                            <td class="py-3 fw-bold text-dark">500.000.000 đ</td>
                            <td class="py-3">
                                <span class="fw-bold text-cyan" style="color: #0284C7;">890 / 1.000 (89.0%)</span>
                            </td>
                            <td class="py-3 text-muted">15/06 - 15/08/2025</td>
                            <td class="py-3">
                                <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #FEF3C7; color: #D97706;">
                                    Sắp hết ngân sách
                                </span>
                            </td>
                            <td class="py-3 pe-4 text-center">
                                <button class="btn btn-sm btn-light rounded-circle p-1" @click="actionRow('COMBO_HE_RUC_RO')">
                                    <i class="bx bx-dots-vertical-rounded font-14"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5 font-mono" style="background-color: #FDF2F8; color: #E11D48;">
                                        SONTRA_SUNSET
                                    </span>
                                    <span class="fw-bold text-dark">Khám Phá Sơn Trà SUP</span>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="fw-semibold text-pink">15% (Tối đa 150K)</span>
                            </td>
                            <td class="py-3 fw-bold text-dark">120.000.000 đ</td>
                            <td class="py-3">
                                <span class="fw-bold text-pink">640 / 800 (80.0%)</span>
                            </td>
                            <td class="py-3 text-muted">01/06 - 31/07/2025</td>
                            <td class="py-3">
                                <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #DCFCE7; color: #16A34A;">
                                    Đang diễn ra
                                </span>
                            </td>
                            <td class="py-3 pe-4 text-center">
                                <button class="btn btn-sm btn-light rounded-circle p-1" @click="actionRow('SONTRA_SUNSET')">
                                    <i class="bx bx-dots-vertical-rounded font-14"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL: TẠO CHIẾN DỊCH VOUCHER MỚI -->
        <div v-if="showModalThem" class="custom-modal-backdrop">
            <div class="custom-modal-content rounded-4 p-4 bg-white shadow-lg" style="max-width: 600px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0 font-16 d-flex align-items-center gap-2">
                        <i class="bx bx-gift text-pink"></i> Tạo Chiến Dịch Voucher Kích Cầu Mới
                    </h5>
                    <button class="btn btn-sm btn-light rounded-circle p-1" @click="showModalThem = false">
                        <i class="bx bx-x font-18"></i>
                    </button>
                </div>
                <div class="row g-2 mb-3 font-12">
                    <div class="col-6">
                        <label class="form-label font-11 fw-bold text-uppercase">Mã Voucher (Code) *</label>
                        <input type="text" v-model="newVoucher.code" class="form-control font-12 rounded-3 font-mono text-uppercase" placeholder="VD: SUMMER_DANANG_25" />
                    </div>
                    <div class="col-6">
                        <label class="form-label font-11 fw-bold text-uppercase">Tên Chiến Dịch *</label>
                        <input type="text" v-model="newVoucher.name" class="form-control font-12 rounded-3" placeholder="Nhập tên chiến dịch..." />
                    </div>
                </div>
                <div class="row g-2 mb-3 font-12">
                    <div class="col-4">
                        <label class="form-label font-11 fw-bold text-uppercase">Loại Giảm Giá</label>
                        <select v-model="newVoucher.type" class="form-select font-12 rounded-3">
                            <option value="percent">Phần trăm (%)</option>
                            <option value="fixed">Số tiền cố định (VNĐ)</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="form-label font-11 fw-bold text-uppercase">Mức Giảm</label>
                        <input type="number" v-model.number="newVoucher.discountValue" class="form-control font-12 rounded-3" placeholder="20 hoặc 50000" />
                    </div>
                    <div class="col-4">
                        <label class="form-label font-11 fw-bold text-uppercase">Giảm Tối Đa (VNĐ)</label>
                        <input type="number" v-model.number="newVoucher.maxDiscount" class="form-control font-12 rounded-3" placeholder="300000" />
                    </div>
                </div>
                <div class="row g-2 mb-3 font-12">
                    <div class="col-6">
                        <label class="form-label font-11 fw-bold text-uppercase">Tổng Ngân Sách (VNĐ)</label>
                        <input type="number" v-model.number="newVoucher.budget" class="form-control font-12 rounded-3" placeholder="500000000" />
                    </div>
                    <div class="col-6">
                        <label class="form-label font-11 fw-bold text-uppercase">Số Lượng Quota Phát Hành</label>
                        <input type="number" v-model.number="newVoucher.quota" class="form-control font-12 rounded-3" placeholder="2000" />
                    </div>
                </div>
                <div class="mb-3 font-12">
                    <label class="form-label font-11 fw-bold text-uppercase">Mô Tả Điều Kiện Áp Dụng</label>
                    <textarea v-model="newVoucher.description" class="form-control font-12 rounded-3" rows="2" placeholder="Áp dụng cho mọi tour du lịch đối tác..."></textarea>
                </div>
                <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                    <button class="btn btn-sm btn-light rounded-pill px-3" @click="showModalThem = false">Hủy</button>
                    <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4 fw-bold" @click="submitThemVoucher">
                        Phát Hành Voucher
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'VoucherCampaignAdminComponent',
    data() {
        return {
            searchKeyword: '',
            filterCategory: '',
            activeTab: 'active',
            isRefreshing: false,
            showModalThem: false,

            newVoucher: {
                code: '',
                name: '',
                type: 'percent',
                discountValue: 20,
                maxDiscount: 300000,
                budget: 500000000,
                quota: 2000,
                description: ''
            }
        };
    },
    methods: {
        copyCode(code) {
            navigator.clipboard.writeText(code).then(() => {
                alert(`Đã sao chép mã voucher "${code}" vào clipboard!`);
            }).catch(() => {
                alert(`Mã voucher: ${code}`);
            });
        },
        openModalThem() {
            this.newVoucher = {
                code: `DN_PROMO_${Date.now().toString().slice(-4)}`,
                name: '',
                type: 'percent',
                discountValue: 20,
                maxDiscount: 300000,
                budget: 500000000,
                quota: 2000,
                description: ''
            };
            this.showModalThem = true;
        },
        submitThemVoucher() {
            if (!this.newVoucher.code.trim() || !this.newVoucher.name.trim()) {
                alert('Vui lòng nhập đầy đủ Mã và Tên chiến dịch!');
                return;
            }
            this.showModalThem = false;
            alert(`Tạo chiến dịch voucher "${this.newVoucher.name}" thành công! Hệ thống đã phân bổ ngân sách ${Number(this.newVoucher.budget).toLocaleString('vi-VN')} đ.`);
        },
        openModalGiaiNgan() {
            alert('Đang mở báo cáo đối soát & lịch sử giải ngân ngân sách kích cầu du lịch DIFF 2025.');
        },
        xuatBaoCaoRoi() {
            alert('Đang trích xuất báo cáo ROI chiến dịch voucher định dạng PDF & Excel (Tỷ lệ đòn bẩy GMV đạt x9.1 lần)...');
        },
        resetFilters() {
            this.searchKeyword = '';
            this.filterCategory = '';
            this.activeTab = 'active';
            alert('Đã đặt lại bộ lọc nâng cao.');
        },
        lamMoiDuLieu() {
            this.isRefreshing = true;
            setTimeout(() => {
                this.isRefreshing = false;
                alert('Dữ liệu các chiến dịch voucher toàn sàn đã được đồng bộ mới nhất!');
            }, 800);
        },
        giaHanNganSach(code) {
            alert(`Mở cổng nạp thêm 200.000.000 VNĐ ngân sách vào chiến dịch ${code}.`);
        },
        chiTietTepKhach() {
            alert('Đang mở tệp dữ liệu 18.200 khách hàng du lịch đăng ký tải app lần đầu.');
        },
        bomThemMa(code) {
            alert(`Đã cấp bổ sung thành công 500 mã ưu đãi vào chiến dịch ${code}!`);
        },
        baoCaoDoiTac(code) {
            alert(`Đang trích xuất báo cáo doanh số cho các đối tác tham gia chiến dịch ${code}.`);
        },
        editVoucher(code) {
            alert(`Mở trình cấu hình chiến dịch voucher ${code}.`);
        },
        xemToanBoLog() {
            alert('Đang hiển thị toàn bộ 24 nhật ký nghiệp vụ phát hành voucher toàn sàn.');
        },
        actionRow(code) {
            alert(`Hành động quản trị cho chiến dịch ${code}: [Xem chi tiết], [Tạm dừng], [Đối soát GMV]`);
        }
    }
};
</script>

<style scoped>
.voucher-campaign-page {
    background-color: #F8FAFC;
    min-height: 100vh;
}

.font-28 { font-size: 28px; }
.font-24 { font-size: 24px; }
.font-22 { font-size: 22px; }
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

.dot-pink {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
}

.dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #16A34A;
    display: inline-block;
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

.voucher-campaign-card {
    transition: all 0.2s ease;
}

.voucher-campaign-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.07) !important;
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
