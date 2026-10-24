<template>
    <footer class="client-footer">
        <div class="footer-container">
            <div class="row g-4 py-4 border-bottom">
                <!-- Brand Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="footer-logo-box">
                            <i class="bx bx-paper-plane text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark">Da Nang SmartTrip AI</h6>
                            <small class="text-danger fw-semibold">Hệ Thống Tối Ưu Hóa Tuyến Điểm Du Lịch Đa Mục Tiêu</small>
                        </div>
                    </div>
                    <p class="text-muted small mt-2 mb-3 pe-lg-4">
                        Nền tảng hỗ trợ lập kế hoạch du lịch cá nhân hóa tại Đà Nẵng ứng dụng thuật toán di truyền (GA) và ma trận khoảng cách OSRM, giúp du khách tối ưu thời gian di chuyển và ngân sách.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="javascript:;" class="social-circle-btn" title="Facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="javascript:;" class="social-circle-btn" title="Instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="javascript:;" class="social-circle-btn" title="TikTok"><i class="bx bxl-tiktok"></i></a>
                        <a href="javascript:;" class="social-circle-btn" title="YouTube"><i class="bx bxl-youtube"></i></a>
                    </div>
                </div>

                <!-- Column 1: Lập Kế Hoạch AI & Bản Đồ -->
                <div class="col-lg-3 col-md-3 col-6">
                    <h6 class="footer-col-title mb-3">Khám Phá & Lập Kế Hoạch AI</h6>
                    <ul class="list-unstyled footer-link-list mb-0 small">
                        <li><router-link to="/client/kham-pha-dia-diem">Khám Phá Địa Điểm OSM</router-link></li>
                        <li><router-link to="/client/ban-do-tuong-tac">Bản Đồ Tương Tác OSM</router-link></li>
                        <li><router-link to="/client/danh-muc-tour">Danh Mục Tour & So Sánh</router-link></li>
                        <li><router-link to="/client/ai-travel-planner">AI Travel Planner</router-link></li>
                        <li><router-link to="/client/lich-trinh-toi-uu">Lịch Trình Tối Ưu</router-link></li>
                        <li><router-link to="/client/lich-su-ke-hoach">Lịch Sử Kế Hoạch</router-link></li>
                    </ul>
                </div>

                <!-- Column 2: Trải Nghiệm & Cá Nhân -->
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="footer-col-title mb-3">Trải Nghiệm & Cá Nhân</h6>
                    <ul class="list-unstyled footer-link-list mb-0 small">
                        <li><router-link to="/client/don-dat-thanh-toan">Đơn Đặt & Thanh Toán</router-link></li>
                        <li><router-link to="/client/diem-den-yeu-thich">Điểm Đến Yêu Thích</router-link></li>
                        <li><router-link to="/client/danh-gia-gop-y">Đánh Giá & Góp Ý</router-link></li>
                        <li><router-link to="/client/bao-cao-su-co">Báo Cáo Sự Cố</router-link></li>
                        <li><router-link to="/client/ho-so-so-thich">Hồ Sơ & Sở Thích</router-link></li>
                        <li><router-link to="/client/bao-mat-tai-khoan">Bảo Mật Tài Khoản</router-link></li>
                    </ul>
                </div>

                <!-- Column 3: Hỗ Trợ 24/7 -->
                <div class="col-lg-3 col-md-12">
                    <h6 class="footer-col-title mb-3">Trung Tâm Hỗ Trợ Khách Hàng</h6>
                    <div class="support-hotline-box p-3 rounded-3 mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="hotline-icon-circle">
                                <i class="bx bx-headphone text-danger fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Hotline Đà Nẵng 24/7</small>
                                <a href="tel:02363650111" class="fw-bold text-danger fs-5 text-decoration-none">0236 3650 111</a>
                            </div>
                        </div>
                    </div>
                    <router-link to="/client/bao-cao-su-co" class="btn btn-outline-danger btn-sm w-100 rounded-pill">
                        <i class="bx bx-error-alt me-1"></i> Báo Cáo Sự Cố & Góp Ý
                    </router-link>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="d-flex flex-wrap align-items-center justify-content-between py-3 small text-muted">
                <div>
                    © 2026 <strong>Da Nang SmartTrip AI</strong>. Tối ưu hóa hành trình du lịch thông minh.
                </div>
                <div class="d-flex align-items-center gap-3 mt-2 mt-md-0">
                    <span><i class="bx bx-shield-check text-success me-1"></i>OSRM Engine GIS</span>
                    <span class="text-secondary">·</span>
                    <span class="text-danger fw-bold">v3.5 Optimizer</span>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'FooterClient'
};
</script>

<style scoped>
.client-footer {
    background-color: #ffffff;
    border-top: 1px solid #e2e8f0;
    margin-top: auto;
    font-size: 0.82rem;
}

.footer-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
}

.footer-logo-box {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #ec4899, #db2777);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.footer-col-title {
    font-size: 0.85rem;
    font-weight: 700;
    color: #0f172a;
}

.footer-link-list li {
    margin-bottom: 8px;
}

.footer-link-list a {
    color: #64748b;
    text-decoration: none;
    transition: color 0.15s;
}

.footer-link-list a:hover {
    color: #db2777;
    text-decoration: underline;
}

.social-circle-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #f1f5f9;
    color: #475569;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.2s;
}

.social-circle-btn:hover {
    background-color: #db2777;
    color: #ffffff;
}

.support-hotline-box {
    background-color: #fdf2f8;
    border: 1px solid #fbcfe8;
}

.hotline-icon-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
