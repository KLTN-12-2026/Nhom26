<template>
    <div class="danang-landing-wrapper">
        <!-- 1. HEADER / NAVBAR -->
        <header class="landing-header-bar">
            <div class="landing-nav-container">
                <!-- Left: Brand Logo -->
                <router-link to="/" class="nav-brand">
                    <div class="brand-icon-box">
                        <i class="bx bxs-paper-plane"></i>
                    </div>
                    <div class="brand-text">
                        <span class="brand-title">SmartTrip <span class="highlight-pink">Đà Nẵng</span></span>
                    </div>
                </router-link>

                <!-- Center: Navigation Menu -->
                <nav class="nav-menu d-none d-xl-flex">
                    <router-link to="/" class="nav-link-item active">
                        <i class="bx bx-home-alt"></i>
                        <span>Trang chủ</span>
                    </router-link>
                    <router-link to="/client/ai-travel-planner" class="nav-link-item">
                        <i class="bx bx-bot"></i>
                        <span>Lịch trình AI</span>
                        <span class="badge-mini-hot">Mới</span>
                    </router-link>
                    <router-link to="/client/kham-pha-dia-diem" class="nav-link-item">
                        <i class="bx bx-compass"></i>
                        <span>Điểm đến</span>
                    </router-link>
                    <router-link to="/client/danh-muc-tour" class="nav-link-item">
                        <i class="bx bx-map-pin"></i>
                        <span>Tour & Trải nghiệm</span>
                    </router-link>
                    <a href="#video-danang" class="nav-link-item">
                        <i class="bx bx-play-circle"></i>
                        <span>Video Đà Nẵng</span>
                    </a>
                    <a href="#ho-tro" class="nav-link-item" @click.prevent="openSupportModal">
                        <i class="bx bx-headphone"></i>
                        <span>Hỗ trợ 24/7</span>
                    </a>
                </nav>

                <!-- Right: CTA & User Profile -->
                <div class="nav-actions">
                    <router-link to="/client/ai-travel-planner" class="btn-create-itinerary-header">
                        <i class="bx bx-sparkles me-1 font-18"></i>
                        <span>Lập lịch trình ngay</span>
                    </router-link>

                    <router-link to="/login" class="btn-user-avatar" title="Đăng nhập tài khoản">
                        <i class="bx bx-user font-20"></i>
                    </router-link>
                </div>
            </div>
        </header>

        <!-- 2. HERO SECTION -->
        <section class="landing-hero-section">
            <div class="hero-bg-overlay"></div>
            <div class="landing-content-container hero-inner-container">
                <!-- Top Badge Pill -->
                <div class="hero-top-badge">
                    <span class="sparkle-icon">✨</span>
                    <span class="badge-text">BƯỚC ĐỘT PHÁ CÔNG NGHỆ DU LỊCH ĐÀ NẴNG</span>
                </div>

                <!-- Main Hero Headings -->
                <h1 class="hero-title-main">
                    ĐÀ NẴNG THÔNG MINH<br />
                    <span class="gradient-text-vip">HÀNH TRÌNH ĐẲNG CẤP VIP</span>
                </h1>

                <p class="hero-description">
                    Tận hưởng kỳ nghỉ trọn vẹn tại thành phố biển với hệ thống lập kế hoạch du lịch tự động bằng AI.<br class="d-none d-md-inline" />
                    Tối ưu thời gian, ngân sách và chuẩn gu cá nhân hóa theo phong cách sống của bạn.
                </p>

                <!-- AI PLANNER SEARCH / GENERATE CARD -->
                <div class="hero-planner-card">
                    <!-- Card Top Header -->
                    <div class="planner-card-header">
                        <div class="planner-header-left">
                            <div class="sparkle-pink-circle">
                                <i class="bx bx-sparkles"></i>
                            </div>
                            <div class="planner-title-group">
                                <div class="planner-title-text">Trợ lý AI Planner thông minh: Tự động tối ưu lộ trình</div>
                                <div class="planner-subtitle-text">Tự động cân bằng chi phí vé, khách sạn, di chuyển và thời gian tham quan</div>
                            </div>
                        </div>
                        <div class="planner-header-right">
                            <span class="badge-free-ai">⚡ 100% MIỄN PHÍ</span>
                            <span class="badge-tag-algo">Thuật toán Knapsack & TSP</span>
                        </div>
                    </div>

                    <!-- 3 Input Selectors -->
                    <div class="planner-inputs-grid">
                        <!-- Field 1: Thời gian -->
                        <div class="planner-field-box">
                            <label class="field-label">
                                <i class="bx bx-calendar text-pink me-1"></i>
                                <span>Thời gian chuyến đi</span>
                            </label>
                            <div class="field-input-wrapper">
                                <select class="field-select" v-model="plannerForm.duration">
                                    <option value="1 Ngày">1 Ngày (Khám phá nhanh)</option>
                                    <option value="2 Ngày 1 Đêm">2 Ngày 1 Đêm (Cuối tuần)</option>
                                    <option value="3 Ngày 2 Đêm">3 Ngày 2 Đêm (Gợi ý tối ưu)</option>
                                    <option value="4 Ngày 3 Đêm">4 Ngày 3 Đêm (Trọn vẹn Đà Nẵng)</option>
                                    <option value="5 Ngày 4 Đêm">5 Ngày 4 Đêm (Nghỉ dưỡng & Hội An)</option>
                                </select>
                                <i class="bx bx-chevron-down select-arrow-icon"></i>
                            </div>
                        </div>

                        <!-- Field 2: Phong cách du lịch -->
                        <div class="planner-field-box">
                            <label class="field-label">
                                <i class="bx bx-compass text-pink me-1"></i>
                                <span>Phong cách du lịch</span>
                            </label>
                            <div class="field-input-wrapper">
                                <select class="field-select" v-model="plannerForm.style">
                                    <option value="Nghỉ dưỡng sang trọng & Check-in">Nghỉ dưỡng sang trọng & Check-in</option>
                                    <option value="Check-in sống ảo & Tọa độ hot">Check-in sống ảo & Tọa độ hot</option>
                                    <option value="Ẩm thực đường phố & Food tour">Ẩm thực đường phố & Food tour</option>
                                    <option value="Văn hóa, Di sản & Thiên nhiên">Văn hóa, Di sản & Thiên nhiên</option>
                                    <option value="Trải nghiệm mạo hiểm & Thể thao biển">Trải nghiệm mạo hiểm & Thể thao biển</option>
                                </select>
                                <i class="bx bx-chevron-down select-arrow-icon"></i>
                            </div>
                        </div>

                        <!-- Field 3: Ngân sách dự kiến -->
                        <div class="planner-field-box">
                            <label class="field-label">
                                <i class="bx bx-wallet text-pink me-1"></i>
                                <span>Ngân sách dự kiến</span>
                            </label>
                            <div class="field-input-wrapper">
                                <select class="field-select" v-model="plannerForm.budget">
                                    <option value="Tiết kiệm (Dưới 3tr/người)">Tiết kiệm (Dưới 3.000.000đ/người)</option>
                                    <option value="Tiêu chuẩn (3tr - 5tr/người)">Tiêu chuẩn (3.000.000đ - 5.000.000đ)</option>
                                    <option value="Cao cấp (5tr - 10tr/người)">Cao cấp (5.000.000đ - 10.000.000đ)</option>
                                    <option value="VIP Thượng lưu (> 10tr/người)">VIP Thượng lưu (> 10.000.000đ)</option>
                                </select>
                                <i class="bx bx-chevron-down select-arrow-icon"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Sở thích ưu tiên Tags -->
                    <div class="planner-tags-row">
                        <span class="tags-label">Sở thích ưu tiên (AI sẽ ưu tiên các điểm này):</span>
                        <div class="tags-container">
                            <button 
                                v-for="(tag, index) in availableTags" 
                                :key="index"
                                type="button"
                                class="tag-pill-btn"
                                :class="{ active: selectedTags.includes(tag) }"
                                @click="toggleTag(tag)"
                            >
                                <i class="bx" :class="selectedTags.includes(tag) ? 'bx-check' : 'bx-plus'"></i>
                                <span>{{ tag }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Big CTA Button -->
                    <div class="planner-cta-row">
                        <button type="button" class="btn-hero-generate" @click="handleGenerateAI">
                            <i class="bx bx-bot font-22 me-2"></i>
                            <span>Khám Phá & Lập Lịch Trình Bằng AI Ngay</span>
                            <i class="bx bx-right-arrow-alt font-22 ms-2"></i>
                        </button>
                        <button type="button" class="btn-hero-reset" @click="resetForm">
                            <i class="bx bx-reset me-1"></i> Đặt lại
                        </button>
                    </div>
                </div>

                <!-- STATS COUNTER STRIP -->
                <div class="hero-stats-strip">
                    <div class="stat-item">
                        <div class="stat-icon-wrapper">
                            <i class="bx bx-user-check"></i>
                        </div>
                        <div class="stat-text-group">
                            <div class="stat-value">150.000+</div>
                            <div class="stat-label">Du khách tin dùng</div>
                        </div>
                    </div>

                    <div class="stat-divider"></div>

                    <div class="stat-item">
                        <div class="stat-icon-wrapper">
                            <i class="bx bx-calendar-star"></i>
                        </div>
                        <div class="stat-text-group">
                            <div class="stat-value">50.000+</div>
                            <div class="stat-label">Lịch trình được tạo</div>
                        </div>
                    </div>

                    <div class="stat-divider"></div>

                    <div class="stat-item">
                        <div class="stat-icon-wrapper">
                            <i class="bx bx-map-pin"></i>
                        </div>
                        <div class="stat-text-group">
                            <div class="stat-value">450+ POI</div>
                            <div class="stat-label">Điểm đến xác thực</div>
                        </div>
                    </div>

                    <div class="stat-divider"></div>

                    <div class="stat-item">
                        <div class="stat-icon-wrapper">
                            <i class="bx bx-like"></i>
                        </div>
                        <div class="stat-text-group">
                            <div class="stat-value">98.4%</div>
                            <div class="stat-label">Đánh giá hài lòng</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. SECTION: ĐẶC QUYỀN CÔNG NGHỆ LẬP TRÌNH AI -->
        <section class="section-features">
            <div class="landing-content-container">
                <div class="section-heading-flex">
                    <div>
                        <div class="section-tag-pill">TÍNH NĂNG ĐỘT PHÁ CỦA AI PLANNER</div>
                        <h2 class="section-title-large">Đặc Quyền Công Nghệ Lập Trình AI Thông Minh</h2>
                        <p class="section-desc-text">
                            Hệ thống AI phân tích thời tiết thực tế, khoảng cách di chuyển, sở thích và ngân sách để kiến tạo hành trình tối ưu nhất cho bạn.
                        </p>
                    </div>
                    <router-link to="/client/ai-travel-planner" class="section-header-link d-none d-md-inline-flex">
                        <span>Khám phá thuật toán AI</span>
                        <i class="bx bx-chevron-right ms-1"></i>
                    </router-link>
                </div>

                <!-- 4 Feature Cards -->
                <div class="row g-4 mt-2">
                    <!-- Feature 1 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="feature-card-vip">
                            <div class="feature-icon-circle icon-pink">
                                <i class="bx bx-compass"></i>
                            </div>
                            <h3 class="feature-card-title">Thuật Toán Tối Ưu Tọa Độ</h3>
                            <p class="feature-card-desc">
                                Tự động sắp xếp thứ tự điểm tham quan theo cung đường ngắn nhất, tránh đi lòng vòng và tránh khung giờ tắc đường tại Đà Nẵng.
                            </p>
                            <router-link to="/client/ai-travel-planner" class="feature-card-link text-pink">
                                <span>Tìm hiểu thuật toán</span>
                                <i class="bx bx-right-arrow-alt ms-1"></i>
                            </router-link>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="feature-card-vip">
                            <div class="feature-icon-circle icon-purple">
                                <i class="bx bx-slider-alt"></i>
                            </div>
                            <h3 class="feature-card-title">Cá Nhân Hóa Toàn Diện</h3>
                            <p class="feature-card-desc">
                                Lịch trình chuẩn xác 100% theo phong cách riêng: từ tín đồ mê sống ảo, yêu biển, food tour đường phố đến du khách nghỉ dưỡng VIP.
                            </p>
                            <router-link to="/client/ai-travel-planner" class="feature-card-link text-purple">
                                <span>Xem độ chuẩn xác</span>
                                <i class="bx bx-right-arrow-alt ms-1"></i>
                            </router-link>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="feature-card-vip">
                            <div class="feature-icon-circle icon-cyan">
                                <i class="bx bx-shield-quarter"></i>
                            </div>
                            <h3 class="feature-card-title">Khảo Sát Thực Địa (450+ POI)</h3>
                            <p class="feature-card-desc">
                                Thông tin giá vé, giờ mở cửa, menu và mẹo check-in được thẩm định liên tục bởi đội ngũ chuyên gia du lịch bản địa Đà Nẵng.
                            </p>
                            <router-link to="/client/kham-pha-dia-diem" class="feature-card-link text-cyan">
                                <span>Khám phá 450+ POI</span>
                                <i class="bx bx-right-arrow-alt ms-1"></i>
                            </router-link>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="feature-card-vip">
                            <div class="feature-icon-circle icon-rose">
                                <i class="bx bx-bolt-circle"></i>
                            </div>
                            <h3 class="feature-card-title">Sửa Đổi Lịch Trình Trong 30s</h3>
                            <p class="feature-card-desc">
                                Thêm bớt điểm đến hoặc đổi lịch trình khi gặp mưa bão chỉ với một chạm. AI tự động tính toán lại lộ trình và ngân sách tức thì.
                            </p>
                            <router-link to="/client/ai-travel-planner" class="feature-card-link text-rose">
                                <span>Thử tính năng này</span>
                                <i class="bx bx-right-arrow-alt ms-1"></i>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. SECTION: LỊCH TRÌNH MẪU ĐƯỢC YÊU THÍCH NHẤT -->
        <section class="section-sample-itineraries">
            <div class="landing-content-container">
                <div class="section-heading-flex">
                    <div>
                        <div class="section-tag-pill">LỊCH TRÌNH GỢI Ý PHỔ BIẾN NHẤT</div>
                        <h2 class="section-title-large">Lịch Trình Mẫu Được Yêu Thích Nhất</h2>
                        <p class="section-desc-text">
                            Hàng nghìn du khách đã khởi hành với các lộ trình hoàn hảo này. Bạn có thể sao chép hoặc tùy biến lại theo ý thích.
                        </p>
                    </div>
                    <router-link to="/client/ai-travel-planner" class="section-header-link">
                        <span>Xem tất cả 20+ lịch trình</span>
                        <i class="bx bx-chevron-right ms-1"></i>
                    </router-link>
                </div>

                <!-- 3 Itinerary Cards -->
                <div class="row g-4 mt-2">
                    <!-- Itinerary 1 -->
                    <div class="col-12 col-lg-4">
                        <div class="itinerary-card-luxury">
                            <div class="itinerary-image-box">
                                <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=800&auto=format&fit=crop&q=80" alt="Đà Nẵng Sơn Trà" class="itinerary-img" />
                                <div class="itinerary-badge-floating badge-top-trending">
                                    <i class="bx bxs-hot me-1"></i> Top 1 Trending
                                </div>
                                <div class="itinerary-duration-tag">3N2Đ</div>
                            </div>
                            <div class="itinerary-card-body">
                                <h4 class="itinerary-title">DIFF Trọn Vẹn Đà Nẵng - Sơn Trà - Cầu Rồng Về Đêm</h4>
                                <p class="itinerary-summary">
                                    Hành trình khám phá trọn vẹn tinh hoa Đà Nẵng kết hợp xem bắn pháo hoa quốc tế DIFF bên bờ sông Hàn thơ mộng.
                                </p>

                                <ul class="itinerary-highlights">
                                    <li><i class="bx bx-check-circle text-pink"></i> Khách sạn biển 4 sao view trọn sông Hàn</li>
                                    <li><i class="bx bx-check-circle text-pink"></i> Thưởng thức đặc sản mì Quảng, hải sản tươi sống</li>
                                    <li><i class="bx bx-check-circle text-pink"></i> Vé du thuyền xem Cầu Rồng phun lửa & pháo hoa</li>
                                </ul>

                                <div class="itinerary-card-footer">
                                    <div class="itinerary-price-box">
                                        <span class="price-prefix">Ước tính từ:</span>
                                        <div class="price-number">2.650.000đ <span class="price-unit">/ khách</span></div>
                                    </div>
                                    <button type="button" class="btn-itinerary-action btn-pink" @click="selectSamplePlan('DIFF Trọn Vẹn Đà Nẵng (3N2Đ)')">
                                        Chọn Lịch Trình
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Itinerary 2 -->
                    <div class="col-12 col-lg-4">
                        <div class="itinerary-card-luxury">
                            <div class="itinerary-image-box">
                                <img src="https://images.unsplash.com/photo-1514565131-fce0801e5785?w=800&auto=format&fit=crop&q=80" alt="DIFF Pháo hoa Đà Nẵng" class="itinerary-img" />
                                <div class="itinerary-badge-floating badge-food-tour">
                                    <i class="bx bx-dish me-1"></i> Ẩm Thực & DIFF
                                </div>
                                <div class="itinerary-duration-tag">2N1Đ</div>
                            </div>
                            <div class="itinerary-card-body">
                                <h4 class="itinerary-title">DIFF 2026: Đêm Ánh Sáng, Lạc Vào Ẩm Thực Đà Nẵng</h4>
                                <p class="itinerary-summary">
                                    Lịch trình ngắn ngày bùng nổ năng lượng, thưởng thức ẩm thực đường phố tại chợ Cồn và ngắm pháo hoa rực rỡ sông Hàn.
                                </p>

                                <ul class="itinerary-highlights">
                                    <li><i class="bx bx-check-circle text-purple"></i> Food tour chợ Cồn & chợ đêm Helio</li>
                                    <li><i class="bx bx-check-circle text-purple"></i> Xem pháo hoa DIFF khán đài VIP sông Hàn</li>
                                    <li><i class="bx bx-check-circle text-purple"></i> Khám phá cà phê view biển Sơn Trà cực chill</li>
                                </ul>

                                <div class="itinerary-card-footer">
                                    <div class="itinerary-price-box">
                                        <span class="price-prefix">Ước tính từ:</span>
                                        <div class="price-number">1.750.000đ <span class="price-unit">/ khách</span></div>
                                    </div>
                                    <button type="button" class="btn-itinerary-action btn-purple" @click="selectSamplePlan('DIFF Ẩm Thực Đà Nẵng (2N1Đ)')">
                                        Chọn Lịch Trình
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Itinerary 3 -->
                    <div class="col-12 col-lg-4">
                        <div class="itinerary-card-luxury">
                            <div class="itinerary-image-box">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&auto=format&fit=crop&q=80" alt="Biển Mỹ Khê Bà Nà" class="itinerary-img" />
                                <div class="itinerary-badge-floating badge-luxury-resort">
                                    <i class="bx bx-diamond me-1"></i> Nghỉ Dưỡng Sang Chảnh
                                </div>
                                <div class="itinerary-duration-tag">4N3Đ</div>
                            </div>
                            <div class="itinerary-card-body">
                                <h4 class="itinerary-title">Kỳ Nghỉ Thượng Lưu: Bà Nà Hills & Bán Đảo Sơn Trà</h4>
                                <p class="itinerary-summary">
                                    Nghỉ dưỡng resort 5 sao ven biển Mỹ Khê, check-in Cầu Vàng Bà Nà Hills và vi vu trải nghiệm lặn biển bán đảo Sơn Trà.
                                </p>

                                <ul class="itinerary-highlights">
                                    <li><i class="bx bx-check-circle text-cyan"></i> Vé cáp treo Bà Nà Hills & Buffet 5 sao</li>
                                    <li><i class="bx bx-check-circle text-cyan"></i> Resort ven biển chuẩn quốc tế & xe riêng</li>
                                    <li><i class="bx bx-check-circle text-cyan"></i> Chèo SUP ngắm san hô bãi Bụt bình minh</li>
                                </ul>

                                <div class="itinerary-card-footer">
                                    <div class="itinerary-price-box">
                                        <span class="price-prefix">Ước tính từ:</span>
                                        <div class="price-number">4.850.000đ <span class="price-unit">/ khách</span></div>
                                    </div>
                                    <button type="button" class="btn-itinerary-action btn-cyan" @click="selectSamplePlan('Kỳ Nghỉ Thượng Lưu Bà Nà (4N3Đ)')">
                                        Chọn Lịch Trình
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. SECTION: ĐIỂM ĐẾN NỔI BẬT THÀNH PHỐ ĐÀ NẴNG -->
        <section class="section-destinations">
            <div class="landing-content-container">
                <div class="section-heading-flex">
                    <div>
                        <div class="section-tag-pill">TỌA ĐỘ CHECK-IN HOT NHẤT ĐÀ NẴNG</div>
                        <h2 class="section-title-large">Điểm Đến Nổi Bật Thành Phố Đà Nẵng</h2>
                        <p class="section-desc-text">
                            Tổng hợp những tọa độ check-in, ẩm thực, văn hóa không thể bỏ lỡ tại thành phố đáng sống nhất Việt Nam.
                        </p>
                    </div>

                    <!-- Category Tabs Filter -->
                    <div class="dest-tabs-wrapper">
                        <button 
                            v-for="cat in destCategories" 
                            :key="cat.id" 
                            type="button" 
                            class="dest-tab-btn" 
                            :class="{ active: activeCategory === cat.id }"
                            @click="activeCategory = cat.id"
                        >
                            {{ cat.name }}
                        </button>
                    </div>
                </div>

                <!-- 6 Destination Cards Grid -->
                <div class="row g-4 mt-2">
                    <div 
                        v-for="item in filteredDestinations" 
                        :key="item.id" 
                        class="col-12 col-md-6 col-lg-4"
                    >
                        <div class="dest-card-vip">
                            <div class="dest-img-box">
                                <img :src="item.image" :alt="item.name" class="dest-img" />
                                <div class="dest-top-badges">
                                    <span class="dest-badge badge-cat">{{ item.categoryName }}</span>
                                    <span class="dest-badge badge-ticket" :class="item.isFree ? 'badge-free' : 'badge-paid'">
                                        {{ item.ticketInfo }}
                                    </span>
                                </div>
                            </div>

                            <div class="dest-card-content">
                                <div class="dest-meta-row">
                                    <div class="dest-rating">
                                        <i class="bx bxs-star star-filled"></i>
                                        <span class="rating-val">{{ item.rating }}</span>
                                        <span class="reviews-count">({{ item.reviews }} đánh giá)</span>
                                    </div>
                                    <div class="dest-location">
                                        <i class="bx bx-map-pin me-1"></i>
                                        <span>{{ item.location }}</span>
                                    </div>
                                </div>

                                <h4 class="dest-name">{{ item.name }}</h4>
                                <p class="dest-desc-short">{{ item.description }}</p>

                                <div class="dest-card-actions">
                                    <button type="button" class="btn-add-dest-trip" @click="addDestinationToTrip(item.name)">
                                        <i class="bx bx-plus-circle me-1 font-16"></i>
                                        <span>Thêm vào lịch trình</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. SECTION: TOUR TRẢI NGHIỆM TUYỂN CHỌN & BẢO CHỨNG AN TOÀN -->
        <section class="section-tours">
            <div class="landing-content-container">
                <div class="section-heading-flex">
                    <div>
                        <div class="section-tag-pill">TRẢI NGHIỆM DU LỊCH ĐẲNG CẤP</div>
                        <h2 class="section-title-large">Tour Trải Nghiệm Tuyển Chọn & Bảo Chứng An Toàn</h2>
                        <p class="section-desc-text">
                            Đồng hành cùng các đối tác uy tín nhất Đà Nẵng với cam kết chất lượng 5 sao và bảo hiểm toàn diện.
                        </p>
                    </div>
                    <router-link to="/client/danh-muc-tour" class="section-header-link">
                        <span>Xem tất cả 35+ tour</span>
                        <i class="bx bx-chevron-right ms-1"></i>
                    </router-link>
                </div>

                <!-- 3 Curated Tour Cards -->
                <div class="row g-4 mt-2">
                    <!-- Tour 1 -->
                    <div class="col-12 col-lg-4">
                        <div class="tour-card-vip">
                            <div class="tour-img-wrap">
                                <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=800&auto=format&fit=crop&q=80" alt="Du Thuyền Sông Hàn" class="tour-img" />
                                <span class="tour-badge badge-bestseller">Bán chạy nhất</span>
                            </div>
                            <div class="tour-info-body">
                                <h4 class="tour-title">Tour Du Thuyền Sông Hàn VIP: Xem Cầu Rồng Phun Lửa</h4>
                                <ul class="tour-features-list">
                                    <li><i class="bx bx-time text-pink me-1"></i> Thời lượng: 90 phút du ngoạn sông Hàn</li>
                                    <li><i class="bx bx-wine text-pink me-1"></i> Thưởng thức trà chiều, hoa quả tươi & múa Champa</li>
                                    <li><i class="bx bx-show text-pink me-1"></i> Vị trí khán đài đẹp nhất ngắm Cầu Rồng & Cầu Quay</li>
                                </ul>
                                <div class="tour-footer-box">
                                    <div class="tour-pricing">
                                        <span class="old-price">320.000đ</span>
                                        <div class="sale-price">250.000đ <span class="unit">/ vé</span></div>
                                    </div>
                                    <router-link to="/client/danh-muc-tour" class="btn-book-tour btn-pink">
                                        Đặt Ngay
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tour 2 -->
                    <div class="col-12 col-lg-4">
                        <div class="tour-card-vip">
                            <div class="tour-img-wrap">
                                <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&auto=format&fit=crop&q=80" alt="Chèo SUP Bán Đảo Sơn Trà" class="tour-img" />
                                <span class="tour-badge badge-experience">Trải nghiệm hot</span>
                            </div>
                            <div class="tour-info-body">
                                <h4 class="tour-title">Chèo SUP Bán Đảo Sơn Trà: Lặn Ngắm San Hô & Bình Minh</h4>
                                <ul class="tour-features-list">
                                    <li><i class="bx bx-time text-cyan me-1"></i> Thời lượng: Nửa ngày (5h00 - 9h00 sáng)</li>
                                    <li><i class="bx bx-camera text-cyan me-1"></i> Có HLV hướng dẫn chuyên nghiệp & chụp ảnh flycam</li>
                                    <li><i class="bx bx-shield-alt text-cyan me-1"></i> Trang bị áo phao, kính lặn & ăn sáng nhẹ ven biển</li>
                                </ul>
                                <div class="tour-footer-box">
                                    <div class="tour-pricing">
                                        <span class="old-price">500.000đ</span>
                                        <div class="sale-price">390.000đ <span class="unit">/ vé</span></div>
                                    </div>
                                    <router-link to="/client/danh-muc-tour" class="btn-book-tour btn-cyan">
                                        Đặt Ngay
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tour 3 -->
                    <div class="col-12 col-lg-4">
                        <div class="tour-card-vip">
                            <div class="tour-img-wrap">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&auto=format&fit=crop&q=80" alt="Tour Bà Nà Hills Cầu Vàng" class="tour-img" />
                                <span class="tour-badge badge-premium">Tour Trọn Gói VIP</span>
                            </div>
                            <div class="tour-info-body">
                                <h4 class="tour-title">Tour Bà Nà Hills Trọn Gói: Cáp Treo, Cầu Vàng & Buffet 5 Sao</h4>
                                <ul class="tour-features-list">
                                    <li><i class="bx bx-car text-purple me-1"></i> Xe đưa đón tận nơi tại khách sạn trung tâm</li>
                                    <li><i class="bx bx-food-menu text-purple me-1"></i> Vé cáp treo khứ hồi & Buffet trưa 5 sao thượng hạng</li>
                                    <li><i class="bx bx-smile text-purple me-1"></i> Hướng dẫn viên vui vẻ, nhiệt tình suốt hành trình</li>
                                </ul>
                                <div class="tour-footer-box">
                                    <div class="tour-pricing">
                                        <span class="old-price">1.450.000đ</span>
                                        <div class="sale-price">1.250.000đ <span class="unit">/ vé</span></div>
                                    </div>
                                    <router-link to="/client/danh-muc-tour" class="btn-book-tour btn-purple">
                                        Đặt Ngay
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. VIDEO SHOWCASE: VÌ SAO ĐÀ NẴNG LÀ THÀNH PHỐ ĐÁNG SỐNG NHẤT VIỆT NAM -->
        <section class="section-video-banner" id="video-danang">
            <div class="landing-content-container">
                <div class="video-card-banner">
                    <div class="row align-items-center g-4">
                        <!-- Left Content -->
                        <div class="col-12 col-xl-5">
                            <div class="video-tag-pill">
                                <i class="bx bx-play-circle me-1 font-16"></i> KHÁM PHÁ QUA THƯỚC PHIM
                            </div>
                            <h2 class="video-banner-title">
                                Đà Nẵng - Vì Sao Là<br />
                                <span class="highlight-video-gradient">Thành Phố Đáng Sống Nhất?</span>
                            </h2>
                            <p class="video-banner-desc">
                                Cùng chiêm ngưỡng những góc nhìn tuyệt đẹp về thiên nhiên, những cây cầu biểu tượng bên sông Hàn và phong cách sống văn minh, hiếu khách của người dân Đà thành.
                            </p>
                            
                            <div class="video-highlights-list">
                                <div class="video-highlight-item">
                                    <div class="highlight-icon">
                                        <i class="bx bx-check-shield"></i>
                                    </div>
                                    <div class="highlight-text">
                                        <strong>Đô thị kiểu mẫu & an toàn:</strong> Không gian sống trong lành, người dân thân thiện, mến khách bậc nhất.
                                    </div>
                                </div>
                                <div class="video-highlight-item">
                                    <div class="highlight-icon">
                                        <i class="bx bx-water"></i>
                                    </div>
                                    <div class="highlight-text">
                                        <strong>Cảnh quan biển & núi kỳ vĩ:</strong> Biển Mỹ Khê ngập tràn nắng ấm, bán đảo Sơn Trà và Ngũ Hành Sơn hùng vĩ.
                                    </div>
                                </div>
                                <div class="video-highlight-item">
                                    <div class="highlight-icon">
                                        <i class="bx bx-sparkles"></i>
                                    </div>
                                    <div class="highlight-text">
                                        <strong>Trợ lý AI SmartTrip:</strong> Tự động cá nhân hóa lộ trình khám phá từng góc phố đẹp nhất theo sở thích bạn.
                                    </div>
                                </div>
                            </div>

                            <div class="video-banner-actions">
                                <router-link to="/client/ai-travel-planner" class="btn-video-primary">
                                    <i class="bx bx-bot font-20 me-1"></i>
                                    <span>Lên Lịch Trình Khám Phá Ngay</span>
                                    <i class="bx bx-right-arrow-alt font-20 ms-1"></i>
                                </router-link>
                                <router-link to="/client/kham-pha-dia-diem" class="btn-video-secondary">
                                    <i class="bx bx-compass me-1"></i>
                                    <span>Xem Điểm Đến</span>
                                </router-link>
                            </div>
                        </div>

                        <!-- Right Video Player -->
                        <div class="col-12 col-xl-7">
                            <div class="video-player-wrapper">
                                <div class="video-player-frame">
                                    <iframe 
                                        src="https://www.youtube.com/embed/hWx-wpo04Kk?rel=0&modestbranding=1" 
                                        title="ĐÀ NẴNG - VÌ SAO LẠI LÀ THÀNH PHỐ ĐÁNG SỐNG NHẤT VIỆT NAM? | CÂU CHUYỆN KIẾN THỨC"
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        allowfullscreen
                                        class="youtube-iframe"
                                    ></iframe>
                                </div>
                                <div class="video-player-caption">
                                    <div class="video-badge-live">
                                        <span class="live-dot"></span>
                                        <span>VIDEO 4K TOÀN CẢNH</span>
                                    </div>
                                    <a 
                                        href="https://youtu.be/hWx-wpo04Kk?si=rOBcaQuPOR-c93pj" 
                                        target="_blank" 
                                        rel="noopener noreferrer" 
                                        class="video-source-link"
                                    >
                                        <i class="bx bxl-youtube me-1 font-18 text-danger"></i>
                                        <span>Xem trên YouTube</span>
                                        <i class="bx bx-link-external ms-1 font-14"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. SECTION: ĐÁNH GIÁ TỪ DU KHÁCH (TESTIMONIALS) -->
        <section class="section-testimonials">
            <div class="landing-content-container">
                <div class="section-header-center">
                    <div class="section-tag-pill">ĐÁNH GIÁ TỪ NGƯỜI DÙNG</div>
                    <h2 class="section-title-large">Hơn 150.000 Du Khách Hài Lòng Tuyệt Đối</h2>
                    <p class="section-desc-text">
                        Những chia sẻ chân thật từ cộng đồng xê dịch sau khi trải nghiệm hệ thống lên lịch trình tự động cùng Smart Travel AI.
                    </p>
                </div>

                <div class="row g-4 mt-3">
                    <!-- Review 1 -->
                    <div class="col-12 col-lg-4">
                        <div class="testimonial-card-vip">
                            <div class="review-stars">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                            <p class="review-text">
                                "Nhờ AI Planner mà chuyến đi 3N2Đ cùng gia đình mình diễn ra cực kỳ suôn sẻ! Lộ trình tối ưu không bị kẹt xe, các quán ăn gợi ý đều ngon đúng vị người bản địa mà chi phí lại rất tiết kiệm."
                            </p>
                            <div class="review-user-info">
                                <div class="user-avatar-circle circle-pink">HA</div>
                                <div>
                                    <h5 class="user-name">Chị Hoàng Anh (Hà Nội)</h5>
                                    <span class="user-role">Du lịch gia đình 4 người · Tháng 6/2026</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="col-12 col-lg-4">
                        <div class="testimonial-card-vip">
                            <div class="review-stars">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                            <p class="review-text">
                                "Cực kỳ ấn tượng với tính năng đổi lịch trình chỉ trong 30 giây khi trời đổ mưa bất chợt. AI gợi ý ngay các quán cà phê ngắm mưa và bảo tàng nghệ thuật gần nhất cực chill!"
                            </p>
                            <div class="review-user-info">
                                <div class="user-avatar-circle circle-purple">MĐ</div>
                                <div>
                                    <h5 class="user-name">Minh Đức & Tú Uyên</h5>
                                    <span class="user-role">Cặp đôi trải nghiệm · Tháng 7/2026</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="col-12 col-lg-4">
                        <div class="testimonial-card-vip">
                            <div class="review-stars">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                            <p class="review-text">
                                "Mình là người thích du lịch tự túc, trước giờ lên plan mất cả tuần. Dùng thử Smart Travel AI chỉ 1 phút là có lịch trình chi tiết từ sáng đến đêm, book luôn tour du thuyền sông Hàn giá cực hời!"
                            </p>
                            <div class="review-user-info">
                                <div class="user-avatar-circle circle-cyan">QH</div>
                                <div>
                                    <h5 class="user-name">Trần Quang Huy (TP.HCM)</h5>
                                    <span class="user-role">Du lịch tự túc (Solo Traveler)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9. SECTION: AUTO SLIDER HÌNH ẢNH ĐÀ NẴNG (CHỈ HÌNH ẢNH NGUYÊN BẢN, TỰ ĐỘNG TRƯỢT) -->
        <section class="section-cta section-auto-slider">
            <div class="landing-content-container">
                <div 
                    class="pure-image-slider-card"
                    @mouseenter="pauseAutoSlider" 
                    @mouseleave="resumeAutoSlider"
                >
                    <!-- Slide Viewport & Track -->
                    <div class="slider-viewport">
                        <div 
                            class="slider-track" 
                            :style="{ transform: `translateX(-${currentAutoSlide * 100}%)` }"
                        >
                            <div 
                                v-for="(img, idx) in autoSlideImages" 
                                :key="'slide-' + idx"
                                class="slider-slide-item"
                            >
                                <img :src="img.url" :alt="'Đà Nẵng ' + (idx + 1)" class="pure-slide-img" />
                            </div>
                        </div>

                        <!-- Prev & Next Controls -->
                        <button 
                            type="button" 
                            class="slider-nav-btn prev-btn" 
                            @click="prevAutoSlide" 
                            aria-label="Hình trước"
                            title="Hình trước"
                        >
                            <i class="bx bx-chevron-left"></i>
                        </button>
                        <button 
                            type="button" 
                            class="slider-nav-btn next-btn" 
                            @click="nextAutoSlide" 
                            aria-label="Hình tiếp theo"
                            title="Hình tiếp theo"
                        >
                            <i class="bx bx-chevron-right"></i>
                        </button>

                        <!-- Indicator Dots -->
                        <div class="slider-dots-container">
                            <button 
                                v-for="(_, idx) in autoSlideImages" 
                                :key="'dot-' + idx"
                                type="button"
                                class="slider-dot"
                                :class="{ active: currentAutoSlide === idx }"
                                @click="goToAutoSlide(idx)"
                                :aria-label="'Chuyển đến hình ' + (idx + 1)"
                            ></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 10. MODERN FOOTER -->
        <footer class="landing-footer-vip" id="ho-tro">
            <div class="landing-content-container">
                <div class="row g-4 pb-4">
                    <!-- Brand Column -->
                    <div class="col-12 col-lg-4">
                        <div class="footer-brand-logo mb-3">
                            <div class="brand-icon-box">
                                <i class="bx bxs-paper-plane"></i>
                            </div>
                            <span class="footer-brand-title">SmartTrip <span class="highlight-pink">Đà Nẵng</span></span>
                        </div>
                        <p class="footer-about-text">
                            Nền tảng du lịch thông minh số 1 tại Đà Nẵng, ứng dụng công nghệ trí tuệ nhân tạo để mang đến trải nghiệm du lịch trọn vẹn, tối ưu chi phí và đậm đà bản sắc địa phương.
                        </p>
                    </div>

                    <!-- Column 1: Khám phá -->
                    <div class="col-6 col-md-3 col-lg-2">
                        <h6 class="footer-heading">KHÁM PHÁ ĐÀ NẴNG</h6>
                        <ul class="footer-links">
                            <li><router-link to="/client/kham-pha-dia-diem">Bán đảo Sơn Trà</router-link></li>
                            <li><router-link to="/client/kham-pha-dia-diem">Bà Nà Hills & Cầu Vàng</router-link></li>
                            <li><router-link to="/client/kham-pha-dia-diem">Bãi biển Mỹ Khê</router-link></li>
                            <li><router-link to="/client/kham-pha-dia-diem">Cầu Rồng sông Hàn</router-link></li>
                            <li><router-link to="/client/kham-pha-dia-diem">Ẩm thực đường phố</router-link></li>
                            <li><a href="#video-danang">Video khám phá Đà Nẵng</a></li>
                        </ul>
                    </div>

                    <!-- Column 2: Dịch vụ -->
                    <div class="col-6 col-md-3 col-lg-2">
                        <h6 class="footer-heading">DỊCH VỤ DU LỊCH</h6>
                        <ul class="footer-links">
                            <li><router-link to="/client/ai-travel-planner">Lập lịch trình AI</router-link></li>
                            <li><router-link to="/client/danh-muc-tour">Tour Du thuyền Sông Hàn</router-link></li>
                            <li><router-link to="/client/danh-muc-tour">Chèo SUP Bán Đảo</router-link></li>
                            <li><router-link to="/client/danh-muc-tour">Vé tham quan Bà Nà</router-link></li>
                            <li><router-link to="/client/danh-muc-tour">Săn voucher du lịch</router-link></li>
                            <li><router-link to="/login">Dành cho Đối tác (B2B)</router-link></li>
                        </ul>
                    </div>

                    <!-- Column 3: Hỗ trợ du khách -->
                    <div class="col-6 col-md-3 col-lg-2">
                        <h6 class="footer-heading">HỖ TRỢ DU KHÁCH</h6>
                        <ul class="footer-links">
                            <li><router-link to="/client/ai-travel-planner">Hướng dẫn sử dụng AI</router-link></li>
                            <li><a href="javascript:;" @click="openPolicyModal('Chính sách bảo mật')">Chính sách bảo mật</a></li>
                            <li><a href="javascript:;" @click="openPolicyModal('Điều khoản dịch vụ')">Điều khoản dịch vụ</a></li>
                            <li><a href="javascript:;" @click="openPolicyModal('Câu hỏi thường gặp')">Câu hỏi thường gặp (FAQ)</a></li>
                            <li><a href="javascript:;" @click="openSupportModal">Trung tâm trợ giúp</a></li>
                        </ul>
                    </div>

                    <!-- Column 4: Hotline 24/7 -->
                    <div class="col-6 col-md-3 col-lg-2">
                        <h6 class="footer-heading">TỔNG ĐÀI HỖ TRỢ 24/7</h6>
                        <div class="hotline-box">
                            <span class="hotline-label">Đường dây nóng du khách:</span>
                            <a href="tel:1900686892" class="hotline-number">1900 6868 92</a>
                        </div>
                        <div class="footer-contact-small">
                            <div class="contact-line">
                                <i class="bx bx-envelope me-1"></i>
                                <span>hotro@smartdanang.vn</span>
                            </div>
                            <div class="contact-line">
                                <i class="bx bx-map-pin me-1"></i>
                                <span>254 Nguyễn Văn Linh, Đà Nẵng</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom Bar -->
                <div class="footer-bottom-flex">
                    <div class="footer-copyright">
                        © 2026 <strong>SmartTrip Đà Nẵng AI</strong>. Bản quyền thuộc về hệ thống Đà Nẵng Smart Travel.
                    </div>
                    <div class="footer-legal-links">
                        <a href="javascript:;">Quy chế hoạt động</a>
                        <span class="dot-sep">•</span>
                        <a href="javascript:;">Chính sách quyền riêng tư</a>
                        <span class="dot-sep">•</span>
                        <a href="javascript:;">Điều khoản sử dụng</a>
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
                            <i class="bx bx-bot font-34 text-pink"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Trợ Lý AI Đang Phân Tích Lịch Trình</h5>
                        <p class="text-muted small mb-4">
                            Đang áp dụng thuật toán tối ưu lộ trình cho chuyến đi <strong>"{{ plannerForm.duration }}"</strong> theo phong cách <strong>"{{ plannerForm.style }}"</strong> với ngân sách <strong>"{{ plannerForm.budget }}"</strong>.
                        </p>
                        
                        <div class="ai-steps-box text-start bg-light rounded-3 p-3 mb-4">
                            <div class="d-flex align-items-center mb-2 small" :class="aiStep >= 1 ? 'text-pink fw-bold' : 'text-muted'">
                                <i class="bx" :class="aiStep >= 1 ? 'bx-check-circle text-pink' : 'bx-loader-circle bx-spin'"></i>
                                <span class="ms-2">1. Khảo sát tọa độ địa điểm & thời gian di chuyển tránh kẹt xe</span>
                            </div>
                            <div class="d-flex align-items-center mb-2 small" :class="aiStep >= 2 ? 'text-pink fw-bold' : 'text-muted'">
                                <i class="bx" :class="aiStep >= 2 ? 'bx-check-circle text-pink' : 'bx-loader-circle bx-spin'"></i>
                                <span class="ms-2">2. Phân tích ưu tiên sở thích cá nhân: {{ selectedTags.slice(0, 2).join(', ') || 'Check-in, Ẩm thực' }}</span>
                            </div>
                            <div class="d-flex align-items-center small" :class="aiStep >= 3 ? 'text-pink fw-bold' : 'text-muted'">
                                <i class="bx" :class="aiStep >= 3 ? 'bx-check-circle text-pink' : 'bx-loader-circle bx-spin'"></i>
                                <span class="ms-2">3. Xuất chi tiết từng khung giờ và dự toán chi phí thông minh</span>
                            </div>
                        </div>

                        <button 
                            type="button" 
                            class="btn btn-pink-solid rounded-pill px-4 py-2 w-100 fw-bold"
                            :disabled="aiStep < 3"
                            @click="goToAiPlanner"
                        >
                            {{ aiStep < 3 ? 'Đang khởi tạo thuật toán AI...' : 'Xem Lịch Trình Chi Tiết Ngay ➔' }}
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
                        <i class="bx bx-check-circle text-pink font-20 me-2"></i>
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
    name: 'ClientTrangChuLandingPage',
    data() {
        return {
            plannerForm: {
                duration: '3 Ngày 2 Đêm',
                style: 'Nghỉ dưỡng sang trọng & Check-in',
                budget: 'Tiêu chuẩn (3tr - 5tr/người)'
            },
            availableTags: [
                'Check-in sống ảo',
                'Ẩm thực Đà Nẵng',
                'Biển & Nghỉ dưỡng',
                'Văn hóa & Di sản',
                'Vui chơi giải trí',
                'Du lịch về đêm & Bar'
            ],
            selectedTags: ['Check-in sống ảo', 'Ẩm thực Đà Nẵng', 'Biển & Nghỉ dưỡng'],
            quickPrompt: '',
            activeCategory: 'all',
            destCategories: [
                { id: 'all', name: 'Tất cả điểm' },
                { id: 'beach', name: 'Biển & Nghỉ dưỡng' },
                { id: 'checkin', name: 'Check-in sống ảo' },
                { id: 'culture', name: 'Văn hóa - Lịch sử' },
                { id: 'food', name: 'Ẩm thực & Chợ đêm' }
            ],
            destinations: [
                {
                    id: 1,
                    category: 'checkin',
                    categoryName: 'Check-in / Thiên nhiên',
                    name: 'Bán Đảo Sơn Trà & Chùa Linh Ứng',
                    image: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=700&auto=format&fit=crop&q=80',
                    rating: '4.9',
                    reviews: '1.2k',
                    location: 'Thọ Quang, Sơn Trà',
                    ticketInfo: 'Miễn phí vé',
                    isFree: true,
                    description: 'Bán đảo hoang sơ với Chùa Linh Ứng uy nghiêm, tượng Phật Bà cao 67m ngắm trọn vịnh biển Đà Nẵng.'
                },
                {
                    id: 2,
                    category: 'beach',
                    categoryName: 'Biển & Thể thao nước',
                    name: 'Bãi Biển Mỹ Khê - Đà Nẵng',
                    image: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=700&auto=format&fit=crop&q=80',
                    rating: '4.8',
                    reviews: '2.5k',
                    location: 'Võ Nguyên Giáp, Sơn Trà',
                    ticketInfo: 'Top 6 Biển Đẹp Nhất TG',
                    isFree: true,
                    description: 'Bãi cát trắng mịn màng, sóng hiền hòa, nước biển ấm quanh năm với nhiều hoạt động dù bay, chèo SUP.'
                },
                {
                    id: 3,
                    category: 'checkin',
                    categoryName: 'Biểu tượng thành phố',
                    name: 'Cầu Rồng & Cầu Tình Yêu Sông Hàn',
                    image: 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=700&auto=format&fit=crop&q=80',
                    rating: '4.9',
                    reviews: '3.8k',
                    location: 'Bờ Đông Sông Hàn, Đà Nẵng',
                    ticketInfo: 'Phun lửa Thứ 7 & CN',
                    isFree: true,
                    description: 'Biểu tượng kiến trúc tự hào của người Đà Nẵng với màn trình diễn phun lửa, phun nước đặc sắc lúc 21h cuối tuần.'
                },
                {
                    id: 4,
                    category: 'culture',
                    categoryName: 'Di tích quốc gia đặc biệt',
                    name: 'Quần Thể Danh Thắng Ngũ Hành Sơn',
                    image: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=700&auto=format&fit=crop&q=80',
                    rating: '4.7',
                    reviews: '950',
                    location: 'Hòa Hải, Ngũ Hành Sơn',
                    ticketInfo: 'Vé 40.000đ',
                    isFree: false,
                    description: '5 ngọn núi đá vôi kỳ vĩ huyền bí với hệ thống hang động Huyền Không, Động Tàng Chơn và chùa Tam Thai cổ kính.'
                },
                {
                    id: 5,
                    category: 'food',
                    categoryName: 'Ẩm thực đường phố',
                    name: 'Chợ Đêm Helio & Thiên Đường Ẩm Thực',
                    image: 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=700&auto=format&fit=crop&q=80',
                    rating: '4.8',
                    reviews: '1.6k',
                    location: '2 Tháng 9, Hải Châu',
                    ticketInfo: 'Mở cửa 17h - 23h',
                    isFree: true,
                    description: 'Tổ hợp vui chơi, ẩm thực sầm uất nhất về đêm với hàng trăm món ngon Đà thành, hải sản, bia tươi và âm nhạc sôi động.'
                },
                {
                    id: 6,
                    category: 'checkin',
                    categoryName: 'Khu du lịch hàng đầu',
                    name: 'Sun World Bà Nà Hills & Cầu Vàng',
                    image: 'https://images.unsplash.com/photo-1563492065599-3520f775eeed?w=700&auto=format&fit=crop&q=80',
                    rating: '4.9',
                    reviews: '5.2k',
                    location: 'Hòa Ninh, Hòa Vang',
                    ticketInfo: 'Cầu Vàng Thế Giới',
                    isFree: false,
                    description: 'Đường lên tiên cảnh với cây Cầu Vàng huyền thoại, làng Pháp cổ kính và tổ hợp vui chơi giải trí hàng đầu Việt Nam.'
                }
            ],
            countdown: {
                days: 45,
                hours: 14,
                minutes: 38,
                seconds: 20
            },
            countdownInterval: null,
            aiStep: 1,
            toastMessage: '',
            modalInstance: null,
            toastInstance: null,

            // Auto-sliding 4 hình ảnh Đà Nẵng chất lượng cao (HD, rõ nét, không bị mờ)
            autoSlideImages: [
                {
                    id: 1,
                    url: 'https://images.unsplash.com/photo-1514565131-fce0801e5785?w=1600&auto=format&fit=crop&q=85'
                },
                {
                    id: 2,
                    url: 'https://upload.wikimedia.org/wikipedia/commons/b/b9/Golden_Bridge_Da-Nang.jpg'
                },
                {
                    id: 3,
                    url: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1600&auto=format&fit=crop&q=85'
                },
                {
                    id: 4,
                    url: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=1600&auto=format&fit=crop&q=85'
                }
            ],
            currentAutoSlide: 0,
            sliderTimer: null,
            isSliderPaused: false
        };
    },
    computed: {
        filteredDestinations() {
            if (this.activeCategory === 'all') {
                return this.destinations;
            }
            return this.destinations.filter(d => d.category === this.activeCategory);
        }
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

        // Khởi chạy auto slider tự động lướt qua các ảnh
        this.startAutoSlider();

        // Live countdown timer
        this.countdownInterval = setInterval(() => {
            if (this.countdown.seconds > 0) {
                this.countdown.seconds--;
            } else {
                this.countdown.seconds = 59;
                if (this.countdown.minutes > 0) {
                    this.countdown.minutes--;
                } else {
                    this.countdown.minutes = 59;
                    if (this.countdown.hours > 0) {
                        this.countdown.hours--;
                    } else {
                        this.countdown.hours = 23;
                        if (this.countdown.days > 0) {
                            this.countdown.days--;
                        }
                    }
                }
            }
        }, 1000);
    },
    beforeUnmount() {
        if (this.countdownInterval) {
            clearInterval(this.countdownInterval);
        }
        this.stopAutoSlider();
    },
    methods: {
        // Methods điều khiển Slider tự trượt
        startAutoSlider() {
            this.stopAutoSlider();
            this.sliderTimer = setInterval(() => {
                if (!this.isSliderPaused) {
                    this.nextAutoSlide();
                }
            }, 3200);
        },
        stopAutoSlider() {
            if (this.sliderTimer) {
                clearInterval(this.sliderTimer);
                this.sliderTimer = null;
            }
        },
        nextAutoSlide() {
            this.currentAutoSlide = (this.currentAutoSlide + 1) % this.autoSlideImages.length;
        },
        prevAutoSlide() {
            this.currentAutoSlide = (this.currentAutoSlide - 1 + this.autoSlideImages.length) % this.autoSlideImages.length;
        },
        goToAutoSlide(index) {
            this.currentAutoSlide = index;
        },
        pauseAutoSlider() {
            this.isSliderPaused = true;
        },
        resumeAutoSlider() {
            this.isSliderPaused = false;
        },
        toggleTag(tag) {
            const index = this.selectedTags.indexOf(tag);
            if (index > -1) {
                this.selectedTags.splice(index, 1);
            } else {
                this.selectedTags.push(tag);
            }
        },
        resetForm() {
            this.plannerForm.duration = '3 Ngày 2 Đêm';
            this.plannerForm.style = 'Nghỉ dưỡng sang trọng & Check-in';
            this.plannerForm.budget = 'Tiêu chuẩn (3tr - 5tr/người)';
            this.selectedTags = ['Check-in sống ảo', 'Ẩm thực Đà Nẵng', 'Biển & Nghỉ dưỡng'];
            this.showToast('Đã đặt lại thông số tìm kiếm mặc định!');
        },
        handleGenerateAI() {
            this.aiStep = 1;
            if (this.modalInstance) {
                this.modalInstance.show();
                setTimeout(() => { this.aiStep = 2; }, 600);
                setTimeout(() => { this.aiStep = 3; }, 1200);
            } else {
                this.goToAiPlanner();
            }
        },
        handleQuickSubmit() {
            if (!this.quickPrompt.trim()) {
                this.handleGenerateAI();
                return;
            }
            this.showToast(`AI đang ghi nhận yêu cầu: "${this.quickPrompt}"...`);
            setTimeout(() => {
                this.$router.push({
                    path: '/client/ai-travel-planner',
                    query: { prompt: this.quickPrompt }
                });
            }, 500);
        },
        goToAiPlanner() {
            if (this.modalInstance) {
                this.modalInstance.hide();
            }
            this.$router.push({
                path: '/client/ai-travel-planner',
                query: {
                    duration: this.plannerForm.duration,
                    style: this.plannerForm.style,
                    budget: this.plannerForm.budget,
                    tags: this.selectedTags.join(',')
                }
            });
        },
        selectSamplePlan(planName) {
            this.showToast(`Đã chọn mẫu "${planName}". Đang chuyển đến AI Planner...`);
            setTimeout(() => {
                this.$router.push({
                    path: '/client/ai-travel-planner',
                    query: { samplePlan: planName }
                });
            }, 600);
        },
        addDestinationToTrip(destName) {
            this.showToast(`Đã thêm "${destName}" vào danh sách ưu tiên của bạn!`);
        },
        showToast(msg) {
            this.toastMessage = msg;
            if (this.toastInstance) {
                this.toastInstance.show();
            } else {
                alert(msg);
            }
        },
        openSupportModal() {
            alert("Hotline hỗ trợ du khách Đà Nẵng 24/7:\n📞 1900 6868 92 hoặc (0236) 3868 999\n✉️ Email: hotro@smartdanang.vn\n🏢 Địa chỉ: 254 Nguyễn Văn Linh, Q. Hải Châu, TP. Đà Nẵng");
        },
        openDiffInfo() {
            alert("Lễ Hội Pháo Hoa Quốc Tế Đà Nẵng DIFF 2026:\n- Khai mạc: Tháng 6/2026\n- Địa điểm: Cảng sông Hàn, đường Bạch Đằng / Trần Hưng Đạo\n- Các đội thi đấu: Việt Nam, Pháp, Ý, Mỹ, Úc, Nhật Bản\n- Liên hệ hotline 1900 6868 92 để giữ vé khán đài VIP sớm!");
        },
        subscribeDiff() {
            this.showToast("Cảm ơn bạn! Hệ thống sẽ gửi thông báo lịch bắn & bảng giá vé DIFF 2026 sớm nhất!");
        },
        openAppNotify(store) {
            this.showToast(`Ứng dụng SmartTrip Đà Nẵng trên ${store} sẽ chính thức ra mắt vào mùa hè 2026!`);
        },
        openPolicyModal(title) {
            alert(`${title}: Chúng tôi cam kết bảo vệ dữ liệu du khách và cung cấp dịch vụ du lịch minh bạch, uy tín nhất tại Đà Nẵng.`);
        }
    }
}
</script>

<style scoped>
/* ==========================================================================
   RESET & CONTAINER STYLING
   ========================================================================== */
.danang-landing-wrapper {
    min-height: 100vh;
    background-color: #ffffff;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #1e293b;
    overflow-x: hidden;
}

.landing-content-container {
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 20px;
}

.highlight-pink {
    color: #ec4899;
}

.text-pink {
    color: #ec4899 !important;
}

.text-purple {
    color: #a855f7 !important;
}

.text-cyan {
    color: #06b6d4 !important;
}

.text-rose {
    color: #f43f5e !important;
}

/* ==========================================================================
   1. HEADER / NAVBAR
   ========================================================================== */
.landing-header-bar {
    position: sticky;
    top: 0;
    z-index: 1050;
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(226, 232, 240, 0.8);
    height: 74px;
    display: flex;
    align-items: center;
}

.landing-nav-container {
    max-width: 1240px;
    width: 100%;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nav-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
}

.brand-icon-box {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #9333ea 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 22px;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.brand-title {
    font-size: 19px;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.3px;
    line-height: 1.2;
}

.brand-subtitle {
    font-size: 11px;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.nav-menu {
    display: flex;
    align-items: center;
    gap: 28px;
}

.nav-link-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 14.5px;
    font-weight: 600;
    color: #475569;
    text-decoration: none;
    transition: all 0.2s ease;
    padding: 6px 0;
    position: relative;
}

.nav-link-item i {
    font-size: 18px;
    color: #94a3b8;
    transition: color 0.2s ease;
}

.nav-link-item:hover,
.nav-link-item.active {
    color: #ec4899;
}

.nav-link-item:hover i,
.nav-link-item.active i {
    color: #ec4899;
}

.nav-link-item.active::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 100%;
    height: 2.5px;
    background: #ec4899;
    border-radius: 2px;
}

.badge-mini-hot {
    background: #ec4899;
    color: #ffffff;
    font-size: 10px;
    padding: 1px 6px;
    border-radius: 10px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: 14px;
}

.btn-create-itinerary-header {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #d946ef 100%);
    color: #ffffff;
    font-size: 14px;
    font-weight: 700;
    padding: 10px 20px;
    border-radius: 30px;
    text-decoration: none;
    box-shadow: 0 4px 16px rgba(236, 72, 153, 0.4);
    transition: all 0.25s ease;
}

.btn-create-itinerary-header:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(236, 72, 153, 0.55);
    color: #ffffff;
}

.btn-user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f1f5f9;
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #475569;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-user-avatar:hover {
    background: #fce7f3;
    color: #ec4899;
    border-color: #fbcfe8;
}

/* ==========================================================================
   2. HERO SECTION
   ========================================================================== */
.landing-hero-section {
    position: relative;
    background: radial-gradient(circle at 50% 20%, #2e1065 0%, #0f172a 65%, #020617 100%);
    padding: 60px 0 70px 0;
    color: #ffffff;
    overflow: hidden;
}

.hero-bg-overlay {
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(236, 72, 153, 0.18) 1px, transparent 1px);
    background-size: 28px 28px;
    opacity: 0.6;
    pointer-events: none;
}

.hero-inner-container {
    position: relative;
    z-index: 2;
    text-align: center;
}

.hero-top-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(236, 72, 153, 0.5);
    padding: 6px 18px;
    border-radius: 30px;
    backdrop-filter: blur(8px);
    margin-bottom: 24px;
    box-shadow: 0 0 20px rgba(236, 72, 153, 0.25);
}

.hero-top-badge .badge-text {
    font-size: 12.5px;
    font-weight: 700;
    letter-spacing: 1px;
    color: #fbcfe8;
}

.hero-title-main {
    font-size: 46px;
    font-weight: 900;
    line-height: 1.15;
    letter-spacing: -0.5px;
    margin-bottom: 18px;
    color: #ffffff;
    text-transform: uppercase;
}

.gradient-text-vip {
    background: linear-gradient(135deg, #f472b6 0%, #fb7185 50%, #f9a8d4 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-description {
    font-size: 16px;
    line-height: 1.6;
    color: #cbd5e1;
    max-width: 820px;
    margin: 0 auto 40px auto;
}

/* AI PLANNER SEARCH CARD */
.hero-planner-card {
    background: rgba(255, 255, 255, 0.98);
    border-radius: 24px;
    padding: 28px 32px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.15);
    text-align: left;
    color: #1e293b;
    max-width: 1040px;
    margin: 0 auto;
}

.planner-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 20px;
    border-bottom: 1px solid #f1f5f9;
    margin-bottom: 22px;
    flex-wrap: wrap;
    gap: 12px;
}

.planner-header-left {
    display: flex;
    align-items: center;
    gap: 14px;
}

.sparkle-pink-circle {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: #fdf2f8;
    color: #ec4899;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.planner-title-text {
    font-size: 17px;
    font-weight: 800;
    color: #0f172a;
}

.planner-subtitle-text {
    font-size: 12.5px;
    color: #64748b;
}

.planner-header-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.badge-free-ai {
    background: #fdf2f8;
    color: #ec4899;
    border: 1px solid #fbcfe8;
    font-size: 12px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
}

.badge-tag-algo {
    background: #f8fafc;
    color: #64748b;
    border: 1px solid #e2e8f0;
    font-size: 11.5px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 20px;
}

.planner-inputs-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
    margin-bottom: 20px;
}

.planner-field-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 12px 16px;
    transition: all 0.2s ease;
}

.planner-field-box:focus-within {
    border-color: #ec4899;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.15);
}

.field-label {
    display: flex;
    align-items: center;
    font-size: 12px;
    font-weight: 700;
    color: #475569;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 6px;
}

.field-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.field-select {
    width: 100%;
    border: none;
    background: transparent;
    font-size: 14.5px;
    font-weight: 600;
    color: #0f172a;
    outline: none;
    cursor: pointer;
    appearance: none;
    padding-right: 24px;
}

.select-arrow-icon {
    position: absolute;
    right: 0;
    pointer-events: none;
    color: #94a3b8;
    font-size: 18px;
}

/* Tags row */
.planner-tags-row {
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
    margin-bottom: 22px;
}

.tags-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #475569;
    margin-bottom: 10px;
}

.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.tag-pill-btn {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 12.5px;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
}

.tag-pill-btn:hover {
    border-color: #f472b6;
    color: #ec4899;
    background: #fdf2f8;
}

.tag-pill-btn.active {
    background: #fdf2f8;
    border-color: #ec4899;
    color: #ec4899;
    font-weight: 700;
}

/* CTA Row */
.planner-cta-row {
    display: flex;
    align-items: center;
    gap: 14px;
}

.btn-hero-generate {
    flex: 1;
    background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #9333ea 100%);
    color: #ffffff;
    font-size: 16px;
    font-weight: 800;
    padding: 15px 28px;
    border-radius: 40px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 24px rgba(236, 72, 153, 0.45);
    transition: all 0.25s ease;
}

.btn-hero-generate:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(236, 72, 153, 0.6);
}

.btn-hero-reset {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #64748b;
    font-size: 14px;
    font-weight: 600;
    padding: 15px 22px;
    border-radius: 40px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-hero-reset:hover {
    background: #f1f5f9;
    color: #0f172a;
}

/* Stats counter strip */
.hero-stats-strip {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: rgba(15, 23, 42, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 20px;
    padding: 18px 36px;
    max-width: 1040px;
    margin: 36px auto 0 auto;
    backdrop-filter: blur(10px);
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 14px;
    text-align: left;
}

.stat-icon-wrapper {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: rgba(236, 72, 153, 0.15);
    border: 1px solid rgba(236, 72, 153, 0.3);
    color: #f472b6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.stat-value {
    font-size: 20px;
    font-weight: 800;
    color: #ffffff;
    line-height: 1.2;
}

.stat-label {
    font-size: 12px;
    font-weight: 600;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-divider {
    width: 1px;
    height: 38px;
    background: rgba(255, 255, 255, 0.15);
}

/* ==========================================================================
   COMMON SECTION STYLES
   ========================================================================== */
.section-features,
.section-sample-itineraries,
.section-destinations,
.section-tours,
.section-video-banner,
.section-diff-banner,
.section-testimonials,
.section-cta {
    padding: 70px 0;
}

.section-sample-itineraries,
.section-tours {
    background: #fbfbfe;
}

.section-tag-pill {
    display: inline-block;
    background: #fdf2f8;
    border: 1px solid #fbcfe8;
    color: #ec4899;
    font-size: 11.5px;
    font-weight: 800;
    padding: 4px 12px;
    border-radius: 20px;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.section-title-large {
    font-size: 32px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.25;
    margin-bottom: 10px;
    letter-spacing: -0.5px;
}

.section-desc-text {
    font-size: 15px;
    color: #64748b;
    max-width: 680px;
    line-height: 1.6;
    margin: 0;
}

.section-heading-flex {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 18px;
}

.section-header-link {
    display: inline-flex;
    align-items: center;
    font-size: 14.5px;
    font-weight: 700;
    color: #ec4899;
    text-decoration: none;
    transition: transform 0.2s ease;
}

.section-header-link:hover {
    transform: translateX(4px);
    color: #db2777;
}

.section-header-center {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 36px auto;
}

.section-header-center .section-desc-text {
    margin: 0 auto;
}

/* ==========================================================================
   3. SECTION FEATURES CARDS
   ========================================================================== */
.feature-card-vip {
    background: #ffffff;
    border: 1px solid #f1f5f9;
    border-radius: 20px;
    padding: 28px 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.feature-card-vip:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(0, 0, 0, 0.08);
    border-color: #fbcfe8;
}

.feature-icon-circle {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin-bottom: 20px;
}

.icon-pink {
    background: #fdf2f8;
    color: #ec4899;
}

.icon-purple {
    background: #faf5ff;
    color: #a855f7;
}

.icon-cyan {
    background: #ecfeff;
    color: #06b6d4;
}

.icon-rose {
    background: #fff1f2;
    color: #f43f5e;
}

.feature-card-title {
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 10px;
}

.feature-card-desc {
    font-size: 13.5px;
    line-height: 1.6;
    color: #64748b;
    margin-bottom: 20px;
    flex: 1;
}

.feature-card-link {
    font-size: 13.5px;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: transform 0.2s ease;
}

.feature-card-link:hover {
    transform: translateX(4px);
}

/* ==========================================================================
   4. SAMPLE ITINERARIES
   ========================================================================== */
.itinerary-card-luxury {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.itinerary-card-luxury:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(0, 0, 0, 0.1);
}

.itinerary-image-box {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.itinerary-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.itinerary-card-luxury:hover .itinerary-img {
    transform: scale(1.05);
}

.itinerary-badge-floating {
    position: absolute;
    top: 14px;
    left: 14px;
    font-size: 11.5px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    color: #ffffff;
    backdrop-filter: blur(8px);
}

.badge-top-trending {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.4);
}

.badge-food-tour {
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
}

.badge-luxury-resort {
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    box-shadow: 0 4px 12px rgba(14, 165, 233, 0.4);
}

.itinerary-duration-tag {
    position: absolute;
    bottom: 14px;
    right: 14px;
    background: rgba(15, 23, 42, 0.85);
    color: #ffffff;
    font-size: 12px;
    font-weight: 800;
    padding: 4px 12px;
    border-radius: 20px;
    backdrop-filter: blur(6px);
}

.itinerary-card-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.itinerary-title {
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.35;
    margin-bottom: 8px;
}

.itinerary-summary {
    font-size: 13.5px;
    color: #64748b;
    line-height: 1.55;
    margin-bottom: 16px;
}

.itinerary-highlights {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
    flex: 1;
}

.itinerary-highlights li {
    font-size: 13px;
    color: #334155;
    display: flex;
    align-items: center;
    gap: 8px;
}

.itinerary-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px solid #f1f5f9;
}

.price-prefix {
    font-size: 11px;
    color: #94a3b8;
    text-transform: uppercase;
    font-weight: 700;
    display: block;
}

.price-number {
    font-size: 17px;
    font-weight: 800;
    color: #0f172a;
}

.price-unit {
    font-size: 12px;
    font-weight: 600;
    color: #64748b;
}

.btn-itinerary-action {
    border: none;
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    padding: 9px 18px;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.25s ease;
}

.btn-pink {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
}

.btn-pink:hover {
    box-shadow: 0 6px 18px rgba(236, 72, 153, 0.5);
    transform: translateY(-2px);
}

.btn-purple {
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    box-shadow: 0 4px 14px rgba(139, 92, 246, 0.35);
}

.btn-purple:hover {
    box-shadow: 0 6px 18px rgba(139, 92, 246, 0.5);
    transform: translateY(-2px);
}

.btn-cyan {
    background: linear-gradient(135deg, #06b6d4 0%, #0284c7 100%);
    box-shadow: 0 4px 14px rgba(6, 182, 212, 0.35);
}

.btn-cyan:hover {
    box-shadow: 0 6px 18px rgba(6, 182, 212, 0.5);
    transform: translateY(-2px);
}

/* ==========================================================================
   5. DESTINATIONS SECTION
   ========================================================================== */
.dest-tabs-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.dest-tab-btn {
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 13px;
    font-weight: 600;
    padding: 7px 16px;
    border-radius: 24px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.dest-tab-btn:hover {
    border-color: #f472b6;
    color: #ec4899;
}

.dest-tab-btn.active {
    background: #ec4899;
    border-color: #ec4899;
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.35);
}

.dest-card-vip {
    background: #ffffff;
    border: 1px solid #f1f5f9;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.dest-card-vip:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 30px rgba(0, 0, 0, 0.09);
    border-color: #fbcfe8;
}

.dest-img-box {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.dest-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.dest-card-vip:hover .dest-img {
    transform: scale(1.05);
}

.dest-top-badges {
    position: absolute;
    top: 12px;
    left: 12px;
    right: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.dest-badge {
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 16px;
    backdrop-filter: blur(8px);
}

.badge-cat {
    background: rgba(15, 23, 42, 0.85);
    color: #ffffff;
}

.badge-free {
    background: rgba(236, 72, 153, 0.9);
    color: #ffffff;
}

.badge-paid {
    background: rgba(14, 165, 233, 0.9);
    color: #ffffff;
}

.dest-card-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.dest-meta-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 12.5px;
}

.dest-rating {
    display: flex;
    align-items: center;
    gap: 4px;
}

.star-filled {
    color: #f59e0b;
}

.rating-val {
    font-weight: 800;
    color: #0f172a;
}

.reviews-count {
    color: #94a3b8;
}

.dest-location {
    color: #64748b;
    font-weight: 600;
    display: flex;
    align-items: center;
}

.dest-name {
    font-size: 17px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 8px;
    line-height: 1.35;
}

.dest-desc-short {
    font-size: 13px;
    color: #64748b;
    line-height: 1.55;
    margin-bottom: 18px;
    flex: 1;
}

.dest-card-actions {
    display: flex;
}

.btn-add-dest-trip {
    width: 100%;
    background: #fdf2f8;
    color: #ec4899;
    border: 1px solid #fbcfe8;
    font-size: 13px;
    font-weight: 700;
    padding: 8px 14px;
    border-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.btn-add-dest-trip:hover {
    background: #ec4899;
    color: #ffffff;
    border-color: #ec4899;
}

/* ==========================================================================
   6. CURATED TOURS SECTION
   ========================================================================== */
.tour-card-vip {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.tour-card-vip:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(0, 0, 0, 0.1);
}

.tour-img-wrap {
    position: relative;
    height: 210px;
    overflow: hidden;
}

.tour-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.tour-card-vip:hover .tour-img {
    transform: scale(1.05);
}

.tour-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    font-size: 11.5px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    color: #ffffff;
    backdrop-filter: blur(8px);
}

.badge-bestseller {
    background: linear-gradient(135deg, #ec4899 0%, #be185d 100%);
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.4);
}

.badge-experience {
    background: linear-gradient(135deg, #06b6d4 0%, #0284c7 100%);
    box-shadow: 0 4px 12px rgba(6, 182, 212, 0.4);
}

.badge-premium {
    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
}

.tour-info-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.tour-title {
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.35;
    margin-bottom: 14px;
}

.tour-features-list {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
    flex: 1;
}

.tour-features-list li {
    font-size: 13px;
    color: #475569;
    display: flex;
    align-items: center;
}

.tour-footer-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px solid #f1f5f9;
}

.tour-pricing {
    display: flex;
    flex-direction: column;
}

.old-price {
    font-size: 12px;
    color: #94a3b8;
    text-decoration: line-through;
}

.sale-price {
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
}

.sale-price .unit {
    font-size: 12px;
    font-weight: 600;
    color: #64748b;
}

.btn-book-tour {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    padding: 9px 22px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.25s ease;
}

/* ==========================================================================
   7. VIDEO SHOWCASE BANNER
   ========================================================================== */
.section-video-banner {
    padding: 60px 0;
}

.video-card-banner {
    background: linear-gradient(135deg, #090d16 0%, #151a30 50%, #0d1b2a 100%);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 28px;
    padding: 44px 44px;
    color: #ffffff;
    box-shadow: 0 25px 60px rgba(15, 23, 42, 0.4), 0 0 35px rgba(236, 72, 153, 0.12);
    position: relative;
    overflow: hidden;
}

.video-card-banner::before {
    content: '';
    position: absolute;
    top: -120px;
    right: -100px;
    width: 450px;
    height: 450px;
    background: radial-gradient(circle, rgba(236, 72, 153, 0.22) 0%, transparent 70%);
    pointer-events: none;
    border-radius: 50%;
}

.video-card-banner::after {
    content: '';
    position: absolute;
    bottom: -150px;
    left: -100px;
    width: 450px;
    height: 450px;
    background: radial-gradient(circle, rgba(14, 165, 233, 0.2) 0%, transparent 70%);
    pointer-events: none;
    border-radius: 50%;
}

.video-tag-pill {
    display: inline-flex;
    align-items: center;
    background: rgba(236, 72, 153, 0.2);
    border: 1px solid rgba(244, 114, 182, 0.45);
    color: #fbcfe8;
    font-size: 12px;
    font-weight: 800;
    padding: 6px 14px;
    border-radius: 20px;
    letter-spacing: 0.8px;
    margin-bottom: 16px;
    backdrop-filter: blur(8px);
}

.video-banner-title {
    font-size: 34px;
    font-weight: 900;
    line-height: 1.25;
    margin-bottom: 14px;
    color: #ffffff;
}

.highlight-video-gradient {
    background: linear-gradient(135deg, #f472b6 0%, #a855f7 50%, #38bdf8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.video-banner-desc {
    font-size: 14.5px;
    line-height: 1.6;
    color: rgba(241, 245, 249, 0.9);
    margin-bottom: 22px;
}

.video-highlights-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 26px;
}

.video-highlight-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.highlight-icon {
    width: 32px;
    height: 32px;
    min-width: 32px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.18);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #f472b6;
    font-size: 18px;
    margin-top: 2px;
}

.highlight-text {
    font-size: 13.5px;
    line-height: 1.5;
    color: #e2e8f0;
}

.highlight-text strong {
    color: #ffffff;
    font-weight: 700;
}

.video-banner-actions {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
}

.btn-video-primary {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #ffffff;
    font-size: 14px;
    font-weight: 800;
    padding: 12px 22px;
    border-radius: 30px;
    text-decoration: none;
    box-shadow: 0 8px 24px rgba(236, 72, 153, 0.4);
    transition: all 0.25s ease;
}

.btn-video-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(236, 72, 153, 0.55);
    color: #ffffff;
}

.btn-video-secondary {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    padding: 11px 20px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.25s ease;
    backdrop-filter: blur(6px);
}

.btn-video-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
    transform: translateY(-2px);
}

/* Video Player Right Frame */
.video-player-wrapper {
    position: relative;
    border-radius: 22px;
    padding: 8px;
    background: linear-gradient(135deg, rgba(236, 72, 153, 0.5), rgba(14, 165, 233, 0.4));
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease;
}

.video-player-wrapper:hover {
    transform: translateY(-3px);
}

.video-player-frame {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    border-radius: 16px;
    overflow: hidden;
    background: #000000;
}

.youtube-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    display: block;
}

.video-player-caption {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 14px 6px 14px;
    gap: 12px;
    flex-wrap: wrap;
}

.video-badge-live {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 11.5px;
    font-weight: 800;
    letter-spacing: 0.8px;
    color: #e2e8f0;
}

.video-badge-live .live-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #ef4444;
    box-shadow: 0 0 10px #ef4444;
    animation: livePulse 2s infinite ease-in-out;
}

@keyframes livePulse {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.3);
        opacity: 0.6;
    }
}

.video-source-link {
    display: inline-flex;
    align-items: center;
    font-size: 12px;
    font-weight: 700;
    color: #cbd5e1;
    text-decoration: none;
    transition: color 0.2s ease;
}

.video-source-link:hover {
    color: #ffffff;
    text-decoration: underline;
}

/* ==========================================================================
   8. TESTIMONIALS SECTION
   ========================================================================== */
.testimonial-card-vip {
    background: #ffffff;
    border: 1px solid #f1f5f9;
    border-radius: 20px;
    padding: 28px 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.testimonial-card-vip:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 36px rgba(0, 0, 0, 0.08);
    border-color: #fbcfe8;
}

.review-stars {
    color: #f59e0b;
    font-size: 18px;
    margin-bottom: 14px;
    display: flex;
    gap: 2px;
}

.review-text {
    font-size: 14px;
    line-height: 1.65;
    color: #334155;
    margin-bottom: 20px;
    flex: 1;
    font-style: italic;
}

.review-user-info {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-top: 16px;
    border-top: 1px solid #f1f5f9;
}

.user-avatar-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    font-weight: 800;
}

.circle-pink {
    background: #fdf2f8;
    color: #ec4899;
    border: 2px solid #fbcfe8;
}

.circle-purple {
    background: #faf5ff;
    color: #a855f7;
    border: 2px solid #e9d5ff;
}

.circle-cyan {
    background: #ecfeff;
    color: #06b6d4;
    border: 2px solid #a5f3fc;
}

.user-name {
    font-size: 15px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 2px;
}

.user-role {
    font-size: 12px;
    color: #64748b;
}

/* ==========================================================================
   9. AUTO SLIDER HÌNH ẢNH ĐÀ NẴNG (CHỈ HÌNH ẢNH NGUYÊN BẢN, TỰ ĐỘNG TRƯỢT)
   ========================================================================== */
.section-auto-slider {
    padding: 30px 0 60px 0;
}

.pure-image-slider-card {
    background: #0f172a;
    border-radius: 28px;
    overflow: hidden;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
    position: relative;
    border: 1px solid rgba(236, 72, 153, 0.15);
}

.slider-viewport {
    position: relative;
    width: 100%;
    height: 480px;
    overflow: hidden;
    background: #0f172a;
}

.slider-track {
    display: flex;
    width: 100%;
    height: 100%;
    transition: transform 0.65s cubic-bezier(0.25, 1, 0.5, 1);
}

.slider-slide-item {
    flex: 0 0 100%;
    width: 100%;
    height: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #0f172a;
}

.pure-slide-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    user-select: none;
    -webkit-user-drag: none;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: high-quality;
    transition: transform 0.6s ease;
}

.pure-image-slider-card:hover .pure-slide-img {
    transform: scale(1.02);
}

/* Nav controls (Prev/Next) */
.slider-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.95);
    color: #0f172a;
    font-size: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 5;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
    transition: all 0.25s ease;
    opacity: 0;
}

.pure-image-slider-card:hover .slider-nav-btn {
    opacity: 1;
}

.slider-nav-btn.prev-btn {
    left: 20px;
}

.slider-nav-btn.next-btn {
    right: 20px;
}

.slider-nav-btn:hover {
    background: #ec4899;
    color: #ffffff;
    border-color: #ec4899;
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 8px 25px rgba(236, 72, 153, 0.6);
}

/* Indicators (Dots) */
.slider-dots-container {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 8px;
    z-index: 5;
    background: rgba(0, 0, 0, 0.35);
    backdrop-filter: blur(8px);
    padding: 6px 14px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.slider-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    border: none;
    padding: 0;
    cursor: pointer;
    transition: all 0.3s ease;
}

.slider-dot.active {
    width: 26px;
    border-radius: 10px;
    background: #ec4899;
    box-shadow: 0 0 10px rgba(236, 72, 153, 0.8);
}

/* ==========================================================================
   10. MODERN VIP FOOTER
   ========================================================================== */
.landing-footer-vip {
    background: #0f172a;
    color: #94a3b8;
    padding: 60px 0 30px 0;
    border-top: 1px solid #1e293b;
}

.footer-brand-logo {
    display: flex;
    align-items: center;
    gap: 12px;
}

.footer-brand-title {
    font-size: 20px;
    font-weight: 800;
    color: #ffffff;
}

.footer-about-text {
    font-size: 13.5px;
    line-height: 1.65;
    color: #94a3b8;
    margin-bottom: 20px;
}

.app-badges-group {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.app-badge-btn {
    display: inline-flex;
    align-items: center;
    background: #1e293b;
    border: 1px solid #334155;
    color: #ffffff;
    font-size: 13px;
    font-weight: 600;
    padding: 8px 16px;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.app-badge-btn:hover {
    background: #334155;
    color: #ffffff;
    border-color: #64748b;
}

.footer-heading {
    font-size: 13px;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: 0.8px;
    margin-bottom: 18px;
    text-transform: uppercase;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.footer-links a {
    font-size: 13.5px;
    color: #94a3b8;
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-links a:hover {
    color: #ec4899;
}

.hotline-box {
    margin-bottom: 14px;
}

.hotline-label {
    display: block;
    font-size: 11.5px;
    color: #94a3b8;
    margin-bottom: 4px;
}

.hotline-number {
    font-size: 20px;
    font-weight: 900;
    color: #ec4899;
    text-decoration: none;
    letter-spacing: 0.5px;
}

.footer-contact-small {
    display: flex;
    flex-direction: column;
    gap: 6px;
    font-size: 12.5px;
}

.contact-line {
    display: flex;
    align-items: center;
    color: #cbd5e1;
}

.footer-bottom-flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 30px;
    border-top: 1px solid #1e293b;
    margin-top: 20px;
    font-size: 12.5px;
    flex-wrap: wrap;
    gap: 12px;
}

.footer-copyright {
    color: #64748b;
}

.footer-copyright strong {
    color: #cbd5e1;
}

.footer-legal-links {
    display: flex;
    align-items: center;
    gap: 8px;
}

.footer-legal-links a {
    color: #94a3b8;
    text-decoration: none;
}

.footer-legal-links a:hover {
    color: #ec4899;
}

.dot-sep {
    color: #475569;
}

/* Modal styling */
.ai-loader-pulse {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: #fdf2f8;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    animation: pulseGlow 1.5s infinite;
}

@keyframes pulseGlow {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(236, 72, 153, 0.4); }
    70% { transform: scale(1.05); box-shadow: 0 0 0 14px rgba(236, 72, 153, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(236, 72, 153, 0); }
}

.btn-pink-solid {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #ffffff;
    border: none;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.4);
}

.btn-pink-solid:disabled {
    background: #cbd5e1;
    box-shadow: none;
}

/* ==========================================================================
   RESPONSIVE DESIGN (MOBILE & TABLET)
   ========================================================================== */
@media (max-width: 991.98px) {
    .hero-title-main {
        font-size: 32px;
    }

    .planner-inputs-grid {
        grid-template-columns: 1fr;
    }

    .hero-stats-strip {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
        padding: 20px;
    }

    .stat-divider {
        display: none;
    }

    .video-banner-title {
        font-size: 26px;
    }

    .video-card-banner {
        padding: 30px 20px;
    }

    .slider-viewport {
        height: 280px;
    }

    .slider-nav-btn {
        width: 36px;
        height: 36px;
        font-size: 18px;
        opacity: 1;
    }

    .slider-nav-btn.prev-btn {
        left: 10px;
    }

    .slider-nav-btn.next-btn {
        right: 10px;
    }

    .slider-dots-container {
        bottom: 12px;
        padding: 4px 10px;
    }
}
</style>