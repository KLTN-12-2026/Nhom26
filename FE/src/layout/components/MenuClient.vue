<template>
    <aside class="client-sidebar" :class="{ 'sidebar-mobile-open': isOpen }">
        <!-- 1. Top Brand Logo (Giống y hệt hình: Da Nang SmartTrip AI / ĐÀ NẴNG TRIP OPTIMIZER) -->
        <div class="sidebar-header">
            <router-link to="/client/ai-travel-planner" class="brand-wrapper" @click="handleItemClick">
                <div class="brand-sparkle-icon">
                    <svg viewBox="0 0 24 24" fill="none" class="sparkle-svg">
                        <circle cx="12" cy="12" r="10" fill="url(#pinkGrad)" />
                        <!-- 8-point AI sparkle star -->
                        <path d="M12 5V19M5 12H19M7.05 7.05L16.95 16.95M7.05 16.95L16.95 7.05" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
                        <defs>
                            <linearGradient id="pinkGrad" x1="2" y1="2" x2="22" y2="22" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#ec4899" />
                                <stop offset="1" stop-color="#be185d" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="brand-info">
                    <h2 class="brand-title">Da Nang SmartTrip AI</h2>
                    <span class="brand-subtitle">ĐÀ NẴNG TRIP OPTIMIZER</span>
                </div>
            </router-link>

            <!-- Close icon on mobile -->
            <button class="mobile-close-btn d-lg-none" @click="closeSidebar" type="button" aria-label="Đóng menu">
                <i class="bx bx-x"></i>
            </button>
        </div>

        <!-- 2. Scrollable Navigation Menu (4 nhóm chức năng giống y hệt hình) -->
        <div class="sidebar-scrollable">
            <nav class="sidebar-menu">
                <!-- NHÓM 1: KHÁM PHÁ & BẢN ĐỒ -->
                <div class="menu-section">
                    <div class="section-label">KHÁM PHÁ & BẢN ĐỒ</div>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <router-link to="/client/kham-pha-dia-diem" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-compass"></i></span>
                                <span class="menu-text">Khám Phá Địa Điểm OSM</span>
                            </router-link>
                        </li>
                        <li class="menu-item">
                            <router-link to="/client/ban-do-tuong-tac" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-map-alt"></i></span>
                                <span class="menu-text">Bản Đồ Tương Tác OSM</span>
                            </router-link>
                        </li>
                        <li class="menu-item">
                            <router-link to="/client/danh-muc-tour" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-layer"></i></span>
                                <span class="menu-text">Danh Mục Tour & So Sánh</span>
                            </router-link>
                        </li>
                    </ul>
                </div>

                <!-- NHÓM 2: LẬP KẾ HOẠCH AI (CÓ BADGE TRỌNG TÂM) -->
                <div class="menu-section">
                    <div class="section-label d-flex align-items-center justify-content-between">
                        <span>LẬP KẾ HOẠCH AI</span>
                        <span class="badge-trong-tam">TRỌNG TÂM</span>
                    </div>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <router-link to="/client/ai-travel-planner" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-bot"></i></span>
                                <span class="menu-text">AI Travel Planner</span>
                            </router-link>
                        </li>
                        <li class="menu-item">
                            <router-link to="/client/lich-trinh-toi-uu" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-directions"></i></span>
                                <span class="menu-text">Lịch Trình Tối Ưu</span>
                            </router-link>
                        </li>
                        <li class="menu-item">
                            <router-link to="/client/lich-su-ke-hoach" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-history"></i></span>
                                <span class="menu-text">Lịch Sử Kế Hoạch</span>
                            </router-link>
                        </li>
                    </ul>
                </div>

                <!-- NHÓM 3: TRẢI NGHIỆM & GIAO DỊCH -->
                <div class="menu-section">
                    <div class="section-label">TRẢI NGHIỆM & GIAO DỊCH</div>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <router-link to="/client/don-dat-thanh-toan" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-receipt"></i></span>
                                <span class="menu-text">Đơn Đặt & Thanh Toán</span>
                            </router-link>
                        </li>
                        <li class="menu-item">
                            <router-link to="/client/diem-den-yeu-thich" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-heart"></i></span>
                                <span class="menu-text">Điểm Đến Yêu Thích</span>
                            </router-link>
                        </li>
                        <li class="menu-item">
                            <router-link to="/client/danh-gia-gop-y" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-star"></i></span>
                                <span class="menu-text">Đánh Giá & Góp Ý</span>
                            </router-link>
                        </li>
                        <li class="menu-item">
                            <router-link to="/client/bao-cao-su-co" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-error-alt"></i></span>
                                <span class="menu-text">Báo Cáo Sự Cố</span>
                            </router-link>
                        </li>
                    </ul>
                </div>

                <!-- NHÓM 4: CÁ NHÂN -->
                <div class="menu-section mb-2">
                    <div class="section-label">CÁ NHÂN</div>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <router-link to="/client/ho-so-so-thich" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-user-pin"></i></span>
                                <span class="menu-text">Hồ Sơ & Sở Thích</span>
                            </router-link>
                        </li>
                        <li class="menu-item">
                            <router-link to="/client/bao-mat-tai-khoan" class="menu-link" active-class="active" @click="handleItemClick">
                                <span class="menu-icon"><i class="bx bx-shield-quarter"></i></span>
                                <span class="menu-text">Bảo Mật Tài Khoản</span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- 3. Bottom User Footer Card & Hotline (Giống y hệt hình: avatar hồng, Trần Minh Anh, VIP Explorer ♦, Hotline ĐN) -->
        <div class="sidebar-user-footer">
            <div class="user-card-wrapper">
                <div class="user-avatar-pink">
                    <i class="bx bx-user"></i>
                </div>
                <div class="user-meta-info">
                    <div class="user-display-name">Trần Minh Anh</div>
                    <div class="user-sub-badge">VIP Explorer ♦</div>
                </div>
                <button type="button" class="btn-logout-sidebar" title="Đăng xuất" @click="handleLogout">
                    <i class="bx bx-log-out"></i>
                </button>
            </div>

            <!-- Hotline Bar -->
            <div class="hotline-bar">
                <div class="d-flex align-items-center gap-1">
                    <i class="bx bx-phone-call text-primary font-14"></i>
                    <span class="hotline-title">Hotline ĐN:</span>
                </div>
                <a href="tel:02363650111" class="hotline-number">0236 3650 111</a>
            </div>
        </div>
    </aside>
</template>

<script>
export default {
    name: 'MenuClient',
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
            if (confirm('Bạn có chắc chắn muốn đăng xuất khỏi tài khoản khách hàng?')) {
                localStorage.removeItem('xs');
                localStorage.removeItem('token_client');
                localStorage.removeItem('nguoi_dung_token');
                localStorage.removeItem('nguoi_dung');
                this.$router.push('/login');
            }
        }
    }
};
</script>

<style scoped>
/* Main Sidebar Shell */
.client-sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    background-color: #ffffff;
    border-right: 1px solid #e2e8f0;
    display: flex;
    flex-direction: column;
    z-index: 1040;
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    font-family: inherit;
    box-shadow: 1px 0 10px rgba(0, 0, 0, 0.02);
}

/* Header Brand */
.sidebar-header {
    padding: 16px 16px 14px;
    border-bottom: 1px solid #f1f5f9;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.brand-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    min-width: 0;
}

.brand-sparkle-icon {
    width: 32px;
    height: 32px;
    flex-shrink: 0;
}

.sparkle-svg {
    width: 100%;
    height: 100%;
    display: block;
}

.brand-info {
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.brand-title {
    font-size: 0.88rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.25;
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.brand-subtitle {
    font-size: 0.62rem;
    font-weight: 700;
    color: #db2777;
    margin-top: 2px;
    line-height: 1.1;
    letter-spacing: 0.6px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.mobile-close-btn {
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
    background-color: #cbd5e1;
    border-radius: 4px;
}

/* Section Header */
.menu-section {
    margin-bottom: 14px;
}

.section-label {
    font-size: 0.68rem;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: 0.6px;
    padding: 4px 10px 6px;
}

.badge-trong-tam {
    font-size: 0.58rem;
    font-weight: 700;
    background-color: #fdf2f8;
    color: #db2777;
    border: 1px solid #fbcfe8;
    padding: 1px 6px;
    border-radius: 999px;
    line-height: 1.2;
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
    padding: 8px 10px;
    color: #334155;
    text-decoration: none;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 500;
    transition: all 0.15s ease;
    cursor: pointer;
    user-select: none;
}

.menu-link:hover {
    background-color: #f8fafc;
    color: #db2777;
}

.menu-link:hover .menu-icon {
    color: #db2777;
}

/* Active Link State */
.menu-link.active,
.menu-link.router-link-active {
    background-color: #fdf2f8 !important;
    color: #be185d !important;
    font-weight: 600;
}

.menu-link.active .menu-icon,
.menu-link.router-link-active .menu-icon {
    color: #be185d !important;
}

.menu-icon {
    font-size: 1.15rem;
    width: 22px;
    margin-right: 9px;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.15s;
}

.menu-text {
    flex: 1 1 auto;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* 3. Bottom User Card & Hotline */
.sidebar-user-footer {
    padding: 12px;
    border-top: 1px solid #f1f5f9;
    background: #ffffff;
    flex-shrink: 0;
}

.user-card-wrapper {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 7px 9px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    margin-bottom: 8px;
}

.user-avatar-pink {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ec4899, #db2777);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.user-meta-info {
    flex: 1 1 auto;
    min-width: 0;
}

.user-display-name {
    font-size: 0.8rem;
    font-weight: 700;
    color: #0f172a;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 1.2;
}

.user-sub-badge {
    font-size: 0.65rem;
    font-weight: 600;
    color: #8b5cf6;
    line-height: 1.1;
    margin-top: 1px;
}

.btn-logout-sidebar {
    background: none;
    border: none;
    color: #94a3b8;
    font-size: 1.15rem;
    cursor: pointer;
    padding: 3px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.15s;
}

.btn-logout-sidebar:hover {
    color: #ef4444;
    background: #fee2e2;
}

/* Hotline Bar */
.hotline-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 4px 6px;
    background: #f8fafc;
    border-radius: 6px;
    font-size: 0.72rem;
}

.hotline-title {
    color: #64748b;
    font-weight: 500;
}

.hotline-number {
    font-weight: 700;
    color: #0284c7;
    text-decoration: none;
}

.hotline-number:hover {
    text-decoration: underline;
}

.font-14 {
    font-size: 14px;
}

/* Mobile drawer behavior */
@media (max-width: 991.98px) {
    .client-sidebar {
        transform: translateX(-100%);
    }

    .client-sidebar.sidebar-mobile-open {
        transform: translateX(0);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    }
}
</style>
