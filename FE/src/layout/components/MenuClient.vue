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
                <!-- Trang Chủ -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/client/home">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                        <div class="menu-title">Trang Chủ</div>
                    </router-link>
                </li>

                <!-- Tour Du Lịch -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/client/tour">
                        <div class="parent-icon"><i class='bx bx-map-alt'></i></div>
                        <div class="menu-title">Tour Du Lịch</div>
                    </router-link>
                </li>

                <!-- Điểm Đến -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/client/dia-diem">
                        <div class="parent-icon"><i class='bx bx-compass'></i></div>
                        <div class="menu-title">Điểm Đến</div>
                    </router-link>
                </li>

                <!-- Khuyến Mãi / Voucher -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/client/khuyen-mai">
                        <div class="parent-icon"><i class='bx bx-gift'></i></div>
                        <div class="menu-title">Khuyến Mãi</div>
                    </router-link>
                </li>

                <!-- Đơn Đặt Tour -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/client/don-dat">
                        <div class="parent-icon"><i class='bx bx-shopping-bag'></i></div>
                        <div class="menu-title">Đơn Đặt Của Tôi</div>
                    </router-link>
                </li>

                <!-- Yêu Thích -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/client/yeu-thich">
                        <div class="parent-icon"><i class='bx bx-heart'></i></div>
                        <div class="menu-title">Yêu Thích</div>
                    </router-link>
                </li>

                <!-- Cẩm Nang Du Lịch -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/client/tin-tuc">
                        <div class="parent-icon"><i class='bx bx-news'></i></div>
                        <div class="menu-title">Cẩm Nang</div>
                    </router-link>
                </li>

                <!-- Hỗ Trợ -->
                <li class="nav-item">
                    <router-link class="nav-link" to="/client/lien-he">
                        <div class="parent-icon"><i class='bx bx-support'></i></div>
                        <div class="menu-title">Hỗ Trợ</div>
                    </router-link>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
export default {
    name: 'MenuClient'
}
</script>
<style></style>
