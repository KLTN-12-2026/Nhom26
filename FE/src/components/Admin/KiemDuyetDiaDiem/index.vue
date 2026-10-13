<template>
    <div class="admin-page-container">
        <!-- 1. Breadcrumb & Database Sync Pill -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
            <nav class="breadcrumb-admin d-flex align-items-center small text-muted">
                <router-link to="/admin/dashboard" class="text-secondary text-decoration-none">Trang chủ</router-link>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-secondary">Phân hệ Quản trị</span>
                <i class="bx bx-chevron-right mx-1"></i>
                <span class="text-primary fw-bold">Kiểm duyệt địa điểm</span>
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
                    <h3 class="fw-bold text-dark mb-0">Kiểm Duyệt Địa Điểm Du Lịch (POI)</h3>
                    <span class="badge bg-light text-secondary border font-11">Table: dia_diems</span>
                </div>
                <p class="text-muted small mb-0 mt-1">
                    Kiểm tra độ chính xác thông tin tọa độ, hình ảnh và pháp lý các điểm đến do đối tác gửi lên.
                </p>
            </div>
        </div>

        <!-- 3. 4 KPI Metrics Cards -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỔNG ĐỊA ĐIỂM</span>
                            <h2 class="fw-bold text-dark my-1">128</h2>
                            <small class="text-primary font-11">POI toàn hệ thống</small>
                        </div>
                        <div class="kpi-icon-box bg-light-primary text-primary"><i class="bx bx-map-pin"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">ĐÃ PHÊ DUYỆT</span>
                            <h2 class="fw-bold text-success my-1">118</h2>
                            <small class="text-muted font-11">Đã hiển thị trên App</small>
                        </div>
                        <div class="kpi-icon-box bg-light-success text-success"><i class="bx bx-check-double"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">CHỜ KIỂM DUYỆT</span>
                            <h2 class="fw-bold text-warning my-1">10</h2>
                            <small class="text-warning font-11">Cần đối soát tọa độ</small>
                        </div>
                        <div class="kpi-icon-box bg-light-warning text-warning"><i class="bx bx-time"></i></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="font-11 fw-bold text-muted text-uppercase">TỪ CHỐI DUYỆT</span>
                            <h2 class="fw-bold text-danger my-1">00</h2>
                            <small class="text-muted font-11">Thông tin không đạt</small>
                        </div>
                        <div class="kpi-icon-box bg-light-danger text-danger"><i class="bx bx-x-circle"></i></div>
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
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo tên địa điểm hoặc đối tác...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="approved">Đã phê duyệt</option>
                        <option value="pending">Chờ kiểm duyệt</option>
                    </select>
                </div>
                <div class="col-md-4 text-end">
                    <span class="small text-muted">Hiển thị <strong class="text-primary">{{ filteredLocations.length }}</strong> địa điểm</span>
                </div>
            </div>
        </div>

        <!-- 5. Locations Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th width="12%">HÌNH ẢNH</th>
                            <th width="24%">TÊN ĐỊA ĐIỂM</th>
                            <th width="20%">ĐỐI TÁC KHAI BÁO</th>
                            <th width="14%">KHU VỰC</th>
                            <th width="12%" class="text-center">TRẠNG THÁI</th>
                            <th width="18%" class="text-end">THAO TÁC DUYỆT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="loc in filteredLocations" :key="loc.id">
                            <td>
                                <img :src="loc.image" class="rounded-3 shadow-sm" width="80" height="52" style="object-fit:cover" :alt="loc.name">
                            </td>
                            <td>
                                <strong class="text-dark">{{ loc.name }}</strong>
                                <small class="text-muted d-block font-11">{{ loc.address }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ loc.partner }}</span>
                            </td>
                            <td class="text-muted small">{{ loc.city }}</td>
                            <td class="text-center">
                                <span v-if="loc.status === 'approved'" class="badge bg-success-subtle text-success px-2 py-1 rounded-pill font-11">● Đã duyệt</span>
                                <span v-else class="badge bg-warning-subtle text-warning px-2 py-1 rounded-pill font-11">● Chờ duyệt</span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-sm btn-success" v-if="loc.status === 'pending'" title="Phê duyệt ngay" @click="duyetDiaDiem(loc)">
                                        <i class="bx bx-check"></i> Duyệt
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" v-if="loc.status === 'pending'" title="Từ chối" @click="tuChoi(loc)">
                                        <i class="bx bx-x"></i>
                                    </button>
                                    <button class="btn btn-sm btn-action text-secondary" title="Xóa" @click="xoaDiaDiem(loc)">
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
    name: 'AdminKiemDuyetDiaDiem',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            locations: [
                { id: 1, name: 'Cảng Du Thuyền Quốc Tế Tuần Châu Ô 12', address: 'Tuần Châu, TP. Hạ Long', partner: 'Lotus Heritage Ltd', city: 'Quảng Ninh', status: 'approved', image: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' },
                { id: 2, name: 'Khu Du Lịch Sinh Thái Tràng An', address: 'Hoa Lư, Ninh Bình', partner: 'Tràng An Heritage', city: 'Ninh Bình', status: 'approved', image: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300' },
                { id: 3, name: 'Bến Thuyền Đón Khách Sanato Phú Quốc', address: 'Dương Tơ, Phú Quốc', partner: 'Sunset Travel Phú Quốc', city: 'Kiên Giang', status: 'pending', image: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300' },
                { id: 4, name: 'Trạm Nghỉ Chân Chinh Phục Fansipan', address: 'Sa Pa, Lào Cai', partner: 'Sa Pa Trekking Co.', city: 'Lào Cai', status: 'pending', image: 'https://images.unsplash.com/photo-1565967511849-76a60a516170?w=300' }
            ]
        }
    },
    computed: {
        filteredLocations() {
            return this.locations.filter(l => {
                const matchSearch = l.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || l.partner.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchStatus = !this.filterStatus || l.status === this.filterStatus;
                return matchSearch && matchStatus;
            });
        }
    },
    methods: {
        duyetDiaDiem(loc) {
            loc.status = 'approved';
            alert(`Đã phê duyệt địa điểm "${loc.name}"!`);
        },
        tuChoi(loc) {
            alert(`Đã gửi yêu cầu bổ sung giấy tờ cho đối tác "${loc.partner}".`);
        },
        xoaDiaDiem(loc) {
            if (confirm(`Bạn có chắc muốn xóa địa điểm "${loc.name}"?`)) {
                this.locations = this.locations.filter(item => item.id !== loc.id);
            }
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
