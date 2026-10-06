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

                    <router-link class="nav-link" to="/doitac/dashboard">

                        <div class="parent-icon"><i class='bx bx-category'></i></div>

                        <div class="menu-title">Tổng Quan</div>

                    </router-link>

                </li>



                <!-- Quản lý Tour -->

                <li class="nav-item">

                    <router-link class="nav-link" to="/doitac/tour">

                        <div class="parent-icon"><i class='bx bx-trip'></i></div>

                        <div class="menu-title">Tour Của Tôi</div>

                    </router-link>

                </li>



                <!-- Lịch khởi hành -->

                <li class="nav-item">

                    <router-link class="nav-link" to="/doitac/tour-khoi-hanh">

                        <div class="parent-icon"><i class='bx bx-calendar-event'></i></div>

                        <div class="menu-title">Lịch Khởi Hành</div>

                    </router-link>

                </li>



                <!-- Quản lý Dịch vụ -->

                <li class="nav-item">

                    <router-link class="nav-link" to="/doitac/dich-vu">

                        <div class="parent-icon"><i class='bx bx-briefcase-alt-2'></i></div>

                        <div class="menu-title">Dịch Vụ Kèm Theo</div>

                    </router-link>

                </li>



                <!-- Quản lý Khách Đặt / Đơn Đặt -->

                <li class="nav-item">

                    <router-link class="nav-link" to="/doitac/don-dat">

                        <div class="parent-icon"><i class='bx bx-receipt'></i></div>

                        <div class="menu-title">Khách Đặt Tour</div>

                    </router-link>

                </li>



                <!-- Đối soát & Hoa hồng -->

                <li class="nav-item">

                    <router-link class="nav-link" to="/doitac/doi-soat">

                        <div class="parent-icon"><i class='bx bx-line-chart'></i></div>

                        <div class="menu-title">Đối Soát & Hoa Hồng</div>

                    </router-link>

                </li>



                <!-- Đánh giá từ khách hàng -->

                <li class="nav-item">

                    <router-link class="nav-link" to="/doitac/danh-gia">

                        <div class="parent-icon"><i class='bx bx-star'></i></div>

                        <div class="menu-title">Đánh Giá Khách Hàng</div>

                    </router-link>

                </li>



                <!-- Thông tin đối tác -->

                <li class="nav-item">

                    <router-link class="nav-link" to="/doitac/profile">

                        <div class="parent-icon"><i class='bx bx-building-house'></i></div>

                        <div class="menu-title">Hồ Sơ Doanh Nghiệp</div>

                    </router-link>

                </li>

            </ul>

        </nav>

    </div>

</template>

<script>

    export default {

        name: 'MenuDoiTac'

    }

</script>

<style></style>