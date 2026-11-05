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
    // 1. TÁC NHÂN: CLIENT / KHÁCH HÀNG — Layout 'client'
    // =========================================================
    {
        path: '/',
        component: () => import('../components/khachhang/TrangChu/index.vue'),
        meta: { layout: 'blank' }
    },
    {
        path: '/client/home',
        component: () => import('../components/khachhang/TrangChu/index.vue'),
        meta: { layout: 'blank' }
    },

    // 1.1 — Khám Phá & Bản Đồ
    {
        path: '/client/kham-pha-dia-diem',
        component: () => import('../components/khachhang/KhamPhaDiaDiem/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/chi-tiet-danh-gia',
        component: () => import('../components/khachhang/ChiTietDanhGia/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/ban-do-tuong-tac',
        component: () => import('../components/khachhang/ChiTietDanhGia/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/danh-muc-tour',
        component: () => import('../components/khachhang/DanhMucTour/index.vue'),
        meta: { layout: 'client' }
    },

    // 1.2 — Lập Kế Hoạch AI (Trọng tâm)
    {
        path: '/client/ai-travel-planner',
        component: () => import('../components/khachhang/AiTravelPlanner/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/lich-trinh-toi-uu',
        component: () => import('../components/khachhang/LichTrinhToiUu/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/lich-su-ke-hoach',
        component: () => import('../components/khachhang/LichSuKeHoach/index.vue'),
        meta: { layout: 'client' }
    },

    // 1.3 — Trải Nghiệm & Giao Dịch
    {
        path: '/client/don-dat-thanh-toan',
        component: () => import('../components/khachhang/DonDatThanhToan/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/diem-den-yeu-thich',
        component: () => import('../components/khachhang/DiemDenYeuThich/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/quan-ly-don-dat-tour',
        component: () => import('../components/khachhang/QuanLyDonDatTour/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/danh-gia-gop-y',
        redirect: '/client/quan-ly-don-dat-tour'
    },
    {
        path: '/client/bao-cao-su-co',
        component: () => import('../components/khachhang/BaoCaoSuCo/index.vue'),
        meta: { layout: 'client' }
    },

    // 1.4 — Cá Nhân
    {
        path: '/client/ho-so-so-thich',
        component: () => import('../components/khachhang/HoSoSoThich/index.vue'),
        meta: { layout: 'client' }
    },
    {
        path: '/client/bao-mat-tai-khoan',
        component: () => import('../components/khachhang/BaoMatTaiKhoan/index.vue'),
        meta: { layout: 'client' }
    },

    // Aliases & Fallbacks (hỗ trợ cả /client/... và /khach-hang/...)
    { path: '/khach-hang', redirect: '/' },
    { path: '/khach-hang/trang-chu', redirect: '/' },
    { path: '/khach-hang/home', redirect: '/' },
    { path: '/khach-hang/kham-pha-dia-diem', redirect: '/client/kham-pha-dia-diem' },
    { path: '/khach-hang/chi-tiet-danh-gia', redirect: '/client/chi-tiet-danh-gia' },
    { path: '/khach-hang/ban-do-tuong-tac', redirect: '/client/ban-do-tuong-tac' },
    { path: '/khach-hang/danh-muc-tour', redirect: '/client/danh-muc-tour' },
    { path: '/khach-hang/ai-travel-planner', redirect: '/client/ai-travel-planner' },
    { path: '/khach-hang/lich-trinh-toi-uu', redirect: '/client/lich-trinh-toi-uu' },
    { path: '/khach-hang/lich-su-ke-hoach', redirect: '/client/lich-su-ke-hoach' },
    { path: '/khach-hang/don-dat-thanh-toan', redirect: '/client/don-dat-thanh-toan' },
    { path: '/khach-hang/diem-den-yeu-thich', redirect: '/client/diem-den-yeu-thich' },
    { path: '/khach-hang/quan-ly-don-dat-tour', redirect: '/client/quan-ly-don-dat-tour' },
    { path: '/khach-hang/danh-gia-gop-y', redirect: '/client/quan-ly-don-dat-tour' },
    { path: '/khach-hang/bao-cao-su-co', redirect: '/client/bao-cao-su-co' },
    { path: '/khach-hang/ho-so-so-thich', redirect: '/client/ho-so-so-thich' },
    { path: '/khach-hang/bao-mat-tai-khoan', redirect: '/client/bao-mat-tai-khoan' },

    // Aliases & Fallbacks
    { path: '/client/tim-kiem-dia-diem', redirect: '/client/kham-pha-dia-diem' },
    { path: '/client/chi-tiet-dia-diem', redirect: '/client/kham-pha-dia-diem' },
    { path: '/client/lap-ke-hoach-ai', redirect: '/client/ai-travel-planner' },
    { path: '/client/ke-hoach', redirect: '/client/lich-su-ke-hoach' },
    { path: '/client/tour', redirect: '/client/danh-muc-tour' },
    { path: '/client/dat-tour', redirect: '/client/don-dat-thanh-toan' },
    { path: '/client/lich-su', redirect: '/client/don-dat-thanh-toan' },
    { path: '/client/yeu-thich', redirect: '/client/diem-den-yeu-thich' },
    { path: '/client/quan-ly-don-tour', redirect: '/client/quan-ly-don-dat-tour' },
    { path: '/client/danh-gia', redirect: '/client/quan-ly-don-dat-tour' },
    { path: '/client/bao-cao-loi', redirect: '/client/bao-cao-su-co' },
    { path: '/client/profile', redirect: '/client/ho-so-so-thich' },
    { path: '/client/tai-khoan', redirect: '/client/ho-so-so-thich' },

    // =========================================================
    // 2. TÁC NHÂN: DOITAC (ĐỐI TÁC) — Layout 'doitac'
    // =========================================================
    { path: '/doitac', redirect: '/doitac/thong-ke' },
    { path: '/doitac/login', redirect: '/login' },

    // Nhóm 1: TỔNG QUAN
    {
        path: '/doitac/thong-ke',
        component: () => import('../components/doitac/ThongKeKinhDoanh/index.vue'),
        meta: { layout: 'doitac' }
    },
    { path: '/doitac/dashboard', redirect: '/doitac/thong-ke' },

    // Nhóm 2: SẢN PHẨM & DỊCH VỤ
    {
        path: '/doitac/tour-du-lich',
        component: () => import('../components/doitac/QuanLyTourDuLich/index.vue'),
        meta: { layout: 'doitac' }
    },
    { path: '/doitac/tour-dich-vu', redirect: '/doitac/tour-du-lich' },
    {
        path: '/doitac/tuyen-diem-tap-trung',
        component: () => import('../components/doitac/TuyenDiemTapTrung/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/lich-khoi-hanh',
        component: () => import('../components/doitac/LichKhoiHanh/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/de-xuat-dia-diem',
        component: () => import('../components/doitac/DeXuatDiaDiem/index.vue'),
        meta: { layout: 'doitac' }
    },
    { path: '/doitac/dia-diem', redirect: '/doitac/de-xuat-dia-diem' },

    // Nhóm 3: VẬN HÀNH & KHÁCH HÀNG
    {
        path: '/doitac/xu-ly-dat-tour',
        component: () => import('../components/doitac/XuLyDatTour/index.vue'),
        meta: { layout: 'doitac' }
    },
    { path: '/doitac/don-hang', redirect: '/doitac/xu-ly-dat-tour' },
    {
        path: '/doitac/khach-hang',
        component: () => import('../components/doitac/KhachHang/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/voucher',
        component: () => import('../components/doitac/VoucherKhuyenMai/index.vue'),
        meta: { layout: 'doitac' }
    },
    {
        path: '/doitac/danh-gia',
        component: () => import('../components/doitac/DanhGiaNhanXet/index.vue'),
        meta: { layout: 'doitac' }
    },
    { path: '/doitac/thanh-toan', redirect: '/doitac/thong-ke' },

    // Nhóm 4: DOANH NGHIỆP
    {
        path: '/doitac/ho-so-doanh-nghiep',
        component: () => import('../components/doitac/HoSoDoanhNghiep/index.vue'),
        meta: { layout: 'doitac' }
    },
    { path: '/doitac/thong-tin-cong-ty', redirect: '/doitac/ho-so-doanh-nghiep' },
    {
        path: '/doitac/tai-khoan',
        component: () => import('../components/doitac/TaiKhoanBaoMat/index.vue'),
        meta: { layout: 'doitac' }
    },

    // Backward Compatibility cho URL cũ /partner/...
    { path: '/partner', redirect: '/doitac/thong-ke' },
    { path: '/partner/dashboard', redirect: '/doitac/thong-ke' },
    { path: '/partner/thong-ke', redirect: '/doitac/thong-ke' },
    { path: '/partner/tour-du-lich', redirect: '/doitac/tour-du-lich' },
    { path: '/partner/tour-dich-vu', redirect: '/doitac/tour-du-lich' },
    { path: '/partner/tuyen-diem-tap-trung', redirect: '/doitac/tuyen-diem-tap-trung' },
    { path: '/partner/lich-khoi-hanh', redirect: '/doitac/lich-khoi-hanh' },
    { path: '/partner/de-xuat-dia-diem', redirect: '/doitac/de-xuat-dia-diem' },
    { path: '/partner/dia-diem', redirect: '/doitac/de-xuat-dia-diem' },
    { path: '/partner/xu-ly-dat-tour', redirect: '/doitac/xu-ly-dat-tour' },
    { path: '/partner/don-hang', redirect: '/doitac/xu-ly-dat-tour' },
    { path: '/partner/khach-hang', redirect: '/doitac/khach-hang' },
    { path: '/partner/voucher', redirect: '/doitac/voucher' },
    { path: '/partner/danh-gia', redirect: '/doitac/danh-gia' },
    { path: '/partner/thanh-toan', redirect: '/doitac/thanh-toan' },
    { path: '/partner/ho-so-doanh-nghiep', redirect: '/doitac/ho-so-doanh-nghiep' },
    { path: '/partner/thong-tin-cong-ty', redirect: '/doitac/ho-so-doanh-nghiep' },
    { path: '/partner/tai-khoan', redirect: '/doitac/tai-khoan' },

    // =========================================================
    // 3. TÁC NHÂN: ADMIN (QUẢN TRỊ VIÊN) — Layout 'admin'
    // =========================================================
    { path: '/admin', redirect: '/admin/thong-ke' },
    { path: '/admin/dashboard', redirect: '/admin/thong-ke' },

    // Nhóm 1: TỔNG QUAN
    {
        path: '/admin/thong-ke',
        component: () => import('../components/Admin/ThongKe/index.vue'),
        meta: { layout: 'admin' }
    },

    // Nhóm 2: TÀI KHOẢN & PHÂN QUYỀN
    {
        path: '/admin/tai-khoan-admin',
        component: () => import('../components/Admin/TaiKhoanAdmin/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/phan-quyen',
        component: () => import('../components/Admin/PhanQuyen/index.vue'),
        meta: { layout: 'admin' }
    },
    { path: '/admin/chuc-vu', redirect: '/admin/phan-quyen' },
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

    // Nhóm 3: ĐỐI TÁC & KIỂM DUYỆT
    {
        path: '/admin/doi-tac',
        component: () => import('../components/Admin/DoiTac/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/tour',
        component: () => import('../components/Admin/Tour/index.vue'),
        meta: { layout: 'admin' }
    },
    { path: '/admin/kiem-duyet-tour', redirect: '/admin/tour' },
    {
        path: '/admin/de-xuat-dia-diem',
        component: () => import('../components/Admin/DeXuatDiaDiem/index.vue'),
        meta: { layout: 'admin' }
    },
    { path: '/admin/kiem-duyet-dia-diem', redirect: '/admin/de-xuat-dia-diem' },
    {
        path: '/admin/danh-gia',
        component: () => import('../components/Admin/DanhGia/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/bao-cao-vi-pham',
        component: () => import('../components/Admin/BaoCaoViPham/index.vue'),
        meta: { layout: 'admin' }
    },
    { path: '/admin/bao-cao-loi', redirect: '/admin/bao-cao-vi-pham' },

    // Nhóm 4: KHO DỮ LIỆU ĐÀ NẴNG
    {
        path: '/admin/kho-dia-diem',
        component: () => import('../components/Admin/KhoDiaDiem/index.vue'),
        meta: { layout: 'admin' }
    },
    {
        path: '/admin/danh-muc-dia-diem',
        component: () => import('../components/Admin/DanhMucDiaDiem/index.vue'),
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

    // Nhóm 5: CẤU HÌNH & HỆ THỐNG
    {
        path: '/admin/thuat-toan-ai',
        component: () => import('../components/Admin/ThuatToanAi/index.vue'),
        meta: { layout: 'admin' }
    },
    { path: '/admin/tai-chinh', redirect: '/admin/thong-ke' },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router;