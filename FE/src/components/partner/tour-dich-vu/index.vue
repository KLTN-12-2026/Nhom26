<template>
    <div class="partner-tour-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                SẢN PHẨM & DỊCH VỤ
                            </span>
                            <span class="text-muted small">/ Quản lý kho tour</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Quản Lý Tour Tuyến & Dịch Vụ Đi Kèm</h3>
                        <p class="text-muted small mb-0">
                            Cập nhật thông tin lộ trình, định giá dịch vụ, quản lý số lượng chỗ còn nhận và lịch khởi hành theo mùa.
                        </p>
                    </div>
                    <div>
                        <button class="btn btn-pink text-white rounded-3 px-3 py-2 fw-semibold shadow-sm" @click="moModalThemTour">
                            <i class="bx bx-plus me-1 font-18 align-middle"></i> Tạo Tour Mới
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter bar -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 p-3 bg-white">
            <div class="row g-2 align-items-center">
                <div class="col-md-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo tên tour hoặc mã tour...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Đang mở bán</option>
                        <option value="paused">Tạm dừng nhận khách</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterDuration">
                        <option value="">Tất cả thời lượng</option>
                        <option value="1">1 Ngày</option>
                        <option value="2">2 Ngày 1 Đêm</option>
                        <option value="4">4 Ngày 3 Đêm</option>
                    </select>
                </div>
                <div class="col-md-2 text-end">
                    <span class="small text-muted">Tổng cộng: <strong class="text-pink">{{ filteredTours.length }} tour</strong></span>
                </div>
            </div>
        </div>

        <!-- Tours Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small">
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th width="12%">Hình Ảnh</th>
                            <th width="28%">Tên Tour Tuyến</th>
                            <th class="text-center" width="12%">Thời Lượng</th>
                            <th class="text-end" width="14%">Giá Bán / Khách</th>
                            <th class="text-center" width="10%">Lịch Đang Mở</th>
                            <th class="text-center" width="10%">Trạng Thái</th>
                            <th class="text-center" width="13%">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(tour, i) in filteredTours" :key="tour.id">
                            <td class="text-center fw-bold">{{ i + 1 }}</td>
                            <td>
                                <img :src="tour.hinh" class="rounded-3 shadow-sm" width="80" height="52" style="object-fit:cover" :alt="tour.ten_tour">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ tour.ten_tour }}</div>
                                <small class="text-muted">Mã: <code>{{ tour.ma }}</code> · Điểm đón: {{ tour.diem_don }}</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark">{{ tour.thoi_gian }}</span>
                            </td>
                            <td class="text-end fw-bold text-pink">
                                {{ tour.gia.toLocaleString() }} đ
                            </td>
                            <td class="text-center">
                                <span class="badge bg-pink-light text-pink fw-semibold">{{ tour.so_lich }} đợt</span>
                            </td>
                            <td class="text-center">
                                <span v-if="tour.trang_thai === 'active'" class="badge bg-success-subtle text-success">Đang mở bán</span>
                                <span v-else class="badge bg-secondary-subtle text-secondary">Tạm dừng</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-secondary" title="Quản lý lịch khởi hành" @click="xemLich(tour)">
                                        <i class="bx bx-calendar"></i>
                                    </button>
                                    <button class="btn btn-outline-pink" title="Chỉnh sửa" @click="suaTour(tour)">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="Xóa" @click="xoaTour(tour)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Thêm / Sửa Tour -->
        <div class="modal fade show d-block" tabindex="-1" v-if="showModal" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow-lg">
                    <div class="modal-header border-bottom p-3 px-4">
                        <h5 class="modal-title fw-bold text-dark">
                            <i class="bx bx-trip text-pink me-2"></i>{{ isEdit ? 'Cập Nhật Thông Tin Tour' : 'Thêm Tour Mới' }}
                        </h5>
                        <button type="button" class="btn-close" @click="showModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Tên Tour Tuyến <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="formTour.ten_tour" placeholder="Nhập tên tour...">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Mã Tour <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="formTour.ma" placeholder="VD: HL-01">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Giá Bán / Khách (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" v-model="formTour.gia">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Thời Lượng Tour</label>
                                <select class="form-select" v-model="formTour.thoi_gian">
                                    <option>1 Ngày</option>
                                    <option>2 Ngày 1 Đêm</option>
                                    <option>3 Ngày 2 Đêm</option>
                                    <option>4 Ngày 3 Đêm</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Điểm Đón / Khởi Hành</label>
                                <input type="text" class="form-control" v-model="formTour.diem_don" placeholder="VD: Cảng Tuần Châu, Khách sạn trung tâm...">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Link Hình Ảnh Đại Diện</label>
                                <input type="text" class="form-control" v-model="formTour.hinh" placeholder="https://...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-3" @click="showModal = false">Hủy</button>
                        <button type="button" class="btn btn-pink text-white rounded-3 px-4 fw-semibold" @click="luuTour">
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
    name: 'DoiTacTourDichVu',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            filterDuration: '',
            showModal: false,
            isEdit: false,
            formTour: {
                id: null,
                ten_tour: '',
                ma: '',
                gia: 0,
                thoi_gian: '1 Ngày',
                diem_don: '',
                hinh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400',
                so_lich: 5,
                trang_thai: 'active'
            },
            tours: [
                { id: 1, ma: 'HL-01', ten_tour: 'Du Thuyền Hạ Long 5 Sao 2N1Đ', thoi_gian: '2 Ngày 1 Đêm', gia: 14850000, so_lich: 12, diem_don: 'Cảng Tuần Châu Ô 12', trang_thai: 'active', hinh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=300' },
                { id: 2, ma: 'TA-02', ten_tour: 'Tour Tràng An Bái Đính 1N VIP', thoi_gian: '1 Ngày', gia: 3800000, so_lich: 8, diem_don: 'Đón tận nơi Hà Nội & Ninh Bình', trang_thai: 'active', hinh: 'https://images.unsplash.com/photo-1528127269322-539801943592?w=300' },
                { id: 3, ma: 'SP-03', ten_tour: 'Thuê xe máy phượt & Trekking Fansipan', thoi_gian: '1 Ngày', gia: 5400000, so_lich: 6, diem_don: 'Khách sạn Sa Pa', trang_thai: 'active', hinh: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=300' },
                { id: 4, ma: 'PQ-04', ten_tour: 'Tour Phú Quốc Sunset 4N3Đ Trọn Gói', thoi_gian: '4 Ngày 3 Đêm', gia: 22600000, so_lich: 4, diem_don: 'Sân bay Tân Sơn Nhất / Phú Quốc', trang_thai: 'active', hinh: 'https://images.unsplash.com/photo-1565967511849-76a60a516170?w=300' }
            ]
        }
    },
    computed: {
        filteredTours() {
            return this.tours.filter(t => {
                const matchSearch = t.ten_tour.toLowerCase().includes(this.searchQuery.toLowerCase()) || t.ma.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchStatus = !this.filterStatus || t.trang_thai === this.filterStatus;
                return matchSearch && matchStatus;
            });
        }
    },
    methods: {
        moModalThemTour() {
            this.isEdit = false;
            this.formTour = { id: Date.now(), ten_tour: '', ma: '', gia: 1500000, thoi_gian: '1 Ngày', diem_don: '', hinh: 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400', so_lich: 3, trang_thai: 'active' };
            this.showModal = true;
        },
        suaTour(tour) {
            this.isEdit = true;
            this.formTour = { ...tour };
            this.showModal = true;
        },
        luuTour() {
            if (!this.formTour.ten_tour || !this.formTour.ma) {
                alert('Vui lòng điền đầy đủ tên và mã tour!');
                return;
            }
            if (this.isEdit) {
                const idx = this.tours.findIndex(t => t.id === this.formTour.id);
                if (idx !== -1) this.tours[idx] = { ...this.formTour };
            } else {
                this.tours.unshift({ ...this.formTour });
            }
            this.showModal = false;
            alert('Lưu thông tin tour thành công!');
        },
        xoaTour(tour) {
            if (confirm(`Bạn có chắc chắn muốn xóa tour "${tour.ten_tour}"?`)) {
                this.tours = this.tours.filter(t => t.id !== tour.id);
            }
        },
        xemLich(tour) {
            alert(`Lịch khởi hành của "${tour.ten_tour}": Hiện có ${tour.so_lich} ngày khởi hành đang mở nhận khách.`);
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
