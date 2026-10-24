<template>
    <div class="ai-planner-wrapper">
        <!-- 1. TOP BANNER GRADIENT (HỆ THỐNG TỐI ƯU HÓA TUYẾN ĐIỂM ĐA MỤC TIÊU) -->
        <div class="ai-hero-banner">
            <div class="row align-items-center">
                <div class="col-lg-8 pe-lg-4">
                    <div class="d-inline-flex align-items-center gap-2 hero-tag-pill mb-3">
                        <i class="bx bx-cog font-14"></i>
                        <span>HỆ THỐNG TỐI ƯU HÓA TUYẾN TUYẾN ĐA MỤC TIÊU (OSRM + GA)</span>
                    </div>
                    <h1 class="hero-title mb-3">
                        Khởi Tạo Lịch Trình Đà Nẵng Cá Nhân Hóa Bằng Thuật Toán AI
                    </h1>
                    <p class="hero-desc mb-0">
                        Ứng dụng mô hình tối ưu hóa không gian & thời gian thực: Giảm thiểu quãng đường di chuyển (qua bảng <u>ma_tran_khoang_cach</u>), cực đại hóa chỉ số thỏa mãn sở thích và cân đối chặt chẽ <strong>ngân sách dự kiến</strong> của du khách.
                    </p>
                </div>
                <div class="col-lg-4 mt-3 mt-lg-0">
                    <div class="d-flex flex-column gap-3 align-items-lg-end">
                        <div class="hero-stat-card">
                            <div class="stat-icon-circle pink-glow">
                                <i class="bx bx-atom"></i>
                            </div>
                            <div class="stat-text">
                                <div class="stat-label">MA TRẬN ĐIỂM ĐẾN</div>
                                <div class="stat-value">150+ POI Đà Nẵng</div>
                            </div>
                        </div>
                        <div class="hero-stat-card">
                            <div class="stat-icon-circle cyan-glow">
                                <i class="bx bx-trending-up"></i>
                            </div>
                            <div class="stat-text">
                                <div class="stat-label">ĐỘ CHÍNH XÁC THUẬT TOÁN</div>
                                <div class="stat-value cyan-text">> 96.8% Fit Score</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. MAIN 2-COLUMN WORKSPACE -->
        <div class="row g-4 mt-1">
            <!-- LEFT COLUMN: 4 STEPS CONFIGURATION -->
            <div class="col-xl-8 col-lg-7">
                <!-- ================= BƯỚC 1: THỜI GIAN & ĐỐI TƯỢNG ================= -->
                <div class="step-card mb-4">
                    <div class="step-header d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="step-num">1</div>
                            <h5 class="step-title mb-0">Thời Gian & Đối Tượng Chuyến Đi</h5>
                        </div>
                        <span class="step-badge-code">Bảng 'lich_trinh'</span>
                    </div>

                    <!-- Row 1: Dates & Duration -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="field-label mb-1">
                                <i class="bx bx-calendar text-danger me-1"></i>NGÀY KHỞI HÀNH
                            </label>
                            <div class="input-date-wrap">
                                <input type="text" class="form-control date-input" v-model="form.ngay_khoi_hanh">
                                <i class="bx bx-calendar-event date-icon"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="field-label mb-1">
                                <i class="bx bx-calendar text-danger me-1"></i>NGÀY KẾT THÚC
                            </label>
                            <div class="input-date-wrap">
                                <input type="text" class="form-control date-input" v-model="form.ngay_ket_thuc">
                                <i class="bx bx-calendar-event date-icon"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="field-label mb-1">
                                <i class="bx bx-time text-danger me-1"></i>TỔNG THỜI GIAN
                            </label>
                            <div class="duration-pill">
                                <i class="bx bx-check-circle me-1"></i>3 Ngày 2 Đêm
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Members / Group Type -->
                    <div class="mb-4">
                        <label class="field-label mb-2">
                            <i class="bx bx-group text-danger me-1"></i>SỐ LƯỢNG & THÀNH VIÊN ĐI CÙNG
                        </label>
                        <div class="row g-2">
                            <div class="col-6 col-md-3" v-for="item in group_types" :key="item.id">
                                <div 
                                    class="selection-box group-box text-center" 
                                    :class="{ 'active': form.thanh_vien === item.id }"
                                    @click="form.thanh_vien = item.id"
                                >
                                    <div class="selection-icon mb-1">
                                        <i :class="item.icon"></i>
                                    </div>
                                    <div class="selection-text">{{ item.label }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row 3: Main Transport -->
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="field-label mb-0">
                                <i class="bx bx-navigation text-danger me-1"></i>PHƯƠNG TIỆN DI CHUYỂN CHÍNH (ẢNH HƯỞNG VẬN TỐC MA TRẬN OSRM)
                            </label>
                            <span class="speed-hint">Hệ số vận tốc: 35 km/h</span>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-4" v-for="t in transport_types" :key="t.id">
                                <div 
                                    class="selection-box transport-box d-flex align-items-center gap-3"
                                    :class="{ 'active': form.phuong_tien === t.id }"
                                    @click="form.phuong_tien = t.id"
                                >
                                    <div class="radio-indicator">
                                        <div class="radio-dot" v-if="form.phuong_tien === t.id"></div>
                                    </div>
                                    <div class="transport-icon-box">
                                        <i :class="t.icon"></i>
                                    </div>
                                    <div class="transport-info">
                                        <div class="transport-title">{{ t.title }}</div>
                                        <div class="transport-sub">{{ t.desc }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= BƯỚC 2: NGÂN SÁCH & NHỊP ĐỘ ================= -->
                <div class="step-card mb-4">
                    <div class="step-header d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="step-num">2</div>
                            <h5 class="step-title mb-0">Ngân Sách & Nhịp Độ Lịch Trình</h5>
                        </div>
                        <span class="step-badge-code">Tham số ràng buộc hàm mục tiêu</span>
                    </div>

                    <!-- Budget slider -->
                    <div class="budget-section mb-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="field-label mb-0">NGÂN SÁCH DỰ KIẾN / NGƯỜI</div>
                                <div class="field-sub">Vé tham quan, ăn uống đặc sản, dịch vụ vui chơi</div>
                            </div>
                            <div class="text-end">
                                <div class="budget-big-number">5.000.000 đ</div>
                                <div class="budget-tier-tag">MỨC TRUNG BÌNH KHÁ</div>
                            </div>
                        </div>
                        
                        <div class="slider-wrapper my-3">
                            <input type="range" class="custom-range-slider" min="1000000" max="15000000" step="500000" v-model="form.ngan_sach">
                        </div>
                        <div class="d-flex justify-content-between slider-labels">
                            <span>Tiết kiệm (1.000.000đ)</span>
                            <span class="fw-bold text-dark">Tiêu chuẩn (5.000.000đ)</span>
                            <span>Sang trọng (15.000.000đ)</span>
                        </div>
                    </div>

                    <!-- Pace selection -->
                    <div>
                        <label class="field-label mb-2">
                            <i class="bx bx-pulse text-danger me-1"></i>NHỊP ĐỘ THAM QUAN (MẬT ĐỘ POI PHÂN BỔ TRONG NGÀY)
                        </label>
                        <div class="row g-2">
                            <div class="col-md-4" v-for="p in pace_types" :key="p.id">
                                <div 
                                    class="selection-box pace-box"
                                    :class="{ 'active': form.nhip_do === p.id }"
                                    @click="form.nhip_do = p.id"
                                >
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="pace-name">{{ p.name }}</span>
                                        <span class="pace-density-pill" :class="{ 'active-pill': form.nhip_do === p.id }">{{ p.density }}</span>
                                    </div>
                                    <p class="pace-desc mb-0">{{ p.desc }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= BƯỚC 3: TRỌNG SỐ SỞ THÍCH ================= -->
                <div class="step-card mb-4">
                    <div class="step-header d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="step-num">3</div>
                            <h5 class="step-title mb-0">Trọng Số Sở Thích Du Khách ('the_so_thich')</h5>
                        </div>
                        <span class="badge-rec-pink">
                            <i class="bx bx-sparkles me-1"></i>Mẫu Giới Trẻ Đề Xuất
                        </span>
                    </div>
                    <p class="field-sub mb-3">
                        Chọn các danh mục ưu tiên để thuật toán tăng hệ số điểm thỏa mãn (Utility Function) cho các địa điểm tương ứng:
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <button 
                            v-for="tag in preference_tags" 
                            :key="tag.id"
                            type="button" 
                            class="pref-chip"
                            :class="[tag.colorClass, { 'selected': isTagSelected(tag.id) }]"
                            @click="toggleTag(tag.id)"
                        >
                            <span class="chip-text">{{ tag.label }}</span>
                            <i :class="isTagSelected(tag.id) ? 'bx bx-check-circle chip-icon' : 'bx bx-plus chip-icon'"></i>
                        </button>
                    </div>
                </div>

                <!-- ================= BƯỚC 4: ĐIỂM KHỞI HÀNH & NƠI LƯU TRÚ ================= -->
                <div class="step-card mb-4">
                    <div class="step-header d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="step-num">4</div>
                            <h5 class="step-title mb-0">Điểm Khởi Hành & Nơi Lưu Trú</h5>
                        </div>
                        <span class="step-badge-code">Tọa độ gốc (Node 0)</span>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="field-label mb-1">
                                <i class="bx bx-trip text-danger me-1"></i>ĐIỂM ĐÓN / KHỞI HÀNH NGÀY ĐẦU
                            </label>
                            <select class="form-select custom-select-origin" v-model="form.diem_don">
                                <option value="dad">Sân bay Quốc tế Đà Nẵng (DAD - Qu...</option>
                                <option value="ga">Ga Đà Nẵng</option>
                                <option value="ks">Tại khách sạn</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="field-label mb-1">
                                <i class="bx bx-hotel text-danger me-1"></i>ĐỊA CHỈ KHÁCH SẠN / HOMESTAY DỰ KIẾN
                            </label>
                            <div class="position-relative">
                                <input type="text" class="form-control pe-5" v-model="form.dia_chi_ks">
                                <i class="bx bx-map-pin position-absolute top-50 end-0 translate-middle-y me-3 text-primary font-18"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Interactive Map Card Preview -->
                    <div class="osm-map-preview-card">
                        <div class="map-visual-box">
                            <!-- Vector / Stylized Da Nang Coastal Map -->
                            <svg viewBox="0 0 700 240" fill="none" class="map-svg-art">
                                <!-- Background Water -->
                                <rect width="700" height="240" fill="#dbeafe" />
                                <!-- Land mass Da Nang -->
                                <path d="M0,40 Q180,60 260,20 Q340,-20 420,50 Q480,110 490,170 Q430,240 380,240 L0,240 Z" fill="#e2e8f0" stroke="#cbd5e1" stroke-width="2" />
                                <!-- Son Tra peninsula -->
                                <path d="M420,50 Q490,10 540,60 Q560,110 500,120 Z" fill="#cbd5e1" stroke="#94a3b8" stroke-width="1.5" />
                                <!-- Coastline road Vo Nguyen Giap -->
                                <path d="M430,120 Q440,160 420,240" stroke="#f59e0b" stroke-width="3" stroke-dasharray="4 2" />
                                <!-- Han River -->
                                <path d="M300,40 Q315,100 280,160 Q270,200 260,240" stroke="#93c5fd" stroke-width="8" stroke-linecap="round" />
                                <!-- Location Pins -->
                                <g transform="translate(290, 80)">
                                    <circle cx="0" cy="0" r="14" fill="#ec4899" fill-opacity="0.3" />
                                    <circle cx="0" cy="0" r="7" fill="#be185d" />
                                    <text x="12" y="4" font-size="11" font-weight="bold" fill="#0f172a">DAD Airport (Node 0)</text>
                                </g>
                                <g transform="translate(435, 140)">
                                    <circle cx="0" cy="0" r="14" fill="#3b82f6" fill-opacity="0.3" />
                                    <circle cx="0" cy="0" r="7" fill="#1d4ed8" />
                                    <text x="12" y="4" font-size="11" font-weight="bold" fill="#0f172a">Bãi biển Mỹ Khê</text>
                                </g>
                                <g transform="translate(480, 70)">
                                    <circle cx="0" cy="0" r="6" fill="#10b981" />
                                    <text x="10" y="4" font-size="10" fill="#475569">Sơn Trà & Linh Ứng</text>
                                </g>
                            </svg>
                            <!-- Bottom Map Anchor Bar -->
                            <div class="map-anchor-bar">
                                <i class="bx bx-navigation font-16 text-danger"></i>
                                <span>Tọa độ neo thuật toán: <strong>16.0592° N, 108.2435° E</strong> (Khu vực Bãi biển Mỹ Khê)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= BOTTOM ACTION BAR ================= -->
                <div class="d-flex align-items-center gap-3 mt-4 mb-5">
                    <button type="button" class="btn-run-algorithm" @click="runOptimizer">
                        <i class="bx bx-rocket font-20"></i>
                        <span>CHẠY THUẬT TOÁN TỐI ƯU LỊCH TRÌNH</span>
                    </button>
                    <button type="button" class="btn-save-preset" @click="applySavedPreset">
                        <i class="bx bx-bookmark font-18 me-1"></i>
                        <span>Áp Dụng Cấu Hình Đã Lưu</span>
                    </button>
                </div>
            </div>

            <!-- RIGHT COLUMN: SIMULATION, SAMPLES, WEATHER -->
            <div class="col-xl-4 col-lg-5">
                <!-- ================= CARD 1: MÔ PHỎNG TỐI ƯU HÓA TUYẾN TUYẾN ================= -->
                <div class="side-card mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="dot-status-green"></span>
                            <span class="engine-ready-text">ĐÀ NẴNG AI ENGINE READY</span>
                        </div>
                        <span class="badge-version">v3.5 Optimizer</span>
                    </div>

                    <h5 class="side-card-title mb-4">Mô Phỏng Tối Ưu Hóa Tuyến Tuyến</h5>

                    <!-- Big Doughnut Gauge 96.4% -->
                    <div class="gauge-center-wrapper">
                        <div class="radial-gauge-container">
                            <div class="gauge-inner-circle">
                                <div class="gauge-number">96.4%</div>
                                <div class="gauge-label">ĐỘ PHÙ HỢP</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-4 my-3 gauge-sub-metrics">
                        <div class="d-flex align-items-center gap-1 font-12">
                            <span class="dot-stat pink-bg"></span>
                            <span class="text-muted">Tiết kiệm đường</span>
                            <strong class="text-dark">~36%</strong>
                        </div>
                        <div class="d-flex align-items-center gap-1 font-12">
                            <span class="dot-stat cyan-bg"></span>
                            <span class="text-muted">Thỏa mãn gu</span>
                            <strong class="text-dark">98%</strong>
                        </div>
                    </div>

                    <hr class="divider-subtle my-3">

                    <!-- Checklist Pipeline -->
                    <div class="pipeline-checklist">
                        <div class="pipeline-title mb-2">TIẾN TRÌNH XỬ LÝ DỮ LIỆU:</div>
                        <div class="pipeline-item done">
                            <i class="bx bx-check-circle"></i>
                            <span>Lọc 150+ POI qua thẻ <u>the_so_thich</u></span>
                        </div>
                        <div class="pipeline-item done">
                            <i class="bx bx-check-circle"></i>
                            <span>Truy vấn ma trận khoảng cách <u>OSRM Table API</u></span>
                        </div>
                        <div class="pipeline-item done">
                            <i class="bx bx-check-circle"></i>
                            <span>Phân bổ khung giờ mở cửa & nhịp sinh học</span>
                        </div>
                        <div class="pipeline-item pending">
                            <i class="bx bx-radio-circle"></i>
                            <span>Xuất bản ghi <u>lich_trinh</u> & <u>chi_tiet_lich_trinh</u></span>
                        </div>
                    </div>
                </div>

                <!-- ================= CARD 2: LỊCH TRÌNH MẪU THAM KHẢO ================= -->
                <div class="side-card mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-time-five text-purple font-16"></i>
                            <span class="sample-label">LỊCH TRÌNH MẪU THAM KHẢO</span>
                        </div>
                        <span class="badge-hot-pink">Phổ biến</span>
                    </div>

                    <h6 class="sample-tour-title mb-1">
                        Đà Nẵng Rực Rỡ: Biển Xanh - Bà Nà - Phố Sông Hàn (3N2Đ)
                    </h6>
                    <p class="sample-tour-desc mb-3">
                        Mô hình đã được 1.240+ du khách sử dụng thành công với chi phí bình quân 4.800.000đ.
                    </p>

                    <div class="day-segments-list mb-3">
                        <div class="day-segment-row">
                            <span class="segment-text">Ngày 1: Bán Đảo Sơn Trà - Biển Mỹ Khê - Chợ Đêm</span>
                            <span class="poi-counter-badge">4 POI</span>
                        </div>
                        <div class="day-segment-row">
                            <span class="segment-text">Ngày 2: Trọn ngày Sun World Bà Nà Hills & Cầu Vàng</span>
                            <span class="poi-counter-badge highlight">1 Siêu POI</span>
                        </div>
                        <div class="day-segment-row">
                            <span class="segment-text">Ngày 3: Ngũ Hành Sơn - Mua sắm Chợ Cồn - Cà phê Phố</span>
                            <span class="poi-counter-badge">3 POI</span>
                        </div>
                    </div>

                    <button type="button" class="btn-load-sample-wizard" @click="loadSampleTour">
                        <i class="bx bx-log-in-circle me-1 font-16"></i>
                        <span>Nạp Mẫu Lịch Trình Này Vào Wizard</span>
                    </button>
                </div>

                <!-- ================= CARD 3: THỜI TIẾT ĐÀ NẴNG ================= -->
                <div class="weather-widget-card">
                    <div class="d-flex align-items-center gap-3">
                        <div class="weather-sun-icon">
                            <i class="bx bx-sun"></i>
                        </div>
                        <div>
                            <div class="weather-headline">Thời Tiết Đà Nẵng Tuần Này: 29°C - Nắng Nhẹ</div>
                            <div class="weather-sub">Rất lý tưởng cho các hoạt động tắm biển và cáp treo Bà Nà.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AiTravelPlannerComponent',
    data() {
        return {
            form: {
                ngay_khoi_hanh: '06/16/2026',
                ngay_ket_thuc: '06/17/2026',
                thanh_vien: 'couple', // 'solo', 'couple', 'friends', 'family'
                phuong_tien: 'bike',  // 'bike', 'car', 'walk'
                ngan_sach: 5000000,
                nhip_do: 'vua_phai',  // 'thong_tha', 'vua_phai', 'day_dac'
                diem_don: 'dad',
                dia_chi_ks: 'Khách sạn ven biển đường Võ Nguyên Giáp'
            },
            group_types: [
                { id: 'solo', label: 'Đi 1 mình', icon: 'bx bx-user' },
                { id: 'couple', label: 'Cặp đôi (2 người)', icon: 'bx bxs-heart' },
                { id: 'friends', label: 'Nhóm bạn (3-5)', icon: 'bx bxs-group' },
                { id: 'family', label: 'Gia đình có trẻ nhỏ', icon: 'bx bxs-home-heart' }
            ],
            transport_types: [
                { id: 'bike', title: 'Xe máy tự lái', desc: 'Linh hoạt, tối ưu hẻm phố', icon: 'bx bx-cycling' },
                { id: 'car', title: 'Ô tô / Taxi Grab', desc: 'Thoải mái, tránh nắng mưa', icon: 'bx bx-car' },
                { id: 'walk', title: 'Đi bộ & Xe đạp', desc: 'Chậm rãi khu phố cổ / biển', icon: 'bx bx-walk' }
            ],
            pace_types: [
                { id: 'thong_tha', name: 'Thong Thả', density: '3-3 điểm/ngày', desc: 'Nghỉ ngơi nhiều, thích hợp nghỉ dưỡng, cafe ngắm biển.' },
                { id: 'vua_phai', name: 'Vừa Phải (Đề Xuất)', density: '4-5 điểm/ngày', desc: 'Cân bằng hoàn hảo giữa check-in, ẩm thực và thư giãn.' },
                { id: 'day_dac', name: 'Dày Đặc', density: '6-7 điểm/ngày', desc: 'Khám phá tối đa, dành cho du khách trẻ thích trải nghiệm nhanh.' }
            ],
            selected_tag_ids: [1, 2, 3, 4],
            preference_tags: [
                { id: 1, label: 'Bãi Biển Mỹ Khê & Bán Đảo', colorClass: 'chip-rose' },
                { id: 2, label: 'Ẩm Thực Miền Trung (Mì Quảng, Bánh Xèo)', colorClass: 'chip-indigo' },
                { id: 3, label: 'Khu Du Lịch Bà Nà Hills & Cầu Vàng', colorClass: 'chip-teal' },
                { id: 4, label: 'Chợ Đêm Sơn Trà & Phố Đi Bộ', colorClass: 'chip-magenta' },
                { id: 5, label: 'Bán Đảo Sơn Trà & Chùa Linh Ứng', colorClass: 'chip-outline-purple' },
                { id: 6, label: 'Bảo Tàng Điêu Khắc Chăm Pa', colorClass: 'chip-outline-blue' },
                { id: 7, label: 'Cafe Check-in View Sông Hàn / Hoàng Hôn', colorClass: 'chip-outline-pink' },
                { id: 8, label: 'Danh Thắng Ngũ Hành Sơn', colorClass: 'chip-outline-violet' },
                { id: 9, label: 'Du Thuyền Ngắm Cầu Rồng Phun Lửa', colorClass: 'chip-outline-cyan' }
            ]
        };
    },
    methods: {
        isTagSelected(id) {
            return this.selected_tag_ids.includes(id);
        },
        toggleTag(id) {
            const idx = this.selected_tag_ids.indexOf(id);
            if (idx > -1) {
                this.selected_tag_ids.splice(idx, 1);
            } else {
                this.selected_tag_ids.push(id);
            }
        },
        runOptimizer() {
            if (this.$toast) {
                this.$toast.success('Đang khởi chạy thuật toán OSRM Table API & Genetic Algorithm...');
            }
            setTimeout(() => {
                this.$router.push('/client/lich-trinh-toi-uu');
            }, 600);
        },
        applySavedPreset() {
            if (this.$toast) {
                this.$toast.info('Đã tải cấu hình mẫu 3N2Đ thành công!');
            }
        },
        loadSampleTour() {
            this.form.ngan_sach = 4800000;
            this.form.thanh_vien = 'couple';
            this.form.nhip_do = 'vua_phai';
            this.selected_tag_ids = [1, 2, 3, 4, 5];
            if (this.$toast) {
                this.$toast.success('Đã nạp thông số tour mẫu vào Wizard thành công!');
            }
        }
    }
};
</script>

<style scoped>
.ai-planner-wrapper {
    font-family: inherit;
    color: #1e293b;
}

/* ================= 1. HERO BANNER ================= */
.ai-hero-banner {
    background: linear-gradient(135deg, #a21caf 0%, #db2777 45%, #e11d48 100%);
    border-radius: 20px;
    padding: 28px 32px;
    box-shadow: 0 10px 30px rgba(219, 39, 119, 0.25);
}

.hero-tag-pill {
    background: rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 14px;
    border-radius: 999px;
    letter-spacing: 0.5px;
}

.hero-title {
    font-size: 1.65rem;
    font-weight: 800;
    line-height: 1.25;
    color: #ffffff;
    letter-spacing: -0.3px;
}

.hero-desc {
    font-size: 0.82rem;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.9);
}

.hero-stat-card {
    background: rgba(255, 255, 255, 0.22);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.35);
    border-radius: 14px;
    padding: 10px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 230px;
}

.stat-icon-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.stat-icon-circle.pink-glow {
    background: #ffffff;
    color: #db2777;
}

.stat-icon-circle.cyan-glow {
    background: #0284c7;
    color: #ffffff;
}

.stat-label {
    font-size: 0.62rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    color: rgba(255, 255, 255, 0.8);
}

.stat-value {
    font-size: 0.95rem;
    font-weight: 800;
    color: #ffffff;
}

.stat-value.cyan-text {
    color: #a5f3fc;
}

/* ================= 2. STEP CARD CONTAINER ================= */
.step-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 24px 26px;
    box-shadow: 0 2px 12px rgba(15, 23, 42, 0.04);
    border: 1px solid #f1f5f9;
}

.step-num {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #fdf2f8;
    color: #db2777;
    border: 1.5px solid #fbcfe8;
    font-weight: 800;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.step-title {
    font-size: 1rem;
    font-weight: 700;
    color: #0f172a;
}

.step-badge-code {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #64748b;
    font-size: 0.72rem;
    font-weight: 600;
    padding: 2px 10px;
    border-radius: 999px;
    font-family: monospace;
}

.field-label {
    font-size: 0.72rem;
    font-weight: 700;
    color: #475569;
    letter-spacing: 0.3px;
    display: flex;
    align-items: center;
}

.field-sub {
    font-size: 0.75rem;
    color: #64748b;
}

/* Date Input & Duration */
.input-date-wrap {
    position: relative;
}

.date-input {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    padding: 8px 12px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #0f172a;
}

.date-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    pointer-events: none;
}

.duration-pill {
    background: #f3e8ff;
    color: #7e22ce;
    border: 1.5px solid #e9d5ff;
    border-radius: 10px;
    padding: 8px 12px;
    font-size: 0.85rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Group Selection */
.selection-box {
    border: 1.5px solid #f1f5f9;
    background: #ffffff;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    user-select: none;
}

.group-box {
    padding: 14px 10px;
    background: #fdf2f8;
    border-color: #fce7f3;
}

.group-box:hover {
    border-color: #f472b6;
}

.group-box.active {
    background: #db2777 !important;
    border-color: #db2777 !important;
    color: #ffffff !important;
    box-shadow: 0 4px 14px rgba(219, 39, 119, 0.35);
}

.group-box.active .selection-icon,
.group-box.active .selection-text {
    color: #ffffff !important;
}

.selection-icon {
    font-size: 1.35rem;
    color: #db2777;
}

.selection-text {
    font-size: 0.78rem;
    font-weight: 700;
    color: #334155;
}

/* Transport Selection */
.speed-hint {
    font-size: 0.72rem;
    font-weight: 700;
    color: #0284c7;
}

.transport-box {
    padding: 10px 12px;
    background: #f8fafc;
    border-color: #e2e8f0;
}

.transport-box.active {
    background: #e0f2fe !important;
    border-color: #38bdf8 !important;
}

.radio-indicator {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 2px solid #cbd5e1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.transport-box.active .radio-indicator {
    border-color: #0284c7;
}

.radio-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #0284c7;
}

.transport-icon-box {
    font-size: 1.4rem;
    color: #0284c7;
}

.transport-title {
    font-size: 0.82rem;
    font-weight: 700;
    color: #0f172a;
}

.transport-sub {
    font-size: 0.68rem;
    color: #64748b;
}

/* Budget Slider */
.budget-big-number {
    font-size: 1.25rem;
    font-weight: 800;
    color: #db2777;
    line-height: 1.2;
}

.budget-tier-tag {
    font-size: 0.65rem;
    font-weight: 700;
    color: #94a3b8;
}

.custom-range-slider {
    width: 100%;
    accent-color: #db2777;
    height: 6px;
    border-radius: 4px;
}

.slider-labels {
    font-size: 0.72rem;
    color: #64748b;
}

/* Pace Selection */
.pace-box {
    padding: 12px 14px;
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
}

.pace-box.active {
    background: #fdf2f8 !important;
    border-color: #f472b6 !important;
}

.pace-name {
    font-size: 0.82rem;
    font-weight: 700;
    color: #0f172a;
}

.pace-density-pill {
    background: #f1f5f9;
    color: #475569;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 2px 6px;
    border-radius: 6px;
}

.pace-density-pill.active-pill {
    background: #db2777;
    color: #ffffff;
}

.pace-desc {
    font-size: 0.7rem;
    color: #64748b;
    line-height: 1.35;
}

/* Preference Chips (Tag Sở Thích) */
.badge-rec-pink {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 2px 10px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
}

.pref-chip {
    padding: 7px 14px;
    border-radius: 999px;
    font-size: 0.8rem;
    font-weight: 600;
    border: 1.5px solid transparent;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.15s ease;
}

/* Individual chip color schemes like image */
.chip-rose {
    background: #db2777;
    color: #ffffff;
}

.chip-indigo {
    background: #4f46e5;
    color: #ffffff;
}

.chip-teal {
    background: #0891b2;
    color: #ffffff;
}

.chip-magenta {
    background: #be185d;
    color: #ffffff;
}

.chip-outline-purple {
    background: #f8fafc;
    border-color: #e9d5ff;
    color: #7e22ce;
}

.chip-outline-blue {
    background: #f8fafc;
    border-color: #bae6fd;
    color: #0369a1;
}

.chip-outline-pink {
    background: #f8fafc;
    border-color: #fbcfe8;
    color: #be185d;
}

.chip-outline-violet {
    background: #f8fafc;
    border-color: #ddd6fe;
    color: #6d28d9;
}

.chip-outline-cyan {
    background: #f8fafc;
    border-color: #cffafe;
    color: #0e7490;
}

.chip-icon {
    font-size: 1rem;
}

/* Step 4 Map Preview */
.osm-map-preview-card {
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    position: relative;
    background: #dbeafe;
}

.map-visual-box {
    position: relative;
    height: 180px;
    width: 100%;
}

.map-svg-art {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.map-anchor-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(15, 23, 42, 0.75);
    backdrop-filter: blur(4px);
    color: #ffffff;
    padding: 6px 14px;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Bottom Actions */
.btn-run-algorithm {
    flex: 1 1 auto;
    background: linear-gradient(135deg, #a21caf 0%, #db2777 50%, #e11d48 100%);
    color: #ffffff;
    border: none;
    border-radius: 999px;
    padding: 14px 28px;
    font-size: 0.95rem;
    font-weight: 800;
    letter-spacing: 0.4px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    box-shadow: 0 8px 24px rgba(219, 39, 119, 0.4);
    cursor: pointer;
    transition: transform 0.15s, box-shadow 0.15s;
}

.btn-run-algorithm:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 28px rgba(219, 39, 119, 0.5);
}

.btn-save-preset {
    background: #ede9fe;
    color: #6d28d9;
    border: 1px solid #ddd6fe;
    border-radius: 999px;
    padding: 14px 24px;
    font-size: 0.85rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s;
    white-space: nowrap;
}

.btn-save-preset:hover {
    background: #ddd6fe;
}

/* ================= 3. RIGHT SIDEBAR CARDS ================= */
.side-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 22px;
    border: 1px solid #f1f5f9;
    box-shadow: 0 2px 12px rgba(15, 23, 42, 0.04);
}

.dot-status-green {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #10b981;
}

.engine-ready-text {
    font-size: 0.68rem;
    font-weight: 800;
    color: #059669;
    letter-spacing: 0.5px;
}

.badge-version {
    background: #e0f2fe;
    color: #0369a1;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 6px;
}

.side-card-title {
    font-size: 0.95rem;
    font-weight: 800;
    color: #0f172a;
}

/* Doughnut Circle Gauge */
.gauge-center-wrapper {
    display: flex;
    justify-content: center;
    margin: 10px 0;
}

.radial-gauge-container {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background: conic-gradient(#db2777 0% 96.4%, #f1f5f9 96.4% 100%);
    padding: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gauge-inner-circle {
    width: 100%;
    height: 100%;
    background: #ffffff;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.gauge-number {
    font-size: 1.35rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1;
}

.gauge-label {
    font-size: 0.62rem;
    font-weight: 700;
    color: #94a3b8;
    margin-top: 3px;
}

.dot-stat {
    width: 7px;
    height: 7px;
    border-radius: 50%;
}

.dot-stat.pink-bg {
    background: #ec4899;
}

.dot-stat.cyan-bg {
    background: #0284c7;
}

.divider-subtle {
    border-color: #f1f5f9;
}

/* Pipeline Checklist */
.pipeline-title {
    font-size: 0.68rem;
    font-weight: 800;
    color: #64748b;
    letter-spacing: 0.5px;
}

.pipeline-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.75rem;
    margin-bottom: 6px;
    color: #475569;
}

.pipeline-item.done i {
    color: #10b981;
    font-size: 0.95rem;
}

.pipeline-item.pending i {
    color: #94a3b8;
    font-size: 0.95rem;
}

.pipeline-item u {
    font-family: monospace;
    color: #be185d;
    font-weight: 600;
}

/* Sample Tour Card */
.sample-label {
    font-size: 0.68rem;
    font-weight: 800;
    color: #6d28d9;
    letter-spacing: 0.4px;
}

.badge-hot-pink {
    background: #db2777;
    color: #ffffff;
    font-size: 0.62rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 999px;
}

.sample-tour-title {
    font-size: 0.88rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.35;
}

.sample-tour-desc {
    font-size: 0.72rem;
    color: #64748b;
    line-height: 1.45;
}

.day-segments-list {
    background: #f8fafc;
    border-radius: 12px;
    padding: 8px 12px;
}

.day-segment-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 6px 0;
    border-bottom: 1px solid #f1f5f9;
    font-size: 0.72rem;
}

.day-segment-row:last-child {
    border-bottom: none;
}

.segment-text {
    font-weight: 600;
    color: #334155;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-right: 8px;
}

.poi-counter-badge {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #6d28d9;
    font-size: 0.65rem;
    font-weight: 800;
    padding: 2px 6px;
    border-radius: 6px;
    flex-shrink: 0;
}

.poi-counter-badge.highlight {
    background: #fdf2f8;
    border-color: #fbcfe8;
    color: #be185d;
}

.btn-load-sample-wizard {
    width: 100%;
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 999px;
    padding: 8px 14px;
    font-size: 0.78rem;
    font-weight: 700;
    color: #0f172a;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s;
}

.btn-load-sample-wizard:hover {
    background: #fdf2f8;
    border-color: #f472b6;
    color: #db2777;
}

/* Weather Widget Card */
.weather-widget-card {
    background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
    border-radius: 16px;
    padding: 16px 18px;
    border: 1px solid #7dd3fc;
}

.weather-sun-icon {
    font-size: 2.2rem;
    color: #0284c7;
    flex-shrink: 0;
}

.weather-headline {
    font-size: 0.8rem;
    font-weight: 800;
    color: #0369a1;
}

.weather-sub {
    font-size: 0.7rem;
    color: #0284c7;
    margin-top: 2px;
}

.font-12 {
    font-size: 12px;
}

.font-14 {
    font-size: 14px;
}

.font-16 {
    font-size: 16px;
}

.font-18 {
    font-size: 18px;
}

.font-20 {
    font-size: 20px;
}
</style>
