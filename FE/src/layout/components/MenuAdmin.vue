<template>
    <aside class="admin-sidebar" :class="{ 'sidebar-mobile-open': isOpen }">
        <!-- 1. Brand Logo: SmartTrip AI ĐÀ NẴNG PORTAL -->
        <div class="sidebar-header">
            <div class="brand-wrapper">
                <div class="brand-logo-icon">
                    <svg viewBox="0 0 40 40" fill="none" class="brand-svg">
                        <circle cx="20" cy="20" r="18" fill="url(#adminBrandGrad)" />
                        <path d="M20 10C15 15.5 12 18 12 22C12 26.418 15.582 30 20 30C24.418 30 28 26.418 28 22C28 18 25 15.5 20 10Z" fill="#FFFFFF" opacity="0.95" />
                        <circle cx="20" cy="22" r="3.5" fill="#E11D48" />
                        <defs>
                            <linearGradient id="adminBrandGrad" x1="4" y1="4" x2="36" y2="36" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#E11D48" />
                                <stop offset="1" stop-color="#BE123C" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="brand-info">
                    <h2 class="brand-title">SmartTrip <span class="brand-ai">AI</span></h2>
                    <span class="brand-subtitle">ĐÀ NẴNG PORTAL</span>
                </div>
            </div>

            <!-- Mobile Close Button -->
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
                        <router-link to="/admin/thong-ke" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-bar-chart-alt-2"></i></span>
                            <span class="menu-text">Thống Kê & Báo Cáo</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 2: TÀI KHOẢN & PHÂN QUYỀN -->
                <div class="menu-section-header">TÀI KHOẢN & PHÂN QUYỀN</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/admin/tai-khoan-admin" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-user-pin"></i></span>
                            <span class="menu-text">Quản Lý Quản Trị Viên</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/phan-quyen" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-shield-quarter"></i></span>
                            <span class="menu-text">Phân Quyền & Chức Vụ</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/chuc-nang" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-layer"></i></span>
                            <span class="menu-text">Chức Năng Hệ Thống</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/nguoi-dung" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-group"></i></span>
                            <span class="menu-text">Tài Khoản Người Dùng</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 3: ĐỐI TÁC & KIỂM DUYỆT -->
                <div class="menu-section-header">ĐỐI TÁC & KIỂM DUYỆT</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/admin/doi-tac" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-building-house"></i></span>
                            <span class="menu-text">Xét Duyệt Đối Tác</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/tour" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-flag"></i></span>
                            <span class="menu-text">Kiểm Duyệt Tour Du Lịch</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/de-xuat-dia-diem" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-map-pin"></i></span>
                            <span class="menu-text">Địa Điểm Đề Xuất (POI)</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/danh-gia" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-message-square-detail"></i></span>
                            <span class="menu-text">Đánh Giá & Bình Luận</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/bao-cao-vi-pham" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-error-circle"></i></span>
                            <span class="menu-text">Báo Cáo Vi Phạm</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 4: KHO DỮ LIỆU ĐÀ NẴNG -->
                <div class="menu-section-header">KHO DỮ LIỆU ĐÀ NẴNG</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/admin/kho-dia-diem" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-map-alt"></i></span>
                            <span class="menu-text">Kho Địa Điểm</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/danh-muc-dia-diem" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-category-alt"></i></span>
                            <span class="menu-text">Danh Mục Địa Điểm</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/tag" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-purchase-tag-alt"></i></span>
                            <span class="menu-text">Thẻ Sở Thích (Tags)</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <router-link to="/admin/voucher" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-gift"></i></span>
                            <span class="menu-text">Voucher Sàn</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Group 5: CẤU HÌNH & HỆ THỐNG -->
                <div class="menu-section-header">CẤU HÌNH & HỆ THỐNG</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <router-link to="/admin/thuat-toan-ai" class="menu-link" active-class="active" @click="handleItemClick">
                            <span class="menu-icon"><i class="bx bx-chip"></i></span>
                            <span class="menu-text">Tham Số Thuật Toán AI</span>
                        </router-link>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:;" class="menu-link text-danger" @click="handleLogout">
                            <span class="menu-icon text-danger"><i class="bx bx-log-out"></i></span>
                            <span class="menu-text">Đăng Xuất An Toàn</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>

<script>
export default {
    name: 'MenuAdmin',
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
            if (confirm('Bạn có chắc chắn muốn đăng xuất tài khoản Quản trị viên Admin Portal?')) {
                localStorage.removeItem('xs');
                localStorage.removeItem('token_admin');
                this.$router.push('/admin/dashboard');
            }
        }
    }
};
</script>

<style scoped>
.admin-sidebar {
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
.menu-link.active,
.menu-link.router-link-exact-active {
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

.menu-link.active .menu-icon,
.menu-link.router-link-exact-active .menu-icon {
    color: #e11d48;
}

.menu-text {
    flex: 1 1 auto;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Mobile drawer */
@media (max-width: 991.98px) {
    .admin-sidebar {
        transform: translateX(-100%);
    }

    .admin-sidebar.sidebar-mobile-open {
        transform: translateX(0);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    }
}
</style>
