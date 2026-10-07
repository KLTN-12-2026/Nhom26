<template>
    <div class="admin-layout-container">
        <!-- 1. Left Vertical Menu (Menu Dọc Admin) -->
        <MenuAdmin :is-open="isSidebarOpen" @close="closeSidebar"></MenuAdmin>

        <!-- Mobile Sidebar Backdrop Overlay -->
        <div class="sidebar-backdrop d-lg-none" v-if="isSidebarOpen" @click="closeSidebar"></div>

        <!-- 2. Right Main Layout Area -->
        <div class="admin-main-area">
            <!-- Sticky Top Header -->
            <HeaderAdmin @toggle-sidebar="toggleSidebar"></HeaderAdmin>

            <!-- Page Content Body -->
            <main class="admin-page-content">
                <div class="admin-page-inner">
                    <router-view></router-view>
                </div>
            </main>

            <!-- Back to top -->
            <a href="javascript:;" class="back-to-top" @click="scrollToTop"><i class='bx bxs-up-arrow-alt'></i></a>

            <!-- Dark Navy Footer -->
            <FooterAdmin></FooterAdmin>
        </div>
    </div>
</template>

<script>
import HeaderAdmin from "../components/HeaderAdmin.vue";
import MenuAdmin from "../components/MenuAdmin.vue";
import FooterAdmin from "../components/FooterAdmin.vue";

import "../../assets/js/bootstrap.bundle.min.js";
import "../../assets/js/jquery.min.js";

export default {
    name: 'AdminWrapper',
    components: {
        HeaderAdmin,
        MenuAdmin,
        FooterAdmin
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

/* Reset & Container */
.admin-layout-container {
    min-height: 100vh;
    display: flex;
    background-color: #f8fafc;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #1e293b;
}

/* Right Main Area with Left Sidebar Offset (250px) */
.admin-main-area {
    flex: 1 1 auto;
    margin-left: 250px;
    min-width: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    transition: margin-left 0.25s ease;
}

.admin-page-content {
    flex: 1 0 auto;
    padding: 24px 24px 40px;
    background-color: #f8fafc;
}

.admin-page-inner {
    max-width: 1400px;
    margin: 0 auto;
}

/* Mobile Sidebar Backdrop */
.sidebar-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(2px);
    z-index: 1035;
}

@media (max-width: 991.98px) {
    .admin-main-area {
        margin-left: 0;
    }
    .admin-page-content {
        padding: 16px 14px 30px;
    }
}
</style>
