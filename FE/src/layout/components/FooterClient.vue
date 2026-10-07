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
                            <h6 class="mb-0 fw-bold text-dark">Đà Nẵng Smart Travel AI</h6>
                            <small class="text-primary fw-semibold">Hệ thống Lập Kế hoạch & Tour Thông Minh</small>
                        </div>
                    </div>
                    <p class="text-muted small mt-2 mb-3 pe-lg-4">
                        Nền tảng ứng dụng công nghệ trí tuệ nhân tạo (AI) giúp tối ưu hóa thời gian, ngân sách và lịch trình du lịch khám phá trọn vẹn thành phố Đà Nẵng & miền Trung.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="javascript:;" class="social-circle-btn" title="Facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="javascript:;" class="social-circle-btn" title="Instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="javascript:;" class="social-circle-btn" title="TikTok"><i class="bx bxl-tiktok"></i></a>
                        <a href="javascript:;" class="social-circle-btn" title="YouTube"><i class="bx bxl-youtube"></i></a>
                    </div>
                </div>

                <!-- Column 1: Lập Kế Hoạch & Tour -->
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="footer-col-title mb-3">Lộ Trình & Tour</h6>
                    <ul class="list-unstyled footer-link-list mb-0 small">
                        <li><router-link to="/client/lap-ke-hoach-ai">Lập kế hoạch AI</router-link></li>
                        <li><router-link to="/client/ke-hoach">Quản lý kế hoạch</router-link></li>
                        <li><router-link to="/client/nhom-du-lich">Quản lý nhóm du lịch</router-link></li>
                        <li><router-link to="/client/hoat-dong">Quản lý hoạt động</router-link></li>
                        <li><router-link to="/client/tour">Xem tour & lịch khởi hành</router-link></li>
                        <li><router-link to="/client/dat-tour">Đặt tour & thanh toán</router-link></li>
                    </ul>
                </div>

                <!-- Column 2: Khám Phá & Tiện Ích -->
                <div class="col-lg-3 col-md-3 col-6">
                    <h6 class="footer-col-title mb-3">Khám Phá & Cá Nhân</h6>
                    <ul class="list-unstyled footer-link-list mb-0 small">
                        <li><router-link to="/client/tim-kiem-dia-diem">Tìm kiếm & lọc địa điểm</router-link></li>
                        <li><router-link to="/client/chi-tiet-dia-diem">Xem chi tiết địa điểm</router-link></li>
                        <li><router-link to="/client/yeu-thich">Địa điểm yêu thích</router-link></li>
                        <li><router-link to="/client/lich-su">Lịch sử du lịch</router-link></li>
                        <li><router-link to="/client/danh-gia">Đánh giá & phản hồi</router-link></li>
                        <li><router-link to="/client/profile">Tài khoản khách hàng</router-link></li>
                    </ul>
                </div>

                <!-- Column 3: Hỗ Trợ 24/7 -->
                <div class="col-lg-3 col-md-12">
                    <h6 class="footer-col-title mb-3">Hỗ Trợ & Khiếu Nại</h6>
                    <div class="support-hotline-box p-3 rounded-3 mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="hotline-icon-circle">
                                <i class="bx bx-headphone text-primary fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Hotline tư vấn du khách 24/7</small>
                                <a href="tel:19006868" class="fw-bold text-primary fs-5 text-decoration-none">1900 6868</a>
                            </div>
                        </div>
                    </div>
                    <router-link to="/client/bao-cao-loi" class="btn btn-outline-danger btn-sm w-100 rounded-3">
                        <i class="bx bx-bug me-1"></i> Gửi Báo Cáo Lỗi & Góp Ý
                    </router-link>
                </div>
            </div>

            <!-- Bottom Copyright & SSL Badge -->
            <div class="d-flex flex-wrap align-items-center justify-content-between py-3 small text-muted">
                <div>
                    © 2026 <strong>Đà Nẵng Smart Travel Planner Ecosystem</strong>. Bản quyền thuộc về Smart Travel AI.
                </div>
                <div class="d-flex align-items-center gap-3 mt-2 mt-md-0">
                    <span><i class="bx bx-shield-check text-success me-1"></i>Bảo mật SSL 256-bit</span>
                    <span class="text-secondary">·</span>
                    <span class="text-primary fw-bold">v3.2.0-client</span>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'FooterClient'
}
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
    background-color: #0284c7;
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
    color: #0284c7;
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
    background-color: #0284c7;
    color: #ffffff;
}

.support-hotline-box {
    background-color: #f0f9ff;
    border: 1px solid #bae6fd;
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
