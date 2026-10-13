<template>
    <div class="admin-page-container">
        <!-- 1. Breadcrumb & Database Sync Pill -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý Admin</span>
            </nav>
            <div class="sync-pill d-flex align-items-center gap-1">
                <span class="dot-green"></span>
                <span class="font-11 text-success fw-semibold">Cơ sở dữ liệu: Hoạt động đồng bộ</span>
            </div>
        </div>

        <!-- 2. Page Header Title & Action Button -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
            <div>
                <div class="d-flex align-items-center gap-2">
                    <h3 class="fw-bold text-dark mb-0">Quản lý Admin</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: admins</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Quản lý tài khoản quản trị viên và chức vụ của từng Admin.
                </p>
            </div>
            <div>
                <button
                    class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1"
                    data-bs-toggle="modal" data-bs-target="#themMoiModal">
                    <i class="bx bx-user-plus font-18"></i> Thêm Admin
                </button>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards (Giống hệt hình chụp) -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <!-- Card 1: Tổng số admin -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG SỐ ADMIN</span>
                            <h2 class="fw-bold text-dark my-1">{{ list_admin.length < 10 ? '0' + list_admin.length :
                                    list_admin.length }}</h2>
                                    <small class="text-primary font-11">Đồng bộ từ bảng admins</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary">
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Đang hoạt động -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐANG HOẠT ĐỘNG</span>
                            <h2 class="fw-bold text-success my-1">{{ countActive < 10 ? '0' + countActive : countActive
                                    }}</h2>
                                    <small class="text-muted font-11">Trạng thái Is_block: false</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success">
                            <i class="bx bx-check"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Đã khóa -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐÃ KHÓA</span>
                            <h2 class="fw-bold text-danger my-1">{{ countBlocked < 10 ? '0' + countBlocked :
                                    countBlocked }}</h2>
                                    <small class="text-danger font-11">Trạng thái Is_block: true</small>
                        </div>
                        <div class="kpi-icon-box bg-light-danger text-danger">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Chức vụ áp dụng -->
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">CHỨC VỤ ÁP DỤNG</span>
                            <h2 class="fw-bold text-dark my-1">{{ list_chuc_vu.length < 10 ? '0' + list_chuc_vu.length :
                                    list_chuc_vu.length }}</h2>
                                    <small class="text-primary font-11">Khóa ngoại Ma_chuc_vu</small>
                        </div>
                        <div class="kpi-icon-box bg-light-info text-info">
                            <i class="bx bx-shield-quarter"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Filter Bar: Thanh tìm kiếm nhanh và các bộ lọc chức vụ, trạng thái -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
            <div class="row g-2 align-items-center">
                <!-- Ô tìm kiếm kèm nút kính lúp ở phía sau -->
                <div class="col-md-5">
                    <div class="input-group input-group-sm">
                        <input type="search" name="search_admin_keyword" autocomplete="off"
                            class="form-control shadow-none" v-model="key_search"
                            placeholder="Tìm kiếm theo mã, họ tên...">
                        <!-- Nút kính lúp ở sau ô tìm kiếm -->
                        <button class="btn btn-primary px-3" type="button" title="Tìm kiếm">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                </div>
                <!-- Bộ lọc theo danh mục chức vụ -->
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterRole">
                        <option value="">Tất cả chức vụ</option>
                        <option v-for="(cv, index) in list_chuc_vu" :key="index" :value="cv.ma_chuc_vu">
                            {{ cv.ten_chuc_vu }}
                        </option>
                    </select>
                </div>
                <!-- Bộ lọc theo trạng thái hoạt động -->
                <div class="col-md-2">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Hoạt động</option>
                        <option value="blocked">Đã khóa</option>
                    </select>
                </div>
                <!-- Hiển thị tổng số lượng admin khớp điều kiện lọc -->
                <div class="col-md-2 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ list_admin_loc.length
                            }}</strong> quản trị viên</span>
                </div>
            </div>
        </div>

        <!-- 5. Admins Data Table (Giống hệt hình chụp) -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-center align-middle">
                        <tr>
                            <th width="5%">#</th>
                            <th width="12%">MÃ ADMIN</th>
                            <th width="20%" class="text-start">HỌ VÀ TÊN</th>
                            <th width="22%" class="text-start">EMAIL</th>
                            <th width="15%">CHỨC VỤ</th>
                            <th width="12%">TRẠNG THÁI</th>
                            <th width="14%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(admin, index) in list_admin_loc" :key="index">
                            <td class="text-center align-middle">{{ index + 1 }}</td>
                            <td class="text-center align-middle">
                                <strong class="text-primary font-13 font-monospace">{{ admin.ma_admin }}</strong>
                            </td>
                            <td class="align-middle fw-bold text-dark">
                                {{ admin.ho_va_ten }}
                            </td>
                            <td class="align-middle text-muted font-monospace small">
                                {{ admin.email }}
                            </td>
                            <td class="text-center align-middle">
                                <span class="badge" :class="getRoleBadge(admin.ten_chuc_vu)">
                                    <i class="bx bx-shield-quarter me-1 font-11"></i>{{ admin.ten_chuc_vu }}
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <button v-on:click="changeStatus(admin)" v-if="!admin.is_block"
                                    class="btn btn-sm btn-success">
                                    Hoạt động
                                </button>
                                <button v-on:click="changeStatus(admin)" v-else class="btn btn-sm btn-secondary">
                                    Đã khóa
                                </button>
                            </td>
                            <td class="text-center align-middle">
                                <button v-on:click="Object.assign(edit_admin, admin)"
                                    class="btn btn-primary btn-sm me-1" data-bs-toggle="modal"
                                    data-bs-target="#capNhatModal">
                                    Cập nhật
                                </button>
                                <button v-on:click="Object.assign(delete_admin, admin)" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#xoaModal">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- 6. Pagination Footer -->
            <div class="d-flex flex-wrap align-items-center justify-content-between pt-4 border-top mt-3 gap-2">
                <span class="small text-muted">Trang 1 trên 1 (Dữ liệu đồng bộ Database)</span>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                        <li class="page-item active"><a class="page-link bg-primary border-primary" href="#">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">Sau</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- 1. Modal Thêm Mới Admin -->
        <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="themMoiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="themMoiModalLabel">
                            <i class="bx bx-user-plus me-1"></i>Thêm Mới Tài Khoản Admin
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Admin</label>
                            <input v-model="add_admin.ma_admin" type="text" class="form-control form-control-sm"
                                placeholder="VD: AD05 (Để trống để tự sinh)">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Họ và tên</label>
                            <input v-model="add_admin.ho_va_ten" type="text" class="form-control form-control-sm"
                                placeholder="Nhập họ và tên...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Email đăng nhập</label>
                            <input v-model="add_admin.email" type="email" autocomplete="off"
                                class="form-control form-control-sm" placeholder="admin@danangtravel.vn">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mật khẩu</label>
                            <input v-model="add_admin.mat_khau" type="password" autocomplete="new-password"
                                class="form-control form-control-sm" placeholder="Nhập mật khẩu (Mặc định 123456)">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Chức vụ</label>
                            <select v-model="add_admin.ma_chuc_vu" class="form-select form-select-sm">
                                <option v-for="cv in list_chuc_vu" :key="cv.ma_chuc_vu" :value="cv.ma_chuc_vu">
                                    {{ cv.ten_chuc_vu }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Trạng thái</label>
                            <select v-model="add_admin.is_block" class="form-select form-select-sm">
                                <option :value="0">Hoạt động</option>
                                <option :value="1">Đã khóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="themMoiAdmin()" type="button" class="btn btn-primary btn-sm px-3"
                            data-bs-dismiss="modal">Thêm Admin</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Modal Cập Nhật Admin -->
        <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="capNhatModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 text-white" id="capNhatModalLabel">
                            <i class="bx bx-edit me-1"></i>Cập Nhật Tài Khoản Admin
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mã Admin</label>
                            <input v-model="edit_admin.ma_admin" type="text"
                                class="form-control form-control-sm bg-light" disabled>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Họ và tên</label>
                            <input v-model="edit_admin.ho_va_ten" type="text" class="form-control form-control-sm"
                                placeholder="Nhập họ và tên...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Email đăng nhập</label>
                            <input v-model="edit_admin.email" type="email" autocomplete="off"
                                class="form-control form-control-sm" placeholder="admin@danangtravel.vn">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Mật khẩu mới</label>
                            <input v-model="edit_admin.mat_khau" type="password" autocomplete="new-password"
                                class="form-control form-control-sm" placeholder="Để trống nếu không đổi mật khẩu">
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Chức vụ</label>
                            <select v-model="edit_admin.ma_chuc_vu" class="form-select form-select-sm">
                                <option v-for="cv in list_chuc_vu" :key="cv.ma_chuc_vu" :value="cv.ma_chuc_vu">
                                    {{ cv.ten_chuc_vu }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Trạng thái</label>
                            <select v-model="edit_admin.is_block" class="form-select form-select-sm">
                                <option :value="0">Hoạt động</option>
                                <option :value="1">Đã khóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="capNhatAdmin()" type="button" class="btn btn-primary btn-sm px-3"
                            data-bs-dismiss="modal">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Modal Xác Nhận Xóa Admin -->
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="xoaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5 text-white" id="xoaModalLabel">
                            <i class="bx bx-trash me-1"></i>Xác Nhận Xóa Admin
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 mb-0" role="alert">
                            <i class='bx bx-error-circle me-1 fs-5 align-middle'></i>
                            Bạn có chắc chắn muốn xóa tài khoản Admin <strong>{{ delete_admin.ho_va_ten ||
                                delete_admin.ho_ten }}</strong> (Mã:
                            <code>{{ delete_admin.ma_admin || delete_admin.ma }}</code>) không? Hành động này không thể
                            hoàn tác!
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                        <button v-on:click="xoaAdmin()" type="button" class="btn btn-danger btn-sm px-3"
                            data-bs-dismiss="modal">Xác nhận xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from '@/axios';

export default {
    name: 'AdminTaiKhoanAdmin',
    // 1. Khai báo các biến trạng thái (state) của component
    data() {
        return {
            // Từ khóa tìm kiếm nhanh
            key_search: '',

            // Bộ lọc chọn chức vụ và trạng thái
            filterRole: '',
            filterStatus: '',

            // Danh sách admin lấy từ database
            list_admin: [],

            // Danh mục các chức vụ (lấy từ bảng chuc_vus)
            list_chuc_vu: [],

            // Object chứa dữ liệu khi thêm mới Admin
            add_admin: {
                ma_admin: '',
                ho_va_ten: '',
                email: '',
                mat_khau: '',
                ma_chuc_vu: 'CV01',
                is_block: 0,
            },

            // Object chứa dữ liệu của admin đang được chọn để cập nhật
            edit_admin: {
                ma_admin: '',
                ho_va_ten: '',
                email: '',
                mat_khau: '',
                ma_chuc_vu: 'CV01',
                is_block: 0,
            },

            // Object chứa thông tin admin đang được chọn để xác nhận xóa
            delete_admin: {
                ma_admin: '',
                ho_va_ten: '',
                email: '',
            },
        }
    },

    // 2. Các thuộc tính tính toán (Computed Properties)
    computed: {
        // Đếm tổng số admin đang ở trạng thái Hoạt động (is_block == 0)
        countActive() {
            return this.list_admin.filter(a => !a.is_block).length;
        },

        // Đếm tổng số admin đang ở trạng thái Đã khóa (is_block == 1)
        countBlocked() {
            return this.list_admin.filter(a => !!a.is_block).length;
        },

        // Danh sách Admin được lọc đa điều kiện: từ khóa tìm kiếm (không dấu, không phân biệt hoa thường), chức vụ, trạng thái
        list_admin_loc() {
            let list = this.list_admin;

            // Bước 1: Lọc theo chức vụ được chọn
            if (this.filterRole) {
                list = list.filter(item => (item.ten_chuc_vu === this.filterRole || item.ma_chuc_vu === this.filterRole));
            }

            // Bước 2: Lọc theo trạng thái (active: đang hoạt động, blocked: đã khóa)
            if (this.filterStatus) {
                list = list.filter(item => (this.filterStatus === 'active' ? !item.is_block : !!item.is_block));
            }

            // Bước 3: Nếu ô tìm kiếm rỗng, trả về danh sách sau khi đã lọc theo chức vụ và trạng thái
            if (!this.key_search) {
                return list;
            }

            // Bước 4: Chuẩn hóa từ khóa tìm kiếm (xóa dấu tiếng Việt, chuyển chữ thường)
            let kw = this.removeVietnameseTones(this.key_search);

            // Bước 5: Tìm kiếm đối chiếu không phân biệt hoa thường và không phân biệt có dấu / không dấu
            return list.filter((item) => {
                let maAdmin = this.removeVietnameseTones(item.ma_admin);
                let hoVaTen = this.removeVietnameseTones(item.ho_va_ten);
                let email = this.removeVietnameseTones(item.email);
                let tenChucVu = this.removeVietnameseTones(item.ten_chuc_vu);

                return maAdmin.includes(kw) || hoVaTen.includes(kw) || email.includes(kw) || tenChucVu.includes(kw);
            });
        },

        // Alias tương thích cho danh sách admin đã lọc
        filteredAdmins() {
            return this.list_admin_loc;
        }
    },

    // 3. Vòng đời component: gọi API lấy dữ liệu ngay khi giao diện được tải (mounted)
    mounted() {
        this.loadData();    // Tải danh sách tài khoản admin
        this.loadChucVu();  // Tải danh mục chức vụ đổ vào các dropdown select
    },

    // 4. Các hàm xử lý hành động (Methods)
    methods: {
        // Hàm tiện ích: Loại bỏ toàn bộ dấu tiếng Việt và chuyển sang chữ thường (hỗ trợ tìm kiếm linh hoạt)
        removeVietnameseTones(str) {
            if (!str) return '';
            return String(str)
                .normalize('NFD')                  // Tách các ký tự có dấu thành ký tự gốc + dấu
                .replace(/[\u0300-\u036f]/g, '')   // Xóa bỏ tất cả các dấu thanh
                .replace(/[đĐ]/g, 'd')             // Chuyển ký tự đ, Đ thành d
                .toLowerCase()                     // Chuyển toàn bộ về chữ thường
                .trim();
        },

        // Định dạng màu sắc badge hiển thị theo vai trò/chức vụ
        getRoleBadge(role) {
            if (!role) return 'bg-secondary-subtle text-secondary border';
            if (role.includes('cấp cao') || role.includes('Super')) return 'bg-primary-subtle text-primary border border-primary-subtle';
            if (role.includes('đối tác') || role.includes('Manager')) return 'bg-info-subtle text-info border border-info-subtle';
            return 'bg-secondary-subtle text-secondary border';
        },

        // Gọi API lấy danh sách toàn bộ tài khoản Admin từ máy chủ
        loadData() {
            api.get('/api/admin/tai-khoan-admin/get-data')
                .then(response => {
                    this.list_admin = response.data.data;
                })
                .catch(error => {
                    console.error('Lỗi khi tải danh sách admin:', error);
                });
        },

        // Gọi API lấy danh mục các Chức Vụ từ máy chủ để hiển thị trên select option
        loadChucVu() {
            api.get('/api/admin/chuc-vu/get-data')
                .then(response => {
                    if (response.data.status && response.data.data) {
                        this.list_chuc_vu = response.data.data;
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi tải danh mục chức vụ:', error);
                });
        },

        // Gọi API thêm mới tài khoản Admin
        themMoiAdmin() {
            api.post('/api/admin/tai-khoan-admin/store', this.add_admin)
                .then(response => {
                    if (response.data.status) {
                        this.$toast.success(response.data.message);
                        this.loadData(); // Tải lại bảng dữ liệu sau khi thêm mới
                        // Reset lại form thêm mới về trạng thái ban đầu
                        this.add_admin = {
                            ma_admin: '',
                            ho_va_ten: '',
                            email: '',
                            mat_khau: '',
                            ma_chuc_vu: this.list_chuc_vu.length > 0 ? this.list_chuc_vu[0].ma_chuc_vu : 'CV01',
                            is_block: 0,
                        };
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
                .catch(error => {
                    console.error(error);
                    if (error.response && error.response.data) {
                        this.$toast.error(error.response.data.message || "Có lỗi xảy ra!");
                    } else {
                        this.$toast.error("Không thể kết nối đến máy chủ!");
                    }
                });
        },

        // Gọi API cập nhật thông tin tài khoản Admin
        capNhatAdmin() {
            api.post('/api/admin/tai-khoan-admin/update', this.edit_admin)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData(); // Tải lại bảng dữ liệu sau khi cập nhật
                        // Reset lại đối tượng cập nhật
                        this.edit_admin = {
                            ma_admin: '',
                            ho_va_ten: '',
                            email: '',
                            mat_khau: '',
                            ma_chuc_vu: this.list_chuc_vu.length > 0 ? this.list_chuc_vu[0].ma_chuc_vu : 'CV01',
                            is_block: 0,
                        };
                    } else {
                        this.$toast.error(res.data.message || "Cập nhật admin thất bại");
                    }
                })
                .catch(error => {
                    console.error(error);
                    if (error.response && error.response.data) {
                        this.$toast.error(error.response.data.message || "Có lỗi xảy ra!");
                    } else {
                        this.$toast.error("Không thể kết nối đến máy chủ!");
                    }
                });
        },

        // Gọi API xóa mềm (Soft Delete) tài khoản Admin
        xoaAdmin() {
            api.post('/api/admin/tai-khoan-admin/delete', this.delete_admin)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData(); // Tải lại bảng dữ liệu sau khi xóa
                        this.delete_admin = {
                            ma_admin: '',
                            ho_va_ten: '',
                        };
                    } else {
                        this.$toast.error(res.data.message || "Xóa admin thất bại");
                    }
                })
                .catch(error => {
                    console.error(error);
                    if (error.response && error.response.data) {
                        this.$toast.error(error.response.data.message || "Có lỗi xảy ra!");
                    } else {
                        this.$toast.error("Không thể kết nối đến máy chủ!");
                    }
                });
        },

        // Gọi API thay đổi trạng thái hoạt động (Khóa ⇄ Mở khóa)
        changeStatus(admin) {
            api.post('/api/admin/tai-khoan-admin/change-status', admin)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.loadData(); // Tải lại dữ liệu để cập nhật màu sắc nút trạng thái
                    } else {
                        this.$toast.error(res.data.message || "Đổi trạng thái thất bại");
                    }
                })
                .catch(error => {
                    console.error(error);
                    if (error.response && error.response.data) {
                        this.$toast.error(error.response.data.message || "Có lỗi xảy ra!");
                    } else {
                        this.$toast.error("Không thể kết nối đến máy chủ!");
                    }
                });
        },
    }
}

</script>

<style scoped>
.sync-pill {
    background-color: #f0fdf4;
    border: 1px solid #bbf7d0;
    padding: 4px 12px;
    border-radius: 999px;
}

.dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #22c55e;
}

.kpi-icon-box {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.bg-light-primary {
    background-color: #e0f2fe;
}

.bg-light-success {
    background-color: #dcfce7;
}

.bg-light-danger {
    background-color: #fee2e2;
}

.bg-light-info {
    background-color: #e0f2fe;
}

.btn-action {
    width: 28px;
    height: 28px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    transition: all 0.15s;
}

.btn-action:hover {
    background-color: #f1f5f9;
    color: #0284c7 !important;
}
</style>
