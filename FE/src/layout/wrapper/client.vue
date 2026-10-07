<template>
    <div class="client-layout-container">
        <!-- 1. Left Vertical Menu (Menu Dọc) -->
        <MenuClient :is-open="isSidebarOpen" @close="closeSidebar"></MenuClient>

        <!-- Mobile Sidebar Backdrop Overlay -->
        <div class="sidebar-backdrop d-lg-none" v-if="isSidebarOpen" @click="closeSidebar"></div>

        <!-- 2. Right Main Layout Area -->
        <div class="client-main-area">
            <!-- Sticky Top Header -->
            <HeaderClient @toggle-sidebar="toggleSidebar"></HeaderClient>

            <!-- Page Content Body -->
            <main class="client-page-content">
                <div class="client-page-inner">
                    <router-view></router-view>
                </div>
            </main>

            <!-- Back to top -->
            <a href="javascript:;" class="back-to-top" @click="scrollToTop"><i class='bx bxs-up-arrow-alt'></i></a>

            <!-- Footer -->
            <FooterClient></FooterClient>
        </div>
    </div>
</template>

<script>
import HeaderClient from "../components/HeaderClient.vue";
import MenuClient from "../components/MenuClient.vue";
import FooterClient from "../components/FooterClient.vue";

import "../../assets/js/bootstrap.bundle.min.js";
import "../../assets/js/jquery.min.js";

export default {
    name: 'ClientWrapper',
    components: {
        HeaderClient,
        MenuClient,
        FooterClient
    },
    data() {
        return {
            isSidebarOpen: false
        }
    },
    mounted() {
        window.addEventListener('toggle-client-sidebar', () => {
            this.isSidebarOpen = !this.isSidebarOpen;
        });
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
.client-layout-container {
    min-height: 100vh;
    display: flex;
    background-color: #f8fafc;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #1e293b;
}

/* Right Main Area with Left Sidebar Offset */
.client-main-area {
    flex: 1 1 auto;
    margin-left: 250px; /* Width of left vertical sidebar */
    min-width: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    transition: margin-left 0.25s ease;
}

.client-page-content {
    flex: 1 0 auto;
    padding: 24px 20px 40px;
    background-color: #f8fafc;
}

.client-page-inner {
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
    .client-main-area {
        margin-left: 0;
    }
    .client-page-content {
        padding: 16px 12px 30px;
    }
}
</style>
