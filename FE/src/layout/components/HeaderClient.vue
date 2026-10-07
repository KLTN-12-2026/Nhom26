<template>
    <header class="client-header">
        <div class="header-inner">
            <!-- Left: Toggle & Breadcrumb -->
            <div class="header-left">
                <button class="mobile-menu-toggle d-lg-none" type="button" @click="$emit('toggle-sidebar')" aria-label="Mở Menu">
                    <i class="bx bx-menu"></i>
                </button>
                <nav class="header-breadcrumb d-none d-md-flex align-items-center" aria-label="breadcrumb">
                    <router-link to="/client/home" class="breadcrumb-link">Trang chủ</router-link>
                    <i class="bx bx-chevron-right breadcrumb-separator"></i>
                    
                    <router-link :to="parentRoute.to" class="breadcrumb-link">{{ parentRoute.name }}</router-link>
                    <i class="bx bx-chevron-right breadcrumb-separator"></i>

                    <span class="breadcrumb-current">{{ currentRouteName }}</span>
                </nav>
            </div>

            <!-- Center: Omnibar Search Box (Giống trong hình: Tìm kiếm điểm đến, tour, vé...) -->
            <div class="header-center">
                <div class="omnibar-search">
                    <i class="bx bx-search search-icon"></i>
                    <input 
                        type="text" 
                        class="search-input" 
                        placeholder="Tìm kiếm điểm đến, tour, vé..." 
                        v-model="searchQuery"
                        @keyup.enter="handleSearch"
                    />
                </div>
            </div>

            <!-- Right: Language, Notifications & User Info -->
            <div class="header-right">
                <!-- Language switcher: VI | EN -->
                <div class="lang-switch-capsule d-none d-sm-flex">
                    <button type="button" class="lang-pill" :class="{ 'active': currentLang === 'VI' }" @click="currentLang = 'VI'">VI</button>
                    <span class="lang-divider">|</span>
                    <button type="button" class="lang-pill" :class="{ 'active': currentLang === 'EN' }" @click="currentLang = 'EN'">EN</button>
                </div>

                <!-- Notifications with red badge '1' -->
                <div class="dropdown">
                    <button class="icon-notif-btn position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Thông báo">
                        <i class="bx bx-bell"></i>
                        <span class="badge-dot-red">1</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end notif-dropdown shadow-lg border-0">
                        <div class="notif-header d-flex align-items-center justify-content-between p-3 border-bottom">
                            <h6 class="mb-0 fw-bold text-dark">Thông Báo Của Bạn</h6>
                            <span class="badge bg-primary-subtle text-primary font-11">1 mới</span>
                        </div>
                        <div class="notif-body">
                            <a class="dropdown-item p-3 border-bottom d-flex gap-2 align-items-start" href="javascript:;">
                                <div class="notif-icon bg-info-subtle text-info"><i class="bx bx-calendar-check"></i></div>
                                <div>
                                    <div class="fw-bold text-dark small">Nhắc nhở lịch khởi hành ngày mai</div>
                                    <div class="text-muted smaller">Tour Bà Nà Hills - Cầu Vàng bắt đầu lúc 08:00 sáng.</div>
                                    <div class="text-muted smaller mt-1">10 phút trước</div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 text-center bg-light">
                            <router-link to="/client/lich-su" class="small text-primary text-decoration-none fw-bold">Xem tất cả thông báo</router-link>
                        </div>
                    </div>
                </div>

                <!-- User Profile Pill: Nguyễn Văn An / Thành viên VIP (Giống hệt góc trên bên phải hình) -->
                <div class="dropdown">
                    <button class="user-header-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-header-avatar">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="user-header-text d-none d-lg-flex flex-column text-start">
                            <span class="user-name">Nguyễn Văn An</span>
                            <span class="user-role">Thành viên VIP</span>
                        </div>
                        <i class="bx bx-chevron-down ms-1 text-muted d-none d-lg-inline"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 user-dropdown-menu">
                        <li class="px-3 py-2 border-bottom">
                            <div class="fw-bold text-dark">Nguyễn Văn An</div>
                            <small class="text-muted">an.nguyen@smarttravel.vn</small>
                            <div class="mt-1"><span class="badge bg-primary text-white font-10">VIP Silver Tier</span></div>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/profile">
                                <i class="bx bx-user-circle me-2 text-primary"></i>Tài khoản khách hàng
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/lich-su">
                                <i class="bx bx-receipt me-2 text-primary"></i>Đơn hàng & Lịch sử
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/yeu-thich">
                                <i class="bx bx-heart me-2 text-danger"></i>Địa điểm yêu thích
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2" to="/client/bao-cao-loi">
                                <i class="bx bx-message-square-error me-2 text-warning"></i>Gửi báo cáo lỗi
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
            currentLang: 'VI'
        }
    },
    computed: {
        parentRoute() {
            const path = this.$route.path;
            if (path.includes('tour') || path.includes('dat-tour')) {
                return { name: 'Tour du lịch', to: '/client/tour' };
            }
            if (path.includes('dia-diem')) {
                return { name: 'Khám phá điểm đến', to: '/client/tim-kiem-dia-diem' };
            }
            if (path.includes('ke-hoach') || path.includes('nhom-du-lich') || path.includes('hoat-dong') || path.includes('lap-ke-hoach-ai')) {
                return { name: 'Kế hoạch du lịch', to: '/client/ke-hoach' };
            }
            return { name: 'Kênh khách hàng', to: '/client/home' };
        },
        currentRouteName() {
            const path = this.$route.path;
            if (path.includes('dat-tour')) return 'Dịch vụ & Voucher';
            if (path.includes('tour')) return 'Khám phá Bà Nà Hills';
            if (path.includes('tim-kiem-dia-diem')) return 'Tìm kiếm & lọc địa điểm';
            if (path.includes('chi-tiet-dia-diem')) return 'Chi tiết địa điểm';
            if (path.includes('lap-ke-hoach-ai')) return 'Lập kế hoạch AI';
            if (path.includes('ke-hoach')) return 'Quản lý kế hoạch';
            if (path.includes('nhom-du-lich')) return 'Quản lý nhóm du lịch';
            if (path.includes('hoat-dong')) return 'Quản lý hoạt động';
            if (path.includes('lich-su')) return 'Đơn hàng / Lịch sử du lịch';
            if (path.includes('yeu-thich')) return 'Địa điểm yêu thích';
            if (path.includes('danh-gia')) return 'Đánh giá dịch vụ';
            if (path.includes('bao-cao-loi')) return 'Gửi báo cáo lỗi';
            if (path.includes('profile')) return 'Tài khoản khách hàng';
            return 'Lộ trình khám phá';
        }
    },
    methods: {
        handleSearch() {
            if (this.searchQuery.trim()) {
                this.$router.push({ path: '/client/tim-kiem-dia-diem', query: { q: this.searchQuery } });
            }
        },
        handleLogout() {
            if (confirm('Bạn có muốn đăng xuất khỏi tài khoản khách hàng không?')) {
                localStorage.removeItem('token_client');
                this.$router.push('/client/home');
            }
        }
    }
}
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
    font-size: 0.82rem;
    white-space: nowrap;
    gap: 6px;
}

.breadcrumb-link {
    color: #64748b;
    text-decoration: none;
    font-weight: 500;
}

.breadcrumb-link:hover {
    color: #0284c7;
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

/* Center Omnibar Search */
.header-center {
    flex: 1 1 360px;
    max-width: 400px;
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
    padding: 0 16px 0 38px;
    font-size: 0.82rem;
    color: #1e293b;
    transition: all 0.2s ease;
}

.search-input:focus {
    background-color: #ffffff;
    border-color: #0284c7;
    outline: none;
    box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.12);
}

/* Right Area */
.header-right {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
}

/* Language capsule VI | EN */
.lang-switch-capsule {
    display: flex;
    align-items: center;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    padding: 3px 8px;
    gap: 4px;
}

.lang-pill {
    border: none;
    background: transparent;
    font-size: 0.72rem;
    font-weight: 700;
    color: #64748b;
    padding: 1px 4px;
    border-radius: 4px;
    cursor: pointer;
}

.lang-pill.active {
    color: #0284c7;
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
    background-color: #f0f9ff;
    color: #0284c7;
    border-color: #bae6fd;
}

.badge-dot-red {
    position: absolute;
    top: -2px;
    right: -2px;
    background: #ef4444;
    color: #ffffff;
    font-size: 0.65rem;
    font-weight: 700;
    min-width: 16px;
    height: 16px;
    line-height: 16px;
    border-radius: 999px;
    text-align: center;
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

/* User Pill: Nguyễn Văn An / Thành viên VIP */
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

.user-header-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #0284c7;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.user-name {
    font-size: 0.78rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.15;
}

.user-role {
    font-size: 0.68rem;
    color: #64748b;
    line-height: 1;
}

.user-dropdown-menu {
    border-radius: 12px;
    margin-top: 8px !important;
    min-width: 220px;
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
