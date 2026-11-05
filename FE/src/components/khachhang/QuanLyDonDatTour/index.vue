<template>
    <div class="quan-ly-don-tour-page pb-5">
        <!-- 1. Header Section -->
        <div class="card border-0 rounded-4 p-4 shadow-sm mb-4 bg-white position-relative overflow-hidden">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <span class="badge badge-service-tag rounded-pill px-3 py-1 small fw-bold mb-2 d-inline-flex align-items-center gap-1">
                        <i class="bx bx-shield-quarter text-pink"></i>TRUNG TÂM QUẢN LÝ DỊCH VỤ KHÁCH HÀNG
                    </span>
                    <h1 class="h3 fw-bold text-dark mb-2">
                        Quản Lý Đơn Tour Của Tôi &amp; Hỗ Trợ Du Khách
                    </h1>
                    <p class="text-secondary small mb-0 line-clamp-2" style="max-width: 820px; font-size: 0.92rem;">
                        Theo dõi chi tiết đặt chỗ, vé điện tử QR, hóa đơn điện tử VAT, phản hồi trải nghiệm và gửi hỗ trợ sự cố nhanh 24/7.
                    </p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <router-link to="/client/bao-cao-su-co" class="btn btn-outline-incident rounded-pill px-3 py-2 fw-semibold d-flex align-items-center gap-2 text-decoration-none">
                        <i class="bx bx-error-circle text-pink fs-5"></i>
                        <span>Báo Cáo Sự Cố &amp; Khiếu Nại</span>
                    </router-link>
                    <button type="button" class="btn btn-phone-round rounded-circle text-white d-flex align-items-center justify-content-center" @click="handleCallHotline" title="Gọi hotline hỗ trợ">
                        <i class="bx bxs-phone-call fs-5"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. Stat KPI Cards (4 Cards) -->
        <div class="row g-3 g-md-4 mb-4">
            <!-- Stat 1 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-order-card border rounded-4 p-3 shadow-sm h-100 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-wrap stat-icon-pink rounded-4 d-flex align-items-center justify-content-center">
                            <i class="bx bx-receipt fs-3"></i>
                        </div>
                        <div>
                            <div class="stat-caption text-muted text-uppercase fw-semibold">Tổng Số Tour</div>
                            <div class="stat-val-group d-flex align-items-baseline gap-2">
                                <span class="stat-main-val text-dark fw-bold">04</span>
                                <span class="stat-sub-text text-pink small fw-medium">Đã lưu trữ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-order-card border rounded-4 p-3 shadow-sm h-100 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-wrap stat-icon-cyan rounded-4 d-flex align-items-center justify-content-center">
                            <i class="bx bx-time fs-3"></i>
                        </div>
                        <div>
                            <div class="stat-caption text-muted text-uppercase fw-semibold">Sắp Khởi Hành</div>
                            <div class="stat-val-group d-flex align-items-baseline gap-2">
                                <span class="stat-main-val text-teal fw-bold">01</span>
                                <span class="stat-sub-text text-teal small fw-medium">Sẵn sàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-order-card border rounded-4 p-3 shadow-sm h-100 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-wrap stat-icon-purple rounded-4 d-flex align-items-center justify-content-center">
                            <i class="bx bx-check-circle fs-3"></i>
                        </div>
                        <div>
                            <div class="stat-caption text-muted text-uppercase fw-semibold">Đã Hoàn Thành</div>
                            <div class="stat-val-group d-flex align-items-baseline gap-2">
                                <span class="stat-main-val text-purple fw-bold">02</span>
                                <span class="stat-sub-text text-purple small fw-medium">Đã nghiệm thu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-order-card border rounded-4 p-3 shadow-sm h-100 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon-wrap stat-icon-red rounded-4 d-flex align-items-center justify-content-center">
                            <i class="bx bx-refresh fs-3"></i>
                        </div>
                        <div>
                            <div class="stat-caption text-muted text-uppercase fw-semibold">Yêu Cầu Hoàn Hủy</div>
                            <div class="stat-val-group d-flex align-items-baseline gap-2">
                                <span class="stat-main-val text-danger fw-bold">01</span>
                                <span class="stat-sub-text text-danger small fw-medium">Đang xử lý</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Filter Tabs Bar -->
        <div class="filter-tabs-bar d-flex align-items-center gap-2 mb-4 flex-wrap">
            <button 
                v-for="tab in filterTabs" 
                :key="tab.key"
                type="button" 
                class="btn btn-filter-tab rounded-pill px-3 py-2 small fw-semibold"
                :class="{ active: currentTab === tab.key }"
                @click="currentTab = tab.key"
            >
                {{ tab.label }} ({{ tab.count }})
            </button>
        </div>

        <!-- 4. Main 2-Column Layout -->
        <div class="row g-4">
            <!-- Left Column: Orders List (8 Cols) -->
            <div class="col-lg-8">
                <div class="d-flex flex-column gap-4">
                    <!-- ================= ORDER 1: SẮP KHỞI HÀNH ================= -->
                    <div class="card border rounded-4 shadow-sm p-4 bg-white order-item-card" v-if="currentTab === 'all' || currentTab === 'upcoming'">
                        <!-- Header Line -->
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <span class="badge bg-light text-secondary border font-monospace rounded-pill px-2 py-1 small">
                                    #TOUR-BK-98214
                                </span>
                                <span class="badge badge-upcoming-pill rounded-pill px-3 py-1 small fw-bold">
                                    ● SẮP KHỞI HÀNH
                                </span>
                            </div>
                            <span class="text-teal small fw-semibold d-flex align-items-center gap-1">
                                <i class="bx bx-check-circle"></i>Đã thanh toán (VNPAY #TX9821)
                            </span>
                        </div>

                        <!-- Tour info row -->
                        <div class="row g-3 mb-3">
                            <div class="col-sm-4">
                                <div class="order-thumb-wrap rounded-4 overflow-hidden position-relative h-100">
                                    <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&auto=format&fit=crop&q=80" alt="Tour Thumbnail" class="w-100 h-100 object-fit-cover">
                                    <span class="badge badge-duration-pill position-absolute top-0 start-0 m-2 rounded-pill small">
                                        3 Ngày 2 Đêm
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-8 d-flex flex-column justify-content-between">
                                <div>
                                    <h2 class="h5 fw-bold text-dark mb-1">
                                        Di Sản Miền Trung: Đà Nẵng – Hội An – Bà Nà Hills 3N2Đ
                                    </h2>
                                    <p class="text-secondary small mb-2 line-clamp-2">
                                        Lộ trình chuẩn hóa Áo Cầu Rồng phun lửa, Bà Nà Hills Cầu Vàng, Phố Cổ Hội An lung linh hoa đăng, chèo thuyền thúng Rừng dừa...
                                    </p>
                                </div>

                                <div class="order-spec-info small text-secondary d-flex flex-column gap-1 pt-2 border-top">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bx bx-calendar text-pink"></i>
                                        <span>Giờ khởi hành: <strong class="text-dark">07:30 – Thứ Ba, 25/11/2025</strong></span>
                                        <span class="mx-1">•</span>
                                        <i class="bx bx-group text-purple"></i>
                                        <span>Số lượng khách: <strong class="text-dark">02 Người lớn, 01 Trẻ em</strong></span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bx bx-map-pin text-teal"></i>
                                        <span>Điểm đón &amp; Hướng dẫn viên: <strong>Ga Quốc Tế T1 Sân Bay Đà Nẵng • HDV: Nguyễn Văn Hùng</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Price summary bar -->
                        <div class="d-flex justify-content-between align-items-center p-3 rounded-4 bg-light border mb-3 flex-wrap gap-2">
                            <div>
                                <span class="text-muted small text-uppercase fw-semibold" style="font-size: 0.72rem;">Tổng Thanh Toán (VAT):</span>
                                <div class="fw-bold text-pink fs-5">8.700.000 đ</div>
                            </div>
                            <span class="badge bg-teal-subtle text-teal rounded-pill px-3 py-2 small fw-semibold">
                                <i class="bx bx-check-double me-1"></i>Bao gồm bữa ăn &amp; Vé cáp treo
                            </span>
                        </div>

                        <!-- Actions row -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <button type="button" class="btn btn-ticket-pink rounded-pill px-3 py-2 fw-bold text-white small d-flex align-items-center gap-1" @click="handleOpenTicket">
                                    <i class="bx bx-qr-scan fs-5"></i>
                                    <span>Xem E-Ticket QR Check-in</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary rounded-pill px-3 py-2 small fw-semibold d-flex align-items-center gap-1" @click="handleDownloadInvoice">
                                    <i class="bx bx-download"></i>
                                    <span>Tải Hóa Đơn PDF</span>
                                </button>
                                <router-link to="/client/lich-trinh-toi-uu" class="btn btn-outline-secondary rounded-pill px-3 py-2 small fw-semibold d-flex align-items-center gap-1 text-decoration-none">
                                    <i class="bx bx-map-alt"></i>
                                    <span>Lịch Trình Chi Tiết</span>
                                </router-link>
                            </div>
                            <button type="button" class="btn btn-link text-muted small text-decoration-none" @click="handleCancelOrReschedule">
                                <i class="bx bx-refresh me-1"></i>Hủy / Đổi lịch
                            </button>
                        </div>
                    </div>

                    <!-- ================= ORDER 2: ĐÃ HOÀN THÀNH ================= -->
                    <div class="card border rounded-4 shadow-sm p-4 bg-white order-item-card" v-if="currentTab === 'all' || currentTab === 'completed'">
                        <!-- Header Line -->
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <span class="badge bg-light text-secondary border font-monospace rounded-pill px-2 py-1 small">
                                    #TOUR-BK-87102
                                </span>
                                <span class="badge badge-completed-pill rounded-pill px-3 py-1 small fw-bold">
                                    ✔ ĐÃ HOÀN THÀNH
                                </span>
                            </div>
                            <span class="text-secondary small">
                                Ngày tham gia: <strong>10/10/2025</strong> • Đã quyết toán: <strong class="text-dark">1.850.000 đ</strong>
                            </span>
                        </div>

                        <!-- Tour info -->
                        <div class="row g-3 mb-3">
                            <div class="col-sm-3">
                                <div class="order-thumb-wrap rounded-4 overflow-hidden position-relative h-100">
                                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop&q=80" alt="Tour Thumbnail" class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>
                            <div class="col-sm-9 d-flex flex-column justify-content-between">
                                <div>
                                    <h2 class="h6 fw-bold text-dark mb-1">
                                        Lặn Biển Ngắm San Hô Bán Đảo Sơn Trà 1 Ngày
                                    </h2>
                                    <p class="text-secondary small mb-2">
                                        Đón tại khách sạn trung tâm • Trải nghiệm cano cao tốc, lặn nông ngắm rạn san hô Bãi Sụp, chèo SUP thể thao, tiệc BBQ hải sản tươi.
                                    </p>
                                </div>

                                <!-- Review quote box -->
                                <div class="review-feedback-box p-3 rounded-4 bg-light border">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <div class="d-flex align-items-center gap-1 text-warning small">
                                            <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i>
                                            <strong class="text-dark ms-1">5.0 / 5.0 Tuyệt vời!</strong>
                                        </div>
                                        <span class="text-muted small" style="font-size: 0.72rem;">Đánh giá ngày 11/10/2025</span>
                                    </div>
                                    <p class="small text-muted fst-italic mb-2" style="font-size: 0.8rem;">
                                        "San hô cực kỳ đẹp, HDV nhiệt tình hỗ trợ chèo SUP chụp hình flycam rất đỉnh! Gia đình mình ai cũng thích, đồ ăn hải sản tươi ngon đầy đặn."
                                    </p>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?w=100&auto=format&fit=crop&q=80" class="rounded-3 object-fit-cover border" style="width: 36px; height: 36px;" alt="Review photo 1">
                                        <img src="https://images.unsplash.com/photo-1528127269322-539801943592?w=100&auto=format&fit=crop&q=80" class="rounded-3 object-fit-cover border" style="width: 36px; height: 36px;" alt="Review photo 2">
                                        <span class="text-muted small ms-1" style="font-size: 0.72rem;">2 ảnh xác thực bởi du khách</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions row -->
                        <div class="d-flex justify-content-end pt-2 border-top">
                            <router-link to="/client/danh-muc-tour" class="btn btn-reorder-purple rounded-pill px-4 py-2 small fw-bold text-white text-decoration-none d-flex align-items-center gap-2">
                                <i class="bx bx-repeat"></i>
                                <span>Đặt Lại Tour Này (Ưu đãi 10%)</span>
                            </router-link>
                        </div>
                    </div>

                    <!-- ================= ORDER 3: HOÀN THÀNH - CHỜ ĐÁNH GIÁ ================= -->
                    <div class="card border rounded-4 shadow-sm p-4 bg-white order-item-card" v-if="currentTab === 'all' || currentTab === 'completed'">
                        <!-- Header Line -->
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <span class="badge bg-light text-secondary border font-monospace rounded-pill px-2 py-1 small">
                                    #TOUR-BK-76490
                                </span>
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-2 py-1 small">
                                    ✔ HOÀN THÀNH 18/10/2025
                                </span>
                            </div>
                            <span class="text-pink fw-bold small">
                                Tổng thanh toán: 1.150.000 đ
                            </span>
                        </div>

                        <!-- Tour info -->
                        <div class="row g-3 mb-3">
                            <div class="col-sm-3">
                                <div class="order-thumb-wrap rounded-4 overflow-hidden position-relative h-100">
                                    <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?w=600&auto=format&fit=crop&q=80" alt="Tour Thumbnail" class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <h2 class="h6 fw-bold text-dark mb-1">
                                    Tour Ẩm Thực Chợ Đêm Sơn Trà &amp; Du Thuyền Sông Hàn 1 Ngày
                                </h2>
                                <p class="text-secondary small mb-0">
                                    18:00 – 22:30 • Trải nghiệm thưởng thức bánh xèo, gỏi cá Nam Ô, ngắm Cầu Rồng phun lửa trên tầng thượng du thuyền 5 sao.
                                </p>
                            </div>
                        </div>

                        <!-- Review Callout Banner -->
                        <div class="review-prompt-banner p-3 rounded-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="prompt-icon-circle rounded-circle bg-pink text-white d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-chat fs-4"></i>
                                </div>
                                <div>
                                    <strong class="text-dark small d-block">Chuyến đi của bạn đã kết thúc trọn vẹn!</strong>
                                    <span class="text-muted small">Hãy để lại đánh giá để nhận ngay <strong class="text-pink">+100 điểm tích lũy thưởng</strong> cho tour kế tiếp.</span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-write-review rounded-pill px-3 py-2 fw-bold text-white small" @click="showReviewModal = true">
                                <i class="bx bx-edit me-1"></i>Viết Đánh Giá Ngay
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar (4 Cols) -->
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-3">
                    <!-- Widget 1: Nhật Ký Yêu Cầu Hỗ Trợ -->
                    <div class="card border rounded-4 shadow-sm p-4 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-support text-pink fs-4"></i>
                                <h2 class="h6 fw-bold text-dark mb-0">Nhật Ký Yêu Cầu Hỗ Trợ</h2>
                            </div>
                            <span class="badge bg-pink text-white rounded-pill px-2 py-1 small">1 Mới</span>
                        </div>

                        <!-- Ticket box -->
                        <div class="ticket-box p-3 rounded-4 bg-light border mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="font-monospace small text-primary fw-bold">#TK-9921</span>
                                <span class="badge bg-info-subtle text-teal rounded-pill px-2 py-0" style="font-size: 0.68rem;">
                                    ● ĐÃ XỬ LÝ XONG
                                </span>
                            </div>
                            <h3 class="small fw-bold text-dark mb-1">Kiểm tra giờ đón xe trung chuyển</h3>
                            <p class="text-secondary small mb-2" style="font-size: 0.78rem;">
                                Nội dung: Khách hàng hỏi lại thời gian xe đón tại Khách sạn Mường Thanh Luxury trước chuyến Bà Nà Hills.
                            </p>

                            <!-- Callout feedback -->
                            <div class="feedback-response-pill p-2 rounded-3 border bg-white small mb-2">
                                <div class="text-pink fw-bold" style="font-size: 0.72rem;">Phản hồi từ CSKH Đà Nẵng:</div>
                                <div class="text-secondary fst-italic" style="font-size: 0.75rem;">
                                    "Bộ phận CSKH đã gửi xác nhận với du khách lúc 08:15. Bác tài xế sẽ đón đúng 07:45 tại sảnh chính."
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center text-muted" style="font-size: 0.7rem;">
                                <span>Cập nhật: 12 phút trước</span>
                                <a href="javascript:void(0)" class="text-teal text-decoration-none fw-semibold" @click="handleViewTicketHistory">
                                    Xem lịch sử trao đổi
                                </a>
                            </div>
                        </div>

                        <!-- Cam kết chất lượng box -->
                        <div class="guarantee-box p-3 rounded-4 bg-light border mb-3">
                            <div class="d-flex align-items-center gap-2 text-dark small fw-bold mb-1">
                                <i class="bx bx-check-shield text-teal fs-5"></i>
                                <span>Cam Kết Chất Lượng Du Lịch</span>
                            </div>
                            <p class="text-secondary mb-0" style="font-size: 0.75rem; line-height: 1.5;">
                                Đà Nẵng SmartTrip cam kết tiếp nhận phản hồi sự cố trong <strong>15 phút</strong>. Trường hợp sai lệch cam kết chất lượng tour, du khách được bảo đảm hoàn tiền theo quy định Sở Du Lịch.
                            </p>
                        </div>

                        <router-link to="/client/bao-cao-su-co" class="btn btn-outline-incident-full rounded-pill w-100 py-2 small fw-bold text-dark border text-center text-decoration-none d-flex align-items-center justify-content-center gap-1">
                            <i class="bx bx-plus-circle text-pink"></i>
                            <span>Tạo Báo Cáo Sự Cố Mới</span>
                        </router-link>
                    </div>

                    <!-- Widget 2: Thời Tiết Du Lịch Đà Nẵng -->
                    <div class="card border rounded-4 shadow-sm p-4 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bx bx-sun text-warning fs-4"></i>
                                <h3 class="h6 fw-bold text-dark mb-0">Thời Tiết Du Lịch Đà Nẵng</h3>
                            </div>
                            <span class="badge bg-teal-subtle text-teal rounded-pill px-2 py-1 small fw-semibold">
                                28°C • Nắng ấm
                            </span>
                        </div>
                        <p class="text-secondary small mb-3" style="font-size: 0.78rem; line-height: 1.5;">
                            Biển Mỹ Khê sóng êm, Cáp treo Bà Nà vận hành thông suốt. Thời điểm lý tưởng cho tour di sản Hội An và ngắm hoàng hôn Bán đảo Sơn Trà.
                        </p>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top small">
                            <span class="text-secondary" style="font-size: 0.72rem;">Thủy triều Sơn Trà: <strong>Thuận lợi</strong></span>
                            <a href="javascript:void(0)" class="text-pink text-decoration-none fw-semibold" style="font-size: 0.72rem;" @click="handleForecast">
                                Xem dự báo tuần &gt;
                            </a>
                        </div>
                    </div>

                    <!-- Widget 3: Đường Dây Nóng Trợ Giúp -->
                    <div class="card border rounded-4 shadow-sm p-4 bg-white">
                        <h3 class="h6 fw-bold text-dark text-uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                            Đường Dây Nóng Trợ Giúp
                        </h3>
                        <div class="d-flex flex-column gap-2 small">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-secondary">Trung tâm Hỗ trợ Du khách ĐN:</span>
                                <strong class="text-pink">0236 3550 111</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-secondary">Cứu hộ Bờ biển Đà Nẵng:</span>
                                <strong class="text-dark">0236 3945 962</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-secondary">Công an Du lịch thường trực:</span>
                                <strong class="text-dark">0236 3822 300</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal: E-Ticket QR Check-in -->
        <div class="modal fade" :class="{ show: showTicketModal }" :style="{ display: showTicketModal ? 'block' : 'none' }" tabindex="-1" v-if="showTicketModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark">Vé Điện Tử E-Ticket QR</h5>
                        <button type="button" class="btn-close" @click="showTicketModal = false"></button>
                    </div>
                    <div class="modal-body p-4 text-center">
                        <span class="badge bg-pink text-white rounded-pill px-3 py-1 small mb-2">#TOUR-BK-98214</span>
                        <h6 class="fw-bold text-dark mb-3">Di Sản Miền Trung: Đà Nẵng – Hội An – Bà Nà Hills 3N2Đ</h6>
                        <div class="p-3 bg-light rounded-4 border d-inline-block mb-3">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=TOUR-BK-98214-CHECKIN" alt="Ticket QR" class="rounded-3" style="width: 160px; height: 160px;">
                            <div class="small text-muted mt-2">Đưa mã QR cho HDV hoặc quầy vé Sun World</div>
                        </div>
                        <div class="text-start small text-secondary bg-light p-3 rounded-3 border">
                            <div><strong>Khởi hành:</strong> 07:30 – Thứ Ba, 25/11/2025</div>
                            <div><strong>Điểm đón:</strong> Ga Quốc Tế T1 Sân Bay Đà Nẵng</div>
                            <div><strong>HDV phụ trách:</strong> Nguyễn Văn Hùng (0905 123 456)</div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" @click="showTicketModal = false">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal: Viết Đánh Giá -->
        <div class="modal fade" :class="{ show: showReviewModal }" :style="{ display: showReviewModal ? 'block' : 'none' }" tabindex="-1" v-if="showReviewModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-dark">Viết Đánh Giá Chuyến Đi</h5>
                        <button type="button" class="btn-close" @click="showReviewModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="text-center mb-3">
                            <div class="text-muted small mb-1">Mức độ hài lòng của bạn:</div>
                            <div class="text-warning fs-3">
                                <i v-for="s in 5" :key="s" class="bx" :class="s <= reviewScore ? 'bxs-star cursor-pointer' : 'bx-star cursor-pointer'" @click="reviewScore = s"></i>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Chia sẻ trải nghiệm của bạn *</label>
                            <textarea class="form-control rounded-3" rows="3" placeholder="Chất lượng xe, hướng dẫn viên, bữa ăn đặc sản..." v-model="reviewContent"></textarea>
                        </div>
                        <div class="alert alert-info border-0 rounded-3 small mb-0">
                            <i class="bx bx-gift me-1 text-pink"></i>Đánh giá hợp lệ kèm nhận xét chi tiết sẽ nhận ngay <strong>+100 điểm tích lũy</strong> vào ví du khách!
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" @click="showReviewModal = false">Hủy</button>
                        <button type="button" class="btn btn-pink text-white rounded-pill px-4" @click="handleSubmitReview">Gửi Đánh Giá</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show" v-if="showTicketModal || showReviewModal" @click="closeModals"></div>
    </div>
</template>

<script>
export default {
    name: 'QuanLyDonDatTourComponent',
    data() {
        return {
            currentTab: 'all',
            showTicketModal: false,
            showReviewModal: false,
            reviewScore: 5,
            reviewContent: '',
            filterTabs: [
                { key: 'all', label: 'Tất cả đơn tour', count: 4 },
                { key: 'upcoming', label: 'Sắp diễn ra', count: 1 },
                { key: 'completed', label: 'Đã hoàn thành', count: 2 },
                { key: 'cancelled', label: 'Đã hủy / Hoàn tiền', count: 1 }
            ]
        };
    },
    methods: {
        handleCallHotline() {
            alert('Đang kết nối đến Tổng đài Hỗ trợ Du khách Đà Nẵng: 0236 3550 111...');
        },
        handleOpenTicket() {
            this.showTicketModal = true;
        },
        handleDownloadInvoice() {
            alert('Đang tải hóa đơn điện tử VAT (PDF) cho đơn #TOUR-BK-98214...');
        },
        handleCancelOrReschedule() {
            alert('Chính sách hoàn hủy: Đơn tour của bạn đủ điều kiện hoàn 100% nếu thực hiện trước 72 giờ khởi hành. Vui lòng liên hệ hotline 1900 6868 để đổi lịch miễn phí 1 lần!');
        },
        handleViewTicketHistory() {
            alert('Lịch sử trao đổi hỗ trợ #TK-9921:\n- 08:00: Du khách gửi câu hỏi xác nhận điểm đón\n- 08:15: CSKH phản hồi xác nhận giờ xe đón 07:45');
        },
        handleForecast() {
            alert('Dự báo thời tiết tuần tại Đà Nẵng: 27°C - 31°C, nắng đẹp, thích hợp tắm biển và tham quan Bà Nà Hills.');
        },
        handleSubmitReview() {
            if (!this.reviewContent.trim()) {
                alert('Vui lòng nhập nội dung đánh giá!');
                return;
            }
            alert('Cảm ơn bạn đã gửi đánh giá! Bạn đã được cộng +100 điểm thưởng tích lũy.');
            this.showReviewModal = false;
            this.reviewContent = '';
        },
        closeModals() {
            this.showTicketModal = false;
            this.showReviewModal = false;
        }
    }
};
</script>

<style scoped>
.quan-ly-don-tour-page {
    max-width: 100%;
    overflow-x: hidden;
}

/* Color tokens */
.text-pink { color: #db2777 !important; }
.text-teal { color: #0d9488 !important; }
.text-purple { color: #7c3aed !important; }
.bg-pink { background: linear-gradient(135deg, #ec4899 0%, #db2777 100%) !important; }
.bg-teal-subtle { background-color: #ccfbf1 !important; }

/* 1. Header */
.badge-service-tag {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
}
.btn-outline-incident {
    background: #fff;
    border: 1px solid #e2e8f0;
    color: #334155;
    font-size: 0.88rem;
    transition: all 0.2s;
}
.btn-outline-incident:hover {
    background: #fdf2f8;
    border-color: #fbcfe8;
}
.btn-phone-round {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    box-shadow: 0 4px 10px rgba(109, 40, 217, 0.25);
    border: none;
    transition: all 0.2s;
}
.btn-phone-round:hover {
    opacity: 0.95;
    transform: scale(1.05);
}

/* 2. Stat KPI Cards */
.stat-order-card {
    border-color: #f1f5f9 !important;
    transition: transform 0.2s ease;
}
.stat-order-card:hover {
    transform: translateY(-2px);
}
.stat-icon-wrap {
    width: 50px;
    height: 50px;
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
.stat-icon-red {
    background: #fff1f2;
    color: #e11d48;
}
.stat-caption {
    font-size: 0.72rem;
    letter-spacing: 0.4px;
}
.stat-main-val {
    font-size: 1.65rem;
    line-height: 1.1;
}

/* 3. Filter Tabs */
.btn-filter-tab {
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #475569;
    transition: all 0.2s;
}
.btn-filter-tab:hover {
    background-color: #f1f5f9;
}
.btn-filter-tab.active {
    background: #db2777;
    border-color: #db2777;
    color: #fff;
    box-shadow: 0 2px 8px rgba(219, 39, 119, 0.25);
}

/* 4. Order Item Cards */
.order-item-card {
    border-color: #f1f5f9 !important;
}
.badge-upcoming-pill {
    background: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
}
.badge-completed-pill {
    background: #faf5ff;
    color: #7c3aed;
    border: 1px solid #ede9fe;
}
.order-thumb-wrap {
    height: 130px;
}
.badge-duration-pill {
    background: rgba(15, 23, 42, 0.75);
    color: #fff;
    backdrop-filter: blur(4px);
    font-size: 0.7rem;
}
.btn-ticket-pink {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    box-shadow: 0 4px 10px rgba(219, 39, 119, 0.25);
    border: none;
    transition: all 0.2s;
}
.btn-ticket-pink:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}
.btn-reorder-purple {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    box-shadow: 0 4px 10px rgba(109, 40, 217, 0.25);
    border: none;
    transition: all 0.2s;
}
.btn-reorder-purple:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}
.review-prompt-banner {
    background: linear-gradient(135deg, #fdf2f8 0%, #fff1f2 100%);
    border: 1px solid #fbcfe8;
}
.prompt-icon-circle {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
}
.btn-write-review {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    box-shadow: 0 4px 10px rgba(219, 39, 119, 0.25);
    border: none;
    transition: all 0.2s;
}
.btn-write-review:hover {
    opacity: 0.95;
    transform: translateY(-1px);
}

/* 5. Right Column Widgets */
.ticket-box {
    border-color: #f1f5f9 !important;
}
.guarantee-box {
    border-color: #f1f5f9 !important;
}
.btn-outline-incident-full {
    background-color: #f8fafc;
    border-color: #e2e8f0;
    transition: all 0.2s;
}
.btn-outline-incident-full:hover {
    background-color: #f1f5f9;
}
</style>
