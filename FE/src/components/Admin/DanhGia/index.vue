<template>
    <div class="reviews-moderation-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">UGC & REVIEWS QUALITY CONTROL</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Kiểm Duyệt Đánh Giá & Nhận Xét Của Du Khách</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 820px;">
                    Giám sát, phân tích độ tin cậy và kiểm duyệt nội dung đánh giá sao, bình luận trải nghiệm và hình ảnh thực tế từ du khách đối với địa điểm và tour du lịch tại Đà Nẵng.
                </p>
            </div>

            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="openModalBlacklist">
                    <i class="bx bx-shield-quarter font-16" style="color: #64748B;"></i>
                    <span>Cấu Hình Từ Khóa Cấm & Spam</span>
                </button>
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="xuatBaoCao">
                    <i class="bx bx-download font-16" style="color: #64748B;"></i>
                    <span>Xuất Báo Cáo</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="duyetNhanhHopLe">
                    <i class="bx bx-check-double font-16"></i>
                    <span>Duyệt Nhanh Hợp Lệ</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: REVIEW MỚI CHỜ DUYỆT -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-message-alt-error font-20" style="color: #E11D48;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                            +12 nghi vấn
                        </span>
                    </div>
                    <div>
                        <div class="font-28 fw-bold text-dark mt-1">28</div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">REVIEW MỚI CHỜ DUYỆT</div>
                    </div>
                    <div class="d-flex align-items-center gap-1 pt-2 border-top font-11" style="color: #E11D48;">
                        <i class="bx bx-error-circle font-14"></i>
                        <span>11 bài chứa từ nhạy cảm / spam</span>
                    </div>
                </div>
            </div>

            <!-- KPI 2: ĐIỂM TRUNG BÌNH HỆ THỐNG -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 42px; height: 42px;">
                            <i class="bx bx-star font-20" style="color: #7C3AED;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #F5F3FF; color: #7C3AED;">
                            184.200 đánh giá
                        </span>
                    </div>
                    <div>
                        <div class="d-flex align-items-baseline gap-1 mt-1">
                            <span class="font-28 fw-bold text-dark">4.86</span>
                            <span class="text-muted font-13 fw-normal">/ 5.0</span>
                        </div>
                        <div class="d-flex align-items-center gap-1 text-warning font-12 mb-1">
                            <i class="bx bxs-star" v-for="s in 5" :key="s"></i>
                        </div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐIỂM TRUNG BÌNH HỆ THỐNG</div>
                    </div>
                    <div class="d-flex align-items-center gap-1 pt-2 border-top font-11 text-success">
                        <i class="bx bx-trending-up font-14"></i>
                        <span>+0.12 so với tháng trước</span>
                    </div>
                </div>
            </div>

            <!-- KPI 3: ĐÁNH GIÁ ĐÃ XÁC MINH -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 42px; height: 42px;">
                            <i class="bx bx-badge-check font-20" style="color: #0284C7;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                            GPS + Vé thực
                        </span>
                    </div>
                    <div>
                        <div class="font-28 fw-bold text-dark mt-1">98.4%</div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐÁNH GIÁ ĐÃ XÁC MINH</div>
                    </div>
                    <div class="d-flex align-items-center gap-1 pt-2 border-top font-11 text-muted">
                        <i class="bx bx-check-circle text-primary font-14"></i>
                        <span>Check-in GPS hoặc mã đặt chỗ hợp lệ</span>
                    </div>
                </div>
            </div>

            <!-- KPI 4: TÀI KHOẢN SEEDING BỊ CHẶN -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FFE4E6; width: 42px; height: 42px;">
                            <i class="bx bx-bot font-20" style="color: #E11D48;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FFF1F2; color: #E11D48;">
                            AI Guardian Chặn
                        </span>
                    </div>
                    <div>
                        <div class="font-28 fw-bold text-dark mt-1">14</div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TÀI KHOẢN SEEDING BỊ CHẶN</div>
                    </div>
                    <div class="d-flex align-items-center gap-1 pt-2 border-top font-11 text-muted">
                        <i class="bx bx-shield-quarter text-danger font-14"></i>
                        <span>Tự động ngăn chặn spam trong 24h</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="card border-0 shadow-xs rounded-4 p-3 bg-white mb-4">
            <div class="row g-2 align-items-center">
                <!-- Search Input -->
                <div class="col-12 col-lg-5">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-0 rounded-start-pill text-muted ps-3">
                            <i class="bx bx-search font-16"></i>
                        </span>
                        <input type="text" class="form-control bg-light border-0 rounded-end-pill font-12 py-2"
                            placeholder="Tìm theo nội dung đánh giá, tên du khách..." v-model="filterSearch" />
                    </div>
                </div>

                <!-- Scope Filter Buttons (Tất cả mục / Tour tuyến / Địa điểm POI) -->
                <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-center gap-1">
                    <button class="btn btn-sm rounded-pill font-11 fw-bold px-3 py-1-5 transition-all"
                        :class="filterScope === 'all' ? 'btn-pink-gradient text-white' : 'btn-light text-muted'"
                        @click="filterScope = 'all'">
                        Tất cả mục
                    </button>
                    <button class="btn btn-sm rounded-pill font-11 fw-semibold px-3 py-1-5 transition-all"
                        :class="filterScope === 'tour' ? 'btn-pink-gradient text-white' : 'btn-light text-muted'"
                        @click="filterScope = 'tour'">
                        Tour tuyến
                    </button>
                    <button class="btn btn-sm rounded-pill font-11 fw-semibold px-3 py-1-5 transition-all"
                        :class="filterScope === 'poi' ? 'btn-pink-gradient text-white' : 'btn-light text-muted'"
                        @click="filterScope = 'poi'">
                        Địa điểm (POI)
                    </button>
                </div>

                <!-- Star Rating Dropdown -->
                <div class="col-8 col-sm-4 col-lg-2">
                    <div class="d-flex align-items-center gap-1">
                        <i class="bx bx-star text-warning font-16"></i>
                        <select class="form-select form-select-sm rounded-pill font-12 border-secondary-subtle" v-model="filterRating">
                            <option value="">Sao: Tất cả mức sao</option>
                            <option value="5">5 Sao (Tuyệt vời)</option>
                            <option value="4">4 Sao (Tốt)</option>
                            <option value="3">3 Sao (Trung bình)</option>
                            <option value="1-2">1 - 2 Sao (Kém / Vi phạm)</option>
                        </select>
                    </div>
                </div>

                <!-- Reset Filter Button -->
                <div class="col-4 col-sm-2 col-lg-1 text-end">
                    <button class="btn btn-light btn-sm rounded-circle p-0 d-inline-flex align-items-center justify-content-center border"
                        style="width: 32px; height: 32px;" @click="resetFilter" title="Đặt lại bộ lọc">
                        <i class="bx bx-revision font-16 text-muted"></i>
                    </button>
                </div>
            </div>

            <!-- Tab Pills Group -->
            <div class="d-flex align-items-center gap-2 flex-wrap pt-3 mt-3 border-top">
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-11 fw-bold transition-all"
                    :style="currentTab === 'all' ? 'background: #E11D48; color: #FFFFFF;' : 'background: #F8FAFC; color: #64748B; border: 1px solid #E2E8F0;'"
                    @click="currentTab = 'all'">
                    Tất cả review <span class="badge bg-white text-pink rounded-pill ms-1 font-10">28</span>
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-11 fw-bold transition-all"
                    :style="currentTab === 'violations' ? 'background: #E11D48; color: #FFFFFF;' : 'background: #FFF1F2; color: #E11D48; border: 1px solid #FECDD3;'"
                    @click="currentTab = 'violations'">
                    <i class="bx bx-error font-12 me-1"></i> Nghi vấn vi phạm <span class="badge rounded-pill ms-1 font-10" :style="currentTab === 'violations' ? 'background: #FFFFFF; color: #E11D48;' : 'background: #E11D48; color: #FFFFFF;'">11</span>
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-11 fw-semibold transition-all"
                    :style="currentTab === 'pending' ? 'background: #E11D48; color: #FFFFFF;' : 'background: #F8FAFC; color: #64748B; border: 1px solid #E2E8F0;'"
                    @click="currentTab = 'pending'">
                    Chờ duyệt (Khách hàng) <span class="badge bg-secondary-subtle text-secondary rounded-pill ms-1 font-10">17</span>
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-11 fw-semibold transition-all"
                    :style="currentTab === 'approved' ? 'background: #E11D48; color: #FFFFFF;' : 'background: #F8FAFC; color: #64748B; border: 1px solid #E2E8F0;'"
                    @click="currentTab = 'approved'">
                    Đã phê duyệt <span class="badge bg-secondary-subtle text-secondary rounded-pill ms-1 font-10">2.450</span>
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-11 fw-semibold transition-all"
                    :style="currentTab === 'rejected' ? 'background: #E11D48; color: #FFFFFF;' : 'background: #F8FAFC; color: #64748B; border: 1px solid #E2E8F0;'"
                    @click="currentTab = 'rejected'">
                    Đã ẩn / Từ chối <span class="badge bg-secondary-subtle text-secondary rounded-pill ms-1 font-10">142</span>
                </button>
            </div>
        </div>

        <!-- Main Content Area: 2 Columns (Left: Hàng Đợi Kiểm Duyệt, Right: NLP & Keywords) -->
        <div class="row g-4 mb-4">
            <!-- Left Column: Hàng Đợi Kiểm Duyệt Trọng Yếu (col-lg-8) -->
            <div class="col-12 col-xl-8">
                <!-- Section Header -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bx bx-list-ul font-20" style="color: #E11D48;"></i>
                        <h5 class="fw-bold text-dark mb-0 font-16">Hàng Đợi Kiểm Duyệt Trọng Yếu</h5>
                    </div>
                    <div class="font-11 text-muted">
                        Sắp xếp theo: <span class="text-pink fw-bold cursor-pointer">Mức độ rủi ro AI cao nhất ▾</span>
                    </div>
                </div>

                <!-- Review Items List -->
                <div class="d-flex flex-column gap-3">
                    
                    <!-- ================= ITEM 1: HIGH RISK / VI PHẠM TIÊU CHUẨN ================= -->
                    <div v-if="showItem(1)" class="card border-0 rounded-4 p-3-5 bg-white shadow-xs position-relative overflow-hidden"
                        style="border: 1px solid #FECDD3 !important;">
                        <!-- Top Accent Line -->
                        <div class="position-absolute top-0 start-0 end-0" style="height: 3px; background: #E11D48;"></div>

                        <!-- User Info Header -->
                        <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold font-13 text-secondary"
                                    style="background-color: #E2E8F0; width: 38px; height: 38px;">
                                    VN
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-bold text-dark font-13">Vũ Hoàng Nam</span>
                                        <span class="badge rounded-pill font-10 px-2 py-0-5" style="background-color: #EDE9FE; color: #6D28D9;">
                                            #KH_DN_2921
                                        </span>
                                        <span class="badge rounded-pill font-10 px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                                            ✔ Đã hoàn thành tour
                                        </span>
                                    </div>
                                    <div class="font-11 text-muted">Đánh giá lúc 14:25 - 12 phút trước</div>
                                </div>
                            </div>

                            <div class="text-end">
                                <div class="d-flex align-items-center justify-content-end gap-1">
                                    <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FFF1F2; color: #E11D48; border: 1px solid #FECDD3;">
                                        1.0 ★
                                    </span>
                                </div>
                                <div class="font-10 fw-bold mt-1 text-uppercase" style="color: #E11D48;">VI PHẠM TIÊU CHUẨN</div>
                            </div>
                        </div>

                        <!-- Tour / Service Name -->
                        <div class="font-11 text-muted mb-2">
                            <i class="bx bx-map-pin text-pink me-1"></i>
                            <span class="fw-semibold text-dark">Tour Khởi Hành Lặn Ngắm San Hô Cù Lao Chàm</span> • Đối tác: Danang Explorer Corp
                        </div>

                        <!-- AI Guardian Auto Flag Warning Box -->
                        <div class="p-2-5 px-3 rounded-3 mb-2 d-flex align-items-start gap-2"
                            style="background-color: #FFF1F2; border: 1px solid #FECDD3;">
                            <i class="bx bx-error font-18 text-pink mt-0-5"></i>
                            <div class="font-11 text-dark">
                                <span class="fw-bold" style="color: #E11D48;">AI GUARDIAN TỰ ĐỘNG GẮN CỜ:</span>
                                Chứa từ ngữ xúc phạm/xúc phạm đối tác ("lừa đảo***", "làm ăn như ***"). Đề xuất: Cần xử lý cùng khách hàng & đối tác.
                            </div>
                        </div>

                        <!-- Review Text Content -->
                        <p class="font-12 text-dark mb-3 fst-italic lh-base">
                            "Quá tệ hại thất vọng, hướng dẫn viên bỏ rơi khách hàng giữa trưa, cano hỏng giữa biển giữa trời nắng gắt 38 độ C. Đến bãi lặn thì không thấy san hô như quảng cáo. 
                            <span class="badge font-11 px-1 py-0-5" style="background-color: #FFE4E6; color: #BE123C; font-style: normal;">Lừa đảo ***</span> 
                            khách hàng, làm ăn 
                            <span class="badge font-11 px-1 py-0-5" style="background-color: #FFE4E6; color: #BE123C; font-style: normal;">như ***</span>! 
                            Yêu cầu hoàn tiền ngay lập tức!"
                        </p>

                        <!-- Attached Photos -->
                        <div class="mb-3">
                            <div class="font-10 fw-bold text-muted text-uppercase mb-2">HÌNH ẢNH ĐÍNH KÈM TỪ DU KHÁCH (3 ẢNH):</div>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="position-relative rounded-3 overflow-hidden photo-thumb-box">
                                    <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=300&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Cano trễ giờ" />
                                    <span class="photo-overlay-tag">Cano trễ giờ</span>
                                </div>
                                <div class="position-relative rounded-3 overflow-hidden photo-thumb-box">
                                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Cano hỏng" />
                                    <span class="photo-overlay-tag">Cano hỏng</span>
                                </div>
                                <div class="position-relative rounded-3 overflow-hidden photo-thumb-box">
                                    <img src="https://images.unsplash.com/photo-1519046904884-53103b34b206?w=300&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Khách chờ đợi" />
                                    <span class="photo-overlay-tag">Khách chờ đợi</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action Buttons -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 border-top">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <button class="btn btn-sm text-white rounded-pill px-3 py-1-5 font-11 fw-bold shadow-xs d-flex align-items-center gap-1"
                                    style="background-color: #E11D48;" @click="anVaYeuCauXacMinh(1)">
                                    <i class="bx bx-hide font-14"></i>
                                    <span>Ẩn & Yêu cầu xác minh phòng</span>
                                </button>
                                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-11 fw-semibold d-flex align-items-center gap-1"
                                    style="background-color: #EDE9FE; color: #6D28D9;" @click="chuyenTranhChap(1)">
                                    <i class="bx bx-transfer font-14"></i>
                                    <span>Chuyển Tranh Chấp F1</span>
                                </button>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <button class="btn btn-outline-secondary btn-sm bg-white rounded-pill px-2-5 py-1 font-11 fw-semibold" @click="hoTroKhachHang('Vũ Hoàng Nam')">
                                    <i class="bx bx-headphone me-1"></i> Hỗ trợ khách
                                </button>
                                <button class="btn btn-outline-secondary btn-sm bg-white rounded-pill px-2-5 py-1 font-11 fw-semibold" @click="canhBaoDoiTac('Danang Explorer Corp')">
                                    <i class="bx bx-bell me-1"></i> Cảnh báo đối tác
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ================= ITEM 2: VERIFIED HIGH QUALITY REVIEW ================= -->
                    <div v-if="showItem(2)" class="card border-0 rounded-4 p-3-5 bg-white shadow-xs position-relative overflow-hidden"
                        style="border: 1px solid #E2E8F0 !important;">
                        <!-- Top Accent Line -->
                        <div class="position-absolute top-0 start-0 end-0" style="height: 3px; background: #0284C7;"></div>

                        <!-- User Info Header -->
                        <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop"
                                    class="rounded-circle object-fit-cover shadow-xs" style="width: 38px; height: 38px;" alt="Trần Minh Anh" />
                                <div>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-bold text-dark font-13">Trần Minh Anh</span>
                                        <span class="badge rounded-pill font-10 px-2 py-0-5" style="background-color: #FEF3C7; color: #D97706;">
                                            VIP Gold Member
                                        </span>
                                        <span class="badge rounded-pill font-10 px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                                            ✔ GPS Thực 100%
                                        </span>
                                    </div>
                                    <div class="font-11 text-muted">Đánh giá lúc 10:12 - 4 giờ trước</div>
                                </div>
                            </div>

                            <div class="text-end">
                                <div class="d-flex align-items-center justify-content-end gap-1">
                                    <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                                        5.0 ★
                                    </span>
                                </div>
                                <div class="font-10 fw-bold mt-1 text-uppercase" style="color: #0284C7;">CHẤT LƯỢNG CAO (+98đ)</div>
                            </div>
                        </div>

                        <!-- Tour / Service Name -->
                        <div class="font-11 text-muted mb-2">
                            <i class="bx bx-map-pin text-primary me-1"></i>
                            <span class="fw-semibold text-dark">Bán đảo Sơn Trà & Chùa Linh Ứng</span> • Địa điểm POI Đà Nẵng
                        </div>

                        <!-- AI Guardian Verification Box -->
                        <div class="p-2-5 px-3 rounded-3 mb-2 d-flex align-items-start gap-2"
                            style="background-color: #F0F9FF; border: 1px solid #BAE6FD;">
                            <i class="bx bx-badge-check font-18 text-primary mt-0-5"></i>
                            <div class="font-11 text-dark">
                                <span class="fw-bold text-primary">AI GUARDIAN KIỂM ĐỊNH:</span>
                                Tọa độ ảnh WGS84 khớp 100% tại Sơn Trà. Không phát hiện trùng lặp hình ảnh trên mạng. Đạt tiêu chuẩn bài review tiêu biểu.
                            </div>
                        </div>

                        <!-- Review Text Content -->
                        <p class="font-12 text-dark mb-3 lh-base">
                            "Không gian thanh tịnh và gió biển mát lành tuyệt vời! Tượng Phật Bà sừng sững hướng ra biển Đông rất uy nghiêm. Mình đi xe máy từ sáng sớm lúc 6h30 nên không khí trong lành, gặp cả voọc chà vá chân nâu chuyền cành rất dễ thương. Cực kỳ khuyên mọi người đi theo gợi ý lịch trình buổi sáng của SmartTrip AI!"
                        </p>

                        <!-- Attached Photos (4 Photos) -->
                        <div class="mb-3">
                            <div class="font-10 fw-bold text-muted text-uppercase mb-2">HÌNH ẢNH CHECK-IN THỰC TẾ GÓC NHÌN ĐẸP (4 ẢNH):</div>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="position-relative rounded-3 overflow-hidden photo-thumb-box">
                                    <img src="https://images.unsplash.com/photo-1599818818585-649df16a704a?w=300&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Chùa Linh Ứng" />
                                    <span class="photo-overlay-tag">Chùa Linh Ứng</span>
                                </div>
                                <div class="position-relative rounded-3 overflow-hidden photo-thumb-box">
                                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=300&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Cây Đa Ngàn Năm" />
                                    <span class="photo-overlay-tag">Cây Đa Ngàn Năm</span>
                                </div>
                                <div class="position-relative rounded-3 overflow-hidden photo-thumb-box">
                                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=300&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Voọc Sơn Trà" />
                                    <span class="photo-overlay-tag">Voọc Sơn Trà</span>
                                </div>
                                <div class="position-relative rounded-3 overflow-hidden photo-thumb-box">
                                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300&auto=format&fit=crop" class="w-100 h-100 object-fit-cover" alt="Toàn cảnh biển" />
                                    <span class="photo-overlay-tag">Toàn cảnh biển</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action Buttons -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 border-top">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <button class="btn btn-pink-gradient text-white btn-sm rounded-pill px-3 py-1-5 font-11 fw-bold shadow-xs d-flex align-items-center gap-1"
                                    @click="duyetVaDuaLenTop(2)">
                                    <i class="bx bx-check font-14"></i>
                                    <span>✔ Duyệt & Đưa Lên Top Trang Chủ</span>
                                </button>
                                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-11 fw-semibold d-flex align-items-center gap-1"
                                    style="background-color: #EDE9FE; color: #6D28D9;" @click="ganNhanTieuBieu(2)">
                                    <i class="bx bx-star font-14"></i>
                                    <span>Gắn Nhãn Đánh Giá Tiêu Biểu</span>
                                </button>
                            </div>
                            <div class="font-11 text-muted">
                                Độ tin cậy: <span class="fw-bold text-success font-12">99.2%</span>
                            </div>
                        </div>
                    </div>

                    <!-- ================= ITEM 3: SEEDING BOT SPAM ================= -->
                    <div v-if="showItem(3)" class="card border-0 rounded-4 p-3-5 bg-white shadow-xs position-relative overflow-hidden"
                        style="border: 1px dashed #FECDD3 !important; background-color: #FFFDFD !important;">
                        <!-- Top Accent Line -->
                        <div class="position-absolute top-0 start-0 end-0" style="height: 3px; background: #DC2626;"></div>

                        <!-- User Info Header -->
                        <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-danger font-18"
                                    style="background-color: #FEE2E2; width: 38px; height: 38px;">
                                    <i class="bx bx-user-x"></i>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-bold text-dark font-13">User_901048 (Tài khoản nghi vấn)</span>
                                        <span class="badge rounded-pill font-10 px-2 py-0-5" style="background-color: #FEE2E2; color: #DC2626;">
                                            Seeding Bot?
                                        </span>
                                    </div>
                                    <div class="font-11 text-muted">Tạo 10 phút trước • IP: 118.69.182.xx (Proxy/VPN phòng chia sẻ)</div>
                                </div>
                            </div>

                            <div class="text-end">
                                <div class="d-flex align-items-center justify-content-end gap-1">
                                    <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FEF3C7; color: #D97706;">
                                        5.0 ★
                                    </span>
                                </div>
                                <div class="font-10 fw-bold mt-1 text-uppercase text-danger">GIAN LẬN ĐIỂM ẢO</div>
                            </div>
                        </div>

                        <!-- Service Line -->
                        <div class="font-11 text-muted mb-2">
                            <i class="bx bx-car text-danger me-1"></i>
                            <span class="fw-semibold text-danger">5 đánh giá liên tiếp cho Nhà xe Danang Luxury Limousine</span>
                        </div>

                        <!-- Pattern Anomaly Warning Box -->
                        <div class="p-2-5 px-3 rounded-3 mb-2 d-flex align-items-start gap-2"
                            style="background-color: #FFF1F2; border: 1px dashed #FECDD3;">
                            <i class="bx bx-bot font-18 text-danger mt-0-5"></i>
                            <div class="font-11 text-dark">
                                <span class="fw-bold text-danger">THUẬT TOÁN PATTERN ANOMALY PHÁT HIỆN:</span>
                                05 đánh giá 5 sao giống nhau 92% từ các nick tạo được tạo trong vòng 30 giây từ cùng một địa chỉ IP. Tạo số nhằm bơm link cho dịch vụ.
                            </div>
                        </div>

                        <!-- Review Text Content -->
                        <p class="font-12 text-dark mb-3 fst-italic lh-base">
                            "Xe Limousine số 1 Đà Nẵng, phục vụ tuyệt vời không đâu bằng, tài xế lái xe an toàn nhất hệ mặt trời, giá rẻ nhất miền Trung mọi người nên đặt ngay!!!"
                        </p>

                        <!-- Card Action Buttons -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 border-top">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <button class="btn btn-sm btn-danger rounded-pill px-3 py-1-5 font-11 fw-bold shadow-xs d-flex align-items-center gap-1"
                                    @click="khoaTaiKhoanAo(3)">
                                    <i class="bx bx-lock-alt font-14"></i>
                                    <span>Khóa Tài Khoản Ảo</span>
                                </button>
                                <button class="btn btn-outline-danger btn-sm bg-white rounded-pill px-3 py-1-5 font-11 fw-semibold d-flex align-items-center gap-1"
                                    @click="huyToanBoReview(3)">
                                    <i class="bx bx-trash font-14"></i>
                                    <span>Hủy Toàn Bộ 5 Review</span>
                                </button>
                                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-11 fw-semibold d-flex align-items-center gap-1"
                                    style="background-color: #EDE9FE; color: #6D28D9;" @click="truDiemUyTin(3)">
                                    <i class="bx bx-down-arrow-alt font-14"></i>
                                    <span>Trừ 5 Điểm Uy Tín Đối Tác</span>
                                </button>
                            </div>
                            <div class="font-10 text-muted">
                                Mã vi phạm: #SPAM-ST-0921
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Column: NLP Sentiment, Keywords & AI Guardian Widget (col-lg-4) -->
            <div class="col-12 col-xl-4 d-flex flex-column gap-4">
                
                <!-- Widget 1: Phân Tích Cảm Xúc Du Khách (AI NLP) -->
                <div class="card border-0 rounded-4 p-4 bg-white shadow-xs">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-heart font-18" style="color: #E11D48;"></i>
                            <h6 class="fw-bold text-dark mb-0 font-14">Phân Tích Cảm Xúc Du Khách</h6>
                        </div>
                        <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                            AI NLP
                        </span>
                    </div>

                    <!-- 3 Progress Bars -->
                    <div class="mb-3">
                        <!-- Tích cực -->
                        <div class="d-flex justify-content-between font-11 mb-1">
                            <span class="text-dark d-flex align-items-center gap-1">
                                <i class="bx bx-smile text-primary font-14"></i> Tích cực (4 - 5 sao)
                            </span>
                            <span class="fw-bold text-dark">88.6% <small class="text-muted fw-normal">(163.200)</small></span>
                        </div>
                        <div class="progress rounded-pill mb-3" style="height: 7px; background-color: #F1F5F9;">
                            <div class="progress-bar rounded-pill" style="width: 88.6%; background: linear-gradient(90deg, #0284C7, #38BDF8);"></div>
                        </div>

                        <!-- Trung tính -->
                        <div class="d-flex justify-content-between font-11 mb-1">
                            <span class="text-dark d-flex align-items-center gap-1">
                                <i class="bx bx-meh font-14" style="color: #7C3AED;"></i> Trung tính (3 sao)
                            </span>
                            <span class="fw-bold text-dark">7.1% <small class="text-muted fw-normal">(13.080)</small></span>
                        </div>
                        <div class="progress rounded-pill mb-3" style="height: 7px; background-color: #F1F5F9;">
                            <div class="progress-bar rounded-pill" style="width: 7.1%; background-color: #7C3AED;"></div>
                        </div>

                        <!-- Tiêu cực -->
                        <div class="d-flex justify-content-between font-11 mb-1">
                            <span class="text-dark d-flex align-items-center gap-1">
                                <i class="bx bx-sad font-14" style="color: #E11D48;"></i> Tiêu cực (1 - 2 sao)
                            </span>
                            <span class="fw-bold text-dark">4.3% <small class="text-muted fw-normal">(7.920)</small></span>
                        </div>
                        <div class="progress rounded-pill mb-3" style="height: 7px; background-color: #F1F5F9;">
                            <div class="progress-bar rounded-pill" style="width: 4.3%; background-color: #E11D48;"></div>
                        </div>
                    </div>

                    <!-- Circular Satisfaction Gauge & Breakdown -->
                    <div class="d-flex align-items-center justify-content-between pt-3 border-top gap-3">
                        <!-- Score Donut Circle -->
                        <div class="position-relative d-flex align-items-center justify-content-center" style="width: 78px; height: 78px; min-width: 78px;">
                            <svg viewBox="0 0 36 36" class="w-100 h-100" style="transform: rotate(-90deg);">
                                <path stroke="#F1F5F9" stroke-width="3.5" fill="none"
                                    d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path stroke="#E11D48" stroke-dasharray="88.6, 100" stroke-width="3.5" stroke-linecap="round" fill="none"
                                    d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                            </svg>
                            <div class="position-absolute text-center">
                                <span class="font-14 fw-bold text-dark d-block lh-1">4.86</span>
                                <span class="font-8 text-muted text-uppercase" style="font-size: 8px;">ĐIỂM HÀI LÒNG</span>
                            </div>
                        </div>

                        <!-- Legend Items -->
                        <div class="d-flex flex-column gap-1 font-11">
                            <div class="d-flex align-items-center gap-1-5">
                                <span class="legend-dot" style="background-color: #E11D48;"></span>
                                <span class="text-muted">Tích cực: Hài lòng vượt trội</span>
                            </div>
                            <div class="d-flex align-items-center gap-1-5">
                                <span class="legend-dot" style="background-color: #7C3AED;"></span>
                                <span class="text-muted">Trung tính: Cần cải thiện nhẹ</span>
                            </div>
                            <div class="d-flex align-items-center gap-1-5">
                                <span class="legend-dot" style="background-color: #F43F5E;"></span>
                                <span class="text-muted">Tiêu cực: Cần giải quyết F1</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Widget 2: Từ Khóa Tích Cực Xuất Hiện Nhiều (Top 5) -->
                <div class="card border-0 rounded-4 p-4 bg-white shadow-xs">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-trending-up font-18 text-primary"></i>
                            <h6 class="fw-bold text-dark mb-0 font-14">Từ Khóa Tích Cực Xuất Hiện Nhiều</h6>
                        </div>
                        <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #F5F3FF; color: #7C3AED;">
                            Top 5
                        </span>
                    </div>
                    <p class="text-muted font-11 mb-3">
                        Các cụm từ có trọng số cảm xúc cao được AI trích xuất tự động từ 184.200 đánh giá:
                    </p>

                    <!-- Top 5 List -->
                    <div class="d-flex flex-column gap-2-5">
                        <!-- Item 1 -->
                        <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light border border-secondary-subtle">
                            <div class="d-flex align-items-center gap-2">
                                <span class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold font-10"
                                    style="background-color: #E11D48; width: 20px; height: 20px;">1</span>
                                <div>
                                    <div class="fw-bold text-dark font-12">"Bác tài nhiệt tình"</div>
                                    <div class="font-10 text-muted">Tuyến Hội An, Bà Nà, Sơn Trà</div>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2 py-1" style="background-color: #FCE7F3; color: #BE185D;">
                                +18.420 lần
                            </span>
                        </div>

                        <!-- Item 2 -->
                        <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light border border-secondary-subtle">
                            <div class="d-flex align-items-center gap-2">
                                <span class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold font-10"
                                    style="background-color: #7C3AED; width: 20px; height: 20px;">2</span>
                                <div>
                                    <div class="fw-bold text-dark font-12">"Cảnh đẹp tuyệt vời"</div>
                                    <div class="font-10 text-muted">Bán Đảo Sơn Trà, Ngũ Hành Sơn</div>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2 py-1" style="background-color: #FCE7F3; color: #BE185D;">
                                +15.780 lần
                            </span>
                        </div>

                        <!-- Item 3 -->
                        <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light border border-secondary-subtle">
                            <div class="d-flex align-items-center gap-2">
                                <span class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold font-10"
                                    style="background-color: #0284C7; width: 20px; height: 20px;">3</span>
                                <div>
                                    <div class="fw-bold text-dark font-12">"Hải sản tươi ngon"</div>
                                    <div class="font-10 text-muted">Nhà hàng biển Mỹ Khê, Chợ Đêm Sơn Trà</div>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2 py-1" style="background-color: #FCE7F3; color: #BE185D;">
                                +10.960 lần
                            </span>
                        </div>

                        <!-- Item 4 -->
                        <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light border border-secondary-subtle">
                            <div class="d-flex align-items-center gap-2">
                                <span class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold font-10"
                                    style="background-color: #059669; width: 20px; height: 20px;">4</span>
                                <div>
                                    <div class="fw-bold text-dark font-12">"AI gợi ý chuẩn xác"</div>
                                    <div class="font-10 text-muted">Lịch trình tự động, tối ưu tránh kẹt xe</div>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2 py-1" style="background-color: #E0F2FE; color: #0284C7;">
                                +8.640 lần
                            </span>
                        </div>

                        <!-- Item 5 -->
                        <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light border border-secondary-subtle">
                            <div class="d-flex align-items-center gap-2">
                                <span class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold font-10"
                                    style="background-color: #E11D48; width: 20px; height: 20px;">5</span>
                                <div>
                                    <div class="fw-bold text-dark font-12">"Check-in siêu ảo"</div>
                                    <div class="font-10 text-muted">Cầu Rồng, Cầu Tình Yêu, Thuyền sông Hàn</div>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-10 fw-bold px-2 py-1" style="background-color: #FCE7F3; color: #BE185D;">
                                +6.710 lần
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Widget 3: AI Guardian 3.2 Purple Banner -->
                <div class="card border-0 rounded-4 p-4 text-white shadow-sm"
                    style="background: linear-gradient(135deg, #6D28D9 0%, #9333EA 100%);">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="rounded-circle d-flex align-items-center justify-content-center bg-white text-purple"
                            style="width: 32px; height: 32px; color: #7C3AED;">
                            <i class="bx bx-bot font-18"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 font-14">AI Guardian 3.2</h6>
                            <span class="font-10 text-white-50">Bộ lọc tự động đang hoạt động 24/7</span>
                        </div>
                    </div>
                    <p class="font-11 text-white-50 mb-3 lh-base">
                        Hệ thống đang tự động lọc 100% hình ảnh nhạy cảm/bạo lực, nhận diện khuôn mặt và biển số xe riêng tư trước khi đăng, và áp dụng NLP quét từ ngữ xúc phạm bằng tiếng Việt, Anh, Hàn, Trung.
                    </p>
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top border-white-50">
                        <span class="font-11 text-white">Ngưỡng tin cậy duyệt tự động:</span>
                        <span class="badge bg-white rounded-pill px-3 py-1 font-11 fw-bold" style="color: #7C3AED;">
                            ≥ 95 điểm
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Audit Log Strip -->
        <div class="card border-0 shadow-xs rounded-4 p-3 bg-white d-flex flex-wrap flex-md-row justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <i class="bx bx-time-five font-18 text-muted"></i>
                <span class="font-12 text-dark">
                    <strong>Nhật Ký Kiểm Duyệt Gần Nhất:</strong> Admin Trần Hoàng Long vừa Duyệt 18 review hợp lệ và chuyển 01 trường hợp sang Ban Thanh tra cho địa điểm Dịch vụ Chăm sóc du khách lúc 10:12.
                </span>
            </div>
            <a href="javascript:void(0)" class="font-12 fw-bold text-decoration-none d-flex align-items-center gap-1" style="color: #E11D48;" @click="openModalAuditLog">
                <span>Xem Toàn Bộ Nhật Ký Hoạt Động</span>
                <i class="bx bx-right-arrow-alt"></i>
            </a>
        </div>

        <!-- ================= MODALS ================= -->

        <!-- 1. Modal: Cấu Hình Từ Khóa Cấm & Spam -->
        <div v-if="showModalBlacklist" class="modal-backdrop-custom d-flex align-items-center justify-content-center">
            <div class="modal-dialog-custom bg-white rounded-4 shadow-lg p-4" style="max-width: 620px; width: 90%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 36px; height: 36px;">
                            <i class="bx bx-shield-quarter font-20" style="color: #E11D48;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-0 font-16">Cấu Hình Bộ Lọc Từ Khóa Nhạy Cảm & Spam</h5>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center"
                        style="width: 28px; height: 28px;" @click="showModalBlacklist = false">
                        <i class="bx bx-x font-18 text-muted"></i>
                    </button>
                </div>

                <p class="text-muted font-12 mb-3">
                    Hệ thống NLP sẽ tự động gắn cờ và ẩn các bình luận có chứa các từ khóa cấm hoặc regex tương ứng:
                </p>

                <!-- Blacklist Tags List -->
                <div class="mb-3">
                    <label class="form-label font-11 fw-bold text-muted text-uppercase mb-1">DANH SÁCH TỪ KHÓA BỊ CHẶN BẬC 1 (NGHIÊM CẤM):</label>
                    <div class="d-flex align-items-center gap-2 flex-wrap p-2 rounded-3 bg-light border">
                        <span v-for="(kw, idx) in blacklistKeywords" :key="idx" class="badge rounded-pill font-11 fw-semibold px-2-5 py-1 bg-white text-danger border">
                            {{ kw }} <i class="bx bx-x ms-1 cursor-pointer" @click="xoaTuKhoa(idx)"></i>
                        </span>
                    </div>
                </div>

                <!-- Add Keyword Input -->
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control rounded-start-pill font-12" placeholder="Nhập từ khóa mới cần lọc..." v-model="newKeyword" @keyup.enter="themTuKhoa" />
                    <button class="btn btn-pink-gradient text-white rounded-end-pill px-3 font-12 fw-bold" @click="themTuKhoa">
                        + Thêm Từ Khóa
                    </button>
                </div>

                <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                    <button class="btn btn-outline-secondary rounded-pill px-4 py-2 font-12 fw-semibold" @click="showModalBlacklist = false">
                        Hủy
                    </button>
                    <button class="btn btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold" @click="luuTuKhoaCam">
                        Lưu Cấu Hình
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. Modal: Nhật Ký Kiểm Duyệt Chi Tiết -->
        <div v-if="showModalAudit" class="modal-backdrop-custom d-flex align-items-center justify-content-center">
            <div class="modal-dialog-custom bg-white rounded-4 shadow-lg p-4" style="max-width: 750px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 36px; height: 36px;">
                            <i class="bx bx-history font-20" style="color: #E11D48;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-0 font-16">Nhật Ký Kiểm Duyệt & Xử Lý Review</h5>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center"
                        style="width: 28px; height: 28px;" @click="showModalAudit = false">
                        <i class="bx bx-x font-18 text-muted"></i>
                    </button>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-sm font-11 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Thời Gian</th>
                                <th>Người Thực Hiện</th>
                                <th>Đối Tượng / Review</th>
                                <th>Hành Động</th>
                                <th>Ghi Chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10:12 - Hôm nay</td>
                                <td><strong>Trần Hoàng Long</strong></td>
                                <td>#KH_DN_2921 (Vũ Hoàng Nam)</td>
                                <td><span class="badge bg-danger-subtle text-danger">Ẩn & Cảnh báo</span></td>
                                <td>Chứa từ ngữ xúc phạm đối tác lữ hành</td>
                            </tr>
                            <tr>
                                <td>09:45 - Hôm nay</td>
                                <td><strong>Trần Hoàng Long</strong></td>
                                <td>Trần Minh Anh (VIP Gold)</td>
                                <td><span class="badge bg-success-subtle text-success">Duyệt & Ghim Top</span></td>
                                <td>Độ tin cậy 99.2%, ảnh GPS xác thực</td>
                            </tr>
                            <tr>
                                <td>08:30 - Hôm nay</td>
                                <td><strong>AI Guardian 3.2</strong></td>
                                <td>User_901048</td>
                                <td><span class="badge bg-warning-subtle text-warning">Khóa Bot Tự Động</span></td>
                                <td>Spam 5 review trùng lặp từ 1 địa chỉ IP</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end pt-2">
                    <button class="btn btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold" @click="showModalAudit = false">
                        Đóng
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'DanhGiaAdmin',
    data() {
        return {
            filterSearch: '',
            filterScope: 'all',
            filterRating: '',
            currentTab: 'all',

            // Items visibility state for simulated moderation actions
            itemsStatus: {
                1: { visible: true, status: 'violations' },
                2: { visible: true, status: 'approved' },
                3: { visible: true, status: 'violations' }
            },

            // Modals
            showModalBlacklist: false,
            showModalAudit: false,

            blacklistKeywords: [
                'lừa đảo',
                'như ***',
                'vô trách nhiệm',
                'ăn cướp',
                'gian lận',
                'đồ khốn',
                'tẩy chay',
                'scam link'
            ],
            newKeyword: ''
        };
    },
    methods: {
        showItem(id) {
            const item = this.itemsStatus[id];
            if (!item || !item.visible) return false;

            if (this.currentTab === 'all') return true;
            if (this.currentTab === 'violations') return item.status === 'violations';
            if (this.currentTab === 'approved') return item.status === 'approved';
            if (this.currentTab === 'pending') return item.status === 'pending';
            if (this.currentTab === 'rejected') return item.status === 'rejected';

            return true;
        },
        resetFilter() {
            this.filterSearch = '';
            this.filterScope = 'all';
            this.filterRating = '';
            this.currentTab = 'all';
        },
        openModalBlacklist() {
            this.showModalBlacklist = true;
        },
        openModalAuditLog() {
            this.showModalAudit = true;
        },
        themTuKhoa() {
            const trimmed = this.newKeyword.trim();
            if (trimmed && !this.blacklistKeywords.includes(trimmed)) {
                this.blacklistKeywords.push(trimmed);
                this.newKeyword = '';
            }
        },
        xoaTuKhoa(idx) {
            this.blacklistKeywords.splice(idx, 1);
        },
        luuTuKhoaCam() {
            this.showModalBlacklist = false;
            if (this.$toast) {
                this.$toast.success('Đã cập nhật danh sách từ khóa nhạy cảm vào bộ lọc AI Guardian.');
            }
        },
        xuatBaoCao() {
            if (this.$toast) {
                this.$toast.info('Đang trích xuất báo cáo chất lượng UGC & Review Đà Nẵng...');
            }
            setTimeout(() => {
                if (this.$toast) {
                    this.$toast.success('Đã xuất file báo cáo audit_reviews_dn.xlsx thành công!');
                }
            }, 600);
        },
        duyetNhanhHopLe() {
            if (this.$toast) {
                this.$toast.success('Đã duyệt tự động 17 đánh giá đạt chuẩn tin cậy (≥ 95 điểm)!');
            }
        },
        // Action on Item 1
        anVaYeuCauXacMinh(id) {
            this.itemsStatus[id].status = 'rejected';
            if (this.$toast) {
                this.$toast.info('Đã ẩn bình luận và chuyển yêu cầu đối soát chứng từ đến phòng điều hành tour.');
            }
        },
        chuyenTranhChap(id) {
            if (this.$toast) {
                this.$toast.warning('Đã tạo hồ sơ Tranh Chấp F1 gửi đến Ban Thanh Tra Du Lịch Đà Nẵng.');
            }
        },
        hoTroKhachHang(name) {
            if (this.$toast) {
                this.$toast.info(`Đang kết nối cổng CSKH hỗ trợ trực tiếp với du khách ${name}...`);
            }
        },
        canhBaoDoiTac(partner) {
            if (this.$toast) {
                this.$toast.warning(`Đã gửi thông báo cảnh báo chất lượng dịch vụ đến đối tác ${partner}.`);
            }
        },
        // Action on Item 2
        duyetVaDuaLenTop(id) {
            this.itemsStatus[id].status = 'approved';
            if (this.$toast) {
                this.$toast.success('Đã duyệt thành công và ghim đánh giá tiêu biểu lên đầu cổng thông tin du lịch!');
            }
        },
        ganNhanTieuBieu(id) {
            if (this.$toast) {
                this.$toast.info('Đã gắn huy hiệu "Review Tiêu Biểu Đà Nẵng" cho bài viết.');
            }
        },
        // Action on Item 3
        khoaTaiKhoanAo(id) {
            this.itemsStatus[id].visible = false;
            if (this.$toast) {
                this.$toast.success('Đã khóa vĩnh viễn tài khoản User_901048 và chặn IP Proxy khỏi hệ thống.');
            }
        },
        huyToanBoReview(id) {
            this.itemsStatus[id].visible = false;
            if (this.$toast) {
                this.$toast.info('Đã xóa bỏ hoàn toàn 05 đánh giá seeding ảo khỏi cơ sở dữ liệu.');
            }
        },
        truDiemUyTin(id) {
            if (this.$toast) {
                this.$toast.warning('Đã trừ 5 điểm uy tín đối tác Danang Luxury Limousine do hành vi tự tạo đánh giá ảo.');
            }
        }
    }
};
</script>

<style scoped>
.reviews-moderation-page {
    background-color: #F8FAFC;
    min-height: 100vh;
    color: #1E293B;
}

.page-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #0F172A;
}

.font-10 { font-size: 10px; }
.font-11 { font-size: 11px; }
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.font-14 { font-size: 14px; }
.font-16 { font-size: 16px; }
.font-18 { font-size: 18px; }
.font-20 { font-size: 20px; }
.font-24 { font-size: 24px; }
.font-28 { font-size: 28px; }

.py-0-5 { padding-top: 2px; padding-bottom: 2px; }
.py-1-5 { padding-top: 6px; padding-bottom: 6px; }
.px-2-5 { padding-left: 10px; padding-right: 10px; }
.p-2-5 { padding: 10px 14px; }
.p-3-5 { padding: 18px 20px; }
.mt-0-5 { margin-top: 2px; }
.gap-1-5 { gap: 6px; }
.gap-2-5 { gap: 10px; }

.btn-pink-gradient {
    background: linear-gradient(135deg, #E11D48 0%, #BE123C 100%);
    border: none;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.25);
    transition: all 0.2s ease;
}
.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #F43F5E 0%, #E11D48 100%);
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
    transform: translateY(-1px);
}

.text-pink { color: #E11D48 !important; }
.border-pink-subtle { border-color: #FCE7F3 !important; }

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

.shadow-xs { box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); }

.kpi-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
}

.legend-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

/* Photo Thumbnail & Overlay */
.photo-thumb-box {
    width: 105px;
    height: 72px;
    border: 1px solid #E2E8F0;
    transition: transform 0.2s ease;
}
.photo-thumb-box:hover {
    transform: scale(1.04);
}
.photo-overlay-tag {
    position: absolute;
    bottom: 2px;
    left: 4px;
    right: 4px;
    background: rgba(15, 23, 42, 0.75);
    color: #FFFFFF;
    font-size: 9px;
    padding: 1px 4px;
    border-radius: 4px;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Cursor pointer */
.cursor-pointer { cursor: pointer; }

/* Modal Backdrop */
.modal-backdrop-custom {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(15, 23, 42, 0.5);
    backdrop-filter: blur(4px);
    z-index: 1050;
}
.modal-dialog-custom {
    animation: modalFadeIn 0.2s ease-out;
}
@keyframes modalFadeIn {
    from { opacity: 0; transform: scale(0.96) translateY(-10px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}
</style>
