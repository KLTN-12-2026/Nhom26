<template>
    <header class="admin-header">
        <div class="header-inner">
            <!-- Left: Toggle & Brand / Quick Links -->
            <div class="header-left">
                <!-- Mobile Toggle -->
                <button class="mobile-menu-toggle d-lg-none" type="button" @click="$emit('toggle-sidebar')" aria-label="Mở Menu">
                    <i class="bx bx-menu"></i>
                </button>

                <!-- Brand Logo (Đà Nẵng Smart Travel AI) -->
                <router-link to="/admin/dashboard" class="admin-header-brand text-decoration-none">
                    <div class="brand-logo-circle">
                        <i class="bx bxs-map-pin"></i>
                    </div>
                    <div class="d-none d-sm-flex flex-column">
                        <span class="brand-name">Đà Nẵng Smart Travel AI</span>
                        <span class="brand-tagline">Du lịch Thông minh & AI Planner</span>
                    </div>
                </router-link>

                <!-- Quick Navigation Links (Khám phá Điểm đến, Tour & Trải nghiệm, Hỗ trợ 24/7) -->
                <div class="d-none d-xl-flex align-items-center gap-3 ms-4 header-quick-links">
                    <router-link to="/client/tim-kiem-dia-diem" class="quick-link-item">
                        <i class="bx bx-compass text-primary me-1"></i> Khám phá Điểm đến
                    </router-link>
                    <router-link to="/client/tour" class="quick-link-item">
                        <i class="bx bx-map-alt text-primary me-1"></i> Tour & Trải nghiệm
                    </router-link>
                    <a href="tel:19006868" class="quick-link-item">
                        <i class="bx bx-headphone text-primary me-1"></i> Hỗ trợ 24/7
                    </a>
                </div>
            </div>

            <!-- Right: Search Omnibar, Bell & Avatar (JD) -->
            <div class="header-right">
                <!-- Omnibar Search -->
                <div class="admin-search-wrapper d-none d-md-block">
                    <i class="bx bx-search search-icon"></i>
                    <input 
                        type="text" 
                        class="admin-search-input" 
                        placeholder="Tìm kiếm hành trình, admin, tour..."
                        v-model="searchKeyword"
                    >
                </div>

                <!-- Bell Notification with alert dot -->
                <div class="dropdown">
                    <button class="icon-header-btn position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Thông báo hệ thống">
                        <i class="bx bx-bell"></i>
                        <span class="badge-dot-blue"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 notif-panel">
                        <div class="p-3 border-bottom d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 fw-bold text-dark font-13">Thông Báo Hệ Thống</h6>
                            <span class="badge bg-primary-subtle text-primary font-11">3 mới</span>
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item p-2 rounded-3 small" href="javascript:;">
                                <i class="bx bx-user-plus text-primary me-2"></i> Đối tác mới nộp hồ sơ xét duyệt
                            </a>
                            <a class="dropdown-item p-2 rounded-3 small" href="javascript:;">
                                <i class="bx bx-bug text-danger me-2"></i> 1 Báo cáo lỗi mới cần xử lý
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Profile Pill (JD Circle) -->
                <div class="dropdown">
                    <button class="avatar-jd-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="avatar-jd-text">JD</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 user-menu">
                        <li class="px-3 py-2 border-bottom">
                            <div class="fw-bold text-dark font-13">Super Admin (Root)</div>
                            <small class="text-muted font-11">admin@danangtravel.gov.vn</small>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2 small" to="/admin/tai-khoan-admin">
                                <i class="bx bx-user-circle me-2 text-primary"></i>Tài khoản Quản trị
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item py-2 small" to="/admin/phan-quyen">
                                <i class="bx bx-shield-quarter me-2 text-primary"></i>Phân quyền vai trò
                            </router-link>
                        </li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li>
                            <a class="dropdown-item py-2 small text-danger" href="javascript:;" @click="dangXuat">
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
    name: 'HeaderAdmin',
    data() {
        return {
            searchKeyword: ''
        }
    },
    methods: {
        dangXuat() {
            if (confirm('Bạn có muốn đăng xuất khỏi hệ thống quản trị Admin?')) {
                localStorage.removeItem('token_admin');
                this.$router.push('/admin/dashboard');
            }
        }
    }
}
</script>

<style scoped>
.admin-header {
    background-color: #ffffff;
    border-bottom: 1px solid #e2e8f0;
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

/* Left Brand & Quick Links */
.header-left {
    display: flex;
    align-items: center;
    gap: 12px;
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

.admin-header-brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.brand-logo-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background-color: #0284c7;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.brand-name {
    font-size: 0.88rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.15;
}

.brand-tagline {
    font-size: 0.65rem;
    color: #64748b;
    line-height: 1;
}

.header-quick-links {
    border-left: 1px solid #e2e8f0;
    padding-left: 16px;
}

.quick-link-item {
    font-size: 0.8rem;
    font-weight: 500;
    color: #475569;
    text-decoration: none;
    display: flex;
    align-items: center;
    transition: color 0.15s;
}

.quick-link-item:hover {
    color: #0284c7;
}

/* Right Area */
.header-right {
    display: flex;
    align-items: center;
    gap: 12px;
}

.admin-search-wrapper {
    position: relative;
    width: 240px;
}

.search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 1.1rem;
    pointer-events: none;
}

.admin-search-input {
    width: 100%;
    height: 36px;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    padding: 0 16px 0 34px;
    font-size: 0.8rem;
    color: #1e293b;
    transition: all 0.2s ease;
}

.admin-search-input:focus {
    background-color: #ffffff;
    border-color: #0284c7;
    outline: none;
    box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.12);
}

.icon-header-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 1.2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s;
}

.icon-header-btn:hover {
    background-color: #f0f9ff;
    color: #0284c7;
}

.badge-dot-blue {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: #0284c7;
}

/* JD Avatar Circle */
.avatar-jd-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0284c7 0%, #38bdf8 100%);
    border: none;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.82rem;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(2, 132, 199, 0.25);
}

.notif-panel, .user-menu {
    border-radius: 12px;
    margin-top: 8px !important;
}
</style>
