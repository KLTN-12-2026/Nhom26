<template>
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="topbar-logo-header">
                    <div>
                        <img src="../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">Wanderlust</h4>
                    </div>
                </div>
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                <div class="search-bar flex-grow-1">
                    <div class="position-relative search-bar-box">
                        <input type="text" class="form-control search-control" placeholder="Tìm kiếm địa điểm, tour du lịch, voucher...">
                        <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                        <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                    </div>
                </div>
                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <router-link to="/client/don-dat" class="nav-link text-primary position-relative" title="Đơn đặt của tôi">
                                <i class='bx bx-shopping-bag font-22'></i>
                            </router-link>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="alert-count">2</span>
                                <i class='bx bx-bell'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="msg-header">
                                    <h6 class="msg-header-title">Thông Báo Khách Hàng</h6>
                                    <p class="msg-header-clear ms-auto mb-0">Đã đọc tất cả</p>
                                </div>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i class="bx bx-gift"></i></div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Mã giảm giá 20% cho bạn<span class="msg-time float-end">1 giờ trước</span></h6>
                                                <p class="msg-info">Nhập mã HELLO2026 khi đặt tour</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../../assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">Khách Hàng</p>
                            <p class="designattion mb-0 text-muted">Thành viên</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <router-link class="dropdown-item" to="/client/profile">
                                <i class="bx bx-user"></i><span>Hồ sơ cá nhân</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item" to="/client/don-dat">
                                <i class="bx bx-calendar-check"></i><span>Lịch trình đã đặt</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item" to="/client/yeu-thich">
                                <i class="bx bx-heart"></i><span>Tour yêu thích</span>
                            </router-link>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;" @click="dangXuat()">
                                <i class='bx bx-log-out-circle text-danger'></i><span class="text-danger">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</template>
<script>
export default {
    name: 'HeaderClient',
    methods: {
        dangXuat() {
            localStorage.removeItem('token_khachhang');
            this.$router.push('/login');
        }
    }
}
</script>
<style></style>
