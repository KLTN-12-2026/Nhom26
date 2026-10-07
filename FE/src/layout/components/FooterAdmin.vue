<template>
    <footer class="admin-footer-dark">
        <div class="footer-inner-container">
            <div class="row g-4 py-5 border-bottom border-dark-subtle">
                <!-- Col 1: Brand Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="footer-brand-logo">
                            <i class="bx bxs-map-pin"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-white">Da Nang Smart Travel</h6>
                            <small class="text-cyan font-11 fw-semibold">Hệ Thống Lập Kế Hoạch Du Lịch Thông Minh</small>
                        </div>
                    </div>
                    <p class="text-secondary small pe-lg-3 mb-3 leading-relaxed">
                        Ứng dụng công nghệ Trí tuệ Nhân tạo và tối ưu hóa thu nhập để mang đến cho mỗi du khách một hành trình Đà Nẵng trọn vẹn, đúng ngân sách và đậm đà bản sắc.
                    </p>
                    <ul class="list-unstyled small text-secondary mb-0">
                        <li class="mb-2"><i class="bx bx-map-pin text-cyan me-2"></i>Trung tâm Khởi nghiệp Đổi mới Sáng tạo TP. Đà Nẵng</li>
                        <li class="mb-2"><i class="bx bx-phone text-cyan me-2"></i>Hotline Hỗ trợ 24/7: <strong class="text-white">1900 6868 – (0236) 3888 999</strong></li>
                        <li><i class="bx bx-envelope text-cyan me-2"></i>Email: <strong class="text-white">support@danangsmarttravel.vn</strong></li>
                    </ul>
                </div>

                <!-- Col 2: Khách Du Lịch -->
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="footer-title-col mb-3">KHÁCH DU LỊCH</h6>
                    <ul class="list-unstyled footer-dark-links small mb-0">
                        <li><router-link to="/client/lap-ke-hoach-ai">Tạo lịch trình AI tự động</router-link></li>
                        <li><router-link to="/client/tim-kiem-dia-diem">Bản đồ điểm đến Đà Nẵng</router-link></li>
                        <li><router-link to="/client/tour">Tour Bà Nà & Sơn Trà</router-link></li>
                        <li><router-link to="/client/dat-tour">Săn Voucher Khách sạn</router-link></li>
                        <li><router-link to="/client/tim-kiem-dia-diem">Cẩm nang Ẩm thực đêm</router-link></li>
                    </ul>
                </div>

                <!-- Col 3: Dành Cho Đối Tác -->
                <div class="col-lg-3 col-md-3 col-6">
                    <h6 class="footer-title-col mb-3">DÀNH CHO ĐỐI TÁC</h6>
                    <ul class="list-unstyled footer-dark-links small mb-0">
                        <li><router-link to="/doitac/dashboard">Đăng ký Nhà cung cấp Tour</router-link></li>
                        <li><router-link to="/doitac/tour-dich-vu">Cổng liên kết Khách sạn</router-link></li>
                        <li><router-link to="/doitac/dia-diem">Đối tác Nhà xe & Vận chuyển</router-link></li>
                        <li><router-link to="/doitac/thanh-toan">Chính sách hoa hồng minh bạch</router-link></li>
                        <li><router-link to="/doitac/thong-tin-cong-ty">Tài liệu API Tích hợp B2B</router-link></li>
                    </ul>
                </div>

                <!-- Col 4: Hệ Thống & Quy Chuẩn -->
                <div class="col-lg-3 col-md-12">
                    <h6 class="footer-title-col mb-3">HỆ THỐNG & QUY CHUẨN</h6>
                    <ul class="list-unstyled footer-dark-links small mb-0">
                        <li><router-link to="/admin/dashboard">Cổng Quản trị viên (Admin)</router-link></li>
                        <li><a href="javascript:;">Tài liệu Thuật toán AI</a></li>
                        <li><a href="javascript:;">Quy chế Bảo mật Dữ liệu (GDPR)</a></li>
                        <li><a href="javascript:;">Điều khoản Sử dụng Dịch vụ</a></li>
                        <li><a href="javascript:;">Chứng nhận Du lịch Xanh Đà Nẵng</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright & Server Status -->
            <div class="d-flex flex-wrap align-items-center justify-content-between py-3 small text-secondary">
                <div>
                    © 2026 Da Nang Smart Travel AI – Sở Du Lịch & Công nghệ số TP. Đà Nẵng
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 mt-2 mt-md-0">
                    <span class="text-success fw-bold d-flex align-items-center gap-1">
                        <span class="dot-online"></span> Hệ thống máy chủ vận hành 99.99%
                    </span>
                    <a href="javascript:;" class="text-secondary text-decoration-none">Chính sách bảo mật</a>
                    <a href="javascript:;" class="text-secondary text-decoration-none">Điều khoản</a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'FooterAdmin'
}
</script>

<style scoped>
.admin-footer-dark {
    background-color: #0b1329;
    color: #94a3b8;
    margin-top: auto;
    font-size: 0.82rem;
}

.footer-inner-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
}

.footer-brand-logo {
    width: 34px;
    height: 34px;
    background-color: #0284c7;
    color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
}

.text-cyan {
    color: #38bdf8 !important;
}

.footer-title-col {
    color: #ffffff;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.footer-dark-links li {
    margin-bottom: 8px;
}

.footer-dark-links a {
    color: #94a3b8;
    text-decoration: none;
    transition: color 0.15s;
}

.footer-dark-links a:hover {
    color: #38bdf8;
}

.border-dark-subtle {
    border-color: rgba(255, 255, 255, 0.1) !important;
}

.dot-online {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #22c55e;
    display: inline-block;
}
</style>
