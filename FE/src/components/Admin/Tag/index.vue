<template>
    <div class="tag-management-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">AI Vector Engine v3.4</span>
                    <span class="text-muted font-11 ms-1">Database Entities: the_so_thich • dia_diem_the • so_thich_du_khach</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Quản Lý Thẻ Sở Thích (Tags) & Trọng Số Thuật Toán AI</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 860px;">
                    Hệ thống thẻ định danh dùng để gắn nhãn POI và thu thập hành vi sở thích du khách, làm dữ liệu vector đầu vào trực tiếp cho giải thuật Genetic Algorithm & Collaborative Filtering tối ưu hóa lộ trình Đà Nẵng.
                </p>
            </div>
            
            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-xs d-flex align-items-center gap-1" @click="openModalThemTag">
                    <i class="bx bx-plus font-16"></i>
                    <span>+ Thêm Thẻ Mới</span>
                </button>
                <button class="btn rounded-pill px-3 py-2 font-12 fw-semibold text-white shadow-xs d-flex align-items-center gap-2" style="background-color: #7C3AED;" @click="toiUuHoaTfIdf">
                    <i class="bx bx-slider-alt font-16" :class="{ 'bx-spin': isOptimizing }"></i>
                    <span>Tối Ưu Hóa TF-IDF</span>
                </button>
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-xs d-flex align-items-center gap-2" @click="xuatDuLieu">
                    <i class="bx bx-download text-primary font-16"></i>
                    <span>Xuất Dữ Liệu</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Thẻ Kích Hoạt -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">THẺ KÍCH HOẠT</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">48</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0.5" style="background-color: #E0F2FE; color: #0284C7;">
                                    +3 tuần này
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 44px; height: 44px;">
                            <i class="bx bx-purchase-tag font-22" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11">Định danh đa ngữ cảnh</small>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Lượt Khách Chọn -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">LƯỢT KHÁCH CHỌN</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">148.5K</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0.5" style="background-color: #FDF2F8; color: #E11D48;">
                                    ↑ 18.4%
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 44px; height: 44px;">
                            <i class="bx bx-group font-22" style="color: #7C3AED;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11">Từ bảng <code>so_thich_du_khach</code></small>
                    </div>
                </div>
            </div>

            <!-- KPI 3: Gắn Vào POI -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">GẮN VÀO POI</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">1,250</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0.5 text-purple" style="background-color: #F5F3FF; color: #7C3AED;">
                                    340 điểm đến
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F0F9FF; width: 44px; height: 44px;">
                            <i class="bx bx-map-pin font-22" style="color: #0284C7;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11">Từ bảng <code>dia_diem_the</code></small>
                    </div>
                </div>
            </div>

            <!-- KPI 4: Độ Chuẩn AI -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐỘ CHUẨN AI</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-28 fw-bold" style="color: #E11D48;">94.2%</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0.5" style="background-color: #FDF2F8; color: #E11D48;">
                                    Fit Score
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 44px; height: 44px;">
                            <i class="bx bx-badge-check font-22" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11">Collaborative Filtering</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Live Frequency Cloud Card -->
        <div class="card border-0 rounded-4 shadow-xs bg-white mb-4 p-3 p-lg-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bx bx-cloud font-20" style="color: #E11D48;"></i>
                        <h6 class="fw-bold text-dark font-15 mb-0">Đám Mây Thẻ Sở Thích Đà Nẵng (Live Frequency Cloud)</h6>
                    </div>
                    <small class="text-muted font-11">Quy mô hiển thị dựa trên tần suất tương tác thực tế từ khách du lịch và địa điểm du lịch</small>
                </div>
                <!-- Legend -->
                <div class="d-flex align-items-center gap-3 font-11 text-muted">
                    <span class="d-flex align-items-center gap-1">
                        <span class="dot-sm" style="background-color: #E11D48;"></span> Rất phổ biến (>30k lượt)
                    </span>
                    <span class="d-flex align-items-center gap-1">
                        <span class="dot-sm" style="background-color: #7C3AED;"></span> Trung bình
                    </span>
                    <span class="d-flex align-items-center gap-1">
                        <span class="dot-sm" style="background-color: #0284C7;"></span> Ngách / Đặc thù
                    </span>
                </div>
            </div>

            <!-- Tags Cloud Layout -->
            <div class="cloud-tags-container p-4 rounded-4 text-center d-flex flex-column align-items-center gap-3" style="background-color: #FAF5FF; border: 1px dashed #E9D5FF;">
                <!-- Row 1: High Frequency Popular Tags -->
                <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
                    <button class="btn btn-tag-cloud-lg text-white font-14 fw-bold shadow-sm" style="background-color: #E11D48;" @click="filterByTagName('CheckInSongAo')">
                        <i class="bx bx-camera me-1"></i> #CheckInSongAo
                    </button>
                    <button class="btn btn-tag-cloud-lg text-white font-14 fw-bold shadow-sm" style="background-color: #7C3AED;" @click="filterByTagName('AmThucBanDia')">
                        <i class="bx bx-restaurant me-1"></i> #AmThucBanDia
                    </button>
                    <button class="btn btn-tag-cloud-lg text-white font-14 fw-bold shadow-sm" style="background-color: #0284C7;" @click="filterByTagName('TamBienMyKhe')">
                        <i class="bx bx-water me-1"></i> #TamBienMyKhe
                    </button>
                </div>

                <!-- Row 2: Medium Frequency Tags -->
                <div class="d-flex flex-wrap justify-content-center align-items-center gap-2.5">
                    <button class="btn btn-tag-cloud-md font-13 fw-semibold shadow-xs" style="background-color: #FDF2F8; color: #E11D48; border: 1px solid #FCE7F3;" @click="filterByTagName('TrekkingSonTra')">
                        <i class="bx bx-walk me-1"></i> #TrekkingSonTra
                    </button>
                    <button class="btn btn-tag-cloud-md font-13 fw-semibold shadow-xs" style="background-color: #F5F3FF; color: #7C3AED; border: 1px solid #DDD6FE;" @click="filterByTagName('GiaDinhCoTreNho')">
                        <i class="bx bx-group me-1"></i> #GiaDinhCoTreNho
                    </button>
                    <button class="btn btn-tag-cloud-md font-13 fw-semibold shadow-xs bg-white text-dark border" @click="filterByTagName('YenTinhThuGian')">
                        <i class="bx bx-spa me-1"></i> #YenTinhThuGian
                    </button>
                    <button class="btn btn-tag-cloud-md font-13 fw-semibold shadow-xs bg-white text-dark border" @click="filterByTagName('KhamPhaLichSu')">
                        <i class="bx bx-arch me-1"></i> #KhamPhaLichSu
                    </button>
                </div>

                <!-- Row 3: Minor & Specific Tags -->
                <div class="d-flex flex-wrap justify-content-center align-items-center gap-2">
                    <button class="btn btn-tag-cloud-sm font-12 fw-medium shadow-xs" style="background-color: #FFF1F2; color: #E11D48; border: 1px solid #FDA4AF;" @click="filterByTagName('GiaiTriVeDem')">
                        <i class="bx bx-drink me-1"></i> #GiaiTriVeDem
                    </button>
                    <button class="btn btn-tag-cloud-sm font-12 fw-medium bg-white text-secondary border shadow-xs" @click="filterByTagName('TranhNongMuaHe')">
                        <i class="bx bx-sun me-1"></i> #TranhNongMuaHe
                    </button>
                    <button class="btn btn-tag-cloud-sm font-12 fw-medium bg-white text-secondary border shadow-xs" @click="filterByTagName('CaPheGocPho')">
                        <i class="bx bx-coffee me-1"></i> #CaPheGocPho
                    </button>
                    <button class="btn btn-tag-cloud-sm font-12 fw-medium bg-white text-secondary border shadow-xs" @click="filterByTagName('LanhNgamSanHo')">
                        <i class="bx bx-swim me-1"></i> #LanhNgamSanHo
                    </button>
                    <button class="btn btn-tag-cloud-sm font-12 fw-medium bg-white text-secondary border shadow-xs" @click="filterByTagName('TietKiemChiPhi')">
                        <i class="bx bx-dollar me-1"></i> #TietKiemChiPhi
                    </button>
                </div>

                <!-- Row 4: Niche Tag -->
                <div class="d-flex flex-wrap justify-content-center align-items-center gap-2">
                    <button class="btn btn-tag-cloud-sm font-11 fw-medium bg-white text-muted border shadow-xs" @click="filterByTagName('LuxuryResort')">
                        <i class="bx bx-diamond me-1"></i> #LuxuryResort
                    </button>
                </div>
            </div>
        </div>

        <!-- Category Tabs Bar & Search Filter -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <!-- Left Filter Tabs -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-bold transition-all"
                    :class="activeFilterCategory === '' ? 'bg-pink text-white shadow-xs' : 'bg-white border text-secondary'"
                    @click="activeFilterCategory = ''">
                    <i class="bx bx-grid-alt me-1"></i> Tất cả (48)
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-medium bg-white border text-secondary d-flex align-items-center gap-1.5"
                    :class="{ 'border-pink text-pink fw-bold': activeFilterCategory === 'Trải nghiệm' }"
                    @click="activeFilterCategory = activeFilterCategory === 'Trải nghiệm' ? '' : 'Trải nghiệm'">
                    <i class="bx bx-compass"></i> Trải nghiệm (14)
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-medium bg-white border text-secondary d-flex align-items-center gap-1.5"
                    :class="{ 'border-pink text-pink fw-bold': activeFilterCategory === 'Ẩm thực' }"
                    @click="activeFilterCategory = activeFilterCategory === 'Ẩm thực' ? '' : 'Ẩm thực'">
                    <i class="bx bx-restaurant"></i> Ẩm thực (10)
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-medium bg-white border text-secondary d-flex align-items-center gap-1.5"
                    :class="{ 'border-pink text-pink fw-bold': activeFilterCategory === 'Mạo hiểm' || activeFilterCategory === 'Thiên nhiên' }"
                    @click="activeFilterCategory = activeFilterCategory === 'Thiên nhiên' ? '' : 'Thiên nhiên'">
                    <i class="bx bx-landscape"></i> Thiên nhiên mạo hiểm (8)
                </button>
                <button class="btn btn-sm rounded-pill px-3 py-1-5 font-12 fw-medium bg-white border text-secondary d-flex align-items-center gap-1.5"
                    :class="{ 'border-pink text-pink fw-bold': activeFilterCategory === 'Văn hóa' }"
                    @click="activeFilterCategory = activeFilterCategory === 'Văn hóa' ? '' : 'Văn hóa'">
                    <i class="bx bx-arch"></i> Nghệ thuật & Di sản (9)
                </button>
            </div>

            <!-- Right Search Input -->
            <div class="search-box position-relative" style="min-width: 260px;">
                <i class="bx bx-search position-absolute top-50 translate-middle-y text-muted font-16" style="left: 12px;"></i>
                <input type="text" 
                    class="form-control form-control-sm rounded-pill ps-4 pe-3 font-12 bg-white border-light-subtle shadow-xs" 
                    placeholder="Tìm mã thẻ, tên thẻ..." 
                    v-model="searchKeyword" />
            </div>
        </div>

        <!-- Master Table Card -->
        <div class="card border-0 rounded-4 shadow-xs bg-white mb-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
                        <tr class="font-11 text-muted text-uppercase tracking-wider">
                            <th class="ps-4 py-3" style="min-width: 140px;">MÃ THẺ</th>
                            <th class="py-3" style="min-width: 220px;">THẺ HIỂN THỊ (APP UI)</th>
                            <th class="py-3" style="min-width: 130px;">NHÓM CHỦ ĐỀ</th>
                            <th class="py-3 text-center" style="min-width: 150px;">POI GẮN THẺ (DIA_DIEM_THE)</th>
                            <th class="py-3 text-center" style="min-width: 180px;">DU KHÁCH CHỌN (SO_THICH_DU_KHACH)</th>
                            <th class="py-3 pe-4" style="min-width: 180px;">TRỌNG SỐ AI (TF-IDF)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="tag in pagedTags" :key="tag.id">
                            <!-- Col 1: Mã Thẻ -->
                            <td class="ps-4 py-3">
                                <span class="font-11 fw-bold font-monospace text-secondary">
                                    {{ tag.code }}
                                </span>
                            </td>

                            <!-- Col 2: Thẻ hiển thị -->
                            <td class="py-3">
                                <button class="btn btn-sm rounded-pill px-3 py-1 font-12 fw-bold text-white shadow-xs d-inline-flex align-items-center gap-1.5" :style="{ backgroundColor: tag.tagBg, color: tag.tagColor }">
                                    <i :class="tag.icon"></i> #{{ tag.name }}
                                </button>
                            </td>

                            <!-- Col 3: Nhóm chủ đề -->
                            <td class="py-3">
                                <span class="badge rounded-pill font-11 fw-semibold px-2-5 py-1" :style="{ backgroundColor: tag.catBg, color: tag.catColor }">
                                    {{ tag.category }}
                                </span>
                            </td>

                            <!-- Col 4: POI Gắn Thẻ -->
                            <td class="py-3 text-center">
                                <div class="fw-bold text-dark font-13">{{ tag.poiCount }}</div>
                                <small class="text-muted font-11">địa điểm</small>
                            </td>

                            <!-- Col 5: Du Khách Chọn -->
                            <td class="py-3 text-center">
                                <div class="fw-bold font-13" :style="{ color: tag.interactColor || '#1E293B' }">
                                    {{ tag.interactCount }}
                                </div>
                                <small class="text-muted font-11">lượt tương tác</small>
                            </td>

                            <!-- Col 6: Trọng Số AI (TF-IDF) -->
                            <td class="py-3 pe-4">
                                <div class="d-flex align-items-center justify-content-between mb-1 font-11">
                                    <span class="fw-bold" :style="{ color: tag.weightColor || '#E11D48' }">
                                        {{ tag.weight }}
                                    </span>
                                    <span class="text-muted fw-semibold">{{ tag.weightLabel }}</span>
                                </div>
                                <div class="progress rounded-pill overflow-hidden" style="height: 5px;">
                                    <div class="progress-bar rounded-pill" :style="{ width: (tag.weight * 100) + '%', backgroundColor: tag.weightColor || '#E11D48' }"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Bottom Pagination -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3 px-4 border-top font-12">
                <div class="text-muted">
                    Hiển thị <b>1 – {{ pagedTags.length }}</b> trong tổng số <b>{{ filteredTags.length }}</b> thẻ sở thích
                </div>

                <!-- Pagination Controls -->
                <div class="d-flex align-items-center gap-1">
                    <button class="btn btn-sm btn-icon-round text-muted" :disabled="currentPage === 1" @click="currentPage--">
                        <i class="bx bx-chevron-left font-18"></i>
                    </button>
                    <button class="btn btn-sm pagination-circle-btn active" @click="currentPage = 1">1</button>
                    <button class="btn btn-sm pagination-circle-btn" @click="currentPage = 2">2</button>
                    <button class="btn btn-sm pagination-circle-btn" @click="currentPage = 3">3</button>
                    <button class="btn btn-sm btn-icon-round text-muted" :disabled="currentPage >= totalPages" @click="currentPage++">
                        <i class="bx bx-chevron-right font-18"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL: THÊM MỚI THẺ SỞ THÍCH -->
        <div class="modal fade" id="modalTag" tabindex="-1" aria-hidden="true" ref="modalTag">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom p-3 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="icon-round bg-pink-subtle text-pink">
                                <i class="bx bx-purchase-tag font-20"></i>
                            </div>
                            <div>
                                <h5 class="modal-title fw-bold text-dark font-16 mb-0">Thêm Mới Thẻ Sở Thích AI</h5>
                                <small class="text-muted font-11">Định danh hành vi & trọng số vector gợi ý</small>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 font-13">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="fw-bold mb-1">Mã Thẻ (Unique Code) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 font-13 font-monospace" v-model="formTag.code" placeholder="VD: TAG_AM05" />
                            </div>
                            <div class="col-md-7">
                                <label class="fw-bold mb-1">Tên Thẻ (Không dấu cách) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted">#</span>
                                    <input type="text" class="form-control rounded-end-3 font-13" v-model="formTag.name" placeholder="VD: CaPheChieu" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Nhóm Chủ Đề <span class="text-danger">*</span></label>
                                <select class="form-select rounded-3 font-13" v-model="formTag.category">
                                    <option value="Trải nghiệm">Trải nghiệm</option>
                                    <option value="Ẩm thực">Ẩm thực</option>
                                    <option value="Thiên nhiên">Thiên nhiên</option>
                                    <option value="Mạo hiểm">Mạo hiểm</option>
                                    <option value="Gia đình">Gia đình</option>
                                    <option value="Văn hóa">Văn hóa</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold mb-1">Trọng Số Khởi Tạo TF-IDF</label>
                                <input type="number" step="0.05" min="0.1" max="1.0" class="form-control rounded-3 font-13" v-model="formTag.weight" placeholder="0.85" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 font-13" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-pink-gradient text-white rounded-pill px-4 font-13 fw-bold" @click="saveTag">
                            Lưu Thẻ Mới
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TagAiComponent',
    data() {
        return {
            isOptimizing: false,
            searchKeyword: '',
            activeFilterCategory: '',
            pageSize: 6,
            currentPage: 1,

            // Dữ liệu 6 thẻ mẫu khớp 100% hình ảnh media_1793379203495_b6ee3a38.png
            tags: [
                {
                    id: 1,
                    code: 'TAG_CK01',
                    name: 'CheckInSongAo',
                    icon: 'bx bx-camera',
                    tagBg: '#E11D48',
                    tagColor: '#FFFFFF',
                    category: 'Trải nghiệm',
                    catBg: '#FDF2F8',
                    catColor: '#E11D48',
                    poiCount: 184,
                    interactCount: '42,890',
                    interactColor: '#E11D48',
                    weight: 0.95,
                    weightLabel: 'Cao',
                    weightColor: '#E11D48'
                },
                {
                    id: 2,
                    code: 'TAG_AT04',
                    name: 'AmThucBanDia',
                    icon: 'bx bx-restaurant',
                    tagBg: '#7C3AED',
                    tagColor: '#FFFFFF',
                    category: 'Ẩm thực',
                    catBg: '#F5F3FF',
                    catColor: '#7C3AED',
                    poiCount: 210,
                    interactCount: '38,120',
                    interactColor: '#1E293B',
                    weight: 0.90,
                    weightLabel: 'Cao',
                    weightColor: '#7C3AED'
                },
                {
                    id: 3,
                    code: 'TAG_TN02',
                    name: 'TamBienMyKhe',
                    icon: 'bx bx-water',
                    tagBg: '#0284C7',
                    tagColor: '#FFFFFF',
                    category: 'Thiên nhiên',
                    catBg: '#E0F2FE',
                    catColor: '#0284C7',
                    poiCount: 65,
                    interactCount: '29,430',
                    interactColor: '#0284C7',
                    weight: 0.85,
                    weightLabel: 'Cao',
                    weightColor: '#0284C7'
                },
                {
                    id: 4,
                    code: 'TAG_GD08',
                    name: 'GiaDinhCoTreNho',
                    icon: 'bx bx-group',
                    tagBg: '#7C3AED',
                    tagColor: '#FFFFFF',
                    category: 'Gia đình',
                    catBg: '#F5F3FF',
                    catColor: '#7C3AED',
                    poiCount: 92,
                    interactCount: '15,640',
                    interactColor: '#1E293B',
                    weight: 0.78,
                    weightLabel: 'TB-Cao',
                    weightColor: '#7C3AED'
                },
                {
                    id: 5,
                    code: 'TAG_TK03',
                    name: 'TrekkingSonTra',
                    icon: 'bx bx-walk',
                    tagBg: '#E11D48',
                    tagColor: '#FFFFFF',
                    category: 'Mạo hiểm',
                    catBg: '#FDF2F8',
                    catColor: '#E11D48',
                    poiCount: 34,
                    interactCount: '11,280',
                    interactColor: '#1E293B',
                    weight: 0.72,
                    weightLabel: 'TB',
                    weightColor: '#E11D48'
                },
                {
                    id: 6,
                    code: 'TAG_LS07',
                    name: 'KhamPhaLichSu',
                    icon: 'bx bx-arch',
                    tagBg: '#64748B',
                    tagColor: '#FFFFFF',
                    category: 'Văn hóa',
                    catBg: '#F1F5F9',
                    catColor: '#475569',
                    poiCount: 28,
                    interactCount: '6,420',
                    interactColor: '#1E293B',
                    weight: 0.55,
                    weightLabel: 'Ngách',
                    weightColor: '#64748B'
                }
            ],

            formTag: {
                code: 'TAG_',
                name: '',
                category: 'Trải nghiệm',
                weight: 0.85
            },
            modalInstance: null
        };
    },
    computed: {
        filteredTags() {
            return this.tags.filter(t => {
                const matchKeyword = !this.searchKeyword ||
                    t.name.toLowerCase().includes(this.searchKeyword.toLowerCase()) ||
                    t.code.toLowerCase().includes(this.searchKeyword.toLowerCase());

                const matchCat = !this.activeFilterCategory || t.category === this.activeFilterCategory;

                return matchKeyword && matchCat;
            });
        },
        pagedTags() {
            const start = (this.currentPage - 1) * this.pageSize;
            return this.filteredTags.slice(start, start + this.pageSize);
        },
        totalPages() {
            return Math.ceil(this.filteredTags.length / this.pageSize) || 1;
        }
    },
    mounted() {
        if (window.bootstrap) {
            this.modalInstance = new window.bootstrap.Modal(this.$refs.modalTag);
        }
    },
    methods: {
        filterByTagName(name) {
            this.searchKeyword = name;
        },
        toiUuHoaTfIdf() {
            this.isOptimizing = true;
            setTimeout(() => {
                this.isOptimizing = false;
                alert('Thuật toán TF-IDF & Cosine Similarity đã tái tính toán thành công trên toàn bộ 48 thẻ sở thích và 340 POIs Đà Nẵng!');
            }, 1200);
        },
        xuatDuLieu() {
            alert('Đang trích xuất ma trận Vector Thẻ Sở Thích (Tags_Embedding_Matrix.json) phục vụ mô hình gợi ý AI...');
        },
        openModalThemTag() {
            this.formTag = {
                code: `TAG_NEW${this.tags.length + 1}`,
                name: '',
                category: 'Trải nghiệm',
                weight: 0.85
            };
            if (this.modalInstance) this.modalInstance.show();
        },
        saveTag() {
            if (!this.formTag.code || !this.formTag.name) {
                alert('Vui lòng nhập đầy đủ mã thẻ và tên thẻ!');
                return;
            }

            this.tags.unshift({
                id: Date.now(),
                code: this.formTag.code,
                name: this.formTag.name,
                icon: 'bx bx-purchase-tag',
                tagBg: '#E11D48',
                tagColor: '#FFFFFF',
                category: this.formTag.category,
                catBg: '#FDF2F8',
                catColor: '#E11D48',
                poiCount: 1,
                interactCount: '0',
                interactColor: '#1E293B',
                weight: parseFloat(this.formTag.weight) || 0.85,
                weightLabel: 'Mới',
                weightColor: '#E11D48'
            });

            if (this.modalInstance) this.modalInstance.hide();
            alert('Đã tạo thành công thẻ sở thích mới!');
        }
    }
};
</script>

<style scoped>
.tag-management-page {
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
    width: 7px;
    height: 7px;
    border-radius: 50%;
    display: inline-block;
}

/* Cloud Tags Buttons */
.btn-tag-cloud-lg {
    padding: 10px 22px;
    border-radius: 9999px;
    border: none;
    transition: all 0.2s ease;
}
.btn-tag-cloud-lg:hover {
    transform: scale(1.05);
}

.btn-tag-cloud-md {
    padding: 7px 18px;
    border-radius: 9999px;
    transition: all 0.2s ease;
}
.btn-tag-cloud-md:hover {
    transform: scale(1.04);
}

.btn-tag-cloud-sm {
    padding: 5px 14px;
    border-radius: 9999px;
    transition: all 0.2s ease;
}
.btn-tag-cloud-sm:hover {
    transform: scale(1.03);
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

.icon-round {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.shadow-xs {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

/* Utility Font Sizes */
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
.font-22 { font-size: 22px; }
.font-24 { font-size: 24px; }
.font-28 { font-size: 28px; }

.px-2-5 { padding-left: 10px; padding-right: 10px; }
.py-1-5 { padding-top: 6px; padding-bottom: 6px; }
.cursor-pointer { cursor: pointer; }
.tracking-wider { letter-spacing: 0.05em; }
</style>
