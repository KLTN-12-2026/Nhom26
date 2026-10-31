<template>
    <header class="admin-header">
        <div class="header-inner">
            <!-- Left: Toggle & Omnibar Search -->
            <div class="header-left">
                <!-- Mobile Toggle -->
                <button class="mobile-menu-toggle d-lg-none" type="button" @click="$emit('toggle-sidebar')" aria-label="Mở Menu">
                    <i class="bx bx-menu"></i>
                </button>

                <!-- Omnibar Search -->
                <div class="omnibar-search">
                    <i class="bx bx-search search-icon"></i>
                    <input 
                        type="text" 
                        class="search-input" 
                        placeholder="Tìm kiếm điểm đến, đối tác, báo cáo..." 
                        v-model="searchQuery"
                    />
                </div>
            </div>

            <!-- Right: Help, Bell, Admin Profile -->
            <div class="header-right">
                <!-- Help icon (?) -->
                <button class="icon-action-btn" type="button" title="Trung tâm trợ giúp" @click="moTroGiup">
                    <i class="bx bx-help-circle"></i>
                </button>

                <!-- Notifications Bell with Red Dot -->
                <div class="dropdown">
                    <button class="icon-action-btn position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Thông báo hệ thống">
                        <i class="bx bx-bell"></i>
                        <span class="notification-badge-dot"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end notification-panel shadow-lg border-0">
                        <div class="panel-header">
                            <h6 class="mb-0 fw-bold font-13 text-dark">Thông Báo Ban Quản Trị</h6>
                            <span class="badge bg-pink text-white font-11">3 mới</span>
                        </div>
                        <div class="panel-body">
                            <router-link to="/admin/doi-tac" class="notif-item unread">
                                <div class="notif-icon bg-pink-light text-pink">
                                    <i class="bx bx-building"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">12 Đối tác lữ hành mới nộp hồ sơ</div>
                                    <div class="notif-desc">Cần thẩm định giấy phép LHQT trước đợt DIFF</div>
                                    <div class="notif-time">2 giờ trước</div>
                                </div>
                            </router-link>
                            <router-link to="/admin/tour" class="notif-item unread">
                                <div class="notif-icon bg-warning-light text-warning">
                                    <i class="bx bx-flag"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">8 Tour cao điểm nộp biểu giá</div>
                                    <div class="notif-desc">Xác minh không phụ thu trái phép mùa lễ hội</div>
                                    <div class="notif-time">45 phút trước</div>
                                </div>
                            </router-link>
                            <router-link to="/admin/bao-cao-vi-pham" class="notif-item">
                                <div class="notif-icon bg-danger-light text-danger">
                                    <i class="bx bx-error-alt"></i>
                                </div>
                                <div class="notif-content">
                                    <div class="notif-title">2 Báo cáo tranh chấp du khách</div>
                                    <div class="notif-desc">Sự cố đò Cù Lao Chàm cần can thiệp SLA 4h</div>
                                    <div class="notif-time">1 giờ trước</div>
                                </div>
                            </router-link>
                        </div>
                        <div class="panel-footer">
                            <router-link to="/admin/thong-ke" class="view-all-link">Xem tất cả cảnh báo</router-link>
                        </div>
                    </div>
                </div>

                <!-- Admin Profile Badge / Dropdown -->
                <div class="dropdown">
                    <a class="admin-profile-trigger" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img 
                            src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" 
                            alt="Trần Hoàng Long" 
                            class="admin-avatar-img rounded-circle"
                        />
                        <div class="admin-info-box d-none d-sm-flex">
                            <span class="admin-user-name">Trần Hoàng Long</span>
                            <span class="badge bg-pink text-white rounded-pill px-2 py-0.5 font-9 fw-bold">
                                SUPER ADMIN
                            </span>
                        </div>
                        <i class="bx bx-chevron-down dropdown-arrow d-none d-sm-inline"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 py-2">
                        <li class="dropdown-header text-muted font-11 fw-bold text-uppercase">Tài khoản Quản Trị Tối Cao</li>
                        <li>
                            <router-link class="dropdown-item d-flex align-items-center gap-2 py-2" to="/admin/tai-khoan-admin">
                                <i class="bx bx-user-pin text-muted"></i> Hồ Sơ Quản Trị Viên
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item d-flex align-items-center gap-2 py-2" to="/admin/phan-quyen">
                                <i class="bx bx-shield-quarter text-muted"></i> Phân Quyền & Chức Vụ
                            </router-link>
                        </li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger" href="javascript:;" @click="handleLogout">
                                <i class="bx bx-log-out text-danger"></i> Đăng Xuất An Toàn
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
            searchQuery: ''
        };
    },
    methods: {
        moTroGiup() {
            if (this.$toast) {
                this.$toast.info('Trung tâm tài liệu quản trị & SLA Ban Quản Trị SmartTrip AI.');
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
.admin-header {
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

/* Left Search Omnibar */
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

.icon-action-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    color: #475569;
    font-size: 1.25rem;
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

/* Admin Profile */
.admin-profile-trigger {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    padding: 4px 6px;
    border-radius: 8px;
    transition: background 0.15s;
}

.admin-profile-trigger:hover {
    background-color: #f8fafc;
}

.admin-avatar-img {
    width: 36px;
    height: 36px;
    object-fit: cover;
    border: 2px solid #ffe4e6;
}

.admin-info-box {
    display: flex;
    flex-direction: column;
    text-align: left;
    line-height: 1.15;
}

.admin-user-name {
    font-size: 0.82rem;
    font-weight: 700;
    color: #0f172a;
    white-space: nowrap;
}

.dropdown-arrow {
    color: #94a3b8;
    font-size: 1rem;
}

/* Notification Panel */
.notification-panel {
    width: 340px;
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

.text-pink { color: #e11d48 !important; }
.bg-pink { background-color: #e11d48 !important; }
.bg-pink-light { background-color: #ffe4e6 !important; }
.bg-warning-light { background-color: #fef3c7 !important; }
.bg-danger-light { background-color: #fee2e2 !important; }

.font-9 {
    font-size: 0.58rem;
}
</style>
