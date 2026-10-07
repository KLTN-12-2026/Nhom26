<template>
    <div class="partner-dia-diem-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                QUẢN LÝ ĐIỂM ĐẾN & POI
                            </span>
                            <span class="text-muted small">/ Điểm tham quan đối tác</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Quản Lý Địa Điểm & Trạm Đón Trả Khách</h3>
                        <p class="text-muted small mb-0">
                            Khai báo và liên kết các điểm đến tham quan du lịch, danh lam thắng cảnh hoặc bến cảng, trạm đón trả khách.
                        </p>
                    </div>
                    <div>
                        <button class="btn btn-pink text-white rounded-3 px-3 py-2 fw-semibold shadow-sm" @click="moModalThemDiaDiem">
                            <i class="bx bx-plus me-1 font-18 align-middle"></i> Đăng Địa Điểm Mới
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter bar -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-3 bg-white">
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo tên địa điểm, địa chỉ...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterType">
                        <option value="">Tất cả loại hình</option>
                        <option value="Danh lam">Danh lam thắng cảnh</option>
                        <option value="Sinh thái">Du lịch sinh thái</option>
                        <option value="Biển">Biển & Đảo</option>
                        <option value="Bến cảng">Bến cảng & Trạm đón</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Trạng thái duyệt</option>
                        <option value="approved">Đã duyệt</option>
                        <option value="pending">Chờ kiểm duyệt</option>
                    </select>
                </div>
                <div class="col-md-2 text-end">
                    <span class="small text-muted">Tổng: <strong class="text-pink">{{ filteredList.length }} địa điểm</strong></span>
                </div>
            </div>
        </div>

        <!-- Locations Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small">
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th width="12%">Hình Ảnh</th>
                            <th width="28%">Tên Địa Điểm</th>
                            <th width="22%">Địa Chỉ & Khu Vực</th>
                            <th class="text-center" width="10%">Số Tour Khai Thác</th>
                            <th class="text-center" width="10%">Kiểm Duyệt</th>
                            <th class="text-center" width="13%">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(loc, index) in filteredList" :key="loc.id">
                            <td class="text-center fw-bold">{{ index + 1 }}</td>
                            <td>
                                <img :src="loc.hinh_anh" class="rounded-3 shadow-sm" width="80" height="52" style="object-fit:cover" :alt="loc.ten">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ loc.ten }}</div>
                                <span class="badge bg-pink-light text-pink font-11">{{ loc.loai }}</span>
                            </td>
                            <td class="text-muted small">
                                <i class="bx bx-map-pin text-pink me-1"></i>{{ loc.dia_chi }}
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark fw-bold">{{ loc.so_tour }} tour</span>
                            </td>
                            <td class="text-center">
                                <span v-if="loc.trang_thai === 'approved'" class="badge bg-success-subtle text-success">Đã duyệt</span>
                                <span v-else class="badge bg-warning text-dark">Chờ duyệt</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-pink" title="Sửa" @click="suaDiaDiem(loc)">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="Xóa" @click="xoaDiaDiem(loc)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Thêm / Sửa Địa Điểm -->
        <div class="modal fade show d-block" tabindex="-1" v-if="showModal" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow-lg">
                    <div class="modal-header border-bottom p-3 px-4">
                        <h5 class="modal-title fw-bold text-dark">
                            <i class="bx bx-map-pin text-pink me-2"></i>{{ isEdit ? 'Cập Nhật Địa Điểm' : 'Đăng Địa Điểm Mới' }}
                        </h5>
                        <button type="button" class="btn-close" @click="showModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Tên Địa Điểm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="formLoc.ten" placeholder="Nhập tên địa điểm...">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Loại Hình</label>
                                <select class="form-select" v-model="formLoc.loai">
                                    <option>Danh lam</option>
                                    <option>Sinh thái</option>
                                    <option>Biển</option>
                                    <option>Bến cảng</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Địa Chỉ Chi Tiết</label>
                                <input type="text" class="form-control" v-model="formLoc.dia_chi" placeholder="Quận/Huyện, Tỉnh/Thành...">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Link Hình Ảnh</label>
                                <input type="text" class="form-control" v-model="formLoc.hinh_anh" placeholder="https://...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-3" @click="showModal = false">Hủy</button>
                        <button type="button" class="btn btn-pink text-white rounded-3 px-4 fw-semibold" @click="luuDiaDiem">
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
    name: 'DoiTacDiaDiem',
    data() {
        return {
            searchQuery: '',
            filterType: '',
            filterStatus: '',
            showModal: false,
            isEdit: false,
            formLoc: {
                id: null,
                ten: '',
                loai: 'Danh lam',
                dia_chi: '',
                so_tour: 1,
                trang_thai: 'pending',
                hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300'
            },
            locations: [
                { id: 1, ten: 'Cảng Tuần Châu Ô 12', loai: 'Bến cảng', dia_chi: 'Tuần Châu, TP. Hạ Long, Quảng Ninh', so_tour: 6, trang_thai: 'approved', hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' },
                { id: 2, ten: 'Khu Du Lịch Sinh Thái Tràng An', loai: 'Sinh thái', dia_chi: 'Hoa Lư, Ninh Bình', so_tour: 4, trang_thai: 'approved', hinh_anh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300' },
                { id: 3, ten: 'Đỉnh Fansipan - Sa Pa', loai: 'Danh lam', dia_chi: 'Sa Pa, Lào Cai', so_tour: 5, trang_thai: 'approved', hinh_anh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300' },
                { id: 4, ten: 'Sunset Sanato Beach Club Phú Quốc', loai: 'Biển', dia_chi: 'Dương Tơ, TP. Phú Quốc', so_tour: 3, trang_thai: 'pending', hinh_anh: 'https://images.unsplash.com/photo-1565967511849-76a60a516170?w=300' }
            ]
        }
    },
    computed: {
        filteredList() {
            return this.locations.filter(l => {
                const matchSearch = l.ten.toLowerCase().includes(this.searchQuery.toLowerCase()) || l.dia_chi.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchType = !this.filterType || l.loai === this.filterType;
                const matchStatus = !this.filterStatus || l.trang_thai === this.filterStatus;
                return matchSearch && matchType && matchStatus;
            });
        }
    },
    methods: {
        moModalThemDiaDiem() {
            this.isEdit = false;
            this.formLoc = { id: Date.now(), ten: '', loai: 'Danh lam', dia_chi: '', so_tour: 1, trang_thai: 'pending', hinh_anh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' };
            this.showModal = true;
        },
        suaDiaDiem(loc) {
            this.isEdit = true;
            this.formLoc = { ...loc };
            this.showModal = true;
        },
        luuDiaDiem() {
            if (!this.formLoc.ten) {
                alert('Vui lòng nhập tên địa điểm!');
                return;
            }
            if (this.isEdit) {
                const idx = this.locations.findIndex(l => l.id === this.formLoc.id);
                if (idx !== -1) this.locations[idx] = { ...this.formLoc };
            } else {
                this.locations.unshift({ ...this.formLoc });
            }
            this.showModal = false;
            alert('Lưu thông tin địa điểm thành công!');
        },
        xoaDiaDiem(loc) {
            if (confirm(`Bạn có chắc chắn muốn xóa địa điểm "${loc.ten}"?`)) {
                this.locations = this.locations.filter(l => l.id !== loc.id);
            }
        }
    }
}
</script>

<style scoped>
.bg-pink {
    background-color: #e11d48 !important;
}
.text-pink {
    color: #e11d48 !important;
}
.bg-pink-light {
    background-color: #ffe4e6 !important;
}
.btn-pink {
    background-color: #e11d48;
    border-color: #e11d48;
}
.btn-pink:hover {
    background-color: #be123c;
    border-color: #be123c;
}
.btn-outline-pink {
    border: 1px solid #fecdd3;
    color: #e11d48;
}
.btn-outline-pink:hover {
    background-color: #fff1f2;
    color: #be123c;
}
</style>
