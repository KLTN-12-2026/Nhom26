<template>
    <div class="admin-page-container">
        <!-- 1. Breadcrumb & Database Sync Pill -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Quản lý đối tác</span>
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
                    <h3 class="fw-bold text-dark mb-0">Quản lý Đối Tác Doanh Nghiệp (B2B)</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: doi_tacs</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Kiểm duyệt hồ sơ nhà cung cấp tour, đơn vị vận chuyển và khách sạn đối tác.
                </p>
            </div>
            <div>
                <button class="btn btn-primary rounded-3 px-3 py-2 fw-semibold shadow-sm" @click="xuatExcel">
                    <i class="bx bx-download font-18 align-middle"></i> Xuất Báo Cáo Đối Tác
                </button>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG ĐỐI TÁC</span>
                            <h2 class="fw-bold text-dark my-1">48</h2>
                            <small class="text-primary font-11">Đăng ký trên nền tảng</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-buildings"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐÃ KIỂM DUYỆT</span>
                            <h2 class="fw-bold text-success my-1">42</h2>
                            <small class="text-muted font-11">Tier 1 & Tier 2 Active</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-shield"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">CHỜ DUYỆT HỒ SƠ</span>
                            <h2 class="fw-bold text-warning my-1">06</h2>
                            <small class="text-warning font-11">Cần đối chiếu GPKD</small>
                        </div>
                        <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-time-five"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG TOUR CUNG ỨNG</span>
                            <h2 class="fw-bold text-dark my-1">156</h2>
                            <small class="text-primary font-11">Tour tuyến đang mở</small>
                        </div>
                        <div class="kpi-icon-box bg-light-info text-info"><i class="bx bx-map-alt"></i></div>
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
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo tên công ty, MST hoặc người đại diện...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="approved">Đã duyệt</option>
                        <option value="pending">Chờ kiểm duyệt</option>
                    </select>
                </div>
                <div class="col-md-4 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ filteredPartners.length }}</strong> đối tác</span>
                </div>
            </div>
        </div>

        <!-- 5. Partners Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th width="10%">MÃ ĐỐI TÁC</th>
                            <th width="26%">DOANH NGHIỆP</th>
                            <th width="14%">MÃ SỐ THUẾ</th>
                            <th width="18%">ĐẠI DIỆN & SĐT</th>
                            <th width="10%" class="text-center">PHÂN HẠNG</th>
                            <th width="10%" class="text-center">TRẠNG THÁI</th>
                            <th width="12%" class="text-end">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="p in filteredPartners" :key="p.id">
                            <td><code class="text-primary font-monospace">{{ p.ma }}</code></td>
                            <td>
                                <strong class="text-dark">{{ p.ten }}</strong>
                                <small class="text-muted d-block font-11"><i class="bx bx-map-pin me-1"></i>{{ p.dia_chi }}</small>
                            </td>
                            <td class="font-monospace small text-dark">{{ p.mst }}</td>
                            <td>
                                <div>{{ p.dai_dien }}</div>
                                <small class="text-muted">{{ p.sdt }}</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success border font-11">{{ p.tier }}</span>
                            </td>
                            <td class="text-center">
                                <span v-if="p.status === 'approved'" class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11">● Đã duyệt</span>
                                <span v-else class="badge bg-warning-subtle text-warning px-2 py-1 rounded-pill font-11">● Chờ duyệt</span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-sm btn-action text-secondary" :title="p.status === 'approved' ? 'Tạm khóa' : 'Phê duyệt'" @click="toggleStatus(p)">
                                        <i class="bx" :class="p.status === 'approved' ? 'bx-check-circle text-success' : 'bx-time text-warning'"></i>
                                    </button>
                                    <button class="btn btn-sm btn-action text-secondary" title="Xóa" @click="xoaPartner(p)">
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
    name: 'AdminDoiTac',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            partners: [
                { id: 1, ma: 'DT-2026-001', ten: 'Công Ty CP Lữ Hành Quốc Tế Lotus Heritage', mst: '0109823456', dai_dien: 'Nguyễn Văn Hùng', sdt: '0918.423.889', dia_chi: 'Tuần Châu, Quảng Ninh', tier: 'Tier 1 Elite', status: 'approved' },
                { id: 2, ma: 'DT-2026-002', ten: 'Công Ty TNHH Du Lịch Tràng An Heritage', mst: '0400123987', dai_dien: 'Trần Minh Quân', sdt: '02363822222', dia_chi: 'Ninh Bình & Hà Nội', tier: 'Tier 1', status: 'approved' },
                { id: 3, ma: 'DT-2026-003', ten: 'Hợp Tác Xã Vận Chuyển Sa Pa Trekking', mst: '0800345678', dai_dien: 'Lê Hoàng Nam', sdt: '0905123987', dia_chi: 'Sa Pa, Lào Cai', tier: 'Tier 2', status: 'approved' },
                { id: 4, ma: 'DT-2026-004', ten: 'SunWorld Sunset Travel Phú Quốc', mst: '1700987654', dai_dien: 'Phạm Thu Hương', sdt: '0935111222', dia_chi: 'Dương Tơ, Phú Quốc', tier: 'Tier 2', status: 'pending' }
            ]
        }
    },
    computed: {
        filteredPartners() {
            return this.partners.filter(p => {
                const matchSearch = p.ten.toLowerCase().includes(this.searchQuery.toLowerCase()) || p.mst.includes(this.searchQuery) || p.dai_dien.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchStatus = !this.filterStatus || p.status === this.filterStatus;
                return matchSearch && matchStatus;
            });
        }
    },
    methods: {
        toggleStatus(p) {
            p.status = p.status === 'approved' ? 'pending' : 'approved';
            alert(`Đã cập nhật trạng thái của đối tác "${p.ten}"!`);
        },
        xoaPartner(p) {
            if (confirm(`Bạn có chắc muốn xóa đối tác "${p.ten}"?`)) {
                this.partners = this.partners.filter(item => item.id !== p.id);
            }
        },
        xuatExcel() {
            alert('Đang trích xuất file Excel danh sách đối tác...');
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
.btn-action { width: 28px; height: 28px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px; transition: all 0.15s; }
.btn-action:hover { background-color: #f1f5f9; color: #0284c7 !important; }
</style>
