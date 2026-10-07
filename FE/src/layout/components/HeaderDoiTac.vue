<template>
    <header class="doitac-header">
        <div class="header-inner">
            <!-- Left: Toggle & Breadcrumb -->
            <div class="header-left">
                <button class="mobile-menu-toggle d-lg-none" type="button" @click="$emit('toggle-sidebar')" aria-label="Mở Menu">
                    <i class="bx bx-menu"></i>
                </button>
                <div class="header-breadcrumb">
                    <span class="portal-tag">B2B Portal</span>
                    <i class="bx bx-chevron-right breadcrumb-separator"></i>
                    <span class="current-view-title">{{ pageTitle }}</span>
                </div>
            </div>

            <!-- Center: Omnibar Search Box -->
            <div class="header-center">
                <div class="omnibar-search">
                    <i class="bx bx-search search-icon"></i>
                    <input 
                        type="text" 
                        class="search-input" 
                        placeholder="Tìm tour, booking, khách..." 
                        v-model="searchQuery"
                        @keydown.slash.prevent="focusInput"
                    />
                    <kbd class="search-shortcut">⌘K</kbd>
                </div>
            </div>

            <!-- Right: Actions & User Controls -->
            <div class="header-right">
                <!-- Status Pill -->
                <div class="live-status-pill d-none d-md-flex">
                    <span class="live-dot"></span>
                    <span class="live-text">LIVE PRODUCTION</span>
                </div>

                <!-- Notifications Dropdown -->
                <div class="dropdown">
                    <button class="icon-action-btn position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Thông báo">
                        <i class="bx bx-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end notification-panel shadow-lg border-0">
                        <div class="panel-header">
                            <h6 class="mb-0 fw-bold">Thông Báo Đơn Đặt</h6>
                            <span class="badge bg-pink text-white font-11">3 mới</span>
                        </div>
                        <div class="panel-body">
                            <a class="notif-item unread" href="javascript:;">
                                <div class="notif-icon bg-pink-light text-pink">
                                    <i class="bx bx-receipt"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">Đơn hàng mới #HD-892410</div>
                                    <div class="notif-desc">Du Thuyền Hạ Long 5 Sao 2N1Đ - 14.850.000đ</div>
                                    <div class="notif-time">5 phút trước</div>
                                </div>
                            </a>
                            <a class="notif-item unread" href="javascript:;">
                                <div class="notif-icon bg-warning-light text-warning">
                                    <i class="bx bx-time"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">Chờ duyệt thanh toán</div>
                                    <div class="notif-desc">Tour Tràng An Bái Đính 1N VIP - Chuyển khoản</div>
                                    <div class="notif-time">15 phút trước</div>
                                </div>
                            </a>
                            <a class="notif-item" href="javascript:;">
                                <div class="notif-icon bg-success-light text-success">
                                    <i class="bx bx-star"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">Đánh giá 5 sao mới</div>
                                    <div class="notif-desc">Khách hàng Lê Tuấn Kiệt vừa để lại phản hồi</div>
                                    <div class="notif-time">1 giờ trước</div>
                                </div>
                            </a>
                        </div>
                        <div class="panel-footer">
                            <router-link to="/doitac/don-hang" class="view-all-link">Xem tất cả đơn đặt</router-link>
                        </div>
                    </div>
                </div>

                <!-- Pink Quick Create Button "+ Tạo Nhanh" with dropdown -->
                <div class="dropdown">
                    <button class="btn btn-quick-create dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-plus me-1 font-18"></i>
                        <span class="d-none d-sm-inline">Tạo Nhanh</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end quick-create-menu shadow-lg border-0">
                        <li>
                            <router-link class="dropdown-item py-2" to="/doitac/tour-dich-vu">
                                <i class="bx bx-trip text-pink me-2"></i>Thêm Tour Mới
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/doitac/dia-diem">
                                <i class="bx bx-map-pin text-pink me-2"></i>Thêm Địa Điểm Mới
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/doitac/voucher">
                                <i class="bx bx-purchase-tag text-pink me-2"></i>Phát Hành Voucher
                            </router-link>
                        </li>
                    </ul>
                </div>

                <!-- Language Selector -->
                <button class="lang-selector-btn d-none d-sm-flex" type="button" title="Ngôn ngữ">
                    <i class="bx bx-globe me-1"></i> VN
                </button>

                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <a class="user-avatar-btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar-circle">
                            <span>NV</span>
                        </div>
                        <span class="online-status-dot"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 profile-menu">
                        <li class="px-3 py-2 border-bottom">
                            <div class="fw-bold text-dark">Nguyễn Văn Hùng</div>
                            <small class="text-muted">hung.lotus@wanderlust.vn</small>
                            <div class="mt-1"><span class="badge bg-pink text-white font-10">Đối Tác VIP</span></div>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/doitac/thong-tin-cong-ty">
                                <i class="bx bx-building me-2"></i>Thông tin công ty
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/doitac/tai-khoan">
                                <i class="bx bx-shield-quarter me-2"></i>Tài khoản đối tác
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/home">
                                <i class="bx bx-store me-2"></i>Xem trang khách hàng
                            </router-link>
                        </li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li>
                            <a class="dropdown-item py-2 text-danger" href="javascript:;" @click="dangXuat">
                                <i class="bx bx-log-out-circle me-2"></i>Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'HeaderDoiTac',
    data() {
        return {
            searchQuery: ''
        }
    },
    computed: {
        pageTitle() {
            const path = this.$route.path;
            if (path.includes('thong-ke')) return 'Thống Kê Kinh Doanh';
            if (path.includes('tour-dich-vu')) return 'Quản Lý Tour Và Dịch Vụ';
            if (path.includes('dia-diem')) return 'Quản Lý Địa Điểm';
            if (path.includes('don-hang')) return 'Quản Lý Đơn Hàng & Đặt Chỗ';
            if (path.includes('khach-hang')) return 'Quản Lí Khách Hàng';
            if (path.includes('danh-gia')) return 'Quản Lý Đánh Giá';
            if (path.includes('voucher')) return 'Quản Lý Voucher Đối Tác';
            if (path.includes('thanh-toan')) return 'Quản Lý Thanh Toán';
            if (path.includes('thong-tin-cong-ty')) return 'Thông Tin Công Ty';
            if (path.includes('tai-khoan')) return 'Tài Khoản Đối Tác';
            return 'Tổng Quan';
        }
    },
    methods: {
        dangXuat() {
            if (confirm('Bạn có muốn đăng xuất khỏi kênh đối tác không?')) {
                localStorage.removeItem('token_doitac');
                this.$router.push('/doitac/login');
            }
        }
    }
}
</script>

<style scoped>
.doitac-header {
    background-color: #ffffff;
    border-bottom: 1px solid #f1f5f9;
    position: sticky;
    top: 0;
    z-index: 1030;
    height: 64px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
}

.header-inner {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 24px;
    gap: 16px;
}

/* Left Area */
.header-left {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
}

.mobile-menu-toggle {
    background: none;
    border: none;
    font-size: 24px;
    color: #475569;
    cursor: pointer;
    padding: 4px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mobile-menu-toggle:hover {
    background-color: #f1f5f9;
}

.header-breadcrumb {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.85rem;
    white-space: nowrap;
}

.portal-tag {
    color: #64748b;
    font-weight: 500;
}

.breadcrumb-separator {
    color: #cbd5e1;
    font-size: 14px;
}

.current-view-title {
    color: #0f172a;
    font-weight: 700;
}

/* Center Omnibar */
.header-center {
    flex: 1 1 420px;
    max-width: 440px;
}

.omnibar-search {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}

.search-icon {
    position: absolute;
    left: 12px;
    color: #94a3b8;
    font-size: 1.15rem;
    pointer-events: none;
}

.search-input {
    width: 100%;
    height: 38px;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    padding: 0 42px 0 36px;
    font-size: 0.82rem;
    color: #1e293b;
    transition: all 0.2s ease;
}

.search-input:focus {
    background-color: #ffffff;
    border-color: #f43f5e;
    outline: none;
    box-shadow: 0 0 0 3px rgba(225, 29, 72, 0.12);
}

.search-shortcut {
    position: absolute;
    right: 12px;
    padding: 2px 6px;
    font-size: 0.65rem;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    color: #64748b;
    box-shadow: 0 1px 1px rgba(0,0,0,0.05);
}

/* Right Area */
.header-right {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
}

/* Status Pill */
.live-status-pill {
    display: flex;
    align-items: center;
    gap: 6px;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    padding: 5px 10px;
    border-radius: 999px;
}

.live-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #22c55e;
    box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.2);
}

.live-text {
    font-size: 0.68rem;
    font-weight: 800;
    color: #166534;
    letter-spacing: 0.4px;
}

/* Icon Buttons */
.icon-action-btn {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 1.2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
}

.icon-action-btn:hover {
    background-color: #fff1f2;
    border-color: #fecdd3;
    color: #e11d48;
}

.notification-badge {
    position: absolute;
    top: -2px;
    right: -2px;
    background: #e11d48;
    color: #ffffff;
    font-size: 0.65rem;
    font-weight: 700;
    min-width: 17px;
    height: 17px;
    line-height: 17px;
    border-radius: 999px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(225, 29, 72, 0.3);
}

/* Pink Quick Create Button */
.btn-quick-create {
    background: linear-gradient(135deg, #e11d48 0%, #f43f5e 100%);
    border: none;
    color: #ffffff !important;
    font-size: 0.82rem;
    font-weight: 700;
    padding: 8px 16px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.28);
    transition: all 0.2s ease;
}

.btn-quick-create:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(225, 29, 72, 0.38);
}

.btn-quick-create:active {
    transform: translateY(0);
}

/* Language selector */
.lang-selector-btn {
    background: transparent;
    border: 1px solid #e2e8f0;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 0.78rem;
    font-weight: 600;
    color: #475569;
    cursor: pointer;
    display: flex;
    align-items: center;
    transition: all 0.2s;
}

.lang-selector-btn:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

/* User Avatar */
.user-avatar-btn {
    position: relative;
    display: block;
    text-decoration: none;
}

.avatar-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #e11d48 0%, #fb7185 100%);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.82rem;
    box-shadow: 0 2px 8px rgba(225, 29, 72, 0.2);
}

.online-status-dot {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: #22c55e;
    border: 2px solid #ffffff;
}

/* Notification panel styling */
.notification-panel {
    width: 320px;
    padding: 0;
    border-radius: 12px;
    overflow: hidden;
    margin-top: 8px !important;
}

.panel-header {
    padding: 12px 16px;
    background: #fafafa;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.panel-body {
    max-height: 280px;
    overflow-y: auto;
}

.notif-item {
    display: flex;
    padding: 12px 16px;
    gap: 12px;
    border-bottom: 1px solid #f8fafc;
    text-decoration: none;
    color: inherit;
    transition: background 0.15s;
}

.notif-item:hover {
    background: #fff1f2;
}

.notif-icon {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.notif-title {
    font-size: 0.8rem;
    font-weight: 700;
    color: #1e293b;
}

.notif-desc {
    font-size: 0.73rem;
    color: #64748b;
    margin-top: 2px;
}

.notif-time {
    font-size: 0.68rem;
    color: #94a3b8;
    margin-top: 4px;
}

.panel-footer {
    padding: 10px;
    text-align: center;
    background: #fafafa;
    border-top: 1px solid #f1f5f9;
}

.view-all-link {
    font-size: 0.78rem;
    font-weight: 600;
    color: #e11d48;
    text-decoration: none;
}

.view-all-link:hover {
    text-decoration: underline;
}

.text-pink {
    color: #e11d48 !important;
}

.bg-pink {
    background-color: #e11d48 !important;
}

.bg-pink-light {
    background-color: #ffe4e6 !important;
}

.bg-warning-light {
    background-color: #fef3c7 !important;
}

.bg-success-light {
    background-color: #dcfce7 !important;
}

@media (max-width: 767.98px) {
    .header-inner {
        padding: 0 14px;
    }
    .header-center {
        display: none;
    }
}
</style>
