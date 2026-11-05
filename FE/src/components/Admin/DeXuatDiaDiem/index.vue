<template>
    <div class="admin-page-container">
        <!-- 1. Top Badges & Breadcrumb Area -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="badge-portal-pink">
                    <i class="bx bx-check-shield me-1"></i> CỔNG THẨM ĐỊNH ĐIỂM ĐẾN
                </span>
                <span class="badge-live-queue">
                    <span class="live-dot"></span> Live Queue
                </span>
            </div>
            <div class="text-muted font-12">
                Đà Nẵng SmartTrip AI • POI Verification Engine v3.2
            </div>
        </div>

        <!-- 2. Header & Action Buttons -->
        <div class="d-flex flex-wrap align-items-start justify-content-between mb-4 gap-3">
            <div class="header-left">
                <h3 class="page-title mb-1">Kiểm Duyệt Địa Điểm Đề Xuất (POI Moderation Queue)</h3>
                <p class="text-muted small mb-0 header-desc">
                    Thẩm định tính chính xác pháp lý, tọa độ GPS thực địa, thông tin giấy phép vệ sinh ATTP/an toàn du lịch và ảnh thực tế của các địa điểm mới do đối tác gửi lên trước khi đồng bộ vào kho dữ liệu TP Đà Nẵng.
                </p>
            </div>
            <div class="d-flex flex-wrap align-items-center gap-2 header-actions">
                <button class="btn btn-soft-purple btn-sm rounded-pill px-3 py-2 fw-semibold" @click="openQuyChuanModal">
                    <i class="bx bx-book-bookmark me-1"></i> Quy Chuẩn Thẩm Định POI
                </button>
                <button class="btn btn-soft-purple btn-sm rounded-pill px-3 py-2 fw-semibold" @click="xuatBaoCao">
                    <i class="bx bx-download me-1"></i> Xuất Báo Cáo Thẩm Định
                </button>
                <button class="btn btn-pink-gradient text-white btn-sm rounded-pill px-3 py-2 fw-bold" @click="duyetHangLoat">
                    <i class="bx bx-check-double me-1"></i> Duyệt Hàng Loạt Theo Batch ({{ listQueue.length }})
                </button>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- Card 1: Hàng đợi chờ duyệt -->
            <div class="col-xl-3 col-sm-6">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="kpi-label">HÀNG ĐỢI CHỜ DUYỆT</span>
                            <h2 class="kpi-value text-dark mb-1">{{ listQueue.length }}</h2>
                            <small class="text-pink font-12 fw-semibold">+4 hồ sơ mới trong 24h qua</small>
                        </div>
                        <div class="kpi-icon-box bg-pink-subtle text-pink">
                            <i class="bx bx-clipboard"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Đã duyệt tháng này -->
            <div class="col-xl-3 col-sm-6">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="kpi-label">ĐÃ DUYỆT THÁNG NÀY</span>
                            <h2 class="kpi-value text-dark mb-1">45</h2>
                            <small class="text-success font-12 fw-semibold">93.8% Tỉ lệ đạt tiêu chuẩn sàn</small>
                        </div>
                        <div class="kpi-icon-box bg-purple-subtle text-purple">
                            <i class="bx bx-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Yêu cầu bổ sung -->
            <div class="col-xl-3 col-sm-6">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="kpi-label">YÊU CẦU BỔ SUNG</span>
                            <h2 class="kpi-value text-primary mb-1">06</h2>
                            <small class="text-muted font-12"><strong class="text-primary">Chờ</strong> đối tác gửi giấy phép con</small>
                        </div>
                        <div class="kpi-icon-box bg-primary-subtle text-primary">
                            <i class="bx bx-undo"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Sai lệch GPS tự động -->
            <div class="col-xl-3 col-sm-6">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="kpi-label">SAI LỆCH GPS TỰ ĐỘNG</span>
                            <h2 class="kpi-value text-dark mb-1">0.8%</h2>
                            <small class="text-success font-12 fw-semibold">◆ Thuật toán OSM khớp chuẩn</small>
                        </div>
                        <div class="kpi-icon-box bg-indigo-subtle text-indigo">
                            <i class="bx bx-satellite"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Master-Detail Layout (Two Columns) -->
        <div class="row g-3">
            <!-- LEFT COLUMN: Danh Sách Hồ Sơ Chờ Duyệt (approx 4.2 cols) -->
            <div class="col-lg-4 col-xl-4">
                <div class="queue-master-container">
                    <!-- Queue Header & Filters -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-time text-pink font-18"></i>
                            <h6 class="fw-bold text-dark mb-0 font-13">DANH SÁCH HỒ SƠ CHỜ DUYỆT ({{ listQueue.length }})</h6>
                        </div>
                        <div class="d-flex gap-1">
                            <button class="filter-pill-btn" :class="{ active: filterCategory === 'all' }" @click="filterCategory = 'all'">
                                Tất cả
                            </button>
                            <button class="filter-pill-btn" :class="{ active: filterCategory === 'sinh_thai' }" @click="filterCategory = 'sinh_thai'">
                                Sinh Thái
                            </button>
                            <button class="filter-pill-btn" :class="{ active: filterCategory === 'am_thuc' }" @click="filterCategory = 'am_thuc'">
                                Ẩm Thực
                            </button>
                        </div>
                    </div>

                    <!-- Queue List Cards -->
                    <div class="queue-list d-flex flex-column gap-3">
                        <div 
                            v-for="item in filteredQueue" 
                            :key="item.id" 
                            class="queue-item-card p-3 rounded-4 bg-white border shadow-sm cursor-pointer"
                            :class="{ 'item-selected': selectedItem && selectedItem.id === item.id }"
                            @click="selectItem(item)"
                        >
                            <!-- Top row: Code & Time -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge-poi-code">{{ item.code }}</span>
                                <span class="text-muted font-11">
                                    <i class="bx bx-time-five me-1"></i>{{ item.time_ago }}
                                </span>
                            </div>

                            <!-- Name -->
                            <h6 class="queue-item-title mb-1 text-dark fw-bold font-14">{{ item.name }}</h6>

                            <!-- Partner & District -->
                            <div class="d-flex align-items-center gap-2 mb-2 font-12 text-muted">
                                <span class="partner-name"><i class="bx bx-building me-1"></i>{{ item.partner_name }}</span>
                                <span class="badge bg-light text-secondary border font-10">{{ item.district }}</span>
                            </div>

                            <!-- Status / Tag Indicator -->
                            <div class="d-flex justify-content-between align-items-center font-12 pt-1 border-top">
                                <span v-if="selectedItem && selectedItem.id === item.id" class="text-pink fw-semibold font-11">
                                    <span class="active-dot"></span> Đang thẩm định chi tiết
                                </span>
                                <span v-else-if="item.alert_tag" class="badge-subtle-blue font-11">
                                    {{ item.alert_tag }}
                                </span>
                                <span v-else class="text-muted font-11">
                                    {{ item.category_tag }}
                                </span>

                                <span v-if="selectedItem && selectedItem.id === item.id" class="text-pink fw-bold">
                                    <i class="bx bx-right-arrow-alt font-18"></i>
                                </span>
                                <span v-else class="text-muted font-11">
                                    Chờ duyệt
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Hồ Sơ Đang Xét Chi Tiết (approx 7.8 cols) -->
            <div class="col-lg-8 col-xl-8" v-if="selectedItem">
                <div class="detail-panel p-4 rounded-4 bg-white border shadow-sm">
                    <!-- Detail Header Area -->
                    <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <span class="badge-detail-code">Hồ sơ đang xét {{ selectedItem.code }}</span>
                            <span class="badge-draft">Bảng: dia_diem (Draft)</span>
                        </div>
                        <div class="partner-author-box text-end">
                            <span class="author-label d-block text-muted font-10 text-uppercase fw-bold">ĐƠN VỊ ĐỀ XUẤT</span>
                            <strong class="text-dark font-13">{{ selectedItem.partner_name }}</strong>
                            <span class="d-block text-muted font-11">Mã ĐT: {{ selectedItem.partner_code }}</span>
                        </div>
                    </div>

                    <!-- POI Big Title -->
                    <h4 class="fw-bold text-dark mb-3 poi-main-title">{{ selectedItem.name }}</h4>

                    <!-- 2 Info Blocks: Time/Price & Tags -->
                    <div class="row g-3 mb-4">
                        <!-- Left Block: Time & Price -->
                        <div class="col-md-6">
                            <div class="info-highlight-box p-3 rounded-3 h-100">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bx bx-time text-pink font-16"></i>
                                    <span class="font-11 fw-bold text-uppercase text-dark">THỜI GIAN HOẠT ĐỘNG & GIÁ DỊCH VỤ</span>
                                </div>
                                <div class="font-13 text-secondary mb-1">
                                    Khung giờ: <strong>{{ selectedItem.opening_hours }}</strong>
                                </div>
                                <div class="font-13 text-secondary">
                                    Giá vé niêm yết: <strong class="text-pink font-14">{{ selectedItem.ticket_price }}</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Right Block: Tags -->
                        <div class="col-md-6">
                            <div class="info-highlight-box p-3 rounded-3 h-100">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="bx bx-purchase-tag text-purple font-16"></i>
                                    <span class="font-11 fw-bold text-uppercase text-dark">THẺ SỞ THÍCH ĐỐI TÁC ĐỀ XUẤT</span>
                                </div>
                                <div class="d-flex flex-wrap gap-1">
                                    <span v-for="tag in selectedItem.tags" :key="tag" class="tag-pill-purple">
                                        #{{ tag }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 1: Kiểm Tra Tọa Độ GPS Thực Địa (WGS84) -->
                    <div class="detail-section mb-4">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-circle icon-circle-blue">
                                    <i class="bx bx-map-pin"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 font-14">Kiểm tra Tọa Độ GPS Thực Địa (WGS84)</h6>
                                    <small class="text-muted font-12">
                                        Tọa độ do đối tác gửi: <strong>{{ selectedItem.coordinates }}</strong> • {{ selectedItem.address }}
                                    </small>
                                </div>
                            </div>
                            <span class="badge-osm-pass">
                                <i class="bx bx-check-circle me-1"></i> Độ lệch OSM: &lt; 1.2m (Đạt)
                            </span>
                        </div>

                        <!-- Simulated Interactive Map Box -->
                        <div class="map-preview-container rounded-4 position-relative overflow-hidden border">
                            <!-- Map View Mode Switchers -->
                            <div class="map-controls-top-left">
                                <div class="btn-group btn-group-sm bg-white rounded-pill shadow-sm p-1">
                                    <button class="btn btn-sm rounded-pill px-3 py-1 fw-bold" :class="mapMode === 'osm' ? 'btn-pink-gradient text-white' : 'btn-light text-secondary'" @click="mapMode = 'osm'">
                                        OSM Chuẩn
                                    </button>
                                    <button class="btn btn-sm rounded-pill px-3 py-1 fw-bold" :class="mapMode === 'satellite' ? 'btn-pink-gradient text-white' : 'btn-light text-secondary'" @click="mapMode = 'satellite'">
                                        Vệ Tinh
                                    </button>
                                    <button class="btn btn-sm rounded-pill px-3 py-1 fw-bold" :class="mapMode === 'terrain' ? 'btn-pink-gradient text-white' : 'btn-light text-secondary'" @click="mapMode = 'terrain'">
                                        Địa Hình
                                    </button>
                                </div>
                            </div>

                            <!-- Stylized Vector Map Graphics -->
                            <div class="stylized-map-surface">
                                <svg viewBox="0 0 800 320" class="w-100 h-100 map-svg-render" preserveAspectRatio="none">
                                    <defs>
                                        <linearGradient id="oceanGrad" x1="0" y1="0" x2="1" y2="1">
                                            <stop offset="0%" stop-color="#bfdbfe" />
                                            <stop offset="100%" stop-color="#93c5fd" />
                                        </linearGradient>
                                        <linearGradient id="landGrad" x1="0" y1="0" x2="0" y2="1">
                                            <stop offset="0%" stop-color="#e2e8f0" />
                                            <stop offset="100%" stop-color="#cbd5e1" />
                                        </linearGradient>
                                    </defs>

                                    <!-- Sea & Bay -->
                                    <rect width="800" height="320" fill="url(#oceanGrad)" />

                                    <!-- Land mass Da Nang -->
                                    <path d="M0,0 L350,0 Q390,70 380,140 Q450,170 540,160 Q620,180 660,250 L680,320 L0,320 Z" fill="url(#landGrad)" opacity="0.85" />
                                    
                                    <!-- Roads / Highways -->
                                    <path d="M0,80 Q250,90 380,140 T540,160 T800,280" fill="none" stroke="#f1f5f9" stroke-width="6" />
                                    <path d="M0,80 Q250,90 380,140 T540,160 T800,280" fill="none" stroke="#cbd5e1" stroke-width="3" stroke-dasharray="8 4" />
                                    <path d="M220,0 Q260,90 300,160 T350,320" fill="none" stroke="#f8fafc" stroke-width="4" />

                                    <!-- Labels on Map -->
                                    <text x="210" y="110" font-size="11" fill="#64748b" font-weight="600">Suối Lương Eco Park</text>
                                    <text x="50" y="70" font-size="11" fill="#94a3b8">Đèo Hải Vân</text>
                                    <text x="440" y="140" font-size="12" fill="#3b82f6" font-weight="700">VỊNH ĐÀ NẴNG</text>
                                    <text x="630" y="220" font-size="11" fill="#64748b">Bán Đảo Sơn Trà</text>
                                    <text x="560" y="270" font-size="11" fill="#475569" font-weight="600">Sông Hàn (Hải Châu)</text>

                                    <!-- Point of Interest Target Pulse & Marker -->
                                    <circle cx="280" cy="125" r="28" fill="#e11d48" opacity="0.15">
                                        <animate attributeName="r" values="16;34;16" dur="2s" repeatCount="indefinite" />
                                        <animate attributeName="opacity" values="0.25;0;0.25" dur="2s" repeatCount="indefinite" />
                                    </circle>
                                    <circle cx="280" cy="125" r="16" fill="#e11d48" opacity="0.25" />
                                    <circle cx="280" cy="125" r="8" fill="#e11d48" stroke="#ffffff" stroke-width="2" />
                                </svg>

                                <!-- Floating Map Pin Tag -->
                                <div class="floating-pin-badge">
                                    <div class="pin-icon-wrap">
                                        <i class="bx bx-map-pin"></i>
                                    </div>
                                    <span class="pin-text">Vị trí POI thực tế</span>
                                </div>
                            </div>

                            <!-- Bottom bar inside map: Coordinates & Fullscreen -->
                            <div class="map-bottom-bar d-flex justify-content-between align-items-center px-3 py-2">
                                <span class="font-monospace text-white font-12">
                                    Lat: {{ selectedItem.lat }}° N | Lon: {{ selectedItem.lon }}° E
                                </span>
                                <button class="btn btn-sm btn-light rounded-pill px-3 py-1 font-11 fw-bold shadow-sm" @click="viewFullScreenMap">
                                    <i class="bx bx-expand me-1"></i> Xem toàn màn hình vệ tinh
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: Kiểm Tra 3 Ảnh Thực Tế & Dữ Liệu EXIF GPS -->
                    <div class="detail-section mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="section-icon-circle icon-circle-purple">
                                    <i class="bx bx-camera"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 font-14">Kiểm Tra 3 Ảnh Thực Tế & Dữ Liệu EXIF GPS</h6>
                                    <small class="text-muted font-12">
                                        Ảnh chụp hiện trường gốc do nhân viên lữ hành kiểm chứng tại địa bàn
                                    </small>
                                </div>
                            </div>
                            <span class="text-success font-12 fw-bold">
                                <i class="bx bx-check-double me-1"></i> 3/3 Ảnh hợp lệ
                            </span>
                        </div>

                        <!-- 3 Photos Cards Grid -->
                        <div class="row g-3">
                            <div class="col-md-4" v-for="(photo, pIdx) in selectedItem.photos" :key="pIdx">
                                <div class="exif-photo-card rounded-4 border overflow-hidden bg-light shadow-sm">
                                    <!-- Photo & Pill on Image -->
                                    <div class="photo-img-wrap position-relative">
                                        <img :src="photo.url" class="w-100 photo-real" :alt="photo.title" @click="previewPhoto(photo)">
                                        <span class="photo-overlay-tag">{{ photo.tag_label }}</span>
                                    </div>
                                    <!-- Photo Title & EXIF -->
                                    <div class="p-2 bg-white">
                                        <strong class="text-dark font-12 d-block text-truncate">{{ photo.title }}</strong>
                                        <small class="text-muted font-11 d-flex align-items-center gap-1 mt-1">
                                            <i class="bx bx-info-circle text-primary"></i> {{ photo.exif }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: Quyết Định Kiểm Duyệt POI -->
                    <div class="decision-section p-3 rounded-4 bg-light border">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-gavel text-pink font-20"></i>
                                <h6 class="fw-bold text-dark mb-0 font-14">Quyết Định Kiểm Duyệt POI</h6>
                            </div>
                            <span class="text-muted font-12">
                                Người thẩm định: <strong class="text-dark">Trần Hoàng Long (Admin)</strong>
                            </span>
                        </div>

                        <!-- Feedback Comment Textarea -->
                        <div class="mb-3">
                            <label class="form-label font-12 fw-semibold text-secondary">
                                Ghi chú phản hồi / Điều kiện kiểm duyệt (Sẽ gửi thông báo cho {{ selectedItem.partner_name }}):
                            </label>
                            <textarea 
                                class="form-control rounded-3 font-13" 
                                rows="2" 
                                v-model="moderationNote"
                                placeholder="Nhập nhận xét kiểm duyệt, khuyến nghị biển báo an toàn cứu sinh hoặc lý do từ chối nếu có..."
                            ></textarea>
                        </div>

                        <!-- 3 Checkbox Validation Conditions -->
                        <div class="row g-2 mb-3">
                            <div class="col-md-4">
                                <div class="validation-check-pill p-2 rounded-3 border bg-white d-flex align-items-center gap-2">
                                    <input type="checkbox" class="form-check-input check-pink m-0" id="checkGps" v-model="checkOsmGps">
                                    <label class="form-check-label font-12 fw-semibold text-dark cursor-pointer mb-0" for="checkGps">
                                        Đã khớp GPS OSM
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="validation-check-pill p-2 rounded-3 border bg-white d-flex align-items-center gap-2">
                                    <input type="checkbox" class="form-check-input check-pink m-0" id="checkRescue" v-model="checkRescueEquip">
                                    <label class="form-check-label font-12 fw-semibold text-dark cursor-pointer mb-0" for="checkRescue">
                                        Đã trang bị cứu hộ
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="validation-check-pill p-2 rounded-3 border bg-white d-flex align-items-center gap-2">
                                    <input type="checkbox" class="form-check-input check-pink m-0" id="checkPhoto" v-model="checkRealPhoto">
                                    <label class="form-check-label font-12 fw-semibold text-dark cursor-pointer mb-0" for="checkPhoto">
                                        Ảnh chụp thực địa chuẩn
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex flex-wrap justify-content-end align-items-center gap-2 pt-2 border-top">
                            <button class="btn btn-outline-danger btn-sm rounded-pill px-3 py-2 fw-semibold font-12" @click="tuChoiDeXuat">
                                <i class="bx bx-x-circle me-1"></i> Từ Chối Đề Xuất
                            </button>
                            <button class="btn btn-soft-purple btn-sm rounded-pill px-3 py-2 fw-semibold font-12" @click="yeuCauBoSung">
                                <i class="bx bx-info-circle me-1"></i> Yêu Cầu Bổ Sung Minh Chứng
                            </button>
                            <button class="btn btn-pink-gradient text-white btn-sm rounded-pill px-4 py-2 fw-bold font-13" @click="duyetNapVaoKho">
                                <i class="bx bx-check-shield me-1"></i> Duyệt & Nạp Vào Kho POI Hệ Thống
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Modal Xem Ảnh Phóng To -->
        <div class="modal fade" id="photoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 overflow-hidden shadow" v-if="previewingPhoto">
                    <div class="modal-header bg-dark text-white p-3">
                        <h6 class="modal-title font-14 fw-bold">{{ previewingPhoto.title }}</h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0 text-center bg-black">
                        <img :src="previewingPhoto.url" class="img-fluid" style="max-height: 520px; object-fit: contain;">
                    </div>
                    <div class="modal-footer bg-dark text-white border-0 p-3 d-flex justify-content-between font-12">
                        <span>Tag: <strong>{{ previewingPhoto.tag_label }}</strong></span>
                        <span class="text-warning">{{ previewingPhoto.exif }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. Modal Quy Chuẩn Thẩm Định POI -->
        <div class="modal fade" id="quyChuanModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header bg-pink text-white rounded-top-4">
                        <h5 class="modal-title fw-bold font-16">Quy Chuẩn Thẩm Định Điểm Đến Mới (SmartTrip POI Standards)</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <h6 class="fw-bold text-pink font-14 mb-2">1. Yêu cầu tọa độ địa lý WGS84:</h6>
                        <p class="text-secondary mb-3">Tọa độ phải được đối chiếu qua node bản đồ OpenStreetMap (OSM) với độ sai lệch không vượt quá 5 mét so với vị trí thực tế trên vệ tinh.</p>

                        <h6 class="fw-bold text-pink font-14 mb-2">2. Yêu cầu ảnh chụp hiện trường (EXIF Data):</h6>
                        <p class="text-secondary mb-3">Tối thiểu 3 ảnh chụp thực tế có gắn cờ EXIF GPS Tagged và Timestamp trong vòng 30 ngày gần nhất (Cổng vào, bãi đỗ xe hoặc trạm tiếp đón, tiện ích dịch vụ chính).</p>

                        <h6 class="fw-bold text-pink font-14 mb-2">3. Điều kiện an toàn & Pháp lý:</h6>
                        <p class="text-secondary mb-0">Các điểm vui chơi mạo hiểm, tắm suối hoặc lặn biển bắt buộc xuất trình chứng chỉ an toàn cứu sinh, áo phao tiêu chuẩn và có nhân sự cứu hộ trực trong giờ hoạt động.</p>
                    </div>
                    <div class="modal-footer border-0 p-3 bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DeXuatDiaDiemAdmin',
    data() {
        return {
            filterCategory: 'all',
            mapMode: 'osm',
            selectedItem: null,
            previewingPhoto: null,
            moderationNote: '',
            checkOsmGps: true,
            checkRescueEquip: true,
            checkRealPhoto: true,
            listQueue: [
                {
                    id: 1,
                    code: '#POI-2024-890',
                    time_ago: '2 giờ trước',
                    name: 'Khu Trải Nghiệm Sinh Thái Suối Lương Mới',
                    category_code: 'sinh_thai',
                    partner_name: 'Danang Explorer Corp',
                    partner_code: 'DT-DNEXP-2023',
                    district: 'Hòa Vang',
                    address: 'Phường Hòa Hiệp Bắc, Quận Liên Chiểu',
                    coordinates: '16.142050, 108.125920',
                    lat: '16.142050',
                    lon: '108.125920',
                    opening_hours: '07:30 - 18:00 (Hàng ngày)',
                    ticket_price: '50.000 VNĐ / Người',
                    tags: ['SinhThai', 'SuoiVoi', 'GiaDinh', 'CamTrai'],
                    alert_tag: null,
                    category_tag: 'Sinh thái & Dã ngoại',
                    photos: [
                        {
                            title: '1. Cổng vào điểm đến',
                            tag_label: 'Cổng vào',
                            url: 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?w=500&auto=format&fit=crop',
                            exif: 'EXIF: Sony A7C • 08:15 AM'
                        },
                        {
                            title: '2. Bãi đỗ xe 45 chỗ',
                            tag_label: 'Bãi xe',
                            url: 'https://images.unsplash.com/photo-1506521781263-d8422e82f27a?w=500&auto=format&fit=crop',
                            exif: 'EXIF: iPhone 15 Pro • 08:20 AM'
                        },
                        {
                            title: '3. Bờ suối & Áo phao',
                            tag_label: 'Bờ suối & Cứu hộ',
                            url: 'https://images.unsplash.com/photo-1511497584788-87676104235f?w=500&auto=format&fit=crop',
                            exif: 'EXIF: GPS Tagged • 08:45 AM'
                        }
                    ]
                },
                {
                    id: 2,
                    code: '#POI-2024-889',
                    time_ago: '4 giờ trước',
                    name: 'Trạm Chèo SUP Hoàng Hôn Bán Đảo Sơn Trà',
                    category_code: 'sinh_thai',
                    partner_name: 'Son Tra WaterSports Club',
                    partner_code: 'DT-SONTRA-091',
                    district: 'Sơn Trà',
                    address: 'Bãi Bụt, Bán đảo Sơn Trà, Quận Sơn Trà',
                    coordinates: '16.115800, 108.272100',
                    lat: '16.115800',
                    lon: '108.272100',
                    opening_hours: '15:30 - 18:30 (Hàng ngày)',
                    ticket_price: '250.000 VNĐ / Người (gồm SUP & áo phao)',
                    tags: ['CheoSUP', 'HoangHon', 'SonTra', 'BienDaNang'],
                    alert_tag: 'Cần kiểm tra an toàn đường thủy',
                    category_tag: 'Thể thao biển',
                    photos: [
                        {
                            title: '1. Khu vực neo đậu SUP',
                            tag_label: 'Bãi xuất phát',
                            url: 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=500&auto=format&fit=crop',
                            exif: 'EXIF: GoPro 11 • 15:40 PM'
                        },
                        {
                            title: '2. Giá treo áo phao cứu sinh',
                            tag_label: 'Cứu hộ an toàn',
                            url: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=500&auto=format&fit=crop',
                            exif: 'EXIF: iPhone 14 • 15:45 PM'
                        },
                        {
                            title: '3. Hoàng hôn Bãi Bụt',
                            tag_label: 'Cảnh quan thực địa',
                            url: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=500&auto=format&fit=crop',
                            exif: 'EXIF: GPS Tagged • 16:10 PM'
                        }
                    ]
                },
                {
                    id: 3,
                    code: '#POI-2024-888',
                    time_ago: '7 giờ trước',
                    name: 'Bếp Mẹ Quê - Ẩm Thực Cơm Niêu Truyền Thống',
                    category_code: 'am_thuc',
                    partner_name: 'Hộ Kinh Doanh Bếp Mẹ Quê',
                    partner_code: 'DT-BEPQUE-114',
                    district: 'Hải Châu',
                    address: 'Số 86 Bạch Đằng, Quận Hải Châu',
                    coordinates: '16.071200, 108.223500',
                    lat: '16.071200',
                    lon: '108.223500',
                    opening_hours: '10:00 - 22:00 (Hàng ngày)',
                    ticket_price: '80.000 - 250.000 VNĐ / Món',
                    tags: ['AmThuc', 'ComNieu', 'SongHan', 'GiaDinh'],
                    alert_tag: 'Chờ đối soát giấy VSATTP',
                    category_tag: 'Ẩm thực truyền thống',
                    photos: [
                        {
                            title: '1. Không gian mặt tiền Bạch Đằng',
                            tag_label: 'Mặt tiền',
                            url: 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=500&auto=format&fit=crop',
                            exif: 'EXIF: Sony A7 • 10:15 AM'
                        },
                        {
                            title: '2. Bếp nấu niêu cơm đạt chuẩn',
                            tag_label: 'Khu chế biến',
                            url: 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=500&auto=format&fit=crop',
                            exif: 'EXIF: iPhone 13 • 10:25 AM'
                        },
                        {
                            title: '3. Giấy chứng nhận VSATTP',
                            tag_label: 'Hồ sơ pháp lý',
                            url: 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=500&auto=format&fit=crop',
                            exif: 'EXIF: GPS Tagged • 10:40 AM'
                        }
                    ]
                },
                {
                    id: 4,
                    code: '#POI-2024-887',
                    time_ago: '1 ngày trước',
                    name: 'Vườn Hoa Nhiệt Đới Bà Nà Farmstay',
                    category_code: 'sinh_thai',
                    partner_name: 'Bana EcoTour Co., Ltd',
                    partner_code: 'DT-BANA-008',
                    district: 'Hòa Vang',
                    address: 'Thôn An Sơn, Xã Hòa Ninh, Huyện Hòa Vang',
                    coordinates: '15.998400, 108.012500',
                    lat: '15.998400',
                    lon: '108.012500',
                    opening_hours: '08:00 - 17:00 (T6 - CN)',
                    ticket_price: '70.000 VNĐ / Người',
                    tags: ['Farmstay', 'VuonHoa', 'BaNa', 'Checkin'],
                    alert_tag: null,
                    category_tag: 'Farmstay & Nghỉ dưỡng',
                    photos: [
                        {
                            title: '1. Cổng hoa chào đón du khách',
                            tag_label: 'Cổng vào',
                            url: 'https://images.unsplash.com/photo-1500651230702-0e2d8a49d4ad?w=500&auto=format&fit=crop',
                            exif: 'EXIF: Canon R6 • 09:10 AM'
                        },
                        {
                            title: '2. Đồi cúc họa mi và hoa cẩm tú cầu',
                            tag_label: 'Vườn hoa',
                            url: 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=500&auto=format&fit=crop',
                            exif: 'EXIF: iPhone 15 • 09:30 AM'
                        },
                        {
                            title: '3. Khu trải nghiệm hái dâu tây sạch',
                            tag_label: 'Nông trại',
                            url: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=500&auto=format&fit=crop',
                            exif: 'EXIF: GPS Tagged • 10:00 AM'
                        }
                    ]
                }
            ]
        };
    },
    computed: {
        filteredQueue() {
            if (this.filterCategory === 'all') {
                return this.listQueue;
            }
            return this.listQueue.filter(item => item.category_code === this.filterCategory);
        }
    },
    mounted() {
        if (this.listQueue.length > 0) {
            this.selectedItem = this.listQueue[0];
        }
    },
    methods: {
        selectItem(item) {
            this.selectedItem = item;
            this.moderationNote = '';
            this.checkOsmGps = true;
            this.checkRescueEquip = true;
            this.checkRealPhoto = true;
        },
        duyetNapVaoKho() {
            if (!this.checkOsmGps || !this.checkRealPhoto) {
                alert('Vui lòng kiểm tra và tích chọn xác nhận các tiêu chí GPS và ảnh thực địa trước khi duyệt!');
                return;
            }
            const name = this.selectedItem.name;
            const code = this.selectedItem.code;
            alert(`✅ ĐÃ PHÊ DUYỆT THÀNH CÔNG!\n\nĐịa điểm: ${name} (${code})\nĐã đồng bộ tọa độ WGS84 và nạp chính thức vào Kho Địa Điểm Đà Nẵng (dia_diems). Hệ thống tự động gửi thông báo chúc mừng tới đối tác ${this.selectedItem.partner_name}.`);

            // Remove from queue and select next
            const currentId = this.selectedItem.id;
            this.listQueue = this.listQueue.filter(q => q.id !== currentId);
            this.selectedItem = this.listQueue.length > 0 ? this.listQueue[0] : null;
        },
        yeuCauBoSung() {
            if (!this.moderationNote.trim()) {
                alert('Vui lòng nhập lý do hoặc danh sách giấy tờ/minh chứng cần bổ sung vào ô ghi chú phản hồi!');
                return;
            }
            alert(`⚠️ ĐÃ GỬI YÊU CẦU BỔ SUNG!\n\nHồ sơ: ${this.selectedItem.code}\nNội dung yêu cầu đã được gửi đến email và tài khoản đối tác: "${this.moderationNote}"`);
        },
        tuChoiDeXuat() {
            if (!this.moderationNote.trim()) {
                alert('Vui lòng ghi rõ lý do từ chối để đối tác nắm được!');
                return;
            }
            if (confirm(`Bạn có chắc chắn muốn TỪ CHỐI đề xuất "${this.selectedItem.name}"?`)) {
                alert(`❌ Đã từ chối đề xuất ${this.selectedItem.code}. Hồ sơ đã chuyển vào mục Lưu trữ vi phạm/Từ chối.`);
                const currentId = this.selectedItem.id;
                this.listQueue = this.listQueue.filter(q => q.id !== currentId);
                this.selectedItem = this.listQueue.length > 0 ? this.listQueue[0] : null;
            }
        },
        duyetHangLoat() {
            if (confirm(`Bạn có muốn duyệt tự động toàn bộ ${this.listQueue.length} hồ sơ trong batch có độ khớp OSM > 95%?`)) {
                alert(`Đã duyệt thành công ${this.listQueue.length} địa điểm POI mới vào cơ sở dữ liệu Đà Nẵng!`);
                this.listQueue = [];
                this.selectedItem = null;
            }
        },
        xuatBaoCao() {
            alert('Đang kết xuất báo cáo thẩm định POI định dạng PDF/Excel...');
        },
        openQuyChuanModal() {
            const modalEl = document.getElementById('quyChuanModal');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        previewPhoto(photo) {
            this.previewingPhoto = photo;
            const modalEl = document.getElementById('photoModal');
            if (modalEl && window.bootstrap) {
                const modal = new window.bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        viewFullScreenMap() {
            alert(`Mở chế độ bản đồ toàn màn hình cho tọa độ: ${this.selectedItem.coordinates}`);
        }
    }
};
</script>

<style scoped>
.admin-page-container {
    padding: 6px 2px 24px;
    font-family: inherit;
}

/* 1. Header Badges */
.badge-portal-pink {
    background: #fff1f2;
    color: #e11d48;
    border: 1px solid #fecdd3;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
}

.badge-live-queue {
    background: #faf5ff;
    color: #9333ea;
    border: 1px solid #f3e8ff;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.live-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #9333ea;
    box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.2);
}

.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.3px;
}

.header-desc {
    max-width: 900px;
    line-height: 1.5;
}

/* Buttons */
.btn-soft-purple {
    background-color: #f5f3ff;
    color: #6366f1;
    border: 1px solid #e0e7ff;
    transition: all 0.2s;
}
.btn-soft-purple:hover {
    background-color: #ede9fe;
    color: #4f46e5;
}

.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #be123c 100%);
    border: none;
    box-shadow: 0 3px 10px rgba(225, 29, 72, 0.25);
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}
.btn-pink-gradient:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(225, 29, 72, 0.35);
}

.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }

/* 2. KPI Cards */
.kpi-card {
    border-color: #f1f5f9 !important;
    transition: transform 0.2s;
}
.kpi-card:hover {
    transform: translateY(-2px);
}
.kpi-label {
    font-size: 0.72rem;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.5px;
    display: block;
}
.kpi-value {
    font-size: 1.85rem;
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.5px;
}
.kpi-icon-box {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
    flex-shrink: 0;
}
.bg-pink-subtle { background-color: #fff1f2; }
.bg-purple-subtle { background-color: #faf5ff; }
.bg-primary-subtle { background-color: #eff6ff; }
.bg-indigo-subtle { background-color: #f5f3ff; }
.text-purple { color: #9333ea; }
.text-indigo { color: #4f46e5; }

/* 3. Left Master List */
.filter-pill-btn {
    border: 1px solid #f1f5f9;
    background-color: #ffffff;
    color: #64748b;
    font-size: 0.76rem;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 999px;
    transition: all 0.15s ease;
}
.filter-pill-btn.active {
    background-color: #e11d48;
    color: #ffffff;
    border-color: #e11d48;
}

.queue-item-card {
    border-color: #f1f5f9 !important;
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
}
.queue-item-card:hover {
    border-color: #fecdd3 !important;
    transform: translateX(2px);
}
.queue-item-card.item-selected {
    border-color: #fda4af !important;
    background-color: #fff5f7 !important;
    box-shadow: 0 4px 14px rgba(225, 29, 72, 0.08) !important;
}

.badge-poi-code {
    background: #fff1f2;
    color: #e11d48;
    font-size: 0.74rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 6px;
    font-family: var(--bs-font-monospace);
}

.badge-subtle-blue {
    background: #eff6ff;
    color: #1d4ed8;
    border: 1px solid #dbeafe;
    padding: 2px 8px;
    border-radius: 6px;
    font-weight: 600;
}

.active-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #e11d48;
    display: inline-block;
    margin-right: 4px;
}

/* 4. Right Detail Panel */
.detail-panel {
    border-color: #f1f5f9 !important;
}

.badge-detail-code {
    background: #fff1f2;
    color: #e11d48;
    border: 1px solid #fecdd3;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 8px;
}

.badge-draft {
    background: #eff6ff;
    color: #0284c7;
    border: 1px solid #bae6fd;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 8px;
}

.poi-main-title {
    font-size: 1.35rem;
    letter-spacing: -0.3px;
}

.info-highlight-box {
    background-color: #faf5ff;
    border: 1px solid #f3e8ff;
}

.tag-pill-purple {
    background-color: #ffffff;
    color: #7e22ce;
    border: 1px solid #e9d5ff;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 999px;
}

.section-icon-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}
.icon-circle-blue {
    background-color: #eff6ff;
    color: #2563eb;
}
.icon-circle-purple {
    background-color: #faf5ff;
    color: #9333ea;
}

.badge-osm-pass {
    background-color: #eff6ff;
    color: #0284c7;
    border: 1px solid #bae6fd;
    font-size: 0.76rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 999px;
}

/* Map Preview */
.map-preview-container {
    height: 250px;
    background-color: #e2e8f0;
}
.map-controls-top-left {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
}
.stylized-map-surface {
    width: 100%;
    height: 100%;
    position: relative;
}
.map-svg-render {
    display: block;
}
.floating-pin-badge {
    position: absolute;
    top: 42%;
    left: 36%;
    transform: translate(-50%, -100%);
    display: flex;
    align-items: center;
    gap: 6px;
    background-color: rgba(225, 29, 72, 0.95);
    color: #ffffff;
    padding: 4px 10px;
    border-radius: 999px;
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
    font-size: 0.74rem;
    font-weight: 700;
    pointer-events: none;
}
.pin-icon-wrap {
    font-size: 0.9rem;
}
.map-bottom-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.85) 100%);
    z-index: 10;
}

/* Photos Grid */
.exif-photo-card {
    transition: transform 0.2s;
}
.exif-photo-card:hover {
    transform: translateY(-2px);
}
.photo-img-wrap {
    height: 130px;
    overflow: hidden;
}
.photo-real {
    height: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.3s ease;
}
.photo-real:hover {
    transform: scale(1.05);
}
.photo-overlay-tag {
    position: absolute;
    bottom: 6px;
    left: 6px;
    background-color: rgba(15, 23, 42, 0.75);
    color: #ffffff;
    font-size: 0.68rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 4px;
    backdrop-filter: blur(2px);
}

/* Validation Checkboxes */
.validation-check-pill {
    transition: background-color 0.15s;
}
.check-pink:checked {
    background-color: #e11d48;
    border-color: #e11d48;
}

.cursor-pointer { cursor: pointer; }
.font-10 { font-size: 0.68rem; }
.font-11 { font-size: 0.72rem; }
.font-12 { font-size: 0.78rem; }
.font-13 { font-size: 0.82rem; }
.font-14 { font-size: 0.88rem; }
.font-16 { font-size: 1rem; }
.font-18 { font-size: 1.15rem; }
.font-20 { font-size: 1.25rem; }
</style>
