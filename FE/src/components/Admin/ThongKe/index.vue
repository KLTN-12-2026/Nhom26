<template>
    <div class="executive-dashboard-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">DANANG SMART TOURISM EXECUTIVE DASHBOARD</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Thống Kê & Báo Cáo Tổng Quan Hệ Thống</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 820px;">
                    Bức tranh tổng thể toàn sàn về doanh thu, lượt khách, hiệu suất AI Travel Planner và chỉ số tăng trưởng các đối tác lữ hành tại TP Đà Nẵng.
                </p>
            </div>

            <!-- Top Right Date Filters & Action Buttons -->
            <div class="d-flex flex-column align-items-end gap-2">
                <!-- Date Period Pills -->
                <div class="d-flex align-items-center p-1 bg-white rounded-pill border shadow-xs gap-1">
                    <button class="btn btn-sm rounded-pill font-11 fw-semibold px-3 py-1 transition-all"
                        :class="selectedPeriod === 'today' ? 'btn-pink-gradient text-white fw-bold' : 'btn-light text-muted'"
                        @click="selectedPeriod = 'today'">
                        Hôm nay
                    </button>
                    <button class="btn btn-sm rounded-pill font-11 fw-semibold px-3 py-1 transition-all"
                        :class="selectedPeriod === '7days' ? 'btn-pink-gradient text-white fw-bold' : 'btn-light text-muted'"
                        @click="selectedPeriod = '7days'">
                        7 ngày qua
                    </button>
                    <button class="btn btn-sm rounded-pill font-11 fw-semibold px-3 py-1 transition-all"
                        :class="selectedPeriod === 'month' ? 'btn-pink-gradient text-white fw-bold' : 'btn-light text-muted'"
                        @click="selectedPeriod = 'month'">
                        Tháng này (DIFF 2025)
                    </button>
                    <button class="btn btn-sm rounded-pill font-11 fw-semibold px-3 py-1 transition-all d-flex align-items-center gap-1"
                        :class="selectedPeriod === 'custom' ? 'btn-pink-gradient text-white fw-bold' : 'btn-light text-muted'"
                        @click="openModalDateFilter">
                        <span>Tùy chỉnh</span>
                        <i class="bx bx-calendar"></i>
                    </button>
                </div>

                <!-- Action Buttons Row -->
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-11 fw-semibold shadow-xs d-flex align-items-center gap-1"
                        @click="dongBoDuLieu">
                        <i class="bx bx-sync font-16" :class="{ 'bx-spin': isSyncing }"></i>
                        <span>Đồng Bộ Dữ Liệu</span>
                    </button>
                    <button class="btn btn-purple-gradient text-white rounded-pill px-3 py-2 font-11 fw-bold shadow-xs d-flex align-items-center gap-1"
                        @click="openModalXuatBaoCao">
                        <i class="bx bx-download font-16"></i>
                        <span>Xuất Báo Cáo PDF/Excel</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- 4 Metric Status KPI Cards -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: TỔNG DOANH THU SÀN (GMV) -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-credit-card font-20" style="color: #E11D48;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                            ↗ +22.4%
                        </span>
                    </div>
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TỔNG DOANH THU SÀN (GMV)</div>
                        <div class="d-flex align-items-baseline gap-1 mt-1">
                            <span class="font-26 fw-bold text-dark">18.420.500.000</span>
                            <span class="font-14 text-pink fw-bold">đ</span>
                        </div>
                    </div>
                    <div class="p-2 rounded-3 mt-2 font-11 d-flex justify-content-between align-items-center" style="background-color: #FFF1F2;">
                        <span class="text-muted">Hoa hồng sàn thực thu (10%):</span>
                        <strong class="text-pink">1.842.050.000 đ</strong>
                    </div>
                </div>
            </div>

            <!-- Metric 2: KHÁCH DU LỊCH HOẠT ĐỘNG -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 42px; height: 42px;">
                            <i class="bx bx-paper-plane font-20" style="color: #0284C7;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                            ↗ +11.4%
                        </span>
                    </div>
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">KHÁCH DU LỊCH HOẠT ĐỘNG</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-26 fw-bold text-dark">148.920</span>
                            <span class="text-muted font-12 fw-normal">khách</span>
                        </div>
                    </div>
                    <div class="p-2 rounded-3 mt-2 font-11 d-flex justify-content-between align-items-center" style="background-color: #F0F9FF;">
                        <span class="text-muted">Thư viện POI &amp; Tương tác AI:</span>
                        <strong class="text-primary">34.250</strong>
                    </div>
                </div>
            </div>

            <!-- Metric 3: LỊCH TRÌNH AI TỐI ƯU -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 42px; height: 42px;">
                            <i class="bx bx-bulb font-20" style="color: #7C3AED;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #F5F3FF; color: #7C3AED;">
                            <i class="bx bx-chip me-1"></i> AI Smart
                        </span>
                    </div>
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">LỊCH TRÌNH AI TỐI ƯU</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-26 fw-bold text-dark">82.410</span>
                            <span class="text-muted font-12 fw-normal">tour sinh ra</span>
                        </div>
                    </div>
                    <div class="p-2 rounded-3 mt-2 font-11 text-muted d-flex justify-content-between align-items-center" style="background-color: #FAF5FF;">
                        <span>Hoàn tất: <strong class="text-dark">29.6%</strong></span>
                        <span>•</span>
                        <span>Tiết kiệm: <strong class="text-dark">~4.2h/lượt</strong></span>
                    </div>
                </div>
            </div>

            <!-- Metric 4: ĐỐI TÁC LỮ HÀNH & TOUR -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F1F5F9; width: 42px; height: 42px;">
                            <i class="bx bx-buildings font-20" style="color: #475569;"></i>
                        </div>
                        <span class="badge rounded-pill font-11 fw-semibold px-2 py-0-5" style="background-color: #F1F5F9; color: #475569;">
                            84.3% lấp chỗ
                        </span>
                    </div>
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐỐI TÁC LỮ HÀNH &amp; TOUR</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-26 fw-bold text-dark">856</span>
                            <span class="text-muted font-12 fw-normal">DN đã KYC</span>
                        </div>
                    </div>
                    <div class="p-2 rounded-3 mt-2 font-11 d-flex justify-content-between align-items-center" style="background-color: #F8FAFC;">
                        <span class="text-muted">Đang mở bán:</span>
                        <strong class="text-dark">1.240 Tour tuyến</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: Charts (Revenue Trend & Location Distribution) -->
        <div class="row g-4 mb-4">
            <!-- Left Chart (Col-lg-8): Xu Hướng Dòng Tiền & Đơn Tour Cao Điểm (DIFF 2025) -->
            <div class="col-12 col-xl-8">
                <div class="card border-0 shadow-xs rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header & Legend -->
                        <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge-dot-pink"></span>
                                    <h5 class="fw-bold text-dark mb-0 font-16">Xu Hướng Dòng Tiền &amp; Đơn Tour Cao Điểm (DIFF 2025)</h5>
                                </div>
                                <p class="font-11 text-muted mb-0 mt-1">
                                    Phân tích dòng doanh thu Tour hoặc Du lịch Vụ Trị / Sàn hoa hồng theo thực lưu
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-3 font-11">
                                <span class="d-flex align-items-center gap-1">
                                    <span class="legend-dot" style="background-color: #E11D48;"></span> Tour Tuyến
                                </span>
                                <span class="d-flex align-items-center gap-1">
                                    <span class="legend-dot" style="background-color: #0284C7;"></span> Phụ Phí &amp; Vé
                                </span>
                                <span class="d-flex align-items-center gap-1">
                                    <span class="legend-dot" style="background-color: #7C3AED;"></span> Phí Sàn (10%)
                                </span>
                            </div>
                        </div>

                        <!-- SVG Curved Trend Chart -->
                        <div class="position-relative my-2" style="height: 220px;">
                            <svg width="100%" height="220" viewBox="0 0 800 220" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="pinkGrad" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#E11D48" stop-opacity="0.25" />
                                        <stop offset="100%" stop-color="#E11D48" stop-opacity="0.0" />
                                    </linearGradient>
                                    <linearGradient id="blueGrad" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#0284C7" stop-opacity="0.2" />
                                        <stop offset="100%" stop-color="#0284C7" stop-opacity="0.0" />
                                    </linearGradient>
                                </defs>

                                <!-- Grid Horizontal Lines -->
                                <line x1="0" y1="40" x2="800" y2="40" stroke="#F1F5F9" stroke-width="1" />
                                <line x1="0" y1="90" x2="800" y2="90" stroke="#F1F5F9" stroke-width="1" />
                                <line x1="0" y1="140" x2="800" y2="140" stroke="#F1F5F9" stroke-width="1" />
                                <line x1="0" y1="190" x2="800" y2="190" stroke="#F1F5F9" stroke-width="1" />

                                <!-- Area 1: Tour Tuyến (Pink) -->
                                <path d="M 0,170 C 150,165 250,150 400,140 C 500,125 650,90 800,80 L 800,220 L 0,220 Z" fill="url(#pinkGrad)" />
                                <path d="M 0,170 C 150,165 250,150 400,140 C 500,125 650,90 800,80" fill="none" stroke="#E11D48" stroke-width="3" />

                                <!-- Area 2: Phụ Phí & Vé (Blue) -->
                                <path d="M 0,190 C 150,185 250,175 400,165 C 500,150 650,130 800,120 L 800,220 L 0,220 Z" fill="url(#blueGrad)" />
                                <path d="M 0,190 C 150,185 250,175 400,165 C 500,150 650,130 800,120" fill="none" stroke="#0284C7" stroke-width="2.5" />

                                <!-- Line 3: Phí Sàn (Purple Dashed) -->
                                <path d="M 0,205 C 150,202 250,198 400,192 C 500,185 650,175 800,170" fill="none" stroke="#7C3AED" stroke-width="2" stroke-dasharray="4 3" />

                                <!-- Key Points Markers at End -->
                                <circle cx="800" cy="80" r="5" fill="#E11D48" stroke="#FFFFFF" stroke-width="2" />
                                <circle cx="800" cy="120" r="4" fill="#0284C7" stroke="#FFFFFF" stroke-width="2" />
                                <circle cx="800" cy="170" r="3.5" fill="#7C3AED" stroke="#FFFFFF" stroke-width="2" />
                            </svg>

                            <!-- X Axis Labels -->
                            <div class="d-flex justify-content-between font-11 text-muted mt-2 pt-1 border-top">
                                <span>Tuần 1 (Khai mạc DIFF)</span>
                                <span>Tuần 2 (Đêm thi 1 &amp; 2)</span>
                                <span>Tuần 3 (Đêm thi 3 &amp; 4)</span>
                                <span class="fw-bold text-danger">Tuần 4 (Chung kết Lễ hội)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Highlight Banner -->
                    <div class="p-3 rounded-4 mt-3 d-flex flex-wrap align-items-center justify-content-between gap-2"
                        style="background-color: #FFF1F2; border: 1px solid #FECDD3;">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: #FCE7F3; width: 28px; height: 28px; min-width: 28px;">
                                <i class="bx bx-broadcast font-16" style="color: #E11D48;"></i>
                            </div>
                            <span class="font-12 text-dark">
                                Cao điểm Lễ Hội Pháo Hoa Quốc Tế ghi nhận doanh thu tăng vọt <strong class="text-pink">+38.5%</strong> so với chỉ tiêu tháng.
                            </span>
                        </div>
                        <a href="javascript:void(0)" class="font-11 fw-bold text-decoration-none d-flex align-items-center gap-1"
                            style="color: #E11D48;" @click="openModalLuongTien">
                            <span>Chi tiết nhật ký luồng tiền</span>
                            <i class="bx bx-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Donut (Col-lg-4): Lưu Lượng Theo Khu Vực -->
            <div class="col-12 col-xl-4">
                <div class="card border-0 shadow-xs rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge-dot-purple"></span>
                                <h5 class="fw-bold text-dark mb-0 font-16">Lưu Lượng Theo Khu Vực</h5>
                            </div>
                            <span class="badge rounded-pill font-11 fw-semibold px-2 py-0-5" style="background-color: #F5F3FF; color: #7C3AED;">
                                34.250 Khách
                            </span>
                        </div>
                        <p class="font-11 text-muted mb-3">
                            Phân bổ khách du lịch đang check-in và lưu trú tại các trung tâm TP Đà Nẵng
                        </p>

                        <!-- Circular Donut SVG Chart -->
                        <div class="position-relative d-flex align-items-center justify-content-center my-3" style="width: 170px; height: 170px; margin: 0 auto;">
                            <svg width="170" height="170" viewBox="0 0 170 170">
                                <!-- Background Circle -->
                                <circle cx="85" cy="85" r="65" fill="none" stroke="#F1F5F9" stroke-width="18" />

                                <!-- Segment 1: Bán đảo Sơn Trà & Mỹ Khê (35%) -> Pink -->
                                <circle cx="85" cy="85" r="65" fill="none" stroke="#E11D48" stroke-width="18"
                                    stroke-dasharray="142.9 265.5" stroke-dashoffset="0"
                                    transform="rotate(-90 85 85)" />

                                <!-- Segment 2: Ngũ Hành Sơn (28%) -> Purple -->
                                <circle cx="85" cy="85" r="65" fill="none" stroke="#7C3AED" stroke-width="18"
                                    stroke-dasharray="114.3 294.1" stroke-dashoffset="-142.9"
                                    transform="rotate(-90 85 85)" />

                                <!-- Segment 3: Hải Châu (22%) -> Cyan/Blue -->
                                <circle cx="85" cy="85" r="65" fill="none" stroke="#0284C7" stroke-width="18"
                                    stroke-dasharray="89.8 318.6" stroke-dashoffset="-257.2"
                                    transform="rotate(-90 85 85)" />

                                <!-- Segment 4: Bà Nà Hills (15%) -> Rose -->
                                <circle cx="85" cy="85" r="65" fill="none" stroke="#F43F5E" stroke-width="18"
                                    stroke-dasharray="61.2 347.2" stroke-dashoffset="-347"
                                    transform="rotate(-90 85 85)" />
                            </svg>

                            <!-- Center Label -->
                            <div class="position-absolute text-center d-flex flex-column align-items-center justify-content-center">
                                <span class="font-20 fw-bold text-dark lh-1 mb-1">100%</span>
                                <span class="font-8 text-muted text-uppercase tracking-wider">ĐỘ PHỦ ĐÀ NẴNG</span>
                            </div>
                        </div>

                        <!-- Distribution Breakdown List -->
                        <div class="d-flex flex-column gap-2 mt-2">
                            <!-- Dist 1 -->
                            <div class="d-flex align-items-center justify-content-between pb-1 border-bottom">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="legend-dot" style="background-color: #E11D48;"></span>
                                    <span class="font-12 text-dark">Bán đảo Sơn Trà &amp; Mỹ Khê</span>
                                </div>
                                <div class="text-end">
                                    <span class="badge rounded-pill font-10 fw-bold me-1" style="background-color: #FDF2F8; color: #E11D48;">35%</span>
                                    <small class="text-muted font-10">(12.050 khách)</small>
                                </div>
                            </div>

                            <!-- Dist 2 -->
                            <div class="d-flex align-items-center justify-content-between pb-1 border-bottom">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="legend-dot" style="background-color: #7C3AED;"></span>
                                    <span class="font-12 text-dark">Ngũ Hành Sơn &amp; Resort Ven Biển</span>
                                </div>
                                <div class="text-end">
                                    <span class="badge rounded-pill font-10 fw-bold me-1" style="background-color: #F5F3FF; color: #7C3AED;">28%</span>
                                    <small class="text-muted font-10">(9.590 khách)</small>
                                </div>
                            </div>

                            <!-- Dist 3 -->
                            <div class="d-flex align-items-center justify-content-between pb-1 border-bottom">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="legend-dot" style="background-color: #0284C7;"></span>
                                    <span class="font-12 text-dark">Hải Châu (Phố đi bộ &amp; Cầu Rồng)</span>
                                </div>
                                <div class="text-end">
                                    <span class="badge rounded-pill font-10 fw-bold me-1" style="background-color: #E0F2FE; color: #0284C7;">22%</span>
                                    <small class="text-muted font-10">(7.535 khách)</small>
                                </div>
                            </div>

                            <!-- Dist 4 -->
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="legend-dot" style="background-color: #F43F5E;"></span>
                                    <span class="font-12 text-dark">Bà Nà Hills &amp; Hòa Vang</span>
                                </div>
                                <div class="text-end">
                                    <span class="badge rounded-pill font-10 fw-bold me-1" style="background-color: #FFE4E6; color: #F43F5E;">15%</span>
                                    <small class="text-muted font-10">(5.145 khách)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 3: Hàng Đợi Tác Vụ Cần Xử Lý Gấp (Priority Queue) -->
        <div class="card border-0 shadow-xs rounded-4 mb-4 p-4 bg-white">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3 pb-2 border-bottom">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FEE2E2; width: 34px; height: 34px;">
                        <i class="bx bx-shield-quarter font-18 text-danger"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-0 font-15">Hàng Đợi Tác Vụ Cần Xử Lý Gấp (Priority Queue)</h5>
                        <p class="font-11 text-muted mb-0">
                            Các cuộc điều tra / kiểm định trong ngày liên quan đến hợp đồng và khiếu nại lệnh hủy gấp.
                        </p>
                    </div>
                </div>
                <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #FEE2E2; color: #DC2626;">
                    3 Nhiệm Vụ Khẩn Cấp
                </span>
            </div>

            <!-- 3 Queue Cards -->
            <div class="row g-3">
                <!-- Task 1: 12 Đối tác lữ hành mới nộp hồ sơ -->
                <div class="col-12 col-lg-4">
                    <div class="p-3 rounded-4 border bg-white h-100 d-flex flex-column justify-content-between priority-task-card shadow-2xs">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                                    KYC Doanh Nghiệp
                                </span>
                                <span class="font-10 text-muted">Chờ 2 giờ trước</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 font-13">12 Đối tác lữ hành mới nộp hồ sơ</h6>
                            <p class="font-11 text-muted mb-3" style="line-height: 1.45;">
                                Doanh nghiệp đã nộp Giấy phép kinh doanh lữ hành quốc tế và chứng thư ký quỹ cần duyệt trước đợt bán pháo hoa tuần tới.
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="font-11 text-muted fw-bold">SLA: 24h</span>
                            <router-link to="/admin/doi-tac" class="btn btn-pink-gradient text-white btn-sm rounded-pill font-11 fw-bold px-3 py-1 shadow-xs">
                                Duyệt Hồ Sơ
                            </router-link>
                        </div>
                    </div>
                </div>

                <!-- Task 2: 8 Tour cao điểm nộp bảng giá DIFF -->
                <div class="col-12 col-lg-4">
                    <div class="p-3 rounded-4 border bg-white h-100 d-flex flex-column justify-content-between priority-task-card shadow-2xs">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #E0F2FE; color: #0284C7;">
                                    Kiểm Soát Biểu Giá
                                </span>
                                <span class="font-10 text-muted">Chờ 45 phút trước</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 font-13">8 Tour cao điểm nộp bảng giá DIFF</h6>
                            <p class="font-11 text-muted mb-3" style="line-height: 1.45;">
                                Xác minh tính minh bạch, cam kết không phụ thu trái phép cho các tour Du thuyền Sông Hàn xem pháo hoa.
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="font-11 text-muted fw-bold">SLA: 12h</span>
                            <router-link to="/admin/tour" class="btn btn-sm rounded-pill font-11 fw-bold px-3 py-1 text-white shadow-xs" style="background-color: #0284C7;">
                                Thẩm Định Giá
                            </router-link>
                        </div>
                    </div>
                </div>

                <!-- Task 3: 2 Báo cáo tranh chấp du khách -->
                <div class="col-12 col-lg-4">
                    <div class="p-3 rounded-4 border h-100 d-flex flex-column justify-content-between priority-task-card shadow-2xs"
                        style="background-color: #FFF5F5; border-color: #FECDD3 !important;">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge rounded-pill font-10 fw-bold px-2 py-0-5" style="background-color: #DC2626; color: #FFFFFF;">
                                    Hủy Vé F1 - Khẩn Cấp
                                </span>
                                <span class="font-10 text-danger fw-bold">Còn 1h15m</span>
                            </div>
                            <h6 class="fw-bold text-danger mb-1 font-13">2 Báo cáo tranh chấp du khách</h6>
                            <p class="font-11 text-muted mb-3" style="line-height: 1.45;">
                                Sự cố đò lặn biển Cù Lao Chàm và tranh chấp hoàn hủy vé du thuyền có can thiệp của đường dây nóng Trung tâm Hỗ trợ Du khách.
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top" style="border-color: #FECDD3 !important;">
                            <span class="font-11 text-muted fw-bold">SLA: 4 giờ</span>
                            <router-link to="/admin/bao-cao-vi-pham" class="btn btn-sm btn-danger rounded-pill font-11 fw-bold px-3 py-1 shadow-xs">
                                Giải Quyết Ngay
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 4: Top 5 Tour Du Lịch Doanh Thu Cao Nhất Tháng -->
        <div class="card border-0 shadow-xs rounded-4 p-4 bg-white mb-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3 pb-2 border-bottom">
                <div>
                    <h5 class="fw-bold text-dark mb-0 font-15">Top 5 Tour Du Lịch Doanh Thu Cao Nhất Tháng</h5>
                    <p class="font-11 text-muted mb-0">Bảng xếp hạng đóng góp GMV lớn nhất cho sàn du lịch thông minh Đà Nẵng</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="font-11 text-muted">Lọc theo:</span>
                    <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #FDF2F8; color: #E11D48; border: 1px solid #FECDD3;">
                        Mùa Lễ Hội DIFF 2025
                    </span>
                </div>
            </div>

            <!-- Table Ranking -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 font-12">
                    <thead class="table-light text-uppercase font-10 text-muted">
                        <tr>
                            <th class="ps-3">HẠNG &amp; TOUR TUYẾN</th>
                            <th>ĐƠN VỊ LỮ HÀNH</th>
                            <th class="text-center">SỐ CHỖ ĐÃ BÁN</th>
                            <th class="text-center">DOANH THU THỰC THU</th>
                            <th class="text-center">ĐÁNH GIÁ</th>
                            <th class="text-center pe-3">TRẠNG THÁI AN TOÀN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in topTours" :key="item.rank">
                            <td class="ps-3">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="rank-badge-number" :style="getRankBadgeStyle(item.rank)">
                                        {{ item.rank }}
                                    </span>
                                    <img :src="item.image" :alt="item.name" class="tour-thumb rounded-circle shadow-xs" />
                                    <div>
                                        <div class="fw-bold text-dark font-13">{{ item.name }}</div>
                                        <small class="text-muted font-11">{{ item.subtext }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-semibold text-dark">{{ item.agency }}</span>
                            </td>
                            <td class="text-center">
                                <strong class="text-dark font-13">{{ item.seats }}</strong>
                                <div class="font-10 text-muted">vé</div>
                            </td>
                            <td class="text-center">
                                <strong class="font-13" style="color: #E11D48;">{{ item.revenue }}</strong>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill font-11 fw-bold px-2 py-1" style="background-color: #FDF2F8; color: #E11D48;">
                                    ★ {{ item.rating }}
                                </span>
                            </td>
                            <td class="text-center pe-3">
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-1 d-inline-flex align-items-center gap-1"
                                    style="background-color: #E0F2FE; color: #0284C7;">
                                    <span class="status-indicator-blue"></span> Đạt Tiêu Chuẩn 100%
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 border-top mt-3 font-11 text-muted">
                <span>Hiển thị 5 trong tổng số 1.240 tour du lịch hoạt động</span>
                <a href="javascript:void(0)" class="fw-bold text-decoration-none d-flex align-items-center gap-1" style="color: #E11D48;" @click="openModalFullRanking">
                    <span>Xem Toàn Bộ Bảng Xếp Hạng &amp; Báo Cáo Doanh Thu</span>
                    <i class="bx bx-chevron-right"></i>
                </a>
            </div>
        </div>

        <!-- ================= MODALS ================= -->

        <!-- 1. Modal: Xuất Báo Cáo PDF / Excel -->
        <div v-if="showModalXuat" class="modal-backdrop-custom d-flex align-items-center justify-content-center">
            <div class="modal-dialog-custom bg-white rounded-4 shadow-lg p-4" style="max-width: 580px; width: 90%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 36px; height: 36px;">
                            <i class="bx bx-download font-20" style="color: #7C3AED;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-0 font-16">Xuất Báo Cáo Điều Hành Hệ Thống</h5>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center"
                        style="width: 28px; height: 28px;" @click="showModalXuat = false">
                        <i class="bx bx-x font-18 text-muted"></i>
                    </button>
                </div>

                <div class="mb-3">
                    <label class="form-label font-11 fw-bold text-muted text-uppercase mb-1">CHỌN LOẠI BÁO CÁO CẦN KẾT XUẤT:</label>
                    <div class="d-flex flex-column gap-2">
                        <label class="d-flex align-items-center gap-2 p-2 rounded-3 border cursor-pointer hover-bg-light">
                            <input type="radio" name="reportType" checked />
                            <div>
                                <strong class="font-12 text-dark d-block">Báo Cáo Tổng Quan GMV &amp; Hoa Hồng Sàn (DIFF 2025)</strong>
                                <small class="text-muted font-11">Bao gồm bảng kê luồng tiền, doanh thu theo đơn vị lữ hành và đối soát ngân hàng.</small>
                            </div>
                        </label>
                        <label class="d-flex align-items-center gap-2 p-2 rounded-3 border cursor-pointer hover-bg-light">
                            <input type="radio" name="reportType" />
                            <div>
                                <strong class="font-12 text-dark d-block">Báo Cáo Lưu Lượng Khách Du Lịch &amp; Tỷ Lệ Lấp Chỗ</strong>
                                <small class="text-muted font-11">Phân bổ 7 quận/huyện, số lượng khách check-in và tải lượng tour.</small>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                    <button class="btn btn-outline-secondary rounded-pill px-4 py-2 font-12 fw-semibold" @click="showModalXuat = false">
                        Hủy
                    </button>
                    <button class="btn btn-purple-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold" @click="thucHienXuat">
                        <i class="bx bx-file me-1"></i> Tải Báo Cáo
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. Modal: Chi Tiết Nhật Ký Luồng Tiền -->
        <div v-if="showModalMoneyFlow" class="modal-backdrop-custom d-flex align-items-center justify-content-center">
            <div class="modal-dialog-custom bg-white rounded-4 shadow-lg p-4" style="max-width: 720px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 36px; height: 36px;">
                            <i class="bx bx-line-chart font-20" style="color: #E11D48;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-0 font-16">Chi Tiết Nhật Ký Luồng Tiền DIFF 2025</h5>
                    </div>
                    <button class="btn btn-light btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center"
                        style="width: 28px; height: 28px;" @click="showModalMoneyFlow = false">
                        <i class="bx bx-x font-18 text-muted"></i>
                    </button>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-sm font-11 mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Giai Đoạn</th>
                                <th>Doanh Thu Tour</th>
                                <th>Vé Phụ Phí &amp; Buffet</th>
                                <th>Phí Sàn Thực Thu</th>
                                <th>Tăng Trưởng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Tuần 1</strong> (Khai mạc)</td>
                                <td>3.450.000.000 đ</td>
                                <td>820.000.000 đ</td>
                                <td>427.000.000 đ</td>
                                <td><span class="text-success fw-bold">+14.2%</span></td>
                            </tr>
                            <tr>
                                <td><strong>Tuần 2</strong> (Đêm thi 1 &amp; 2)</td>
                                <td>4.120.000.000 đ</td>
                                <td>950.000.000 đ</td>
                                <td>507.000.000 đ</td>
                                <td><span class="text-success fw-bold">+18.5%</span></td>
                            </tr>
                            <tr>
                                <td><strong>Tuần 3</strong> (Đêm thi 3 &amp; 4)</td>
                                <td>4.850.000.000 đ</td>
                                <td>1.120.000.000 đ</td>
                                <td>597.000.000 đ</td>
                                <td><span class="text-success fw-bold">+24.0%</span></td>
                            </tr>
                            <tr>
                                <td><strong>Tuần 4</strong> (Chung kết Lễ hội)</td>
                                <td class="text-pink fw-bold">6.000.500.000 đ</td>
                                <td class="text-primary fw-bold">1.422.000.000 đ</td>
                                <td class="text-purple fw-bold">742.250.000 đ</td>
                                <td><span class="badge bg-danger text-white">+38.5%</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end pt-2">
                    <button class="btn btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold" @click="showModalMoneyFlow = false">
                        Đóng
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'ThongKeAdminComponent',
    data() {
        return {
            selectedPeriod: 'month',
            isSyncing: false,
            showModalXuat: false,
            showModalMoneyFlow: false,

            topTours: [
                {
                    rank: 1,
                    name: 'Du Thuyền Sông Hàn Khám Phá DIFF Đêm Chung Kết',
                    subtext: 'Tour VIP 4 Giờ • Ăn tối buffet • Live Dining',
                    agency: 'Danang River Cruise Co.',
                    seats: '4.850',
                    revenue: '5.820.000.000 đ',
                    rating: '4.96',
                    image: 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=120&q=80'
                },
                {
                    rank: 2,
                    name: 'Combo Trọn Gói Bà Nà Hills & Cầu Vàng Bản Cao Cấp',
                    subtext: 'Cáp Treo 2 Chiều • Buffet Pháp',
                    agency: 'Sun World Danang Travel',
                    seats: '3.920',
                    revenue: '4.312.000.000 đ',
                    rating: '4.91',
                    image: 'https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=120&q=80'
                },
                {
                    rank: 3,
                    name: 'Tour Sinh Thái Lặn Ngắm San Hô Cù Lao Chàm - Bãi Chồng',
                    subtext: 'Ca Nô Đời Mới • Hải sản Bãi Chồng',
                    agency: 'Miền Trung Explorer Corp',
                    seats: '3.140',
                    revenue: '2.669.000.000 đ',
                    rating: '4.88',
                    image: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=120&q=80'
                },
                {
                    rank: 4,
                    name: 'Khám Phá Di Sản Ngũ Hành Sơn & Phố Cổ Hội An Lung Linh',
                    subtext: 'Tour Trọn Ngày • Xe Limousine DCar',
                    agency: 'Heritage Routes Vietnam',
                    seats: '2.610',
                    revenue: '2.107.500.000 đ',
                    rating: '4.85',
                    image: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?auto=format&fit=crop&w=120&q=80'
                },
                {
                    rank: 5,
                    name: 'Trekking Bán Đảo Sơn Trà & Ngắm Voọc Chà Vá Chân Nâu',
                    subtext: 'Chuyên Gia Bản Địa • Safari Jeep',
                    agency: 'Green Wildlife Danang',
                    seats: '1.420',
                    revenue: '1.420.000.000 đ',
                    rating: '4.95',
                    image: 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=120&q=80'
                }
            ]
        };
    },
    methods: {
        getRankBadgeStyle(rank) {
            if (rank === 1) return { backgroundColor: '#FDF2F8', color: '#E11D48', border: '1px solid #FECDD3' };
            if (rank === 2) return { backgroundColor: '#F5F3FF', color: '#7C3AED', border: '1px solid #DDD6FE' };
            if (rank === 3) return { backgroundColor: '#E0F2FE', color: '#0284C7', border: '1px solid #BAE6FD' };
            return { backgroundColor: '#F1F5F9', color: '#64748B', border: '1px solid #E2E8F0' };
        },
        dongBoDuLieu() {
            this.isSyncing = true;
            setTimeout(() => {
                this.isSyncing = false;
                if (this.$toast) {
                    this.$toast.success('Đã làm mới và đồng bộ toàn bộ dữ liệu KPI theo thời gian thực!');
                }
            }, 600);
        },
        openModalDateFilter() {
            if (this.$toast) {
                this.$toast.info('Bộ chọn ngày tùy biến: Đang hiển thị dữ liệu tháng cao điểm DIFF 2025.');
            }
        },
        openModalXuatBaoCao() {
            this.showModalXuat = true;
        },
        thucHienXuat() {
            this.showModalXuat = false;
            if (this.$toast) {
                this.$toast.success('Đã tải xuống tệp Báo cáo Điều Hành (PDF / Excel) thành công!');
            }
        },
        openModalLuongTien() {
            this.showModalMoneyFlow = true;
        },
        openModalFullRanking() {
            if (this.$toast) {
                this.$toast.info('Đang mở toàn bộ 1.240 bảng xếp hạng doanh thu tour du lịch.');
            }
        }
    }
};
</script>

<style scoped>
.executive-dashboard-page {
    background-color: #F8FAFC;
    min-height: 100vh;
    color: #1E293B;
}

.page-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #0F172A;
}

.font-8 { font-size: 8px; }
.font-10 { font-size: 10px; }
.font-11 { font-size: 11px; }
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.font-14 { font-size: 14px; }
.font-15 { font-size: 15px; }
.font-16 { font-size: 16px; }
.font-20 { font-size: 20px; }
.font-24 { font-size: 24px; }
.font-26 { font-size: 26px; }

.py-0-5 { padding-top: 2px; padding-bottom: 2px; }

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

.btn-purple-gradient {
    background: linear-gradient(135deg, #7C3AED 0%, #6D28D9 100%);
    border: none;
    transition: all 0.2s;
    box-shadow: 0 2px 6px rgba(124, 58, 237, 0.25);
}
.btn-purple-gradient:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(124, 58, 237, 0.35);
}

.text-pink { color: #E11D48 !important; }
.text-purple { color: #7C3AED !important; }
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
.shadow-2xs { box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03); }

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

.badge-dot-pink {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
}

.badge-dot-purple {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #7C3AED;
    display: inline-block;
}

.status-indicator-blue {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #0284C7;
    display: inline-block;
}

.tracking-wider {
    letter-spacing: 0.8px;
}

/* Priority Task Cards */
.priority-task-card {
    transition: transform 0.2s, box-shadow 0.2s;
}
.priority-task-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

/* Table Ranking */
.rank-badge-number {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.72rem;
    flex-shrink: 0;
}

.tour-thumb {
    width: 42px;
    height: 42px;
    object-fit: cover;
    border: 2px solid #F1F5F9;
}

.cursor-pointer { cursor: pointer; }
.hover-bg-light:hover { background-color: #F8FAFC; }

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
