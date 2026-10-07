<template>
    <div class="partner-dashboard-container">
        <!-- Top Welcome Banner -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card bg-white">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                KÊNH QUẢN TRỊ ĐỐI TÁC
                            </span>
                            <span class="text-muted small">/ B2B Smart Travel Partner</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Bảng Điều Khiển Tổng Quan Đối Tác</h3>
                        <p class="text-muted small mb-0">
                            Chào mừng đối tác <strong>Lotus Heritage Ltd</strong> đến với trung tâm điều hành dịch vụ du lịch.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <router-link to="/doitac/don-hang" class="btn btn-pink text-white rounded-3 px-3 py-2 fw-semibold shadow-sm">
                            <i class="bx bx-receipt me-1 font-18 align-middle"></i> Quản Lý Đơn Hàng
                        </router-link>
                        <router-link to="/doitac/tour-dich-vu" class="btn btn-outline-pink rounded-3 px-3 py-2 fw-semibold">
                            <i class="bx bx-plus me-1 font-18 align-middle"></i> Thêm Tour Mới
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4 Quick KPI Cards -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start-pink">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="small text-muted fw-bold">DOANH THU THÁNG</span>
                        <div class="kpi-icon-circle bg-pink-light text-pink"><i class="bx bx-dollar-circle"></i></div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">485.6M đ</h3>
                    <div class="small text-success fw-semibold"><i class="bx bx-trending-up"></i> +18.5% so với tháng trước</div>
                </div>
            </div>

            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start-pink">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="small text-muted fw-bold">ĐƠN ĐẶT CHỖ</span>
                        <div class="kpi-icon-circle bg-pink-light text-pink"><i class="bx bx-receipt"></i></div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">142 đơn</h3>
                    <div class="small text-danger fw-semibold"><i class="bx bx-hourglass"></i> 16 đơn cần duyệt ngay</div>
                </div>
            </div>

            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start-pink">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="small text-muted fw-bold">TỔNG TOUR ĐANG MỞ</span>
                        <div class="kpi-icon-circle bg-pink-light text-pink"><i class="bx bx-map-alt"></i></div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">8 tour</h3>
                    <div class="small text-success fw-semibold"><i class="bx bx-check"></i> 100% hoạt động tốt</div>
                </div>
            </div>

            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start-pink">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="small text-muted fw-bold">ĐÁNH GIÁ CSAT</span>
                        <div class="kpi-icon-circle bg-pink-light text-pink"><i class="bx bx-star"></i></div>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">4.85 / 5 ★</h3>
                    <div class="small text-muted">Từ 142 lượt phản hồi</div>
                </div>
            </div>
        </div>

        <!-- 10 Feature Modules Quick Access Navigation Grid -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <h5 class="fw-bold text-dark mb-3">Truy Cập Nhanh 10 Chức Năng Quản Trị Đối Tác</h5>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                <div class="col" v-for="mod in modules" :key="mod.title">
                    <router-link :to="mod.route" class="card h-100 border-0 p-3 module-quick-card text-decoration-none shadow-sm text-center">
                        <div class="module-icon-box mx-auto mb-2 text-pink bg-pink-light">
                            <i :class="mod.icon"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 font-13">{{ mod.title }}</h6>
                        <small class="text-muted font-11">{{ mod.desc }}</small>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DoiTacDashboard',
    data() {
        return {
            modules: [
                { title: 'Quản Lý Đơn Hàng', icon: 'bx bx-receipt', route: '/doitac/don-hang', desc: 'Kiểm soát vé & Check-in QR' },
                { title: 'Quản Lý Tour & Dịch Vụ', icon: 'bx bx-map-alt', route: '/doitac/tour-dich-vu', desc: 'Cập nhật lộ trình & giá bán' },
                { title: 'Quản Lý Địa Điểm', icon: 'bx bx-map-pin', route: '/doitac/dia-diem', desc: 'Khai báo điểm tham quan' },
                { title: 'Quản Lý Thanh Toán', icon: 'bx bx-credit-card', route: '/doitac/thanh-toan', desc: 'Đối soát cọc & rút tiền ví' },
                { title: 'Thống Kê Kinh Doanh', icon: 'bx bx-bar-chart-alt-2', route: '/doitac/thong-ke', desc: 'Báo cáo doanh số & lấp chỗ' },
                { title: 'Quản Lý Đánh Giá', icon: 'bx bx-star', route: '/doitac/danh-gia', desc: 'Theo dõi phản hồi & CSAT' },
                { title: 'Quản Lí Khách Hàng', icon: 'bx bx-user-pin', route: '/doitac/khach-hang', desc: 'Danh sách khách hàng LTV' },
                { title: 'Quản Lý Voucher', icon: 'bx bx-purchase-tag-alt', route: '/doitac/voucher', desc: 'Mã giảm giá & kích cầu' },
                { title: 'Thông Tin Công Ty', icon: 'bx bx-buildings', route: '/doitac/thong-tin-cong-ty', desc: 'Hồ sơ pháp nhân & ngân hàng' },
                { title: 'Tài Khoản Đối Tác', icon: 'bx bx-shield-quarter', route: '/doitac/tai-khoan', desc: 'Bảo mật 2FA & thông báo' }
            ]
        }
    }
}
</script>

<style scoped>
.bg-pink {
    background-color: #e11d48 !important;
}
.text-pink {
    color: #e11d48 !important;
}
.bg-pink-light {
    background-color: #ffe4e6 !important;
}
.border-start-pink {
    border-left: 3px solid #e11d48;
}
.btn-pink {
    background-color: #e11d48;
    border-color: #e11d48;
}
.btn-pink:hover {
    background-color: #be123c;
    border-color: #be123c;
}
.btn-outline-pink {
    border: 1px solid #fecdd3;
    color: #e11d48;
    background-color: #ffffff;
}
.btn-outline-pink:hover {
    background-color: #fff1f2;
    color: #be123c;
}
.kpi-icon-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
}
.module-quick-card {
    background: #fafafa;
    border-radius: 14px;
    transition: all 0.2s ease;
}
.module-quick-card:hover {
    background: #ffffff;
    transform: translateY(-3px);
    box-shadow: 0 6px 18px rgba(225, 29, 72, 0.1) !important;
}
.module-icon-box {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
}
</style>
