<template>
    <div class="poi-master-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">POI MASTER DATABASE & GIS</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Kho Dữ Liệu Địa Điểm Du Lịch Đà Nẵng</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 820px;">
                    Hệ thống quản lý, giám sát và chuẩn hóa hơn 
                    <span class="fw-bold" style="color: #E11D48;">450+ tọa độ điểm đến</span>, 
                    di tích, danh lam thắng cảnh và ẩm thực phục vụ công cụ gợi ý lịch trình AI và bản đồ OpenStreetMap TP Đà Nẵng.
                </p>
            </div>
            
            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-2" @click="xuatGeoJson">
                    <i class="bx bx-download text-primary font-16"></i>
                    <span>Xuất GeoJSON / Excel</span>
                </button>
                <button class="btn rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-2 text-purple" style="background-color: #EDE9FE; border: 1px solid #DDD6FE; color: #7C3AED;" @click="dongBoOsm">
                    <i class="bx bx-sync font-16" :class="{ 'bx-spin': isSyncingOsm }"></i>
                    <span>Đồng Bộ Tọa Độ OSM</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="openModalThemPoi">
                    <i class="bx bx-plus font-16"></i>
                    <span>+ Thêm Địa Điểm Mới</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Tổng POI -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TỔNG POI ĐANG QUẢN TRỊ</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">428</span>
                                <span class="text-muted font-12 fw-medium">/ 452 tổng</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-expand-alt font-20" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                        <span class="font-11 fw-semibold text-dark d-flex align-items-center gap-1">
                            <span class="dot-green"></span> 100% Chuẩn WGS84
                        </span>
                        <span class="badge rounded-pill font-11 fw-semibold px-2 py-1 text-secondary" style="background-color: #F1F5F9;">
                            Sẵn sàng AI
                        </span>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Phủ sóng 7 quận/huyện -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">PHỦ SÓNG 7 QUẬN/HUYỆN</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">112</span>
                                <span class="font-12 fw-semibold" style="color: #7C3AED;">Sơn Trà (Dẫn đầu)</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 42px; height: 42px;">
                            <i class="bx bx-current-location font-20" style="color: #7C3AED;"></i>
                        </div>
                    </div>
                    <!-- Mini Segmented Bar -->
                    <div class="my-1">
                        <div class="d-flex rounded-pill overflow-hidden" style="height: 6px;">
                            <div style="width: 28%; background-color: #7C3AED;" title="Sơn Trà: 112"></div>
                            <div style="width: 24%; background-color: #E11D48;" title="Hải Châu: 98"></div>
                            <div style="width: 20%; background-color: #06B6D4;" title="Ngũ Hành Sơn: 85"></div>
                            <div style="width: 16%; background-color: #8B5CF6;" title="Liên Chiểu: 65"></div>
                            <div style="width: 12%; background-color: #CBD5E1;" title="Huyện Hòa Vang & Cẩm Lệ: 68"></div>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11">Hải Châu: 98 • Sơn Trà: 112 • NHS: 85...</small>
                    </div>
                </div>
            </div>

            <!-- KPI 3: Tương tác ảnh 360° / VR -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TƯƠNG TÁC ẢNH 360° / VR</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">156</span>
                                <span class="font-13 fw-semibold" style="color: #0284C7;">(36.4%)</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 42px; height: 42px;">
                            <i class="bx bx-scan font-20" style="color: #0284C7;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <div class="p-1-5 px-2 rounded-pill font-11 d-flex align-items-center justify-content-between" style="background-color: #E0F2FE;">
                            <span class="text-muted">Mục tiêu quý 3/2025:</span>
                            <span class="fw-bold" style="color: #0284C7;">250 điểm (60%)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KPI 4: Phân loại phí tham quan -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">PHÂN LOẠI PHÍ THAM QUAN</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">244</span>
                                <span class="font-11 fw-bold" style="color: #E11D48;">Mở Cửa Miễn Phí</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F8FAFC; width: 42px; height: 42px; border: 1px solid #E2E8F0;">
                            <i class="bx bx-coupon font-20 text-muted"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                        <span class="font-11 text-muted d-flex align-items-center gap-1">
                            <span class="dot-cyan"></span> Có thu phí: 184 điểm
                        </span>
                        <span class="font-11 text-muted">Tự do: 57.0%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search & Filters Container -->
        <div class="card border-0 rounded-4 shadow-xs bg-white mb-4">
            <div class="card-body p-3">
                <!-- Row 1: Quick Search & Action Buttons -->
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <div class="search-input-wrapper flex-grow-1 position-relative">
                        <i class="bx bx-search position-absolute top-50 translate-middle-y text-muted font-18" style="left: 14px;"></i>
                        <input type="text" 
                            class="form-control rounded-pill ps-5 pe-5 font-13 border-light-subtle bg-light"
                            placeholder="Tìm nhanh theo tên điểm (Bà Nà, Linh Ứng...), mã POI-DN, địa chỉ đường, hoặc tọa độ..."
                            v-model="searchQuery" 
                            @keyup.enter="applyFilters" />
                        <span class="position-absolute top-50 translate-middle-y badge bg-white border text-muted font-10 px-2 py-1 rounded" style="right: 14px;">
                            Ctrl+K
                        </span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-outline-secondary rounded-pill px-3 py-2 font-12 fw-semibold d-flex align-items-center gap-1 bg-white" @click="resetFilters">
                            <i class="bx bx-reset font-16"></i>
                            <span>Đặt lại bộ lọc</span>
                        </button>
                        <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="applyFilters">
                            <i class="bx bx-slider-alt font-16"></i>
                            <span>Áp dụng ({{ filteredPois.length }})</span>
                        </button>
                    </div>
                </div>

                <!-- Row 2: 5 Filter Dropdowns -->
                <div class="row g-2">
                    <div class="col-12 col-md">
                        <label class="font-11 text-muted fw-bold text-uppercase mb-1">DANH MỤC POI</label>
                        <select class="form-select form-select-sm rounded-3 font-12 bg-light border-light-subtle" v-model="filterCategory">
                            <option value="">Tất cả danh mục (6)</option>
                            <option value="Danh lam thắng cảnh">Danh lam thắng cảnh</option>
                            <option value="Di tích lịch sử">Di tích lịch sử</option>
                            <option value="Vui chơi & Check-in">Vui chơi & Check-in</option>
                            <option value="Bãi biển & Thể thao">Bãi biển & Thể thao</option>
                            <option value="Bảo tàng & Di tích">Bảo tàng & Di tích</option>
                            <option value="Ẩm thực & Chợ đêm">Ẩm thực & Chợ đêm</option>
                        </select>
                    </div>
                    <div class="col-12 col-md">
                        <label class="font-11 text-muted fw-bold text-uppercase mb-1">QUẬN / HUYỆN</label>
                        <select class="form-select form-select-sm rounded-3 font-12 bg-light border-light-subtle" v-model="filterDistrict">
                            <option value="">Toàn thành phố (7)</option>
                            <option value="Quận Sơn Trà">Quận Sơn Trà</option>
                            <option value="Quận Hải Châu">Quận Hải Châu</option>
                            <option value="Ngũ Hành Sơn">Ngũ Hành Sơn</option>
                            <option value="Quận Liên Chiểu">Quận Liên Chiểu</option>
                            <option value="Quận Thanh Khê">Quận Thanh Khê</option>
                            <option value="Quận Cẩm Lệ">Quận Cẩm Lệ</option>
                            <option value="Huyện Hòa Vang">Huyện Hòa Vang</option>
                        </select>
                    </div>
                    <div class="col-12 col-md">
                        <label class="font-11 text-muted fw-bold text-uppercase mb-1">THẺ SỞ THÍCH (TAGS)</label>
                        <select class="form-select form-select-sm rounded-3 font-12 bg-light border-light-subtle" v-model="filterTag">
                            <option value="">Tất cả thẻ tags</option>
                            <option value="#TâmLinh">#TâmLinh</option>
                            <option value="#NgắmCảnh">#NgắmCảnh</option>
                            <option value="#HangĐộng">#HangĐộng</option>
                            <option value="#VănHóa">#VănHóa</option>
                            <option value="#NightLife">#NightLife</option>
                            <option value="#CặpĐôi">#CặpĐôi</option>
                            <option value="#TắmBiển">#TắmBiển</option>
                            <option value="#LướtVán">#LướtVán</option>
                            <option value="#LịchSử">#LịchSử</option>
                            <option value="#SănMây">#SănMây</option>
                        </select>
                    </div>
                    <div class="col-12 col-md">
                        <label class="font-11 text-muted fw-bold text-uppercase mb-1">MỨC GIÁ THAM QUAN</label>
                        <select class="form-select form-select-sm rounded-3 font-12 bg-light border-light-subtle" v-model="filterPrice">
                            <option value="">Tất cả mức giá</option>
                            <option value="free">Miễn phí vé (0đ)</option>
                            <option value="paid">Có thu phí tham quan</option>
                            <option value="under50">Dưới 50.000 VNĐ</option>
                            <option value="over50">Từ 50.000 VNĐ trở lên</option>
                        </select>
                    </div>
                    <div class="col-12 col-md">
                        <label class="font-11 text-muted fw-bold text-uppercase mb-1">TRẠNG THÁI VẬN HÀNH</label>
                        <select class="form-select form-select-sm rounded-3 font-12 bg-light border-light-subtle" v-model="filterStatus">
                            <option value="">Đang đón khách (Hoạt động)</option>
                            <option value="all">Tất cả trạng thái</option>
                            <option value="active">Đang mở cửa</option>
                            <option value="maintenance">Bảo trì / Tạm ngừng đón khách</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Batch Action Toolbar (Khớp ảnh: đã chọn 2 địa điểm) -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-2 px-3 rounded-4 bg-white border shadow-xs mb-3">
            <div class="d-flex align-items-center gap-2">
                <input type="checkbox" class="form-check-input mt-0" :checked="isAllSelected" @change="toggleSelectAll" />
                <span class="font-12 text-muted">
                    Chọn tất cả {{ pagedPois.length }} điểm trên trang
                </span>
                <span class="text-muted font-12">|</span>
                <span class="font-12 fw-bold" style="color: #E11D48;">
                    Đã chọn: {{ selectedPoiIds.length }} địa điểm
                </span>
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <span class="font-11 fw-bold text-muted text-uppercase tracking-wider">THAO TÁC NHANH:</span>
                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1 font-11 fw-semibold bg-white" @click="batchAssignTag">
                    Gán thẻ sở thích...
                </button>
                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1 font-11 fw-semibold bg-white" @click="batchUpdateHours">
                    Cập nhật giờ mở cửa mùa cao điểm
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-semibold" style="background-color: #FEE2E2; color: #DC2626; border: 1px solid #FECACA;" @click="batchSuspend">
                    Tạm ngừng đón khách
                </button>
            </div>
        </div>

        <!-- Master POI Data Table -->
        <div class="card border-0 rounded-4 shadow-xs bg-white mb-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
                        <tr class="font-11 text-muted text-uppercase tracking-wider">
                            <th class="ps-3 py-3" style="width: 48px;">
                                <input type="checkbox" class="form-check-input mt-0" :checked="isAllSelected" @change="toggleSelectAll" />
                            </th>
                            <th class="py-3 text-center" style="width: 120px;">MÃ POI</th>
                            <th class="py-3" style="min-width: 290px;">TÊN ĐỊA ĐIỂM & ẢNH</th>
                            <th class="py-3" style="min-width: 200px;">DANH MỤC & TAG SỞ THÍCH</th>
                            <th class="py-3" style="min-width: 190px;">TỌA ĐỘ GIS & QUẬN HUYỆN</th>
                            <th class="py-3 pe-3" style="min-width: 170px;">GIỜ MỞ CỬA & GIÁ VÉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="poi in pagedPois" :key="poi.id" :class="{ 'bg-pink-subtle-selected': selectedPoiIds.includes(poi.id) }">
                            <!-- Col 1: Checkbox -->
                            <td class="ps-3 py-3">
                                <input type="checkbox" class="form-check-input mt-0" :value="poi.id" v-model="selectedPoiIds" />
                            </td>

                            <!-- Col 2: Mã POI -->
                            <td class="py-3 text-center">
                                <span class="poi-code-pill font-11 fw-bold">
                                    {{ poi.code }}
                                </span>
                            </td>

                            <!-- Col 3: Tên Địa Điểm & Ảnh -->
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <!-- Circular Image with 360 Badge -->
                                    <div class="poi-thumb-box position-relative flex-shrink-0">
                                        <img :src="poi.image" :alt="poi.name" class="poi-thumb-circle rounded-circle object-fit-cover shadow-xs border" style="width: 52px; height: 52px;" />
                                        <span v-if="poi.has360" class="badge-360 position-absolute font-9 fw-bold">
                                            360°
                                        </span>
                                    </div>
                                    <div>
                                        <div class="poi-name fw-bold text-dark font-13 mb-0.5 d-flex align-items-center gap-1 cursor-pointer" @click="xemChiTietPoi(poi)">
                                            {{ poi.name }}
                                        </div>
                                        <div class="text-muted font-11 mb-1 text-truncate" style="max-width: 260px;">
                                            {{ poi.address }}
                                        </div>
                                        <div v-if="poi.subTag" class="d-inline-flex align-items-center gap-1 px-2 py-0.5 rounded-pill font-10 fw-semibold" :style="{ backgroundColor: poi.subTagBg, color: poi.subTagColor }">
                                            <i :class="poi.subTagIcon" class="font-11"></i>
                                            <span>{{ poi.subTag }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Col 4: Danh Mục & Tag Sở Thích -->
                            <td class="py-3">
                                <div class="d-flex flex-column gap-1 align-items-start">
                                    <!-- Category Pill -->
                                    <span class="badge rounded-pill font-11 fw-semibold px-2-5 py-1" :style="{ backgroundColor: poi.categoryBg || '#F3E8FF', color: poi.categoryColor || '#7C3AED' }">
                                        {{ poi.category }}
                                    </span>
                                    <!-- Tags -->
                                    <div class="d-flex flex-wrap gap-1 mt-0.5">
                                        <span v-for="tag in poi.tags" :key="tag" class="badge rounded font-10 fw-medium text-secondary" style="background-color: #F1F5F9;">
                                            {{ tag }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <!-- Col 5: Tọa độ GIS & Quận Huyện -->
                            <td class="py-3">
                                <div class="d-flex flex-column gap-1">
                                    <div class="d-flex align-items-center gap-1 font-11 text-dark fw-medium font-monospace">
                                        <i class="bx bxs-map font-14" style="color: #E11D48;"></i>
                                        <span>{{ poi.latLng }}</span>
                                    </div>
                                    <div class="font-11 text-muted ps-3">
                                        {{ poi.district }}
                                    </div>
                                </div>
                            </td>

                            <!-- Col 6: Giờ Mở Cửa & Giá Vé -->
                            <td class="py-3 pe-3">
                                <div class="d-flex flex-column gap-1">
                                    <div class="font-11 text-dark fw-medium">
                                        {{ poi.hours }}
                                    </div>
                                    <div>
                                        <span v-if="poi.isFree" class="badge rounded-pill font-10 fw-bold px-2 py-0.5" style="background-color: #DCFCE7; color: #16A34A;">
                                            Miễn phí vé
                                        </span>
                                        <span v-else class="badge rounded-pill font-10 fw-bold px-2 py-0.5 text-dark" style="background-color: #F1F5F9; border: 1px solid #E2E8F0;">
                                            {{ poi.price }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Bottom Pagination -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3 px-4 border-top font-12">
                <div class="d-flex align-items-center gap-3 text-muted">
                    <span>
                        Hiển thị <b>1 - {{ pagedPois.length }}</b> trong số <b>428</b> địa điểm
                    </span>
                    <div class="d-flex align-items-center gap-1">
                        <span>Số hàng:</span>
                        <select class="form-select form-select-sm w-auto font-12 py-0.5 ps-2 pe-4" v-model="pageSize">
                            <option :value="6">6</option>
                            <option :value="10">10</option>
                            <option :value="20">20</option>
                            <option :value="50">50</option>
                        </select>
                    </div>
                </div>

                <!-- Pagination Controls -->
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
                    <span class="text-muted px-1">...</span>
                    <button class="btn btn-sm pagination-circle-btn" @click="currentPage = 43">
                        43
                    </button>
                    <button class="btn btn-sm btn-icon-round text-muted" :disabled="currentPage >= totalPages" @click="currentPage++">
                        <i class="bx bx-chevron-right font-18"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL: THÊM / CẬP NHẬT ĐỊA ĐIỂM POI MỚI -->
        <div class="modal fade" id="modalPoiKho" tabindex="-1" aria-hidden="true" ref="modalPoiKho">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom p-3 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="icon-round bg-pink-subtle text-pink">
                                <i class="bx bx-map-pin font-20"></i>
                            </div>
                            <div>
                                <h5 class="modal-title fw-bold text-dark font-16 mb-0">{{ isEditPoi ? 'Chỉnh Sửa Địa Điểm POI' : 'Thêm Địa Điểm Du Lịch Mới' }}</h5>
                                <small class="text-muted font-11">Định danh WGS84, VR 360 và thông số phục vụ AI Tour Planner</small>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="fw-bold mb-1">Mã POI <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13" v-model="formPoi.code" placeholder="VD: POI-DN-007" />
                            </div>
                            <div class="col-md-8">
                                <label class="fw-bold mb-1">Tên Địa Điểm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13" v-model="formPoi.name" placeholder="VD: Cầu Vàng Bà Nà Hills..." />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Danh Mục <span class="text-danger">*</span></label>
                                <select class="form-select rounded-3 font-13" v-model="formPoi.category">
                                    <option value="Danh lam thắng cảnh">Danh lam thắng cảnh</option>
                                    <option value="Di tích lịch sử">Di tích lịch sử</option>
                                    <option value="Vui chơi & Check-in">Vui chơi & Check-in</option>
                                    <option value="Bãi biển & Thể thao">Bãi biển & Thể thao</option>
                                    <option value="Bảo tàng & Di tích">Bảo tàng & Di tích</option>
                                    <option value="Ẩm thực & Chợ đêm">Ẩm thực & Chợ đêm</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Quận / Huyện <span class="text-danger">*</span></label>
                                <select class="form-select rounded-3 font-13" v-model="formPoi.district">
                                    <option value="Quận Sơn Trà">Quận Sơn Trà</option>
                                    <option value="Quận Hải Châu">Quận Hải Châu</option>
                                    <option value="Ngũ Hành Sơn">Quận Ngũ Hành Sơn</option>
                                    <option value="Quận Liên Chiểu">Quận Liên Chiểu</option>
                                    <option value="Quận Thanh Khê">Quận Thanh Khê</option>
                                    <option value="Quận Cẩm Lệ">Quận Cẩm Lệ</option>
                                    <option value="Huyện Hòa Vang">Huyện Hòa Vang</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold mb-1">Địa Chỉ Chi Tiết</label>
                                <input type="text" class="form-control rounded-3 font-13" v-model="formPoi.address" placeholder="Số nhà, tên đường, phường..." />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Tọa Độ WGS84 (Lat, Lng) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13 font-monospace" v-model="formPoi.latLng" placeholder="16.0544° N, 108.2022° E" />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Giờ Mở Cửa & Vé</label>
                                <div class="row g-2">
                                    <div class="col-7">
                                        <input type="text" class="form-control rounded-3 font-13" v-model="formPoi.hours" placeholder="07:00 - 18:00" />
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control rounded-3 font-13" v-model="formPoi.price" placeholder="Miễn phí vé" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Thẻ Sở Thích Tags</label>
                                <input type="text" class="form-control rounded-3 font-13" v-model="formPoi.tagsText" placeholder="#CheckIn, #NhiếpẢnh" />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Huy hiệu đặc biệt (Sub-tag)</label>
                                <input type="text" class="form-control rounded-3 font-13" v-model="formPoi.subTag" placeholder="VD: Di tích Quốc gia đặc biệt" />
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" id="switch360Kho" v-model="formPoi.has360" />
                                    <label class="form-check-label fw-bold" for="switch360Kho">Tích hợp mô hình ảnh VR / 360°</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 font-13" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="button" class="btn btn-pink-gradient text-white rounded-pill px-4 font-13 fw-bold shadow-sm" @click="savePoi">
                            {{ isEditPoi ? 'Lưu Thay Đổi' : 'Tạo Địa Điểm' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'KhoDiaDiemMasterComponent',
    data() {
        return {
            isSyncingOsm: false,
            searchQuery: '',
            filterCategory: '',
            filterDistrict: '',
            filterTag: '',
            filterPrice: '',
            filterStatus: '',
            pageSize: 6,
            currentPage: 1,
            selectedPoiIds: [1, 2], // 2 địa điểm được chọn sẵn như trong hình

            pois: [
                {
                    id: 1,
                    code: 'POI-DN-001',
                    name: 'Bán đảo Sơn Trà & Chùa Linh Ứng',
                    address: 'Đường Hoàng Sa, Bán đảo Sơn Trà',
                    image: 'https://images.unsplash.com/photo-1599827552599-eadf5e04cb1a?w=150&auto=format&fit=crop&q=60',
                    has360: true,
                    subTag: 'Di sản sinh thái cấp quốc gia',
                    subTagIcon: 'bx bx-check-shield',
                    subTagBg: '#E0F2FE',
                    subTagColor: '#0369A1',
                    category: 'Danh lam thắng cảnh',
                    categoryBg: '#FDF2F8',
                    categoryColor: '#E11D48',
                    tags: ['#TâmLinh', '#NgắmCảnh'],
                    latLng: '16.1081° N, 108.2750° E',
                    district: 'Quận Sơn Trà',
                    hours: '06:00 - 20:30 hàng ngày',
                    isFree: true,
                    price: 'Miễn phí vé',
                    status: 'active'
                },
                {
                    id: 2,
                    code: 'POI-DN-002',
                    name: 'Quần thể Danh thắng Ngũ Hành Sơn',
                    address: '81 Huyền Trân Công Chúa, Hòa Hải',
                    image: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=150&auto=format&fit=crop&q=60',
                    has360: true,
                    subTag: 'Di tích Quốc gia đặc biệt',
                    subTagIcon: 'bx bx-building',
                    subTagBg: '#E0F2FE',
                    subTagColor: '#0369A1',
                    category: 'Di tích lịch sử',
                    categoryBg: '#F3E8FF',
                    categoryColor: '#7C3AED',
                    tags: ['#HangĐộng', '#VănHóa'],
                    latLng: '16.0042° N, 108.2631° E',
                    district: 'Ngũ Hành Sơn',
                    hours: '07:00 - 17:30',
                    isFree: false,
                    price: '40.000 VNĐ',
                    status: 'active'
                },
                {
                    id: 3,
                    code: 'POI-DN-003',
                    name: 'Cầu Rồng & Cầu Tình Yêu',
                    address: 'Đường Trần Hưng Đạo, An Hải Tây',
                    image: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=150&auto=format&fit=crop&q=60',
                    has360: false,
                    subTag: 'Phun lửa T7 & CN 21:00',
                    subTagIcon: 'bx bx-flame',
                    subTagBg: '#FFE4E6',
                    subTagColor: '#E11D48',
                    category: 'Vui chơi & Check-in',
                    categoryBg: '#FDF2F8',
                    categoryColor: '#E11D48',
                    tags: ['#NightLife', '#CặpĐôi'],
                    latLng: '16.0611° N, 108.2275° E',
                    district: 'Quận Sơn Trà',
                    hours: '24/7 Cả ngày',
                    isFree: true,
                    price: 'Miễn phí vé',
                    status: 'active'
                },
                {
                    id: 4,
                    code: 'POI-DN-004',
                    name: 'Bãi biển Mỹ Khê',
                    address: 'Đường Võ Nguyên Giáp, Phước Mỹ',
                    image: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=150&auto=format&fit=crop&q=60',
                    has360: true,
                    subTag: 'Top bãi biển đẹp nhất hành tinh',
                    subTagIcon: 'bx bx-sun',
                    subTagBg: '#E0F2FE',
                    subTagColor: '#0284C7',
                    category: 'Bãi biển & Thể thao',
                    categoryBg: '#E0F2FE',
                    categoryColor: '#0284C7',
                    tags: ['#TắmBiển', '#LướtVán'],
                    latLng: '16.0592° N, 108.2435° E',
                    district: 'Quận Sơn Trà',
                    hours: 'Cứu hộ: 05:00 - 19:00',
                    isFree: true,
                    price: 'Miễn phí vé',
                    status: 'active'
                },
                {
                    id: 5,
                    code: 'POI-DN-005',
                    name: 'Bảo tàng Điêu khắc Chăm',
                    address: 'Số 02 đường 2 Tháng 9, Bình Hiên',
                    image: 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=150&auto=format&fit=crop&q=60',
                    has360: false,
                    subTag: 'Bảo vật quốc gia lưu trữ',
                    subTagIcon: 'bx bx-arch',
                    subTagBg: '#F3E8FF',
                    subTagColor: '#7C3AED',
                    category: 'Bảo tàng & Di tích',
                    categoryBg: '#F3E8FF',
                    categoryColor: '#7C3AED',
                    tags: ['#LịchSử', '#NghệThuật'],
                    latLng: '16.0681° N, 108.2230° E',
                    district: 'Quận Hải Châu',
                    hours: '07:30 - 17:00',
                    isFree: false,
                    price: '60.000 VNĐ',
                    status: 'active'
                },
                {
                    id: 6,
                    code: 'POI-DN-006',
                    name: 'Đèo Hải Vân & Hải Vân Quan',
                    address: 'Đỉnh đèo QL1A, Hòa Hiệp Bắc',
                    image: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=150&auto=format&fit=crop&q=60',
                    has360: true,
                    subTag: 'Thiên hạ đệ nhất hùng quan',
                    subTagIcon: 'bx bx-landscape',
                    subTagBg: '#FFE4E6',
                    subTagColor: '#E11D48',
                    category: 'Danh lam thắng cảnh',
                    categoryBg: '#F3E8FF',
                    categoryColor: '#7C3AED',
                    tags: ['#SănMây', '#Phượt'],
                    latLng: '16.1969° N, 108.1311° E',
                    district: 'Quận Liên Chiểu',
                    hours: 'Mở cửa tự do 24/7',
                    isFree: true,
                    price: 'Miễn phí vé',
                    status: 'active'
                }
            ],

            isEditPoi: false,
            formPoi: {
                id: null,
                code: '',
                name: '',
                category: 'Danh lam thắng cảnh',
                district: 'Quận Sơn Trà',
                address: '',
                latLng: '',
                hours: '07:00 - 18:00',
                price: 'Miễn phí vé',
                tagsText: '#NgắmCảnh, #NhiếpẢnh',
                subTag: '',
                has360: true
            },

            modalPoiInstance: null
        };
    },
    computed: {
        filteredPois() {
            return this.pois.filter(p => {
                const matchQuery = !this.searchQuery || 
                    p.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    p.code.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    p.address.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    p.latLng.includes(this.searchQuery);

                const matchCat = !this.filterCategory || p.category === this.filterCategory;
                const matchDist = !this.filterDistrict || p.district.includes(this.filterDistrict) || (this.filterDistrict === 'Ngũ Hành Sơn' && p.district === 'Ngũ Hành Sơn');
                const matchTag = !this.filterTag || p.tags.includes(this.filterTag);
                
                let matchPrice = true;
                if (this.filterPrice === 'free') matchPrice = p.isFree;
                else if (this.filterPrice === 'paid') matchPrice = !p.isFree;

                let matchStatus = true;
                if (this.filterStatus === 'active') matchStatus = p.status === 'active';
                else if (this.filterStatus === 'maintenance') matchStatus = p.status === 'maintenance';

                return matchQuery && matchCat && matchDist && matchTag && matchPrice && matchStatus;
            });
        },
        pagedPois() {
            const start = (this.currentPage - 1) * this.pageSize;
            return this.filteredPois.slice(start, start + this.pageSize);
        },
        totalPages() {
            return Math.ceil(this.filteredPois.length / this.pageSize) || 1;
        },
        isAllSelected() {
            return this.pagedPois.length > 0 && this.pagedPois.every(p => this.selectedPoiIds.includes(p.id));
        }
    },
    mounted() {
        if (window.bootstrap) {
            this.modalPoiInstance = new window.bootstrap.Modal(this.$refs.modalPoiKho);
        }
    },
    methods: {
        toggleSelectAll(e) {
            if (e.target.checked) {
                const currentIds = this.pagedPois.map(p => p.id);
                this.selectedPoiIds = Array.from(new Set([...this.selectedPoiIds, ...currentIds]));
            } else {
                const currentIds = this.pagedPois.map(p => p.id);
                this.selectedPoiIds = this.selectedPoiIds.filter(id => !currentIds.includes(id));
            }
        },
        applyFilters() {
            this.currentPage = 1;
        },
        resetFilters() {
            this.searchQuery = '';
            this.filterCategory = '';
            this.filterDistrict = '';
            this.filterTag = '';
            this.filterPrice = '';
            this.filterStatus = '';
            this.currentPage = 1;
        },
        xuatGeoJson() {
            alert('Đang trích xuất tệp DaNang_POIs_Master_WGS84.geojson và Excel định dạng GIS chuẩn TP Đà Nẵng...');
        },
        dongBoOsm() {
            this.isSyncingOsm = true;
            setTimeout(() => {
                this.isSyncingOsm = false;
                alert('Đã hoàn tất đồng bộ với máy chủ OpenStreetMap (OSM) Overpass API! Cập nhật 428/428 node tọa độ WGS84 chính xác 100%.');
            }, 1200);
        },
        openModalThemPoi() {
            this.isEditPoi = false;
            this.formPoi = {
                id: null,
                code: `POI-DN-00${this.pois.length + 1}`,
                name: '',
                category: 'Danh lam thắng cảnh',
                district: 'Quận Sơn Trà',
                address: '',
                latLng: '16.0544° N, 108.2022° E',
                hours: '07:00 - 18:00',
                price: 'Miễn phí vé',
                tagsText: '#NgắmCảnh, #NhiếpẢnh',
                subTag: '',
                has360: true
            };
            if (this.modalPoiInstance) this.modalPoiInstance.show();
        },
        xemChiTietPoi(poi) {
            this.isEditPoi = true;
            this.formPoi = {
                id: poi.id,
                code: poi.code,
                name: poi.name,
                category: poi.category,
                district: poi.district,
                address: poi.address,
                latLng: poi.latLng,
                hours: poi.hours,
                price: poi.price,
                tagsText: poi.tags.join(', '),
                subTag: poi.subTag || '',
                has360: poi.has360
            };
            if (this.modalPoiInstance) this.modalPoiInstance.show();
        },
        savePoi() {
            if (!this.formPoi.name || !this.formPoi.code) {
                alert('Vui lòng nhập mã POI và tên địa điểm!');
                return;
            }
            const tags = this.formPoi.tagsText.split(',').map(t => t.trim()).filter(Boolean);
            const isFree = this.formPoi.price.toLowerCase().includes('miễn phí') || this.formPoi.price.includes('0');

            if (this.isEditPoi) {
                const item = this.pois.find(p => p.id === this.formPoi.id);
                if (item) {
                    item.code = this.formPoi.code;
                    item.name = this.formPoi.name;
                    item.category = this.formPoi.category;
                    item.district = this.formPoi.district;
                    item.address = this.formPoi.address;
                    item.latLng = this.formPoi.latLng;
                    item.hours = this.formPoi.hours;
                    item.price = this.formPoi.price;
                    item.isFree = isFree;
                    item.tags = tags;
                    item.subTag = this.formPoi.subTag;
                    item.has360 = this.formPoi.has360;
                }
            } else {
                this.pois.unshift({
                    id: Date.now(),
                    code: this.formPoi.code,
                    name: this.formPoi.name,
                    address: this.formPoi.address || 'TP Đà Nẵng',
                    image: 'https://images.unsplash.com/photo-1599827552599-eadf5e04cb1a?w=150&auto=format&fit=crop&q=60',
                    has360: this.formPoi.has360,
                    subTag: this.formPoi.subTag,
                    subTagIcon: 'bx bx-star',
                    subTagBg: '#E0F2FE',
                    subTagColor: '#0369A1',
                    category: this.formPoi.category,
                    tags: tags.length ? tags : ['#CheckIn'],
                    latLng: this.formPoi.latLng || '16.0544° N, 108.2022° E',
                    district: this.formPoi.district,
                    hours: this.formPoi.hours || '07:00 - 18:00',
                    isFree: isFree,
                    price: this.formPoi.price || 'Miễn phí vé',
                    status: 'active'
                });
            }

            if (this.modalPoiInstance) this.modalPoiInstance.hide();
            alert('Đã lưu thành công dữ liệu địa điểm POI!');
        },
        batchAssignTag() {
            alert('Đã mở công cụ gán thẻ hàng loạt cho các địa điểm được chọn.');
        },
        batchUpdateHours() {
            alert('Đã mở công cụ cập nhật giờ mở cửa mùa cao điểm cho các địa điểm được chọn.');
        },
        batchSuspend() {
            if (confirm(`Bạn có chắc muốn tạm dừng đón khách cho ${this.selectedPoiIds.length} địa điểm đang chọn?`)) {
                this.pois.forEach(p => {
                    if (this.selectedPoiIds.includes(p.id)) p.status = 'maintenance';
                });
                alert('Đã cập nhật trạng thái bảo trì/tạm dừng đón khách!');
            }
        }
    }
};
</script>

<style scoped>
.poi-master-page {
    background-color: #F8FAFC;
    min-height: 100vh;
}

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

.pulse-dot-pink {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
    box-shadow: 0 0 0 2px rgba(225, 29, 72, 0.2);
}
.dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #10B981;
    display: inline-block;
}
.dot-cyan {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #06B6D4;
    display: inline-block;
}

.shadow-xs {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.poi-code-pill {
    padding: 3px 8px;
    border-radius: 9999px;
    color: #E11D48;
    background-color: #FFF1F2;
    border: 1px dashed #FDA4AF;
    letter-spacing: 0.5px;
    display: inline-block;
}
.bg-pink-subtle-selected {
    background-color: #FFF5F7 !important;
}

.badge-360 {
    bottom: -3px;
    right: -3px;
    background-color: #0F172A;
    color: #FFFFFF;
    padding: 1px 4px;
    border-radius: 4px;
    border: 1px solid #FFFFFF;
}

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

.icon-round {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.font-9 { font-size: 9px; }
.font-10 { font-size: 10px; }
.font-11 { font-size: 11px; }
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.font-14 { font-size: 14px; }
.font-15 { font-size: 15px; }
.font-16 { font-size: 16px; }
.font-18 { font-size: 18px; }
.font-20 { font-size: 20px; }
.font-24 { font-size: 24px; }
.font-28 { font-size: 28px; }

.px-2-5 { padding-left: 10px; padding-right: 10px; }
.py-1-5 { padding-top: 6px; padding-bottom: 6px; }
.cursor-pointer { cursor: pointer; }
.tracking-wider { letter-spacing: 0.05em; }
</style>
