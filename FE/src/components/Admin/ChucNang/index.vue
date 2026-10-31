<template>
    <div class="chuc-nang-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">RBAC DYNAMIC ARCHITECTURE v2.4</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">
                    Quản Lý Danh Mục Chức Năng Hệ Thống 
                    <span class="text-muted fw-normal">|</span> 
                    <span style="color: #E11D48;">Module Catalog</span>
                </h2>
                <p class="text-muted font-13 mb-0" style="max-width: 860px;">
                    Khai báo, giám sát thực thể <code class="badge-code">chuc_nang</code>, 
                    đồng bộ ma trận quan hệ <code class="badge-code">chuc_vu_chuc_nang</code> 
                    và tự động mapping phân quyền động tới các bộ điều khiển Controller & RESTful API Gateway của hệ sinh thái SmartTrip AI Đà Nẵng.
                </p>
            </div>
            
            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-xs d-flex align-items-center gap-2" @click="taiQuetRoute">
                    <i class="bx bx-scan text-purple font-16"></i>
                    <span>Tải Quét Route & API</span>
                </button>
                <button class="btn rounded-pill px-3 py-2 font-12 fw-semibold shadow-xs d-flex align-items-center gap-2" style="background-color: #E0F2FE; color: #0284C7; border: 1px solid #BAE6FD;" @click="dongBoMaTran">
                    <i class="bx bx-refresh font-16" :class="{ 'bx-spin': isSyncing }"></i>
                    <span>Đồng Bộ Ma Trận Phân Quyền</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-xs d-flex align-items-center gap-1" @click="openModalThemChucNang">
                    <i class="bx bx-plus font-16"></i>
                    <span>+ Khai Báo Chức Năng Mới</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Tổng Chức Năng -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TỔNG CHỨC NĂNG</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">38</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-1" style="background-color: #FDF2F8; color: #E11D48;">
                                    100% Khả Dụng
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 44px; height: 44px;">
                            <i class="bx bx-grid-alt font-22" style="color: #E11D48;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Nhóm Module Nghiệp Vụ -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">NHÓM MODULE NGHIỆP VỤ</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">6</span>
                                <span class="text-muted font-12 fw-medium">Core, AI, KYC, GIS...</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 44px; height: 44px;">
                            <i class="bx bx-folder font-22" style="color: #7C3AED;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 3: Ánh Xạ Endpoints -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ÁNH XẠ ENDPOINTS</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">100%</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-1" style="background-color: #E0F2FE; color: #0284C7;">
                                    142 REST APIs
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F0F9FF; width: 44px; height: 44px;">
                            <i class="bx bx-code-alt font-22" style="color: #0284C7;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 4: Vai Trò Đang Gán -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">VAI TRÒ ĐANG GÁN</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">8</span>
                                <span class="text-muted font-12 fw-medium">Thực thể <code class="badge-code">chuc_vu</code></span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 44px; height: 44px;">
                            <i class="bx bx-id-card font-22" style="color: #E11D48;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Filter Tabs & Filter Input -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <!-- Filter Pills -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-bold transition-all"
                    :class="activeFilterModule === '' ? 'bg-pink text-white shadow-xs' : 'bg-white border text-secondary'"
                    @click="activeFilterModule = ''">
                    Tất cả Module <span class="badge rounded-pill bg-white text-dark ms-1" v-if="activeFilterModule === ''">38</span>
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-medium bg-white border text-secondary d-flex align-items-center gap-1.5"
                    :class="{ 'border-pink text-pink fw-bold': activeFilterModule === 'AI Engine' }"
                    @click="activeFilterModule = activeFilterModule === 'AI Engine' ? '' : 'AI Engine'">
                    <span class="dot-sm" style="background-color: #E11D48;"></span> Lập kế hoạch AI
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-medium bg-white border text-secondary d-flex align-items-center gap-1.5"
                    :class="{ 'border-pink text-pink fw-bold': activeFilterModule === 'Quản lý Tour' }"
                    @click="activeFilterModule = activeFilterModule === 'Quản lý Tour' ? '' : 'Quản lý Tour'">
                    <span class="dot-sm" style="background-color: #7C3AED;"></span> Quản lý Tour
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-medium bg-white border text-secondary d-flex align-items-center gap-1.5"
                    :class="{ 'border-pink text-pink fw-bold': activeFilterModule === 'POI & GIS' }"
                    @click="activeFilterModule = activeFilterModule === 'POI & GIS' ? '' : 'POI & GIS'">
                    <span class="dot-sm" style="background-color: #0284C7;"></span> Quản lý POI & GIS
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-medium bg-white border text-secondary d-flex align-items-center gap-1.5"
                    :class="{ 'border-pink text-pink fw-bold': activeFilterModule === 'Tài chính' }"
                    @click="activeFilterModule = activeFilterModule === 'Tài chính' ? '' : 'Tài chính'">
                    <span class="dot-sm" style="background-color: #8B5CF6;"></span> Tài chính
                </button>
            </div>

            <!-- Search Input Right -->
            <div class="search-box position-relative" style="min-width: 280px;">
                <i class="bx bx-filter position-absolute top-50 translate-middle-y text-muted font-16" style="left: 12px;"></i>
                <input type="text" 
                    class="form-control form-control-sm rounded-pill ps-4 pe-3 font-12 bg-white border-light-subtle shadow-xs"
                    placeholder="Lọc theo mã, tên hoặc route..." 
                    v-model="searchKeyword" />
            </div>
        </div>

        <!-- Master Table Card -->
        <div class="card border-0 rounded-4 shadow-xs bg-white mb-4 overflow-hidden">
            <!-- Table Header Bar -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 px-4 border-bottom bg-white">
                <div class="d-flex align-items-center gap-2">
                    <span class="pulse-dot-pink"></span>
                    <span class="fw-bold text-dark font-14">Danh Sách Thực Thể Chức Năng Cơ Sở (<code>chuc_nang</code>)</span>
                    <span class="badge rounded-pill font-11 fw-medium px-2 py-0.5 text-secondary" style="background-color: #F1F5F9;">
                        Đang hiển thị {{ pagedChucNangs.length }} / {{ filteredChucNangs.length }} chức năng
                    </span>
                </div>
                <div class="d-flex align-items-center gap-2 font-12 text-muted">
                    <span>Sắp xếp:</span>
                    <select class="form-select form-select-sm w-auto font-12 py-1 ps-2 pe-4 rounded-3 border-light-subtle" v-model="sortBy">
                        <option value="newest">Mới nhất</option>
                        <option value="name">Tên A-Z</option>
                        <option value="module">Theo module</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
                        <tr class="font-11 text-muted text-uppercase tracking-wider">
                            <th class="ps-4 py-3" style="min-width: 250px;">MÃ & TÊN CHỨC NĂNG</th>
                            <th class="py-3" style="min-width: 130px;">NHÓM MODULE</th>
                            <th class="py-3" style="min-width: 320px;">MÔ TẢ NGHIỆP VỤ & API ENDPOINT</th>
                            <th class="py-3" style="min-width: 170px;">QUYỀN HẠN CON (PERMISSIONS)</th>
                            <th class="py-3" style="min-width: 170px;">CHỨC VỤ ĐANG ÁP DỤNG</th>
                            <th class="py-3 pe-4 text-center" style="min-width: 100px;">TRẠNG THÁI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in pagedChucNangs" :key="item.id">
                            <!-- Col 1: Mã & Tên chức năng -->
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="func-icon-box rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" :style="{ backgroundColor: item.iconBg, color: item.iconColor }">
                                        <i :class="item.icon" class="font-20"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark font-13 mb-1 cursor-pointer hover-pink" @click="editChucNang(item)">
                                            {{ item.ten_chuc_nang }}
                                        </div>
                                        <span class="badge-func-code font-10 fw-bold font-monospace">
                                            {{ item.ma_chuc_nang }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <!-- Col 2: Nhóm Module -->
                            <td class="py-3">
                                <span class="badge rounded-pill font-11 fw-semibold px-2-5 py-1" :style="{ backgroundColor: item.moduleBg, color: item.moduleColor }">
                                    {{ item.nhom_module }}
                                </span>
                            </td>

                            <!-- Col 3: Mô tả nghiệp vụ & API Endpoint -->
                            <td class="py-3">
                                <div class="d-flex flex-column gap-1.5">
                                    <div class="font-12 text-secondary text-truncate-2" style="max-width: 360px;">
                                        {{ item.mo_ta }}
                                    </div>
                                    <div class="d-flex align-items-center gap-1.5 font-11 font-monospace">
                                        <span class="badge-http-method font-10 fw-bold" :class="'method-' + item.http_method.toLowerCase()">
                                            {{ item.http_method }}
                                        </span>
                                        <span class="text-muted text-truncate" style="max-width: 280px;">
                                            {{ item.api_endpoint }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <!-- Col 4: Quyền hạn con (Permissions) -->
                            <td class="py-3">
                                <div class="d-flex flex-wrap gap-1">
                                    <span v-for="perm in item.permissions" :key="perm" class="badge-perm font-11 fw-medium" :class="'perm-' + perm.toLowerCase()">
                                        {{ perm }}
                                    </span>
                                </div>
                            </td>

                            <!-- Col 5: Chức vụ đang áp dụng -->
                            <td class="py-3">
                                <div class="d-flex flex-column gap-0.5">
                                    <div class="fw-bold text-dark font-12">{{ item.roles[0] }}</div>
                                    <div v-for="subRole in item.roles.slice(1)" :key="subRole" class="text-muted font-11">
                                        {{ subRole }}
                                    </div>
                                </div>
                            </td>

                            <!-- Col 6: Trạng thái -->
                            <td class="py-3 pe-4 text-center">
                                <span v-if="item.trang_thai === 1" class="badge-status-active font-11 fw-semibold">
                                    Kích hoạt
                                </span>
                                <span v-else class="badge-status-inactive font-11 fw-semibold">
                                    Tạm dừng
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Bottom Pagination -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3 px-4 border-top font-12">
                <div class="d-flex align-items-center gap-2 text-muted">
                    <span>Hiển thị</span>
                    <select class="form-select form-select-sm w-auto font-12 py-0.5 ps-2 pe-4 rounded-3 border-light-subtle" v-model="pageSize">
                        <option :value="6">6 bản ghi</option>
                        <option :value="10">10 bản ghi</option>
                        <option :value="20">20 bản ghi</option>
                    </select>
                    <span>trên tổng số <b>{{ filteredChucNangs.length }}</b> modules đã lập chỉ mục RBAC</span>
                </div>

                <!-- Pagination Buttons -->
                <div class="d-flex align-items-center gap-1">
                    <button class="btn btn-sm btn-icon-round text-muted" :disabled="currentPage === 1" @click="currentPage--">
                        <i class="bx bx-chevron-left font-18"></i>
                    </button>
                    <button class="btn btn-sm pagination-circle-btn active" @click="currentPage = 1">
                        1
                    </button>
                    <button class="btn btn-sm pagination-circle-btn" @click="currentPage = 2">
                        2
                    </button>
                    <button class="btn btn-sm pagination-circle-btn" @click="currentPage = 3">
                        3
                    </button>
                    <button class="btn btn-sm btn-icon-round text-muted" :disabled="currentPage >= totalPages" @click="currentPage++">
                        <i class="bx bx-chevron-right font-18"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Bottom Section: Schema Preview & API Gateway Status -->
        <div class="row g-3">
            <!-- Left Card: Cấu Trúc Quan Hệ Bảng RBAC (Schema Preview) -->
            <div class="col-12 col-lg-8">
                <div class="card border-0 rounded-4 shadow-xs bg-white h-100 p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bx bx-git-repo-forked font-20" style="color: #E11D48;"></i>
                            <h6 class="fw-bold text-dark font-14 mb-0">Cấu Trúc Quan Hệ Bảng RBAC (Schema Preview)</h6>
                        </div>
                        <span class="badge rounded-pill font-11 fw-semibold px-2-5 py-1" style="background-color: #EDE9FE; color: #7C3AED;">
                            PostgreSQL 16
                        </span>
                    </div>
                    <p class="text-muted font-12 mb-3">
                        Mỗi hành động trong hệ thống đều đi qua middleware kiểm tra chéo giữa bảng 
                        <code class="text-danger fw-bold">chuc_vu_chuc_nang</code> 
                        với khóa phụ cấp quyền 
                        <code class="badge-code font-11">can_view, can_create, can_edit, can_delete, can_approve</code>.
                    </p>

                    <!-- Visual ER Flow Box -->
                    <div class="er-flow-container p-3 rounded-3 border bg-light d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <!-- Source Table: chuc_vu -->
                        <div class="er-box p-2-5 px-3 rounded-3 bg-white border text-center shadow-xs flex-grow-1">
                            <span class="font-10 text-muted fw-bold text-uppercase d-block mb-0.5">BẢNG NGUỒN</span>
                            <span class="font-13 fw-bold text-dark d-block">chuc_vu</span>
                            <small class="text-muted font-11">8 Vai trò quản trị</small>
                        </div>

                        <!-- Connector 1 -->
                        <div class="d-flex flex-column align-items-center px-1">
                            <span class="badge rounded-pill font-10 px-2 py-0.5 mb-1 text-purple" style="background-color: #F5F3FF;">
                                N-N Mapping
                            </span>
                            <i class="bx bx-transfer font-18 text-muted"></i>
                        </div>

                        <!-- Junction Table: chuc_vu_chuc_nang -->
                        <div class="er-box p-2-5 px-3 rounded-3 border text-center shadow-xs flex-grow-1" style="background-color: #FDF2F8; border-color: #FCE7F3 !important;">
                            <span class="font-10 fw-bold text-uppercase d-block mb-0.5" style="color: #E11D48;">BẢNG TRUNG GIAN</span>
                            <span class="font-13 fw-bold text-dark d-block">chuc_vu_chuc_nang</span>
                            <small class="font-11" style="color: #E11D48;">184 Cấp phân quyền</small>
                        </div>

                        <!-- Connector 2 -->
                        <div class="d-flex align-items-center px-1">
                            <i class="bx bx-right-arrow-alt font-22 text-muted"></i>
                        </div>

                        <!-- Target Table: chuc_nang -->
                        <div class="er-box p-2-5 px-3 rounded-3 bg-white border text-center shadow-xs flex-grow-1">
                            <span class="font-10 text-muted fw-bold text-uppercase d-block mb-0.5" style="color: #0284C7;">BẢNG DANH MỤC</span>
                            <span class="font-13 fw-bold text-dark d-block">chuc_nang</span>
                            <small class="text-muted font-11">38 Chức năng lõi</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Card: Trạng Thái API Gateway -->
            <div class="col-12 col-lg-4">
                <div class="card border-0 rounded-4 shadow-xs bg-white h-100 p-3 p-md-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="fw-bold text-dark font-14 mb-0">Trạng Thái API Gateway</h6>
                            <span class="pulse-dot-pink"></span>
                        </div>
                        <p class="text-muted font-11 mb-3">Đồng bộ với Kubernetes Ingress & Kong Gateway theo thời gian thực.</p>

                        <!-- Metric 1: Redis Cache Latency -->
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom font-12">
                            <span class="text-muted">Độ trễ ánh xạ RBAC Cache (Redis)</span>
                            <span class="fw-bold font-13" style="color: #E11D48;">1.2ms</span>
                        </div>

                        <!-- Metric 2: Token Guard Ratio -->
                        <div class="d-flex justify-content-between align-items-center py-2 font-12">
                            <span class="text-muted">Tỉ lệ Endpoints có Token Guard</span>
                            <span class="fw-bold font-13" style="color: #0284C7;">100% (142/142)</span>
                        </div>
                    </div>

                    <!-- Footer Info -->
                    <div class="pt-3 border-top d-flex justify-content-between align-items-center font-11 text-muted">
                        <span>Lần tái quét gần nhất: <b>14 phút trước</b></span>
                        <a href="javascript:void(0)" class="fw-semibold text-pink text-decoration-none" @click="viewLogs">
                            Chi tiết logs
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: KHAI BÁO / CHỈNH SỬA CHỨC NĂNG -->
        <div class="modal fade" id="modalChucNang" tabindex="-1" aria-hidden="true" ref="modalChucNang">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom p-3 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="icon-round bg-pink-subtle text-pink">
                                <i class="bx bx-layer font-20"></i>
                            </div>
                            <div>
                                <h5 class="modal-title fw-bold text-dark font-16 mb-0">{{ isEdit ? 'Chỉnh Sửa Chức Năng' : 'Khai Báo Chức Năng Hệ Thống' }}</h5>
                                <small class="text-muted font-11">Thực thể chuc_nang & ánh xạ API route</small>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="fw-bold mb-1">Mã Chức Năng (Unique Code) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13 font-monospace" v-model="form.ma_chuc_nang" placeholder="VD: FUNC_TOUR_APPROVE" />
                            </div>
                            <div class="col-md-7">
                                <label class="fw-bold mb-1">Tên Chức Năng Nghiệp Vụ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13" v-model="form.ten_chuc_nang" placeholder="VD: Kiểm Duyệt & Phê Duyệt Tour..." />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Nhóm Module <span class="text-danger">*</span></label>
                                <select class="form-select rounded-3 font-13" v-model="form.nhom_module">
                                    <option value="AI Engine">AI Engine</option>
                                    <option value="Quản lý Tour">Quản lý Tour</option>
                                    <option value="POI & GIS">POI & GIS</option>
                                    <option value="Người dùng">Người dùng</option>
                                    <option value="Tài chính">Tài chính</option>
                                    <option value="Bảo mật & Cấu hình">Bảo mật & Cấu hình</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">HTTP Method <span class="text-danger">*</span></label>
                                <select class="form-select rounded-3 font-13 font-monospace" v-model="form.http_method">
                                    <option value="GET">GET (Truy xuất dữ liệu)</option>
                                    <option value="POST">POST (Tạo mới / Thao tác)</option>
                                    <option value="PUT">PUT (Cập nhật toàn bộ)</option>
                                    <option value="PATCH">PATCH (Cập nhật một phần)</option>
                                    <option value="DELETE">DELETE (Xóa / Thu hồi)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold mb-1">API Endpoint Route <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13 font-monospace" v-model="form.api_endpoint" placeholder="/api/v1/admin/tours/{id}/verify-flow" />
                            </div>
                            <div class="col-12">
                                <label class="fw-bold mb-1">Mô Tả Nghiệp Vụ</label>
                                <textarea class="form-control rounded-3 font-13" rows="2" v-model="form.mo_ta" placeholder="Mô tả chức năng, đối tượng kiểm tra quyền hạn..."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Quyền Hạn Con (Permissions)</label>
                                <div class="d-flex flex-wrap gap-2 pt-1">
                                    <div class="form-check" v-for="p in ['Xem', 'Thêm', 'Sửa', 'Xóa', 'Duyệt']" :key="p">
                                        <input class="form-check-input" type="checkbox" :value="p" v-model="form.permissions" :id="'chk_' + p" />
                                        <label class="form-check-label font-12" :for="'chk_' + p">{{ p }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Trạng Thái Vận Hành</label>
                                <div class="form-check form-switch pt-1">
                                    <input class="form-check-input" type="checkbox" id="switchStatus" v-model="form.trang_thai" :true-value="1" :false-value="0" />
                                    <label class="form-check-label font-12" for="switchStatus">{{ form.trang_thai === 1 ? 'Kích hoạt' : 'Tạm dừng' }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 font-13" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-pink-gradient text-white rounded-pill px-4 font-13 fw-bold" @click="saveChucNang">
                            {{ isEdit ? 'Lưu Thay Đổi' : 'Tạo Chức Năng' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ChucNangComponent',
    data() {
        return {
            isSyncing: false,
            searchKeyword: '',
            activeFilterModule: '',
            sortBy: 'newest',
            pageSize: 6,
            currentPage: 1,

            // 6 dòng chức năng khớp 100% hình ảnh media_1793378174427_5678298a.png
            chucNangs: [
                {
                    id: 1,
                    ma_chuc_nang: 'FUNC_AI_TUNING',
                    ten_chuc_nang: 'Cấu hình Thuật toán Lịch trình AI',
                    nhom_module: 'AI Engine',
                    moduleBg: '#FDF2F8',
                    moduleColor: '#E11D48',
                    mo_ta: 'Điều chỉnh trọng số tối ưu tuyến đường, bán kính đề xuất địa điểm ăn uống/nghỉ ngơi the...',
                    http_method: 'PATCH',
                    api_endpoint: '/api/v1/admin/ai/weights/config',
                    icon: 'bx bx-chip',
                    iconBg: '#FDF2F8',
                    iconColor: '#E11D48',
                    permissions: ['Xem', 'Sửa', 'Duyệt'],
                    roles: ['Super Admin', 'AI Engineer'],
                    trang_thai: 1
                },
                {
                    id: 2,
                    ma_chuc_nang: 'FUNC_TOUR_APPROVE',
                    ten_chuc_nang: 'Kiểm Duyệt & Phê Duyệt Tour Du Lịch',
                    nhom_module: 'Quản lý Tour',
                    moduleBg: '#F5F3FF',
                    moduleColor: '#7C3AED',
                    mo_ta: 'Đánh giá chất lượng, định giá và kiểm tra pháp lý giấy phép lữ hành quốc tế của các...',
                    http_method: 'POST',
                    api_endpoint: '/api/v1/admin/tours/{id}/verify-flow',
                    icon: 'bx bx-check-shield',
                    iconBg: '#F5F3FF',
                    iconColor: '#7C3AED',
                    permissions: ['Xem', 'Sửa', 'Xóa', 'Duyệt'],
                    roles: ['Super Admin', 'Trưởng Ban Duyệt Tour'],
                    trang_thai: 1
                },
                {
                    id: 3,
                    ma_chuc_nang: 'FUNC_POI_EDIT',
                    ten_chuc_nang: 'Biên Tập & Chuẩn Hóa Tọa Độ POI',
                    nhom_module: 'POI & GIS',
                    moduleBg: '#E0F2FE',
                    moduleColor: '#0284C7',
                    mo_ta: 'Chỉnh sửa thông tin địa lý, gắn thẻ sở thích (Check-in, Ẩm thực đêm, Di tích lịch sử), và...',
                    http_method: 'PUT',
                    api_endpoint: '/api/v1/admin/geo-places/{id}',
                    icon: 'bx bx-edit-location',
                    iconBg: '#E0F2FE',
                    iconColor: '#0284C7',
                    permissions: ['Xem', 'Thêm', 'Sửa'],
                    roles: ['Super Admin', 'Chuyên Viên Dữ Liệu', 'Cộng Tác Viên Nội Dung'],
                    trang_thai: 1
                },
                {
                    id: 4,
                    ma_chuc_nang: 'FUNC_USER_BAN',
                    ten_chuc_nang: 'Khóa & Xử Lý Vi Phạm Tài Khoản',
                    nhom_module: 'Người dùng',
                    moduleBg: '#FDF2F8',
                    moduleColor: '#E11D48',
                    mo_ta: 'Chặn phiên truy cập, đóng băng số dư ví voucher, thu hồi token xác thực JWT đối vớ...',
                    http_method: 'DELETE',
                    api_endpoint: '/api/v1/admin/users/{id}/sessions',
                    icon: 'bx bx-user-x',
                    iconBg: '#FDF2F8',
                    iconColor: '#E11D48',
                    permissions: ['Xem', 'Xóa', 'Duyệt'],
                    roles: ['Super Admin', 'Trưởng Bộ Phận An Ninh'],
                    trang_thai: 1
                },
                {
                    id: 5,
                    ma_chuc_nang: 'FUNC_PAY_RECONCILE',
                    ten_chuc_nang: 'Đối Soát Doanh Thu Đối Tác Booking',
                    nhom_module: 'Tài chính',
                    moduleBg: '#F5F3FF',
                    moduleColor: '#7C3AED',
                    mo_ta: 'Tự động tính chiết khấu hoa hồng 8 - 12%, xuất ủy nhiệm chi và chốt sổ ký thanh toán ngày 1...',
                    http_method: 'POST',
                    api_endpoint: '/api/v1/admin/finance/settlements',
                    icon: 'bx bx-credit-card',
                    iconBg: '#F5F3FF',
                    iconColor: '#7C3AED',
                    permissions: ['Xem', 'Sửa', 'Duyệt'],
                    roles: ['Kế Toán Trưởng', 'Kiểm Soát Viên Thuế'],
                    trang_thai: 1
                },
                {
                    id: 6,
                    ma_chuc_nang: 'FUNC_VOUCHER_BATCH',
                    ten_chuc_nang: 'Phát Hành Voucher Sàn Hàng Loạt',
                    nhom_module: 'Tài chính',
                    moduleBg: '#F5F3FF',
                    moduleColor: '#7C3AED',
                    mo_ta: 'Tạo mã giảm giá ưu đãi sự kiện Lễ hội Pháo hoa DIFF Đà Nẵng, áp dụng đồng loạt cho tour d...',
                    http_method: 'POST',
                    api_endpoint: '/api/v1/admin/campaigns/vouchers',
                    icon: 'bx bx-coupon',
                    iconBg: '#F1F5F9',
                    iconColor: '#64748B',
                    permissions: ['Xem', 'Thêm'],
                    roles: ['Marketing Lead'],
                    trang_thai: 0
                }
            ],

            isEdit: false,
            form: {
                id: null,
                ma_chuc_nang: '',
                ten_chuc_nang: '',
                nhom_module: 'AI Engine',
                http_method: 'POST',
                api_endpoint: '',
                mo_ta: '',
                permissions: ['Xem'],
                trang_thai: 1
            },
            modalInstance: null
        };
    },
    computed: {
        filteredChucNangs() {
            return this.chucNangs.filter(item => {
                const matchKeyword = !this.searchKeyword ||
                    item.ten_chuc_nang.toLowerCase().includes(this.searchKeyword.toLowerCase()) ||
                    item.ma_chuc_nang.toLowerCase().includes(this.searchKeyword.toLowerCase()) ||
                    item.api_endpoint.toLowerCase().includes(this.searchKeyword.toLowerCase());

                const matchModule = !this.activeFilterModule || item.nhom_module === this.activeFilterModule;

                return matchKeyword && matchModule;
            });
        },
        pagedChucNangs() {
            const start = (this.currentPage - 1) * this.pageSize;
            return this.filteredChucNangs.slice(start, start + this.pageSize);
        },
        totalPages() {
            return Math.ceil(this.filteredChucNangs.length / this.pageSize) || 1;
        }
    },
    mounted() {
        if (window.bootstrap) {
            this.modalInstance = new window.bootstrap.Modal(this.$refs.modalChucNang);
        }
    },
    methods: {
        taiQuetRoute() {
            alert('Đang tải và quét cấu trúc Router & Controller trong thư mục Backend (Laravel)... Đã quét thấy 142 API Endpoints hợp lệ.');
        },
        dongBoMaTran() {
            this.isSyncing = true;
            setTimeout(() => {
                this.isSyncing = false;
                alert('Đã đồng bộ thành công ma trận bảng chuc_vu_chuc_nang với Redis RBAC Cache (Độ trễ 1.2ms)!');
            }, 1000);
        },
        openModalThemChucNang() {
            this.isEdit = false;
            this.form = {
                id: null,
                ma_chuc_nang: 'FUNC_',
                ten_chuc_nang: '',
                nhom_module: 'AI Engine',
                http_method: 'POST',
                api_endpoint: '/api/v1/admin/',
                mo_ta: '',
                permissions: ['Xem'],
                trang_thai: 1
            };
            if (this.modalInstance) this.modalInstance.show();
        },
        editChucNang(item) {
            this.isEdit = true;
            this.form = {
                id: item.id,
                ma_chuc_nang: item.ma_chuc_nang,
                ten_chuc_nang: item.ten_chuc_nang,
                nhom_module: item.nhom_module,
                http_method: item.http_method,
                api_endpoint: item.api_endpoint,
                mo_ta: item.mo_ta,
                permissions: [...item.permissions],
                trang_thai: item.trang_thai
            };
            if (this.modalInstance) this.modalInstance.show();
        },
        saveChucNang() {
            if (!this.form.ma_chuc_nang || !this.form.ten_chuc_nang || !this.form.api_endpoint) {
                alert('Vui lòng điền đầy đủ các trường bắt buộc!');
                return;
            }

            if (this.isEdit) {
                const item = this.chucNangs.find(c => c.id === this.form.id);
                if (item) {
                    item.ma_chuc_nang = this.form.ma_chuc_nang;
                    item.ten_chuc_nang = this.form.ten_chuc_nang;
                    item.nhom_module = this.form.nhom_module;
                    item.http_method = this.form.http_method;
                    item.api_endpoint = this.form.api_endpoint;
                    item.mo_ta = this.form.mo_ta;
                    item.permissions = this.form.permissions;
                    item.trang_thai = this.form.trang_thai;
                }
            } else {
                this.chucNangs.unshift({
                    id: Date.now(),
                    ma_chuc_nang: this.form.ma_chuc_nang,
                    ten_chuc_nang: this.form.ten_chuc_nang,
                    nhom_module: this.form.nhom_module,
                    moduleBg: '#FDF2F8',
                    moduleColor: '#E11D48',
                    mo_ta: this.form.mo_ta,
                    http_method: this.form.http_method,
                    api_endpoint: this.form.api_endpoint,
                    icon: 'bx bx-layer',
                    iconBg: '#FDF2F8',
                    iconColor: '#E11D48',
                    permissions: this.form.permissions,
                    roles: ['Super Admin'],
                    trang_thai: this.form.trang_thai
                });
            }

            if (this.modalInstance) this.modalInstance.hide();
            alert('Lưu chức năng thành công!');
        },
        viewLogs() {
            alert('Redis RBAC Cache Log: HIT 99.8% • Ingress Kong Gateway synced: 142/142 routes.');
        }
    }
};
</script>

<style scoped>
.chuc-nang-page {
    background-color: #F8FAFC;
    min-height: 100vh;
}

/* Colors & Buttons */
.text-pink {
    color: #E11D48 !important;
}
.bg-pink {
    background-color: #E11D48 !important;
}
.bg-pink-subtle {
    background-color: #FFF1F2 !important;
}
.border-pink-subtle {
    border-color: #FCE7F3 !important;
}
.border-pink {
    border-color: #E11D48 !important;
}
.hover-pink:hover {
    color: #E11D48 !important;
}

.btn-pink-gradient {
    background: linear-gradient(135deg, #E11D48 0%, #BE123C 100%);
    border: none;
    transition: all 0.2s ease;
}
.btn-pink-gradient:hover {
    background: linear-gradient(135deg, #BE123C 0%, #9F1239 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.25);
}

/* Dots */
.pulse-dot-pink {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
    box-shadow: 0 0 0 2px rgba(225, 29, 72, 0.2);
}
.dot-sm {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    display: inline-block;
}

/* Code & Badges */
.badge-code {
    background-color: #F8FAFC;
    color: #E11D48;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 11px;
    border: 1px solid #F1F5F9;
}
.badge-func-code {
    color: #E11D48;
    background-color: #FFF1F2;
    padding: 1px 6px;
    border-radius: 4px;
    border: 1px dashed #FDA4AF;
}

/* HTTP Method Badges */
.badge-http-method {
    padding: 1px 5px;
    border-radius: 4px;
}
.method-get { background-color: #E0F2FE; color: #0369A1; }
.method-post { background-color: #DCFCE7; color: #15803D; }
.method-put { background-color: #FEF3C7; color: #B45309; }
.method-patch { background-color: #EDE9FE; color: #6D28D9; }
.method-delete { background-color: #FEE2E2; color: #B91C1C; }

/* Permissions Badges */
.badge-perm {
    padding: 1px 6px;
    border-radius: 4px;
    border: 1px solid transparent;
}
.perm-xem { background-color: #E0F2FE; color: #0284C7; }
.perm-thêm { background-color: #F0FDF4; color: #16A34A; }
.perm-sửa { background-color: #F5F3FF; color: #7C3AED; }
.perm-xóa { background-color: #FEF2F2; color: #DC2626; }
.perm-duyệt { background-color: #FFF1F2; color: #E11D48; }

/* Status Badges */
.badge-status-active {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 9999px;
    background-color: #FFF1F2;
    color: #E11D48;
    border: 1px solid #FDA4AF;
}
.badge-status-inactive {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 9999px;
    background-color: #F1F5F9;
    color: #64748B;
    border: 1px solid #E2E8F0;
}

/* Icon Boxes */
.func-icon-box {
    width: 38px;
    height: 38px;
}
.icon-round {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Pagination */
.pagination-circle-btn {
    width: 32px;
    height: 32px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 1px solid #E2E8F0;
    color: #475569;
    font-weight: 600;
    font-size: 12px;
    background-color: #FFFFFF;
}
.pagination-circle-btn.active {
    background-color: #E11D48 !important;
    border-color: #E11D48 !important;
    color: #FFFFFF !important;
}

.btn-icon-round {
    width: 30px;
    height: 30px;
    padding: 0;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: transparent;
    border: 1px solid transparent;
}
.btn-icon-round:hover {
    background-color: #F1F5F9;
}

/* ER Box */
.er-box {
    min-width: 130px;
}

/* Utility Font Sizes */
.font-10 { font-size: 10px; }
.font-11 { font-size: 11px; }
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.font-14 { font-size: 14px; }
.font-16 { font-size: 16px; }
.font-18 { font-size: 18px; }
.font-20 { font-size: 20px; }
.font-22 { font-size: 22px; }
.font-24 { font-size: 24px; }
.font-28 { font-size: 28px; }

.px-2-5 { padding-left: 10px; padding-right: 10px; }
.py-1-5 { padding-top: 6px; padding-bottom: 6px; }
.p-2-5 { padding: 10px; }
.cursor-pointer { cursor: pointer; }
.tracking-wider { letter-spacing: 0.05em; }

.text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
