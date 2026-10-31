<template>
    <div class="partner-tuyen-diem-page">
        <!-- 1. Header Banner & Action Buttons -->
        <div class="page-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                        <span class="badge-tag-pill tag-pink">
                            <i class="bx bx-map-pin me-1"></i> HỆ THỐNG TUYẾN ĐIỂM & OSRM ENGINE
                        </span>
                        <span class="text-muted font-11">Database: tuyen_diem_tour & ma_tran_khoang_cach</span>
                    </div>
                    <h2 class="page-title mb-1">Thiết Lập Tuyến Điểm Dừng & Điểm Tập Trung Trên Bản Đồ OSM</h2>
                    
                    <!-- Selected Tour Dropdown & Meta summary -->
                    <div class="d-flex align-items-center flex-wrap gap-2 mt-2">
                        <div class="tour-selector-box d-flex align-items-center bg-white border rounded-pill px-3 py-1 shadow-sm">
                            <span class="text-pink font-11 fw-bold me-2"><i class="bx bx-edit-alt"></i> Đang chỉnh sửa:</span>
                            <select class="form-select form-select-sm border-0 bg-transparent p-0 font-12 fw-bold text-dark" v-model="tourDangChon">
                                <option value="DN-02">#TOUR-DN-02 – Di Sản Đà Nẵng – Bà Nà – Hội An (3N2Đ)</option>
                                <option value="DN-01">#TOUR-DN-01 – Bán Đảo Sơn Trà – Ngũ Hành Sơn (1N)</option>
                                <option value="DN-03">#TOUR-DN-03 – Lặn Biển Ngắm San Hô Cù Lao Chàm (1N)</option>
                            </select>
                        </div>
                        <span class="badge bg-purple-light text-purple rounded-pill px-3 py-1-5 font-11 fw-bold">
                            {{ danhSachDiemDung.length }} Điểm Tham Quan + {{ diemDonPhu.length + 1 }} Điểm Đón
                        </span>
                    </div>
                </div>

                <!-- Top Right Action Buttons -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-purple-gradient text-white px-3 py-2 rounded-3 fw-bold font-12 shadow-sm" type="button" @click="toiUuHoaAI">
                        <i class="bx bx-sparkles me-1 font-16 align-middle"></i> Tối Ưu Hóa Thứ Tự Điểm Bằng AI
                    </button>
                    <button class="btn btn-pink-gradient text-white px-3 py-2 rounded-3 fw-bold font-12 shadow-sm" type="button" @click="luuCauHinhTuyen">
                        <i class="bx bx-save me-1 font-16 align-middle"></i> Lưu Cấu Hình Tuyến Đường
                    </button>
                    <button class="btn btn-light border p-2 rounded-3 text-secondary" title="Xem dạng lưới" @click="cheDoXem = cheDoXem === 'map' ? 'grid' : 'map'">
                        <i class="bx bx-grid-alt font-18 align-middle"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. Main 2-Column Section: Left = Transit Hubs & Waypoint Sequence, Right = OSM Route Map -->
        <div class="row g-4">
            <!-- Left Column: Primary Transit Hub, Additional Pickups, Waypoint Sequence & OSRM Metrics -->
            <div class="col-xl-5 col-lg-5 d-flex flex-column gap-3">
                <!-- Card 1: Điểm Tập Trung Khởi Hành (Chính) -->
                <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 bg-white transit-hub-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="hub-icon bg-pink-light text-pink rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-flag font-18"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0 font-13">ĐIỂM TẬP TRUNG KHỞI HÀNH (CHÍNH)</h6>
                                <small class="text-muted font-10">Thực thể: diem_tap_trung / WGS84 Reference</small>
                            </div>
                        </div>
                        <span class="badge bg-pink text-white rounded-pill px-3 py-1 font-10 fw-bold">Mặc Định</span>
                    </div>

                    <!-- Main Hub Box -->
                    <div class="main-hub-box p-3 rounded-3 border bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <div class="d-flex align-items-center gap-2">
                                <div class="hub-sub-icon bg-pink-light text-pink rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bx-plane-takeoff font-14"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-0 font-13">{{ diemTapTrungChinh.ten }}</h6>
                            </div>
                            <a href="javascript:void(0)" class="text-pink font-11 fw-semibold text-decoration-none" @click="moModalDoiToaDo">
                                Đổi Tọa Độ
                            </a>
                        </div>
                        <p class="font-11 text-muted mb-2 ms-4 ps-1">
                            {{ diemTapTrungChinh.dia_chi }}
                        </p>
                        <div class="d-flex align-items-center gap-3 ms-4 ps-1 font-11 text-secondary">
                            <span>Vĩ độ (Lat): <strong class="font-monospace text-dark">{{ diemTapTrungChinh.lat }}° N</strong></span>
                            <span>Kinh độ (Lng): <strong class="font-monospace text-dark">{{ diemTapTrungChinh.lng }}° E</strong></span>
                        </div>
                    </div>

                    <!-- Additional Pickups (Bán kính đón khách phụ) -->
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="font-11 fw-bold text-secondary text-uppercase">
                                BÁN KÍNH ĐÓN KHÁCH PHỤ ({{ diemDonPhu.length }} ĐIỂM ĐÓN THÊM)
                            </span>
                            <a href="javascript:void(0)" class="text-pink font-11 fw-semibold text-decoration-none" @click="moModalThemDiemDon">
                                <i class="bx bx-plus-circle me-1"></i> Thêm điểm
                            </a>
                        </div>

                        <div class="d-flex flex-column gap-2">
                            <div 
                                v-for="p in diemDonPhu" 
                                :key="p.id" 
                                class="pickup-subitem p-2 px-3 rounded-3 border bg-white d-flex align-items-center justify-content-between font-11"
                            >
                                <div class="d-flex align-items-center gap-2 min-w-0">
                                    <span class="pickup-badge bg-purple-light text-purple fw-bold rounded-circle">{{ p.code }}</span>
                                    <div class="text-truncate">
                                        <div class="fw-bold text-dark text-truncate">{{ p.ten }}</div>
                                        <div class="text-muted text-truncate font-10">{{ p.dia_chi }}</div>
                                    </div>
                                </div>
                                <span class="badge bg-cyan-light text-cyan rounded-pill font-10 px-2 py-1 flex-shrink-0 ms-2">
                                    {{ p.thoi_gian_them }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Chuỗi Điểm Dừng Tuyến Tour (Waypoints) -->
                <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 bg-white waypoints-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 font-13">CHUỖI ĐIỂM DỪNG TUYẾN TOUR</h6>
                            <small class="text-muted font-10">Thứ tự ghé thăm tối ưu OSRM (1 ➔ {{ danhSachDiemDung.length }})</small>
                        </div>
                        <span class="badge bg-pink-light text-pink rounded-pill px-3 py-1 font-10 fw-bold">
                            {{ danhSachDiemDung.length }} Điểm Tham Quan
                        </span>
                    </div>

                    <!-- Waypoints Drag/Sort List -->
                    <div class="waypoints-list d-flex flex-column gap-2 mb-3">
                        <div 
                            v-for="(diem, index) in danhSachDiemDung" 
                            :key="diem.id"
                            class="waypoint-item-card p-3 rounded-3 border bg-light position-relative"
                            :class="{ 'border-pink': diemDangChon?.id === diem.id }"
                            @click="chonDiemTrenBanDo(diem)"
                        >
                            <div class="d-flex align-items-start justify-content-between gap-2 mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="drag-handle text-muted cursor-grab"><i class="bx bx-grid-vertical"></i></span>
                                    <span class="waypoint-num-circle bg-pink text-white fw-bold rounded-circle">
                                        {{ index + 1 }}
                                    </span>
                                    <h6 class="fw-bold text-dark mb-0 font-13 text-truncate" style="max-width: 250px;">
                                        {{ diem.ten }}
                                    </h6>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <button class="btn btn-sm btn-icon-subtle" title="Lên trên" :disabled="index === 0" @click.stop="diChuyenDiem(index, -1)">
                                        <i class="bx bx-chevron-up"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon-subtle" title="Xuống dưới" :disabled="index === danhSachDiemDung.length - 1" @click.stop="diChuyenDiem(index, 1)">
                                        <i class="bx bx-chevron-down"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon-subtle" title="Sửa điểm" @click.stop="suaDiem(diem)">
                                        <i class="bx bx-edit-alt"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon-subtle text-danger" title="Xóa điểm" @click.stop="xoaDiem(diem)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-3 ms-4 ps-2 font-11 text-secondary mb-1">
                                <span><i class="bx bx-time me-1 text-muted"></i>{{ diem.thoi_gian_dung }}</span>
                                <span><i class="bx bx-navigation me-1 text-primary"></i>{{ diem.cu_ly_tu_diem_truoc }}</span>
                            </div>

                            <div class="ms-4 ps-2">
                                <span class="badge bg-purple-light text-purple rounded-pill font-9 px-2 py-0-5">
                                    {{ diem.dia_chi_phuong }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Add POI Button -->
                    <button class="btn btn-outline-pink-dashed w-100 py-2 rounded-3 fw-bold font-12" @click="moModalThemPOI">
                        <i class="bx bx-plus-circle me-1"></i> + Thêm Điểm POI Từ Cơ Sở Dữ Liệu Đà Nẵng
                    </button>
                </div>

                <!-- Card 3: Chỉ Số Tính Toán OSRM & Khí Thải -->
                <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 bg-white osrm-metrics-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="metrics-icon bg-cyan-light text-cyan rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-tachometer font-18"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-0 font-13">CHỈ SỐ TÍNH TOÁN OSRM & KHÍ THẢI</h6>
                        </div>
                        <span class="badge bg-cyan-light text-cyan rounded-pill px-3 py-1 font-10 fw-bold">Thuật Toán Dijkstra</span>
                    </div>

                    <div class="row g-2 text-center mb-3">
                        <div class="col-4">
                            <div class="p-2 rounded-3 bg-light border">
                                <div class="font-10 text-muted">Tổng cự ly</div>
                                <div class="fw-bold font-16 text-pink">{{ tongCuLy }} <span class="font-11">km</span></div>
                                <div class="font-9 text-secondary">Chuẩn lộ trình xe 29c</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 rounded-3 bg-light border">
                                <div class="font-10 text-muted">Thời gian chạy</div>
                                <div class="fw-bold font-16 text-dark">{{ tongThoiGianChay }}</div>
                                <div class="font-9 text-cyan">Chưa gồm giờ dừng</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 rounded-3 bg-light border">
                                <div class="font-10 text-muted">Tiết kiệm CO2</div>
                                <div class="fw-bold font-16 text-success">-22%</div>
                                <div class="font-9 text-secondary">Nhờ gom tuyến AI</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between p-2 px-3 rounded-3 bg-purple-light border border-purple-subtle font-11">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-trip text-purple font-16"></i>
                            <span class="text-secondary">Tốc độ trung bình đề xuất: <strong class="text-dark">42.5 km/h</strong> (Đô thị và đường ven biển Võ Nguyên Giáp)</span>
                        </div>
                        <svg width="48" height="18" viewBox="0 0 48 18">
                            <path d="M 0,14 Q 12,2 24,10 T 48,6" fill="none" stroke="#9333ea" stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Right Column: Interactive OSM Map View & Leg Breakdown -->
            <div class="col-xl-7 col-lg-7 d-flex flex-column gap-3">
                <!-- Interactive OpenStreetMap Container -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white map-panel-card">
                    <!-- Map Top Controls Bar -->
                    <div class="map-controls-bar d-flex flex-wrap align-items-center justify-content-between p-3 border-bottom bg-white gap-2">
                        <!-- Mode pills -->
                        <div class="d-flex align-items-center gap-1">
                            <button 
                                class="btn btn-sm map-mode-pill" 
                                :class="kieuBanDo === 'osm' ? 'active-mode' : ''"
                                @click="kieuBanDo = 'osm'"
                            >
                                OSM Chuẩn
                            </button>
                            <button 
                                class="btn btn-sm map-mode-pill" 
                                :class="kieuBanDo === 've_tinh' ? 'active-mode' : ''"
                                @click="kieuBanDo = 've_tinh'"
                            >
                                Vệ Tinh
                            </button>
                            <button 
                                class="btn btn-sm map-mode-pill" 
                                :class="kieuBanDo === 'dia_hinh' ? 'active-mode' : ''"
                                @click="kieuBanDo = 'dia_hinh'"
                            >
                                Địa Hình
                            </button>
                        </div>

                        <!-- Live Traffic Toggle -->
                        <div class="d-flex align-items-center gap-2 font-11">
                            <span class="traffic-dot bg-success"></span>
                            <span class="text-secondary fw-semibold">Lưu Lượng Giao Thông Thời Gian Thực (TomTom/OSM)</span>
                        </div>
                    </div>

                    <!-- Map Canvas / SVG Interactive Rendering -->
                    <div class="osm-map-viewport position-relative" style="height: 520px; background-color: #e2e8f0;">
                        <!-- SVG Vector Representation of Da Nang & OSRM Route -->
                        <svg viewBox="0 0 800 520" class="w-100 h-100 osm-svg-canvas" preserveAspectRatio="none">
                            <defs>
                                <!-- Map Sea / Land Patterns -->
                                <linearGradient id="seaGradient" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%" stop-color="#bae6fd" />
                                    <stop offset="100%" stop-color="#7dd3fc" />
                                </linearGradient>
                                <linearGradient id="landGradient" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%" stop-color="#f8fafc" />
                                    <stop offset="100%" stop-color="#f1f5f9" />
                                </linearGradient>
                                <filter id="glowRoute" x="-20%" y="-20%" width="140%" height="140%">
                                    <feGaussianBlur stdDeviation="3" result="glow" />
                                    <feComposite in="SourceGraphic" in2="glow" operator="over" />
                                </filter>
                            </defs>

                            <!-- Land Base -->
                            <rect width="800" height="520" fill="url(#landGradient)" />

                            <!-- Sea Shape (East Sea & Da Nang Bay) -->
                            <path d="M 450,0 Q 560,80 500,200 T 560,350 L 800,450 L 800,0 Z" fill="url(#seaGradient)" opacity="0.65" />
                            <text x="640" y="160" font-size="14" font-weight="700" fill="#0284c7" opacity="0.8">Biển Đông (Đà Nẵng)</text>

                            <!-- Bay area -->
                            <path d="M 380,0 Q 420,90 320,130 L 410,130 Q 460,90 450,0 Z" fill="#93c5fd" opacity="0.5" />
                            <text x="350" y="70" font-size="11" font-weight="600" fill="#0284c7" opacity="0.7">Vịnh Đà Nẵng</text>

                            <!-- Mountain Range (Ba Na & Son Tra) -->
                            <ellipse cx="600" cy="50" rx="90" ry="40" fill="#86efac" opacity="0.4" />
                            <text x="560" y="55" font-size="11" font-weight="700" fill="#15803d">Bán Đảo Sơn Trà</text>

                            <ellipse cx="200" cy="380" rx="140" ry="70" fill="#bbf7d0" opacity="0.4" />
                            <text x="140" y="380" font-size="12" font-weight="700" fill="#15803d">Dãy Núi Chúa (Bà Nà)</text>

                            <!-- Major Roads -->
                            <path d="M 250,520 L 400,260 L 520,380 L 620,520" fill="none" stroke="#cbd5e1" stroke-width="5" />
                            <path d="M 400,260 L 600,60" fill="none" stroke="#cbd5e1" stroke-width="4" />
                            <path d="M 400,260 L 220,360" fill="none" stroke="#cbd5e1" stroke-width="4" />

                            <!-- OSRM Route Polyline (Glowing Magenta Line) -->
                            <!-- Sequence: T1 (390,250) -> P1 (460,260) -> 1 Son Tra (600,60) -> 2 Ngu Hanh Son (520,340) -> 3 Hoi An (600,480) -> 4 Ba Na (220,360) -> T1 -->
                            <path 
                                d="M 390,250 L 600,60 L 520,340 L 600,480 L 220,360 Z" 
                                fill="none" 
                                stroke="#ec4899" 
                                stroke-width="4" 
                                stroke-linecap="round" 
                                stroke-linejoin="round"
                                filter="url(#glowRoute)"
                            />

                            <!-- Dashed connections to pickup points -->
                            <line x1="390" y1="250" x2="450" y2="280" stroke="#9333ea" stroke-width="2" stroke-dasharray="4,4" />
                            <line x1="390" y1="250" x2="420" y2="210" stroke="#9333ea" stroke-width="2" stroke-dasharray="4,4" />

                            <!-- Pins / Markers -->

                            <!-- Transit Hub: Sân Bay T1 -->
                            <g transform="translate(390, 250)">
                                <circle r="16" fill="#e11d48" opacity="0.2" />
                                <circle r="10" fill="#e11d48" stroke="#ffffff" stroke-width="2" />
                                <text x="0" y="3" text-anchor="middle" font-size="9" fill="#ffffff" font-weight="bold">T1</text>
                                <rect x="-60" y="-32" width="120" height="18" rx="4" fill="rgba(15, 23, 42, 0.85)" />
                                <text x="0" y="-20" text-anchor="middle" font-size="9" fill="#ffffff" font-weight="600">Sân Bay (Đón Khởi Hành)</text>
                            </g>

                            <!-- Pickup P1: Mường Thanh -->
                            <g transform="translate(450, 280)">
                                <circle r="8" fill="#9333ea" stroke="#ffffff" stroke-width="1.5" />
                                <text x="0" y="3" text-anchor="middle" font-size="8" fill="#ffffff" font-weight="bold">P1</text>
                            </g>

                            <!-- Pickup P2: Novotel -->
                            <g transform="translate(420, 210)">
                                <circle r="8" fill="#9333ea" stroke="#ffffff" stroke-width="1.5" />
                                <text x="0" y="3" text-anchor="middle" font-size="8" fill="#ffffff" font-weight="bold">P2</text>
                            </g>

                            <!-- Waypoint 1: Sơn Trà & Linh Ứng -->
                            <g transform="translate(600, 60)">
                                <circle r="22" fill="#e11d48" opacity="0.25" />
                                <circle r="14" fill="#e11d48" stroke="#ffffff" stroke-width="2.5" />
                                <text x="0" y="4" text-anchor="middle" font-size="11" fill="#ffffff" font-weight="bold">1</text>
                                <rect x="-85" y="-36" width="170" height="20" rx="4" fill="#ffffff" stroke="#e11d48" stroke-width="1" />
                                <text x="0" y="-22" text-anchor="middle" font-size="9" fill="#0f172a" font-weight="bold">1. Chùa Linh Ứng Bãi Bụt (09:00)</text>
                            </g>

                            <!-- Waypoint 2: Ngũ Hành Sơn -->
                            <g transform="translate(520, 340)">
                                <circle r="20" fill="#e11d48" opacity="0.25" />
                                <circle r="13" fill="#e11d48" stroke="#ffffff" stroke-width="2.5" />
                                <text x="0" y="4" text-anchor="middle" font-size="11" fill="#ffffff" font-weight="bold">2</text>
                                <rect x="-65" y="-34" width="130" height="18" rx="4" fill="#ffffff" stroke="#e11d48" stroke-width="1" />
                                <text x="0" y="-21" text-anchor="middle" font-size="9" fill="#0f172a" font-weight="bold">2. Ngũ Hành Sơn (120p)</text>
                            </g>

                            <!-- Waypoint 3: Phố Cổ Hội An -->
                            <g transform="translate(600, 480)">
                                <circle r="20" fill="#e11d48" opacity="0.25" />
                                <circle r="13" fill="#e11d48" stroke="#ffffff" stroke-width="2.5" />
                                <text x="0" y="4" text-anchor="middle" font-size="11" fill="#ffffff" font-weight="bold">3</text>
                                <rect x="-65" y="-34" width="130" height="18" rx="4" fill="#ffffff" stroke="#e11d48" stroke-width="1" />
                                <text x="0" y="-21" text-anchor="middle" font-size="9" fill="#0f172a" font-weight="bold">3. Phố Cổ Hội An & Chùa Cầu</text>
                            </g>

                            <!-- Waypoint 4: Sun World Bà Nà Hills -->
                            <g transform="translate(220, 360)">
                                <circle r="22" fill="#e11d48" opacity="0.25" />
                                <circle r="14" fill="#e11d48" stroke="#ffffff" stroke-width="2.5" />
                                <text x="0" y="4" text-anchor="middle" font-size="11" fill="#ffffff" font-weight="bold">4</text>
                                <rect x="-75" y="-36" width="150" height="20" rx="4" fill="#ffffff" stroke="#e11d48" stroke-width="1" />
                                <text x="0" y="-22" text-anchor="middle" font-size="9" fill="#0f172a" font-weight="bold">4. Sun World Bà Nà Hills</text>
                            </g>
                        </svg>

                        <!-- Map Navigation Controls (Top Right Overlay) -->
                        <div class="map-nav-controls position-absolute top-0 end-0 m-3 d-flex flex-column gap-1">
                            <button class="btn btn-sm btn-white shadow-sm" title="Phóng to" @click="thuPhongBanDo(1.1)"><i class="bx bx-plus"></i></button>
                            <button class="btn btn-sm btn-white shadow-sm" title="Thu nhỏ" @click="thuPhongBanDo(0.9)"><i class="bx bx-minus"></i></button>
                            <button class="btn btn-sm btn-white shadow-sm" title="Toàn màn hình" @click="toanManHinh"><i class="bx bx-fullscreen"></i></button>
                            <button class="btn btn-sm btn-white shadow-sm" title="Lớp bản đồ"><i class="bx bx-layer"></i></button>
                        </div>

                        <!-- Map Bottom Legends Ribbon -->
                        <div class="map-bottom-legend position-absolute bottom-0 start-0 w-100 p-2 px-3 d-flex flex-wrap align-items-center justify-content-between font-11">
                            <div class="d-flex align-items-center gap-3">
                                <span class="d-flex align-items-center gap-1 text-dark fw-semibold">
                                    <span class="legend-line bg-pink"></span> Tuyến OSRM Tối Ưu
                                </span>
                                <span class="d-flex align-items-center gap-1 text-dark fw-semibold">
                                    <span class="legend-dot bg-pink"></span> Điểm POI Tham Quan
                                </span>
                                <span class="d-flex align-items-center gap-1 text-dark fw-semibold">
                                    <span class="legend-dot bg-purple"></span> Điểm Đón Bổ Sung
                                </span>
                            </div>
                            <div class="text-muted font-10">
                                © openstreetmap contributors | OSRM v5.27
                            </div>
                        </div>
                    </div>

                    <!-- Map Footer Actions & Leg Details -->
                    <div class="p-3 bg-white border-top d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div class="d-flex align-items-center gap-2 font-12">
                            <span class="fw-bold text-dark">Chặng hành trình:</span>
                            <span class="badge bg-light text-dark border px-2 py-1">Sân Bay ➔ Sơn Trà: <strong>14.2 km</strong></span>
                            <span class="badge bg-light text-dark border px-2 py-1">Sơn Trà ➔ Ngũ Hành Sơn: <strong>11.8 km</strong></span>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-outline-pink rounded-pill px-3 font-12 fw-semibold" @click="moModalMoPhong3D">
                                <i class="bx bx-play-circle me-1"></i> Mô Phỏng 3D Hành Trình Tuyến
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Operational Guidance Card -->
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white d-flex flex-row align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="tip-icon-circle bg-cyan-light text-cyan rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="bx bx-bulb font-20"></i>
                        </div>
                        <div class="font-12 text-secondary">
                            <strong class="text-dark">Mẹo Vận Hành:</strong> Kéo thả các thẻ điểm dừng ở cột trái để đổi thứ tự tham quan. Thuật toán OSRM sẽ tự động vẽ lại polyline và cập nhật ma trận thời gian thực.
                        </div>
                    </div>
                    <a href="https://project-osrm.org/" target="_blank" class="btn btn-sm btn-link text-primary text-nowrap font-12 fw-semibold text-decoration-none">
                        Xem tài liệu OSRM
                    </a>
                </div>
            </div>
        </div>

        <!-- ================= MODALS ================= -->

        <!-- MODAL 1: Tối Ưu Hóa AI (Dijkstra TSP Simulation) -->
        <div v-if="showModalToiUuAI" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-md animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-purple text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-sparkles font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">SmartTrip AI Route Optimizer</h5>
                                <small class="text-muted">Giải thuật Dijkstra & TSP tối ưu hành trình</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalToiUuAI = false">&times;</button>
                    </div>

                    <div class="modal-body p-4 font-12">
                        <div class="alert alert-success d-flex align-items-center gap-2 font-12 py-2 mb-3">
                            <i class="bx bx-check-circle font-20"></i>
                            <div>Đã tìm thấy phương án tối ưu giảm thiểu <strong>15.8 km di chuyển</strong> và rút ngắn <strong>35 phút</strong> trên đường!</div>
                        </div>

                        <div class="row g-2 text-center mb-3">
                            <div class="col-6">
                                <div class="p-2 rounded-3 bg-light border">
                                    <div class="font-10 text-muted">LỘ TRÌNH HIỆN TẠI</div>
                                    <div class="fw-bold font-14 text-danger">84.2 km • 2h 20m</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 rounded-3 bg-light border border-success">
                                    <div class="font-10 text-muted">LỘ TRÌNH ĐỀ XUẤT AI</div>
                                    <div class="fw-bold font-14 text-success">68.4 km • 1h 45m</div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-purple-light rounded-3 font-11 text-secondary">
                            <i class="bx bx-check-shield text-purple me-1"></i>
                            Lộ trình mới gom cụm điểm ven biển Sơn Trà ➔ Ngũ Hành Sơn trước, sau đó qua Phố Cổ Hội An và kết thúc tại Bà Nà Hills tránh kẹt xe giờ cao điểm Cầu Rồng.
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary px-3" @click="showModalToiUuAI = false">Giữ Nguyên</button>
                        <button class="btn btn-sm btn-purple text-white px-4 fw-semibold" @click="xacNhanToiUuAI">
                            <i class="bx bx-check me-1"></i> Áp Dụng Lộ Trình Tối Ưu
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 2: Thêm Điểm POI Từ Cơ Sở Dữ Liệu -->
        <div v-if="showModalThemPOI" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-lg animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-pink text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-map-pin font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Thêm Điểm Dừng Tham Quan (POI)</h5>
                                <small class="text-muted">Cơ sở dữ liệu danh thắng TP Đà Nẵng & Quảng Nam</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModalThemPOI = false">&times;</button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text bg-light"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" v-model="tuKhoaPOI" placeholder="Tìm kiếm điểm đến (Bảo tàng Chăm, Suối Mơ, Cù Lao Chàm...)" />
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle font-12 mb-0">
                                <thead class="table-light">
                                    <tr class="text-muted font-11">
                                        <th>TÊN ĐỊA DANH</th>
                                        <th>KHU VỰC</th>
                                        <th>TỌA ĐỘ WGS84</th>
                                        <th class="text-end">THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="poi in danhSachPOIGoiY" :key="poi.id">
                                        <td>
                                            <div class="fw-bold text-dark">{{ poi.ten }}</div>
                                            <small class="text-muted">{{ poi.dia_chi }}</small>
                                        </td>
                                        <td><span class="badge bg-light text-dark border">{{ poi.khu_vuc }}</span></td>
                                        <td class="font-monospace text-muted">{{ poi.lat }}, {{ poi.lng }}</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-3 font-11" @click="chonThemPOI(poi)">
                                                + Thêm Vào Tuyến
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end">
                        <button class="btn btn-sm btn-secondary px-4" @click="showModalThemPOI = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 3: Mô Phỏng 3D Hành Trình -->
        <div v-if="showModal3D" class="modal-backdrop-custom">
            <div class="modal-dialog-custom modal-lg animate__animated animate__fadeInDown">
                <div class="modal-content-card bg-white rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-custom p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="modal-header-icon bg-pink text-white rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-play-circle font-22"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">Mô Phỏng 3D Tuyến Di Chuyển Lữ Hành</h5>
                                <small class="text-muted">Mô phỏng GPS xe lăn bánh trên địa hình 3D Đà Nẵng</small>
                            </div>
                        </div>
                        <button class="btn-close-modal" @click="showModal3D = false">&times;</button>
                    </div>

                    <div class="modal-body p-4 text-center">
                        <div class="p-5 bg-light rounded-4 border mb-3">
                            <i class="bx bx-bus text-pink font-60 animate__animated animate__pulse animate__infinite"></i>
                            <h6 class="fw-bold text-dark mt-3">Đang mô phỏng lộ trình xe 29 chỗ</h6>
                            <p class="font-12 text-muted mb-0">Chặng 1: Ga T1 Sân Bay Đà Nẵng ➔ Bán đảo Sơn Trà (14.2 km • 25 phút)</p>
                            <div class="progress mt-3" style="height: 6px;">
                                <div class="progress-bar bg-pink" style="width: 45%;"></div>
                            </div>
                        </div>
                        <div class="font-11 text-muted">Hệ thống OSRM engine kiểm tra vận tốc xe theo từng cung đường đô thị và đường đèo.</div>
                    </div>

                    <div class="modal-footer p-3 bg-light border-top d-flex justify-content-end">
                        <button class="btn btn-sm btn-secondary px-4" @click="showModal3D = false">Dừng Mô Phỏng</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'TuyenDiemTapTrungComponent',
    data() {
        return {
            tourDangChon: 'DN-02',
            cheDoXem: 'map',
            kieuBanDo: 'osm',

            // Modals
            showModalToiUuAI: false,
            showModalThemPOI: false,
            showModal3D: false,
            tuKhoaPOI: '',
            diemDangChon: null,

            // Primary Hub
            diemTapTrungChinh: {
                ten: 'Cổng Ga Quốc Tế T1 – Sân Bay Đà Nẵng',
                dia_chi: 'Đường Nguyễn Văn Linh, P. Hòa Thuận Tây, Q. Hải Châu',
                lat: '16.064485',
                lng: '108.202241'
            },

            // Additional Pickups
            diemDonPhu: [
                { id: 1, code: 'P1', ten: 'Khách Sạn Mường Thanh Luxury D...', dia_chi: '270 Võ Nguyên Giáp, P. Mỹ An, Q. Ngũ Hành...', thoi_gian_them: '+15 phút' },
                { id: 2, code: 'P2', ten: 'Khách Sạn Novotel Danang Premie...', dia_chi: '36 Bạch Đằng, P. Thạch Thang, Q. Hải Châu', thoi_gian_them: '+25 phút' }
            ],

            // 4 Waypoints from reference image
            danhSachDiemDung: [
                {
                    id: 101,
                    ten: 'Bán Đảo Sơn Trà & Chùa Linh Ứng Bãi Bụt',
                    thoi_gian_dung: 'Dừng 90 phút',
                    cu_ly_tu_diem_truoc: '14.2 km từ Sân Bay',
                    dia_chi_phuong: 'P. THỌ QUANG, SƠN TRÀ',
                    lat: '16.100123',
                    lng: '108.275432'
                },
                {
                    id: 102,
                    ten: 'Danh Thắng Ngũ Hành Sơn & Làng Đá...',
                    thoi_gian_dung: 'Dừng 120 phút',
                    cu_ly_tu_diem_truoc: '11.8 km từ Điểm 1',
                    dia_chi_phuong: 'P. HÒA HẢI, NGŨ HÀNH SƠN',
                    lat: '16.002345',
                    lng: '108.261234'
                },
                {
                    id: 103,
                    ten: 'Phố Cổ Hội An & Chùa Cầu',
                    thoi_gian_dung: 'Dừng 180 phút (Ăn tối)',
                    cu_ly_tu_diem_truoc: '18.6 km từ Điểm 2',
                    dia_chi_phuong: 'P. MINH AN, HỘI AN',
                    lat: '15.879123',
                    lng: '108.332456'
                },
                {
                    id: 104,
                    ten: 'Quần Thể Du Lịch Sun World Bà Nà Hills',
                    thoi_gian_dung: 'Dừng 300 phút (Trọn vẹn)',
                    cu_ly_tu_diem_truoc: '23.8 km từ Điểm 3',
                    dia_chi_phuong: 'X. HÒA NINH, HÒA VANG',
                    lat: '15.998765',
                    lng: '107.994321'
                }
            ],

            // Suggested POIs for modal
            danhSachPOIGoiY: [
                { id: 201, ten: 'Bảo Tàng Điêu Khắc Chăm Đà Nẵng', dia_chi: 'Số 02 đường 2 Tháng 9, Hải Châu', khu_vuc: 'Hải Châu', lat: '16.0601', lng: '108.2234' },
                { id: 202, ten: 'Khu Du Lịch Suối Khoáng Nóng Núi Thần Tài', dia_chi: 'Thôn Phú Túc, Hòa Phú, Hòa Vang', khu_vuc: 'Hòa Vang', lat: '15.9754', lng: '108.0211' },
                { id: 203, ten: 'Bãi Biển Mỹ Khê', dia_chi: 'Đường Võ Nguyên Giáp, Phước Mỹ', khu_vuc: 'Sơn Trà', lat: '16.0632', lng: '108.2456' }
            ],

            tongCuLy: '68.4',
            tongThoiGianChay: '1h 45m'
        };
    },
    methods: {
        toiUuHoaAI() {
            this.showModalToiUuAI = true;
        },

        xacNhanToiUuAI() {
            alert('Thuật toán Dijkstra TSP của SmartTrip AI đã tái cơ cấu thứ tự các điểm dừng tối ưu!');
            this.showModalToiUuAI = false;
        },

        luuCauHinhTuyen() {
            alert('Đã lưu cấu hình tuyến điểm vào cơ sở dữ liệu `tuyen_diem_tour` và đồng bộ ma trận khoảng cách OSRM!');
        },

        moModalDoiToaDo() {
            const newLat = prompt('Nhập vĩ độ (Lat) mới cho điểm khởi hành:', this.diemTapTrungChinh.lat);
            if (newLat) this.diemTapTrungChinh.lat = newLat;
        },

        moModalThemDiemDon() {
            const ten = prompt('Nhập tên khách sạn / điểm đón phụ:');
            if (ten) {
                this.diemDonPhu.push({
                    id: Date.now(),
                    code: `P${this.diemDonPhu.length + 1}`,
                    ten: ten,
                    dia_chi: 'Đà Nẵng',
                    thoi_gian_them: '+20 phút'
                });
                alert(`Đã thêm điểm đón phụ ${ten}!`);
            }
        },

        diChuyenDiem(index, direction) {
            const newIndex = index + direction;
            if (newIndex >= 0 && newIndex < this.danhSachDiemDung.length) {
                const temp = this.danhSachDiemDung[index];
                this.danhSachDiemDung[index] = this.danhSachDiemDung[newIndex];
                this.danhSachDiemDung[newIndex] = temp;
                this.$forceUpdate();
            }
        },

        chonDiemTrenBanDo(diem) {
            this.diemDangChon = diem;
        },

        suaDiem(diem) {
            const tenMoi = prompt('Đổi tên điểm dừng:', diem.ten);
            if (tenMoi) diem.ten = tenMoi;
        },

        xoaDiem(diem) {
            if (confirm(`Xác nhận xóa điểm "${diem.ten}" khỏi tuyến tour?`)) {
                this.danhSachDiemDung = this.danhSachDiemDung.filter(x => x.id !== diem.id);
            }
        },

        moModalThemPOI() {
            this.showModalThemPOI = true;
        },

        chonThemPOI(poi) {
            this.danhSachDiemDung.push({
                id: Date.now(),
                ten: poi.ten,
                thoi_gian_dung: 'Dừng 60 phút',
                cu_ly_tu_diem_truoc: '8.5 km từ điểm trước',
                dia_chi_phuong: poi.khu_vuc.toUpperCase(),
                lat: poi.lat,
                lng: poi.lng
            });
            alert(`Đã thêm ${poi.ten} vào lộ trình tuyến! OSRM đang tính toán lại đường đi.`);
            this.showModalThemPOI = false;
        },

        moModalMoPhong3D() {
            this.showModal3D = true;
        },

        thuPhongBanDo(scale) {
            alert(`Thu phóng bản đồ (tỷ lệ x${scale})`);
        },

        toanManHinh() {
            alert('Chuyển sang chế độ xem bản đồ toàn màn hình');
        }
    }
};
</script>

<style scoped>
.partner-tuyen-diem-page {
    color: #1e293b;
    font-family: inherit;
}

/* Badge tag pills */
.badge-tag-pill {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.75rem;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.03em;
    border-radius: 9999px;
}

.tag-pink {
    background-color: #ffe4e6;
    color: #e11d48;
}

.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
}

/* Tour Selector */
.tour-selector-box {
    max-width: 500px;
}

/* Hub Icon */
.hub-icon,
.metrics-icon {
    width: 36px;
    height: 36px;
    flex-shrink: 0;
}

.hub-sub-icon {
    width: 26px;
    height: 26px;
    flex-shrink: 0;
}

.pickup-badge {
    width: 24px;
    height: 24px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.65rem;
    flex-shrink: 0;
}

/* Waypoints */
.drag-handle {
    font-size: 1.1rem;
}

.cursor-grab {
    cursor: grab;
}

.waypoint-num-circle {
    width: 24px;
    height: 24px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    flex-shrink: 0;
}

.waypoint-item-card {
    transition: all 0.15s;
    cursor: pointer;
}

.waypoint-item-card:hover {
    background-color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.border-pink {
    border-color: #e11d48 !important;
}

.btn-icon-subtle {
    width: 26px;
    height: 26px;
    border-radius: 6px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #64748b;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    transition: all 0.15s;
}

.btn-icon-subtle:hover:not(:disabled) {
    background: #f8fafc;
    color: #0f172a;
}

.btn-icon-subtle:disabled {
    opacity: 0.4;
    cursor: not-allowed;
}

.btn-outline-pink-dashed {
    border: 1.5px dashed #f43f5e;
    color: #e11d48;
    background-color: #fff1f2;
    transition: all 0.15s;
}

.btn-outline-pink-dashed:hover {
    background-color: #ffe4e6;
    color: #be123c;
}

/* Map Panel */
.map-panel-card {
    border: 1px solid #e2e8f0 !important;
}

.map-mode-pill {
    border: 1px solid #e2e8f0;
    background-color: #ffffff;
    color: #475569;
    font-size: 0.74rem;
    font-weight: 600;
    border-radius: 999px;
    padding: 0.25rem 0.75rem;
    transition: all 0.15s;
}

.map-mode-pill.active-mode {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border-color: #e11d48;
    color: #ffffff;
}

.traffic-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

.btn-white {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    color: #334155;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-white:hover {
    background-color: #f8fafc;
}

.map-bottom-legend {
    background-color: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(4px);
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

.legend-line {
    width: 18px;
    height: 4px;
    border-radius: 2px;
    display: inline-block;
}

.legend-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

.tip-icon-circle {
    width: 38px;
    height: 38px;
}

/* Utilities */
.btn-pink-gradient {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
}

.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #be123c 0%, #db2777 100%);
    color: #ffffff;
}

.btn-purple-gradient {
    background: linear-gradient(135deg, #7c3aed 0%, #9333ea 100%);
    border: none;
}

.btn-purple-gradient:hover {
    background: linear-gradient(135deg, #6d28d9 0%, #7e22ce 100%);
    color: #ffffff;
}

.btn-outline-pink {
    border: 1px solid #f43f5e;
    color: #e11d48;
    background-color: #ffffff;
}

.btn-outline-pink:hover {
    background-color: #fff1f2;
    color: #be123c;
}

.btn-purple {
    background-color: #7c3aed;
    border: none;
}

.btn-purple:hover {
    background-color: #6d28d9;
    color: #ffffff;
}

.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }

.text-purple { color: #9333ea !important; }
.bg-purple { background-color: #9333ea !important; }
.bg-purple-light { background-color: #f3e8ff !important; }

.text-cyan { color: #0284c7 !important; }
.bg-cyan { background-color: #0284c7 !important; }
.bg-cyan-light { background-color: #e0f2fe !important; }

/* Modals */
.modal-backdrop-custom {
    position: fixed;
    inset: 0;
    background-color: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(4px);
    z-index: 1050;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    overflow-y: auto;
}

.modal-dialog-custom {
    width: 100%;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
}

.modal-dialog-custom.modal-md { max-width: 520px; }
.modal-dialog-custom.modal-lg { max-width: 760px; }

.modal-header-icon {
    width: 40px;
    height: 40px;
}

.btn-close-modal {
    background: none;
    border: none;
    font-size: 1.5rem;
    line-height: 1;
    color: #94a3b8;
    cursor: pointer;
    transition: color 0.15s;
}

.btn-close-modal:hover {
    color: #0f172a;
}

/* Font scale helpers */
.font-9 { font-size: 0.6rem !important; }
.font-10 { font-size: 0.65rem !important; }
.font-11 { font-size: 0.72rem !important; }
.font-12 { font-size: 0.78rem !important; }
.font-13 { font-size: 0.83rem !important; }
.font-14 { font-size: 0.88rem !important; }
.font-16 { font-size: 1rem !important; }
.font-18 { font-size: 1.15rem !important; }
.font-20 { font-size: 1.25rem !important; }
.font-22 { font-size: 1.38rem !important; }
.font-60 { font-size: 3.75rem !important; }

.py-1-5 {
    padding-top: 0.35rem !important;
    padding-bottom: 0.35rem !important;
}
.py-0-5 {
    padding-top: 0.15rem !important;
    padding-bottom: 0.15rem !important;
}
</style>
