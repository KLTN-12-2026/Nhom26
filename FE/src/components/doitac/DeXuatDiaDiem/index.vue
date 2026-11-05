<template>
    <div class="partner-propose-poi-container">
        <!-- 1. Header Banner: Title & AI Badges -->
        <div class="propose-header mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                        <span class="badge-tag-pill tag-pink">
                            <i class="bx bx-broadcast me-1"></i> Kết nối cơ sở dữ liệu POI & OpenStreetMap (OSM)
                        </span>
                        <span class="badge-tag-pill tag-cyan">
                            <i class="bx bx-sparkles me-1"></i> SmartTrip AI Engine v3.4
                        </span>
                    </div>
                    <h2 class="page-title mb-1">Đề Xuất Địa Điểm Du Lịch & Dịch Vụ Mới Tại Đà Nẵng</h2>
                    <p class="page-desc text-muted mb-0">
                        Hợp tác cùng Ban Quản Trị SmartTrip AI mở rộng bản đồ du lịch thông minh. Các điểm đến sau kiểm duyệt sẽ được đồng bộ trực tiếp lên tập dữ liệu để xuất lịch trình tự động bằng trí tuệ nhân tạo.
                    </p>
                </div>
                <div>
                    <button class="btn btn-list-history" type="button" @click="moDanhSachLuuTru">
                        <i class="bx bx-list-ul me-1"></i> Danh sách địa điểm đã gửi (8)
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. Main 2-Column Content -->
        <div class="row g-4">
            <!-- Left Column: 5 Form Proposal Sections (col-lg-8) -->
            <div class="col-lg-8">
                <!-- Section 1: Thông Tin Cơ Bản Địa Điểm -->
                <div class="form-section-card shadow-sm mb-4">
                    <div class="section-title-wrap mb-3">
                        <div class="section-num-circle num-pink">1</div>
                        <div>
                            <h5 class="section-title mb-0">Thông Tin Cơ Bản Địa Điểm</h5>
                            <span class="section-subtitle text-muted">Tên hiển thị, phân loại trải nghiệm và phân cấp địa bàn</span>
                        </div>
                    </div>

                    <div class="form-body">
                        <!-- Tên địa điểm -->
                        <div class="mb-3">
                            <label class="form-label-custom">TÊN ĐỊA ĐIỂM / TÊN THƯƠNG HIỆU <span class="text-danger">*</span></label>
                            <div class="input-icon-wrap">
                                <i class="bx bx-map-pin input-icon text-pink"></i>
                                <input 
                                    type="text" 
                                    class="form-control form-control-custom" 
                                    v-model="form.ten_dia_diem" 
                                    placeholder="Nhập tên địa điểm du lịch, trạm đón hoặc điểm trải nghiệm..."
                                />
                            </div>
                        </div>

                        <!-- 3 Dropdowns: Danh mục POI, Quận/Huyện, Phường/Xã -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label-custom">DANH MỤC POI <span class="text-danger">*</span></label>
                                <select class="form-select form-control-custom" v-model="form.danh_muc">
                                    <option value="checkin">Check-in sinh thái</option>
                                    <option value="nghiduong">Nghỉ dưỡng & Cắm trại</option>
                                    <option value="bien">Bãi biển & Thể thao nước</option>
                                    <option value="amthuc">Ẩm thực & Chợ đêm</option>
                                    <option value="vanhoa">Văn hóa & Di tích</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label-custom">QUẬN / HUYỆN <span class="text-danger">*</span></label>
                                <select class="form-select form-control-custom" v-model="form.quan_huyen" @change="handleQuanChange">
                                    <option value="lien_chieu">Quận Liên Chiểu</option>
                                    <option value="hai_chau">Quận Hải Châu</option>
                                    <option value="son_tra">Quận Sơn Trà</option>
                                    <option value="ngu_hanh_son">Quận Ngũ Hành Sơn</option>
                                    <option value="thanh_khe">Quận Thanh Khê</option>
                                    <option value="hoa_vang">Huyện Hòa Vang</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label-custom">PHƯỜNG / XÃ <span class="text-danger">*</span></label>
                                <select class="form-select form-control-custom" v-model="form.phuong_xa">
                                    <option value="hoa_hiep_bac">P. Hòa Hiệp Bắc</option>
                                    <option value="hoa_hiep_nam">P. Hòa Hiệp Nam</option>
                                    <option value="hoa_khanh_bac">P. Hòa Khánh Bắc</option>
                                    <option value="hoa_khanh_nam">P. Hòa Khánh Nam</option>
                                    <option value="hoa_minh">P. Hòa Minh</option>
                                </select>
                            </div>
                        </div>

                        <!-- Địa chỉ chi tiết -->
                        <div>
                            <label class="form-label-custom">ĐỊA CHỈ CHI TIẾT (SỐ NHÀ, ĐƯỜNG, THÔN/ẤP)</label>
                            <input 
                                type="text" 
                                class="form-control form-control-custom" 
                                v-model="form.dia_chi_chi_tiet" 
                                placeholder="Ví dụ: Tổ 1, Suối Lương, Đèo Hải Vân, Phường Hòa Hiệp Bắc, Liên Chiểu, Đà Nẵng"
                            />
                        </div>
                    </div>
                </div>

                <!-- Section 2: Tọa Độ GPS & OpenStreetMap (OSM) -->
                <div class="form-section-card shadow-sm mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="section-title-wrap">
                            <div class="section-num-circle num-blue">2</div>
                            <div>
                                <h5 class="section-title mb-0">Tọa Độ GPS & OpenStreetMap (OSM)</h5>
                                <span class="section-subtitle text-muted">Khớp chuẩn xác hệ quy chiếu WGS84 phục vụ tính toán đường đi</span>
                            </div>
                        </div>
                        <button class="btn btn-gps-locate" type="button" @click="layGpsHienTai">
                            <i class="bx bx-target-lock me-1"></i> Lấy GPS thiết bị
                        </button>
                    </div>

                    <div class="form-body">
                        <!-- Vĩ độ & Kinh độ Inputs -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">VĨ ĐỘ (LATITUDE) <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-custom font-monospace" 
                                    v-model="form.vi_do" 
                                    placeholder="16.142050"
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom">KINH ĐỘ (LONGITUDE) <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-custom font-monospace" 
                                    v-model="form.kinh_do" 
                                    placeholder="108.125020"
                                />
                            </div>
                        </div>

                        <!-- Visual Map Preview Card -->
                        <div class="osm-map-viewport position-relative rounded-3 overflow-hidden">
                            <!-- Vector SVG Map Rendering representing Danang Hai Van Pass & Suoi Luong Coast -->
                            <svg viewBox="0 0 720 220" class="w-100 h-100 map-svg" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="seaGrad" x1="0" y1="0" x2="1" y2="1">
                                        <stop offset="0%" stop-color="#bae6fd" />
                                        <stop offset="100%" stop-color="#7dd3fc" />
                                    </linearGradient>
                                    <linearGradient id="landGrad" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#f1f5f9" />
                                        <stop offset="100%" stop-color="#e2e8f0" />
                                    </linearGradient>
                                </defs>
                                <!-- Land / Coastline base -->
                                <rect width="720" height="220" fill="url(#landGrad)" />
                                <!-- Sea Bay (Vịnh Đà Nẵng) -->
                                <path d="M 0,0 L 720,0 L 720,110 C 620,140 500,90 380,130 C 260,170 120,80 0,100 Z" fill="url(#seaGrad)" opacity="0.85" />
                                
                                <!-- Roads & Routes (Hai Van Pass curvy roads) -->
                                <path d="M 0,110 Q 180,95 320,125 T 560,150 T 720,140" fill="none" stroke="#f59e0b" stroke-width="3" stroke-linecap="round" />
                                <path d="M 320,125 Q 380,180 500,165 T 720,195" fill="none" stroke="#ffffff" stroke-width="3" stroke-dasharray="6,4" />
                                <path d="M 120,220 Q 250,180 340,130" fill="none" stroke="#ffffff" stroke-width="4" />
                                
                                <!-- Topographic contours -->
                                <path d="M 100,50 Q 240,20 400,60" fill="none" stroke="#38bdf8" stroke-width="1.5" stroke-dasharray="3,3" opacity="0.6" />
                                <path d="M 300,30 Q 480,10 650,40" fill="none" stroke="#38bdf8" stroke-width="1.5" stroke-dasharray="3,3" opacity="0.6" />

                                <!-- POI Labels on map -->
                                <text x="180" y="80" font-size="11" font-weight="600" fill="#0369a1">Vịnh Đà Nẵng</text>
                                <text x="490" y="55" font-size="11" font-weight="600" fill="#0369a1">Biển Xuân Thiều</text>
                                <text x="240" y="155" font-size="10" font-weight="600" fill="#64748b">Suối Mơ Khởi Nam</text>
                                <text x="440" y="130" font-size="10" font-weight="700" fill="#831843">Đèo Hải Vân</text>

                                <!-- Target GPS Pin for Suoi Luong with animated radar ripple -->
                                <circle cx="370" cy="115" r="18" fill="#e11d48" opacity="0.25">
                                    <animate attributeName="r" values="12;24;12" dur="2.5s" repeatCount="indefinite" />
                                    <animate attributeName="opacity" values="0.4;0.05;0.4" dur="2.5s" repeatCount="indefinite" />
                                </circle>
                                <circle cx="370" cy="115" r="7" fill="#e11d48" stroke="#ffffff" stroke-width="2.5" />
                                <text x="382" y="119" font-size="11" font-weight="800" fill="#9f1239">Khu Du Lịch Suối Lương</text>
                            </svg>

                            <!-- Map Floating Bottom Ribbon -->
                            <div class="map-floating-bar d-flex justify-content-between align-items-center">
                                <div class="osm-node-pill">
                                    <i class="bx bx-radio-circle-marked text-pink me-1"></i>
                                    <span>OSM Node Preview: <strong>{{ form.vi_do }}, {{ form.kinh_do }}</strong> • Khu vực: Suối Lương & Đèo Hải Vân, Q. Liên Chiểu</span>
                                </div>
                                <button class="btn btn-pin-again" type="button" @click="ghimLaiDiem">
                                    <i class="bx bx-pin me-1"></i> Ghim lại điểm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Thông Tin Vận Hành & Trải Nghiệm -->
                <div class="form-section-card shadow-sm mb-4">
                    <div class="section-title-wrap mb-3">
                        <div class="section-num-circle num-purple">3</div>
                        <div>
                            <h5 class="section-title mb-0">Thông Tin Vận Hành & Trải Nghiệm</h5>
                            <span class="section-subtitle text-muted">Tham số định tuyến thời gian và chi phí cho du khách</span>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="row g-3">
                            <div class="col-6 col-md-3">
                                <label class="form-label-custom">GIỜ MỞ CỬA</label>
                                <input type="time" class="form-control form-control-custom text-center fw-bold" v-model="form.gio_mo_cua">
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label-custom">GIỜ ĐÓNG CỬA</label>
                                <input type="time" class="form-control form-control-custom text-center fw-bold" v-model="form.gio_dong_cua">
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label-custom">VÉ THAM KHẢO</label>
                                <input type="text" class="form-control form-control-custom text-center fw-bold text-pink" v-model="form.ve_tham_khao">
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label-custom">THỜI LƯỢNG GỢI Ý</label>
                                <input type="text" class="form-control form-control-custom text-center fw-bold" v-model="form.thoi_luong_goi_y">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Thẻ Gắn Sở Thích SmartTrip AI -->
                <div class="form-section-card shadow-sm mb-4">
                    <div class="section-title-wrap mb-3">
                        <div class="section-num-circle num-magenta">4</div>
                        <div>
                            <h5 class="section-title mb-0">Thẻ Gắn Sở Thích SmartTrip AI</h5>
                            <span class="section-subtitle text-muted">Chọn các thẻ để thuật toán học máy phân bổ vào lộ trình phù hợp</span>
                        </div>
                    </div>

                    <div class="form-body">
                        <!-- Tag Chips List -->
                        <div class="tags-chips-wrapper d-flex flex-wrap gap-2 mb-2">
                            <button 
                                v-for="tag in allTags" 
                                :key="tag.id"
                                type="button" 
                                class="btn-tag-chip"
                                :class="{ 'active': selectedTags.includes(tag.name) }"
                                @click="toggleTag(tag.name)"
                            >
                                <span class="tag-hash">#</span>{{ tag.name }}
                                <i v-if="selectedTags.includes(tag.name)" class="bx bx-check ms-1 font-13"></i>
                            </button>
                        </div>
                        <small class="text-muted font-11 fst-italic">
                            Hệ thống khuyến nghị chọn từ 3-6 thẻ để tối ưu độ tương thích với ý toán của khách du lịch.
                        </small>
                    </div>
                </div>

                <!-- Section 5: Thư Viện Ảnh Xác Thực (Tối đa 5 ảnh) -->
                <div class="form-section-card shadow-sm mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="section-title-wrap">
                            <div class="section-num-circle num-cyan">5</div>
                            <div>
                                <h5 class="section-title mb-0">Thư Viện Ảnh Xác Thực (Tối đa 5 ảnh)</h5>
                                <span class="section-subtitle text-muted">Ảnh chụp cổng vào, bãi đỗ xe du lịch, không gian cảnh quan chính</span>
                            </div>
                        </div>
                        <span class="badge bg-cyan-subtle text-cyan font-11 fw-bold">
                            {{ uploadedImages.length }} / 5 Đã tải lên
                        </span>
                    </div>

                    <div class="form-body">
                        <div class="row row-cols-2 row-cols-sm-4 g-3">
                            <!-- Image 1 -->
                            <div class="col" v-for="(img, idx) in uploadedImages" :key="idx">
                                <div class="uploaded-img-card position-relative rounded-3 overflow-hidden">
                                    <img :src="img.url" :alt="img.caption" class="w-100 h-100 img-cover" />
                                    <div class="img-caption-tag">{{ img.caption }}</div>
                                    <button class="btn-remove-img" type="button" @click="xoaAnh(idx)" title="Xóa ảnh">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Upload Slot -->
                            <div class="col" v-if="uploadedImages.length < 5">
                                <div class="upload-dropzone rounded-3 d-flex flex-column align-items-center justify-content-center text-center p-2" @click="triggerUpload">
                                    <div class="upload-icon-circle mb-2">
                                        <i class="bx bx-camera text-pink fs-4"></i>
                                    </div>
                                    <span class="font-12 fw-bold text-dark">Thêm ảnh mới</span>
                                    <span class="font-10 text-muted">JPG, PNG &lt; 5MB</span>
                                    <input type="file" ref="fileInput" class="d-none" accept="image/*" @change="handleFileSelected">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cam Kết & Action Buttons -->
                <div class="proposal-actions-card shadow-sm p-4 rounded-4 bg-white mb-4">
                    <div class="form-check d-flex align-items-start gap-2 mb-4">
                        <input class="form-check-input mt-1 custom-checkbox" type="checkbox" id="commitCheck" v-model="form.cam_ket">
                        <label class="form-check-label font-12 text-secondary" for="commitCheck">
                            <strong class="text-dark">Cam kết của Doanh nghiệp Lữ hành:</strong> Chúng tôi đảm bảo thông tin, giá vé, hình ảnh và vị trí trên bản đồ là hoàn toàn chính xác thực tế, tuân thủ nghiêm ngặt định hướng quy hoạch phát triển du lịch của Sở Du lịch TP. Đà Nẵng và Ban Quản Trị SmartTrip AI.
                        </label>
                    </div>

                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-submit-proposal" type="button" :disabled="!form.cam_ket" @click="guiKiemDuyet">
                                <i class="bx bx-paper-plane me-1"></i> Gửi Ban Quản Trị Kiểm Duyệt
                            </button>
                            <button class="btn btn-save-draft" type="button" @click="luuNhap">
                                Lưu Nháp Đề Xuất
                            </button>
                        </div>
                        <div class="text-muted font-11">
                            <i class="bx bx-time-five me-1"></i> Thời gian kiểm duyệt cam kết: <strong>&le; 24h</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar Widgets (col-lg-4) -->
            <div class="col-lg-4">
                <!-- Widget 1: Độ Tương Thích Thuật Toán -->
                <div class="side-widget-card shadow-sm mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="widget-icon-box bg-purple-light text-purple">
                                <i class="bx bx-git-repo-forked"></i>
                            </div>
                            <span class="widget-header-title">ĐỘ TƯƠNG THÍCH THUẬT TOÁN</span>
                        </div>
                        <span class="badge bg-purple text-white font-11 fw-bold rounded-pill px-3 py-1">
                            94.8% AI Match
                        </span>
                    </div>

                    <p class="widget-desc font-12 text-secondary mb-3">
                        Hệ thống SmartTrip AI nhận định khu vực <strong>Liên Chiểu – Suối Lương</strong> đang thiếu 28% điểm dừng chân sinh thái kết hợp cắm trại an toàn trong tour 1 ngày. Đề xuất này có xác suất duyệt cao.
                    </p>

                    <!-- OSM Normalization Progress -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between font-11 fw-semibold mb-1">
                            <span class="text-muted">Chuẩn hóa dữ liệu OSM Node</span>
                            <span class="text-cyan fw-bold">Hoàn tất (100%)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-cyan" style="width: 100%;"></div>
                        </div>
                    </div>

                    <!-- 2 KPI Numbers -->
                    <div class="row g-2 pt-2 border-top">
                        <div class="col-6 text-center border-end">
                            <div class="kpi-num text-pink">120+</div>
                            <div class="kpi-sub font-11 text-muted">Khách/ngày dự kiến</div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="kpi-num text-purple">4.8 &starf;</div>
                            <div class="kpi-sub font-11 text-muted">Chỉ số tiềm năng</div>
                        </div>
                    </div>
                </div>

                <!-- Widget 2: Lịch Sử & Tiến Trình Duyệt -->
                <div class="side-widget-card shadow-sm mb-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="widget-main-title mb-0">Lịch Sử & Tiến Trình Duyệt</h5>
                            <span class="font-11 text-muted">Hồ sơ đối tác Danang Explorer Corp</span>
                        </div>
                        <span class="badge bg-pink-light text-pink font-10 fw-bold rounded-pill px-2 py-1">
                            4 Đang hoạt động
                        </span>
                    </div>

                    <!-- History Timeline Items -->
                    <div class="history-items-list d-flex flex-column gap-3 mb-3">
                        <!-- Item 1: Pending -->
                        <div class="history-item-box p-3 rounded-3">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h6 class="item-name font-12 fw-bold text-dark mb-0">Khu Trải Nghiệm Sinh Thái &...</h6>
                                <span class="badge bg-purple-light text-purple font-10">Đang chờ duyệt</span>
                            </div>
                            <div class="font-11 text-muted mb-2">Gửi lúc: Hôm nay, 10:25 • Q. Liên Chiểu</div>
                            <div class="d-flex justify-content-between font-11 text-muted border-top pt-2">
                                <span>Mã POI: <strong>#PROP-DN-2026-089</strong></span>
                                <a href="javascript:;" class="text-pink fw-bold text-decoration-none">Chi tiết</a>
                            </div>
                        </div>

                        <!-- Item 2: Approved OSM -->
                        <div class="history-item-box p-3 rounded-3">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h6 class="item-name font-12 fw-bold text-dark mb-0">Vườn Nghệ Thuật Điêu Khắ...</h6>
                                <span class="badge bg-cyan-light text-cyan font-10">
                                    <i class="bx bx-check-circle me-1"></i>Đã duyệt (OSM)
                                </span>
                            </div>
                            <div class="font-11 text-muted mb-2">Gửi lúc: 14/05/2024 • Q. Ngũ Hành Sơn</div>
                            <div class="d-flex justify-content-between font-11 text-muted border-top pt-2">
                                <span>Node ID: <strong class="text-primary">849204828</strong></span>
                                <span class="text-secondary">Đã nạp 14 tour tự động</span>
                            </div>
                        </div>

                        <!-- Item 3: Need Photos -->
                        <div class="history-item-box p-3 rounded-3 border-warning-subtle">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h6 class="item-name font-12 fw-bold text-dark mb-0">Trạm Chèo SUP Hoàng...</h6>
                                <span class="badge bg-warning-subtle text-warning font-10">
                                    <i class="bx bx-photo-album me-1"></i>Yêu cầu bổ sung ảnh
                                </span>
                            </div>
                            <div class="font-11 text-muted mb-2">Gửi lúc: 10/05/2024 • Bán Đảo Sơn Trà</div>
                            <div class="alert-box-mini p-2 rounded-2 bg-light font-11 text-secondary mb-2">
                                <strong>Yêu cầu từ BQT:</strong> Cần bổ sung tối thiểu 02 ảnh giấy phép chứng chỉ phao cứu sinh đường thủy.
                            </div>
                            <div class="text-end">
                                <a href="javascript:;" class="text-pink fw-bold font-11 text-decoration-none" @click="moModalBoSungAnh">
                                    Tải bổ sung ngay &rarr;
                                </a>
                            </div>
                        </div>

                        <!-- Item 4: Rejected -->
                        <div class="history-item-box p-3 rounded-3 border-danger-subtle">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h6 class="item-name font-12 fw-bold text-dark mb-0">Bến Thuyền Tự Phát Kênh Thọ...</h6>
                                <span class="badge bg-danger-subtle text-danger font-10">Bị từ chối</span>
                            </div>
                            <div class="font-11 text-muted mb-2">Gửi lúc: 02/05/2024 • Q. Sơn Trà</div>
                            <div class="alert-box-mini p-2 rounded-2 bg-danger-light font-11 text-danger">
                                <strong>Lý do từ chối:</strong> Địa điểm nằm trong vùng phân luồng an toàn hàng hải quân sự, cấm dừng đỗ thuyền đón khách du lịch theo quy định TP Đà Nẵng.
                            </div>
                        </div>
                    </div>

                    <div class="text-center pt-2">
                        <a href="javascript:;" class="font-12 fw-bold text-pink text-decoration-none" @click="moDanhSachLuuTru">
                            Xem toàn bộ 8 địa điểm lưu trữ &rarr;
                        </a>
                    </div>
                </div>

                <!-- Widget 3: Hỗ Trợ Định Vị OSM -->
                <div class="side-widget-card help-osm-card shadow-sm p-3 rounded-4 d-flex align-items-center gap-3">
                    <div class="help-icon-circle bg-pink-light text-pink">
                        <i class="bx bx-help-circle fs-4"></i>
                    </div>
                    <div class="font-12 text-secondary">
                        <strong class="text-dark">Cần hỗ trợ định vị Node OSM?</strong><br>
                        Chuyên viên GIS của SmartTrip AI sẵn sàng hướng dẫn chuẩn hóa GeoJSON miễn phí.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DeXuatDiaDiem',
    data() {
        return {
            form: {
                ten_dia_diem: 'Khu Trải Nghiệm Sinh Thái & Cắm Trại Suối Lương Mới',
                danh_muc: 'checkin',
                quan_huyen: 'lien_chieu',
                phuong_xa: 'hoa_hiep_bac',
                dia_chi_chi_tiet: 'Tổ 1, Suối Lương, Đèo Hải Vân, Phường Hòa Hiệp Bắc, Liên Chiểu, Đà Nẵng',
                vi_do: '16.142050',
                kinh_do: '108.125020',
                gio_mo_cua: '07:30',
                gio_dong_cua: '18:00',
                ve_tham_khao: '50.000 đ',
                thoi_luong_goi_y: '120 phút',
                cam_ket: true
            },
            allTags: [
                { id: 1, name: 'SinhThái' },
                { id: 2, name: 'CắmTrại' },
                { id: 3, name: 'SuốiMát' },
                { id: 4, name: 'GiaĐình' },
                { id: 5, name: 'ChụpẢnh' },
                { id: 6, name: 'Trekking' },
                { id: 7, name: 'ẨmThựcRừng' },
                { id: 8, name: 'NghỉDưỡngYênTĩnh' },
                { id: 9, name: 'HoàngHônĐẹp' },
                { id: 10, name: 'TeamBuilding' }
            ],
            selectedTags: ['SinhThái', 'CắmTrại', 'SuốiMát', 'GiaĐình', 'ChụpẢnh'],
            uploadedImages: [
                {
                    url: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80',
                    caption: 'Ảnh cổng vào'
                },
                {
                    url: 'https://images.unsplash.com/photo-1510312305653-8ed496efae75?auto=format&fit=crop&w=400&q=80',
                    caption: 'Bãi cắm trại'
                },
                {
                    url: 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=400&q=80',
                    caption: 'Bãi đỗ xe'
                }
            ]
        }
    },
    methods: {
        handleQuanChange() {
            // Tùy theo quận để cập nhật danh sách phường tương ứng
        },
        toggleTag(tagName) {
            const index = this.selectedTags.indexOf(tagName);
            if (index > -1) {
                this.selectedTags.splice(index, 1);
            } else {
                if (this.selectedTags.length >= 6) {
                    alert('Hệ thống khuyến nghị chọn tối đa 6 thẻ đặc trưng nhất để AI định tuyến chuẩn xác.');
                    return;
                }
                this.selectedTags.push(tagName);
            }
        },
        layGpsHienTai() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        this.form.vi_do = position.coords.latitude.toFixed(6);
                        this.form.kinh_do = position.coords.longitude.toFixed(6);
                        alert(`Đã cập nhật tọa độ GPS thiết bị: ${this.form.vi_do}, ${this.form.kinh_do}`);
                    },
                    () => {
                        // Giữ tọa độ mô phỏng Suối Lương
                        this.form.vi_do = '16.142050';
                        this.form.kinh_do = '108.125020';
                        alert('Đã định vị thành công tọa độ OSM Node: 16.142050, 108.125020 (Suối Lương, Đèo Hải Vân)');
                    }
                );
            } else {
                alert('Thiết bị không hỗ trợ Geolocation. Tọa độ được thiết lập chuẩn theo bản đồ OSM.');
            }
        },
        ghimLaiDiem() {
            const viDo = prompt('Nhập lại Vĩ độ (Latitude) WGS84:', this.form.vi_do);
            const kinhDo = prompt('Nhập lại Kinh độ (Longitude) WGS84:', this.form.kinh_do);
            if (viDo && kinhDo) {
                this.form.vi_do = viDo.trim();
                this.form.kinh_do = kinhDo.trim();
                alert(`Đã ghim lại điểm thành công trên Node OSM: ${this.form.vi_do}, ${this.form.kinh_do}`);
            }
        },
        triggerUpload() {
            if (this.$refs.fileInput) {
                this.$refs.fileInput.click();
            }
        },
        handleFileSelected(event) {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 5 * 1024 * 1024) {
                    alert('Kích thước ảnh tối đa là 5MB. Vui lòng chọn ảnh khác.');
                    return;
                }
                const caption = prompt('Nhập chú thích cho ảnh này (vd: Khu vực check-in, Cảnh quan chính...):', 'Cảnh quan chính');
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.uploadedImages.push({
                        url: e.target.result,
                        caption: caption || 'Ảnh xác thực'
                    });
                };
                reader.readAsDataURL(file);
            }
        },
        xoaAnh(index) {
            if (confirm('Bạn có chắc muốn xóa ảnh này khỏi danh sách tải lên?')) {
                this.uploadedImages.splice(index, 1);
            }
        },
        guiKiemDuyet() {
            if (!this.form.ten_dia_diem) {
                alert('Vui lòng nhập tên địa điểm!');
                return;
            }
            if (!this.form.cam_ket) {
                alert('Vui lòng tích vào ô cam kết thông tin trước khi gửi kiểm duyệt!');
                return;
            }
            alert('Hồ sơ đề xuất địa điểm đã được gửi thành công đến Ban Quản Trị SmartTrip AI!\nMã tiếp nhận: #PROP-DN-' + Math.floor(1000 + Math.random() * 9000) + '\nThời gian phản hồi dự kiến trong vòng 24 giờ.');
        },
        luuNhap() {
            alert('Đã lưu nháp hồ sơ đề xuất địa điểm. Bạn có thể quay lại cập nhật bất cứ lúc nào.');
        },
        moDanhSachLuuTru() {
            alert('Mở danh sách toàn bộ 8 địa điểm đã đề xuất trong hệ thống lưu trữ đối tác.');
        },
        moModalBoSungAnh() {
            alert('Vui lòng chọn ảnh giấy phép đường thủy để bổ sung cho hồ sơ "Trạm Chèo SUP Hoàng Hôn".');
            this.triggerUpload();
        }
    }
}
</script>

<style scoped>
.partner-propose-poi-container {
    padding-bottom: 30px;
    font-family: inherit;
}

/* Header & Badges */
.badge-tag-pill {
    display: inline-flex;
    align-items: center;
    padding: 3px 12px;
    border-radius: 999px;
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.4px;
}

.tag-pink {
    background-color: #ffe4e6;
    color: #e11d48;
}

.tag-cyan {
    background-color: #e0f2fe;
    color: #0284c7;
}

.page-title {
    font-size: 1.45rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.3px;
}

.page-desc {
    font-size: 0.8rem;
    max-width: 720px;
    line-height: 1.45;
}

.btn-list-history {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 8px 18px;
    transition: all 0.2s ease;
}

.btn-list-history:hover {
    background: #fce7f3;
    color: #be185d;
}

/* Form Section Cards */
.form-section-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 20px;
    border: 1px solid #f1f5f9;
}

.section-title-wrap {
    display: flex;
    align-items: center;
    gap: 12px;
}

.section-num-circle {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 0.8rem;
    flex-shrink: 0;
}

.num-pink { background-color: #ffe4e6; color: #e11d48; }
.num-blue { background-color: #e0f2fe; color: #0284c7; }
.num-purple { background-color: #f3e8ff; color: #9333ea; }
.num-magenta { background-color: #fce7f3; color: #db2777; }
.num-cyan { background-color: #e0f7fa; color: #00838f; }

.section-title {
    font-size: 0.95rem;
    font-weight: 800;
    color: #0f172a;
}

.section-subtitle {
    font-size: 0.72rem;
}

.form-label-custom {
    font-size: 0.68rem;
    font-weight: 800;
    color: #64748b;
    letter-spacing: 0.4px;
    margin-bottom: 5px;
    text-transform: uppercase;
}

.form-control-custom {
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 0.82rem;
    padding: 8px 12px;
    color: #1e293b;
    background-color: #ffffff;
    transition: all 0.2s ease;
}

.form-control-custom:focus {
    border-color: #e11d48;
    box-shadow: 0 0 0 3px rgba(225, 29, 72, 0.12);
    outline: none;
}

.input-icon-wrap {
    position: relative;
    display: flex;
    align-items: center;
}

.input-icon {
    position: absolute;
    left: 12px;
    font-size: 1.15rem;
    pointer-events: none;
}

.input-icon-wrap .form-control-custom {
    padding-left: 36px;
}

/* GPS Button */
.btn-gps-locate {
    background-color: #e0f2fe;
    color: #0284c7;
    border: 1px solid #bae6fd;
    font-size: 0.74rem;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    transition: all 0.15s;
}

.btn-gps-locate:hover {
    background-color: #bae6fd;
    color: #0369a1;
}

/* OSM Map Viewport */
.osm-map-viewport {
    height: 190px;
    border: 1px solid #cbd5e1;
    background: #e2e8f0;
}

.map-svg {
    display: block;
}

.map-floating-bar {
    position: absolute;
    bottom: 8px;
    left: 8px;
    right: 8px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(4px);
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 6px 12px;
}

.osm-node-pill {
    font-size: 0.68rem;
    color: #334155;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.btn-pin-again {
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #0f172a;
    font-size: 0.68rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 6px;
    white-space: nowrap;
    transition: all 0.15s;
}

.btn-pin-again:hover {
    background: #f1f5f9;
    border-color: #94a3b8;
}

/* Tags Chips */
.tags-chips-wrapper {
    margin-top: 4px;
}

.btn-tag-chip {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 0.74rem;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.15s ease;
    display: inline-flex;
    align-items: center;
}

.btn-tag-chip .tag-hash {
    color: #94a3b8;
    margin-right: 2px;
}

.btn-tag-chip:hover {
    border-color: #fecdd3;
    color: #e11d48;
}

.btn-tag-chip.active {
    background: #e11d48;
    border-color: #e11d48;
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.28);
}

.btn-tag-chip.active .tag-hash {
    color: #ffffff;
}

/* Image Upload Cards */
.uploaded-img-card {
    height: 96px;
    border: 1px solid #e2e8f0;
}

.img-cover {
    object-fit: cover;
}

.img-caption-tag {
    position: absolute;
    bottom: 4px;
    left: 4px;
    background: rgba(15, 23, 42, 0.75);
    color: #ffffff;
    font-size: 0.62rem;
    font-weight: 600;
    padding: 2px 6px;
    border-radius: 4px;
}

.btn-remove-img {
    position: absolute;
    top: 4px;
    right: 4px;
    background: rgba(225, 29, 72, 0.85);
    color: #ffffff;
    border: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.15s;
}

.btn-remove-img:hover {
    background: #be123c;
}

.upload-dropzone {
    height: 96px;
    border: 1.5px dashed #f472b6;
    background: #fdf2f8;
    cursor: pointer;
    transition: all 0.2s;
}

.upload-dropzone:hover {
    background: #fce7f3;
    border-color: #e11d48;
}

.upload-icon-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}

/* Checkbox & Bottom Actions */
.custom-checkbox:checked {
    background-color: #e11d48;
    border-color: #e11d48;
}

.btn-submit-proposal {
    background: linear-gradient(135deg, #e11d48 0%, #f43f5e 100%);
    border: none;
    color: #ffffff;
    font-size: 0.82rem;
    font-weight: 700;
    padding: 9px 20px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 3px 10px rgba(225, 29, 72, 0.28);
    transition: all 0.2s;
}

.btn-submit-proposal:hover:not(:disabled) {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(225, 29, 72, 0.38);
    color: #ffffff;
}

.btn-submit-proposal:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.btn-save-draft {
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #334155;
    font-size: 0.82rem;
    font-weight: 700;
    padding: 9px 18px;
    border-radius: 999px;
    transition: all 0.15s;
}

.btn-save-draft:hover {
    background: #f8fafc;
    border-color: #94a3b8;
}

/* Right Sidebar Widgets */
.side-widget-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 20px;
    border: 1px solid #f1f5f9;
}

.widget-icon-box {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.widget-header-title {
    font-size: 0.74rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: 0.4px;
}

.widget-main-title {
    font-size: 0.95rem;
    font-weight: 800;
    color: #0f172a;
}

.kpi-num {
    font-size: 1.5rem;
    font-weight: 800;
    line-height: 1.2;
}

/* History Box Items */
.history-item-box {
    background: #f8fafc;
    border: 1px solid #f1f5f9;
}

.alert-box-mini {
    line-height: 1.35;
}

.help-osm-card {
    background: #fff1f2;
    border: 1px solid #ffe4e6;
}

.help-icon-circle {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* Utility Colors */
.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }
.text-cyan { color: #0284c7 !important; }
.bg-cyan { background-color: #0284c7 !important; }
.bg-cyan-light { background-color: #e0f2fe !important; }
.text-purple { color: #9333ea !important; }
.bg-purple { background-color: #9333ea !important; }
.bg-purple-light { background-color: #f3e8ff !important; }
.bg-danger-light { background-color: #fee2e2 !important; }
.font-10 { font-size: 0.65rem !important; }
.font-11 { font-size: 0.7rem !important; }
.font-12 { font-size: 0.76rem !important; }
.font-13 { font-size: 0.82rem !important; }
</style>
