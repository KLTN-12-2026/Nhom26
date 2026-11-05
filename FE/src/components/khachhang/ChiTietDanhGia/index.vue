<template>
    <div class="poi-detail-review-page">
        <!-- 1. BREADCRUMBS & TOP BAR ACTIONS -->
        <div class="top-nav-bar-flex">
            <nav class="poi-breadcrumbs" aria-label="breadcrumb">
                <router-link to="/client/kham-pha-dia-diem" class="crumb-link">
                    <i class="bx bx-compass me-1 text-pink"></i> Khám phá địa điểm
                </router-link>
                <i class="bx bx-chevron-right crumb-sep"></i>
                <span class="crumb-link">Bán đảo Sơn Trà</span>
                <i class="bx bx-chevron-right crumb-sep"></i>
                <span class="crumb-active">Chùa Linh Ứng Bãi Bụt</span>
            </nav>

            <div class="top-actions-group">
                <button type="button" class="btn-top-outline" @click="handleShare">
                    <i class="bx bx-share-alt me-1 font-16"></i>
                    <span>Chia sẻ</span>
                </button>
                <button 
                    type="button" 
                    class="btn-top-favorite" 
                    :class="{ active: isFavorited }"
                    @click="toggleFavorite"
                >
                    <i class="bx" :class="isFavorited ? 'bxs-heart text-pink' : 'bx-heart'"></i>
                    <span>{{ isFavorited ? 'Đã lưu yêu thích' : 'Lưu yêu thích' }}</span>
                </button>
                <router-link to="/client/ai-travel-planner" class="btn-top-add-planner">
                    <i class="bx bx-sparkles me-1 font-16"></i>
                    <span>+ Lịch Trình AI Nổi Bật</span>
                </router-link>
            </div>
        </div>

        <!-- 2. PHOTO GALLERY (HERO GALLERY GRID) -->
        <div class="hero-gallery-grid">
            <!-- Big Hero Image (Left ~65%) -->
            <div class="gallery-hero-card">
                <img 
                    src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=1200&auto=format&fit=crop&q=85" 
                    alt="Chùa Linh Ứng Bãi Bụt Sơn Trà" 
                    class="gallery-hero-img" 
                />
                <div class="gallery-badges-top">
                    <span class="badge-gallery-symbol">
                        <i class="bx bxs-star me-1"></i> Danh thắng biểu tượng
                    </span>
                    <span class="badge-gallery-node">
                        OSM Node: #9110104
                    </span>
                </div>
                <div class="gallery-hero-caption">
                    <span class="caption-kicker">ĐIỂM NHẤN NGOẠN MỤC</span>
                    <h2 class="caption-title">Tượng Phật Bà Quan Âm 67m hướng biển Đông</h2>
                </div>
            </div>

            <!-- Right 3 Stacked Photos (Right ~35%) -->
            <div class="gallery-side-stack">
                <!-- Photo 1 -->
                <div class="gallery-sub-card">
                    <img 
                        src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=600&auto=format&fit=crop&q=80" 
                        alt="Cây đa ngàn năm Sơn Trà" 
                        class="gallery-sub-img" 
                    />
                    <div class="gallery-sub-overlay">
                        <span class="sub-overlay-kicker">CẢNH QUAN NGUYÊN SINH</span>
                        <h4 class="sub-overlay-title">Cây đa ngàn năm Sơn Trà</h4>
                    </div>
                </div>

                <!-- Photo 2 -->
                <div class="gallery-sub-card">
                    <img 
                        src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop&q=80" 
                        alt="Bãi Bụt trong xanh" 
                        class="gallery-sub-img" 
                    />
                    <div class="gallery-sub-overlay">
                        <span class="sub-overlay-kicker">VỊNH BIỂN HOANG SƠ</span>
                        <h4 class="sub-overlay-title">Bãi Bụt trong xanh</h4>
                    </div>
                </div>

                <!-- Photo 3 with +15 photos overlay -->
                <div class="gallery-sub-card card-more-photos">
                    <img 
                        src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=600&auto=format&fit=crop&q=80" 
                        alt="Rừng Sơn Trà và khỉ hoang" 
                        class="gallery-sub-img blur-slight" 
                    />
                    <div class="gallery-view-more-btn-wrap">
                        <button type="button" class="btn-view-all-photos" @click="openAllPhotos">
                            <i class="bx bx-images me-1 font-18"></i>
                            <span>+15 ảnh chất lượng cao</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. MAIN CONTENT: 2-COLUMN LAYOUT -->
        <div class="row g-4 mt-1">
            <!-- LEFT COLUMN: PRIMARY DETAILS, HISTORY & USER REVIEWS -->
            <div class="col-12 col-xl-8">
                <!-- POI PRIMARY INFO CARD -->
                <div class="poi-main-info-card">
                    <div class="poi-header-row">
                        <div class="poi-tags-entity">
                            <span class="badge-entity">THỰC THỂ: DIA_DIEM #1204</span>
                            <span class="badge-heritage">
                                <i class="bx bx-landmark me-1"></i> Di sản theo OSM & Sở Du Lịch
                            </span>
                        </div>

                        <div class="poi-rating-summary-box">
                            <div class="rating-number">
                                <i class="bx bxs-star star-pink"></i>
                                <span>4.9</span>
                                <span class="rating-max">/ 5.0</span>
                            </div>
                            <span class="reviews-count-text">1.420 đánh giá du khách</span>
                        </div>
                    </div>

                    <h1 class="poi-headline-title">Chùa Linh Ứng Bãi Bụt – Bán Đảo Sơn Trà</h1>

                    <!-- Tags Row -->
                    <div class="poi-hashtags-list">
                        <span class="poi-hash-pill">#TâmLinh</span>
                        <span class="poi-hash-pill">#ThanhTịnh</span>
                        <span class="poi-hash-pill">#ThiênNhiên</span>
                        <span class="poi-hash-pill">#NgắmCảnh</span>
                        <span class="poi-hash-pill">#VọngCảnhHải</span>
                        <span class="poi-hash-pill pill-pink-outline">#CheckInSốngẢo</span>
                    </div>

                    <!-- 4 Metric Info Boxes -->
                    <div class="poi-metrics-grid">
                        <div class="metric-card-box">
                            <span class="metric-label">Giờ mở cửa:</span>
                            <div class="metric-main-val">06:00 – 18:30</div>
                            <span class="metric-badge-status badge-open">
                                <span class="dot-green"></span> Đang mở cửa
                            </span>
                        </div>

                        <div class="metric-card-box">
                            <span class="metric-label">Vé tham quan:</span>
                            <div class="metric-main-val text-pink">0đ (Miễn phí)</div>
                            <span class="metric-sub-note">Gửi xe: 10k tùy tâm</span>
                        </div>

                        <div class="metric-card-box">
                            <span class="metric-label">Thời lượng lý tưởng:</span>
                            <div class="metric-main-val text-purple">90 – 120 phút</div>
                            <span class="metric-sub-note">Đủ dạo trọn vẹn</span>
                        </div>

                        <div class="metric-card-box">
                            <span class="metric-label">Tọa độ GPS:</span>
                            <div class="metric-main-val text-cyan">16.1001° N</div>
                            <span class="metric-sub-note">108.2778° E (OSM Trạm 119)</span>
                        </div>
                    </div>

                    <!-- Official Address Strip -->
                    <div class="official-address-strip">
                        <div class="address-text-left">
                            <i class="bx bx-map-pin text-pink me-2 font-18"></i>
                            <span><strong>Địa chỉ chính thức:</strong> Hoàng Sa, Bán đảo Sơn Trà, Phường Thọ Quang, Quận Sơn Trà, TP. Đà Nẵng, Việt Nam.</span>
                        </div>
                        <button type="button" class="btn-copy-address" @click="copyAddress">
                            <i class="bx bx-copy me-1"></i> Sao chép
                        </button>
                    </div>
                </div>

                <!-- GIỚI THIỆU & DẤU ẤN LỊCH SỬ CARD -->
                <div class="poi-history-card">
                    <div class="section-title-accent">
                        <span class="accent-bar-pink"></span>
                        <h3 class="section-heading-text">Giới Thiệu & Dấu Ấn Lịch Sử</h3>
                    </div>

                    <div class="history-content-paragraphs">
                        <p>
                            Chùa Linh Ứng Bãi Bụt tọa lạc tại vị trí đắc địa nhất của bán đảo Sơn Trà, được xem là ngôi chùa lớn nhất và đẹp nhất trong hệ thống "Tam Linh Ứng" nổi danh của thành phố biển Đà Nẵng. Lưng tựa vào đỉnh Sơn Trà hùng vĩ nguyên sinh, mặt hướng thẳng ra đại dương bao la với quần thể tượng Quan Thế Âm Bồ Tát cao 67m (tương đương tòa nhà 30 tầng) đứng uy nghiêm trên đài sen khổng lồ.
                        </p>
                        <p>
                            Tương truyền dưới thời vua Minh Mạng triều Nguyễn, dân chài nơi đây phát hiện một pho tượng Phật trôi dạt vào bãi cát hoang sơ. Ngư dân lập am thờ phụng, từ đó sóng yên biển lặng, ghe thuyền bình an vượt bão giông. Bãi cát ấy được gọi là "Bãi Bụt" (nghĩa là cõi Phật giữa trần gian) và chùa Linh Ứng ngày nay chính là sự tiếp nối tâm linh sâu sắc ấy.
                        </p>
                    </div>

                    <!-- Alert: Lưu ý quan trọng từ Thổ Địa & AI Optimizer -->
                    <div class="local-advice-alert-box">
                        <div class="alert-title-header">
                            <i class="bx bx-bolt-circle text-pink font-20 me-1"></i>
                            <span>LƯU Ý QUAN TRỌNG TỪ THỔ ĐỊA & AI OPTIMIZER</span>
                        </div>

                        <div class="advice-tips-grid">
                            <div class="tip-column-card">
                                <div class="tip-icon-header">
                                    <i class="bx bx-closet text-pink"></i>
                                    <strong>Trang phục lịch sự</strong>
                                </div>
                                <p class="tip-desc-text">
                                    Mặc quần áo dài qua gối, áo có tay kín đáo khi bước vào chánh điện linh thiêng.
                                </p>
                            </div>

                            <div class="tip-column-card">
                                <div class="tip-icon-header">
                                    <i class="bx bx-shield-quarter text-purple"></i>
                                    <strong>Cảnh giác khỉ hoang</strong>
                                </div>
                                <p class="tip-desc-text">
                                    Không mang túi nilon trong suốt hay thức ăn vặt mở nắp để tránh bị khỉ giật đồ.
                                </p>
                            </div>

                            <div class="tip-column-card">
                                <div class="tip-icon-header">
                                    <i class="bx bx-sun text-warning"></i>
                                    <strong>Thời khắc vàng</strong>
                                </div>
                                <p class="tip-desc-text">
                                    Nên đến lúc 16:30 – 18:00 để chiêm ngưỡng hoàng hôn rực rỡ và Đà Nẵng lên đèn.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ĐÁNH GIÁ & TRẢI NGHIỆM THỰC TẾ CARD -->
                <div class="poi-reviews-card">
                    <div class="reviews-header-flex">
                        <div>
                            <div class="section-title-accent">
                                <span class="accent-bar-pink"></span>
                                <h3 class="section-heading-text">Đánh Giá & Trải Nghiệm Thực Tế</h3>
                            </div>
                            <p class="reviews-sub-note">Cộng đồng du khách và cư dân địa phương chia sẻ cảm nhận chân thực nhất.</p>
                        </div>
                    </div>

                    <!-- Rating Distribution Box -->
                    <div class="rating-distribution-bar">
                        <div class="score-display-box">
                            <div class="score-huge">4.9</div>
                            <div class="stars-gold-row">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                            </div>
                            <span class="total-reviews-sub">1.420 bạn đánh giá</span>
                        </div>

                        <div class="distribution-bars-group">
                            <div class="bar-line-item">
                                <span class="bar-label">5 sao</span>
                                <div class="progress-track">
                                    <div class="progress-fill fill-pink" style="width: 84%;"></div>
                                </div>
                                <span class="bar-pct">84%</span>
                            </div>
                            <div class="bar-line-item">
                                <span class="bar-label">4 sao</span>
                                <div class="progress-track">
                                    <div class="progress-fill fill-purple" style="width: 11%;"></div>
                                </div>
                                <span class="bar-pct">11%</span>
                            </div>
                            <div class="bar-line-item">
                                <span class="bar-label">1-3 sao</span>
                                <div class="progress-track">
                                    <div class="progress-fill fill-gray" style="width: 5%;"></div>
                                </div>
                                <span class="bar-pct">5%</span>
                            </div>
                        </div>

                        <div class="write-review-cta-box">
                            <button type="button" class="btn-write-review" @click="openWriteReviewModal">
                                <i class="bx bx-pencil me-1 font-18"></i>
                                <span>Viết Đánh Giá</span>
                            </button>
                        </div>
                    </div>

                    <!-- Reviews List -->
                    <div class="user-reviews-stream">
                        <!-- Review 1 -->
                        <div class="user-review-item">
                            <div class="reviewer-header">
                                <div class="reviewer-avatar circle-pink">L</div>
                                <div class="reviewer-info">
                                    <div class="name-badge-row">
                                        <h5 class="reviewer-name">Lê Hoàng Nam</h5>
                                        <span class="badge-verified-visit">
                                            <i class="bx bx-check-circle me-1"></i> Đã ghé thăm
                                        </span>
                                    </div>
                                    <span class="review-date-origin">Du khách từ Hà Nội · Đã đánh giá 2 ngày trước</span>
                                </div>
                                <div class="review-stars-rated">
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                </div>
                            </div>

                            <p class="review-comment-text">
                                "Ngôi chùa thanh tịnh và quá đỗi hùng vĩ! Đứng dưới chân tượng Bà nhìn ra vịnh Đà Nẵng thấy lòng nhẹ bẫng. Không khí trong lành, chạy xe máy ven biển gió thổi lồng lộng cực sướng. Các bạn nhớ chú ý đàn khỉ ở khu vực khuôn viên sau chùa nhé, chúng khá dạn người. 10/10 trải nghiệm tại Đà Nẵng!"
                            </p>

                            <!-- User Attached Photos -->
                            <div class="review-attached-photos">
                                <img src="https://images.unsplash.com/photo-1514565131-fce0801e5785?w=400&auto=format&fit=crop&q=80" alt="Hoàng hôn Sơn Trà" class="user-photo-thumb" />
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400&auto=format&fit=crop&q=80" alt="Biển bãi Bụt" class="user-photo-thumb" />
                            </div>

                            <div class="review-footer-interactions">
                                <button type="button" class="btn-review-like" @click="likeReview(1)">
                                    <i class="bx bx-like me-1"></i> 48 Hữu ích
                                </button>
                                <button type="button" class="btn-review-reply" @click="replyReview(1)">
                                    <i class="bx bx-message-rounded-dots me-1"></i> Phản hồi
                                </button>
                            </div>
                        </div>

                        <!-- Review 2 -->
                        <div class="user-review-item">
                            <div class="reviewer-header">
                                <div class="reviewer-avatar circle-purple">M</div>
                                <div class="reviewer-info">
                                    <div class="name-badge-row">
                                        <h5 class="reviewer-name">Mai Thu Thảo</h5>
                                        <span class="badge-local-expert">
                                            Local Explorer
                                        </span>
                                    </div>
                                    <span class="review-date-origin">Người Đà Nẵng · Đã đánh giá 1 tuần trước</span>
                                </div>
                                <div class="review-stars-rated">
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                </div>
                            </div>

                            <p class="review-comment-text">
                                "Chùa miễn phí vé hoàn toàn, bãi đỗ xe rộng rãi có thùng công đức tùy tâm. Khuyên mọi người nên dùng tính năng 'Lập Kế Hoạch AI' để kết hợp đi Linh Ứng rồi vòng lên Đỉnh Bàn Cờ vào buổi chiều mát, tránh đi lúc trưa nắng gắt. Vườn bonsai ở chùa được chăm sóc cực kỳ công phu và nghệ thuật!"
                            </p>

                            <div class="review-footer-interactions">
                                <button type="button" class="btn-review-like" @click="likeReview(2)">
                                    <i class="bx bx-like me-1"></i> 32 Hữu ích
                                </button>
                                <button type="button" class="btn-review-reply" @click="replyReview(2)">
                                    <i class="bx bx-message-rounded-dots me-1"></i> Phản hồi
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- See More Button -->
                    <div class="load-more-reviews-center">
                        <button type="button" class="btn-more-reviews" @click="loadMoreReviews">
                            <span>Xem thêm 1.418 đánh giá khác</span>
                            <i class="bx bx-chevron-down ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: ROUTE CONNECTIONS & OSRM LIVE MAP -->
            <div class="col-12 col-xl-4">
                <div class="sticky-route-sidebar">
                    <!-- 1. KẾT NỐI TUYẾN ĐƯỜNG CARD -->
                    <div class="route-connector-card">
                        <div class="connector-header-flex">
                            <div class="connector-title-wrap">
                                <i class="bx bx-navigation text-pink me-1"></i>
                                <h4 class="connector-heading">Kết Nối Tuyến Đường</h4>
                            </div>
                            <span class="osrm-engine-pill">OSRM v3.24</span>
                        </div>

                        <!-- Distance Highlight Card -->
                        <div class="route-distance-highlight">
                            <div class="from-location-label">
                                <span>Khoảng cách từ vị trí bạn:</span>
                                <strong class="text-pink">Khách sạn ven biển Mỹ Khê</strong>
                            </div>
                            <div class="distance-metric-row">
                                <span class="distance-val">8.4 km</span>
                                <span class="drive-time-pill">~16 phút xe máy</span>
                            </div>
                            <p class="route-safety-note">
                                Cung đường ven biển Hoàng Sa bằng phẳng, cảnh sắc ngoạn mục tuyệt đối an toàn.
                            </p>
                        </div>

                        <!-- Next Waypoints Section -->
                        <div class="next-waypoints-box">
                            <div class="waypoints-header">
                                <span class="wp-title">ĐIỂM NỐI TỐI ƯU KẾ TIẾP</span>
                                <span class="wp-sub">theo ma_tran_khoang_cach</span>
                            </div>

                            <div class="waypoints-list">
                                <!-- Waypoint 1 -->
                                <div class="waypoint-item">
                                    <div class="wp-circle circle-1">1</div>
                                    <div class="wp-info">
                                        <div class="wp-name">Đỉnh Bàn Cờ</div>
                                        <span class="wp-note">Độ dốc trung bình 12%</span>
                                    </div>
                                    <div class="wp-dist">
                                        <strong>6.2 km</strong>
                                        <small>14 phút</small>
                                    </div>
                                </div>

                                <!-- Waypoint 2 -->
                                <div class="waypoint-item">
                                    <div class="wp-circle circle-2">2</div>
                                    <div class="wp-info">
                                        <div class="wp-name">Cây Đa Di Sản 800 năm</div>
                                        <span class="wp-note">Đường ven rừng tự nhiên</span>
                                    </div>
                                    <div class="wp-dist">
                                        <strong>4.5 km</strong>
                                        <small>10 phút</small>
                                    </div>
                                </div>

                                <!-- Waypoint 3 -->
                                <div class="waypoint-item">
                                    <div class="wp-circle circle-3">3</div>
                                    <div class="wp-info">
                                        <div class="wp-name">Cầu Rồng Đà Nẵng</div>
                                        <span class="wp-note">Hướng về trung tâm phố</span>
                                    </div>
                                    <div class="wp-dist">
                                        <strong>9.1 km</strong>
                                        <small>18 phút</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="route-actions-stack">
                            <button type="button" class="btn-route-action btn-find-way" @click="openLiveOsmMap">
                                <i class="bx bx-map-alt me-1 font-18"></i>
                                <span>Tìm đường đi trên OSM Live Map</span>
                            </button>
                            <router-link to="/client/ai-travel-planner" class="btn-route-action btn-optimize-trip">
                                <i class="bx bx-calendar-star me-1 font-18"></i>
                                <span>Tối ưu vào lịch trình ngày của tôi</span>
                            </router-link>
                        </div>
                    </div>

                    <!-- 2. BẢN ĐỒ TRỰC QUAN CARD -->
                    <div class="visual-map-card">
                        <div class="map-card-header-bar">
                            <span class="map-title-text"><i class="bx bx-map me-1 text-pink"></i> Bản đồ trực quan</span>
                            <span class="map-epsg-text">OpenStreetMap EPSG:4326</span>
                        </div>

                        <!-- Mini Vector Map Preview -->
                        <div class="map-preview-viewport">
                            <svg class="danang-mini-map-svg" viewBox="0 0 400 240" fill="none">
                                <rect width="400" height="240" fill="#e0f2fe" />
                                
                                <!-- Coastline Land -->
                                <path 
                                    d="M0,0 L240,0 C260,30 300,40 340,60 C370,85 360,120 320,130 C290,140 280,160 290,200 C300,220 320,240 340,240 L0,240 Z" 
                                    fill="#f1f5f9" 
                                    stroke="#cbd5e1" 
                                    stroke-width="1.2"
                                />

                                <!-- Son Tra Peninsula Area -->
                                <path 
                                    d="M260,35 C290,20 350,30 370,60 C380,95 340,120 310,110 C280,105 250,70 260,35 Z" 
                                    fill="#dcfce7" 
                                    stroke="#86efac" 
                                    stroke-width="1.2"
                                />

                                <!-- Han river -->
                                <path d="M220,240 C210,180 220,130 240,90 C250,70 260,50 270,30" stroke="#38bdf8" stroke-width="8" stroke-linecap="round" fill="none" />

                                <!-- Route from My Khe to Linh Ung -->
                                <path d="M280,190 Q270,120 330,75" stroke="#ec4899" stroke-width="3" stroke-dasharray="4 2" fill="none" />

                                <!-- Pin Linh Ung Bai But -->
                                <g transform="translate(330, 75)" class="map-marker-pin">
                                    <circle r="14" fill="#ec4899" opacity="0.3" class="marker-pulse-ring" />
                                    <circle r="10" fill="#ec4899" />
                                    <path d="M-3,-2 L0,-6 L3,-2 L1.5,-2 L1.5,3 L-1.5,3 L-1.5,-2 Z" fill="#ffffff" />
                                    <rect x="-45" y="14" width="90" height="18" rx="9" fill="#1e293b" />
                                    <text x="0" y="26" font-size="9" font-weight="700" fill="#ffffff" text-anchor="middle">Linh Ứng Bãi Bụt</text>
                                </g>

                                <!-- Pin My Khe -->
                                <g transform="translate(280, 190)">
                                    <circle r="7" fill="#0284c7" />
                                    <text x="10" y="3" font-size="9" font-weight="600" fill="#0369a1">Mỹ Khê</text>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. BOTTOM LEGAL & COMPLIANCE BAR -->
        <div class="poi-bottom-compliance-bar">
            <div class="compliance-left">
                <i class="bx bx-shield-check text-pink me-1 font-16"></i>
                <span>Dữ liệu đồng bộ trực tiếp từ OpenStreetMap và Trung tâm Xúc tiến Du Lịch Đà Nẵng</span>
            </div>
            <a href="javascript:;" class="compliance-right-link" @click="reportDiscrepancy">
                <i class="bx bx-error-circle me-1"></i> Báo cáo thông tin sai lệch về địa điểm này
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ChiTietVaDanhGiaPOI',
    data() {
        return {
            isFavorited: true
        };
    },
    methods: {
        toggleFavorite() {
            this.isFavorited = !this.isFavorited;
            this.showToast(this.isFavorited ? 'Đã lưu Chùa Linh Ứng Bãi Bụt vào danh sách yêu thích!' : 'Đã bỏ lưu khỏi danh sách yêu thích.');
        },
        handleShare() {
            if (navigator.share) {
                navigator.share({
                    title: 'Chùa Linh Ứng Bãi Bụt – Bán Đảo Sơn Trà',
                    url: window.location.href
                }).catch(() => {});
            } else {
                navigator.clipboard.writeText(window.location.href);
                this.showToast('Đã sao chép liên kết chia sẻ địa điểm!');
            }
        },
        copyAddress() {
            navigator.clipboard.writeText('Hoàng Sa, Bán đảo Sơn Trà, Phường Thọ Quang, Quận Sơn Trà, TP. Đà Nẵng');
            this.showToast('Đã sao chép địa chỉ chính thức vào bộ nhớ tạm!');
        },
        openAllPhotos() {
            this.showToast('Đang mở thư viện 15+ hình ảnh thực tế chất lượng cao tại Chùa Linh Ứng...');
        },
        openWriteReviewModal() {
            const review = prompt('Nhập cảm nhận và đánh giá của bạn về Chùa Linh Ứng Bãi Bụt:');
            if (review) {
                this.showToast('Cảm ơn bạn! Đánh giá đã được gửi lên hệ thống kiểm duyệt.');
            }
        },
        likeReview(id) {
            this.showToast('Cảm ơn bạn đã đánh giá bình luận này là hữu ích!');
        },
        replyReview(id) {
            const rep = prompt('Nhập câu trả lời của bạn:');
            if (rep) {
                this.showToast('Đã đăng phản hồi của bạn!');
            }
        },
        loadMoreReviews() {
            this.showToast('Đang tải thêm đánh giá từ cộng đồng du khách...');
        },
        openLiveOsmMap() {
            this.$router.push('/client/kham-pha-dia-diem');
        },
        reportDiscrepancy() {
            alert('Cảm ơn đóng góp của bạn! Bộ phận điều phối dữ liệu du lịch Đà Nẵng sẽ kiểm tra và xác thực lại thông tin trong 24h.');
        },
        showToast(msg) {
            if (this.$toast) {
                this.$toast.success(msg);
            } else {
                alert(msg);
            }
        }
    }
};
</script>

<style scoped>
/* ==========================================================================
   RESET & CONTAINER
   ========================================================================== */
.poi-detail-review-page {
    padding: 10px 0 60px 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #1e293b;
}

.text-pink {
    color: #ec4899 !important;
}

.text-purple {
    color: #8b5cf6 !important;
}

.text-cyan {
    color: #06b6d4 !important;
}

/* ==========================================================================
   1. BREADCRUMBS & TOP BAR ACTIONS
   ========================================================================== */
.top-nav-bar-flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 14px;
}

.poi-breadcrumbs {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13.5px;
    font-weight: 600;
}

.crumb-link {
    color: #64748b;
    text-decoration: none;
    transition: color 0.2s ease;
}

.crumb-link:hover {
    color: #ec4899;
}

.crumb-sep {
    color: #cbd5e1;
    font-size: 16px;
}

.crumb-active {
    color: #ec4899;
    font-weight: 700;
}

.top-actions-group {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.btn-top-outline {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #475569;
    font-size: 13px;
    font-weight: 700;
    padding: 8px 16px;
    border-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    transition: all 0.2s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
}

.btn-top-outline:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
    color: #0f172a;
}

.btn-top-favorite {
    background: #fdf2f8;
    border: 1px solid #fbcfe8;
    color: #ec4899;
    font-size: 13px;
    font-weight: 700;
    padding: 8px 16px;
    border-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: all 0.2s ease;
}

.btn-top-favorite:hover {
    background: #fce7f3;
}

.btn-top-add-planner {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #9333ea 100%);
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    padding: 8px 20px;
    border-radius: 24px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
    transition: all 0.25s ease;
}

.btn-top-add-planner:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(236, 72, 153, 0.5);
    color: #ffffff;
}

/* ==========================================================================
   2. PHOTO GALLERY (HERO GALLERY GRID)
   ========================================================================== */
.hero-gallery-grid {
    display: grid;
    grid-template-columns: 2fr 1.1fr;
    gap: 16px;
    height: 440px;
    margin-bottom: 24px;
    border-radius: 26px;
    overflow: hidden;
}

.gallery-hero-card {
    position: relative;
    height: 100%;
    overflow: hidden;
    border-radius: 22px;
}

.gallery-hero-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-hero-card:hover .gallery-hero-img {
    transform: scale(1.03);
}

.gallery-badges-top {
    position: absolute;
    top: 16px;
    left: 16px;
    right: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.badge-gallery-symbol {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #ffffff;
    font-size: 11.5px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.badge-gallery-node {
    background: rgba(15, 23, 42, 0.85);
    color: #e2e8f0;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 14px;
    backdrop-filter: blur(6px);
}

.gallery-hero-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 30px 24px 20px 24px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.3) 60%, transparent 100%);
    color: #ffffff;
}

.caption-kicker {
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;
    color: #fbcfe8;
    display: block;
    margin-bottom: 4px;
}

.caption-title {
    font-size: 22px;
    font-weight: 900;
    line-height: 1.25;
    margin: 0;
    color: #ffffff;
}

.gallery-side-stack {
    display: grid;
    grid-template-rows: repeat(3, 1fr);
    gap: 14px;
    height: 100%;
}

.gallery-sub-card {
    position: relative;
    border-radius: 18px;
    overflow: hidden;
    height: 100%;
}

.gallery-sub-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.gallery-sub-card:hover .gallery-sub-img {
    transform: scale(1.05);
}

.gallery-sub-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 18px 16px 12px 16px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, transparent 100%);
    color: #ffffff;
}

.sub-overlay-kicker {
    font-size: 9.5px;
    font-weight: 800;
    color: #fbcfe8;
    display: block;
    margin-bottom: 2px;
}

.sub-overlay-title {
    font-size: 13.5px;
    font-weight: 800;
    margin: 0;
    color: #ffffff;
}

.card-more-photos {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.blur-slight {
    filter: brightness(0.75);
}

.gallery-view-more-btn-wrap {
    position: absolute;
    z-index: 10;
}

.btn-view-all-photos {
    background: rgba(255, 255, 255, 0.95);
    border: none;
    color: #0f172a;
    font-size: 12.5px;
    font-weight: 800;
    padding: 9px 18px;
    border-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
    transition: all 0.2s ease;
}

.btn-view-all-photos:hover {
    background: #ffffff;
    color: #ec4899;
    transform: scale(1.04);
}

/* ==========================================================================
   3. LEFT COLUMN: PRIMARY INFO, HISTORY & REVIEWS
   ========================================================================== */
.poi-main-info-card,
.poi-history-card,
.poi-reviews-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 26px 28px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    margin-bottom: 22px;
}

.poi-header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
    flex-wrap: wrap;
    gap: 12px;
}

.poi-tags-entity {
    display: flex;
    align-items: center;
    gap: 8px;
}

.badge-entity {
    background: #fdf2f8;
    color: #ec4899;
    border: 1px solid #fbcfe8;
    font-size: 11.5px;
    font-weight: 800;
    padding: 3px 10px;
    border-radius: 12px;
}

.badge-heritage {
    background: #faf5ff;
    color: #8b5cf6;
    border: 1px solid #e9d5ff;
    font-size: 11.5px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 12px;
}

.poi-rating-summary-box {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.rating-number {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 20px;
    font-weight: 900;
    color: #ec4899;
}

.star-pink {
    color: #f59e0b;
    font-size: 20px;
}

.rating-max {
    font-size: 13px;
    color: #94a3b8;
    font-weight: 600;
}

.reviews-count-text {
    font-size: 11.5px;
    color: #64748b;
    font-weight: 600;
}

.poi-headline-title {
    font-size: 26px;
    font-weight: 900;
    color: #0f172a;
    line-height: 1.25;
    margin-bottom: 14px;
    letter-spacing: -0.4px;
}

.poi-hashtags-list {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.poi-hash-pill {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #475569;
    font-size: 12px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 16px;
}

.pill-pink-outline {
    background: #fdf2f8;
    border-color: #fbcfe8;
    color: #ec4899;
}

/* 4 Metric Info Boxes */
.poi-metrics-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 20px;
}

.metric-card-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 14px;
}

.metric-label {
    font-size: 11px;
    color: #64748b;
    font-weight: 600;
    display: block;
    margin-bottom: 4px;
}

.metric-main-val {
    font-size: 15px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 4px;
}

.metric-badge-status {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11px;
    font-weight: 700;
}

.badge-open {
    color: #166534;
}

.dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #22c55e;
}

.metric-sub-note {
    font-size: 11px;
    color: #64748b;
    font-weight: 600;
}

/* Official Address Strip */
.official-address-strip {
    background: #f8fafc;
    border: 1px dashed #cbd5e1;
    border-radius: 14px;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 13px;
    color: #334155;
    flex-wrap: wrap;
    gap: 10px;
}

.address-text-left {
    display: flex;
    align-items: center;
    flex: 1;
}

.btn-copy-address {
    background: transparent;
    border: none;
    color: #ec4899;
    font-size: 12.5px;
    font-weight: 700;
    cursor: pointer;
    transition: color 0.2s ease;
}

.btn-copy-address:hover {
    color: #be185d;
    text-decoration: underline;
}

/* History Card */
.section-title-accent {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
}

.accent-bar-pink {
    width: 4px;
    height: 22px;
    border-radius: 3px;
    background: #ec4899;
}

.section-heading-text {
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
    margin: 0;
}

.history-content-paragraphs p {
    font-size: 14px;
    line-height: 1.65;
    color: #475569;
    margin-bottom: 14px;
}

/* Alert Tips Box */
.local-advice-alert-box {
    background: #fdf2f8;
    border: 1.5px solid #fbcfe8;
    border-radius: 18px;
    padding: 20px;
    margin-top: 20px;
}

.alert-title-header {
    display: flex;
    align-items: center;
    font-size: 13px;
    font-weight: 800;
    color: #be185d;
    letter-spacing: 0.6px;
    margin-bottom: 14px;
}

.advice-tips-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
}

.tip-column-card {
    background: #ffffff;
    border: 1px solid #fbcfe8;
    border-radius: 14px;
    padding: 14px;
}

.tip-icon-header {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 6px;
}

.tip-desc-text {
    font-size: 12px;
    color: #64748b;
    line-height: 1.5;
    margin: 0;
}

/* Reviews Card */
.reviews-header-flex {
    margin-bottom: 18px;
}

.reviews-sub-note {
    font-size: 13px;
    color: #64748b;
    margin: 4px 0 0 14px;
}

.rating-distribution-bar {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 20px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 20px;
}

.score-display-box {
    text-align: center;
}

.score-huge {
    font-size: 38px;
    font-weight: 900;
    color: #ec4899;
    line-height: 1;
    margin-bottom: 4px;
}

.stars-gold-row {
    color: #f59e0b;
    font-size: 16px;
    margin-bottom: 4px;
    display: flex;
    justify-content: center;
    gap: 2px;
}

.total-reviews-sub {
    font-size: 11.5px;
    color: #64748b;
    font-weight: 600;
}

.distribution-bars-group {
    flex: 1;
    max-width: 320px;
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.bar-line-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11.5px;
    font-weight: 700;
    color: #475569;
}

.bar-label {
    width: 44px;
    text-align: right;
}

.progress-track {
    flex: 1;
    height: 7px;
    background: #e2e8f0;
    border-radius: 6px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
}

.fill-pink { background: #ec4899; }
.fill-purple { background: #8b5cf6; }
.fill-gray { background: #94a3b8; }

.bar-pct {
    width: 32px;
    color: #64748b;
}

.btn-write-review {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #ffffff;
    font-size: 13.5px;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 24px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
    transition: all 0.2s ease;
}

.btn-write-review:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(236, 72, 153, 0.5);
}

/* User Reviews Stream */
.user-reviews-stream {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.user-review-item {
    background: #ffffff;
    border: 1px solid #f1f5f9;
    border-radius: 18px;
    padding: 18px 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
}

.reviewer-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}

.reviewer-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 900;
    flex-shrink: 0;
}

.circle-pink { background: #fdf2f8; color: #ec4899; border: 2px solid #fbcfe8; }
.circle-purple { background: #faf5ff; color: #8b5cf6; border: 2px solid #e9d5ff; }

.reviewer-info {
    flex: 1;
    margin-left: 12px;
}

.name-badge-row {
    display: flex;
    align-items: center;
    gap: 8px;
}

.reviewer-name {
    font-size: 14.5px;
    font-weight: 800;
    color: #0f172a;
    margin: 0;
}

.badge-verified-visit {
    background: #f0fdf4;
    color: #166534;
    font-size: 10.5px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 10px;
    border: 1px solid #bbf7d0;
}

.badge-local-expert {
    background: #faf5ff;
    color: #7c3aed;
    font-size: 10.5px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 10px;
    border: 1px solid #e9d5ff;
}

.review-date-origin {
    font-size: 11.5px;
    color: #94a3b8;
}

.review-stars-rated {
    color: #f59e0b;
    font-size: 14px;
}

.review-comment-text {
    font-size: 13.5px;
    line-height: 1.6;
    color: #334155;
    margin-bottom: 12px;
}

.review-attached-photos {
    display: flex;
    gap: 10px;
    margin-bottom: 12px;
}

.user-photo-thumb {
    width: 90px;
    height: 70px;
    border-radius: 10px;
    object-fit: cover;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.review-footer-interactions {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 12px;
}

.btn-review-like,
.btn-review-reply {
    background: transparent;
    border: none;
    color: #64748b;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    padding: 0;
    transition: color 0.2s ease;
}

.btn-review-like:hover,
.btn-review-reply:hover {
    color: #ec4899;
}

.load-more-reviews-center {
    text-align: center;
    margin-top: 20px;
}

.btn-more-reviews {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #475569;
    font-size: 13px;
    font-weight: 700;
    padding: 8px 22px;
    border-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    transition: all 0.2s ease;
}

.btn-more-reviews:hover {
    background: #f1f5f9;
    color: #0f172a;
    border-color: #cbd5e1;
}

/* ==========================================================================
   4. RIGHT COLUMN: ROUTE CONNECTIONS & LIVE MAP
   ========================================================================== */
.sticky-route-sidebar {
    position: sticky;
    top: 86px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Route Connector Card */
.route-connector-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 22px 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

.connector-header-flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
}

.connector-title-wrap {
    display: flex;
    align-items: center;
}

.connector-heading {
    font-size: 15.5px;
    font-weight: 800;
    color: #0f172a;
    margin: 0;
}

.osrm-engine-pill {
    background: #fdf2f8;
    color: #ec4899;
    border: 1px solid #fbcfe8;
    font-size: 11px;
    font-weight: 800;
    padding: 2px 8px;
    border-radius: 12px;
}

.route-distance-highlight {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 14px;
    margin-bottom: 16px;
}

.from-location-label {
    font-size: 11.5px;
    color: #64748b;
    margin-bottom: 6px;
}

.distance-metric-row {
    display: flex;
    align-items: baseline;
    gap: 10px;
    margin-bottom: 6px;
}

.distance-val {
    font-size: 26px;
    font-weight: 900;
    color: #ec4899;
}

.drive-time-pill {
    font-size: 12.5px;
    font-weight: 700;
    color: #0f172a;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    padding: 2px 8px;
    border-radius: 12px;
}

.route-safety-note {
    font-size: 11.5px;
    color: #64748b;
    line-height: 1.45;
    margin: 0;
}

/* Next Waypoints */
.next-waypoints-box {
    margin-bottom: 18px;
}

.waypoints-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 11px;
}

.wp-title {
    font-weight: 800;
    color: #475569;
    letter-spacing: 0.5px;
}

.wp-sub {
    color: #94a3b8;
}

.waypoints-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.waypoint-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #f8fafc;
    border: 1px solid #f1f5f9;
    border-radius: 12px;
    padding: 10px 12px;
    font-size: 12.5px;
}

.wp-circle {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    color: #ffffff;
    font-size: 11px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
    flex-shrink: 0;
}

.circle-1 { background: #8b5cf6; }
.circle-2 { background: #06b6d4; }
.circle-3 { background: #ec4899; }

.wp-info {
    flex: 1;
}

.wp-name {
    font-weight: 700;
    color: #0f172a;
}

.wp-note {
    font-size: 11px;
    color: #64748b;
    display: block;
}

.wp-dist {
    text-align: right;
    font-size: 12px;
}

.wp-dist strong {
    color: #ec4899;
    display: block;
}

.wp-dist small {
    color: #94a3b8;
    font-size: 10.5px;
}

/* Route Action Buttons */
.route-actions-stack {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.btn-route-action {
    width: 100%;
    font-size: 13px;
    font-weight: 700;
    padding: 11px;
    border-radius: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.25s ease;
}

.btn-find-way {
    background: #f8fafc;
    border: 1px solid #cbd5e1;
    color: #334155;
}

.btn-find-way:hover {
    background: #f1f5f9;
    color: #0f172a;
}

.btn-optimize-trip {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: #ffffff;
    border: none;
    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
}

.btn-optimize-trip:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(236, 72, 153, 0.5);
    color: #ffffff;
}

/* Visual Map Card */
.visual-map-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

.map-card-header-bar {
    padding: 10px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #f1f5f9;
    font-size: 12px;
}

.map-title-text {
    font-weight: 800;
    color: #0f172a;
}

.map-epsg-text {
    color: #94a3b8;
    font-size: 11px;
}

.map-preview-viewport {
    height: 180px;
    background: #e0f2fe;
    position: relative;
    overflow: hidden;
}

.danang-mini-map-svg {
    width: 100%;
    height: 100%;
    display: block;
}

.marker-pulse-ring {
    animation: ringPulse 2s infinite;
}

@keyframes ringPulse {
    0% { r: 10; opacity: 0.6; }
    50% { r: 16; opacity: 0.2; }
    100% { r: 10; opacity: 0.6; }
}

/* ==========================================================================
   4. BOTTOM COMPLIANCE BAR
   ========================================================================== */
.poi-bottom-compliance-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 24px;
    margin-top: 24px;
    border-top: 1px solid #e2e8f0;
    font-size: 12.5px;
    color: #64748b;
    flex-wrap: wrap;
    gap: 12px;
}

.compliance-left {
    display: flex;
    align-items: center;
}

.compliance-right-link {
    color: #64748b;
    text-decoration: underline;
    display: flex;
    align-items: center;
    transition: color 0.2s ease;
}

.compliance-right-link:hover {
    color: #ec4899;
}

/* ==========================================================================
   RESPONSIVE
   ========================================================================== */
@media (max-width: 991.98px) {
    .hero-gallery-grid {
        grid-template-columns: 1fr;
        height: auto;
    }

    .gallery-hero-card {
        height: 260px;
    }

    .gallery-side-stack {
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: 1fr;
        height: 110px;
    }

    .poi-metrics-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .advice-tips-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 575.98px) {
    .gallery-side-stack {
        grid-template-columns: 1fr;
        height: auto;
    }

    .poi-metrics-grid {
        grid-template-columns: 1fr;
    }

    .top-actions-group {
        width: 100%;
        justify-content: space-between;
    }

    .btn-top-add-planner {
        width: 100%;
        justify-content: center;
    }
}
</style>
