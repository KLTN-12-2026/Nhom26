<template>
    <div class="danh-muc-tour-page pb-5">
        <!-- 1. Top KYC Partner Verification Banner -->
        <div class="kyc-partner-banner mb-4 p-3 p-md-4 rounded-4 shadow-sm d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="kyc-icon-circle">
                    <i class="bx bxs-badge-check"></i>
                </div>
                <div>
                    <div class="kyc-banner-title fw-bold text-uppercase">
                        Chứng Nhận Đối Tác Số Hóa
                    </div>
                    <div class="text-secondary small mt-1">
                        100% Đơn vị lữ hành đạt chuẩn KYC Sở Du Lịch Đà Nẵng & Liên minh Lữ hành Miền Trung
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <span class="badge bg-white text-success border border-success-subtle rounded-pill px-3 py-2 d-flex align-items-center gap-2 shadow-xs">
                    <span class="pulse-indicator"></span>
                    <strong class="text-dark">28 Lịch khởi hành hôm nay</strong>
                </span>
                <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 py-2 fw-semibold" @click="showKycModal = true">
                    <i class="bx bx-shield-quarter me-1"></i>Xem chính sách KYC
                </button>
            </div>
        </div>

        <!-- 2. Header & Stats Row -->
        <div class="row align-items-center mb-4 g-4">
            <div class="col-lg-7">
                <div class="route-tag-pill mb-2 d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill">
                    <i class="bx bx-navigation text-pink"></i>
                    <span>tour_du_lich &gt; tuyen_diem_tour &gt; KYC Verified</span>
                </div>
                <h1 class="page-title fw-bold text-dark mb-2">
                    Danh Mục Tour Du Lịch Đà Nẵng &amp; So Sánh Tuyến
                </h1>
                <p class="text-secondary mb-0 line-clamp-2" style="font-size: 0.95rem;">
                    Tìm kiếm gói tour trọn gói hoặc trong ngày từ các đơn vị lữ hành uy tín đã kiểm duyệt KYC. So sánh đa chiều lịch trình, dịch vụ đính kèm và chính sách hoàn hủy tức thì.
                </p>
            </div>
            <div class="col-lg-5">
                <div class="d-flex gap-2 gap-sm-3 justify-content-lg-end">
                    <div class="stat-box text-center p-3 rounded-4 shadow-sm bg-white flex-fill border">
                        <div class="stat-number fw-bold text-pink">42+</div>
                        <div class="stat-label text-muted small fw-semibold text-uppercase">Tuyến Điểm</div>
                    </div>
                    <div class="stat-box text-center p-3 rounded-4 shadow-sm bg-white flex-fill border">
                        <div class="stat-number fw-bold text-indigo">98.6%</div>
                        <div class="stat-label text-muted small fw-semibold text-uppercase">Hài Lòng</div>
                    </div>
                    <div class="stat-box text-center p-3 rounded-4 shadow-sm bg-white flex-fill border">
                        <div class="stat-number fw-bold text-teal">0 đ</div>
                        <div class="stat-label text-muted small fw-semibold text-uppercase">Phí Đổi Trả 24H</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Advanced Search & Filter Bar -->
        <div class="filter-card card border rounded-4 shadow-sm p-4 mb-4 bg-white">
            <div class="search-input-group position-relative mb-3">
                <i class="bx bx-search search-icon position-absolute"></i>
                <input 
                    type="text" 
                    class="form-control search-input rounded-pill ps-5 pe-5 py-2" 
                    placeholder="Tìm theo tên tour, danh thắng (Cầu Rồng, Ngũ Hành Sơn, Bà Nà Hills, Cù Lao Chàm)..."
                    v-model="key_search"
                >
                <button v-if="key_search" class="btn btn-sm btn-clear position-absolute" @click="key_search = ''">
                    <i class="bx bx-x"></i>
                </button>
                <button type="button" class="btn btn-apply-filter rounded-pill px-4 fw-bold text-white position-absolute end-0 top-50 translate-middle-y me-2" @click="applyFilters">
                    <i class="bx bx-filter-alt me-1"></i>Áp Dụng Lọc
                </button>
            </div>

            <!-- Filter rows -->
            <div class="filter-rows-container d-flex flex-column gap-2 pt-2">
                <!-- Row 1: Thời gian -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="filter-label text-muted small fw-semibold d-flex align-items-center me-2">
                        <i class="bx bx-time me-1 text-pink"></i>Thời Gian:
                    </span>
                    <button 
                        v-for="opt in filterOptions.duration" 
                        :key="opt.value"
                        class="btn btn-filter-pill btn-sm rounded-pill"
                        :class="{ active: selectedFilters.duration === opt.value }"
                        @click="selectedFilters.duration = opt.value"
                    >
                        {{ opt.label }}
                    </button>
                </div>

                <!-- Row 2: Khoảng giá -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="filter-label text-muted small fw-semibold d-flex align-items-center me-2">
                        <i class="bx bx-wallet me-1 text-pink"></i>Khoảng Giá / Khách:
                    </span>
                    <button 
                        v-for="opt in filterOptions.price" 
                        :key="opt.value"
                        class="btn btn-filter-pill btn-sm rounded-pill"
                        :class="{ active: selectedFilters.price === opt.value }"
                        @click="selectedFilters.price = opt.value"
                    >
                        {{ opt.label }}
                    </button>
                </div>

                <!-- Row 3: Hình thức tour -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="filter-label text-muted small fw-semibold d-flex align-items-center me-2">
                        <i class="bx bx-group me-1 text-pink"></i>Hình Thức Tour:
                    </span>
                    <button 
                        v-for="opt in filterOptions.type" 
                        :key="opt.value"
                        class="btn btn-filter-pill btn-sm rounded-pill"
                        :class="{ active: selectedFilters.type === opt.value }"
                        @click="selectedFilters.type = opt.value"
                    >
                        {{ opt.label }}
                    </button>
                </div>

                <!-- Row 4: Đánh giá -->
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="filter-label text-muted small fw-semibold d-flex align-items-center me-2">
                        <i class="bx bxs-star me-1 text-pink"></i>Đánh Giá Lữ Hành:
                    </span>
                    <button 
                        v-for="opt in filterOptions.rating" 
                        :key="opt.value"
                        class="btn btn-filter-pill btn-sm rounded-pill"
                        :class="{ active: selectedFilters.rating === opt.value }"
                        @click="selectedFilters.rating = opt.value"
                    >
                        {{ opt.label }}
                    </button>
                </div>
            </div>
        </div>

        <!-- 4. Comparison Notice Bar -->
        <div class="comparison-bar rounded-4 p-3 mb-4 d-flex flex-wrap align-items-center justify-content-between gap-3 shadow-sm">
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="compare-badge-icon rounded-3 text-white d-flex align-items-center justify-content-center">
                    <i class="bx bx-git-compare fs-5"></i>
                </div>
                <div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="badge bg-white text-pink fw-bold px-2 py-1 border border-pink-subtle">
                            ĐANG SO SÁNH ({{ so_sanh_items.length }}/3 TOUR)
                        </span>
                        <span class="text-secondary small">Chọn tối đa 3 tuyến</span>
                    </div>
                    <div class="d-flex gap-2 flex-wrap mt-2">
                        <span 
                            v-for="(tour, idx) in so_sanh_items" 
                            :key="tour.id"
                            class="compare-chip rounded-pill px-3 py-1 small fw-semibold d-inline-flex align-items-center gap-1"
                            :class="idx === 0 ? 'chip-pink' : 'chip-purple'"
                        >
                            Tour {{ idx + 1 }}: {{ tour.ten_rut_gon || tour.ten_tour }}
                            <button type="button" class="btn-chip-remove" @click.stop="removeSoSanh(tour.id)">
                                <i class="bx bx-x"></i>
                            </button>
                        </span>
                        <span v-if="so_sanh_items.length === 0" class="text-muted small fst-italic py-1">
                            Chưa chọn tour nào. Bấm nút so sánh ở từng tour để đưa vào bảng!
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button 
                    type="button" 
                    class="btn btn-view-compare rounded-pill px-3 py-2 fw-bold text-white d-flex align-items-center gap-2"
                    @click="scrollToMatrix"
                >
                    <i class="bx bx-table fs-6"></i>
                    <span>XEM BẢNG SO SÁNH CHI TIẾT</span>
                </button>
                <button 
                    type="button" 
                    class="btn btn-outline-secondary btn-icon-round rounded-circle"
                    title="Lưu bảng so sánh"
                    @click="handleSaveCompare"
                >
                    <i class="bx bx-bookmark"></i>
                </button>
            </div>
        </div>

        <!-- 5. Side-by-Side Matrix Comparison (Bảng Ma Trận So Sánh Đối Đầu) -->
        <div id="sideBySideMatrix" class="matrix-card card border rounded-4 shadow-sm p-4 mb-5 bg-white">
            <div class="d-flex align-items-center gap-2 text-pink fw-bold small text-uppercase mb-1">
                <i class="bx bx-git-compare"></i>
                <span>ĐỐI ĐẦU TRỰC DIỆN LỊCH TRÌNH</span>
            </div>
            <h2 class="h4 fw-bold text-dark mb-1">
                Bảng Ma Trận So Sánh Đối Đầu (Side-by-Side Matrix)
            </h2>
            <p class="text-secondary small mb-4">
                Phân tích rõ ràng điều kiện dịch vụ bao gồm, nhà tổ chức KYC, và chính sách hoàn hủy từ cơ sở dữ liệu.
            </p>

            <div class="matrix-table-wrapper">
                <table class="table matrix-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="col-criteria" style="width: 20%;">
                                <span class="text-muted small fw-semibold">Tiêu chí Đánh giá</span>
                            </th>
                            <th class="col-tour-header" style="width: 40%;">
                                <div class="tour-header-box p-2 p-md-3 rounded-4 position-relative">
                                    <div class="d-flex justify-content-between align-items-start gap-1">
                                        <span class="badge badge-vip text-white rounded-pill px-2 py-1 small fw-bold mb-2">
                                            LỰA CHỌN VIP
                                        </span>
                                        <button type="button" class="btn-close-column" @click="handleRemoveTourCompare(0)">
                                            <i class="bx bx-x"></i>
                                        </button>
                                    </div>
                                    <h3 class="h6 fw-bold text-dark mb-1 text-break">
                                        {{ currentCompareTour1.ten_tour }}
                                    </h3>
                                    <div class="small text-pink d-flex align-items-center gap-1 text-break">
                                        <i class="bx bxs-check-shield flex-shrink-0"></i>
                                        <span>{{ currentCompareTour1.nha_to_chuc }}</span>
                                    </div>
                                </div>
                            </th>
                            <th class="col-tour-header" style="width: 40%;">
                                <div class="tour-header-box p-2 p-md-3 rounded-4 position-relative">
                                    <div class="d-flex justify-content-between align-items-start gap-1">
                                        <span class="badge badge-popular text-white rounded-pill px-2 py-1 small fw-bold mb-2">
                                            LỰA CHỌN PHỔ BIẾN
                                        </span>
                                        <button type="button" class="btn-close-column" @click="handleRemoveTourCompare(1)">
                                            <i class="bx bx-x"></i>
                                        </button>
                                    </div>
                                    <h3 class="h6 fw-bold text-dark mb-1 text-break">
                                        {{ currentCompareTour2.ten_tour }}
                                    </h3>
                                    <div class="small text-purple d-flex align-items-center gap-1 text-break">
                                        <i class="bx bxs-check-shield flex-shrink-0"></i>
                                        <span>{{ currentCompareTour2.nha_to_chuc }}</span>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1: Giá & Trẻ em -->
                        <tr>
                            <td class="criteria-cell">
                                <div class="d-flex align-items-center gap-1 gap-md-2 fw-bold text-dark small">
                                    <i class="bx bx-money text-pink fs-5 flex-shrink-0"></i>
                                    <span class="text-break">Giá &amp; Trẻ em</span>
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="price-highlight text-pink fw-bold fs-5 mb-1">
                                    {{ formatVND(currentCompareTour1.gia_ban) }} <span class="fs-6 fw-normal text-muted">/ Khách lớn</span>
                                </div>
                                <div class="text-secondary small mb-1 text-break">
                                    <strong>Trẻ em (1m-1m4):</strong> 950.000 đ (Dưới 1m Free)
                                </div>
                                <div class="text-success small text-break">
                                    <i class="bx bx-check-circle me-1"></i>Dưới 1m: Miễn phí hoàn toàn 100%
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="price-highlight text-purple fw-bold fs-5 mb-1">
                                    {{ formatVND(currentCompareTour2.gia_ban) }} <span class="fs-6 fw-normal text-muted">/ Khách lớn</span>
                                </div>
                                <div class="text-secondary small mb-1 text-break">
                                    <strong>Trẻ em (1-4 tuổi):</strong> 50% vé người lớn
                                </div>
                                <div class="text-success small text-break">
                                    <i class="bx bx-check-circle me-1"></i>Dưới 1 tuổi: Miễn phí (ngồi cùng bố mẹ)
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2: Giờ & Thời lượng -->
                        <tr>
                            <td class="criteria-cell">
                                <div class="d-flex align-items-center gap-1 gap-md-2 fw-bold text-dark small">
                                    <i class="bx bx-time text-pink fs-5 flex-shrink-0"></i>
                                    <span class="text-break">Giờ &amp; Thời lượng</span>
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="fw-bold text-dark mb-1 text-break">07:30 – 17:00 (1 Ngày)</div>
                                <div class="text-secondary small text-break">
                                    Xe Limousine đón tận nơi khách sạn trung tâm &amp; ven biển Mỹ Khê.
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="fw-bold text-dark mb-1 text-break">14:00 – 21:30 (Khám phá chiều tối)</div>
                                <div class="text-secondary small text-break">
                                    Đón tại khách sạn Đà Nẵng hoặc Nhà Hát Trung tâm.
                                </div>
                            </td>
                        </tr>

                        <!-- Row 3: Tuyến Điểm Tour -->
                        <tr>
                            <td class="criteria-cell">
                                <div class="d-flex align-items-center gap-1 gap-md-2 fw-bold text-dark small">
                                    <i class="bx bx-map-pin text-pink fs-5 flex-shrink-0"></i>
                                    <span class="text-break">Tuyến Điểm Tour</span>
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge badge-route-pink text-break">Cáp treo Suối Mơ</span>
                                    <span class="badge badge-route-pink text-break">Cầu Vàng Không Lối</span>
                                    <span class="badge badge-route-pink text-break">Làng Pháp &amp; Đầm Rượu Debay</span>
                                    <span class="badge badge-route-pink text-break">Fantasy Park (105 trò)</span>
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge badge-route-purple text-break">Chùa Linh Ứng Sơn Trà</span>
                                    <span class="badge badge-route-purple text-break">Động Huyền Không</span>
                                    <span class="badge badge-route-purple text-break">Làng Đá Mỹ Nghệ Non Nước</span>
                                    <span class="badge badge-route-purple text-break">Chùa Cầu &amp; Thả Hoa Đăng Hội An</span>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 4: Dịch Vụ Bao Gồm -->
                        <tr>
                            <td class="criteria-cell">
                                <div class="d-flex align-items-center gap-1 gap-md-2 fw-bold text-dark small">
                                    <i class="bx bx-check-shield text-pink fs-5 flex-shrink-0"></i>
                                    <span class="text-break">Dịch Vụ Bao Gồm</span>
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <ul class="list-unstyled mb-0 d-flex flex-column gap-1 small">
                                    <li class="d-flex align-items-start gap-1 gap-md-2">
                                        <i class="bx bx-check-circle text-teal mt-1 flex-shrink-0"></i>
                                        <span class="text-break">Vé Cáp Treo khứ hồi Sun World (trị giá 900.000đ)</span>
                                    </li>
                                    <li class="d-flex align-items-start gap-1 gap-md-2">
                                        <i class="bx bx-check-circle text-teal mt-1 flex-shrink-0"></i>
                                        <span class="text-break">Bữa trưa Buffet A-la-carte 100 món tại Nhà hàng 4 sao</span>
                                    </li>
                                    <li class="d-flex align-items-start gap-1 gap-md-2">
                                        <i class="bx bx-check-circle text-teal mt-1 flex-shrink-0"></i>
                                        <span class="text-break">HDV tiếng Việt/Anh thẻ quốc tế thuyết minh suốt tuyến</span>
                                    </li>
                                    <li class="d-flex align-items-start gap-1 gap-md-2">
                                        <i class="bx bx-check-circle text-teal mt-1 flex-shrink-0"></i>
                                        <span class="text-break">Bảo hiểm Du Lịch mức bồi thường 100.000.000đ/vụ</span>
                                    </li>
                                </ul>
                            </td>
                            <td class="tour-data-cell">
                                <ul class="list-unstyled mb-0 d-flex flex-column gap-1 small">
                                    <li class="d-flex align-items-start gap-1 gap-md-2">
                                        <i class="bx bx-check-circle text-teal mt-1 flex-shrink-0"></i>
                                        <span class="text-break">Vé tham quan Ngũ Hành Sơn + Vé đi thuyền câu hoa đăng</span>
                                    </li>
                                    <li class="d-flex align-items-start gap-1 gap-md-2">
                                        <i class="bx bx-check-circle text-teal mt-1 flex-shrink-0"></i>
                                        <span class="text-break">Bữa tối đặc sản Hội An (Cao Lầu, cơm gà, bánh bao vạc)</span>
                                    </li>
                                    <li class="d-flex align-items-start gap-1 gap-md-2">
                                        <i class="bx bx-check-circle text-teal mt-1 flex-shrink-0"></i>
                                        <span class="text-break">Xe Ford Transit đời mới máy lạnh đưa đón</span>
                                    </li>
                                    <li class="d-flex align-items-start gap-1 gap-md-2">
                                        <i class="bx bx-check-circle text-teal mt-1 flex-shrink-0"></i>
                                        <span class="text-break">Nước suối tinh khiết &amp; Khăn lạnh trên xe</span>
                                    </li>
                                </ul>
                            </td>
                        </tr>

                        <!-- Row 5: Chính Sách Hoàn Hủy -->
                        <tr>
                            <td class="criteria-cell">
                                <div class="d-flex align-items-center gap-1 gap-md-2 fw-bold text-dark small">
                                    <i class="bx bx-shield-x text-pink fs-5 flex-shrink-0"></i>
                                    <span class="text-break">Chính Sách Hoàn Hủy</span>
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="d-flex flex-column gap-1 small">
                                    <div class="text-success fw-semibold text-break">
                                        <i class="bx bx-check-circle me-1"></i>Hoàn 100% phí trước 72 giờ
                                    </div>
                                    <div class="text-secondary text-break">
                                        Hủy từ 24h – 48h: Phí 30% vé cáp
                                    </div>
                                    <div class="text-danger fw-semibold text-break">
                                        Quá 24h: Không hoàn tiền (Hỗ trợ dời ngày 1 lần)
                                    </div>
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="d-flex flex-column gap-1 small">
                                    <div class="text-success fw-semibold text-break">
                                        <i class="bx bx-check-circle me-1"></i>Hoàn 100% phí trước 48 giờ
                                    </div>
                                    <div class="text-secondary text-break">
                                        Hủy trước 24 giờ: Phí 20%
                                    </div>
                                    <div class="text-danger fw-semibold text-break">
                                        Hủy trong ngày: Phí 50% chi phí bảo an
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 6: Đánh Giá & Tỉ Lệ -->
                        <tr>
                            <td class="criteria-cell">
                                <div class="d-flex align-items-center gap-1 gap-md-2 fw-bold text-dark small">
                                    <i class="bx bxs-star text-pink fs-5 flex-shrink-0"></i>
                                    <span class="text-break">Đánh Giá &amp; Tỉ Lệ</span>
                                </div>
                            </td>
                            <td class="tour-data-cell">
                                <div class="d-flex flex-wrap align-items-baseline gap-2 mb-2">
                                    <span class="fs-4 fw-bold text-dark">4.9</span>
                                    <div class="text-warning small">
                                        <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i>
                                    </div>
                                    <span class="text-secondary small">512 đánh giá xác thực</span>
                                </div>
                                <p class="quote-text small text-muted fst-italic mb-0 border-start border-3 border-pink ps-2 text-break">
                                    "Buffet ăn ngon hết nấc, xe đưa đón êm ru và sạch sẽ. Cầu Vàng lên sớm lúc vắng người chụp hình cực chill."
                                </p>
                            </td>
                            <td class="tour-data-cell">
                                <div class="d-flex flex-wrap align-items-baseline gap-2 mb-2">
                                    <span class="fs-4 fw-bold text-dark">4.8</span>
                                    <div class="text-warning small">
                                        <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i>
                                    </div>
                                    <span class="text-secondary small">320 đánh giá xác thực</span>
                                </div>
                                <p class="quote-text small text-muted fst-italic mb-0 border-start border-3 border-purple ps-2 text-break">
                                    "Buổi tối ở Phố Cổ lung linh huyền ảo! Hướng dẫn viên vui tính nhiệt tình, hướng dẫn các điểm ăn vặt ngon."
                                </p>
                            </td>
                        </tr>

                        <!-- Row 7: Actions -->
                        <tr class="action-row">
                            <td class="criteria-cell border-0"></td>
                            <td class="tour-data-cell border-0 pt-3">
                                <router-link to="/client/don-dat-thanh-toan" class="btn btn-book-tour-pink w-100 rounded-pill py-2 fw-bold text-white shadow-sm mb-2 text-center text-decoration-none d-block">
                                    Đặt Tour Bà Nà Hills Ngay
                                </router-link>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="text-pink text-decoration-none small" @click="handleViewReviews(currentCompareTour1)">
                                        Xem chi tiết 512 bình luận gốc &gt;
                                    </a>
                                </div>
                            </td>
                            <td class="tour-data-cell border-0 pt-3">
                                <router-link to="/client/don-dat-thanh-toan" class="btn btn-book-tour-purple w-100 rounded-pill py-2 fw-bold text-white shadow-sm mb-2 text-center text-decoration-none d-block">
                                    Đặt Tour Sơn Trà - Hội An
                                </router-link>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="text-purple text-decoration-none small" @click="handleViewReviews(currentCompareTour2)">
                                        Xem chi tiết 320 bình luận gốc &gt;
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 6. Featured Tours Section (Danh Mục Tuyến Điểm Đà Nẵng Nổi Bật) -->
        <div class="featured-tours-section mb-5">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-2">
                <div>
                    <div class="d-flex align-items-center gap-2 text-pink fw-semibold small mb-1">
                        <i class="bx bx-compass"></i>
                        <span>lich_khoi_hanh &gt; he_so_dat_tour</span>
                    </div>
                    <h2 class="h3 fw-bold text-dark mb-0">
                        Danh Mục Tuyến Điểm Đà Nẵng Nổi Bật
                    </h2>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="text-secondary small">Sắp xếp theo:</span>
                    <select class="form-select form-select-sm rounded-pill sort-select" v-model="sortCriteria">
                        <option value="featured">Tuyệt đỉnh &amp; Giá tốt nhất</option>
                        <option value="price_asc">Giá từ thấp đến cao</option>
                        <option value="price_desc">Giá từ cao đến thấp</option>
                        <option value="rating">Đánh giá cao nhất</option>
                    </select>
                </div>
            </div>

            <!-- Tour Cards Grid -->
            <div class="row g-4">
                <div 
                    v-for="item in processedTourList" 
                    :key="item.id"
                    class="col-xl-3 col-lg-6 col-md-6"
                >
                    <div class="card tour-card h-100 border-0 rounded-4 shadow-sm overflow-hidden d-flex flex-column">
                        <!-- Card Media -->
                        <div class="position-relative card-media-wrap">
                            <img :src="item.hinh_anh" class="w-100 h-100 object-fit-cover card-img-top" :alt="item.ten_tour">
                            
                            <!-- Badges top -->
                            <div class="media-badges-top position-absolute top-0 start-0 w-100 p-2 d-flex flex-wrap gap-1 justify-content-start">
                                <span class="badge badge-kyc-verify rounded-pill px-2 py-1">
                                    <i class="bx bxs-check-shield me-1"></i>{{ item.kyc_badge }}
                                </span>
                                <span class="badge badge-sub-tag rounded-pill px-2 py-1" :class="item.sub_tag_class">
                                    {{ item.sub_tag }}
                                </span>
                            </div>

                            <!-- Remaining seats notice bottom -->
                            <div class="seats-notice-pill position-absolute bottom-0 start-0 m-2 px-2 py-1 rounded-pill small">
                                <span class="pulse-dot-seat me-1"></span>
                                <span>{{ item.con_cho }}</span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-3 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center small text-secondary mb-2">
                                <span class="d-flex align-items-center gap-1">
                                    <i class="bx bx-calendar text-pink"></i>{{ item.thoi_luong_khoi_hanh }}
                                </span>
                                <span class="text-dark fw-bold d-flex align-items-center gap-1">
                                    <i class="bx bxs-star text-warning"></i>{{ item.diem_danh_gia }} <span class="text-muted fw-normal">({{ item.luot_dat }})</span>
                                </span>
                            </div>

                            <h3 class="h6 fw-bold text-dark card-tour-title mb-2">
                                {{ item.ten_tour }}
                            </h3>

                            <p class="text-secondary small card-tour-desc flex-grow-1 mb-3">
                                {{ item.mo_ta }}
                            </p>

                            <!-- Tags -->
                            <div class="d-flex flex-wrap gap-1 mb-3">
                                <span v-for="tag in item.tags" :key="tag" class="badge badge-card-tag rounded-pill px-2 py-1">
                                    {{ tag }}
                                </span>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-tour-footer pt-2 border-top d-flex align-items-end justify-content-between">
                                <div>
                                    <div class="price-subtitle text-muted text-uppercase">Giá trọn gói / khách</div>
                                    <div class="price-strikethrough text-decoration-line-through text-muted small" v-if="item.gia_goc">
                                        {{ formatVND(item.gia_goc) }}
                                    </div>
                                    <div class="price-current fw-bold" :class="item.price_color_class || 'text-pink'">
                                        {{ formatVND(item.gia_ban) }}
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <!-- Toggle compare button -->
                                    <button 
                                        type="button" 
                                        class="btn btn-compare-toggle rounded-circle"
                                        :class="{ active: isSoSanh(item.id) }"
                                        :title="isSoSanh(item.id) ? 'Đã chọn so sánh' : 'Chọn so sánh tour này'"
                                        @click="toggleSoSanh(item)"
                                    >
                                        <i class="bx bx-git-compare"></i>
                                    </button>
                                    
                                    <!-- Booking button -->
                                    <router-link 
                                        to="/client/don-dat-thanh-toan" 
                                        class="btn btn-booking rounded-pill px-3 py-1 fw-bold text-white text-decoration-none small"
                                        :class="item.btn_color_class || 'btn-pink-gradient'"
                                    >
                                        Xem &amp; Đặt Chỗ
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7. OpenStreetMap Interactive Banner -->
        <div class="osm-interactive-banner rounded-4 p-4 p-md-5 text-white position-relative overflow-hidden shadow-sm">
            <div class="row align-items-center g-4 position-relative" style="z-index: 2;">
                <div class="col-lg-7">
                    <span class="badge bg-white bg-opacity-25 text-white rounded-pill px-3 py-1 mb-3 text-uppercase fw-semibold" style="letter-spacing: 0.5px;">
                        <i class="bx bx-map-pin me-1"></i>OpenStreetMap Tương Tác
                    </span>
                    <h2 class="h3 fw-bold text-white mb-2">
                        Xem Bản Đồ Tuyến Trực Quan &amp; Điểm Dừng Chân
                    </h2>
                    <p class="text-white text-opacity-75 mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                        Gợi ý lộ trình tối ưu khoảng cách giữa các điểm đón tại Đà Nẵng, tính toán thời gian di chuyển giữa các trạm dừng và lớp kiểm khống điểm giao thông theo phong cách mộc bản.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <router-link to="/client/kham-pha-dia-diem" class="btn btn-osm-main rounded-pill px-4 py-2 fw-bold text-decoration-none d-flex align-items-center gap-2">
                            <i class="bx bx-map-alt"></i>
                            <span>MỞ BẢN ĐỒ ĐIỂM TUYẾN ĐIỂM</span>
                        </router-link>
                        <router-link to="/client/lich-trinh-toi-uu" class="btn btn-outline-light rounded-pill px-4 py-2 fw-bold text-decoration-none d-flex align-items-center gap-2">
                            <i class="bx bx-git-branch"></i>
                            <span>LẬP LỊCH TRÌNH AI RIÊNG</span>
                        </router-link>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="osm-preview-card rounded-4 overflow-hidden shadow border border-white border-opacity-25 position-relative">
                        <img 
                            src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=600&auto=format&fit=crop&q=80" 
                            alt="Map Preview" 
                            class="w-100 object-fit-cover" 
                            style="height: 190px; filter: saturate(1.1) brightness(0.95);"
                        >
                        <div class="osm-preview-overlay position-absolute bottom-0 start-0 w-100 p-2 text-center text-white small" style="background: rgba(0,0,0,0.45); backdrop-filter: blur(4px);">
                            <i class="bx bx-radar text-pink me-1"></i>Trực quan hóa 28 trạm dừng thực tế trên bản đồ Đà Nẵng
                        </div>
                    </div>
                </div>
            </div>
            <!-- Background decorative shapes -->
            <div class="osm-decor-shape-1"></div>
            <div class="osm-decor-shape-2"></div>
        </div>

        <!-- 8. Modal: Chính sách KYC -->
        <div class="modal fade" :class="{ show: showKycModal }" :style="{ display: showKycModal ? 'block' : 'none' }" tabindex="-1" v-if="showKycModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-0 pb-0">
                        <div class="d-flex align-items-center gap-2">
                            <div class="kyc-icon-circle-sm">
                                <i class="bx bxs-badge-check"></i>
                            </div>
                            <h5 class="modal-title fw-bold text-dark mb-0">Chính Sách Kiểm Duyệt &amp; Bảo Hiểm Du Khách KYC Đà Nẵng</h5>
                        </div>
                        <button type="button" class="btn-close" @click="showKycModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="alert alert-danger bg-pink-50 border-0 rounded-4 text-pink p-3 mb-3 d-flex align-items-center gap-3">
                            <i class="bx bxs-shield fs-2"></i>
                            <div class="small">
                                <strong>Cam kết vàng từ Ban Quản Lý Du Lịch Đà Nẵng SmartTrip:</strong> Tất cả đối tác lữ hành cung cấp dịch vụ trên nền tảng đều có giấy phép kinh doanh lữ hành nội địa &amp; quốc tế hợp lệ, ký quỹ ngân hàng bảo lãnh khách hàng.
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 h-100">
                                    <h6 class="fw-bold text-dark"><i class="bx bx-check-double text-teal me-1"></i>Tiêu chuẩn Đối tác KYC</h6>
                                    <ul class="text-secondary small ps-3 mb-0">
                                        <li>Xác thực số hóa căn cước doanh nghiệp &amp; giấy phép lữ hành.</li>
                                        <li>Bảo hiểm hành trình mức tối thiểu 100 triệu VNĐ / vụ.</li>
                                        <li>Hướng dẫn viên sở hữu thẻ hành nghề thẻ quốc tế hoặc nội địa.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 h-100">
                                    <h6 class="fw-bold text-dark"><i class="bx bx-refresh text-pink me-1"></i>Chính sách Đổi Trả 24H</h6>
                                    <ul class="text-secondary small ps-3 mb-0">
                                        <li>Miễn phí 100% thay đổi thời gian hoặc chuyển nhượng trước 24H.</li>
                                        <li>Hoàn tiền tự động vào ví số / tài khoản ngân hàng trong 30 phút.</li>
                                        <li>Tổng đài hỗ trợ cứu hộ &amp; khiếu nại khẩn cấp 24/7.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" @click="showKycModal = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show" v-if="showKycModal" @click="showKycModal = false"></div>
    </div>
</template>

<script>
export default {
    name: 'DanhMucTourComponent',
    data() {
        return {
            key_search: '',
            showKycModal: false,
            sortCriteria: 'featured',
            selectedFilters: {
                duration: 'all',
                price: '1_2',
                type: 'group',
                rating: 'trending'
            },
            filterOptions: {
                duration: [
                    { label: 'Tất cả', value: 'all' },
                    { label: 'Ngày', value: '1d' },
                    { label: '2N1Đ', value: '2d1n' },
                    { label: '3N2Đ', value: '3d2n' },
                    { label: '4N3Đ', value: '4d3n' }
                ],
                price: [
                    { label: '< 1 Triệu', value: 'under_1' },
                    { label: '1 - 2 Triệu', value: '1_2' },
                    { label: '> 2 Triệu', value: 'over_2' }
                ],
                type: [
                    { label: 'Ghép Đoàn', value: 'group' },
                    { label: 'Riêng VIP', value: 'private' },
                    { label: 'Sinh Thái Bản Địa', value: 'eco' }
                ],
                rating: [
                    { label: '4.5+ ★', value: '4.5' },
                    { label: '4.8+ VIP', value: '4.8' },
                    { label: 'Top Xu Hướng', value: 'trending' }
                ]
            },
            all_tours: [
                {
                    id: 1,
                    ten_tour: 'Đà Nẵng – Bán Đảo Sơn Trà – Hội An Phố Cổ 1 Ngày',
                    ten_rut_gon: 'Sơn Trà - Ngũ Hành Sơn - Hội An (1N)',
                    nha_to_chuc: 'Danang Explorer Corp (KYC Diamond)',
                    kyc_badge: 'Đối tác KYC Verified',
                    sub_tag: 'Hành Trình Miền Trung',
                    sub_tag_class: 'badge-purple-sub',
                    con_cho: 'Còn 6 chỗ cuối tuần này',
                    thoi_luong_khoi_hanh: 'Khởi hành hàng ngày',
                    thoi_luong_loai: '1d',
                    gia_ban: 750000,
                    gia_goc: 950000,
                    diem_danh_gia: '4.9',
                    luot_dat: 320,
                    price_color_class: 'text-pink',
                    btn_color_class: 'btn-pink-gradient',
                    mo_ta: 'Thăm chùa Linh Ứng ngắm biển vạn dặm, chiêm bái ngũ hành sơn và trải nghiệm thả hoa đăng lung linh trên sông Hoài.',
                    tags: ['Ẩn tích tâm linh', 'Thuyền hoa đăng', 'Xe du lịch VIP'],
                    hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop&q=80'
                },
                {
                    id: 2,
                    ten_tour: 'Trọn Gói Khám Phá Cù Lao Chàm Lặn Ngắm San Hô 1N',
                    ten_rut_gon: 'Cù Lao Chàm Lặn San Hô (1N)',
                    nha_to_chuc: 'Cham Island Travel (KYC Silver)',
                    kyc_badge: 'Đối tác KYC Verified',
                    sub_tag: 'Tour Biển Đảo Hot',
                    sub_tag_class: 'badge-blue-sub',
                    con_cho: 'Còn 12 chỗ ngày mai',
                    thoi_luong_khoi_hanh: 'Cano cao tốc chuẩn',
                    thoi_luong_loai: '1d',
                    gia_ban: 650000,
                    gia_goc: 850000,
                    diem_danh_gia: '4.8',
                    luot_dat: 216,
                    price_color_class: 'text-teal',
                    btn_color_class: 'btn-cyan-gradient',
                    mo_ta: 'Lướt sóng cano cao tốc đến khu dự trữ sinh quyển thế giới. Trải nghiệm lặn ngắm rạn san hô Bãi Chồng tuyệt mỹ.',
                    tags: ['Hải sản 8 món', 'Lặn Snorkeling', 'Bảo tồn biển đảo'],
                    hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop&q=80'
                },
                {
                    id: 3,
                    ten_tour: 'Đà Nẵng – Bà Nà Hills – Cầu Vàng Mây Trắng 1N',
                    ten_rut_gon: 'Bà Nà Hills Cầu Vàng (1N)',
                    nha_to_chuc: 'Danang Heritage Travel (KYC Gold)',
                    kyc_badge: 'Đối tác KYC Gold',
                    sub_tag: 'Đẳng cấp Buffet 100 món',
                    sub_tag_class: 'badge-pink-sub',
                    con_cho: 'Đã có 350+ khách đặt tuần này',
                    thoi_luong_khoi_hanh: 'Cáp Treo Sun World Included',
                    thoi_luong_loai: '1d',
                    gia_ban: 1250000,
                    gia_goc: 1450000,
                    diem_danh_gia: '4.9',
                    luot_dat: 512,
                    price_color_class: 'text-pink',
                    btn_color_class: 'btn-pink-gradient',
                    mo_ta: 'Ngoạn cảnh biểu tượng du lịch Cầu Vàng, khám phá Làng Pháp lãng mạn và thưởng thức đại tiệc ẩm thực đa quốc gia.',
                    tags: ['Vé cáp treo', 'Buffet 100 món', 'Tọa độ checkin'],
                    hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=600&auto=format&fit=crop&q=80'
                },
                {
                    id: 4,
                    ten_tour: 'Hành Trình Di Sản Miền Trung 3N2Đ (Đà Nẵng – Sơn Trà – Hội An – Cố Đô Huế)',
                    ten_rut_gon: 'Di Sản Miền Trung 3N2Đ',
                    nha_to_chuc: 'Central Heritage Alliance (KYC Diamond)',
                    kyc_badge: 'Đối tác KYC Diamond',
                    sub_tag: 'Khách sạn 4 sao',
                    sub_tag_class: 'badge-purple-sub',
                    con_cho: 'Khởi hành Thứ 6 hàng tuần',
                    thoi_luong_khoi_hanh: 'Đã có khách đặt hôm nay',
                    thoi_luong_loai: '3d2n',
                    gia_ban: 3450000,
                    gia_goc: 4200000,
                    diem_danh_gia: '4.9',
                    luot_dat: 186,
                    price_color_class: 'text-purple',
                    btn_color_class: 'btn-purple-gradient',
                    mo_ta: 'Chuyến đi toàn diện kết nối hai quần thể di sản thế giới: Phố cổ Hội An & Cố đô Huế cùng thiên đường ẩm thực sông Hương.',
                    tags: ['Trọn gói Ăn ở', 'Cố đô Triều Nguyễn', 'Xe Limousine'],
                    hinh_anh: 'https://images.unsplash.com/photo-1544644181-1484b3fdfc62?w=600&auto=format&fit=crop&q=80'
                }
            ],
            // Default selected 2 tours for comparison matching screenshot
            so_sanh_items: []
        };
    },
    created() {
        // Pre-populate with Tour 3 (Bà Nà Hills) and Tour 1 (Sơn Trà Hội An) matching screenshot
        const tourBana = this.all_tours.find(t => t.id === 3);
        const tourHoiAn = this.all_tours.find(t => t.id === 1);
        if (tourBana) this.so_sanh_items.push(tourBana);
        if (tourHoiAn) this.so_sanh_items.push(tourHoiAn);
    },
    computed: {
        currentCompareTour1() {
            if (this.so_sanh_items.length > 0) return this.so_sanh_items[0];
            return this.all_tours[2]; // Default Bà Nà Hills
        },
        currentCompareTour2() {
            if (this.so_sanh_items.length > 1) return this.so_sanh_items[1];
            return this.all_tours[0]; // Default Sơn Trà Hội An
        },
        processedTourList() {
            let list = [...this.all_tours];

            // Filter by search keyword
            if (this.key_search.trim()) {
                const q = this.key_search.toLowerCase().trim();
                list = list.filter(t => 
                    t.ten_tour.toLowerCase().includes(q) ||
                    t.mo_ta.toLowerCase().includes(q) ||
                    t.tags.some(tag => tag.toLowerCase().includes(q))
                );
            }

            // Filter duration
            if (this.selectedFilters.duration !== 'all') {
                list = list.filter(t => t.thoi_luong_loai === this.selectedFilters.duration);
            }

            // Filter price
            if (this.selectedFilters.price === 'under_1') {
                list = list.filter(t => t.gia_ban < 1000000);
            } else if (this.selectedFilters.price === '1_2') {
                list = list.filter(t => t.gia_ban >= 1000000 && t.gia_ban <= 2000000);
            } else if (this.selectedFilters.price === 'over_2') {
                list = list.filter(t => t.gia_ban > 2000000);
            }

            // Sort
            if (this.sortCriteria === 'price_asc') {
                list.sort((a, b) => a.gia_ban - b.gia_ban);
            } else if (this.sortCriteria === 'price_desc') {
                list.sort((a, b) => b.gia_ban - a.gia_ban);
            } else if (this.sortCriteria === 'rating') {
                list.sort((a, b) => parseFloat(b.diem_danh_gia) - parseFloat(a.diem_danh_gia));
            }

            // Return all or filtered list; if filters exclude everything, return base list so design never looks empty
            return list.length > 0 ? list : this.all_tours;
        }
    },
    methods: {
        formatVND(val) {
            if (!val) return '0 đ';
            return new Intl.NumberFormat('vi-VN').format(val) + ' đ';
        },
        isSoSanh(id) {
            return this.so_sanh_items.some(x => x.id === id);
        },
        toggleSoSanh(tour) {
            const idx = this.so_sanh_items.findIndex(x => x.id === tour.id);
            if (idx >= 0) {
                this.so_sanh_items.splice(idx, 1);
            } else {
                if (this.so_sanh_items.length >= 3) {
                    alert('Chỉ được so sánh tối đa 3 tour cùng lúc! Vui lòng xóa bớt một tour trước.');
                    return;
                }
                this.so_sanh_items.push(tour);
            }
        },
        removeSoSanh(id) {
            const idx = this.so_sanh_items.findIndex(x => x.id === id);
            if (idx >= 0) {
                this.so_sanh_items.splice(idx, 1);
            }
        },
        handleRemoveTourCompare(slotIndex) {
            if (this.so_sanh_items.length > slotIndex) {
                this.so_sanh_items.splice(slotIndex, 1);
            }
        },
        scrollToMatrix() {
            const el = document.getElementById('sideBySideMatrix');
            if (el) {
                el.scrollIntoView({ behavior: 'smooth' });
            }
        },
        applyFilters() {
            // Trigger reactive view
            this.scrollToMatrix();
        },
        handleSaveCompare() {
            alert('Đã lưu bảng so sánh 2 tour hiện tại vào hồ sơ tài khoản của bạn!');
        },
        handleViewReviews(tour) {
            alert(`Đang mở danh sách đánh giá chi tiết cho: ${tour.ten_tour}`);
        }
    }
};
</script>

<style scoped>
.danh-muc-tour-page {
    max-width: 100%;
    overflow-x: hidden;
}

/* Page Theme Colors */
.text-pink {
    color: #db2777 !important;
}
.text-indigo {
    color: #4f46e5 !important;
}
.text-teal {
    color: #0d9488 !important;
}
.text-purple {
    color: #7c3aed !important;
}

/* 1. KYC Partner Banner */
.kyc-partner-banner {
    background: linear-gradient(135deg, #fff1f2 0%, #fdf2f8 50%, #faf5ff 100%);
    border: 1px solid #fbcfe8;
}
.kyc-icon-circle {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    box-shadow: 0 4px 12px rgba(219, 39, 119, 0.3);
}
.kyc-icon-circle-sm {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}
.kyc-banner-title {
    color: #db2777;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}
.pulse-indicator {
    width: 8px;
    height: 8px;
    background-color: #10b981;
    border-radius: 50%;
    display: inline-block;
    box-shadow: 0 0 0 rgba(16, 185, 129, 0.4);
    animation: pulse 1.8s infinite;
}
@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
    70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
    100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
}

/* 2. Header & Stats */
.route-tag-pill {
    background: #fce7f3;
    color: #db2777;
    font-size: 0.78rem;
    font-weight: 600;
}
.page-title {
    font-size: 1.85rem;
    letter-spacing: -0.5px;
}
.stat-box {
    border-color: #f1f5f9 !important;
    min-width: 90px;
    transition: transform 0.2s ease;
}
.stat-box:hover {
    transform: translateY(-2px);
}
.stat-number {
    font-size: 1.7rem;
    line-height: 1.2;
}
.stat-label {
    font-size: 0.68rem;
    letter-spacing: 0.5px;
}

/* 3. Search & Filter Bar */
.filter-card {
    border-color: #f1f5f9 !important;
}
.search-icon {
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 1.25rem;
}
.search-input {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    font-size: 0.9rem;
    height: 48px;
}
.search-input:focus {
    background-color: #fff;
    border-color: #ec4899;
    box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.15);
}
.btn-clear {
    right: 145px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
}
.btn-apply-filter {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border: none;
    font-size: 0.85rem;
    padding-top: 8px;
    padding-bottom: 8px;
    box-shadow: 0 4px 10px rgba(219, 39, 119, 0.25);
    transition: all 0.2s;
}
.btn-apply-filter:hover {
    opacity: 0.95;
    transform: translateY(-50%) scale(1.02);
}
.filter-label {
    min-width: 130px;
}
.btn-filter-pill {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #475569;
    font-size: 0.8rem;
    padding: 4px 14px;
    font-weight: 500;
    transition: all 0.2s;
}
.btn-filter-pill:hover {
    background-color: #f1f5f9;
}
.btn-filter-pill.active {
    background: #db2777;
    color: #fff;
    border-color: #db2777;
    font-weight: 600;
}

/* 4. Comparison Bar */
.comparison-bar {
    background: linear-gradient(135deg, #fdf4ff 0%, #fae8ff 100%);
    border: 1px solid #e9d5ff;
}
.compare-badge-icon {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #a855f7 0%, #7e22ce 100%);
    box-shadow: 0 4px 10px rgba(126, 34, 206, 0.25);
}
.compare-chip {
    border: 1px solid transparent;
}
.chip-pink {
    background: #fff;
    color: #db2777;
    border-color: #fbcfe8;
}
.chip-purple {
    background: #fff;
    color: #7c3aed;
    border-color: #ddd6fe;
}
.btn-chip-remove {
    background: transparent;
    border: none;
    color: #94a3b8;
    padding: 0;
    display: inline-flex;
    align-items: center;
    font-size: 1rem;
    cursor: pointer;
}
.btn-chip-remove:hover {
    color: #ef4444;
}
.btn-view-compare {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border: none;
    font-size: 0.85rem;
    letter-spacing: 0.3px;
    box-shadow: 0 4px 12px rgba(219, 39, 119, 0.25);
}
.btn-icon-round {
    width: 38px;
    height: 38px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-color: #cbd5e1;
    color: #64748b;
}

/* 5. Matrix Table */
.matrix-card {
    border-color: #f1f5f9 !important;
    overflow: hidden;
    width: 100%;
}
.matrix-table-wrapper {
    width: 100%;
    overflow-x: hidden;
}
.matrix-table {
    width: 100% !important;
    table-layout: fixed !important;
    border-collapse: separate;
    border-spacing: 0;
    margin-bottom: 0;
}
.matrix-table th, .matrix-table td {
    padding: 12px 10px;
    border-color: #f1f5f9;
    vertical-align: top;
    word-wrap: break-word;
    overflow-wrap: break-word;
    word-break: break-word;
}
@media (min-width: 992px) {
    .matrix-table th, .matrix-table td {
        padding: 14px 14px;
    }
}
.col-criteria {
    width: 22%;
}
.col-tour-header {
    width: 39%;
}
@media (max-width: 768px) {
    .col-criteria {
        width: 28%;
    }
    .col-tour-header {
        width: 36%;
    }
    .matrix-table th, .matrix-table td {
        padding: 10px 6px;
    }
}
.tour-header-box {
    background: #faf5ff;
    border: 1px solid #f3e8ff;
    min-width: 0;
    overflow: hidden;
}
.badge-vip {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    font-size: 0.68rem;
}
.badge-popular {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    font-size: 0.68rem;
}
.btn-close-column {
    background: transparent;
    border: none;
    color: #94a3b8;
    font-size: 1.25rem;
    padding: 0;
    cursor: pointer;
}
.btn-close-column:hover {
    color: #ef4444;
}
.badge-route-pink {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fce7f3;
    font-size: 0.72rem;
    font-weight: 500;
    padding: 3px 6px;
    white-space: normal;
    text-align: left;
    line-height: 1.25;
}
.badge-route-purple {
    background: #f5f3ff;
    color: #7c3aed;
    border: 1px solid #ede9fe;
    font-size: 0.72rem;
    font-weight: 500;
    padding: 3px 6px;
    white-space: normal;
    text-align: left;
    line-height: 1.25;
}
.btn-book-tour-pink {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    border: none;
    font-size: 0.85rem;
    padding: 8px 8px;
    box-shadow: 0 4px 12px rgba(219, 39, 119, 0.25);
    white-space: normal;
}
.btn-book-tour-purple {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    border: none;
    font-size: 0.85rem;
    padding: 8px 8px;
    box-shadow: 0 4px 12px rgba(109, 40, 217, 0.25);
    white-space: normal;
}

/* 6. Featured Tours Cards */
.sort-select {
    width: auto;
    background-color: #f8fafc;
    border-color: #e2e8f0;
    font-size: 0.85rem;
}
.tour-card {
    border: 1px solid #f1f5f9 !important;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.tour-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08) !important;
}
.card-media-wrap {
    height: 200px;
    overflow: hidden;
}
.badge-kyc-verify {
    background: rgba(255, 255, 255, 0.92);
    color: #059669;
    font-weight: 600;
    font-size: 0.7rem;
    backdrop-filter: blur(4px);
}
.badge-purple-sub {
    background: linear-gradient(135deg, #a855f7 0%, #7e22ce 100%);
    color: #fff;
    font-size: 0.7rem;
}
.badge-blue-sub {
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
    color: #fff;
    font-size: 0.7rem;
}
.badge-pink-sub {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #fff;
    font-size: 0.7rem;
}
.seats-notice-pill {
    background: rgba(15, 23, 42, 0.82);
    color: #fff;
    backdrop-filter: blur(4px);
    font-size: 0.72rem;
}
.pulse-dot-seat {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #ef4444;
    display: inline-block;
}
.card-tour-title {
    font-size: 0.95rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 2.7em;
}
.card-tour-desc {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-size: 0.8rem;
    line-height: 1.5;
}
.badge-card-tag {
    background: #f1f5f9;
    color: #475569;
    font-size: 0.72rem;
    font-weight: 500;
}
.price-subtitle {
    font-size: 0.65rem;
    letter-spacing: 0.4px;
}
.price-current {
    font-size: 1.05rem;
    line-height: 1.2;
}
.btn-compare-toggle {
    width: 34px;
    height: 34px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e2e8f0;
    background: #f8fafc;
    color: #64748b;
    font-size: 1rem;
    transition: all 0.2s;
}
.btn-compare-toggle:hover {
    background: #f1f5f9;
    color: #db2777;
}
.btn-compare-toggle.active {
    background: #db2777;
    color: #fff;
    border-color: #db2777;
}
.btn-booking {
    font-size: 0.8rem;
    transition: all 0.2s;
}
.btn-pink-gradient {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    box-shadow: 0 4px 10px rgba(219, 39, 119, 0.25);
}
.btn-cyan-gradient {
    background: linear-gradient(135deg, #06b6d4 0%, #0284c7 100%);
    box-shadow: 0 4px 10px rgba(2, 132, 199, 0.25);
}
.btn-purple-gradient {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    box-shadow: 0 4px 10px rgba(109, 40, 217, 0.25);
}

/* 7. OpenStreetMap Banner */
.osm-interactive-banner {
    background: linear-gradient(135deg, #be185d 0%, #a21caf 50%, #6d28d9 100%);
}
.btn-osm-main {
    background-color: #fff;
    color: #be185d;
    font-size: 0.85rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.2s;
}
.btn-osm-main:hover {
    background-color: #fff1f2;
    color: #9d174d;
}
.osm-decor-shape-1 {
    position: absolute;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
    top: -100px;
    right: 10%;
    z-index: 1;
}
.osm-decor-shape-2 {
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0) 70%);
    bottom: -50px;
    left: 5%;
    z-index: 1;
}

/* Modal styling */
.bg-pink-50 {
    background-color: #fdf2f8 !important;
}
</style>
