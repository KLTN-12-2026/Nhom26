<template>
    <div class="lich-su-ke-hoach-page pb-5">
        <!-- 1. Header Section -->
        <div class="page-header-card card border-0 rounded-4 p-4 shadow-sm mb-4 bg-white position-relative overflow-hidden">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <span class="badge badge-ai-optimizer rounded-pill px-3 py-1">
                            <i class="bx bx-chip me-1"></i>AI TRIP OPTIMIZER v3.4
                        </span>
                        <span class="badge badge-osrm-ready rounded-pill px-3 py-1">
                            Database: lich_trinh - OSM OSRM Ready
                        </span>
                    </div>
                    <h1 class="page-title fw-bold text-dark mb-2">
                        Lịch Sử &amp; Quản Lý Kế Hoạch Lịch Trình Du Lịch Đà Nẵng
                    </h1>
                    <p class="text-secondary small mb-0 line-clamp-2" style="max-width: 820px; font-size: 0.92rem;">
                        Quản lý toàn bộ các phương án lịch trình do thuật toán AI tối ưu hoặc do bạn tự biên tập. Hỗ trợ xem lại, đổi tên, sao chép bản sao, chỉnh sửa và chia sẻ cộng đồng.
                    </p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn btn-outline-compare rounded-pill px-3 py-2 fw-semibold d-flex align-items-center gap-2" @click="handleComparePlans">
                        <i class="bx bx-git-compare fs-5 text-purple"></i>
                        <span>So Sánh 2 Phương Án</span>
                    </button>
                    <router-link to="/client/lich-trinh-toi-uu" class="btn btn-create-ai rounded-pill px-3 py-2 fw-bold text-white d-flex align-items-center gap-2 text-decoration-none">
                        <i class="bx bx-plus-circle fs-5"></i>
                        <span>+ Tạo Lịch Trình Mới Bằng AI</span>
                    </router-link>
                </div>
            </div>
            <!-- Decorative background blob -->
            <div class="header-decor-glow"></div>
        </div>

        <!-- 2. Stat KPI Cards (4 Cards) -->
        <div class="row g-3 g-md-4 mb-4">
            <!-- Stat 1 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-kpi-card border rounded-4 p-3 shadow-sm h-100 position-relative overflow-hidden bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-wrap stat-icon-pink rounded-4 d-flex align-items-center justify-content-center">
                            <i class="bx bx-calendar-event fs-3"></i>
                        </div>
                        <div>
                            <div class="stat-caption text-muted text-uppercase fw-semibold">Tổng Kế Hoạch Đã Tạo</div>
                            <div class="stat-val-group d-flex align-items-baseline gap-1">
                                <span class="stat-main-val text-dark fw-bold">06</span>
                                <span class="stat-unit text-secondary small">lịch trình</span>
                            </div>
                            <div class="stat-sub-note text-pink small fw-medium mt-1">
                                <i class="bx bx-bookmark-heart me-1"></i>4 kế hoạch đã lưu
                            </div>
                        </div>
                    </div>
                    <div class="stat-watermark">06</div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-kpi-card border rounded-4 p-3 shadow-sm h-100 position-relative overflow-hidden bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-wrap stat-icon-cyan rounded-4 d-flex align-items-center justify-content-center">
                            <i class="bx bx-time-five fs-3"></i>
                        </div>
                        <div>
                            <div class="stat-caption text-muted text-uppercase fw-semibold">Tiết Kiệm Di Chuyển</div>
                            <div class="stat-val-group d-flex align-items-baseline gap-1">
                                <span class="stat-main-val text-teal fw-bold">~24.5</span>
                                <span class="stat-unit text-secondary small">giờ</span>
                            </div>
                            <div class="stat-sub-note text-teal small fw-medium mt-1">
                                <i class="bx bx-trending-down me-1"></i>Ma trận OSRM giảm 38%
                            </div>
                        </div>
                    </div>
                    <div class="stat-watermark">24h</div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-kpi-card border rounded-4 p-3 shadow-sm h-100 position-relative overflow-hidden bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-wrap stat-icon-purple rounded-4 d-flex align-items-center justify-content-center">
                            <i class="bx bx-map-pin fs-3"></i>
                        </div>
                        <div>
                            <div class="stat-caption text-muted text-uppercase fw-semibold">Điểm Đến Đã Lên Lịch</div>
                            <div class="stat-val-group d-flex align-items-baseline gap-1">
                                <span class="stat-main-val text-purple fw-bold">28</span>
                                <span class="stat-unit text-secondary small">địa điểm</span>
                            </div>
                            <div class="stat-sub-note text-purple small fw-medium mt-1">
                                <i class="bx bx-map-alt me-1"></i>Khắp Đà Nẵng &amp; Hội An
                            </div>
                        </div>
                    </div>
                    <div class="stat-watermark">28</div>
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-kpi-card border rounded-4 p-3 shadow-sm h-100 position-relative overflow-hidden bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-wrap stat-icon-rose rounded-4 d-flex align-items-center justify-content-center">
                            <i class="bx bxs-heart fs-3"></i>
                        </div>
                        <div>
                            <div class="stat-caption text-muted text-uppercase fw-semibold">Tỷ Lệ Phù Hợp Sở Thích</div>
                            <div class="stat-val-group d-flex align-items-baseline gap-1">
                                <span class="stat-main-val text-pink fw-bold">95.8%</span>
                            </div>
                            <div class="stat-sub-note text-pink small fw-medium mt-1 font-monospace">
                                so_thich_du_khach
                            </div>
                        </div>
                    </div>
                    <div class="stat-watermark">95%</div>
                </div>
            </div>
        </div>

        <!-- 3. Tabs & Filter Bar -->
        <div class="filter-controls-card card border rounded-4 shadow-sm p-3 mb-4 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <!-- Segmented Tabs -->
                <div class="d-flex align-items-center gap-2">
                    <div class="segmented-control p-1 rounded-pill bg-light border d-inline-flex">
                        <button 
                            type="button" 
                            class="btn btn-segmented rounded-pill px-3 py-1 small fw-bold"
                            :class="{ active: currentTab === 'mine' }"
                            @click="currentTab = 'mine'"
                        >
                            Lịch trình của tôi (06)
                        </button>
                        <button 
                            type="button" 
                            class="btn btn-segmented rounded-pill px-3 py-1 small fw-bold"
                            :class="{ active: currentTab === 'community' }"
                            @click="currentTab = 'community'"
                        >
                            Cộng đồng chia sẻ (124)
                        </button>
                    </div>
                </div>

                <!-- Right filter inputs -->
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="search-box position-relative">
                        <i class="bx bx-search search-icon position-absolute"></i>
                        <input 
                            type="text" 
                            class="form-control form-control-sm search-input rounded-pill ps-4 pe-3 py-1"
                            placeholder="Tìm kiếm kế hoạch..."
                            v-model="key_search"
                        >
                    </div>

                    <select class="form-select form-select-sm filter-select rounded-pill" v-model="filterDuration">
                        <option value="all">Thời lượng: Tất cả</option>
                        <option value="2d1n">2 Ngày 1 Đêm</option>
                        <option value="3d2n">3 Ngày 2 Đêm</option>
                        <option value="4d3n">4 Ngày 3 Đêm</option>
                    </select>

                    <select class="form-select form-select-sm filter-select rounded-pill" v-model="filterBudget">
                        <option value="all">Ngân sách: Tất cả</option>
                        <option value="under_3">Dưới 3 triệu</option>
                        <option value="3_6">3 – 6 triệu</option>
                        <option value="over_6">Trên 6 triệu</option>
                    </select>

                    <button type="button" class="btn btn-outline-secondary btn-icon-square rounded-3" title="Xuất báo cáo PDF / Excel" @click="handleExport">
                        <i class="bx bx-upload"></i>
                    </button>
                </div>
            </div>

            <!-- Sub status pills -->
            <div class="sub-status-pills d-flex align-items-center gap-2 pt-3 border-top mt-3 flex-wrap">
                <button 
                    v-for="st in statusFilters" 
                    :key="st.key"
                    type="button"
                    class="btn btn-status-pill rounded-pill px-3 py-1 small fw-semibold"
                    :class="{ active: currentStatus === st.key }"
                    @click="currentStatus = st.key"
                >
                    {{ st.label }} ({{ getStatusCount(st.key) }})
                </button>
            </div>
        </div>

        <!-- 4. Plans Grid (4 Cards in 2x2) -->
        <div class="row g-4 mb-5">
            <div 
                v-for="plan in filteredPlans" 
                :key="plan.id"
                class="col-lg-6"
            >
                <div class="card plan-card border rounded-4 shadow-sm h-100 p-3 p-md-4 bg-white d-flex flex-column">
                    <!-- Card Top Header -->
                    <div class="d-flex justify-content-between align-items-start mb-2 gap-2">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="badge rounded-pill px-3 py-1 small fw-bold" :class="plan.status_badge_class">
                                {{ plan.status_label }}
                            </span>
                            <span class="badge bg-light text-secondary border rounded-pill px-2 py-1 small font-monospace">
                                {{ plan.ma_ke_hoach }}
                            </span>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-dot-menu rounded-circle" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                                <li>
                                    <router-link to="/client/lich-trinh-toi-uu" class="dropdown-item small d-flex align-items-center gap-2">
                                        <i class="bx bx-edit text-primary"></i>Chỉnh sửa lịch trình
                                    </router-link>
                                </li>
                                <li>
                                    <a class="dropdown-item small d-flex align-items-center gap-2" href="javascript:void(0)" @click="handleDuplicate(plan)">
                                        <i class="bx bx-copy text-purple"></i>Nhân bản kế hoạch
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item small d-flex align-items-center gap-2" href="javascript:void(0)" @click="handleShare(plan)">
                                        <i class="bx bx-share-alt text-teal"></i>Chia sẻ liên kết
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item small text-danger d-flex align-items-center gap-2" href="javascript:void(0)" @click="handleDelete(plan.id)">
                                        <i class="bx bx-trash"></i>Xóa kế hoạch
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Date range -->
                    <div class="text-primary small fw-semibold d-flex align-items-center gap-1 mb-2">
                        <i class="bx bx-calendar"></i>
                        <span>{{ plan.thoi_gian_chuoi }}</span>
                    </div>

                    <!-- Title -->
                    <h2 class="h5 fw-bold text-dark plan-title mb-3">
                        {{ plan.ten_ke_hoach }}
                    </h2>

                    <!-- Split Media / Route preview -->
                    <div class="row g-2 mb-3">
                        <!-- Left Image -->
                        <div class="col-7">
                            <div class="plan-img-wrap rounded-4 overflow-hidden position-relative h-100">
                                <img :src="plan.hinh_anh" class="w-100 h-100 object-fit-cover" :alt="plan.ten_ke_hoach">
                                <div class="img-badge-overlay position-absolute top-0 start-0 p-2 d-flex flex-column gap-1">
                                    <span class="badge badge-match-pill rounded-pill px-2 py-1 small">
                                        {{ plan.ty_le_khop }} Khớp sở thích
                                    </span>
                                </div>
                                <div class="img-sub-overlay position-absolute bottom-0 start-0 w-100 p-2 small text-white">
                                    <span class="tag-blur-pill px-2 py-1 rounded-pill">{{ plan.tags_phu_hop }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Route Map Snippet -->
                        <div class="col-5">
                            <div class="plan-route-box rounded-4 p-3 h-100 d-flex flex-column justify-content-between position-relative" :class="plan.route_box_class">
                                <div>
                                    <span class="badge rounded-pill px-2 py-1 small mb-1" :class="plan.route_badge_class">
                                        <i class="bx bx-pulse me-1"></i>{{ plan.route_badge }}
                                    </span>
                                    <div class="small fw-bold text-dark mt-1">{{ plan.route_highlight }}</div>
                                </div>
                                <div class="text-secondary small">
                                    <div class="fw-bold fs-6" :class="plan.km_text_class">{{ plan.tong_quang_duong }}</div>
                                    <div class="text-muted" style="font-size: 0.72rem;">{{ plan.route_sub_note }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4 Specifications boxes -->
                    <div class="row g-2 mb-3 text-center">
                        <div class="col-3" v-for="(spec, sIdx) in plan.specs" :key="sIdx">
                            <div class="spec-cell rounded-3 p-2 bg-light border">
                                <div class="spec-label text-muted text-uppercase" style="font-size: 0.65rem;">{{ spec.label }}</div>
                                <div class="spec-val fw-bold text-dark small text-truncate mt-1" :title="spec.value">{{ spec.value }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline stops snippet -->
                    <div class="plan-timeline-box rounded-3 p-2 p-md-3 bg-light border mb-3 flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.3px;">
                                {{ plan.timeline_title }}
                            </span>
                            <span class="badge bg-secondary-subtle text-secondary rounded-pill" style="font-size: 0.68rem;">
                                {{ plan.timeline_tag }}
                            </span>
                        </div>
                        <div class="d-flex align-items-center gap-1 flex-wrap timeline-chips">
                            <template v-for="(stop, stIdx) in plan.stops" :key="stIdx">
                                <span class="badge bg-white text-dark border rounded-pill px-2 py-1 small fw-medium">
                                    {{ stop }}
                                </span>
                                <i v-if="stIdx < plan.stops.length - 1" class="bx bx-chevron-right text-muted"></i>
                            </template>
                        </div>
                    </div>

                    <!-- Card Footer Actions -->
                    <div class="card-footer-actions pt-2 border-top d-flex align-items-center justify-content-between gap-2 flex-wrap">
                        <div>
                            <!-- Action Left -->
                            <button 
                                v-if="plan.btn_left_type === 'sync'" 
                                type="button" 
                                class="btn btn-sm text-secondary d-flex align-items-center gap-1 ps-0"
                                @click="handleSyncGoogle(plan)"
                            >
                                <i class="bx bxl-google text-danger fs-6"></i>
                                <span class="small">Đã đồng bộ Google Maps</span>
                            </button>

                            <button 
                                v-else-if="plan.btn_left_type === 'copy'" 
                                type="button" 
                                class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1 small fw-semibold"
                                @click="handleDuplicate(plan)"
                            >
                                <i class="bx bx-copy me-1"></i>Sao chép thành bản mới
                            </button>

                            <button 
                                v-else-if="plan.btn_left_type === 'review'" 
                                type="button" 
                                class="btn btn-sm btn-outline-info rounded-pill px-3 py-1 small fw-semibold"
                                @click="handleReviewTrip(plan)"
                            >
                                <i class="bx bx-star me-1"></i>Đánh giá chuyến đi
                            </button>

                            <button 
                                v-else 
                                type="button" 
                                class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1 small fw-semibold"
                                @click="handleEditParams(plan)"
                            >
                                <i class="bx bx-slider me-1"></i>Sửa tham số đầu vào
                            </button>
                        </div>

                        <div>
                            <!-- Action Right -->
                            <router-link 
                                v-if="plan.btn_right_type === 'edit'"
                                to="/client/lich-trinh-toi-uu" 
                                class="btn btn-sm btn-action-pink rounded-pill px-3 py-1 fw-bold text-white text-decoration-none d-flex align-items-center gap-1"
                            >
                                <span>Xem &amp; Tinh Chỉnh</span>
                                <i class="bx bx-right-arrow-alt fs-6"></i>
                            </router-link>

                            <router-link 
                                v-else-if="plan.btn_right_type === 'detail'"
                                to="/client/lich-trinh-toi-uu" 
                                class="btn btn-sm btn-action-purple rounded-pill px-3 py-1 fw-bold text-white text-decoration-none d-flex align-items-center gap-1"
                            >
                                <i class="bx bx-show fs-6"></i>
                                <span>Xem Chi Tiết</span>
                            </router-link>

                            <button 
                                v-else-if="plan.btn_right_type === 'reuse'"
                                type="button"
                                class="btn btn-sm btn-action-cyan rounded-pill px-3 py-1 fw-bold text-white d-flex align-items-center gap-1"
                                @click="handleReusePlan(plan)"
                            >
                                <i class="bx bx-refresh fs-6"></i>
                                <span>Tái Sử Dụng Lịch Trình</span>
                            </button>

                            <router-link 
                                v-else
                                to="/client/lich-trinh-toi-uu" 
                                class="btn btn-sm btn-action-pink rounded-pill px-3 py-1 fw-bold text-white text-decoration-none d-flex align-items-center gap-1"
                            >
                                <i class="bx bx-play-circle fs-6"></i>
                                <span>Tiếp Tục Chạy AI Tối Ưu</span>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Bottom Analysis & Personal Preferences Section (2 Columns) -->
        <div class="row g-4">
            <!-- Left Card: OSRM Algorithm Efficiency (8 Cols) -->
            <div class="col-lg-8">
                <div class="card border rounded-4 p-4 shadow-sm bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start mb-2 gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="osrm-icon-circle rounded-3 d-flex align-items-center justify-content-center text-teal">
                                <i class="bx bx-chip fs-4"></i>
                            </div>
                            <div>
                                <h3 class="h6 fw-bold text-dark mb-0">Hiệu Quả Thuật Toán OSRM &amp; Ma Trận Khoảng Cách</h3>
                                <p class="text-secondary small mb-0">Bảng phân tích tiết kiệm thời gian và quãng đường trên các tuyến trọng điểm</p>
                            </div>
                        </div>
                        <span class="badge bg-info-subtle text-teal border border-info-subtle rounded-pill px-3 py-1 small fw-semibold">
                            Real-time OSRM
                        </span>
                    </div>

                    <!-- Comparison 1 -->
                    <div class="route-efficiency-item p-3 rounded-4 border bg-light my-3">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                            <strong class="text-dark small">Tuyến Sơn Trà – Ngũ Hành Sơn – Phố Cổ Hội An</strong>
                            <span class="badge bg-teal-subtle text-teal rounded-pill px-2 py-1 small fw-semibold">
                                <i class="bx bx-check-circle me-1"></i>Tiết kiệm 42 phút (giảm 14.8 km vòng lặp)
                            </span>
                        </div>
                        <div class="progress-double d-flex flex-column gap-1">
                            <div class="d-flex align-items-center justify-content-between text-muted" style="font-size: 0.75rem;">
                                <span>Lộ trình truyền thống: 78 km (2h15m)</span>
                                <span class="fw-bold text-teal">Lộ trình AI SmartTrip: 63.2 km (1h33m)</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-teal-gradient" role="progressbar" style="width: 81%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Comparison 2 -->
                    <div class="route-efficiency-item p-3 rounded-4 border bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                            <strong class="text-dark small">Tuyến Trung tâm TP – Đỉnh Bàn Cờ – Bãi Bắc</strong>
                            <span class="badge bg-pink-subtle text-pink rounded-pill px-2 py-1 small fw-semibold">
                                <i class="bx bx-check-circle me-1"></i>Tiết kiệm 28 phút (tránh giờ cao điểm đèo dốc)
                            </span>
                        </div>
                        <div class="progress-double d-flex flex-column gap-1">
                            <div class="d-flex align-items-center justify-content-between text-muted" style="font-size: 0.75rem;">
                                <span>Lộ trình truyền thống: 46 km</span>
                                <span class="fw-bold text-pink">Lộ trình AI SmartTrip: 38.4 km</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-pink-gradient" role="progressbar" style="width: 83%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer TSP note -->
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top flex-wrap gap-2 text-muted small">
                        <div class="d-flex align-items-center gap-1">
                            <i class="bx bx-network-chart text-secondary"></i>
                            <span>Tối ưu hóa đa điểm TSP (Traveling Salesperson Problem) kết hợp điều kiện giao thông thực tế</span>
                        </div>
                        <router-link to="/client/kham-pha-dia-diem" class="text-teal fw-bold text-decoration-none">
                            Mở Bản đồ OSM &gt;
                        </router-link>
                    </div>
                </div>
            </div>

            <!-- Right Card: Personal Preferences Profile (4 Cols) -->
            <div class="col-lg-4">
                <div class="card border rounded-4 p-4 shadow-sm bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <div class="pref-icon-circle rounded-3 d-flex align-items-center justify-content-center text-pink">
                                <i class="bx bx-slider-alt fs-4"></i>
                            </div>
                            <div>
                                <h3 class="h6 fw-bold text-dark mb-0">Hồ Sơ Sở Thích Cá Nhân</h3>
                                <p class="text-secondary small mb-0">Ảnh hưởng trực tiếp đến kết quả xếp lịch</p>
                            </div>
                        </div>

                        <!-- Preferences Items -->
                        <div class="preferences-list d-flex flex-column gap-2 my-3">
                            <!-- Pref 1 -->
                            <div class="pref-item p-2 rounded-3 border d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2 small fw-semibold text-dark">
                                    <i class="bx bx-restaurant text-pink"></i>
                                    <span>Ẩm thực đường phố</span>
                                </div>
                                <span class="badge bg-pink text-white rounded-pill px-2 py-1 small">
                                    96% Ưu tiên
                                </span>
                            </div>

                            <!-- Pref 2 -->
                            <div class="pref-item p-2 rounded-3 border d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2 small fw-semibold text-dark">
                                    <i class="bx bx-camera text-purple"></i>
                                    <span>Check-in danh lam &amp; biển</span>
                                </div>
                                <span class="badge bg-purple text-white rounded-pill px-2 py-1 small">
                                    88% Ưu tiên
                                </span>
                            </div>

                            <!-- Pref 3 -->
                            <div class="pref-item p-2 rounded-3 border d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2 small fw-semibold text-dark">
                                    <i class="bx bx-moon text-teal"></i>
                                    <span>Hoạt động về đêm &amp; cầu Rồng</span>
                                </div>
                                <span class="badge bg-teal text-white rounded-pill px-2 py-1 small">
                                    80% Ưu tiên
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Button -->
                    <button type="button" class="btn btn-update-pref rounded-pill w-100 py-2 small fw-bold text-dark border d-flex align-items-center justify-content-center gap-2" @click="handleUpdatePref">
                        <i class="bx bx-user-check"></i>
                        <span>Cập nhật trọng số sở thích</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- 6. Compare Modal -->
        <div class="modal fade" :class="{ show: showCompareModal }" :style="{ display: showCompareModal ? 'block' : 'none' }" tabindex="-1" v-if="showCompareModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-0 pb-0">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-git-compare fs-4 text-purple"></i>
                            <h5 class="modal-title fw-bold text-dark mb-0">So Sánh 2 Phương Án Lịch Trình</h5>
                        </div>
                        <button type="button" class="btn-close" @click="showCompareModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6" v-for="p in allPlans.slice(0, 2)" :key="p.id">
                                <div class="p-3 border rounded-4 h-100 bg-light">
                                    <span class="badge rounded-pill mb-2 px-2 py-1" :class="p.status_badge_class">{{ p.status_label }}</span>
                                    <h6 class="fw-bold text-dark">{{ p.ten_ke_hoach }}</h6>
                                    <div class="small text-muted mb-2">{{ p.thoi_gian_chuoi }}</div>
                                    <ul class="list-unstyled small mb-0 d-flex flex-column gap-1">
                                        <li><strong>Tổng km:</strong> {{ p.tong_quang_duong }}</li>
                                        <li><strong>Ngân sách:</strong> {{ p.specs[2].value }}</li>
                                        <li><strong>Khớp sở thích:</strong> {{ p.ty_le_khop }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" @click="showCompareModal = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show" v-if="showCompareModal" @click="showCompareModal = false"></div>
    </div>
</template>

<script>
export default {
    name: 'LichSuKeHoachComponent',
    data() {
        return {
            key_search: '',
            currentTab: 'mine',
            currentStatus: 'all',
            filterDuration: 'all',
            filterBudget: 'all',
            showCompareModal: false,
            statusFilters: [
                { key: 'all', label: 'Tất cả' },
                { key: 'saved', label: 'Đã lưu' },
                { key: 'draft', label: 'Bản nháp' },
                { key: 'completed', label: 'Hoàn thành' }
            ],
            allPlans: [
                {
                    id: 1,
                    ma_ke_hoach: 'Mã: ADN-2025-3N2D',
                    ten_ke_hoach: 'Đà Nẵng Rực Rỡ: Biển Xanh – Bán Đảo Sơn Trà & Hội An Cổ Kính',
                    thoi_gian_chuoi: '15/05/2025 – 17/05/2025 (3 Ngày 2 Đêm)',
                    duration_code: '3d2n',
                    status_key: 'saved',
                    status_label: '● ĐANG KÍCH HOẠT DU LỊCH',
                    status_badge_class: 'badge-active-plan',
                    hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop&q=80',
                    ty_le_khop: '96.4%',
                    tags_phu_hop: 'Ăn uống địa phương + Chụp ảnh',
                    route_badge: 'OSRM Live',
                    route_badge_class: 'badge-route-cyan',
                    route_box_class: 'route-box-cyan',
                    route_highlight: 'Quãng đường tối ưu',
                    tong_quang_duong: '54.2 km tổng',
                    km_text_class: 'text-teal',
                    route_sub_note: 'Bỏ qua điểm kẹt xe',
                    specs: [
                        { label: 'Khách', value: '2 Người lớn' },
                        { label: 'Phương tiện', value: 'Xe máy tự lái' },
                        { label: 'Dự toán ngân sách', value: '5.000.000 đ' },
                        { label: 'Điểm khóa', value: '4 địa điểm' }
                    ],
                    timeline_title: 'HÀNH TRÌNH TIÊU BIỂU (12 ĐIỂM DỪNG)',
                    timeline_tag: 'NGÀY 1 – 3',
                    stops: ['Bãi biển Mỹ Khê', 'Chùa Linh Ứng', 'Phố cổ Hội An'],
                    btn_left_type: 'sync',
                    btn_right_type: 'edit',
                    ngan_sach: 5000000
                },
                {
                    id: 2,
                    ma_ke_hoach: 'Mã: ADN-2025-4N3D',
                    ten_ke_hoach: 'Khám Phá Toàn Diện Di Sản & Bà Nà Hills – Ngũ Hành Sơn',
                    thoi_gian_chuoi: '28/05/2025 – 31/05/2025 (4 Ngày 3 Đêm)',
                    duration_code: '4d3n',
                    status_key: 'saved',
                    status_label: '● KẾ HOẠCH GIA ĐÌNH',
                    status_badge_class: 'badge-family-plan',
                    hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=600&auto=format&fit=crop&q=80',
                    ty_le_khop: '98.2%',
                    tags_phu_hop: 'Nghỉ dưỡng + Thắng cảnh thế giới',
                    route_badge: 'Tuyến Ô tô',
                    route_badge_class: 'badge-route-purple',
                    route_box_class: 'route-box-purple',
                    route_highlight: '11 chặng OSRM',
                    tong_quang_duong: '88.4 km tổng',
                    km_text_class: 'text-purple',
                    route_sub_note: 'Êm ái cho người già & trẻ nhỏ',
                    specs: [
                        { label: 'Thành viên', value: '4 Người (Gia đình)' },
                        { label: 'Phương tiện', value: 'Ô tô có tài xế' },
                        { label: 'Dự toán ngân sách', value: '12.000.000 đ' },
                        { label: 'Nhịp điệu', value: 'Thư thả, nghỉ ngơi' }
                    ],
                    timeline_title: 'HÀNH TRÌNH 16 ĐIỂM DỪNG',
                    timeline_tag: 'NGÀY 1 – 4',
                    stops: ['Bà Nà Cáp Treo', 'Làng Pháp', 'Ngũ Hành Sơn'],
                    btn_left_type: 'copy',
                    btn_right_type: 'detail',
                    ngan_sach: 12000000
                },
                {
                    id: 3,
                    ma_ke_hoach: 'Mã: ADN-WEEKEND-01',
                    ten_ke_hoach: 'Cuối Tuần Ẩm Thực Chợ Đêm & Check-in Sông Hàn',
                    thoi_gian_chuoi: '19/04/2025 – 20/04/2025 (2 Ngày 1 Đêm)',
                    duration_code: '2d1n',
                    status_key: 'completed',
                    status_label: '✔ ĐÃ HOÀN THÀNH (THÁNG 04/2025)',
                    status_badge_class: 'badge-completed-plan',
                    hinh_anh: 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?w=600&auto=format&fit=crop&q=80',
                    ty_le_khop: '91.0%',
                    tags_phu_hop: 'Mì Quảng + Bánh tráng cuốn thịt heo',
                    route_badge: 'Food Tour',
                    route_badge_class: 'badge-route-cyan',
                    route_box_class: 'route-box-cyan',
                    route_highlight: 'Chi thực tế',
                    tong_quang_duong: '2.150.000 đ',
                    km_text_class: 'text-teal',
                    route_sub_note: 'Đã hoàn tất thanh toán',
                    specs: [
                        { label: 'Nhóm', value: '3 Bạn trẻ' },
                        { label: 'Phương tiện', value: 'Xe máy' },
                        { label: 'Đánh giá thực tế', value: '5.0 / 5.0 Sao' },
                        { label: 'Tiết kiệm', value: '-50.000 đ' }
                    ],
                    timeline_title: 'HÀNH TRÌNH 8 ĐIỂM ẨM THỰC',
                    timeline_tag: 'HOÀN TẤT',
                    stops: ['Chợ Hàn', 'Bánh tráng Bà Mua', 'Chợ đêm Sơn Trà'],
                    btn_left_type: 'review',
                    btn_right_type: 'reuse',
                    ngan_sach: 2150000
                },
                {
                    id: 4,
                    ma_ke_hoach: 'Mã: ADN-DRAFT-09',
                    ten_ke_hoach: 'Trekking Sơn Trà & Lặn San Hô Bãi Rạng',
                    thoi_gian_chuoi: 'Dự kiến: Tháng 09/2025 (Chưa cố định ngày)',
                    duration_code: 'all',
                    status_key: 'draft',
                    status_label: '● BẢN NHÁP CHƯA CHỐT',
                    status_badge_class: 'badge-draft-plan',
                    hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop&q=80',
                    ty_le_khop: 'Đang phân tích AI',
                    tags_phu_hop: 'Mạo hiểm + Sinh thái + Bụi cỏ',
                    route_badge: 'Khám phá',
                    route_badge_class: 'badge-route-pink',
                    route_box_class: 'route-box-pink',
                    route_highlight: 'Đang tính ma trận OSRM',
                    tong_quang_duong: '~3 chặng',
                    km_text_class: 'text-pink',
                    route_sub_note: 'Đang đợi thêm điểm đến',
                    specs: [
                        { label: 'Dự kiến khách', value: '2 Người lớn' },
                        { label: 'Thể loại', value: 'Trekking bản địa' },
                        { label: 'Thời gian', value: 'Chưa kích hoạt' },
                        { label: 'Tiến độ AI', value: '65% Dữ liệu' }
                    ],
                    timeline_title: 'ĐIỂM NHẬP ĐÃ CHỌN SƠ BỘ (5 ĐIỂM)',
                    timeline_tag: 'CHỜ TỐI ƯU HÓA',
                    stops: ['Cây Đa Ngàn Năm', 'Mũi Nghê bình minh', 'Bãi Rạng'],
                    btn_left_type: 'params',
                    btn_right_type: 'run_ai',
                    ngan_sach: 1800000
                }
            ]
        };
    },
    computed: {
        filteredPlans() {
            let res = [...this.allPlans];

            // Search filter
            if (this.key_search.trim()) {
                const s = this.key_search.toLowerCase().trim();
                res = res.filter(p => 
                    p.ten_ke_hoach.toLowerCase().includes(s) ||
                    p.ma_ke_hoach.toLowerCase().includes(s) ||
                    p.stops.some(st => st.toLowerCase().includes(s))
                );
            }

            // Status filter
            if (this.currentStatus !== 'all') {
                res = res.filter(p => p.status_key === this.currentStatus);
            }

            // Duration filter
            if (this.filterDuration !== 'all') {
                res = res.filter(p => p.duration_code === this.filterDuration);
            }

            // Budget filter
            if (this.filterBudget === 'under_3') {
                res = res.filter(p => p.ngan_sach < 3000000);
            } else if (this.filterBudget === '3_6') {
                res = res.filter(p => p.ngan_sach >= 3000000 && p.ngan_sach <= 6000000);
            } else if (this.filterBudget === 'over_6') {
                res = res.filter(p => p.ngan_sach > 6000000);
            }

            return res.length > 0 ? res : this.allPlans;
        }
    },
    methods: {
        getStatusCount(key) {
            if (key === 'all') return 6;
            if (key === 'saved') return 4;
            if (key === 'draft') return 1;
            if (key === 'completed') return 1;
            return 0;
        },
        handleComparePlans() {
            this.showCompareModal = true;
        },
        handleExport() {
            alert('Đang tạo và tải file PDF tổng hợp kế hoạch lịch trình du lịch Đà Nẵng...');
        },
        handleSyncGoogle(plan) {
            alert(`Lịch trình [${plan.ten_ke_hoach}] đã được đồng bộ với tài khoản Google Maps & Lịch Google của bạn!`);
        },
        handleDuplicate(plan) {
            alert(`Đã nhân bản kế hoạch: [${plan.ten_ke_hoach}] thành một bản sao mới!`);
        },
        handleShare(plan) {
            alert(`Đã sao chép liên kết chia sẻ của kế hoạch: [${plan.ten_ke_hoach}] vào bộ nhớ tạm!`);
        },
        handleDelete(id) {
            if (confirm('Bạn có chắc chắn muốn xóa kế hoạch này khỏi danh sách không?')) {
                const idx = this.allPlans.findIndex(x => x.id === id);
                if (idx >= 0) this.allPlans.splice(idx, 1);
            }
        },
        handleReviewTrip(plan) {
            alert(`Mở hộp thoại đánh giá trải nghiệm thực tế cho: ${plan.ten_ke_hoach}`);
        },
        handleReusePlan(plan) {
            alert(`Đã sao chép lại lịch trình [${plan.ten_ke_hoach}] sang mục tạo kế hoạch mới!`);
        },
        handleEditParams(plan) {
            alert(`Mở form điều chỉnh các tham số đầu vào cho: ${plan.ten_ke_hoach}`);
        },
        handleUpdatePref() {
            alert('Đã lưu cấu hình trọng số sở thích cá nhân. Thuật toán AI sẽ áp dụng cho tất cả lịch trình tiếp theo!');
        }
    }
};
</script>

<style scoped>
.lich-su-ke-hoach-page {
    max-width: 100%;
    overflow-x: hidden;
}

/* Color Tokens */
.text-pink { color: #db2777 !important; }
.text-teal { color: #0d9488 !important; }
.text-purple { color: #7c3aed !important; }
.bg-pink { background-color: #db2777 !important; }
.bg-teal { background-color: #0d9488 !important; }
.bg-purple { background-color: #7c3aed !important; }
.bg-teal-subtle { background-color: #ccfbf1 !important; }
.bg-pink-subtle { background-color: #fce7f3 !important; }

/* 1. Header Section */
.page-header-card {
    border-color: #f1f5f9 !important;
}
.badge-ai-optimizer {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #fff;
    font-size: 0.76rem;
    font-weight: 600;
}
.badge-osrm-ready {
    background: #e0f2fe;
    color: #0284c7;
    font-size: 0.76rem;
    font-weight: 600;
}
.page-title {
    font-size: 1.75rem;
    letter-spacing: -0.5px;
}
.btn-outline-compare {
    background: #fff;
    border: 1px solid #e2e8f0;
    color: #334155;
    font-size: 0.88rem;
    transition: all 0.2s;
}
.btn-outline-compare:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}
.btn-create-ai {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    font-size: 0.88rem;
    box-shadow: 0 4px 12px rgba(219, 39, 119, 0.25);
    transition: all 0.2s;
}
.btn-create-ai:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}
.header-decor-glow {
    position: absolute;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(236, 72, 153, 0.08) 0%, rgba(236, 72, 153, 0) 70%);
    top: -80px;
    right: 5%;
    pointer-events: none;
}

/* 2. Stat KPI Cards */
.stat-kpi-card {
    border-color: #f1f5f9 !important;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.stat-kpi-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06) !important;
}
.stat-icon-wrap {
    width: 52px;
    height: 52px;
    flex-shrink: 0;
}
.stat-icon-pink {
    background: #fdf2f8;
    color: #db2777;
}
.stat-icon-cyan {
    background: #f0fdfa;
    color: #0d9488;
}
.stat-icon-purple {
    background: #faf5ff;
    color: #7c3aed;
}
.stat-icon-rose {
    background: #fff1f2;
    color: #e11d48;
}
.stat-caption {
    font-size: 0.72rem;
    letter-spacing: 0.4px;
}
.stat-main-val {
    font-size: 1.7rem;
    line-height: 1.1;
}
.stat-watermark {
    position: absolute;
    right: 12px;
    bottom: -6px;
    font-size: 3.5rem;
    font-weight: 900;
    color: rgba(148, 163, 184, 0.08);
    user-select: none;
    pointer-events: none;
}

/* 3. Filter Controls Bar */
.filter-controls-card {
    border-color: #f1f5f9 !important;
}
.segmented-control {
    background-color: #f1f5f9;
}
.btn-segmented {
    border: none;
    background: transparent;
    color: #64748b;
    font-size: 0.82rem;
    transition: all 0.2s;
}
.btn-segmented.active {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #fff;
    box-shadow: 0 2px 8px rgba(219, 39, 119, 0.25);
}
.search-icon {
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 0.95rem;
}
.search-input {
    background-color: #f8fafc;
    border-color: #e2e8f0;
    font-size: 0.82rem;
    width: 170px;
}
.filter-select {
    width: auto;
    background-color: #f8fafc;
    border-color: #e2e8f0;
    font-size: 0.82rem;
}
.btn-icon-square {
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-color: #cbd5e1;
    color: #64748b;
}
.btn-status-pill {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #64748b;
    font-size: 0.78rem;
    transition: all 0.2s;
}
.btn-status-pill:hover {
    background-color: #f1f5f9;
}
.btn-status-pill.active {
    background-color: #db2777;
    border-color: #db2777;
    color: #fff;
}

/* 4. Plan Cards */
.plan-card {
    border-color: #f1f5f9 !important;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.plan-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08) !important;
}
.badge-active-plan {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
}
.badge-family-plan {
    background: #faf5ff;
    color: #7c3aed;
    border: 1px solid #ede9fe;
}
.badge-completed-plan {
    background: #f0fdf4;
    color: #16a34a;
    border: 1px solid #bbf7d0;
}
.badge-draft-plan {
    background: #fffbeb;
    color: #d97706;
    border: 1px solid #fef3c7;
}
.btn-dot-menu {
    border: none;
    background: transparent;
    color: #94a3b8;
    font-size: 1.25rem;
    padding: 4px;
}
.btn-dot-menu:hover {
    color: #334155;
    background-color: #f1f5f9;
}
.plan-title {
    font-size: 1.05rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 2.8em;
}
.plan-img-wrap {
    height: 140px;
}
.badge-match-pill {
    background: rgba(219, 39, 119, 0.9);
    color: #fff;
    backdrop-filter: blur(4px);
    font-size: 0.68rem;
    font-weight: 600;
}
.tag-blur-pill {
    background: rgba(15, 23, 42, 0.75);
    backdrop-filter: blur(4px);
    font-size: 0.68rem;
}
.route-box-cyan {
    background: #f0fdfa;
    border: 1px solid #ccfbf1;
}
.route-box-purple {
    background: #faf5ff;
    border: 1px solid #ede9fe;
}
.route-box-pink {
    background: #fdf2f8;
    border: 1px solid #fce7f3;
}
.badge-route-cyan {
    background: #ccfbf1;
    color: #0d9488;
}
.badge-route-purple {
    background: #ede9fe;
    color: #7c3aed;
}
.badge-route-pink {
    background: #fce7f3;
    color: #db2777;
}
.spec-cell {
    border-color: #f1f5f9 !important;
}
.plan-timeline-box {
    border-color: #f1f5f9 !important;
}
.btn-action-pink {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    box-shadow: 0 4px 10px rgba(219, 39, 119, 0.25);
    transition: all 0.2s;
}
.btn-action-pink:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}
.btn-action-purple {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    box-shadow: 0 4px 10px rgba(109, 40, 217, 0.25);
    transition: all 0.2s;
}
.btn-action-purple:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}
.btn-action-cyan {
    background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
    box-shadow: 0 4px 10px rgba(13, 148, 136, 0.25);
    transition: all 0.2s;
}
.btn-action-cyan:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}

/* 5. Bottom Analysis Section */
.osrm-icon-circle {
    width: 44px;
    height: 44px;
    background-color: #f0fdfa;
}
.pref-icon-circle {
    width: 44px;
    height: 44px;
    background-color: #fdf2f8;
}
.bg-teal-gradient {
    background: linear-gradient(90deg, #14b8a6 0%, #0d9488 100%);
}
.bg-pink-gradient {
    background: linear-gradient(90deg, #ec4899 0%, #db2777 100%);
}
.btn-update-pref {
    background-color: #f8fafc;
    border-color: #e2e8f0;
    transition: all 0.2s;
}
.btn-update-pref:hover {
    background-color: #f1f5f9;
}
</style>
