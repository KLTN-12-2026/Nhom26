<template>
    <div class="partner-dashboard-container">
        <!-- 1. Top Header Banner: AI Smart-Insight V4.2 & Period Filters -->
        <div class="dashboard-header mb-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-7">
                    <div class="ai-badge-pill mb-2">
                        <i class="bx bx-sparkles me-1 text-pink"></i>
                        <span class="ai-badge-text">AI SMART-INSIGHT V4.2 • THỜI GIAN THỰC</span>
                    </div>
                    <h2 class="dashboard-title mb-1">Thông Kê Kinh Doanh & Hiệu Suất Tour</h2>
                    <p class="dashboard-subtitle text-muted mb-0">
                        Hệ thống phân tích lượng tương tác, gợi ý OSRM di chuyển từ SmartTrip AI Planner và dòng tiền thanh toán tự động cho Danang Explorer Travel Corp.
                    </p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <div class="d-inline-flex flex-wrap align-items-center gap-2 justify-content-lg-end">
                        <div class="filter-period-group">
                            <button type="button" class="btn-period" :class="{ 'active': activePeriod === 'today' }" @click="activePeriod = 'today'">Hôm nay</button>
                            <button type="button" class="btn-period" :class="{ 'active': activePeriod === '7d' }" @click="activePeriod = '7d'">7 ngày</button>
                            <button type="button" class="btn-period" :class="{ 'active': activePeriod === 'month' }" @click="activePeriod = 'month'">Tháng này</button>
                            <button type="button" class="btn-period" :class="{ 'active': activePeriod === 'quarter' }" @click="activePeriod = 'quarter'">Quý này</button>
                        </div>
                        <div class="date-range-badge">
                            <i class="bx bx-calendar me-1"></i> 15/09 – 15/10/2024
                        </div>
                        <button type="button" class="btn btn-export-report" @click="handleExportReport">
                            <i class="bx bx-download me-1"></i> Xuất Báo Cáo
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Row of 4 KPI Metric Cards -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: Tổng Lượt Xem Tour -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-wrap icon-pink">
                            <i class="bx bx-show"></i>
                        </div>
                        <span class="badge-kpi-trend trend-pink">
                            <i class="bx bx-trending-up me-1"></i> +10.4%
                        </span>
                    </div>
                    <div class="kpi-label">TỔNG LƯỢT XEM TOUR</div>
                    <div class="kpi-value">48.920 <span class="kpi-unit">lượt</span></div>
                    <div class="kpi-footer-note text-muted">
                        Kênh app di động: <strong>68%</strong> • Web portal: <strong>32%</strong>
                    </div>
                </div>
            </div>

            <!-- Metric 2: Đề Xuất AI Planner -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-wrap icon-cyan">
                            <i class="bx bx-map-pin"></i>
                        </div>
                        <span class="badge-kpi-trend trend-cyan">
                            Thuật Toán GA
                        </span>
                    </div>
                    <div class="kpi-label">ĐỀ XUẤT AI PLANNER</div>
                    <div class="kpi-value">12.450 <span class="kpi-unit">lịch trình</span></div>
                    <div class="kpi-footer-note text-muted">
                        <span>Được đưa vào <strong>25.4%</strong> tổng lộ...</span>
                        <div class="progress progress-thin mt-1">
                            <div class="progress-bar bg-cyan" style="width: 25.4%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric 3: Đơn Đặt Thành Công -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-wrap icon-purple">
                            <i class="bx bx-receipt"></i>
                        </div>
                        <span class="badge-kpi-trend trend-purple">
                            Tỷ lệ: 2.8%
                        </span>
                    </div>
                    <div class="kpi-label">ĐƠN ĐẶT THÀNH CÔNG</div>
                    <div class="kpi-value">342 <span class="kpi-unit">đơn xác nhận</span></div>
                    <div class="kpi-footer-note text-muted">
                        Giữ chỗ tạm thời: <strong>818</strong> • Hủy: <strong>14</strong>
                    </div>
                </div>
            </div>

            <!-- Metric 4: Doanh Thu Ước Tính -->
            <div class="col-xl-3 col-md-6">
                <div class="kpi-card shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="kpi-icon-wrap icon-magenta">
                            <i class="bx bx-wallet"></i>
                        </div>
                        <span class="badge-kpi-trend trend-magenta">
                            Đối soát T+3
                        </span>
                    </div>
                    <div class="kpi-label">DOANH THU ƯỚC TÍNH</div>
                    <div class="kpi-value font-highlight">1.850.000.000 <span class="kpi-currency">đ</span></div>
                    <div class="kpi-footer-note text-muted">
                        <div><span class="dot-status bg-success me-1"></span>Đã quyết toán: <strong>1.420.000.000 đ</strong></div>
                        <div><span class="dot-status bg-warning me-1"></span>Chờ đối soát kỳ sau: <strong>430.000.000 đ</strong></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Row 2: Revenue Trend Wave Curve & Top AI Tours -->
        <div class="row g-3 mb-4">
            <!-- Left: Wave Curve Chart -->
            <div class="col-lg-8">
                <div class="dashboard-panel shadow-sm h-100">
                    <div class="panel-header d-flex flex-wrap justify-content-between align-items-center mb-3">
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <h5 class="panel-title mb-0">Xu Hướng Doanh Thu & Số Lượng Đơn Đặt</h5>
                                <span class="badge bg-light-pink text-pink font-11 fw-bold">Theo Tuần</span>
                            </div>
                            <small class="text-muted font-12">Dữ liệu tổng hợp từ bảng 'hoa_don' & 'lich_su_giao_dich'</small>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="chart-legend-item">
                                <span class="legend-dot dot-pink"></span> Doanh thu (triệu đ)
                            </span>
                            <span class="chart-legend-item">
                                <span class="legend-dot dot-blue"></span> Lượt đặt tour
                            </span>
                        </div>
                    </div>

                    <!-- Custom SVG Wave Line Chart -->
                    <div class="chart-svg-container position-relative">
                        <svg viewBox="0 0 760 210" class="w-100 h-auto" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="revenueGrad" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#f43f5e" stop-opacity="0.32" />
                                    <stop offset="100%" stop-color="#f43f5e" stop-opacity="0.0" />
                                </linearGradient>
                                <linearGradient id="orderGrad" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.22" />
                                    <stop offset="100%" stop-color="#3b82f6" stop-opacity="0.0" />
                                </linearGradient>
                            </defs>

                            <!-- Background Grid Lines -->
                            <line x1="20" y1="30" x2="740" y2="30" stroke="#f1f5f9" stroke-dasharray="4" />
                            <line x1="20" y1="80" x2="740" y2="80" stroke="#f1f5f9" stroke-dasharray="4" />
                            <line x1="20" y1="130" x2="740" y2="130" stroke="#f1f5f9" stroke-dasharray="4" />
                            <line x1="20" y1="180" x2="740" y2="180" stroke="#e2e8f0" />

                            <!-- Revenue Area & Curve (Pink) -->
                            <path d="M 30,170 C 130,170 170,140 250,145 C 330,150 380,85 450,70 C 530,52 610,65 720,120 L 720,180 L 30,180 Z" fill="url(#revenueGrad)" />
                            <path d="M 30,170 C 130,170 170,140 250,145 C 330,150 380,85 450,70 C 530,52 610,65 720,120" fill="none" stroke="#e11d48" stroke-width="3.5" stroke-linecap="round" />

                            <!-- Order Area & Curve (Blue) -->
                            <path d="M 30,178 C 140,176 220,165 310,160 C 400,155 470,125 560,110 C 630,98 670,105 720,145 L 720,180 L 30,180 Z" fill="url(#orderGrad)" />
                            <path d="M 30,178 C 140,176 220,165 310,160 C 400,155 470,125 560,110 C 630,98 670,105 720,145" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round" />

                            <!-- Highlight Data Points -->
                            <circle cx="250" cy="145" r="4.5" fill="#ffffff" stroke="#e11d48" stroke-width="2.5" />
                            <circle cx="450" cy="70" r="5" fill="#ffffff" stroke="#e11d48" stroke-width="3" />
                            <circle cx="560" cy="110" r="4" fill="#ffffff" stroke="#3b82f6" stroke-width="2" />
                            <circle cx="720" cy="120" r="4.5" fill="#ffffff" stroke="#e11d48" stroke-width="2.5" />
                        </svg>

                        <!-- X-Axis Labels -->
                        <div class="chart-x-labels d-flex justify-content-between px-2 pt-1">
                            <span class="x-label">Tuần 1 (01-07/10)</span>
                            <span class="x-label">Tuần 2 (08-14/10)</span>
                            <span class="x-label font-bold text-pink">Tuần 3 (15-21/10)</span>
                            <span class="x-label">Tuần 4 (22-28/10)</span>
                            <span class="x-label text-primary font-bold">Tuần Này (Hiện tại)</span>
                        </div>
                    </div>

                    <!-- Bottom Notification Ribbon -->
                    <div class="panel-alert-ribbon mt-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-bulb text-pink fs-5"></i>
                            <span class="small text-dark">
                                Đỉnh doanh thu đạt <strong>420.000.000 đ</strong> vào ngày 20/10 nhờ hiệu ứng Lễ hội Pháo hoa & Tour Cù Lao Chàm.
                            </span>
                        </div>
                        <router-link to="/doitac/tour-du-lich" class="alert-link small fw-bold text-pink">Chi tiết tuần &rarr;</router-link>
                    </div>
                </div>
            </div>

            <!-- Right: Top Tour AI Recommends -->
            <div class="col-lg-4">
                <div class="dashboard-panel shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h5 class="panel-title mb-0">Top Tour Được AI Gợi Ý</h5>
                            <span class="badge-sparkle"><i class="bx bx-bot"></i></span>
                        </div>
                        <p class="text-muted font-12 mb-3">
                            Xếp hạng tần suất đưa vào SmartTrip Route Planner dựa trên sở thích du khách.
                        </p>

                        <!-- Progress Ranking Items -->
                        <div class="top-tours-list d-flex flex-column gap-3 mb-4">
                            <div class="tour-rank-item">
                                <div class="d-flex justify-content-between font-12 fw-semibold mb-1">
                                    <span class="text-dark">1. Đà Nẵng - Sơn Trà - H...</span>
                                    <span class="text-pink fw-bold">4.820 lần (38%)</span>
                                </div>
                                <div class="progress" style="height: 7px;">
                                    <div class="progress-bar bg-pink" style="width: 38%;"></div>
                                </div>
                            </div>

                            <div class="tour-rank-item">
                                <div class="d-flex justify-content-between font-12 fw-semibold mb-1">
                                    <span class="text-dark">2. Bà Nà Hills Cầu Vàng ...</span>
                                    <span class="text-purple fw-bold">3.650 lần (29%)</span>
                                </div>
                                <div class="progress" style="height: 7px;">
                                    <div class="progress-bar bg-purple" style="width: 29%;"></div>
                                </div>
                            </div>

                            <div class="tour-rank-item">
                                <div class="d-flex justify-content-between font-12 fw-semibold mb-1">
                                    <span class="text-dark">3. Ca Nô Lặn San Hô Cù L...</span>
                                    <span class="text-primary fw-bold">2.410 lần (19%)</span>
                                </div>
                                <div class="progress" style="height: 7px;">
                                    <div class="progress-bar bg-primary" style="width: 19%;"></div>
                                </div>
                            </div>

                            <div class="tour-rank-item">
                                <div class="d-flex justify-content-between font-12 fw-semibold mb-1">
                                    <span class="text-dark">4. Ẩm Thực Chợ Đêm & S...</span>
                                    <span class="text-cyan fw-bold">1.570 lần (14%)</span>
                                </div>
                                <div class="progress" style="height: 7px;">
                                    <div class="progress-bar bg-cyan" style="width: 14%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- AI Tip Card -->
                    <div class="ai-tip-box p-3 rounded-3">
                        <div class="d-flex gap-2">
                            <i class="bx bx-planet text-purple fs-5 mt-1"></i>
                            <div class="font-12 text-secondary">
                                <strong class="text-dark">Mẹo AI:</strong> Điểm dừng chân Chùa Linh Ứng đang có thời lượng chờ dài, nên bổ sung xe đưa đón để tăng điểm hài lòng.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Row 3: Funnel Conversion Analysis & Top Revenue Tour Highlight -->
        <div class="row g-3 mb-4">
            <!-- Left: Conversion Funnel -->
            <div class="col-lg-8">
                <div class="dashboard-panel shadow-sm h-100">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <h5 class="panel-title mb-0">Phân Tích Phễu Chuyển Đổi Khách Hàng (Funnel)</h5>
                                <span class="badge bg-info-subtle text-info font-11 fw-bold">CR Benchmark: Cao hơn 14% TB ngành</span>
                            </div>
                            <small class="text-muted font-12">Từ lúc người dùng khám phá tour đến bước hoàn tất thanh toán VNPay/MoMo qua cổng SmartTrip.</small>
                        </div>
                    </div>

                    <!-- 4 Funnel Steps Cards -->
                    <div class="funnel-steps-grid mt-3 mb-3">
                        <div class="funnel-step-card">
                            <div class="step-num-badge">1</div>
                            <div class="step-badge-label">BƯỚC 1</div>
                            <div class="step-name">Lượt xem chi tiết tour</div>
                            <div class="step-value">48.920</div>
                            <div class="step-percent-tag tag-pink">100.0%</div>
                        </div>
                        <div class="funnel-step-card">
                            <div class="step-num-badge">2</div>
                            <div class="step-badge-label">BƯỚC 2</div>
                            <div class="step-name">Lưu vào Lịch Trình AI</div>
                            <div class="step-value">15.850</div>
                            <div class="step-percent-tag tag-purple">32.4%</div>
                        </div>
                        <div class="funnel-step-card">
                            <div class="step-num-badge">3</div>
                            <div class="step-badge-label">BƯỚC 3</div>
                            <div class="step-name">Bấm Đặt Chỗ (Checkout)</div>
                            <div class="step-value">4.207</div>
                            <div class="step-percent-tag tag-blue">8.6%</div>
                        </div>
                        <div class="funnel-step-card step-success">
                            <div class="step-num-badge bg-magenta text-white">4</div>
                            <div class="step-badge-label text-pink">THÀNH CÔNG</div>
                            <div class="step-name">Thanh toán vé thành công</div>
                            <div class="step-value text-pink">342</div>
                            <div class="step-percent-tag tag-pink-filled">2.8%</div>
                        </div>
                    </div>

                    <!-- Optimization Banner -->
                    <div class="funnel-opt-banner d-flex flex-wrap justify-content-between align-items-center p-3 rounded-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="opt-icon-circle bg-pink-light text-pink">
                                <i class="bx bx-shield-plus"></i>
                            </div>
                            <div class="small text-dark">
                                <strong>Tối ưu giỏ hàng:</strong> Có 3.865 du khách bỏ dở ở bước Nhập thông tin CCCD/Passport. Kích hoạt tính năng "Tự động điền AI" để tăng 15% chuyển đổi.
                            </div>
                        </div>
                        <button class="btn btn-sm btn-pink text-white rounded-pill px-3 py-1 fw-bold" @click="handleActivateAutoFill">
                            Kích hoạt ngay
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right: Featured Tour Spotlight -->
            <div class="col-lg-4">
                <div class="dashboard-panel shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="font-11 fw-bold text-muted text-uppercase letter-spacing-1">TOUR NỔI BẬT DOANH THU CAO</span>
                            <span class="rating-badge"><i class="bx bxs-star text-warning"></i> 4.95</span>
                        </div>

                        <!-- Tour Card Preview with Image -->
                        <div class="featured-tour-card position-relative rounded-3 overflow-hidden mb-3">
                            <img src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?auto=format&fit=crop&w=600&q=80" alt="Bà Nà Hills" class="featured-tour-img w-100" />
                            <div class="featured-tour-overlay">
                                <span class="badge bg-pink text-white font-11 fw-bold">Bà Nà Hills Siêu Sang 1N</span>
                            </div>
                        </div>

                        <!-- Tour Metric Lines -->
                        <div class="featured-stats-list d-flex flex-column gap-2 mb-3">
                            <div class="d-flex justify-content-between small">
                                <span class="text-muted">Lượt đặt tháng này:</span>
                                <span class="fw-bold text-dark">184 đơn <span class="text-success">(+22%)</span></span>
                            </div>
                            <div class="d-flex justify-content-between small">
                                <span class="text-muted">Tổng thu từ tour này:</span>
                                <span class="fw-bold text-pink">820.000.000 đ</span>
                            </div>
                            <div class="d-flex justify-content-between small">
                                <span class="text-muted">Số chỗ còn trống (7 ngày tới):</span>
                                <span class="fw-bold text-primary">18 chỗ / 120 chỗ</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Link Button -->
                    <router-link to="/doitac/lich-khoi-hanh" class="btn btn-outline-purple w-100 rounded-3 py-2 fw-semibold">
                        <i class="bx bx-calendar-edit me-1"></i> Điều chỉnh giá & Lịch khởi hành
                    </router-link>
                </div>
            </div>
        </div>

        <!-- 5. Row 4: Empty Seat Alerts & Customer Reviews -->
        <div class="row g-3">
            <!-- Left: Cảnh Báo Chỗ Trống - Kích Cầu -->
            <div class="col-lg-6">
                <div class="dashboard-panel shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="warning-icon-pill">
                                    <i class="bx bx-error text-danger"></i>
                                </div>
                                <h5 class="panel-title mb-0">Cảnh Báo Chỗ Trống - Kích Cầu</h5>
                            </div>
                            <span class="badge bg-danger-subtle text-danger font-11 fw-bold">SOÁT CẦU FLASH SALE</span>
                        </div>
                        <p class="text-muted font-12 mb-3">
                            Các chuyến khởi hành trong 48h tới có tỷ lệ lấp đầy dưới 45%. Khuyến nghị tung voucher giảm 15-20%.
                        </p>

                        <!-- Alert List -->
                        <div class="alert-items-list d-flex flex-column gap-3 mb-3">
                            <!-- Alert 1 -->
                            <div class="alert-item-box p-3 rounded-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold font-13 text-dark">Ca Nô Cù Lao Chàm (08:00 - ...)</h6>
                                    <div class="font-11 text-danger">
                                        <i class="bx bx-info-circle me-1"></i> Còn trống 18/25 chỗ (Lấp đầy: 28%)
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-pink-gradient rounded-pill px-3 py-1 font-12 fw-bold text-white" @click="handleFlashSale('Ca Nô Cù Lao Chàm')">
                                    Tạo Flash-Sale
                                </button>
                            </div>

                            <!-- Alert 2 -->
                            <div class="alert-item-box p-3 rounded-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold font-13 text-dark">Du Thuyền Ngắm Rồng Phun ...</h6>
                                    <div class="font-11 text-danger">
                                        <i class="bx bx-info-circle me-1"></i> Còn trống 24/40 vé (Lấp đầy: 40%)
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-pink-gradient rounded-pill px-3 py-1 font-12 fw-bold text-white" @click="handleFlashSale('Du Thuyền Ngắm Rồng')">
                                    Tạo Flash-Sale
                                </button>
                            </div>

                            <!-- Alert 3 -->
                            <div class="alert-item-box p-3 rounded-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold font-13 text-dark">Trekking Rừng Già Sơn Trà (Cho ...)</h6>
                                    <div class="font-11 text-secondary">
                                        <i class="bx bx-time-five me-1"></i> Còn 12/20 suất (Lấp đầy: 40%)
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-purple-gradient rounded-pill px-3 py-1 font-12 fw-bold text-white" @click="handlePushAI('Trekking Rừng Già')">
                                    Gửi Push AI
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 text-start">
                        <router-link to="/doitac/lich-khoi-hanh" class="text-pink fw-bold font-12 text-decoration-none">
                            Quản lý toàn bộ 14 lịch khởi hành tuần tới &rarr;
                        </router-link>
                    </div>
                </div>
            </div>

            <!-- Right: Đánh Giá & Phản Hồi Từ Du Khách -->
            <div class="col-lg-6">
                <div class="dashboard-panel shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="panel-title mb-0">Đánh Giá & Phản Hồi Từ Du Khách</h5>
                            <span class="badge bg-pink-light text-pink font-11 fw-bold">97% Tích Cực</span>
                        </div>
                        <p class="text-muted font-12 mb-3">
                            Tổng hợp từ bảng 'danh_gia' (Điểm TB: 4.88 / 5.0 - 640 lượt đánh giá)
                        </p>

                        <!-- Review Items -->
                        <div class="reviews-list d-flex flex-column gap-3 mb-3">
                            <!-- Review 1 -->
                            <div class="review-item-card p-3 rounded-3">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="review-avatar avatar-pink">TH</div>
                                        <div>
                                            <div class="font-12 fw-bold text-dark">
                                                Trần Hoài Nam (Hà Nội) <span class="text-muted font-11 fw-normal">• 2 giờ trước</span>
                                            </div>
                                            <div class="text-warning font-11">
                                                <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-pink-light text-pink font-10">Tour Bà Nà Hills</span>
                                        <button class="btn btn-sm btn-link text-muted p-0 font-11" @click="handleReplyReview('Trần Hoài Nam')">Phản hồi</button>
                                    </div>
                                </div>
                                <p class="review-text font-12 text-secondary mb-0">
                                    "Lịch trình được SmartTrip AI thiết kế ghép tour rất mượt, xe đưa đón của Danang Explorer đúng giờ, HDV nhiệt tình và chụp ảnh Cầu Vàng cực đẹp!"
                                </p>
                            </div>

                            <!-- Review 2 -->
                            <div class="review-item-card p-3 rounded-3">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="review-avatar avatar-blue">ML</div>
                                        <div>
                                            <div class="font-12 fw-bold text-dark">
                                                Mai Lan • Nhóm 6 khách <span class="text-muted font-11 fw-normal">• Hôm qua</span>
                                            </div>
                                            <div class="text-warning font-11">
                                                <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-primary-subtle text-primary font-10">Tour Cù Lao Chàm</span>
                                        <button class="btn btn-sm btn-link text-muted p-0 font-11" @click="handleReplyReview('Mai Lan')">Phản hồi</button>
                                    </div>
                                </div>
                                <p class="review-text font-12 text-secondary mb-0">
                                    "Hải sản trưa tươi ngon, lặn san hô vui. Chỉ có điểm đón tại bến Cửa Đại hơi đông, may có điều phối viên hỗ trợ check-in mã QR nhanh chóng."
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2">
                        <span class="font-11 text-muted">
                            Tỷ lệ phản hồi đối tác: <strong>98.2%</strong> (Trung bình 12 phút)
                        </span>
                        <router-link to="/doitac/danh-gia" class="text-pink fw-bold font-12 text-decoration-none">
                            Xem tất cả 640 đánh giá &rarr;
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ThongKeDoiTac',
    data() {
        return {
            activePeriod: 'month'
        }
    },
    methods: {
        handleExportReport() {
            alert('Đang tổng hợp dữ liệu và xuất báo cáo tài chính đối tác PDF/Excel...');
        },
        handleActivateAutoFill() {
            alert('Tính năng AI Auto-fill thông tin khách hàng đã được kích hoạt thành công trên cổng thanh toán!');
        },
        handleFlashSale(tourName) {
            alert(`Đã khởi tạo chương trình Flash-Sale giảm 15% cho "${tourName}". Đang đẩy thông báo đến 1.250 du khách lân cận.`);
        },
        handlePushAI(tourName) {
            alert(`Đã gửi gợi ý AI Push Notification cho "${tourName}" đến du khách có hồ sơ yêu thích trải nghiệm thiên nhiên.`);
        },
        handleReplyReview(customerName) {
            const reply = prompt(`Nhập nội dung phản hồi nhanh cho du khách ${customerName}:`, 'Cảm ơn quý khách đã tin tưởng đồng hành cùng Danang Explorer! Rất hân hạnh được phục vụ quý khách trong những chuyến đi tiếp theo.');
            if (reply) {
                alert('Đã gửi phản hồi thành công đến du khách!');
            }
        }
    }
}
</script>

<style scoped>
.partner-dashboard-container {
    padding-bottom: 20px;
    font-family: inherit;
}

/* Header */
.ai-badge-pill {
    display: inline-flex;
    align-items: center;
    background-color: #ffe4e6;
    color: #e11d48;
    padding: 3px 12px;
    border-radius: 999px;
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.5px;
}

.dashboard-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.3px;
}

.dashboard-subtitle {
    font-size: 0.82rem;
    max-width: 680px;
    line-height: 1.4;
}

/* Period Filter Buttons */
.filter-period-group {
    display: inline-flex;
    background-color: #f1f5f9;
    padding: 3px;
    border-radius: 999px;
}

.btn-period {
    border: none;
    background: transparent;
    font-size: 0.74rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 999px;
    color: #64748b;
    cursor: pointer;
    transition: all 0.15s ease;
}

.btn-period.active {
    background: #e11d48;
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.25);
}

.date-range-badge {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    padding: 5px 12px;
    border-radius: 8px;
    font-size: 0.74rem;
    font-weight: 600;
    color: #475569;
    display: inline-flex;
    align-items: center;
}

.btn-export-report {
    background: linear-gradient(135deg, #be123c 0%, #e11d48 100%);
    border: none;
    color: #ffffff;
    font-size: 0.76rem;
    font-weight: 700;
    padding: 6px 16px;
    border-radius: 999px;
    box-shadow: 0 2px 8px rgba(225, 29, 72, 0.25);
    transition: all 0.2s;
}

.btn-export-report:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
    color: #ffffff;
}

/* KPI Card Styles */
.kpi-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 18px;
    border: 1px solid #f1f5f9;
    position: relative;
    transition: transform 0.2s, box-shadow 0.2s;
}

.kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
}

.kpi-icon-wrap {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.icon-pink { background-color: #ffe4e6; color: #e11d48; }
.icon-cyan { background-color: #e0f2fe; color: #0284c7; }
.icon-purple { background-color: #f3e8ff; color: #9333ea; }
.icon-magenta { background-color: #fce7f3; color: #db2777; }

.badge-kpi-trend {
    font-size: 0.68rem;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 999px;
}

.trend-pink { background-color: #ffe4e6; color: #e11d48; }
.trend-cyan { background-color: #e0f2fe; color: #0284c7; }
.trend-purple { background-color: #f3e8ff; color: #9333ea; }
.trend-magenta { background-color: #fce7f3; color: #db2777; }

.kpi-label {
    font-size: 0.68rem;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.4px;
    margin-top: 10px;
    margin-bottom: 2px;
}

.kpi-value {
    font-size: 1.55rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.2;
}

.kpi-unit {
    font-size: 0.8rem;
    font-weight: 600;
    color: #64748b;
}

.kpi-currency {
    font-size: 0.95rem;
    color: #e11d48;
}

.font-highlight {
    color: #0f172a;
}

.kpi-footer-note {
    font-size: 0.72rem;
    margin-top: 8px;
    line-height: 1.35;
}

.dot-status {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    display: inline-block;
}

.progress-thin {
    height: 4px;
    background-color: #e2e8f0;
    border-radius: 999px;
}

/* Dashboard Panel Shell */
.dashboard-panel {
    background: #ffffff;
    border-radius: 14px;
    padding: 20px;
    border: 1px solid #f1f5f9;
}

.panel-title {
    font-size: 1rem;
    font-weight: 800;
    color: #0f172a;
}

.chart-legend-item {
    font-size: 0.74rem;
    font-weight: 600;
    color: #64748b;
    display: inline-flex;
    align-items: center;
}

.legend-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin-right: 5px;
}

.dot-pink { background-color: #e11d48; }
.dot-blue { background-color: #3b82f6; }

.chart-x-labels {
    border-top: 1px solid #f1f5f9;
}

.x-label {
    font-size: 0.68rem;
    color: #64748b;
}

.panel-alert-ribbon {
    background-color: #fff1f2;
    border: 1px solid #ffe4e6;
    border-radius: 8px;
    padding: 8px 14px;
}

/* Top Tours Recommends */
.badge-sparkle {
    width: 28px;
    height: 28px;
    background-color: #f3e8ff;
    color: #9333ea;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.ai-tip-box {
    background-color: #faf5ff;
    border: 1px solid #f3e8ff;
}

/* Conversion Funnel Grid */
.funnel-steps-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
}

.funnel-step-card {
    background-color: #fafbfc;
    border: 1px solid #eef2f6;
    border-radius: 12px;
    padding: 12px;
    position: relative;
    text-align: left;
}

.funnel-step-card.step-success {
    background-color: #fff1f2;
    border-color: #ffe4e6;
}

.step-num-badge {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background-color: #f1f5f9;
    color: #64748b;
    font-size: 0.7rem;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 6px;
}

.step-badge-label {
    font-size: 0.62rem;
    font-weight: 800;
    color: #94a3b8;
    letter-spacing: 0.5px;
}

.step-name {
    font-size: 0.72rem;
    font-weight: 600;
    color: #334155;
    margin-top: 2px;
    min-height: 32px;
}

.step-value {
    font-size: 1.25rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.1;
    margin-top: 4px;
}

.step-percent-tag {
    display: inline-block;
    font-size: 0.66rem;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 4px;
    margin-top: 6px;
}

.tag-pink { background-color: #ffe4e6; color: #e11d48; }
.tag-purple { background-color: #f3e8ff; color: #9333ea; }
.tag-blue { background-color: #dbeafe; color: #2563eb; }
.tag-pink-filled { background-color: #e11d48; color: #ffffff; }

.funnel-opt-banner {
    background-color: #fafaf9;
    border: 1px dashed #e2e8f0;
}

.opt-icon-circle {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}

/* Featured Tour Card */
.featured-tour-card {
    height: 140px;
}

.featured-tour-img {
    height: 100%;
    object-fit: cover;
}

.featured-tour-overlay {
    position: absolute;
    bottom: 10px;
    left: 10px;
}

.rating-badge {
    font-size: 0.76rem;
    font-weight: 800;
    color: #0f172a;
    background-color: #fef3c7;
    padding: 2px 8px;
    border-radius: 999px;
}

.btn-outline-purple {
    border: 1px solid #d8b4fe;
    color: #7e22ce;
    background-color: #faf5ff;
}

.btn-outline-purple:hover {
    background-color: #7e22ce;
    color: #ffffff;
}

/* Empty Seat Alerts */
.warning-icon-pill {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background-color: #fee2e2;
    display: flex;
    align-items: center;
    justify-content: center;
}

.alert-item-box {
    background-color: #f8fafc;
    border: 1px solid #f1f5f9;
}

.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #f43f5e 100%);
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.25);
}

.btn-purple-gradient {
    background: linear-gradient(135deg, #7c3aed 0%, #9333ea 100%);
    box-shadow: 0 2px 6px rgba(124, 58, 237, 0.25);
}

/* Reviews List */
.review-item-card {
    background-color: #f8fafc;
    border: 1px solid #f1f5f9;
}

.review-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 0.72rem;
    flex-shrink: 0;
}

.avatar-pink { background-color: #ffe4e6; color: #e11d48; }
.avatar-blue { background-color: #dbeafe; color: #2563eb; }

/* Utilities */
.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }
.bg-light-pink { background-color: #fff1f2 !important; }
.btn-pink { background-color: #e11d48 !important; }
.text-purple { color: #9333ea !important; }
.bg-purple { background-color: #9333ea !important; }
.text-cyan { color: #0284c7 !important; }
.bg-cyan { background-color: #0284c7 !important; }
.font-10 { font-size: 0.65rem !important; }
.font-11 { font-size: 0.7rem !important; }
.font-12 { font-size: 0.76rem !important; }
.font-13 { font-size: 0.82rem !important; }

@media (max-width: 991.98px) {
    .funnel-steps-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 575.98px) {
    .funnel-steps-grid {
        grid-template-columns: 1fr;
    }
}
</style>
