<template>
    <div class="nav-container primary-menu">
        <div class="mobile-topbar-header">
            <div>
                <img src="../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Wanderlust</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
        </div>
        <nav class="navbar navbar-expand-xl w-100">
            <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                <!-- Dashboard -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/dashboard">
                        <div class="parent-icon"><i class='bx bx-pie-chart-alt-2'></i></div>
                        <div class="menu-title">Dashboard</div>
                    </router-link>
                </li>

                <!-- Quản lý Đối tác -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/doi-tac">
                        <div class="parent-icon"><i class='bx bx-briefcase'></i></div>
                        <div class="menu-title">Đối Tác</div>
                    </router-link>
                </li>

                <!-- Quản lý Khách hàng -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/khach-hang">
                        <div class="parent-icon"><i class='bx bx-group'></i></div>
                        <div class="menu-title">Khách Hàng</div>
                    </router-link>
                </li>

                <!-- Quản lý Tour & Lịch trình -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/tour">
                        <div class="parent-icon"><i class='bx bx-map-alt'></i></div>
                        <div class="menu-title">Quản Lý Tour</div>
                    </router-link>
                </li>

                <!-- Quản lý Địa điểm du lịch -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/dia-diem">
                        <div class="parent-icon"><i class='bx bx-current-location'></i></div>
                        <div class="menu-title">Địa Điểm</div>
                    </router-link>
                </li>

                <!-- Hóa đơn & Đặt tour -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/hoa-don">
                        <div class="parent-icon"><i class='bx bx-receipt'></i></div>
                        <div class="menu-title">Hóa Đơn & Đặt Chỗ</div>
                    </router-link>
                </li>

                <!-- Đối soát hoa hồng -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/doi-soat">
                        <div class="parent-icon"><i class='bx bx-credit-card'></i></div>
                        <div class="menu-title">Đối Soát Doanh Thu</div>
                    </router-link>
                </li>

                <!-- Voucher & Khuyến mãi -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/voucher">
                        <div class="parent-icon"><i class='bx bx-purchase-tag'></i></div>
                        <div class="menu-title">Mã Giảm Giá</div>
                    </router-link>
                </li>

                <!-- Phân quyền Admin -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/admin/phan-quyen">
                        <div class="parent-icon"><i class='bx bx-shield-quarter'></i></div>
                        <div class="menu-title">Phân Quyền Admin</div>
                    </router-link>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
export default {
    name: 'MenuAdmin'
}
</script>
<style></style>
