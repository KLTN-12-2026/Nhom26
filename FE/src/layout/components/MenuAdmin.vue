<template>
    <aside class="admin-sidebar" :class="{ 'sidebar-mobile-open': isOpen }">
        <!-- 1. Top Admin Profile Header (Giống hệt hình chụp) -->
        <div class="sidebar-user-header p-3 border-bottom">
            <div class="d-flex align-items-center gap-2 mb-1">
                <div class="admin-avatar-circle">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop" class="admin-avatar-img" alt="avatar" />
                </div>
                <div class="admin-user-info overflow-hidden">
                    <div class="d-flex align-items-center gap-1">
                        <span class="fw-bold text-dark font-13">Admin</span>
                    </div>
                    <div class="text-success font-11 fw-semibold d-flex align-items-center gap-1">
                        <span class="dot-green"></span> Super Admin (Root)
                    </div>
                </div>
                <button class="btn btn-sm btn-light border-0 d-lg-none ms-auto p-1" @click="closeSidebar">
                    <i class="bx bx-x font-20 text-muted"></i>
                </button>
            </div>
        </div>

        <!-- 2. Section Header -->
        <div class="px-3 pt-3 pb-1 d-flex align-items-center justify-content-between">
            <span class="font-11 fw-bold text-uppercase text-secondary tracking-wider">PHÂN HỆ QUẢN TRỊ</span>
            <span class="badge bg-light text-secondary font-10 border">Admin</span>
        </div>

        <!-- 3. Scrollable Navigation Menu (Đầy đủ 14 chức năng quản trị) -->
        <div class="sidebar-scrollable p-2">
            <ul class="nav flex-column gap-1">
                <!-- 1. Quản lý admin (Active trong hình chụp) -->
                <li class="nav-item">
                    <router-link to="/admin/tai-khoan-admin" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-user-pin nav-icon"></i>
                        <span>Quản lý Admin</span>
                    </router-link>
                </li>

                <!-- 2. Quản lý chức vụ -->
                <li class="nav-item">
                    <router-link to="/admin/chuc-vu" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-badge-check nav-icon"></i>
                        <span>Quản lý chức vụ</span>
                    </router-link>
                </li>

                <!-- 3. Quản lý chức năng -->
                <li class="nav-item">
                    <router-link to="/admin/chuc-nang" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-layer nav-icon"></i>
                        <span>Quản lý chức năng</span>
                    </router-link>
                </li>

                <!-- 4. Phân quyền -->
                <li class="nav-item">
                    <router-link to="/admin/phan-quyen" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-shield-quarter nav-icon"></i>
                        <span>Phân quyền Admin</span>
                    </router-link>
                </li>

                <!-- 5. Quản lý người dùng -->
                <li class="nav-item">
                    <router-link to="/admin/nguoi-dung" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-group nav-icon"></i>
                        <span>Quản lý người dùng</span>
                    </router-link>
                </li>

                <!-- 6. Quản lý đối tác -->
                <li class="nav-item">
                    <router-link to="/admin/doi-tac" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-briefcase nav-icon"></i>
                        <span>Quản lý đối tác</span>
                    </router-link>
                </li>

                <!-- 7. Kiểm duyệt địa điểm -->
                <li class="nav-item">
                    <router-link to="/admin/kiem-duyet-dia-diem" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-current-location nav-icon"></i>
                        <span>Kiểm duyệt địa điểm</span>
                    </router-link>
                </li>

                <!-- 8. Quản lý tour -->
                <li class="nav-item">
                    <router-link to="/admin/tour" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-map-alt nav-icon"></i>
                        <span>Quản lý tour</span>
                    </router-link>
                </li>

                <!-- 9. Quản lý đánh giá -->
                <li class="nav-item">
                    <router-link to="/admin/danh-gia" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-star nav-icon"></i>
                        <span>Quản lý đánh giá</span>
                    </router-link>
                </li>

                <!-- 10. Quản lý tài chính -->
                <li class="nav-item">
                    <router-link to="/admin/tai-chinh" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-dollar-circle nav-icon"></i>
                        <span>Quản lý tài chính</span>
                    </router-link>
                </li>

                <!-- 11. Thống kê & báo cáo -->
                <li class="nav-item">
                    <router-link to="/admin/thong-ke" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-bar-chart-alt-2 nav-icon"></i>
                        <span>Thống kê & báo cáo</span>
                    </router-link>
                </li>

                <!-- 12. Quản lý tag -->
                <li class="nav-item">
                    <router-link to="/admin/tag" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-purchase-tag-alt nav-icon"></i>
                        <span>Quản lý tag</span>
                    </router-link>
                </li>

                <!-- 13. Quản lý voucher Admin -->
                <li class="nav-item">
                    <router-link to="/admin/voucher" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-gift nav-icon"></i>
                        <span>Quản lý voucher Admin</span>
                    </router-link>
                </li>

                <!-- 14. Quản lý báo cáo lỗi -->
                <li class="nav-item">
                    <router-link to="/admin/bao-cao-loi" class="nav-link admin-nav-link" active-class="active" @click="handleItemClick">
                        <i class="bx bx-bug nav-icon"></i>
                        <span>Quản lý báo cáo lỗi</span>
                    </router-link>
                </li>
            </ul>
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
        }
    }
}
</script>

<style scoped>
.admin-sidebar {
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

.admin-avatar-circle {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
    border: 1px solid #e2e8f0;
}

.admin-avatar-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #22c55e;
    display: inline-block;
}

.tracking-wider {
    letter-spacing: 0.5px;
}

.sidebar-scrollable {
    flex: 1 1 auto;
    overflow-y: auto;
    overflow-x: hidden;
}

.sidebar-scrollable::-webkit-scrollbar {
    width: 4px;
}

.sidebar-scrollable::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    border-radius: 4px;
}

/* Nav Link */
.admin-nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 9px 14px;
    border-radius: 8px;
    font-size: 0.84rem;
    font-weight: 500;
    color: #334155;
    text-decoration: none;
    transition: all 0.15s ease;
}

.admin-nav-link:hover {
    background-color: #f8fafc;
    color: #0284c7;
}

.admin-nav-link:hover .nav-icon {
    color: #0284c7;
}

/* Active Link State: Light blue capsule background with dark blue text, exactly matching screenshot */
.admin-nav-link.active,
.admin-nav-link.router-link-exact-active {
    background-color: #e0f2fe !important;
    color: #0284c7 !important;
    font-weight: 600;
    border: 1px solid #bae6fd;
}

.admin-nav-link.active .nav-icon,
.admin-nav-link.router-link-exact-active .nav-icon {
    color: #0284c7 !important;
}

.nav-icon {
    font-size: 1.15rem;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: color 0.15s;
}

/* Mobile drawer behavior */
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
