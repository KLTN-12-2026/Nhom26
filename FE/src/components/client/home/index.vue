<template>
    <div class="itinerary-page-container">
        <!-- 1. HEADER ITINERARY TITLE & META CARD -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 title-banner-card">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <!-- Top Badges -->
                        <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                            <span class="badge-tag-ai">
                                <i class="bx bx-bot me-1"></i>AI Lên lịch tự động
                            </span>
                            <span class="badge-tag-confirmed">
                                <i class="bx bx-check-circle me-1"></i>Đã chốt lịch trình
                            </span>
                            <span class="badge-tag-duration">
                                <i class="bx bx-time-five me-1"></i>3 Ngày 2 Đêm
                            </span>
                        </div>

                        <!-- Main Title -->
                        <h2 class="itinerary-main-title mb-2">
                            Đà Nẵng Rực Rỡ Hè 2025 – Vị Biển & Nghỉ Dưỡng
                        </h2>

                        <!-- Subtitle / Summary -->
                        <p class="itinerary-desc text-muted mb-3">
                            Chuyến đi 3 ngày 2 đêm thư giãn cùng gia đình, kết hợp tắm biển Mỹ Khê, ngắm hoàng hôn Bán đảo Sơn Trà và thưởng thức hải sản đêm phong phú. Tối ưu phân bổ giờ cao điểm chống quá tải/kẹt xe tại Bà Nà Hills.
                        </p>

                        <!-- Trip Meta Info -->
                        <div class="d-flex flex-wrap align-items-center gap-3 gap-md-4 text-muted small trip-meta-row">
                            <div class="d-flex align-items-center">
                                <i class="bx bx-calendar text-primary me-1 font-16"></i>
                                <span>Khởi hành: <strong class="text-dark">15/05/2025 — 17/05/2025</strong></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-group text-primary me-1 font-16"></i>
                                <span>Quy mô: <strong class="text-dark">2 người lớn</strong></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-map-pin text-primary me-1 font-16"></i>
                                <span>Khu vực: <strong class="text-dark">Danang Smart Pro Cold</strong></span>
                            </div>
                        </div>
                    </div>

                    <!-- AI Efficiency Score (Right Side) -->
                    <div class="col-lg-4 mt-3 mt-lg-0 text-lg-end">
                        <div class="ai-efficiency-box p-3 rounded-3 d-inline-block text-start w-100" style="max-width: 320px;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fw-semibold text-secondary small">Chỉ số hiệu quả AI</span>
                                <span class="fw-bold text-primary font-16">9.8 / 10</span>
                            </div>
                            <div class="progress progress-sm mb-2" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 98%"></div>
                            </div>
                            <div class="d-flex align-items-center text-muted smaller">
                                <i class="bx bx-sparkles text-warning me-1"></i>
                                <span>Tự học · Nâng cao hiệu quả 25%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. KPI BUDGET STAT CARDS (4 CARDS) -->
        <div class="row g-3 mb-4">
            <!-- Card 1: Ngân sách dự kiến -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-3 p-md-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="stat-label">Ngân sách dự kiến</span>
                            <div class="stat-icon-circle bg-light-primary text-primary">
                                <i class="bx bx-wallet"></i>
                            </div>
                        </div>
                        <h3 class="stat-value text-dark fw-bold mb-1">8.000.000 <span class="currency-symbol">đ</span></h3>
                        <div class="stat-note text-muted smaller">
                            Kế hoạch ban đầu: 8.5 tr
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Tổng chi phí dự tính -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-3 p-md-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="stat-label">Tổng chi phí dự tính</span>
                            <div class="stat-icon-circle bg-light-info text-info">
                                <i class="bx bx-receipt"></i>
                            </div>
                        </div>
                        <h3 class="stat-value text-primary fw-bold mb-1">6.850.000 <span class="currency-symbol">đ</span></h3>
                        <div class="stat-note text-primary smaller fw-medium">
                            * Tất cả giá mục & dịch vụ
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Chi phí hoạt động -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-3 p-md-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="stat-label">Chi phí hoạt động</span>
                            <div class="stat-icon-circle bg-light-cyan text-cyan">
                                <i class="bx bx-pie-chart-alt-2"></i>
                            </div>
                        </div>
                        <h3 class="stat-value text-dark fw-bold mb-1">6.850.000 <span class="currency-symbol">đ</span></h3>
                        <div class="stat-note text-muted smaller">
                            Tổng cộng 11 mục hoạt động
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Tiết kiệm được tối thiểu -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card stat-card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-3 p-md-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="stat-label">Tiết kiệm được tối thiểu</span>
                            <span class="badge bg-success-subtle text-success fw-bold rounded-pill px-2 py-1">+14.3%</span>
                        </div>
                        <h3 class="stat-value text-dark fw-bold mb-2">1.150.000 <span class="currency-symbol">đ</span></h3>
                        <div class="d-flex align-items-center justify-content-between text-muted smaller mb-1">
                            <span>Tiến độ ngân sách</span>
                            <span class="fw-semibold text-dark">85.6%</span>
                        </div>
                        <div class="progress progress-sm" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85.6%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. MAIN CONTENT: TIMELINE (LEFT) & SIDEBAR WIDGETS (RIGHT) -->
        <div class="row g-4">
            <!-- LEFT COLUMN: DETAILED ITINERARY TIMELINE BY DAY -->
            <div class="col-lg-8">
                <!-- DAY 1 SECTION -->
                <div class="day-card-wrapper mb-4">
                    <!-- Day Header -->
                    <div class="d-flex align-items-center justify-content-between mb-3 day-section-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="day-badge-box">
                                <div class="day-title-sub">NGÀY</div>
                                <div class="day-number">01</div>
                            </div>
                            <div>
                                <h5 class="day-date-heading mb-0">15/05/2025 <span class="text-muted fw-normal fs-6">Thứ Sáu</span></h5>
                                <div class="text-muted small">Khám phá Bán đảo Sơn Trà & Biển Mỹ Khê</div>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="text-muted smaller d-block">Tổng chi phí ngày:</span>
                            <span class="fw-bold text-primary">1.750.000 đ</span>
                        </div>
                    </div>

                    <!-- Day 1 Timeline Items -->
                    <div class="timeline-container">
                        <!-- Day 1 - Item 1 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1528127269322-539801943592?w=350" alt="Chùa Linh Ứng" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">08:30 – 11:30</span>
                                                    <span class="text-muted smaller">Tự do khám phá</span>
                                                </div>
                                                <div class="fw-bold text-success font-15">0 đ (Miễn phí vé)</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Chùa Linh Ứng & Bán đảo Sơn Trà</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Chùa Linh Ứng Bãi Bụt, P. Thọ Quang, Q. Sơn Trà, Đà Nẵng
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Tham quan tượng Phật Bà Quan Âm 67m, ngắm toàn cảnh vịnh biển Đà Nẵng từ trên cao. Không gian thanh tịnh, lộng gió thích hợp cho gia đình.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Day 1 - Item 2 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=350" alt="Bánh tráng cuốn thịt heo" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">12:00 – 13:30</span>
                                                    <span class="text-muted smaller">Ẩm thực địa phương</span>
                                                </div>
                                                <div class="fw-bold text-dark font-15">250.000 đ</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Đặc sản Bánh tráng cuốn thịt heo Đại Lộc</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Ẩm thực Quán Mậu, 35 Đỗ Thúc Tịnh, Q. Cẩm Lệ, Đà Nẵng
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Thưởng thức miếng thịt heo hai đầu da mềm ngọt cuốn cùng rau rừng tươi chuẩn vị miền Trung. Nước chấm mắm nêm gia truyền đậm đà.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Day 1 - Item 3 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=350" alt="Khách sạn ven biển" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">14:00 – 15:30</span>
                                                    <span class="text-muted smaller">Lưu trú / Check-in</span>
                                                </div>
                                                <div class="fw-bold text-success font-15">0 đ (Đã tính phòng)</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Check-in Khách sạn ven biển Võ Nguyên Giáp</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Khách sạn 4 sao ven biển Võ Nguyên Giáp, P. Phước Mỹ, Q. Sơn Trà
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Nhận phòng hướng biển, cất hành lý và nghỉ ngơi nạp lại năng lượng chuẩn bị cho buổi chiều tắm biển sôi động.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Day 1 - Item 4 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=350" alt="Tắm biển Mỹ Khê" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">16:00 – 18:30</span>
                                                    <span class="text-muted smaller">Bãi biển & Hoàng hôn</span>
                                                </div>
                                                <div class="fw-bold text-success font-15">0 đ (Tự do)</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Tắm biển Mỹ Khê & ngắm hoàng hôn</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Bãi biển Mỹ Khê, Đường Võ Nguyên Giáp, Đà Nẵng
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Tắm biển tại bãi tắm đẹp nhất Đà Nẵng, chụp ảnh check-in hoàng hôn lung linh buông xuống vịnh biển.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Day 1 - Item 5 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1559329007-40df8a9345d8?w=350" alt="Tiệc hải sản" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">19:30 – 21:30</span>
                                                    <span class="text-muted smaller">Tiệc hải sản đêm</span>
                                                </div>
                                                <div class="fw-bold text-dark font-15">1.500.000 đ</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Tiệc hải sản tươi sống Bé Mặn / Năm Đảnh</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Hải sản Bé Mặn, Lô 11 Võ Nguyên Giáp, Sơn Trà, Đà Nẵng
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Tôm hùm baby nướng bơ tỏi, ghẹ hấp, chíp chíp hấp sả gừng tươi ngọt, mực trứng chiên mắm và cháo hải sản thơm lừng.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DAY 2 SECTION -->
                <div class="day-card-wrapper mb-4">
                    <!-- Day Header -->
                    <div class="d-flex align-items-center justify-content-between mb-3 day-section-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="day-badge-box">
                                <div class="day-title-sub">NGÀY</div>
                                <div class="day-number">02</div>
                            </div>
                            <div>
                                <h5 class="day-date-heading mb-0">16/05/2025 <span class="text-muted fw-normal fs-6">Thứ Bảy</span></h5>
                                <div class="text-muted small">Trải nghiệm Tour Bà Nà Hills & Phố Cổ Hội An</div>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="text-muted smaller d-block">Tổng chi phí ngày:</span>
                            <span class="fw-bold text-primary">4.200.000 đ</span>
                        </div>
                    </div>

                    <!-- Day 2 Timeline Items -->
                    <div class="timeline-container">
                        <!-- Day 2 - Item 1 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=350" alt="Bà Nà Hills" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">08:00 – 16:00</span>
                                                    <span class="badge bg-info-subtle text-info">Tour trọn gói: TOUR-BN-2025</span>
                                                </div>
                                                <div class="fw-bold text-dark font-15">2.400.000 đ</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Sun World Bà Nà Hills & Cầu Vàng Bàn Tay</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Thôn An Sơn, Xã Hòa Ninh, Huyện Hòa Vang, Đà Nẵng
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Vé cáp treo khứ hồi + buffet trưa 100 món quốc tế cho 2 khách. Check-in Cầu Vàng, Làng Pháp cổ kính và khu vui chơi Fantasy Park.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Day 2 - Item 2 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1565967511849-76a60a516170?w=350" alt="Phố cổ Hội An" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">16:30 – 21:30</span>
                                                    <span class="text-muted smaller">Văn hóa & Ẩm thực</span>
                                                </div>
                                                <div class="fw-bold text-dark font-15">1.800.000 đ</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Phố cổ Hội An – Du thuyền hoa đăng & Cao Lầu</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Khu phố cổ Hội An, Tỉnh Quảng Nam
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Đi thuyền thả hoa đăng lung linh trên dòng sông Hoài, dạo bộ ngắm đèn lồng, thưởng thức Cao Lầu Bà Bé và bánh bao bánh vạc trứ danh.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DAY 3 SECTION -->
                <div class="day-card-wrapper mb-4">
                    <!-- Day Header -->
                    <div class="d-flex align-items-center justify-content-between mb-3 day-section-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="day-badge-box">
                                <div class="day-title-sub">NGÀY</div>
                                <div class="day-number">03</div>
                            </div>
                            <div>
                                <h5 class="day-date-heading mb-0">17/05/2025 <span class="text-muted fw-normal fs-6">Chủ Nhật</span></h5>
                                <div class="text-muted small">Ẩm thực & Mua sắm Đặc sản</div>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="text-muted smaller d-block">Tổng chi phí ngày:</span>
                            <span class="fw-bold text-primary">1.100.000 đ</span>
                        </div>
                    </div>

                    <!-- Day 3 Timeline Items -->
                    <div class="timeline-container">
                        <!-- Day 3 - Item 1 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=350" alt="Chợ Hàn Đà Nẵng" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">08:30 – 10:30</span>
                                                    <span class="text-muted smaller">Mua sắm đặc sản</span>
                                                </div>
                                                <div class="fw-bold text-dark font-15">900.000 đ</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Chợ Hàn Đà Nẵng: Mua sắm đặc sản chả bò, tré, mực rim</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Chợ Hàn, 119 Đường Trần Phú, P. Hải Châu 1, Q. Hải Châu
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Lựa chọn chả bò Đà Nẵng loại 1, mè xửng, mực rim me đóng hộp làm quà biếu chuẩn vị gia đình.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Day 3 - Item 2 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=350" alt="Mì Quảng" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">11:00 – 12:30</span>
                                                    <span class="text-muted smaller">Ẩm thực trưa</span>
                                                </div>
                                                <div class="fw-bold text-dark font-15">200.000 đ</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Mì Quảng Bếp Trang – Hương vị di sản</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Bếp Trang, 441 Ông Ích Khiêm, Q. Hải Châu, Đà Nẵng
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Đệ nhất Mì Quảng Ếch thơm phức, bánh tráng nướng giòn rụm và rau bắp chuối tươi giòn chuẩn vị xứ Quảng.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Day 3 - Item 3 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card card border-0 shadow-sm rounded-4 mb-3">
                                <div class="card-body p-3 p-md-4">
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="timeline-img-box">
                                            <img src="https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=350" alt="Cafe sông Hàn" class="rounded-3 w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-light text-primary border fw-semibold">14:00 – 16:30</span>
                                                    <span class="text-muted smaller">Thư giãn cafe & Check-in</span>
                                                </div>
                                                <div class="fw-bold text-success font-15">Tại chỗ</div>
                                            </div>
                                            <h6 class="fw-bold text-dark mb-1">Cafe view sông Hàn & Check-in Cầu Rồng, Cá Chép Hóa Rồng</h6>
                                            <div class="text-muted smaller mb-2">
                                                <i class="bx bx-map-pin text-danger me-1"></i>Bến du thuyền DHC Marina, Đường Trần Hưng Đạo, Q. Sơn Trà
                                            </div>
                                            <p class="text-secondary small mb-3">
                                                Uống cafe thư giãn ngắm cảnh sông Hàn, chụp ảnh kỉ niệm tại tượng Cá Chép Hóa Rồng và Cầu Rồng trước khi ra sân bay.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-end gap-2 border-top pt-2">
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-transfer me-1"></i>Đổi vị trí</button>
                                                <button class="btn btn-sm btn-light text-muted px-2 py-1"><i class="bx bx-edit me-1"></i>Chỉnh sửa</button>
                                                <button class="btn btn-sm btn-light text-danger px-2 py-1"><i class="bx bx-trash me-1"></i>Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: SIDEBAR WIDGETS (MAP, AI ASSISTANT, VOUCHER) -->
            <div class="col-lg-4">
                <div class="sticky-sidebar">
                    <!-- Widget 1: Bản đồ lộ trình -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                        <div class="card-body p-3 p-md-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                                    <i class="bx bx-map-alt text-primary font-18"></i>Bản đồ lộ trình
                                </h6>
                                <span class="badge bg-primary-subtle text-primary rounded-pill">11 điểm đến</span>
                            </div>

                            <!-- Map Visual Embed / Illustration -->
                            <div class="map-preview-container rounded-3 mb-3 position-relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=500" alt="Bản đồ Đà Nẵng" class="w-100 h-100 object-fit-cover map-bg-img">
                                <div class="map-overlay-badge d-flex align-items-center gap-1">
                                    <i class="bx bx-navigation text-primary"></i>
                                    <span>Tuyến: Sơn Trà → Mỹ Khê → Hội An</span>
                                    <span class="badge bg-primary ms-1">Tối ưu</span>
                                </div>
                            </div>

                            <!-- Key Route Waypoints -->
                            <div class="route-waypoints small">
                                <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                                    <span class="text-secondary"><i class="bx bxs-circle text-primary me-2 font-10"></i>Chùa Linh Ứng (Sơn Trà)</span>
                                    <span class="fw-semibold text-dark">08:30–11:30</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                                    <span class="text-secondary"><i class="bx bxs-circle text-info me-2 font-10"></i>Bãi biển Mỹ Khê</span>
                                    <span class="fw-semibold text-dark">16:00–18:30</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between py-1">
                                    <span class="text-secondary"><i class="bx bxs-circle text-warning me-2 font-10"></i>Bà Nà Hills (Cáp treo)</span>
                                    <span class="fw-semibold text-dark">08:00–16:00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widget 2: Trợ lý AI Du Lịch -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-3 p-md-4">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="ai-widget-icon">
                                    <i class="bx bx-bot"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0">Trợ Lý AI Du Lịch</h6>
                                    <small class="text-muted">Phân tích thời gian thực</small>
                                </div>
                            </div>

                            <!-- Weather Forecast for 3 Days -->
                            <div class="mb-3">
                                <div class="fw-semibold text-secondary smaller mb-2">DỰ BÁO THỜI TIẾT 15 - 17/05</div>
                                <div class="row g-2 text-center">
                                    <div class="col-4">
                                        <div class="weather-box p-2 rounded-3">
                                            <div class="smaller text-muted mb-1">Ngày 1</div>
                                            <i class="bx bx-sun text-warning font-22"></i>
                                            <div class="fw-bold small text-dark mt-1">31°C</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="weather-box p-2 rounded-3">
                                            <div class="smaller text-muted mb-1">Ngày 2</div>
                                            <i class="bx bx-cloud-sun text-info font-22"></i>
                                            <div class="fw-bold small text-dark mt-1">29°C</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="weather-box p-2 rounded-3">
                                            <div class="smaller text-muted mb-1">Ngày 3</div>
                                            <i class="bx bx-sun text-warning font-22"></i>
                                            <div class="fw-bold small text-dark mt-1">32°C</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Traffic Condition Note -->
                            <div class="traffic-note p-2 rounded-3 bg-light d-flex align-items-center justify-content-between mb-3 smaller">
                                <div><i class="bx bx-car text-muted me-1"></i>Mật độ kẹt xe Cầu Rồng 18:30 – 19:30:</div>
                                <span class="badge bg-warning-subtle text-warning fw-semibold">Khá đông (74%)</span>
                            </div>

                            <!-- Smart AI Suggestion Note -->
                            <div class="ai-insight-box p-3 rounded-3">
                                <div class="d-flex gap-2">
                                    <i class="bx bx-bulb text-primary font-18 flex-shrink-0 mt-1"></i>
                                    <p class="mb-0 smaller text-secondary">
                                        <strong class="text-primary">Gợi ý AI:</strong> Nên rời bãi biển Mỹ Khê muộn nhất lúc <strong>17:45</strong> để đến Hải sản Bé Mặn sớm, tránh hàng đợi giờ cao điểm 19:30.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widget 3: Voucher Độc Quyền -->
                    <div class="card border-0 rounded-4 voucher-promo-card text-white overflow-hidden shadow-sm">
                        <div class="card-body p-4 position-relative">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-white text-primary fw-bold rounded-pill px-3 py-1 smaller">VOUCHER ĐỘC QUYỀN</span>
                                <i class="bx bx-gift font-24 text-white-50"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Giảm 10% tại Hải sản Bé Mặn</h5>
                            <p class="smaller text-white-50 mb-3">
                                Áp dụng cho hóa đơn từ ngày 15/05 thông qua mã lộ trình <strong>PDI-82-BEDEL</strong>.
                            </p>
                            <button class="btn btn-light text-primary fw-bold w-100 rounded-pill btn-sm py-2 shadow-sm" @click="luuVoucher()">
                                Lưu voucher vào ví
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
    name: 'ClientHomeComponent',
    methods: {
        luuVoucher() {
            alert('Đã lưu mã voucher PDI-82-BEDEL vào ví ưu đãi của bạn thành công!');
        }
    }
}
</script>

<style scoped>
.itinerary-page-container {
    max-width: 1440px;
    margin: 0 auto;
}

/* 1. Title Banner Card */
.title-banner-card {
    background-color: #ffffff;
}

.badge-tag-ai {
    background-color: #e0f2fe;
    color: #0284c7;
    border: 1px solid #bae6fd;
    border-radius: 9999px;
    padding: 4px 12px;
    font-size: 11.5px;
    font-weight: 600;
}

.badge-tag-confirmed {
    background-color: #f0fdf4;
    color: #16a34a;
    border: 1px solid #bbf7d0;
    border-radius: 9999px;
    padding: 4px 12px;
    font-size: 11.5px;
    font-weight: 600;
}

.badge-tag-duration {
    background-color: #f8fafc;
    color: #475569;
    border: 1px solid #e2e8f0;
    border-radius: 9999px;
    padding: 4px 12px;
    font-size: 11.5px;
    font-weight: 600;
}

.itinerary-main-title {
    font-size: 24px;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.5px;
}

.itinerary-desc {
    font-size: 13.5px;
    line-height: 1.6;
}

.trip-meta-row {
    font-size: 13px;
}

.ai-efficiency-box {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
}

/* 2. Stat Cards */
.stat-card {
    background-color: #ffffff;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08) !important;
}

.stat-label {
    font-size: 13px;
    font-weight: 500;
    color: #64748b;
}

.stat-icon-circle {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
}

.bg-light-primary {
    background-color: #e0f2fe;
}

.bg-light-info {
    background-color: #e0f2fe;
}

.bg-light-cyan {
    background-color: #ecfeff;
}

.text-cyan {
    color: #0891b2;
}

.stat-value {
    font-size: 22px;
    letter-spacing: -0.5px;
}

.currency-symbol {
    font-size: 16px;
    font-weight: 500;
    color: #64748b;
}

/* 3. Day Section & Timeline */
.day-badge-box {
    width: 44px;
    height: 44px;
    background-color: #004b87;
    color: #ffffff;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    line-height: 1;
    box-shadow: 0 2px 6px rgba(0, 75, 135, 0.25);
}

.day-title-sub {
    font-size: 8px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.day-number {
    font-size: 17px;
    font-weight: 800;
}

.day-date-heading {
    font-weight: 700;
    color: #0f172a;
}

.timeline-container {
    position: relative;
    padding-left: 20px;
}

.timeline-container::before {
    content: '';
    position: absolute;
    top: 15px;
    bottom: 20px;
    left: 6px;
    width: 2px;
    background-color: #e2e8f0;
}

.timeline-item {
    position: relative;
}

.timeline-marker {
    position: absolute;
    left: -20px;
    top: 24px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background-color: #ffffff;
    border: 3px solid #0284c7;
    z-index: 2;
}

.timeline-card {
    background-color: #ffffff;
    transition: all 0.15s ease;
}

.timeline-card:hover {
    box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08) !important;
}

.timeline-img-box {
    width: 110px;
    height: 85px;
    flex-shrink: 0;
    border-radius: 8px;
    overflow: hidden;
}

@media (max-width: 576px) {
    .timeline-img-box {
        width: 100%;
        height: 140px;
    }
}

/* 4. Sidebar Widgets */
.sticky-sidebar {
    position: sticky;
    top: 130px;
}

.map-preview-container {
    height: 150px;
}

.map-bg-img {
    filter: brightness(0.92);
}

.map-overlay-badge {
    position: absolute;
    bottom: 10px;
    left: 10px;
    right: 10px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(4px);
    border-radius: 8px;
    padding: 6px 10px;
    font-size: 11.5px;
    font-weight: 600;
    color: #0f172a;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.ai-widget-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background-color: #e0f2fe;
    color: #0284c7;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.weather-box {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
}

.ai-insight-box {
    background-color: #f0f9ff;
    border: 1px solid #bae6fd;
}

.voucher-promo-card {
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
}

.smaller {
    font-size: 11.5px;
}
</style>