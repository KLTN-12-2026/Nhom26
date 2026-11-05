<template>
    <div class="tour-moderation-page p-3 p-lg-4">
        <!-- Top Pill Tag & Title Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
            <div>
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 border border-pink-subtle" style="background-color: #FDF2F8;">
                    <span class="pulse-dot-pink"></span>
                    <span class="font-11 fw-bold text-uppercase tracking-wider" style="color: #E11D48;">TOUR QUALITY CONTROL & PRICING VERIFICATION</span>
                </div>
                <h2 class="page-title fw-bold text-dark mb-1 font-24">Kiểm Duyệt Nội Dung & Biểu Giá Tour Du Lịch</h2>
                <p class="text-muted font-13 mb-0" style="max-width: 820px;">
                    Thẩm định lộ trình di chuyển OSRM, tính an toàn các điểm đến, biểu giá minh bạch và chính sách hoàn hủy tour trước khi công khai lên sàn SmartTrip AI Đà Nẵng.
                </p>
            </div>

            <!-- Top Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-2" @click="openModalQuyChuan">
                    <i class="bx bx-book-content text-primary font-16"></i>
                    <span>Quy Chuẩn Duyệt Tour</span>
                </button>
                <button class="btn btn-outline-secondary bg-white rounded-pill px-3 py-2 font-12 fw-semibold shadow-sm d-flex align-items-center gap-2" @click="xuatDanhSach">
                    <i class="bx bx-download text-primary font-16"></i>
                    <span>Xuất Danh Sách</span>
                </button>
                <button class="btn btn-pink-gradient text-white rounded-pill px-3 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1" @click="duyetNhanhHangLoat">
                    <i class="bx bx-check-double font-16"></i>
                    <span>Duyệt Nhanh Hàng Loạt</span>
                </button>
            </div>
        </div>

        <!-- 4 KPI Metrics Cards -->
        <div class="row g-3 mb-4">
            <!-- KPI 1: Hàng đợi chờ duyệt -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">HÀNG ĐỢI CHỜ DUYỆT</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">15</span>
                                <span class="badge rounded-pill font-11 fw-semibold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                                    +3 tour mới trong ngày
                                </span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-folder-open font-20" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11">Hồ sơ kiểm định an toàn OSRM & giấy phép</small>
                    </div>
                </div>
            </div>

            <!-- KPI 2: Đạt chuẩn lần 1 -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐẠT CHUẨN LẦN 1</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">94.2%</span>
                                <span class="font-12 fw-semibold text-success">↗ +1.8%</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #F5F3FF; width: 42px; height: 42px;">
                            <i class="bx bx-check-shield font-20" style="color: #7C3AED;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11">Đối tác tuân thủ chuẩn biểu giá & bảo hiểm</small>
                    </div>
                </div>
            </div>

            <!-- KPI 3: Tour đang bán an toàn -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">TOUR ĐANG BÁN AN TOÀN</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">1.840</span>
                                <span class="text-muted font-12 fw-medium">tour kích hoạt</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #E0F2FE; width: 42px; height: 42px;">
                            <i class="bx bx-shield font-20" style="color: #0284C7;"></i>
                        </div>
                    </div>
                    <div class="pt-2 border-top">
                        <small class="text-muted font-11">Toàn vẹn dữ liệu Đà Nẵng & lân cận</small>
                    </div>
                </div>
            </div>

            <!-- KPI 4: Điểm chất lượng sàn -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="kpi-card p-3 rounded-4 bg-white border shadow-xs h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="text-muted font-11 fw-bold text-uppercase tracking-wider">ĐIỂM CHẤT LƯỢNG SÀN</div>
                            <div class="d-flex align-items-baseline gap-2 mt-1">
                                <span class="font-28 fw-bold text-dark">4.85</span>
                                <span class="text-muted font-12 fw-medium">/ 5.0</span>
                            </div>
                        </div>
                        <div class="kpi-icon-box rounded-3 d-flex align-items-center justify-content-center" style="background-color: #FDF2F8; width: 42px; height: 42px;">
                            <i class="bx bx-star font-20" style="color: #E11D48;"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                        <small class="text-muted font-11">Dựa trên 24.650 đánh giá du khách thực tế</small>
                        <div class="text-warning font-11">
                            <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Columns Main Layout: Left Tour Queue & Right Active Tour Detail -->
        <div class="row g-4 mb-4">
            <!-- LEFT COLUMN: DANH SÁCH CHỜ DUYỆT -->
            <div class="col-12 col-lg-4 col-xl-4">
                <div class="card border-0 shadow-xs rounded-4 bg-white p-3 p-lg-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header & Dropdown Filter -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="dot-pink"></span>
                                <h5 class="fw-bold text-dark mb-0 font-15">Danh Sách Chờ Duyệt</h5>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light rounded-pill px-3 py-1 font-11 fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    {{ activeSortLabel }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end font-12 shadow-sm border-0">
                                    <li><a class="dropdown-item cursor-pointer" @click="activeSortLabel = 'Tất cả (15)'">Tất cả (15)</a></li>
                                    <li><a class="dropdown-item cursor-pointer" @click="activeSortLabel = 'Mới nhất'">Mới nhất</a></li>
                                    <li><a class="dropdown-item cursor-pointer" @click="activeSortLabel = 'Ưu tiên DIFF'">Ưu tiên DIFF</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Filter Status Tabs -->
                        <div class="d-flex align-items-center gap-1-5 mb-3 flex-wrap">
                            <button 
                                class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                                :class="filterStatus === 'all' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                                @click="filterStatus = 'all'"
                            >
                                Tất cả (15)
                            </button>
                            <button 
                                class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                                :class="filterStatus === 'urgent' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                                @click="filterStatus = 'urgent'"
                            >
                                Khẩn cấp (3)
                            </button>
                            <button 
                                class="btn btn-sm rounded-pill px-3 py-1 font-11 fw-bold transition-all"
                                :class="filterStatus === 'revised' ? 'btn-pink-gradient text-white shadow-xs' : 'btn-light text-muted'"
                                @click="filterStatus = 'revised'"
                            >
                                Đã sửa
                            </button>
                        </div>

                        <!-- Tour Cards List -->
                        <div class="tour-queue-list d-flex flex-column gap-2-5">
                            <div 
                                v-for="tour in filteredTours" 
                                :key="tour.id"
                                class="tour-queue-card p-3 rounded-4 transition-all cursor-pointer border"
                                :class="selectedTour.id === tour.id ? 'active-tour-card' : 'bg-white hover-shadow'"
                                @click="selectTour(tour)"
                            >
                                <!-- Top Badges -->
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge rounded-pill font-9 fw-bold px-2 py-0-5" :style="{ backgroundColor: tour.tagBg, color: tour.tagColor }">
                                        {{ tour.tagText }}
                                    </span>
                                    <span class="font-10 text-muted d-flex align-items-center gap-1">
                                        <i class="bx bx-time-five font-12"></i>
                                        <span>{{ tour.timeAgo }}</span>
                                    </span>
                                </div>

                                <!-- Middle Content: Thumbnail + Info -->
                                <div class="d-flex gap-2-5 align-items-center">
                                    <div class="position-relative flex-shrink-0" style="width: 54px; height: 54px;">
                                        <img :src="tour.image" :alt="tour.name" class="w-100 h-100 rounded-3 object-fit-cover border" />
                                        <span v-if="tour.has360" class="badge-360-sm position-absolute font-8 fw-bold">360°</span>
                                    </div>
                                    <div class="overflow-hidden flex-grow-1">
                                        <h6 class="font-12 fw-bold text-dark text-truncate mb-1" :title="tour.name">
                                            {{ tour.name }}
                                        </h6>
                                        <div class="d-flex align-items-center justify-content-between font-11">
                                            <span class="text-muted text-truncate" style="max-width: 130px;">
                                                {{ tour.partnerName }}
                                            </span>
                                            <span class="fw-bold font-12" style="color: #E11D48;">
                                                {{ tour.adultPriceStr }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Footer: Status indicator -->
                                <div class="d-flex align-items-center justify-content-between pt-2 mt-2 border-top font-10">
                                    <span class="text-muted d-flex align-items-center gap-1">
                                        <i class="bx bx-map-pin text-primary"></i> {{ tour.district }}
                                    </span>
                                    <span class="badge rounded-pill font-9 fw-semibold px-2 py-0-5" :style="{ backgroundColor: tour.statusBg, color: tour.statusColor }">
                                        {{ tour.statusLabel }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Tip Card -->
                    <div class="p-3 rounded-4 mt-3" style="background-color: #FAF5FF; border: 1px dashed #DDD6FE;">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bx bx-bulb font-18 text-purple mt-0-5"></i>
                            <div>
                                <span class="font-11 fw-bold text-dark d-block mb-1">Mẹo Thẩm Định:</span>
                                <p class="font-11 text-muted mb-0 lh-base">
                                    Các tour đi cano biển đảo cần kiểm tra kỹ giấy phép đăng kiểm phương tiện thủy nội địa và thẻ chứng chỉ thuyền viên trước khi xét duyệt lên sàn.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: CHI TIẾT THẨM ĐỊNH TOUR -->
            <div class="col-12 col-lg-8 col-xl-8">
                <div class="card border-0 shadow-xs rounded-4 bg-white p-3 p-lg-4">
                    <!-- Top Breadcrumb & Partner Pill Block -->
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-2">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="badge rounded-pill font-11 fw-bold px-3 py-1 font-mono" style="background-color: #FDF2F8; color: #E11D48;">
                                MÃ: {{ selectedTour.code }}
                            </span>
                            <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #F3E8FF; color: #7C3AED;">
                                {{ selectedTour.category }}
                            </span>
                            <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #E0F2FE; color: #0284C7;">
                                {{ selectedTour.subBadge || 'Cấp phép MÙA TỔNG LỄ' }}
                            </span>
                        </div>

                        <!-- Partner Profile Badge -->
                        <div class="d-flex align-items-center gap-2 p-1-5 px-3 rounded-pill border bg-light shadow-2xs">
                            <div class="partner-avatar-circle rounded-circle d-flex align-items-center justify-content-center text-white font-11 fw-bold" style="background-color: #7C3AED; width: 30px; height: 30px;">
                                DE
                            </div>
                            <div>
                                <div class="font-12 fw-bold text-dark d-flex align-items-center gap-1">
                                    <span>{{ selectedTour.partnerName }}</span>
                                    <i class="bx bxs-check-circle text-primary font-14"></i>
                                </div>
                                <div class="d-flex align-items-center gap-2 font-10">
                                    <span class="fw-bold text-pink">Đối Tác Vàng (Tier 1)</span>
                                    <span class="text-muted">•</span>
                                    <span class="text-muted d-flex align-items-center gap-0-5">
                                        <i class="bx bxs-star text-warning font-11"></i> 4.9 (420+ chuyến)
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Tour Title -->
                    <h3 class="fw-bold text-dark font-20 mb-3 mt-1">
                        {{ selectedTour.name }}
                    </h3>

                    <!-- 4 Info Metric Pills -->
                    <div class="row g-2 mb-4">
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="p-2-5 rounded-3 bg-light border d-flex align-items-center gap-2 h-100">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-pink" style="background-color: #FDF2F8; width: 32px; height: 32px;">
                                    <i class="bx bx-map-pin font-16"></i>
                                </div>
                                <div>
                                    <div class="font-9 text-muted fw-bold text-uppercase">LỘ TRÌNH</div>
                                    <div class="font-11 fw-bold text-dark text-truncate" style="max-width: 120px;" title="Điểm đón: Cảng Sông Hàn (Quận Hải Châu)">
                                        Điểm đón: Cảng Sông Hàn
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="p-2-5 rounded-3 bg-light border d-flex align-items-center gap-2 h-100">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-purple" style="background-color: #F5F3FF; width: 32px; height: 32px;">
                                    <i class="bx bx-user-voice font-16"></i>
                                </div>
                                <div>
                                    <div class="font-9 text-muted fw-bold text-uppercase">NGƯỜI HƯỚNG DẪN</div>
                                    <div class="font-11 fw-bold text-dark">Tiếng Việt, Tiếng Anh</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="p-2-5 rounded-3 bg-light border d-flex align-items-center gap-2 h-100">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-primary" style="background-color: #E0F2FE; width: 32px; height: 32px;">
                                    <i class="bx bx-time-five font-16"></i>
                                </div>
                                <div>
                                    <div class="font-9 text-muted fw-bold text-uppercase">THỜI LƯỢNG</div>
                                    <div class="font-11 fw-bold text-dark">8 tiếng (08:00 - 16:00)</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="p-2-5 rounded-3 bg-light border d-flex align-items-center gap-2 h-100">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-danger" style="background-color: #FEE2E2; width: 32px; height: 32px;">
                                    <i class="bx bx-shield-quarter font-16"></i>
                                </div>
                                <div>
                                    <div class="font-9 text-muted fw-bold text-uppercase">BẢO HIỂM DU LỊCH</div>
                                    <div class="font-11 fw-bold text-danger">100.000.000 đ/ng</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Panel 1: Biểu Giá Đăng Ký & Dịch Vụ Đi Kèm -->
                    <div class="border rounded-4 p-3 p-lg-4 mb-4" style="background-color: #FAFAFA;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-wallet font-18 text-pink"></i>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 font-14">Biểu Giá Đăng Ký & Dịch Vụ Đi Kèm</h6>
                                    <span class="font-11 text-muted">Bảng giá niêm yết theo chính sách bình ổn giá TP Đà Nẵng</span>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-11 fw-bold px-3 py-1" style="background-color: #EDE9FE; color: #7C3AED;">
                                Hoa hồng sàn: 12%
                            </span>
                        </div>

                        <!-- 3 Price Tier Cards -->
                        <div class="row g-3 mb-3">
                            <!-- Card 1: Vé người lớn -->
                            <div class="col-12 col-md-4">
                                <div class="price-tier-box p-3 rounded-4 bg-white border h-100 shadow-2xs position-relative" style="border-color: #FECDD3 !important; background-color: #FFF1F2 !important;">
                                    <span class="badge position-absolute top-0 end-0 m-2 font-9 fw-bold rounded-pill text-white" style="background-color: #E11D48;">
                                        Chuẩn sàn
                                    </span>
                                    <div class="font-11 text-muted fw-bold text-uppercase mb-1">VÉ NGƯỜI LỚN (Từ 11 tuổi)</div>
                                    <div class="font-20 fw-bold text-pink mb-1">{{ selectedTour.adultPriceStr }}</div>
                                    <div class="font-11 text-muted">Bao gồm trọn gói cano, áo phao và ăn trưa</div>
                                </div>
                            </div>

                            <!-- Card 2: Vé trẻ em -->
                            <div class="col-12 col-md-4">
                                <div class="price-tier-box p-3 rounded-4 bg-white border h-100 shadow-2xs">
                                    <div class="font-11 text-muted fw-bold text-uppercase mb-1">VÉ TRẺ EM (5 - 10 TUỔI)</div>
                                    <div class="font-20 fw-bold text-dark mb-1">{{ selectedTour.childPriceStr }}</div>
                                    <div class="font-11 text-muted">Áp dụng tiêu chuẩn giường và suất ăn trẻ em</div>
                                </div>
                            </div>

                            <!-- Card 3: Trẻ em dưới 5 tuổi -->
                            <div class="col-12 col-md-4">
                                <div class="price-tier-box p-3 rounded-4 bg-white border h-100 shadow-2xs">
                                    <div class="font-11 text-muted fw-bold text-uppercase mb-1">TRẺ EM (0 - 4 TUỔI)</div>
                                    <div class="font-20 fw-bold text-cyan mb-1">0 VNĐ</div>
                                    <div class="font-11 text-muted">Miễn phí hoàn toàn (Đi cùng gia đình)</div>
                                </div>
                            </div>
                        </div>

                        <!-- Quyền Lợi Đã Kiểm Tra Đầy Đủ (4 pills) -->
                        <div class="font-11 fw-bold text-muted text-uppercase tracking-wider mb-2">QUYỀN LỢI ĐÃ KIỂM TRA ĐẦY ĐỦ:</div>
                        <div class="row g-2 font-11">
                            <div class="col-12 col-md-6">
                                <div class="p-2 px-3 rounded-pill bg-white border d-flex align-items-center gap-2">
                                    <i class="bx bx-bus text-pink font-15"></i>
                                    <span class="text-dark fw-medium">Xe du lịch Ford Transit đưa đón tận nơi máy lạnh</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-2 px-3 rounded-pill bg-white border d-flex align-items-center gap-2">
                                    <i class="bx bx-dish text-pink font-15"></i>
                                    <span class="text-dark fw-medium">Bữa trưa hải sản chuẩn biển tại Nhà Hàng Bé Mặn</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-2 px-3 rounded-pill bg-white border d-flex align-items-center gap-2">
                                    <i class="bx bx-swim text-pink font-15"></i>
                                    <span class="text-dark fw-medium">Kính lặn, ống thở, áo phao tiêu chuẩn châu Âu</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-2 px-3 rounded-pill bg-white border d-flex align-items-center gap-2">
                                    <i class="bx bx-id-card text-pink font-15"></i>
                                    <span class="text-dark fw-medium">Hướng dẫn viên suốt tuyến có thẻ Quốc tế</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Panel 2: Lộ Trình Tuyến Điểm & Tối Ưu OSRM -->
                    <div class="border rounded-4 p-3 p-lg-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-navigation font-18 text-primary"></i>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 font-14">Lộ Trình Tuyến Điểm & Tối Ưu OSRM</h6>
                                    <span class="font-11 text-muted">Bản đồ tự động kết nối 3 POI (Tổng cự ly: 42 km - Thời gian: 1h15p)</span>
                                </div>
                            </div>
                            <span class="badge rounded-pill font-11 fw-semibold px-3 py-1" style="background-color: #E0F2FE; color: #0284C7;">
                                <i class="bx bx-info-circle me-1"></i> Thuật toán OSRM OpenRouteService đã kiểm tra
                            </span>
                        </div>

                        <!-- Map Preview Container -->
                        <div class="osrm-map-box rounded-4 overflow-hidden position-relative mb-3 border" style="height: 220px; background: linear-gradient(135deg, #a7f3d0 0%, #bae6fd 50%, #c7d2fe 100%);">
                            <!-- SVG Map Graphic Representation of Son Tra Coastline -->
                            <svg class="w-100 h-100" viewBox="0 0 700 220" preserveAspectRatio="none">
                                <!-- Sea & Land Contours -->
                                <path d="M 0,0 L 700,0 L 700,140 Q 550,180 400,130 T 200,160 T 0,200 Z" fill="#93C5FD" opacity="0.35"/>
                                <path d="M 120,220 Q 250,90 420,110 T 680,80 L 700,220 Z" fill="#BBF7D0" opacity="0.4"/>
                                
                                <!-- Route Path Line -->
                                <path d="M 160,180 Q 280,120 440,135 T 580,110" fill="none" stroke="#E11D48" stroke-width="4" stroke-dasharray="6,4"/>
                            </svg>

                            <!-- Son Tra Peninsula Mountain Landmark Overlay -->
                            <div class="position-absolute top-50 start-50 translate-middle text-center p-2 rounded-3 bg-white bg-opacity-75 shadow-xs border">
                                <span class="font-10 fw-bold text-secondary text-uppercase d-block">Bán đảo Sơn Trà & Vịnh Đà Nẵng</span>
                                <span class="font-9 text-muted">InterContinental Danang Sun Peninsula Resort Area</span>
                            </div>

                            <!-- Waypoint Markers Overlay on Map -->
                            <div class="position-absolute d-flex align-items-center justify-content-between px-4 w-100" style="bottom: 15px;">
                                <div class="waypoint-badge d-flex align-items-center gap-1-5 px-3 py-1 rounded-pill bg-white shadow-sm border font-11 fw-bold text-dark">
                                    <span class="waypoint-num" style="background-color: #E11D48;">1</span>
                                    <span>Khởi hành: Trung Tâm</span>
                                </div>
                                <div class="waypoint-badge d-flex align-items-center gap-1-5 px-3 py-1 rounded-pill bg-white shadow-sm border font-11 fw-bold text-dark">
                                    <span class="waypoint-num" style="background-color: #7C3AED;">2</span>
                                    <span>Bãi Bụt Sơn Trà</span>
                                </div>
                                <div class="waypoint-badge d-flex align-items-center gap-1-5 px-3 py-1 rounded-pill bg-white shadow-sm border font-11 fw-bold text-dark">
                                    <span class="waypoint-num" style="background-color: #0284C7;">3</span>
                                    <span>Đỉnh Bàn Cờ</span>
                                </div>
                            </div>
                        </div>

                        <!-- 3 GIS Safety Assessment Pills below map -->
                        <div class="row g-2 font-11">
                            <div class="col-12 col-md-4">
                                <div class="p-2 px-3 rounded-pill bg-light border d-flex align-items-center gap-2">
                                    <i class="bx bx-check-circle text-success font-16"></i>
                                    <div>
                                        <div class="fw-bold text-dark">Tọa độ: Cảng Sông Hàn - Vũng Sơn Trà</div>
                                        <div class="text-muted font-10">Đảm bảo an toàn luồng lạch.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="p-2 px-3 rounded-pill bg-light border d-flex align-items-center gap-2">
                                    <i class="bx bx-check-circle text-success font-16"></i>
                                    <div>
                                        <div class="fw-bold text-dark">Tọa độ bến cano</div>
                                        <div class="text-muted font-10">Đã đối soát Cảng vụ đường thủy.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="p-2 px-3 rounded-pill bg-light border d-flex align-items-center gap-2">
                                    <i class="bx bx-check-circle text-success font-16"></i>
                                    <div>
                                        <div class="fw-bold text-dark">Vùng cấm quân sự</div>
                                        <div class="text-muted font-10">Hoàn toàn không vi phạm.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2 Columns Below: Chính Sách Hủy Tour & Lịch Khởi Hành Mẫu -->
                    <div class="row g-3 mb-4">
                        <!-- Left Box: Chính Sách Hủy Tour -->
                        <div class="col-12 col-md-6">
                            <div class="border rounded-4 p-3 bg-white h-100">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bx bx-calendar-x text-pink font-18"></i>
                                    <h6 class="font-13 fw-bold text-dark mb-0">Chính Sách Hủy Tour</h6>
                                </div>
                                <div class="d-flex flex-column gap-2 font-11">
                                    <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light">
                                        <span class="text-dark fw-medium">Hủy trước 48 giờ</span>
                                        <span class="badge rounded-pill font-11 fw-bold px-2-5 py-1" style="background-color: #E0F2FE; color: #0284C7;">
                                            Hoàn 100% tiền
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light">
                                        <span class="text-dark fw-medium">Hủy trước 24 giờ - 48 giờ</span>
                                        <span class="badge rounded-pill font-11 fw-bold px-2-5 py-1" style="background-color: #F5F3FF; color: #7C3AED;">
                                            Hoàn 50% tiền
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center p-2 rounded-3 bg-light">
                                        <span class="text-dark fw-medium">Hủy trong vòng 24 giờ</span>
                                        <span class="badge rounded-pill font-11 fw-bold px-2-5 py-1" style="background-color: #FEE2E2; color: #DC2626;">
                                            Không hoàn tiền
                                        </span>
                                    </div>
                                </div>
                                <div class="font-10 text-muted mt-2 fst-italic">
                                    Đã tuân thủ chuẩn quy định thương mại điện tử TP Đà Nẵng.
                                </div>
                            </div>
                        </div>

                        <!-- Right Box: Lịch Khởi Hành Mẫu -->
                        <div class="col-12 col-md-6">
                            <div class="border rounded-4 p-3 bg-white h-100">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bx bx-calendar-event text-purple font-18"></i>
                                        <h6 class="font-13 fw-bold text-dark mb-0">Lịch Khởi Hành Mẫu</h6>
                                    </div>
                                    <span class="badge rounded-pill font-9 fw-bold px-2 py-0-5" style="background-color: #FDF2F8; color: #E11D48;">
                                        HÀNG NGÀY
                                    </span>
                                </div>
                                <div class="font-11 text-muted mb-2">
                                    <div class="d-flex justify-content-between py-1 border-bottom">
                                        <span>Giờ đón khách:</span>
                                        <b class="text-dark">07:30 - 08:00</b>
                                    </div>
                                    <div class="d-flex justify-content-between py-1 border-bottom">
                                        <span>Giờ kết thúc & Trả khách:</span>
                                        <b class="text-dark">16:00 - 17:00</b>
                                    </div>
                                    <div class="d-flex justify-content-between py-1">
                                        <span>Tần suất vận hành:</span>
                                        <b class="text-dark">Phổ biến trong tuần (12 chuyến)</b>
                                    </div>
                                </div>
                                <!-- Micro Timeline -->
                                <div class="d-flex align-items-center justify-content-between text-center pt-2 border-top font-10">
                                    <div>
                                        <b class="text-dark d-block">07:30</b>
                                        <span class="text-muted">Đón</span>
                                    </div>
                                    <i class="bx bx-right-arrow-alt text-muted"></i>
                                    <div>
                                        <b class="text-dark d-block">09:00</b>
                                        <span class="text-muted">Lặn san hô</span>
                                    </div>
                                    <i class="bx bx-right-arrow-alt text-muted"></i>
                                    <div>
                                        <b class="text-dark d-block">12:30</b>
                                        <span class="text-muted">Ăn trưa</span>
                                    </div>
                                    <i class="bx bx-right-arrow-alt text-muted"></i>
                                    <div>
                                        <b class="text-dark d-block">16:00</b>
                                        <span class="text-muted">Trả khách</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Panel 3: Quyết Định Kiểm Duyệt Tour (Bottom Action Form) -->
                    <div class="border rounded-4 p-3 p-lg-4" style="background-color: #FFFDFD; border-color: #FECDD3 !important;">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="background-color: #7C3AED; width: 32px; height: 32px;">
                                <i class="bx bx-check-double font-18"></i>
                            </div>
                            <div>
                                <h6 class="font-14 fw-bold text-dark mb-0">Quyết Định Kiểm Duyệt Tour</h6>
                                <span class="font-11 text-muted">Phản hồi sẽ được gửi tự động qua email & dashboard đối tác {{ selectedTour.partnerName }}</span>
                            </div>
                        </div>

                        <!-- Feedback Textarea -->
                        <div class="mb-3">
                            <label class="form-label font-11 fw-bold text-dark text-uppercase tracking-wider mb-1">
                                GHI CHÚ PHẢN HỒI CHO ĐƠN VỊ LỮ HÀNH (TÙY CHỌN KHI DUYỆT, BẮT BUỘC KHI TỪ CHỐI):
                            </label>
                            <textarea 
                                v-model="moderationNote" 
                                class="form-control font-12 rounded-3 text-secondary" 
                                rows="3"
                                placeholder="Nhập nhận xét về lộ trình di chuyển, chứng từ bảo hiểm hoặc yêu cầu bổ sung thông tin chi tiết..."
                            ></textarea>
                        </div>

                        <!-- Bottom Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2 border-top">
                            <button 
                                class="btn btn-sm rounded-pill px-3 py-2 font-12 fw-bold d-flex align-items-center gap-1"
                                style="background-color: #FEE2E2; color: #DC2626; border: 1px solid #FECACA;"
                                @click="tuChoiTour"
                            >
                                <i class="bx bx-x font-16"></i>
                                <span>Từ Chối Tour</span>
                            </button>

                            <div class="d-flex align-items-center gap-2">
                                <button 
                                    class="btn btn-sm rounded-pill px-3 py-2 font-12 fw-bold d-flex align-items-center gap-1"
                                    style="background-color: #EDE9FE; color: #7C3AED; border: 1px solid #DDD6FE;"
                                    @click="yeuCauChinhSua"
                                >
                                    <i class="bx bx-edit font-16"></i>
                                    <span>Yêu Cầu Chỉnh Sửa Lộ Trình</span>
                                </button>
                                <button 
                                    class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4 py-2 font-12 fw-bold shadow-sm d-flex align-items-center gap-1"
                                    @click="pheDuyetTour"
                                >
                                    <i class="bx bx-check font-16"></i>
                                    <span>Phê Duyệt & Xuất Bản Lên Sàn</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL: QUY CHUẨN DUYỆT TOUR -->
        <div v-if="showModalQuyChuan" class="custom-modal-backdrop">
            <div class="custom-modal-content rounded-4 p-4 bg-white shadow-lg" style="max-width: 620px; width: 92%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0 font-16 d-flex align-items-center gap-2">
                        <i class="bx bx-book-content text-pink"></i> Quy Chuẩn Kiểm Định Tour Du Lịch SmartTrip
                    </h5>
                    <button class="btn btn-sm btn-light rounded-circle p-1" @click="showModalQuyChuan = false">
                        <i class="bx bx-x font-18"></i>
                    </button>
                </div>
                <div class="font-12 text-secondary mb-3 lh-base">
                    <p class="mb-2"><strong>1. An toàn lộ trình (OSRM):</strong> Không được đi qua các khu vực cấm bay, quân sự, vùng nước nguy hiểm hoặc đường đèo cấm xe khách cỡ lớn.</p>
                    <p class="mb-2"><strong>2. Bảo hiểm bắt buộc:</strong> Hạn mức bồi thường tối thiểu 100.000.000 VNĐ/du khách/vụ.</p>
                    <p class="mb-2"><strong>3. Chính sách giá dịp lễ (DIFF 2025):</strong> Không tăng giá vé quá 20% so với giá niêm yết ngày thường đã đăng ký với Sở Du Lịch.</p>
                    <p class="mb-0"><strong>4. Giấy phép cano:</strong> Phải có chứng chỉ đăng kiểm và số lượng áo phao đạt chuẩn 100% khách trên tàu.</p>
                </div>
                <div class="d-flex justify-content-end pt-2 border-top">
                    <button class="btn btn-sm btn-pink-gradient text-white rounded-pill px-4" @click="showModalQuyChuan = false">Đã Hiểu</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'KiemDuyetTourAdminComponent',
    data() {
        return {
            activeSortLabel: 'Tất cả (15)',
            filterStatus: 'all',
            moderationNote: '',
            showModalQuyChuan: false,

            // Danh sách Tour chờ duyệt (Khớp 100% hình ảnh)
            tours: [
                {
                    id: 1,
                    code: 'TOUR-ST-DN-2025-004',
                    name: 'Khám Phá Rừng Già Bán Đảo Sơn Trà & Lặn Ngắm San Hô Hòn Sụp 1 Ngày',
                    category: 'Khám phá biển đảo & Sinh thái',
                    subBadge: 'Cấp phép MÙA TỔNG LỄ',
                    partnerName: 'Danang Explorer Corp',
                    partnerTier: 'Đối Tác Vàng (Tier 1)',
                    adultPriceStr: '1.250.000 đ',
                    childPriceStr: '850.000 VNĐ',
                    image: 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=150&auto=format&fit=crop&q=60',
                    has360: true,
                    timeAgo: 'Gửi 2 giờ trước',
                    district: 'Bán đảo Sơn Trà',
                    statusLabel: 'OSRM Checked',
                    statusBg: '#E0F2FE',
                    statusColor: '#0284C7',
                    tagText: '#DIFF-2025 • Ưu tiên cao nhất',
                    tagBg: '#FDF2F8',
                    tagColor: '#E11D48',
                    isUrgent: true,
                    isRevised: false
                },
                {
                    id: 2,
                    code: 'TOUR-HOIAN-DN-2025-012',
                    name: 'Tour Hoàng Hôn Phố Cổ & Thả Hoa Đăng Sông Hoài',
                    category: 'Di sản văn hóa & Ẩm thực',
                    subBadge: 'Chuẩn UNESCO',
                    partnerName: 'Dana Heritage Travel',
                    partnerTier: 'Đối Tác Bạc',
                    adultPriceStr: '850.000 đ',
                    childPriceStr: '550.000 VNĐ',
                    image: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=150&auto=format&fit=crop&q=60',
                    has360: false,
                    timeAgo: 'Còn 4h kiểm định',
                    district: 'Phố Cổ Hội An',
                    statusLabel: 'Chờ duyệt',
                    statusBg: '#FEF3C7',
                    statusColor: '#D97706',
                    tagText: 'DIFF 2025',
                    tagBg: '#E0F2FE',
                    tagColor: '#0284C7',
                    isUrgent: true,
                    isRevised: false
                },
                {
                    id: 3,
                    code: 'TOUR-BANA-DN-2025-018',
                    name: 'Chinh Phục Đỉnh Bà Nà & Cây Cầu Bàn Tay Vàng Đón Mây',
                    category: 'Công viên chủ đề & Check-in',
                    subBadge: 'Best Seller',
                    partnerName: 'Sun Viet Adventure',
                    partnerTier: 'Đối Tác Kim Cương',
                    adultPriceStr: '950.000 đ',
                    childPriceStr: '700.000 VNĐ',
                    image: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=150&auto=format&fit=crop&q=60',
                    has360: true,
                    timeAgo: 'Gửi 8h trước',
                    district: 'Hòa Vang, Bà Nà',
                    statusLabel: 'Chờ duyệt',
                    statusBg: '#FEF3C7',
                    statusColor: '#D97706',
                    tagText: '#DIFF 2025',
                    tagBg: '#F5F3FF',
                    tagColor: '#7C3AED',
                    isUrgent: false,
                    isRevised: true
                }
            ],

            // Active selected tour (Mặc định chọn Tour 1 như trong hình)
            selectedTour: {}
        };
    },
    computed: {
        filteredTours() {
            if (this.filterStatus === 'urgent') {
                return this.tours.filter(t => t.isUrgent);
            } else if (this.filterStatus === 'revised') {
                return this.tours.filter(t => t.isRevised);
            }
            return this.tours;
        }
    },
    created() {
        if (this.tours.length > 0) {
            this.selectedTour = JSON.parse(JSON.stringify(this.tours[0]));
        }
    },
    methods: {
        selectTour(tour) {
            this.selectedTour = JSON.parse(JSON.stringify(tour));
            this.moderationNote = '';
        },
        openModalQuyChuan() {
            this.showModalQuyChuan = true;
        },
        xuatDanhSach() {
            alert('Đang trích xuất danh sách 15 tour du lịch chờ duyệt định dạng Excel / PDF...');
        },
        duyetNhanhHangLoat() {
            if (confirm('Bạn có chắc chắn muốn duyệt nhanh toàn bộ các tour đạt 100% chuẩn kiểm định OSRM & Bảo hiểm?')) {
                alert('Đã phê duyệt nhanh thành công 12 tour đạt chuẩn!');
            }
        },
        pheDuyetTour() {
            alert(`Đã PHÊ DUYỆT thành công tour "${this.selectedTour.name}"! Thông báo đã gửi tới đối tác ${this.selectedTour.partnerName} và tour đã chính thức mở bán trên sàn.`);
        },
        yeuCauChinhSua() {
            if (!this.moderationNote.trim()) {
                alert('Vui lòng nhập nội dung ghi chú phản hồi yêu cầu đối tác chỉnh sửa lộ trình!');
                return;
            }
            alert(`Đã gửi yêu cầu chỉnh sửa tour cho đối tác ${this.selectedTour.partnerName}: "${this.moderationNote}"`);
        },
        tuChoiTour() {
            if (!this.moderationNote.trim()) {
                alert('Vui lòng nhập lý do từ chối tour vào ô ghi chú phản hồi!');
                return;
            }
            if (confirm(`Bạn có chắc muốn từ chối kiểm duyệt tour này?`)) {
                alert(`Đã từ chối tour "${this.selectedTour.name}". Lý do: ${this.moderationNote}`);
            }
        }
    }
};
</script>

<style scoped>
.tour-moderation-page {
    background-color: #F8FAFC;
    min-height: 100vh;
}

.font-28 { font-size: 28px; }
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
.font-8 { font-size: 8px; }

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

.dot-pink {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #E11D48;
    display: inline-block;
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

.shadow-xs {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.shadow-2xs {
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
}

.cursor-pointer { cursor: pointer; }

/* Left Queue Cards */
.active-tour-card {
    background-color: #FFF1F2 !important;
    border-color: #FECDD3 !important;
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.08) !important;
}

.hover-shadow:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
    border-color: #E2E8F0;
}

.badge-360-sm {
    bottom: -2px;
    right: -2px;
    background-color: #0F172A;
    color: #FFFFFF;
    padding: 1px 3px;
    border-radius: 3px;
    border: 1px solid #FFFFFF;
}

.waypoint-badge {
    backdrop-filter: blur(4px);
}

.waypoint-num {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    color: #FFFFFF;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
}

.p-2-5 { padding: 10px; }
.gap-1-5 { gap: 6px; }
.gap-2-5 { gap: 10px; }
.tracking-wider { letter-spacing: 0.05em; }

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
