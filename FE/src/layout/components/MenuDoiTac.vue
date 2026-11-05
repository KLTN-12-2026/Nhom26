<template>
    <aside class="doitac-sidebar" :class="{ 'sidebar-mobile-open': isOpen }">
        <!-- 1. Header Brand: SmartTrip AI PARTNER PORTAL -->
        <div class="sidebar-header">
            <div class="brand-wrapper">
                <div class="brand-logo-icon">
                    <svg viewBox="0 0 40 40" fill="none" class="brand-svg">
                        <circle cx="20" cy="20" r="18" fill="url(#brandGrad)" />
                        <path d="M20 10C15 15.5 12 18 12 22C12 26.418 15.582 30 20 30C24.418 30 28 26.418 28 22C28 18 25 15.5 20 10Z" fill="#FFFFFF" opacity="0.95" />
                        <circle cx="20" cy="22" r="3.5" fill="#E11D48" />
                        <defs>
                            <linearGradient id="brandGrad" x1="4" y1="4" x2="36" y2="36" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#E11D48" />
                                <stop offset="1" stop-color="#BE123C" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="brand-info">
                    <h2 class="brand-title">SmartTrip <span class="brand-ai">AI</span></h2>
                    <span class="brand-subtitle">PARTNER PORTAL</span>
                </div>
            </div>

            <!-- Close button for mobile screens -->
            <button class="mobile-close-btn d-lg-none" @click="closeSidebar" type="button" aria-label="Đóng menu">
                <i class="bx bx-x"></i>
            </button>
        </div>

        <!-- 2. Scrollable Navigation Menu -->
        <div class="sidebar-scrollable">
            <nav class="sidebar-menu">
                <!-- Group 1: TỔNG QUAN -->
                <div class="menu-section-header">TỔNG QUAN</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/doitac/thong-ke" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-line-chart"></i></span>
                            <span class="menu-text">Thống Kê Kinh Doanh</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 2: SẢN PHẨM & DỊCH VỤ -->
                <div class="menu-section-header">SẢN PHẨM & DỊCH VỤ</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/doitac/tour-du-lich" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-flag"></i></span>
                            <span class="menu-text">Quản Lý Tour Du Lịch</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/tuyen-diem-tap-trung" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-git-branch"></i></span>
                            <span class="menu-text">Tuyến & Điểm Tập Trung</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/lich-khoi-hanh" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-calendar"></i></span>
                            <span class="menu-text">Lịch Khởi Hành & Chỗ Trống</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/de-xuat-dia-diem" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-map-pin"></i></span>
                            <span class="menu-text">Đề Xuất Địa Điểm (POI)</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 3: VẬN HÀNH & KHÁCH HÀNG -->
                <div class="menu-section-header">VẬN HÀNH & KHÁCH HÀNG</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/doitac/xu-ly-dat-tour" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-receipt"></i></span>
                            <span class="menu-text">Xử Lý Đặt Tour</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/khach-hang" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-group"></i></span>
                            <span class="menu-text">Khách Hàng (CRM)</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/voucher" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-purchase-tag-alt"></i></span>
                            <span class="menu-text">Voucher & Khuyến Mãi</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/danh-gia" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-message-square-detail"></i></span>
                            <span class="menu-text">Đánh Giá & Nhận Xét</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 4: DOANH NGHIỆP -->
                <div class="menu-section-header">DOANH NGHIỆP</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/doitac/ho-so-doanh-nghiep" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-buildings"></i></span>
                            <span class="menu-text">Hồ Sơ Doanh Nghiệp</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/tai-khoan" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-shield-quarter"></i></span>
                            <span class="menu-text">Tài Khoản & Bảo Mật</span>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- 3. Bottom Support & Quick Logout Card -->
        <div class="sidebar-footer">
            <div class="support-card">
                <div class="support-content">
                    <div class="support-icon">
                        <i class="bx bx-headphone"></i>
                    </div>
                    <div class="support-info">
                        <span class="support-label">Hỗ trợ đối tác</span>
                        <a href="tel:19008888" class="support-phone">1900 8888 ĐN</a>
                    </div>
                </div>
                <button class="support-logout-btn" @click="handleLogout" title="Đăng xuất">
                    <i class="bx bx-log-out-circle"></i>
                </button>
            </div>
        </div>
    </aside>
</template>

<script>
export default {
    name: 'MenuDoiTac',
    props: {
        isOpen: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        closeSidebar() {
            this.$emit('close');
        },
        handleItemClick() {
            if (window.innerWidth < 992) {
                this.closeSidebar();
            }
        },
        handleLogout() {
            if (confirm('Bạn có chắc chắn muốn đăng xuất tài khoản đối tác?')) {
                localStorage.removeItem('xs');
                localStorage.removeItem('token_doitac');
                this.$router.push('/doitac/login');
            }
        }
    }
}
</script>

<style scoped>
/* Main Sidebar Shell */
.doitac-sidebar {
    width: 260px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    background-color: #ffffff;
    border-right: 1px solid #f1f5f9;
    box-shadow: 2px 0 12px rgba(0, 0, 0, 0.03);
    display: flex;
    flex-direction: column;
    z-index: 1040;
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    font-family: inherit;
}

/* Header Brand */
.sidebar-header {
    padding: 20px 18px 16px;
    border-bottom: 1px solid #f8fafc;
    flex-shrink: 0;
    position: relative;
}

.brand-wrapper {
    display: flex;
    align-items: center;
    gap: 12px;
}

.brand-logo-icon {
    width: 36px;
    height: 36px;
    flex-shrink: 0;
}

.brand-svg {
    width: 100%;
    height: 100%;
    filter: drop-shadow(0 2px 6px rgba(225, 29, 72, 0.28));
}

.brand-info {
    display: flex;
    flex-direction: column;
}

.brand-title {
    font-size: 1.12rem;
    font-weight: 800;
    color: #1e293b;
    line-height: 1.15;
    letter-spacing: -0.3px;
    margin: 0;
}

.brand-ai {
    color: #e11d48;
}

.brand-subtitle {
    font-size: 0.62rem;
    font-weight: 700;
    color: #e11d48;
    letter-spacing: 1.2px;
    line-height: 1;
    margin-top: 3px;
    text-transform: uppercase;
}

/* Mobile Close */
.mobile-close-btn {
    position: absolute;
    top: 18px;
    right: 14px;
    background: none;
    border: none;
    font-size: 22px;
    color: #64748b;
    cursor: pointer;
    padding: 2px;
}

/* Scrollable Menu */
.sidebar-scrollable {
    flex: 1 1 auto;
    overflow-y: auto;
    overflow-x: hidden;
    padding: 14px 12px;
}

.sidebar-scrollable::-webkit-scrollbar {
    width: 4px;
}

.sidebar-scrollable::-webkit-scrollbar-thumb {
    background-color: #f1f5f9;
    border-radius: 4px;
}

/* Section Header */
.menu-section-header {
    font-size: 0.66rem;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    padding: 14px 10px 6px;
}

.menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-item {
    margin-bottom: 2px;
}

/* Menu Link */
.menu-link {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    color: #475569;
    text-decoration: none;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 500;
    transition: all 0.15s ease;
    position: relative;
}

.menu-link:hover {
    background-color: #fff1f2;
    color: #e11d48;
}

.menu-link:hover .menu-icon {
    color: #e11d48;
}

/* Active Link - Match screenshot with clean pink highlight */
.menu-link.active {
    background-color: #fff1f2;
    color: #e11d48;
    font-weight: 700;
}

.menu-icon {
    font-size: 1.15rem;
    width: 22px;
    margin-right: 10px;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.15s;
}

.menu-link.active .menu-icon {
    color: #e11d48;
}

.menu-text {
    flex: 1 1 auto;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Sidebar Footer: Hotline Card & Logout */
.sidebar-footer {
    padding: 14px;
    border-top: 1px solid #f8fafc;
    background: #ffffff;
    flex-shrink: 0;
}

.support-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 12px;
    background-color: #faf7fd;
    border: 1px solid #f0eafb;
    border-radius: 10px;
}

.support-content {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
}

.support-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #eeddfa;
    color: #9333ea;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.support-info {
    display: flex;
    flex-direction: column;
}

.support-label {
    font-size: 0.68rem;
    color: #64748b;
    line-height: 1.2;
}

.support-phone {
    font-size: 0.78rem;
    font-weight: 700;
    color: #2563eb;
    text-decoration: none;
    line-height: 1.2;
}

.support-phone:hover {
    text-decoration: underline;
}

.support-logout-btn {
    background: none;
    border: none;
    color: #64748b;
    font-size: 1.25rem;
    cursor: pointer;
    padding: 4px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.support-logout-btn:hover {
    color: #e11d48;
    background: #ffe4e6;
}

/* Mobile drawer behavior */
@media (max-width: 991.98px) {
    .doitac-sidebar {
        transform: translateX(-100%);
    }

    .doitac-sidebar.sidebar-mobile-open {
        transform: translateX(0);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    }
}
</style>
