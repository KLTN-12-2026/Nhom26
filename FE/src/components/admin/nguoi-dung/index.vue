<template>
    <div class="admin-page-container">
        <!-- 1. Breadcrumb & Database Sync Pill -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý người dùng</span>
            </nav>
            <div class="sync-pill d-flex align-items-center gap-1">
                <span class="dot-green"></span>
                <span class="font-11 text-success fw-semibold">Cơ sở dữ liệu: Hoạt động đồng bộ</span>
            </div>
        </div>

        <!-- 2. Page Header Title -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
            <div>
                <div class="d-flex align-items-center gap-2">
                    <h3 class="fw-bold text-dark mb-0">Quản lý Khách Hàng / Người Dùng</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: users</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Danh sách tài khoản du khách đăng ký trên cổng Đà Nẵng Smart Travel.
                </p>
            </div>
            <div>
                <button class="btn btn-outline-primary rounded-3 px-3 py-2 fw-semibold shadow-sm" @click="xuatExcel">
                    <i class="bx bx-download font-18 align-middle"></i> Xuất Báo Cáo Users (Excel)
                </button>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG KHÁCH HÀNG</span>
                            <h2 class="fw-bold text-dark my-1">1,420</h2>
                            <small class="text-primary font-11">+125 tuần này</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-user"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐANG HOẠT ĐỘNG</span>
                            <h2 class="fw-bold text-success my-1">1,385</h2>
                            <small class="text-muted font-11">Tỷ lệ hoạt động 97.5%</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-circle"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TÀI KHOẢN KHÓA</span>
                            <h2 class="fw-bold text-danger my-1">35</h2>
                            <small class="text-danger font-11">Vi phạm chính sách</small>
                        </div>
                        <div class="kpi-icon-box bg-light-danger text-danger"><i class="bx bx-lock-alt"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">THÀNH VIÊN VIP</span>
                            <h2 class="fw-bold text-warning my-1">120</h2>
                            <small class="text-muted font-11">Hạng Gold & Platinum</small>
                        </div>
                        <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-crown"></i></div>
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
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo tên, email hoặc số điện thoại...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Hoạt động</option>
                        <option value="blocked">Đã khóa</option>
                    </select>
                </div>
                <div class="col-md-4 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ filteredUsers.length }}</strong> người dùng</span>
                </div>
            </div>
        </div>

        <!-- 5. Users Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th width="10%">MÃ KH</th>
                            <th width="22%">HỌ VÀ TÊN</th>
                            <th width="24%">EMAIL & SĐT</th>
                            <th width="14%" class="text-end">TỔNG CHI TIÊU</th>
                            <th width="10%" class="text-center">HẠNG VIP</th>
                            <th width="10%" class="text-center">TRẠNG THÁI</th>
                            <th width="10%" class="text-end">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in filteredUsers" :key="user.id">
                            <td><code class="text-primary font-monospace">{{ user.ma }}</code></td>
                            <td><strong class="text-dark">{{ user.ho_ten }}</strong></td>
                            <td>
                                <div>{{ user.email }}</div>
                                <small class="text-muted">{{ user.sdt }}</small>
                            </td>
                            <td class="text-end fw-bold text-dark">{{ user.tong_chi.toLocaleString() }} đ</td>
                            <td class="text-center">
                                <span class="badge bg-warning-subtle text-warning border">{{ user.tier }}</span>
                            </td>
                            <td class="text-center">
                                <span v-if="!user.is_blocked" class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11">● Hoạt động</span>
                                <span v-else class="badge bg-danger-subtle text-danger px-2 py-1 rounded-pill font-11">● Đã khóa</span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-sm btn-action text-secondary" :title="user.is_blocked ? 'Mở khóa' : 'Khóa'" @click="toggleBlock(user)">
                                        <i class="bx" :class="user.is_blocked ? 'bx-lock-open text-warning' : 'bx-lock'"></i>
                                    </button>
                                    <button class="btn btn-sm btn-action text-secondary" title="Xóa" @click="xoaUser(user)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
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
    name: 'AdminNguoiDung',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            users: [
                { id: 1, ma: 'KH-2025-0834', ho_ten: 'Nguyễn Văn An', email: 'an.nguyen@smarttravel.vn', sdt: '0912345678', tong_chi: 38500000, tier: 'VIP Gold', is_blocked: false },
                { id: 2, ma: 'KH-2025-0835', ho_ten: 'Trần Thị Mai', email: 'mai.tran@gmail.com', sdt: '0987654321', tong_chi: 12400000, tier: 'Silver', is_blocked: false },
                { id: 3, ma: 'KH-2025-0836', ho_ten: 'Lê Hoàng Nam', email: 'nam.le@yahoo.com', sdt: '0905123987', tong_chi: 5800000, tier: 'Member', is_blocked: true },
                { id: 4, ma: 'KH-2025-0837', ho_ten: 'Phạm Thu Hương', email: 'huong.pt@gmail.com', sdt: '0935111222', tong_chi: 24500000, tier: 'VIP Gold', is_blocked: false }
            ]
        }
    },
    computed: {
        filteredUsers() {
            return this.users.filter(u => {
                const matchSearch = u.ho_ten.toLowerCase().includes(this.searchQuery.toLowerCase()) || u.email.toLowerCase().includes(this.searchQuery.toLowerCase()) || u.sdt.includes(this.searchQuery);
                const matchStatus = !this.filterStatus || (this.filterStatus === 'active' ? !u.is_blocked : u.is_blocked);
                return matchSearch && matchStatus;
            });
        }
    },
    methods: {
        toggleBlock(u) {
            u.is_blocked = !u.is_blocked;
            alert(`Đã ${u.is_blocked ? 'khóa' : 'mở khóa'} tài khoản ${u.ho_ten}!`);
        },
        xoaUser(u) {
            if (confirm(`Bạn có chắc muốn xóa tài khoản "${u.ho_ten}"?`)) {
                this.users = this.users.filter(item => item.id !== u.id);
            }
        },
        xuatExcel() {
            alert('Đang trích xuất file Excel danh sách người dùng...');
        }
    }
}
</script>

<style scoped>
.sync-pill { background-color: #f0fdf4; border: 1px solid #bbf7d0; padding: 4px 12px; border-radius: 999px; }
.dot-green { width: 6px; height: 6px; border-radius: 50%; background-color: #22c55e; }
.kpi-icon-box { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
.bg-light-primary { background-color: #e0f2fe; }
.bg-light-success { background-color: #dcfce7; }
.bg-light-info { background-color: #e0f2fe; }
.bg-light-warning { background-color: #fef3c7; }
.bg-light-danger { background-color: #fee2e2; }
.btn-action { width: 28px; height: 28px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px; transition: all 0.15s; }
.btn-action:hover { background-color: #f1f5f9; color: #0284c7 !important; }
</style>
