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
                    <div>
                        <span class="badge bg-primary text-uppercase px-2 py-1 ms-2 font-12">Kênh Đối Tác</span>
                    </div>
                </div>
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                <div class="search-bar flex-grow-1">
                    <div class="position-relative search-bar-box">
                        <input type="text" class="form-control search-control" placeholder="Tìm kiếm tour, đơn đặt, dịch vụ...">
                        <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                        <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                    </div>
                </div>
                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <router-link to="/client/home" class="nav-link text-primary" title="Xem trang Khách hàng">
                                <i class='bx bx-globe font-22'></i>
                            </router-link>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="alert-count">3</span>
                                <i class='bx bx-bell'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="msg-header">
                                    <h6 class="msg-header-title">Thông Báo Đơn Đặt</h6>
                                    <p class="msg-header-clear ms-auto mb-0">Đánh dấu đã đọc</p>
                                </div>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i class="bx bx-cart-alt"></i></div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Đơn đặt tour mới #HD102<span class="msg-time float-end">5 phút trước</span></h6>
                                                <p class="msg-info">Khách hàng vừa đặt Tour Đà Nẵng 3N2Đ</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success"><i class="bx bx-check-shield"></i></div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Thanh toán hoàn tất<span class="msg-time float-end">20 phút trước</span></h6>
                                                <p class="msg-info">Đơn hàng #HD101 đã thanh toán thành công</p>
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
                        <img src="../../assets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">Công Ty Du Lịch Việt</p>
                            <p class="designattion mb-0 text-success">Đối tác chính thức</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <router-link class="dropdown-item" to="/doitac/profile">
                                <i class="bx bx-user"></i><span>Hồ sơ công ty</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item" to="/doitac/dashboard">
                                <i class='bx bx-home-circle'></i><span>Bảng điều khiển</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link class="dropdown-item" to="/doitac/doi-soat">
                                <i class='bx bx-dollar-circle'></i><span>Hoa hồng & Tài chính</span>
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
    name: 'HeaderDoiTac',
    methods: {
        dangXuat() {
            localStorage.removeItem('token_doitac');
            this.$router.push('/doitac/login');
        }
    }
}
</script>
<style></style>
