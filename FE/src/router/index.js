import { createRouter, createWebHistory } from "vue-router";

const routes = [
    // =========================================================
    // AUTHENTICATION (ĐĂNG NHẬP / ĐĂNG KÝ) — Layout 'blank'
    // =========================================================
    {
        path: '/login',
        name: 'Login',
        component: () => import('../components/login/dangky-dangnhap/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/dang-nhap',
        name: 'DangNhap',
        component: () => import('../components/login/dangky-dangnhap/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/dang-ky',
        name: 'DangKy',
        component: () => import('../components/login/dangky-dangnhap/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/kich-hoat',
        name: 'KichHoat',
        component: () => import('../components/login/makichhoat/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/xac-thuc',
        name: 'XacThuc',
        component: () => import('../components/login/makichhoat/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/ma-kich-hoat',
        name: 'MaKichHoat',
        component: () => import('../components/login/makichhoat/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/quen-mat-khau',
        name: 'QuenMatKhau',
        component: () => import('../components/login/quen-mat-khau/index.vue'),
        meta: { layout: 'blank' }
    },

    // =========================================================
    // 1. TÁC NHÂN: CLIENT (KHÁCH HÀNG) — Layout 'client'
    // =========================================================
    {
        path: '/',
        component: () => import('../components/client/home/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/client/home',
        component: () => import('../components/client/home/index.vue'),
        meta: { layout: 'blank' }
    },

    // 1.1 — Khám Phá & Bản Đồ
    {
        path: '/client/kham-pha-dia-diem',
        component: () => import('../components/client/KhamPhaDiaDiem/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/ban-do-tuong-tac',
        component: () => import('../components/client/BanDoTuongTac/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/danh-muc-tour',
        component: () => import('../components/client/DanhMucTour/index.vue'),
        meta: { layout: 'client' }
    },

    // 1.2 — Lập Kế Hoạch AI (Trọng tâm)
    {
        path: '/client/ai-travel-planner',
        component: () => import('../components/client/AiTravelPlanner/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/lich-trinh-toi-uu',
        component: () => import('../components/client/LichTrinhToiUu/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/lich-su-ke-hoach',
        component: () => import('../components/client/LichSuKeHoach/index.vue'),
        meta: { layout: 'client' }
    },

    // 1.3 — Trải Nghiệm & Giao Dịch
    {
        path: '/client/don-dat-thanh-toan',
        component: () => import('../components/client/DonDatThanhToan/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/diem-den-yeu-thich',
        component: () => import('../components/client/DiemDenYeuThich/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/danh-gia-gop-y',
        component: () => import('../components/client/DanhGiaGopY/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/bao-cao-su-co',
        component: () => import('../components/client/BaoCaoSuCo/index.vue'),
        meta: { layout: 'client' }
    },

    // 1.4 — Cá Nhân
    {
        path: '/client/ho-so-so-thich',
        component: () => import('../components/client/HoSoSoThich/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/bao-mat-tai-khoan',
        component: () => import('../components/client/BaoMatTaiKhoan/index.vue'),
        meta: { layout: 'client' }
    },

    // Aliases & Fallbacks
    { path: '/client/tim-kiem-dia-diem', redirect: '/client/kham-pha-dia-diem' },
    { path: '/client/chi-tiet-dia-diem', redirect: '/client/kham-pha-dia-diem' },
    { path: '/client/lap-ke-hoach-ai', redirect: '/client/ai-travel-planner' },
    { path: '/client/ke-hoach', redirect: '/client/lich-su-ke-hoach' },
    { path: '/client/tour', redirect: '/client/danh-muc-tour' },
    { path: '/client/dat-tour', redirect: '/client/don-dat-thanh-toan' },
    { path: '/client/lich-su', redirect: '/client/don-dat-thanh-toan' },
    { path: '/client/yeu-thich', redirect: '/client/diem-den-yeu-thich' },
    { path: '/client/danh-gia', redirect: '/client/danh-gia-gop-y' },
    { path: '/client/bao-cao-loi', redirect: '/client/bao-cao-su-co' },
    { path: '/client/profile', redirect: '/client/ho-so-so-thich' },
    { path: '/client/tai-khoan', redirect: '/client/ho-so-so-thich' },

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
        component: () => import('../components/Admin/Dashboard/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/chuc-vu',
        component: () => import('../components/Admin/ChucVu/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/phan-quyen',
        component: () => import('../components/admin/phan-quyen/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/chuc-nang',
        component: () => import('../components/Admin/ChucNang/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/nguoi-dung',
        component: () => import('../components/Admin/NguoiDung/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tai-khoan-admin',
        component: () => import('../components/Admin/TaiKhoanAdmin/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/doi-tac',
        component: () => import('../components/Admin/DoiTac/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/kiem-duyet-dia-diem',
        component: () => import('../components/Admin/KiemDuyetDiaDiem/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tour',
        component: () => import('../components/Admin/Tour/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/danh-gia',
        component: () => import('../components/Admin/DanhGia/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tai-chinh',
        component: () => import('../components/Admin/TaiChinh/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/thong-ke',
        component: () => import('../components/Admin/ThongKe/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tag',
        component: () => import('../components/Admin/Tag/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/voucher',
        component: () => import('../components/Admin/Voucher/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/bao-cao-loi',
        component: () => import('../components/Admin/BaoCaoLoi/index.vue'),
        meta: { layout: 'admin' }
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router;