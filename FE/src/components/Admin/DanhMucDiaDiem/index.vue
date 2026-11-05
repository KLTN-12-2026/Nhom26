<template>
    <div class="category-taxonomy-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">HỆ THỐNG PHÂN LOẠI POI 2025</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Quản Lý Cây Danh Mục Địa Điểm Du Lịch Đà Nẵng</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 820px;">
                    Định hình ontology thông minh cho thuật toán AI Trip Planner. Cấu trúc hóa quan hệ cha – con, gắn kết trọng số khám phá và quản trị hơn 400+ địa điểm trên toàn địa bàn thành phố.
                </p>
            </div>
            
            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-2" @click="xuatCayPhanLoai">
                    <i class="bx bx-download text-primary font-16"></i>
                    <span>Xuất Cây Phân Loại</span>
                </button>
                <button class="btn rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-2" style="background-color: #EDE9FE; border: 1px solid #DDD6FE; color: #7C3AED;" @click="openModalSapXep">
                    <i class="bx bx-sort-alt-2 font-16"></i>
                    <span>Sắp Xếp Thứ Tự Hiển Thị</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="openModalThemDanhMuc">
                    <i class="bx bx-plus font-16"></i>
                    <span>+ Tạo Danh Mục Mới</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Cây Cấp 1 (Gốc) -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">CÂY CẤP 1 (GỐC)</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-28 fw-bold text-dark">12</span>
                            <span class="font-12 fw-semibold" style="color: #0284C7;">Danh mục</span>
                        </div>
                    </div>
                    <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 44px; height: 44px;">
                        <i class="bx bx-git-branch font-22" style="color: #E11D48;"></i>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Cây Phân Cấp 2 -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">CÂY PHÂN CẤP 2</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-28 fw-bold text-dark">36</span>
                            <span class="font-12 fw-semibold" style="color: #7C3AED;">Tiểu mục phụ</span>
                        </div>
                    </div>
                    <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 44px; height: 44px;">
                        <i class="bx bx-folder font-22" style="color: #7C3AED;"></i>
                    </div>
                </div>
            </div>

            <!-- KPI 3: POI Đã Phân Loại -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">POI ĐÃ PHÂN LOẠI</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-28 fw-bold text-dark">428</span>
                            <span class="font-12 fw-semibold" style="color: #0284C7;">Điểm đến</span>
                        </div>
                    </div>
                    <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 44px; height: 44px;">
                        <i class="bx bx-map-pin font-22" style="color: #0284C7;"></i>
                    </div>
                </div>
            </div>

            <!-- KPI 4: Độ Chuẩn Hóa AI -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐỘ CHUẨN HÓA AI</div>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <span class="font-28 fw-bold text-dark">98%</span>
                            <span class="font-12 fw-semibold" style="color: #E11D48;">Sẵn sàng AI</span>
                        </div>
                    </div>
                    <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 44px; height: 44px;">
                        <i class="bx bx-sparkles font-22" style="color: #E11D48;"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Columns Layout: Category Tree (Left) & Attributes / Detail Panel (Right) -->
        <div class="row g-4 mb-4">
            <!-- LEFT COLUMN: CẤU TRÚC CÂY PHÂN CẤP -->
            <div class="col-12 col-lg-5 col-xl-5">
                <div class="card border-0 shadow-xs rounded-4 bg-white h-100 d-flex flex-column justify-content-between">
                    <div class="p-3 p-lg-4">
                        <!-- Header Card Cây Phân Cấp -->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h5 class="fw-bold text-dark mb-0 font-16">Cấu Trúc Cây Phân Cấp</h5>
                                <div class="text-muted font-11">Click chọn danh mục để tùy chỉnh thuộc tính chi tiết</div>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <button class="btn btn-sm btn-light rounded-circle p-1 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Mở rộng / Thu gọn toàn bộ" @click="toggleExpandAll">
                                    <i class="bx" :class="isAllExpanded ? 'bx-collapse-vertical' : 'bx-expand-vertical'"></i>
                                </button>
                                <button class="btn btn-sm btn-light rounded-circle p-1 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Cài đặt cây" @click="openModalSapXep">
                                    <i class="bx bx-slider-alt"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Quick Filter Input -->
                        <div class="position-relative mb-3">
                            <i class="bx bx-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted font-15"></i>
                            <input 
                                type="text" 
                                v-model="filterKeyword" 
                                class="form-control form-control-sm rounded-pill ps-5 bg-light border-0 font-12"
                                placeholder="Lọc nhanh danh mục theo tên hoặc mã..." 
                            />
                            <button v-if="filterKeyword" class="btn btn-link btn-sm position-absolute top-50 end-0 translate-middle-y me-2 text-muted p-0" @click="filterKeyword = ''">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>

                        <!-- Category Tree List -->
                        <div class="category-tree-list d-flex flex-column gap-2">
                            <div 
                                v-for="(cat, idx) in filteredCategories" 
                                :key="cat.id" 
                                class="category-node-card rounded-3 transition-all"
                                :class="{ 'selected-node': selectedCategory.id === cat.id }"
                            >
                                <!-- Parent Node Row -->
                                <div 
                                    class="p-2-5 d-flex align-items-center justify-content-between cursor-pointer rounded-3"
                                    :style="selectedCategory.id === cat.id ? 'background-color: #FFF1F2; border: 1px solid #FECDD3;' : 'background-color: #FAF5FF; border: 1px solid #F3E8FF;'"
                                    @click="selectCategory(cat)"
                                >
                                    <div class="d-flex align-items-center gap-2 flex-grow-1 overflow-hidden">
                                        <!-- Expand/Collapse Chevron -->
                                        <button 
                                            class="btn btn-sm p-0 text-muted border-0 d-flex align-items-center justify-content-center" 
                                            style="width: 20px;"
                                            @click.stop="toggleExpand(cat)"
                                        >
                                            <i class="bx font-16 transition-all" :class="cat.expanded ? 'bx-chevron-down text-dark' : 'bx-chevron-right'"></i>
                                        </button>

                                        <!-- Category Icon Box -->
                                        <div 
                                            class="category-icon-square rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 text-white"
                                            :style="{ backgroundColor: cat.color }"
                                            style="width: 34px; height: 34px;"
                                        >
                                            <i :class="cat.icon" class="font-18"></i>
                                        </div>

                                        <!-- Name & Code -->
                                        <div class="overflow-hidden">
                                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                                <span class="fw-bold font-13 text-dark text-truncate">{{ cat.ten_danh_muc }}</span>
                                                <span v-if="cat.status === 'active'" class="badge rounded-pill font-9 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">Active</span>
                                                <span class="font-11 fw-bold text-dark">{{ cat.total_poi }} <span class="font-10 text-muted fw-normal">POI</span></span>
                                            </div>
                                            <div class="font-10 text-muted">Mã: <span class="fw-semibold text-secondary font-mono">{{ cat.ma_danh_muc }}</span></div>
                                        </div>
                                    </div>

                                    <!-- Right Handle or Chevron -->
                                    <div class="d-flex align-items-center gap-1 flex-shrink-0 ms-2">
                                        <i v-if="selectedCategory.id === cat.id" class="bx bx-chevron-right font-18 text-pink fw-bold"></i>
                                        <i v-else class="bx bx-dots-vertical-rounded text-muted font-16 cursor-grab" title="Kéo thả sắp xếp"></i>
                                    </div>
                                </div>

                                <!-- Sub-items (Tree Hierarchy) -->
                                <div v-if="cat.expanded && cat.children && cat.children.length > 0" class="sub-tree-container ps-4 pe-2 pt-2 pb-1">
                                    <div 
                                        v-for="(sub, sIdx) in cat.children" 
                                        :key="sub.id"
                                        class="sub-tree-node d-flex align-items-center justify-content-between py-1-5 px-2 rounded-2 my-1 transition-all"
                                        :class="{ 'sub-selected': selectedCategory.id === sub.id }"
                                        @click.stop="selectCategory(sub, cat)"
                                    >
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="tree-bullet-dot"></span>
                                            <span class="font-12 text-secondary fw-medium">{{ sub.ten_danh_muc }}</span>
                                        </div>
                                        <span class="font-11 fw-semibold text-muted">{{ sub.total_poi }} <span class="font-10 fw-normal">POI</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mini Bottom Panel: Tỷ trọng phân bổ danh mục POI -->
                    <div class="p-3 border-top mx-3 mb-2 rounded-4" style="background-color: #F8FAFC;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-1-5">
                                <i class="bx bx-pie-chart-alt-2 font-15" style="color: #E11D48;"></i>
                                <span class="font-11 fw-bold text-uppercase tracking-wider text-dark">TỶ TRỌNG PHÂN BỔ DANH MỤC POI</span>
                            </div>
                            <a href="javascript:void(0)" class="font-11 text-primary text-decoration-none fw-semibold" @click="xemBaoCaoTyTrong">Xem báo cáo</a>
                        </div>

                        <!-- Segmented Progress Bar -->
                        <div class="d-flex rounded-pill overflow-hidden mb-2" style="height: 8px;">
                            <div style="width: 26%; background-color: #7C3AED;" title="Ẩm thực: 26%"></div>
                            <div style="width: 20%; background-color: #E11D48;" title="Di tích: 20%"></div>
                            <div style="width: 16%; background-color: #06B6D4;" title="Thiên nhiên: 16%"></div>
                            <div style="width: 11%; background-color: #0284C7;" title="Biển: 11%"></div>
                            <div style="width: 27%; background-color: #CBD5E1;" title="Khác: 27%"></div>
                        </div>

                        <!-- Legend -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between font-11 text-muted">
                            <span class="d-flex align-items-center gap-1">
                                <span class="dot-sm" style="background-color: #7C3AED;"></span> Ẩm thực (26%)
                            </span>
                            <span class="d-flex align-items-center gap-1">
                                <span class="dot-sm" style="background-color: #E11D48;"></span> Di tích (20%)
                            </span>
                            <span class="d-flex align-items-center gap-1">
                                <span class="dot-sm" style="background-color: #06B6D4;"></span> Thiên nhiên (16%)
                            </span>
                            <span class="d-flex align-items-center gap-1">
                                <span class="dot-sm" style="background-color: #0284C7;"></span> Biển (11%)
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: CHỈNH SỬA THUỘC TÍNH & ĐIỂM TIÊU BIỂU -->
            <div class="col-12 col-lg-7 col-xl-7">
                <div class="card border-0 shadow-xs rounded-4 bg-white p-3 p-lg-4">
                    <!-- Form Top Header Breadcrumb & Status -->
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #FDF2F8; color: #E11D48;">
                                {{ selectedCategory.level_label || 'Cấp 1 - Gốc' }}
                            </span>
                            <span class="font-12 text-muted fw-semibold">ID: {{ selectedCategory.id_str || 'cat_danang_001' }}</span>
                        </div>
                        <span class="badge rounded-pill font-11 fw-bold px-3 py-1 d-inline-flex align-items-center gap-1" style="background-color: #E0F2FE; color: #0284C7;">
                            <span class="dot-cyan"></span> Đang hoạt động
                        </span>
                    </div>

                    <!-- Main Form Title -->
                    <h4 class="fw-bold text-dark font-20 mb-3">
                        Chỉnh Sửa Thuộc Tính: {{ selectedCategory.ten_danh_muc }}
                    </h4>

                    <!-- Edit Form Fields -->
                    <div class="category-form-container">
                        <!-- Row 1: Mã danh mục & Tên danh mục -->
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-1">
                                    MÃ DANH MỤC (ma_danh_muc) <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    v-model="selectedCategory.ma_danh_muc" 
                                    class="form-control font-13 fw-bold rounded-3 font-mono" 
                                    placeholder="VD: CAT_NATURE_PASS"
                                />
                                <div class="font-10 text-muted mt-1 fst-italic">Định danh bất biến dùng trong truy vấn API</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-1">
                                    TÊN DANH MỤC (ten_danh_muc) <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    v-model="selectedCategory.ten_danh_muc" 
                                    class="form-control font-13 fw-semibold rounded-3" 
                                    placeholder="Nhập tên danh mục..."
                                />
                                <div class="font-10 text-muted mt-1 fst-italic">Hiển thị trực tiếp trên App Du khách & Web Portal</div>
                            </div>
                        </div>

                        <!-- Row 2: Icon ký hiệu, Thứ tự ưu tiên, Trọng số AI Planner -->
                        <div class="row g-3 mb-3">
                            <!-- Icon Ký Hiệu -->
                            <div class="col-12 col-sm-4">
                                <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-1">
                                    ICON KÝ HIỆU
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-pink-light border-end-0 rounded-start-3 p-1 px-2" style="background-color: #FDF2F8;">
                                        <div class="rounded-2 d-flex align-items-center justify-content-center text-white" :style="{ backgroundColor: selectedCategory.color || '#E11D48' }" style="width: 26px; height: 26px;">
                                            <i :class="selectedCategory.icon || 'bx bx-landscape'" class="font-15"></i>
                                        </div>
                                    </span>
                                    <input 
                                        type="text" 
                                        v-model="selectedCategory.icon_key" 
                                        class="form-control font-12 rounded-end-3" 
                                        placeholder="VD: landscape"
                                    />
                                </div>
                            </div>

                            <!-- Thứ Tự Ưu Tiên -->
                            <div class="col-12 col-sm-4">
                                <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-1">
                                    THỨ TỰ ƯU TIÊN
                                </label>
                                <input 
                                    type="number" 
                                    v-model.number="selectedCategory.thu_tu" 
                                    class="form-control font-13 fw-bold text-center rounded-3" 
                                    min="1"
                                />
                                <div class="font-10 text-muted mt-1 fst-italic">Số nhỏ ưu tiên trước trên trang chủ</div>
                            </div>

                            <!-- Trọng Số AI Planner Slider -->
                            <div class="col-12 col-sm-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-0">
                                        TRỌNG SỐ AI PLANNER
                                    </label>
                                    <span class="badge rounded-pill font-11 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                                        {{ Number(selectedCategory.ai_weight || 0.88).toFixed(2) }}
                                    </span>
                                </div>
                                <input 
                                    type="range" 
                                    v-model.number="selectedCategory.ai_weight" 
                                    class="form-range custom-pink-range mt-1" 
                                    min="0.1" 
                                    max="1.0" 
                                    step="0.01"
                                />
                                <div class="font-10 text-muted fst-italic">Mức độ ưu tiên thuật toán ghép lịch trình.</div>
                            </div>
                        </div>

                        <!-- Row 3: Icon Vector SVG / Banner Nhận Diện -->
                        <div class="mb-3">
                            <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-1">
                                ICON VECTOR SVG / BANNER NHẬN DIỆN
                            </label>
                            <div class="upload-banner-box p-2-5 rounded-3 border d-flex align-items-center justify-content-between bg-light">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-3 border border-pink-subtle bg-white d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E11D48" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 20h18L17 8l-4 6-3-3z"/>
                                            <circle cx="6.5" cy="6.5" r="2.5"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-13 fw-bold text-dark">{{ selectedCategory.svg_filename || 'danang_nature_pass_symbol.svg' }}</div>
                                        <div class="font-11 text-muted">Định dạng SVG hoặc PNG trong suốt &lt; 16: da 2MB</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button class="btn btn-sm btn-outline-secondary bg-white rounded-pill px-3 py-1 font-11 fw-bold shadow-xs" @click="doiTepTin">
                                        Đổi Tệp Tin
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger border-0 rounded-circle p-1 text-danger d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" title="Xóa tệp" @click="xoaTepTin">
                                        <i class="bx bx-trash font-16"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Row 4: Mô Tả Danh Mục -->
                        <div class="mb-4">
                            <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-1">
                                MÔ TẢ DANH MỤC (mo_ta)
                            </label>
                            <textarea 
                                v-model="selectedCategory.mo_ta" 
                                class="form-control font-12 rounded-3 text-secondary" 
                                rows="3"
                                placeholder="Nhập mô tả nghiệp vụ..."
                            ></textarea>
                        </div>

                        <!-- Row 5: Địa Điểm Tiêu Biểu Trong Danh Mục -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                                <div>
                                    <h6 class="font-13 fw-bold text-dark mb-0">Địa Điểm Tiêu Biểu Trong Danh Mục</h6>
                                    <span class="font-11 text-muted">Tổng cộng có {{ selectedCategory.total_poi || 64 }} địa điểm trực thuộc danh mục này</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold d-flex align-items-center gap-1" style="background-color: #EDE9FE; color: #7C3AED; border: 1px solid #DDD6FE;" @click="openModalGopDanhMuc">
                                        <i class="bx bx-git-merge font-14"></i>
                                        <span>Gộp Danh Mục</span>
                                    </button>
                                    <button class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold d-flex align-items-center gap-1" style="background-color: #FDF2F8; color: #E11D48; border: 1px solid #FECDD3;" @click="openModalChuyenPoi">
                                        <i class="bx bx-transfer-alt font-14"></i>
                                        <span>Chuyển Nhanh POI</span>
                                    </button>
                                </div>
                            </div>

                            <!-- 3 Representative POI Cards -->
                            <div class="row g-3">
                                <div v-for="poi in representativePois" :key="poi.id" class="col-12 col-md-4">
                                    <div class="poi-preview-card rounded-3 border bg-white overflow-hidden shadow-xs h-100 transition-all">
                                        <!-- Image with Badge -->
                                        <div class="position-relative" style="height: 105px;">
                                            <img :src="poi.image" :alt="poi.name" class="w-100 h-100 object-fit-cover" />
                                            <span 
                                                class="badge position-absolute top-0 start-0 m-2 font-9 fw-bold px-2 py-0-5 rounded-pill shadow-xs"
                                                :style="{ backgroundColor: poi.badgeColor, color: '#fff' }"
                                            >
                                                {{ poi.badge }}
                                            </span>
                                        </div>
                                        <!-- Info Row -->
                                        <div class="p-2-5">
                                            <div class="font-12 fw-bold text-dark text-truncate mb-1" :title="poi.name">
                                                {{ poi.name }}
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between font-11">
                                                <span class="text-muted d-flex align-items-center gap-1">
                                                    <i class="bx bxs-star text-warning font-12"></i>
                                                    <span class="fw-bold text-dark">{{ poi.rating }}</span>
                                                    <span>({{ poi.reviews }})</span>
                                                </span>
                                                <span class="fw-bold font-mono text-cyan" style="color: #0284C7;">
                                                    {{ poi.code }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Form Actions -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-3 border-top">
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1-5 font-12 fw-bold d-flex align-items-center gap-1" style="border-color: #FECDD3; color: #E11D48;" @click="xoaDanhMuc">
                                    <i class="bx bx-trash font-15"></i>
                                    <span>Xóa Danh Mục</span>
                                </button>
                                <button class="btn btn-sm btn-light rounded-pill px-3 py-1-5 font-12 fw-semibold text-secondary d-flex align-items-center gap-1" @click="dongTamThoi">
                                    <i class="bx bx-pause-circle font-15"></i>
                                    <span>Đóng Tạm Thời</span>
                                </button>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-sm btn-light rounded-pill px-3 py-1-5 font-12 fw-semibold text-secondary" @click="resetForm">
                                    Hủy Bỏ
                                </button>
                                <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4 py-1-5 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="luuThayDoi">
                                    <i class="bx bx-check font-16"></i>
                                    <span>Lưu Thay Đổi</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Smart Clustering Health Check Card -->
        <div class="card border-0 shadow-xs rounded-4 p-3 p-lg-4" style="background-color: #F0FDF4; border: 1px solid #DCFCE7 !important;">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="background-color: #E0F2FE; width: 44px; height: 44px;">
                        <i class="bx bx-brain font-24" style="color: #0284C7;"></i>
                    </div>
                    <div>
                        <div class="font-13 fw-bold text-dark">Đánh giá sức khỏe danh mục thông minh (Smart Clustering)</div>
                        <div class="font-11 text-muted">Không phát hiện xung đột thứ tự. Phù hợp 98.4% với thuật toán gợi ý lịch trình tự động 3 ngày 2 đêm.</div>
                    </div>
                </div>
                <button 
                    class="btn rounded-pill px-4 py-2 font-12 fw-bold text-white shadow-xs d-flex align-items-center gap-2"
                    style="background-color: #0284C7;"
                    :disabled="isCheckingSemantics"
                    @click="chayKiemTraNguNghia"
                >
                    <i class="bx bx-sync font-16" :class="{ 'bx-spin': isCheckingSemantics }"></i>
                    <span>Chạy Kiểm Tra Ngữ Nghĩa</span>
                </button>
            </div>
        </div>

        <!-- MODAL 1: TẠO DANH MỤC MỚI -->
        <div v-if="showModalThem" class="custom-modal-backdrop">
            <div class="custom-modal-content rounded-4 p-4 bg-white shadow-lg" style="max-width: 580px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0 font-16 d-flex align-items-center gap-2">
                        <i class="bx bx-folder-plus text-pink"></i> Tạo Danh Mục Phân Loại Mới
                    </h5>
                    <button class="btn btn-sm btn-light rounded-circle p-1" @click="showModalThem = false">
                        <i class="bx bx-x font-18"></i>
                    </button>
                </div>

                <div class="mb-3">
                    <label class="form-label font-11 fw-bold text-uppercase">Cấp bậc danh mục</label>
                    <select v-model="newCategory.parent_id" class="form-select font-12 rounded-3">
                        <option value="">-- Danh mục gốc (Cấp 1) --</option>
                        <option v-for="c in categories" :key="c.id" :value="c.id">{{ c.ten_danh_muc }}</option>
                    </select>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label font-11 fw-bold text-uppercase">Mã danh mục *</label>
                        <input type="text" v-model="newCategory.ma_danh_muc" class="form-control font-12 rounded-3 font-mono" placeholder="CAT_EXAMPLE" />
                    </div>
                    <div class="col-6">
                        <label class="form-label font-11 fw-bold text-uppercase">Tên danh mục *</label>
                        <input type="text" v-model="newCategory.ten_danh_muc" class="form-control font-12 rounded-3" placeholder="Nhập tên..." />
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-4">
                        <label class="form-label font-11 fw-bold text-uppercase">Icon Boxicon</label>
                        <input type="text" v-model="newCategory.icon" class="form-control font-12 rounded-3" placeholder="bx bx-star" />
                    </div>
                    <div class="col-4">
                        <label class="form-label font-11 fw-bold text-uppercase">Thứ tự</label>
                        <input type="number" v-model.number="newCategory.thu_tu" class="form-control font-12 rounded-3" />
                    </div>
                    <div class="col-4">
                        <label class="form-label font-11 fw-bold text-uppercase">Trọng số AI</label>
                        <input type="number" step="0.05" min="0.1" max="1" v-model.number="newCategory.ai_weight" class="form-control font-12 rounded-3" />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label font-11 fw-bold text-uppercase">Mô tả tóm tắt</label>
                    <textarea v-model="newCategory.mo_ta" class="form-control font-12 rounded-3" rows="2" placeholder="Ghi chú nghiệp vụ..."></textarea>
                </div>

                <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                    <button class="btn btn-sm btn-light rounded-pill px-3" @click="showModalThem = false">Hủy Bỏ</button>
                    <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4 fw-bold" @click="submitThemDanhMuc">
                        Thêm Danh Mục
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL 2: GỘP DANH MỤC -->
        <div v-if="showModalGop" class="custom-modal-backdrop">
            <div class="custom-modal-content rounded-4 p-4 bg-white shadow-lg" style="max-width: 520px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0 font-16 d-flex align-items-center gap-2">
                        <i class="bx bx-git-merge text-purple"></i> Gộp Danh Mục POI
                    </h5>
                    <button class="btn btn-sm btn-light rounded-circle p-1" @click="showModalGop = false">
                        <i class="bx bx-x font-18"></i>
                    </button>
                </div>
                <p class="font-12 text-muted mb-3">
                    Toàn bộ <strong class="text-dark">{{ selectedCategory.total_poi }} POI</strong> thuộc danh mục 
                    <strong class="text-danger">{{ selectedCategory.ten_danh_muc }}</strong> sẽ được chuyển sang danh mục đích dưới đây:
                </p>
                <div class="mb-3">
                    <label class="form-label font-11 fw-bold text-uppercase">Chọn danh mục đích gộp vào</label>
                    <select v-model="targetMergeId" class="form-select font-12 rounded-3">
                        <option v-for="c in otherCategories" :key="c.id" :value="c.id">{{ c.ten_danh_muc }} ({{ c.total_poi }} POI)</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                    <button class="btn btn-sm btn-light rounded-pill px-3" @click="showModalGop = false">Hủy</button>
                    <button class="btn btn-sm text-white rounded-pill px-4 fw-bold" style="background-color: #7C3AED;" @click="submitGopDanhMuc">
                        Xác Nhận Gộp
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL 3: CHUYỂN NHANH POI -->
        <div v-if="showModalChuyen" class="custom-modal-backdrop">
            <div class="custom-modal-content rounded-4 p-4 bg-white shadow-lg" style="max-width: 520px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0 font-16 d-flex align-items-center gap-2">
                        <i class="bx bx-transfer-alt text-pink"></i> Điều Chuyển POI Giữa Các Cây Danh Mục
                    </h5>
                    <button class="btn btn-sm btn-light rounded-circle p-1" @click="showModalChuyen = false">
                        <i class="bx bx-x font-18"></i>
                    </button>
                </div>
                <div class="mb-3">
                    <label class="form-label font-11 fw-bold text-uppercase">Danh mục nguồn</label>
                    <input type="text" class="form-control font-12 rounded-3 bg-light" :value="selectedCategory.ten_danh_muc" readonly />
                </div>
                <div class="mb-3">
                    <label class="form-label font-11 fw-bold text-uppercase">Chuyển sang danh mục mới</label>
                    <select v-model="targetTransferId" class="form-select font-12 rounded-3">
                        <option v-for="c in otherCategories" :key="c.id" :value="c.id">{{ c.ten_danh_muc }}</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                    <button class="btn btn-sm btn-light rounded-pill px-3" @click="showModalChuyen = false">Đóng</button>
                    <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4 fw-bold" @click="submitChuyenPoi">
                        Chuyển Danh Mục
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DanhMucDiaDiemAdmin',
    data() {
        return {
            filterKeyword: '',
            isAllExpanded: true,
            isCheckingSemantics: false,

            // Modals
            showModalThem: false,
            showModalGop: false,
            showModalChuyen: false,
            targetMergeId: 2,
            targetTransferId: 2,

            newCategory: {
                parent_id: '',
                ma_danh_muc: '',
                ten_danh_muc: '',
                icon: 'bx bx-landscape',
                thu_tu: 10,
                ai_weight: 0.85,
                mo_ta: ''
            },

            // Danh sách danh mục cây phân cấp (Khớp 100% hình ảnh)
            categories: [
                {
                    id: 1,
                    id_str: 'cat_danang_001',
                    level_label: 'Cấp 1 - Gốc',
                    ma_danh_muc: 'CAT_NATURE_PASS',
                    ten_danh_muc: 'Danh lam thắng cảnh & Đèo',
                    status: 'active',
                    total_poi: 64,
                    icon: 'bx bx-landscape',
                    icon_key: 'landscape',
                    color: '#E11D48',
                    thu_tu: 1,
                    ai_weight: 0.88,
                    svg_filename: 'danang_nature_pass_symbol.svg',
                    mo_ta: 'Bao gồm toàn bộ các kỳ quan tự nhiên, ngọn núi, mũi bán đảo, đường đèo ven biển danh tiếng của Đà Nẵng. Được ưu tiên đề xuất trong các tour du lịch sinh thái, khám phá ngoài trời, phượt xe máy và check-in bình minh hoặc hoàng hôn.',
                    expanded: true,
                    children: [
                        { id: 11, ten_danh_muc: 'Đèo Hải Vân & Cung ven biển', total_poi: 24, ma_danh_muc: 'CAT_SUB_HV_PASS', thu_tu: 1, ai_weight: 0.90, level_label: 'Cấp 2 - Tiểu mục' },
                        { id: 12, ten_danh_muc: 'Bán đảo Sơn Trà & Rừng nguyên sinh', total_poi: 22, ma_danh_muc: 'CAT_SUB_SONTRA_FOREST', thu_tu: 2, ai_weight: 0.88, level_label: 'Cấp 2 - Tiểu mục' },
                        { id: 13, ten_danh_muc: 'Quần thể Ngũ Hành Sơn & Hang động', total_poi: 18, ma_danh_muc: 'CAT_SUB_NHS_CAVES', thu_tu: 3, ai_weight: 0.85, level_label: 'Cấp 2 - Tiểu mục' }
                    ]
                },
                {
                    id: 2,
                    id_str: 'cat_danang_002',
                    level_label: 'Cấp 1 - Gốc',
                    ma_danh_muc: 'CAT_HERITAGE_CULTURE',
                    ten_danh_muc: 'Di tích lịch sử & Văn hóa',
                    status: 'active',
                    total_poi: 86,
                    icon: 'bx bx-landmark',
                    icon_key: 'landmark',
                    color: '#7C3AED',
                    thu_tu: 2,
                    ai_weight: 0.82,
                    svg_filename: 'danang_heritage_culture.svg',
                    mo_ta: 'Hệ thống bảo tàng, chùa chiền cổ kính, di tích quốc gia đặc biệt như Bảo tàng Điêu khắc Chăm, Thành Điện Hải, Chùa Linh Ứng và các công trình di sản gắn liền lịch sử Đà Nẵng.',
                    expanded: false,
                    children: [
                        { id: 21, ten_danh_muc: 'Bảo tàng & Nhà lưu niệm', total_poi: 34, ma_danh_muc: 'CAT_SUB_MUSEUM', thu_tu: 1, ai_weight: 0.80 },
                        { id: 22, ten_danh_muc: 'Chùa chiền & Đền thờ cổ', total_poi: 52, ma_danh_muc: 'CAT_SUB_PAGODA', thu_tu: 2, ai_weight: 0.84 }
                    ]
                },
                {
                    id: 3,
                    id_str: 'cat_danang_003',
                    level_label: 'Cấp 1 - Gốc',
                    ma_danh_muc: 'CAT_FOOD_GOURMET',
                    ten_danh_muc: 'Ẩm thực & Đặc sản Miền Trung',
                    status: 'active',
                    total_poi: 112,
                    icon: 'bx bx-restaurant',
                    icon_key: 'restaurant',
                    color: '#EA580C',
                    thu_tu: 3,
                    ai_weight: 0.95,
                    svg_filename: 'danang_food_gourmet.svg',
                    mo_ta: 'Địa điểm ăn uống, mì Quảng gia truyền, bánh tráng cuốn thịt heo, hải sản ven biển Mỹ Khê và các khu ẩm thực đêm nổi tiếng của Đà Thành.',
                    expanded: false,
                    children: [
                        { id: 31, ten_danh_muc: 'Mì Quảng & Bánh Tráng Cuốn Thịt Heo', total_poi: 48, ma_danh_muc: 'CAT_SUB_MI_QUANG', thu_tu: 1, ai_weight: 0.95 },
                        { id: 32, ten_danh_muc: 'Hải Sản Tươi Sống Ven Biển', total_poi: 64, ma_danh_muc: 'CAT_SUB_SEAFOOD', thu_tu: 2, ai_weight: 0.92 }
                    ]
                },
                {
                    id: 4,
                    id_str: 'cat_danang_004',
                    level_label: 'Cấp 1 - Gốc',
                    ma_danh_muc: 'CAT_BEACH_WATERSPORTS',
                    ten_danh_muc: 'Bãi biển & Thể thao nước',
                    status: 'active',
                    total_poi: 48,
                    icon: 'bx bx-water',
                    icon_key: 'water',
                    color: '#06B6D4',
                    thu_tu: 4,
                    ai_weight: 0.89,
                    svg_filename: 'danang_beach_watersports.svg',
                    mo_ta: 'Dải bãi biển Mỹ Khê, Non Nước, Nam Ô với các câu lạc bộ chèo SUP, lặn ngắm san hô, cano kéo dù và lướt ván.',
                    expanded: false,
                    children: [
                        { id: 41, ten_danh_muc: 'Bãi tắm công cộng Mỹ Khê & Non Nước', total_poi: 28, ma_danh_muc: 'CAT_SUB_BEACH_PUBLIC', thu_tu: 1, ai_weight: 0.90 },
                        { id: 42, ten_danh_muc: 'Trạm chèo SUP & Lặn biển', total_poi: 20, ma_danh_muc: 'CAT_SUB_SUP_DIVING', thu_tu: 2, ai_weight: 0.88 }
                    ]
                },
                {
                    id: 5,
                    id_str: 'cat_danang_005',
                    level_label: 'Cấp 1 - Gốc',
                    ma_danh_muc: 'CAT_ENTERTAINMENT_PHOTO',
                    ten_danh_muc: 'Vui chơi giải trí & Check-in',
                    status: 'active',
                    total_poi: 78,
                    icon: 'bx bx-camera',
                    icon_key: 'camera',
                    color: '#EC4899',
                    thu_tu: 5,
                    ai_weight: 0.86,
                    svg_filename: 'danang_entertainment_photo.svg',
                    mo_ta: 'Sun World Bà Nà Hills, Cầu Vàng, Cầu Rồng phun lửa, Công viên châu Á Asia Park và các điểm ngắm hoàng hôn cực đẹp.',
                    expanded: false,
                    children: [
                        { id: 51, ten_danh_muc: 'Công viên chủ đề & Cầu biểu tượng', total_poi: 45, ma_danh_muc: 'CAT_SUB_THEME_PARK', thu_tu: 1, ai_weight: 0.89 },
                        { id: 52, ten_danh_muc: 'Khu vui chơi đêm & Phố đi bộ', total_poi: 33, ma_danh_muc: 'CAT_SUB_NIGHT_ENTERTAINMENT', thu_tu: 2, ai_weight: 0.83 }
                    ]
                },
                {
                    id: 6,
                    id_str: 'cat_danang_006',
                    level_label: 'Cấp 1 - Gốc',
                    ma_danh_muc: 'CAT_RESORT_SPA',
                    ten_danh_muc: 'Nghỉ dưỡng & Spa cao cấp',
                    status: 'active',
                    total_poi: 40,
                    icon: 'bx bx-hotel',
                    icon_key: 'hotel',
                    color: '#8B5CF6',
                    thu_tu: 6,
                    ai_weight: 0.78,
                    svg_filename: 'danang_resort_spa.svg',
                    mo_ta: 'Khu nghỉ dưỡng 5 sao ven biển Hoàng Sa - Võ Nguyên Giáp - Trường Sa, suối khoáng nóng Núi Thần Tài và trung tâm trị liệu bùn khoáng.',
                    expanded: false,
                    children: []
                }
            ],

            // Active Selected Category (mặc định là danh mục 1 như trong hình)
            selectedCategory: {},

            // 3 Representative POI Cards (khớp ảnh)
            representativePois: [
                {
                    id: 101,
                    name: 'Đèo Hải Vân & Hải Vân Quan',
                    code: 'POI_HV_01',
                    badge: 'Độc đáo #1',
                    badgeColor: '#E11D48',
                    rating: '4.8',
                    reviews: '1.8k',
                    image: 'https://images.unsplash.com/photo-1596401057633-54a8fe8ef647?auto=format&fit=crop&w=500&q=80'
                },
                {
                    id: 102,
                    name: 'Bán đảo Sơn Trà & Bãi Đá Đen',
                    code: 'POI_ST_04',
                    badge: 'Sinh thái',
                    badgeColor: '#06B6D4',
                    rating: '4.8',
                    reviews: '2.4k',
                    image: 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=500&q=80'
                },
                {
                    id: 103,
                    name: 'Quần thể Ngũ Hành Sơn',
                    code: 'POI_NHS_02',
                    badge: 'Hang động',
                    badgeColor: '#0284C7',
                    rating: '4.7',
                    reviews: '3.1k',
                    image: 'https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=500&q=80'
                }
            ]
        };
    },
    computed: {
        filteredCategories() {
            if (!this.filterKeyword.trim()) {
                return this.categories;
            }
            const kw = this.filterKeyword.toLowerCase().trim();
            return this.categories.filter(c => 
                c.ten_danh_muc.toLowerCase().includes(kw) || 
                c.ma_danh_muc.toLowerCase().includes(kw) ||
                (c.children && c.children.some(sub => sub.ten_danh_muc.toLowerCase().includes(kw) || sub.ma_danh_muc.toLowerCase().includes(kw)))
            );
        },
        otherCategories() {
            return this.categories.filter(c => c.id !== this.selectedCategory.id);
        }
    },
    created() {
        // Khởi tạo mục mặc định là danh mục 1
        if (this.categories.length > 0) {
            this.selectedCategory = JSON.parse(JSON.stringify(this.categories[0]));
        }
    },
    methods: {
        selectCategory(cat, parent = null) {
            this.selectedCategory = JSON.parse(JSON.stringify(cat));
            if (parent) {
                this.selectedCategory.parent_name = parent.ten_danh_muc;
            }
            // Update preview POIs depending on selected category
            if (cat.id === 2 || (cat.ma_danh_muc && cat.ma_danh_muc.includes('HERITAGE'))) {
                this.representativePois = [
                    { id: 201, name: 'Bảo tàng Điêu khắc Chăm', code: 'POI_CHAM_01', badge: 'Quốc gia', badgeColor: '#7C3AED', rating: '4.7', reviews: '1.5k', image: 'https://images.unsplash.com/photo-1566127444979-b3d2b654e3d7?auto=format&fit=crop&w=500&q=80' },
                    { id: 202, name: 'Thành Điện Hải Đà Nẵng', code: 'POI_DIENHAI_02', badge: 'Lịch sử', badgeColor: '#E11D48', rating: '4.6', reviews: '920', image: 'https://images.unsplash.com/photo-1583417319070-4a69db38a482?auto=format&fit=crop&w=500&q=80' },
                    { id: 203, name: 'Chùa Linh Ứng Bãi Bụt', code: 'POI_LINHUNG_03', badge: 'Tâm linh', badgeColor: '#0284C7', rating: '4.9', reviews: '4.2k', image: 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=500&q=80' }
                ];
            } else if (cat.id === 3 || (cat.ma_danh_muc && cat.ma_danh_muc.includes('FOOD'))) {
                this.representativePois = [
                    { id: 301, name: 'Mì Quảng Bà Mua Gia Truyền', code: 'POI_MUBAMUA_01', badge: 'Top 1 Ẩm thực', badgeColor: '#EA580C', rating: '4.8', reviews: '2.9k', image: 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=500&q=80' },
                    { id: 302, name: 'Bánh Tráng Cuốn Thịt Heo Đại Lộc', code: 'POI_BANHTRANG_02', badge: 'Đặc sản', badgeColor: '#E11D48', rating: '4.7', reviews: '1.4k', image: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=500&q=80' },
                    { id: 303, name: 'Hải Sản Bé Mặn Mỹ Khê', code: 'POI_BEMAN_03', badge: 'Hải sản tươi', badgeColor: '#0284C7', rating: '4.6', reviews: '3.8k', image: 'https://images.unsplash.com/photo-1534422298391-e4f8c172dddb?auto=format&fit=crop&w=500&q=80' }
                ];
            } else {
                // Giữ lại 3 POIs tự nhiên mặc định
                this.representativePois = [
                    { id: 101, name: 'Đèo Hải Vân & Hải Vân Quan', code: 'POI_HV_01', badge: 'Độc đáo #1', badgeColor: '#E11D48', rating: '4.8', reviews: '1.8k', image: 'https://images.unsplash.com/photo-1596401057633-54a8fe8ef647?auto=format&fit=crop&w=500&q=80' },
                    { id: 102, name: 'Bán đảo Sơn Trà & Bãi Đá', code: 'POI_ST_04', badge: 'Sinh thái', badgeColor: '#06B6D4', rating: '4.8', reviews: '2.4k', image: 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=500&q=80' },
                    { id: 103, name: 'Quần thể Ngũ Hành Sơn', code: 'POI_NHS_02', badge: 'Hang động', badgeColor: '#0284C7', rating: '4.7', reviews: '3.1k', image: 'https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=500&q=80' }
                ];
            }
        },

        toggleExpand(cat) {
            cat.expanded = !cat.expanded;
        },

        toggleExpandAll() {
            this.isAllExpanded = !this.isAllExpanded;
            this.categories.forEach(c => {
                c.expanded = this.isAllExpanded;
            });
        },

        luuThayDoi() {
            const idx = this.categories.findIndex(c => c.id === this.selectedCategory.id);
            if (idx !== -1) {
                this.categories[idx] = { ...this.categories[idx], ...this.selectedCategory };
            }
            alert(`Đã lưu thành công các thay đổi cho danh mục: ${this.selectedCategory.ten_danh_muc}`);
        },

        resetForm() {
            const original = this.categories.find(c => c.id === this.selectedCategory.id);
            if (original) {
                this.selectedCategory = JSON.parse(JSON.stringify(original));
            }
        },

        xoaDanhMuc() {
            if (confirm(`Bạn có chắc chắn muốn xóa danh mục "${this.selectedCategory.ten_danh_muc}" và giải phóng các POI liên quan?`)) {
                this.categories = this.categories.filter(c => c.id !== this.selectedCategory.id);
                if (this.categories.length > 0) {
                    this.selectCategory(this.categories[0]);
                }
                alert('Đã xóa danh mục thành công!');
            }
        },

        dongTamThoi() {
            this.selectedCategory.status = this.selectedCategory.status === 'active' ? 'paused' : 'active';
            alert(`Đã chuyển trạng thái danh mục thành: ${this.selectedCategory.status === 'active' ? 'Đang hoạt động' : 'Tạm dừng'}`);
        },

        doiTepTin() {
            alert('Mở hộp thoại chọn tệp SVG / PNG biểu tượng nhận diện...');
        },

        xoaTepTin() {
            if (confirm('Xóa biểu tượng SVG hiện tại và chuyển về mặc định?')) {
                this.selectedCategory.svg_filename = 'danang_default_symbol.svg';
            }
        },

        xuatCayPhanLoai() {
            const dataStr = 'data:text/json;charset=utf-8,' + encodeURIComponent(JSON.stringify(this.categories, null, 2));
            const dlAnchorElem = document.createElement('a');
            dlAnchorElem.setAttribute('href', dataStr);
            dlAnchorElem.setAttribute('download', 'cay_danh_muc_danang_poi.json');
            dlAnchorElem.click();
        },

        openModalThemDanhMuc() {
            this.newCategory = {
                parent_id: '',
                ma_danh_muc: `CAT_NEW_${Date.now().toString().slice(-4)}`,
                ten_danh_muc: '',
                icon: 'bx bx-map',
                thu_tu: this.categories.length + 1,
                ai_weight: 0.85,
                mo_ta: ''
            };
            this.showModalThem = true;
        },

        submitThemDanhMuc() {
            if (!this.newCategory.ten_danh_muc.trim() || !this.newCategory.ma_danh_muc.trim()) {
                alert('Vui lòng nhập đầy đủ Mã và Tên danh mục!');
                return;
            }

            if (this.newCategory.parent_id) {
                const parent = this.categories.find(c => c.id === this.newCategory.parent_id);
                if (parent) {
                    if (!parent.children) parent.children = [];
                    parent.children.push({
                        id: Date.now(),
                        ten_danh_muc: this.newCategory.ten_danh_muc,
                        ma_danh_muc: this.newCategory.ma_danh_muc,
                        total_poi: 0,
                        thu_tu: this.newCategory.thu_tu,
                        ai_weight: this.newCategory.ai_weight,
                        level_label: 'Cấp 2 - Tiểu mục'
                    });
                    parent.expanded = true;
                }
            } else {
                const newCat = {
                    id: Date.now(),
                    id_str: `cat_danang_0${this.categories.length + 1}`,
                    level_label: 'Cấp 1 - Gốc',
                    ma_danh_muc: this.newCategory.ma_danh_muc,
                    ten_danh_muc: this.newCategory.ten_danh_muc,
                    status: 'active',
                    total_poi: 0,
                    icon: this.newCategory.icon || 'bx bx-landscape',
                    icon_key: 'custom',
                    color: '#E11D48',
                    thu_tu: this.newCategory.thu_tu,
                    ai_weight: this.newCategory.ai_weight,
                    svg_filename: `${this.newCategory.ma_danh_muc.toLowerCase()}_symbol.svg`,
                    mo_ta: this.newCategory.mo_ta || 'Danh mục POI mới tạo trên SmartTrip AI.',
                    expanded: false,
                    children: []
                };
                this.categories.push(newCat);
                this.selectCategory(newCat);
            }

            this.showModalThem = false;
            alert('Tạo danh mục mới thành công!');
        },

        openModalSapXep() {
            alert('Tính năng kéo thả sắp xếp (Drag & Drop Taxonomy Tree) đã sẵn sàng hoạt động.');
        },

        openModalGopDanhMuc() {
            this.showModalGop = true;
        },

        submitGopDanhMuc() {
            const target = this.categories.find(c => c.id === this.targetMergeId);
            if (target) {
                target.total_poi += this.selectedCategory.total_poi;
                this.categories = this.categories.filter(c => c.id !== this.selectedCategory.id);
                this.selectCategory(target);
                this.showModalGop = false;
                alert(`Đã gộp thành công vào danh mục "${target.ten_danh_muc}"!`);
            }
        },

        openModalChuyenPoi() {
            this.showModalChuyen = true;
        },

        submitChuyenPoi() {
            const target = this.categories.find(c => c.id === this.targetTransferId);
            if (target) {
                target.total_poi += this.selectedCategory.total_poi;
                this.selectedCategory.total_poi = 0;
                this.showModalChuyen = false;
                alert(`Đã chuyển toàn bộ POI sang danh mục "${target.ten_danh_muc}"!`);
            }
        },

        xemBaoCaoTyTrong() {
            alert('Đang mở báo cáo phân bổ tỷ trọng POI chi tiết theo 7 quận huyện và danh mục.');
        },

        chayKiemTraNguNghia() {
            this.isCheckingSemantics = true;
            setTimeout(() => {
                this.isCheckingSemantics = false;
                alert('Kiểm tra ngữ nghĩa ontology hoàn tất! Cây danh mục đạt 98.4% độ chuẩn hóa, không phát hiện trùng lặp ontology.');
            }, 1200);
        }
    }
};
</script>

<style scoped>
.category-taxonomy-page {
    background-color: #F8FAFC;
    min-height: 100vh;
}

.font-24 { font-size: 24px; }
.font-20 { font-size: 20px; }
.font-18 { font-size: 18px; }
.font-16 { font-size: 16px; }
.font-15 { font-size: 15px; }
.font-14 { font-size: 14px; }
.font-13 { font-size: 13px; }
.font-12 { font-size: 12px; }
.font-11 { font-size: 11px; }
.font-10 { font-size: 10px; }
.font-9 { font-size: 9px; }

.font-mono {
    font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, Courier, monospace;
}

.text-pink { color: #E11D48 !important; }
.text-purple { color: #7C3AED !important; }
.text-cyan { color: #0284C7 !important; }

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

.dot-cyan {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #0284C7;
    display: inline-block;
}

.dot-sm {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

.btn-pink-gradient {
    background: linear-gradient(135deg, #E11D48 0%, #BE123C 100%);
    border: none;
    transition: all 0.2s ease;
}

.btn-pink-gradient:hover {
    opacity: 0.92;
    transform: translateY(-1px);
}

.cursor-pointer { cursor: pointer; }
.cursor-grab { cursor: grab; }

.selected-node {
    border-color: #FDA4AF !important;
}

.tree-bullet-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
}

.sub-tree-container {
    border-left: 2px dashed #FECDD3;
    margin-left: 24px;
}

.sub-tree-node {
    cursor: pointer;
}

.sub-tree-node:hover {
    background-color: #FFF1F2;
}

.sub-selected {
    background-color: #FFF1F2;
    font-weight: 600;
}

.custom-pink-range {
    accent-color: #E11D48;
}

.custom-pink-range::-webkit-slider-thumb {
    background-color: #E11D48;
}

.poi-preview-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08) !important;
}

/* Modals */
.custom-modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(15, 23, 42, 0.55);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    backdrop-filter: blur(2px);
}

.custom-modal-content {
    animation: modalScaleIn 0.2s ease-out;
}

@keyframes modalScaleIn {
    from { transform: scale(0.95); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.transition-all {
    transition: all 0.2s ease;
}
</style>
