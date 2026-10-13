<template>
    <div class="danang-landing-wrapper">
        <!-- 1. THANH HEADER TRÊN CÙNG (ĐẨY LÊN TRÊN CÙNG, KHÔNG DÍNH NỀN) -->
        <header class="landing-header-bar">
            <div class="landing-nav-container">
                <!-- Left: Logo & Slogan -->
                <router-link to="/" class="nav-brand">
                    <div class="brand-icon-box">
                        <i class="bx bxs-paper-plane"></i>
                    </div>
                    <div class="brand-text">
                        <span class="brand-title">Đà Nẵng Smart Travel AI</span>
                        <span class="brand-subtitle">Du lịch thông minh & AI Planner</span>
                    </div>
                </router-link>

                <!-- Center: Navigation Links -->
                <nav class="nav-menu d-none d-lg-flex">
                    <router-link to="/client/tim-kiem-dia-diem" class="nav-link-item">
                        <i class="bx bx-compass"></i>
                        <span>Khám phá Điểm đến</span>
                    </router-link>
                    <router-link to="/client/tour" class="nav-link-item">
                        <i class="bx bx-map-pin"></i>
                        <span>Tour & Trải nghiệm</span>
                    </router-link>
                    <a href="#ho-tro" class="nav-link-item" @click.prevent="openSupportModal">
                        <i class="bx bx-headphone"></i>
                        <span>Hỗ trợ 24/7</span>
                    </a>
                </nav>

                <!-- Right: Lang Switcher & Auth Buttons -->
                <div class="nav-actions">
                    <!-- Language Switcher Pill -->
                    <div class="lang-pill-switch">
                        <button 
                            type="button" 
                            class="lang-btn" 
                            :class="{ active: currentLang === 'VI' }"
                            @click="currentLang = 'VI'"
                        >VI</button>
                        <button 
                            type="button" 
                            class="lang-btn" 
                            :class="{ active: currentLang === 'EN' }"
                            @click="currentLang = 'EN'"
                        >EN</button>
                    </div>

                    <!-- Register Button -->
                    <router-link to="/login" class="btn-create-account d-none d-sm-inline-block">
                        Tạo tài khoản
                    </router-link>

                    <!-- Login Button -->
                    <router-link to="/login" class="btn-system-login">
                        <i class="bx bx-log-in-circle me-1 font-16"></i>
                        <span>Đăng nhập hệ thống</span>
                    </router-link>
                </div>
            </div>
        </header>

        <!-- 2. HERO SECTION VỚI ẢNH NỀN THEO YÊU CẦU (ĐẨY XUỐNG DƯỚI HEADER) -->
        <section class="landing-hero-section">
            <div class="landing-content-container">
                <div class="landing-hero-card">
                    <div class="hero-banner-overlay"></div>
                    <div class="hero-content">
                        <!-- Top Pill Badge -->
                        <div class="hero-badge-pill">
                            <span class="badge-dot"></span>
                            <span>ĐÀ NẴNG SMART TRAVEL • HỆ THỐNG LẬP KẾ HOẠCH DU LỊCH CÁ NHÂN HÓA</span>
                        </div>

                        <!-- Main Headline -->
                        <h1 class="hero-title">
                            Xây Dựng Kế Hoạch Du Lịch Đà Nẵng<br />
                            Tối Ưu Cá Nhân Hóa Với <span class="ai-gradient-text">Trợ Lý Thông Minh</span>
                        </h1>

                        <!-- Subtitle -->
                        <p class="hero-desc">
                            Hệ thống hỗ trợ lập kế hoạch du lịch cá nhân hóa tại Đà Nẵng ứng dụng thuật toán tối ưu lịch trình. Phân tích sở thích cá nhân, tự động tối ưu hóa ngân sách và gợi ý lịch trình chi tiết cho chuyến đi hoàn hảo.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. AI PLANNER FORM CARD (CẬP NHẬT: ĐỊA ĐIỂM, NGÂN SÁCH, NGÀY ĐI, NGÀY VỀ, NGƯỜI LỚN, TRẺ EM) -->
        <section class="landing-planner-section">
            <div class="landing-content-container">
                <div class="planner-card">
                    <!-- Form Header -->
                    <div class="planner-header">
                        <div class="planner-title">
                            <i class="bx bx-sparkles planner-ai-icon"></i>
                            <span>Trình khởi tạo Lịch trình Nhanh cùng AI Trợ lý</span>
                        </div>
                        <div class="planner-sub-badge">
                            Dự báo ngân sách tức thì 2026
                        </div>
                    </div>

                    <!-- Form Controls Grid (3 Cột x 2 Hàng) -->
                    <div class="planner-form-grid">
                        <!-- Field 1: ĐỊA ĐIỂM -->
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="bx bx-map me-1 text-primary"></i>ĐỊA ĐIỂM
                            </label>
                            <div class="select-wrapper">
                                <select class="form-select-custom" v-model="plannerForm.location">
                                    <option value="Tất cả khu vực Đà Nẵng">Tất cả khu vực Đà Nẵng</option>
                                    <option value="Quận Sơn Trà & Bán đảo Sơn Trà">Quận Sơn Trà & Bán đảo Sơn Trà</option>
                                    <option value="Quận Ngũ Hành Sơn & Bãi Biển Mỹ Khê">Quận Ngũ Hành Sơn & Bãi Biển Mỹ Khê</option>
                                    <option value="Quận Hải Châu & Trung tâm Sông Hàn">Quận Hải Châu & Trung tâm Sông Hàn</option>
                                    <option value="Hòa Vang & Sun World Bà Nà Hills">Hòa Vang & Sun World Bà Nà Hills</option>
                                    <option value="Quận Thanh Khê & Liên Chiểu">Quận Thanh Khê & Liên Chiểu</option>
                                    <option value="Tour kết hợp Đà Nẵng - Phố Cổ Hội An">Tour kết hợp Đà Nẵng - Phố Cổ Hội An</option>
                                </select>
                                <i class="bx bx-chevron-down select-arrow"></i>
                            </div>
                        </div>

                        <!-- Field 2: NGÂN SÁCH DỰ KIẾN -->
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="bx bx-wallet me-1 text-primary"></i>NGÂN SÁCH DỰ KIẾN (VNĐ)
                            </label>
                            <div class="select-wrapper">
                                <select class="form-select-custom" v-model="plannerForm.budget">
                                    <option value="Tiêu chuẩn (3.000.000đ - 5.000.000đ)">Tiêu chuẩn (3.000.000đ - 5.000.000đ)</option>
                                    <option value="Tiết kiệm (Dưới 3.000.000đ)">Tiết kiệm (Dưới 3.000.000đ)</option>
                                    <option value="Cao cấp (5.000.000đ - 10.000.000đ)">Cao cấp (5.000.000đ - 10.000.000đ)</option>
                                    <option value="Nghỉ dưỡng sang trọng (> 10.000.000đ)">Nghỉ dưỡng sang trọng (> 10.000.000đ)</option>
                                </select>
                                <i class="bx bx-chevron-down select-arrow"></i>
                            </div>
                        </div>

                        <!-- Field 3: NGÀY ĐI -->
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="bx bx-calendar me-1 text-primary"></i>NGÀY ĐI
                            </label>
                            <div class="select-wrapper">
                                <input 
                                    type="date" 
                                    class="form-select-custom form-date-custom" 
                                    v-model="plannerForm.startDate" 
                                />
                            </div>
                        </div>

                        <!-- Field 4: NGÀY VỀ -->
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="bx bx-calendar-check me-1 text-primary"></i>NGÀY VỀ
                            </label>
                            <div class="select-wrapper">
                                <input 
                                    type="date" 
                                    class="form-select-custom form-date-custom" 
                                    v-model="plannerForm.endDate" 
                                />
                            </div>
                        </div>

                        <!-- Field 5: SỐ LƯỢNG NGƯỜI (NGƯỜI LỚN) -->
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="bx bx-user me-1 text-primary"></i>SỐ LƯỢNG NGƯỜI (NGƯỜI LỚN)
                            </label>
                            <div class="select-wrapper">
                                <select class="form-select-custom" v-model="plannerForm.adults">
                                    <option value="1 Người lớn">1 Người lớn</option>
                                    <option value="2 Người lớn">2 Người lớn</option>
                                    <option value="3 Người lớn">3 Người lớn</option>
                                    <option value="4 Người lớn">4 Người lớn</option>
                                    <option value="5 Người lớn">5 Người lớn</option>
                                    <option value="6 - 8 Người lớn">6 - 8 Người lớn</option>
                                    <option value="Đoàn trên 8 Người">Đoàn trên 8 Người</option>
                                </select>
                                <i class="bx bx-chevron-down select-arrow"></i>
                            </div>
                        </div>

                        <!-- Field 6: SỐ LƯỢNG TRẺ EM -->
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="bx bx-face me-1 text-primary"></i>SỐ LƯỢNG TRẺ EM
                            </label>
                            <div class="select-wrapper">
                                <select class="form-select-custom" v-model="plannerForm.children">
                                    <option value="0 Trẻ em">0 Trẻ em</option>
                                    <option value="1 Trẻ em (< 12 tuổi)">1 Trẻ em (&lt; 12 tuổi)</option>
                                    <option value="2 Trẻ em (< 12 tuổi)">2 Trẻ em (&lt; 12 tuổi)</option>
                                    <option value="3 Trẻ em (< 12 tuổi)">3 Trẻ em (&lt; 12 tuổi)</option>
                                    <option value="4+ Trẻ em (&lt; 12 tuổi)">4+ Trẻ em (&lt; 12 tuổi)</option>
                                </select>
                                <i class="bx bx-chevron-down select-arrow"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button Row (Nổi bật, canh giữa) -->
                    <div class="planner-action-bar">
                        <button type="button" class="btn-create-itinerary" @click="handleCreateItinerary">
                            <i class="bx bx-bot font-20 me-1"></i>
                            <span>Tạo lịch trình AI ngay</span>
                            <i class="bx bx-right-arrow-alt font-20 ms-1"></i>
                        </button>
                    </div>

                    <!-- Form Helper Features Bottom -->
                    <div class="planner-footer-features">
                        <div class="feature-bullets">
                            <div class="bullet-item">
                                <span class="dot-green"></span>
                                <span>Tự động cân bằng chi phí vé, khách sạn & ẩm thực</span>
                            </div>
                            <div class="bullet-item">
                                <span class="dot-blue"></span>
                                <span>Tránh kẹt xe tại Cầu Rồng & các điểm cao điểm</span>
                            </div>
                        </div>
                        <div class="accuracy-score">
                            <span>Độ chính xác lịch trình: <strong>99.2%</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. STATS COUNTER BAR -->
        <section class="stats-counter-section">
            <div class="landing-content-container">
                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3">
                        <div class="stat-counter-box">
                            <div class="stat-number text-primary">48,250+</div>
                            <div class="stat-label">KHÁCH DU LỊCH TIN DÙNG</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-counter-box">
                            <div class="stat-number text-teal">380+</div>
                            <div class="stat-label">ĐỐI TÁC NHÀ XE & KHÁCH SẠN</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-counter-box">
                            <div class="stat-number text-amber">98.6%</div>
                            <div class="stat-label">TỶ LỆ HÀI LÒNG</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-counter-box">
                            <div class="stat-number text-navy">2.4 Giây</div>
                            <div class="stat-label">TỐC ĐỘ XUẤT LỊCH TRÌNH</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. SECTION: KIẾN TRÚC CỔNG ĐĂNG NHẬP ĐA VAI TRÒ -->
        <section class="portals-section">
            <div class="landing-content-container">
                <!-- Section Header -->
                <div class="section-header-center">
                    <div class="section-tag-pill">KIẾN TRÚC CỔNG ĐĂNG NHẬP ĐA VAI TRÒ</div>
                    <h2 class="section-main-title">Một nền tảng du lịch – 3 Trải nghiệm chuyên biệt</h2>
                    <p class="section-desc">
                        Hệ sinh thái Đà Nẵng Smart Travel kết nối liền mạch giữa Khách du lịch cá nhân, Các cơ sở cung ứng dịch vụ tại địa phương và Ban quản trị điều phối thông minh.
                    </p>
                </div>

                <!-- 3 Portal Cards -->
                <div class="row g-4">
                    <!-- Portal 1: Customer -->
                    <div class="col-12 col-lg-4">
                        <div class="portal-card customer-card">
                            <div class="portal-badge-pill pill-customer">
                                CỔNG 01 • KHÁCH DU LỊCH
                            </div>
                            <div class="portal-icon-box icon-customer">
                                <i class="bx bx-user"></i>
                            </div>
                            <h3 class="portal-title">Khách Hàng (Customer)</h3>
                            <div class="portal-kicker">DU LỊCH THÔNG MINH, CHUẨN NGÂN SÁCH</div>
                            
                            <ul class="portal-checklist">
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Lên kế hoạch cá nhân hóa bằng Trợ lý ảo AI theo từng tag sở thích</span>
                                </li>
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Săn mã ưu đãi Voucher & Đặt tour Đà Nẵng trực tiếp</span>
                                </li>
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Chia sẻ hành trình cho nhóm bạn bè, theo dõi chi tiêu thực tế</span>
                                </li>
                            </ul>

                            <div class="portal-actions">
                                <router-link to="/login" class="btn-portal btn-customer-solid">
                                    Đăng nhập Khách hàng
                                </router-link>
                                <router-link to="/login" class="btn-portal btn-customer-outline">
                                    Đăng ký tài khoản mới
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <!-- Portal 2: Partner -->
                    <div class="col-12 col-lg-4">
                        <div class="portal-card partner-card">
                            <div class="portal-badge-pill pill-partner">
                                CỔNG 02 • DOANH NGHIỆP & NHÀ XE
                            </div>
                            <div class="portal-icon-box icon-partner">
                                <i class="bx bx-store-alt"></i>
                            </div>
                            <h3 class="portal-title">Đối Tác (Partner)</h3>
                            <div class="portal-kicker">MỞ RỘNG KINH DOANH DỊCH VỤ ĐÀ NẴNG</div>

                            <ul class="portal-checklist">
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Đăng tải địa điểm, khách sạn, tour tham quan với bảng giá niêm yết</span>
                                </li>
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Hệ thống phân phối phòng/vé vào thuật toán đề xuất của khách</span>
                                </li>
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Đối soát doanh thu tức thời, quản lý booking không lo tồn phòng</span>
                                </li>
                            </ul>

                            <div class="portal-actions">
                                <router-link to="/login" class="btn-portal btn-partner-solid">
                                    Cổng đăng nhập Đối tác
                                </router-link>
                                <router-link to="/login" class="btn-portal btn-partner-outline">
                                    Đăng ký trở thành Đối tác
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <!-- Portal 3: Admin -->
                    <div class="col-12 col-lg-4">
                        <div class="portal-card admin-card">
                            <div class="portal-badge-pill pill-admin">
                                CỔNG 03 • TRUNG TÂM KIỂM SOÁT
                            </div>
                            <div class="portal-icon-box icon-admin">
                                <i class="bx bx-shield-quarter"></i>
                            </div>
                            <h3 class="portal-title">Quản Trị Viên (Admin)</h3>
                            <div class="portal-kicker">TRUNG TÂM ĐIỀU HÀNH DỮ LIỆU SỐ HÓA</div>

                            <ul class="portal-checklist">
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Phân quyền chức vụ Admin, Manager, Moderator, Support</span>
                                </li>
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Kiểm duyệt nội dung địa điểm, xác thực tư cách đối tác kinh doanh</span>
                                </li>
                                <li>
                                    <i class="bx bx-check check-icon"></i>
                                    <span>Giám sát hiệu suất thuật toán Knapsack và phân tích dòng tiền hệ thống</span>
                                </li>
                            </ul>

                            <div class="portal-actions">
                                <router-link to="/admin/dashboard" class="btn-portal btn-admin-solid">
                                    Cổng Quản Trị Hệ thống
                                </router-link>
                                <div class="admin-security-note">
                                    <i class="bx bx-lock-alt me-1 font-12"></i>
                                    <span>Bảo mật xác thực 2 lớp (2FA)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. SECTION: DỮ LIỆU BẢN ĐỒ DU LỊCH ĐÀ NẴNG -->
        <section class="destinations-section">
            <div class="landing-content-container">
                <!-- Section Header Row -->
                <div class="destinations-header-row">
                    <div>
                        <div class="section-tag-pill text-start">DỮ LIỆU BẢN ĐỒ DU LỊCH ĐÀ NẴNG</div>
                        <h2 class="destinations-title">Điểm Đến & Trải Nghiệm Nổi Bật</h2>
                        <p class="destinations-subtitle">
                            Dữ liệu liên tục cập nhật giá vé, thời gian mở cửa từ 380+ đối tác tại Đà Nẵng
                        </p>
                    </div>
                    <div>
                        <router-link to="/client/tim-kiem-dia-diem" class="view-all-link">
                            <span>Xem tất cả 150+ điểm đến</span>
                            <i class="bx bx-chevron-right font-18"></i>
                        </router-link>
                    </div>
                </div>

                <!-- 3 Featured Destination Cards -->
                <div class="row g-4">
                    <!-- Card 1: Ba Na Hills -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="destination-card">
                            <div class="card-top-meta">
                                <span class="location-badge badge-amber">Hòa Vang, Đà Nẵng</span>
                                <span class="rating-badge">
                                    <i class="bx bxs-star star-icon"></i>
                                    <strong>4.9</strong> (1.2k đánh giá)
                                </span>
                            </div>

                            <h4 class="dest-title">Sun World Bà Nà Hills - Cầu Vàng</h4>
                            <p class="dest-desc">
                                Kỳ quan thế giới ở độ cao 1.487m, khí hậu 4 mùa trong 1 ngày, làng Pháp cổ kính và Cầu Vàng trứ danh.
                            </p>

                            <div class="dest-tags">
                                <span class="dest-tag">#CheckinSongAo</span>
                                <span class="dest-tag">#CapTreo</span>
                                <span class="dest-tag">#KhongTheBoLo</span>
                            </div>

                            <div class="card-bottom-price-action">
                                <div class="price-box">
                                    <span class="price-label">VÉ CÁP TREO TỪ</span>
                                    <div class="price-val">
                                        <strong class="text-primary font-18">900.000đ</strong>
                                        <span class="unit-text"> / người</span>
                                    </div>
                                </div>
                                <button type="button" class="btn-add-itinerary btn-blue" @click="addToTrip('Sun World Bà Nà Hills')">
                                    Thêm vào lịch trình
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Son Tra & Linh Ung -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="destination-card">
                            <div class="card-top-meta">
                                <span class="location-badge badge-teal">Sơn Trà, Đà Nẵng</span>
                                <span class="rating-badge">
                                    <i class="bx bxs-star star-icon"></i>
                                    <strong>4.8</strong> (890 đánh giá)
                                </span>
                            </div>

                            <h4 class="dest-title">Bán đảo Sơn Trà & Chùa Linh Ứng</h4>
                            <p class="dest-desc">
                                Lá phổi xanh của thành phố, chiêm bái tượng Quán Thế Âm cao 67m ngắm trọn vịnh Đà Nẵng và ngắm voọc chà vá chân nâu.
                            </p>

                            <div class="dest-tags">
                                <span class="dest-tag">#TamLinh</span>
                                <span class="dest-tag">#Trekking</span>
                                <span class="dest-tag">#MienPhiVe</span>
                            </div>

                            <div class="card-bottom-price-action">
                                <div class="price-box">
                                    <span class="price-label">CHI PHÍ THAM QUAN</span>
                                    <div class="price-val">
                                        <strong class="text-teal font-18">Miễn Phí</strong>
                                        <span class="unit-text"> (vé vào cổng)</span>
                                    </div>
                                </div>
                                <button type="button" class="btn-add-itinerary btn-teal" @click="addToTrip('Bán đảo Sơn Trà & Chùa Linh Ứng')">
                                    Thêm vào lịch trình
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Han River Cruise -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="destination-card">
                            <div class="card-top-meta">
                                <span class="location-badge badge-blue">Hải Châu, Đà Nẵng</span>
                                <span class="rating-badge">
                                    <i class="bx bxs-star star-icon"></i>
                                    <strong>4.7</strong> (2.1k đánh giá)
                                </span>
                            </div>

                            <h4 class="dest-title">Du Thuyền Sông Hàn Ngắm Cầu Rồng</h4>
                            <p class="dest-desc">
                                Trải nghiệm du ngoạn sông Hàn về đêm lung linh, thưởng thức múa Chăm Pa và xem Rồng phun lửa, phun nước cuối tuần.
                            </p>

                            <div class="dest-tags">
                                <span class="dest-tag">#SongHanVeDem</span>
                                <span class="dest-tag">#CauRongPhunLua</span>
                                <span class="dest-tag">#GiaiTri</span>
                            </div>

                            <div class="card-bottom-price-action">
                                <div class="price-box">
                                    <span class="price-label">VÉ TRỌN GÓI TỪ</span>
                                    <div class="price-val">
                                        <strong class="text-primary font-18">160.000đ</strong>
                                        <span class="unit-text"> / khách</span>
                                    </div>
                                </div>
                                <button type="button" class="btn-add-itinerary btn-blue" @click="addToTrip('Du Thuyền Sông Hàn Ngắm Cầu Rồng')">
                                    Thêm vào lịch trình
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. FOOTER (DARK THEME) -->
        <footer class="landing-footer" id="ho-tro">
            <div class="landing-content-container">
                <div class="row g-4 pb-4">
                    <!-- Col 1: Brand Info -->
                    <div class="col-12 col-lg-4">
                        <div class="footer-brand mb-3">
                            <div class="brand-icon-box footer-icon">
                                <i class="bx bxs-paper-plane"></i>
                            </div>
                            <div>
                                <h5 class="footer-brand-name">Da Nang Smart Travel</h5>
                                <div class="footer-brand-pill">Hệ Thống Lập Kế Hoạch Du Lịch Thông Minh</div>
                            </div>
                        </div>
                        <p class="footer-desc">
                            Ứng dụng công nghệ trí tuệ nhân tạo và tối ưu hóa thu nhập để mang đến cho mỗi du khách một hành trình Đà Nẵng trọn vẹn, đúng ngân sách và đậm đà bản sắc.
                        </p>
                        <div class="footer-contact-info">
                            <div class="contact-item">
                                <i class="bx bx-map-pin contact-icon"></i>
                                <span>Trung tâm Khởi nghiệp Đổi mới Sáng tạo TP Đà Nẵng</span>
                            </div>
                            <div class="contact-item">
                                <i class="bx bx-phone-call contact-icon"></i>
                                <span>Hotline Hỗ trợ 24/7: <strong>1900 6868</strong> - (0236) 3868 999</span>
                            </div>
                        </div>
                    </div>

                    <!-- Col 2: Khách du lịch -->
                    <div class="col-6 col-md-4 col-lg-2 offset-lg-1">
                        <h6 class="footer-col-heading">KHÁCH DU LỊCH</h6>
                        <ul class="footer-links-list">
                            <li><router-link to="/client/lap-ke-hoach-ai">Tạo lịch trình AI tự động</router-link></li>
                            <li><router-link to="/client/tim-kiem-dia-diem">Bản đồ điểm đến Đà Nẵng</router-link></li>
                            <li><router-link to="/client/tour">Tour Bà Nà & Sơn Trà</router-link></li>
                            <li><router-link to="/client/tour">Săn Voucher Khách sạn</router-link></li>
                            <li><router-link to="/client/tim-kiem-dia-diem">Cẩm nang Ẩm thực đêm</router-link></li>
                        </ul>
                    </div>

                    <!-- Col 3: Dành cho đối tác -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <h6 class="footer-col-heading">DÀNH CHO ĐỐI TÁC</h6>
                        <ul class="footer-links-list">
                            <li><router-link to="/login">Đăng ký Nhà cung cấp Tour</router-link></li>
                            <li><router-link to="/login">Cổng liên kết Khách sạn</router-link></li>
                            <li><router-link to="/login">Đối tác Nhà xe & Vận chuyển</router-link></li>
                            <li><router-link to="/login">Chính sách hoa hồng minh bạch</router-link></li>
                            <li><router-link to="/login">Tài liệu API Tích hợp B2B</router-link></li>
                        </ul>
                    </div>

                    <!-- Col 4: Hệ thống & Quy chuẩn -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <h6 class="footer-col-heading">HỆ THỐNG & QUY CHUẨN</h6>
                        <ul class="footer-links-list">
                            <li><router-link to="/admin/dashboard">Cổng Quản trị viên (Admin)</router-link></li>
                            <li><a href="javascript:;">Tài liệu Thuật toán AI</a></li>
                            <li><a href="javascript:;">Quy chế Bảo mật Dữ liệu (GDPR)</a></li>
                            <li><a href="javascript:;">Điều khoản Sử dụng Dịch vụ</a></li>
                            <li><a href="javascript:;">Chứng nhận Du lịch Xanh Đà Nẵng</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Copyright Bottom -->
                <div class="footer-bottom-bar">
                    <div class="copyright-text">
                        © 2026 <strong>Đà Nẵng Smart Travel</strong>. Bản quyền thuộc về hệ thống Đà Nẵng Smart Travel.
                    </div>
                    <div class="system-status-pill">
                        <span class="status-pulse-dot"></span>
                        <span>Hệ thống AI hoạt động ổn định · v3.2</span>
                    </div>
                </div>
            </div>
        </footer>

        <!-- INTERACTIVE AI MODAL: TẠO LỊCH TRÌNH NHANH -->
        <div class="modal fade" id="aiGeneratingModal" tabindex="-1" aria-hidden="true" ref="aiModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow-lg p-3">
                    <div class="modal-body text-center p-4">
                        <div class="ai-loader-pulse mb-3">
                            <i class="bx bx-bot font-34 text-primary"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Trợ Lý AI Đang Phân Tích Lịch Trình</h5>
                        <p class="text-muted small mb-4">
                            Đang áp dụng thuật toán tối ưu Knapsack cho chuyến đi tại <strong>"{{ plannerForm.location }}"</strong> từ ngày <strong>{{ plannerForm.startDate }}</strong> đến <strong>{{ plannerForm.endDate }}</strong> cho <strong>{{ plannerForm.adults }}</strong>, <strong>{{ plannerForm.children }}</strong>.
                        </p>
                        
                        <div class="ai-steps-box text-start bg-light rounded-3 p-3 mb-4">
                            <div class="d-flex align-items-center mb-2 small" :class="aiStep >= 1 ? 'text-success fw-bold' : 'text-muted'">
                                <i class="bx" :class="aiStep >= 1 ? 'bx-check-circle text-success' : 'bx-loader-circle bx-spin'"></i>
                                <span class="ms-2">1. Khảo sát tọa độ địa điểm & thời gian di chuyển tránh kẹt xe</span>
                            </div>
                            <div class="d-flex align-items-center mb-2 small" :class="aiStep >= 2 ? 'text-success fw-bold' : 'text-muted'">
                                <i class="bx" :class="aiStep >= 2 ? 'bx-check-circle text-success' : 'bx-loader-circle bx-spin'"></i>
                                <span class="ms-2">2. Cân bằng ngân sách phù hợp cho cả người lớn & trẻ nhỏ</span>
                            </div>
                            <div class="d-flex align-items-center small" :class="aiStep >= 3 ? 'text-success fw-bold' : 'text-muted'">
                                <i class="bx" :class="aiStep >= 3 ? 'bx-check-circle text-success' : 'bx-loader-circle bx-spin'"></i>
                                <span class="ms-2">3. Xuất chi tiết từng khung giờ và điểm dừng chân lý tưởng</span>
                            </div>
                        </div>

                        <button 
                            type="button" 
                            class="btn btn-primary rounded-pill px-4 py-2 w-100 fw-bold"
                            :disabled="aiStep < 3"
                            @click="goToAiPlanner"
                        >
                            {{ aiStep < 3 ? 'Đang khởi tạo thuật toán...' : 'Xem Lịch Trình Chi Tiết Ngay ->' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- FLOATING TOAST NOTIFICATION -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
            <div id="itineraryToast" class="toast align-items-center text-white bg-dark border-0 rounded-3 shadow" role="alert" aria-live="assertive" aria-atomic="true" ref="toastRef">
                <div class="d-flex">
                    <div class="toast-body d-flex align-items-center">
                        <i class="bx bx-check-circle text-success font-20 me-2"></i>
                        <span>{{ toastMessage }}</span>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ClientLandingHomePage',
    data() {
        return {
            currentLang: 'VI',
            plannerForm: {
                location: 'Tất cả khu vực Đà Nẵng',
                budget: 'Tiêu chuẩn (3.000.000đ - 5.000.000đ)',
                startDate: '2026-10-15',
                endDate: '2026-10-18',
                adults: '2 Người lớn',
                children: '0 Trẻ em'
            },
            aiStep: 1,
            toastMessage: '',
            modalInstance: null,
            toastInstance: null
        };
    },
    mounted() {
        if (window.bootstrap) {
            if (this.$refs.aiModal) {
                this.modalInstance = new window.bootstrap.Modal(this.$refs.aiModal);
            }
            if (this.$refs.toastRef) {
                this.toastInstance = new window.bootstrap.Toast(this.$refs.toastRef);
            }
        }
    },
    methods: {
        handleCreateItinerary() {
            this.aiStep = 1;
            if (this.modalInstance) {
                this.modalInstance.show();
                setTimeout(() => { this.aiStep = 2; }, 700);
                setTimeout(() => { this.aiStep = 3; }, 1400);
            } else {
                this.$router.push({
                    path: '/client/lap-ke-hoach-ai',
                    query: { ...this.plannerForm }
                });
            }
        },
        goToAiPlanner() {
            if (this.modalInstance) {
                this.modalInstance.hide();
            }
            this.$router.push({
                path: '/client/lap-ke-hoach-ai',
                query: { ...this.plannerForm }
            });
        },
        addToTrip(name) {
            this.toastMessage = `Đã thêm "${name}" vào lịch trình khởi tạo!`;
            if (this.toastInstance) {
                this.toastInstance.show();
            } else {
                alert(this.toastMessage);
            }
        },
        openSupportModal() {
            alert("Hotline hỗ trợ du khách Đà Nẵng 24/7:\n1900 6868 hoặc (0236) 3868 999\nEmail: hotro@smarttraveldanang.vn");
        }
    }
}
</script>

<style scoped>
/* ==========================================================================
   GLOBAL RESET & LANDING WRAPPER
   ========================================================================== */
.danang-landing-wrapper {
    min-height: 100vh;
    background-color: #f8fafc;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #1e293b;
    line-height: 1.5;
    overflow-x: hidden;
    position: relative;
}

/* ==========================================================================
   1. TOP NAVIGATION BAR (TRÊN CÙNG, ĐỘC LẬP HOÀN TOÀN)
   ========================================================================== */
.landing-header-bar {
    position: relative !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    width: 100% !important;
    background-color: #ffffff !important;
    border-bottom: 1px solid #e2e8f0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    z-index: 100;
}

.landing-nav-container {
    max-width: 1240px;
    margin: 0 auto;
    padding: 14px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Brand */
.nav-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
}

.brand-icon-box {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    box-shadow: 0 4px 10px rgba(2, 132, 199, 0.25);
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.brand-title {
    font-size: 16px;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.2;
}

.brand-subtitle {
    font-size: 11.5px;
    color: #64748b;
    font-weight: 500;
}

/* Nav Menu */
.nav-menu {
    display: flex;
    align-items: center;
    gap: 24px;
}

.nav-link-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #334155;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s ease;
    padding: 6px 4px;
}

.nav-link-item i {
    font-size: 17px;
    color: #0284c7;
}

.nav-link-item:hover {
    color: #0284c7;
}

/* Nav Actions */
.nav-actions {
    display: flex;
    align-items: center;
    gap: 14px;
}

.lang-pill-switch {
    display: flex;
    align-items: center;
    background-color: #f1f5f9;
    border-radius: 9999px;
    padding: 2px;
    border: 1px solid #e2e8f0;
}

.lang-btn {
    border: none;
    background: transparent;
    font-size: 12px;
    font-weight: 700;
    color: #64748b;
    padding: 4px 10px;
    border-radius: 9999px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.lang-btn.active {
    background-color: #0f2942;
    color: #ffffff;
}

.btn-create-account {
    color: #0f172a;
    font-size: 13.5px;
    font-weight: 600;
    text-decoration: none;
    padding: 7px 14px;
    transition: color 0.2s ease;
}

.btn-create-account:hover {
    color: #0284c7;
}

.btn-system-login {
    display: inline-flex;
    align-items: center;
    background-color: #0e3b56;
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 600;
    padding: 8px 18px;
    border-radius: 9999px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(14, 59, 86, 0.15);
}

.btn-system-login:hover {
    background-color: #08293d;
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(14, 59, 86, 0.25);
}

/* ==========================================================================
   2. HERO SECTION VỚI ẢNH NỀN THEO YÊU CẦU
   ========================================================================== */
.landing-hero-section {
    padding: 30px 20px 0;
    position: relative;
    z-index: 1;
}

.landing-content-container {
    max-width: 1240px;
    margin: 0 auto;
    position: relative;
}

.landing-hero-card {
    position: relative;
    border-radius: 28px;
    background: 
        linear-gradient(180deg, rgba(7, 18, 36, 0.82) 0%, rgba(5, 14, 28, 0.92) 100%),
        url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1hsxP5zy8uzrRa8e5aEGELeLmVe3yRF-2rX3lwHGAFg&s=10') center center / cover no-repeat;
    overflow: hidden;
    padding: 60px 24px 70px 24px;
    box-shadow: 0 20px 45px -15px rgba(5, 14, 26, 0.45);
    border: 1px solid rgba(255, 255, 255, 0.08);
}

.hero-banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 50% 20%, rgba(6, 182, 212, 0.18) 0%, transparent 65%);
    pointer-events: none;
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 920px;
    margin: 0 auto;
}

.hero-badge-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background-color: rgba(6, 182, 212, 0.12);
    border: 1px solid rgba(45, 212, 191, 0.45);
    color: #2dd4bf;
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 1.2px;
    padding: 6px 16px;
    border-radius: 9999px;
    margin-bottom: 24px;
    backdrop-filter: blur(4px);
}

.badge-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #2dd4bf;
    box-shadow: 0 0 8px #2dd4bf;
}

.hero-title {
    font-size: 38px;
    font-weight: 800;
    color: #ffffff;
    line-height: 1.3;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

@media (min-width: 768px) {
    .hero-title {
        font-size: 44px;
    }
}

.ai-gradient-text {
    background: linear-gradient(135deg, #2dd4bf 0%, #06b6d4 50%, #38bdf8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-desc {
    color: #cbd5e1;
    font-size: 15px;
    line-height: 1.65;
    max-width: 720px;
    margin: 0 auto;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

/* ==========================================================================
   3. AI PLANNER FORM CARD (6 TRƯỜNG: ĐỊA ĐIỂM, NGÂN SÁCH, NGÀY ĐI, VỀ, NGƯỜI, TRẺ EM)
   ========================================================================== */
.landing-planner-section {
    padding: 30px 20px 0;
    position: relative;
    z-index: 2;
}

.planner-card {
    max-width: 1240px;
    margin: 0 auto;
    background-color: #ffffff;
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.9);
    box-shadow: 0 14px 35px -10px rgba(15, 23, 42, 0.08), 0 4px 12px rgba(0, 0, 0, 0.03);
    padding: 28px 32px;
}

.planner-header {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 22px;
    padding-bottom: 14px;
    border-bottom: 1px solid #f1f5f9;
}

.planner-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 15px;
    font-weight: 700;
    color: #0f172a;
}

.planner-ai-icon {
    font-size: 19px;
    color: #0284c7;
}

.planner-sub-badge {
    font-size: 12px;
    color: #94a3b8;
    font-weight: 500;
}

/* Form Controls Grid (3 cột x 2 hàng dàn đều, không bị co cắt chữ) */
.planner-form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px 20px;
    margin-bottom: 22px;
}

@media (min-width: 640px) {
    .planner-form-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (min-width: 992px) {
    .planner-form-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.form-group-custom {
    display: flex;
    flex-direction: column;
}

.form-label-custom {
    font-size: 11px;
    font-weight: 700;
    color: #475569;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
}

.select-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.form-select-custom {
    width: 100%;
    appearance: none;
    -webkit-appearance: none;
    background-color: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    padding: 11px 34px 11px 14px;
    font-size: 13.5px;
    font-weight: 500;
    color: #1e293b;
    outline: none;
    transition: all 0.2s ease;
    cursor: pointer;
    font-family: inherit;
}

.form-date-custom {
    padding-right: 14px;
}

.form-select-custom:focus {
    border-color: #0284c7;
    box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
}

.select-arrow {
    position: absolute;
    right: 12px;
    pointer-events: none;
    font-size: 16px;
    color: #94a3b8;
}

/* Action Button Bar */
.planner-action-bar {
    display: flex;
    justify-content: center;
    margin-bottom: 18px;
}

.btn-create-itinerary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    color: #ffffff;
    border: none;
    border-radius: 9999px;
    padding: 13px 36px;
    font-size: 14.5px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 6px 20px rgba(2, 132, 199, 0.35);
    white-space: nowrap;
    min-width: 280px;
}

.btn-create-itinerary:hover {
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(2, 132, 199, 0.45);
}

/* Planner Footer Features */
.planner-footer-features {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding-top: 14px;
    border-top: 1px dashed #e2e8f0;
    font-size: 12.5px;
    color: #475569;
}

.feature-bullets {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 18px;
}

.bullet-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

.dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #10b981;
}

.dot-blue {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #0284c7;
}

.accuracy-score {
    color: #64748b;
    font-size: 12.5px;
}

.accuracy-score strong {
    color: #0f172a;
}

/* ==========================================================================
   4. STATS COUNTER BAR
   ========================================================================== */
.stats-counter-section {
    padding: 50px 20px 40px;
}

.stat-counter-box {
    padding: 10px;
}

.stat-number {
    font-size: 32px;
    font-weight: 800;
    line-height: 1.15;
    margin-bottom: 6px;
    letter-spacing: -0.5px;
}

.text-teal {
    color: #0d9488 !important;
}

.text-amber {
    color: #d97706 !important;
}

.text-navy {
    color: #0f172a !important;
}

.stat-label {
    font-size: 11px;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.5px;
}

/* ==========================================================================
   5. PORTALS SECTION (3 VAI TRÒ)
   ========================================================================== */
.portals-section {
    padding: 50px 20px 60px;
    background-color: #f8fafc;
}

.section-header-center {
    text-align: center;
    max-width: 760px;
    margin: 0 auto 40px;
}

.section-tag-pill {
    display: inline-block;
    color: #0284c7;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.section-main-title {
    font-size: 28px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.3;
    margin-bottom: 12px;
}

@media (min-width: 768px) {
    .section-main-title {
        font-size: 32px;
    }
}

.section-desc {
    font-size: 14.5px;
    color: #64748b;
    line-height: 1.6;
    margin: 0 auto;
}

/* Portal Cards */
.portal-card {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 28px 24px 24px;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.02);
    transition: all 0.3s ease;
    position: relative;
}

.portal-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
}

.portal-badge-pill {
    align-self: flex-start;
    font-size: 10.5px;
    font-weight: 700;
    letter-spacing: 0.5px;
    padding: 4px 12px;
    border-radius: 9999px;
    margin-bottom: 18px;
}

.pill-customer {
    background-color: #0c4a6e;
    color: #ffffff;
}

.pill-partner {
    background-color: #0f766e;
    color: #ffffff;
}

.pill-admin {
    background-color: #1e293b;
    color: #ffffff;
}

.portal-icon-box {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 16px;
}

.icon-customer {
    background-color: #e0f2fe;
    color: #0284c7;
}

.icon-partner {
    background-color: #ccfbf1;
    color: #0d9488;
}

.icon-admin {
    background-color: #f1f5f9;
    color: #334155;
}

.portal-title {
    font-size: 19px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 4px;
}

.portal-kicker {
    font-size: 11px;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.5px;
    margin-bottom: 20px;
}

.portal-checklist {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
    flex-grow: 1;
}

.portal-checklist li {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 13px;
    color: #475569;
    line-height: 1.55;
    margin-bottom: 12px;
}

.check-icon {
    font-size: 16px;
    color: #0284c7;
    margin-top: 2px;
    flex-shrink: 0;
}

.partner-card .check-icon {
    color: #0d9488;
}

.admin-card .check-icon {
    color: #475569;
}

.portal-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: auto;
}

.btn-portal {
    display: block;
    width: 100%;
    text-align: center;
    padding: 10px 16px;
    border-radius: 9999px;
    font-size: 13.5px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-customer-solid {
    background-color: #0284c7;
    color: #ffffff;
}

.btn-customer-solid:hover {
    background-color: #0369a1;
    color: #ffffff;
}

.btn-customer-outline {
    background-color: transparent;
    color: #334155;
    border: 1px solid #cbd5e1;
}

.btn-customer-outline:hover {
    background-color: #f8fafc;
    color: #0f172a;
    border-color: #94a3b8;
}

.btn-partner-solid {
    background-color: #0d9488;
    color: #ffffff;
}

.btn-partner-solid:hover {
    background-color: #0f766e;
    color: #ffffff;
}

.btn-partner-outline {
    background-color: transparent;
    color: #334155;
    border: 1px solid #cbd5e1;
}

.btn-partner-outline:hover {
    background-color: #f8fafc;
    color: #0f172a;
    border-color: #94a3b8;
}

.btn-admin-solid {
    background-color: #0f172a;
    color: #ffffff;
}

.btn-admin-solid:hover {
    background-color: #1e293b;
    color: #ffffff;
}

.admin-security-note {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11.5px;
    color: #94a3b8;
    margin-top: 4px;
}

/* ==========================================================================
   6. DESTINATIONS SECTION
   ========================================================================== */
.destinations-section {
    padding: 60px 20px 80px;
    background-color: #ffffff;
}

.destinations-header-row {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-end;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 32px;
}

.destinations-title {
    font-size: 26px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.25;
    margin-bottom: 6px;
}

.destinations-subtitle {
    font-size: 14px;
    color: #64748b;
    margin: 0;
}

.view-all-link {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #0284c7;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: gap 0.2s ease;
}

.view-all-link:hover {
    color: #0369a1;
    gap: 8px;
}

/* Destination Cards */
.destination-card {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    padding: 22px;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.02);
    transition: all 0.3s ease;
}

.destination-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(15, 23, 42, 0.08);
}

.card-top-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
}

.location-badge {
    font-size: 11.5px;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 6px;
}

.badge-amber {
    background-color: #fef3c7;
    color: #b45309;
}

.badge-teal {
    background-color: #ccfbf1;
    color: #0f766e;
}

.badge-blue {
    background-color: #e0f2fe;
    color: #0369a1;
}

.rating-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    color: #64748b;
}

.star-icon {
    color: #f59e0b;
    font-size: 14px;
}

.dest-title {
    font-size: 17px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 8px;
    line-height: 1.35;
}

.dest-desc {
    font-size: 13px;
    color: #64748b;
    line-height: 1.55;
    margin-bottom: 16px;
    min-height: 60px;
}

.dest-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 20px;
}

.dest-tag {
    background-color: #f1f5f9;
    color: #64748b;
    font-size: 11px;
    font-weight: 500;
    padding: 2px 8px;
    border-radius: 4px;
}

.card-bottom-price-action {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-top: auto;
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
}

.price-box {
    display: flex;
    flex-direction: column;
}

.price-label {
    font-size: 10px;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: 0.5px;
}

.price-val {
    display: flex;
    align-items: baseline;
}

.unit-text {
    font-size: 11.5px;
    color: #64748b;
    margin-left: 2px;
}

.btn-add-itinerary {
    border: none;
    border-radius: 9999px;
    padding: 7px 16px;
    font-size: 12.5px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.btn-add-itinerary.btn-blue {
    background-color: #0284c7;
    color: #ffffff;
}

.btn-add-itinerary.btn-blue:hover {
    background-color: #0369a1;
}

.btn-add-itinerary.btn-teal {
    background-color: #0d9488;
    color: #ffffff;
}

.btn-add-itinerary.btn-teal:hover {
    background-color: #0f766e;
}

/* ==========================================================================
   7. FOOTER (DARK THEME)
   ========================================================================== */
.landing-footer {
    background-color: #081325;
    color: #94a3b8;
    padding: 60px 20px 24px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.footer-brand {
    display: flex;
    align-items: center;
    gap: 12px;
}

.brand-icon-box.footer-icon {
    width: 38px;
    height: 38px;
    font-size: 18px;
    border-radius: 10px;
    background: linear-gradient(135deg, #0284c7 0%, #06b6d4 100%);
}

.footer-brand-name {
    font-size: 17px;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
}

.footer-brand-pill {
    font-size: 11px;
    color: #38bdf8;
    font-weight: 500;
}

.footer-desc {
    font-size: 13px;
    line-height: 1.6;
    color: #94a3b8;
    margin-bottom: 20px;
}

.footer-contact-info {
    display: flex;
    flex-direction: column;
    gap: 8px;
    font-size: 12.5px;
    color: #cbd5e1;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.contact-icon {
    font-size: 15px;
    color: #38bdf8;
}

.footer-col-heading {
    color: #ffffff;
    font-size: 12.5px;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 18px;
}

.footer-links-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links-list li {
    margin-bottom: 10px;
}

.footer-links-list a {
    color: #94a3b8;
    font-size: 13px;
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-links-list a:hover {
    color: #38bdf8;
}

.footer-bottom-bar {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding-top: 24px;
    margin-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    font-size: 12px;
}

.copyright-text {
    color: #64748b;
}

.copyright-text strong {
    color: #94a3b8;
}

.system-status-pill {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #94a3b8;
}

.status-pulse-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #10b981;
    box-shadow: 0 0 8px #10b981;
}

/* Modal Styling */
.ai-loader-pulse {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background-color: #e0f2fe;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    animation: pulse 1.8s infinite;
}

@keyframes pulse {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(2, 132, 199, 0.4); }
    70% { transform: scale(1.05); box-shadow: 0 0 0 14px rgba(2, 132, 199, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(2, 132, 199, 0); }
}
</style>