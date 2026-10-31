<template>
    <header class="doitac-header">
        <div class="header-inner">
            <!-- Left: Toggle & Omnibar Search -->
            <div class="header-left">
                <button class="mobile-menu-toggle d-lg-none" type="button" @click="$emit('toggle-sidebar')" aria-label="Mở Menu">
                    <i class="bx bx-menu"></i>
                </button>
                <div class="omnibar-search">
                    <i class="bx bx-search search-icon"></i>
                    <input 
                        type="text" 
                        class="search-input" 
                        placeholder="Tìm kiếm mã tour, khách hàng, đơn đặt..." 
                        v-model="searchQuery"
                    />
                </div>
            </div>

            <!-- Right: Action Button, Bell, Partner Profile -->
            <div class="header-right">
                <!-- Pink Pill Button: + Tạo Tour Mới -->
                <router-link to="/doitac/tour-du-lich" class="btn btn-create-tour">
                    <i class="bx bx-plus me-1"></i> Tạo Tour Mới
                </router-link>

                <!-- Notifications Bell -->
                <div class="dropdown">
                    <button class="icon-action-btn position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Thông báo">
                        <i class="bx bx-bell"></i>
                        <span class="notification-badge-dot"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end notification-panel shadow-lg border-0">
                        <div class="panel-header">
                            <h6 class="mb-0 fw-bold">Thông Báo Đơn Đặt & Chỗ Trống</h6>
                            <span class="badge bg-pink text-white font-11">3 mới</span>
                        </div>
                        <div class="panel-body">
                            <router-link to="/doitac/xu-ly-dat-tour" class="notif-item unread">
                                <div class="notif-icon bg-pink-light text-pink">
                                    <i class="bx bx-receipt"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">Đơn đặt mới #HD-892410</div>
                                    <div class="notif-desc">Bà Nà Hills Siêu Sang 1N - 2 khách</div>
                                    <div class="notif-time">5 phút trước</div>
                                </div>
                            </router-link>
                            <router-link to="/doitac/lich-khoi-hanh" class="notif-item unread">
                                <div class="notif-icon bg-warning-light text-warning">
                                    <i class="bx bx-time"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">Cảnh báo chỗ trống</div>
                                    <div class="notif-desc">Ca Nô Cù Lao Chàm còn trống 18/25 chỗ</div>
                                    <div class="notif-time">25 phút trước</div>
                                </div>
                            </router-link>
                            <router-link to="/doitac/danh-gia" class="notif-item">
                                <div class="notif-icon bg-success-light text-success">
                                    <i class="bx bx-star"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">Đánh giá 5 sao mới</div>
                                    <div class="notif-desc">Trần Hoài Nam vừa để lại nhận xét tour Bà Nà Hills</div>
                                    <div class="notif-time">2 giờ trước</div>
                                </div>
                            </router-link>
                        </div>
                        <div class="panel-footer">
                            <router-link to="/doitac/xu-ly-dat-tour" class="view-all-link">Xem tất cả đơn đặt</router-link>
                        </div>
                    </div>
                </div>

                <!-- Partner Profile Badge / Dropdown -->
                <div class="dropdown">
                    <a class="partner-profile-trigger" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="partner-avatar">
                            <span>DN</span>
                        </div>
                        <div class="partner-info-box d-none d-sm-flex">
                            <span class="partner-corp-name">Danang Explorer Travel Corp</span>
                            <span class="partner-code">#PARTNER-DN-089</span>
                        </div>
                        <i class="bx bx-chevron-down dropdown-arrow d-none d-sm-inline"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 py-2">
                        <li class="dropdown-header text-muted font-11 fw-bold text-uppercase">Tài khoản Doanh Nghiệp</li>
                        <li>
                            <router-link class="dropdown-item d-flex align-items-center gap-2 py-2" to="/doitac/ho-so-doanh-nghiep">
                                <i class="bx bx-buildings text-muted"></i> Hồ Sơ Doanh Nghiệp (KYC)
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item d-flex align-items-center gap-2 py-2" to="/doitac/tai-khoan">
                                <i class="bx bx-shield-quarter text-muted"></i> Tài Khoản & Bảo Mật
                            </router-link>
                        </li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger" href="javascript:;" @click="handleLogout">
                                <i class="bx bx-log-out text-danger"></i> Đăng Xuất
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
    methods: {
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
.doitac-header {
    height: 64px;
    background-color: #ffffff;
    border-bottom: 1px solid #f1f5f9;
    position: sticky;
    top: 0;
    z-index: 1030;
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

/* Left Area & Search Omnibar */
.header-left {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1 1 auto;
    max-width: 480px;
}

.mobile-menu-toggle {
    background: none;
    border: none;
    color: #475569;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 6px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mobile-menu-toggle:hover {
    background-color: #f1f5f9;
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
    font-size: 1.15rem;
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
    border-color: #f43f5e;
    outline: none;
    box-shadow: 0 0 0 3px rgba(225, 29, 72, 0.12);
}

/* Right Area */
.header-right {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-shrink: 0;
}

/* Pink Pill Button "+ Tạo Tour Mới" */
.btn-create-tour {
    background: linear-gradient(135deg, #e11d48 0%, #ec4899 100%);
    border: none;
    color: #ffffff !important;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 7px 18px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    box-shadow: 0 3px 10px rgba(225, 29, 72, 0.28);
    transition: all 0.2s ease;
    white-space: nowrap;
}

.btn-create-tour:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(225, 29, 72, 0.38);
    color: #ffffff;
}

/* Icon Buttons (Bell) */
.icon-action-btn {
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
    transition: all 0.2s;
}

.icon-action-btn:hover {
    background-color: #fff1f2;
    border-color: #fecdd3;
    color: #e11d48;
}

.notification-badge-dot {
    position: absolute;
    top: 6px;
    right: 7px;
    width: 8px;
    height: 8px;
    background: #e11d48;
    border-radius: 50%;
    border: 1.5px solid #ffffff;
}

/* Partner Profile Badge */
.partner-profile-trigger {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    padding: 4px 6px;
    border-radius: 8px;
    transition: background 0.15s;
}

.partner-profile-trigger:hover {
    background-color: #f8fafc;
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
    font-size: 0.76rem;
    flex-shrink: 0;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.2);
}

.partner-info-box {
    display: flex;
    flex-direction: column;
    text-align: left;
    line-height: 1.15;
}

.partner-corp-name {
    font-size: 0.8rem;
    font-weight: 700;
    color: #0f172a;
    white-space: nowrap;
}

.partner-code {
    font-size: 0.68rem;
    color: #64748b;
    font-weight: 500;
}

.dropdown-arrow {
    color: #94a3b8;
    font-size: 1rem;
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
    .header-left {
        max-width: none;
    }
}
</style>
