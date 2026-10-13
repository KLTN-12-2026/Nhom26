<template>
    <aside class="doitac-sidebar" :class="{ 'sidebar-mobile-open': isOpen }">
        <!-- 1. Header Brand & Partner Badge -->
        <div class="sidebar-header">
            <div class="brand-wrapper">
                <div class="brand-logo-icon">
                    <!-- Pink/Rose floral travel logo SVG -->
                    <svg viewBox="0 0 32 32" fill="none" class="brand-svg">
                        <circle cx="16" cy="16" r="14" fill="#FFE4E6" />
                        <path d="M16 6C13 11 9 13 9 17C9 20.866 12.134 24 16 24C19.866 24 23 20.866 23 17C23 13 19 11 16 6Z" fill="#E11D48" />
                        <circle cx="16" cy="17" r="3.5" fill="#FFF" />
                    </svg>
                </div>
                <div class="brand-info">
                    <h2 class="brand-title" title="Đà Nẵng Smart Travel">Đà Nẵng Smart Travel</h2>
                    <span class="brand-subtitle" title="Hệ thống hỗ trợ lập kế hoạch du lịch cá nhân hóa tại Đà Nẵng">CỔNG ĐỐI TÁC B2B</span>
                </div>
            </div>

            <!-- Partner status pill -->
            <div class="partner-meta-pill">
                <span class="partner-name">Lotus Heritage Ltd</span>
                <span class="partner-tier-badge">Tier 1 Elite</span>
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
                            <span class="menu-icon"><i class="bx bx-bar-chart-alt-2"></i></span>
                            <span class="menu-text">Thống Kê Kinh Doanh</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 2: QUẢN LÝ SẢN PHẨM & DỊCH VỤ -->
                <div class="menu-section-header">QUẢN LÝ SẢN PHẨM & DỊCH VỤ</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/doitac/tour-dich-vu" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-map-alt"></i></span>
                            <span class="menu-text">Quản Lý Tour Và Dịch Vụ</span>
                            <span class="menu-badge badge-count">8</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/dia-diem" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-map-pin"></i></span>
                            <span class="menu-text">Quản Lý Địa Điểm</span>
                            <span class="menu-badge badge-count">12</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 3: VẬN HÀNH & KHÁCH HÀNG -->
                <div class="menu-section-header">VẬN HÀNH & KHÁCH HÀNG</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/doitac/don-hang" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-receipt"></i></span>
                            <span class="menu-text">Quản Lý Đơn Hàng</span>
                            <span class="menu-badge badge-highlight">16 mới</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/khach-hang" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-user-pin"></i></span>
                            <span class="menu-text">Quản Lí Khách Hàng</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/danh-gia" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-star"></i></span>
                            <span class="menu-text">Quản Lý Đánh Giá</span>
                            <span class="menu-badge badge-count">3</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/voucher" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-purchase-tag-alt"></i></span>
                            <span class="menu-text">Quản Lý Voucher Đối Tác</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/thanh-toan" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-credit-card"></i></span>
                            <span class="menu-text">Quản Lý Thanh Toán</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 4: THIẾT LẬP DOANH NGHIỆP -->
                <div class="menu-section-header">THIẾT LẬP DOANH NGHIỆP</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/doitac/thong-tin-cong-ty" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-buildings"></i></span>
                            <span class="menu-text">Thông Tin Công Ty</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/doitac/tai-khoan" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-shield-quarter"></i></span>
                            <span class="menu-text">Tài Khoản Đối Tác</span>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- 3. Bottom Footer Widgets -->
        <div class="sidebar-footer">
            <!-- Environment switcher -->
            <div class="env-toggle-card">
                <span class="env-label">
                    <i class="bx bx-laptop me-1"></i> Môi trường
                </span>
                <div class="env-switch-group">
                    <button type="button" class="env-btn" :class="{ 'active': envMode === 'test' }" @click="envMode = 'test'">
                        Test
                    </button>
                    <button type="button" class="env-btn env-btn-live" :class="{ 'active': envMode === 'live' }" @click="envMode = 'live'">
                        <span class="dot-indicator"></span> Live
                    </button>
                </div>
            </div>

            <!-- Partner user account pill -->
            <div class="partner-user-box">
                <div class="partner-avatar">
                    <span>NV</span>
                </div>
                <div class="partner-user-details">
                    <div class="partner-user-name">Nguyễn Văn Hùng</div>
                    <div class="partner-user-role">Owner</div>
                </div>
                <button type="button" class="logout-btn" title="Đăng xuất" @click="handleLogout">
                    <i class="bx bx-log-out"></i>
                </button>
            </div>

            <!-- Hotline 24/7 -->
            <div class="hotline-box">
                <span class="hotline-label">Hotline 24/7:</span>
                <a href="tel:19006889" class="hotline-phone">1900 6889</a>
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
    data() {
        return {
            envMode: 'live'
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
            if (confirm('Bạn có chắc chắn muốn đăng xuất khỏi kênh đối tác?')) {
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
    box-shadow: 2px 0 16px rgba(225, 29, 72, 0.04);
    display: flex;
    flex-direction: column;
    z-index: 1040;
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    font-family: inherit;
}

/* Header Brand */
.sidebar-header {
    padding: 18px 16px 14px;
    border-bottom: 1px solid #f8fafc;
    flex-shrink: 0;
    position: relative;
}

.brand-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}

.brand-logo-icon {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
}

.brand-svg {
    width: 100%;
    height: 100%;
    filter: drop-shadow(0 2px 6px rgba(225, 29, 72, 0.25));
}

.brand-info {
    display: flex;
    flex-direction: column;
}

.brand-title {
    font-size: 1.05rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.2;
    letter-spacing: -0.3px;
    margin: 0;
}

.brand-subtitle {
    font-size: 0.65rem;
    font-weight: 700;
    color: #e11d48;
    letter-spacing: 0.8px;
    line-height: 1;
    margin-top: 2px;
}

/* Partner Meta Pill */
.partner-meta-pill {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff1f2;
    border: 1px solid #ffe4e6;
    padding: 5px 10px;
    border-radius: 8px;
    font-size: 0.75rem;
}

.partner-name {
    color: #475569;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 130px;
}

.partner-tier-badge {
    background: #064e3b;
    color: #a7f3d0;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 999px;
    letter-spacing: 0.2px;
}

/* Mobile Close */
.mobile-close-btn {
    position: absolute;
    top: 16px;
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
    padding: 12px 10px;
}

.sidebar-scrollable::-webkit-scrollbar {
    width: 4px;
}

.sidebar-scrollable::-webkit-scrollbar-thumb {
    background-color: #fecdd3;
    border-radius: 4px;
}

/* Section Header */
.menu-section-header {
    font-size: 0.68rem;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    padding: 12px 10px 6px;
}

.menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-item {
    margin-bottom: 3px;
}

/* Menu Link */
.menu-link {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    color: #334155;
    text-decoration: none;
    border-radius: 9px;
    font-size: 0.84rem;
    font-weight: 500;
    transition: all 0.2s ease;
    position: relative;
}

.menu-link:hover {
    background-color: #fff1f2;
    color: #e11d48;
}

.menu-link:hover .menu-icon {
    color: #e11d48;
}

/* Active Link - Pink Theme Signature */
.menu-link.active {
    background: linear-gradient(90deg, #fff1f2 0%, #ffe4e6 100%);
    color: #e11d48;
    font-weight: 700;
    box-shadow: 0 2px 8px rgba(225, 29, 72, 0.08);
}

.menu-link.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 6px;
    bottom: 6px;
    width: 3.5px;
    background: #e11d48;
    border-radius: 0 4px 4px 0;
}

.menu-icon {
    font-size: 1.15rem;
    width: 24px;
    margin-right: 10px;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s;
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

/* Badges */
.menu-badge {
    font-size: 0.7rem;
    font-weight: 600;
    padding: 2px 7px;
    border-radius: 999px;
    line-height: 1.2;
}

.badge-count {
    background: #eff6ff;
    color: #2563eb;
}

.badge-highlight {
    background: #ffe4e6;
    color: #e11d48;
    border: 1px solid #fecdd3;
    font-weight: 700;
}

/* Sidebar Footer */
.sidebar-footer {
    padding: 12px 14px 14px;
    border-top: 1px solid #f1f5f9;
    background: #fafafa;
    flex-shrink: 0;
}

/* Environment switcher */
.env-toggle-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
    padding: 4px 8px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
}

.env-label {
    font-size: 0.74rem;
    font-weight: 600;
    color: #64748b;
    display: flex;
    align-items: center;
}

.env-switch-group {
    display: flex;
    gap: 3px;
    background: #f1f5f9;
    padding: 2px;
    border-radius: 6px;
}

.env-btn {
    border: none;
    background: transparent;
    font-size: 0.7rem;
    padding: 2px 8px;
    border-radius: 4px;
    color: #64748b;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.15s ease;
}

.env-btn.active {
    background: #ffffff;
    color: #0f172a;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06);
}

.env-btn-live.active {
    background: #0f172a;
    color: #ffffff;
}

.dot-indicator {
    display: inline-block;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #22c55e;
    margin-right: 3px;
}

/* User Box */
.partner-user-box {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 10px;
    background: #ffffff;
    border: 1px solid #f1f5f9;
    border-radius: 9px;
    margin-bottom: 10px;
}

.partner-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #e11d48 0%, #fb7185 100%);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.78rem;
    flex-shrink: 0;
}

.partner-user-details {
    flex: 1 1 auto;
    min-width: 0;
}

.partner-user-name {
    font-size: 0.8rem;
    font-weight: 700;
    color: #1e293b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.partner-user-role {
    font-size: 0.68rem;
    color: #64748b;
}

.logout-btn {
    background: none;
    border: none;
    color: #94a3b8;
    font-size: 1.15rem;
    cursor: pointer;
    padding: 4px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.logout-btn:hover {
    color: #e11d48;
    background: #ffe4e6;
}

/* Hotline */
.hotline-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.72rem;
    padding: 0 4px;
}

.hotline-label {
    color: #94a3b8;
    font-weight: 500;
}

.hotline-phone {
    color: #e11d48;
    font-weight: 800;
    text-decoration: none;
}

.hotline-phone:hover {
    text-decoration: underline;
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