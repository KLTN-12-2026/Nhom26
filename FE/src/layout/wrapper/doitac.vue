<template>
    <div class="doitac-layout-container">
        <!-- 1. Left Vertical Sidebar (Menu Dọc Đối Tác) -->
        <MenuDoiTac :is-open="isSidebarOpen" @close="closeSidebar"></MenuDoiTac>

        <!-- Mobile Sidebar Backdrop Overlay -->
        <div class="sidebar-backdrop d-lg-none" v-if="isSidebarOpen" @click="closeSidebar"></div>

        <!-- 2. Right Main Layout Area -->
        <div class="doitac-main-area">
            <!-- Sticky Top Header -->
            <HeaderDoiTac @toggle-sidebar="toggleSidebar"></HeaderDoiTac>

            <!-- Page Content Body -->
            <main class="doitac-page-content">
                <div class="doitac-page-inner">
                    <router-view></router-view>
                </div>
            </main>

            <!-- Back to top button -->
            <a href="javascript:;" class="back-to-top" @click="scrollToTop">
                <i class='bx bxs-up-arrow-alt'></i>
            </a>

            <!-- Footer -->
            <FooterDoiTac></FooterDoiTac>
        </div>
    </div>
</template>

<script>
import HeaderDoiTac from "../components/HeaderDoiTac.vue";
import MenuDoiTac from "../components/MenuDoiTac.vue";
import FooterDoiTac from "../components/FooterDoiTac.vue";

import "../../assets/js/bootstrap.bundle.min.js";
import "../../assets/js/jquery.min.js";

export default {
    name: 'DoiTacWrapper',
    components: {
        HeaderDoiTac,
        MenuDoiTac,
        FooterDoiTac
    },
    data() {
        return {
            isSidebarOpen: false
        }
    },
    methods: {
        toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen;
        },
        closeSidebar() {
            this.isSidebarOpen = false;
        },
        scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }
}
</script>

<style>
@import "../../assets/css/bootstrap.min.css";
@import "../../assets/css/bootstrap-extended.css";
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");
@import "../../assets/css/icons.css";

/* Layout Root Container */
.doitac-layout-container {
    min-height: 100vh;
    display: flex;
    background-color: #f8fafc;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #1e293b;
}

/* Right Main Content Area with 260px Sidebar Offset */
.doitac-main-area {
    flex: 1 1 auto;
    margin-left: 260px;
    min-width: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    transition: margin-left 0.25s ease;
}

.doitac-page-content {
    flex: 1 0 auto;
    padding: 24px 28px 40px;
    background-color: #f8fafc;
}

.doitac-page-inner {
    max-width: 1440px;
    margin: 0 auto;
}

/* Mobile Backdrop Overlay */
.sidebar-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(15, 23, 42, 0.45);
    backdrop-filter: blur(2px);
    z-index: 1035;
}

/* Custom Back To Top for Partner Pink Theme */
.doitac-main-area .back-to-top {
    position: fixed;
    bottom: 24px;
    right: 24px;
    width: 38px;
    height: 38px;
    background: #e11d48;
    color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
    transition: all 0.2s ease;
    text-decoration: none;
    z-index: 999;
}

.doitac-main-area .back-to-top:hover {
    background: #be123c;
    transform: translateY(-2px);
}

/* Responsive Breakpoints */
@media (max-width: 991.98px) {
    .doitac-main-area {
        margin-left: 0;
    }
    .doitac-page-content {
        padding: 16px 14px 30px;
    }
}
</style>
