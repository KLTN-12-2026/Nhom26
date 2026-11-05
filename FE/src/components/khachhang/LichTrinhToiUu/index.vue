<template>
    <div class="optimal-itinerary-container">
        <!-- 1. TOP SYSTEM OPTIMIZER STATUS NOTIFICATION -->
        <div class="optimizer-status-banner">
            <div class="status-left">
                <div class="optimizer-icon-circle">
                    <i class="bx bx-bolt-circle"></i>
                </div>
                <div class="status-main-text">
                    <strong>AI Optimizer v3.4:</strong> Giải thuật di truyền kết hợp Ma trận khoảng cách OSRM (Open Source Routing Machine).
                </div>
            </div>
            <div class="status-badges-group">
                <span class="status-pill pill-pink">
                    <i class="bx bx-check me-1"></i> 97.5% Tương thích sở thích
                </span>
                <span class="status-pill pill-cyan">
                    <i class="bx bx-tachometer me-1"></i> -42 phút di chuyển
                </span>
                <span class="status-pill pill-purple">
                    <i class="bx bx-map-pin me-1"></i> 4/4 Điểm khóa OSRM
                </span>
            </div>
        </div>

        <!-- 2. TRIP HEADER SUMMARY CARD -->
        <div class="trip-header-card">
            <div class="trip-header-top">
                <div class="trip-tags-row">
                    <span class="badge-code">MÃ LỊCH TRÌNH: #DN-2025-3N2D</span>
                    <span class="badge-pref">Sở thích: Văn hóa, Ẩm thực & Biển</span>
                    <span class="badge-time"><i class="bx bx-time me-1"></i> Cập nhật: 3 phút trước</span>
                </div>

                <div class="trip-actions-row">
                    <button type="button" class="btn-trip-primary" @click="handleRecalculate">
                        <i class="bx bx-refresh me-1 font-18" :class="{ 'bx-spin': isRecalculating }"></i>
                        <span>Tính toán lại lộ trình</span>
                    </button>
                    <button type="button" class="btn-trip-outline" @click="handleSaveTrip">
                        <i class="bx bx-bookmark me-1"></i>
                        <span>Lưu lịch trình</span>
                    </button>
                    <div class="trip-mini-actions">
                        <button type="button" class="btn-icon-action" title="Sao chép lịch trình" @click="handleCopy">
                            <i class="bx bx-copy"></i>
                            <span class="btn-text">Sao chép</span>
                        </button>
                        <button type="button" class="btn-icon-action" title="Xuất PDF" @click="handleExportPDF">
                            <i class="bx bx-file"></i>
                            <span class="btn-text">Xuất PDF</span>
                        </button>
                        <button type="button" class="btn-icon-action btn-danger-action" title="Xóa lịch trình" @click="handleDelete">
                            <i class="bx bx-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="trip-title-row">
                <h1 class="trip-main-title">
                    Hành Trình Khám Phá Đà Nẵng 3N2Đ: Biển Xanh & Di Sản
                    <button type="button" class="btn-edit-title" title="Chỉnh sửa tên lịch trình" @click="editTripTitle">
                        <i class="bx bx-edit-alt"></i>
                    </button>
                </h1>
            </div>

            <div class="trip-meta-row">
                <div class="meta-item">
                    <i class="bx bx-calendar text-pink me-1"></i>
                    <span>15/06/2025 – 17/06/2025 (3 ngày 2 đêm)</span>
                </div>
                <div class="meta-item">
                    <i class="bx bx-user text-pink me-1"></i>
                    <span>2 người lớn</span>
                </div>
                <div class="meta-item">
                    <i class="bx bx-cycling text-pink me-1"></i>
                    <span>Phương tiện: Xe máy thuê tự lái</span>
                </div>
            </div>
        </div>

        <!-- 3. DAY SELECTOR TABS & SUB-BAR -->
        <div class="day-navigation-wrapper">
            <div class="day-tabs-row">
                <div class="day-tabs-left">
                    <button 
                        type="button" 
                        class="day-tab-btn" 
                        :class="{ active: currentDay === 1 }"
                        @click="switchDay(1)"
                    >
                        <i class="bx bx-sun me-1"></i>
                        <span>Ngày 1 • 15/06</span>
                    </button>
                    <button 
                        type="button" 
                        class="day-tab-btn" 
                        :class="{ active: currentDay === 2 }"
                        @click="switchDay(2)"
                    >
                        <i class="bx bx-water me-1"></i>
                        <span>Ngày 2 • 16/06</span>
                    </button>
                    <button 
                        type="button" 
                        class="day-tab-btn" 
                        :class="{ active: currentDay === 3 }"
                        @click="switchDay(3)"
                    >
                        <i class="bx bx-moon me-1"></i>
                        <span>Ngày 3 • 17/06</span>
                    </button>
                </div>

                <div class="day-stats-right">
                    <span class="day-stat-badge">
                        <i class="bx bx-map-pin me-1 text-pink"></i> {{ activeDayData.legsCount }} chặng
                    </span>
                    <span class="day-stat-badge">
                        <i class="bx bx-car me-1 text-cyan"></i> {{ activeDayData.totalDistance }} km
                    </span>
                </div>
            </div>

            <!-- Sub Control bar -->
            <div class="day-controls-subbar">
                <div class="controls-left">
                    <span class="control-tip">
                        <i class="bx bx-move me-1"></i> Kéo thả sắp xếp
                    </span>
                    <span class="control-tip">
                        <i class="bx bx-lock-alt me-1"></i> Khóa điểm cố định
                    </span>
                </div>
                <div class="controls-right">
                    <button type="button" class="btn-unlock-all" @click="unlockAllPOIs">
                        <i class="bx bx-lock-open-alt me-1"></i> Mở toàn bộ khóa
                    </button>
                </div>
            </div>
        </div>

        <!-- 4. MAIN CONTENT: 2-COLUMN LAYOUT -->
        <div class="row g-4 mt-1">
            <!-- LEFT COLUMN: TIMELINE LỘ TRÌNH CHI TIẾT -->
            <div class="col-12 col-xl-7">
                <!-- 1. Điểm xuất phát (Departure Point) -->
                <div class="departure-point-card">
                    <div class="departure-icon-box">
                        <i class="bx bx-trip"></i>
                    </div>
                    <div class="departure-content">
                        <div class="departure-label-row">
                            <span class="label-text">ĐIỂM XUẤT PHÁT</span>
                            <span class="label-time">08:30 Sáng</span>
                        </div>
                        <h4 class="departure-title">{{ activeDayData.departure.name }}</h4>
                        <p class="departure-desc">{{ activeDayData.departure.note }}</p>
                    </div>
                    <div class="departure-action">
                        <span class="badge-anchor">Điểm neo</span>
                    </div>
                </div>

                <!-- Loop through POIs with Transit Connectors -->
                <div class="timeline-pois-container">
                    <div 
                        v-for="(item, index) in activeDayData.pois" 
                        :key="item.id"
                        class="timeline-poi-block"
                    >
                        <!-- Transit Connector -->
                        <div class="transit-connector-wrap">
                            <div class="connector-line"></div>
                            <div class="transit-pill-box">
                                <i class="bx bx-car transit-car-icon"></i>
                                <span class="transit-text">{{ item.transit.distance }} • {{ item.transit.duration }} • qua {{ item.transit.route }}</span>
                                <span class="transit-status-badge" v-if="item.transit.status">
                                    {{ item.transit.status }}
                                </span>
                            </div>
                        </div>

                        <!-- POI Card -->
                        <div class="poi-card-item" :class="{ 'is-locked': item.locked }">
                            <div class="poi-card-left-number">
                                <div class="poi-number-circle" :class="'circle-' + item.color">
                                    {{ index + 1 }}
                                </div>
                                <div class="poi-drag-handle" title="Kéo để đổi thứ tự">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </div>
                            </div>

                            <div class="poi-card-main-content">
                                <div class="poi-top-meta">
                                    <div class="poi-badges-left">
                                        <span class="poi-category-badge" :class="'cat-' + item.color">
                                            {{ item.category }}
                                        </span>
                                        <span class="poi-time-badge">
                                            <i class="bx bx-time-five me-1"></i> {{ item.timeRange }} ({{ item.duration }})
                                        </span>
                                    </div>

                                    <div class="poi-actions-right">
                                        <span class="poi-lock-status" v-if="item.lockReason">
                                            {{ item.lockReason }}
                                        </span>
                                        <button 
                                            type="button" 
                                            class="btn-poi-icon" 
                                            :class="{ active: item.locked }"
                                            :title="item.locked ? 'Mở khóa điểm này' : 'Khóa cố định giờ này'"
                                            @click="toggleLock(item)"
                                        >
                                            <i class="bx" :class="item.locked ? 'bx-lock-alt' : 'bx-lock-open-alt'"></i>
                                        </button>
                                        <button type="button" class="btn-poi-icon" title="Đổi sang địa điểm tương đương" @click="swapPOI(item)">
                                            <i class="bx bx-sync"></i>
                                        </button>
                                        <button type="button" class="btn-poi-icon text-muted-hover" title="Xóa khỏi lịch trình" @click="removePOI(item.id)">
                                            <i class="bx bx-x"></i>
                                        </button>
                                    </div>
                                </div>

                                <h3 class="poi-name">{{ item.name }}</h3>
                                <p class="poi-desc">{{ item.description }}</p>

                                <div class="poi-footer-tags">
                                    <span class="poi-tag tag-price" v-if="item.ticket">
                                        <i class="bx bx-purchase-tag me-1 text-pink"></i> {{ item.ticket }}
                                    </span>
                                    <span class="poi-tag tag-parking" v-if="item.parking">
                                        <i class="bx bx-parking me-1 text-cyan"></i> {{ item.parking }}
                                    </span>
                                    <span class="poi-tag tag-tip" v-if="item.tip">
                                        <i class="bx bx-sun me-1 text-warning"></i> {{ item.tip }}
                                    </span>
                                    <span class="poi-tag tag-rating" v-if="item.rating">
                                        <i class="bx bxs-star me-1 text-warning"></i> {{ item.rating }}
                                    </span>
                                    <span class="poi-tag tag-address" v-if="item.address">
                                        <i class="bx bx-map me-1 text-muted"></i> {{ item.address }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Optional AI Gap Suggestion slot (Between POI 2 & 3 on Day 1) -->
                        <div class="ai-gap-suggest-box" v-if="index === 1 && currentDay === 1 && !hasAddedChamMuseum">
                            <div class="gap-icon-wrap">
                                <i class="bx bx-time"></i>
                            </div>
                            <div class="gap-text-wrap">
                                <span class="gap-time">Trống 13:30 – 15:00:</span>
                                <span class="gap-desc">Gợi ý ghé Bảo tàng Điêu khắc Chăm (cách 1.2km, ngay trên lộ trình)?</span>
                            </div>
                            <button type="button" class="btn-gap-add" @click="acceptChamSuggestion">
                                <i class="bx bx-plus me-1"></i> Thêm
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Button "+ Thêm Điểm Tham Quan Vào Ngày" -->
                <div class="add-poi-btn-wrapper">
                    <button type="button" class="btn-add-poi-day" @click="openAddPoiModal">
                        <i class="bx bx-plus-circle font-20 me-2"></i>
                        <span>Thêm Điểm Tham Quan Vào Ngày {{ currentDay }}</span>
                    </button>
                </div>

                <!-- Day Summary Box -->
                <div class="day-summary-box">
                    <div class="summary-flag-icon">
                        <i class="bx bx-flag"></i>
                    </div>
                    <div class="summary-info-wrap">
                        <h5 class="summary-title">Tổng kết ngày {{ currentDay }}</h5>
                        <div class="summary-text">
                            Tổng quãng đường di chuyển: <strong>{{ activeDayData.totalDistance }} km</strong> • Thời gian di chuyển thực tế: <strong>{{ activeDayData.travelTime }}</strong>
                        </div>
                    </div>
                    <div class="summary-fatigue-badge">
                        <span>Mức độ mệt mỏi: <strong>Rất nhẹ (Thư giãn)</strong></span>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: BẢN ĐỒ, DỰ TOÁN CHI PHÍ & GỢI Ý AI -->
            <div class="col-12 col-xl-5">
                <div class="sticky-sidebar-flow">
                    <!-- 1. CARD BẢN ĐỒ OSRM LIVE -->
                    <div class="osrm-map-card">
                        <div class="map-card-header">
                            <div class="map-title-box">
                                <span class="live-dot-pulse"></span>
                                <h4 class="map-heading">Bản Đồ Tối Ưu Lộ Trình OSRM</h4>
                            </div>
                            <div class="map-layer-badge">
                                <i class="bx bx-layer me-1"></i> Lớp OSRM Live
                            </div>
                        </div>

                        <!-- Visual Interactive Map Simulator -->
                        <div class="map-viewport-container">
                            <div class="map-grid-overlay"></div>
                            
                            <!-- SVG Map Vector Representation of Da Nang Coastline & Route -->
                            <svg class="map-danang-svg" viewBox="0 0 500 360" fill="none">
                                <!-- Ocean Water -->
                                <rect width="500" height="360" fill="#e0f2fe" />

                                <!-- Coastline / Land Shape (Da Nang, Son Tra, Han River) -->
                                <path 
                                    d="M0,0 L320,0 C340,30 390,40 430,70 C460,95 440,140 390,145 C350,150 340,165 350,210 C360,260 380,310 400,360 L0,360 Z" 
                                    fill="#f0fdf4" 
                                    stroke="#cbd5e1" 
                                    stroke-width="1.5"
                                />

                                <!-- Son Tra Peninsula Mountain mass -->
                                <path 
                                    d="M340,50 C370,30 420,40 440,75 C450,105 410,135 375,130 C355,125 330,85 340,50 Z" 
                                    fill="#dcfce7" 
                                    stroke="#86efac" 
                                    stroke-width="1.5"
                                />

                                <!-- Han River Stream -->
                                <path 
                                    d="M260,360 C250,290 255,220 270,170 C280,135 295,110 320,80" 
                                    stroke="#38bdf8" 
                                    stroke-width="9" 
                                    stroke-linecap="round"
                                    fill="none" 
                                />

                                <!-- Purple Route Polyline Connecting POIs -->
                                <path 
                                    d="M135,260 Q240,170 380,95 Q320,200 340,215 Q345,260 320,250" 
                                    stroke="#ec4899" 
                                    stroke-width="4.5" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round"
                                    stroke-dasharray="2 0"
                                    fill="none"
                                    class="route-animated-path"
                                />

                                <!-- Marker 0: Sân bay DAD -->
                                <g transform="translate(135, 260)" class="map-marker-group">
                                    <circle r="12" fill="#0284c7" />
                                    <circle r="5" fill="#ffffff" />
                                    <text x="16" y="4" font-size="11" font-weight="700" fill="#0369a1">Sân bay</text>
                                </g>

                                <!-- Marker 1: Chùa Linh Ứng (Sơn Trà) -->
                                <g transform="translate(380, 95)" class="map-marker-group">
                                    <circle r="14" fill="#ec4899" class="marker-pulse" />
                                    <circle r="11" fill="#ec4899" />
                                    <text x="0" y="4" font-size="11" font-weight="800" fill="#ffffff" text-anchor="middle">1</text>
                                    <rect x="18" y="-12" width="105" height="20" rx="4" fill="rgba(15, 23, 42, 0.85)" />
                                    <text x="24" y="2" font-size="10" font-weight="600" fill="#ffffff">Chùa Linh Ứng</text>
                                </g>

                                <!-- Marker 2: Bánh tráng Đại Lộc -->
                                <g transform="translate(260, 200)" class="map-marker-group">
                                    <circle r="11" fill="#8b5cf6" />
                                    <text x="0" y="4" font-size="11" font-weight="800" fill="#ffffff" text-anchor="middle">2</text>
                                    <rect x="16" y="-12" width="100" height="20" rx="4" fill="rgba(15, 23, 42, 0.85)" />
                                    <text x="22" y="2" font-size="10" font-weight="600" fill="#ffffff">Bánh tráng Đại Lộc</text>
                                </g>

                                <!-- Marker 3: Bãi biển Mỹ Khê -->
                                <g transform="translate(345, 220)" class="map-marker-group">
                                    <circle r="11" fill="#06b6d4" />
                                    <text x="0" y="4" font-size="11" font-weight="800" fill="#ffffff" text-anchor="middle">3</text>
                                    <rect x="-115" y="-12" width="95" height="20" rx="4" fill="rgba(15, 23, 42, 0.85)" />
                                    <text x="-110" y="2" font-size="10" font-weight="600" fill="#ffffff">Bãi biển Mỹ Khê</text>
                                </g>

                                <!-- Marker 4: Cầu Rồng & Chợ đêm -->
                                <g transform="translate(305, 255)" class="map-marker-group">
                                    <circle r="11" fill="#db2777" />
                                    <text x="0" y="4" font-size="11" font-weight="800" fill="#ffffff" text-anchor="middle">4</text>
                                    <rect x="-125" y="-2" width="112" height="20" rx="4" fill="rgba(15, 23, 42, 0.85)" />
                                    <text x="-120" y="12" font-size="10" font-weight="600" fill="#ffffff">Cầu Rồng & Chợ đêm</text>
                                </g>
                            </svg>

                            <!-- Map Floating Controls -->
                            <div class="map-floating-controls">
                                <button type="button" class="btn-map-ctrl" title="Phóng to" @click="zoomIn"><i class="bx bx-plus"></i></button>
                                <button type="button" class="btn-map-ctrl" title="Thu nhỏ" @click="zoomOut"><i class="bx bx-minus"></i></button>
                                <button type="button" class="btn-map-ctrl btn-locate" title="Định vị tâm lộ trình"><i class="bx bx-target-lock"></i></button>
                            </div>
                        </div>

                        <!-- Map Card Footer -->
                        <div class="map-card-footer">
                            <div class="map-footer-item">
                                <i class="bx bx-car me-1 text-pink"></i>
                                <span>Độ dài cung đường: <strong>28.5 km</strong></span>
                            </div>
                            <div class="map-footer-item text-primary">
                                <i class="bx bx-shield-quarter me-1"></i>
                                <span>Không kẹt xe trên lộ trình</span>
                            </div>
                        </div>
                    </div>

                    <!-- 2. CARD PHÂN TÍCH CHI PHÍ DỰ KIẾN -->
                    <div class="budget-card-vip">
                        <div class="budget-header-flex">
                            <div>
                                <h4 class="budget-heading">Phân Tích Chi Phí Dự Kiến</h4>
                                <span class="budget-sub-note">Tự động tổng hợp từ chi_tiet_lich_trinh</span>
                            </div>
                            <div class="budget-saving-badge">
                                Tiết kiệm 23%
                            </div>
                        </div>

                        <!-- Total Money Metric -->
                        <div class="budget-metric-box">
                            <div class="metric-label">Đã phân bổ cho chuyến đi:</div>
                            <div class="metric-value-wrap">
                                <span class="money-allocated">3.850.000đ</span>
                                <span class="money-total">/ 5.000.000đ</span>
                            </div>
                        </div>

                        <!-- Multi-color Segmented Progress Bar -->
                        <div class="segmented-progress-bar">
                            <div class="seg-fill seg-pink" style="width: 38%;" title="Ẩm thực: 1.460.000đ"></div>
                            <div class="seg-fill seg-purple" style="width: 24%;" title="Vé & Tour: 920.000đ"></div>
                            <div class="seg-fill seg-cyan" style="width: 15%;" title="Xe máy & Xăng: 570.000đ"></div>
                            <div class="seg-fill seg-gray" style="width: 23%;" title="Dự phòng: 900.000đ"></div>
                        </div>

                        <div class="budget-remaining-text">
                            <span>Ngân sách còn lại: <strong>1.150.000đ</strong></span>
                            <span class="ratio-pill">77.0% định mức</span>
                        </div>

                        <!-- Breakdown Category List -->
                        <div class="budget-breakdown-list">
                            <div class="breakdown-item">
                                <div class="item-left">
                                    <span class="dot-indicator dot-pink"></span>
                                    <span class="item-name">Ẩm thực & Nhà hàng (4 bữa)</span>
                                </div>
                                <span class="item-val">1.460.000đ</span>
                            </div>
                            <div class="breakdown-item">
                                <div class="item-left">
                                    <span class="dot-indicator dot-purple"></span>
                                    <span class="item-name">Vé điểm đến & Dịch vụ SUP biển</span>
                                </div>
                                <span class="item-val">920.000đ</span>
                            </div>
                            <div class="breakdown-item">
                                <div class="item-left">
                                    <span class="dot-indicator dot-cyan"></span>
                                    <span class="item-name">Thuê xe ga Honda Vision 3 ngày + Xăng</span>
                                </div>
                                <span class="item-val">570.000đ</span>
                            </div>
                            <div class="breakdown-item">
                                <div class="item-left">
                                    <span class="dot-indicator dot-gray"></span>
                                    <span class="item-name">Quà lưu niệm & Chi phí dự phòng</span>
                                </div>
                                <span class="item-val">900.000đ</span>
                            </div>
                        </div>
                    </div>

                    <!-- 3. CARD GỢI Ý THÔNG MINH TỪ TRỢ LÝ AI -->
                    <div class="ai-smart-advice-card">
                        <div class="advice-header">
                            <div class="advice-icon-glow">
                                <i class="bx bx-bot"></i>
                            </div>
                            <h4 class="advice-title">Gợi Ý Thông Minh Từ Trợ Lý AI</h4>
                        </div>
                        <p class="advice-body-text">
                            Phát hiện khung giờ trống <strong>13:30 đến 15:00</strong> tại trung tâm Hải Châu đang trống 90 phút. Ghé thăm <strong>Bảo tàng Điêu khắc Chăm Đà Nẵng</strong> nằm ngay trên trục đường di chuyển đến Bãi biển Mỹ Khê (chỉ lệch 8 phút đi xe).
                        </p>
                        <div class="advice-action-footer">
                            <span class="advice-price">+ 40.000đ vé / khách</span>
                            <button type="button" class="btn-accept-advice" @click="acceptChamSuggestion">
                                <i class="bx bx-check-double me-1 font-16"></i> Chấp nhận thêm điểm
                            </button>
                        </div>
                    </div>

                    <!-- 4. MINI HIGHLIGHT CARD -->
                    <div class="danang-highlight-mini-card">
                        <div class="highlight-thumbnail-box">
                            <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=300&auto=format&fit=crop&q=80" alt="Cầu Rồng Đà Nẵng" class="highlight-thumb-img" />
                        </div>
                        <div class="highlight-info-wrap">
                            <span class="highlight-tag">ĐIỂM NHẤN DU LỊCH</span>
                            <h5 class="highlight-title">Trải nghiệm đêm tại Đà Nẵng</h5>
                            <p class="highlight-desc">
                                Đừng quên mang theo sạc dự phòng để chụp ảnh hiệu ứng rồng phun nước vào thứ 7 và chủ nhật...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: THÊM ĐIỂM THAM QUAN -->
        <div class="modal fade" id="addPoiModal" tabindex="-1" aria-hidden="true" ref="addPoiModalRef">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow p-3">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="fw-bold text-dark mb-0">Thêm Điểm Tham Quan Mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Tên địa điểm:</label>
                            <input type="text" class="form-control rounded-3" v-model="newPoi.name" placeholder="Vd: Bảo tàng Đà Nẵng, Cà phê view biển..." />
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Danh mục:</label>
                            <select class="form-select rounded-3" v-model="newPoi.category">
                                <option value="Check-in & Sống ảo">Check-in & Sống ảo</option>
                                <option value="Ẩm thực & Cà phê">Ẩm thực & Cà phê</option>
                                <option value="Văn hóa & Lịch sử">Văn hóa & Lịch sử</option>
                                <option value="Biển & Giải trí">Biển & Giải trí</option>
                            </select>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-bold">Khung giờ:</label>
                                <input type="text" class="form-control rounded-3" v-model="newPoi.timeRange" placeholder="13:30 – 14:45" />
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-bold">Thời gian ở:</label>
                                <input type="text" class="form-control rounded-3" v-model="newPoi.duration" placeholder="1h 15m" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Giá vé / Chi phí dự kiến:</label>
                            <input type="text" class="form-control rounded-3" v-model="newPoi.ticket" placeholder="Vé: 40.000đ" />
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-trip-primary rounded-pill px-4" @click="saveNewPoi">Thêm vào lịch trình</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LichTrinhToiUuComponent',
    data() {
        return {
            currentDay: 1,
            isRecalculating: false,
            hasAddedChamMuseum: false,
            modalInstance: null,
            newPoi: {
                name: '',
                category: 'Check-in & Sống ảo',
                timeRange: '13:30 – 14:45',
                duration: '1h 15m',
                ticket: 'Vé: 40.000đ'
            },
            dayData: {
                1: {
                    legsCount: 4,
                    totalDistance: '28.5',
                    travelTime: '57 phút',
                    departure: {
                        name: 'Cảng Hàng Không Quốc Tế Đà Nẵng (DAD)',
                        note: 'Nhận phòng gửi hành lý & nhận xe máy tại cổng Ga đến T1'
                    },
                    pois: [
                        {
                            id: 101,
                            name: 'Bán Đảo Sơn Trà & Chùa Linh Ứng Bãi Bụt',
                            category: 'Tâm linh & Cảnh quan',
                            color: 'purple',
                            timeRange: '09:15 – 11:30',
                            duration: '2h 15m',
                            locked: true,
                            lockReason: 'Khóa cố định',
                            description: 'Chiêm bái tượng Phật Bà Quán Thế Âm cao 67m hướng biển, ngắm toàn cảnh vịnh Đà Nẵng từ trên cao, chụp ảnh lưu niệm.',
                            ticket: 'Vé: Miễn phí (0đ)',
                            parking: 'Gửi xe: 10.000đ',
                            tip: 'Khuyên dùng: Buổi sáng mát mẻ',
                            transit: {
                                distance: '14.2 km',
                                duration: '25 phút',
                                route: 'Hoàng Sa (OSRM ma trận chuẩn)',
                                status: 'Đường thông thoáng'
                            }
                        },
                        {
                            id: 102,
                            name: 'Bánh Tráng Cuốn Thịt Heo Đại Lộc',
                            category: 'Ẩm thực Đặc sản',
                            color: 'pink',
                            timeRange: '12:00 – 13:15',
                            duration: '1h 15m',
                            locked: true,
                            lockReason: 'Cố định trưa',
                            description: 'Thịt heo hai đầu da mềm giòn, rau rừng Đại Lộc tươi sạch cuốn bánh tráng phơi sương chấm mắm nêm đậm vị xứ Quảng.',
                            ticket: 'Dự kiến: 85.000đ / người',
                            rating: '4.8★ (1.420 đánh giá)',
                            address: '97 Trưng Nữ Vương',
                            transit: {
                                distance: '8.4 km',
                                duration: '16 phút',
                                route: 'Sơn Trà và đường Võ Văn Kiệt',
                                status: null
                            }
                        },
                        {
                            id: 103,
                            name: 'Bãi Biển Mỹ Khê (Tắm biển & Chèo SUP hoàng hôn)',
                            category: 'Biển & Thể thao nước',
                            color: 'cyan',
                            timeRange: '15:00 – 17:30',
                            duration: '2h 30m',
                            locked: false,
                            lockReason: 'Mở khóa (Tự do tối ưu)',
                            description: 'Thư giãn tại top bãi biển quyến rũ nhất hành tinh do Forbes bình chọn, trải nghiệm chèo ván SUP lướt sóng nhẹ và ngắm hoàng hôn rực sắc.',
                            ticket: 'Thuê SUP: 150.000đ / ván',
                            parking: 'Tắm tráng nước ngọt: 5.000đ',
                            transit: {
                                distance: '3.8 km',
                                duration: '9 phút',
                                route: 'Cầu Rồng đến Bãi tắm',
                                status: null
                            }
                        },
                        {
                            id: 104,
                            name: 'Cầu Rồng Phun Lửa/Nước & Chợ Đêm Sơn Trà',
                            category: 'Vui chơi Về Đêm',
                            color: 'pink',
                            timeRange: '19:00 – 21:30',
                            duration: '2h 30m',
                            locked: true,
                            lockReason: 'Cố định show đêm',
                            description: 'Dạo mát bên bờ sông Hàn thơ mộng, thưởng ngoạn tiết mục rồng phun lửa & phun nước độc đáo lúc 21:00; sà vào khu ẩm thực hải sản và hoa quả chợ đêm.',
                            tip: 'Show diễn: 21:00 (Thứ 7 / CN)',
                            ticket: 'Ẩm thực đêm: ~120.000đ',
                            transit: {
                                distance: '2.1 km',
                                duration: '7 phút',
                                route: 'dọc đường Võ Nguyên Giáp về Cầu Rồng',
                                status: null
                            }
                        }
                    ]
                },
                2: {
                    legsCount: 3,
                    totalDistance: '42.0',
                    travelTime: '1h 15m',
                    departure: {
                        name: 'Khách sạn Biển Mỹ Khê',
                        note: 'Xe đón tại sảnh khách sạn xuất phát đi Bà Nà'
                    },
                    pois: [
                        {
                            id: 201,
                            name: 'Sun World Bà Nà Hills & Cầu Vàng Bàn Tay Khổng Lồ',
                            category: 'Kỳ quan & Trải nghiệm',
                            color: 'purple',
                            timeRange: '08:30 – 12:00',
                            duration: '3h 30m',
                            locked: true,
                            lockReason: 'Khóa vé Cáp treo',
                            description: 'Đi cáp treo đạt kỷ lục thế giới, check-in Cầu Vàng sương mây huyền ảo và khám phá Làng Pháp cổ kính.',
                            ticket: 'Vé cáp treo: 900.000đ',
                            tip: 'Nên mang áo khoác mỏng vì nhiệt độ mát lạnh',
                            transit: {
                                distance: '28.0 km',
                                duration: '45 phút',
                                route: 'Đường Bà Nà - Suối Mơ (Đường đẹp)',
                                status: 'Lộ trình cao tốc'
                            }
                        },
                        {
                            id: 202,
                            name: 'Buffet Trưa Quốc Tế Nhà Hàng Four Seasons',
                            category: 'Ẩm thực 5 Sao',
                            color: 'pink',
                            timeRange: '12:00 – 13:30',
                            duration: '1h 30m',
                            locked: true,
                            lockReason: 'Đặt bàn trước',
                            description: 'Thưởng thức hơn 100 món Á - Âu thượng hạng tại đỉnh Bà Nà, nạp năng lượng cho hành trình buổi chiều.',
                            ticket: 'Vé Buffet: 350.000đ / khách',
                            transit: {
                                distance: '0.2 km',
                                duration: '3 phút',
                                route: 'Đi bộ nội khu Làng Pháp',
                                status: null
                            }
                        },
                        {
                            id: 203,
                            name: 'Fantasy Park & Hầm Rượu Cổ Debay',
                            category: 'Giải trí & Trải nghiệm',
                            color: 'cyan',
                            timeRange: '13:30 – 16:30',
                            duration: '3h 00m',
                            locked: false,
                            lockReason: 'Tự do trải nghiệm',
                            description: 'Tham gia các trò chơi cảm giác mạnh, tháp rơi tự do, tàu hỏa leo núi và thưởng thức rượu vang ủ trong lòng núi đá.',
                            ticket: 'Đã bao gồm trong vé cáp',
                            transit: {
                                distance: '0.3 km',
                                duration: '5 phút',
                                route: 'Nội khu Fantasy Park',
                                status: null
                            }
                        }
                    ]
                },
                3: {
                    legsCount: 4,
                    totalDistance: '22.0',
                    travelTime: '45 phút',
                    departure: {
                        name: 'Khách sạn Trung Tâm Hải Châu',
                        note: 'Trả phòng, gửi vali tại lễ tân và đi tham quan danh thắng'
                    },
                    pois: [
                        {
                            id: 301,
                            name: 'Quần Thể Danh Thắng Ngũ Hành Sơn & Động Huyền Không',
                            category: 'Di tích & Hang động',
                            color: 'purple',
                            timeRange: '08:00 – 10:30',
                            duration: '2h 30m',
                            locked: true,
                            lockReason: 'Cố định sáng',
                            description: 'Khám phá ngọn Thủy Sơn, vãn cảnh Chùa Tam Thai, Động Tàng Chơn và ánh sáng kỳ ảo xuyên qua vòm Động Huyền Không.',
                            ticket: 'Vé tham quan: 40.000đ • Thang máy: 15.000đ',
                            transit: {
                                distance: '8.5 km',
                                duration: '18 phút',
                                route: 'Võ Nguyên Giáp đến Lê Văn Hiến',
                                status: 'Đường thoáng'
                            }
                        },
                        {
                            id: 302,
                            name: 'Đặc Sản Mì Quảng Ếch Bếp Trang',
                            category: 'Ẩm thực Trứ Danh',
                            color: 'pink',
                            timeRange: '11:30 – 12:45',
                            duration: '1h 15m',
                            locked: true,
                            lockReason: 'Cố định trưa',
                            description: 'Thưởng thức mì Quảng ếch thơm lừng dọn trong thố đất, nước lèo vàng sánh và bánh tráng mè nướng giòn rụm.',
                            ticket: 'Dự kiến: 65.000đ / tô',
                            transit: {
                                distance: '7.2 km',
                                duration: '14 phút',
                                route: 'Nguyễn Văn Linh',
                                status: null
                            }
                        },
                        {
                            id: 303,
                            name: 'Chợ Hàn & Chợ Cồn: Mua Sắm Quà Đặc Sản Đà Nẵng',
                            category: 'Mua sắm & Quà lưu niệm',
                            color: 'cyan',
                            timeRange: '13:30 – 15:30',
                            duration: '2h 00m',
                            locked: false,
                            lockReason: 'Tự do mua sắm',
                            description: 'Mua sắm chả bò Đà Nẵng, mực rim me, tré Bà Đệ, rong biển Mỹ Khê và bánh khô mè Cẩm Lệ làm quà.',
                            ticket: 'Chi tiêu dự phòng: 500.000đ',
                            transit: {
                                distance: '1.5 km',
                                duration: '5 phút',
                                route: 'Đường Trần Phú',
                                status: null
                            }
                        }
                    ]
                }
            }
        };
    },
    computed: {
        activeDayData() {
            return this.dayData[this.currentDay] || this.dayData[1];
        }
    },
    mounted() {
        if (window.bootstrap && this.$refs.addPoiModalRef) {
            this.modalInstance = new window.bootstrap.Modal(this.$refs.addPoiModalRef);
        }
    },
    methods: {
        switchDay(day) {
            this.currentDay = day;
        },
        toggleLock(item) {
            item.locked = !item.locked;
            item.lockReason = item.locked ? 'Khóa cố định' : 'Mở khóa (Tự do tối ưu)';
            this.showToast(item.locked ? `Đã khóa cố định điểm "${item.name}"!` : `Đã mở khóa điểm "${item.name}"!`);
        },
        unlockAllPOIs() {
            this.activeDayData.pois.forEach(p => {
                p.locked = false;
                p.lockReason = 'Mở khóa (Tự do tối ưu)';
            });
            this.showToast('Đã mở toàn bộ khóa các điểm trong ngày ' + this.currentDay);
        },
        handleRecalculate() {
            this.isRecalculating = true;
            this.showToast('AI Optimizer đang chạy thuật toán di truyền & OSRM để tái tối ưu lộ trình...');
            setTimeout(() => {
                this.isRecalculating = false;
                this.showToast('Đã tối ưu lại lộ trình thành công! Tiết kiệm thêm 12 phút di chuyển.');
            }, 1200);
        },
        handleSaveTrip() {
            this.showToast('Lịch trình đã được lưu vào danh sách của bạn thành công!');
        },
        handleCopy() {
            this.showToast('Đã sao chép liên kết chia sẻ lịch trình #DN-2025-3N2D!');
        },
        handleExportPDF() {
            this.showToast('Đang tạo file PDF lịch trình chi tiết kèm bản đồ OSRM...');
            window.print();
        },
        handleDelete() {
            if (confirm('Bạn có chắc chắn muốn xóa lịch trình này không?')) {
                this.showToast('Đã xóa lịch trình thành công!');
            }
        },
        editTripTitle() {
            const newTitle = prompt('Nhập tên mới cho lịch trình:', 'Hành Trình Khám Phá Đà Nẵng 3N2Đ: Biển Xanh & Di Sản');
            if (newTitle) {
                this.showToast('Đã đổi tên lịch trình thành công!');
            }
        },
        acceptChamSuggestion() {
            const chamPoi = {
                id: 105,
                name: 'Bảo Tàng Điêu Khắc Chăm Đà Nẵng',
                category: 'Di sản & Văn hóa',
                color: 'purple',
                timeRange: '13:30 – 14:45',
                duration: '1h 15m',
                locked: true,
                lockReason: 'Khóa theo AI gợi ý',
                description: 'Bảo tàng lưu giữ bộ sưu tập hiện vật điêu khắc Chăm Pa lớn nhất thế giới, kiến trúc Gothic hòa quyện nét Chăm cổ kính.',
                ticket: 'Vé: 40.000đ / khách',
                parking: 'Gửi xe: 5.000đ',
                tip: 'Chỉ lệch 8 phút trên trục đường sang Mỹ Khê',
                transit: {
                    distance: '1.2 km',
                    duration: '4 phút',
                    route: 'Đường 2 Tháng 9',
                    status: 'Tối ưu trên cung đường'
                }
            };
            // Chèn vào vị trí số 2 (sau ăn trưa Đại Lộc)
            this.dayData[1].pois.splice(2, 0, chamPoi);
            this.dayData[1].legsCount++;
            this.hasAddedChamMuseum = true;
            this.showToast('Đã thêm Bảo tàng Điêu khắc Chăm vào lịch trình Ngày 1!');
        },
        swapPOI(item) {
            this.showToast(`Đang tìm các địa điểm tương đương "${item.category}" gần tọa độ...`);
        },
        removePOI(id) {
            const index = this.activeDayData.pois.findIndex(p => p.id === id);
            if (index > -1) {
                const name = this.activeDayData.pois[index].name;
                this.activeDayData.pois.splice(index, 1);
                this.activeDayData.legsCount--;
                this.showToast(`Đã xóa "${name}" khỏi ngày ${this.currentDay}`);
            }
        },
        openAddPoiModal() {
            if (this.modalInstance) {
                this.modalInstance.show();
            } else {
                const name = prompt('Nhập tên địa điểm mới:');
                if (name) {
                    this.saveNewPoiDirect(name);
                }
            }
        },
        saveNewPoi() {
            if (!this.newPoi.name.trim()) return;
            this.saveNewPoiDirect(this.newPoi.name);
            if (this.modalInstance) {
                this.modalInstance.hide();
            }
            this.newPoi.name = '';
        },
        saveNewPoiDirect(name) {
            const item = {
                id: Date.now(),
                name: name,
                category: this.newPoi.category || 'Khám phá',
                color: 'cyan',
                timeRange: this.newPoi.timeRange || '16:00 – 17:30',
                duration: this.newPoi.duration || '1h 30m',
                locked: false,
                lockReason: 'Mới thêm',
                description: 'Địa điểm do bạn tự bổ sung vào hành trình.',
                ticket: this.newPoi.ticket || 'Vé: Tự túc',
                transit: {
                    distance: '2.5 km',
                    duration: '8 phút',
                    route: 'Trung tâm thành phố',
                    status: null
                }
            };
            this.activeDayData.pois.push(item);
            this.activeDayData.legsCount++;
            this.showToast(`Đã thêm "${name}" vào lịch trình ngày ${this.currentDay}!`);
        },
        zoomIn() {
            this.showToast('Phóng to bản đồ OSRM');
        },
        zoomOut() {
            this.showToast('Thu nhỏ bản đồ OSRM');
        },
        showToast(msg) {
            if (this.$toast) {
                this.$toast.success(msg);
            } else {
                alert(msg);
            }
        }
    }
};
</script>

<style scoped>
/* ==========================================================================
   GLOBAL RESET & OPTIMAL ITINERARY LAYOUT
   ========================================================================== */
.optimal-itinerary-container {
    padding: 10px 0 60px 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #1e293b;
}

.text-pink {
    color: #ec4899 !important;
}

.text-cyan {
    color: #06b6d4 !important;
}

.text-purple {
    color: #8b5cf6 !important;
}

/* ==========================================================================
   1. TOP SYSTEM OPTIMIZER STATUS NOTIFICATION
   ========================================================================== */
.optimizer-status-banner {
    background: linear-gradient(135deg, #fdf2f8 0%, #faf5ff 60%, #f0fdfa 100%);
    border: 1px solid #fbcfe8;
    border-radius: 18px;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 12px;
    box-shadow: 0 2px 10px rgba(236, 72, 153, 0.05);
}

.status-left {
    display: flex;
    align-items: center;
    gap: 12px;
}

.optimizer-icon-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: #ec4899;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    box-shadow: 0 4px 10px rgba(236, 72, 153, 0.35);
}

.status-main-text {
    font-size: 13.5px;
    color: #334155;
}

.status-main-text strong {
    color: #ec4899;
}

.status-badges-group {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.status-pill {
    font-size: 12px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
}

.pill-pink {
    background: #ffffff;
    border: 1px solid #fbcfe8;
    color: #ec4899;
}

.pill-cyan {
    background: #ffffff;
    border: 1px solid #a5f3fc;
    color: #0891b2;
}

.pill-purple {
    background: #ffffff;
    border: 1px solid #e9d5ff;
    color: #7c3aed;
}

/* ==========================================================================
   2. TRIP HEADER SUMMARY CARD
   ========================================================================== */
.trip-header-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 24px 28px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    margin-bottom: 22px;
}

.trip-header-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
    flex-wrap: wrap;
    gap: 14px;
}

.trip-tags-row {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.badge-code {
    background: #fdf2f8;
    color: #ec4899;
    border: 1px solid #fbcfe8;
    font-size: 11.5px;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 14px;
    letter-spacing: 0.5px;
}

.badge-pref {
    background: #faf5ff;
    color: #8b5cf6;
    border: 1px solid #e9d5ff;
    font-size: 11.5px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 14px;
}

.badge-time {
    background: #f8fafc;
    color: #64748b;
    border: 1px solid #e2e8f0;
    font-size: 11.5px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 14px;
}

.trip-actions-row {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.btn-trip-primary {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #9333ea 100%);
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    padding: 9px 18px;
    border-radius: 24px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
    transition: all 0.2s ease;
}

.btn-trip-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(236, 72, 153, 0.5);
}

.btn-trip-outline {
    background: #ffffff;
    color: #334155;
    border: 1px solid #cbd5e1;
    font-size: 13.5px;
    font-weight: 700;
    padding: 9px 16px;
    border-radius: 24px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    transition: all 0.2s ease;
}

.btn-trip-outline:hover {
    border-color: #ec4899;
    color: #ec4899;
    background: #fdf2f8;
}

.trip-mini-actions {
    display: flex;
    align-items: center;
    gap: 6px;
}

.btn-icon-action {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #475569;
    font-size: 13px;
    font-weight: 600;
    padding: 8px 12px;
    border-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: all 0.2s ease;
}

.btn-icon-action:hover {
    background: #f1f5f9;
    color: #0f172a;
    border-color: #cbd5e1;
}

.btn-danger-action:hover {
    background: #fee2e2;
    color: #ef4444;
    border-color: #fca5a5;
}

.trip-main-title {
    font-size: 26px;
    font-weight: 900;
    color: #0f172a;
    line-height: 1.25;
    margin-bottom: 12px;
    letter-spacing: -0.4px;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.btn-edit-title {
    background: transparent;
    border: none;
    color: #94a3b8;
    font-size: 20px;
    cursor: pointer;
    transition: color 0.2s ease;
    padding: 0;
}

.btn-edit-title:hover {
    color: #ec4899;
}

.trip-meta-row {
    display: flex;
    align-items: center;
    gap: 22px;
    font-size: 13.5px;
    font-weight: 600;
    color: #475569;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
}

/* ==========================================================================
   3. DAY SELECTOR TABS & SUB-BAR
   ========================================================================== */
.day-navigation-wrapper {
    margin-bottom: 16px;
}

.day-tabs-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
    flex-wrap: wrap;
    gap: 12px;
}

.day-tabs-left {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.day-tab-btn {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 14px;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 24px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    transition: all 0.25s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
}

.day-tab-btn:hover {
    border-color: #fbcfe8;
    color: #ec4899;
}

.day-tab-btn.active {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border-color: transparent;
    color: #ffffff;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
}

.day-stats-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.day-stat-badge {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #334155;
    font-size: 13px;
    font-weight: 700;
    padding: 7px 14px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
}

.day-controls-subbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 18px;
    background: #f8fafc;
    border: 1px dashed #cbd5e1;
    border-radius: 14px;
    font-size: 13px;
    flex-wrap: wrap;
    gap: 10px;
}

.controls-left {
    display: flex;
    align-items: center;
    gap: 18px;
    color: #64748b;
    font-weight: 600;
}

.btn-unlock-all {
    background: transparent;
    border: none;
    color: #ec4899;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    padding: 0;
    display: inline-flex;
    align-items: center;
    transition: color 0.2s ease;
}

.btn-unlock-all:hover {
    color: #be185d;
    text-decoration: underline;
}

/* ==========================================================================
   4. TIMELINE LỘ TRÌNH (LEFT COLUMN)
   ========================================================================== */
.departure-point-card {
    background: #f0fdfa;
    border: 1.5px solid #a7f3d0;
    border-radius: 18px;
    padding: 18px 22px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 4px 14px rgba(16, 185, 129, 0.06);
    position: relative;
}

.departure-icon-box {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background: #0284c7;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.departure-content {
    flex: 1;
}

.departure-label-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 4px;
}

.label-text {
    font-size: 11px;
    font-weight: 800;
    color: #0369a1;
    letter-spacing: 0.6px;
}

.label-time {
    font-size: 12px;
    font-weight: 700;
    color: #64748b;
}

.departure-title {
    font-size: 16.5px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 4px;
}

.departure-desc {
    font-size: 12.5px;
    color: #64748b;
    margin: 0;
}

.badge-anchor {
    background: #e0f2fe;
    color: #0369a1;
    font-size: 11.5px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 12px;
    border: 1px solid #bae6fd;
}

/* Transit Connector */
.transit-connector-wrap {
    position: relative;
    padding: 14px 0 14px 34px;
}

.connector-line {
    position: absolute;
    top: -6px;
    bottom: -6px;
    left: 24px;
    width: 2px;
    border-left: 2px dotted #f472b6;
    z-index: 1;
}

.transit-pill-box {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fdf2f8;
    border: 1px solid #fbcfe8;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 12px;
    color: #475569;
    font-weight: 600;
    box-shadow: 0 2px 6px rgba(236, 72, 153, 0.08);
}

.transit-car-icon {
    font-size: 15px;
    color: #ec4899;
}

.transit-status-badge {
    background: #e0f2fe;
    color: #0284c7;
    font-size: 10.5px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 10px;
}

/* POI Card Item */
.poi-card-item {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 20px 22px;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
    display: flex;
    gap: 16px;
    transition: all 0.25s ease;
    position: relative;
    z-index: 2;
}

.poi-card-item:hover {
    border-color: #fbcfe8;
    box-shadow: 0 8px 24px rgba(236, 72, 153, 0.1);
}

.poi-card-item.is-locked {
    border-left: 4px solid #ec4899;
}

.poi-card-left-number {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
}

.poi-number-circle {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    color: #ffffff;
    font-size: 16px;
    font-weight: 900;
    display: flex;
    align-items: center;
    justify-content: center;
}

.circle-purple {
    background: #8b5cf6;
    box-shadow: 0 4px 10px rgba(139, 92, 246, 0.35);
}

.circle-pink {
    background: #ec4899;
    box-shadow: 0 4px 10px rgba(236, 72, 153, 0.35);
}

.circle-cyan {
    background: #06b6d4;
    box-shadow: 0 4px 10px rgba(6, 182, 212, 0.35);
}

.poi-drag-handle {
    color: #cbd5e1;
    font-size: 18px;
    cursor: grab;
    transition: color 0.2s ease;
}

.poi-drag-handle:hover {
    color: #ec4899;
}

.poi-card-main-content {
    flex: 1;
}

.poi-top-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
    flex-wrap: wrap;
    gap: 8px;
}

.poi-badges-left {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.poi-category-badge {
    font-size: 11px;
    font-weight: 700;
    padding: 3px 9px;
    border-radius: 12px;
}

.cat-purple {
    background: #faf5ff;
    color: #7c3aed;
    border: 1px solid #e9d5ff;
}

.cat-pink {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
}

.cat-cyan {
    background: #ecfeff;
    color: #0891b2;
    border: 1px solid #a5f3fc;
}

.poi-time-badge {
    background: #fff1f2;
    color: #e11d48;
    border: 1px solid #fecdd3;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 9px;
    border-radius: 12px;
}

.poi-actions-right {
    display: flex;
    align-items: center;
    gap: 6px;
}

.poi-lock-status {
    font-size: 11px;
    color: #ec4899;
    font-weight: 700;
    background: #fdf2f8;
    padding: 2px 8px;
    border-radius: 10px;
    border: 1px solid #fbcfe8;
}

.btn-poi-icon {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-poi-icon:hover {
    background: #f1f5f9;
    color: #0f172a;
}

.btn-poi-icon.active {
    background: #fdf2f8;
    color: #ec4899;
    border-color: #fbcfe8;
}

.poi-name {
    font-size: 17px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.3;
    margin-bottom: 6px;
}

.poi-desc {
    font-size: 13px;
    color: #64748b;
    line-height: 1.55;
    margin-bottom: 12px;
}

.poi-footer-tags {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    font-size: 12px;
    font-weight: 600;
    color: #475569;
}

/* AI Gap Suggestion Box */
.ai-gap-suggest-box {
    margin: 14px 0 14px 34px;
    background: #faf5ff;
    border: 1.5px dashed #c084fc;
    border-radius: 16px;
    padding: 10px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
}

.gap-icon-wrap {
    color: #9333ea;
    font-size: 20px;
}

.gap-text-wrap {
    flex: 1;
    font-size: 12.5px;
    color: #581c87;
}

.gap-time {
    font-weight: 800;
    margin-right: 4px;
}

.btn-gap-add {
    background: #9333ea;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    padding: 5px 14px;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    transition: background 0.2s ease;
}

.btn-gap-add:hover {
    background: #7e22ce;
}

/* Add POI button */
.add-poi-btn-wrapper {
    margin: 24px 0;
}

.btn-add-poi-day {
    width: 100%;
    background: #fdf2f8;
    border: 2px dashed #f472b6;
    color: #db2777;
    font-size: 14.5px;
    font-weight: 800;
    padding: 14px;
    border-radius: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
}

.btn-add-poi-day:hover {
    background: #fce7f3;
    border-color: #ec4899;
    transform: translateY(-2px);
}

/* Day Summary Box */
.day-summary-box {
    background: #fdf2f8;
    border: 1px solid #fbcfe8;
    border-radius: 18px;
    padding: 18px 22px;
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
}

.summary-flag-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    background: #ffffff;
    color: #ec4899;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    box-shadow: 0 2px 8px rgba(236, 72, 153, 0.15);
}

.summary-info-wrap {
    flex: 1;
}

.summary-title {
    font-size: 15px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 2px;
}

.summary-text {
    font-size: 12.5px;
    color: #475569;
}

.summary-fatigue-badge {
    background: #ffffff;
    border: 1px solid #fbcfe8;
    color: #ec4899;
    font-size: 12px;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
}

/* ==========================================================================
   5. RIGHT COLUMN WIDGETS
   ========================================================================== */
.sticky-sidebar-flow {
    position: sticky;
    top: 86px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* OSRM Map Card */
.osrm-map-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

.map-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 18px;
    border-bottom: 1px solid #f1f5f9;
}

.map-title-box {
    display: flex;
    align-items: center;
    gap: 8px;
}

.live-dot-pulse {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
}

.map-heading {
    font-size: 14.5px;
    font-weight: 800;
    color: #0f172a;
    margin: 0;
}

.map-layer-badge {
    font-size: 11px;
    font-weight: 700;
    color: #0369a1;
    background: #e0f2fe;
    padding: 3px 8px;
    border-radius: 12px;
}

.map-viewport-container {
    position: relative;
    height: 290px;
    background: #e0f2fe;
    overflow: hidden;
}

.map-danang-svg {
    width: 100%;
    height: 100%;
    display: block;
}

.map-floating-controls {
    position: absolute;
    bottom: 12px;
    right: 12px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    z-index: 10;
}

.btn-map-ctrl {
    width: 32px;
    height: 32px;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    color: #334155;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease;
}

.btn-map-ctrl:hover {
    background: #f8fafc;
    color: #ec4899;
}

.map-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 18px;
    font-size: 12px;
    background: #ffffff;
    border-top: 1px solid #f1f5f9;
}

/* Budget Breakdown Card */
.budget-card-vip {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    padding: 22px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

.budget-header-flex {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 14px;
}

.budget-heading {
    font-size: 16px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 2px;
}

.budget-sub-note {
    font-size: 11px;
    color: #94a3b8;
}

.budget-saving-badge {
    background: #fdf2f8;
    color: #ec4899;
    border: 1px solid #fbcfe8;
    font-size: 11px;
    font-weight: 800;
    padding: 3px 8px;
    border-radius: 12px;
}

.budget-metric-box {
    margin-bottom: 12px;
}

.metric-label {
    font-size: 11.5px;
    color: #64748b;
    margin-bottom: 2px;
}

.money-allocated {
    font-size: 24px;
    font-weight: 900;
    color: #ec4899;
}

.money-total {
    font-size: 14px;
    font-weight: 700;
    color: #94a3b8;
}

.segmented-progress-bar {
    height: 10px;
    border-radius: 10px;
    background: #f1f5f9;
    overflow: hidden;
    display: flex;
    margin-bottom: 8px;
}

.seg-fill {
    height: 100%;
}

.seg-pink { background: #ec4899; }
.seg-purple { background: #8b5cf6; }
.seg-cyan { background: #06b6d4; }
.seg-gray { background: #94a3b8; }

.budget-remaining-text {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 11.5px;
    color: #475569;
    margin-bottom: 16px;
}

.ratio-pill {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    padding: 1px 6px;
    border-radius: 10px;
    font-weight: 700;
}

.budget-breakdown-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding-top: 12px;
    border-top: 1px solid #f1f5f9;
}

.breakdown-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 12.5px;
}

.item-left {
    display: flex;
    align-items: center;
    gap: 8px;
}

.dot-indicator {
    width: 8px;
    height: 8px;
    border-radius: 50%;
}

.dot-pink { background: #ec4899; }
.dot-purple { background: #8b5cf6; }
.dot-cyan { background: #06b6d4; }
.dot-gray { background: #94a3b8; }

.item-name {
    color: #334155;
}

.item-val {
    font-weight: 700;
    color: #0f172a;
}

/* AI Smart Advice Card */
.ai-smart-advice-card {
    background: linear-gradient(135deg, #fdf2f8 0%, #faf5ff 100%);
    border: 1px solid #fbcfe8;
    border-radius: 20px;
    padding: 18px 20px;
    box-shadow: 0 4px 18px rgba(236, 72, 153, 0.08);
}

.advice-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.advice-icon-glow {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #ec4899;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    box-shadow: 0 2px 8px rgba(236, 72, 153, 0.4);
}

.advice-title {
    font-size: 14.5px;
    font-weight: 800;
    color: #0f172a;
    margin: 0;
}

.advice-body-text {
    font-size: 12.5px;
    line-height: 1.6;
    color: #475569;
    margin-bottom: 14px;
}

.advice-action-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}

.advice-price {
    font-size: 12px;
    font-weight: 800;
    color: #ec4899;
}

.btn-accept-advice {
    background: #ec4899;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    padding: 7px 14px;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 2px 8px rgba(236, 72, 153, 0.3);
    transition: all 0.2s ease;
}

.btn-accept-advice:hover {
    background: #db2777;
    transform: translateY(-1px);
}

/* Mini Highlight Card */
.danang-highlight-mini-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    padding: 12px 14px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
}

.highlight-thumbnail-box {
    width: 72px;
    height: 64px;
    border-radius: 12px;
    overflow: hidden;
    flex-shrink: 0;
}

.highlight-thumb-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.highlight-tag {
    font-size: 9.5px;
    font-weight: 800;
    color: #ec4899;
    letter-spacing: 0.5px;
    display: block;
    margin-bottom: 2px;
}

.highlight-title {
    font-size: 13px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 2px;
}

.highlight-desc {
    font-size: 11px;
    color: #64748b;
    line-height: 1.4;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Modal styling */
.btn-trip-primary {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #ffffff;
    border: none;
}

/* SVG Marker animation */
.marker-pulse {
    animation: markerGlow 2s infinite;
}

@keyframes markerGlow {
    0% { r: 11; opacity: 1; }
    50% { r: 16; opacity: 0.3; }
    100% { r: 11; opacity: 1; }
}

/* ==========================================================================
   RESPONSIVE
   ========================================================================== */
@media (max-width: 767.98px) {
    .trip-main-title {
        font-size: 20px;
    }

    .trip-header-top {
        flex-direction: column;
        align-items: flex-start;
    }

    .trip-actions-row {
        width: 100%;
    }

    .btn-trip-primary,
    .btn-trip-outline {
        width: 100%;
        justify-content: center;
    }

    .departure-point-card {
        flex-direction: column;
        align-items: flex-start;
    }

    .poi-card-item {
        flex-direction: column;
    }

    .poi-card-left-number {
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
    }
}
</style>
