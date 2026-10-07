<template>
    <div class="partner-voucher-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                KHUYẾN MÃI & CHIẾT KHẤU
                            </span>
                            <span class="text-muted small">/ Mã giảm giá kích cầu</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Quản Lý Voucher & Mã Khuyến Mãi Đối Tác</h3>
                        <p class="text-muted small mb-0">
                            Phát hành các chiến dịch mã giảm giá độc quyền cho khách hàng đặt tour sớm hoặc mua theo nhóm.
                        </p>
                    </div>
                    <div>
                        <button class="btn btn-pink text-white rounded-3 px-3 py-2 fw-semibold shadow-sm" @click="moModalThemVoucher">
                            <i class="bx bx-plus me-1 font-18 align-middle"></i> Phát Hành Voucher Mới
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
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo mã voucher hoặc tên chương trình...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterStatus">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Đang kích hoạt</option>
                        <option value="expired">Đã hết hạn / Hết lượt</option>
                    </select>
                </div>
                <div class="col-md-4 text-end">
                    <span class="small text-muted">Tổng mã: <strong class="text-pink">{{ filteredVouchers.length }} chiến dịch</strong></span>
                </div>
            </div>
        </div>

        <!-- Vouchers Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small">
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th width="16%">Mã Voucher</th>
                            <th width="26%">Tên Chương Trình</th>
                            <th class="text-center" width="13%">Mức Giảm</th>
                            <th class="text-center" width="13%">Đã Dùng / Số Lượng</th>
                            <th class="text-center" width="13%">Hiệu Lực Đến</th>
                            <th class="text-center" width="10%">Trạng Thái</th>
                            <th class="text-center" width="12%">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(v, i) in filteredVouchers" :key="v.id">
                            <td class="text-center fw-bold">{{ i + 1 }}</td>
                            <td>
                                <code class="fw-bold fs-6 text-pink">{{ v.ma }}</code>
                            </td>
                            <td><strong class="text-dark">{{ v.ten }}</strong></td>
                            <td class="text-center">
                                <span class="badge bg-pink-light text-pink fw-bold">
                                    {{ v.kieu === 'percent' ? v.giam + '%' : v.giam.toLocaleString() + ' đ' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <strong>{{ v.da_dung }}</strong> / <span class="text-muted">{{ v.so_luong }}</span>
                                <div class="progress mt-1" style="height: 4px;">
                                    <div class="progress-bar bg-pink" :style="{ width: (v.da_dung / v.so_luong * 100) + '%' }"></div>
                                </div>
                            </td>
                            <td class="text-center text-muted small">{{ v.han }}</td>
                            <td class="text-center">
                                <span v-if="v.active" class="badge bg-success-subtle text-success">Đang chạy</span>
                                <span v-else class="badge bg-secondary-subtle text-secondary">Hết hạn</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-pink" title="Sửa" @click="suaVoucher(v)">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="Xóa" @click="xoaVoucher(v)">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Thêm / Sửa Voucher -->
        <div class="modal fade show d-block" tabindex="-1" v-if="showModal" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow-lg">
                    <div class="modal-header border-bottom p-3 px-4">
                        <h5 class="modal-title fw-bold text-dark">
                            <i class="bx bx-purchase-tag text-pink me-2"></i>{{ isEdit ? 'Cập Nhật Voucher' : 'Tạo Voucher Mới' }}
                        </h5>
                        <button type="button" class="btn-close" @click="showModal = false"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Mã Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-uppercase" v-model="formV.ma" placeholder="VD: LOTUS500">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kiểu Giảm Giá</label>
                                <select class="form-select" v-model="formV.kieu">
                                    <option value="fixed">Giảm tiền mặt (VNĐ)</option>
                                    <option value="percent">Giảm phần trăm (%)</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Tên Chương Trình Khuyến Mãi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="formV.ten" placeholder="VD: Ưu Đãi Mùa Hè 2026...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Giá Trị Giảm <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" v-model="formV.giam">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Số Lượng Phát Hành</label>
                                <input type="number" class="form-control" v-model="formV.so_luong">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Hạn Sử Dụng Đến Ngày</label>
                                <input type="date" class="form-control" v-model="formV.han">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3 px-4">
                        <button type="button" class="btn btn-light rounded-3" @click="showModal = false">Hủy</button>
                        <button type="button" class="btn btn-pink text-white rounded-3 px-4 fw-semibold" @click="luuVoucher">
                            Lưu Voucher
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DoiTacVoucher',
    data() {
        return {
            searchQuery: '',
            filterStatus: '',
            showModal: false,
            isEdit: false,
            formV: {
                id: null,
                ma: '',
                ten: '',
                giam: 500000,
                kieu: 'fixed',
                so_luong: 100,
                da_dung: 0,
                han: '2026-12-31',
                active: true
            },
            vouchers: [
                { id: 1, ma: 'LOTUS500', ten: 'Giảm 500.000đ cho Tour Du Thuyền Hạ Long', giam: 500000, kieu: 'fixed', so_luong: 150, da_dung: 42, han: '31/12/2026', active: true },
                { id: 2, ma: 'TRANGAN10', ten: 'Giảm 10% Tour Tràng An Bái Đính VIP', giam: 10, kieu: 'percent', so_luong: 80, da_dung: 38, han: '30/11/2026', active: true },
                { id: 3, ma: 'HE2026', ten: 'Kích cầu đầu hè 2026 cho khách đặt sớm', giam: 200000, kieu: 'fixed', so_luong: 50, da_dung: 50, han: '30/09/2026', active: false }
            ]
        }
    },
    computed: {
        filteredVouchers() {
            return this.vouchers.filter(v => {
                const matchSearch = v.ma.toLowerCase().includes(this.searchQuery.toLowerCase()) || v.ten.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchStatus = !this.filterStatus || (this.filterStatus === 'active' ? v.active : !v.active);
                return matchSearch && matchStatus;
            });
        }
    },
    methods: {
        moModalThemVoucher() {
            this.isEdit = false;
            this.formV = { id: Date.now(), ma: '', ten: '', giam: 100000, kieu: 'fixed', so_luong: 100, da_dung: 0, han: '2026-12-31', active: true };
            this.showModal = true;
        },
        suaVoucher(v) {
            this.isEdit = true;
            this.formV = { ...v };
            this.showModal = true;
        },
        luuVoucher() {
            if (!this.formV.ma || !this.formV.ten) {
                alert('Vui lòng điền mã code và tên chương trình khuyến mãi!');
                return;
            }
            if (this.isEdit) {
                const idx = this.vouchers.findIndex(v => v.id === this.formV.id);
                if (idx !== -1) this.vouchers[idx] = { ...this.formV };
            } else {
                this.vouchers.unshift({ ...this.formV });
            }
            this.showModal = false;
            alert('Lưu mã voucher thành công!');
        },
        xoaVoucher(v) {
            if (confirm(`Bạn có chắc muốn xóa mã voucher "${v.ma}"?`)) {
                this.vouchers = this.vouchers.filter(item => item.id !== v.id);
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
