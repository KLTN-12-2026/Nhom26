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
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="moModalThem">
                    <i class="bx bx-user-plus font-18"></i> + Thêm Admin
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
                            <h2 class="fw-bold text-dark my-1">03</h2>
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
                            <h2 class="fw-bold text-success my-1">02</h2>
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
                            <h2 class="fw-bold text-danger my-1">01</h2>
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
                            <h2 class="fw-bold text-dark my-1">03</h2>
                            <small class="text-primary font-11">Khóa ngoại Ma_chuc_vu</small>
                        </div>
                        <div class="kpi-icon-box bg-light-info text-info">
                            <i class="bx bx-shield-quarter"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Filter Bar (Giống hệt hình chụp) -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm kiếm theo họ tên hoặc email...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterRole">
                        <option value="">Tất cả chức vụ</option>
                        <option value="Super Admin">Super Admin</option>
                        <option value="Content Manager">Content Manager</option>
                        <option value="Support Admin">Support Admin</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Hoạt động</option>
                        <option value="blocked">Đã khóa</option>
                    </select>
                </div>
                <div class="col-md-2 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ filteredAdmins.length }}</strong> quản trị viên</span>
                </div>
            </div>
        </div>

        <!-- 5. Admins Data Table (Giống hệt hình chụp) -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th width="12%">MÃ ADMIN</th>
                            <th width="20%">HỌ VÀ TÊN</th>
                            <th width="24%">EMAIL</th>
                            <th width="15%">CHỨC VỤ</th>
                            <th width="12%">TRẠNG THÁI</th>
                            <th width="12%">NGÀY TẠO</th>
                            <th class="text-end" width="10%">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="admin in filteredAdmins" :key="admin.id">
                            <td>
                                <strong class="text-primary font-13 font-monospace">{{ admin.ma }}</strong>
                            </td>
                            <td>
                                <strong class="text-dark">{{ admin.ho_ten }}</strong>
                            </td>
                            <td class="text-muted font-monospace small">
                                {{ admin.email }}
                            </td>
                            <td>
                                <span class="badge" :class="getRoleBadge(admin.chuc_vu)">
                                    <i class="bx bx-shield-quarter me-1 font-11"></i>{{ admin.chuc_vu }}
                                </span>
                            </td>
                            <td>
                                <span v-if="!admin.is_block" class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11">
                                    ● Hoạt động
                                </span>
                                <span v-else class="badge bg-danger-subtle text-danger px-2 py-1 rounded-pill font-11">
                                    ● Đã khóa
                                </span>
                            </td>
                            <td class="text-muted small">
                                {{ admin.ngay_tao }}
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-sm btn-action text-secondary" title="Xem" @click="xemAdmin(admin)">
                                        <i class="bx bx-show"></i>
                                    </button>
                                    <button class="btn btn-sm btn-action text-secondary" title="Sửa" @click="suaAdmin(admin)">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-action text-secondary" :title="admin.is_block ? 'Mở khóa' : 'Khóa'" @click="toggleBlock(admin)">
                                        <i class="bx" :class="admin.is_block ? 'bx-lock-open text-warning' : 'bx-lock'"></i>
                                    </button>
                                    <button class="btn btn-sm btn-action text-secondary" title="Xóa" @click="xoaAdmin(admin)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- 6. Pagination Footer -->
            <div class="d-flex flex-wrap align-items-center justify-content-between pt-4 border-top mt-3 gap-2">
                <span class="small text-muted">Trang 1 trên 1 (Dữ liệu mẫu chuẩn)</span>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                        <li class="page-item active"><a class="page-link bg-primary border-primary" href="#">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">Sau</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Modal Thêm / Sửa Admin -->
        <div class="modal fade show d-block" tabindex="-1" v-if="showModal" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow-lg">
                    <div class="modal-header border-bottom p-3 px-4">
                        <h5 class="modal-title fw-bold text-dark">
                            <i class="bx bx-user-pin text-primary me-2"></i>{{ isEdit ? 'Cập Nhật Tài Khoản Admin' : 'Thêm Admin Mới' }}
                        </h5>
                        <button type="button" class="btn-close" @click="showModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Mã Admin</label>
                                <input type="text" class="form-control" v-model="formAdmin.ma" placeholder="VD: AD004">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Chức Vụ</label>
                                <select class="form-select" v-model="formAdmin.chuc_vu">
                                    <option>Super Admin</option>
                                    <option>Content Manager</option>
                                    <option>Support Admin</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Họ Và Tên</label>
                                <input type="text" class="form-control" v-model="formAdmin.ho_ten" placeholder="Nhập họ và tên...">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Email Đăng Nhập</label>
                                <input type="email" class="form-control" v-model="formAdmin.email" placeholder="admin@danangtravel.vn">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-3" @click="showModal = false">Hủy</button>
                        <button type="button" class="btn btn-primary rounded-3 px-4 fw-semibold" @click="luuAdmin">
                            Lưu Dữ Liệu
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AdminTaiKhoanAdmin',
    data() {
        return {
            searchQuery: '',
            filterRole: '',
            filterStatus: '',
            showModal: false,
            isEdit: false,
            formAdmin: {
                id: null,
                ma: '',
                ho_ten: '',
                email: '',
                chuc_vu: 'Support Admin',
                is_block: false,
                ngay_tao: '2026-10-07'
            },
            admins: [
                { id: 1, ma: 'AD001', ho_ten: 'Nguyễn Văn Admin', email: 'admin@danangtravel.vn', chuc_vu: 'Super Admin', is_block: false, ngay_tao: '2025-01-10' },
                { id: 2, ma: 'AD002', ho_ten: 'Trần Minh Anh', email: 'manager@danangtravel.vn', chuc_vu: 'Content Manager', is_block: false, ngay_tao: '2025-01-12' },
                { id: 3, ma: 'AD003', ho_ten: 'Lê Quốc Huy', email: 'support@danangtravel.vn', chuc_vu: 'Support Admin', is_block: true, ngay_tao: '2025-01-18' }
            ]
        }
    },
    computed: {
        filteredAdmins() {
            return this.admins.filter(a => {
                const matchSearch = a.ho_ten.toLowerCase().includes(this.searchQuery.toLowerCase()) || a.email.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchRole = !this.filterRole || a.chuc_vu === this.filterRole;
                const matchStatus = !this.filterStatus || (this.filterStatus === 'active' ? !a.is_block : a.is_block);
                return matchSearch && matchRole && matchStatus;
            });
        }
    },
    methods: {
        getRoleBadge(role) {
            if (role === 'Super Admin') return 'bg-primary-subtle text-primary border border-primary-subtle';
            if (role === 'Content Manager') return 'bg-info-subtle text-info border border-info-subtle';
            return 'bg-secondary-subtle text-secondary border';
        },
        moModalThem() {
            this.isEdit = false;
            this.formAdmin = { id: Date.now(), ma: 'AD00' + (this.admins.length + 1), ho_ten: '', email: '', chuc_vu: 'Support Admin', is_block: false, ngay_tao: '2026-10-07' };
            this.showModal = true;
        },
        suaAdmin(admin) {
            this.isEdit = true;
            this.formAdmin = { ...admin };
            this.showModal = true;
        },
        luuAdmin() {
            if (!this.formAdmin.ho_ten || !this.formAdmin.email) {
                alert('Vui lòng điền họ tên và email!');
                return;
            }
            if (this.isEdit) {
                const idx = this.admins.findIndex(a => a.id === this.formAdmin.id);
                if (idx !== -1) this.admins[idx] = { ...this.formAdmin };
            } else {
                this.admins.push({ ...this.formAdmin });
            }
            this.showModal = false;
            alert('Lưu tài khoản admin thành công!');
        },
        toggleBlock(admin) {
            admin.is_block = !admin.is_block;
            alert(`Đã ${admin.is_block ? 'khóa' : 'mở khóa'} tài khoản ${admin.ho_ten}!`);
        },
        xoaAdmin(admin) {
            if (confirm(`Bạn có chắc chắn muốn xóa admin "${admin.ho_ten}"?`)) {
                this.admins = this.admins.filter(a => a.id !== admin.id);
            }
        },
        xemAdmin(admin) {
            alert(`Thông tin chi tiết: ${admin.ho_ten} (${admin.chuc_vu}) - Email: ${admin.email}`);
        }
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
