import { createRouter, createWebHistory } from "vue-router";

const routes = [
    // =========================================================
    // 1. TÁC NHÂN: CLIENT (KHÁCH HÀNG) — Layout 'client'
    // =========================================================
    {
        path: '/',
        component: () => import('../components/client/home/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/home',
        component: () => import('../components/client/home/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/tim-kiem-dia-diem',
        component: () => import('../components/client/tim-kiem-dia-diem/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/tour',
        component: () => import('../components/client/tour/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/dat-tour',
        component: () => import('../components/client/dat-tour/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/lich-su',
        component: () => import('../components/client/lich-su/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/yeu-thich',
        component: () => import('../components/client/yeu-thich/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/profile',
        component: () => import('../components/client/profile/index.vue'),
        meta: { layout: 'client' }
    },

    // =========================================================
    // 2. TÁC NHÂN: DOITAC (ĐỐI TÁC) — Layout 'doitac'
    // =========================================================
    {
        path: '/doitac/dashboard',
        component: () => import('../components/partner/dashboard/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/tai-khoan',
        component: () => import('../components/partner/tai-khoan/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/thong-tin-cong-ty',
        component: () => import('../components/partner/thong-tin-cong-ty/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/dia-diem',
        component: () => import('../components/partner/dia-diem/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/tour-dich-vu',
        component: () => import('../components/partner/tour-dich-vu/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/thanh-toan',
        component: () => import('../components/partner/thanh-toan/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/don-hang',
        component: () => import('../components/partner/don-hang/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/danh-gia',
        component: () => import('../components/partner/danh-gia/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/thong-ke',
        component: () => import('../components/partner/thong-ke/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/khach-hang',
        component: () => import('../components/partner/khach-hang/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/voucher',
        component: () => import('../components/partner/voucher/index.vue'),
        meta: { layout: 'doitac' }
    },

    // =========================================================
    // 3. TÁC NHÂN: ADMIN (QUẢN TRỊ VIÊN) — Layout 'admin'
    // =========================================================
    {
        path: '/admin/dashboard',
        component: () => import('../components/admin/dashboard/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/chuc-vu',
        component: () => import('../components/admin/chuc-vu/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/phan-quyen',
        component: () => import('../components/admin/phan-quyen/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/chuc-nang',
        component: () => import('../components/admin/chuc-nang/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/nguoi-dung',
        component: () => import('../components/admin/nguoi-dung/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tai-khoan-admin',
        component: () => import('../components/admin/tai-khoan-admin/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/doi-tac',
        component: () => import('../components/admin/doi-tac/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/kiem-duyet-dia-diem',
        component: () => import('../components/admin/kiem-duyet-dia-diem/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tour',
        component: () => import('../components/admin/tour/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/danh-gia',
        component: () => import('../components/admin/danh-gia/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tai-chinh',
        component: () => import('../components/admin/tai-chinh/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/thong-ke',
        component: () => import('../components/admin/thong-ke/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tag',
        component: () => import('../components/admin/tag/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/voucher',
        component: () => import('../components/admin/voucher/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/bao-cao-loi',
        component: () => import('../components/admin/bao-cao-loi/index.vue'),
        meta: { layout: 'admin' }
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router;