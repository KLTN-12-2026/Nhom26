<template>
    <div class="admin-page-container">
        <!-- 1. Breadcrumb & Database Sync Pill -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Phân quyền Admin</span>
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
                    <h3 class="fw-bold text-dark mb-0">Phân Quyền Vai Trò (RBAC Matrix)</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: phan_quyens</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Cấu hình ma trận phân quyền chi tiết cho từng chức vụ trên các module chức năng.
                </p>
            </div>
            <div>
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm d-flex align-items-center gap-1" @click="luuPhanQuyen">
                    <i class="bx bx-save font-18"></i> Lưu Ma Trận Phân Quyền
                </button>
            </div>
        </div>

        <!-- 3. Role Selector Filter -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-2">
                    <label class="form-label fw-bold mb-0 text-dark font-13">Chọn Chức Vụ Thiết Lập:</label>
                    <select class="form-select form-select-sm" style="width: 260px;" v-model="selectedRole">
                        <option value="1">Super Admin (Quản Trị Tối Cao)</option>
                        <option value="2">Content Manager (Quản Lý Nội Dung)</option>
                        <option value="3">Kế Toán & Đối Soát (Accountant)</option>
                        <option value="4">Chăm Sóc Khách Hàng (Support Lead)</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary btn-sm rounded-3" @click="chonTatCa(true)">Chọn Tất Cả</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-3" @click="chonTatCa(false)">Bỏ Chọn</button>
                </div>
            </div>
        </div>

        <!-- 4. Matrix Permissions Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th width="30%">MODULE CHỨC NĂNG</th>
                            <th width="14%" class="text-center">XEM (VIEW)</th>
                            <th width="14%" class="text-center">THÊM (CREATE)</th>
                            <th width="14%" class="text-center">SỬA (EDIT)</th>
                            <th width="14%" class="text-center">XÓA (DELETE)</th>
                            <th width="14%" class="text-center">DUYỆT (APPROVE)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="mod in permissionMatrix" :key="mod.id">
                            <td>
                                <strong class="text-dark d-block font-13">{{ mod.name }}</strong>
                                <small class="text-muted font-monospace font-11">Module: {{ mod.code }}</small>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input" v-model="mod.canView">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input" v-model="mod.canCreate">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input" v-model="mod.canEdit">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input" v-model="mod.canDelete">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input" v-model="mod.canApprove">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AdminPhanQuyen',
    data() {
        return {
            selectedRole: '1',
            permissionMatrix: [
                { id: 1, code: 'MOD_ADMIN', name: 'Quản lý Tài Khoản Admin & Chức Vụ', canView: true, canCreate: true, canEdit: true, canDelete: true, canApprove: true },
                { id: 2, code: 'MOD_DOITAC', name: 'Quản lý Đối Tác & Hợp Đồng B2B', canView: true, canCreate: true, canEdit: true, canDelete: false, canApprove: true },
                { id: 3, code: 'MOD_TOUR', name: 'Quản lý Tour Tuyến & Lịch Trình', canView: true, canCreate: true, canEdit: true, canDelete: true, canApprove: true },
                { id: 4, code: 'MOD_DIADIEM', name: 'Kiểm Duyệt Địa Điểm & Trạm Đón (POI)', canView: true, canCreate: true, canEdit: true, canDelete: false, canApprove: true },
                { id: 5, code: 'MOD_TAICHINH', name: 'Quản lý Tài Chính & Đối Soát Doanh Thu', canView: true, canCreate: false, canEdit: false, canDelete: false, canApprove: true },
                { id: 6, code: 'MOD_NGUOIDUNG', name: 'Quản lý Người Dùng & Hồ Sơ Du Khách', canView: true, canCreate: false, canEdit: true, canDelete: true, canApprove: false },
                { id: 7, code: 'MOD_BAOCAO', name: 'Báo Cáo Sự Cố & Hỗ Trợ Kỹ Thuật', canView: true, canCreate: false, canEdit: true, canDelete: true, canApprove: true }
            ]
        }
    },
    methods: {
        chonTatCa(val) {
            this.permissionMatrix.forEach(m => {
                m.canView = val;
                m.canCreate = val;
                m.canEdit = val;
                m.canDelete = val;
                m.canApprove = val;
            });
        },
        luuPhanQuyen() {
            alert('Đã cập nhật cấu hình ma trận phân quyền RBAC thành công!');
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
</style>
