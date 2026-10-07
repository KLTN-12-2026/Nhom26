<template>
    <aside class="client-sidebar" :class="{ 'sidebar-mobile-open': isOpen }">
        <!-- 1. Top Brand Logo -->
        <div class="sidebar-header">
            <router-link to="/client/home" class="brand-wrapper" @click="handleItemClick">
                <div class="brand-logo-icon">
                    <svg viewBox="0 0 32 32" fill="none" class="brand-svg">
                        <rect width="32" height="32" rx="8" fill="#0284C7" />
                        <!-- Globe / Compass lines -->
                        <circle cx="16" cy="16" r="9" stroke="#FFFFFF" stroke-width="2" />
                        <ellipse cx="16" cy="16" rx="4.5" ry="9" stroke="#FFFFFF" stroke-width="1.6" />
                        <path d="M7 16H25" stroke="#FFFFFF" stroke-width="1.6" />
                    </svg>
                </div>
                <div class="brand-info">
                    <h2 class="brand-title">Đà Nẵng Smart Travel...</h2>
                    <span class="brand-subtitle">Hệ thống Lập Kế hoạch & Tour</span>
                </div>
            </router-link>

            <!-- Close icon on mobile -->
            <button class="mobile-close-btn d-lg-none" @click="closeSidebar" type="button" aria-label="Đóng menu">
                <i class="bx bx-x"></i>
            </button>
        </div>

        <!-- 2. Scrollable Navigation Menu (Đầy đủ các chức năng theo yêu cầu & hình ảnh) -->
        <div class="sidebar-scrollable">
            <nav class="sidebar-menu">
                <ul class="menu-list">
                    <!-- 1. Trang chủ -->
                    <li class="menu-item">
                        <router-link to="/client/home" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-home-alt"></i></span>
                            <span class="menu-text">Trang chủ</span>
                        </router-link>
                    </li>

                    <!-- 2. Khám phá (Tìm kiếm & lọc địa điểm / Xem chi tiết địa điểm) -->
                    <li class="menu-item has-sub" :class="{ 'open': expandedMenus.khamPha }">
                        <div class="menu-link" :class="{ 'active': isRouteActive(['/client/tim-kiem-dia-diem', '/client/chi-tiet-dia-diem']) }" @click="toggleSubMenu('khamPha')">
                            <span class="menu-icon"><i class="bx bx-compass"></i></span>
                            <span class="menu-text">Khám phá</span>
                            <i class="bx bx-chevron-down sub-arrow"></i>
                        </div>
                        <ul class="submenu-list" v-show="expandedMenus.khamPha">
                            <li>
                                <router-link to="/client/tim-kiem-dia-diem" class="submenu-link" active-class="active" @click="handleItemClick">
                                    <i class="bx bx-search-alt-2 me-2"></i>Tìm kiếm & lọc địa điểm
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/client/chi-tiet-dia-diem" class="submenu-link" active-class="active" @click="handleItemClick">
                                    <i class="bx bx-info-circle me-2"></i>Xem chi tiết địa điểm
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <!-- 3. Lập kế hoạch AI -->
                    <li class="menu-item">
                        <router-link to="/client/lap-ke-hoach-ai" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-bot"></i></span>
                            <span class="menu-text">Lập kế hoạch AI</span>
                            <span class="badge-mini-ai">AI</span>
                        </router-link>
                    </li>

                    <!-- 4. Kế hoạch của tôi (Quản lý kế hoạch, Quản lý nhóm du lịch, Quản lý hoạt động) -->
                    <li class="menu-item has-sub" :class="{ 'open': expandedMenus.keHoach }">
                        <div class="menu-link" :class="{ 'active': isRouteActive(['/client/ke-hoach', '/client/nhom-du-lich', '/client/hoat-dong']) }" @click="toggleSubMenu('keHoach')">
                            <span class="menu-icon"><i class="bx bx-calendar-event"></i></span>
                            <span class="menu-text">Kế hoạch của tôi</span>
                            <i class="bx bx-chevron-down sub-arrow"></i>
                        </div>
                        <ul class="submenu-list" v-show="expandedMenus.keHoach">
                            <li>
                                <router-link to="/client/ke-hoach" class="submenu-link" active-class="active" @click="handleItemClick">
                                    <i class="bx bx-folder me-2"></i>Quản lý kế hoạch
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/client/nhom-du-lich" class="submenu-link" active-class="active" @click="handleItemClick">
                                    <i class="bx bx-group me-2"></i>Quản lý nhóm du lịch
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/client/hoat-dong" class="submenu-link" active-class="active" @click="handleItemClick">
                                    <i class="bx bx-task me-2"></i>Quản lý hoạt động
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <!-- 5. Tour du lịch (Xem tour & lịch khởi hành, Đặt tour & thanh toán) -->
                    <li class="menu-item has-sub" :class="{ 'open': expandedMenus.tour }">
                        <div class="menu-link" :class="{ 'active': isRouteActive(['/client/tour', '/client/dat-tour']) }" @click="toggleSubMenu('tour')">
                            <span class="menu-icon"><i class="bx bx-map-alt"></i></span>
                            <span class="menu-text">Tour du lịch</span>
                            <i class="bx bx-chevron-down sub-arrow"></i>
                        </div>
                        <ul class="submenu-list" v-show="expandedMenus.tour">
                            <li>
                                <router-link to="/client/tour" class="submenu-link" active-class="active" @click="handleItemClick">
                                    <i class="bx bx-calendar-star me-2"></i>Xem tour & lịch khởi hành
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/client/dat-tour" class="submenu-link" active-class="active" @click="handleItemClick">
                                    <i class="bx bx-credit-card-front me-2"></i>Đặt tour & thanh toán
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <!-- 6. Đơn hàng (Lịch sử du lịch & đơn đặt) -->
                    <li class="menu-item">
                        <router-link to="/client/lich-su" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-receipt"></i></span>
                            <span class="menu-text">Đơn hàng / Lịch sử</span>
                        </router-link>
                    </li>

                    <!-- 7. Yêu thích (Địa điểm yêu thích) -->
                    <li class="menu-item">
                        <router-link to="/client/yeu-thich" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-heart"></i></span>
                            <span class="menu-text">Địa điểm yêu thích</span>
                        </router-link>
                    </li>

                    <!-- 8. Đánh giá -->
                    <li class="menu-item">
                        <router-link to="/client/danh-gia" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-star"></i></span>
                            <span class="menu-text">Đánh giá</span>
                        </router-link>
                    </li>

                    <!-- 9. Phản hồi / Báo cáo lỗi -->
                    <li class="menu-item">
                        <router-link to="/client/bao-cao-loi" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-message-square-error"></i></span>
                            <span class="menu-text">Gửi báo cáo lỗi</span>
                        </router-link>
                    </li>

                    <!-- 10. Tài khoản khách hàng -->
                    <li class="menu-item">
                        <router-link to="/client/profile" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-user-circle"></i></span>
                            <span class="menu-text">Tài khoản khách hàng</span>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- 3. Bottom User Footer Card (Giống hệt hình: avatar xanh, tên Nguyễn Văn An, mã KH-2025-0834 & Đăng xuất) -->
        <div class="sidebar-user-footer">
            <div class="user-card-wrapper">
                <div class="user-avatar-circle">
                    <i class="bx bx-user"></i>
                </div>
                <div class="user-meta-info">
                    <div class="user-display-name">Nguyễn Văn An</div>
                    <div class="user-sub-code">KH-2025-0834</div>
                </div>
                <button type="button" class="btn-logout-sidebar" title="Đăng xuất" @click="handleLogout">
                    <i class="bx bx-log-out"></i>
                </button>
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
    data() {
        return {
            expandedMenus: {
                khamPha: true,
                keHoach: true,
                tour: true
            }
        }
    },
    methods: {
        toggleSubMenu(key) {
            this.expandedMenus[key] = !this.expandedMenus[key];
        },
        isRouteActive(paths) {
            return paths.some(path => this.$route.path.startsWith(path));
        },
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
                localStorage.removeItem('token_client');
                this.$router.push('/client/home');
            }
        }
    }
}
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

.brand-logo-icon {
    width: 34px;
    height: 34px;
    flex-shrink: 0;
}

.brand-svg {
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
    font-size: 0.68rem;
    color: #64748b;
    margin-top: 2px;
    line-height: 1.1;
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

.menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-item {
    margin-bottom: 3px;
}

/* Menu Link - Exact replica of the screenshot active & inactive state */
.menu-link {
    display: flex;
    align-items: center;
    padding: 9px 12px;
    color: #334155;
    text-decoration: none;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
    transition: all 0.15s ease;
    cursor: pointer;
    user-select: none;
}

.menu-link:hover {
    background-color: #f8fafc;
    color: #0284c7;
}

.menu-link:hover .menu-icon {
    color: #0284c7;
}

/* Active Link State: Exactly like "Tour du lịch" in the image */
.menu-link.active,
.menu-link.router-link-exact-active {
    background-color: #0369a1 !important;
    color: #ffffff !important;
    font-weight: 600;
}

.menu-link.active .menu-icon,
.menu-link.router-link-exact-active .menu-icon {
    color: #ffffff !important;
}

.menu-icon {
    font-size: 1.15rem;
    width: 24px;
    margin-right: 10px;
    color: #475569;
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

.badge-mini-ai {
    font-size: 0.65rem;
    font-weight: 700;
    background: #e0f2fe;
    color: #0284c7;
    padding: 2px 6px;
    border-radius: 999px;
    line-height: 1;
}

.menu-link.active .badge-mini-ai {
    background: rgba(255, 255, 255, 0.25);
    color: #ffffff;
}

.sub-arrow {
    font-size: 1rem;
    transition: transform 0.2s;
    color: #94a3b8;
}

.menu-item.open .sub-arrow {
    transform: rotate(180deg);
}

.menu-link.active .sub-arrow {
    color: #ffffff;
}

/* Submenu */
.submenu-list {
    list-style: none;
    padding: 4px 0 4px 28px;
    margin: 0;
}

.submenu-link {
    display: flex;
    align-items: center;
    padding: 6px 10px;
    color: #64748b;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
    border-radius: 6px;
    transition: all 0.15s ease;
}

.submenu-link:hover {
    color: #0284c7;
    background-color: #f0f9ff;
}

.submenu-link.active {
    color: #0284c7;
    font-weight: 700;
    background-color: #e0f2fe;
}

/* 3. Bottom User Card */
.sidebar-user-footer {
    padding: 12px 14px;
    border-top: 1px solid #f1f5f9;
    background: #fafafa;
    flex-shrink: 0;
}

.user-card-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 10px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
}

.user-avatar-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background-color: #0284c7;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
    flex-shrink: 0;
}

.user-meta-info {
    flex: 1 1 auto;
    min-width: 0;
}

.user-display-name {
    font-size: 0.82rem;
    font-weight: 700;
    color: #0f172a;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.user-sub-code {
    font-size: 0.68rem;
    color: #64748b;
    line-height: 1.1;
}

.btn-logout-sidebar {
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
    transition: all 0.15s;
}

.btn-logout-sidebar:hover {
    color: #ef4444;
    background: #fee2e2;
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
