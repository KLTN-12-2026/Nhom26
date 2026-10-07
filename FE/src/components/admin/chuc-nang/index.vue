<template>
    <div class="admin-page-container">
        <!-- 1. Breadcrumb & Database Sync Pill -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý chức năng</span>
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
                    <h3 class="fw-bold text-dark mb-0">Quản lý Chức Năng Hệ Thống</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: chuc_nangs</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Khai báo danh mục các API endpoints, components và tính năng của nền tảng Smart Travel.
                </p>
            </div>
            <div>
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="moModalThem">
                    <i class="bx bx-plus font-18"></i> + Thêm Chức Năng
                </button>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG CHỨC NĂNG</span>
                            <h2 class="fw-bold text-dark my-1">14</h2>
                            <small class="text-primary font-11">Bao phủ toàn bộ hệ thống</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-layer"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐANG KÍCH HOẠT</span>
                            <h2 class="fw-bold text-success my-1">14</h2>
                            <small class="text-muted font-11">100% Sẵn sàng sử dụng</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-circle"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ROUTER FRONTEND</span>
                            <h2 class="fw-bold text-dark my-1">14</h2>
                            <small class="text-primary font-11">Routes VueJS 3</small>
                        </div>
                        <div class="kpi-icon-box bg-light-info text-info"><i class="bx bx-link-alt"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">API ENDPOINTS</span>
                            <h2 class="fw-bold text-warning my-1">48</h2>
                            <small class="text-muted font-11">RESTful Controller</small>
                        </div>
                        <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-code-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Filter Bar -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-6">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo tên chức năng, mã code, route path...">
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ filteredFunctions.length }}</strong> chức năng</span>
                </div>
            </div>
        </div>

        <!-- 5. Functions Data Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th width="8%" class="text-center">#</th>
                            <th width="24%">TÊN CHỨC NĂNG</th>
                            <th width="16%">MÃ CODE</th>
                            <th width="26%">ĐƯỜNG DẪN ROUTE</th>
                            <th width="14%" class="text-center">TRẠNG THÁI</th>
                            <th width="12%" class="text-end">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(fn, i) in filteredFunctions" :key="fn.id">
                            <td class="text-center fw-bold">{{ i + 1 }}</td>
                            <td>
                                <strong class="text-dark">{{ fn.name }}</strong>
                            </td>
                            <td><code class="text-primary">{{ fn.code }}</code></td>
                            <td class="font-monospace small text-muted">{{ fn.path }}</td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11">● Hoạt động</span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-sm btn-action text-secondary" title="Sửa" @click="suaChucNang(fn)">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-action text-secondary" title="Xóa" @click="xoaChucNang(fn)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Thêm/Sửa Chức Năng -->
        <div class="modal fade show d-block" tabindex="-1" v-if="showModal" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow-lg">
                    <div class="modal-header border-bottom p-3 px-4">
                        <h5 class="modal-title fw-bold text-dark">{{ isEdit ? 'Cập Nhật Chức Năng' : 'Thêm Chức Năng Mới' }}</h5>
                        <button type="button" class="btn-close" @click="showModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tên Chức Năng <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.name" placeholder="VD: Quản lý chức vụ">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mã Code Chức Năng <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-uppercase" v-model="form.code" placeholder="VD: FN_CHUC_VU">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Đường Dẫn Route</label>
                            <input type="text" class="form-control" v-model="form.path" placeholder="/admin/chuc-vu">
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-3" @click="showModal = false">Hủy</button>
                        <button type="button" class="btn btn-primary rounded-3 px-4 fw-semibold" @click="luuChucNang">Lưu Dữ Liệu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AdminChucNang',
    data() {
        return {
            searchQuery: '',
            showModal: false,
            isEdit: false,
            form: { id: null, name: '', code: '', path: '' },
            functions: [
                { id: 1, name: 'Quản lý Chức Vụ', code: 'FN_CHUC_VU', path: '/admin/chuc-vu' },
                { id: 2, name: 'Phân Quyền Admin', code: 'FN_PHAN_QUYEN', path: '/admin/phan-quyen' },
                { id: 3, name: 'Quản lý Chức Năng', code: 'FN_CHUC_NANG', path: '/admin/chuc-nang' },
                { id: 4, name: 'Quản lý Người Dùng', code: 'FN_NGUOI_DUNG', path: '/admin/nguoi-dung' },
                { id: 5, name: 'Quản lý Admin', code: 'FN_ADMIN', path: '/admin/tai-khoan-admin' },
                { id: 6, name: 'Quản lý Đối Tác', code: 'FN_DOI_TAC', path: '/admin/doi-tac' },
                { id: 7, name: 'Kiểm Duyệt Địa Điểm', code: 'FN_KIEM_DUYET', path: '/admin/kiem-duyet-dia-diem' },
                { id: 8, name: 'Quản lý Tour Tuyến', code: 'FN_TOUR', path: '/admin/tour' },
                { id: 9, name: 'Quản lý Đánh Giá', code: 'FN_DANH_GIA', path: '/admin/danh-gia' },
                { id: 10, name: 'Quản lý Tài Chính', code: 'FN_TAI_CHINH', path: '/admin/tai-chinh' },
                { id: 11, name: 'Thống Kê & Báo Cáo', code: 'FN_THONG_KE', path: '/admin/thong-ke' },
                { id: 12, name: 'Quản lý Tag & Nhãn', code: 'FN_TAG', path: '/admin/tag' },
                { id: 13, name: 'Quản lý Voucher Admin', code: 'FN_VOUCHER', path: '/admin/voucher' },
                { id: 14, name: 'Quản lý Báo Cáo Lỗi', code: 'FN_BAO_CAO_LOI', path: '/admin/bao-cao-loi' }
            ]
        }
    },
    computed: {
        filteredFunctions() {
            return this.functions.filter(f =>
                f.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                f.code.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                f.path.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        }
    },
    methods: {
        moModalThem() {
            this.isEdit = false;
            this.form = { id: Date.now(), name: '', code: '', path: '/admin/' };
            this.showModal = true;
        },
        suaChucNang(fn) {
            this.isEdit = true;
            this.form = { ...fn };
            this.showModal = true;
        },
        luuChucNang() {
            if (!this.form.name || !this.form.code) {
                alert('Vui lòng nhập tên và mã chức năng!');
                return;
            }
            if (this.isEdit) {
                const idx = this.functions.findIndex(f => f.id === this.form.id);
                if (idx !== -1) this.functions[idx] = { ...this.form };
            } else {
                this.functions.push({ ...this.form });
            }
            this.showModal = false;
            alert('Lưu chức năng thành công!');
        },
        xoaChucNang(fn) {
            if (confirm(`Bạn có chắc muốn xóa chức năng "${fn.name}"?`)) {
                this.functions = this.functions.filter(f => f.id !== fn.id);
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
