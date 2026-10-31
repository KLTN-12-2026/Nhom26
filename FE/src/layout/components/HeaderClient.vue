<template>
    <header class="client-header">
        <div class="header-inner">
            <!-- Left: Toggle & Breadcrumb -->
            <div class="header-left">
                <button class="mobile-menu-toggle d-lg-none" type="button" @click="$emit('toggle-sidebar')" aria-label="Mở Menu">
                    <i class="bx bx-menu"></i>
                </button>
                <nav class="header-breadcrumb d-none d-md-flex align-items-center" aria-label="breadcrumb">
                    <router-link to="/client/ai-travel-planner" class="breadcrumb-link">Kênh Khách Hàng</router-link>
                    <i class="bx bx-chevron-right breadcrumb-separator"></i>
                    
                    <router-link :to="parentRoute.to" class="breadcrumb-link">{{ parentRoute.name }}</router-link>
                    <i class="bx bx-chevron-right breadcrumb-separator"></i>

                    <span class="breadcrumb-current">{{ currentRouteName }}</span>
                </nav>
            </div>

            <!-- Center: Omnibar Search Box (Giống trong hình: Tìm danh lam, ẩm thực, lịch trình... (Ctrl+K)) -->
            <div class="header-center">
                <div class="omnibar-search">
                    <i class="bx bx-search search-icon"></i>
                    <input 
                        type="text" 
                        class="search-input" 
                        placeholder="Tìm danh lam, ẩm thực, lịch trình... (Ctrl+K)" 
                        v-model="searchQuery"
                        @keyup.enter="handleSearch"
                    />
                    <span class="search-kbd-badge">⌘K</span>
                </div>
            </div>

            <!-- Right: Language, Notifications & User Info -->
            <div class="header-right">

                <!-- Notifications with red dot badge -->
                <div class="dropdown">
                    <button class="icon-notif-btn position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Thông báo">
                        <i class="bx bx-bell"></i>
                        <span class="badge-dot-pink"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end notif-dropdown shadow-lg border-0">
                        <div class="notif-header d-flex align-items-center justify-content-between p-3 border-bottom">
                            <h6 class="mb-0 fw-bold text-dark">Thông Báo Của Bạn</h6>
                            <span class="badge bg-danger-subtle text-danger font-11">1 mới</span>
                        </div>
                        <div class="notif-body">
                            <router-link to="/client/lich-trinh-toi-uu" class="dropdown-item p-3 border-bottom d-flex gap-2 align-items-start">
                                <div class="notif-icon bg-danger-subtle text-danger"><i class="bx bx-atom"></i></div>
                                <div>
                                    <div class="fw-bold text-dark small">AI đã tối ưu xong lịch trình 3N2Đ</div>
                                    <div class="text-muted smaller">Lộ trình Biển Mỹ Khê - Bà Nà Hills sẵn sàng xem.</div>
                                    <div class="text-muted smaller mt-1">Vừa xong</div>
                                </div>
                            </router-link>
                        </div>
                        <div class="p-2 text-center bg-light">
                            <router-link to="/client/lich-su-ke-hoach" class="small text-danger text-decoration-none fw-bold">Xem tất cả lịch trình</router-link>
                        </div>
                    </div>
                </div>

                <!-- User Profile Pill: Trần Minh Anh / VIP Explorer ♦ (Giống y hệt hình) -->
                <div class="dropdown">
                    <button class="user-header-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-header-avatar-pink">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="user-header-text d-none d-lg-flex flex-column text-start">
                            <span class="user-name">Trần Minh Anh</span>
                            <span class="user-role">VIP Explorer ♦</span>
                        </div>
                        <i class="bx bx-chevron-down ms-1 text-muted d-none d-lg-inline"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 user-dropdown-menu">
                        <li class="px-3 py-2 border-bottom">
                            <div class="fw-bold text-dark">Trần Minh Anh</div>
                            <small class="text-muted">tranminhanh@gmail.com</small>
                            <div class="mt-1"><span class="badge bg-danger text-white font-10">VIP Explorer</span></div>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/ho-so-so-thich">
                                <i class="bx bx-user-pin me-2 text-primary"></i>Hồ Sơ & Sở Thích
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/don-dat-thanh-toan">
                                <i class="bx bx-receipt me-2 text-primary"></i>Đơn Đặt & Thanh Toán
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/diem-den-yeu-thich">
                                <i class="bx bx-heart me-2 text-danger"></i>Điểm Đến Yêu Thích
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/bao-mat-tai-khoan">
                                <i class="bx bx-shield-quarter me-2 text-success"></i>Bảo Mật Tài Khoản
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/bao-cao-su-co">
                                <i class="bx bx-error-alt me-2 text-warning"></i>Báo Cáo Sự Cố
                            </router-link>
                        </li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li>
                            <a class="dropdown-item py-2 text-danger" href="javascript:;" @click="handleLogout">
                                <i class="bx bx-log-out me-2"></i>Đăng xuất
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
    name: 'HeaderClient',
    data() {
        return {
            searchQuery: '',
            currentLang: 'VN'
        };
    },
    computed: {
        parentRoute() {
            const path = this.$route.path;
            if (path.includes('kham-pha') || path.includes('ban-do') || path.includes('chi-tiet') || path.includes('danh-muc-tour')) {
                return { name: 'Khám Phá & Bản Đồ', to: '/client/kham-pha-dia-diem' };
            }
            if (path.includes('ai-travel-planner') || path.includes('lich-trinh') || path.includes('ke-hoach')) {
                return { name: 'Lập Kế Hoạch AI', to: '/client/ai-travel-planner' };
            }
            if (path.includes('don-dat') || path.includes('yeu-thich') || path.includes('danh-gia') || path.includes('su-co')) {
                return { name: 'Trải Nghiệm & Giao Dịch', to: '/client/don-dat-thanh-toan' };
            }
            return { name: 'Cá Nhân', to: '/client/ho-so-so-thich' };
        },
        currentRouteName() {
            const path = this.$route.path;
            if (path.includes('kham-pha-dia-diem')) return 'Khám Phá Địa Điểm OSM';
            if (path.includes('chi-tiet') || path.includes('ban-do-tuong-tac')) return 'Chi Tiết & Đánh Giá';
            if (path.includes('danh-muc-tour')) return 'Danh Mục Tour & So Sánh';
            if (path.includes('ai-travel-planner')) return 'AI Travel Planner';
            if (path.includes('lich-trinh-toi-uu')) return 'Lịch Trình Tối Ưu';
            if (path.includes('lich-su-ke-hoach')) return 'Lịch Sử Kế Hoạch';
            if (path.includes('don-dat-thanh-toan')) return 'Đơn Đặt & Thanh Toán';
            if (path.includes('diem-den-yeu-thich')) return 'Điểm Đến Yêu Thích';
            if (path.includes('quan-ly-don') || path.includes('danh-gia-gop-y')) return 'Quản Lý Đơn Đặt Tour';
            if (path.includes('bao-cao-su-co')) return 'Báo Cáo Sự Cố';
            if (path.includes('ho-so-so-thich')) return 'Hồ Sơ & Sở Thích';
            if (path.includes('bao-mat-tai-khoan')) return 'Bảo Mật Tài Khoản';
            return 'Khởi Tạo Lịch Trình';
        }
    },
    methods: {
        handleSearch() {
            if (this.searchQuery.trim()) {
                this.$router.push({ path: '/client/kham-pha-dia-diem', query: { q: this.searchQuery } });
            }
        },
        handleLogout() {
            if (confirm('Bạn có muốn đăng xuất khỏi tài khoản khách hàng không?')) {
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
.client-header {
    background-color: #ffffff;
    border-bottom: 1px solid #f1f5f9;
    position: sticky;
    top: 0;
    z-index: 1030;
    height: 60px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
}

.header-inner {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    gap: 16px;
}

/* Left Breadcrumb */
.header-left {
    display: flex;
    align-items: center;
    gap: 10px;
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
    font-size: 0.8rem;
    white-space: nowrap;
    gap: 6px;
}

.breadcrumb-link {
    color: #64748b;
    text-decoration: none;
    font-weight: 500;
}

.breadcrumb-link:hover {
    color: #db2777;
    text-decoration: underline;
}

.breadcrumb-separator {
    color: #cbd5e1;
    font-size: 13px;
}

.breadcrumb-current {
    color: #0f172a;
    font-weight: 700;
}

/* Center Omnibar Search (giống trong hình) */
.header-center {
    flex: 1 1 380px;
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
    left: 14px;
    color: #94a3b8;
    font-size: 1.1rem;
    pointer-events: none;
}

.search-input {
    width: 100%;
    height: 38px;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    padding: 0 45px 0 38px;
    font-size: 0.8rem;
    color: #1e293b;
    transition: all 0.2s ease;
}

.search-input:focus {
    background-color: #ffffff;
    border-color: #db2777;
    outline: none;
    box-shadow: 0 0 0 3px rgba(219, 39, 119, 0.12);
}

.search-kbd-badge {
    position: absolute;
    right: 12px;
    font-size: 0.65rem;
    background: #e2e8f0;
    color: #64748b;
    padding: 2px 5px;
    border-radius: 4px;
    font-weight: 600;
}

/* Right Area */
.header-right {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
}

/* Language capsule VN | EN */
.lang-switch-capsule {
    display: flex;
    align-items: center;
    background: #fdf2f8;
    border: 1px solid #fbcfe8;
    border-radius: 999px;
    padding: 2px 6px;
    gap: 4px;
}

.lang-pill {
    border: none;
    background: transparent;
    font-size: 0.72rem;
    font-weight: 700;
    color: #94a3b8;
    padding: 2px 6px;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.15s;
}

.lang-pill.active {
    background-color: #db2777;
    color: #ffffff;
}

.lang-divider {
    color: #cbd5e1;
    font-size: 0.72rem;
}

/* Notification Bell */
.icon-notif-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 1.15rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
}

.icon-notif-btn:hover {
    background-color: #fdf2f8;
    color: #db2777;
    border-color: #fbcfe8;
}

.badge-dot-pink {
    position: absolute;
    top: 6px;
    right: 6px;
    background: #db2777;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    border: 2px solid #ffffff;
}

.notif-dropdown {
    width: 300px;
    margin-top: 8px !important;
    border-radius: 12px;
    overflow: hidden;
}

.notif-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* User Pill */
.user-header-pill {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 4px 10px 4px 4px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.2s;
}

.user-header-pill:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

.user-header-avatar-pink {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ec4899, #db2777);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}

.user-name {
    font-size: 0.78rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.15;
}

.user-role {
    font-size: 0.65rem;
    color: #8b5cf6;
    line-height: 1;
}

.user-dropdown-menu {
    border-radius: 12px;
    margin-top: 8px !important;
    min-width: 220px;
}

.font-10 {
    font-size: 10px;
}

.font-11 {
    font-size: 11px;
}

@media (max-width: 767.98px) {
    .header-inner {
        padding: 0 12px;
    }
    .header-center {
        display: none;
    }
}
</style>
