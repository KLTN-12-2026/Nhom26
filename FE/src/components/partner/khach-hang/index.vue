<template>
    <div class="partner-khach-hang-container">
        <!-- Banner Title -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 page-banner-card">
            <div class="card-body p-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-pink text-white px-3 py-1 rounded-pill font-11 fw-bold">
                                VẬN HÀNH & CHĂM SÓC KHÁCH HÀNG
                            </span>
                            <span class="text-muted small">/ Khách hàng đặt tour</span>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Quản Lý Danh Sách Khách Hàng</h3>
                        <p class="text-muted small mb-0">
                            Lưu trữ hồ sơ du khách, lịch sử hành trình, tổng chi tiêu trọn đời và gửi ưu đãi tri ân khách hàng thân thiết.
                        </p>
                    </div>
                    <div>
                        <button class="btn btn-outline-pink rounded-3 px-3 py-2 fw-semibold" @click="xuatExcel">
                            <i class="bx bx-download me-1"></i> Xuất Danh Sách Khách Hàng
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
                        <input type="text" class="form-control border-start-0" v-model="searchQuery" placeholder="Tìm theo tên khách, số điện thoại, email...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm" v-model="filterTier">
                        <option value="">Tất cả phân khúc</option>
                        <option value="VIP Gold">Khách VIP Gold</option>
                        <option value="Thành viên">Thành viên thân thiết</option>
                    </select>
                </div>
                <div class="col-md-4 text-end">
                    <span class="small text-muted">Tổng hồ sơ: <strong class="text-pink">{{ filteredCustomers.length }} khách hàng</strong></span>
                </div>
            </div>
        </div>

        <!-- Customers Table -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small">
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th width="24%">Khách Hàng</th>
                            <th width="16%">Số Điện Thoại</th>
                            <th width="20%">Tour Gần Nhất</th>
                            <th class="text-center" width="10%">Số Đơn Đặt</th>
                            <th class="text-end" width="13%">Tổng Chi Tiêu</th>
                            <th class="text-center" width="12%">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(kh, i) in filteredCustomers" :key="kh.id">
                            <td class="text-center fw-bold">{{ i + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar-circle-sm bg-pink-light text-pink fw-bold">{{ kh.avatar }}</div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ kh.ho_ten }}</div>
                                        <small class="text-muted">{{ kh.email }} · <span class="badge bg-light text-dark font-10">{{ kh.tier }}</span></small>
                                    </div>
                                </div>
                            </td>
                            <td><code>{{ kh.sdt }}</code></td>
                            <td class="text-dark small">{{ kh.tour_cuoi }}</td>
                            <td class="text-center"><span class="badge bg-light text-dark">{{ kh.so_lan }} đơn</span></td>
                            <td class="text-end fw-bold text-pink">{{ kh.tong.toLocaleString() }} đ</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a :href="'tel:' + kh.sdt" class="btn btn-outline-secondary" title="Gọi điện">
                                        <i class="bx bx-phone"></i>
                                    </a>
                                    <button class="btn btn-outline-pink" title="Gửi Voucher Tri Ân" @click="guiVoucher(kh)">
                                        <i class="bx bx-gift"></i>
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
    name: 'DoiTacKhachHang',
    data() {
        return {
            searchQuery: '',
            filterTier: '',
            customers: [
                { id: 1, ho_ten: 'Lê Tuấn Kiệt', avatar: 'LK', sdt: '0918.423.889', email: 'tuankiet.le@gmail.com', tour_cuoi: 'Du Thuyền Hạ Long 5 Sao 2N1Đ', so_lan: 3, tong: 38500000, tier: 'VIP Gold' },
                { id: 2, ho_ten: 'Nguyễn Thị Mai Anh', avatar: 'MA', sdt: '0973.112.504', email: 'maianh.nguyen@gmail.com', tour_cuoi: 'Tour Tràng An Bái Đính 1N VIP', so_lan: 2, tong: 7600000, tier: 'Thành viên' },
                { id: 3, ho_ten: 'Trần Minh Hoàng', avatar: 'MH', sdt: '0904.551.980', email: 'hoang.tran@gmail.com', tour_cuoi: 'Thuê xe máy phượt & Trekking Fansipan', so_lan: 4, tong: 16800000, tier: 'VIP Gold' },
                { id: 4, ho_ten: 'Phạm Bảo Châu', avatar: 'BC', sdt: '0982.776.321', email: 'chao.pham@gmail.com', tour_cuoi: 'Tour Phú Quốc Sunset 4N3Đ Trọn Gói', so_lan: 1, tong: 22600000, tier: 'Thành viên' }
            ]
        }
    },
    computed: {
        filteredCustomers() {
            return this.customers.filter(k => {
                const matchSearch = k.ho_ten.toLowerCase().includes(this.searchQuery.toLowerCase()) || k.sdt.includes(this.searchQuery) || k.email.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchTier = !this.filterTier || k.tier === this.filterTier;
                return matchSearch && matchTier;
            });
        }
    },
    methods: {
        xuatExcel() {
            alert('Đang trích xuất file Excel danh sách khách hàng đối tác...');
        },
        guiVoucher(kh) {
            alert(`Đã gửi mã voucher giảm 10% tri ân tới khách hàng ${kh.ho_ten} qua email!`);
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
.btn-outline-pink {
    border: 1px solid #fecdd3;
    color: #e11d48;
}
.btn-outline-pink:hover {
    background-color: #fff1f2;
    color: #be123c;
}
.avatar-circle-sm {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
}
</style>
