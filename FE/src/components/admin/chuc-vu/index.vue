<template>
    <div class="admin-page-container">
        <!-- 1. Breadcrumb & Database Sync Pill -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý chức vụ</span>
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
                    <h3 class="fw-bold text-dark mb-0">Quản lý Chức Vụ</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: chuc_vus</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Định nghĩa các vị trí chức danh và vai trò trách nhiệm trong bộ máy quản trị hệ thống.
                </p>
            </div>
            <div>
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="moModalThem">
                    <i class="bx bx-plus font-18"></i> + Thêm Chức Vụ
                </button>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG SỐ CHỨC VỤ</span>
                            <h2 class="fw-bold text-dark my-1">05</h2>
                            <small class="text-primary font-11">Đồng bộ từ bảng chuc_vus</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-badge-check"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐANG ÁP DỤNG</span>
                            <h2 class="fw-bold text-success my-1">04</h2>
                            <small class="text-muted font-11">Trạng thái Is_active: true</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-circle"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">NHÂN SỰ THỰC TẾ</span>
                            <h2 class="fw-bold text-dark my-1">18</h2>
                            <small class="text-primary font-11">Liên kết bảng admins</small>
                        </div>
                        <div class="kpi-icon-box bg-light-info text-info"><i class="bx bx-group"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">QUYỀN HẠN HỆ THỐNG</span>
                            <h2 class="fw-bold text-warning my-1">100%</h2>
                            <small class="text-muted font-11">Phân quyền RBAC chuẩn</small>
                        </div>
                        <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-shield-quarter"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Filter Bar -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo tên chức vụ hoặc nhiệm vụ...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="1">Đang hoạt động</option>
                        <option value="0">Tạm khóa</option>
                    </select>
                </div>
                <div class="col-md-4 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ filteredList.length }}</strong> chức vụ</span>
                </div>
            </div>
        </div>

        <!-- 5. Data Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th width="8%" class="text-center">#</th>
                            <th width="24%">TÊN CHỨC VỤ</th>
                            <th width="32%">MÔ TẢ NHIỆM VỤ</th>
                            <th width="14%" class="text-center">SỐ NHÂN SỰ</th>
                            <th width="12%" class="text-center">TRẠNG THÁI</th>
                            <th width="10%" class="text-end">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in filteredList" :key="item.id">
                            <td class="text-center fw-bold">{{ index + 1 }}</td>
                            <td>
                                <strong class="text-dark">{{ item.ten_chuc_vu }}</strong>
                                <small class="text-muted d-block font-monospace font-11">CODE: {{ item.code }}</small>
                            </td>
                            <td class="text-muted small">{{ item.mo_ta }}</td>
                            <td class="text-center">
                                <span class="badge bg-light-primary text-primary px-3 py-1 font-12">{{ item.so_nhan_su }} nhân sự</span>
                            </td>
                            <td class="text-center">
                                <span v-if="item.trang_thai === 1" class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11">● Hoạt động</span>
                                <span v-else class="badge bg-secondary-subtle text-secondary px-2 py-1 rounded-pill font-11">● Tạm khóa</span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <router-link to="/admin/phan-quyen" class="btn btn-sm btn-action text-secondary" title="Phân quyền">
                                        <i class="bx bx-shield-quarter"></i>
                                    </router-link>
                                    <button class="btn btn-sm btn-action text-secondary" title="Sửa" @click="suaChucVu(item)">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-action text-secondary" title="Xóa" @click="xoaChucVu(item)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Thêm/Sửa Chức Vụ -->
        <div class="modal fade show d-block" tabindex="-1" v-if="showModal" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow-lg">
                    <div class="modal-header border-bottom p-3 px-4">
                        <h5 class="modal-title fw-bold text-dark">{{ isEdit ? 'Cập Nhật Chức Vụ' : 'Thêm Chức Vụ Mới' }}</h5>
                        <button type="button" class="btn-close" @click="showModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tên Chức Vụ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.ten_chuc_vu" placeholder="Nhập tên chức vụ...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mã Code Chức Vụ</label>
                            <input type="text" class="form-control text-uppercase" v-model="form.code" placeholder="VD: ADMIN_LEAD">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mô Tả Nhiệm Vụ</label>
                            <textarea class="form-control" rows="3" v-model="form.mo_ta" placeholder="Mô tả phạm vi quyền hạn..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-3" @click="showModal = false">Hủy</button>
                        <button type="button" class="btn btn-primary rounded-3 px-4 fw-semibold" @click="luuChucVu">Lưu Chức Vụ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AdminChucVu',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            showModal: false,
            isEdit: false,
            form: { id: null, ten_chuc_vu: '', code: '', mo_ta: '', so_nhan_su: 0, trang_thai: 1 },
            roles: [
                { id: 1, code: 'SUPER_ADMIN', ten_chuc_vu: 'Super Admin (Quản Trị Tối Cao)', mo_ta: 'Toàn quyền cấu hình máy chủ, phân quyền và dữ liệu hệ thống', so_nhan_su: 3, trang_thai: 1 },
                { id: 2, code: 'CONTENT_MANAGER', ten_chuc_vu: 'Quản Lý Nội Dung & Tour', mo_ta: 'Kiểm duyệt địa điểm, quản lý thông tin tour và các gói khuyến mãi', so_nhan_su: 6, trang_thai: 1 },
                { id: 3, code: 'ACCOUNTANT', ten_chuc_vu: 'Kế Toán & Đối Soát', mo_ta: 'Quản lý tài chính, giao dịch thanh toán và đối soát hoa hồng đối tác', so_nhan_su: 4, trang_thai: 1 },
                { id: 4, code: 'SUPPORT_LEAD', ten_chuc_vu: 'Chăm Sóc Khách Hàng (Support)', mo_ta: 'Tiếp nhận xử lý báo cáo lỗi, giải đáp thắc mắc và đánh giá của khách', so_nhan_su: 5, trang_thai: 1 },
                { id: 5, code: 'TESTER_DEV', ten_chuc_vu: 'Kỹ Thuật Viên Vận Hành', mo_ta: 'Giám sát hệ thống API và máy chủ vận hành 24/7', so_nhan_su: 0, trang_thai: 0 }
            ]
        }
    },
    computed: {
        filteredList() {
            return this.roles.filter(r => {
                const matchSearch = r.ten_chuc_vu.toLowerCase().includes(this.searchQuery.toLowerCase()) || r.mo_ta.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchStatus = this.filterStatus === '' || r.trang_thai === parseInt(this.filterStatus);
                return matchSearch && matchStatus;
            });
        }
    },
    methods: {
        moModalThem() {
            this.isEdit = false;
            this.form = { id: Date.now(), ten_chuc_vu: '', code: '', mo_ta: '', so_nhan_su: 0, trang_thai: 1 };
            this.showModal = true;
        },
        suaChucVu(item) {
            this.isEdit = true;
            this.form = { ...item };
            this.showModal = true;
        },
        luuChucVu() {
            if (!this.form.ten_chuc_vu) {
                alert('Vui lòng nhập tên chức vụ!');
                return;
            }
            if (this.isEdit) {
                const idx = this.roles.findIndex(r => r.id === this.form.id);
                if (idx !== -1) this.roles[idx] = { ...this.form };
            } else {
                this.roles.push({ ...this.form });
            }
            this.showModal = false;
            alert('Lưu chức vụ thành công!');
        },
        xoaChucVu(item) {
            if (confirm(`Bạn có chắc muốn xóa chức vụ "${item.ten_chuc_vu}"?`)) {
                this.roles = this.roles.filter(r => r.id !== item.id);
            }
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
.bg-light-primary { background-color: #e0f2fe; }
.bg-light-success { background-color: #dcfce7; }
.bg-light-info { background-color: #e0f2fe; }
.bg-light-warning { background-color: #fef3c7; }
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
